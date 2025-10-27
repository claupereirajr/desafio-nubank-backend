<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:clientes',
            'email' => 'required|string|email|max:255|unique:clientes',
            'telefone' => 'required|string|max:15',
            'cep' => 'required|string|max:9',
        ];
    }
}
