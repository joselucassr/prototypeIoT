@extends ('layouts.app')
@section('content')

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top " style="background-color: #1f648b;">

            <a class="navbar-brand" href="">Projeto Omega</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="\login-empresa"> Entrar <i class="fas fa-user"></i>
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                </ul>
            </div>

    </nav>
<div class="container" style="background-image: url(http://webapp67679.ip-201-48-107-182.cloudezapp.io/wp-content/uploads/2018/12/temperatura.jpg);">
        <div class="col-md-6" style="margin-top: 250px; margin-left: 450px;">
            <div class="card" style="width: 25rem;">
                <div class="card-body">
                    <h3 class="card-title">Projeto Omega</h3>
                    <h6 class="card-subtitle mb-2 text-muted">Facilidade de Monitoramento</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn-outline-danger">Card link</a>

                </div>
            </div>
        </div>
</div>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

@endsection
