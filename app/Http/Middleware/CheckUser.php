<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUser 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o usuário está autenticado
        if (Auth::check()) {
            // Verifica se o tipo do usuário é igual a 1
            if (Auth::user()->tipo_usuario == 1) {
                return $next($request);
            }
        }

        // Se não for, redireciona ou retorna um erro
        return redirect('/alunos')->with('error', 'Acesso negado.');
    }
}