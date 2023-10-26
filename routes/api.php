<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    });
});