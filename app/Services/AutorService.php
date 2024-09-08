<?php

namespace App\Services;

use App\Contracts\Repositories\AutorRepositoryContract;
use App\Contracts\Services\AutorServiceContract;
use Illuminate\Database\Eloquent\Collection;

class AutorService extends BasicService implements AutorServiceContract
{
    protected $repository;
    
    public function __construct(AutorRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function getFiltered(?string $filtro): Collection
    {
        $autores = $this->getAll();

        if ($filtro) {
            $autores = $autores->filter(function ($autor) use ($filtro) {
                return stripos($autor['nome'], $filtro) !== false;
            });
        }

        return $autores;
    }
}
