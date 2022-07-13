@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="row">
	<div class="col-12">
		<div id="panel-1" class="panel panel-lock show" data-panel-sortable data-panel-close data-panel-collapsed>
			<div class="panel-hdr">
				<h2>
					{{ trans('cruds.kecamatan.title') }} | <span class="fw-300"><i>Detail</i></span>
				</h2>
				<div class="panel-toolbar">
					<a class="btn btn-xs btn-primary mr-2" href="{{ route('admin.kecamatans.index') }}">
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
                                            {{ trans('cruds.kecamatan.fields.kd_kab') }}
                                        </th>
                                        <td>
                                            @if (!empty($kecamatan->kd_kab->kd_kab))
                                                {{ $kecamatan->kd_kab->kd_kab .' - '. $kecamatan->kd_kab->nama_kab ?? '' }}    
                                            @else
                                                -
                                            @endif
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.kecamatan.fields.kd_kec') }}
                                        </th>
                                        <td>
                                            {{ $kecamatan->kd_kec }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.kecamatan.fields.nm_kec') }}
                                        </th>
                                        <td>
                                            {{ $kecamatan->nm_kec }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.kecamatan.fields.kd_bast') }}
                                        </th>
                                        <td>
                                            {{ $kecamatan->kd_bast }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.kecamatan.fields.lat') }}
                                        </th>
                                        <td>
                                            {{ $kecamatan->lat }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.kecamatan.fields.lng') }}
                                        </th>
                                        <td>
                                            {{ $kecamatan->lng }}
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