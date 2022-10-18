<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            "first_name" => ["required", "string", "max:60", "min:3"],
            "last_name" => ["required", "string", "max:80", "min:3"],
            "username" => ["required", "string", "max:24", "min:3", "unique:users"],
            "email" => ["required", "string", "email", "max:80", "unique:users"],
            "password" => ["required", "confirmed", Password::defaults()],
        ];
    }

    public function messages(): array
    {
        return [
            "first_name.required" => "The first name field must be filled",
            "first_name.string" => "The first name field must be a valid value",
            "first_name.max" => "The first name field must have less than 60 characters",
            "first_name.min" => "The first name field must have at least 3 characters",

        ];
    }
}
