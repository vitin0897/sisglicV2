@extends('main')

@section('title', 'Criar status')

@section('content')

<main>
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Criar status</h1>
        <form action="/status" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" id="descStatus" name="descStatus" placeholder="Status...">
            </div>
            <br>
            <input type="submit" class="btn btn-primary" value="Criar status">
        </form>
    </div>
</main>

@endsection