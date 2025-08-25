<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UserRequest extends FormRequest
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
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');

        return [
            'id_role' => 'required|exists:role,id_role',
            'email' => $isUpdate ? 'required|email' : 'required|email|unique:user,email',
            'password' => $isUpdate ? 'nullable|string|min:5|max:20' : 'required|string|min:5|max:20',
            'name' => 'required|string|max:100',
            'address' => 'required|string',
            'phone_number' => $isUpdate ? 'required|integer|max:30' : 'required|string|max:30|unique:user,phone_number',
            'birth_date' => 'required|date',
            'gender' => 'required|string|in:man,woman',
            'highest_education' => 'required|string',
            'image' => $isUpdate? 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' : 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}