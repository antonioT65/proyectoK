@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-6 mx-auto">
            <h2>Grupos
                @include('grupos.modal')
            </h2>    
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($grupos as $grupo)
                <tr>
                    <th scope="row">{{$grupo->id}}</th>
                    <td>{{$grupo->name}}</td>
                    <td>
                        <form action="{{route('grupos.destroy',$grupo->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                         <button type="button" class="btn btn-danger mx-auto" data-toggle="modal" data-target="#l-{{$grupo->id}}">
                              Eliminar
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="l-{{$grupo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    Deseas Eliminar este grupo: {{$grupo->name}}?
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
        </div>
    </div>
        
  </div> 
@endsection