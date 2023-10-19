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
            "rating" => ["required", "decimal"],
            "address" => ["required", "string", "max:100"],
            "description" => ["required", "string", "max:100"],
            "longtitude" => ["required", "decimal"],
            "latitude" => ["required", "decimal"],
            // "categories" => ["required", "array"],
            // "categories.*" => ["string", "max:30"],
        ];
    }
}