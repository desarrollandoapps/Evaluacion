<?php

namespace App\Http\Controllers;

use Gate;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuariosMenu = false;
        $ideasMenu = true;
        return view('menu-link.ideas', compact('ideasMenu', 'usuariosMenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuariosMenu = false;
        $ideasMenu = true;
        return view('ideas.insert', compact('ideasMenu', 'usuariosMenu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idea = new Idea();
        $idea->titulo = $request->titulo;
        $idea->codigo = $request->codigo;
        $idea->talento = $request->talento;
        $idea->profesion = $request->profesion;
        $idea->tipoActor = $request->tipoActor;
        $idea->email = $request->email;
        $idea->celular = $request->celular;
        $idea->estado = "Convocado";
        $idea->save();
        return redirect('ideas')->with('mensaje', 'Se han guardado los datos exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function show(Idea $idea)
    {
        $gestores = User::join('rol_user', 'users.id', 'rol_user.user_id')
                            ->join('rols', 'rol_user.rol_id', 'rols.id')
                            ->where('rols.nombre', "Gestor")
                            ->select('users.*')
                            ->get();
        $usuariosMenu = false;
        $ideasMenu = true;
        return view('ideas.show', compact('idea', 'ideasMenu', 'usuariosMenu', 'gestores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function edit(Idea $idea)
    {
        if (Gate::denies('administrador')) 
        {
            // abort(403);
            return redirect(route('home'));
        }
        $gestores = User::join('rol_user', 'users.id', 'rol_user.user_id')
                            ->join('rols', 'rol_user.rol_id', 'rols.id')
                            ->where('rols.nombre', "Gestor")
                            ->select('users.*')
                            ->get();
        $usuariosMenu = false;
        $ideasMenu = true;
        return view('ideas.edit', compact('idea', 'ideasMenu', 'usuariosMenu', 'gestores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Idea $idea)
    {
        $idea->update($request->all());
        return redirect()->route('ideas.index')->with('mensaje',  '¡Se han modificado los datos exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Idea $idea)
    {
        //
    }

    public function asignarGestor($id)
    {
        $idea = Idea::findOrFail($id);
        $gestores = User::join('rol_user', 'users.id', 'rol_user.user_id')
                            ->join('rols', 'rol_user.rol_id', 'rols.id')
                            ->where('rols.nombre', "Gestor")
                            ->select('users.*')
                            ->get();
        // 
        $usuariosMenu = false;
        $ideasMenu = true;
        return view('ideas.gestor', compact('idea', 'gestores', 'ideasMenu', 'usuariosMenu'));
    }
}
