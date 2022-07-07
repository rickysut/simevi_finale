@extends('layouts.admin')
@section('content')
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
</style>
<div class="subheader">
	<h1 class="subheader-title">
		<i class='subheader-icon fal fa-chart-area'></i> {{ $breadcrumb ?? '' }}
		<small>
		</small>
	</h1>
	<div class="subheader-block d-lg-flex align-items-center">
		<div class="d-inline-flex flex-column justify-content-center mr-3 text-right" data-toggle="tooltip" title data-original-title="waktu terakhir data diperbaharusi">
			<span class="fw-300 fs-xs d-block opacity-50">
				<small>Terakhir diperbaharui</small>
			</span>
			<span class="fw-500 fs-xl d-block color-danger-500">
				<span class="text-muted text-truncate text-truncate-sm js-get-date"></span>
		</div>
		<span class="sparklines hidden-xl-down" sparkType="bar" sparkBarColor="#886ab5" sparkHeight="32px" sparkBarWidth="5px" values="3,4,3,6,7,3,3,6,2,6,4"></span>
	</div>
</div>

<div class="row d-flex justify-content-end mb-3">
	<div class="col-md-7 col-sm-12">
		<ul class="nav nav-pills " id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
					<i class="fas fa-home mr-1"></i>
					Home
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="program-tab" data-toggle="tab" href="#program" role="tab" aria-controls="program" aria-selected="false">
					<i class="fas fa-chart-pie mr-1"></i>
					Kinerja Program
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="kegiatan-tab" data-toggle="tab" href="#kegiatan" role="tab" aria-controls="kegiatan" aria-selected="false">
					<i class="fas fa-chart-bar mr-1"></i>
					Kinerja Kegiatan
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="satker-tab" data-toggle="tab" href="#satker" role="tab" aria-controls="satker" aria-selected="false">
					<i class="fas fa-list-ol mr-1"></i>
					Top 10 Satker
				</a>
			</li>
		</ul>
	</div>
	<div class="col-md-5 col-sm-12 pos-end">
		<form class="form-inline my-2 my-lg-0">
			<select class="custom-select">
				<option class="text-muted" hidden="">Pilih Tahun Anggaran</option>
				<option disabled=""></option>
				<option>2021</option>
				<option>2022</option>
			</select>
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
								<div class="js-easy-pie-chart color-primary-300 position-relative d-inline-flex align-items-center justify-content-center" data-percent="97.68" data-piesize="250" data-linewidth="20" data-linecap="butt" data-scalelength="7" data-toggle="tooltip" title data-original-title="Realisasi Nasional: 97.68%" data-placement="bottom">
									<div class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-xl">
										<span class="display-4 fw-500 text-dark">97.68<sup>%</sup></span>
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
											625.187.029.000
											<small class="d-inline m-0 l-h-n">rupiah</small>
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
											610.695.580.823
											<small class="d-inline m-0 l-h-n">rupiah</small>
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
					<div class="row row-grid no-gutters">
						<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-3">
							<span class="hidden-sm-up fw-500">Kantor Pusat</span>
							<div class="px-3 py-2 d-flex align-items-center">
								<div class="js-easy-pie-chart color-info-300 position-relative d-inline-flex align-items-center justify-content-center" data-percent="98%" data-piesize="50" data-linewidth="5" data-linecap="butt" data-scalelength="0" data-toggle="tooltip" title data-original-title="Realisasi Kantor Pusat: 98%">
									<div class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-lg">
										<span class="js-percent fw-500 d-block text-dark">98</span>
									</div>
								</div>
								<span class="hidden-sm-down d-inline-block fs-md ml-2 text-muted" data-toggle="tooltip" title data-original-title="Kantor Pusat">
									KP
								</span>
								<div class="ml-auto d-inline-flex align-items-center">
									<div class="d-inline-flex flex-column small ml-2">
										<span class="fs-md d-inline-block badge badge-info text-right p-1 width-20" data-toggle="tooltip" title data-original-title="Realisasi">380.848.357.428</span>
										<span class="fs-sm d-inline-block badge bg-success-50 color-fusion-900 text-right p-1 width-50 mt-1" data-toggle="tooltip" title data-original-title="Pagu">Rp Rp 387.850.098.000</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-3">
							<span class="hidden-sm-up fw-500">Dekonsentrasi</span>
							<div class="px-3 py-2 d-flex align-items-center">
								<div class="js-easy-pie-chart color-danger-300 position-relative d-inline-flex align-items-center justify-content-center" data-percent="96" data-piesize="50" data-linewidth="5" data-linecap="butt" data-scalelength="0" data-toggle="tooltip" title data-original-title="Realisasi Dekonsentrasi: 96%">
									<div class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-lg">
										<span class="js-percent fw-500 d-block text-dark">96</span>
									</div>
								</div>
								<span class="hidden-sm-down d-inline-block fs-md ml-2 text-muted" data-toggle="tooltip" title data-original-title="Dekonsentrasi">
									DK
								</span>
								<div class="ml-auto d-inline-flex align-items-center">
									<div class="d-inline-flex flex-column small ml-2">
										<span class="fs-md d-inline-block badge badge-danger text-right p-1 width-20" data-toggle="tooltip" title data-original-title="Realisasi">Rp 105.151.968.326</span>
										<span class="fs-sm d-inline-block badge bg-success-50 color-fusion-900 text-right p-1 width-50 mt-1" data-toggle="tooltip" title data-original-title="Pagu">Rp 109.180.389.000</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
							<span class="hidden-sm-up fw-500">Tugas Pembantuan</span>
							<div class="px-3 py-2 d-flex align-items-center">
								<div class="js-easy-pie-chart color-warning-300 position-relative d-inline-flex align-items-center justify-content-center" data-percent="97" data-piesize="50" data-linewidth="5" data-linecap="butt" data-scalelength="0" data-toggle="tooltip" title data-original-title="Realisasi Tugas Pembantuan: 97%">
									<div class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-lg">
										<span class="js-percent fw-500 d-block text-dark">97</span>
									</div>
								</div>
								<span class="hidden-sm-down d-inline-block fs-md ml-2 text-muted" data-toggle="tooltip" title data-original-title="Tugas Pembantuan">
									TP
								</span>
								<div class="ml-auto d-inline-flex align-items-center">
									<div class="d-inline-flex flex-column ml-2">
										<span class="fs-md d-inline-block badge badge-warning text-white text-right p-1 width-20" data-toggle="tooltip" title data-original-title="Realisasi">Rp 124.695.255.069</span>
										<span class="fs-sm d-inline-block badge bg-success-50 color-fusion-900 text-right p-1 width-50 mt-1" data-toggle="tooltip" title data-original-title="Pagu">Rp 128.156.542.000</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- tab program -->
	<div class="tab-pane" id="program" role="tabpanel" aria-labelledby="home-tab">
		<div class="row d-flex">
			<div class="col-lg-4">
				<div class="panel" id="panel-2">
					<div class="panel-hdr">
						<h2>
							<i class="fw-300">Kode Program: </i><span class="fw-500"> EC</span>
						</h2>
					</div>
					<div class="panel-container show">
						<div class="panel-content">
							<h5 class="fw-500 mb-3">Nilai Tambah dan Daya Saing Industri</h5>
							<!-- Row -->
							<div class="row mb-5">
								<div class="col-12 align-self-center text-center">
									<div class="c-chart-wrapper">
										<div class="js-easy-pie-chart color-primary-300 position-relative d-inline-flex align-items-center justify-content-center" data-percent="98.21" data-piesize="200" data-linewidth="20" data-linecap="button" data-scalelength="7" data-toggle="popover" data-trigger="hover" title data-original-title="Nilai Tambah dan Daya Saing Industri" data-content="Realisasi: 98.21%" data-placement="top" data-template='<div class="popover opacity-90 bg-primary-900 border-primary" role="tooltip"><div class="arrow"></div><h3 class="popover-header bg-transparent"></h3><div class="popover-body text-white"></div></div>'>
											<div class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-xl">
												<span class="display-3 fw-500 js-percent d-block text-dark">98.21</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<hr>
							<div class="row mb-5">
								<div class="align-items-center">
									<div class="d-inline-flex flex-column ml-2">
										<span class="fs-md d-inline-block p-1 width-20" >Realisasi</span>
										<span class="fs-md d-inline-block p-1 width-50 mt-1" >Pagu</span>
									</div>
								</div>
								<div class="ml-auto d-inline-flex align-items-center">
									<div class="d-inline-flex flex-column ml-2 mr-2">
										<span class="fs-md d-inline-block badge badge-primary text-white text-right p-1 width-20">Rp 79.307.738.405</span>
										<span class="fs-md d-inline-block badge bg-fusion-50 text-white text-right p-1 width-20 mt-1">Rp 80.756.722.000</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="panel" id="panel-3">
					<div class="panel-hdr">
						<h2>
							<i class="fw-300">Kode Program: </i><span class="fw-500"> HA</span>
						</h2>
					</div>
					<div class="panel-container show">
						<div class="panel-content">
							<h5 class="fw-500 mb-3 inline-block text-truncate truncate-sm">Ketersediaa Akses dan Konsumsi Pangan Berkualitas</h5>
							<!-- Row -->
							<div class="row mb-5">
								<div class="col-12 align-self-center text-center">
									<div class="c-chart-wrapper">
										<div class="js-easy-pie-chart color-info-300 position-relative d-inline-flex align-items-center justify-content-center" data-percent="97.64" data-piesize="200" data-linewidth="20" data-linecap="button" data-scalelength="7" data-toggle="popover" data-trigger="hover" title data-original-title="Ketersediaan Akses dan Konsumsi Pangan Berkualitas" data-content="Realisasi: 97.64%" data-placement="top" data-template='<div class="popover opacity-90 bg-info-900 border-info" role="tooltip"><div class="arrow"></div><h3 class="popover-header bg-transparent"></h3><div class="popover-body text-white"></div></div>'>
											<div class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-xl">
												<span class="display-3 fw-500 js-percent d-block text-dark">97.64</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<hr>
							<div class="row mb-5">
								<div class="align-items-center">
									<div class="d-inline-flex flex-column ml-2">
										<span class="fs-md d-inline-block p-1 width-20" >Realisasi</span>
										<span class="fs-md d-inline-block p-1 width-50 mt-1" >Pagu</span>
									</div>
								</div>
								<div class="ml-auto d-inline-flex align-items-center">
									<div class="d-inline-flex flex-column ml-2 mr-2">
										<span class="fs-md d-inline-block badge badge-info text-white text-right p-1 width-20" >Rp 425.539.364.432</span>
										<span class="fs-md d-inline-block badge bg-fusion-50 text-white text-right p-1 width-20 mt-1">Rp 435.819.591.000</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="panel" id="panel-4">
					<div class="panel-hdr">
						<h2>
							<i class="fw-300">Kode Program: </i><span class="fw-500"> WA</span>
						</h2>
					</div>
					<div class="panel-container show">
						<div class="panel-content">
							<h5 class="fw-500 mb-3">Dukungan Manajemen</h5>
							<!-- Row -->
							<div class="row mb-5">
								<div class="col-12 align-self-center text-center">
									<div class="c-chart-wrapper">
										<div class="js-easy-pie-chart color-success-300 position-relative d-inline-flex align-items-center justify-content-center" data-percent="97.46" data-piesize="200" data-linewidth="20" data-linecap="button" data-scalelength="7" data-toggle="popover" data-trigger="hover" title data-original-title="Dukungan Manajemen" data-content="Realisasi: 97.46%" data-placement="top" data-template='<div class="popover opacity-90 bg-success-900 border-success" role="tooltip"><div class="arrow"></div><h3 class="popover-header bg-transparent"></h3><div class="popover-body text-white"></div></div>'>
											<div class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-xl">
												<span class="display-3 fw-500 js-percent d-block text-dark">97.46</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<hr>
							<div class="row mb-5">
								<div class="align-items-center">
									<div class="d-inline-flex flex-column ml-2">
										<span class="fs-md d-inline-block p-1 width-20" >Realisasi</span>
										<span class="fs-md d-inline-block p-1 width-50 mt-1" >Pagu</span>
									</div>
								</div>
								<div class="ml-auto d-inline-flex align-items-center">
									<div class="d-inline-flex flex-column ml-2 mr-2">
										<span class="fs-md d-inline-block badge badge-success text-white text-right p-1 width-20" >Rp 105.848.477.986</span>
										<span class="fs-md d-inline-block badge bg-fusion-50 text-white text-right p-1 width-50 mt-1" >Rp 108.610.716.000</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		
	<!-- tab kegiatan -->
	<div class="tab-pane" id="kegiatan" role="tabpanel" aria-labelledby="home-tab">
		<div class="row d-flex">
			<!-- STO -->
			<div class="col-md-6">
				<div id="panel-5" class="panel panel-locked" data-panel-sortable data-panel-collapsed data-panel-close>
					<div class="panel-hdr">
						<h2 data-toggle="tooltip" title data-original-title="Realisasi Anggaran Kegiatan per Triwulan">
							<span class="">Realisasi Anggaran Kegiatan per Triwulan Model 1</span>
						</h2>
					</div>
					<div class="panel-container show">
						<div class="panel-content poisition-relative">
							<div class="col">
								<div class="p-1 pos-left pos-top mr-3 z-index-cloud d-flex align-items-center justify-content-center">
									<div class="py-2 pr-4 mr-3">
										<div class="js-easy-pie-chart color-primary-400 position-relative d-inline-flex align-items-center justify-content-center" data-percent="97.68" data-piesize="95" data-linewidth="10" data-scalelength="5">
											<div class="position-absolute pos-top pos-left pos-right pos-bottom d-flex align-items-center justify-content-center fw-500 fs-xl text-dark">97.68%</div>
										</div>
									</div>
									<div class="text-right fw-500 l-h-n d-flex flex-column hidden-sm-down">
											<div class="h3 m-0 d-flex align-items-center justify-content-end">
												<div class='icon-stack mr-2'>
													<i class="base base-7 icon-stack-3x opacity-100 color-primary-600"></i>
													<i class="base base-7 icon-stack-2x opacity-100 color-primary-200"></i>
													<i class="fas fa-coins icon-stack-1x opacity-100 color-white"></i>
												</div>
												Rp 610.695.580.823
											</div>
											<span class="m-0 fs-xs text-muted" hidden>Increased Profit as per redux margins and estimates</span>
										</div>
									
								</div>
								<div id="twSTO" style="width:100%; height:250px;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- model 2 -->
			<div class="col-md-6">
				<div id="panel-5" class="panel panel-locked" data-panel-sortable data-panel-collapsed data-panel-close>
					<div class="panel-hdr">
						<h2 data-toggle="tooltip" title data-original-title="Realisasi Anggaran Kegiatan per Triwulan">
							<span class="">Realisasi Anggaran Kegiatan per Triwulan Model 2</span>
						</h2>
					</div>
					<div class="panel-container show">
						<div class="panel-content poisition-relative">
							<div class="col">
								<div class="p-1 pos-left pos-top mr-3 z-index-cloud d-flex align-items-center justify-content-center">
									<div class="py-2 pr-4 mr-3">
										<div class="js-easy-pie-chart color-primary-400 position-relative d-inline-flex align-items-center justify-content-center" data-percent="97.68" data-piesize="95" data-linewidth="10" data-scalelength="5">
											<div class="position-absolute pos-top pos-left pos-right pos-bottom d-flex align-items-center justify-content-center fw-500 fs-xl text-dark">97.68%</div>
										</div>
									</div>
									<div class="text-right fw-500 l-h-n d-flex flex-column hidden-sm-down">
											<div class="h3 m-0 d-flex align-items-center justify-content-end">
												<div class='icon-stack mr-2'>
													<i class="base base-7 icon-stack-3x opacity-100 color-primary-600"></i>
													<i class="base base-7 icon-stack-2x opacity-100 color-primary-200"></i>
													<i class="fas fa-coins icon-stack-1x opacity-100 color-white"></i>
												</div>
												Rp 610.695.580.823
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
			
			<div class="col-md-5">
				<div id="panel-6" class="panel panel-locked" data-panel-sortable data-panel-collapsed data-panel-close>
					<div class="panel-hdr">
						<h2 data-toggle="tooltip" title data-original-title="Realisasi Anggaran Kegiatan per Triwulan">
							<span class="text-truncate text-truncate-lg">Realisasi Anggaran per Kegiatan</span>
						</h2>
					</div>
					<div class="panel-container show">
						<div class="panel-content poisition-relative">
							<div class="d-flex mt-2 mb-1 fs-xs text-primary">
								Sayuran dan Tanaman Obat
								<span class="d-inline-block ml-auto">125.744.204.088 | 98.67%</span>
							</div>
							<div class="progress progress-xs mb-3">
								<div class="progress-bar bg-primary" role="progressbar" style="width: 98.67%;" aria-valuenow="98.67" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<div class="d-flex mt-2 mb-1 fs-xs text-info">
								Perlindungan Hortikultura
								<span class="d-inline-block ml-auto">38.758.167.264 | 99.24%</span>
							</div>
							<div class="progress progress-xs mb-3">
								<div class="progress-bar bg-info" role="progressbar" style="width: 99.24%;" aria-valuenow="99.24" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<div class="d-flex mt-2 mb-1 fs-xs text-warning">
								Sekretariat Direktorat Jenderal Hortikultura
								<span class="d-inline-block ml-auto">105.848.477.986 | 97.46%</span>
							</div>
							<div class="progress progress-xs mb-3">
								<div class="progress-bar bg-warning" role="progressbar" style="width: 97.46%;" aria-valuenow="97.46" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<div class="d-flex mt-2 mb-1 fs-xs text-danger">
								Perbenihan Hortikultura
								<span class="d-inline-block ml-auto">174.469.762.405 | 96.56%</span>
							</div>
							<div class="progress progress-xs mb-3">
								<div class="progress-bar bg-danger" role="progressbar" style="width: 96.56%;" aria-valuenow="96.56" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<div class="d-flex mt-2 mb-1 fs-xs text-success">
								Tanaman Buah dan Florikultura
								<span class="d-inline-block ml-auto">86.567.230.675 | 97.67%</span>
							</div>
							<div class="progress progress-xs mb-3">
								<div class="progress-bar bg-success" role="progressbar" style="width: 97.67%;" aria-valuenow="97.67" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<div class="d-flex mt-2 mb-1 fs-xs text-dark">
								Pengolahan dan Pemasaran Hortikultura
								<span class="d-inline-block ml-auto">79.307.738.405 | 99.24%</span>
							</div>
							<div class="progress progress-xs mb-3">
								<div class="progress-bar bg-dark" role="progressbar" style="width: 99.24%;" aria-valuenow="00.24" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- tab top 10 -->
	<div class="tab-pane" id="satker" role="tabpanel" aria-labelledby="home-tab">
		<div class="row d-flex align-items-center ">
			<div class="col-lg-4">
				<div class="panel" id="panel-7" data-panel-sortable data-panel-collapsed data-panel-close data-panel-fullscreen >
					<div class="card-header text-center">
						<h2 class="fw-500">
							100%
						</h2>
					</div>
					<div class="panel-container card-body text-center show">
						<div class="panel-content">
							<!-- Row -->
							<div class="row text-center">
								<div class="col-12">
									<div class="mb-3">
										<h4 class="fw-500">331210</h4>
									</div>
									<div class="">
										<div class="text-center">
											<i class="fal fa-award fa-3x mb-5"></i>
											<h5 class="mb-0 text-truncate text-truncate-xl" data-toggle="tooltip" title data-original-title="DINAS PERTANIAN DAN KETAHANAN PANGAN KAB. MANOKWARI SELATAN">DINAS PERTANIAN DAN KETAHANAN PANGAN KAB. MANOKWARI SELATAN</h5>
											<p class="text-muted mb-0">Rp. 498.500.000</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="panel" id="panel-7" data-panel-sortable data-panel-collapsed data-panel-close data-panel-fullscreen >
					<div class="card-header text-center text-align-items-center bg-primary-500 bg-info-gradient">
						<h2 class="fw-500">
							100%
						</h2>
					</div>
					<div class="panel-container card-body text-center show">
						<div class="panel-content">
							<!-- Row -->
							<div class="row text-center">
								<div class="col-12">
									<div class="mb-3">
										<h3 class="fw-500">339156</h3>
									</div>
									<div class="">
										<div class="text-center">
											<i class="fal fa-award fa-6x text-warning mb-5"></i>
											<h4 class="fw-700 mb-0 text-truncate text-truncate-xl" data-toggle="tooltip" title data-original-title="DINAS TANAMAN PANGAN HORTIKULTURA DAN PERKEBUNAN PROVINSI PAPUA BARAT">DINAS TANAMAN PANGAN HORTIKULTURA DAN PERKEBUNAN PROVINSI PAPUA BARAT</h4>
											<p class="text-muted mb-0">Rp. 1.659.390.000</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="panel" id="panel-7" data-panel-sortable data-panel-collapsed data-panel-close data-panel-fullscreen >
					<div class="card-header text-center">
						<h2 class="fw-500">
							100%
						</h2>
					</div>
					<div class="panel-container card-body text-center show">
						<div class="panel-content">
							<!-- Row -->
							<div class="row text-center">
								<div class="col-12">
									<div class="mb-3">
										<h4 class="fw-500">259098</h4>
									</div>
									<div class="">
										<div class="text-center">
											<i class="fal fa-award fa-3x mb-5"></i>
											<h5 class="mb-0 text-truncate text-truncate-xl" data-toggle="tooltip" title data-original-title="DINAS PERTANIAN DAN PANGAN PROVINSI PAPUA">DINAS PERTANIAN DAN PANGAN PROVINSI PAPUA</h5>
											<p class="text-muted mb-0">Rp. 1.523.069.250</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 mt-5">
				<h2 class="fw-500 mb-0"> Top 10 </h2>
				<hr class="mb-2">
			</div>
			
			<div class="col-lg-12">
				<div class="table table-responsive">
					<table class="table">
						<thead class="bg-primary-500 bg-success-gradient text-white">
							<tr>
								<th>Kode Satker</th>
								<th>Nama Satker</th>
								<th>Pagu</th>
								<th>Realisasi</th>
								<th>%</th>
							</tr>
						</thead>
						<tbody>
							<tr data-toggle="tooltip" title data-original-title="DINAS PERTANIAN PROVINSI GORONTALO">
								<td>319002</td>
								<td>
									<div class="d-flex align-items-baseline">
										<span class="truncate hidden-md-up">DINAS PERTANIAN PROVINSI GORONTALO</span>
										<span class="hidden-md-down">DINAS PERTANIAN PROVINSI GORONTALO</span>
									</div>
								</td>
								<td>1.400.134.000</td>
								<td>1.399.816.000</td>
								<td>99%</td>
							</tr>
							<tr data-toggle="tooltip" title data-original-title="DINAS TANAMAN PANGAN HORTIKULTURA DAN PETERNAKAN PROVINSI JAMBI">
								<td>109905</td>
								<td>
									<div class="d-flex align-items-baseline">
										<span class="truncate hidden-sm-up" >DINAS TANAMAN PANGAN HORTIKULTURA DAN PETERNAKAN PROVINSI JAMBI</span>
										<span class="hidden-sm-down" >DINAS TANAMAN PANGAN HORTIKULTURA DAN PETERNAKAN PROVINSI JAMBI</span>
									</div>
								</td>
								<td>2.420.000.000</td>
								<td>2.419.120.120</td>
								<td>99%</td>
							</tr>
							<tr data-toggle="tooltip" title data-original-title="DINAS PERTANIAN TANAMAN PANGAN KAB KEPAHIANG">
								<td>269057</td>
								<td>
									<div class="d-flex align-items-baseline">
										<span class="truncate hidden-sm-up" >DINAS PERTANIAN TANAMAN PANGAN KAB KEPAHIANG</span>
										<span class="hidden-sm-down" >DINAS PERTANIAN TANAMAN PANGAN KAB KEPAHIANG</span>
									</div>
								</td>
								<td>2.711.700.000</td>
								<td>2.708.355.157</td>
								<td>99%</td>
							</tr>
							<tr data-toggle="tooltip" title data-original-title="DINAS PERTANIAN DAN PANGAN PROVINSI PAPUA">
								<td>259018</td>
								<td>
									<div class="d-flex align-items-baseline">
										<span class="truncate hidden-sm-up" >DINAS PERTANIAN DAN PANGAN PROVINSI PAPUA</span>
										<span class="hidden-sm-down" >DINAS PERTANIAN DAN PANGAN PROVINSI PAPUA</span>
									</div>
								</td>
								<td>1.538.021.000</td>
								<td>1.535.820.000</td>
								<td>99%</td>
							</tr>
							<tr data-toggle="tooltip" title data-original-title="DINAS TANAMAN PANGAN DAN HORTIKULTURA PROVINSI LAMPUNG">
								<td>129000</td>
								<td>
									<div class="d-flex align-items-baseline">
										<span class="truncate hidden-sm-up" >DINAS TANAMAN PANGAN DAN HORTIKULTURA PROVINSI LAMPUNG</span>
										<span class="hidden-sm-down" >DINAS TANAMAN PANGAN DAN HORTIKULTURA PROVINSI LAMPUNG</span>
									</div>
								</td>
								<td>6.213.323.000</td>
								<td>6.204.285.700</td>
								<td>99%</td>
							</tr>
							<tr data-toggle="tooltip" title data-original-title="DINAS TANAMAN PANGAN & HORTIKULTURA KAB SOPPENG">
								<td>199545</td>
								<td>
									<div class="d-flex align-items-baseline">
										<span class="truncate hidden-sm-up" >DINAS TANAMAN PANGAN & HORTIKULTURA KAB SOPPENG</span>
										<span class="hidden-sm-down" >DINAS TANAMAN PANGAN & HORTIKULTURA KAB SOPPENG</span>
									</div>
								</td>
								<td>615.000.000</td>
								<td>614.000.000</td>
								<td>99%</td>
							</tr>
							<tr data-toggle="tooltip" title data-original-title="DINAS PERKEBUNAN & HORTIKULTURA PROP. SULAWESI TENGGARA">
								<td>209065</td>
								<td>
									<div class="d-flex align-items-baseline">
										<span class="truncate hidden-sm-up" >DINAS PERKEBUNAN & HORTIKULTURA PROP. SULAWESI TENGGARA</span>
										<span class="hidden-sm-down" >DINAS PERKEBUNAN & HORTIKULTURA PROP. SULAWESI TENGGARA</span>
									</div>
								</td>
								<td>3.462.371.000</td>
								<td>3.456.734.000</td>
								<td>99%</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-12 mt-5">
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
							<tr data-toggle="tooltip" title data-original-title="DINAS PERTANIAN PROVINSI KEPULAUAN BANGKA BELITUNG">
								<td>309032</td>
								<td>
									<div class="d-flex align-items-baseline">
										<span class="truncate hidden-md-up">DINAS PERTANIAN PROVINSI KEPULAUAN BANGKA BELITUNG</span>
										<span class="hidden-md-down">DINAS PERTANIAN PROVINSI KEPULAUAN BANGKA BELITUNG</span>
									</div>
								</td>
								<td>1.506.327.000</td>
								<td>1.172.030.000</td>
								<td>78%</td>
							</tr>
							<tr data-toggle="tooltip" title data-original-title="DINAS PERTANIAN DAN KETAHANAN PANGAN PROVINSI BALI">
								<td>229027</td>
								<td>
									<div class="d-flex align-items-baseline">
										<span class="truncate hidden-sm-up" >DINAS PERTANIAN DAN KETAHANAN PANGAN PROVINSI BALI</span>
										<span class="hidden-sm-down" >DINAS PERTANIAN DAN KETAHANAN PANGAN PROVINSI BALI</span>
									</div>
								</td>
								<td>4.535.127.000</td>
								<td>3.932.584.036</td>
								<td>87%</td>
							</tr>
							<tr data-toggle="tooltip" title data-original-title="DINAS PERTANIAN KABUPATEN SUMBAWA">
								<td>230576</td>
								<td>
									<div class="d-flex align-items-baseline">
										<span class="truncate hidden-sm-up" >DINAS PERTANIAN KABUPATEN SUMBAWA</span>
										<span class="hidden-sm-down" >DINAS PERTANIAN KABUPATEN SUMBAWA</span>
									</div>
								</td>
								<td>595.850.000</td>
								<td>528.821.875</td>
								<td>89%</td>
							</tr>
							<tr data-toggle="tooltip" title data-original-title="DINAS PERTANIAN DAN HOLTIKULTURA KABUPATEN PINRANG">
								<td>190140</td>
								<td>
									<div class="d-flex align-items-baseline">
										<span class="truncate hidden-sm-up" >DINAS PERTANIAN DAN HOLTIKULTURA KABUPATEN PINRANG</span>
										<span class="hidden-sm-down" >DINAS PERTANIAN DAN HOLTIKULTURA KABUPATEN PINRANG</span>
									</div>
								</td>
								<td>374.250.000</td>
								<td>338.227.000</td>
								<td>90%</td>
							</tr>
							<tr data-toggle="tooltip" title data-original-title="DINAS PERTANIAN DAN PERKEBUNAN PROVINSI JAWA TENGAH">
								<td>039012</td>
								<td>
									<div class="d-flex align-items-baseline">
										<span class="truncate hidden-sm-up" >DINAS PERTANIAN DAN PERKEBUNAN PROVINSI JAWA TENGAH</span>
										<span class="hidden-sm-down" >DINAS PERTANIAN DAN PERKEBUNAN PROVINSI JAWA TENGAH</span>
									</div>
								</td>
								<td>14.364.535.000</td>
								<td>13.200.351.750</td>
								<td>91%</td>
							</tr>
							<tr data-toggle="tooltip" title data-original-title="DINAS TANAMAN PANGAN DAN HORTIKULTURA PROVINSI SULAWESI TENGAH">
								<td>189016</td>
								<td>
									<div class="d-flex align-items-baseline">
										<span class="truncate hidden-sm-up" >DINAS TANAMAN PANGAN DAN HORTIKULTURA PROVINSI SULAWESI TENGAH</span>
										<span class="hidden-sm-down" >DINAS TANAMAN PANGAN DAN HORTIKULTURA PROVINSI SULAWESI TENGAH</span>
									</div>
								</td>
								<td>3.347.337.000</td>
								<td>3.139.621.500,00</td>
								<td>94%</td>
							</tr>
							<tr data-toggle="tooltip" title data-original-title="DINAS PERTANIAN KABUPATEN MINAHASA">
								<td>179221</td>
								<td>
									<div class="d-flex align-items-baseline">
										<span class="truncate hidden-sm-up" >DINAS PERTANIAN KABUPATEN MINAHASA</span>
										<span class="hidden-sm-down" >DINAS PERTANIAN KABUPATEN MINAHASA</span>
									</div>
								</td>
								<td>448.000.000</td>
								<td>421.150.000</td>
								<td>94%</td>
							</tr>
							</tr>
							<tr data-toggle="tooltip" title data-original-title="DINAS PERTANIAN PROVINSI MALUKU UTARA">
								<td>289034</td>
								<td>
									<div class="d-flex align-items-baseline">
										<span class="truncate hidden-sm-up" >DINAS PERTANIAN PROVINSI MALUKU UTARA</span>
										<span class="hidden-sm-down" >DINAS PERTANIAN PROVINSI MALUKU UTARA</span>
									</div>
								</td>
								<td>2.249.627.000</td>
								<td>2.116.053.600,00</td>
								<td>94%</td>
							</tr>
							</tr>
							<tr data-toggle="tooltip" title data-original-title="DINAS PERTANIAN DAN KETAHANAN PANGAN DIY">
								<td>049025</td>
								<td>
									<div class="d-flex align-items-baseline">
										<span class="truncate hidden-sm-up" >DINAS PERTANIAN DAN KETAHANAN PANGAN DIY</span>
										<span class="hidden-sm-down" >DINAS PERTANIAN DAN KETAHANAN PANGAN DIY</span>
									</div>
								</td>
								<td>2.506.834.000</td>
								<td>2.359.904.950</td>
								<td>94%</td>
							</tr>
							</tr>
							<tr data-toggle="tooltip" title data-original-title="DINAS PERTANIAN DAN KETAHANAN PANGAN DIY">
								<td>049088</td>
								<td>
									<div class="d-flex align-items-baseline">
										<span class="truncate hidden-sm-up" >DINAS PERTANIAN DAN KETAHANAN PANGAN DIY</span>
										<span class="hidden-sm-down" >DINAS PERTANIAN DAN KETAHANAN PANGAN DIY</span>
									</div>
								</td>
								<td>6.032.994.000</td>
								<td>5.681.076.390,00</td>
								<td>94%</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>



@endcan
@endsection
@section('scripts')
@parent
<!-- c3 omspan model 1-->
<script>
var barChart = c3.generate(
            {
                bindto: "#twSTO",
                data:
                {
                    columns: [
                        ['STO', 1.80, 13.56, 70.38, 98.67]
                    ],
				type: 'bar'
                },
				legend: {
				  show: true
				},
                color:
                {
                    pattern: ['#886ab5','#2196F3','#1dc9b7','#ffc241','#fd3995','#868e96']
                },
				axis: {
					x: {
						type: 'category',
						categories: ['TW1', 'TW2', 'TW3', 'TW4']
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

			setTimeout(function()
			{
				barChart.load(
				{
					columns: [
						['Ditlin', 1.58, 32.83, 52.69, 99.24]
					]
				});
			}, 1000);

			setTimeout(function()
			{
				barChart.load(
				{
					columns: [
						['Sesdit', 11.57, 38.72, 66.94, 97.46]
					]
				});
			}, 2000);

			setTimeout(function()
			{
				barChart.load(
				{
					columns: [
						['Ditbenih', 0.73, 17.53, 59.73, 96.56]
					]
				});
			}, 3000);

			setTimeout(function()
			{
				barChart.load(
				{
					columns: [
						['Buflo', 0.82, 11.09, 55.03, 97.67]
					]
				});
			}, 4000);

			setTimeout(function()
			{
				barChart.load(
				{
					columns: [
						['PPHH', 0.70, 13.89, 50.68, 99.24]
					]
				});
			}, 5000);

			setTimeout(function()
			{
				$("#barChartLoad").text("load complete")
			}, 6000);

</script>
<!-- C3 omspan model 1 -->
<!-- C3 omspan model 2 -->
<script>
var barTW = c3.generate(
{
	bindto: "#tw1234",
	data:
	{
		columns: [
			['TW1',1.80,1.58,11.57,0.73,0.82,0.70]
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
			categories: ['STO', 'Ditlin', 'Sesdit', 'Ditbenih','Buflo','PPHH']
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

setTimeout(function()
{
	barTW.load(
	{
		columns: [
			['TW2',13.56,32.83,38.72,17.53,11.09,13.89]
		]
	});
}, 1000);

setTimeout(function()
{
	barTW.load(
	{
		columns: [
			['TW3',70.38,52.69,66.94,59.73,55.03,50.68]
		]
	});
}, 2000);

setTimeout(function()
{
	barTW.load(
	{
		columns: [
			['TW4',98.67,99.24,97.46,96.56,97.67,99.24]
		]
	});
}, 3000);
</script>

@endsection