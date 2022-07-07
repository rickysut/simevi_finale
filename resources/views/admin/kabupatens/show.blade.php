@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="card">
    <!--div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.kabupaten.title') }}
    </div-->

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.kabupatens.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.kabupaten.fields.kd_prop') }}
                        </th>
                        <td>
                            {{ $kabupaten->kd_prop->kd_prop.' - '.$kabupaten->kd_prop->nm_prop ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kabupaten.fields.kd_kab') }}
                        </th>
                        <td>
                            {{ $kabupaten->kd_kab }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kabupaten.fields.nama_kab') }}
                        </th>
                        <td>
                            {{ $kabupaten->nama_kab }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kabupaten.fields.kd_dt1') }}
                        </th>
                        <td>
                            {{ $kabupaten->kd_dt1.' - '.$kabupaten->kd_prop->nm_prop ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kabupaten.fields.kd_dt2') }}
                        </th>
                        <td>
                            {{ $kabupaten->kd_dt2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kabupaten.fields.kd_bast') }}
                        </th>
                        <td>
                            {{ $kabupaten->kd_bast }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kabupaten.fields.kd_bast') }}
                        </th>
                        <td>
                            {{ $kabupaten->kd_bast }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kabupaten.fields.lat') }}
                        </th>
                        <td>
                            {{ $kabupaten->lat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kabupaten.fields.lng') }}
                        </th>
                        <td>
                            {{ $kabupaten->lng }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kabupaten.fields.kd_kemenkeu') }}
                        </th>
                        <td>
                            {{ $kabupaten->kemenkeu }}
                        </td>
                    </tr>
                    
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.kabupatens.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection