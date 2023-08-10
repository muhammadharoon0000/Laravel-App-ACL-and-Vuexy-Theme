@extends('layouts.master')
@include('layouts.modal')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
@endpush

@section('content')
    <div class="row">
        <div class="col-3">
            <button type="button" id="add_role_btn" class="btn btn-primary mr-1 mb-1">Add
                Role</button><br>
            <button type="button" id="add_user_btn" class="btn btn-success mr-1 mb-1">Add User</button><br>
            <button type="button" id="assign_permissions_btn" class="btn btn-dark mr-1 mb-1">Assign Permissions
            </button>
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
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script src="{{ asset('app-assets/js/custom.js') }}"></script>
@endpush
