<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreinoConcluido extends Model
{
    use HasFactory;

    protected $table = 'treino_concluido';

    protected $fillable = [
        'tipo',
        'data',
        'user_id',
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
