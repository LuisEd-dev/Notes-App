<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth, Hash};

class ControllerUsuario extends Controller
{
    public function index(Request $request)
    {
        return view('login.login');
    }
    public function store(Request $request)
    {
        DB::beginTransaction();

        //$data = $request->except('_token');
        //$data['password'] = Hash::make($data['password']);
        //$user = Usuario::create($data);

        //Auth::login($user);

        $usuario = User::create(['name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->senha)]);
        Auth::login($usuario);
        DB::commit();

        return redirect()->route('home');
    }
    public function entrar(Request $request)
    {
        Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        return redirect()->route('home');

    }
}
