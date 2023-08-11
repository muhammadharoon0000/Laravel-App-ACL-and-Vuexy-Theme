<section id="add_user_role_modal">
    <div class="row match-height">
        <div class="col-12">
            <div class="">
                <div class="p-2">
                    <h4 class="card-title p-2 m-2">Add Role</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form id="add_role_form" class="form form-vertical">
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Name</label>
                                            <input type="text" id="add_role_name" class="form-control"
                                                name="fname">
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <button button[type='submit']
                                            class="btn btn-xs btn-icon btn-outline-primary waves-effect waves-light"
                                            data-toggle="post-feed" data-title="Are you sure?"
                                            data-feed="http://localhost/store_user_role">Add
                                            Role</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div> --}}
</section>
