<x-layout>

    <!-- Page Wrapper -->
<div class="page-wrapper">
        
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
                        <h3 class="page-title">Editar Dados Aluno</h3>
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
                            <form action="{{ route('editarAluno', ['id_aluno' => $aluno->id]) }}" method="post" >
                                @csrf
                                @method('PUT') 
                                <div class="row p-2">
                                    <div class="col-12 col-sm-4 m-3">  
                                        <div class="input-block local-forms">
                                            <label>Data Inicio</label>
                                            <input type="date" value="{{ $aluno->data_inicio ? $aluno->data_inicio : "" }}" name="data_inicio" id="nascimento" class="form-control" placeholder="DD-MM-YYYY" >
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4 m-3">  
                                        <div class="input-block local-forms">
                                            <label>Data Troca</label>
                                            <input type="date" value="{{ $aluno->data_troca ? $aluno->data_troca : "" }}" name="data_troca" id="nascimento" class="form-control" placeholder="DD-MM-YYYY" >
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