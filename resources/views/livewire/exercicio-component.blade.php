<div>

    <div class="col-12 col-sm-4 m-3">

        <div class="input-block local-forms">

            <label>Agrupamento</label>

            <select name="agrupamento" wire:model="agrupamento" wire:change="buscarExercicios" id="professor" class="form-control">

                <option value="">Agrupamento:</option>

                <option value="Abdomen">Abdômen</option>

                <option value="Biceps">Biceps</option>

                <option value="Costas">Costas</option>

                <option value="Triceps">Triceps</option>

                <option value="Panturrilha">Panturrilha</option>

                <option value="Peito">Peito</option>

                <option value="Ombro">Ombro</option>

                <option value="Glúteo">Glúteo</option>

                <option value="Posterior Coxa">Posterior Coxa</option>

                <option value="Quadriceps">Quadriceps</option>

            </select>

        </div>

    </div>



    <div class="col-12 col-sm-4 m-3">

        <div class="input-block local-forms">

            <label>Exercicio</label>

            <select name="exercicio" wire:model="exercicioSelecionado" id="exercicio" class="form-control">

                <option value="">Selecione o exercicio</option>

                @foreach($exercicios as $exercicio)

                    <option value="{{ $exercicio->id }}">{{ $exercicio->nome }}</option>

                @endforeach

            </select>

        </div>

    </div>

</div>