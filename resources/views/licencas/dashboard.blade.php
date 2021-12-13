@extends('main')

@section('title', 'Licenças')

@section('content')

<main>
    <div class="container">
        <div class="row">
            <div class="col-9">
                <table class="table table-hover container tb">
                    <thead>
                        <tr>
                            <th scope="col">Licenças</th>
                            <th scope="col">Software</th>
                            <th scope="col">Colaborador</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($licencas as $licenca)
                        <tr>
                            <td>{{ $licenca->serial }}</td>
                            <td>{{ $licenca->descSoftware }}</td>
                            <td>{{ $licenca->colaboradorfield }}</td>
                            <td>
                                <a href="/licencas/edit/{{ $licenca->id }}"> Detalhes </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-------------------------------->
            <div class="col">
                <div class="row">
                    <div class="col-5">
                        <a href="/licencas/create" class="btn btn-success">Adicionar licenca</a>
                    </div>

                    <div class="col-4">
                        <a href="/pdf" class="btn btn-info">Exportar</a>
                    </div>

                    <div class="col">
                        <a href="/log" class="btn btn-info">Log</a>
                    </div>
                </div>

                <form action="/" method="GET">
                    <br>
                    <div class="row">
                        <select name="software_id" id="software">
                            <option value="">Filtrar por software</option>
                            @foreach ($softwares as $s)
                            <option value="{{ $s->id }}"> {{ $s->descSoftware }} </option>
                            @endforeach
                        </select>
                    </div>

                    <br>
                    <div class="row">
                        <select name="status_id" id="status">
                            <option value="">Filtrar por status</option>
                            @foreach ($status as $st)
                            <option value="{{ $st->id }}"> {{ $st->descStatus }} </option>
                            @endforeach
                        </select>
                    </div>

                    <br>
                    <div class="row">
                        <button type="submit" class="btn btn-success">
                            Pesquisar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection