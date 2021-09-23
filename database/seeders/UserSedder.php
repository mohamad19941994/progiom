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
        $super_admin = \App\Models\User::create([
            'name' => 'Progiom',
            'email' => 'admin@progiom.com',
            'password' => Hash::make('password@'),
        ]);
        
        $super_admin->attachRole('super_admin');
        
        for ($i=1; $i<=20; $i++) {
           $user =  DB::table('users')->insert([
                'name' => 'Test User ' . $i,
                'email' => 'test' . $i . '@test.com',
                'password' => Hash::make('12345678'),
            ]);
            
        }
    }
}
