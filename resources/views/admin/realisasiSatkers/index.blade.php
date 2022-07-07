@extends('layouts.admin')
@section('content')
<style>
select {
  width: 300px;
  overflow: hidden;
  white-space: pre;
  text-overflow: ellipsis;
  -webkit-appearance: none;
}
</style>
@include('partials.subheader')
<div class="card">
    <form id="fp" action="{{ route('admin.realisasisatker') }}" method="post">
        {{ csrf_field() }}
        <div class="card-body d-flex justify-content-between font-weight-bolder align-items-center">
            <div>
                <label>Satker :</label>
                <select class="custom-select" id="dtSatker" name="dtSatker" onchange="fp.submit()" style="width: 300px;">
                    <option  value="">- Pilih Satker -</option>
                    @foreach($satkers as $data)
                        <option  value="{{ $data->kd_satker }}"
                        @if ($dtSatker == $data->kd_satker)
                            selected   
                        @endif    
                            title="{{ $data->nm_satker }}">{{ $data->kd_satker }} - {{ $data->nm_satker }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <div class="form-group">
                    <label for="tanggal">Tanggal Realisasi:</label>
                    <div class="input-group">
                        <input type="text" class="form-control date" name="dtDate" id="dtDate" value={{ $dtDate }}>
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </form>
    
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover datatable datatable-RealisasiSatker">
            <thead>
                <tr>
                    <th class="text-center" style="display:none;" >
                        tahun
                    </th>
                    <th class="text-center" >
                        Kode
                    </th>
                    <th class="text-center">
                        Satuan Kerja
                    </th>
                    <th class="text-center">
                        Pagu
                    </th>
                    <th class="text-center">
                        Realisasi
                    </th>
                    <th class="text-center">
                        %
                    </th>
                    <th class="text-center" width="120px">
                        Action  
                    </th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($stable->getData()->data as $data) 
                    <tr>
                        <td style="display:none;">
                            {{ $data->tahun }}
                        </td>
                        <td class="text-center">
                            {{ $data->kd_satker }}
                        </td>
                        <td >
                            {{ $data->nm_satker }}
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
                        <td>
                            @can('realisasi_satker_show')
                            <?php echo $data->actions ?>    
                            @endcan
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
    var maxLength = 50;
    $('#dtSatker > option').text(function(i, text) {
        if (text.length > maxLength) {
            return text.substr(0, maxLength) + '...';  
        }
    });
    $('#dtDate').on('dp.change', function(e){
        var d = new Date(e.oldDate);
        var t = new Date(e.date);
        var mindate = new Date(0);
        if ((t != d)&&(d.toString() != mindate.toString())){
            $('#fp').submit();
        }
        
    }) 
    $(function () {
        
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

    $.extend(true, $.fn.dataTable.defaults, {
    
    dom: 'lBf<t>p',
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
  let table = $('.datatable-RealisasiSatker:not(.ajaxTable)').DataTable({ buttons: [dtButtons]})
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection