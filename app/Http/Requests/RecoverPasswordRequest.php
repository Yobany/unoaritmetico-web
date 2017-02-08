<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecoverPasswordRequest extends ApiRequest
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
