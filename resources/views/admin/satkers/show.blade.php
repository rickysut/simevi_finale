@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="row">
	<div class="col-12">
		<div id="panel-1" class="panel panel-lock show" data-panel-sortable data-panel-close data-panel-collapsed>
			<div class="panel-hdr">
				<h2>
					{{ trans('cruds.satker.title') }} | <span class="fw-300"><i>Detail</i></span>
				</h2>
				<div class="panel-toolbar">
					<a class="btn btn-xs btn-primary mr-2" href="{{ route('admin.satkers.index') }}">
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
                                            {{ trans('cruds.satker.fields.kd_satker') }}
                                        </th>
                                        <td>
                                            {{ $satker->kd_satker }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.satker.fields.nm_satker') }}
                                        </th>
                                        <td>
                                            {{ $satker->nm_satker }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.satker.fields.kd_kwn') }}
                                        </th>
                                        <td>
                                            {{ $satker->kd_kwn }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.satker.fields.kwn') }}
                                        </th>
                                        <td>
                                            {{ $satker->kwn }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.satker.fields.tingkat') }}
                                        </th>
                                        <td>
                                            {{ $satker->tingkat }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.satker.fields.status') }}
                                        </th>
                                        <td>
                                            {{ App\Models\Satker::STATUS_SELECT[$satker->status] ?? '' }}
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