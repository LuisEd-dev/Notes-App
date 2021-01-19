<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth, Hash};

class ControllerUsuario extends Controller
{
    public function index(Request $request)
    {
        return view('login.login', compact('request'));
    }
    public function store(Request $request)
    {
        DB::beginTransaction();

        $usuario = User::create(['name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->senha)]);
        Auth::login($usuario);
        DB::commit();
        $request->session()->flash('flash', 'Conta criada com sucesso!');
        return redirect()->route('home');
    }
    public function entrar(Request $request)
    {

        Auth::attempt(['email' => $request->email, 'password' => $request->senha]);
        if(Auth::check()){
            return redirect()->route('home');
        } else {
            $request->session()->flash('flash', 'Dados de login incorretos!');
            return redirect()->route('login');
        }

    }
    public function editar(Request $request)
    {
        return view('login.editar', compact('request'));
    }
}
