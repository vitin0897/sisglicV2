@extends('main')

@section('title', 'Editando status ' . $status->descStatus)

@section('content')

<main>
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Editar status</h1>
        <div class="row">
            <div class="col-10">
                <form action="/status/update/{{ $status->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" class="form-control" id="descstatus" name="descstatus" value="{{ $status->descStatus }}">
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Atualizar status">
                </form>
            </div>

            <div class="col">
                <form action="/status/{{ $status->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger delete-btn" onclick="return confirm ('Deseja realmente apagar o status {{ $status->descStatus }}?')">Deletar</button>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection