@extends('layouts.master')

@section('title', __('Add Income'))

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <p class="card-header h3 text-center">{{ __('Add Income') }}</p>
                <form action="{{ route('income.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        @include('layouts._messages')
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" min="1" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}" placeholder="Amount" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="source">Source</label>
                            <input type="text" name="source" id="source" class="form-control @error('source') is-invalid @enderror" value="{{ old('source') }}" placeholder="Source" required>
                        </div>
                        <div class="form-group">
                            <label for="date_received">Date Received</label>
                            <input type="date" name="date_received" id="date_received" class="form-control @error('date_received') is-invalid @enderror" value="{{ old('date_received') }}" placeholder="Date received" required>
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
