<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
            "first_name" => ["required", "min:3", "max:60"],
            "last_name" => ["required", "min:3", "max:60"],
            "email" => ["required", "email", "min:5", "max:80", "unique:users,email," . auth()->id()],
            "username" => ["required", "min:5", "max:20", "unique:users,username," . auth()->id()],
            "bio" => ["max:140"],
            "profile_image" => ["image", "mimes:jpeg,png,jpg,gif"]
        ];
    }

    public function messages(): array
    {
        return [
            "first_name.required" => "The field first name must be filled",
            "first_name.min" => "The field first name must have at least 3 characters",
            "first_name.max" => "The field first name must have less than 60 characters",

            "last_name.required" => "The field last name must be filled",
            "last_name.min" => "The field last name must have at least 3 characters",
            "last_name.max" => "The field last name must have less than 60 characters",

            "email.required" => "The field email must be filled",
            "email.email" => "You must put a valid email on the email field",
            "email.min" => "The field email must have at least 3 characters",
            "email.max" => "The field email must have less than 80 characters",
            "email.unique" => "This email is already used",

            "username.required" => "The username field must be filled",
            "username.min" => "The username field must have at least 5 characters",
            "username.max" => "The username field must have less than 20 characters",
            "username.unique" => "This username is already used",

            "profile_image.image" => "The file need to be a image",
            "profile_image.mime" => "The type of files supported is jpeg,png,jpg or gif"
        ];
    }
}
