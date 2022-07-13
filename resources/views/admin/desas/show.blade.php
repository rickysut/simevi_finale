@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="row">
	<div class="col-12">
		<div id="panel-1" class="panel panel-lock show" data-panel-sortable data-panel-close data-panel-collapsed>
			<div class="panel-hdr">
				<h2>
					{{ trans('cruds.desa.title') }} | <span class="fw-300"><i>Detail</i></span>
				</h2>
				<div class="panel-toolbar">
					<a class="btn btn-xs btn-primary mr-2" href="{{ route('admin.desas.index') }}">
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
                                            {{ trans('cruds.desa.fields.kd_kec') }}
                                        </th>
                                        <td>
                                            {{ $desa->kd_kec->kd_kec.' - '.$desa->kd_kec->nm_kec ?? '' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.desa.fields.kd_desa') }}
                                        </th>
                                        <td>
                                            {{ $desa->kd_desa }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.desa.fields.nm_desa') }}
                                        </th>
                                        <td>
                                            {{ $desa->nm_desa }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.desa.fields.kd_bast') }}
                                        </th>
                                        <td>
                                            {{ $desa->kd_bast }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.desa.fields.lat') }}
                                        </th>
                                        <td>
                                            {{ $desa->lat }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.desa.fields.lng') }}
                                        </th>
                                        <td>
                                            {{ $desa->lng }}
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