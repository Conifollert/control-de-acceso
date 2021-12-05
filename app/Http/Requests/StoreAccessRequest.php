<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use \Freshwork\ChileanBundle\Rut;

class StoreAccessRequest extends FormRequest
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
            'dni'           => 'required|cl_rut',
            'name'          => 'required|max:50',
            'lastname'      => 'required|max:50',
            'date'          => 'required|date_format:Y-m-d',
            'time'          => 'required|date_format:H:i',
            'tower'         => 'required|in:Torre 1,Torre 2,Torre 3,Torre 4,Torre 5,Torre 6',
            'floor'         => 'required|in:Piso 1,Piso 2,Piso 3,Piso 4,Piso 5',
            'number_depto'  => 'required|max:50',
        ];
    }
}
