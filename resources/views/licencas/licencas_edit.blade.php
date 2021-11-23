@extends('main')

@section('title', 'Editando Licença ' . $licencas->serial)

@section('content')

<main>
    <div id="event-edit-container" class="col-md-6 offset-md-3">
        <h1>Editando: {{ $licencas->serial }}</h1>
        <form action="/licencas/update/{{ $licencas->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Serial</label>
                <input type="text" class="form-control" id="serial" name="serial" placeholder="Licenca serial.." value="{{ $licencas->serial }}" required autofocus>

                <label for="">Key</label>
                <input type="text" class="form-control" id="key" name="key" placeholder="Licença key.." value="{{ $licencas->key }}">

                <label for="">Autorização de Uso</label>
                <input type="text" class="form-control" id="autorizacaoDeUso" name="autorizacaoDeUso" placeholder="Quantidade de instalação em diferentes equipamentos.." value="{{ $licencas->autorizacaoDeUso }}">

                <label for="">Numero de Empenho</label>
                <input type="text" class="form-control" id="numeroEmpenho" name="numeroEmpenho" placeholder="Numero de empenho da compra da licenca.." value="{{ $licencas->numeroEmpenho }}">

                <!-- ***************************************************************************** -->
                <div class="col-md-3">
                    <label class="form-label">Software</label>
                    <select class="form-select" id="software_id" name="software_id" required>
                        <option selected disabled value="{{ $sof->id }}">{{ $sof->descSoftware }}</option>
                        @foreach($softwares as $s)
                        <option value="{{ $s->id }}">{{ $s->descSoftware }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- ***************************************************************************** -->
                <div class="col-md-3">
                    <label class="form-label">Tipo</label>
                    <select class="form-select" id="tipo_id" name="tipo_id" required>
                        <option selected disabled value="{{ $tip->id }}">{{ $tip->descTipo }}</option>
                        @foreach($tipos as $t)
                        <option value="{{ $t->id }}">{{ $t->descTipo }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- ***************************************************************************** -->
                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <select class="form-select" id="status_id" name="status_id" required>
                        <option selected disabled value="{{ $sta->id }}">{{ $sta->descStatus }}</option>
                        @foreach($status as $st)
                        <option value="{{ $st->id }}">{{ $st->descStatus }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- ***************************************************************************** -->
                <div class="col-md-3">
                    <label class="form-label">Computador: {{ $com->otherserial }}</label>
                    <input type="text" list="comps" class="form-control" name="computador_id" id="computador_id" required />
                    <datalist id="comps">
                        @foreach($computadores as $computador)
                        <option value="{{ $computador->id }}"> {{ $computador->otherserial }} </option>
                        @endforeach
                    </datalist>
                </div>

                <!-- Proxima feature -->
                <!-- <label for="anexo">Anexo</label>
            <input type="file" class="form-control" id="anexo" name="anexo" placeholder="Anexo de documento auxiliar.."> -->

                <label>Observação</label>
                <textarea class="form-control" id="observacao" name="observacao" rows="4" cols="50" placeholder="Observação.."> {{$licencas->observacao}} </textarea>
                <br>
            </div>
            <br>
            <input type="submit" class="btn btn-primary" value="Editar licença">
        </form>
        <form action="/licencas/{{ $licencas->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger delete-btn" onclick="return confirm ('Deseja realmente apagar a licenca {{ $licencas->serial }}?')">Deletar</button>
        </form>
    </div>
</main>

@endsection