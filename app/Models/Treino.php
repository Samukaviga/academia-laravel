<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Treino extends Model
{
    use HasFactory;

    
    protected $table = 'treino';

    protected $fillable = [
        'serie',
        'tipo',
        'id_exercicio',
        'id_user',
        'concluido',
        'obs',
    ];

    protected $attributes = [
        'concluido' => false,
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function exercicio()
    {
        return $this->belongsTo(Exercicio::class, 'id_exercicio');
    }

   
}
