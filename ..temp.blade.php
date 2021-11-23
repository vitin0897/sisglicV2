@extends('main')

@section('title', 'Editando licença ' . $licencas->serial)

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando licença {{ $licencas->serial }}</h1>
    <form action="/licencas/update/{{ $licencas->id }}" method="POST" enctype="multipart/form-data"">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Serial *</label>
            <input type="text" class="form-control" id="serial" name="serial" value="{{ $licencas->serial }}" placeholder="Licenca serial..">
            <label for="">Key</label>
            <input type="text" class="form-control" id="key" name="key" value="{{ $licencas->key }}" placeholder="Licença key..">
            <label for="">Autorização de Uso</label>
            <input type="text" class="form-control" id="autorizacaoDeUso" name="autorizacaoDeUso" value="{{ $licencas->autorizacaoDeUso }}"placeholder="Quantidade de instalação em diferentes equipamentos..">
            <label for="">Numero de Empenho</label>
            <input type="text" class="form-control" id="numeroEmpenho" name="numeroEmpenho" value="{{ $licencas->numeroEmpenho }}"placeholder="Numero de empenho da compra da licenca..">

            <label for="">Anexo (Somente imagem)</label>
            <input type="file" class="form-control" id="anexo" name="anexo">
            <br>
            <img class="preview-img" src="/img/anexos/{{ $licencas->anexo }}">
            <br>

            <label for="">Observação</label>
            <textarea class="form-control" id="observacao" name="observacao" rows="2" cols="50" placeholder="Observação..">{{ $licencas->observacao }}</textarea>
            <br>
        </div>
        <br>
        <input type="submit" class="btn btn-primary" value="Editar licença">
    </form>
</div>

@endsection