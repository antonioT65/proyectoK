@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-sm-6">
<h1>Editar usuario: {{$user->name}}</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

<form action="{{route('usuarios.update',$user->id)}}" method="POST" enctype="multipart/form-data">
    @method('PATCH')    
    @csrf
        <div class="form-group">
            <label for="name">Nombre:</label>
        <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="escribe tu nombre">
        </div>
        <div class="form-group">
            <label for="grupo">Grupo:</label>
        <input type="text" class="form-control" name="grupo" value="{{$user->grupo}}" placeholder="escribe el Grupo">
        </div>
        <div class="form-group">
            <label for="telefono">Telefono:</label>
        <input type="text" class="form-control" name="telefono" value="{{$user->telefono}}" placeholder="escribe el telefono">
        </div>
        <div class="form-group">
            <label for="direccion">Dirección:</label>
        <input type="text" class="form-control" name="direccion" value="{{$user->direccion}}" placeholder="escribe la Dirección">
        </div>
        <div class="row"> 
            <div class="form-group col-md-6">
                <label>Nueva Contraseña</label>
                <input type="password" class="form-control" name="password" placeholder="Contraseña">
            </div>
            <div class="form-group col-md-6">
                <label>Confirmar contraseña</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Contraseña">
            </div>
        </div>
        <div class="form-group">
            <label>Imagen de usuario</label>
            <input type="file" name="imagen" class="form-control">    
        </div><br> 
        <button type="submit" class="btn btn-primary">Editar usuario</button>
        <a href="{{url('usuarios')}}"><button type="button" class="btn btn-danger">Canselar</button></a>
    </form>
</div>
</div>
</div>
@endsection