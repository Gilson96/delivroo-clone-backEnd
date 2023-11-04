<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dish;
class Restaurant extends Model
{
    protected $fillable = 
    [
        "title", 
        "src",
        "rating",
        "address",
        "description",
        "longtitude",
        "latitude",
    ];

    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }

    // public function categories()
    // {
    //     return $this->belongsToMany(Category::class);
    // }
}