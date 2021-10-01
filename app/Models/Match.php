<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Carbon\Carbon;

class Match extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'start_time',
        'url',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories');

    }// end of categories

    public function getDateStartAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d\TH:i');
    }
}
