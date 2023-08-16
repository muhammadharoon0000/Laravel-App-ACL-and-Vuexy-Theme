<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use OTIFSolutions\ACLMenu\Models\Team;

class TeamsTableSeeder extends Seeder
{
    public function run()
    {
        Team::updateOrCreate(['user_id' => 1]);
    }
}
