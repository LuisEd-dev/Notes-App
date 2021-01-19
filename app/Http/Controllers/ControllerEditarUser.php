<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\{DB, Validator, Storage};

class ControllerEditarUser extends Controller
{
    public function acao_editar(Request $request)
    {

        if($request->password){
            $rules = array(
                'password' => 'required|min:5|same:password_confirmation',
                'password_confirmation' => 'required'
            );
            $messages = array(
                    'password.same' => 'Confirme a senha novamente',
                    'password.min' => 'Senha muito curta!'
                );
            $validator = Validator::make( $request->except('_token'), $rules, $messages );

            if ( $validator->fails() )
            {
                $request->session()->flash('flash', $validator->errors()->first());
                return redirect()->back();
            } else{

                try{
                    DB::beginTransaction();
                    $user = User::find(auth()->user()->id);
                    $user->name = $request->name;
                    $user->password = Hash::make($request->password);
                    $user->save();
                    DB::commit();
                    $request->session()->flash('flash', "Usuário alterado com sucesso!");
                    $request->session()->flash('alert', "success");
                } catch(Exception $ex){
                    $request->session()->flash('flash', `Falha ao alterar dados do usuário!\n${$ex}`);
                    $request->session()->flash('alert', `danger`);
                }
                finally{
                    return redirect()->back();
                }

            }

        } else {
            try{
                DB::beginTransaction();
                $user = User::find(auth()->user()->id);
                $user->name = $request->name;
                $user->save();
                DB::commit();
                $request->session()->flash('flash', "Usuário alterado com sucesso!");
                $request->session()->flash('alert', "success");
            } catch(Exception $ex){
                $request->session()->flash('flash', `Falha ao alterar dados do usuário!\n${$ex}`);
                $request->session()->flash('alert', `danger`);
            }
            finally{
                return redirect()->back();
            }
        }
    }
}
