<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p>Teste Pagina email</p>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Código</th>
                <th scope="col">Curso</th>
                <th scope="col">Categoria</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($turmas as $item)
            <tr>
                <th scope='row'>{{$item->id}}</th>
                <td>{{$item->nome}}</td>
                <td>{{$item->codigo}}</td>
                <td>{{$item->curso->nome ?? "" }}</td>
                <td>{{$item->categorias->nome ?? "" }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
