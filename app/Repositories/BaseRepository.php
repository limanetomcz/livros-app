<?php

namespace App\Repositories;

use App\Contracts\Repositories\LivroRepositoryContract;
use App\Models\Livro;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    protected $model;

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function getById($codl): ?Model
    {
        $result = $this->model->find($codl);
        return $result ? $result : null;
    }

    public function create($data): array
    {
        $result = $this->model->create($data);
        return $result->toArray();
    }

    public function update($id, $data): bool
    {
        $result = $this->model->find($id);
        if ($result) {
            $result->update($data);
            return true;
        }
        return false;
    }

    public function delete($codl): bool
    {
        $result = $this->model->find($codl);
        if ($result) {
            $result->delete();
            return true;
        }
        return false;
    }
}
