<?php

namespace App\Http\Requests;

class UpdateStudentRequest extends ApiSimpleRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'age' => 'required|integer|min:6|max:100',
            'group' => 'required|exists:groups,id'
        ];
    }
}
