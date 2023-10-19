<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = 
    [
        "title",
        "description",
        "price",
        "src"
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}