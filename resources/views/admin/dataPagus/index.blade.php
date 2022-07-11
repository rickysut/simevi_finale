@extends('layouts.admin')
@section('content')
@include('partials.subheaderform')
@can('data_pagu_create')

<!-- new -->

<div class="row">
	<div class="col-12">
		<div id="panel-1" class="panel show" data-panel-sortable data-panel-close data-panel-collapsed>
			<div class="panel-hdr">
				<h2>
					Data | <span class="fw-300"><i>Pagu</i></span>
				</h2>
				<div class="panel-toolbar">
					<button class="btn btn-xs btn-primary mr-2" data-toggle="modal" data-target="#csvImportModal" title="unggah data" data-original-title="unggah data">
						{{ trans('global.app_csvImport') }}
					</button>
					@include('csvImport.modal', ['model' => 'DataPagu', 'route' => 'admin.data-pagus.parseCsvImport'])
				</div>
				@endcan
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<div class="row">
						<div class="col-12">
							<div class="table dataTables_wrapper dt-bootstrap4">
								<table class="dtr-inline table table-bordered table-striped table-hover ajaxTable datatable datatable-DataPagu">
								<thead  class="bg-primary-50">
									<tr>
										<th width="10">

										</th>
										<th>
											{{ trans('cruds.dataPagu.fields.tahun') }}
										</th>
										<th>
											{{ trans('cruds.dataPagu.fields.kdsatker') }}
										</th>
										<th>
											{{ trans('cruds.dataPagu.fields.ba') }}
										</th>
										<th>
											{{ trans('cruds.dataPagu.fields.baes_1') }}
										</th>
										<th>
											{{ trans('cruds.dataPagu.fields.akun') }}
										</th>
										<th>
											{{ trans('cruds.dataPagu.fields.program') }}
										</th>
										<th>
											{{ trans('cruds.dataPagu.fields.kegiatan') }}
										</th>
										<th>
											{{ trans('cruds.dataPagu.fields.output') }}
										</th>
										<th>
											{{ trans('cruds.dataPagu.fields.kewenangan') }}
										</th>
										<th>
											{{ trans('cruds.dataPagu.fields.sumber_dana') }}
										</th>
										<th>
											{{ trans('cruds.dataPagu.fields.cara_tarik') }}
										</th>
										<th>
											{{ trans('cruds.dataPagu.fields.kdregister') }}
										</th>
										<th>
											{{ trans('cruds.dataPagu.fields.lokasi') }}
										</th>
										<th>
											{{ trans('cruds.dataPagu.fields.budget_type') }}
										</th>
										<th>
											{{ trans('cruds.dataPagu.fields.amount') }}
										</th>
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


<!-- end new -->




@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('data_pagu_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.data-pagus.massDestroy') }}",
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
    ajax: "{{ route('admin.data-pagus.index') }}",
    columns: [
		{ data: 'placeholder', name: 'placeholder' },
		{ data: 'tahun', name: 'tahun' },
		{ data: 'kdsatker', name: 'kdsatker' },
		{ data: 'ba', name: 'ba' },
		{ data: 'baes_1', name: 'baes_1' },
		{ data: 'akun', name: 'akun' },
		{ data: 'program', name: 'program' },
		{ data: 'kegiatan', name: 'kegiatan' },
		{ data: 'output', name: 'output' },
		{ data: 'kewenangan', name: 'kewenangan' },
		{ data: 'sumber_dana', name: 'sumber_dana' },
		{ data: 'cara_tarik', name: 'cara_tarik' },
		{ data: 'kdregister', name: 'kdregister' },
		{ data: 'lokasi', name: 'lokasi' },
		{ data: 'budget_type', name: 'budget_type' },
		{ data: 'amount', name: 'amount' },
		{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
	responsive: true,
    pageLength: 25,
  };
  let table = $('.datatable-DataPagu').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection