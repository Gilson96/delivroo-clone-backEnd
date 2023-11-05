<?php

namespace App\Http\Controllers\API\Restaurants;

use App\Models\Restaurant;
use App\Models\Dish;
use App\Http\Requests\DishRequest;
use App\Http\Resources\DishResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dishes extends Controller
{
    public function index(Restaurant $restaurant)
    {
        
        return Dish::all();
    }

    public function store(DishRequest $request, Restaurant $restaurant)
    {        
        $dish = new dish($request->all());
        $restaurant->dishes()->save($dish);

        return new DishResource($dish);
    }
}
