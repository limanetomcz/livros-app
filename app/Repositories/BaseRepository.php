<?php

namespace App\Repositories;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    protected $model;

    public function getAll(): Collection
    {
        return $this->model->orderBy($this->model->getKeyName(), 'desc')->get();
    }

    public function getById($id): ?Model
    {
        $result = $this->model->where($this->model->getKeyName(),$id)->first();
        return $result ? $result : null;
    }

    public function create($data): Model
    {
        $result = $this->model->create($data);
        return $result;
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
