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
            @isset($mensagemSucesso)
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    {{ $mensagemSucesso }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endisset

           
                <div class="content container-fluid">
                    
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<div class="page-sub-header">
									<h3 class="page-title">{{ $treino->exercicio->nome }}</h3>
									<ul class="breadcrumb">
										<li class="breadcrumb-item"><a href="#">Home</a></li>
										<li class="breadcrumb-item active">Admin</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					 <!-- Blog Post -->
                     <div class="col-md-6 col-xl-4 col-sm-12 d-flex">
                            <div class="blog grid-blog flex-fill">
                                <div class="blog-image">
                                <img class="img-fluid" src="{{ asset('storage/' . $treino->exercicio->imagem) }}" alt="Post Image">
                                </div>
                                <div class="blog-content">
                                    
                                    <h3 class="blog-title"><a href="#">Serie {{ $treino->serie }}</a></h3>
                                    <p>{{ $treino->obs }}</p>
                                </div>
                                <div class="row">
                                    <div class="edit-options d-flex justify-content-end">                                   
                                        <a href="/professor/aluno/editarDadosExercicio/{{ $treino->id }}" type="button" class="btn btn-outline-success me-1 mb-1" id="type-success">Editar</a>
                                    </div>
                                </div>
                            </div>										
                        </div>
                        <!-- /Blog Post -->			

    






			</div>
			<!-- /Page Wrapper -->

			
		
        </div>
		<!-- /Main Wrapper -->
		

</x-layout>