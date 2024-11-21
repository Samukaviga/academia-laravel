<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Exercicio;

class ExercicioComponent extends Component
{

    public $agrupamento;
    public $exercicios = [];
    public $exercicioSelecionado;


    public function buscarExercicios()
    {
        if ($this->agrupamento) {
            // Busca os exercícios com base no agrupamento selecionado
            $this->exercicios = Exercicio::where('agrupamento', 'like', '%' . $this->agrupamento . '%')->get();
        } else {
            $this->exercicios = [];
        }
    }

    public function render()
    {
       
     
        return view('livewire.exercicio-component');
    }
}
