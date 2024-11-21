<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agrupamento extends Model
{
    use HasFactory;

    protected $table = 'agrupamento';

    // Defina os atributos que podem ser preenchidos em massa
    protected $fillable = [
        'serie',
        'tipo',
        'obs',
        'nivel',
        'id_exercicio',
    ];

    public function exercicio()
    {
        return $this->belongsTo(Exercicio::class, 'id_exercicio');
    }
}
