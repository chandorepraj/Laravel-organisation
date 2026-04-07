<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class OrganisationUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $organisationId = $this->route('organisation')->id; 
        return [
            'organisation_name' => 'required|string|max:100',
            'organisation_type' =>'required|string|max:15',
            'npi'=>[
                        'nullable',
                        'digits:10',
                         Rule::unique('organisations')->ignore($organisationId),
                    ],
        ];
    }
}
