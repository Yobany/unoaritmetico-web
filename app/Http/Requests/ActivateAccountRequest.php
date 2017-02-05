<?php

namespace App\Http\Requests;

class ActivateAccountRequest extends ApiSimpleRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'token' => 'required|exists:users,activation_token'
        ];
    }

}
