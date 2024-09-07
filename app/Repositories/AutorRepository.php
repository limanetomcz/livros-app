<?php

namespace App\Repositories;

use App\Contracts\Repositories\AutorRepositoryContract;
use App\Models\Autor;

class AutorRepository extends BaseRepository implements AutorRepositoryContract
{
    public function __construct(Autor $model)
    {
        $this->model = $model;
    }

}