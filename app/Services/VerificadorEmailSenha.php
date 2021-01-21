<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VerificadorEmailSenha{

    public function validar(Request $request)
    {
        $rules = array(
            'email' => 'required|unique:users',
            'password' => 'required|min:5|same:password_confirmation',
            'password_confirmation' => 'required'
        );
        $messages = array(
                'email.unique' => "Email já cadastrado",
                'password.same' => 'Confirme a senha novamente',
                'password.min' => 'Senha muito curta!'
            );
        return Validator::make( $request->except('_token'), $rules, $messages );
    }

}
