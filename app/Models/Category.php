<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Match;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function matches()
    {
        return $this->belongsToMany(Match::class, 'matches');

    }// end of matches
}
