<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h3>Bem vindo ao {{ $nome }}!</h3>
    <h4>Fui chamado através de uma Rota - Main 2</h4>

    @for ($i = 0; $i <= 10; $i++)
        @if ($i % 2 == 0) The current value is {{ $i }} @endif
    @endfor
</body>

</html>
