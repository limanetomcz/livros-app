<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assunto extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao'
    ];

    protected $primaryKey = 'codas';

    public function livros()
    {
        return $this->belongsToMany(Livro::class, 'assunto_livro', 'codas', 'codl');
    }
}
