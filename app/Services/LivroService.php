<?php

namespace App\Services;

use App\Contracts\Repositories\LivroRepositoryContract;
use App\Contracts\Services\LivroServiceContract;
use App\Exceptions\LivroException;
use App\Models\Livro;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class LivroService extends BasicService implements LivroServiceContract
{
    protected $livroRepository;

    public function __construct(LivroRepositoryContract $livroRepository)
    {
        parent::__construct($livroRepository);
        $this->livroRepository = $livroRepository;
    }

    public function create(array $data): Model
    {
        DB::beginTransaction();
        try {
            $livro = parent::create($data);

            if (isset($data['autores']) && is_array($data['autores'])) {
                $this->livroRepository->syncAutores($livro->codl, $data['autores']);
            }
            DB::commit();
            return $livro;
        } catch (QueryException $e) {
            DB::rollBack();
            throw new LivroException('Erro ao criar o livro no banco de dados', 'criação', null, $e);
        }
    }

    public function update($codl, $data): bool
    {
        DB::beginTransaction();
        try {
            $updated = parent::update($codl, $data);

            if ($updated && isset($data['autores']) && is_array($data['autores'])) {
                $this->livroRepository->syncAutores($codl, $data['autores']);
            }
            if ($updated && isset($data['assuntos']) && is_array($data['assuntos'])) {
                $this->livroRepository->syncAssuntos($codl, $data['assuntos']);
            }
            DB::commit();
            return $updated;
        } catch (QueryException $e) {
            DB::rollBack();
            throw new LivroException('Erro ao salvar os dados no banco de dados.' . $e->getMessage(), 'create', null, $e);
        } catch (Exception $e) {
            DB::rollBack();
            throw new LivroException('Erro inesperado ao criar o livro.' . $e->getMessage(), 'create', null, $e);
        }
    }

}
