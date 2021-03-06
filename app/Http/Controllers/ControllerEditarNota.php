<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerEditarNota extends Controller
{
    public function acao_editar(Request $request)
    {
        try{
            DB::beginTransaction();
            $nota = Nota::where('id', $request->id)->where('autor', $request->user()->id)->first();
            $nota->titulo = $request->titulo;
            if($request->nota){
                $nota->nota = $request->nota;
            }
            $nota->alteracao = now();
            $nota->save();
            DB::commit();
            $request->session()->flash('flash', "Nota alterada com sucesso!");
            $request->session()->flash('alert', "success");
        } catch(Exception $ex){
            $request->session()->flash('flash', `Falha ao alterar dados da nota!\n${$ex}`);
            $request->session()->flash('alert', `danger`);
        } finally{
            return redirect()->route('home');
        }

    }
}
