<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercicio extends Model
{
    use HasFactory;

    protected $table = 'exercicio';

    protected $fillable = [
        'agrupamento',
        'nome',
        'imagem' 
    ];

    public function treinos()
    {
        return $this->hasMany(Treino::class, 'id_exercicio');
    }

}
