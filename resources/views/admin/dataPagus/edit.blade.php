@extends('layouts.admin')
@section('content')
@include('partials.subheaderform')
<div class="card">
    

    <div class="card-body">
        <form method="POST" action="{{ route("admin.data-pagus.update", [$dataPagu->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="tahun">{{ trans('cruds.dataPagu.fields.tahun') }}</label>
                <input class="form-control {{ $errors->has('tahun') ? 'is-invalid' : '' }}" type="text" name="tahun" id="tahun" value="{{ old('tahun', $dataPagu->tahun) }}" required>
                @if($errors->has('tahun'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tahun') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataPagu.fields.kdsatker_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdsatker">{{ trans('cruds.dataPagu.fields.kdsatker') }}</label>
                <input class="form-control {{ $errors->has('kdsatker') ? 'is-invalid' : '' }}" type="text" name="kdsatker" id="kdsatker" value="{{ old('kdsatker', $dataPagu->kdsatker) }}">
                @if($errors->has('kdsatker'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdsatker') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataPagu.fields.kdsatker_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ba">{{ trans('cruds.dataPagu.fields.ba') }}</label>
                <input class="form-control {{ $errors->has('ba') ? 'is-invalid' : '' }}" type="text" name="ba" id="ba" value="{{ old('ba', $dataPagu->ba) }}">
                @if($errors->has('ba'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ba') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataPagu.fields.ba_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="baes_1">{{ trans('cruds.dataPagu.fields.baes_1') }}</label>
                <input class="form-control {{ $errors->has('baes_1') ? 'is-invalid' : '' }}" type="text" name="baes_1" id="baes_1" value="{{ old('baes_1', $dataPagu->baes_1) }}">
                @if($errors->has('baes_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('baes_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataPagu.fields.baes_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="akun">{{ trans('cruds.dataPagu.fields.akun') }}</label>
                <input class="form-control {{ $errors->has('akun') ? 'is-invalid' : '' }}" type="text" name="akun" id="akun" value="{{ old('akun', $dataPagu->akun) }}">
                @if($errors->has('akun'))
                    <div class="invalid-feedback">
                        {{ $errors->first('akun') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataPagu.fields.akun_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="program">{{ trans('cruds.dataPagu.fields.program') }}</label>
                <input class="form-control {{ $errors->has('program') ? 'is-invalid' : '' }}" type="text" name="program" id="program" value="{{ old('program', $dataPagu->program) }}">
                @if($errors->has('program'))
                    <div class="invalid-feedback">
                        {{ $errors->first('program') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataPagu.fields.program_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kegiatan">{{ trans('cruds.dataPagu.fields.kegiatan') }}</label>
                <input class="form-control {{ $errors->has('kegiatan') ? 'is-invalid' : '' }}" type="text" name="kegiatan" id="kegiatan" value="{{ old('kegiatan', $dataPagu->kegiatan) }}">
                @if($errors->has('kegiatan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kegiatan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataPagu.fields.kegiatan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="output">{{ trans('cruds.dataPagu.fields.output') }}</label>
                <input class="form-control {{ $errors->has('output') ? 'is-invalid' : '' }}" type="text" name="output" id="output" value="{{ old('output', $dataPagu->output) }}">
                @if($errors->has('output'))
                    <div class="invalid-feedback">
                        {{ $errors->first('output') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataPagu.fields.output_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kewenangan">{{ trans('cruds.dataPagu.fields.kewenangan') }}</label>
                <input class="form-control {{ $errors->has('kewenangan') ? 'is-invalid' : '' }}" type="text" name="kewenangan" id="kewenangan" value="{{ old('kewenangan', $dataPagu->kewenangan) }}">
                @if($errors->has('kewenangan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kewenangan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataPagu.fields.kewenangan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sumber_dana">{{ trans('cruds.dataPagu.fields.sumber_dana') }}</label>
                <input class="form-control {{ $errors->has('sumber_dana') ? 'is-invalid' : '' }}" type="text" name="sumber_dana" id="sumber_dana" value="{{ old('sumber_dana', $dataPagu->sumber_dana) }}">
                @if($errors->has('sumber_dana'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sumber_dana') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataPagu.fields.sumber_dana_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cara_tarik">{{ trans('cruds.dataPagu.fields.cara_tarik') }}</label>
                <input class="form-control {{ $errors->has('cara_tarik') ? 'is-invalid' : '' }}" type="text" name="cara_tarik" id="cara_tarik" value="{{ old('cara_tarik', $dataPagu->cara_tarik) }}">
                @if($errors->has('cara_tarik'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cara_tarik') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataPagu.fields.cara_tarik_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kdregister">{{ trans('cruds.dataPagu.fields.kdregister') }}</label>
                <input class="form-control {{ $errors->has('kdregister') ? 'is-invalid' : '' }}" type="text" name="kdregister" id="kdregister" value="{{ old('kdregister', $dataPagu->kdregister) }}">
                @if($errors->has('kdregister'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kdregister') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataPagu.fields.kdregister_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lokasi">{{ trans('cruds.dataPagu.fields.lokasi') }}</label>
                <input class="form-control {{ $errors->has('lokasi') ? 'is-invalid' : '' }}" type="text" name="lokasi" id="lokasi" value="{{ old('lokasi', $dataPagu->lokasi) }}">
                @if($errors->has('lokasi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lokasi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataPagu.fields.lokasi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="budget_type">{{ trans('cruds.dataPagu.fields.budget_type') }}</label>
                <input class="form-control {{ $errors->has('budget_type') ? 'is-invalid' : '' }}" type="text" name="budget_type" id="budget_type" value="{{ old('budget_type', $dataPagu->budget_type) }}">
                @if($errors->has('budget_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('budget_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataPagu.fields.budget_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.dataPagu.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $dataPagu->amount) }}" step="0.01" required>
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dataPagu.fields.amount_helper') }}</span>
            </div>
            <button class="btn btn-success" type="submit">
                {{ trans('global.save') }}
            </button>
            <a class="btn btn-danger" href="{{ route('admin.data-pagus.index') }}">
                {{ trans('global.cancel') }}
            </a>
        </form>
    </div>
</div>



@endsection