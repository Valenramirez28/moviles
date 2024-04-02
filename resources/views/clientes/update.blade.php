@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{url('/clientes')}}" class="btn btn-success">Regresar </a>
    <form action="{{url('/clientes/'.$clientes->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}
    @include('clientes.form',['modo'=>'Actualizar'])

    </form>
</div>
@endsection