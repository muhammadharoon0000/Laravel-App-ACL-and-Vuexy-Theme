<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-12">
            <div class="">
                <div class="">
                    <h4 class="card-title">Add/Update User</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical">
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical"> Name</label>
                                            <input type="text" id="name" class="form-control" name="fname"
                                                placeholder="First Name" value="{{ $user ? $user['name'] : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email-id-vertical">Email</label>
                                            <input type="email" id="email" class="form-control" name="email-id"
                                                placeholder="Email" value="{{ $user ? $user['email'] : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="password-vertical">Password</label>
                                            <input type="password" id="password" class="form-control" name="contact"
                                                placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="password-vertical">Confirm Password</label>
                                            <input type="password" id="confirm_password" class="form-control"
                                                name="confirm_password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="text-bold-600 font-medium-2">
                                            Select Role
                                        </div>
                                        <fieldset class="form-group">
                                            <select class="form-control" id="selected_role" name="user_role">
                                                @foreach ($user_roles as $id => $user_role)
                                                    <option value="{{ $id }}"
                                                        {{ $user['user_role_id'] == $id ? selected : '' }}>
                                                        {{ $user_role }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1" id="add_user">Add
                                            User</button>
                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
