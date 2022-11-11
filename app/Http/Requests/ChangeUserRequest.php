<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'iban' => ['nullable', 'string', 'max:255'],
            'iban_name' => ['nullable', 'string', 'max:255'],
        ];
    }
}
