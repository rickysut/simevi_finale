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
					<a class="btn btn-success btn-xs mr-2" href="{{ route('admin.belanjas.create') }}" data-toggle="tooltip" title="unggah data" data-original-title="unggah data">
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
					<div class="table dataTables_wrapper dt-bootstrap4">
						<table class="dtr-inline table table-bordered table-striped table-hover ajaxTable datatable datatable-Belanja">
							<thead>
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


<div style="margin-bottom: 10px;" class="row">
	<div class="col-lg-12">
		
	</div>
</div>

<div class="card">
    <!--div class="card-header">
        {{ trans('cruds.belanja.title_singular') }} {{ trans('global.list') }}
    </div-->
    
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
    pageLength: 10,
  };
  let table = $('.datatable-Belanja').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection