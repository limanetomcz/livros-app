<?php

namespace App\Contracts\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface LivroServiceContract
{
    /**
     * Retorna todos os livros.
     * 
     * @return Collection
     */
    public function getAll(): Collection;

    public function getAllPaginated(int $perPage, $request): array;

    /**
     * Retorna um livro pelo ID.
     * 
     * @param int $codl
     * @return Model|null
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
}
