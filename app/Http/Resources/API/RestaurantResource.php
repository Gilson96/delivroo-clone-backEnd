<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "src" => $this->src,
            "rating" => $this->rating,
            "address" => $this->address,
            "description" => $this->description,
            "longtitude" => $this->longtitude,
            "latitude" => $this->latitude,
            // "categories" => $this->categories->pluck("name"),
            "dishes" => $this->dishes
        ];

    }
}