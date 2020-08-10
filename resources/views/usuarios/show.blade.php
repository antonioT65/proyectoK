@extends('layouts.app')

@section('content')
<div class="container">
<div class="jumbotron jumbotron-fluid">
    <div class="container">
    <h1 class="display-4">{{$user->name}}</h1>
    <p class="lead">Matricula: {{$user->matricula}}</p>
    <p class="lead">Grupo: {{$user->grupo}}</p>
    <p class="lead">Telefono: {{$user->telefono}}</p>
    <p class="lead">Dirección: {{$user->direccion}}</p>
    <p class="lead">Rol: {{$user->rol}}</p>
    <a href="{{url('usuarios')}}"><button type="button" class="btn btn-primary">Regresar</button></a>
    </div>
  </div>
</div>
@endsection