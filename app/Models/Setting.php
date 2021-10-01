<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'website_title',
        'location',
        'copyright',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'pinterest_url',
        'linkedin_url',
        'telegram_url',
        'youtube_url',
        'contact_phone',
        'email',
        'logo',
        'logo_footer',
        'favicon',
        'facebook_id',
    ];
}
