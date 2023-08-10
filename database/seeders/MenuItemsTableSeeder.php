<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use OTIFSolutions\ACLMenu\Models\MenuItem;
use OTIFSolutions\ACLMenu\Models\UserRole;

class MenuItemsTableSeeder extends Seeder
{

    public function run()
    {
        $user_role_id = UserRole::Where(['name' => 'ADMIN'])->get('id');
        $customer_role_id = UserRole::Where(['name' => 'CUSTOMER'])->get('id');

        MenuItem::updateOrCreate(
            ['id' => 1],
            [
                'order_number' => 1,
                'parent_id' => 0,
                'icon' => 'feather icon-home',
                'name' => 'dashboard',
                'route' => '/dashboard',
                'generate_permission' => 'ALL'
            ]
        )
            ->user_roles()
            ->sync($user_role_id);
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
            ->sync($user_role_id);
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
            ->sync([$user_role_id, $customer_role_id]);
    }
}
