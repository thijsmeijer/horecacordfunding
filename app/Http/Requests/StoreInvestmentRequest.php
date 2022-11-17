<?php

namespace App\Http\Requests;

use App\Rules\Round;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreInvestmentRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user()->id)],
            'iban' => ['required', 'string', 'max:255'],
            'iban_name' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'integer', 'min:100', 'max:' . $this->project->amount - $this->project->investments->sum('amount'), new Round],
        ];
    }
}
