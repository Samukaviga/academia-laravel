<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Treino;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

  
    protected $fillable = [
        'name',
        'email',
        'password',
        'id_professor',
        'objetivo',
        'data_inicio',
        'data_troca',
        'data_nascimento',
        'saude_medicamento',
        'tipo_usuario',
    ];

    protected $attributes = [
        'tipo_usuario' => 0, 
    ];

    public function treinos()
    {
        return $this->hasMany(Treino::class, 'id_user');
    }


    protected $hidden = [
        'password',
        'remember_token',
    ];

 
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'nascimento' => 'date',
        ];
    }
}
