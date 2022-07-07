@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="card">
    <!--div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.dataRenja.title_singular') }}
    </div-->

    <div class="card-body">
        <form method="POST" action="{{ route("admin.data-renjas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="thang">{{ trans('cruds.dataRenja.fields.thang') }}</label>
                <input class="form-control {{ $errors->has('thang') ? 'is-invalid' : '' }}" type="number" name="thang" id="thang" value="{{ old('thang', '') }}" step="1" required>
                @if($errors->has('thang'))
                    <div class="invalid-feedback">
                        {{ $errors->first('thang') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.thang_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdjendok">{{ trans('cruds.dataRenja.fields.kdjendok') }}</label>
                <input class="form-control {{ $errors->has('kdjendok') ? 'is-invalid' : '' }}" type="text" name="kdjendok" id="kdjendok" value="{{ old('kdjendok', '') }}">
                @if($errors->has('kdjendok'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdjendok') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.kdjendok_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdsatker">{{ trans('cruds.dataRenja.fields.kdsatker') }}</label>
                <input class="form-control {{ $errors->has('kdsatker') ? 'is-invalid' : '' }}" type="text" name="kdsatker" id="kdsatker" value="{{ old('kdsatker', '') }}">
                @if($errors->has('kdsatker'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdsatker') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.kdsatker_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kddept">{{ trans('cruds.dataRenja.fields.kddept') }}</label>
                <input class="form-control {{ $errors->has('kddept') ? 'is-invalid' : '' }}" type="text" name="kddept" id="kddept" value="{{ old('kddept', '') }}">
                @if($errors->has('kddept'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kddept') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.kddept_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdunit">{{ trans('cruds.dataRenja.fields.kdunit') }}</label>
                <input class="form-control {{ $errors->has('kdunit') ? 'is-invalid' : '' }}" type="text" name="kdunit" id="kdunit" value="{{ old('kdunit', '') }}">
                @if($errors->has('kdunit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdunit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.kdunit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdprogram">{{ trans('cruds.dataRenja.fields.kdprogram') }}</label>
                <input class="form-control {{ $errors->has('kdprogram') ? 'is-invalid' : '' }}" type="text" name="kdprogram" id="kdprogram" value="{{ old('kdprogram', '') }}">
                @if($errors->has('kdprogram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdprogram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.kdprogram_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdgiat">{{ trans('cruds.dataRenja.fields.kdgiat') }}</label>
                <input class="form-control {{ $errors->has('kdgiat') ? 'is-invalid' : '' }}" type="text" name="kdgiat" id="kdgiat" value="{{ old('kdgiat', '') }}">
                @if($errors->has('kdgiat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdgiat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.kdgiat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdoutput">{{ trans('cruds.dataRenja.fields.kdoutput') }}</label>
                <input class="form-control {{ $errors->has('kdoutput') ? 'is-invalid' : '' }}" type="text" name="kdoutput" id="kdoutput" value="{{ old('kdoutput', '') }}">
                @if($errors->has('kdoutput'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdoutput') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.kdoutput_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdlokasi">{{ trans('cruds.dataRenja.fields.kdlokasi') }}</label>
                <input class="form-control {{ $errors->has('kdlokasi') ? 'is-invalid' : '' }}" type="text" name="kdlokasi" id="kdlokasi" value="{{ old('kdlokasi', '') }}">
                @if($errors->has('kdlokasi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdlokasi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.kdlokasi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdkabkota">{{ trans('cruds.dataRenja.fields.kdkabkota') }}</label>
                <input class="form-control {{ $errors->has('kdkabkota') ? 'is-invalid' : '' }}" type="text" name="kdkabkota" id="kdkabkota" value="{{ old('kdkabkota', '') }}">
                @if($errors->has('kdkabkota'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdkabkota') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.kdkabkota_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kddekon">{{ trans('cruds.dataRenja.fields.kddekon') }}</label>
                <input class="form-control {{ $errors->has('kddekon') ? 'is-invalid' : '' }}" type="text" name="kddekon" id="kddekon" value="{{ old('kddekon', '') }}">
                @if($errors->has('kddekon'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kddekon') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.kddekon_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdsoutput">{{ trans('cruds.dataRenja.fields.kdsoutput') }}</label>
                <input class="form-control {{ $errors->has('kdsoutput') ? 'is-invalid' : '' }}" type="text" name="kdsoutput" id="kdsoutput" value="{{ old('kdsoutput', '') }}">
                @if($errors->has('kdsoutput'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdsoutput') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.kdsoutput_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdkmpnen">{{ trans('cruds.dataRenja.fields.kdkmpnen') }}</label>
                <input class="form-control {{ $errors->has('kdkmpnen') ? 'is-invalid' : '' }}" type="text" name="kdkmpnen" id="kdkmpnen" value="{{ old('kdkmpnen', '') }}">
                @if($errors->has('kdkmpnen'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdkmpnen') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.kdkmpnen_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdskmpnen">{{ trans('cruds.dataRenja.fields.kdskmpnen') }}</label>
                <input class="form-control {{ $errors->has('kdskmpnen') ? 'is-invalid' : '' }}" type="text" name="kdskmpnen" id="kdskmpnen" value="{{ old('kdskmpnen', '') }}">
                @if($errors->has('kdskmpnen'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdskmpnen') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.kdskmpnen_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdakun">{{ trans('cruds.dataRenja.fields.kdakun') }}</label>
                <input class="form-control {{ $errors->has('kdakun') ? 'is-invalid' : '' }}" type="text" name="kdakun" id="kdakun" value="{{ old('kdakun', '') }}">
                @if($errors->has('kdakun'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdakun') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.kdakun_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdkppn">{{ trans('cruds.dataRenja.fields.kdkppn') }}</label>
                <input class="form-control {{ $errors->has('kdkppn') ? 'is-invalid' : '' }}" type="text" name="kdkppn" id="kdkppn" value="{{ old('kdkppn', '') }}">
                @if($errors->has('kdkppn'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdkppn') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.kdkppn_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdbeban">{{ trans('cruds.dataRenja.fields.kdbeban') }}</label>
                <input class="form-control {{ $errors->has('kdbeban') ? 'is-invalid' : '' }}" type="text" name="kdbeban" id="kdbeban" value="{{ old('kdbeban', '') }}">
                @if($errors->has('kdbeban'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdbeban') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.kdbeban_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdjnsban">{{ trans('cruds.dataRenja.fields.kdjnsban') }}</label>
                <input class="form-control {{ $errors->has('kdjnsban') ? 'is-invalid' : '' }}" type="text" name="kdjnsban" id="kdjnsban" value="{{ old('kdjnsban', '') }}">
                @if($errors->has('kdjnsban'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdjnsban') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.kdjnsban_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdctarik">{{ trans('cruds.dataRenja.fields.kdctarik') }}</label>
                <input class="form-control {{ $errors->has('kdctarik') ? 'is-invalid' : '' }}" type="text" name="kdctarik" id="kdctarik" value="{{ old('kdctarik', '') }}">
                @if($errors->has('kdctarik'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdctarik') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.kdctarik_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="register">{{ trans('cruds.dataRenja.fields.register') }}</label>
                <input class="form-control {{ $errors->has('register') ? 'is-invalid' : '' }}" type="text" name="register" id="register" value="{{ old('register', '') }}">
                @if($errors->has('register'))
                    <div class="invalid-feedback">
                        {{ $errors->first('register') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.register_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="carahitung">{{ trans('cruds.dataRenja.fields.carahitung') }}</label>
                <input class="form-control {{ $errors->has('carahitung') ? 'is-invalid' : '' }}" type="text" name="carahitung" id="carahitung" value="{{ old('carahitung', '') }}">
                @if($errors->has('carahitung'))
                    <div class="invalid-feedback">
                        {{ $errors->first('carahitung') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.carahitung_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="header1">{{ trans('cruds.dataRenja.fields.header1') }}</label>
                <input class="form-control {{ $errors->has('header1') ? 'is-invalid' : '' }}" type="text" name="header1" id="header1" value="{{ old('header1', '') }}">
                @if($errors->has('header1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('header1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.header1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="header2">{{ trans('cruds.dataRenja.fields.header2') }}</label>
                <input class="form-control {{ $errors->has('header2') ? 'is-invalid' : '' }}" type="text" name="header2" id="header2" value="{{ old('header2', '') }}">
                @if($errors->has('header2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('header2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.header2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdheader">{{ trans('cruds.dataRenja.fields.kdheader') }}</label>
                <input class="form-control {{ $errors->has('kdheader') ? 'is-invalid' : '' }}" type="text" name="kdheader" id="kdheader" value="{{ old('kdheader', '') }}">
                @if($errors->has('kdheader'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdheader') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.kdheader_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="noitem">{{ trans('cruds.dataRenja.fields.noitem') }}</label>
                <input class="form-control {{ $errors->has('noitem') ? 'is-invalid' : '' }}" type="number" name="noitem" id="noitem" value="{{ old('noitem', '') }}" step="1">
                @if($errors->has('noitem'))
                    <div class="invalid-feedback">
                        {{ $errors->first('noitem') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.noitem_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nmitem">{{ trans('cruds.dataRenja.fields.nmitem') }}</label>
                <input class="form-control {{ $errors->has('nmitem') ? 'is-invalid' : '' }}" type="text" name="nmitem" id="nmitem" value="{{ old('nmitem', '') }}">
                @if($errors->has('nmitem'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nmitem') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.nmitem_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vol1">{{ trans('cruds.dataRenja.fields.vol1') }}</label>
                <input class="form-control {{ $errors->has('vol1') ? 'is-invalid' : '' }}" type="number" name="vol1" id="vol1" value="{{ old('vol1', '') }}" step="0.01">
                @if($errors->has('vol1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vol1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.vol1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sat1">{{ trans('cruds.dataRenja.fields.sat1') }}</label>
                <input class="form-control {{ $errors->has('sat1') ? 'is-invalid' : '' }}" type="text" name="sat1" id="sat1" value="{{ old('sat1', '') }}">
                @if($errors->has('sat1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sat1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.sat1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vol2">{{ trans('cruds.dataRenja.fields.vol2') }}</label>
                <input class="form-control {{ $errors->has('vol2') ? 'is-invalid' : '' }}" type="number" name="vol2" id="vol2" value="{{ old('vol2', '') }}" step="0.01">
                @if($errors->has('vol2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vol2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.vol2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sat2">{{ trans('cruds.dataRenja.fields.sat2') }}</label>
                <input class="form-control {{ $errors->has('sat2') ? 'is-invalid' : '' }}" type="text" name="sat2" id="sat2" value="{{ old('sat2', '') }}">
                @if($errors->has('sat2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sat2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.sat2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vol3">{{ trans('cruds.dataRenja.fields.vol3') }}</label>
                <input class="form-control {{ $errors->has('vol3') ? 'is-invalid' : '' }}" type="number" name="vol3" id="vol3" value="{{ old('vol3', '') }}" step="0.01">
                @if($errors->has('vol3'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vol3') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.vol3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sat3">{{ trans('cruds.dataRenja.fields.sat3') }}</label>
                <input class="form-control {{ $errors->has('sat3') ? 'is-invalid' : '' }}" type="text" name="sat3" id="sat3" value="{{ old('sat3', '') }}">
                @if($errors->has('sat3'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sat3') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.sat3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vol4">{{ trans('cruds.dataRenja.fields.vol4') }}</label>
                <input class="form-control {{ $errors->has('vol4') ? 'is-invalid' : '' }}" type="number" name="vol4" id="vol4" value="{{ old('vol4', '') }}" step="0.01">
                @if($errors->has('vol4'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vol4') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.vol4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sat4">{{ trans('cruds.dataRenja.fields.sat4') }}</label>
                <input class="form-control {{ $errors->has('sat4') ? 'is-invalid' : '' }}" type="text" name="sat4" id="sat4" value="{{ old('sat4', '') }}">
                @if($errors->has('sat4'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sat4') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.sat4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="volkeg">{{ trans('cruds.dataRenja.fields.volkeg') }}</label>
                <input class="form-control {{ $errors->has('volkeg') ? 'is-invalid' : '' }}" type="number" name="volkeg" id="volkeg" value="{{ old('volkeg', '') }}" step="0.01">
                @if($errors->has('volkeg'))
                    <div class="invalid-feedback">
                        {{ $errors->first('volkeg') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.volkeg_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="satkeg">{{ trans('cruds.dataRenja.fields.satkeg') }}</label>
                <input class="form-control {{ $errors->has('satkeg') ? 'is-invalid' : '' }}" type="text" name="satkeg" id="satkeg" value="{{ old('satkeg', '') }}">
                @if($errors->has('satkeg'))
                    <div class="invalid-feedback">
                        {{ $errors->first('satkeg') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.satkeg_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hargasat">{{ trans('cruds.dataRenja.fields.hargasat') }}</label>
                <input class="form-control {{ $errors->has('hargasat') ? 'is-invalid' : '' }}" type="number" name="hargasat" id="hargasat" value="{{ old('hargasat', '') }}" step="0.01">
                @if($errors->has('hargasat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hargasat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.hargasat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jumlah">{{ trans('cruds.dataRenja.fields.jumlah') }}</label>
                <input class="form-control {{ $errors->has('jumlah') ? 'is-invalid' : '' }}" type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', '') }}" step="0.01">
                @if($errors->has('jumlah'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jumlah') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.jumlah_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jumlah2">{{ trans('cruds.dataRenja.fields.jumlah2') }}</label>
                <input class="form-control {{ $errors->has('jumlah2') ? 'is-invalid' : '' }}" type="number" name="jumlah2" id="jumlah2" value="{{ old('jumlah2', '') }}" step="0.01">
                @if($errors->has('jumlah2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jumlah2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.jumlah2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="paguphln">{{ trans('cruds.dataRenja.fields.paguphln') }}</label>
                <input class="form-control {{ $errors->has('paguphln') ? 'is-invalid' : '' }}" type="text" name="paguphln" id="paguphln" value="{{ old('paguphln', '') }}">
                @if($errors->has('paguphln'))
                    <div class="invalid-feedback">
                        {{ $errors->first('paguphln') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.paguphln_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pagurmp">{{ trans('cruds.dataRenja.fields.pagurmp') }}</label>
                <input class="form-control {{ $errors->has('pagurmp') ? 'is-invalid' : '' }}" type="text" name="pagurmp" id="pagurmp" value="{{ old('pagurmp', '') }}">
                @if($errors->has('pagurmp'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pagurmp') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.pagurmp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pagurkp">{{ trans('cruds.dataRenja.fields.pagurkp') }}</label>
                <input class="form-control {{ $errors->has('pagurkp') ? 'is-invalid' : '' }}" type="text" name="pagurkp" id="pagurkp" value="{{ old('pagurkp', '') }}">
                @if($errors->has('pagurkp'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pagurkp') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.pagurkp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdblokir">{{ trans('cruds.dataRenja.fields.kdblokir') }}</label>
                <input class="form-control {{ $errors->has('kdblokir') ? 'is-invalid' : '' }}" type="text" name="kdblokir" id="kdblokir" value="{{ old('kdblokir', '') }}">
                @if($errors->has('kdblokir'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdblokir') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.kdblokir_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="blokirphln">{{ trans('cruds.dataRenja.fields.blokirphln') }}</label>
                <input class="form-control {{ $errors->has('blokirphln') ? 'is-invalid' : '' }}" type="text" name="blokirphln" id="blokirphln" value="{{ old('blokirphln', '') }}">
                @if($errors->has('blokirphln'))
                    <div class="invalid-feedback">
                        {{ $errors->first('blokirphln') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.blokirphln_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="blokirrmp">{{ trans('cruds.dataRenja.fields.blokirrmp') }}</label>
                <input class="form-control {{ $errors->has('blokirrmp') ? 'is-invalid' : '' }}" type="text" name="blokirrmp" id="blokirrmp" value="{{ old('blokirrmp', '') }}">
                @if($errors->has('blokirrmp'))
                    <div class="invalid-feedback">
                        {{ $errors->first('blokirrmp') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.blokirrmp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="blokirrkp">{{ trans('cruds.dataRenja.fields.blokirrkp') }}</label>
                <input class="form-control {{ $errors->has('blokirrkp') ? 'is-invalid' : '' }}" type="text" name="blokirrkp" id="blokirrkp" value="{{ old('blokirrkp', '') }}">
                @if($errors->has('blokirrkp'))
                    <div class="invalid-feedback">
                        {{ $errors->first('blokirrkp') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.blokirrkp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rphblokir">{{ trans('cruds.dataRenja.fields.rphblokir') }}</label>
                <input class="form-control {{ $errors->has('rphblokir') ? 'is-invalid' : '' }}" type="text" name="rphblokir" id="rphblokir" value="{{ old('rphblokir', '') }}">
                @if($errors->has('rphblokir'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rphblokir') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.rphblokir_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdcopy">{{ trans('cruds.dataRenja.fields.kdcopy') }}</label>
                <input class="form-control {{ $errors->has('kdcopy') ? 'is-invalid' : '' }}" type="text" name="kdcopy" id="kdcopy" value="{{ old('kdcopy', '') }}">
                @if($errors->has('kdcopy'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdcopy') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.kdcopy_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdabt">{{ trans('cruds.dataRenja.fields.kdabt') }}</label>
                <input class="form-control {{ $errors->has('kdabt') ? 'is-invalid' : '' }}" type="text" name="kdabt" id="kdabt" value="{{ old('kdabt', '') }}">
                @if($errors->has('kdabt'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdabt') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.kdabt_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdsbu">{{ trans('cruds.dataRenja.fields.kdsbu') }}</label>
                <input class="form-control {{ $errors->has('kdsbu') ? 'is-invalid' : '' }}" type="text" name="kdsbu" id="kdsbu" value="{{ old('kdsbu', '') }}">
                @if($errors->has('kdsbu'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdsbu') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.kdsbu_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="volsbk">{{ trans('cruds.dataRenja.fields.volsbk') }}</label>
                <input class="form-control {{ $errors->has('volsbk') ? 'is-invalid' : '' }}" type="number" name="volsbk" id="volsbk" value="{{ old('volsbk', '') }}" step="0.01">
                @if($errors->has('volsbk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('volsbk') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.volsbk_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="volrkakl">{{ trans('cruds.dataRenja.fields.volrkakl') }}</label>
                <input class="form-control {{ $errors->has('volrkakl') ? 'is-invalid' : '' }}" type="number" name="volrkakl" id="volrkakl" value="{{ old('volrkakl', '') }}" step="0.01">
                @if($errors->has('volrkakl'))
                    <div class="invalid-feedback">
                        {{ $errors->first('volrkakl') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.volrkakl_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="blnkontrak">{{ trans('cruds.dataRenja.fields.blnkontrak') }}</label>
                <input class="form-control {{ $errors->has('blnkontrak') ? 'is-invalid' : '' }}" type="text" name="blnkontrak" id="blnkontrak" value="{{ old('blnkontrak', '') }}">
                @if($errors->has('blnkontrak'))
                    <div class="invalid-feedback">
                        {{ $errors->first('blnkontrak') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.blnkontrak_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nokontrak">{{ trans('cruds.dataRenja.fields.nokontrak') }}</label>
                <input class="form-control {{ $errors->has('nokontrak') ? 'is-invalid' : '' }}" type="text" name="nokontrak" id="nokontrak" value="{{ old('nokontrak', '') }}">
                @if($errors->has('nokontrak'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nokontrak') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.nokontrak_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tgkontrak">{{ trans('cruds.dataRenja.fields.tgkontrak') }}</label>
                <input class="form-control {{ $errors->has('tgkontrak') ? 'is-invalid' : '' }}" type="text" name="tgkontrak" id="tgkontrak" value="{{ old('tgkontrak', '') }}">
                @if($errors->has('tgkontrak'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tgkontrak') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.tgkontrak_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nilkontrak">{{ trans('cruds.dataRenja.fields.nilkontrak') }}</label>
                <input class="form-control {{ $errors->has('nilkontrak') ? 'is-invalid' : '' }}" type="text" name="nilkontrak" id="nilkontrak" value="{{ old('nilkontrak', '') }}">
                @if($errors->has('nilkontrak'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nilkontrak') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.nilkontrak_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="januari">{{ trans('cruds.dataRenja.fields.januari') }}</label>
                <input class="form-control {{ $errors->has('januari') ? 'is-invalid' : '' }}" type="text" name="januari" id="januari" value="{{ old('januari', '') }}">
                @if($errors->has('januari'))
                    <div class="invalid-feedback">
                        {{ $errors->first('januari') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.januari_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pebruari">{{ trans('cruds.dataRenja.fields.pebruari') }}</label>
                <input class="form-control {{ $errors->has('pebruari') ? 'is-invalid' : '' }}" type="text" name="pebruari" id="pebruari" value="{{ old('pebruari', '') }}">
                @if($errors->has('pebruari'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pebruari') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.pebruari_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="maret">{{ trans('cruds.dataRenja.fields.maret') }}</label>
                <input class="form-control {{ $errors->has('maret') ? 'is-invalid' : '' }}" type="text" name="maret" id="maret" value="{{ old('maret', '') }}">
                @if($errors->has('maret'))
                    <div class="invalid-feedback">
                        {{ $errors->first('maret') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.maret_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="april">{{ trans('cruds.dataRenja.fields.april') }}</label>
                <input class="form-control {{ $errors->has('april') ? 'is-invalid' : '' }}" type="text" name="april" id="april" value="{{ old('april', '') }}">
                @if($errors->has('april'))
                    <div class="invalid-feedback">
                        {{ $errors->first('april') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.april_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mei">{{ trans('cruds.dataRenja.fields.mei') }}</label>
                <input class="form-control {{ $errors->has('mei') ? 'is-invalid' : '' }}" type="text" name="mei" id="mei" value="{{ old('mei', '') }}">
                @if($errors->has('mei'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mei') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.mei_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="juni">{{ trans('cruds.dataRenja.fields.juni') }}</label>
                <input class="form-control {{ $errors->has('juni') ? 'is-invalid' : '' }}" type="text" name="juni" id="juni" value="{{ old('juni', '') }}">
                @if($errors->has('juni'))
                    <div class="invalid-feedback">
                        {{ $errors->first('juni') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.juni_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="juli">{{ trans('cruds.dataRenja.fields.juli') }}</label>
                <input class="form-control {{ $errors->has('juli') ? 'is-invalid' : '' }}" type="text" name="juli" id="juli" value="{{ old('juli', '') }}">
                @if($errors->has('juli'))
                    <div class="invalid-feedback">
                        {{ $errors->first('juli') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.juli_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="agustus">{{ trans('cruds.dataRenja.fields.agustus') }}</label>
                <input class="form-control {{ $errors->has('agustus') ? 'is-invalid' : '' }}" type="text" name="agustus" id="agustus" value="{{ old('agustus', '') }}">
                @if($errors->has('agustus'))
                    <div class="invalid-feedback">
                        {{ $errors->first('agustus') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.agustus_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="september">{{ trans('cruds.dataRenja.fields.september') }}</label>
                <input class="form-control {{ $errors->has('september') ? 'is-invalid' : '' }}" type="text" name="september" id="september" value="{{ old('september', '') }}">
                @if($errors->has('september'))
                    <div class="invalid-feedback">
                        {{ $errors->first('september') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.september_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="oktober">{{ trans('cruds.dataRenja.fields.oktober') }}</label>
                <input class="form-control {{ $errors->has('oktober') ? 'is-invalid' : '' }}" type="text" name="oktober" id="oktober" value="{{ old('oktober', '') }}">
                @if($errors->has('oktober'))
                    <div class="invalid-feedback">
                        {{ $errors->first('oktober') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.oktober_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nopember">{{ trans('cruds.dataRenja.fields.nopember') }}</label>
                <input class="form-control {{ $errors->has('nopember') ? 'is-invalid' : '' }}" type="text" name="nopember" id="nopember" value="{{ old('nopember', '') }}">
                @if($errors->has('nopember'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nopember') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.nopember_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="desember">{{ trans('cruds.dataRenja.fields.desember') }}</label>
                <input class="form-control {{ $errors->has('desember') ? 'is-invalid' : '' }}" type="text" name="desember" id="desember" value="{{ old('desember', '') }}">
                @if($errors->has('desember'))
                    <div class="invalid-feedback">
                        {{ $errors->first('desember') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.desember_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jmltunda">{{ trans('cruds.dataRenja.fields.jmltunda') }}</label>
                <input class="form-control {{ $errors->has('jmltunda') ? 'is-invalid' : '' }}" type="text" name="jmltunda" id="jmltunda" value="{{ old('jmltunda', '') }}">
                @if($errors->has('jmltunda'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jmltunda') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.jmltunda_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdluncuran">{{ trans('cruds.dataRenja.fields.kdluncuran') }}</label>
                <input class="form-control {{ $errors->has('kdluncuran') ? 'is-invalid' : '' }}" type="text" name="kdluncuran" id="kdluncuran" value="{{ old('kdluncuran', '') }}">
                @if($errors->has('kdluncuran'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdluncuran') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.kdluncuran_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jmlabt">{{ trans('cruds.dataRenja.fields.jmlabt') }}</label>
                <input class="form-control {{ $errors->has('jmlabt') ? 'is-invalid' : '' }}" type="text" name="jmlabt" id="jmlabt" value="{{ old('jmlabt', '') }}">
                @if($errors->has('jmlabt'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jmlabt') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.jmlabt_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="norev">{{ trans('cruds.dataRenja.fields.norev') }}</label>
                <input class="form-control {{ $errors->has('norev') ? 'is-invalid' : '' }}" type="text" name="norev" id="norev" value="{{ old('norev', '') }}">
                @if($errors->has('norev'))
                    <div class="invalid-feedback">
                        {{ $errors->first('norev') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.norev_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdubah">{{ trans('cruds.dataRenja.fields.kdubah') }}</label>
                <input class="form-control {{ $errors->has('kdubah') ? 'is-invalid' : '' }}" type="text" name="kdubah" id="kdubah" value="{{ old('kdubah', '') }}">
                @if($errors->has('kdubah'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdubah') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.kdubah_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kurs">{{ trans('cruds.dataRenja.fields.kurs') }}</label>
                <input class="form-control {{ $errors->has('kurs') ? 'is-invalid' : '' }}" type="number" name="kurs" id="kurs" value="{{ old('kurs', '') }}" step="0.01">
                @if($errors->has('kurs'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kurs') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.kurs_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="indexkpjm">{{ trans('cruds.dataRenja.fields.indexkpjm') }}</label>
                <input class="form-control {{ $errors->has('indexkpjm') ? 'is-invalid' : '' }}" type="number" name="indexkpjm" id="indexkpjm" value="{{ old('indexkpjm', '') }}" step="0.0001">
                @if($errors->has('indexkpjm'))
                    <div class="invalid-feedback">
                        {{ $errors->first('indexkpjm') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.indexkpjm_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdib">{{ trans('cruds.dataRenja.fields.kdib') }}</label>
                <input class="form-control {{ $errors->has('kdib') ? 'is-invalid' : '' }}" type="text" name="kdib" id="kdib" value="{{ old('kdib', '') }}">
                @if($errors->has('kdib'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdib') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataRenja.fields.kdib_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection