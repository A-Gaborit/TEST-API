<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePartnerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'company_name' => 'required|string|max:255|unique:partners,company_name',
            'contact_email' => 'required|string|email:rfc|unique:partners,contact_email',
            'contact_phone' => 'required|string|max:255',
            'website' => 'string|max:255',
            'logo_path' => 'string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'company_name.required' => 'Le nom de la société est obligatoire',
            'company_name.unique' => 'Ce nom d\'entreprise est déjà utilisé',
            'contact_email.required' => 'L\'email est obligatoire',
            'contact_email.email' => 'L\'email doit être une adresse email valide',
            'contact_email.unique' => 'Cet email est déjà utilisé',
            'contact_phone.required' => 'Le numéro de téléphone est obligatoire',
            'website.string' => 'Le site web doit être une chaîne de caractères',
            'logo_path.string' => 'Le logo doit être une chaîne de caractères',
        ];
    }
}
