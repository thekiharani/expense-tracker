<div class="modal-content">

    <div class="modal-header">
        <h5 class="modal-title" id="upsertModalLabel">{{ __('Add Expense') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <form action="{{ route('expense.store') }}" method="POST" id="ajaxForm">
        @csrf
        <div class="modal-body">
            @include('expense._inputs', ['expense' => null])
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </form>

</div>
