<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class TagRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'false',
            'message' => 'Validasi gagal, Harap periksa kembali data Anda.',
            'errors' => $validator->errors()
        ], 422));
    }

    public function rules()
    {
        return [
            'tag' => 'required|string|max:50|unique:tag,tag',
        ];
    }
}