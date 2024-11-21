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
                            <h3 class="page-title">Treino</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active">Admin</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->



            <div class="d-flex justify-content-center mt-5">
                <h3 class="page-title">Adicionar exercicio</h3>
            </div>

            <div class="row mt-2">
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-body">
                            <form action="/professor/exercicio/adicionar" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row p-2">

                                    <div class="input-block local-forms">

                                        <label>Agrupamento</label>

                                        <select name="agrupamento" id="professor" class="form-control col-12 col-sm-4 m-3">

                                            <option value="">Agrupamento:</option>

                                            <option value="Abdomen">Abdômen</option>

                                            <option value="Antebraço">Antebraço</option>

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

                                    <div class="col-12 col-sm-6 m-3">
                                        <div class="input-block local-forms">
                                            <label>Nome</label>
                                            <input type="text" name="nome" id="nome" value="{{ old('nome') }}" maxlength="50" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-5 m-3">
                                        <div class="input-block local-forms">                    
                                                <label class="form-label">Gif</label>
                                                <input type="file" id="imagem" name="imagem" class="form-control" accept="image/gif">                                     
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


        </div>
        <!-- /Page Wrapper -->



    </div>
    <!-- /Main Wrapper -->


</x-layout>