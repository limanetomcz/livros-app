<?php

namespace App\Contracts\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface LivroRepositoryContract
{
    /**
     * Retorna todos os livros.
     * 
     * @return array
     */
    public function getAll(): Collection;

    public function getAllPaginated(int $perPage): LengthAwarePaginator;

    /**
     * Retorna um livro pelo ID.
     * 
     * @param int $codl
     * @return array|null
     */
    public function getById(int $id): ?Model;

    /**
     * Cria um novo livro.
     * 
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model;

    /**
     * Atualiza um livro existente.
     * 
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool;

    /**
     * Exclui um livro.
     * 
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;

    /**
     * Sincroniza os autores com o livro na tabela pivô
     *
     * @param int $codl
     * @param array $autores
     */
    public function syncAutores(int $codl, array $autores): void;
    
    /**
     * Sincroniza os autores com o livro na tabela pivô
     *
     * @param int $codl
     * @param array $autores
     */
    public function syncAssuntos(int $codl, array $assuntos): void;
}
