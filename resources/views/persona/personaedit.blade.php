<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>:: Editando Autor ::</h2>
    <form action=" {{url('autor', $autor->id)}}" method="post">
        @method('put')
        @csrf
        
        <div><h3>:: AUTOR ::</h3></div>
        <div>
            <label for="">Nombre: </label>
            <input type="text" name= "nombre" value="{{$autor->nombre}}"> 
        </div>
        <br>
        <div>
            <button type="submit">ACTUALIZAR</button>
        </div>
        <br>
    </form>
</body>
</html>