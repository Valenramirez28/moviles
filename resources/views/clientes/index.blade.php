@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4 text-center">LISTA DE CLIENTES REGISTRADOS</h2>
    <br>

    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <a href="{{ url('/clientes/create') }}" class="btn btn-primary mb-3">Crear Clientes</a>

    <div class="table-responsive">
        <table class="table table-striped text-center">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->documento }}</td>
                    <td>{{ $cliente->nombres }}</td>
                    <td>{{ $cliente->apellidos }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>
                        <a href="{{ url('/clientes/'.$cliente->id.'/edit') }}" class="btn btn-info btn-sm mr-2">
                            Editar
                        </a>
                        <form action="{{ url('/clientes/'.$cliente->id) }}" method="POST" class="d-inline">
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
    {!! $clientes->links() !!}
</div>
@endsection
