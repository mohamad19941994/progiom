<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Page::create([
            'policy_name' => 'category 1',
            'policy_description' => 'category 1',
            'term_name' => 'category 1',
            'term_description' => 'category 1',
        ]);
    }
}
