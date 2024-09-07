<?php

namespace App\Repositories;

use App\Contracts\Repositories\AssuntoRepositoryContract;
use App\Models\Assunto;

class AssuntoRepository extends BaseRepository implements AssuntoRepositoryContract
{
    public function __construct(Assunto $model)
    {
        $this->model = $model;
    }
}