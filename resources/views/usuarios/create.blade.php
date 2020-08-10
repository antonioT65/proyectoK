@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-sm-6">
    <form action="/usuarios" method="POST">
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
            <label for="rol">Rol</label>
            <select name="grupo" class="form-control">
                <option selected disabled>Elige un Grupo para este usuario</option>
                @foreach ($grupos as $grupo)
                    <option value="{{$grupo->name}}">{{$grupo->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="text" class="form-control" name="telefono" placeholder="escribe la matricula">        
        </div>
        <div class="form-group">
            <label for="direccion">Direccion</label>
            <input type="text" class="form-control" name="direccion" placeholder="escribe la matricula"> 
        </div>       
        <div class="form-group">
            <label for="rol">Rol</label>
            <select name="rol" class="form-control">
                <option selected disabled>Elige un rol para este usuario</option>
                @foreach ($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
        </div> 
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>        
        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{url('usuarios')}}"><button type="button" class="btn btn-danger">Canselar</button></a>
    </form>
</div>
</div>
</div>
@endsection