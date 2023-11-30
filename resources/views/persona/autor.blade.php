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
    <form action=" {{url('autor')}}" method="post">
        @csrf
        <div><h3>:: AUTOR ::</h3></div>
        <div>
            <label for="">Nombre: </label>
            <input type="text" name= "nombre"> 
        </div>
        <br>
        <div>
            <button type="submit">REGISTRAR</button>
        </div>
        <br>
        
    </form>


    <table border="1">
            <thead>
                <tr>
                    <th>ITEM</th>
                    <th>AUTOR</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($autores as $item)
                    <tr>
                        <td> {{$item->id}}</td>
                        <td> {{$item->nombre}} </td>
                        <td>
                            <form action="{{url('autor', $item->id)}}" method="post">
                               @method('delete')
                               @csrf
                             <button type="submit">Eliminar</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{url('autor', $item->id)}}" method="get">
                              @csrf
                              <button type="submit">Actualizar</button>
                             </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>   
        <button><a href="{{url('indexlibro')}}">Libros</a></button>     
    </center>
   
</body>
</html>