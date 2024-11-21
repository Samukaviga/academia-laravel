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
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <div class="content container-fluid">
                    
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">Editar Meus Dados</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Dados</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->
                
                    <div class="row">
                        <div class="col-sm-12">
                        
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('aluno.atualizar', ['id' => Auth::user()->id]) }}" method="post" >
                                        @csrf
                                        @method('PUT') 
                                        <div class="row p-2">
                                            <div class="col-12 col-sm-4 m-3">  
                                                <div class="input-block local-forms">
                                                    <label>Nome Completo</label>
                                                    <input type="text" name="name" id="name" value="{{ $aluno->name ? $aluno->name : "" }}" maxlength="50" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-4 m-3">  
                                                <div class="input-block local-forms">
                                                    <label>Saude / Medicamento</label>
                                                    <input type="text" name="saude_medicamento" id="saude_medicamento" value="{{ $aluno->saude_medicamento ? $aluno->saude_medicamento : "" }}" maxlength="50" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-4 m-3"> 
                                                <div class="input-block local-forms">

                                                    <label>Objetivo</label>
            
                                                    <select name="objetivo" id="objetivo" class="form-control col-12 col-sm-4">
            
                                                        <option value="{{ $aluno->objetivo ? $aluno->objetivo : "" }}">{{ $aluno->objetivo ? $aluno->objetivo : "Objetivo: " }}</option>
            
                                                        <option value="Emagrecimento">Emagrecimento</option>
                                                        <option value="Hipertrofia">Hipertrofia</option>
                                                        <option value="Hipertrofia + Emagrecimento">Hipertrofia + Emagrecimento</option>
            
                                                    </select>
            
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-4 m-3">  
                                                <div class="input-block local-forms">
                                                    <label>Data Nascimento</label>
                                                    <input type="date" name="data_nascimento" id="data_nascimento" value="{{ $aluno->data_nascimento ? $aluno->data_nascimento : "" }}" class="form-control" placeholder="DD-MM-YYYY" >
                                                </div>
                                            </div>

                                            <div class="col-12 m-3">
                                                <div class="student-submit">
                                                    <button type="submit" class="btn btn-primary">Editar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>					
                    </div>					
                </div>




</x-layout>