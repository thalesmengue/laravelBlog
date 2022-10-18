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
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array<string>>
     */
    public function rules(): array
    {
        return [
            "title"       => ["required", "string", "min:5", "max:60"],
            "description" => ["required", "string", "min:10|max:6000"],
            "image"       => ["required", "image", "mimes:jpeg,png,jpg,gif"],
            "categories"  => ["required"]
        ];
    }

    public function messages(): array
    {
        return [
            "title.required" => "The title field must be filled",
            "title.string"   => "The title field must be a valid message",
            "title.min"      => "The title field must have at least 5 characters",
            "title.max"      => "The title field must have less than 60 characters",

            "description.required" => "The description field must be filled",
            "description.string"   => "The description field must be a valid message",
            "description.min"      => "The description field must have at least 10 characters",
            "description.max"      => "The description field must have less than 6000 characters",

            "image.required" => "The image field is required",
            "image.image"    => "The file need to be a image",
            "image.mime"     => "The type of files supported is jpeg,png,jpg or gif",

            "categories.required" => "You must choose one type of categories"
        ];
    }
}
