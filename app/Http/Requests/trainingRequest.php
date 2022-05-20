<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class trainingRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            "title" => "required|max:25",
            "description" => "required",
            "thumbnail" => "required|file|image|max:5000",
            "level" => "required",
            "location" => "required",
            "user_id" => "required|integer",
            "category_id" => "required|integer",
            "total_duration" => "required|integer",
            "price" => "required|integer"
        ];
    }
}
