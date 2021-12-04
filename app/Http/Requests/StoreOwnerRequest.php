<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use \Freshwork\ChileanBundle\Rut;
class StoreOwnerRequest extends FormRequest
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
            'dni'               => 'required|cl_rut',
            'name'              => 'required|max:50',
            'fathers_surname'   => 'required',
            'mothers_surname'   => 'required',
            'phone'             => 'required|numeric',
            'number'            => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'dni.cl_rut'        => 'El atributo rut no es válido.',
            'name.max'        => 'nombre no debe ser mayor que 50 caracteres.',
        ];
    }
}
