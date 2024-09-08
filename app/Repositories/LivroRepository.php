<?php

namespace App\Repositories;

use App\Contracts\Repositories\LivroRepositoryContract;
use App\Models\Livro;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


class LivroRepository extends BaseRepository implements LivroRepositoryContract
{
    public function __construct(Livro $model)
    {
        $this->model = $model;
    }

    public function getAllPaginated(int $perPage): LengthAwarePaginator
    {
        return $this->model->orderBy($this->model->getKeyName(), 'desc')->paginate($perPage);
    }

    /**
     *
     * @param int $codl
     * @param array $autores
     */
    public function syncAutores(int $codl, array $autores): void
    {
        $livro = $this->model->find($codl);
        if ($livro) {
            $livro->autores()->sync($autores);
        }
    }

    /**
     *
     * @param int $codl
     * @param array $assuntos
     */
    public function syncAssuntos(int $codl, array $assuntos): void
    {
        $livro = $this->model->find($codl);
        if ($livro) {
            $livro->assuntos()->sync($assuntos);
        }
    }
}
