@extends('main')

@section('title', 'Criar software')

@section('content')

<main>
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Criar software</h1>
        <form action="/softwares" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" id="descSoftware" name="descSoftware" placeholder="Software...">
            </div>
            <br>
            <input type="submit" class="btn btn-primary" value="Criar software">
        </form>
    </div>
</main>

@endsection