<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $match = \App\Models\Match::create([
            'name' => 'super admin',
            'category_id' => 1,
            'start_time' => '2021-09-28 04:16:14',
            'url' => 'https://google.com',
        ]);
    }
}
