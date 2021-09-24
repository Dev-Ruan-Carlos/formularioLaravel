<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function entrar (Request $request){
        $credentials = [
            'nome' => $request->post('login'),
            'password' => $request->post('senha'),
        ];
        if(Auth::attempt($credentials)){
            $avaliacoes = [
              'Péssimo - ★', 'Ruim - ★★', 'Neutro - ★★★', 'Bom - ★★★★', 'Ótimo - ★★★★★'  
            ];
            return view ('formulario', compact('avaliacoes'));
        }else{
            return redirect()->back()->withInput()->withErrors(['login' => 'Login/Senha incorreto, peço que tente novamente !']);
        }

        // $user = User::where('cnpjcpf', $credentials['cnpjcpf'])->first();
        // if(!$user)
        //     return redirect()->back()->withInput()->withErrors(['login' => 'Conta não encontrada']);

        // if (Auth::attempt($credentials)) {
        //     if (Auth::user()->ativo != '1') {
        //         Auth::logout();
        // dd($request->all());
        return view ('formulario');
    }

    public function index(){
        return view('welcome');
    }
}