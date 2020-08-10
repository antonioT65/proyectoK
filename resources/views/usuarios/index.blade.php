@extends('layouts.app')
@section('content')
  <div class="container">
    <h2>Lista de usuarios <a href="usuarios/create"><button type="button" class="btn btn-dark float-right">Agregar</button></a></h2>  
    <h6>
      @if($search)
      <div class="alert alert-primary" role="alert">
        Los resultados de la busqueda '{{$search}}' son:
      </div>
      @endif
    </h6>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Matrícula</th>
            <th scope="col">Grupo</th>
            <th scope="col">Telefono</th>
            <th scope="col">Dirección</th>
            <th scope="col">Rol</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
        @foreach($users as $user1)
       
          <tr>
            <th scope="row">{{$user1->id}}</th>
            <td>{{$user1->name}}</td>
            <td>{{$user1->matricula}}</td>
            <td>{{$user1->grupo}}</td>
            <td>{{$user1->telefono}}</td>
            <td>{{$user1->direccion}}</td>
            <td>
              @foreach($user1->roles as $rol)
                {{$rol->name}}
              @endforeach
            </td>
            <td>
              <form action="{{route('usuarios.destroy',$user1->id)}}" method="POST">
                <a href="{{route('usuarios.show',$user1->id)}}"><button type="button" class="btn btn-secondary">Ver</button></a>
                <a href="{{route('usuarios.edit',$user1->id)}}"><button type="button" class="btn btn-primary">Editar</button></a>
                
                @csrf
                @method('DELETE')
             <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#l-{{$user1->id}}">
                  Eliminar
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="l-{{$user1->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Deseas Eliminar este usuario?{{$user1->id}}
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Si</button>
                      </div>
                    </div>
                  </div>
                </div>               
              </form>

            </td>
            
          </tr>
        @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="mx-auto">
          {{$users->links()}}
        </div>
      </div>
        
  </div>    
@endsection
