<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function editarUsuario(User $user)
    {
        if (Gate::denies('editar-usuario')) 
        {
            return redirect(route('admin.users.index'));
        }

        $roles = Rol::all();

        return view('admin.users.edit')->with([
            'usuario' => $user,
            'roles' => $roles
        ]);
    }
}
