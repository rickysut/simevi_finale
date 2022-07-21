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
<div id="multi-item-card" class="hidden-sm-down carousel slide carousel-multi-item" data-ride="carousel" data-interval="5000">
	<div class="row justify-content-center">
	<div class="controls-top">
		<a class="btn-floating btn-sm btn-primary waves-effect waves-theme" href="#multi-item-card" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
		<a class="btn-floating btn-sm btn-primary waves-effect waves-theme" href="#multi-item-card" data-slide="next"><i class="fa fa-chevron-right"></i></a>
	</div>
	</div>
	<div class="carousel-inner" role="listbox">
		<div class="carousel-item active">
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
						<a href="{{ route("admin.detailbanpem") }}" class="btn btn-sm btn-primary">{{ trans('simevi.visitbut') }}</a>
						@endcan
					</div>
				</div>
			</div>
		</div>
		<div class="carousel-item">
			<div class="row justify-content-center">
				<div class="card border m-2 shadow" style="max-width: 28rem;">
					<img src="{{ asset('img/cover-11-lg.png') }}" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title fw-300">{{ trans('simevi.underconstruction') }}</h5>
						<p class="card-text"><i>{{ trans('simevi.uc_desc') }}</i></p>
						<a href="#" class="btn btn-sm btn-default disabled">{{ trans('simevi.visitbut2') }}</a>
					</div>
				</div>
				<div class="card border m-2 shadow" style="max-width: 28rem;">
					<img src="{{ asset('img/cover-11-lg.png') }}" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title fw-300">{{ trans('simevi.underconstruction') }}</h5>
						<p class="card-text"><i>{{ trans('simevi.uc_desc') }}</i></p>
						<a href="#" class="btn btn-sm btn-default disabled">{{ trans('simevi.visitbut2') }}</a>
					</div>
				</div>
				<div class="card border m-2 shadow" style="max-width: 28rem;">
					<img src="{{ asset('img/cover-11-lg.png') }}" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title fw-300">{{ trans('simevi.underconstruction') }}</h5>
						<p class="card-text"><i>{{ trans('simevi.uc_desc') }}</i></p>
						<a href="#" class="btn btn-sm btn-default disabled">{{ trans('simevi.visitbut2') }}</a>
					</div>
				</div>
				<div class="card border m-2 shadow" style="max-width: 28rem;">
					<img src="{{ asset('img/cover-11-lg.png') }}" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title fw-300">{{ trans('simevi.underconstruction') }}</h5>
						<p class="card-text"><i>{{ trans('simevi.uc_desc') }}</i></p>
						<a href="#" class="btn btn-sm btn-default disabled">{{ trans('simevi.visitbut2') }}</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="carousel-mobile" class="hidden-sm-up carousel slide carousel-multi-item" data-ride="carousel">
	<div class="row justify-content-center">
	<div class="controls-top">
		<a class="btn-floating btn-sm btn-primary waves-effect waves-theme" href="#carousel-mobile" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
		<a class="btn-floating btn-sm btn-primary waves-effect waves-theme" href="#carousel-mobile" data-slide="next"><i class="fa fa-chevron-right"></i></a>
	</div>
	</div>
	<ol class="carousel-indicators">
		<li data-target="#carousel-mobile" data-slide-to="0" class="active"></li>
		<li data-target="#carousel-mobile" data-slide-to="1"></li>
		<li data-target="#carousel-mobile" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner" role="listbox">
		<div class="carousel-item active">
			<div class="card border m-2 shadow" style="max-width: 18rem;">
				<img src="{{ asset('img/cover-8-lg.png') }}" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title fw-700">{{ trans('cruds.dashboardvip.title') }}</h5>
					<p class="card-text">{{ trans('simevi.dashboardvip_desc') }}</p>
					<a href="#" class="btn btn-sm btn-primary">{{ trans('simevi.visitbut') }}</a>
				</div>
			</div>
		</div>
		<div class="carousel-item">
			<div class="card border m-2 shadow" style="max-width: 18rem;">
				<img src="{{ asset('img/cover-9-lg.png') }}" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title fw-700">{{ trans('cruds.detailrenja.title') }}</h5>
					<p class="card-text">{{ trans('simevi.detail_renja') }}</p>
					<a href="#" class="btn btn-sm btn-primary">{{ trans('simevi.visitbut') }}</a>
				</div>
			</div>
		</div>
		<div class="carousel-item">
			<div class="card border m-2 shadow" style="max-width: 18rem;">
				<img src="{{ asset('img/cover-10-lg.png') }}" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title fw-700">{{ trans('cruds.pagu.title') }}</h5>
					<p class="card-text">{{ trans('simevi.pagu_desc') }}</p>
					<a href="#" class="btn btn-sm btn-primary">{{ trans('simevi.visitbut') }}</a>
				</div>
			</div>
		</div>
		<div class="carousel-item">
			<div class="card border m-2 shadow" style="max-width: 18rem;">
				<img src="{{ asset('img/cover-7-lg.png') }}" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title fw-700">{{ trans('cruds.banpem.title') }}</h5>
					<p class="card-text">{{ trans('simevi.banpem_desc') }}</p>
					<a href="#" class="btn btn-sm btn-primary">{{ trans('simevi.visitbut') }}</a>
				</div>
			</div>
		</div>
		<div class="carousel-item">
			<div class="card border m-2 shadow" style="max-width: 18rem;">
				<img src="{{ asset('img/cover-11-lg.png') }}" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title fw-300">{{ trans('simevi.underconstruction') }}</h5>
					<p class="card-text"><i>{{ trans('simevi.uc_desc') }}</i></p>
					<a href="#" class="btn btn-sm btn-default disabled">{{ trans('simevi.visitbut2') }}</a>
				</div>
			</div>
		</div>
		<div class="carousel-item">
			<div class="card border m-2 shadow" style="max-width: 18rem;">
				<img src="{{ asset('img/cover-11-lg.png') }}" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title fw-300">{{ trans('simevi.underconstruction') }}</h5>
					<p class="card-text"><i>{{ trans('simevi.uc_desc') }}</i></p>
					<a href="#" class="btn btn-sm btn-default disabled">{{ trans('simevi.visitbut2') }}</a>
				</div>
			</div>
		</div>
		<div class="carousel-item">
			<div class="card border m-2 shadow" style="max-width: 18rem;">
				<img src="{{ asset('img/cover-11-lg.png') }}" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title fw-300">{{ trans('simevi.underconstruction') }}</h5>
					<p class="card-text"><i>{{ trans('simevi.uc_desc') }}</i></p>
					<a href="#" class="btn btn-sm btn-default disabled">{{ trans('simevi.visitbut2') }}</a>
				</div>
			</div>
		</div>
		<div class="carousel-item">
			<div class="card border m-2 shadow" style="max-width: 18rem;">
				<img src="{{ asset('img/cover-11-lg.png') }}" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title fw-300">{{ trans('simevi.underconstruction') }}</h5>
					<p class="card-text"><i>{{ trans('simevi.uc_desc') }}</i></p>
					<a href="#" class="btn btn-sm btn-default disabled">{{ trans('simevi.visitbut2') }}</a>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
