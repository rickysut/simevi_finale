<!-- /admin/pagu -->

@extends('layouts.admin')
@section('content')
@include('partials.subheader')
@can('pagu_access')

<style>
	
* {
  margin: 0;
  padding: 0;
}
.truncate {
  width: 250px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  resize: horizontal;
}
.echarts {
  position: relative;
  height: 100vh;
}


.table {
	border-spacing: 0 15px;
	border-collapse: separate;
}
.table thead tr th,
.table thead tr td,
.table tbody tr th,
.table tbody tr td {
	vertical-align: middle;
	border: none;
}
.table thead tr th:nth-last-child(1),
.table thead tr td:nth-last-child(1),
.table tbody tr th:nth-last-child(1),
.table tbody tr td:nth-last-child(1) {
	text-align: center;
}
.table tbody tr {
	box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
	border-radius: 5px;
}
.table tbody tr td {
	background: #fff;
}
.table tbody tr td:nth-child(1) {
	border-radius: 5px 0 0 5px;
}
.table tbody tr td:nth-last-child(1) {
	border-radius: 0 5px 5px 0;
}
</style>


<div class="row d-flex mb-3 align-items-center">
	<div class="col-md-6 col-sm-12 justify-content-start mb-3">
		<ul class="nav nav-pills flex-column flex-sm-row" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
					<i class="fas fa-home mr-1"></i>
					{{ trans('global.home') }}
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="program-tab" data-toggle="tab" href="#program" role="tab" aria-controls="program" aria-selected="false">
					<i class="fas fa-chart-pie mr-1"></i>
					{{ trans('global.kinerja_program') }}
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="kegiatan-tab" data-toggle="tab" href="#kegiatan" role="tab" aria-controls="kegiatan" aria-selected="false">
					<i class="fas fa-chart-bar mr-1"></i>
					{{ trans('global.kinerja_kegiatan') }}
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="satker-tab" data-toggle="tab" href="#satker" role="tab" aria-controls="satker" aria-selected="false">
					<i class="fas fa-list-ol mr-1"></i>
					{{ trans('global.top_10') }}
				</a>
			</li>
		</ul>
	</div>
	<!-- the change: move year selector inline to nav-pills -->
	<div class="col-sm-12 col-md-6 mb-3 ">
		<form id="fp" action="{{ route('admin.pagu') }}" method="post" class="form-group ">
			{{ csrf_field() }}
			<div class="input-group justify-content-end">
			<label class="form-label col-form-label mr-2" for="single-default">
				Select Year
			</label>
				<select class="custom-select col-md-2" id="dtYear1" name="dtYear1" >
					<option  value="">- Tahun awal -</option>
					@foreach($years as $data)
						<option  value="{{ $data->tahun }}"
						@if ($dtYear1 == $data->tahun)
							selected   
						@endif    
							>{{ $data->tahun }}</option>
					@endforeach
				</select>
				<div class="input-group-append input-group-prepend">
					<span class="input-group-text"> to </span>
				</div>
				<select class="custom-select col-md-2" id="dtYear2" name="dtYear2" >
					<option  value="">- Tahun akhir -</option>
					@foreach($years as $data)
						<option  value="{{ $data->tahun }}"
						@if ($dtYear2 == $data->tahun)
							selected   
						@endif    
							>{{ $data->tahun }}</option>
					@endforeach
				</select>
				<div class="input-group-append">
					<a class="btn btn-info text-white" type="button" onclick="fp.submit()" >{{ trans('global.view') }}</a>
				</div>
			</div>
		</form>
	</div>
</div>

<!-- Tab panes -->
<div class="tab-content">
	<!-- tab home -->
	<div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
		<div class="panel" id="panel-1">
			<div class="panel-hdr">
				<h2>
					Realisasi <span class="fw-300"><i>Nasional</i></span>
				</h2>
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<!-- Row -->
					<div class="row mb-3">
						<div class="col-lg-7 col-sm-12 align-self-center text-center">
							<div class="c-chart-wrapper">
								<div  id = "naschart" class="js-easy-pie-chart color-primary-300 position-relative d-inline-flex align-items-center justify-content-center" data-percent="{{ $prData[0]->persen }}" data-piesize="250" data-linewidth="20" data-linecap="butt" data-scalelength="7" data-toggle="tooltip" title data-original-title="Realisasi Nasional: {{ $prData[0]->persen }}%" data-placement="bottom">
									<div class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-xl">
										<span class="display-4 fw-500 text-dark">{{ $prData[0]->persen }}<sup>%</sup></span>
										<!--<span class="display-3 fw-500 js-percent d-block text-dark">97.68</span>-->
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-5 col-sm-12">
							<div class="col-12">
								<div class="shadow-1 p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
									<div class="">
										TOTAL PAGU
										<h2 class="display-5 d-block l-h-n m-0 fw-500 mb-3">
											Rp {{ $prData[0]->pagus }}
											{{-- <small class="d-inline m-0 l-h-n">rupiah</small> --}}
										</h2>
										<div class="progress progress-xs mb-2">
											<div class="progress-bar bg-primary-600" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
									<i class="fal fa-award position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
								</div>
							</div>
							<div class="col-12">
								<div class="shadow-1 p-3 bg-info-300 rounded overflow-hidden position-relative text-white mb-g">
									<div class="">
										TOTAL REALISASI
										<h2 class="display-5 d-block l-h-n m-0 fw-500 mb-3">
											Rp {{ $prData[0]->reals }}
											{{-- <small class="d-inline m-0 l-h-n">rupiah</small> --}}
										</h2>
										<div class="progress progress-xs mb-2">
											<div class="progress-bar bg-info-600" role="progressbar" style="width: 97.6%;" aria-valuenow="97.6" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
									<i class="fal fa-receipt position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<!-- the change: added % to pie value  and remove toolbar icon -->
						<!--
							nilai capaian (%) diperoleh dari:
							Total Realisasi (per kewenangan) dibagi Total Realisasi Nasional
						-->
					<div class="row row-grid no-gutters">
						<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
							<div class="text-left ml-2">Kantor Pusat</div>
							<div id="kppiechart" class="px-3 py-2 d-flex align-items-center">
								<div  class="js-easy-pie-chart color-primary-600 position-relative d-flex align-items-center justify-content-center" data-percent="{{ $prData[0]->persenkp }}" data-piesize="80" data-linewidth="10" data-trackcolor="#ccbfdf" data-scalelength="0">
									<div class="position-absolute pos-top pos-left pos-right pos-bottom d-flex align-items-center justify-content-center fw-500 fs-xl text-dark kppie">{{ $prData[0]->persenkp }}%</div>
								</div>
								<div class="ml-auto d-inline-flex align-items-center">
									<div class="d-inline-flex flex-column small ml-2">
										
										<span class="fs-sm d-inline-block badge bg-success-50 color-fusion-900 text-right p-1 width-50 mt-1" data-toggle="tooltip" title data-original-title="Pagu">
											Rp {{ $prData[0]->KP_PAGU }}
										</span>
										<span class="fs-md d-inline-block badge badge-info text-right p-1 width-20" data-toggle="tooltip" title data-original-title="Realisasi">
											Rp {{ $prData[0]->KP_REAL }}
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
							<div class="text-left ml-2">Dekonsentrasi</div>
							<div id="dkpiechart" class="px-3 py-2 d-flex align-items-center">
								<div class="js-easy-pie-chart color-success-600 position-relative d-flex align-items-center justify-content-center" data-percent="{{ $prData[0]->persendk }}" data-piesize="80" data-linewidth="10" data-trackcolor="#7aece0" data-scalelength="0">
									<div class="position-absolute pos-top pos-left pos-right pos-bottom d-flex align-items-center justify-content-center fw-500 fs-xl text-dark dkpie">{{ $prData[0]->persendk }}%</div>
									{{-- <div class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-xl">
										<span class="js-percent d-block text-dark">100</span>
									</div> --}}
								</div>
								<div class="ml-auto d-inline-flex align-items-center">
									<div class="d-inline-flex flex-column small ml-2">
										
										<span class="fs-sm d-inline-block badge bg-success-50 color-fusion-900 text-right p-1 width-50 mt-1" data-toggle="tooltip" title data-original-title="Pagu">
											Rp {{ $prData[0]->DK_PAGU }}
										</span>
										<span class="fs-md d-inline-block badge badge-danger text-right p-1 width-20" data-toggle="tooltip" title data-original-title="Realisasi">
											Rp {{ $prData[0]->DK_REAL }}
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
							<div class="text-left ml-2">Tugas Pembantuan</div>
							<div id="tppiechart" class="px-3 py-2 d-flex align-items-center">
								<div  class="js-easy-pie-chart color-warning-600 position-relative d-flex align-items-center justify-content-center" data-percent="{{ $prData[0]->persentp }}" data-piesize="80" data-linewidth="10" data-trackcolor="#ffebc1" data-scalelength="0">
									<div class="position-absolute pos-top pos-left pos-right pos-bottom d-flex align-items-center justify-content-center fw-500 fs-xl text-dark tppie">{{ $prData[0]->persentp }}%</div>
									{{-- <div class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-xl">
										<span class="js-percent d-block text-dark">100</span>
									</div> --}}
								</div>
								<div class="ml-auto d-inline-flex align-items-center">
									<div class="d-inline-flex flex-column small ml-2">
										
										<span class="fs-sm d-inline-block badge bg-success-50 color-fusion-900 text-right p-1 width-50 mt-1" data-toggle="tooltip" title data-original-title="Pagu">
											Rp {{ $prData[0]->TP_PAGU }}
										</span>
										<span class="fs-md d-inline-block badge badge-warning text-right p-1 width-20" data-toggle="tooltip" title data-original-title="Realisasi">
											Rp {{ $prData[0]->TP_REAL }}
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- tab program.
		The change: add % to the pie value
		
		nilai capaian (%) diperoleh dari:
		Total Realisasi (per program) dibagi Total Pagu (per program)
	-->
	
	<div class="tab-pane" id="program" role="tabpanel" aria-labelledby="home-tab">
		<div class="row d-flex">
			{{-- start loop  --}}
			@foreach ($programData as $data)
				<div class="col-lg-4">
					<div class="panel" id="panel-2">
						<div class="panel-hdr">
							<h2>
								<i class="fw-300">Kode Program: </i><span class="fw-500"> {{ $data->kode1 }}</span>
							</h2>
						</div>
						<div class="panel-container show">
							<div class="panel-content" style="height: 30em">
								<h5 class="fw-500 mb-3">{{ $data->deskripsi }}</h5>
								<!-- Row -->
								<div class="row mb-5">
									<div class="col-12 align-self-center text-center">
										<div class="c-chart-wrapper">
											<div class="js-easy-pie-chart color-primary-300 position-relative d-inline-flex align-items-center justify-content-center" data-percent="{{ $data->persen }}" data-piesize="200" data-linewidth="20" data-scalelength="7">
												<div class="display-4 position-absolute pos-top pos-left pos-right pos-bottom d-flex align-items-center justify-content-center fw-500 text-dark">{{ $data->persen }}%</div>
											</div>
										</div>
									</div>
								</div>
								<hr>
								<div class="row mb-5">
									<div class="align-items-center">
										<div class="d-inline-flex flex-column ml-2">
											<span class="fs-md d-inline-block p-1 width-50 mt-1" >Pagu</span>
											<span class="fs-md d-inline-block p-1 width-20" >Realisasi</span>
											
										</div>
									</div>
									<div class="ml-auto d-inline-flex align-items-center">
										<div class="d-inline-flex flex-column ml-2 mr-2">
											<span class="fs-md d-inline-block badge bg-fusion-50 text-white text-right p-1 width-20 mt-1">Rp {{ $data->totpagu }}</span>
											<span class="fs-md d-inline-block badge badge-primary text-white text-right p-1 width-20">Rp {{ $data->totrealisasi }}</span>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			@endforeach
				
			{{-- end loop --}}
		</div>
	</div>
		
	<!--
		tab kegiatan
		TIDAK DIGUNAKAN/HIDDEN/HAPUS/BUANG
	-->
	<div class="tab-pane" id="kegiatan" role="tabpanel" aria-labelledby="home-tab">
		<div class="row d-flex">
			<!-- STO -->
			<div class="col-md-6">
				<div id="panel-5" class="panel">
					<div class="panel-hdr">
						<h2 data-toggle="tooltip" title data-original-title="Realisasi Anggaran Kegiatan per Triwulan">
							<span class="">Realisasi Anggaran Kegiatan per Triwulan</span>
						</h2>
					</div>
					<div class="panel-container show">
						<div class="panel-content poisition-relative">
							<div class="col">
								<div class="p-1 pos-left pos-top mr-3 z-index-cloud d-flex align-items-center justify-content-center">
									<!--
										model 2 Barchart Triwulan
										#Nilai Pie (%) diperoleh dari:
											Total Realisasi dibagi Total Pagu
									-->
									<div class="py-2 pr-4 mr-3">
										<div class="js-easy-pie-chart color-primary-400 position-relative d-inline-flex align-items-center justify-content-center" data-percent="{{ $prData[0]->persen }}" data-piesize="95" data-linewidth="10" data-scalelength="5">
											<div class="position-absolute pos-top pos-left pos-right pos-bottom d-flex align-items-center justify-content-center fw-500 fs-xl text-dark">{{ $prData[0]->persen }}%</div>
										</div>
									</div>			
									<!--
										#Nilai dibawah ini diperoleh dari Total Realisasi Nasional
									-->
									<div class="text-right fw-500 l-h-n d-flex flex-column hidden-sm-down">
											<div class="h3 m-0 d-flex align-items-center justify-content-end">
												<div class='icon-stack mr-2'>
													<i class="base base-7 icon-stack-3x opacity-100 color-primary-600"></i>
													<i class="base base-7 icon-stack-2x opacity-100 color-primary-200"></i>
													<i class="fas fa-coins icon-stack-1x opacity-100 color-white"></i>
												</div>
												Rp {{ $prData[0]->pagus }}
											</div>
											<div class="h3 m-0 d-flex align-items-center justify-content-end">
												<div class='icon-stack mr-2'>
													<i class="base base-7 icon-stack-3x opacity-100 color-info-600"></i>
													<i class="base base-7 icon-stack-2x opacity-100 color-info-200"></i>
													<i class="fas fa-coins icon-stack-1x opacity-100 color-white"></i>
												</div>
												Rp {{ $prData[0]->reals }}
											</div>
											<span class="m-0 fs-xs text-muted" hidden>Increased Profit as per redux margins and estimates</span>
										</div>
									
								</div>
								<div id="tw1234" style="width:100%; height:250px;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-md-6" style="height: 300px">
				<!--
					model 2 Barchart Triwulan
					#Nilai Capaian (Rp) diperoleh dari:
						Total Realisasi per kegiatan (kode kegiatan) secara nasional
					#Nilai capaian (%) diperoleh dari:
						Total Realisasi (per kegiatan) dibagi Total Pagu (per kegiatan)
				-->
				<div id="panel-6" class="panel">
					<div class="panel-hdr">
						<h2 data-toggle="tooltip" title data-original-title="Realisasi Anggaran Kegiatan per Triwulan">
							<span>Realisasi Anggaran per Kegiatan</span>
						</h2>
					</div>
					<div class="panel-container show">
						<div class="panel-content">
							
							@foreach ($barData as $data)
								@if ($color = sprintf("#%06x",rand(0,16777215)))
								<div class="d-flex mt-2 mb-1 fs-xs text-primary"  >
									<span style="max-width: 350px;"> {{ $data->namakegiatan }} </span>
									<span class="d-inline-block ml-auto justify-content-end">{{ $data->amount }} | {{ $data->tw1 }}%</span>
								</div>
								<div class="progress progress-xs mb-3">
									<div class="progress-bar" style="background-color : {{ $color }}; width: {{ $data->tw1 }}%;" role="progressbar"  aria-valuenow="{{ $data->tw1 }}" aria-valuemin="0" aria-valuemax="100"></div>
								</div>	
								@endif
							@endforeach
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- tab top 10 -->
	<div class="tab-pane" id="satker" role="tabpanel" aria-labelledby="home-tab">
		<div class="row d-flex align-items-center ">
			<!--
				The Change: this 1st rank will be shown on first row only on mobile			-->
			{{-- <div class="col-lg-4 hidden-sm-up">
				<div class="panel" id="panel-7">
					<div class="card-header text-center text-align-items-center bg-primary-500 bg-info-gradient">
						<!--
							#Nilai capaian (%) dibawah ini diperoleh dari:
								Total Realisasi (per satker) dibagi Total Pagu (per satker)
						-->
						<h2 class="fw-500">
							{{ $topData[0]->persen }}
						</h2>
					</div>
					<div class="panel-container card-body text-center show">
						<div class="panel-content">
							<!-- Row -->
							<div class="row text-center">
								<div class="col-12">
									<div class="mb-3">
										<h3 class="fw-500">{{ $topData[0]->kodesatker }}</h3>
									</div>
									<div class="">
										<div class="text-center">
											<i class="fal fa-award fa-6x text-warning mb-5"></i>
											<h4 class="fw-700 mb-0 text-truncate text-truncate-xl" data-toggle="tooltip" title data-original-title="{{ $topData[0]->namasatker }}">{{ $topData[0]->namasatker }}</h4>
											<p class="text-muted mb-0">Rp. {{ $topData[0]->realisasi }}</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end 1st rank for mobile -->
			<div class="col-lg-4">
				<div class="panel" id="panel-7">
					<div class="card-header text-center text-align-items-center bg-fusion-200 bg-info-gradient">
						<h2 class="fw-500">
							{{ $topData[2]->persen }}
						</h2>
					</div>
					<div class="panel-container card-body text-center show">
						<div class="panel-content">
							<!-- Row -->
							<div class="row text-center">
								<div class="col-12">
									<div class="mb-3">
										<h4 class="fw-500">{{ $topData[2]->kodesatker }}</h4>
									</div>
									<div class="">
										<div class="text-center">
											<i class="fal fa-award fa-3x mb-5"></i>
											<h5 class="mb-0 text-truncate text-truncate-xl" data-toggle="tooltip" title data-original-title="{{ $topData[2]->namasatker }}">{{ $topData[2]->namasatker }}</h5>
											<p class="text-muted mb-0">Rp. {{ $topData[2]->realisasi }}</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- this 1st rank will be shown on middle column only on large screen -->
			<div class="col-lg-4 hidden-md-down">
				<div class="panel" id="panel-7">
					<div class="card-header text-center text-align-items-center bg-warning-600 bg-fusion-gradient">
						<h2 class="fw-500">
							{{ $topData[0]->persen }}
						</h2>
					</div>
					<div class="panel-container card-body text-center show">
						<div class="panel-content">
							<!-- Row -->
							<div class="row text-center">
								<div class="col-12">
									<div class="mb-3">
										<h3 class="fw-500">{{ $topData[0]->kodesatker }}</h3>
									</div>
									<div class="">
										<div class="text-center">
											<i class="fal fa-award fa-6x text-warning mb-5"></i>
											<h4 class="fw-700 mb-0 text-truncate text-truncate-xl" data-toggle="tooltip" title data-original-title="{{ $topData[0]->namasatker }}">{{ $topData[0]->namasatker }}</h4>
											<p class="text-muted mb-0">Rp. {{ $topData[0]->realisasi }}</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end 1st rank for large screen -->
			<div class="col-lg-4">
				<div class="panel" id="panel-7">
					<div class="card-header text-center text-align-items-center bg-gray-200 bg-fusion-gradient">
						<h2 class="fw-500">
							{{ $topData[1]->persen }}
						</h2>
					</div>
					<div class="panel-container card-body text-center show">
						<div class="panel-content">
							<!-- Row -->
							<div class="row text-center">
								<div class="col-12">
									<div class="mb-3">
										<h4 class="fw-500">{{ $topData[1]->kodesatker }}</h4>
									</div>
									<div class="">
										<div class="text-center">
											<i class="fal fa-award fa-3x mb-5"></i>
											<h5 class="mb-0 text-truncate text-truncate-xl" data-toggle="tooltip" title data-original-title="{{ $topData[1]->namasatker }}">{{ $topData[1]->namasatker }}</h5>
											<p class="text-muted mb-0">Rp. {{ $topData[1]->realisasi }}</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> --}}
			{{-- <div class="col-12 mt-5">
				<h2 class="fw-500 mb-0"> Top 10 </h2>
				<hr class="mb-2">
			</div> --}}
			
			<div class="col-lg-12">
				<div class="table dataTables_wrapper dt-bootstrap4">
					<table class="table table-bordered table-striped table-hover datatable datatable-satkerRank w-100">
						<thead  class="bg-primary-50">
							<tr>
								<th style="vertical-align : middle; display:none;"></th>
								<th>Kode Satker</th>
								<th>Nama Satker</th>
								<th>Pagu</th>
								<th>Realisasi</th>
								<th>%</th>
								<th style="vertical-align : middle; display:none;"></th>
								
							</tr>
						</thead>
						<tbody>
							@foreach ($topData as $data )
								<tr data-toggle="tooltip" title data-original-title="{{ $data->namasatker }}">
									<td style="vertical-align : middle; display:none;"></td>
									<td>{{ $data->kodesatker }}</td>
									<td>
										<div class="d-flex align-items-baseline">
											<span class="truncate hidden-md-up">{{ $data->namasatker }}</span>
											<span class="hidden-md-down">{{ $data->namasatker }}</span>
										</div>
									</td>
									<td>{{ $data->pagu }}</td>
									<td>{{ $data->realisasi }}</td>
									<td>{{ $data->persen }}%</td>
									<td style="vertical-align : middle; display:none;"></td>
								</tr>									
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			{{-- <div class="col-12 mt-5">
				<h2 class="fw-500 mb-0 text-muted"> Bottom 10 </h2>
				<hr class="mb-2">
			</div>
			<div class="col-lg-12">
				<div class="table table-responsive">
					<table class="table">
						<thead class="bg-warning-500 bg-danger-gradient text-white">
							<tr>
								<th>Kode Satker</th>
								<th>Nama Satker</th>
								<th>Pagu</th>
								<th>Realisasi</th>
								<th>%</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($lowData as $data )
								<tr data-toggle="tooltip" title data-original-title="{{ $data->namasatker }}">
									<td>{{ $data->kodesatker }}</td>
									<td>
										<div class="d-flex align-items-baseline">
											<span class="truncate hidden-md-up">{{ $data->namasatker }}</span>
											<span class="hidden-md-down">{{ $data->namasatker }}</span>
										</div>
									</td>
									<td>{{ $data->pagu }}</td>
									<td>{{ $data->realisasi }}</td>
									<td>{{ $data->persen }}%</td>
								</tr>									
							@endforeach
						</tbody>
					</table>
				</div>
			</div> --}}
		</div>
	</div>
</div>



@endcan
@endsection
@section('scripts')
@parent
<!-- C3 omspan model 2 -->
<script>



$(document).ready(function()
{


var barTW = c3.generate(
{
	bindto: "#tw1234",
	data:
	{	
		columns: [
			['TW1',
			@foreach ($twData as $k) 
                {{ $k->tw1 }},    
            @endforeach
			],
			['TW2',
			@foreach ($twData as $k) 
                {{ $k->tw2 }},    
            @endforeach
			],
			['TW3',
			@foreach ($twData as $k) 
                {{ $k->tw3 }},    
            @endforeach
			],
			['TW4',
			@foreach ($twData as $k) 
                {{ $k->tw4 }},    
            @endforeach
			]
		],
		
		type: 'bar'
	},
	legend: {
	  show: true
	},
	color:
	{
		pattern: ['#886ab5','#2196F3','#1dc9b7','#ffc241']
	},
	axis: {
		x: {
			type: 'category',
			categories: 
			[
			@foreach ($twData as $k) 
                "{{ $k->kode1 }}",    
            @endforeach
			]
		},
		y:{
			show: true
		}
	},
	bar:
	{
		width:
		{
			ratio: 0.8 // this makes bar width 50% of length between ticks
		},
		space: 0.25
		// or
		//width: 100 // this makes bar width 100px
	}
});


$('a[data-toggle=tab]').on('shown.bs.tab', function() {
	barTW.flush();
});




	let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

    $.extend(true, $.fn.dataTable.defaults, {
    	orderCellsTop: true,
    	order: [[ 5, 'desc' ]],
    	pageLength: 10
		
    
  	});
  	let table = $('.datatable-satkerRank:not(.ajaxTable)').DataTable({buttons: [dtButtons]});
	$('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
		$($.fn.dataTable.tables(true)).DataTable()
			.columns.adjust();
	});
  
})

</script>
@endsection