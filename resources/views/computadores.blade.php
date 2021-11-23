@extends('main')

@section('title', 'Computadores')

@section('content')

<main>
    <div class="container">
        <div class="row">
            <div class="col-10">
                <table class="table table-hover container tb">
                    <thead>
                        <tr>
                            <th scope="col">ID GLPI</th>
                            <th scope="col">Patrimonio</th>
                            <th scope="col">Colaborador</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comps as $comp)
                        <tr>
                            <td>{{ $comp->glpi_id }}</td>
                            <td>{{ $comp->otherserial }}</td>
                            <td>{{ $comp->colaboradorfield }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col">
                <div class="row">
                    <div class="col">
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection