<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            "description" => "required|string|min:10|max:6000",
            "image" => "image|mimes:jpeg,jpg,png,gif",
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
            "description.max" => "The description field must have less than 6000 characters",

            "image.image" => "The file must be an image",
            "image.mime" => "The image format must be a jpeg,jpg,png, or gif",

            "categories.required" => "You must choose one type of categories"
        ];
    }
}
