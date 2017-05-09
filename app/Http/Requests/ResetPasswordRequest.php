<?php

namespace App\Http\Requests;

class ResetPasswordRequest extends ApiSimpleRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'token' => 'required|max:255|exists:users,password_reset_token',
            'password' => 'required|max:255',
            'passwordConfirmation' => 'required|max:255|same:password'
        ];
    }
}
