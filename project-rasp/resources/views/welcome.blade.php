<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <title>Automação Residencial</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
    <script src="automacao.js"></script>
    <div>
    <div><button class="btn_1">Ligar</button></div>
    <div><button class="btn_2">Ligar</button></div>
    <div id='rele_2'></div><div id='estado_2' style='visibility: hidden;'>
    </div>
    </div>
    <script>activeRele1()</script>
    <script>activeRele2()</script>
    </body>
</html>
