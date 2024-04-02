@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{url('/clientes')}}" class="btn btn-success">Lista de Clientes Registrados </a>
    <br>
    <form action="{{url('/clientes')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('clientes.form',['modo'=>'Crear'])

    </form>
</div>
@endsection
