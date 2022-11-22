@extends('layouts.admin')
@section('content')
<link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/miscellaneous/jqvmap/jqvmap.bundle.css') }}">

@include('partials.subheader')
<style>
.display-5 {
	font-size: 2rem;
}
.echarts {
  position: relative;
  height: 50vh;
}
</style>
<div class="row d-flex">
	
	<div class="col-sm-12 col-xl-12 mb-2">
		<form id="fp" action="{{ route('admin.detailbanpem') }}" method="post">
			{{ csrf_field() }}
		<label class="form-label" for="single-default">
			Tahun :
		</label>
		<select class="custom-select col-md-2" id="dtYear1" name="dtYear1" >
			<option  value="">- Tahun awal -</option>
			@foreach($years as $data)
				<option  value="{{ $data->year }}"
				@if ($dtYear1 == $data->year)
					selected   
				@endif    
					>{{ $data->year }}</option>
			@endforeach
		</select>
		<label class="form-label" for="single-default">
			s/d Tahun :
		</label>
		<select class="custom-select col-md-2" id="dtYear2" name="dtYear2" >
			<option  value="">- Tahun akhir -</option>
			@foreach($years as $data)
				<option  value="{{ $data->year }}"
				@if ($dtYear2 == $data->year)
					selected   
				@endif    
					>{{ $data->year }}</option>
			@endforeach
		</select>
		<a class="btn btn-primary text-white" type="button" onclick="fp.submit()" >{{ trans('global.view') }}</a>
		</form>
	</div>
	
	<div class="col-sm-4 col-xl-4">
		<div class="p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
			<div class="">
				<div hidden>
					@if (!empty($totalInYear))
						{{ $nominalyear = 0 }}
						{{ $nominalbrg = 0 }}
						{{ $nominaluang = 0 }}
					@endif
					@foreach ($totalInYear as $data)
						{{ $nominalyear += $data->sumtot }}
						{{ $nominalbrg += $data->totbrg }}
						{{ $nominaluang += $data->totuang  }}	
					@endforeach
				</div>
				<h3 class="display-4 d-block l-h-n m-0 fw-500">
					Rp {{ number_format(($nominalyear) / 1000000, 2, ',', '.')}} Jt
					<small class="m-0 l-h-n">{{ trans('cruds.detailbanpem.fields.totalamount') }}</small>
				</h3>
			</div>
			<i class="fal fa-globe-asia position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
		</div>
	</div>
	<div class="col-sm-4 col-xl-4">
		<div class="p-3 bg-warning-400 rounded overflow-hidden position-relative text-white mb-g">
			<div class="">
				<h3 class="display-4 d-block l-h-n m-0 fw-500">
					@if ($nominalbrg > 1000000)
						Rp {{ number_format(($nominalbrg) / 1000000, 2, ',', '.')}} Jt
					@elseif ($nominalbrg < 1000000)
						Rp {{ number_format(($nominalbrg) / 1000, 2, ',', '.')}} Jt	
					@else
						Rp 0
					@endif
					
					<small class="m-0 l-h-n">{{ trans('cruds.detailbanpem.fields.totalfacilities') }}</small>
				</h3>
			</div>
			<i class="fal fa-dolly position-absolute pos-right pos-bottom opacity-15  mb-n1 mr-n4" style="font-size: 6rem;"></i>
		</div>
	</div>
	<div class="col-sm-4 col-xl-4">
		<div class="p-3 bg-success-200 rounded overflow-hidden position-relative text-white mb-g">
			<div class="">
				<h3 class="display-4 d-block l-h-n m-0 fw-500">
					@if ($nominaluang > 1000000)
						Rp {{ number_format(($nominaluang) / 1000000, 2, ',', '.')}} Jt
					@elseif ($nominaluang < 1000000)
						Rp {{ number_format(($nominaluang) / 1000, 2, ',', '.')}} Jt	
					@else
						Rp 0
					@endif
					
					<small class="m-0 l-h-n">{{ trans('cruds.detailbanpem.fields.totalcash') }}</small>
				</h3>
			</div>
			<i class="fal fa-coins position-absolute pos-right pos-bottom opacity-15 mb-n5 mr-n6" style="font-size: 8rem;"></i>
		</div>
	</div>
</div>

<div class="row d-flex">
	<div class="col-lg-12">
		<div id="panel-1" class="panel show" data-panel-sortable data-panel-close data-panel-color data-panel-locked data-panel-reset>
			<div class="panel-hdr">
				<h2>
					<i class="fal fa-map mr-1"> </i> Peta Bantuan
				</h2>
				<div class="panel-toolbar">
					<a hidden data-toggle="tooltip" title data-original-title="Detail" class="btn btn-panel btn-info hover-effect-dot waves-effect waves-themed rounded-circle" type="button" href="{{ route('admin.detailrenja') }}">
					</a>
				</div>
			</div>
			<div class="panel-container show">
				<div class="panel-content p-0 jqvmap-bg-ocean border-faded border-left-0 border-right-0 border-top-0">
					<div class="row">
						<div class="col-lg-8" style="min-height: 330px;">
							<div id="vector-map" class="w-100 h-100 p-4"></div>
						</div>
						<div class="col-lg-4 p-4">
							<div class="p-1 d-flex align-items-center justify-content-start">
								<div class="border-faded border-top-0 border-left-0 border-bottom-0 py-2 pr-1 mr-1">
									<div class="text-right fw-500 l-h-n d-flex flex-column">
										<img class="d-inline-block js-jqvmap-flag mr-1" alt="flag" src="{{ asset('img/logo-icon.png') }}" style="width:auto; height: 55px;">
									</div>
								</div>
								<div class="d-flex justify-content-center flex-wrap d-sm-block">
									<div class="h3 m-0 d-flex align-items-center justify-content-start">
										<h3 class="js-jqvmap-prov mb-0 fw-500 text-dark"><i>- klik pada peta</i></h3>
									</div>
									<span class="m-0 fs-xs text-muted">
										Bantuan Pemerintah untuk Hortikultura
									</span>
								</div>
							</div>
							<div class="mt-2">
								<h1 class="fw-700 small">Berdasarkan Kewenangan</h1>
								<table class="table-striped table-lg w-100">
									<tbody>
										<tr>
											<th class="p-2"><i class="fas fa-globe"></i> Total Bantuan</th>
											<td class="p-2 text-right fw-900"><span class="js-jqvmap-amttotal"></span></td>
										</tr>
										<tr>
											<th class="p-2"><i class="fas fa-dolly"></i> Bantuan Barang</th>
											<td class="p-2 text-right fw-900"><span class="js-jqvmap-amtbrg"></span></td>
										</tr>
										<tr>
											<th class="p-2"><i class="fas fa-coins"></i> Bantuan Uang</th>
											<td class="p-2 text-right fw-900"><span class="js-jqvmap-amtcash"></span></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-content p-0 mt-1 border-faded border-left-0 border-right-0 border-top-0">
					<div class="row row-grid no-gutters">
						<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
							<div class="text-left ml-2">Kantor Pusat</div>
							<div id="kppiechart" class="px-3 py-2 d-flex align-items-center">
								<div  class="js-easy-pie-chart color-primary-600 position-relative d-flex align-items-center justify-content-center" data-percent="45" data-piesize="50" data-linewidth="5" data-trackcolor="#ccbfdf" data-scalelength="0">
									<div class="position-absolute pos-top pos-left pos-right pos-bottom d-flex align-items-center justify-content-center fw-500 fs-xl text-dark kppie">0</div>
									{{-- <div class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-xl">
										<span class="js-percent d-block text-dark kppie">45%</span>
									</div> --}}
								</div>
								<div class="d-inline-flex flex-column ml-2">
									<span class="d-inline-block js-jqvmap-amtkp kpnmbrg text-right"></span>
									<span class="d-inline-block js-jqvmap-amtkp kpnmuang text-right"></span>
								</div>
								<div class="ml-auto d-inline-flex align-items-center">
									<div class="d-inline-flex flex-column ml-2">
										<span class="d-inline-block badge badge-primary opacity-70 text-center p-1 width-6" data-toggle="tooltip" title data-original-title="Bantuan Barang: 75%" data-placement="left">
											<i class="fas fa-dolly kpbrg"></i>
										</span>
										<span class="d-inline-block badge bg-primary-300 opacity-70 text-center p-1 width-6 mt-1" data-toggle="tooltip" title data-original-title="Bantuan Uang: 25%" data-placement="left">
											<i class="fas fa-coins kpuang"></i>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
							<div class="text-left ml-2">Dekonsentrasi</div>
							<div id="dkpiechart" class="px-3 py-2 d-flex align-items-center">
								<div class="js-easy-pie-chart color-success-600 position-relative d-flex align-items-center justify-content-center" data-percent="25" data-piesize="50" data-linewidth="5" data-trackcolor="#7aece0" data-scalelength="0">
									<div class="position-absolute pos-top pos-left pos-right pos-bottom d-flex align-items-center justify-content-center fw-500 fs-xl text-dark dkpie">0</div>
									{{-- <div class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-xl">
										<span class="js-percent d-block text-dark"></span>
									</div> --}}
								</div>
								<div class="d-inline-flex flex-column ml-2">
									<span class="d-inline-block js-jqvmap-amtkp dknmbrg text-right"></span>
									<span class="d-inline-block js-jqvmap-amtkp dknmuang text-right"></span>
								</div>
								<div class="ml-auto d-inline-flex align-items-center">
									<div class="d-inline-flex flex-column ml-2">
										<span class="d-inline-block badge badge-success opacity-70 text-center p-1 width-6" data-toggle="tooltip" title data-original-title="Bantuan Barang: 75%" data-placement="left">
											<i class="fas fa-dolly dkbrg"></i>
										</span>
										<span class="d-inline-block badge bg-success-300 opacity-70 text-center p-1 width-6 mt-1" data-toggle="tooltip" title data-original-title="Bantuan Uang: 25%" data-placement="left">
											<i class="fas fa-coins dkuang"></i>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
							<div class="text-left ml-2">TP Provinsi</div>
							<div id="tppiechart" class="px-3 py-2 d-flex align-items-center">
								<div  class="js-easy-pie-chart color-warning-600 position-relative d-flex align-items-center justify-content-center" data-percent="15" data-piesize="50" data-linewidth="5" data-trackcolor="#ffebc1" data-scalelength="0">
									<div class="position-absolute pos-top pos-left pos-right pos-bottom d-flex align-items-center justify-content-center fw-500 fs-xl text-dark tppie">0</div>
									{{-- <div class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-xl">
										<span class="js-percent d-block text-dark"></span>
									</div> --}}
								</div>
								<div class="d-inline-flex flex-column ml-2">
									<span class="d-inline-block js-jqvmap-amtkp tpnmbrg text-right"></span>
									<span class="d-inline-block js-jqvmap-amtkp tpnmuang text-right"></span>
								</div>
								<div class="ml-auto d-inline-flex align-items-center">
									<div class="d-inline-flex flex-column ml-2">
										<span class="d-inline-block badge badge-warning opacity-70 text-center p-1 width-6" data-toggle="tooltip" title data-original-title="Bantuan Barang: 75%" data-placement="left">
											<i class="fas fa-dolly tpbrg"></i>
										</span>
										<span class="d-inline-block badge bg-warning-300 opacity-70 text-center p-1 width-6 mt-1" data-toggle="tooltip" title data-original-title="Bantuan Uang: 25%" data-placement="left">
											<i class="fas fa-coins tpuang"></i>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
							<div class="text-left ml-2">TP Kabupaten</div>
							<div id="tpkpiechart" class="px-3 py-2 d-flex align-items-center">
								<div  class="js-easy-pie-chart color-danger-600 position-relative d-flex align-items-center justify-content-center" data-percent="10" data-piesize="50" data-linewidth="5" data-trackcolor="#feb7d9" data-scalelength="0">
									<div class="position-absolute pos-top pos-left pos-right pos-bottom d-flex align-items-center justify-content-center fw-500 fs-xl text-dark tpkpie">0</div>
									{{-- <div class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-xl">
										<span class="js-percent d-block text-dark"></span>
									</div> --}}
								</div>
								<div class="d-inline-flex flex-column ml-2">
									<span class="d-inline-block js-jqvmap-amtkp tpknmbrg text-right"></span>
									<span class="d-inline-block js-jqvmap-amtkp tpknmuang text-right"></span>
								</div>
								<div class="ml-auto d-inline-flex align-items-center">
									<div class="d-inline-flex flex-column ml-2">
										<span class="d-inline-block badge badge-danger opacity-70 text-center p-1 width-6" data-toggle="tooltip" title data-original-title="Bantuan Barang: 75%" data-placement="left">
											<i class="fas fa-dolly tpkbrg"></i>
										</span>
										<span class="d-inline-block badge bg-danger-300 opacity-70 text-center p-1 width-6 mt-1" data-toggle="tooltip" title data-original-title="Bantuan Uang: 25%" data-placement="left">
											<i class="fas fa-coins tpkuang"></i>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="panel-3" class="panel show" data-panel-sortable data-panel-close data-panel-color data-panel-locked data-panel-reset>
			<div class="panel-hdr">
				<h2>
					<span class="mr-1 text-muted">Rincian Data: </span><span class="js-jqvmap-prov"></span>
				</h2>
				<div class="panel-toolbar">
					<a hidden data-toggle="tooltip" title data-original-title="Detail" class="btn btn-panel btn-info hover-effect-dot waves-effect waves-themed rounded-circle" type="button" href="{{ route('admin.detailrenja') }}">
					</a>
				</div>
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<div class="row">
						<div class="col-lg-12">
							<!--form id="fp" action="{{ route('admin.detailbanpem') }}" method="post">
								{ { csrf_field() }}
								<div class="card-body d-flex justify-content-between font-weight-bolder align-items-center">
									<div>
									<label>Provinsi : </label>
									<select class="custom-select" id="dtProp" name="dtProp" onchange="fp.submit()">
										<option  value="">- Pilih Provinsi -</option>
										@ foreach($provinsi as $data)
											<option value="{ { $data->provinsi }}"
											@ if ($dtProp == $data->provinsi)
												selected   
											@ endif    
												>{ { $data->provinsi }}</option>
										@ endforeach
									</select>
									</div>
									
								</div>
							</form-->
							<table class="table table-sm table-bordered table-striped table-hover datatable datatable-DetailBanpem w-100">
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
											<?php echo $data->tot4 ?>
										</td>
										
										<td class="text-center">
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
										<th class="text-right fw-700"></th>
										<th class="text-right fw-700"></th>
										<th class="text-right fw-700"></th>
										<th class="text-right fw-700"></th>
										<th class="text-right fw-700"></th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>

@endsection


@section('scripts')
@parent
<script src="{{ asset('js/smartadmin/miscellaneous/jqvmap/jqvmap.bundle.js') }}"></script>
<script src="{{ asset('js/smartadmin/miscellaneous/jqvmap/maps/jquery.vmap.indonesia.js') }}"></script>
<script type="text/javascript" >
$(document).ready(function()
{

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

    $.extend(true, $.fn.dataTable.defaults, {
    draw: 0,
    dom:"<'row'<'col-sm-12 col-md-2'><'col-sm-12 col-md-8 d-flex'B><'col-sm-12 col-md-2 d-flex justify-content-end'>>" +
					"<'row'<'col-sm-12 col-md-12'tr>>" +
					"<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>",
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 5,
	responsive: false,
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
  

	function numbers(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

	$('#vector-map').vectorMap(
	{
		map: 'indonesia_id',
		enableZoom: true,
		backgroundColor: 'transparent',
		color: color.warning._50,
		borderOpacity: 0.5,
		borderWidth: 1,
		hoverColor: color.success._300,
		hoverOpacity: null,
		selectedColor: color.success._700,
		enableZoom: true,
		showTooltip: true,
		scaleColors: [color.primary._400, color.primary._50],
		normalizeFunction: 'polynomial',
		onRegionClick: function(element, code, region)
		{
			/* click event */
			var message = 'You clicked "'
			+ region
			+ '" which has the code: '
			+ code.toLowerCase();
 
			console.log(message);
		
			$.ajax({
			url: "/admin/banpemgetdataprov/{{ $dtYear1 }}/{{ $dtYear2 }}/"+region,
			type:"GET",
			
			success:function(response){
			//console.log(response);
			if(response) {
				$('.js-jqvmap-flag').attr('src', '{{ asset("img/prov_logo") }}' + '/' + code.toLowerCase() + '.svg');
				$('.js-jqvmap-prov').html(region);
				$('.js-jqvmap-amttotal').html('Rp ' + numbers(response.success[0].sumtot));
				$('.js-jqvmap-amtbrg').html('Rp ' + numbers(response.success[0].totbrg));
				$('.js-jqvmap-amtcash').html('Rp ' + numbers(response.success[0].totuang));
				$('#kppiechart .js-easy-pie-chart').data('easyPieChart').update(numbers(response.success[0].kppers) + '%');
				$('.kppie').html( numbers(response.success[0].kppers) + '%');
				$('.kpnmbrg').html( numbers(response.success[0].kpnmbrg));
				$('.kpnmuang').html( numbers(response.success[0].kpnmuang));
				$('.kpbrg').html(' '+numbers(response.success[0].kpbrg)+'%');
				$('.kpuang').html(' '+numbers(response.success[0].kpuang)+'%');
				$('#dkpiechart .js-easy-pie-chart').data('easyPieChart').update(numbers(response.success[0].dkpers) + '%');
				$('.dkpie').html( numbers(response.success[0].dkpers) + '%');
				$('.dknmbrg').html( numbers(response.success[0].dknmbrg));
				$('.dknmuang').html( numbers(response.success[0].dknmuang));
				$('.dkbrg').html(' '+numbers(response.success[0].dkbrg)+'%');
				$('.dkuang').html(' '+numbers(response.success[0].dkuang)+'%');
				$('#tppiechart .js-easy-pie-chart').data('easyPieChart').update(numbers(response.success[0].tppers) + '%');
				$('.tppie').html( numbers(response.success[0].tppers) + '%');
				$('.tpnmbrg').html( numbers(response.success[0].tpnmbrg));
				$('.tpnmuang').html( numbers(response.success[0].tpnmuang));
				$('.tpbrg').html(' '+numbers(response.success[0].tpbrg)+'%');
				$('.tpuang').html(' '+numbers(response.success[0].tpuang)+'%');
				$('#tpkpiechart .js-easy-pie-chart').data('easyPieChart').update(numbers(response.success[0].tpkpers) + '%');
				$('.tpkpie').html( numbers(response.success[0].tpkpers) + '%');
				$('.tpknmbrg').html( numbers(response.success[0].tpknmbrg));
				$('.tpknmuang').html( numbers(response.success[0].tpknmuang));
				$('.tpkbrg').html(' '+numbers(response.success[0].tpkbrg)+'%');
				$('.tpkuang').html(' '+numbers(response.success[0].tpkuang)+'%');
				table
            		.columns(1)
            		.search(region)
					.draw();
            		
				
			}
			},
				error: function(error) {
				console.log(error);
				}
			});
		}
	});
});
</script>

@endsection