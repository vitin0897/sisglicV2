<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatorio softwares</title>
</head>

<body>
    <h1>Softwares</h1>
    @foreach ($softwares as $s)
        <p>{{ $s->descSoftware }}</p>
        <hr>
    @endforeach
</body>

</html>