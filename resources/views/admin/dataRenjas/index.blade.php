@extends('layouts.admin')
@section('content')
@include('partials.subheader')
@can('data_renja_create')


<div class="row">
	<div class="col-12">
		<div id="panel-1" class="panel panel-lock show" data-panel-sortable data-panel-close data-panel-collapsed>
			<div class="panel-hdr">
				<h2>
					Data | <span class="fw-300"><i>Renja</i></span>
				</h2>
				<div class="panel-toolbar">
					<button class="btn btn-xs btn-primary mr-2" data-toggle="modal" data-target="#csvImportModal" title="unggah data" data-original-title="unggah data">
						{{ trans('global.app_csvImport') }}
					</button>
					@include('csvImport.modal', ['model' => 'DataRenja', 'route' => 'admin.data-renjas.parseCsvImport'])
					@endcan

				</div>
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<div class="row">
						<div class="col-12">
							<div class="table dataTables_wrapper dt-bootstrap4">
								<table class="dtr-inline table table-bordered table-striped table-hover ajaxTable datatable datatable-DataRenja">
									<thead class="bg-primary-50">
										<tr>
											<th width="10">

											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.thang') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.kdjendok') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.kdsatker') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.kddept') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.kdunit') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.kdprogram') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.kdgiat') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.kdoutput') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.kdlokasi') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.kdkabkota') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.kddekon') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.kdsoutput') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.kdkmpnen') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.kdskmpnen') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.kdakun') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.kdkppn') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.kdbeban') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.kdjnsban') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.kdctarik') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.register') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.carahitung') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.header1') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.header2') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.kdheader') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.noitem') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.nmitem') }}
											</th>
											<!--
											<th>
												{{ trans('cruds.dataRenja.fields.vol1') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.sat1') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.vol2') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.sat2') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.vol3') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.sat3') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.vol4') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.sat4') }}
											</th>
											-->
											<th>
												{{ trans('cruds.dataRenja.fields.volkeg') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.satkeg') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.hargasat') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.jumlah') }}
											</th>
											<!--
											<th>
												{{ trans('cruds.dataRenja.fields.jumlah2') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.paguphln') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.pagurmp') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.pagurkp') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.kdblokir') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.blokirphln') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.blokirrmp') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.blokirrkp') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.rphblokir') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.kdcopy') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.kdabt') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.kdsbu') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.volsbk') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.volrkakl') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.blnkontrak') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.nokontrak') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.tgkontrak') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.nilkontrak') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.januari') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.pebruari') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.maret') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.april') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.mei') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.juni') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.juli') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.agustus') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.september') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.oktober') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.nopember') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.desember') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.jmltunda') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.kdluncuran') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.jmlabt') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.norev') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.kdubah') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.kurs') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.indexkpjm') }}
											</th>
											<th>
												{{ trans('cruds.dataRenja.fields.kdib') }}
											</th>
										-->
											<th>
												{{ trans('global.actions') }}
											</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('data_renja_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.data-renjas.massDestroy') }}",
    className: 'btn-danger btn-sm mr-1',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.data-renjas.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'thang', name: 'thang' },
{ data: 'kdjendok', name: 'kdjendok' },
{ data: 'kdsatker', name: 'kdsatker' },
{ data: 'kddept', name: 'kddept' },
{ data: 'kdunit', name: 'kdunit' },
{ data: 'kdprogram', name: 'kdprogram' },
{ data: 'kdgiat', name: 'kdgiat' },
{ data: 'kdoutput', name: 'kdoutput' },
{ data: 'kdlokasi', name: 'kdlokasi' },
{ data: 'kdkabkota', name: 'kdkabkota' },
{ data: 'kddekon', name: 'kddekon' },
{ data: 'kdsoutput', name: 'kdsoutput' },
{ data: 'kdkmpnen', name: 'kdkmpnen' },
{ data: 'kdskmpnen', name: 'kdskmpnen' },
{ data: 'kdakun', name: 'kdakun' },
{ data: 'kdkppn', name: 'kdkppn' },
{ data: 'kdbeban', name: 'kdbeban' },
{ data: 'kdjnsban', name: 'kdjnsban' },
{ data: 'kdctarik', name: 'kdctarik' },
{ data: 'register', name: 'register' },
{ data: 'carahitung', name: 'carahitung' },
{ data: 'header1', name: 'header1' },
{ data: 'header2', name: 'header2' },
{ data: 'kdheader', name: 'kdheader' },
{ data: 'noitem', name: 'noitem' },
{ data: 'nmitem', name: 'nmitem' },
/*{ data: 'vol1', name: 'vol1' },
{ data: 'sat1', name: 'sat1' },
{ data: 'vol2', name: 'vol2' },
{ data: 'sat2', name: 'sat2' },
{ data: 'vol3', name: 'vol3' },
{ data: 'sat3', name: 'sat3' },
{ data: 'vol4', name: 'vol4' },
{ data: 'sat4', name: 'sat4' },
*/
{ data: 'volkeg', name: 'volkeg' },
{ data: 'satkeg', name: 'satkeg' },
{ data: 'hargasat', name: 'hargasat' },
{ data: 'jumlah', name: 'jumlah' },
/*{ data: 'jumlah2', name: 'jumlah2' },
{ data: 'paguphln', name: 'paguphln' },
{ data: 'pagurmp', name: 'pagurmp' },
{ data: 'pagurkp', name: 'pagurkp' },
{ data: 'kdblokir', name: 'kdblokir' },
{ data: 'blokirphln', name: 'blokirphln' },
{ data: 'blokirrmp', name: 'blokirrmp' },
{ data: 'blokirrkp', name: 'blokirrkp' },
{ data: 'rphblokir', name: 'rphblokir' },
{ data: 'kdcopy', name: 'kdcopy' },
{ data: 'kdabt', name: 'kdabt' },
{ data: 'kdsbu', name: 'kdsbu' },
{ data: 'volsbk', name: 'volsbk' },
{ data: 'volrkakl', name: 'volrkakl' },
{ data: 'blnkontrak', name: 'blnkontrak' },
{ data: 'nokontrak', name: 'nokontrak' },
{ data: 'tgkontrak', name: 'tgkontrak' },
{ data: 'nilkontrak', name: 'nilkontrak' },
{ data: 'januari', name: 'januari' },
{ data: 'pebruari', name: 'pebruari' },
{ data: 'maret', name: 'maret' },
{ data: 'april', name: 'april' },
{ data: 'mei', name: 'mei' },
{ data: 'juni', name: 'juni' },
{ data: 'juli', name: 'juli' },
{ data: 'agustus', name: 'agustus' },
{ data: 'september', name: 'september' },
{ data: 'oktober', name: 'oktober' },
{ data: 'nopember', name: 'nopember' },
{ data: 'desember', name: 'desember' },
{ data: 'jmltunda', name: 'jmltunda' },
{ data: 'kdluncuran', name: 'kdluncuran' },
{ data: 'jmlabt', name: 'jmlabt' },
{ data: 'norev', name: 'norev' },
{ data: 'kdubah', name: 'kdubah' },
{ data: 'kurs', name: 'kurs' },
{ data: 'indexkpjm', name: 'indexkpjm' },
{ data: 'kdib', name: 'kdib' },
*/
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
	responsive: true,
    order: [[ 1, 'asc' ]],
    pageLength: 25,
	
  };
  
  let table = $('.datatable-DataRenja').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>


@endsection