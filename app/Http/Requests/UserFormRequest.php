<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\UserFormRequest;
use App\User;

class UserFormRequest extends FormRequest
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
            'name' => 'required|max:255',
            'matricula' => 'required|min:3|max:10|unique:users',
            'grupo'=> 'required|max:5',
            'telefono'=> 'required|max:10',
            'direccion'=> 'required|max:255',
            'rol'=> 'required',
            'password'=>'min:6'
        ];
    }
}
