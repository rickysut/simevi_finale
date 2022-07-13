@extends('layouts.admin')
@section('content')
@include('partials.subheader')

<div class="row">
	<div class="col-12">
		<div id="panel-1" class="panel show" data-panel-sortable data-panel-close data-panel-collapsed>
			<div class="panel-hdr">
				<h2>
					Data | <span class="fw-300"><i>Realisasi</i></span>
				</h2>
				@can('belanja_create')
				<div class="panel-toolbar">
					<a class="btn btn-success btn-xs mr-2" href="{{ route('admin.belanjas.create') }}" data-toggle="tooltip" title="tambah data" data-original-title="tambah data">
						{{ trans('global.add') }} {{ trans('cruds.belanja.title_singular') }}
					</a>
					<button class="btn btn-primary btn-xs mr-2" data-toggle="modal" data-target="#csvImportModal" title="unggah data">
						{{ trans('global.app_csvImport') }}
					</button>
					@include('csvImport.modal', ['model' => 'Belanja', 'route' => 'admin.belanjas.parseCsvImport'])
				</div>
				@endcan
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<div class="row">
						<div class="col-12">
							<div class="table dataTables_wrapper dt-bootstrap4">
								<table class="dtr-inline table table-bordered table-striped table-hover ajaxTable datatable datatable-Belanja w-100">
									<thead  class="bg-primary-50">
										<tr>
											<th width="10">

											</th>
											<th>
												{{ trans('cruds.belanja.fields.tahun') }}
											</th>
											<th>
												{{ trans('cruds.belanja.fields.kewenangan') }}
											</th>
											<th>
												{{ trans('cruds.belanja.fields.pagu') }}
											</th>
											<th>
												{{ trans('cruds.belanja.fields.realisasi') }}
											</th>
											<th style="width: 15%">
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
@can('belanja_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.belanjas.massDestroy') }}",
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
    ajax: "{{ route('admin.belanjas.index') }}",
    columns: [
        { data: 'placeholder', name: 'placeholder' },
        { data: 'tahun', name: 'tahun' },
        { data: 'kewenangan', name: 'kewenangan' },
        { data: 'pagu', name: 'pagu', class: 'text-right' },
        { data: 'realisasi', name: 'realisasi' , class: 'text-right'},
        { data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
	responsive: true,
    pageLength: 25,
  };
  let table = $('.datatable-Belanja').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection