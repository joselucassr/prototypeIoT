@extends ('layouts.app')
@section('content')

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #1f648b;">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="login"> Entrar <i class="fas fa-user"></i>
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
            </ul>
        </div>

    </nav>
<div class="container mx-auto" style="margin-top: 50px">
    <h1 class="display-3 text-center" style="color: #2277a5;"><i class="fas fa-temperature-low"></i></h1>
    <h1 class="display-1 text-center">Projeto Omega</h1>
    <h5 class="display-5 text-center">Monitoramento rápido e eficiente para sua empresa.</h5>
</div>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

@endsection
