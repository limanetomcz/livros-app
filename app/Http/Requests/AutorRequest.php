<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:40|unique:autores,nome'
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string' => 'O nome deve ser um texto válido.',
            'nome.max' => 'O nome não pode ter mais que 40 caracteres.',
            'nome.unique' => 'Esse nome já está cadastrado'
        ];
    }
}
