<x-layout :mensagem-sucesso="$mensagemSucesso">

    <!-- Page Wrapper -->
    <div class="page-wrapper">

        @isset($mensagemSucesso)
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ $mensagemSucesso }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endisset

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="content container-fluid">
            
        <a href="/professor/{{ $id }}/aluno" class="back-btn mb-5"><i class="feather-chevron-left "></i> Voltar</a>
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Treino {{ $tipo }}</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active">Admin</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Overview Section -->
            <div class="row">


                <?php $i = 1 ?>

                @foreach ( $treinos as $treino )


                <div class="col-xl-12 col-sm-12 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <a href="/professor/aluno/gif/{{ $treino->id }}">
                                    <div class="db-info9">

                                        <h6>{{ $treino->tipo }}{{ $i }}</h6>

                                        <h3>{{ $treino->exercicio->nome }}</h3>

                                        <h6 class="mt-2">
                                            {{ $treino->serie }}
                                        </h6>

                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mb-1">
                    <form action="{{ route('deletarTreino', ['id_treino' => $treino->id, 'id' => $id, 'tipo' => $treino->tipo ]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger me-1 mb-1" id="type-error">Excluir</button>
                    </form>
                </div>

                <?php $i++ ?>
                @endforeach


            </div>
            <!-- /Overview Section -->

            <div class="d-flex justify-content-center mt-5">
                <h3 class="page-title">Adicionar exercicio</h3>
            </div>

            <div class="row mt-2">
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('inserindoTreinoAluno', ['id' => $id, 'tipo' => $tipo]) }}" method="post">
                                @csrf
                                <div class="row p-2">

                                    <livewire:exercicio-component />

                                    <div class="col-12 col-sm-4 m-3">
                                        <div class="input-block local-forms">
                                            <label>Serie</label>
                                            <input type="text" name="serie" id="serie" value="" maxlength="50" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4 m-3">
                                        <div class="input-block local-forms">
                                            <label>OBS</label>
                                            <input type="text" name="obs" id="obs" value="" maxlength="50" class="form-control">
                                        </div>
                                    </div>



                                    <div class="col-12 m-3">
                                        <div class="student-submit">
                                            <button type="submit" class="btn btn-primary">Adicionar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

            <!-- adicionando treino pronto -->

            <div class="d-flex justify-content-center mt-5">
                <h3 class="page-title">Treino Pronto - {{ $tipo }}</h3>
            </div>

            <div class="row mt-2">
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-body">
                            <form action="/professor/agrupamento/treino" method="post">
                                @csrf
                                <div class="row p-2">



                                    <div class="col-12 col-sm-4 m-3 ">

                                        <div class="input-block local-forms">

                                            <label>Treino</label>

                                            <select name="nivel" id="nivel" class="form-control">

                                                <option value="">Treino:</option>

                                                <option value="1">Iniciante</option>

                                                <option value="2">Intermediario</option>

                                                <option value="3">Avançado</option>

                                            </select>

                                        </div>

                                    </div>

                                    <input type="hidden" name="tipo" id="tipo" value="{{ $tipo }}">
                                    <input type="hidden" name="id_aluno" id="id_aluno" value="{{ $id }}">


                                    <div class="col-12 m-3">
                                        <div class="student-submit d-flex justify-content-between">
                                            <button type="submit" class="btn btn-primary">Adicionar</button>


                                            <a href="/professor/agrupamentos/{{ $tipo }}" type="button" class="btn btn-outline-success me-1 mb-1" id="type-success">Editar</a>
                                        </div>
                                    </div>



                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>


        </div>
        <!-- /Page Wrapper -->



    </div>
    <!-- /Main Wrapper -->


</x-layout>