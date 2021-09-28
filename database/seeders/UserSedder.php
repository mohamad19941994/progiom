<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
//use App\Models\User;

class UserSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::create([
            'name' => 'super admin',
            'email' => 'mhmtslahyt68@gmail.com',
            'password' => bcrypt('mo12341234'),

        ]);
        $user->attachRole('super_admin');
    }
}
