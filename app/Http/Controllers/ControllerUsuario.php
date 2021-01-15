<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth, Hash};

class ControllerUsuario extends Controller
{
    public function index(Request $request)
    {

        //dd(Auth::check());
        $user = Usuario::create(['email' => 'luis', 'nome' => 'luis', 'senha' => 'luis']);
        Auth::attempt(['email' => 'luis', 'nome' => 'luis', 'senha' => 'luis']);
        dd(Auth::check());
        //return view('login.login');
    }
    public function store(Request $request)
    {
        DB::beginTransaction();

        //$data = $request->except('_token');
        //$data['password'] = Hash::make($data['password']);
        //$user = Usuario::create($data);

        //Auth::login($user);

        $usuario = Usuario::create(['nome' => $request->nome, 'email' => $request->email, 'senha' => $request->senha]);
        Auth::login($usuario);
        DB::commit();

        return redirect()->route('home');

    }
}
