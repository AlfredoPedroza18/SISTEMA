<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsuarioRequest extends Request
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
            'name'      => 'required|unique:users',
            'username'  => 'required|unique:users',
            'email'     => 'required|unique:users',
            'password_aux'  => 'required'
            
        ];
    }

     public function messages()
    {
        return [
            'name.unique'       => 'El nombre ya existe en nuestros registros',
            'username.unique'   => 'El usuario ya existe en nuestros registros',
            'email.unique'      => 'El email ya existe en nuestros registros',
            'password_aux.required' => 'Debe colocar un password'

        ];
    }
}
