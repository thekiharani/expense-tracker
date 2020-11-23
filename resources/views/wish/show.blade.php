@extends('layouts.master')

@section('title', __('Income Details'))

@section('content')
    <div class="card">
        <p class="card-header h3 text-center">{{ __('Income Details') }}</p>
        <div class="card-body">
            <div class="text-right">
                <a href="{{ route('income.create') }}" class="btn btn-primary btn-sm mb-2">
                    <i class="fas fa-plus"></i>
                    Add Income
                </a>
            </div>
            <div class="table-responsive">
                @include('layouts._messages')
                <table class="table table-bordered table-sm" id="dt">
                    <thead>
                        <tr>
                            <th>Amount</th>
                            <th>Date Received</th>
                            <th>Date Recorded</th>
                            <th>Last Updated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    @push('js')
    <script>
    $(function () {
        loadData();

        function loadData()
        {
            $('#dt').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('income.index') }}'
                },
                columns: [
                    {data: 'amount', name: 'amount'},
                    {data: 'date_received', name: 'date_received'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action'}
                ],
                "columnDefs": [
                    {"targets": [3, 4], "searchable": false},
                    {"targets": [4], "orderable": false}
                ]
            });
        }

        $(document).on('click', '.delete', function () {
            const url = $(this).attr('data-link');
            if (confirm('Are you sure you want to archive this income entry?')) {
                $.ajax({
                    url: url,
                    method: 'DELETE',
                    success: function (res) {
                        $('#dt').DataTable().destroy();
                        loadData();
                    }
                });
            } else {
                return false;
            }
        });

    });
    </script>
    @endpush
@endsection
