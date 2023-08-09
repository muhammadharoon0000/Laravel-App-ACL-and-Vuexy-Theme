<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use OTIFSolutions\ACLMenu\Models\MenuItem;
use OTIFSolutions\ACLMenu\Models\UserRole;

class MenuItemsTableSeeder extends Seeder
{

    public function run()
    {
        $id = UserRole::Where(['name' => 'ADMIN'])->get('id');
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
            ->sync($id);
    }
}
