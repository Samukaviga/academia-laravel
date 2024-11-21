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

               

                @foreach ($agrupamentos as $agrupamento )
                    
                <?php $i = 1 ?>

                <div class="col-xl-12 col-sm-12 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <a href="/professor/aluno/gif/">
                                    <div class="db-info9">

                                        <h6>{{ $agrupamento->tipo }}{{ $i }}</h6>

                                        <h3>{{ $agrupamento->exercicio->nome }}</h3>

                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mb-1">
                    <form action="/professor/agrupamento/deletar" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id" id="id" value="{{ $agrupamento->id }}">
                        <input type="hidden" name="agrupamento" id="agrupamento" value="{{ $agrupamento->tipo }}">
                        <input type="hidden" name="nivel" id="nivel" value="{{ $agrupamento->nivel }}">
                        <button type="submit" class="btn btn-outline-danger me-1 mb-1" id="type-error">Excluir</button>
                    </form>
                </div>

                <?php $i++; ?>

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
                            <form action="/professor/agrupamento/adicionar" method="post">
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

                                    <input type="hidden" name="nivel" id="nivel" value="{{ $nivel }}">
                                    <input type="hidden" name="tipo" id="tipo" value="{{ $tipo }}">


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



        </div>
        <!-- /Page Wrapper -->



    </div>
    <!-- /Main Wrapper -->


</x-layout>