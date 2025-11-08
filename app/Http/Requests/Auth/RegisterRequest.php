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
            'name' => 'required|string|max:255',
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
            'role_id' => 'required|integer|exists:roles,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Le nom est obligatoire',
            'email.required' => 'L\'email est obligatoire',
            'email.email' => 'L\'email doit être une adresse email valide',
            'email.unique' => 'L\'email est déjà utilisé',
            'password.required' => 'Le mot de passe est obligatoire',
            'password.min' => 'Le mot de passe doit contenir au moins 12 caractères',
            'role_id.required' => 'Le rôle est obligatoire',
            'role_id.exists' => 'Le rôle n\'existe pas',
        ];
    }
}
