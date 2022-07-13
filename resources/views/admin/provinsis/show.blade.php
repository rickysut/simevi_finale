@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="row">
	<div class="col-12">
		<div id="panel-1" class="panel panel-lock show" data-panel-sortable data-panel-close data-panel-collapsed>
			<div class="panel-hdr">
				<h2>
					{{ trans('cruds.provinsi.title') }} | <span class="fw-300"><i>Detail</i></span>
				</h2>
				<div class="panel-toolbar">
					<a class="btn btn-xs btn-primary mr-2" href="{{ route('admin.provinsis.index') }}">
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
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection