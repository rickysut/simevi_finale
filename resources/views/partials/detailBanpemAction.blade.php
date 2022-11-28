@can($viewGate)
    <a href="{{ route('admin.' . $crudRoutePart . '.show', [$row->year1, $row->year2, $row->provinsi]) }}">
        <i class="fal fa-search-plus"></i> 
    </a>
@endcan
