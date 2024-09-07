<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome'
    ];
    protected $table = 'autores';
    protected $primaryKey = 'codau';

    public function livros()
    {
        return $this->belongsToMany(Livro::class, 'autor_livro', 'codau', 'codl');
    }
}
