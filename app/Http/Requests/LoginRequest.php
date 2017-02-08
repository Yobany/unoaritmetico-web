<?php

namespace App\Http\Requests;

class LoginRequest extends ApiSimpleRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|string|max:255|email|exists:users',
            'password' => 'required'
        ];
    }
}
