@extends('layouts.master')

@section('title', __('Add Income'))

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <p class="card-header h3 text-center">{{ __('Add Income') }}</p>
                <form action="{{ route('wish_list.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        @include('layouts._messages')
                        <div class="form-group">
                            <label for="item">Item</label>
                            <input type="text" name="item" id="item" class="form-control @error('item') is-invalid @enderror" value="{{ old('item') }}" placeholder="Item" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="cost_estimate">Cost Estimate</label>
                            <input type="number" min="1" name="cost_estimate" id="cost_estimate" class="form-control @error('cost_estimate') is-invalid @enderror" value="{{ old('cost_estimate') }}" placeholder="Cost Estimate" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="pp_date">Prospective Purchase Date</label>
                            <input type="date" name="pp_date" id="pp_date" class="form-control @error('pp_date') is-invalid @enderror" value="{{ old('pp_date') }}" placeholder="Prospective Purchase Date" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Create') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('js')
    <script>
    $(function () {
        //
    });
    </script>
    @endpush
@endsection
