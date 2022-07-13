@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="row">
	<div class="col-12">
		<div id="panel-1" class="panel show" data-panel-sortable data-panel-close data-panel-collapsed>
			<div class="panel-hdr">
				<h2>
					Matrix | <span class="fw-300"><i>Renja</i></span>
				</h2>
                
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<div class="mb-2">
					<form id="yf" action="{{ route('admin.detailrenja') }}" method="post">
						{{ csrf_field() }}
						<div class="d-flex justify-content-between font-weight-bolder align-items-center">
							<div>
								<label>Provinsi : </label>
								<select class="custom-select" id="dtProp" name="dtProp" onchange="yf.submit()">
									<option  value="">- Pilih Provinsi -</option>
									@foreach($provinsi as $data)
										<option  value="{{ $data->kd_dt1 }}"
										@if ($dtProp == $data->kd_dt1)
											selected   
										@endif    
											>{{ $data->nm_prop }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</form>
					</div>
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover datatable datatable-DetailRenja w-100">
							<thead>
								<tr>
									<th class="text-center" rowspan="2" style="vertical-align : middle; display:none;" hidden >
										id
									</th>
									<th class="text-center" rowspan="2" style="vertical-align : middle;">
										{{ trans('cruds.detailrenja.fields.kabupaten') }}
									</th>
									<th class="text-center" >
										2019
									</th>
									<th class="text-center" >
										2020
									</th>
									<th class="text-center" >
										2021
									</th>
									<th class="text-center" >
										2022
									</th>
									<th class="text-center" rowspan="2" style="width: 15%;vertical-align : middle;">
										Tindakan  
									</th>
									
								</tr>
								<tr>
									<th class="text-center">
										{{ trans('cruds.detailrenja.fields.alokasi') }}
										<br>
										(000)
									</th>
									<th class="text-center">
										{{ trans('cruds.detailrenja.fields.alokasi') }}
										<br>
										(000)
									</th>
									<th class="text-center">
										{{ trans('cruds.detailrenja.fields.alokasi') }}
										<br>
										(000)
									</th>
									<th class="text-center">
										{{ trans('cruds.detailrenja.fields.alokasi') }}
										<br>
										(000)
									</th>
								</tr>
							</thead>
							<tbody>
								@foreach($stable->getData()->data as $data) 
									<tr>
										<td style="display:none;" hidden>
											{{ $data->idk }}
										</td>
										<td>
											{{ $data->nama_kab }}
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
										<td class="text-center">
											@can('detail_renja_show')
											<?php echo $data->actions ?>    
											@endcan
										</td>
									</tr>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th hidden></th>
									<th class="text-right">Total:</th>
									<th class="text-right"></th>
									<th class="text-right"></th>
									<th class="text-right"></th>
									<th class="text-right"></th>
									<th class="text-right"></th>
								</tr>
								
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
<div>

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
	buttons: dtButtons,
	responsive: true,
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 50,
    footerCallback : function ( row, data, start, end, display ) {
        var api = this.api(), data;
 
        // Remove the formatting to get integer data for summation
        var intVal = function ( i ) {
            return typeof i === 'string' ? i.replace(/[\.,]/g, '')*1 : typeof i === 'number' ? i : 0;
        };
	
        // Total over all pages
        total = api
            .column( 2 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

            // Total over this page
            pageTotal1 = api
            .column( 2, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
	
            // Update footer
            $( api.column( 2 ).footer() ).html(
                numberWithCommas(pageTotal1)
            )
            pageTotal2 = api
            .column( 3, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
	
            // Update footer
            $( api.column( 3 ).footer() ).html(
                numberWithCommas(pageTotal2)
            )
            pageTotal3 = api
            .column( 4, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
	
            // Update footer
            $( api.column( 4 ).footer() ).html(
                numberWithCommas(pageTotal3)
            )
            pageTotal4 = api
            .column( 5, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
	
            // Update footer
            $( api.column( 5 ).footer() ).html(
                numberWithCommas(pageTotal4)
            )
        },
		
  });
  
  
  
  let table = $('.datatable-DetailRenja:not(.ajaxTable)').DataTable({ buttons: [dtButtons]})
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection