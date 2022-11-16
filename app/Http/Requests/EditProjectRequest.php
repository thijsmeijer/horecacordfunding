<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'location' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'integer', 'min:5000'],
            'interest_rate' => ['required', 'integer', 'min:5', 'max:10'],
            'duration' => ['required', 'integer', 'min:12', 'max:60'],
            'iban' => [Rule::requiredIf($this->status === 'public'), 'nullable', 'string', 'max:255'],
            'iban_name' => [Rule::requiredIf($this->status === 'public'), 'nullable', 'string', 'max:255'],
            'status' => ['required', 'string', Rule::in(['public', 'private'])],
        ];
    }
}
