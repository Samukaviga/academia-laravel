<x-layout>

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
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Treino {{ $tipo }}</h3>
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

                <?php $i = 1; ?>

                @foreach ($treinos as $treino )

                <div class="col-xl-12 col-sm-12 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <a href="{{ route('aluno.gif', ['id_treino' => $treino->id ]) }}">
                                    <div class="db-info">
                                        <h6>{{ $treino->tipo }}{{ $i }}</h6>
                                        <h3>{{ optional($treino->exercicio)->nome }}</h3>
                                        
                                        <h6 class="mt-2">
                                            {{ $treino->serie }}
                                        </h6>
                                    
                                    </div>
                                </a>
                                <div>
                                    <livewire:concluir :treino="$treino" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php $i++; ?>

                @endforeach

                <div class="col-lg-3 col-md-3 d-flex align-items-center justify-content-center">
                    <div class="skip-group">
                        <a href="{{ route('aluno.concluir', ['tipo' => $tipo , 'id' => Auth::user()->id ]) }}" type="submit" class="btn btn-info continue-btn">Concluir</a>
                    </div>
                </div>
            </div>
            <!-- /Overview Section -->


        </div>
        <!-- /Page Wrapper -->



    </div>
    <!-- /Main Wrapper -->


</x-layout>