<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerNotas extends Controller
{
    public function index(Request $request)
    {
        if(isset($request->id)){
            $nota = Nota::where('id',$request->id)->where('autor', $request->user()->id)->first();
            if($nota){
                $autor = Usuario::find($nota->autor);
                return view('notas.exibir', compact('request', 'nota', 'autor'));
            } else {
                return redirect()->route('home');
            }
        } else{
            $notas = Nota::all()->where('autor', $request->user()->id);
            return view('notas.notas', compact('notas', 'request'));
        }
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
}
