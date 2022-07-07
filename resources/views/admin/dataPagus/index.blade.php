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
								<table class=" dtr-inline table table-bordered table-striped table-hoverajaxTable datatable datatable-DataPagu">
								<thead>
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
											&nbsp;
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
	responsive:true,
	dom:
		/*	--- Layout Structure 
			--- Options
			l	-	length changing input control
			f	-	filtering input
			t	-	The table!
			i	-	Table information summary
			p	-	pagination control
			r	-	processing display element
			B	-	buttons
			R	-	ColReorder
			S	-	Select

			--- Markup
			< and >				- div element
			<"class" and >		- div with a class
			<"#id" and >		- div with an ID
			<"#id.class" and >	- div with an ID and a class

			--- Further reading
			https://datatables.net/reference/option/dom
			--------------------------------------
		 */
		"<'row align-items-center mb-3 justify-content-end'<'col-sm-12 col-md-3 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-2 d-flex align-items-center justify-content-start'l><'col-sm-12 col-md-7 d-flex align-items-center justify-content-end'B>>" +
		"<'row'<'col-sm-12'tr>>" +
		"<'row align-items-center'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
	buttons: [
		/*{
			extend:    'colvis',
			text:      'Column Visibility',
			titleAttr: 'Col visibility',
			className: 'mr-sm-3'
		},*/
		/*{
			extend: 'pdfHtml5',
			text: 'PDF',
			titleAttr: 'Generate PDF',
			className: 'btn-outline-danger btn-sm mr-1'
		},*/
		{
			extend: 'csvHtml5',
			text: 'CSV',
			titleAttr: 'Generate CSV',
			className: 'btn-outline-primary btn-sm mr-1'
		},
		{
			extend: 'excelHtml5',
			text: 'Excel',
			titleAttr: 'Generate Excel',
			className: 'btn-outline-success btn-sm mr-1'
		},
		{
			extend: 'copyHtml5',
			text: 'Copy',
			titleAttr: 'Copy to clipboard',
			className: 'btn-outline-primary btn-sm mr-1'
		},
		{
			extend: 'print',
			text: 'Print',
			titleAttr: 'Print Table',
			className: 'btn-outline-primary btn-sm'
		}
	],
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