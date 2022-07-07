@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="card">
    <!--div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.provinsi.title') }}
    </div-->

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.provinsis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.provinsi.fields.kd_prop') }}
                        </th>
                        <td>
                            {{ $provinsi->kd_prop }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provinsi.fields.kd_dt1') }}
                        </th>
                        <td>
                            {{ $provinsi->kd_dt1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provinsi.fields.nm_prop') }}
                        </th>
                        <td>
                            {{ $provinsi->nm_prop }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provinsi.fields.kd_bast') }}
                        </th>
                        <td>
                            {{ $provinsi->kd_bast }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provinsi.fields.lat') }}
                        </th>
                        <td>
                            {{ $provinsi->lat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.provinsi.fields.lng') }}
                        </th>
                        <td>
                            {{ $provinsi->lng }}
                        </td>
                    </tr>
                    
                    <tr>
                        <th>
                            {{ trans('cruds.provinsi.fields.kd_kemenkeu') }}
                        </th>
                        <td>
                            {{ $provinsi->kd_kemenkeu }}
                        </td>
                    </tr>
                    
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.provinsis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection