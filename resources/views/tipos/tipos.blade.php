@extends('main')

@section('title', 'Tipos')

@section('content')

<main>
    <div class="container">
        <div class="row">
            <div class="col-10">
                <table class="table table-hover container tb">
                    <thead>
                        <tr>
                            <th scope="col">Tipos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tipos as $tipo)
                        <tr>
                            <td>{{ $tipo->descTipo }}</td>
                            <td>
                                <a href="/tipos/edit/{{ $tipo->id }}">Detalhes</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col">
                <div class="row">
                    <div class="col">
                        <br>
                        <a href="/tipos/create" class="btn btn-success" role="button">Criar tipo</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <br>
                        <a href="/tipos/pdf" class="btn btn-info" role="button">Exportar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection