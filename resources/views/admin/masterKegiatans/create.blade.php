@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="card">
    <!--div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.masterKegiatan.title_singular') }}
    </div-->

    <div class="card-body">
        <form method="POST" action="{{ route("admin.master-kegiatans.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="kddept">{{ trans('cruds.masterKegiatan.fields.kddept') }}</label>
                <input class="form-control {{ $errors->has('kddept') ? 'is-invalid' : '' }}" type="text" name="kddept" id="kddept" value="{{ old('kddept', '') }}">
                @if($errors->has('kddept'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kddept') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.masterKegiatan.fields.kddept_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdunit">{{ trans('cruds.masterKegiatan.fields.kdunit') }}</label>
                <input class="form-control {{ $errors->has('kdunit') ? 'is-invalid' : '' }}" type="text" name="kdunit" id="kdunit" value="{{ old('kdunit', '') }}">
                @if($errors->has('kdunit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdunit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.masterKegiatan.fields.kdunit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kd_kegiatan">{{ trans('cruds.masterKegiatan.fields.kd_kegiatan') }}</label>
                <input class="form-control {{ $errors->has('kd_kegiatan') ? 'is-invalid' : '' }}" type="text" name="kd_kegiatan" id="kd_kegiatan" value="{{ old('kd_kegiatan', '') }}">
                @if($errors->has('kd_kegiatan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kd_kegiatan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.masterKegiatan.fields.kd_kegiatan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="direktorat">{{ trans('cruds.masterKegiatan.fields.direktorat') }}</label>
                <input class="form-control {{ $errors->has('direktorat') ? 'is-invalid' : '' }}" type="text" name="direktorat" id="direktorat" value="{{ old('direktorat', '') }}">
                @if($errors->has('direktorat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('direktorat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.masterKegiatan.fields.direktorat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nomenklatur_giat">{{ trans('cruds.masterKegiatan.fields.nomenklatur_giat') }}</label>
                <input class="form-control {{ $errors->has('nomenklatur_giat') ? 'is-invalid' : '' }}" type="text" name="nomenklatur_giat" id="nomenklatur_giat" value="{{ old('nomenklatur_giat', '') }}">
                @if($errors->has('nomenklatur_giat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nomenklatur_giat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.masterKegiatan.fields.nomenklatur_giat_helper') }}</span>
            </div>
            
            <div class="form-group">
                <label class="required">{{ trans('cruds.masterKegiatan.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\MasterKegiatan::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', '1') === (int) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.masterKegiatan.fields.status_helper') }}</span>
            </div>

            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a class="btn btn-danger" href="{{ route('admin.master-kegiatans.index') }}">
                    {{ trans('global.cancel') }}
                </a>
            </div>
        </form>
    </div>
</div>



@endsection