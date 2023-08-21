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
        <div class="w-100">
            <div class="float-right">
                <button type="button" class="btn btn-primary mr-1 mb-1" data-toggle="modal-feed" data-target="#modal_sm"
                    data-feed="http://localhost/get_user_role_modal">Add
                    Role</button>

                <button type="button" class="btn btn-success mr-1 mb-1" data-toggle="modal-feed" data-target="#modal_sm"
                    data-feed="http://localhost/get_user_role">Add User</button>
            </div>
        </div>
    </div>

    <section id="nav-justified">
        <div class="row">
            <div class="col-12">
                <div class="card overflow-hidden">
                    <div class="card-content">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab-justified" data-toggle="tab" href="#users"
                                        role="tab" aria-controls="home-just" aria-selected="true">User</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab-justified" data-toggle="tab" href="#roles"
                                        role="tab" aria-controls="profile-just" aria-selected="true">Roles</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content pt-1">
                                <div class="tab-pane active" id="users" role="tabpanel"
                                    aria-labelledby="home-tab-justified">
                                    <div class="row">
                                        <div class="col-12 h-100">
                                            <div class="">
                                                <h4>Users</h4>
                                                <table id="myTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Team ID</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @if ($users)
                                                            @foreach ($users as $user)
                                                                <tr>
                                                                    <td>{{ $user->name }}</td>
                                                                    <td>{{ $user->email }}</td>
                                                                    <td>{{ $user->tean_id }}</td>
                                                                    <td>
                                                                        <div>
                                                                            <button class="btn btn-primary m-1"
                                                                                data-toggle="delete-feed"
                                                                                data-feed="http://localhost/delete_user/{{ $user->id }}"
                                                                                data-confirm-button-text="Yes, remove it!"
                                                                                data-swal-cancel-text="The record has not been deleted."
                                                                                data-swal-confirm-text="The record has been deleted."
                                                                                data-swal-confirm-title="Deleted!">Delete</button>
                                                                            <button class="btn btn-success m-1"
                                                                                data-toggle="modal-feed"
                                                                                data-target="#modal_md"
                                                                                data-feed="http://localhost/edit_user_modal/{{ $user->id }}">Edit</button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        @endif

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="roles" role="tabpanel"
                                    aria-labelledby="profile-tab-justified">
                                    <div class="row">
                                        <div class="col-12 h-100">
                                            <h4>User Roles</h4>
                                            <table class="w-100" id="myTable2">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @if ($userRoles)
                                                        @foreach ($userRoles as $userRole)
                                                            <tr>
                                                                <td>{{ $userRole->name }}</td>
                                                                <td>
                                                                    <div>
                                                                        <button type="button" class="btn btn-dark mb-1"
                                                                            data-toggle="modal-feed" data-target="#modal_lg"
                                                                            data-feed="http://localhost/get_permissions/{{ $userRole->id }}">Assign
                                                                            Permissions</button>
                                                                        <button class="btn btn-primary m-1"
                                                                            data-toggle="delete-feed"
                                                                            data-feed="http://localhost/delete_user_role/{{ $userRole->id }}"
                                                                            data-confirm-button-text="Yes, remove it!"
                                                                            data-swal-cancel-text="The record has not been deleted."
                                                                            data-swal-confirm-text="The record has been deleted."
                                                                            data-swal-confirm-title="Deleted!">Delete</button>
                                                                        <button class="btn btn-success m-1"
                                                                            data-toggle="modal-feed" data-target="#modal_sm"
                                                                            data-feed="http://localhost/edit_user_role/{{ $userRole->id }}">Edit</button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <td>No Data</td>
                                                        <td>No Data</td>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script src="{{ asset('app-assets/js/custom.js') }}"></script>
    <script src="{{ asset('app-assets/js/otifcdn.js') }}"></script>
@endpush
