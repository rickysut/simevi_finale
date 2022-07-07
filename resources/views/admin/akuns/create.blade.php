@extends('layouts.admin')
@section('content')
@include('partials.subheader')



<div class="row d-flex">
	<!-- widget rencana kerja -->
	<div class="col-12">
		<div id="panel-1" class="panel show">
			<div class="panel-container">
				<div class="panel-content">
					<div class="row">
						<div class="col-12">
							<form method="POST" action="" enctype="">
								 @csrf
								<div class="form-group row">
									<label class="required col-sm-2 col-form-label text-muted" for="kd_akun">{{ trans('cruds.akun.fields.kd_akun') }}</label>
									<div class="col-sm-10">
										<input class="form-control form-control-sm {{ $errors->has('kd_akun') ? 'is-invalid' : '' }}" type="number" name="kd_akun" id="kd_akun" value="{{ old('kd_akun', '') }}" step="1" required>
										@if($errors->has('kd_akun'))
											<div class="invalid-feedback">
												{{ $errors->first('kd_akun') }}
											</div>
										@endif
										<span class="help-block">{{ trans('cruds.akun.fields.kd_akun_helper') }}</span>
									</div>
								</div>
								<div class="form-group row">
									<label class="required col-sm-2 col-form-label text-muted" for="nama_akun">{{ trans('cruds.akun.fields.nama_akun') }}</label>
									<div class="col-sm-10">
										<input class="form-control form-control-sm {{ $errors->has('nama_akun') ? 'is-invalid' : '' }}" type="text" name="nama_akun" id="nama_akun" value="{{ old('nama_akun', '') }}" required>
										@if($errors->has('nama_akun'))
											<div class="invalid-feedback">
												{{ $errors->first('nama_akun') }}
											</div>
										@endif
										<span class="help-block">{{ trans('cruds.akun.fields.nama_akun_helper') }}</span>
									</div>
								</div>
								<div class="form-group row">
									<label class="required col-sm-2 col-form-label text-muted" for="pendekatan">{{ trans('cruds.akun.fields.pendekatan') }}</label>
									<div class="col-sm-10">
										<select class="form-control form-control-sm {{ $errors->has('pendekatan') ? 'is-invalid' : '' }}" name="pendekatan" id="pendekatan" required>
											<option value disabled {{ old('pendekatan', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
											@foreach(App\Models\Akun::PENDEKATAN_SELECT as $key => $label)
												<option value="{{ $key }}" {{ old('pendekatan', 'Asset') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
											@endforeach
										</select>
										@if($errors->has('pendekatan'))
											<div class="invalid-feedback">
												{{ $errors->first('pendekatan') }}
											</div>
										@endif
										<span class="help-block">{{ trans('cruds.akun.fields.pendekatan_helper') }}</span>
									</div>
								</div>
								<div class="form-group row">
									<label class="required col-sm-2 col-form-label text-muted" for="jenis">{{ trans('cruds.akun.fields.jenis') }}</label>
									<div class="col-sm-10">
										<input class="form-control form-control-sm {{ $errors->has('jenis') ? 'is-invalid' : '' }}" type="text" name="jenis" id="jenis" value="{{ old('jenis', '') }}" required>
										@if($errors->has('jenis'))
											<div class="invalid-feedback">
												{{ $errors->first('jenis') }}
											</div>
										@endif
										<span class="help-block">{{ trans('cruds.akun.fields.jenis_helper') }}</span>
									</div>
								</div>
								<div class="form-group row">
									<label class="required col-sm-2 col-form-label text-muted" for="status">{{ trans('cruds.akun.fields.status') }}</label>
									<div class="col-sm-10">
										<select class="form-control form-control-sm {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
											<option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
											@foreach(App\Models\Akun::STATUS_SELECT as $key => $label)
												<option value="{{ $key }}" {{ old('status', '1') === (int) $key ? 'selected' : '' }}>{{ $label }}</option>
											@endforeach
										</select>
										@if($errors->has('status'))
											<div class="invalid-feedback">
												{{ $errors->first('status') }}
											</div>
										@endif
										<span class="help-block">{{ trans('cruds.akun.fields.status_helper') }}</span>
									</div>
								</div>
								<hr>
								<div class="form-group">
									<button class="btn btn-primary" type="submit">
										{{ trans('global.save') }}
									</button>
									<a class="btn btn-warning" href="{{ route('admin.akuns.index') }}">
										{{ trans('global.cancel') }}
									</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection