@extends('layouts.admin')
@section('content')
@include('partials.subheader')

<div class="row">
	<div class="col-12">
		<div id="panel-1" class="panel panel-lock show" data-panel-sortable data-panel-close data-panel-collapsed>
			<div class="panel-hdr">
				<h2>
					{{ trans('cruds.dataPagu.title') }}  | <span class="fw-300"><i>Detail</i></span>
				</h2>
				<div class="panel-toolbar">
					<a class="btn btn-xs btn-primary mr-2" href="{{ route('admin.data-pagus.index') }}">
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
											{{ trans('cruds.dataPagu.fields.tahun') }}
										</th>
										<td>
											{{ $dataPagu->tahun }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataPagu.fields.kdsatker') }}
										</th>
										<td>
											{{ $dataPagu->kdsatker }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataPagu.fields.ba') }}
										</th>
										<td>
											{{ $dataPagu->ba }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataPagu.fields.baes_1') }}
										</th>
										<td>
											{{ $dataPagu->baes_1 }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataPagu.fields.akun') }}
										</th>
										<td>
											{{ $dataPagu->akun }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataPagu.fields.program') }}
										</th>
										<td>
											{{ $dataPagu->program }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataPagu.fields.kegiatan') }}
										</th>
										<td>
											{{ $dataPagu->kegiatan }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataPagu.fields.output') }}
										</th>
										<td>
											{{ $dataPagu->output }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataPagu.fields.kewenangan') }}
										</th>
										<td>
											{{ $dataPagu->kewenangan }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataPagu.fields.sumber_dana') }}
										</th>
										<td>
											{{ $dataPagu->sumber_dana }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataPagu.fields.cara_tarik') }}
										</th>
										<td>
											{{ $dataPagu->cara_tarik }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataPagu.fields.kdregister') }}
										</th>
										<td>
											{{ $dataPagu->kdregister }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataPagu.fields.lokasi') }}
										</th>
										<td>
											{{ $dataPagu->lokasi }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataPagu.fields.budget_type') }}
										</th>
										<td>
											{{ $dataPagu->budget_type }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataPagu.fields.amount') }}
										</th>
										<td>
											{{ $dataPagu->amount }}
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