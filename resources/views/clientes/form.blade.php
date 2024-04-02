@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <h1 class="mb-4 text-center">{{ $modo }} Clientes</h1>

        <input class="form-control" type="text" value="{{ isset($clientes->documento)?$clientes->documneto:old('docuemento') }}" name="documento" id="documento" placeholder="Ingrese el Documento"><br>
        <input class="form-control" type="text" value="{{ isset($clientes->nombres)?$clientes->nombres:old('nombres') }}" name="nombres" id="nombres" placeholder="Ingrese el nombre"><br>
        <input class="form-control" type="text" value="{{ isset($clientes->apellidos)?$clientes->apellidos:old('apellidos') }}" name="apellidos" id="apellidos" placeholder="Ingrese el apellido"><br>
        <input class="form-control" type="text" value="{{ isset($clientes->telefono)?$clientes->telefono:old('telefono') }}" name="telefono" id="telefono" placeholder="Ingrese el telefono"><br>
        <input class="form-control" type="text" value="{{ isset($clientes->direccion)?$clientes->direccion:old('direccion') }}" name="direccion" id="direccion" placeholder="Ingrese la direccion"><br>

        <div class="form-group text-center mt-4">
            <input type="submit" value="{{ $modo }} Clientes" class="btn btn-primary btn-block btn-lg">
        </div>


