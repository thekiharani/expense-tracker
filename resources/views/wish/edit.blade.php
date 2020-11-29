<div class="modal-content">

    <div class="modal-header">
        <h5 class="modal-title" id="upsertModalLabel">{{ __('Edit Wishlist') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="{{ route('wish_list.update', $wish->id) }}" method="POST" id="ajaxForm">
        @csrf
        @method('PATCH')
        <div class="modal-body">
            @include('wish.._inputs', ['wish' => $wish])
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </form>

</div>
