@extends('main')

@section('title', 'Editando tipo ' . $tipo->descTipo)

@section('content')

<main>
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Editar tipo</h1>
        <div class="row">
            <div class="col-10">
                <form action="/tipos/update/{{ $tipo->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" class="form-control" id="descTipo" name="descTipo" value="{{ $tipo->descTipo }}">
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Atualizar tipo">
                </form>
            </div>

            <div class="col">
                <form action="/tipos/{{ $tipo->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger delete-btn" onclick="return confirm ('Deseja realmente apagar o tipo {{ $tipo->descTipo }}?')">Deletar</button>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection