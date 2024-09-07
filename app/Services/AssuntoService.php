<?php

namespace App\Services;

use App\Contracts\Repositories\AssuntoRepositoryContract;
use App\Contracts\Services\AssuntoServiceContract;
use Illuminate\Database\Eloquent\Collection;

class AssuntoService extends BasicService implements AssuntoServiceContract
{
    protected $repository;
    public function __construct(AssuntoRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function getFiltered(?string $filtro): Collection
    {
        $assuntos = $this->getAll();

        if ($filtro) {
            $assuntos = $assuntos->filter(function ($assunto) use ($filtro) {
                return stripos($assunto['descricao'], $filtro) !== false;
            });
        }

        return $assuntos;
    }
}
