@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="row">
	<div class="col-12">
		<div id="panel-1" class="panel show" data-panel-sortable data-panel-close data-panel-collapsed>
			<div class="panel-hdr">
				<h2>
					Data | <span class="fw-300"><i>{{ trans('cruds.satker.title') }}</i></span>
				</h2>
				@can('satker_create')
				<div class="panel-toolbar">
					<a class="btn btn-success btn-xs mr-2" href="{{ route('admin.satkers.create') }}" data-toggle="tooltip" title="tambah data" data-original-title="tambah data">
						{{ trans('global.add') }} {{ trans('cruds.satker.title_singular') }}
					</a>
				</div>
                <button class="btn btn-warning btn-xs mr-2" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Satker', 'route' => 'admin.satkers.parseCsvImport'])
				@endcan
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<div class="row">
						<div class="col-12">
							<div class="table dataTables_wrapper dt-bootstrap4">
								<table class="dtr-inline table table-bordered table-striped table-hover ajaxTable datatable datatable-Satker w-100">
									<thead  class="bg-primary-50">

                                        <tr>
                                            <th width="10">

                                            </th>
                                            <th>
                                                {{ trans('cruds.satker.fields.kd_satker') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.satker.fields.nm_satker') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.satker.fields.kd_kwn') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.satker.fields.kwn') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.satker.fields.tingkat') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.satker.fields.status') }}
                                            </th>
                                            <th style="width:15%">
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
@can('satker_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.satkers.massDestroy') }}",
    className: 'btn-danger',
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
    ajax: "{{ route('admin.satkers.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'kd_satker', name: 'kd_satker' },
{ data: 'nm_satker', name: 'nm_satker' },
{ data: 'kd_kwn', name: 'kd_kwn' },
{ data: 'kwn', name: 'kwn' },
{ data: 'tingkat', name: 'tingkat' },
{ data: 'status', name: 'status' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 10,
  };
  let table = $('.datatable-Satker').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection