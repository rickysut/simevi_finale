@extends('layouts.admin')
@section('content')

<div class="alert bg-warning-500 fade show" role="alert">
	<div class="d-flex align-items-center">
		<div class="alert-icon width-2">
			<span class="icon-stack" style="font-size: 22px;">
				<i class="base-2 icon-stack-3x text-white"></i>
				<i class="base-10 text-white icon-stack-1x"></i>
				<i class="fas fa-exclamation-circle color-warning-500 icon-stack-2x"></i>
			</span>
		</div>
		<div class="flex-1">
			<strong>Perhatian! </strong>
			Halaman ini merupakan halaman contoh dan belum berfungsi.
		</div>
	</div>
</div>

<div class="subheader">
	<h1 class="subheader-title">
		<i class='subheader-icon fal fa-envelope'></i> @yield('title')
		<small>
		</small>
	</h1>
	<div class="subheader-block d-lg-flex align-items-center">
		<div class="d-inline-flex flex-column justify-content-center mr-3 text-right" data-toggle="tooltip" title data-original-title="waktu terakhir data diperbaharusi">
			<span class="fw-300 fs-xs d-block opacity-50">
				<small>Hari ini</small>
			</span>
			<span class="fw-500 fs-xl d-block color-danger-500">
				<span class="text-muted text-truncate text-truncate-sm js-get-date"></span>
		</div>
		<span class="sparklines hidden-lg-down" sparkType="bar" sparkBarColor="#886ab5" sparkHeight="32px" sparkBarWidth="5px" values="3,4,3,6,7,3,3,6,2,6,4"></span>
	</div>
</div>


<div class="content">
    <div class="row">
        <div class="col-lg-3">
            <p>
                <a href="{{ route('admin.messenger.createTopic') }}" class="btn btn-primary btn-block">
                    Buat Pesan
                </a>
            </p>
			<div class="flex-1 list-group">
				<a href="{{ route('admin.messenger.index') }}" class="list-group-item dropdown-item px-3 px-sm-4 pr-lg-3 pl-lg-5 py-2 fs-md d-flex justify-content-between border-top-left-radius-0 border-bottom-left-radius-0">
					<div>
						<i class="fas fa-folder-open width-1"></i>Semua pesan <!--{{ trans('global.all_messages') }}-->
					</div>
					<div class="fw-400 fs-xs js-unread-emails-count"></div>
				</a>
				<a href="{{ route('admin.messenger.showInbox') }}" class="list-group-item dropdown-item px-3 px-sm-4 pr-lg-3 pl-lg-5 py-2 fs-md d-flex justify-content-between border-top-left-radius-0 border-bottom-left-radius-0">
					
					<div>
						<i class="fas fa-folder-open width-1"></i>Pesan masuk <!--{{ trans('global.inbox') }}-->
					</div>
					@if($unreads['inbox'] > 0)
					<div class="badge bg-danger-500 fw-400 fs-xs js-unread-emails-count">({{ $unreads['inbox'] }})</div>
					@else
					<div class="badge bg-success-50 fw-800 fs-xs js-unread-emails-count">({{ $unreads['inbox'] }})</div>
					@endif
				</a>
				<a href="{{ route('admin.messenger.showOutbox') }}" class="list-group-item dropdown-item px-3 px-sm-4 pr-lg-3 pl-lg-5 py-2 fs-md d-flex justify-content-between border-top-left-radius-0 border-bottom-left-radius-0">
					<div>
						<i class="fas fa-paper-plane width-1"></i>Pesan keluar <!--{{ trans('global.outbox') }}-->
					</div>
					 @if($unreads['outbox'] > 0)
					<div class="badge bg-danger-500 fw-400 fs-xs js-unread-emails-count">({{ $unreads['outbox'] }})</div>
					@else
					<div class="badge bg-success-50 fw-800 fs-xs js-unread-emails-count">({{ $unreads['outbox'] }})</div>
					@endif
				</a>
				<a href="javascript:void(0)" class="list-group-item dropdown-item px-3 px-sm-4 pr-lg-3 pl-lg-5 py-2 fs-md d-flex justify-content-between border-top-left-radius-0 border-bottom-left-radius-0">
					<div>
						<i class="fas fa-trash width-1"></i>Dibuang
					</div>
				</a>
			</div>
        </div>
        <div class="col-lg-9">
            @yield('messenger-content')
        </div>
    </div>
</div>
@stop