<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cart extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'cart_number',
        'price',
        'date',
    ];
}
