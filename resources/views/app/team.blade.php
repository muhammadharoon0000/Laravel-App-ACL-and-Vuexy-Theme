@extends('layouts.master')
@include('partials.add_user_role_modal')
@include('partials.add_user_modal')
@section('content')
    <div class="row">
        <div class="col-12">
            <button type="button" id="add_role" class="btn btn-primary mr-1 mb-1">Add
                Role</button>
            <button type="button" id="add_user_btn" class="btn btn-success mr-1 mb-1">Add User</button><br>
            <button type="button" id="assign_permissions" class="btn btn-dark mr-1 mb-1">Assign Permissions
            </button>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('app-assets\js\custom.js') }}"></script>
@endpush
