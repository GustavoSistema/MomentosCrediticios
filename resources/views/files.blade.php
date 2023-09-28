<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        img{
            max-width: 150px;
        }
    </style>
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <br>
        <br>
        <input type="text" name="name" placeholder="Nombre" required autocomplete="disabled">
        <br>
        <br>
        <input type="submit" value="Guardar">
    </form>
    <h3>Archivos Cargados</h3>
    <table>
        <thead>
            <tr>
                <th>Miniatura</th>
                <th>Archivo</th>
                <th>Tamaño</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if (isset($files))
                @foreach ($files as $file)
                    <tr>
                        <td>@if($file['picture'])<img src="{{$file['picture']}}">@endif</td>
                        <td>
                            <a href="{{$file['link']}}" target="_blank">{{$file['name']}}</a>
                        </td>
                        <td>{{$file['size']}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</body>

</html>
