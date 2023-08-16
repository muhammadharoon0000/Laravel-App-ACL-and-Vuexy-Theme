<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate([
            'id' => 1
        ], [
            'user_role_id' => 1,
            'team_id' => 1,
            'name' => 'haroon',
            'email' => 'admin@gmail.com',
            'password' => Hash::make(12345678)
        ]);
    }
}
