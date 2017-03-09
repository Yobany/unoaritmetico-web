<?php

namespace App\Http\Requests;



class UpdateUserRequest extends ApiSimpleRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255|email|unique:users',
            'role' => 'required|max:255|in:TEACHER,ADMIN',
            'active' => 'required|max:255|boolean',
        ];
    }
}
