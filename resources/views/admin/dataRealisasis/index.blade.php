@extends('layouts.admin')
@section('content')
@include('partials.subheader')
@can('data_realisasi_create')

<!-- new -->

<div class="row">
	<div class="col-12">
		<div id="panel-1" class="panel show" data-panel-sortable data-panel-close data-panel-collapsed>
			<div class="panel-hdr">
				<h2>
					Data | <span class="fw-300"><i>Realisasi</i></span>
				</h2>
				<div class="panel-toolbar">
					<button class="btn btn-xs btn-primary mr-2" data-toggle="modal" data-target="#csvImportModal" title="unggah data" data-original-title="unggah data">
					{{ trans('global.app_csvImport') }}
					</button>
					@include('csvImport.modal', ['model' => 'DataRealisasi', 'route' => 'admin.data-realisasis.parseCsvImport'])
				</div>
				@endcan
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<div class="row">
						<div class="col-12">
							<div class="table dataTables_wrapper dt-bootstrap4">
								<table class="dtr-inline table table-bordered table-striped table-hover ajaxTable datatable datatable-DataRealisasi w-100">
									<thead class="bg-primary-50">
										<tr>
											<th width="10">

											</th>
											<th>
												{{ trans('cruds.dataRealisasi.fields.tahun') }}
											</th>
											<th>
												{{ trans('cruds.dataRealisasi.fields.kdsatker') }}
											</th>
											<th>
												{{ trans('cruds.dataRealisasi.fields.ba') }}
											</th>
											<th>
												{{ trans('cruds.dataRealisasi.fields.baes_1') }}
											</th>
											<th>
												{{ trans('cruds.dataRealisasi.fields.akun') }}
											</th>
											<th>
												{{ trans('cruds.dataRealisasi.fields.program') }}
											</th>
											<th>
												{{ trans('cruds.dataRealisasi.fields.kegiatan') }}
											</th>
											<th>
												{{ trans('cruds.dataRealisasi.fields.output') }}
											</th>
											<th>
												{{ trans('cruds.dataRealisasi.fields.kewenangan') }}
											</th>
											<th>
												{{ trans('cruds.dataRealisasi.fields.sumber_dana') }}
											</th>
											<th>
												{{ trans('cruds.dataRealisasi.fields.cara_tarik') }}
											</th>
											<th>
												{{ trans('cruds.dataRealisasi.fields.kdregister') }}
											</th>
											<th>
												{{ trans('cruds.dataRealisasi.fields.lokasi') }}
											</th>
											<!--th>
												{{ trans('cruds.dataRealisasi.fields.budget_type') }}
											</th-->
											<th>
												{{ trans('cruds.dataRealisasi.fields.tanggal') }}
											</th>
											<th>
												{{ trans('cruds.dataRealisasi.fields.amount') }}
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
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <!--a class="btn btn-success" href="{{ route('admin.data-realisasis.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.dataRealisasi.title_singular') }}
            </a-->
            
        </div>
    </div>





@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('data_realisasi_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.data-realisasis.massDestroy') }}",
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
    ajax: "{{ route('admin.data-realisasis.index') }}",
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
//{ data: 'budget_type', name: 'budget_type' },
{ data: 'tanggal', name: 'tanggal' },
{ data: 'amount', name: 'amount' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
	responsive:true,
    pageLength: 25,
  };
  let table = $('.datatable-DataRealisasi').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection