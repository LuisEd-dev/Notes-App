<?php

namespace App\Http\Controllers;

use App\Models\{Nota, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Support\Str;

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
            $request->session()->flash('flash', "Nota excluida com sucesso!");
            $request->session()->flash('alert', "success");
        } else {
            $request->session()->flash('flash', "Não foi possível excluir a nota!");
            $request->session()->flash('alert', "danger");
            DB::rollback();
        }

        return redirect()->route('home');
    }
    public function nota(Request $request)
    {
        $nota = Nota::where('id',$request->id)->where('autor', $request->user()->id)->first();
        if($nota){
            $autor = User::find($nota->autor);
            if(Str::contains($request->url(), 'markdown')){
                $nota->nota = Markdown::convertToHtml($nota->nota);
            }
            //dd($request->url());
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
