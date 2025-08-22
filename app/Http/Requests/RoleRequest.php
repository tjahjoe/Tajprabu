<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class RoleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'kode' => 'required|string|max:5|unique:role,kode',
            'role' => 'required|string|max:20|unique:role,role',
        ];
    }
}