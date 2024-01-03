<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsuarioForaneoRequest extends Request
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
            'username'  => 'required|unique:users',
            'email'     => 'required|unique:users',
            'password'  => 'required'
            
        ];
    }

     public function messages()
    {
        return [
            'name.unique'       => 'El nombre ya existe en nuestros registros',
            'username.unique'   => 'El usuario ya existe en nuestros registros',
            'email.unique'      => 'El email ya existe en nuestros registros',
            'password.required' => 'Debe colocar un password'

        ];
    }
}
