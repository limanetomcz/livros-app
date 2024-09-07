<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface AssuntoRepositoryContract
{
    /**
     * Retorna todos os assuntos.
     * 
     * @return array
     */
    public function getAll(): Collection;

    /**
     * Retorna um assunto pelo ID.
     * 
     * @param int $codal
     * @return array|null
     */
    public function getById(int $id): ?Model;

    /**
     * Cria um novo assunto.
     * 
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model;

    /**
     * Atualiza um assunto existente.
     * 
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool;

    /**
     * Exclui um assunto.
     * 
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}