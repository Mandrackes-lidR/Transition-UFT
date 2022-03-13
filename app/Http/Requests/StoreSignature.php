<?php

namespace App\Http\Requests;

use App\Enums\SignatoryCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreSignature extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|unique:signatures|email|max:255',
            'institution_id' => 'required|integer|exists:App\Models\Institution,id',
            'category' => ['required', new Enum(SignatoryCategory::class)],
            'register' => 'accepted',
        ];
    }
}
