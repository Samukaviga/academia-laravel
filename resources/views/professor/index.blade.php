<x-layout :mensagem-sucesso="$mensagemSucesso">


    <!-- Page Wrapper -->
    <div class="page-wrapper">
        @isset($mensagemSucesso)
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ $mensagemSucesso }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endisset
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Alunos</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Revisar</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <form action="{{route('pesquisar')}}" method="post">
                @csrf
                <div class="student-group-form mb-4">

                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-6">
                            <div class="input-block local-forms">
                                <label>Nome</label>
                                <input name="nome" id="nome" class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="search-student-btn">
                                <button type="btn" class="btn btn-primary">Filtrar</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
            <div class="row">
                <div class="col-sm-12">

                    <div class="card card-table">
                        <div class="card-body">

                            <!-- Page Header -->
                            <div class="page-header">
                                <div class="row align-items-center">


                                </div>
                            </div>
                            <!-- /Page Header -->
                            <div class="table-responsive">
                                <table class="table border-0 star-student table-hover table-center mb-0 table-striped ">
                                    <thead class="student-thread">
                                        <tr>

                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Modificação</th>


                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $i = 1 ?>

                                        @foreach($alunos as $aluno)
                                        <tr>

                                            <td>{{ $i }}</td>
                                            <td>
                                                <h2>
                                                    <a>{{ $aluno->name }}</a>
                                                </h2>
                                            </td>

                                            <td>
                                                <div class="d-flex gap-5">
                                                    <a href="/professor/{{ $aluno->id }}/aluno" type="button" class="btn btn-outline-success me-1 mb-1" id="type-success">Editar</a>

                                                    <div class="d-flex justify-content-end mb-1">
                                                        <form action="/professor/aluno/excluir/{{ $aluno->id }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-outline-danger me-1 mb-1" id="type-error">Excluir</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <?php $i++ ?>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>

                    @if($paginate)
                    {{ $alunos->links() }}
                    @endif

                </div>

            </div>
        </div>





</x-layout>