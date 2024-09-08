<?php

namespace App\Services;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\LengthAwarePaginator;

class BasicService
{
    protected $repository;
    protected $lengthAwarePaginator;

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
        } catch (QueryException $e) {
            DB::rollBack();
            Log::error('Erro de banco de dados na criação do modelo: ' . $e->getMessage());
            throw new Exception('Erro ao salvar os dados no banco de dados. Verifique os dados fornecidos.', 500);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Erro geral na criação do modelo: ' . $e->getMessage());
            throw new Exception('Erro inesperado ao criar o modelo. Entre em contato com o suporte.', 500);
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

    public function getAllPaginated(int $perPage, $request): array
    {
        $query = $this->repository->getAllPaginated($perPage);
    
        if ($request->filled('filtro')) {
            $filtered = array_filter($query->items(), function ($livro) use ($request) {
                return stripos($livro->titulo, $request->filtro) !== false || stripos($livro->editora, $request->filtro) !== false;
            });
    
            $query = new LengthAwarePaginator(
                $filtered,
                count($filtered),
                $perPage,
                $request->get('page', 1),
                ['path' => $request->url(), 'query' => $request->query()]
            );
        }
    
        return [
            'dados' => $query,
            'filtro' => $request->filtro
        ];
    }
}
