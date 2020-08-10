<?php

namespace App\Http\Controllers;

use App\Grupos;
use Illuminate\Http\Request;


class GrupoController extends Controller
{

    public function index()
    {
        $grupos = Grupos::all();
        return view('grupos.index',['grupos'=>$grupos]);
    }
    public function store(Request $request)
    {
        $grupo=new Grupos();
        $grupo->name = request('name');
        $grupo->save();
        return redirect('grupos');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $grupo=Grupos::findOrFail($id);
        $grupo->delete();
        return redirect('/grupos');
    }

}
