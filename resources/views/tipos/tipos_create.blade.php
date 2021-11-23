@extends('main')

@section('title', 'Criar tipo')

@section('content')

<main>
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Criar tipo</h1>
        <form action="/tipos" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" id="descTipo" name="descTipo" placeholder="Tipo...">
            </div>
            <br>
            <input type="submit" class="btn btn-primary" value="Criar tipo">
        </form>
    </div>
</main>

@endsection