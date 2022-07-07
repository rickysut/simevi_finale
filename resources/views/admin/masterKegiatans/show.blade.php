@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="card">
    <!--div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.masterKegiatan.title') }}
    </div-->

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.master-kegiatans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.masterKegiatan.fields.kddept') }}
                        </th>
                        <td>
                            {{ $masterKegiatan->kddept }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.masterKegiatan.fields.kdunit') }}
                        </th>
                        <td>
                            {{ $masterKegiatan->kdunit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.masterKegiatan.fields.kd_kegiatan') }}
                        </th>
                        <td>
                            {{ $masterKegiatan->kd_kegiatan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.masterKegiatan.fields.direktorat') }}
                        </th>
                        <td>
                            {{ $masterKegiatan->direktorat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.masterKegiatan.fields.nomenklatur_giat') }}
                        </th>
                        <td>
                            {{ $masterKegiatan->nomenklatur_giat }}
                        </td>
                    </tr>
                    
                    <tr>
                        <th>
                            {{ trans('cruds.masterKegiatan.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\MasterKegiatan::STATUS_SELECT[$masterKegiatan->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.master-kegiatans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection