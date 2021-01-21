<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Hash};
use App\Services\VerificadorEmailSenha;

class ControllerEditarUser extends Controller
{
    public function acao_editar(Request $request)
    {
        if ($request->password) {

            $validator = new VerificadorEmailSenha;

            if ($validator->validar($request)->fails() && $validator->validar($request)->errors()->messages()['password'] != 0 ) {
                $request->session()->flash('flash', (string) $validator->validar($request)->errors()->messages()['password'][0]);
                $request->session()->flash('alert', 'danger');
                return redirect()->back();
            } else {
                try {
                    DB::beginTransaction();
                    $user = User::find(auth()->user()->id);
                    $user->name = $request->name;
                    $user->password = Hash::make($request->password);
                    $user->save();
                    DB::commit();
                    $request->session()->flash('flash', "Usuário alterado com sucesso!");
                    $request->session()->flash('alert', "success");
                } catch (Exception $ex) {
                    $request->session()->flash('flash', `Falha ao alterar dados do usuário!\n${$ex}`);
                    $request->session()->flash('alert', `danger`);
                } finally {
                    return redirect()->back();
                }
            }
        } else {
            try {
                DB::beginTransaction();
                $user = User::find(auth()->user()->id);
                $user->name = $request->name;
                $user->save();
                DB::commit();
                $request->session()->flash('flash', "Usuário alterado com sucesso!");
                $request->session()->flash('alert', "success");
            } catch (Exception $ex) {
                $request->session()->flash('flash', `Falha ao alterar dados do usuário!\n${$ex}`);
                $request->session()->flash('alert', `danger`);
            } finally {
                return redirect()->back();
            }
        }
    }
}
