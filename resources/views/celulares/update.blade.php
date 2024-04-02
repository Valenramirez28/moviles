@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{url('/celulares')}}" class="btn btn-success">Regresar </a>
    <form action="{{url('/celulares/'.$celulares->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}
    @include('celulares.form',['modo'=>'Actualizar'])

    </form>
</div>
@endsection



