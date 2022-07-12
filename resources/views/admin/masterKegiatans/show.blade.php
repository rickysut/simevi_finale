@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="row">
	<div class="col-12">
		<div id="panel-1" class="panel panel-lock show" data-panel-sortable data-panel-close data-panel-collapsed>
			<div class="panel-hdr">
				<h2>
					{{ trans('cruds.masterKegiatan.title') }} | <span class="fw-300"><i>Detail</i></span>
				</h2>
				<div class="panel-toolbar">
					<a class="btn btn-xs btn-primary mr-2" href="{{ route('admin.master-kegiatans.index') }}">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection