<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'amount' => 'required|integer',
            'duration' => 'required|numeric',
            'interest_rate' => 'required|numeric',
            'iban' => 'required|string|max:255',
            'iban_name' => 'required|string|max:255',
        ];
    }
}
