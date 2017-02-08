<?php

namespace App\Http\Requests;

class ConsultRequest extends ApiSimpleRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'page' => 'sometimes|required|integer|min:0',
            'per_page' => 'sometimes|required|integer|min:0'
        ];
    }
}
