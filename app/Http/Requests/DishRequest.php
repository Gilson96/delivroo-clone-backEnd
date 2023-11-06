<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

  
    public function rules(): array
    {
        return [
            "title" => ["required", "string", "max:100"],
            // "description" => ["required", "string", "max:100"],
            // "price" => ["required", "decimal:1,1"],
            // "src" => ["required", "string", "max:100"]
        ];
    }
}
