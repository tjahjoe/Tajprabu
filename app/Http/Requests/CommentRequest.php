<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CommentRequest extends FormRequest
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
            'id_article' => 'required|exists:article,id_article',
            // 'id_user' => 'required|exists:user,id_user',
            'id_parent' => 'nullable|exists:comment,id_comment',
            'comment' => 'required|string',
        ];
    }
}