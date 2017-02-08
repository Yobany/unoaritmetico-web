<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends ApiRequest
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
            'password_confirmation' => 'required|max:255|same:password'
        ];
    }
}
