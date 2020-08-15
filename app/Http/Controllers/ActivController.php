<?php

namespace App\Http\Controllers;

use App\Actividades;
use Illuminate\Http\Request;
use App\UserController;

class ActivController extends Controller
{
    public function index(){
        return view('actividades.todas.index',['notas'=>Actividades::all()->where('grupo',auth()->user()->grupo)]);
        //Auth::user()->imagen
    }

    public function edit($id){
        return view('actividades.todas.edit',['nota'=>Actividades::findOrFail($id)]);
    }
    public function update(Request $request, $id)
    {
        $nota= Actividades::findOrFail($id);
        $nota->titulo = $request->get('titulo');
        $nota->texto = $request->get('texto');

        $nota->update();
        return redirect('actividades/todas');
    }

    public function store(Request $request){
        $notas = new Actividades();
        $notas->titulo=request('titulo');
        $notas->texto=request('texto');
        $notas->user_id=auth()->id();
        $notas->grupo=auth()->user()->grupo;

        $notas->save();
        return redirect('actividades/todas');
    }
    public function destroy($id){
        $nota1=Actividades::findOrFail($id);
        $nota1->delete();
        return redirect('actividades/todas');
    }

    public function favoritas(){
        return view('actividades.favoritas');
    }

    public function archivadas(){
        return view('actividades.archivadas');
    }
}
