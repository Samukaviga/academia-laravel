<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Treino;
use App\Models\TreinoConcluido;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AlunoController extends Controller
{


    public function index()
    {
   
        Carbon::setLocale('pt_BR');

        $treinosConcluidos = TreinoConcluido::where("user_id", Auth::user()->id)->get();

        $mensagemSucesso = session('mensagem.sucesso');

        return view('alunos.index')->with('mensagemSucesso', $mensagemSucesso)->with('treinosConcluidos', $treinosConcluidos);

    }

    public function treino(Request $request)
    {

        $treinos = Treino::where('id_user', $request->id)->where('tipo', $request->tipo)->get();

        $mensagemSucesso = session('mensagem.sucesso');

        return view('alunos.treino')->with('tipo', $request->tipo)
                                            ->with('treinos', $treinos)
                                                ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function concluirTreino(Request $request)
    {

        //$request->tipo
        //$request->id

        $dataHoraAtual = Carbon::now();

        $dataHoraFormatada = $dataHoraAtual->format('Y-m-d H:i:s');

        $dataAtual = $dataHoraAtual->format('Y-m-d');

        //dd($dataHoraFormatada);

        $treinoExistente = TreinoConcluido::where('data', 'like', "%$dataAtual%")->where('tipo', $request->tipo)->where('user_id', Auth::user()->id)->first();
        
        if(!$treinoExistente) {
            
            TreinoConcluido::create([
                'tipo' => $request->tipo,
                'data' => $dataHoraFormatada,
                'user_id' => $request->id,
            ]);
        
        }

        $treinos = Treino::where('id_user', $request->id)->where('tipo', $request->tipo)->update(['concluido' => 0]);

        return to_route('aluno')->with('mensagemSucesso', "Treino $request->tipo concluido com sucesso!");
    }

    public function gif(Request $request)
    {

        $treino = Treino::find($request->id_treino);

        return view('alunos.gif')->with('treino', $treino);
    }

    public function edit(Request $request)
    {
        $aluno = User::find($request->id);

        $mensagemSucesso = session('mensagem.sucesso');

        return view('alunos.edit')->with('aluno', $aluno)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function atualizandoDadosAluno(Request $request)
    {


        $user = User::find($request->id);
        $user->fill($request->all());
        $user->save();

        return to_route('aluno.editar', ['id' => $user->id])
            ->with('mensagem.sucesso', "Seus dados foram atualizados com sucesso!");
    }

    public function alterarSenha()
    {
        $mensagemSucesso = session('mensagem.sucesso');

        return view('alunos.alterarSenha')->with('mensagemSucesso', $mensagemSucesso);
    }

    public function alterarSenhaPost(Request $request) 
    {


            // Validação dos campos
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:4',
            'confirm_new_password' => 'required|min:4',
        ]);


        $user = Auth::user();

        if($request->new_password != $request->confirm_new_password){
            return back()->withErrors(['senha_atual' => 'Senha nova diferente da confirmação']);
        }

        // Verifica se a senha atual está correta
        if (!Hash::check($request->old_password, $user->password)) {

            return back()->withErrors(['senha_atual' => 'A senha atual está incorreta.']);
        }

        // Atualiza a senha do usuário
        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return back()->with('mensagemSucesso', 'Senha alterada com sucesso!');
    }
}
