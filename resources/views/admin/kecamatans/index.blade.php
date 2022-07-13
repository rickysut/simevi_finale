@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="row">
	<div class="col-12">
		<div id="panel-1" class="panel show" data-panel-sortable data-panel-close data-panel-collapsed>
			<div class="panel-hdr">
				<h2>
					Data | <span class="fw-300"><i>{{ trans('cruds.kecamatan.title') }}</i></span>
				</h2>
				@can('kecamatan_create')
				<div class="panel-toolbar">
					<a class="btn btn-success btn-xs mr-2" href="{{ route('admin.kecamatans.create') }}" data-toggle="tooltip" title="tambah data" data-original-title="tambah data">
						{{ trans('global.add') }} {{ trans('cruds.kecamatan.title_singular') }}
					</a>
				</div>
                <button class="btn btn-warning btn-xs mr-2" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Kecamatan', 'route' => 'admin.kecamatans.parseCsvImport'])
				@endcan
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<div class="row">
						<div class="col-12">
							<div class="table dataTables_wrapper dt-bootstrap4">
								<table class="dtr-inline table table-bordered table-striped table-hover ajaxTable datatable datatable-Kecamatan w-100">
									<thead  class="bg-primary-50">

                                        <tr>
                                            <th width="10">

                                            </th>
                                            <th>
                                                {{ trans('cruds.kabupaten.fields.id') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.kecamatan.fields.kd_kab') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.kecamatan.fields.kd_kec') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.kecamatan.fields.nm_kec') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.kecamatan.fields.kd_bast') }}
                                            </th>
                                            <th width="120px">
                                                {{ trans('cruds.kecamatan.fields.lat') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.kecamatan.fields.lng') }}
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
@can('kecamatan_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.kecamatans.massDestroy') }}",
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
    ajax: "{{ route('admin.kecamatans.index') }}",
    columns: [
        { data: 'placeholder', name: 'placeholder' },
        { data: 'kd_kab_id', name: 'kd_kab.id' , visible: false},
        { data: 'kd_kab_kd_kab', name: 'kd_kab.kd_kab' },
        /*{ data: 'kd_kab_kd_kab', name: 'kd_kab.kd_kab', render: function (data, type, row) {
            if ( type === 'display' ) {
                var url = '{{ route("admin.kabupatens.show", ":id") }}';
                url = url.replace(':id', row.kd_kab_id);
                @can('kabupaten_show')
                    return "<a style='color:#9a0c0b;' href='"+url+"'>&#10140;</a>&nbsp&nbsp" + data;    
                @endcan
                @cannot('kabupaten_show')
                    return data;
                @endcannot
                
            }    
        }},*/
        { data: 'kd_kec', name: 'kd_kec' },
        { data: 'nm_kec', name: 'nm_kec' },
        { data: 'kd_bast', name: 'kd_bast' },
        { data: 'lat', name: 'lat', class: 'text-right'},
        { data: 'lng', name: 'lng', class: 'text-right' },
        { data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 2, 'asc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-Kecamatan').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection