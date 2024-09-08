<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo' => 'required|string|max:40',
            'editora' => 'required|string|max:40',
            'edicao' => 'required|integer',
            'ano_publicacao' => 'required|string|size:4',
            'valor' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'O título do livro é obrigatório.',
            'titulo.string' => 'O título do livro deve ser um texto válido.',
            'titulo.max' => 'O título do livro não pode ter mais que 40 caracteres.',
            
            'editora.required' => 'O nome da editora é obrigatório.',
            'editora.string' => 'O nome da editora deve ser um texto válido.',
            'editora.max' => 'O nome da editora não pode ter mais que 40 caracteres.',
            
            'edicao.required' => 'A edição do livro é obrigatória.',
            'edicao.integer' => 'A edição do livro deve ser um número inteiro.',
            
            'ano_publicacao.required' => 'O ano de publicação é obrigatório.',
            'ano_publicacao.string' => 'O ano de publicação deve ser um texto válido.',
            'ano_publicacao.size' => 'O ano de publicação deve ter exatamente 4 caracteres.',

            'valor.required' => 'O valor do livro é obrigatório.',
            'valor.regex' => 'O valor do livro deve estar no formato correto (ex: 1000.00).',
        ];
    }
}
