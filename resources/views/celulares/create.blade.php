@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{url('/celulares')}}" class="btn btn-success">Lista de Telefonos Movil </a>
    <br>
    <form action="{{url('/celulares')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('celulares.form',['modo'=>'Crear'])

    </form>
</div>
@endsection
