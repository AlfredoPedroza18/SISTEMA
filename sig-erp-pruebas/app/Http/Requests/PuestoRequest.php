<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PuestoRequest extends Request
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
        return [
            'name' => 'required|unique:roles',
            'slug' => 'required|unique:roles'
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'El puesto ya existe',
            'slug.unique' => 'El alias ya existe',

        ];
    }
}
