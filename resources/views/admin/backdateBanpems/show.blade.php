@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="row">
	<div class="col-12">
		<div id="panel-1" class="panel panel-lock show" data-panel-sortable data-panel-close data-panel-collapsed>
			<div class="panel-hdr">
				<h2>
					{{ trans('cruds.backdateBanpem.title') }} | <span class="fw-300"><i>Detail</i></span>
				</h2>
				<div class="panel-toolbar">
					<a class="btn btn-xs btn-primary mr-2" href="{{ route('admin.backdate-banpems.index') }}">
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
                                            {{ trans('cruds.backdateBanpem.fields.year') }}
                                        </th>
                                        <td>
                                            {{ $backdateBanpem->year }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.backdateBanpem.fields.kd_satker') }}
                                        </th>
                                        <td>
                                            {{ $backdateBanpem->kd_satker }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.backdateBanpem.fields.provinsi') }}
                                        </th>
                                        <td>
                                            {{ $backdateBanpem->provinsi }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.backdateBanpem.fields.kab_kota') }}
                                        </th>
                                        <td>
                                            {{ $backdateBanpem->kab_kota }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.backdateBanpem.fields.nm_gapoktan') }}
                                        </th>
                                        <td>
                                            {{ $backdateBanpem->nm_gapoktan }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.backdateBanpem.fields.nm_barang') }}
                                        </th>
                                        <td>
                                            {{ $backdateBanpem->nm_barang }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.backdateBanpem.fields.total') }}
                                        </th>
                                        <td>
                                            {{ $backdateBanpem->total }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.backdateBanpem.fields.satuan') }}
                                        </th>
                                        <td>
                                            {{ $backdateBanpem->satuan }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.backdateBanpem.fields.nominal') }}
                                        </th>
                                        <td>
                                            {{ $backdateBanpem->nominal }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.backdateBanpem.fields.kd_giat') }}
                                        </th>
                                        <td>
                                            {{ $backdateBanpem->kd_giat }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.backdateBanpem.fields.kd_akun') }}
                                        </th>
                                        <td>
                                            {{ $backdateBanpem->kd_akun }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.backdateBanpem.fields.kwn') }}
                                        </th>
                                        <td>
                                            {{ $backdateBanpem->kwn }}
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