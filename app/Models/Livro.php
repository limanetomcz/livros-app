<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'editora',
        'edicao',
        'ano_publicacao'
    ];

    protected $primaryKey = 'codl';

    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'autor_livro', 'codl', 'codau');
    }
}
