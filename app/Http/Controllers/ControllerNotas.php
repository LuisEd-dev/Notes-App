<?php

namespace App\Http\Controllers;

use App\Models\{Nota, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerNotas extends Controller
{
    public function index(Request $request)
    {
        $notas = Nota::all()->where('autor', $request->user()->id);
        return view('notas.notas', compact('notas', 'request'));
    }
    public function store(Request $request)
    {
        DB::beginTransaction();
        Nota::create(['autor' => $request->user()->id,'titulo' => $request->titulo, 'nota' => $request->nota, 'alteracao' => now()]);
        DB::commit();

        return redirect()->route('home');
    }
    public function destroy(Request $request)
    {
        DB::beginTransaction();
        if(Nota::where('id', $request->id)->where('autor', $request->user()->id)->delete() == 1){
            DB::commit();
        } else {
            DB::rollback();
        }

        return redirect()->back();
    }
    public function nota(Request $request)
    {
        $nota = Nota::where('id',$request->id)->where('autor', $request->user()->id)->first();
        if($nota){
            $autor = User::find($nota->autor);
            return view('notas.exibir', compact('request', 'nota', 'autor'));
        } else {
            $request->session()->flash('flash', "Nota não encontrada ou de outro autor!");
            $request->session()->flash('alert', "danger");
            return redirect()->route('home');
        }
    }
    public function editar(Request $request)
    {
        $nota = Nota::where('id',$request->id)->where('autor', $request->user()->id)->first();
        if($nota){
            $autor = User::find($nota->autor);
            return view('notas.editar', compact('nota', 'autor', 'request'));
        } else {
            $request->session()->flash('flash', "Nota não encontrada ou de outro autor!");
            $request->session()->flash('alert', "danger");
            return redirect()->route('home');
        }
    }
}
