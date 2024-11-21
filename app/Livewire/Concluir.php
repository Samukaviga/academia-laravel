<?php

namespace App\Livewire;

use App\Models\Treino;
use Livewire\Component;

class Concluir extends Component
{

    public $treino;

    public $concluido;

    public function mount(Treino $treino) 
    {
        $this->treino = $treino;

        $this->concluido = $treino->concluido;

    }

    public function funcaoConcluir()
    {

        $this->concluido = !$this->concluido;
        $this->treino->update(['concluido' => $this->concluido ]);

    }

    public function render()
    {
        return view('livewire.concluir');
    }
}
