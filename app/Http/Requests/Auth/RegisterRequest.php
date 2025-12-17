<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'pseudo' => 'required|string|max:255|unique:users,pseudo',
            'email' => 'required|string|email:rfc|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:12',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/[A-Z]/', $value)) {
                        $fail('Le mot de passe doit contenir au moins une majuscule');
                    }
                },
                function ($attribute, $value, $fail) {
                    if (!preg_match('/[a-z]/', $value)) {
                        $fail('Le mot de passe doit contenir au moins une minuscule');
                    }
                },
                function ($attribute, $value, $fail) {
                    if (!preg_match('/\\d/', $value)) {
                        $fail('Le mot de passe doit contenir au moins un chiffre');
                    }
                },
                function ($attribute, $value, $fail) {
                    if (!preg_match('/[^A-Za-z\\d]/', $value)) {
                        $fail('Le mot de passe doit contenir au moins un caractère spécial');
                    }
                },
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'firstname.required' => 'Le prénom est obligatoire',
            'lastname.required' => 'Le nom de famille est obligatoire',
            'pseudo.required' => 'Le pseudo est obligatoire',
            'pseudo.unique' => 'Le pseudo est déjà utilisé',
            'email.required' => 'L\'email est obligatoire',
            'email.email' => 'L\'email doit être une adresse email valide',
            'email.unique' => 'L\'email est déjà utilisé',
            'password.required' => 'Le mot de passe est obligatoire',
            'password.min' => 'Le mot de passe doit contenir au moins 12 caractères',
        ];
    }
}
