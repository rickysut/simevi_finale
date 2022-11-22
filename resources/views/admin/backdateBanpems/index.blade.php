@extends('layouts.admin')
@section('content')
@include('partials.subheader')
@can('backdate_banpem_create')

<div class="row">
	<div class="col-12">
		<div id="panel-1" class="panel panel-lock show" data-panel-sortable data-panel-close data-panel-collapsed>
			<div class="panel-hdr">
				<h2>
					Data | <span class="fw-300"><i>Banpem</i></span>
				</h2>
				<div class="panel-toolbar">
					<button class="btn btn-xs btn-primary mr-2" data-toggle="modal" data-target="#csvImportModal" title="unggah data" data-original-title="unggah data">
						{{ trans('global.app_csvImport') }}
					</button>
					@include('csvImport.modal', ['model' => 'BackdateBanpem', 'route' => 'admin.backdate-banpems.parseCsvImport'])
					
				</div>
				@endcan
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<div class="row">
						<div class="col-12">
							<div class="table dataTables_wrapper dt-bootstrap4 table-responsive">
							<table class="dtr-inline table table-bordered table-striped table-hover ajaxTable datatable datatable-BackdateBanpem w-100">
								<thead>
									<tr>
										<th>

										</th>
										<th>
											{{ trans('cruds.backdateBanpem.fields.year') }}
										</th>
										<th>
											{{ trans('cruds.backdateBanpem.fields.kd_satker') }}
										</th>
										<th>
											{{ trans('cruds.backdateBanpem.fields.provinsi') }}
										</th>
										<th>
											{{ trans('cruds.backdateBanpem.fields.kab_kota') }}
										</th>
										<th>
											{{ trans('cruds.backdateBanpem.fields.nm_gapoktan') }}
										</th>
										<th style="width: 3%">
											{{ trans('cruds.backdateBanpem.fields.nm_barang') }}
										</th>
										<th>
											{{ trans('cruds.backdateBanpem.fields.total') }}
										</th>
										<th >
											{{ trans('cruds.backdateBanpem.fields.satuan') }}
										</th>
										<th>
											{{ trans('cruds.backdateBanpem.fields.nominal') }}
										</th>
										<th>
											{{ trans('cruds.backdateBanpem.fields.kwn') }}
										</th>
										<th>
											{{ trans('cruds.backdateBanpem.fields.kd_giat') }}
										</th>
										<th>
											{{ trans('cruds.backdateBanpem.fields.kd_akun') }}
										</th>
										<th style="width: 15%">
											{{ trans('global.actions') }}
										</th>
									</tr>
									<tr>
										<td ></td>
										<td >
											<input class="search" type="text" style="width:100%">
										</td>
										<td >
											<input class="search" type="text" style="width:100%">
										</td>
										<td >
											<input class="search" type="text" style="width:100%">
										</td>
										<td >
											<input class="search" type="text" style="width:100%">
										</td>
										<td >
											<input class="search" type="text" style="width:100%">
										</td>
										<td >
											<input class="search" type="text" style="width:100%">
										</td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td ><input class="search" type="text" style="width:100%"></td>
										<td ><input class="search" type="text" style="width:100%"></td>
										<td ><input class="search" type="text" style="width:100%"></td>
										<td> </td>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th colspan="8" class="text-right">
											Total: 
										</th>
										<th class="text-right">
										</th>
										<th colspan="4">
										</th>
									</tr>
								</tfoot>
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

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('backdate_banpem_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.backdate-banpems.massDestroy') }}",
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
    ajax: "{{ route('admin.backdate-banpems.index') }}",
    columns: [
		{ data: 'placeholder', name: 'placeholder' },
		{ data: 'year', name: 'year' },
		{ data: 'kd_satker', name: 'kd_satker' },
		{ data: 'provinsi', name: 'provinsi' },
		{ data: 'kab_kota', name: 'kab_kota' },
		{ data: 'nm_gapoktan', name: 'nm_gapoktan' },
		{ data: 'nm_barang', name: 'nm_barang' },
		{ data: 'total', name: 'total', class: 'text-right' },
		{ data: 'satuan', name: 'satuan' , class: 'text-center' },
		{ data: 'nominal', name: 'nominal', class: 'text-right' },
		{ data: 'kwn', name: 'kwn' },
		{ data: 'kd_giat', name: 'kd_giat' },
		{ data: 'kd_akun', name: 'kd_akun' },
		{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
	responsive: false,
	
    pageLength: 25,
    
    footerCallback : function ( row, data, start, end, display ) {
        var api = this.api(), data;
 
        // Remove the formatting to get integer data for summation
        var intVal = function ( i ) {
            return typeof i === 'string' ? i.replace(/[\.,]/g, '')*1 : typeof i === 'number' ? i : 0;
        };
	
        // Total over this page
        pageTotal1 = api
        .column( 8, { page: 'current'} )
        .data()
        .reduce( function (a, b) {
            return intVal(a) + intVal(b);
        }, 0 );
	
        // Update footer
        $( api.column( 8 ).footer() ).html(
            numberWithCommas(pageTotal1)
        )

        // Total over all pages
        total = api
            .column( 8 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        //$( api.column( 9 ).footer() ).html(
        //    'from Grand Total: ' +
        //     numberWithCommas(total)
        //)
    }
  };
  let table = $('.datatable-BackdateBanpem').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || true
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
});

</script>
@endsection