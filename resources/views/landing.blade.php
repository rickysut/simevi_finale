@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="col text-center">
		<h1 class="display-4">{{ trans('simevi.welcome') }}, <span class="fw-700">{{ Auth::user()->name }}!<span></h1>
		<h4 class="">{{ trans('simevi.landing_greet') }}</h4>
	</div>
</div>
<div class="row justify-content-center mb-3">
	<span class="text-muted js-get-date"></span>
</div>
<div class="row justify-content-center mb-3">
	<div class="row justify-content-center">
		<div class="card border m-2 shadow" style="max-width: 28rem;">
			<img src="{{ asset('img/cover-8-lg.png') }}" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title fw-700">{{ trans('cruds.dashboardvip.title') }}</h5>
				<p class="card-text">{{ trans('simevi.dashboardvip_desc') }}</p>
				@can('executive_access')
				<a href="{{ route("admin.dashboardvip") }}" class="btn btn-sm btn-primary">{{ trans('simevi.visitbut') }}</a>
				@endcan
			</div>
		</div>
		<div class="card border m-2 shadow" style="max-width: 28rem;">
			<img src="{{ asset('img/cover-9-lg.png') }}" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title fw-700">{{ trans('cruds.detailrenja.title') }}</h5>
				<p class="card-text">{{ trans('simevi.detail_renja') }}</p>
				@can('pagu_access')
				<a href="{{ route("admin.detailrenja") }}" class="btn btn-sm btn-primary">{{ trans('simevi.visitbut') }}</a>
				@endcan
			</div>
		</div>
		<div class="card border m-2 shadow" style="max-width: 28rem;">
			<img src="{{ asset('img/cover-10-lg.png') }}" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title fw-700">{{ trans('cruds.pagu.title') }}</h5>
				<p class="card-text">{{ trans('simevi.pagu_desc') }}</p>
				@can('pagu_access')
				<a href="{{ route("admin.pagu") }}" class="btn btn-sm btn-primary">{{ trans('simevi.visitbut') }}</a>
				@endcan
			</div>
		</div>
		<div class="card border m-2 shadow" style="max-width: 28rem;">
			<img src="{{ asset('img/cover-7-lg.png') }}" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title fw-700">{{ trans('cruds.banpem.title') }}</h5>
				<p class="card-text">{{ trans('simevi.banpem_desc') }}</p>
				@can('banpem_access')
				<a href="{{ route("admin.detailbanpem") }}" class="btn btn-sm btn-primary ">{{ trans('simevi.visitbut') }}</a>
				@endcan
			</div>
		</div>
	</div>
</div>

@endsection
