<?php

namespace App\Http\Requests;

use App\Enums\ProjectStatus;
use App\Rules\Round;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->id === $this->project->user->id;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('projects', 'name')->ignore($this->project->id)],
            'description' => ['required', 'string'],
            'location' => ['required', 'string', 'max:255'],
            'total_amount' => ['required', 'integer', 'min:5000', new Round],
            'iban' => [Rule::requiredIf($this->status !== ProjectStatus::Pending->value), 'nullable', 'string', 'max:255'],
            'iban_name' => [Rule::requiredIf($this->status !== ProjectStatus::Pending->value), 'nullable', 'string', 'max:255'],
        ];
    }
}
