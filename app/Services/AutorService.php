<?php

namespace App\Services;

use App\Contracts\Repositories\AutorRepositoryContract;
use App\Contracts\Services\AutorServiceContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class AutorService implements AutorServiceContract
{
    private $repository;
    public function __construct(AutorRepositoryContract $repository)
    {
        $this->repository = $repository;
    }
    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }
    public function getById($codl): ?Model
    {
        return $this->repository->getById($codl);
    }
    public function create($data): array
    {
        return $this->repository->create($data);
    }
    public function update($codl, $data): bool
    {
        return $this->repository->update($codl, $data);
    }
    public function delete($codl): bool
    {
        return $this->repository->delete($codl);
    }
}
