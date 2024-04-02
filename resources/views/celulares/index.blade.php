@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4 text-center">LISTA DE CELULARES DISPONIBLES</h2>
    <br>

    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <a href="{{ url('/celulares/create') }}" class="btn btn-primary mb-3">Registrar Nuevo Celular</a>

    <div class="table-responsive">
        <table class="table table-striped text-center">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Marca</th>
                    <th>Nombre Modelo</th>
                    <th>Memoria Interna</th>
                    <th>Memoria RAM</th>
                    <th>Resolución Cámara</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($celulares as $celular)
                <tr>
                    <td>{{ $celular->id }}</td>
                    <td>{{ $celular->marca }}</td>
                    <td>{{ $celular->nombre_modelo }}</td>
                    <td>{{ $celular->memoria_interna }}</td>
                    <td>{{ $celular->memoria_ram }}</td>
                    <td>{{ $celular->resolucion_camara }}</td>
                    <td>${{ number_format($celular->precio, 0, '.', '.') }}</td>
                    <td>{{ $celular->stock }}</td>
                    <td>
                        <a href="{{ url('/celulares/'.$celular->id.'/edit') }}" class="btn btn-info btn-sm mr-2">
                            Editar
                        </a>
                        <form action="{{ url('/celulares/'.$celular->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Deseas eliminar?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {!! $celulares->links() !!}
</div>
@endsection
