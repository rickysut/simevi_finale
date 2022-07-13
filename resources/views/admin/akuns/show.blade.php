@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="row">
	<div class="col-12">
		<div id="panel-1" class="panel panel-lock show" data-panel-sortable data-panel-close data-panel-collapsed>
			<div class="panel-hdr">
				<h2>
					{{ trans('cruds.akun.title') }} | <span class="fw-300"><i>Detail</i></span>
				</h2>
				<div class="panel-toolbar">
					<a class="btn btn-xs btn-primary mr-2" href="{{ route('admin.akuns.index') }}">
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
                                            {{ trans('cruds.akun.fields.kd_akun') }}
                                        </th>
                                        <td>
                                            {{ $akun->kd_akun }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.akun.fields.nama_akun') }}
                                        </th>
                                        <td>
                                            {{ $akun->nama_akun }}
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th>
                                            {{ trans('cruds.akun.fields.pendekatan') }}
                                        </th>
                                        <td>
                                            {{ App\Models\Akun::PENDEKATAN_SELECT[$akun->pendekatan] ?? '' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.akun.fields.jenis') }}
                                        </th>
                                        <td>
                                            {{ $akun->jenis }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.akun.fields.status') }}
                                        </th>
                                        <td>
                                            {{ App\Models\Akun::STATUS_SELECT[$akun->status] ?? '' }}
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