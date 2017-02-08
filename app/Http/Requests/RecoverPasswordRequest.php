<?php

namespace App\Http\Requests;

class RecoverPasswordRequest extends ApiSimpleRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|max:255|email|exists:users'
        ];
    }
}
