@extends('layouts.master')
@include('layouts.modals.modal-sm')
@include('layouts.modals.modal-lg')
@include('layouts.modals.modal-md')


@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
@endpush

@section('content')
    <div class="row">
        <div class="col-3">

            <button type="button" class="btn btn-primary mr-1 mb-1" data-toggle="modal-feed" data-target="#modal_sm"
                data-feed="http://localhost/get_user_role_modal">Add
                Role</button>

            <button type="button" class="btn btn-success mr-1 mb-1" data-toggle="modal-feed" data-target="#modal_sm"
                data-feed="http://localhost/get_user_role">Add User</button>

            <button type="button" class="btn btn-dark mr-1 mb-1" data-toggle="modal-feed" data-target="#modal_lg"
                data-feed="http://localhost/get_permissions">Assign Permissions</button>

        </div>
        <div class="col-9 h-100">
            <div class="h-50">
                <h4>Users</h4>
                <table id="myTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="my-2 h-50">
                <h4>User Roles</h4>
                <table id="myTable2">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script src="{{ asset('app-assets/js/custom.js') }}"></script>
    <script src="{{ asset('app-assets/js/otifcdn.js') }}"></script>
@endpush
