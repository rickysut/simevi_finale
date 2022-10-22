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
			</span>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card mb-g border shadow-0">
			<div class="card-header p-0">
				<div class="p-3 d-flex flex-row">
					<div class="d-block flex-shrink-0">
						<img src="{{ asset('img/favicon.png') }}" class="img-fluid img-thumbnail" alt="" style="height:50px; width:100%;">
					</div>
					<div class="d-block ml-2">
						<span class="h6 font-weight-bold text-uppercase d-block m-0">Mengunggah Data Pagu OMSPAN</span>
						<label  class="fs-sm text-info h6 fw-500 mb-0 d-block">Administrator</label>
						<div class="d-flex mt-1 align-items-center text-muted fs-xs font-italic">

						</div>
					</div>
					<a href="javascript:void(0);" class="d-inline-flex align-items-center ml-auto align-self-start  text-muted fs-xs font-italic">
						Oktober 21, 2022 @17:51
					</a>
				</div>
			</div>
			<div class="panel-container show">
				<div class="panel-content p-0">
					<div class="row no-gutters row-grid">
						<!-- thread -->
						<div class="col-12">
							<object data="{{ asset('docs/howto/SPPL.pdf') }}" type="application/pdf" width="100%" height="800px">
								<p>Maaf, peramban Anda belum terpasang/memiliki plugin untuk menampilkan modul panduan ini. <a href="{{ asset('docs/howto/modul_2.pdf') }}">Silahkan unduh Panduan ini</a></p>
							</object>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<div class="d-flex align-items-center">
					<div class="col-md-4 ml-auto text-right">
						<a href="{{ route('admin.documentation') }}" class="btn btn-primary btn-sm mt-3">Kembali</a>
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