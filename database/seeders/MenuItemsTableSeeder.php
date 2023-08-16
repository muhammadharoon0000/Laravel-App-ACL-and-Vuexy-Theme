<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use OTIFSolutions\ACLMenu\Models\MenuItem;
use OTIFSolutions\ACLMenu\Models\UserRole;

class MenuItemsTableSeeder extends Seeder
{

    public function run()
    {
        $roleNames = ['ADMIN', 'CUSTOMER'];
        $roles = UserRole::whereIn('name', $roleNames)->pluck("id");
        MenuItem::updateOrCreate(
            ['id' => 1],
            [
                'order_number' => 1,
                'parent_id' => 0,
                'icon' => 'feather icon-home',
                'name' => 'Dashboard',
                'route' => '/dashboard',
                'generate_permission' => 'ALL'
            ]
        )
            ->user_roles()
            ->sync($roles[0]);
        MenuItem::updateOrCreate(
            ['id' => 2],
            [
                'order_number' => 2,
                'parent_id' => 0,
                'icon' => 'feather icon-check-square',
                'name' => 'To-Do',
                'route' => '/to_do',
                'generate_permission' => 'ALL'
            ]
        )
            ->user_roles()
            ->sync($roles[0], $roles[1]);
        MenuItem::updateOrCreate(
            ['id' => 3],
            [
                'order_number' => 3,
                'parent_id' => 0,
                'icon' => 'feather icon-user',
                'name' => 'Team',
                'route' => '/team',
                'generate_permission' => 'ALL'
            ]
        )
            ->user_roles()
            ->sync([$roles[0], $roles[1]]);
    }
}
