@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="card">
    <div class="card-body">
        <div><label for="kdsatker"><h5>Kode Satker : {{ $dtSatker ?? '' }}</h5></label></div>
        <div><label for="satker"><h5>Satuan Kerja : {{ $nm_satker[0]->nm_satker ?? '' }}</h5></label></div>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-detailRO">
                <thead>
                    <tr>
                        <th class="text-center" style="display:none;">
                            id
                        </th>
                        <th class="text-center" >
                            Kode
                        </th>
                        <th class="text-center" >
                            Uraian
                        </th>
                        <th class="text-center" >
                            Pagu
                        </th>
                        <th class="text-center" >
                            Realisasi
                        </th>
                        <th class="text-center" >
                            %
                        </th>
                        
                        
                    </tr>
                    
                </thead>
                
                <tbody>
                    
                    @foreach($stable->getData()->data as $data) 
                        <tr>
                            <td class="text-center" width="0px" style="display:none;">
                                {{ $data->id }}
                            </td>
                            <td class="text-center" width="200px">
                                {{ $data->kode }}
                            </td>
                            <td class="text-left">
                                {{ $data->uraian }} 
                            </td>
                            <td class="text-right">
                                {{ $data->pagu }}
                            </td>
                            <td class="text-right">
                                {{ $data->realisasi }}  
                            </td>
                            <td class="text-right">
                                {{ $data->nilai }}
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="2" class="text-right">Total:</th>
                        <th class="text-right"></th>
                        <th class="text-right"></th>
                        <th class="text-right"></th>
                    </tr>
                    
                </tfoot>
            </table>
        </div>
    </div>
    <div class="card-body">
        <a class="btn btn-success" href="{{ route('admin.realisasisatker') }}">
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
    
    dom: 'lBf<t>ip',
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
        .column( 4, { page: 'current'} )
        .data()
        .reduce( function (a, b) {
            return intVal(a) + intVal(b);
        }, 0 );
	
        // Update footer
        $( api.column( 3 ).footer() ).html(
            numberWithCommas(pageTotal2)
        )
        
        // Update footer
        $( api.column( 4 ).footer() ).html(
            numberWithCommas(((pageTotal2/pageTotal1)*100).toFixed(2))
        )
        
    }
  });
  let table = $('.datatable-detailRO:not(.ajaxTable)').DataTable({ buttons: [dtButtons]})
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection