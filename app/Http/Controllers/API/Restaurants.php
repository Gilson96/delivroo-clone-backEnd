<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Dishes;
use App\Http\Requests\DishRequest;
use App\Http\Requests\RestaurantRequest;
use App\Http\Resources\RestaurantResource;

class Restaurants extends Controller
{
    public function index()
    {
        return Restaurant::all();
    }

    
    public function store(RestaurantRequest $request)
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

   

    public function dishPost(Request $request, Restaurant $restaurant)
    {
        
        $dish = new Dishes($request->all());
        
        $restaurant->dishes()->save($dish);
        // return the stored comment

        return redirect("/restaurant/{$restaurant->id}");
    }

    public function dishDestroy(Restaurant $restaurant)
    {
        
        $dish = $restaurant->dishes();
        
        $dish->delete();

        return redirect("/restaurant/{$restaurant->id}");
    }

}