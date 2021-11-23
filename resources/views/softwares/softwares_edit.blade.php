@extends('main')

@section('title', 'Editando software ' . $softwares->descSoftware)

@section('content')

<main>
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Editar software</h1>
        <div class="row">
            <div class="col-10">
                <form action="/softwares/update/{{ $softwares->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" class="form-control" id="descSoftware" name="descSoftware" value="{{ $softwares->descSoftware }}">
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Atualizar software">
                </form>
            </div>

            <div class="col">
                <form action="/softwares/{{ $softwares->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger delete-btn" onclick="return confirm ('Deseja realmente apagar o software {{ $softwares->descSoftware }}?')">Deletar</button>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection