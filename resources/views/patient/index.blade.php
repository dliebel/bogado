<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>
            Lista de Pacientes

        </h1>
        <p>
        <a class="btn btn-primary " href="/paciente/create" role="button" >Crear Paciente</a>
        </p>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{$message}}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Acciones</th>
                </tr>

            </thead>
            <tbody>
                @foreach ($patients as $p)
                <!-- esto seria un row -> registro -->
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->first_name}}</td>
                    <td>{{$p->last_name}}</td>
                    <td>{{$p->direction}}</td>
                    <td>
                    <a class="btn btn-primary " href="/paciente/{{$p->id}}/edit" role="button" >Editar</a>    
                    <form action="{{route('paciente.destroy',$p->id)}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger" >Borrar</button>
                    </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>


</html>