<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\VerificadorSenha;
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
        $validator = new VerificadorSenha;
        if ($validator->validar($request)->fails()){
            $request->session()->flash('flash', $validator->validar($request)->errors()->first());
            $request->session()->flash('alert', 'danger');
            return redirect()->back();
        } else{
            DB::beginTransaction();
            $usuario = User::create(['name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->password)]);
            Auth::login($usuario);
            DB::commit();
            $request->session()->flash('flash', 'Conta criada com sucesso!');
            return redirect()->route('home');
        }
    }
    public function entrar(Request $request)
    {
        Auth::attempt(['email' => $request->email, 'password' => $request->password]);
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
