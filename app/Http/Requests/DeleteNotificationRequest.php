<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class DeleteNotificationRequest extends FormRequest
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
            'id_notifications' => 'required|array|min:1',
            'id_notifications.*' => 'integer|exists:notification,id_notification',
        ];
    }
}