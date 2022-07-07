@extends('layouts.admin')
@section('content')
@include('partials.subheader')

<div class="row">
	<div class="col-12">
		<div id="panel-1" class="panel panel-lock show" data-panel-sortable data-panel-close data-panel-collapsed>
			<div class="panel-hdr">
				<h2>
					Data | <span class="fw-300"><i>Detail</i></span>
				</h2>
				<div class="panel-toolbar">
					<a class="btn btn-xs btn-primary mr-2" href="{{ route('admin.data-realisasis.index') }}">
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
											{{ trans('cruds.dataRealisasi.fields.tahun') }}
										</th>
										<td>
											{{ $dataRealisasi->tahun }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRealisasi.fields.kdsatker') }}
										</th>
										<td>
											{{ $dataRealisasi->kdsatker }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRealisasi.fields.ba') }}
										</th>
										<td>
											{{ $dataRealisasi->ba }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRealisasi.fields.baes_1') }}
										</th>
										<td>
											{{ $dataRealisasi->baes_1 }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRealisasi.fields.akun') }}
										</th>
										<td>
											{{ $dataRealisasi->akun }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRealisasi.fields.program') }}
										</th>
										<td>
											{{ $dataRealisasi->program }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRealisasi.fields.kegiatan') }}
										</th>
										<td>
											{{ $dataRealisasi->kegiatan }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRealisasi.fields.output') }}
										</th>
										<td>
											{{ $dataRealisasi->output }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRealisasi.fields.kewenangan') }}
										</th>
										<td>
											{{ $dataRealisasi->kewenangan }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRealisasi.fields.sumber_dana') }}
										</th>
										<td>
											{{ $dataRealisasi->sumber_dana }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRealisasi.fields.cara_tarik') }}
										</th>
										<td>
											{{ $dataRealisasi->cara_tarik }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRealisasi.fields.kdregister') }}
										</th>
										<td>
											{{ $dataRealisasi->kdregister }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRealisasi.fields.lokasi') }}
										</th>
										<td>
											{{ $dataRealisasi->lokasi }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRealisasi.fields.budget_type') }}
										</th>
										<td>
											{{ $dataRealisasi->budget_type }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRealisasi.fields.tanggal') }}
										</th>
										<td>
											{{ $dataRealisasi->tanggal }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRealisasi.fields.amount') }}
										</th>
										<td>
											{{ $dataRealisasi->amount }}
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