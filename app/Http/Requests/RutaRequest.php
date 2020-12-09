<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RutaRequest extends FormRequest{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {  
        return [
            'nombre'=>'bail|required',
            'puntos'=>'bail|required|array',
            'puntos.*.title'=>'bail|required',
            'puntos.*.ltn'=>'bail|required|numeric',
            'puntos.*.lng'=>'bail|required|numeric',
            'puntos.*.codigo'=>'bail|required'
           
        ];
    }
}