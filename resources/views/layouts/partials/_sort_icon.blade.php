@if($sortBy !== $field)
    <i style="color: #A9A2A2" class="fas fa-sort"></i>
@elseif($sortDirection == 'asc')
    <i style="color: #7B68EE" class="fas fa-sort-amount-up"></i>
@else
    <i style="color: #7B68EE" class="fas fa-sort-amount-down"></i>
@endif
