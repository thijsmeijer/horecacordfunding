<?php

namespace App\Http\Requests;

use App\Rules\Round;
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
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'location' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'integer', 'min:5000', new Round],
            'duration' => ['required', 'integer'],
            'interest_rate' => ['required', 'integer'],
            'iban' => ['required', 'string', 'max:255'],
            'iban_name' => ['required', 'string', 'max:255'],
        ];
    }
}
