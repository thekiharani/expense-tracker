<div class="modal-content">

    <div class="modal-header">
        <h5 class="modal-title" id="upsertModalLabel">{{ __('Expense Details') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <table class="table table-bordered">
            <tr>
                <td>{{ __('Source') }}</td>
                <th>{{ $expense->item }}</th>
            </tr>

            <tr>
                <td>{{ __('Amount') }}</td>
                <th>{{ auth()->user()->currency_code .' '. number_format($expense->cost, 2) }}</th>
            </tr>

            <tr>
                <td>{{ __('Date Received') }}</td>
                <th>{{ medium_date($expense->date_transacted) }}</th>
            </tr>

            <tr>
                <td>{{ __('Date Recorded') }}</td>
                <th>{{ medium_date($expense->created_at) }}</th>
            </tr>

            <tr>
                <td>{{ __('Last Updated') }}</td>
                <th>{{ time_diff($expense->updated_at) }}</th>
            </tr>

        </table>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>

</div>
