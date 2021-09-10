<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CadastroController extends Controller
{
    public function index()
    {
        return view('cadastro');
    }

    public function gravar(Request $request){
        if(User::where('email', $request->get('emailCadastro'))->orWhere('nome', $request->get('loginCadastro'))->count() > 0 ){
            return redirect()->back()->withInput()->withErrors(['cadastro' => 'Usuário/E-mail já cadastrado, tente novamente!']);
        }
        $user = new User();
        $user->nome = $request->get('loginCadastro');
        $user->email = $request->get('emailCadastro');
        $user->password = bcrypt($request->get('password')); 
        $user->save();
            return redirect()->route('login.get');
    }
}    
