<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoginRequest extends FormRequest{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {  
        return [
            'email'=>'bail|required|email|unique:usuarios,email',
            'password'=>'bail|required'
           
        ];
    }
}