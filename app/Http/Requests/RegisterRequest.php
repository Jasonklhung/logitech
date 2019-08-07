<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class RegisterRequest extends FormRequest
{
  public function rules()
  {
  	return [
  		'file'=>'required|mimes:pdf',
      'username'=>'required',

  	];
  }

  public function messages()
  {
  	return [
  		'file.required' => '請上船pdf',
      'username.required'=>'請填寫名稱',
  	];
  }
}
