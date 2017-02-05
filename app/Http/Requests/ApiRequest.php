<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 05/02/2017
 * Time: 02:46 PM
 */

namespace App\Http\Requests;

use Dingo\Api\Http\FormRequest;

class ApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }
}