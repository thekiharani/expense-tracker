@if($wish->priority == 1)
    <button class='btn btn-danger btn-sm'>
        <i class="fas fa-check-circle"></i>
        High
    </button>
@elseif($wish->priority == 2)
    <button class='btn btn-primary btn-sm'>
        <i class="fas fa-check-circle"></i>
        Medium
    </button>
@else
    <button class='btn btn-success btn-sm'>
        <i class="fas fa-times-circle"></i>
        Low
    </button>
@endif
