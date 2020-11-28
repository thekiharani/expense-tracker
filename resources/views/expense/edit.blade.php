@extends('layouts.master')

@section('title', __('Edit Expense'))

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <p class="card-header h3 text-center">{{ __('Edit Expense') }}</p>
                <form action="{{ route('expense.update', $expense->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        @include('layouts._messages')
                        @include('income._inputs', ['expense' => null])
                        <div class="form-group">
                            <label for="item">Item</label>
                            <input type="text" name="item" id="item" class="form-control @error('item') is-invalid @enderror" value="{{ $expense->item }}" placeholder="Item" required>
                        </div>

                        <div class="form-group">
                            <label for="cost">Amount</label>
                            <input type="number" min="1" name="cost" id="cost" class="form-control @error('cost') is-invalid @enderror" value="{{ $expense->cost }}" placeholder="Cost" required autofocus>
                        </div>


                        <div class="form-group">
                            <label for="date_transacted">Date Transacted</label>
                            <input type="date" name="date_transacted" id="date_transacted" class="form-control @error('date_transacted') is-invalid @enderror" value="{{ $expense->date_transacted }}" placeholder="Date transacted" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description">{{ $expense->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Update') }}</button>
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
