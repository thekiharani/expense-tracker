@if($user->super_admin)
    <button class='btn btn-success btn-sm'>
        <i class="fas fa-check-circle"></i>
        YES
    </button>
@else
    <button class='btn btn-danger btn-sm'>
        <i class="fas fa-times-circle"></i>
        NO
    </button>
@endif
