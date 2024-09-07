<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssuntoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'descricao' => 'required|string|max:20|unique:assuntos,descricao'
        ];
    }

    public function messages(): array
    {
        return [
            'descricao.required' => 'O campo descricao é obrigatório.',
            'descricao.string' => 'A descricao deve ser um texto válido.',
            'descricao.max' => 'A descricao não pode ter mais que 20 caracteres.',
            'descricao.unique' => 'Essa descricao já está cadastrada'
        ];
    }
}
