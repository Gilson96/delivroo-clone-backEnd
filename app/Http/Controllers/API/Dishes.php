<?php

namespace App\Http\Controllers\API;

use App\Models\Restaurant;
use App\Models\Dish;
use App\Http\Requests\DishRequest;
use App\Http\Resources\DishResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dishes extends Controller
{

    public function show(Dish $dish)
    {
        return new DishResource($dish);
    }

    public function update(DishRequest $request, Dish $dish){

        $data = $request->all();
        $dish->update($data);

        return new dishResource($dish);
    }

    public function destroy(Dish $dish)
    {
        $dish->delete();
        return response(null, 204);
    }

}
