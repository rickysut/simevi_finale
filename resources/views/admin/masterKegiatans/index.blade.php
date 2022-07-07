@extends('layouts.admin')
@section('content')
@include('partials.subheader')
@can('master_kegiatan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.master-kegiatans.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.masterKegiatan.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'MasterKegiatan', 'route' => 'admin.master-kegiatans.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <!--div class="card-header">
        {{ trans('cruds.masterKegiatan.title_singular') }} {{ trans('global.list') }}
    </div-->

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-MasterKegiatan">
            <thead>
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
                    <th width="120px">
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
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