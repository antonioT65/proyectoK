<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditFormRequest extends FormRequest
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
            'grupo'=> 'required|max:5',
            'telefono'=> 'required|max:10',
            'direccion'=> 'required|max:255',
            'password'=>'required|min:6|confirmed',
            'imagen' => 'mimes:jpeg,jpg,bmp,png'
        ];
    }
}