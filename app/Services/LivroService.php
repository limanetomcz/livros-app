<?php

namespace App\Services;

use App\Contracts\Repositories\LivroRepositoryContract;
use App\Contracts\Services\LivroServiceContract;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LivroService implements LivroServiceContract
{
    private $livroRepository;

    public function __construct(LivroRepositoryContract $livroRepository)
    {
        $this->livroRepository = $livroRepository;
    }

    public function getAll(): Collection
    {
        return $this->livroRepository->getAll();
    }

    public function getById($codl): ?Model
    {
        return $this->livroRepository->getById($codl);
    }

    public function create($data): array
    {
        DB::beginTransaction();
        try {
            $livro = $this->livroRepository->create($data);

            if (isset($data['autores']) && is_array($data['autores'])) {
                $this->livroRepository->syncAutores($livro['codl'], $data['autores']);
            }

            DB::commit();

            return $livro;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update($codl, $data): bool
    {
        DB::beginTransaction();
        try {
            $updated = $this->livroRepository->update($codl, $data);

            if ($updated && isset($data['autores']) && is_array($data['autores'])) {
                $this->livroRepository->syncAutores($codl, $data['autores']);
            }

            DB::commit();

            return $updated;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function delete($codl): bool
    {
        return $this->livroRepository->delete($codl);
    }

    public function getAllPaginated($perPage): LengthAwarePaginator
    {
        return $this->livroRepository->getAllPaginated($perPage);
    }
}
