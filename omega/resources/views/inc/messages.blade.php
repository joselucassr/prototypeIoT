@if(count($errors) > 0)
    @foreach ($errors -> all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif

@if (session('erro_resultados'))
    <div class="alert alert-danger text-center">
        <h4 class="d-inline">{{session('erro_resultados')}}</h4>
        <h4 class="d-inline"><b>{{session('erro_resultados_corpo')}}</b></h4>
    </div>
@endif