@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="row">
	<div class="col-12">
		<div id="panel-1" class="panel panel-lock show" data-panel-sortable data-panel-close data-panel-collapsed>
			<div class="panel-hdr">
				<h2>
					{{ trans('cruds.rincianOutput.title') }} | <span class="fw-300"><i>Detail</i></span>
				</h2>
				<div class="panel-toolbar">
					<a class="btn btn-xs btn-primary mr-2" href="{{ route('admin.rincian-outputs.index') }}">
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
                                            {{ trans('cruds.rincianOutput.fields.idoutp') }}
                                        </th>
                                        <td>
                                            {{ $rincianOutput->idoutp }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.rincianOutput.fields.idoutp_1') }}
                                        </th>
                                        <td>
                                            {{ $rincianOutput->idoutp_1 }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.rincianOutput.fields.kdgiat') }}
                                        </th>
                                        <td>
                                            {{ $rincianOutput->kdgiat }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.rincianOutput.fields.kdoutput') }}
                                        </th>
                                        <td>
                                            {{ $rincianOutput->kdoutput }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.rincianOutput.fields.nmoutput') }}
                                        </th>
                                        <td>
                                            {{ $rincianOutput->nmoutput }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.rincianOutput.fields.sat') }}
                                        </th>
                                        <td>
                                            {{ $rincianOutput->sat }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.rincianOutput.fields.kdsum') }}
                                        </th>
                                        <td>
                                            {{ $rincianOutput->kdsum }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.rincianOutput.fields.thnawal') }}
                                        </th>
                                        <td>
                                            {{ $rincianOutput->thnawal }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.rincianOutput.fields.thnakhir') }}
                                        </th>
                                        <td>
                                            {{ $rincianOutput->thnakhir }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.rincianOutput.fields.kdmulti') }}
                                        </th>
                                        <td>
                                            {{ $rincianOutput->kdmulti }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.rincianOutput.fields.kdjnsout') }}
                                        </th>
                                        <td>
                                            {{ $rincianOutput->kdjnsout }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.rincianOutput.fields.kdikk') }}
                                        </th>
                                        <td>
                                            {{ $rincianOutput->kdikk }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.rincianOutput.fields.kdtema') }}
                                        </th>
                                        <td>
                                            {{ $rincianOutput->kdtema }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.rincianOutput.fields.kdcttout') }}
                                        </th>
                                        <td>
                                            {{ $rincianOutput->kdcttout }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.rincianOutput.fields.thang') }}
                                        </th>
                                        <td>
                                            {{ $rincianOutput->thang }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.rincianOutput.fields.kdpn') }}
                                        </th>
                                        <td>
                                            {{ $rincianOutput->kdpn }}
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