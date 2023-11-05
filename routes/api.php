<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Restaurants;
use App\Http\Controllers\API\Restaurants\Dishes as RestaurantDishes;
use App\Http\Controllers\API\Dishes;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test/env', function () {
    dd(env('DB_DATABASE')); // Dump 'db' variable value one by one
});

Route::group(["prefix" => "restaurants"], function () {
    // GET /restaurants: show all articles
    Route::get("", [Restaurants::class, "index"]);
    // POST /Restaurants: create a new article
    Route::post("", [Restaurants::class, "store"]);
    // all these routes also have an article ID in the
    // end-point, e.g. /Restaurants/8
    Route::group(["prefix" => "{restaurant}"], function () {
        // GET /Restaurants/8: show the article
        Route::get("", [Restaurants::class, "show"]);
        // PUT /Restaurants/8: update the article
        Route::put("", [Restaurants::class, "update"]);
        // DELETE /Restaurants/8: delete the article
        Route::delete("", [Restaurants::class, "destroy"]);
        Route::group(["prefix" => "dishes"], function(){
            Route::get("", [RestaurantDishes::class, "index"]);
            Route::post("", [RestaurantDishes::class, "store"]);  
        });
    });

    Route::group(["prefix" => "dishes"], function () {

        Route::get("{restaurant}", "App\Http\Controllers\API\Restaurants@dishShow");
        Route::post("{restaurant}", "App\Http\Controllers\API\Restaurants@dishPost");
        Route::delete("{restaurant}", "App\Http\Controllers\API\Restaurants@dishDestroy");
    
    });
    
   

});
