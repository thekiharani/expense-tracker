<div class="form-group">
    <label for="amount">Amount</label>
    <input type="number" min="1" name="amount" id="amount" class="form-control" value="{{ $income ? $income->amount : old('amount') }}" placeholder="Amount">
    <div class="text-danger mt-2 error_message d-none" id="error_amount"></div>
</div>
<div class="form-group">
    <label for="source">Source</label>
    <input type="text" name="source" id="source" class="form-control" value="{{ $income ? $income->source : old('source') }}" placeholder="Source">
    <div class="text-danger mt-2 error_message d-none" id="error_source"></div>
</div>
<div class="form-group">
    <label for="date_received">Date Received</label>
    <input type="text" name="date_received" id="date_received" class="form-control dpck" value="{{ $income ? edit_date($income->date_received) : old('date_received') }}" placeholder="Date received">
    <div class="text-danger mt-2 error_message d-none" id="error_date_received"></div>
</div>
