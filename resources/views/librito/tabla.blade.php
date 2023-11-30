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
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>AUTOR</th>
                    <th>LIBRO</th>
    
                    <th>AÑO DE PUBLICACION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($libros as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->nombre_autor}}</td>
                        <td>{{$item->nombre_libro}}</td>
                        <td>{{$item->year}}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </center>
</body>
</html>