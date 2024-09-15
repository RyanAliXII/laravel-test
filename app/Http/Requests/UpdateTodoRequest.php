<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateTodoRequest extends FormRequest
{
   
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'description' => 'required',
            'isDone' => 'required|boolean'
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 400)
        );
    }
}
