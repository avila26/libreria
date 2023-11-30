<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('actualizar', $libro->id)}}" method="post">
        @csrf
        @method('PUT')
        <h2>:: Informacion del Libro:: </h2>

        <div>
        <label for="nombre">NOMBRE DEL LIBRO: </label>
            <input type="text" id="titulo" name="nombre" value="{{$libro->nombre}}">            
        </div>
        <br>
        <div>
            <label for="year">AÑO DE PUBLICACION</label>
            <input type="number" id="year" name="year" value="{{$libro->year}}">          
        </div>
        
        <br>

        <select name="autor_id"  id="">
            @foreach($autor as $item)
                <option value={{$item->id}}>{{$item->nombre}}</option>
            @endforeach
        </select>
       
        <button type="submit">Actualizar Libro</button>
    </form>
</body>
</html>