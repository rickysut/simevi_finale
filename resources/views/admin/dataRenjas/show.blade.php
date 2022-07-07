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
					<a class="btn btn-xs btn-primary" href="{{ route('admin.data-renjas.index') }}">
						{{ trans('global.back_to_list') }}
					</a>
				</div>
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<div class="row">
						<div class="col-12">
							 <table class="table table-hover table-bordered table-striped table-sm">
								<tbody>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.thang') }}
										</th>
										<td>
											{{ $dataRenja->thang }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.kdjendok') }}
										</th>
										<td>
											{{ $dataRenja->kdjendok }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.kdsatker') }}
										</th>
										<td>
											{{ $dataRenja->kdsatker }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.kddept') }}
										</th>
										<td>
											{{ $dataRenja->kddept }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.kdunit') }}
										</th>
										<td>
											{{ $dataRenja->kdunit }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.kdprogram') }}
										</th>
										<td>
											{{ $dataRenja->kdprogram }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.kdgiat') }}
										</th>
										<td>
											{{ $dataRenja->kdgiat }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.kdoutput') }}
										</th>
										<td>
											{{ $dataRenja->kdoutput }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.kdlokasi') }}
										</th>
										<td>
											{{ $dataRenja->kdlokasi }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.kdkabkota') }}
										</th>
										<td>
											{{ $dataRenja->kdkabkota }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.kddekon') }}
										</th>
										<td>
											{{ $dataRenja->kddekon }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.kdsoutput') }}
										</th>
										<td>
											{{ $dataRenja->kdsoutput }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.kdkmpnen') }}
										</th>
										<td>
											{{ $dataRenja->kdkmpnen }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.kdskmpnen') }}
										</th>
										<td>
											{{ $dataRenja->kdskmpnen }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.kdakun') }}
										</th>
										<td>
											{{ $dataRenja->kdakun }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.kdkppn') }}
										</th>
										<td>
											{{ $dataRenja->kdkppn }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.kdbeban') }}
										</th>
										<td>
											{{ $dataRenja->kdbeban }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.kdjnsban') }}
										</th>
										<td>
											{{ $dataRenja->kdjnsban }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.kdctarik') }}
										</th>
										<td>
											{{ $dataRenja->kdctarik }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.register') }}
										</th>
										<td>
											{{ $dataRenja->register }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.carahitung') }}
										</th>
										<td>
											{{ $dataRenja->carahitung }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.header1') }}
										</th>
										<td>
											{{ $dataRenja->header1 }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.header2') }}
										</th>
										<td>
											{{ $dataRenja->header2 }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.kdheader') }}
										</th>
										<td>
											{{ $dataRenja->kdheader }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.noitem') }}
										</th>
										<td>
											{{ $dataRenja->noitem }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.nmitem') }}
										</th>
										<td>
											{{ $dataRenja->nmitem }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.vol1') }}
										</th>
										<td>
											{{ $dataRenja->vol1 }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.sat1') }}
										</th>
										<td>
											{{ $dataRenja->sat1 }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.vol2') }}
										</th>
										<td>
											{{ $dataRenja->vol2 }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.sat2') }}
										</th>
										<td>
											{{ $dataRenja->sat2 }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.vol3') }}
										</th>
										<td>
											{{ $dataRenja->vol3 }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.sat3') }}
										</th>
										<td>
											{{ $dataRenja->sat3 }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.vol4') }}
										</th>
										<td>
											{{ $dataRenja->vol4 }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.sat4') }}
										</th>
										<td>
											{{ $dataRenja->sat4 }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.volkeg') }}
										</th>
										<td>
											{{ $dataRenja->volkeg }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.satkeg') }}
										</th>
										<td>
											{{ $dataRenja->satkeg }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.hargasat') }}
										</th>
										<td>
											{{ $dataRenja->hargasat }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.jumlah') }}
										</th>
										<td>
											{{ $dataRenja->jumlah }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.jumlah2') }}
										</th>
										<td>
											{{ $dataRenja->jumlah2 }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.paguphln') }}
										</th>
										<td>
											{{ $dataRenja->paguphln }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.pagurmp') }}
										</th>
										<td>
											{{ $dataRenja->pagurmp }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.pagurkp') }}
										</th>
										<td>
											{{ $dataRenja->pagurkp }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.kdblokir') }}
										</th>
										<td>
											{{ $dataRenja->kdblokir }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.blokirphln') }}
										</th>
										<td>
											{{ $dataRenja->blokirphln }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.blokirrmp') }}
										</th>
										<td>
											{{ $dataRenja->blokirrmp }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.blokirrkp') }}
										</th>
										<td>
											{{ $dataRenja->blokirrkp }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.rphblokir') }}
										</th>
										<td>
											{{ $dataRenja->rphblokir }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.kdcopy') }}
										</th>
										<td>
											{{ $dataRenja->kdcopy }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.kdabt') }}
										</th>
										<td>
											{{ $dataRenja->kdabt }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.kdsbu') }}
										</th>
										<td>
											{{ $dataRenja->kdsbu }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.volsbk') }}
										</th>
										<td>
											{{ $dataRenja->volsbk }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.volrkakl') }}
										</th>
										<td>
											{{ $dataRenja->volrkakl }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.blnkontrak') }}
										</th>
										<td>
											{{ $dataRenja->blnkontrak }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.nokontrak') }}
										</th>
										<td>
											{{ $dataRenja->nokontrak }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.tgkontrak') }}
										</th>
										<td>
											{{ $dataRenja->tgkontrak }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.nilkontrak') }}
										</th>
										<td>
											{{ $dataRenja->nilkontrak }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.januari') }}
										</th>
										<td>
											{{ $dataRenja->januari }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.pebruari') }}
										</th>
										<td>
											{{ $dataRenja->pebruari }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.maret') }}
										</th>
										<td>
											{{ $dataRenja->maret }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.april') }}
										</th>
										<td>
											{{ $dataRenja->april }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.mei') }}
										</th>
										<td>
											{{ $dataRenja->mei }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.juni') }}
										</th>
										<td>
											{{ $dataRenja->juni }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.juli') }}
										</th>
										<td>
											{{ $dataRenja->juli }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.agustus') }}
										</th>
										<td>
											{{ $dataRenja->agustus }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.september') }}
										</th>
										<td>
											{{ $dataRenja->september }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.oktober') }}
										</th>
										<td>
											{{ $dataRenja->oktober }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.nopember') }}
										</th>
										<td>
											{{ $dataRenja->nopember }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.desember') }}
										</th>
										<td>
											{{ $dataRenja->desember }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.jmltunda') }}
										</th>
										<td>
											{{ $dataRenja->jmltunda }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.kdluncuran') }}
										</th>
										<td>
											{{ $dataRenja->kdluncuran }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.jmlabt') }}
										</th>
										<td>
											{{ $dataRenja->jmlabt }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.norev') }}
										</th>
										<td>
											{{ $dataRenja->norev }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.kdubah') }}
										</th>
										<td>
											{{ $dataRenja->kdubah }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.kurs') }}
										</th>
										<td>
											{{ $dataRenja->kurs }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.indexkpjm') }}
										</th>
										<td>
											{{ $dataRenja->indexkpjm }}
										</td>
									</tr>
									<tr>
										<th>
											{{ trans('cruds.dataRenja.fields.kdib') }}
										</th>
										<td>
											{{ $dataRenja->kdib }}
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
@section('scripts')
@endsection