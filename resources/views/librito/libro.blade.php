<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <center>
        <form action="{{url('libros')}}" method="POST"> 
        @csrf
            <div><h3>:: LIBRO ::</h3></div>
            <br>
            <div>
                <label for="">Nombre del libro: </label>
                <input type="text" name="nombre">
            </div>
            <br>
            <div>
                <label for="">Año de publicación: </label>
                <input type="number" name="year">
            </div>
            <br>

            <form action="">
                <label for="">Escoja el autor del libro:</label>
                <select name="autor_id" id="">  
                    @foreach ($autor as $item)
                        <option value={{$item->id}} > {{$item->nombre}}</option>
                    @endforeach
                </select>

                <button type="submit">Guardar Libro</button>
            </form>
        </form>  
        <br>

    <table border="1px red">
        <thead>
            <tr>
                <th>ID</th>
                <th>LIBRO</th>
                <th>AUTOR</th>
                <th>Año de publicacion</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            
                @foreach ($libro as $item)
                <tr>
                    <td>{{  $item->id     }}</td>
                    <td>{{  $item->nombre_libro }}</td>
                    <td>{{  $item->nombre_autor}}</td>
                    <td>{{  $item->year   }}</td>
                
                    <td>
                        <form action="{{url('libro', $item->id)}}" method="post">
                            @method('delete')
                            @csrf
                        <button type="submit">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{url('actualizarLibro', $item->id)}}" method="post">
                            @csrf
                            @method('put')
                        <button type="submit">Actualizar</button>
                        </form>
                    </td>
                </tr>
                @endforeach  
              
        </tbody>
    </table>
    <br>
    
    <form action="{{url('buscar')}}" method="GET">
        @csrf
        <label for="datoFiltrado">Seleccionar autor para filtrar:</label>
        <select name="datoFiltrado" id="datoFiltrado">
            @foreach($autor as $item)
                <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endforeach
        </select> 
        <button type="submit">Filtrar por Autor</button>   
    </form>

    </center>

</body>
</html>