@can($viewGate)
    <a href="{{ route('admin.' . $crudRoutePart . '.show', [$row->year, $row->provinsi]) }}">
        <i class="fal fa-search-plus"></i> 
    </a>
@endcan
