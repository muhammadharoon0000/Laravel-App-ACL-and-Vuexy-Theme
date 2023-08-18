<section class="basic-checkbox">
    <div class="row">
        <div class="col-12">

            <div class="m-1 p-1">
                <h4 class="card-title">Permissions</h4>
            </div>
            <form action="/assign_permissions" method="POST">
                @csrf
                <div class="col-12">
                    <div class="card-content">
                        <div class="card-body">
                            <input type="hidden" name="id" value="{{ $id }}">
                            <ul id="permissions_ul" class="list-unstyled mb-0 d-flex flex-column">
                                {{-- $assignedMenuItems --}}
                                @foreach ($menuItems as $menuItem)
                                    <li class="d-inline-block mr-2">
                                        <fieldset>
                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                <input
                                                    {{ $assignedMenuItems->firstWhere('id', $menuItem->id) ? 'checked' : '' }}
                                                    name="menu_items[]" type="checkbox" value={{ $menuItem->id }} />
                                                <span class="vs-checkbox">
                                                    <span class="vs-checkbox--check">
                                                        <i class="vs-icon feather icon-check"></i>
                                                    </span>
                                                </span>
                                                <span class="">
                                                    <h3 class="d-inline p-1">{{ $menuItem->name }}</h3>
                                                </span>
                                            </div>
                                        </fieldset>
                                    </li>
                                    @foreach ($menuItem->user_roles->firstWhere('name', $currentUserRole->name)->permissions->where('menu_item_id', $menuItem->id) as $permissions)
                                        @if ($permissions)
                                            <li class="d-inline-block mr-2">
                                                <fieldset>
                                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                                        <input
                                                            {{ $assignedPermissions->firstWhere('id', @$permissions->id) ? 'checked' : '' }}
                                                            name="permissions[]" type="checkbox"
                                                            value={{ isset($permissions->id) ? $permissions->id : '' }}>
                                                        <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="vs-icon feather icon-check"></i>
                                                            </span>
                                                        </span>
                                                        <span class=""><b
                                                                class="p-1">{{ isset($permissions->name) ? $permissions->name : '' }}</b></span>
                                                    </div>
                                                </fieldset>
                                            </li>
                                        @endif
                                    @endforeach
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
