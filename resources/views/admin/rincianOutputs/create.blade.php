@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="card">
    <!--div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.rincianOutput.title_singular') }}
    </div-->

    <div class="card-body">
        <form method="POST" action="{{ route("admin.rincian-outputs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="idoutp">{{ trans('cruds.rincianOutput.fields.idoutp') }}</label>
                <input class="form-control {{ $errors->has('idoutp') ? 'is-invalid' : '' }}" type="text" name="idoutp" id="idoutp" value="{{ old('idoutp', '') }}" required>
                @if($errors->has('idoutp'))
                    <div class="invalid-feedback">
                        {{ $errors->first('idoutp') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rincianOutput.fields.idoutp_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="idoutp_1">{{ trans('cruds.rincianOutput.fields.idoutp_1') }}</label>
                <input class="form-control {{ $errors->has('idoutp_1') ? 'is-invalid' : '' }}" type="text" name="idoutp_1" id="idoutp_1" value="{{ old('idoutp_1', '') }}" required>
                @if($errors->has('idoutp_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('idoutp_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rincianOutput.fields.idoutp_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdgiat">{{ trans('cruds.rincianOutput.fields.kdgiat') }}</label>
                <input class="form-control {{ $errors->has('kdgiat') ? 'is-invalid' : '' }}" type="text" name="kdgiat" id="kdgiat" value="{{ old('kdgiat', '') }}">
                @if($errors->has('kdgiat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdgiat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rincianOutput.fields.kdgiat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdoutput">{{ trans('cruds.rincianOutput.fields.kdoutput') }}</label>
                <input class="form-control {{ $errors->has('kdoutput') ? 'is-invalid' : '' }}" type="text" name="kdoutput" id="kdoutput" value="{{ old('kdoutput', '') }}">
                @if($errors->has('kdoutput'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdoutput') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rincianOutput.fields.kdoutput_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nmoutput">{{ trans('cruds.rincianOutput.fields.nmoutput') }}</label>
                <input class="form-control {{ $errors->has('nmoutput') ? 'is-invalid' : '' }}" type="text" name="nmoutput" id="nmoutput" value="{{ old('nmoutput', '') }}">
                @if($errors->has('nmoutput'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nmoutput') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rincianOutput.fields.nmoutput_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sat">{{ trans('cruds.rincianOutput.fields.sat') }}</label>
                <input class="form-control {{ $errors->has('sat') ? 'is-invalid' : '' }}" type="text" name="sat" id="sat" value="{{ old('sat', '') }}">
                @if($errors->has('sat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rincianOutput.fields.sat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdsum">{{ trans('cruds.rincianOutput.fields.kdsum') }}</label>
                <input class="form-control {{ $errors->has('kdsum') ? 'is-invalid' : '' }}" type="text" name="kdsum" id="kdsum" value="{{ old('kdsum', '') }}">
                @if($errors->has('kdsum'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdsum') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rincianOutput.fields.kdsum_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="thnawal">{{ trans('cruds.rincianOutput.fields.thnawal') }}</label>
                <input class="form-control {{ $errors->has('thnawal') ? 'is-invalid' : '' }}" type="number" name="thnawal" id="thnawal" value="{{ old('thnawal', '') }}" step="1">
                @if($errors->has('thnawal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('thnawal') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rincianOutput.fields.thnawal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="thnakhir">{{ trans('cruds.rincianOutput.fields.thnakhir') }}</label>
                <input class="form-control {{ $errors->has('thnakhir') ? 'is-invalid' : '' }}" type="number" name="thnakhir" id="thnakhir" value="{{ old('thnakhir', '') }}" step="1">
                @if($errors->has('thnakhir'))
                    <div class="invalid-feedback">
                        {{ $errors->first('thnakhir') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rincianOutput.fields.thnakhir_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdmulti">{{ trans('cruds.rincianOutput.fields.kdmulti') }}</label>
                <input class="form-control {{ $errors->has('kdmulti') ? 'is-invalid' : '' }}" type="number" name="kdmulti" id="kdmulti" value="{{ old('kdmulti', '') }}" step="1">
                @if($errors->has('kdmulti'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdmulti') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rincianOutput.fields.kdmulti_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdjnsout">{{ trans('cruds.rincianOutput.fields.kdjnsout') }}</label>
                <input class="form-control {{ $errors->has('kdjnsout') ? 'is-invalid' : '' }}" type="number" name="kdjnsout" id="kdjnsout" value="{{ old('kdjnsout', '') }}" step="1">
                @if($errors->has('kdjnsout'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdjnsout') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rincianOutput.fields.kdjnsout_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdikk">{{ trans('cruds.rincianOutput.fields.kdikk') }}</label>
                <input class="form-control {{ $errors->has('kdikk') ? 'is-invalid' : '' }}" type="number" name="kdikk" id="kdikk" value="{{ old('kdikk', '') }}" step="1">
                @if($errors->has('kdikk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdikk') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rincianOutput.fields.kdikk_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdtema">{{ trans('cruds.rincianOutput.fields.kdtema') }}</label>
                <input class="form-control {{ $errors->has('kdtema') ? 'is-invalid' : '' }}" type="number" name="kdtema" id="kdtema" value="{{ old('kdtema', '') }}" step="1">
                @if($errors->has('kdtema'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdtema') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rincianOutput.fields.kdtema_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdcttout">{{ trans('cruds.rincianOutput.fields.kdcttout') }}</label>
                <input class="form-control {{ $errors->has('kdcttout') ? 'is-invalid' : '' }}" type="number" name="kdcttout" id="kdcttout" value="{{ old('kdcttout', '') }}" step="1">
                @if($errors->has('kdcttout'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdcttout') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rincianOutput.fields.kdcttout_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="thang">{{ trans('cruds.rincianOutput.fields.thang') }}</label>
                <input class="form-control {{ $errors->has('thang') ? 'is-invalid' : '' }}" type="number" name="thang" id="thang" value="{{ old('thang', '') }}" step="1">
                @if($errors->has('thang'))
                    <div class="invalid-feedback">
                        {{ $errors->first('thang') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rincianOutput.fields.thang_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdpn">{{ trans('cruds.rincianOutput.fields.kdpn') }}</label>
                <input class="form-control {{ $errors->has('kdpn') ? 'is-invalid' : '' }}" type="number" name="kdpn" id="kdpn" value="{{ old('kdpn', '') }}" step="1">
                @if($errors->has('kdpn'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdpn') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.rincianOutput.fields.kdpn_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a class="btn btn-danger" href="{{ route('admin.rincian-outputs.index') }}">
                    {{ trans('global.cancel') }}
                </a>
            </div>
        </form>
    </div>
</div>



@endsection