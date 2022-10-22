@extends('layouts.admin')
@section('content')
<div class="subheader">
	<h1 class="subheader-title">
		<i class='subheader-icon fal fa-books'></i> {{ $breadcrumb ?? '' }}
		<small>
		</small>
	</h1>
	<div class="subheader-block d-lg-flex align-items-center">
		<div class="d-inline-flex flex-column justify-content-center mr-3 text-right" data-toggle="tooltip" title data-original-title="waktu terakhir data diperbaharusi">
			<span class="fw-300 fs-xs d-block opacity-50">
				<small>{{ trans('simevi.today') }}</small>
			</span>
			<span class="fw-500 fs-xl d-block color-danger-500">
				<span class="text-muted text-truncate text-truncate-sm js-get-date"></span>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div id="panel-1" class="panel">
			<!--
			Yang ingin dicapi pada panel ini adalah:
			Menampilkan daftar How To yang dapat di akses oleh seluruh pengguna
			-->
			<div class="panel-hdr">
				<h2>
					<i class="subheader-icon fal fa-book-open mr-2"></i> App Anggaran
				</h2>
				<div class="panel-toolbar">

				</div>
			</div>
			<div class="panel-container show">
				<div class="panel-content p-0">
					<div class="row no-gutters row-grid">
						<!-- thread -->
						<div class="col-12">
							<ul class="notification">
								<li class="">
									<div class="p-3 d-flex align-items-center">
										<span class="mr-2">
											<img src="{{ asset('img/favicon.png') }}" class="profile-image rounded-circle" alt="">
										</span>
										<div class="d-flex flex-column">
											<div class="d-block">
												<span class="name d-flex align-items-center">Administrator</span>
											</div>
											<a class="fs-lg fw-500 d-flex align-items-start text-muted">
												Mengunggah Data Renja
											</a>
											<div class="d-block text-muted fs-sm">
												<span class="text-muted">Sabtu, 22 Oktober 2022</span>
											</div>
										</div>
									</div>
								</li>
								<li class="">
									<div class="p-3 d-flex align-items-center">
										<span class="mr-2">
											<img src="{{ asset('img/omspan-logo.svg') }}" class="profile-image" alt="">
										</span>
										<div class="d-flex flex-column">
											<div class="d-block">
												<span class="name d-flex align-items-center">Administrator</span>
											</div>
											<a href="{{ route('admin.howto.modul1') }}" class="fs-lg fw-500 d-flex align-items-start">
												Mengunggah Data Pagu
											</a>
											<div class="d-block text-muted fs-sm">
												<span class="text-muted">Sabtu, 22 Oktober 2022</span>
											</div>
										</div>
									</div>
								</li>
								<li class="">
									<div class="p-3 d-flex align-items-center">
										<span class="mr-2">
											<img src="{{ asset('img/omspan-logo.svg') }}" class="profile-image" alt="">
										</span>
										<div class="d-flex flex-column">
											<div class="d-block">
												<span class="name d-flex align-items-center">Administrator</span>
											</div>
											<a href="{{ route('admin.howto.modul2') }}" class="fs-lg fw-500 d-flex align-items-start">
												Mengunggah Data Realisasi
											</a>
											<div class="d-block text-muted fs-sm">
												<span class="text-muted">Sabtu, 22 Oktober 2022</span>
											</div>
										</div>
									</div>
								</li>
							</ul>
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
@endsection