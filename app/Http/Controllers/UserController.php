<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\UserEditFormRequest;
use App\User;
use App\Role;
use App\Grupos;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request){
            $query = trim($request->get('search'));
            $users = User::where('name','LIKE','%'.$query.'%')
            ->orderBy('id','asc')
            ->paginate(8);

            //dd($users); sirve para ver que nos arroja ese objeto
         return view('usuarios.index',['users'=>$users,'search'=>$query]);   
        }
    }


    public function create()
    {
        $roles=Role::all();
        $grupos=Grupos::all();
        return view('usuarios.create',['roles'=>$roles],['grupos'=>$grupos]);

    }

    public function store(UserFormRequest $request)
    {
        $usuario=new User();
        $usuario->name = request('name');
        $usuario->matricula = request('matricula');
        $usuario->grupo = request('grupo');
        $usuario->telefono = request('telefono');
        $usuario->direccion = request('direccion');
        $usuario->rol = request('rol');
        $usuario->password = bcrypt(request('password'));
        if($request->hasFile('imagen')){
            $file=$request->imagen;
            $file->move(public_path() . '/imagenes/users',$file->getClientOriginalName());
            $usuario->imagen = $file->getClientOriginalName();
        }

        $usuario->save();

        $usuario->asignarRol($request->get('rol'));
        return redirect('/usuarios');
    }

    public function show($id)
    {
        return view('usuarios.show',['user'=>User::findOrFail($id)]);
    }


    public function edit($id)
    {
        return view('usuarios.edit',['user'=>User::findOrFail($id)]);
    }

    
    public function update(UserEditFormRequest $request, $id)
    {
        $usuario= User::findOrFail($id);
        $usuario->name = $request->get('name');
        $usuario->grupo = $request->get('grupo');
        $usuario->telefono = $request->get('telefono');
        $usuario->direccion = $request->get('direccion');
        if ($request->hasFile('imagen')) {
            $file = $request->imagen;
            $file->move(public_path() . '/imagenes/users', $file->getClientOriginalName());
            $usuario->imagen = $file->getClientOriginalName();
        }
        $pass = $request->get('password');
        if ($pass != null) {
            $usuario->password = bcrypt($request->get('password'));
        } else {
            unset($usuario->password);
        }

        $usuario->update();
        return redirect('/usuarios');
    }

    public function destroy($id)
    {
        $user1=User::findOrFail($id);
        $user1->delete();
        return redirect('/usuarios');
    }
}
