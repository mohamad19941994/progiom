<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    
    public function run()
    {
        \App\Models\Setting::create([
            
            'website_title'=>'5555',
            'contact_phone'=>'5555',
            'location'=>'374 William S Canning Blvd, Fall River MA 2721, USA',
            'facebook_url'=>'#',
            'email'=>'info@email.com',
            'logo'=>'logo.png',
            'logo_footer'=>'logo_footer.png',
            'favicon'=>'favicon.png',
            'facebook_id'=>'210894722754119',

        ]);
    }
}
