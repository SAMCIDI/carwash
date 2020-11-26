<?php

namespace App\Http\Requests\API;

use App\Models\estado_persona;
use InfyOm\Generator\Request\APIRequest;

class Updateestado_personaAPIRequest extends APIRequest
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
        $rules = estado_persona::$rules;
        
        return $rules;
    }
}
