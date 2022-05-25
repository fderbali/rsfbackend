<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            "first_name"=>"required",
            "last_name"=>"required",
            "email"=>"required|email|unique:users",
            "birth_date"=>"required|date",
            "address"=>"required",
            "city"=>"required",
            "zip_code"=>"required",
            "country"=>"required",
            "password"=>"required",
            "communication"=>['required','string',Rule::in(['french', 'english'])]
        ];
    }
}
