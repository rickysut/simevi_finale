@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="row">
	<div class="col-12">
		<div id="panel-1" class="panel show" data-panel-sortable data-panel-close data-panel-collapsed>
			<div class="panel-hdr">
				<h2>
					Data | <span class="fw-300"><i>{{ trans('cruds.masterKegiatan.title') }}</i></span>
				</h2>
				@can('master_kegiatan_create')
				<div class="panel-toolbar">
					<a class="btn btn-success btn-xs mr-2" href="{{ route('admin.master-kegiatans.create') }}" data-toggle="tooltip" title="tambah data" data-original-title="tambah data">
						{{ trans('global.add') }} {{ trans('cruds.masterKegiatan.title_singular') }}
					</a>
				</div>
                <button class="btn btn-warning btn-xs mr-2" data-toggle="modal" data-target="#csvImportModal" title="unggah data" data-original-title="unggah data">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'MasterKegiatan', 'route' => 'admin.master-kegiatans.parseCsvImport'])
				@endcan
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<div class="row">
						<div class="col-12">
							<div class="table dataTables_wrapper dt-bootstrap4">
								<table class="dtr-inline table table-bordered table-striped table-hover ajaxTable datatable datatable-MasterKegiatan w-100">
									<thead  class="bg-primary-50">

                                        <tr>
                                            <th width="10">

                                            </th>
                                            <th>
                                                {{ trans('cruds.masterKegiatan.fields.kddept') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.masterKegiatan.fields.kdunit') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.masterKegiatan.fields.kd_kegiatan') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.masterKegiatan.fields.direktorat') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.masterKegiatan.fields.nomenklatur_giat') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.masterKegiatan.fields.status') }}
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
@can('master_kegiatan_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.master-kegiatans.massDestroy') }}",
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
    ajax: "{{ route('admin.master-kegiatans.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'kddept', name: 'kddept' },
{ data: 'kdunit', name: 'kdunit' },
{ data: 'kd_kegiatan', name: 'kd_kegiatan' },
{ data: 'direktorat', name: 'direktorat' },
{ data: 'nomenklatur_giat', name: 'nomenklatur_giat' },
{ data: 'status', name: 'status' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 10,
  };
  let table = $('.datatable-MasterKegiatan').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection