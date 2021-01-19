<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
                $user = User::where('id', $request->user()->id)->first();
                $user->password = $request->password;
                $user->save();
                //dd(Auth::attempt(['email' => $request->email, 'password' => $request->password]));
                return redirect()->back();
            }

        }
    }
}
