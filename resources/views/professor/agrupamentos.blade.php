<x-layout :mensagem-sucesso="$mensagemSucesso" >

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
                                       <h3 class="page-title">Agrupamentos - {{ $tipo }}</h3>						
                                   <ul class="breadcrumb">
                                       <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                       <li class="breadcrumb-item active">Admin</li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                   </div>
                   <!-- /Page Header -->

                    <div class="row">
                        <div class="col-xl-6 d-flex">						
							<!-- Feed Activity -->
							<div class="card flex-fill comman-shadow">
								<div class="card-header d-flex align-items-center">
									
									<ul class="chart-list-out student-ellips">
										<li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
									</ul> 
								</div>
								<div class="card-body">
									<div class="activity-groups">
										<div class="activity-awards d-flex justify-content-between">
										
											<div class="award-list-outs">
												<h3>Iniciante</h3>
											</div>
											<div class="award-time-list">
												<a href="/professor/agrupamento/{{ $tipo }}/editar/{{ $nivel = 1 }}" type="button" class="btn btn-outline-success me-1 mb-1" id="type-success">Editar</a>
											</div>
										</div>

                                        <div class="activity-awards d-flex justify-content-between">
										
											<div class="award-list-outs">
												<h3>Intermediario</h3>
											</div>
											<div class="award-time-list">
												<a href="/professor/agrupamento/{{ $tipo }}/editar/{{ $nivel = 2 }}" type="button" class="btn btn-outline-success me-1 mb-1" id="type-success">Editar</a>
											</div>
										</div>

                                        <div class="activity-awards d-flex justify-content-between">
										
											<div class="award-list-outs">
												<h3>Avançado</h3>
											</div>
											<div class="award-time-list">
												<a href="/professor/agrupamento/{{ $tipo }}/editar/{{ $nivel = 3 }}" type="button" class="btn btn-outline-success me-1 mb-1" id="type-success">Editar</a>
											</div>
										</div>
									
									
										
									</div>
								</div>
							</div>
							<!-- /Feed Activity -->							
						</div>

                    </div>


       </div>
       <!-- /Page Wrapper -->

           
       
   </div>
   <!-- /Main Wrapper -->


</x-layout>