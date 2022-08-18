<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rol;
use Gate;

class AdminController extends Controller
{

    public function verUsuarios()
    {
        if (Gate::denies('administrador')) 
        {
            // abort(403);
            return redirect(route('home'));
        }
        $registrarIdea = false;
        $usuarios = true;
        return view('menu-link.usuarios', compact('registrarIdea', 'usuarios'));
    }

    public function verUsuario($id)
    {
        if (Gate::denies('administrador')) 
        {
            return redirect(route('home'));
        }

        $roles = Rol::orderBy('nombre')->get();

        $usuario = User::join('rol_user', 'users.id', 'rol_user.user_id')
                        ->join('rols','rol_user.rol_id', 'rols.id')
                        ->where('users.id', $id)
                        ->select('users.*', 'rols.nombre as rol')
                        ->first();

        return view('users.show')->with([
            'usuario' => $usuario,
            'roles' => $roles,
        ]);
    }

    public function editUsuario($id)
    {
        if (Gate::denies('administrador')) 
        {
            return redirect(route('home'));
        }

        $roles = Rol::orderBy('nombre')->get();

        $usuario = User::join('rol_user', 'users.id', 'rol_user.user_id')
                        ->join('rols','rol_user.rol_id', 'rols.id')
                        ->where('users.id', $id)
                        ->select('users.*', 'rols.nombre as rol')
                        ->first();

        return view('admin.users.edit')->with([
            'usuario' => $user,
            'roles' => $roles
        ]);
    }

    public function updateUsuario(Request $request, $id)
    {
        $user->roles()->sync($request->roles);
        
        $usuario = User::findOrFail($id);
        $datos = $request()->except( ['rol', '_token', '_method'] );
        $usuario->update($datos);
    }
}
