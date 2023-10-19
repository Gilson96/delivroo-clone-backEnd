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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Restaurant::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $restaurant = Restaurant::create($data);

        // $categories = Category::fromStrings($request->get("categories"));

        // $restaurant->categories()->sync($categories->pluck("id")->all());

        return new RestaurantResource($restaurant);
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        return new RestaurantResource($restaurant);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RestaurantRequest $request, Restaurant $restaurant)
    {
        $data = $request->all();
        $restaurant->update($data);

        // $categories = Category::fromStrings($request->get("categories"));
        // // sync the tags: needs an array of Tag ids
        // $restaurant->categories()->sync($categories->pluck("id")->all());


        return new RestaurantResource($restaurant);
    }

    /**
     * Remove the specified resource from storage.
     */
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