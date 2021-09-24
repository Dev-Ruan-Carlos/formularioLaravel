@extends('layouts.app')
@section('body')
    <div id="cadastro" class="flex-jc flex-ac fundoazul">
        <form method="post" action="{{route('cadastro.gravar')}}"> 
            @csrf
            @method('POST')
            <h1>Cadastro</h1>
                @error('cadastro')
                    <span class="error">{{$message}}</span>
                @enderror  
                <div class="form-input"> 
                    <label for="login">Seu login:</label>
                    <input id="loginCadastro" name="loginCadastro" required="required" type="text" placeholder="Login" autofocus/>
                </div>
                <div class="form-input"> 
                    <label for="email">Seu e-mail:</label>
                    <input id="emailCadastro" name="emailCadastro" required="required" type="email" placeholder="contato@contato.com"/> 
                </div>
                <div class="form-input"> 
                    <label for="password">Sua senha:</label>
                    <input id="senhaCadastro" name="password" required="required" type="password" placeholder="ex: 1234"/>
                </div> 
                <div class="blue">                   
                    Já tem conta?
                    <a href="{{route('login.get')}}"> Ir para Login </a>
                    <button type="submit" class="button" style="margin-left: 50px">Cadastrar</button>
                </div>
        </form>
    </div>
@endsection