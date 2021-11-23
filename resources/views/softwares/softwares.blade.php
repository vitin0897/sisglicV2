@extends('main')

@section('title', 'Softwares')

@section('content')

<main>
    <div class="container">
        <div class="row">
            <div class="col-10">
                <table class="table table-hover container tb">
                    <thead>
                        <tr>
                            <th scope="col">Softwares</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($softwares as $s)
                        <tr>
                            <td>{{ $s->descSoftware }}</td>
                            <td>
                                <a href="/softwares/edit/{{ $s->id }}">Detalhes</a>
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
                        <a href="/softwares/create" class="btn btn-success" role="button">Criar software</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <br>
                        <a href="/softwares/pdf" class="btn btn-info" role="button">Exportar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection