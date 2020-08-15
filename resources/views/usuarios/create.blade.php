@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-sm-7">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/usuarios" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" name="name" placeholder="escribe el nombre">
        </div>
        <div class="form-group">
            <label for="matricula">Matríula</label>
            <input type="text" class="form-control" name="matricula" placeholder="escribe la matricula">        
        </div>
        <div class="form-group">
            <label for="rol">Grupo</label>
            <select name="grupo" class="form-control">
                <option selected disabled>Elige un Grupo para este usuario</option>
                @foreach ($grupos as $grupo)
                    <option value="{{$grupo->name}}">{{$grupo->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="row"> 
            <div class="form-group col-md-4">
                <label for="telefono">Telefono</label>
                <input type="text" class="form-control" name="telefono" placeholder="escribe el telefono">        
            </div>
            <div class="form-group col-md-8">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" name="direccion" placeholder="escribe la dirección"> 
            </div>
        </div>
        
        <div class="form-group">
            <label for="rol">Rol de usuario</label>
            <select name="rol" class="form-control">
                <option selected disabled>Elige un rol para este usuario</option>
                @foreach ($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
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
        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{url('usuarios')}}"><button type="button" class="btn btn-danger">Canselar</button></a>
    </form>
</div>
</div>
</div>
@endsection