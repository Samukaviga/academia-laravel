<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    if(Auth::check() && Auth::user()->tipo = 1) {
        return redirect('/professor');
    }

    if(Auth::check() && Auth::user()->tipo = 0) {
        return redirect('/alunos');
    }


    return view('auth.login');


});
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware('auth')->group(function () {
   
    // Aluno

    Route::get('/alunos', [AlunoController::class, 'index'])->middleware(['auth', 'verified'])->name('aluno');

    Route::get('/aluno/{id}/treino/{tipo}', [AlunoController::class, 'treino'])->name('aluno.treino');

    Route::get('/alunos/gif/{id_treino}', [AlunoController::class, 'gif'])->name('aluno.gif');

    Route::get('/alunos/{id}/editar', [AlunoController::class, 'edit'])->name('aluno.editar'); 

    Route::put('/alunos/{id}/atualizar', [AlunoController::class, 'atualizandoDadosAluno'])->name('aluno.atualizar'); 

    Route::get('/alterarSenha', [AlunoController::class, 'alterarSenha']);  

    Route::post('/alterarSenha', [AlunoController::class, 'alterarSenhaPost']);  

    
    Route::get('/alunos/{id}/concluir/{tipo}', [AlunoController::class, 'concluirTreino'])->name('aluno.concluir');


});


Route::middleware(['teste'])->group(function () {

        // Professor

        Route::get('/professor', [ProfessorController::class, 'index'])->middleware(['auth', 'verified'])->name('professor');

        Route::get('/professor/{id}/aluno', [ProfessorController::class, 'dadosAluno']);

        Route::get('/professor/{id}/aluno/treino/{tipo}', [ProfessorController::class, 'treinoAluno'])->name('treinoAluno');
    
        Route::post('/professor/{id}/aluno/treino/{tipo}', [ProfessorController::class, 'inserindoTreinoAluno'])->name('inserindoTreinoAluno');
    
        Route::delete('/professor/{id_treino}/aluno/treino', [ProfessorController::class, 'deletarTreino'])->name('deletarTreino');
    
        Route::get('/professor/aluno/gif/{id_treino}', [ProfessorController::class, 'gif'])->name('gif');
    
        Route::get('/professor/{id}/aluno/editar', [ProfessorController::class, 'editarAluno']);
    
        Route::put('/professor/{id_aluno}/aluno/editar', [ProfessorController::class, 'editarAlunoPost'])->name('editarAluno');
    
        Route::get('/professor/aluno/editarDadosExercicio/{id_treino}', [ProfessorController::class, 'editarDadosExercicio'])->name('editarDadosExercicio');
    
        Route::post('/professor/aluno/editarDadosExercicio/{id_treino}', [ProfessorController::class, 'editarDadosExercicioPost'])->name('editarDadosExercicioPost');
    
        Route::delete('/professor/aluno/excluir/{id}', [ProfessorController::class, 'excluirAluno']);

        Route::get('/professor/exercicio', [ProfessorController::class, 'adicionarExercicio']);
    
        Route::post('/professor/exercicio/adicionar', [ProfessorController::class, 'adicionarExercicioPost']);
    
        Route::get('/professor/agrupamentos/{tipo}', [ProfessorController::class, 'agrupamentos']);
    
        Route::get('/professor/agrupamento/{tipo}/editar/{nivel}', [ProfessorController::class, 'editarAgrupamento']);
    
        Route::post('/professor/agrupamento/adicionar', [ProfessorController::class, 'adicionarAgrupamentoPost']);
        
        Route::delete('/professor/agrupamento/deletar', [ProfessorController::class, 'deletarAgrupamento']);
       
        Route::post('/professor/agrupamento/treino', [ProfessorController::class, 'adicionarAgrupamentoAoTreinoAluno']);
    
        Route::post('/professor/pesquisar', [ProfessorController::class, 'pesquisar'])->name('pesquisar');

        Route::post('/enviarEmail', [ProfessorController::class, 'enviarEmailPost'])->name('enviarEmailPost');

        Route::get('/enviarEmail', [ProfessorController::class, 'enviarEmail']);

});


require __DIR__.'/auth.php';
