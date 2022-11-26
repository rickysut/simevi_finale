@extends('layouts.admin')
@section('content')
@can('dashboardvip_access')
    
<style>
* {
  margin: 0;
  padding: 0;
}

.echarts {
  position: relative;
  height: 50vh;
}
</style>

@include('partials.subheaderadmin')
<div class="row d-flex">
	<!-- widget rencana kerja -->
	<div class="col-lg-8" hidden>
		<div id="panel-1" class="panel show" >
			<div class="panel-hdr">
				<h2>
					Alokasi | <span class="fw-300"><i>Anggaran</i></span>
				</h2>
				<div class="panel-toolbar">
					<a data-toggle="tooltip" title data-original-title="Detail" class="hover-effect-dot waves-effect waves-themed rounded-circle" type="button" href="{{ route('admin.detailrenja') }}">
						<i class="ni ni-action-redo"></i>
					</a>
				</div>
			</div>
			<div class="panel-container show">
				<div class="panel-content" style="height: 38em">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 align-items-center">
							<div class="c-chart-wrapper">
								<div id="donutchart" style="width:100%; height:300px;">
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-5">
						{{-- renjaData --}}
						
						@foreach ($renjaData as $key => $data )
							
							{{-- @if ($color = sprintf("#%06x",rand(0,16777215))) --}}
								<div class="d-flex mt-2 mb-1 fs-xs">
									<span id="nm{{ $key+1 }}">{{ $data->namakegiatan }}</span>
									<span id="tot{{ $key+1 }}" class="d-inline-block ml-auto">{{ $data->totgiat }}</span>
								</div>
								<hr>
								{{-- <div class="progress progress-xs mb-3">
									<div class="progress-bar"  id="pb{{$key+1}}" role="progressbar" style="background-color: #0000; width: {{ $data->persen }}%;" aria-valuenow="{{ $data->persen }}" aria-valuemin="0" aria-valuemax="100"></div>
								</div> --}}
							{{-- @endif		 --}}
						@endforeach
						
							
							
						</div>
						<hr>
					</div>
				</div>
				<div class="card-footer">
					<div class="text-medium-emphasis small d-flex justify-content-between">
						<div class="d-none d-md-block" >
							<span class="text-secondary">Data: </span>
							<span class="text-muted text-truncate text-truncate-sm js-get-date"></span>
						</div>
						<div class="text-muted">
							<a href="https://app2.pertanian.go.id/renjahorti/">Sumber: App Renja Horti</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end widget rencana kerja -->
	
	<!-- widget new kinerja anggaran/omspan -->
	<div class="col-md-12">
		<div id="panel-2" class="panel show" >
			<div class="panel-hdr">
				<h2>
					Alokasi & Kinerja <span class="fw-300"><i>Anggaran</i></span>
				</h2>
				<div class="panel-toolbar">
					<a href="" data-toggle="tooltip" title data-original-title="Lihat rincian alokasi" class="btn btn-xs btn-primary hover-effect-dot waves-effect waves-themed mr-1" type="button">Alokasi</a>
					<a href="{{ route('admin.pagu') }}" data-toggle="tooltip" title data-original-title="Lihat rincian kinerja" class="btn btn-xs btn-primary hover-effect-dot waves-effect waves-themed" type="button">Kinerja</a>
					{{-- <a data-toggle="tooltip" title data-original-title="Detail" class="hover-effect-dot waves-effect waves-themed rounded-circle" type="button" href="{{ route('admin.pagu') }}">
						<i class="ni ni-action-redo"></i>
					</a> --}}
				</div>
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<div id="carouselPagu" class="carousel slide carousel-multi-item v-2" data-interval="false">
						<div class="carousel-inner v-2" role="listbox">
							<div class="row d-flex">
								@for ($i=count($prData)-1;$i>=0;$i--)
								<div class="col-md-3 col-lg-3 col-xl-4">
									<div class="bg-primary-400 rounded overflow-hidden position-relative text-white mb-g">
										<div class="align-items-center justify-content-between">
											<div class="col-2">
												<span class="color-white fs-xl fw-400">{{ $prData[$i]->tahun }}</span>
											</div>
											<div class="col-12">
												<div class="col-12">
													<div class="d-flex justify-content-end fw-700 display-4">
														{{ number_format(($prData[$i]->realisasi/$prData[$i]->pagu)*100,00,",",".") }}%
													</div>
												</div>
												<div class="col-12">
													<div class="d-flex justify-content-between mt-2 mb-1 fw-500 fs-xs text-white fs-md fw-500">
														<span class="d-inline-block ml-auto">
															{{ number_format($prData[$i]->realisasi,0,",",".") }} (R)
														</span>
													</div>
												</div>
												<div class="col-12">
													<div class="progress progress-xs">
														<div class="progress-bar bg-warning" role="progressbar" style="width: {{ number_format(($prData[$i]->realisasi/$prData[$i]->pagu)*100,0,",",".") }}%;" aria-valuenow="{{ number_format(($prData[$i]->realisasi/$prData[$i]->pagu)*100,0,",",".") }}" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
												<div class="col-12">
													<div class="d-flex justify-content-between mt-2 mb-1 fs-xs fw-500 text-white fs-md fw-500">
														<span></span>
														<span class="d-inline-block ml-auto">{{ number_format($prData[$i]->pagu,0,",",".") }} (P)</span>
													</div>
												</div>
											</div>
										</div>
										<i class="fas fa-chart-bar position-absolute pos-right pos-bottom opacity-10 mb-n1 mr-n1" style="font-size:6rem"></i>
									</div>
								</div>
								@endfor
					
							</div>
							<div class="help-block fw-700">
								Keterangan
								<ul>
									<li>R: Realisasi</li>
									<li>P: Pagu</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="text-medium-emphasis small d-flex justify-content-between">
						<div class="d-none d-md-block" >
							<span class="text-secondary">Data: </span>
							<span class="text-muted text-truncate text-truncate-sm js-get-date"></span>
						</div>
						<div class="text-muted">
							<a href="https://spanint.kemenkeu.go.id/">Sumber: OM-SPAN</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end widget new kinerja anggaran/omspan -->
	
	<!-- widget realisasi 526-->
	<div class="col-sm-12">
		<div id="panel-3" class="panel" >
			<div class="panel-hdr">
				<h2>
					Realisasi <span class="fw-300"><i>Belanja 526</i></span>
				</h2>
				<div class="panel-toolbar">
					{{-- <a data-toggle="tooltip" title data-original-title="Detail" class="hover-effect-dot waves-effect waves-themed rounded-circle" type="button" href="">
						<i class="ni ni-action-redo"></i>
					</a> --}}
					<a href="{{ route('admin.detailbanpem') }}" data-toggle="tooltip" title data-original-title="Lihat rincian data bantuan" class="btn btn-xs btn-primary hover-effect-dot waves-effect waves-themed" type="button">Rincian</a>
				</div>
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<div class="row mb-3">
						<div class="col-lg-4 col-md-6 border-right">
							<div class="c-chart-wrapper">
								<div class="echarts" id="banpemkwn"></div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 border-right">
							<div class="c-chart-wrapper">
								<div class="echarts" id="tangentBanpem"></div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div>
								<h3 class="fw-900">Nilai Realisasi Bantuan</h3>
							</div>
							<div class="table-responsive">
								<table id="tableBanpem" class="table table-bordered table-hover table-striped w-100 caption-top">
									<caption></caption>
									<thead class="bg-primary-600">
										<tr>
											<th hidden></th>
											<th>
												Tahun
											</th>
											<th>
												Pagu
											</th>
											<th>
												Realisasi
											</th>
											<th>
												%
											</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($pbData as $d )
										<tr>
											<td hidden></td>
											<td>{{ $d->tahun }}</td>  
											<td>{{ $d->pagu }}</td>  
											<td>{{ $d->realisasi }}</td>  
											<td>{{ $d->nilai }}%</td>  
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="text-medium-emphasis small d-flex justify-content-between">
						<div class="d-none d-md-block" >
							<span class="help-block text-info">
								*Ringkasan Data sejak 3 (tiga) tahun sebelum s.d Tahun berjalan. Data dikelompokkan berdasarkan Tahun Anggaran.
							</span>
						</div>
						<div class="text-muted text-right">
							<span>Sumber Data Pagu:<a href="https://spanint.kemenkeu.go.id/">OM-SPAN</a></span><br>
							<span>Sumber Data Realisasi:<a href="http://bastbanpem.pertanian.go.id/">BASTBANPEM</a></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end widget realisasi 526-->
	
	<!-- widget gerdal opt-->
	<div class="col-12" hidden>
		<div id="panel-5" class="panel">
			<div class="panel-hdr">
				<h2>
					Kinerja <span class="fw-300"><i>Pengendalian</i></span>
				</h2>
				<div class="panel-toolbar">
					<a data-toggle="tooltip" title data-original-title="Detail" class="hover-effect-dot waves-effect waves-themed rounded-circle" type="button" href="/simpelduti">
						<i class="ni ni-action-redo"></i>
					</a>
				</div>
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<div class="row">
						<div class="col-md-6 col-sm-12 align-items-center">
							<div class="c-chart-wrapper">
								<h4>Produksi APH Nasional</h4>
								<div class="echarts" id="chartAPH"></div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 align-items-center">
							<div class="c-chart-wrapper">
								<div class="echarts" id="donutAPH" hidden></div>
								<h4 class="mb-5">Rerata Kinerja</h4>
								<div class="text-center">
									<img src="../img/circle_progress_0.svg" height="200" />
								</div>
							</div>
						</div>
					</div>
				<hr>
				<div class="row">
					<div class="col-sm-6 col-lg-3 d-flex align-items-center">
						<div class="p-2 mr-3 bg-success rounded">
							<span><i class="fal fa-map-marked-alt fa-2x text-white"></i></span>
						</div>
						<div class="border-bottom p-2">
							<label class="fs-sm mb-0">Luas Lahan (ha)</label>
							<h4 class="font-weight-bold mb-0">0.00</h4>
						</div>
					</div>
					<div class="col-sm-6 col-lg-3 d-flex align-items-center">
						<div class="p-2 mr-3 bg-success rounded">
							<span><i class="fal fa-university fa-2x text-white"></i></span>
						</div>
						<div class="border-bottom p-2">
							<label class="fs-sm mb-0">Lembaga</label>
							<h4 class="font-weight-bold mb-0">0</h4>
						</div>
					</div>
					<div class="col-sm-6 col-lg-3 d-flex align-items-center">
						<div class="p-2 mr-3 bg-success rounded">
							<span><i class="fal fa-map fa-2x text-white"></i></span>
						</div>
						<div class="border-bottom p-2">
							<label class="fs-sm mb-0">Kampung Horti</label>
							<h4 class="font-weight-bold mb-0">0</h4>
						</div>
					</div>
					<div class="col-sm-6 col-lg-3 d-flex align-items-center">
						<div class="p-2 mr-3 bg-success rounded">
							<span><i class="fal fa-users fa-2x text-white"></i></span>
						</div>
						<div class="border-bottom p-2">
							<label class="fs-sm mb-0">Kelompok</label>
							<h4 class="font-weight-bold mb-0">0</h4>
						</div>
					</div>
				</div>
				</div>
				<div class="card-footer">
					<div class="text-medium-emphasis small d-flex justify-content-between">
						<div class="d-none d-md-block" >
							<span class="text-secondary">Data: </span>
							<span class="text-muted text-truncate text-truncate-sm js-get-date"></span>
						</div>
						<div class="text-muted">
							<a href="/simpelduti">Sumber: simpel duti</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end widget gerdal opt-->
	
	<!-- widget srikandi/kampunghorti-->
	<div class="col-12" hidden>
		<div id="panel-6" class="panel">
			<div class="panel-hdr">
				<h2>
					Kampung <span class="fw-300"><i>Hortikultura</i></span>
				</h2>
				<div class="panel-toolbar">
					<a data-toggle="tooltip" title data-original-title="Detail" class="hover-effect-dot waves-effect waves-themed rounded-circle" type="button" href="/srikandi">
						<i class="ni ni-action-redo"></i>
					</a>
				</div>
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<div class="row">
						<div class="col-lg-4 col-sm-12">
							<div class="p-3 shadow-sm bg-light rounded overflow-hidden position-relative mb-g">
								<div class="">
									Kampung Horti
									<h3 class="display-4 d-block l-h-n m-0 text-primary fw-500">
										0
										<small class="d-inline m-0 l-h-n">kampung</small>
									</h3>
								</div>
								<img class="img position-absolute pos-right pos-bottom opacity-100 mb-n1 mr-n1" id="" src="../img/garden_area.png" style="width:100px;" alt="">
							</div>
						</div>
						<div class="col-lg-4 col-sm-12">
							<div class="p-3 shadow-sm bg-light rounded overflow-hidden position-relative mb-g">
								<div class="">
									Luas Lahan
									<h3 class="display-4 d-block l-h-n m-0 text-info fw-500">
										0
										<small class="d-inline m-0 l-h-n">hektar</small>
									</h3>
								</div>
								<img class="img position-absolute pos-right pos-bottom opacity-100 mb-n1 mr-n1" id="" src="../img/garden.png" style="width:100px;" alt="">
							</div>
						</div>
						<div class="col-lg-4 col-sm-12">
							<div class="p-3 shadow-sm bg-light rounded overflow-hidden position-relative mb-g">
								<div class="">
									Poktan Peserta
									<h3 class="display-4 d-block l-h-n m-0 text-success fw-500">
										0
										<small class="d-inline m-0 l-h-n">Poktan</small>
									</h3>
								</div>
								<img class="img position-absolute pos-right pos-bottom opacity-100 mb-n1 mr-n1" id="" src="../img/farmer.png" style="width:100px;" alt="">
							</div>
						</div>
						<div class="col">
							<div class="text-medium-emphasis">
								<div class="d-none d-md-block" >
									<span class="text-muted">*jumlah yang telah diregistrasi</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="text-medium-emphasis small d-flex justify-content-between">
						<div class="d-none d-md-block" >
							<span class="text-secondary">Data: </span>
							<span class="text-muted text-truncate text-truncate-sm js-get-date"></span>
						</div>
						<div class="text-muted">
							<a href="/srikandi">Sumber: App Srikandi</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end widget srikandi/kampunghorti-->
	
	<!-- widget wajib tanam-->
	<div class="col-lg-12 col-md-12" hidden>
		<div id="panel-7" class="panel">
			<div class="panel-hdr">
				<h2>
					Wajib Tanam | <span class="fw-300"><i>Bawang Putih</i></span>
				</h2>
				<div class="panel-toolbar">
					<a data-toggle="tooltip" title data-original-title="Detail" class="hover-effect-dot waves-effect waves-themed rounded-circle" type="button" href="/wajibtanam">
						<i class="ni ni-action-redo"></i>
					</a>
				</div>
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<div class="row">
						<div class="col-sm-6 col-xl-3">
							<div class="shadow p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
								<div class="">
									RIPH
									<h3 class="display-4 d-block l-h-n m-0 fw-500">
										117
										<small class="d-inline m-0 l-h-n">terbitan</small>
									</h3>
									<div class="progress progress-xs mb-2">
										<div class="progress-bar bg-primary-600" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
								<i class="fal fa-bookmark position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
							</div>
						</div>
						<div class="col-sm-6 col-xl-3">
							<div class="shadow p-3 bg-info-200 rounded overflow-hidden position-relative text-white mb-g">
								<div class="">
									Lunas Kewajiban
									<h3 class="display-4 d-block l-h-n m-0 fw-500" data-toggle="tooltip" title data-original-title="dari 117 RIPH">
										5
										<small class="d-inline m-0 l-h-n">RIPH</small>
									</h3>
									<div class="progress progress-xs mb-2" data-toggle="tooltip" title data-original-title="Tercapai: 4%">
										<div class="progress-bar bg-info-500" role="progressbar" style="width: 4%;" aria-valuenow="4" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
								<i class="fal fa-award position-absolute pos-right pos-bottom opacity-25 mb-n1 mr-n1" style="font-size:6rem"></i>
							</div>
						</div>
						<div class="col-sm-6 col-xl-3">
							<div class="shadow p-3 bg-success-200 rounded overflow-hidden position-relative text-white mb-g">
								<div class="">
									Realisasi Tanam
									<h3 class="display-4 d-block l-h-n m-0 fw-500" data-toggle="tooltip" title data-original-title="Beban Tanam: 7.236 ha">
										2.635
										<small class="d-inline m-0 l-h-n">ha</small>
									</h3>
									<div class="progress progress-xs mb-2" data-toggle="tooltip" title data-original-title="Tercapai: 36%">
										<div class="progress-bar bg-success-500" role="progressbar" style="width: 36%;" aria-valuenow="36" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<h6 class="hidden-sm-up">Beban Tanam: 7.236 ha</h6>
								</div>
								<i class="fal fa-seedling position-absolute pos-right pos-bottom opacity-25 mb-n1 mr-n1" style="font-size:6rem"></i>
							</div>
						</div>
						<div class="col-sm-6 col-xl-3">
							<div class="shadow p-3 bg-warning-400 rounded overflow-hidden position-relative text-white mb-g">
								<div class="">
									Realisasi Produksi
									<h3 class="display-4 d-block l-h-n m-0 fw-500" data-toggle="tooltip" title data-original-title="Beban Tanam: 43.416 ton">
										40.967
										<small class="d-inline m-0 l-h-n">ton</small>
									</h3>
									<div class="progress progress-xs mb-2" data-toggle="tooltip" title data-original-title="Tercapai: 94%">
										<div class="progress-bar bg-warning-700" role="progressbar" style="width: 94%;" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<h6 class="hidden-sm-up">Beban Produksi: 43.416 ton</h6>
								</div>
								<i class="fal fa-dolly position-absolute pos-right pos-bottom opacity-25 mb-n1 mr-n1" style="font-size:6rem"></i>
							</div>
						</div>
						<div class="col">
							<div class="text-medium-emphasis">
								<div class="d-none d-md-block" >
									<span class="text-muted">*data yang dilaporkan oleh pelaku usaha pemegang RIPH</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="text-medium-emphasis small d-flex justify-content-between">
						<div class="d-none d-md-block" >
							<span class="text-secondary">Data: </span>
							<span class="text-muted text-truncate text-truncate-sm js-get-date"></span>
						</div>
						<div class="text-muted">
							<a href="http://simethris.hortikultura.pertanian.go.id/">Sumber: SIMETHRIS</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end widget wajib tanam-->
	
	
	
	
</div>

@endcan

@endsection
@section('scripts')
@parent

<!-- matrix banpem kewenangan -->
<script>
	var dom = document.getElementById('banpemkwn');
	var myChart = echarts.init(dom, {
	renderer: 'svg',
	useDirtyRect: false
	});
	var app = {};

	var option;

	option = {
		title: {
		text: 'Realisasi per Kewenangan',
		subtext: '(dalam milyar rupiah)'
	},
	legend: {
		bottom: 'center',
		top:'bottom'
	},
	tooltip: {},
	dataset: {
		source: [
			['Tahun', 'KP', 'DK', 'TP-PROV', 'TP-KAB'],
			
			@for ($i=0;$i<count($banpemyear);$i++)
				[{{ $banpemyear[$i]->year }}, 
				@foreach ($databanpem as $k) 
					@if (($k->year == $banpemyear[$i]->year) && $k->kwn == 'KP')
						'{{ $k->total }}',    
					@endif
				@endforeach
				@foreach ($databanpem as $k) 
					@if (($k->year == $banpemyear[$i]->year) && $k->kwn == 'DK')
						'{{ $k->total }}',   
					@endif
				@endforeach
				@foreach ($databanpem as $k) 
					@if (($k->year == $banpemyear[$i]->year) && $k->kwn == 'TP (PROV)')
						'{{ $k->total }}',    
					@endif
				@endforeach
				@foreach ($databanpem as $k) 
					@if (($k->year == $banpemyear[$i]->year) && $k->kwn == 'TP (KAB/KOTA)')
						'{{ $k->total }}'    
					@endif
				@endforeach
				],
			@endfor
		]
	},
	xAxis: { type: 'category' },
	yAxis: {},
	// Declare several bar series, each will be mapped
	// to a column of dataset.source by default.
	series: [{ type: 'bar' }, { type: 'bar' }, { type: 'bar' }, { type: 'bar' }]
	};

	if (option && typeof option === 'object') {
	myChart.setOption(option);
	}

	window.addEventListener('resize', myChart.resize);
</script>
<!-- end matrix banpem kewenangan -->


<!-- tanget banpem -->
<script>
	var dom = document.getElementById('tangentBanpem');
	var myChart = echarts.init(dom, {
	renderer: 'canvas',
	useDirtyRect: false
	});
	var app = {};

	var option;

	option = {
	title: {
		text: 'Persentase per Tahun',
		subtext: '(dalam %)'
	},
	angleAxis: {
		max: 100,
		startAngle: 90,
		splitLine: {
		show: true
		}
	},
	radiusAxis: {
		type: 'category',
		data: [],
		z: 10
	},
	tooltip: {},
	polar: {
		radius: [30, '65%']
	},
	series: [
		@foreach ($pbData as $key => $d )
		{
		type: 'bar',
		data: [{{ $d->nilai }}],
		coordinateSystem: 'polar',
		name: '{{ $d->tahun }}',
		itemStyle: {
			borderColor: 'white',
			opacity: 0.8,
			borderWidth: 1
		}
		},
		@endforeach
	],
	legend: {
		show: true,
		bottom: 'center',
		top: 'bottom',
		data: ['2019', '2020', '2021', '2022']//this "YEAR" should be dynamic
	}
	};


	if (option && typeof option === 'object') {
	myChart.setOption(option);
	}

	window.addEventListener('resize', myChart.resize);
</script>
<!-- end tanget banpem -->
<!-- line chart Gerdal APH/simpel duti -->
<script>
	var dom = document.getElementById('chartAPH');
	var myChart = echarts.init(dom, {
	renderer: 'svg',
	useDirtyRect: false
	});
	var app = {};

	var option;

	option = {
	xAxis: {
		type: 'category',
		data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul']
	},
	yAxis: {
		type: 'value'
	},
	series: [
		{
		data: [0, 5.5, 5, 7, 10, 9.5, 11],
		type: 'line',
		smooth: true
		}
	]
	};

	if (option && typeof option === 'object') {
	myChart.setOption(option);
	}

	window.addEventListener('resize', myChart.resize);
	</script>
	<!-- end line chart Gerdal APH/simpel duti -->

	<!-- donut Gerdal APH/simpel duti -->
	<script>
	var dom = document.getElementById('donutAPH');
	var myChart = echarts.init(dom,  {
	renderer: 'svg',
	useDirtyRect: false
	});
	var app = {};

	var option;

	option = {
	title: {
		text: 'Rerata Kinerja',
		subtext:'(nilai hanya contoh)',
		left: 'left'
	},
	tooltip: {
		trigger: 'item'
	},
	series: [
		{
		name: 'Alokasi untuk:',
		type: 'pie',
		radius: ['40%', '70%'],
		avoidLabelOverlap: true,
		itemStyle: {
			borderRadius: 0,
			borderColor: '#fff',
			borderWidth: 0
		},
		label: {
			show: false,
			position: 'center'
		},
		emphasis: {
			label: {
			show: false,
			fontSize: '40',
			fontWeight: 'bold'
			}
		},
		labelLine: {
			show: false
		},
		data: [
			{ value: 0, name: 'Kinerja' },
			{ value: 1, name: 'target' }
		]
		}
	]
	};


	if (option && typeof option === 'object') {
	myChart.setOption(option);
	}

	window.addEventListener('resize', myChart.resize);
</script>
<!-- end donut Gerdal APH/simpel duti -->

<script>
	$('.carousel.carousel-multi-item.v-2 .carousel-item.active').each(function(){
  	var next = $(this).next();
	if (!next.length) {
		next = $(this).siblings(':first');
	}
  	next.children(':first-child').clone().appendTo($(this));
    
	for (var i=0;i<4;i++) {
		next=next.next();
		if (!next.length) {
		next = $(this).siblings(':first');
		}
		next.children(':first-child').clone().appendTo($(this));
	}
});
</script>


<!-- donut C3 Renja -->
<script>
	var mycolor = [];
	var mykegiatan = [];
	@foreach ($renjaData as $key => $data )
		@if ($color = sprintf("#%06x",rand(0,16777215)))
			mycolor.push('{{ $color }}');
			mykegiatan.push(["{{ $data->namakegiatan }}", {{ str_replace('.','',$data->totgiat) }}]);
			// $('#nm{ {$key+1}}').html("{ { $data->namakegiatan }}");
			// $('#tot{ $key+1}}').html("{ { $data->totgiat }}");
			// $('#pb{ {$key+1}}').css("background-color", "{ { $color }}'"); 
		@endif
	@endforeach
	
	// alert(mykegiatan);
	var chart = c3.generate({
		bindto: '#donutchart',
		data: {
			columns: [
				['rencana', 0],
				['alokasi', 100],
			],
			order: 'null',
			type : 'donut',
			onclick: function (d, i) { console.log("onclick", d, i); },
			onmouseover: function (d, i) { console.log("onmouseover", d, i); },
			onmouseout: function (d, i) { console.log("onmouseout", d, i); }
		},
		donut: {
			title: "Alokasi Anggaran"
		},
		legend: {
		show: false
		},
		color: {
			pattern : mycolor
			// pattern: [
			// 	@ foreach ($renjaData as $data )
			// 	@ if ($color = sprintf("#%06x",rand(0,16777215)))
			// 	' { { $color }}',
			// 	@ endif
			// 	@ endforeach
			// ]
		}
	});

	setTimeout(function () {
		chart.load({
			columns: 
				mykegiatan
				// @ foreach ($renjaData as $data )
				// ["{ { $data->namakegiatan }}", { { str_replace('.','',$data->totgiat) }}],
				// @ endforeach
				
			
		});
	}, 1500);

	setTimeout(function () {
		chart.unload({
			ids: 'rencana'
		});
		chart.unload({
			ids: 'alokasi'
		});
	}, 2500);


</script>


@endsection
