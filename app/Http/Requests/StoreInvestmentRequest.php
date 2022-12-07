<?php

namespace App\Http\Requests;

use App\Rules\Round;
use Illuminate\Foundation\Http\FormRequest;

class StoreInvestmentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'iban' => ['required', 'string', 'max:255'],
            'iban_name' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'integer', 'min:100', 'max:'.$this->project->amount - $this->project->investments->sum('amount'), new Round],
        ];
    }
}
