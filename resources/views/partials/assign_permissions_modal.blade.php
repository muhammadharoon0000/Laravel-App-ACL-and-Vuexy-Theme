<section class="basic-checkbox">
    <div class="row">
        <div class="col-12">

            <div class="m-1 p-1">
                <h4 class="card-title">Permissions</h4>
            </div>
            <form action="http://localhost/assign_permissions" method="POST">
                @csrf
                <div class="col-12">
                    <div class="card-content">
                        <div class="card-body">
                            <ul id="permissions_ul" class="list-unstyled mb-0 d-flex flex-column">
                                @foreach ($permissions as $id => $permission)
                                    <li class="d-inline-block mr-2 m-1">
                                        <fieldset>
                                            <label>
                                                <input type="checkbox"
                                                    value={{ $id }}><b>{{ $permission }}</b>
                                            </label>
                                        </fieldset>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary mr-1 mb-1">Asign Permissions</button>
                </div>
            </form>


        </div>
    </div>
</section>
