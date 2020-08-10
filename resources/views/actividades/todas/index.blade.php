@extends('layouts.app')

@section('content')
@include('actividades.todas.modal')
<br><br>

<div class="container">
<div class=" flex-wrap justify-content-around">
       
@foreach($notas as $nota)
@include('actividades.todas.modal-delete')
<div class="card border-primary mb-5" style="max-width: 33rem;">
    <div class="card-header"><b>{{$nota->titulo}}</b>
        <div class="small float-right">{{$nota->created_at}}</div>
    </div>
    <div class="card-body text-primary">
        <h5 class="card-title"><b>Descripcion</b></h5>
        <p class="card-text">{{$nota->texto}}</p>
    </div>
    <div class="card-footer">              
        <button type="button" class="btn btn-danger btn-sm float-right" data-toggle="modal" data-target="#modalEliminar-{{$nota->id}}">
            <i class="far fa-trash-alt"></i>
        </button>
        <a href="{{URL::action('ActivController@edit',$nota->id)}}">
            <button type="button" class="btn btn-secondary btn-sm float-right mr-1">
                <i class="fas fa-edit"></i>
            </button>
        </a>  
    </div>
    
</div>
@endforeach
</div>
</div>
@endsection