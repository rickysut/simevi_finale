@can($viewGate)

    <a class="btn btn-xs btn-primary" href="{{ route('admin.' . $crudRoutePart . '.show', [$row->kd_satker, $row->tahun, DateTime::createFromFormat("d/m/Y", $row->tanggal)->format("d-m-Y")]) }}">
       <i class="fal fa-search-plus"></i> <!--{{ trans('global.view') }}-->
    </a>
@endcan