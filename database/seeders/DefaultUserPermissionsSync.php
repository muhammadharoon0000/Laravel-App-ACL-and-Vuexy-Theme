<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use OTIFSolutions\ACLMenu\Models\Permission;
use OTIFSolutions\ACLMenu\Models\UserRole;


class DefaultUserPermissionsSync extends Seeder
{
    public function run()
    {
        $userRole = UserRole::where(['name' => 'ADMIN'])->first();
        $permissions = Permission::whereIn('menu_item_id', $userRole->menu_items()->pluck('id'))->pluck('id');
        $userRole->permissions()->sync($permissions);

        $userRole = UserRole::where(['name' => 'CLIENT'])->first();
        $permissions = Permission::whereIn('menu_item_id', $userRole->menu_items()->pluck('id'))->pluck('id');
        $userRole->permissions()->sync($permissions);
    }
}
