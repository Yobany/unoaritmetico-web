<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ApiSimpleRequest extends ApiRequest
{
    /**
     * @param Validator $validator
     */
    public function failedValidation(Validator $validator) {
        throw new BadRequestHttpException($validator->getMessageBag()->first());
    }
}
