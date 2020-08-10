@extends('layouts.app')

@section('content')
<form action="{{route('todas.update',$nota->id)}}" method="POST">
    @method('PATCH')    
    @csrf
<div class="card text-center mx-auto" stile="...">
    <div class="card-header">
      <input type="text" name="titulo" class="form-control" value="{{$nota->titulo}}">
    </div>
    <div class="card-body">
        <textarea name="texto" class="form-control" rows="6">{{$nota->texto}}</textarea>
    </div>
    <div class="card-footer" text-muted small>
        {{$nota->update_at}}
        <a href="{{URL::action('ActivController@index')}}">
            <button type="button" class="btn btn-danger float-right mr-1">
                <i class="fas fa-window-close"></i>
            </button>
        </a>

        <a href="{{URL::action('ActivController@edit',$nota->id)}}">
            <button type="submit" class="btn btn-secondary float-right mr-1">
                <i class="fas fa-save"></i>
            </button>
        </a>
                
    </div>
  </div>
</form>
 
@endsection