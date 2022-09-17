<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
    public function rules()
    {
        return [
            "title" => "required|string|min:5|max:60",
            "description" => "required|string|min:10|max:2000",
            "image" => "required|string",
            "categories" => "required"
        ];
    }

    public function messages()
    {
        return [
            "title.required" => "The title field must be filled",
            "title.string" => "The title field must be a valid message",
            "title.min" => "The title field must have at least 5 characters",
            "title.max" => "The title field must have less than 60 characters",

            "description.required" => "The description field must be filled",
            "description.string" => "The description field must be a valid message",
            "description.min" => "The description field must have at least 10 characters",
            "description.max" => "The description field must have less than 2000 characters",

            "image.required" => "The image field is required",
            "image.string" => "You must put a valid image",

            "categories.required" => "You must choose one type of categories"
        ];
    }
}
