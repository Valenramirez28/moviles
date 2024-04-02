@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <h1 class="mb-4 text-center">{{ $modo }} Teléfono Móvil</h1>

        <input class="form-control" type="text" value="{{ isset($celulares->marca) ? $celulares->marca : old('marca') }}" name="marca" id="marca" placeholder="Ingrese la marca del celular"><br>
        <input class="form-control" type="text" value="{{ isset($celulares->nombre_modelo) ? $celulares->nombre_modelo : old('nombre_modelo') }}" name="nombre_modelo" id="nombre_modelo" placeholder="Ingrese el nombre del modelo del celular"><br>
        <input class="form-control" type="text" value="{{ isset($celulares->memoria_interna) ? $celulares->memoria_interna : old('memoria_interna') }}" name="memoria_interna" id="memoria_interna" placeholder="Ingrese la memoria interna del celular"><br>
        <input class="form-control" type="text" value="{{ isset($celulares->memoria_ram) ? $celulares->memoria_ram : old('memoria_ram') }}" name="memoria_ram" id="memoria_ram" placeholder="Ingrese la memoria RAM del celular"><br>
        <input class="form-control" type="text" value="{{ isset($celulares->resolucion_camara) ? $celulares->resolucion_camara : old('resolucion_camara') }}" name="resolucion_camara" id="resolucion_camara" placeholder="Ingrese la resolución de la cámara del celular"><br>
        <input class="form-control" type="text" value="{{ isset($celulares->precio) ? $celulares->precio : old('precio') }}" name="precio" id="precio" placeholder="Ingrese el precio del celular"><br>
        <input class="form-control" type="text" value="{{ isset($celulares->stock) ? $celulares->stock : old('stock') }}" name="stock" id="stock" placeholder="Ingrese el stock del artículo">

        <div class="form-group text-center mt-4">
            <input type="submit" value="{{ $modo }} Teléfono Móvil" class="btn btn-primary btn-block btn-lg">
        </div>


