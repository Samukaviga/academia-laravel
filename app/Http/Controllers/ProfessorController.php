<?php

namespace App\Http\Controllers;

use App\Models\Agrupamento;
use App\Models\Exercicio;
use App\Models\Treino;
use App\Models\TreinoConcluido;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use function PHPUnit\Framework\isEmpty;

class ProfessorController extends Controller
{

    public function index()
    {

        $mensagemSucesso = session('mensagem.sucesso');

        $alunos = User::where('tipo_usuario', 0)->orderByDesc('id')->paginate(10);


        return view('professor.index')->with('alunos', $alunos)->with('mensagemSucesso', $mensagemSucesso)->with('paginate', $paginate = true);
    }

    public function dadosAluno(int $id)
    {
        $aluno = User::find($id);


        Carbon::setLocale('pt_BR');


        $treinosConcluidos = TreinoConcluido::where("user_id", $id)->get();


        $aluno->data_nascimento = date_format(Carbon::parse($aluno->data_nascimento), 'd/m/Y');
        $aluno->data_inicio = date_format(Carbon::parse($aluno->data_inicio), 'd/m/Y');
        $aluno->data_troca = date_format(Carbon::parse($aluno->data_troca), 'd/m/Y');


        return view('professor.dadosAluno')->with('aluno', $aluno)->with('treinosConcluidos', $treinosConcluidos);
    }

    public function treinoAluno(int $id, string $tipo)
    {
        $mensagemSucesso = session('mensagem.sucesso');

        $treinos = Treino::where('id_user', $id)->where('tipo', $tipo)->get();


        return view('professor.treinoAluno')->with('tipo', $tipo)
            ->with('id', $id)
            ->with('mensagemSucesso', $mensagemSucesso)
            ->with('treinos', $treinos);
    }

    public function inserindoTreinoALuno(Request $request)
    {
        $validated = $request->validate([
            'agrupamento' => 'required',
            'exercicio' => 'required',
            'serie' => 'required',
        ]);


        $treino = Treino::create([
            'serie' => $request->serie,
            'tipo' => $request->tipo,
            'id_exercicio' => $request->exercicio,
            'id_user' => $request->id,
            'obs' => $request->obs,
            'concluido' => false
        ]);

        $nomeExercicio = $treino->exercicio->nome;

        return to_route('treinoAluno', ['id' => $request->id, 'tipo' => $request->tipo])->with('mensagem.sucesso', "Treino de $nomeExercicio adicionado");
    }

    public function deletarTreino(int $id_exercicio, Request $request)
    {

        Treino::destroy($id_exercicio);

        return to_route('treinoAluno', ['id' => $request->id, 'tipo' => $request->tipo])->with('mensagemSucesso', "Treino excluido com sucesso!");
    }

    public function adicionarExercicio()
    {

        $mensagemSucesso = session('mensagem.sucesso');

        return view('professor.adicionarExercicio')->with('mensagemSucesso', $mensagemSucesso);
    }

    public function adicionarExercicioPost(Request $request)
    {

        $validated = $request->validate([
            'agrupamento' => 'required',
            'nome' => 'required',
            'imagem' => 'required',
        ]);

        $coverPath = $request->hasFile('imagem') ? $request->file('imagem')->store('assets/gifs', 'public') : $coverPath = null; //armazena em um lugar permanente. O Laravel cria uma pasta com o nome 'series_cover' e retorna o caminho salvo e salva em public (config/filesystems)

        $request->coverPath = $coverPath;

        $exercicio = Exercicio::create([
            'agrupamento' => $request->agrupamento,
            'nome' => $request->nome,
            'imagem' => $request->coverPath,
        ]);

        return redirect('/professor/exercicio')->with('mensagem.sucesso', "Exercicio $request->nome adicionado");
    }

    public function agrupamentos(Request $request)
    {
        $mensagemSucesso = session('mensagem.sucesso');

        return view('professor.agrupamentos')->with('mensagemSucesso', $mensagemSucesso)->with('tipo', $request->tipo);

    }

    public function editarAgrupamento(Request $request) 
    {
        $mensagemSucesso = session('mensagem.sucesso');

        $agrupamento = Agrupamento::where(['tipo' => $request->tipo])->where(['nivel' => $request->nivel])->get();

        return view('professor.editarAgrupamento')->with('mensagemSucesso', $mensagemSucesso)
                                                            ->with('tipo', $request->tipo)
                                                                ->with('nivel', $request->nivel)
                                                                    ->with('agrupamentos', $agrupamento);
    }

    public function adicionarAgrupamentoPost(Request $request)
    {
    

        $validated = $request->validate([
            'agrupamento' => 'required',
            'exercicio' => 'required',
            'serie' => 'required',
        ]);


        $agrupamento = Agrupamento::create([
            'serie' => $request->serie,
            'tipo' => $request->tipo,
            'nivel' => $request->nivel,      
            'id_exercicio' => $request->exercicio,      
            'agrupamento' => $request->agrupamento,
            'obs' => $request->obs,
        ]);


        return redirect("/professor/agrupamento/$request->tipo/editar/$request->nivel")->with('mensagem.sucesso', "Treino adicionado");
    }   

    public function deletarAgrupamento(Request $request) 
    {

        Agrupamento::destroy($request->id);

        return redirect("/professor/agrupamento/$request->agrupamento/editar/$request->nivel")->with('mensagemSucesso', "Agrupamento excluido com sucesso!");
    }

    public function adicionarAgrupamentoAoTreinoAluno(Request $request)
    {
        //id_aluno



        //  dd(empty($agrupamentos['itens']));

        $agrupamentos = Agrupamento::where(['nivel' => $request->nivel])->where(['tipo' => $request->tipo])->get();


        if ($agrupamentos->isEmpty()) {

            return back()->withErrors(['mensagem.erro' => 'Nenhum treino adicionado a esse agrupamento']);
        
        } else {
            
            Treino::where(['id_user' => $request->id_aluno])->delete();

        foreach ($agrupamentos as $agrupamento) { 

             Treino::create([
                'serie' => $agrupamento->serie,
                'tipo' => $agrupamento->tipo,
                'id_exercicio' => $agrupamento->id_exercicio,
                'id_user' => $request->id_aluno,
                'obs' => $agrupamento->obs,
                'concluido' => false
            ]);
        }

        return to_route('treinoAluno', ['id' => $request->id_aluno, 'tipo' => $agrupamento->tipo])->with('mensagem.sucesso', "Agrupamento adicionado ao Treino com sucesso!");


        }

        
       
    }

    public function gif(int $treino_id)
    {

        $treino = Treino::find($treino_id);

        $mensagemSucesso = session('mensagem.sucesso');

        return view('professor.gif')->with('treino', $treino)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function editarDadosExercicio(int $id_treino)
    {
        $treino = Treino::find($id_treino);

        $mensagemSucesso = session('mensagem.sucesso');

        return view('professor.editarDadosExercicio')->with('treino', $treino)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function editarDadosExercicioPost(Request $request)
    {

        $treino = Treino::find($request->id_treino);
        $treino->fill($request->all());
        $treino->save();


        return to_route('gif', ['id_treino' => $treino->id])
            ->with('mensagem.sucesso', "Treino atualizado com sucesso");
    }

    public function editarAluno(int $id)
    {
        $aluno = User::find($id);

        return view('professor.editarAluno')->with('aluno', $aluno);
    }

    public function editarAlunoPost(Request $request)
    {
        $user = User::find($request->id_aluno);
        $user->fill($request->all());
        $user->save();

        return to_route('professor')
            ->with('mensagem.sucesso', "Dados do aluno atualizado com sucesso");
    }

    public function pesquisar(User $alunos, Request $request)
    {

        $mensagemSucesso = session('mensagem.sucesso');

        $aluno = $alunos::where('name', 'LIKE', "%{$request->nome}%")->where('tipo_usuario', 0)->get();

        return view('professor.index')->with('alunos', $aluno)
            ->with('paginate', $paginate = false)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function excluirAluno(Request $request)
    {   
    
        User::destroy($request->id);

        $alunos = User::where('tipo_usuario', 0)->orderByDesc('id')->paginate(10);

        return view('professor.index')->with('alunos', $alunos)->with('mensagemSucesso', "Aluno excluido com sucesso")->with('paginate', $paginate = true);
    
    }
}
