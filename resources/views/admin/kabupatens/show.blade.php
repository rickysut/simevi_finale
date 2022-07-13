@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="row">
	<div class="col-12">
		<div id="panel-1" class="panel panel-lock show" data-panel-sortable data-panel-close data-panel-collapsed>
			<div class="panel-hdr">
				<h2>
					{{ trans('cruds.kabupaten.title') }} | <span class="fw-300"><i>Detail</i></span>
				</h2>
				<div class="panel-toolbar">
					<a class="btn btn-xs btn-primary mr-2" href="{{ route('admin.kabupatens.index') }}">
						{{ trans('global.back_to_list') }}
					</a>
				</div>
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<div class="row">
						<div class="col-12">

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
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection