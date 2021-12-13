<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Licenças</title>
</head>

<body>
    @foreach ($licencas as $l)
        <p>Serial: {{ $l->serial }}</p>
        <p>Software: {{ $l->descSoftware }}</p>
        <p>Colaborador: {{ $l->colaboradorfield }}</p>
        <hr>
    @endforeach
</body>

</html>