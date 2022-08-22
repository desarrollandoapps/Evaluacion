<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use App\Models\Idea;
use App\Models\User;
use App\Models\IdeaEvaluador;

class EvaluacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function indexEvaluar()
    {
        $evaluarMenu = true;
        return view('menu-link.evaluar', compact('evaluarMenu'));
    }

    public function irEvaluar($id)
    {
        $idea = Idea::find($id);
        return view('evaluacion.evaluar', compact('idea'));
    }

    public function store(Request $request)
    {
        dd($request);
    }
}
