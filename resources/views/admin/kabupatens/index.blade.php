@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="row">
	<div class="col-12">
		<div id="panel-1" class="panel show" data-panel-sortable data-panel-close data-panel-collapsed>
			<div class="panel-hdr">
				<h2>
					Data | <span class="fw-300"><i>{{ trans('cruds.kabupaten.title') }}</i></span>
				</h2>
				@can('kabupaten_create')
				<div class="panel-toolbar">
					<a class="btn btn-success btn-xs mr-2" href="{{ route('admin.kabupatens.create') }}" data-toggle="tooltip" title="tambah data" data-original-title="tambah data">
						{{ trans('global.add') }} {{ trans('cruds.kabupaten.title_singular') }}
					</a>
				</div>
                <button class="btn btn-warning btn-xs mr-2" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Kabupaten', 'route' => 'admin.kabupatens.parseCsvImport'])
				@endcan
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<div class="row">
						<div class="col-12">
							<div class="table dataTables_wrapper dt-bootstrap4">
								<table class="dtr-inline table table-bordered table-striped table-hover ajaxTable datatable datatable-Kabupaten w-100">
									<thead  class="bg-primary-50">

                                        <tr>
                                            <th width="10">

                                            </th>
                                            <th >
                                                {{ trans('cruds.provinsi.fields.id') }} 
                                            </th>
                                            <th>
                                                {{ trans('cruds.kabupaten.fields.kd_prop') }}
                                            </th>
                                            <!--th>
                                                {{ trans('cruds.provinsi.fields.nm_prop') }}
                                            </th-->
                                            <th width="10">
                                                {{ trans('cruds.kabupaten.fields.kd_kab') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.kabupaten.fields.nama_kab') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.kabupaten.fields.kd_dt1') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.kabupaten.fields.kd_dt2') }}
                                            </th>
                                            <th width="10">
                                                {{ trans('cruds.kabupaten.fields.kd_bast') }}
                                            </th>
                                            <th width="20">
                                                {{ trans('cruds.kabupaten.fields.lat') }}
                                            </th>
                                            <th width="20">
                                                {{ trans('cruds.kabupaten.fields.lng') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.kabupaten.fields.kd_kemenkeu') }}
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
    @can('kabupaten_delete')
    let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
    let deleteButton = {
        text: deleteButtonTrans,
        url: "{{ route('admin.kabupatens.massDestroy') }}",
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
    ajax: "{{ route('admin.kabupatens.index') }}",
    columns: [
        { data: 'placeholder', name: 'placeholder' },
        { data: 'kd_prop_id', name: 'kd_prop.id', visible: false },
        { data: 'kd_prop_kd_prop', name: 'kd_prop.kd_prop' },
        { data: 'kd_kab', name: 'kd_kab' },
        { data: 'nama_kab', name: 'nama_kab' },
        { data: 'kd_dt1', name: 'kd_dt1' },
        { data: 'kd_dt2', name: 'kd_dt2' },
        { data: 'kd_bast', name: 'kd_bast' },
        { data: 'lat', name: 'lat' , class: 'text-right'},
        { data: 'lng', name: 'lng' , class: 'text-right'},
        { data: 'kd_kemenkeu', name: 'kd_kemenkeu' },
        { data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 2, 'asc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-Kabupaten').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection