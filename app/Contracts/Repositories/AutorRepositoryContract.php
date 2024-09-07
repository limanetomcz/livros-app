<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface AutorRepositoryContract
{
    /**
     * Retorna todos os autores.
     * 
     * @return array
     */
    public function getAll(): Collection;

    /**
     * Retorna um autor pelo ID.
     * 
     * @param int $codal
     * @return array|null
     */
    public function getById(int $codal): ?Model;

    /**
     * Cria um novo autor.
     * 
     * @param array $data
     * @return array
     */
    public function create(array $data): array;

    /**
     * Atualiza um autor existente.
     * 
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool;

    /**
     * Exclui um autor.
     * 
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}