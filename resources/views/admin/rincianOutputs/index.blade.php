@extends('layouts.admin')
@section('content')
@include('partials.subheader')
<div class="row">
	<div class="col-12">
		<div id="panel-1" class="panel show" data-panel-sortable data-panel-close data-panel-collapsed>
			<div class="panel-hdr">
				<h2>
					Data | <span class="fw-300"><i>{{ trans('cruds.rincianOutput.title') }}</i></span>
				</h2>
				@can('rincian_output_create')
				<div class="panel-toolbar">
					<a class="btn btn-success btn-xs mr-2" href="{{ route('admin.rincian-outputs.create') }}" data-toggle="tooltip" title="tambah data" data-original-title="tambah data">
						{{ trans('global.add') }} {{ trans('cruds.rincianOutput.title_singular') }}
					</a>
				</div>
                <button class="btn btn-warning btn-xs mr-2" data-toggle="modal" data-target="#csvImportModal" title="unggah data" data-original-title="unggah data">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'RincianOutput', 'route' => 'admin.rincian-outputs.parseCsvImport'])
				@endcan
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<div class="row">
						<div class="col-12">
							<div class="table dataTables_wrapper dt-bootstrap4">
								<table class="dtr-inline table table-bordered table-striped table-hover ajaxTable datatable datatable-RincianOutput w-100">
									<thead  class="bg-primary-50">

                                        <tr>
                                            <th width="10">

                                            </th>
                                            <th>
                                                {{ trans('cruds.rincianOutput.fields.idoutp') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.rincianOutput.fields.idoutp_1') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.rincianOutput.fields.kdgiat') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.rincianOutput.fields.kdoutput') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.rincianOutput.fields.nmoutput') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.rincianOutput.fields.sat') }}
                                            </th>
                                            <!--th>
                                                {{ trans('cruds.rincianOutput.fields.kdsum') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.rincianOutput.fields.thnawal') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.rincianOutput.fields.thnakhir') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.rincianOutput.fields.kdmulti') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.rincianOutput.fields.kdjnsout') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.rincianOutput.fields.kdikk') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.rincianOutput.fields.kdtema') }}
                                            </th>
                                            
                                            <th>
                                                {{ trans('cruds.rincianOutput.fields.kdcttout') }}
                                            </th-->
                                            <th>
                                                {{ trans('cruds.rincianOutput.fields.thang') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.rincianOutput.fields.kdpn') }}
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
@can('rincian_output_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.rincian-outputs.massDestroy') }}",
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
    ajax: "{{ route('admin.rincian-outputs.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'idoutp', name: 'idoutp' },
{ data: 'idoutp_1', name: 'idoutp_1' },
{ data: 'kdgiat', name: 'kdgiat' },
{ data: 'kdoutput', name: 'kdoutput' },
{ data: 'nmoutput', name: 'nmoutput' },
{ data: 'sat', name: 'sat' },
//{ data: 'kdsum', name: 'kdsum' },
//{ data: 'thnawal', name: 'thnawal' },
//{ data: 'thnakhir', name: 'thnakhir' },
//{ data: 'kdmulti', name: 'kdmulti' },
//{ data: 'kdjnsout', name: 'kdjnsout' },
//{ data: 'kdikk', name: 'kdikk' },
//{ data: 'kdtema', name: 'kdtema' },
//{ data: 'kdcttout', name: 'kdcttout' },
{ data: 'thang', name: 'thang' },
{ data: 'kdpn', name: 'kdpn' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-RincianOutput').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection