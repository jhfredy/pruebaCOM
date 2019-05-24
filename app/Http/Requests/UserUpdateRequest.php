<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name'=>'required|string',
            'email'=>sprintf('required|email|unique:users,email,%d,id',$this->id),
            'password'=>'required|min:6|max:12',
            'municipio_id'=>'required|integer',
        ];

    }
     //funcion para editar los mensajes de alerta
     public function messages()
     {
         return [
             
             'name.required' =>'El campo de nombre es requerido',
             'email.required' => 'El campo de Email es requerido',
             'password.min' => 'El campo de contraseña debe tener mas de :min caracteres',
             'password.max' => 'El campo de contraseña debe tener mas de :max caracteres',
             'password.required' => 'El campo de contraseña es obligatorio',
             'email.unique' => 'Este registro ya existe',
             'municipio_id.required'=>'el campo de municipio es obligatorio',
             'email.email' => 'El campo de Email debe ser tipo Email',
         ];
     }
}
