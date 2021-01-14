<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required|min:4|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|max:20',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Your Name Is Required',
            'name.min' => 'The name must be at  least 4 characters long',
            'name.max' => 'The name must be no more than 20 characters',
            'email.required' => 'Email Is Required',
            'email.email' => 'This Is Not Email',
            'password.required' => 'Password Is Required',
        ];
    }
}
