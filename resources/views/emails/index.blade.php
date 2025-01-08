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
                <h3 class="page-title">Enviar Email</h3>
            </div>

            <div class="row mt-2">
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('enviarEmailPost') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row p-2">

                                    <div class="col-12 col-sm-12 m-3">
                                        <div class="input-block local-forms">
                                            <label for="mensagem">Mensagem</label>
                                            <textarea id="mensagem" name="mensagem" value="{{ old('mensagem') }}" class="form-control" rows="4" placeholder="Digite sua mensagem aqui..."></textarea>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-5 m-3">
                                        <div class="input-block local-forms">
                                            <label class="form-label">Imagem</label>
                                            <input type="file" id="imagem" name="imagem" class="form-control" accept="image/jpeg, image/png, image/jpg">
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