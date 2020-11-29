@extends('layouts.master')

@section('title', 'Expenses')

@section('content')
    <div class="card">
        <p class="card-header h3 text-center">My Expenses</p>
        <div class="card-body">
            <div class="text-right">
                <button data-link="{{ route('expense.create') }}" class="btn btn-primary btn-sm mb-2 upsert">
                    <i class="fas fa-plus"></i>
                    Add Expense
                </button>
            </div>
            <div class="table-responsive">
                @include('layouts._messages')
                <table class="table table-bordered dt-responsive nowrap" id="dt">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Amount</th>
                            <th>Date Transacted</th>
                            <th>Date Recorded</th>
                            <th>Last Updated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="upsertModal" tabindex="-1" aria-labelledby="upsertModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <span id="upsertContent"></span>
        </div>
    </div>

    @push('css')
        <link rel="stylesheet" href="{{ asset('css/datetimepicker.min.css') }}">
    @endpush

    @push('js')
        <script src="{{ asset('js/datetimepicker.min.js') }}"></script>
        <script>
            $(function () {
                loadData();

                function loadData()
                {
                    $('#dt').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: '{{ route('expense.index') }}'
                        },
                        columns: [
                            {data: 'item', name: 'item'},
                            {data: 'cost', name: 'cost'},
                            {data: 'date_transacted', name: 'date_transacted'},
                            {data: 'created_at', name: 'created_at'},
                            {data: 'updated_at', name: 'updated_at'},
                            {data: 'action', name: 'action'}
                        ],
                        "columnDefs": [
                            {"targets": [4, 5], "searchable": false},
                            {"targets": [5], "orderable": false}
                        ]
                    });
                }

                // upsert
                $(document).on('click', '.upsert', function () {
                    const url = $(this).data('link');
                    $.ajax({
                        url: url,
                        success: function (res) {
                            $('#upsertModal').modal('show');
                            $('#upsertContent').html(res);
                            $('.dpck').datetimepicker({
                                format: 'd-m-Y H:i:s'
                            });
                        },
                        error: function (err) {
                            alert(err);
                        }
                    });
                });

                // ajax form submission
                $(document).on('submit', '#ajaxForm', function (e) {
                    e.preventDefault();
                    const url = $(this).attr('action');
                    const formData = new FormData(this);
                    $('.error_message').addClass('d-none').text('');
                    $('.form-control').removeClass('is-invalid');
                    $.ajax({
                        url: url,
                        method: 'POST',
                        data: formData,
                        cache:false,
                        contentType: false,
                        processData: false,
                        success: function (res) {
                            $('#ajaxForm')[0].reset()
                            $('.success-message').removeClass('d-none');
                            $('#upsertModal').modal('hide');
                            $('#dt').DataTable().destroy();
                            loadData();
                        },
                        error: function (err) {
                            if (err.status === 422) {
                                let res = $.parseJSON(err.responseText);
                                $.each(res.errors, function (key, value) {
                                    $(`#error_${key}`).removeClass('d-none').text(value);
                                    $(`#${key}`).addClass('is-invalid');
                                });
                            }
                        }
                    });
                });

                // delete
                $(document).on('click', '.delete', function () {
                    const url = $(this).data('link');
                    if (confirm('Are you sure you want to archive this expense entry?')) {
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
