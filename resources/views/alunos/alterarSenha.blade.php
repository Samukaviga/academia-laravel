
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

        <div class="content container-fluid">
                
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Alterar Senha</h3>
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
                                <form action="/alterarSenha" method="post" >
                                    @csrf
                                    @method('post') 
                                    <div class="row p-2">
                                        <div class="col-12 col-sm-11 m-3">  
                                            <div class="input-block local-forms">
                                                <label>Senha atual</label>
                                                <input type="password" name="old_password" id="old_password" value="{{ old('old_password') }}" maxlength="50" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-5 m-3">  
                                            <div class="input-block local-forms">
                                                <label>Senha nova</label>
                                                <input type="password" name="new_password" id="new_password" value="{{ old('new_password') }}" maxlength="50" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-5 m-3">  
                                            <div class="input-block local-forms">
                                                <label>Confirmar senha</label>
                                                <input type="password" name="confirm_new_password" id="confirm_new_password" value="{{ old('confirm_new_password') }}" maxlength="50" class="form-control">
                                            </div>
                                        </div>

                                        <!-- Input Hidden -->

                                        <input type="hidden" name="id" id="id" value="{{ Auth::user()->id }}">

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