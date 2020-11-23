@extends('layouts.master')

@section('title', 'Wish List')

@section('content')
    <div class="card">
        <p class="card-header h3 text-center">My Wish List</p>
        <div class="card-body">
            <div class="text-right">
                <a href="{{ route('wish_list.create') }}" class="btn btn-primary btn-sm mb-2">
                    <i class="fas fa-plus"></i>
                    Add Wish Item
                </a>
            </div>
            <div class="table-responsive">
                @include('layouts._messages')
                <table class="table table-bordered table-sm" id="dt">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Cost Estimate</th>
                            <th>Priority</th>
                            <th>Purchased</th>
                            <th>PP Date</th>
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
                    url: '{{ route('wish_list.index') }}'
                },
                columns: [
                    {data: 'item', name: 'item'},
                    {data: 'cost_estimate', name: 'cost_estimate'},
                    {data: 'priority', name: 'priority'},
                    {data: 'purchased', name: 'purchased'},
                    {data: 'pp_date', name: 'pp_date'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action'}
                ],
                "columnDefs": [
                    {"targets": [6, 7], "searchable": false},
                    {"targets": [7], "orderable": false}
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
