<?php

namespace App\Contracts\Services;

interface AutorServiceContract
{
    public function getAll();
    public function getById($codal);
    public function create(array $data);
    public function update($codal, array $data);
    public function delete($codal);
}