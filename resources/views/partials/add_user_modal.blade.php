<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-12">
            <div class="">
                <div class="p-1 m-1">
                    <h4 class="card-title">{{ $title }}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form
                            action="http://localhost/store_or_update_user{{ isset($user->id) ? '/' . $user->id : null }}"
                            method="POST" class="form form-vertical">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical"> Name</label>
                                            <input type="text" id="name" class="form-control" name="name"
                                                placeholder="Name" value="{{ @$user->name }}">
                                        </div>
                                    </div> 
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email-id-vertical">Email</label>
                                            <input type="email" id="email" class="form-control" name="email"
                                                placeholder="Email" value="{{ @$user->email }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="password-vertical">Password</label>
                                            <input type="password" id="password" class="form-control" name="password"
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
                                            <select class="form-control" name="user_role">
                                                @foreach ($user_roles as $id => $user_role)
                                                    <option value="{{ $id }}"
                                                        {{ @$user->user_role_id ? ($id == $user->user_role_id ? 'selected' : '') : '' }}>
                                                        {{ $user_role }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
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
