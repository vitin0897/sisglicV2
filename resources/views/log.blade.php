<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log</title>
</head>

<body>
    @foreach ($log as $l)
    <p>Usuario: {{ $l->usuario }}</p>
    <p>Licenca antiga: {{ $l->lic_antigo }} - Licenca atual: {{ $l->lic_atual }}</p>
    <p>Patrimonio antigo: {{ $l->pat_antigo }} - Patrimonio atual: {{ $l->pat_atual }}</p>
    <p>Hora da ação: {{ $l->hora_acao }}</p>
    <hr>
    @endforeach
</body>

</html>