<?php

namespace App\Http\Requests;

use App\Enums\SignatoryCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class UpdateSignature extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'email' => [
                'email', 'max:255',
                Rule::unique('signatures')->ignore($this->route('signature'))
            ],
            'institution_id' => 'integer|exists:App\Models\Institution,id',
            'category' => [new Enum(SignatoryCategory::class)],
            'contactable' => 'nullable',
        ];
    }
}
