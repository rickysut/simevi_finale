@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="card">
    <form id="fp" action="{{ route('admin.detailbanpem') }}" method="post">
        {{ csrf_field() }}
        <div class="card-body d-flex justify-content-between font-weight-bolder align-items-center">
            <div>
            <label>Provinsi : </label>
            <select class="custom-select" id="dtProp" name="dtProp" onchange="fp.submit()">
                <option  value="">- Pilih Provinsi -</option>
                @foreach($provinsi as $data)
                    <option  value="{{ $data->provinsi }}"
                    @if ($dtProp == $data->provinsi)
                        selected   
                    @endif    
                        >{{ $data->provinsi }}</option>
                @endforeach
            </select>
            </div>
            <div>
            <label>Tahun : </label>
            <select class="custom-select" id="dtYear" name="dtYear" onchange="fp.submit()">
                <option  value="">- Pilih Tahun -</option>
                @foreach($years as $data)
                    <option  value="{{ $data->year }}"
                    @if ($dtYear == $data->year)
                        selected   
                    @endif    
                        >{{ $data->year }}</option>
                @endforeach
            </select>
            </div>
        
        </div>
    </form>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover datatable datatable-DetailBanpem">
            <thead>
                <tr>
                    <th class="text-center" rowspan="2" style="vertical-align : middle; display:none;" >
                        year
                    </th>
                    <th class="text-center" rowspan="2" style="vertical-align : middle;">
                        Provinsi
                    </th>
                    <th class="text-center" colspan="4" style="horizontal-align : middle;">
                        Kewenangan
                    </th>
                    
                    <th class="text-center" rowspan="2" width="120px" style="vertical-align : middle;">
                        Action  
                    </th>
                    
                </tr>
                <tr>
                    <th class="text-center">
                        Kantor Pusat
                    </th>
                    <th class="text-center">
                        Dekonsentrasi
                    </th>
                    <th class="text-center">
                        TP (Prov)
                    </th>
                    <th class="text-center">
                        TP (Kab/Kota)
                    </th>
                </tr>
            </thead>
            <tbody>
                
                
                @foreach($stable->getData()->data as $data) 
                    
                    <tr>
                        <td style="display:none;">
                            {{ $data->year }}
                        </td>
                        <td>
                            {{ $data->provinsi }}
                        </td>
                        <td class="text-right">
                            {{ $data->tot1 }}
                        </td>
                        
                        <td class="text-right">
                            {{ $data->tot2 }}
                        </td>
                        
                        <td class="text-right">
                            {{ $data->tot3 }}
                        </td>
                       
                        <td class="text-right">
                            {{ $data->tot4 }}
                        </td>
                        
                        <td>
                            @can('detail_banpem_show')
                            <?php echo $data->actions ?>    
                            @endcan
                            
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
            <tfoot>
                <tr>
                    
                    <th class="text-right">Total:</th>
                    <th class="text-right"></th>
                    <th class="text-right"></th>
                    <th class="text-right"></th>
                    <th class="text-right"></th>
                    <th></th>
                </tr>
                
            </tfoot>
        </table>
    </div>
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
    order: [[ 1, 'asc' ]],
    pageLength: 25,
    footerCallback : function ( row, data, start, end, display ) {
        var api = this.api(), data;
 
        // Remove the formatting to get integer data for summation
        var intVal = function ( i ) {
            return typeof i === 'string' ? i.replace(/[\.,]/g, '')*1 : typeof i === 'number' ? i : 0;
        };
	
        

            // Total over this page
            pageTotal1 = api
            .column( 2, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
	
            // Update footer
            $( api.column( 1 ).footer() ).html(
                numberWithCommas(pageTotal1)
            )

            pageTotal2 = api
            .column( 3, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
	
            // Update footer
            $( api.column( 2 ).footer() ).html(
                numberWithCommas(pageTotal2)
            )
            pageTotal3 = api
            .column( 4, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
	
            // Update footer
            $( api.column( 3 ).footer() ).html(
                numberWithCommas(pageTotal3)
            )
            pageTotal4 = api
            .column( 5, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
	
            // Update footer
            $( api.column( 4 ).footer() ).html(
                numberWithCommas(pageTotal4)
            )

            $( api.column( 5 ).footer() ).html(
                numberWithCommas(pageTotal1+pageTotal2+pageTotal3+pageTotal4)
            )
        }
  });
  let table = $('.datatable-DetailBanpem:not(.ajaxTable)').DataTable({ buttons: [dtButtons]})
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection