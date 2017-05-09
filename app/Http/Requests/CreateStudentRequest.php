<?php

namespace App\Http\Requests;

class CreateStudentRequest extends ApiSimpleRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:5|max:100',
            'group' => 'required|exists:groups,id'
        ];
    }
}
