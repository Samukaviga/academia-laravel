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
						<div class="row">
							<div class="col-sm-12">
								<div class="page-sub-header">
									<h3 class="page-title">Crucifixo com Halteres</h3>
									<ul class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.html">Home</a></li>
										<li class="breadcrumb-item active">Admin</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					 <!-- Blog Post -->
                     <div class="col-md-6 col-xl-6 col-sm-12 d-flex">
                            <div class="blog grid-blog flex-fill">
                                <div class="blog-image">
                                    <a href="blog-details.html"><img class="img-fluid" src="{{ asset('storage/' . $treino->exercicio->imagem) }}" alt="Post Image"></a>  
                                </div>
                                <div class="blog-content">
                                    
                                    <h3 class="blog-title"><a href="blog-details.html">Série: {{ $treino->exercicio->nome }}</a></h3>
                                    <p>{{ $treino->exercicio->obs }}</p>
                                </div>
                                <div class="row">
                                    <div class="edit-options d-flex justify-content-end">
                                        
                                        <div class="status-toggle">
                                            <input id="rating_4" class="check" type="checkbox" checked>     
                                            <label class="d-flex gap-2 align-items-center justify-content" for="">
                                                <div>
                                                    <livewire:concluir :treino="$treino" />
                                                </div>
                                                Feito
                                            </label>
                                        </div>
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