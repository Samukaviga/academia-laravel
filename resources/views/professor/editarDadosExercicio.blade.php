<x-layout :mensagem-sucesso="$mensagemSucesso">

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
                    @isset($mensagemSucesso)
                        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                            {{ $mensagemSucesso }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endisset

                    
                    <div class="d-flex justify-content-center mt-5">
                        <h3 class="page-title">Editar Dados</h3>		
                    </div>
                    
                    <div class="row mt-2 mx-2">
                        <div class="col-sm-12">
                        
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('editarDadosExercicioPost', ['id_treino' => $treino->id]) }}" method="post" >
                                        @csrf
                                        <div class="row p-2">
                                                                                                 
                                            <div class="col-12 col-sm-4 m-3">  
                                                <div class="input-block local-forms">
                                                    <label>Serie</label>
                                                    <input type="text" name="serie" id="serie" value="{{ $treino->serie ? $treino->serie : "" }}" maxlength="50" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-4 m-3">  
                                                <div class="input-block local-forms">
                                                    <label>OBS</label>
                                                    <input type="text" name="obs" id="obs" value="{{ $treino->obs ? $treino->obs : "" }}" maxlength="50" class="form-control">
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
       <!-- /Page Wrapper -->

           
       
   </div>
   <!-- /Main Wrapper -->


</x-layout>