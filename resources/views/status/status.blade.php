@extends('main')

@section('title', 'Status')

@section('content')

<main>
    <div class="container">
        <div class="row">
            <div class="col-10">
                <table class="table table-hover container tb">
                    <thead>
                        <tr>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($status as $s)
                        <tr>
                            <td>{{ $s->descStatus }}</td>
                            <td>
                                <a href="/status/edit/{{ $s->id }}">Detalhes</a>
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
                        <a href="/status/create" class="btn btn-success" role="button">Criar status</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <br>
                        <a href="/status/pdf" class="btn btn-info" role="button">Exportar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection