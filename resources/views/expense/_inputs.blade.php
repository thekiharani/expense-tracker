<div class="form-group">
    <label for="item">Item</label>
    <input type="text" name="item" id="item" class="form-control" value="{{ $expense ? $expense->item : old('item') }}" placeholder="Item">
    <div class="text-danger mt-2 error_message d-none" id="error_item"></div>
</div>
<div class="form-group">
    <label for="cost">Cost</label>
    <input type="number" min="1" name="cost" id="cost" class="form-control" value="{{ $expense ? $expense->cost : old('cost') }}" placeholder="Cost">
    <div class="text-danger mt-2 error_message d-none" id="error_cost"></div>
</div>
<div class="form-group">
    <label for="date_transacted">Date Transacted</label>
    <input type="text" name="date_transacted" id="date_transacted" class="form-control dpck" value="{{ $expense ? edit_date($expense->date_transacted) : old('date_transacted') }}" placeholder="Date received">
    <div class="text-danger mt-2 error_message d-none" id="error_date_transacted"></div>
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" id="description" class="form-control" placeholder="Description">{{ $expense ? $expense->description : old('description') }}</textarea>
    <div class="text-danger mt-2 error_message d-none" id="error_description"></div>
</div>
