@if($wish->purchased)
    <button class='btn btn-success btn-block btn-sm'>
        <i class="fas fa-check-circle"></i>
        YES
    </button>
@else
    <button class='btn btn-danger btn-block btn-sm'>
        <i class="fas fa-times-circle"></i>
        Not Yet
    </button>
@endif
