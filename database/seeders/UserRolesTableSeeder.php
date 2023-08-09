<?php

namespace Database\Seeders;

use OTIFSolutions\ACLMenu\Models\UserRole;

use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{

    public function run()
    {
        UserRole::updateOrCreate(
            ['id' => 1],
            [
                'name' => 'ADMIN'
            ]
        );

        UserRole::updateOrCreate(
            ['id' => 2],
            [
                'name' => 'CUSTOMER'
            ]
        );
    }
}
