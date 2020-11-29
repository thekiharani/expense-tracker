<div class="modal-content">

    <div class="modal-header">
        <h5 class="modal-title" id="upsertModalLabel">{{ __('Wish Item Details') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <table class="table table-bordered">
            <tr>
                <td>{{ __('Item') }}</td>
                <th>{{ $wish->item }}</th>
            </tr>

            <tr>
                <td>{{ __('Estimated Cost') }}</td>
                <th>{{ auth()->user()->currency_code .' '. number_format($wish->cost_estimate, 2) }}</th>
            </tr>

            <tr>
                <td>{{ __('Prospective Purchase Date') }}</td>
                <th>{{ medium_date($wish->pp_date) }}</th>
            </tr>

            <tr>
                <td>{{ __('Priority') }}</td>
                <th>@include('components.wish_dt._priority', ['wish' => $wish])</th>
            </tr>

            <tr>
                <td>{{ __('Date Recorded') }}</td>
                <th>{{ medium_date($wish->created_at) }}</th>
            </tr>

            <tr>
                <td>{{ __('Last Updated') }}</td>
                <th>{{ time_diff($wish->updated_at) }}</th>
            </tr>

        </table>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>

</div>
