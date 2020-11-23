@extends('layouts.master')

@section('title', 'Admins')

@section('content')
    <div class="card">
        <p class="card-header h3 text-center">System Administrators</p>
        <div class="card-body">
            <div class="text-right">
                <a href="{{ route('manage.admins.create') }}" class="btn btn-primary btn-sm mb-2">
                    <i class="fas fa-plus"></i>
                    New Admin
                </a>
            </div>
            <div class="table-responsive">
                @include('layouts._messages')
                <table class="table table-bordered table-sm" id="dt">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Super Admin</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="upsertModal" tabindex="-1" role="dialog" aria-labelledby="upsertModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <span id="body"></span>
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
                    url: '{{ route('manage.admins.index') }}'
                },
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'phone_number', name: 'phone_number'},
                    {data: 'super_admin', name: 'super_admin'},
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
            if (confirm('Are you sure you want to archive this record and all of its children?')) {
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
