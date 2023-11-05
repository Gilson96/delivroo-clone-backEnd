<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DishResource;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Dish;
use App\Http\Requests\DishRequest;
use App\Http\Requests\RestaurantRequest;
use App\Http\Resources\RestaurantResource;

class Restaurants extends Controller
{
    public function index()
    {
        return Restaurant::all();
    }

    
    public function store(Request $request)
    {
        $data = $request->all();

        $restaurant = Restaurant::create($data);

        return new RestaurantResource($restaurant);
    }

    public function show(Restaurant $restaurant)
    {
        return new RestaurantResource($restaurant);
    }

    public function update(RestaurantRequest $request, Restaurant $restaurant)
    {
        $data = $request->all();
        $restaurant->update($data);

        return new RestaurantResource($restaurant);
    }

    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return response(null, 204);
    }

    public function dishShow()
    {        
        return Dish::all();
    }

   

    public function dishPost(Request $request, Restaurant $restaurant)
    {
        
        $dish = new Dish($request->all());
        
        $restaurant->dishes()->save($dish);
        // return the stored comment

        return new DishResource($dish);
    }

    public function dishDestroy(Restaurant $restaurant)
    {
        
        $dish = $restaurant->dishes();
        
        $dish->delete();

        return redirect("/restaurant/{$restaurant->id}");
    }

}