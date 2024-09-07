<?php

namespace App\Contracts\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface AssuntoServiceContract
{
    public function getAll(): Collection;
    public function getFiltered(?string $filtro): Collection;
    public function getById($id): ?Model;
    public function create(array $data): Model;
    public function update($codal, array $data);
    public function delete($codal);
}
