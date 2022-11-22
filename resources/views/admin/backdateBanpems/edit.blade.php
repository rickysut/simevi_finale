@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="card">
    <!--div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.backdateBanpem.title_singular') }}
    </div-->

    <div class="card-body">
        <form method="POST" action="{{ route("admin.backdate-banpems.update", [$backdateBanpem->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="year">{{ trans('cruds.backdateBanpem.fields.year') }}</label>
                <input class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" type="number" name="year" id="year" value="{{ old('year', $backdateBanpem->year) }}" step="1">
                @if($errors->has('year'))
                    <div class="invalid-feedback">
                        {{ $errors->first('year') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.backdateBanpem.fields.year_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kd_satker">{{ trans('cruds.backdateBanpem.fields.kd_satker') }}</label>
                <input class="form-control {{ $errors->has('kd_satker') ? 'is-invalid' : '' }}" type="text" name="kd_satker" id="kd_satker" value="{{ old('kd_satker', $backdateBanpem->kd_satker) }}">
                @if($errors->has('kd_satker'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kd_satker') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.backdateBanpem.fields.kd_satker_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="provinsi">{{ trans('cruds.backdateBanpem.fields.provinsi') }}</label>
                <input class="form-control {{ $errors->has('provinsi') ? 'is-invalid' : '' }}" type="text" name="provinsi" id="provinsi" value="{{ old('provinsi', $backdateBanpem->provinsi) }}">
                @if($errors->has('provinsi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('provinsi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.backdateBanpem.fields.provinsi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kab_kota">{{ trans('cruds.backdateBanpem.fields.kab_kota') }}</label>
                <input class="form-control {{ $errors->has('kab_kota') ? 'is-invalid' : '' }}" type="text" name="kab_kota" id="kab_kota" value="{{ old('kab_kota', $backdateBanpem->kab_kota) }}">
                @if($errors->has('kab_kota'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kab_kota') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.backdateBanpem.fields.kab_kota_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nm_gapoktan">{{ trans('cruds.backdateBanpem.fields.nm_gapoktan') }}</label>
                <input class="form-control {{ $errors->has('nm_gapoktan') ? 'is-invalid' : '' }}" type="text" name="nm_gapoktan" id="nm_gapoktan" value="{{ old('nm_gapoktan', $backdateBanpem->nm_gapoktan) }}">
                @if($errors->has('nm_gapoktan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nm_gapoktan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.backdateBanpem.fields.nm_gapoktan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nm_barang">{{ trans('cruds.backdateBanpem.fields.nm_barang') }}</label>
                <input class="form-control {{ $errors->has('nm_barang') ? 'is-invalid' : '' }}" type="text" name="nm_barang" id="nm_barang" value="{{ old('nm_barang', $backdateBanpem->nm_barang) }}">
                @if($errors->has('nm_barang'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nm_barang') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.backdateBanpem.fields.nm_barang_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total">{{ trans('cruds.backdateBanpem.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', $backdateBanpem->total) }}" step="0.01">
                @if($errors->has('total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.backdateBanpem.fields.total_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="satuan">{{ trans('cruds.backdateBanpem.fields.satuan') }}</label>
                <input class="form-control {{ $errors->has('satuan') ? 'is-invalid' : '' }}" type="text" name="satuan" id="satuan" value="{{ old('satuan', $backdateBanpem->satuan) }}" >
                @if($errors->has('satuan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('satuan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.backdateBanpem.fields.satuan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nominal">{{ trans('cruds.backdateBanpem.fields.nominal') }}</label>
                <input class="form-control {{ $errors->has('nominal') ? 'is-invalid' : '' }}" type="number" name="nominal" id="nominal" value="{{ old('nominal', $backdateBanpem->nominal) }}" step="0.01">
                @if($errors->has('nominal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nominal') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.backdateBanpem.fields.nominal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kd_giat">{{ trans('cruds.backdateBanpem.fields.kd_giat') }}</label>
                <input class="form-control {{ $errors->has('kd_giat') ? 'is-invalid' : '' }}" type="text" name="kd_giat" id="kd_giat" value="{{ old('kd_giat', $backdateBanpem->kd_giat) }}">
                @if($errors->has('kd_giat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kd_giat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.backdateBanpem.fields.kd_giat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kd_akun">{{ trans('cruds.backdateBanpem.fields.kd_akun') }}</label>
                <input class="form-control {{ $errors->has('kd_akun') ? 'is-invalid' : '' }}" type="text" name="kd_akun" id="kd_akun" value="{{ old('kd_akun', $backdateBanpem->kd_akun) }}">
                @if($errors->has('kd_akun'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kd_akun') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.backdateBanpem.fields.kd_akun_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kwn">{{ trans('cruds.backdateBanpem.fields.kwn') }}</label>
                <input class="form-control {{ $errors->has('kwn') ? 'is-invalid' : '' }}" type="text" name="kwn" id="kwn" value="{{ old('kwn', $backdateBanpem->kwn) }}">
                @if($errors->has('kwn'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kwn') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.backdateBanpem.fields.kwn_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a class="btn btn-danger" href="{{ route('admin.backdate-banpems.index') }}">
                    {{ trans('global.cancel') }}
                </a>
            </div>
        </form>
    </div>
</div>



@endsection