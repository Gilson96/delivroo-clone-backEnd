<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "title" => ["required", "string", "max:100"],
            "src" => ["required", "string", "max:100"],
            "rating" => ["required", "decimal", "5,3"],
            "address" => ["required", "string", "max:100"],
            "description" => ["required", "string", "max:100"],
            "longtitude" => ["required", "decimal", "30,20"],
            "latitude" => ["required", "decimal", "30,20"],
            "dishes" => ["required", "array"]
            // "categories" => ["required", "array"],
            // "categories.*" => ["string", "max:30"],
        ];
    }
}