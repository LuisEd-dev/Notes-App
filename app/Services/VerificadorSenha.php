<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VerificadorSenha{

    public function validar(Request $request)
    {
        $rules = array(
            'password' => 'required|min:5|same:password_confirmation',
            'password_confirmation' => 'required'
        );
        $messages = array(
                'password.same' => 'Confirme a senha novamente',
                'password.min' => 'Senha muito curta!'
            );
        return Validator::make( $request->except('_token'), $rules, $messages );
    }

}
