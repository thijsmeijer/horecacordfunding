<?php

namespace App\Http\Requests;

use App\Enums\ProjectStatus;
use App\Rules\Round;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditProjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'location' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'integer', 'min:5000', new Round],
            'interest_rate' => ['required', 'integer', 'min:5', 'max:10'],
            'duration' => ['required', 'integer', 'min:12', 'max:60'],
            'iban' => [Rule::requiredIf($this->status !== ProjectStatus::Pending->value), 'nullable', 'string', 'max:255'],
            'iban_name' => [Rule::requiredIf($this->status !== ProjectStatus::Pending->value), 'nullable', 'string', 'max:255'],
            'status' => ['required', 'string', Rule::in(['public', 'private'])],
        ];
    }
}
