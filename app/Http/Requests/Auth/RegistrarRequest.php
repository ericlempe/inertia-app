<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegistrarRequest extends FormRequest
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
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'same:passwordConfirmation'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'email.required' => 'O campo e-mail é obrigatório',
            'email.unique' => 'O campo e-mail deve ser único',
            'password.required' => 'O campo senha é obrigatório',
            'password.min' => 'O campo senha precisa conter no minimo 8 caracteres',
            'password.same' => 'O campo senha deve ser igual ao campo confirmar senha',
        ];
    }
}
