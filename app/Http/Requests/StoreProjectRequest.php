<?php

namespace App\Http\Requests;

use App\Rules\Round;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('projects', 'name')->ignore(auth()->user()->id)],
            'description' => ['required', 'string'],
            'location' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'integer', 'min:5000', new Round],
            'iban' => ['required', 'string', 'max:255'],
            'iban_name' => ['required', 'string', 'max:255'],
        ];
    }
}
