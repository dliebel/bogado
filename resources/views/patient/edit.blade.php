<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container">

    <h1>
           Formulario de Paciente

        </h1>
        <p>
        <!-- <a class="btn btn-primary " href="/paciente/create" role="button" >Crear Paciente</a> -->
        </p>
        <form action="{{route('paciente.update',$patient->id)}}" method="POST" class="row g-3">
           @csrf 
           @method('PUT')
           <div class="col-md-6">
                <label for="first_name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{$patient->first_name}}">
            </div>
            <div class="col-md-6">
                <label for="last_name" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{$patient->last_name}}">
            </div>
            <div class="col-12">
                <label for="direction" class="form-label">Address</label>
                <input type="text" class="form-control" id="direction" name="direction" placeholder="1234 Main St"  value="{{$patient->direction}}">
            </div>
        
           
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a class="btn btn-secundary " href="/paciente" role="button" >Cancelar</a> 
            </div>
        </form>
    </div>
</body>


</html>