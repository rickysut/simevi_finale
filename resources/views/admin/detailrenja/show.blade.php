@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Output w-100">
                <thead>
                <tr>
                    <th class="text-center" rowspan="2" style="vertical-align : middle; display:none;" hidden>
                        id
                    </th>
                    <th class="text-center" rowspan="2" style="vertical-align : middle;">
                        Output
                    </th>
                    <th class="text-center" colspan="2">
                        2019
                    </th>
                    <th class="text-center" colspan="2">
                        2020
                    </th>
                    <th class="text-center" colspan="2">
                        2021
                    </th>
                    <th class="text-center" colspan="2">
                        2022
                    </th>
                    
                    
                </tr>
                <tr>
                    <th class="text-center">
                        Volume
                    </th>
                    <th class="text-center">
                        Alokasi
                        <br>
                        (000)
                    </th>
                    <th class="text-center">
                        Volume
                    </th>
                    <th class="text-center">
                        Alokasi
                        <br>
                        (000)
                    </th>
                    <th class="text-center">
                        Volume
                    </th>
                    <th class="text-center">
                        Alokasi
                        <br>
                        (000)
                    </th>
                    <th class="text-center">
                        Volume
                    </th>
                    <th class="text-center">
                        Alokasi
                        <br>
                        (000)
                    </th>
                    
                </tr>
                </thead>
                
                <tbody>
                    
                    @foreach($stable->getData()->data as $data) 
                        <tr>
                            <td class="text-wrap" width="0px" style="display:none;" hidden>
                                {{ $data->id }}
                            </td>
                            <td class="text-wrap" width="200px">
                                {{ $data->nmoutput }}
                            </td>
                            <td class="text-center">
                                {{ $data->vol1 }} 
                                {{-- {{ $data->sat1 }} --}}
                            </td>
                            <td class="text-right">
                                {{ $data->jumlah1 }}
                            </td>
                            <td class="text-center">
                                {{ $data->vol2 }}  
                                {{-- {{ $data->sat2 }} --}}
                            </td>
                            <td class="text-right">
                                {{ $data->jumlah2 }}
                            </td>
                            <td class="text-center">
                                {{ $data->vol3 }}  
                                {{-- {{ $data->sat3 }} --}}
                            </td>
                            <td class="text-right">
                                {{ $data->jumlah3 }}
                            </td>
                            <td class="text-center">
                                {{ $data->vol4 }}   
                                {{-- {{ $data->sat4 }} --}}
                            </td>
                            <td class="text-right">
                                {{ $data->jumlah4 }}
                            </td>
                            
                            
                        </tr>
                    @endforeach
                    
                </tbody>
                <tfoot>
                    <tr>
                        
                        <th></th>
                        <th class="text-right">Total:</th>
                        <th class="text-right"></th>
                        <th class="text-right">Total:</th>
                        <th class="text-right"></th>
                        <th class="text-right">Total:</th>
                        <th class="text-right"></th>
                        <th class="text-right">Total:</th>
                        <th class="text-right"></th>
                        
                    </tr>
                    
                </tfoot>
            </table>
        </div>
    </div>
    <div class="card-body">
        <a class="btn btn-success" href="{{ route('admin.detailrenja') }}">
            {{ trans('global.back') }}
        </a>
       
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

    $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[1, 'asc' ]],
    pageLength: 25,
    footerCallback : function ( row, data, start, end, display ) {
        var api = this.api(), data;
 
        // Remove the formatting to get integer data for summation
        var intVal = function ( i ) {
            return typeof i === 'string' ? i.replace(/[\.,]/g, '')*1 : typeof i === 'number' ? i : 0;
        };
	
        // Total over this page
        pageTotal1 = api
        .column( 3, { page: 'current'} )
        .data()
        .reduce( function (a, b) {
            return intVal(a) + intVal(b);
        }, 0 );
	
        // Update footer
        $( api.column( 2 ).footer() ).html(
            numberWithCommas(pageTotal1)
        )
        pageTotal2 = api
        .column( 5, { page: 'current'} )
        .data()
        .reduce( function (a, b) {
            return intVal(a) + intVal(b);
        }, 0 );
	
        // Update footer
        $( api.column( 4 ).footer() ).html(
            numberWithCommas(pageTotal2)
        )
        pageTotal3 = api
        .column( 7, { page: 'current'} )
        .data()
        .reduce( function (a, b) {
            return intVal(a) + intVal(b);
        }, 0 );
	
        // Update footer
        $( api.column( 6 ).footer() ).html(
            numberWithCommas(pageTotal3)
        )
        pageTotal4 = api
        .column( 9, { page: 'current'} )
        .data()
        .reduce( function (a, b) {
            return intVal(a) + intVal(b);
        }, 0 );

        // Update footer
        $( api.column( 8 ).footer() ).html(
            numberWithCommas(pageTotal4)
        )
    }
  });
  let table = $('.datatable-Output:not(.ajaxTable)').DataTable({ buttons: [dtButtons]})
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection