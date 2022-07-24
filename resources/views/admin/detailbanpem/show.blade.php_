@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Output">
                <thead>
                <tr>
                    <th style="vertical-align : middle; display:none;">
                        ID
                    </th>
                    <th>
                        Kabupaten
                    </th>
                    <th>
                        Penerima
                    </th>
                    <th>
                        Nama barang
                    </th>
                    <th class="text-right" >
                        Volume
                    </th>
                    <th class="text-right">
                        Nilai
                    </th>
                    <th class="text-center">
                        Kewenangan
                    </th>
                    <th class="text-center">
                        Kegiatan
                    </th>
                    <th class="text-center">
                        Akun
                    </th>
                </tr>
                <tr>
                    <td style="vertical-align : middle; display:none;"></td>
                    <td >
                        <input class="search" type="text" style="width:110px;">
                    </td>
                    <td >
                        <input class="search" type="text" style="width: 110px;">
                    </td>
                    <td>
                        <input class="search" type="text"  style="width: 100px;">
                    </td>
                    <td>
                       
                    </td>
                    <td>
                       
                    </td>
                    <td>
                        <input class="search" type="text"  style="width: 90px;" >
                    </td>
                    
                    <td>
                        <input class="search" type="text" style="width: 90px;">
                    </td>
                    
                    <td><input class="search" type="text" style="width: 90px;"></td>
                </tr>
                </thead>
                
                <tbody>
                    
                    @foreach($stable->getData()->data as $data) 
                        
                        <tr>
                            <td class="text-wrap" width="0px" style="display:none;">
                                {{ $data->id }}
                            </td>
                            <td class="text-wrap" width="200px">
                                {{ $data->kab_kota }}
                            </td>
                            <td class="text-wrap" width="200px">
                                {{ $data->nm_gapoktan }} 
                            </td>
                            <td class="text-wrap" width="200px">
                                {{ $data->nm_barang }}
                            </td>
                            <td class="text-right">
                                {{ $data->total }}
                            </td>
                            <td class="text-right">
                                {{ $data->nominal }}
                            </td>
                            <td class="text-center">
                                {{ $data->kwn }}
                            </td>
                            <td class="text-center">
                                {{ $data->kd_giat }}
                            </td>
                            <td class="text-center">
                                {{ $data->kd_akun }}
                            </td>
                            
                            
                        </tr>
                    @endforeach
                    
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-right">Total:</th>
                        <th class="text-right">0</th>
                        <th colspan="3"></th>
                        
                    </tr>
                    
                </tfoot>
            </table>
        </div>
    </div>
    <div class="card-body">
        <a class="btn btn-success" href="{{ route('admin.detailbanpem') }}">
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
    order: [[0, 'asc' ]],
    pageLength: 25,
    footerCallback : function ( row, data, start, end, display ) {
        var api = this.api(), data;
 
        // Remove the formatting to get integer data for summation
        var intVal = function ( i ) {
            return typeof i === 'string' ? i.replace(/[\.,]/g, '')*1 : typeof i === 'number' ? i : 0;
        };
	
        // Total over this page
        pageTotal1 = api
        .column( 5, { page: 'current'} )
        .data()
        .reduce( function (a, b) {
            return intVal(a) + intVal(b);
        }, 0 );
	
        // Update footer
        $( api.column( 4 ).footer() ).html(
            numberWithCommas(pageTotal1)
        )

        // Total over all pages
        total = api
            .column( 5 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        $( api.column( 5 ).footer() ).html(
            'from Grand Total: ' +
             numberWithCommas(total)
        )
    }
  });
  let table = $('.datatable-Output:not(.ajaxTable)').DataTable({ buttons: [dtButtons]})
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  let visibleColumnsIndexes = null;
    $('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || true
      let value = strict && this.value ? "^" + this.value + "$" : this.value
      
      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      
      table
        .column(index)
        .search(value, strict)
        .draw()
    });
    table.on('column-visibility.dt', function(e, settings, column, state) {
        visibleColumnsIndexes = []
        table.columns(":visible").every(function(colIdx) {
            visibleColumnsIndexes.push(colIdx);
        });
    })
  
})

</script>
@endsection