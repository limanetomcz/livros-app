<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BasicService
{
    protected $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }

    public function getById($id): ?Model
    {
        return $this->repository->getById($id);
    }

    public function create(array $data): Model
    {
        DB::beginTransaction();
        try {
            $model = $this->repository->create($data);
            DB::commit();
            return $model;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update($id, array $data): bool
    {
        DB::beginTransaction();
        try {
            $updated = $this->repository->update($id, $data);
            DB::commit();
            return $updated;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function delete($id): bool
    {
        return $this->repository->delete($id);
    }

    public function getAllPaginated(int $perPage): LengthAwarePaginator
    {
        return $this->repository->getAllPaginated($perPage);
    }
}
