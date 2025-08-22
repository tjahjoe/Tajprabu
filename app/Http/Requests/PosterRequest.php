<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class PosterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        return [
            'id_user' => 'required|exists:user,id_user',
            'status' => $isUpdate ? 'required|in:approved,rejected' : 'nullable|in:pending,approved,rejected',
        ];
    }   
}