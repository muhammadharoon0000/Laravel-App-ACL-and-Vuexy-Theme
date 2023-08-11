<section id="add_user_role_modal">
    <div class="row match-height">
        <div class="col-12">
            <div class="">
                <div class="p-2">
                    <h4 class="card-title p-2 m-2">Add Role</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="http://localhost/store_user_role" method="POST" class="form form-vertical">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Name</label>
                                            <input value="{{ $user_role ?? '' ? $user_role['name'] : '' }}"
                                                type="text" id="add_role_name" class="form-control" name="name">
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <button button[type='submit']
                                            class="btn btn-xs btn-icon btn-outline-primary waves-effect waves-light">{{ $title }}</button>
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
