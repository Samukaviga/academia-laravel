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


		<div class="content container-fluid mb-2">
			<!-- Page Header -->
			<div class="page-header">
				<div class="row">
					<div class="col-sm-12">
						<div class="page-sub-header">
							<h3 class="page-title">Seja bem vindo!</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Home</a></li>
								<li class="breadcrumb-item active">Admin</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Header -->

			<!-- Overview Section -->
			<div class="row">
				<a href="{{ route('treinoAluno', ['id' => $aluno->id, 'tipo' => 'A']) }}">
					<div class="col-xl-12 col-sm-9 col-12 d-flex">
						<div class="card bg-comman w-100">
							<div class="card-body">
								<div class="db-widgets d-flex justify-content-between align-items-center">
									<div class="db-info">
										<h6>Treino</h6>
										<h3>A</h3>
									</div>
									<div class="db-icon">
										<img src="{{asset('assets/img/icons/treino.png')}}" width="55px" height="55px" alt="Icon Treino">
									</div>
								</div>
							</div>
						</div>

					</div>
				</a>

				<a href="{{ route('treinoAluno', ['id' => $aluno->id, 'tipo' => 'B']) }}">
					<div class="col-xl-12 col-sm-9 col-12 d-flex">
						<div class="card bg-comman w-100">
							<div class="card-body">
								<div class="db-widgets d-flex justify-content-between align-items-center">
									<div class="db-info">
										<h6>Treino</h6>
										<h3>B</h3>
									</div>
									<div class="db-icon">
										<img src="{{asset('assets/img/icons/treino.png')}}" width="55px" height="55px" alt="Icon Treino">
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>
				<a href="{{ route('treinoAluno', ['id' => $aluno->id, 'tipo' => 'C']) }}">
					<div class="col-xl-12 col-sm-9 col-12 d-flex">
						<div class="card bg-comman w-100">
							<div class="card-body">
								<div class="db-widgets d-flex justify-content-between align-items-center">
									<div class="db-info">
										<h6>Treino</h6>
										<h3>C</h3>
									</div>
									<div class="db-icon">
										<img src="{{asset('assets/img/icons/treino.png')}}" width="55px" height="55px" alt="Icon Treino">
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>

				@if ($aluno->treino_adicional == true)

				<a href="{{ route('treinoAluno', ['id' => $aluno->id, 'tipo' => 'D']) }}">
					<div class="col-xl-12 col-sm-9 col-12 d-flex">
						<div class="card bg-comman w-100">
							<div class="card-body">
								<div class="db-widgets d-flex justify-content-between align-items-center">
									<div class="db-info">
										<h6>Treino</h6>
										<h3>D</h3>
									</div>
									<div class="db-icon">
										<img src="{{asset('assets/img/icons/treino.png')}}" width="55px" height="55px" alt="Icon Treino">
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>

				@endif

			</div>
			<!-- /Overview Section -->


			<form action="{{ route('professor.aluno.treino-adicional', $aluno->id) }}" method="post">
				@csrf
				@method('delete')
				<div class="col-6 col-sm-4 col-md-1 col-xl mb-3 mb-xl-0">
					<button type="submit" class="btn btn-block btn-outline-success">Treino D</button>
				</div>
			</form>


			<!-- /Socail Media Follows -->
		</div>
		<div class="row mx-1">
			<div class="col-lg-12">
				<div class="student-personals-grp">
					<div class="card">
						<div class="card-body ">
							<div class="heading-detail">
								<h4>Dados do Aluno :</h4>
							</div>
							<div class="personal-activity">
								<div class="personal-icons">
									<i class="feather-user"></i>
								</div>
								<div class="views-personal">
									<h4>Name</h4>
									<h5>{{ $aluno->name }}</h5>
								</div>
							</div>
							<div class="personal-activity">
								<div class="personal-icons">
									<i class="feather-user"></i>
								</div>
								<div class="views-personal">
									<h4>Professor</h4>
									<h5>Taua</h5>
								</div>
							</div>
							<div class="personal-activity">
								<div class="personal-icons">
									<i class="feather-calendar"></i>
								</div>
								<div class="views-personal">
									<h4>Data de Nascimento</h4>
									<h5>{{ $aluno->data_nascimento ? $aluno->data_nascimento : "__"  }}</h5>
								</div>
							</div>
							<div class="personal-activity">
								<div class="personal-icons">
									<i class="feather-calendar"></i>
								</div>
								<div class="views-personal">
									<h4>Data de Inicio</h4>
									<h5>{{ $aluno->data_inicio ? $aluno->data_inicio : "__" }}</h5>
								</div>
							</div>
							<div class="personal-activity">
								<div class="personal-icons">
									<i class="feather-calendar"></i>
								</div>
								<div class="views-personal">
									<h4>Data de Troca</h4>
									<h5>{{ $aluno->data_troca ? $aluno->data_troca : "__" }}</h5>
								</div>
							</div>
							<div class="personal-activity">
								<div class="personal-icons">
									<i class="feather-activity"></i>
								</div>
								<div class="views-personal">
									<h4>Saúde/Medicamento</h4>
									<h5>{{ $aluno->saude_medicamento ? $aluno->saude_medicamento : "__" }}</h5>
								</div>
							</div>

							<div class="personal-activity">
								<div class="personal-icons">
									<i class="feather-heart"></i>
								</div>
								<div class="views-personal">
									<h4>Objetivo</h4>
									<h5>{{ $aluno->objetivo ? $aluno->objetivo : "__" }}</h5>
								</div>
							</div>

							<div class="d-flex justify-content-end">
								<a href="/professor/{{$aluno->id}}/aluno/editar" type="button" class="btn btn-outline-success me-1 mb-1" id="type-success">Editar</a>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Treinos concluido -->
		<div class="row mx-1">
			<div class="col-12 col-lg-12 col-xl-12 d-flex">
				<div class="card flex-fill comman-shadow">
					<div class="card-header d-flex align-items-center">
						<h5 class="card-title">Treinos Concluidos :</h5>
						<ul class="chart-list-out student-ellips">
							<li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
						</ul>
					</div>
					<div class="card-body">
						<div class="teaching-card">
							<!-- Define a altura fixa e overflow para o scroll -->
							<ul class="activity-feed overflow-auto px-2" style="max-height: 300px;">

								@foreach ($treinosConcluidos as $treinoConcluido )



								<li class="feed-item ml-1 d-flex align-items-center">
									<div class="dolor-activity">
										<span class="feed-text1"><a>Treino {{ $treinoConcluido->tipo }}</a></span>
										<ul class="teacher-date-list">
											<li><i class="fas fa-calendar-alt me-2"></i><!-- 5 Setembro, 2024 --> {{ \Carbon\Carbon::parse($treinoConcluido->data)->translatedFormat('d \d\e F, Y') }}</li>
											<li>|</li>
											<li><i class="fas fa-clock me-2"></i><!-- 09:00 --> {{ \Carbon\Carbon::parse($treinoConcluido->data)->translatedFormat('H:i') }}</li>
										</ul>
									</div>
									<div class="activity-btns ms-auto">
										<button type="submit" class="btn btn-info">Concluido</button>
									</div>
								</li>

								@endforeach

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>



	</div>
	<!-- /Page Wrapper -->



	</div>
	<!-- /Main Wrapper -->


</x-layout>