@extends('main')

@section('title', 'Criar Licença')

@section('content')

<main>
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Criar licença</h1>
        <form action="/licencas" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Serial</label>
                <input type="text" class="form-control" id="serial" name="serial" placeholder="Licenca serial.." required>
                <label for="">Key</label>
                <input type="text" class="form-control" id="key" name="key" placeholder="Licença key..">
                <label for="">Autorização de Uso</label>
                <input type="text" class="form-control" id="autorizacaoDeUso" name="autorizacaoDeUso" placeholder="Quantidade de instalação em diferentes equipamentos..">
                <label for="">Numero de Empenho</label>
                <input type="text" class="form-control" id="numeroEmpenho" name="numeroEmpenho" placeholder="Numero de empenho da compra da licenca..">

                <!-- ***************************************************************************** -->
                <div class="col-md-3">
                    <label class="form-label">Software</label>
                    <select class="form-select" id="software_id" name="software_id" required>
                        <option selected disabled value="">...</option>
                        @foreach($softwares as $software)
                        <option value="{{ $software->id }}">{{ $software->descSoftware }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- ***************************************************************************** -->
                <div class="col-md-3">
                    <label class="form-label">Tipo</label>
                    <select class="form-select" id="tipo_id" name="tipo_id" required>
                        <option selected disabled value="">...</option>
                        @foreach($tipos as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->descTipo }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- ***************************************************************************** -->
                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <select class="form-select" id="status_id" name="status_id" required>
                        <option selected disabled value="">...</option>
                        @foreach($status as $statu)
                        <option value="{{ $statu->id }}"> {{ $statu->descStatus }} </option>
                        @endforeach
                    </select>
                </div>

                <!-- ***************************************************************************** -->
                <div class="col-md-3">
                    <label class="form-label">Computadores</label>
                    <input type="text" list="comps" class="form-control" name="computador_id" id="computador_id" required />
                    <datalist id="comps">
                        @foreach($computadores as $computador)
                        <option value="{{ $computador->id }}"> {{ $computador->otherserial }} </option>
                        @endforeach
                    </datalist>
                </div>

                <!-- ***************************************************************************** -->
                <!-- Proxima feature -->
                <!-- <label for="anexo">Anexo</label>
                <input type="file" class="form-control" id="anexo" name="anexo" placeholder="Anexo de documento auxiliar.."> -->

                <!-- ***************************************************************************** -->
                <label>Observação</label>
                <textarea class="form-control" id="observacao" name="observacao" rows="4" cols="50" placeholder="Observação.."></textarea>
                <br>
            </div>
            <br>
            <input type="submit" class="btn btn-primary" value="Criar licença">
        </form>
    </div>
</main>

@endsection