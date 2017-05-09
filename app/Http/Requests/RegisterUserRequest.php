<?php

namespace App\Http\Requests;

class RegisterUserRequest extends ApiSimpleRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'email' => 'required|max:255|email',
            'password' => 'required|max:255',
            'passwordConfirmation' => 'required|max:255|same:password'
        ];
    }
}
