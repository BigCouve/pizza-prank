<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
    public function messages()
    {
        return [
            'email.required' => 'Campo obrigatório',
            'password.required' => 'Campo obrigatório',
        ];
    }

    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required',
        ];
    }
}
