<div class="form-group">
    <label for="item">{{ __('Item') }}</label>
    <input type="text" name="item" id="item" class="form-control" value="{{ $wish ? $wish->item : old('item') }}" placeholder="Item">
    <div class="text-danger mt-2 error_message d-none" id="error_item"></div>
</div>

<div class="form-group">
    <label for="cost_estimate">{{ __('Estimated Cost') }}</label>
    <input type="number" min="1" name="cost_estimate" id="cost_estimate" class="form-control" value="{{ $wish ? $wish->cost_estimate : old('cost_estimate') }}" placeholder="Estimated Cost">
    <div class="text-danger mt-2 error_message d-none" id="error_cost_estimate"></div>
</div>

<div class="form-group">
    <label for="pp_date">{{ __('Prospective Purchase Date') }}</label>
    <input type="text" name="pp_date" id="pp_date" class="form-control dpck" value="{{ $wish ? edit_date($wish->pp_date) : old('pp_date') }}" placeholder="Prospective Purchase Date">
    <div class="text-danger mt-2 error_message d-none" id="error_pp_date"></div>
</div>

<div class="form-group">
    <label for="priority">{{ __('Priority') }}</label> <br>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="priority" id="priority1" value="1" {{ $wish && $wish->priority == 1 ? 'checked' : '' }}>
        <label class="form-check-label" for="priority1">{{ __('High') }}</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="priority" id="priority2" value="2" {{ !$wish || $wish->priority == 2 ? 'checked' : '' }}>
        <label class="form-check-label" for="priority2">{{ __('Medium') }}</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="priority" id="priority3" value="3" {{ $wish && $wish->priority == 3 ? 'checked' : '' }}>
        <label class="form-check-label" for="priority3">{{ __('Low') }}</label>
    </div>
</div>

<div class="form-group">
    <label for="image" class="btn btn-success"><i class="fas fa-cloud-upload-alt"></i> {{ __('Select Image') }}</label>
    <input type="file" name="image" id="image" class="form-control d-none">
    <span id="imagePreview" class="{{ $wish && $wish->image ? '' : 'd-none' }}">
        <img src="" alt="NA">
    </span>
    <div class="text-danger mt-2 error_message d-none" id="error_image"></div>
</div>
