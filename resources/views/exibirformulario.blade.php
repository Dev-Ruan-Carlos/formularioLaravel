@extends('layouts.app')
@section('body')
@php
if($method == 'GET'){
    $dados = Session::get('dados');
}
@endphp
<style>
.exib-feedback {
    overflow: hidden;
    text-overflow: ellipsis;
    height: 110px;
    width: 680px;
    word-break: break-word;
    border: dashed 2px;
}

.middle {
    display: flex;
    width: 600px;
}

.flex, .flex-c, .flex-cr, .flex-r, .flex-w, .flex-jb, .flex-jc, .flex-js, .flex-je, .flex-as, .flex-ac, .flex-ae, .flex-ja, .flex-ab{
    display: flex;
}
.flex-c{flex-direction: column;}
.flex-cr{flex-direction: column-reverse;}
.flex-r{flex-direction: row;}
.flex-w{flex-wrap: wrap;}
.flex-jb{justify-content: space-between;}
.flex-ja{justify-content: space-around;}
.flex-jc{justify-content: center;}
.flex-js{justify-content: flex-start;}
.flex-je{justify-content: flex-end;}
.flex-as{align-items: flex-start;}
.flex-ac{align-items: center;}
.flex-ae{align-items: flex-end;}
.flex-ab{align-items: baseline;}

.text-c{text-align: center;}
.text-r{text-align: right;}
.text-l{text-align: left;}
.text-j{text-align: justify;}

.m-0{margin: 0rem;}
.m-0-important{margin: 0rem !important;}
.m-025{margin: .25rem;}
.m-05{margin: .5rem;}
.m-1{margin: 1rem;}
.m-2{margin: 2rem;}
.m-3{margin: 3rem;}
.m-4{margin: 4rem;}
.m-5{margin: 5rem;}

.mt-0{margin-top: 0rem;}
.mt-025{margin-top: .25rem;}
.mt-05{margin-top: .5rem;}
.mt-1{margin-top: 1rem;}
.mt-2{margin-top: 2rem;}
.mt-3{margin-top: 3rem;}
.mt-4{margin-top: 4rem;}
.mt-5{margin-top: 5rem;}
.mt-6{margin-top: 6rem;}
.mt-7{margin-top: 7rem;}

.mr-0{margin-right: 0rem;}
.mr-05{margin-right: .5rem;}
.mr-1{margin-right: 1rem;}
.mr-2{margin-right: 2rem;}
.mr-3{margin-right: 3rem;}
.mr-4{margin-right: 4rem;}
.mr-5{margin-right: 5rem;}

.mb-0{margin-bottom: 0rem;}
.mb-025{margin-bottom: .25rem;}
.mb-05{margin-bottom: .5rem;}
.mb-1{margin-bottom: 1rem;}
.mb-2{margin-bottom: 2rem;}
.mb-3{margin-bottom: 3rem;}
.mb-4{margin-bottom: 4rem;}
.mb-5{margin-bottom: 5rem;}
.mb-6{margin-bottom: 6rem;}

.ml-0{margin-left: 0rem;}
.ml-05{margin-left: .5rem;}
.ml-1{margin-left: 1rem;}
.ml-2{margin-left: 2rem;}
.ml-3{margin-left: 3rem;}
.ml-4{margin-left: 4rem;}
.ml-5{margin-left: 5rem;}

.mt-auto{margin-top: auto;}

.p-0-important{padding: 0rem !important;}
.p-025{padding: .25rem;}
.p-0{padding: 0rem;}
.p-05{padding: .5rem;}
.p-1{padding: 1rem;}
.p-2{padding: 2rem;}
.p-3{padding: 3rem;}
.p-4{padding: 4rem;}
.p-5{padding: 5rem;}
.p-6{padding: 6rem;}

.pt-0-important{padding-top: 0rem !important;}
.pt-0{padding-top: 0rem;}
.pt-05{padding-top: .5rem;}
.pt-1{padding-top: 1rem;}
.pt-2{padding-top: 2rem;}
.pt-3{padding-top: 3rem;}
.pt-4{padding-top: 4rem;}
.pt-5{padding-top: 5rem;}
.pt-6{padding-top: 6rem;}

.pr-0{padding-right: 0rem;}
.pr-02{padding-right: .2rem;}
.pr-05{padding-right: .5rem;}
.pr-1{padding-right: 1rem;}
.pr-2{padding-right: 2rem;}
.pr-2-important{padding-right: 2rem !important;}
.pr-3{padding-right: 3rem;}
.pr-4{padding-right: 4rem;}
.pr-5{padding-right: 5rem;}

.pb-0-important{padding-bottom: 0rem !important;}
.pb-0{padding-bottom: 0rem;}
.pb-05{padding-bottom: .5rem;}
.pb-1{padding-bottom: 1rem;}
.pb-2{padding-bottom: 2rem;}
.pb-3{padding-bottom: 3rem;}
.pb-4{padding-bottom: 4rem;}
.pb-5{padding-bottom: 5rem;}
.pb-6{padding-bottom: 6rem;}

.pl-0{padding-left: 0rem;}
.pl-02{padding-left: .2rem;}
.pl-05{padding-left: .5rem;}
.pl-1{padding-left: 1rem;}
.pl-15{padding-left: 1.5rem;}
.pl-2{padding-left: 2rem;}
.pl-3{padding-left: 3rem;}
.pl-4{padding-left: 4rem;}
.pl-5{padding-left: 5rem;}

.linha-horizontal {
    border: 0;
    height: 2px;
    background-image: linear-gradient(to right, transparent, rgb(4, 3, 5), transparent);
}

* { 
 font-family: DejaVu Sans !important;
}


</style>
    <form method="post">
        <div style="display: none;">
            @csrf
            @method('POST')
            <H2 class="m-1">Dados da empresa</H2>
                <div class="linha-horizontal"></div>
            <input type="text" class="formcliente black border mr-1 pb-05" id="" placeholder="ex: SGBr Sistemas LTDA" name="razao" maxlength="70" value="{{$dados['razao']}}">
            <input type="text" class="formcliente black border mr-1 pb-05" value="{{$dados['cnpjcpf']}}" name="cnpjcpf" placeholder="CNPJ/CPF" name="cnpjcpf" maxlength="18" oninput="formatarCNPJCPF(this)" oninput="validarCNPJCPF()" required>
            <input type="text" class="formcliente black border mr-1 pb-05" id="" placeholder="Informe seu bairro, rua e número" value="{{$dados['endereco']}}" name="endereco" maxlength="70" required>
            <select id="" class="formcliente border mr-1 pb-05" placeholder="Estados" name="estados">
                <option value="{{$dados['estados']}}" selected></option>
            </select>
            <input type="text" class="formcliente black border mr-1 pb-05" id="" placeholder="Cidade" value="{{$dados['cidade']}}" name="cidade" maxlength="40" required>
            <input class="radio" name="site" value="{{$dados['site']}}" id="radio1" type='radio' checked/>
            <input class="checkbox white" id="checkbox1" name="checkbox1" value="{{$dados['checkbox1']}}" type='radio' checked/>
            <input class="checkbox white" id="checkbox2" name="checkbox2" value="{{$dados['checkbox2']}}" type='radio' checked/>
            <input class="checkbox white" id="checkbox3" name="checkbox3" value="{{$dados['checkbox3']}}" type='radio' checked/>
            <input class="checkbox white" id="checkbox4" name="checkbox4" value="{{$dados['checkbox4']}}" type='radio' checked/>
            <input class="checkbox white" id="checkbox5" name="checkbox5" value="{{$dados['checkbox5']}}" type='radio' checked/>
            <textarea class="comments border p-1" placeholder="Informe seu feedback/sugestão (Opcional)" id="" name="feedback" maxlength="425">{{$dados['feedback']}}</textarea>
        </div>
    <div id="container" class="fundoazul">    
        <div class="box black border">
            <H2 class="m-1">Dados da empresa</H2>
                <div class="linha-horizontal"></div>
                <div class="exib-razao m-05 pl-05 font">   
                    <span>Razão Social: </span>
                    <span><b>{{($dados['razao'])}}</b></span>
                </div>
                <div class="exib-cnpjcpf m-05 pl-05 font">
                    <span>CNPJ/CPF: </span>
                    <span><b>{{($dados['cnpjcpf'])}}</b></span>   
                </div>
                <div class="exib-endereco m-05 pl-05 font">
                    <span>Endereço: </span>
                    <span><b>{{($dados['endereco'])}}</b></span>
                </div>
                <div class="exib-estado m-05 pl-05 font">
                    <span>UF: </span>
                        <span><b>{{($dados['estados'])}}</b></span>
                </div>
                <div class="exib-cidade m-05 pl-05 font">
                    <span>Cidade: </span>
                    <span><b>{{($dados['cidade'])}}</b></span>
                </div>
            <h2 class="m-1">Dados da pesquisa</h2>
                <div class="linha-horizontal"></div>
                <div class="exib-site m-05 pl-05 font">
                    <span>Já teve contato com algum site?</span>
                    <br>
                    <span class=""><b>{{($dados['site'])}}</b></span> 
                </div>
                <div class="exib-checkbox1 m-05 pl-05 font">
                    <span>1 - Sua avaliação referente ao MeuSG !</span>
                    <br>
                    <span><b>{{($dados['checkbox1'])}}</b></span>
                </div>
                <div class="exib-checkbox2 m-05 pl-05 font">
                    <span>2 - Sua avaliação referente ao seu site !</span>
                    <br>
                    <span><b>{{($dados['checkbox2'])}}</b></span>
                </div>
                <div class="exib-checkbox3 m-05 pl-05 font">
                    <span>3 - Sua avaliação referente ao Pedido de venda Online !</span>
                    <br>
                    <span><b>{{($dados['checkbox3'])}}</b></span>
                </div>
                <div class="exib-checkbox4 m-05 pl-05 font">
                    <span>4 - Sua avaliação referente ao suporte prestado pelo MeuSG !</span>
                    <br>
                    <span><b>{{($dados['checkbox4'])}}</b></span>
                </div>
                <div class="exib-checkbox5 m-05 pl-05 font">
                    <span>5 - Sua avaliação referente ao E-commerce!</span>
                    <br>
                    <span><b>{{($dados['checkbox5'])}}</b></span>
                </div>
                <div class="exib-feedback m-05 pl-05 font">
                    <span>Sugestão/Feedback: </span>
                    <span><b>{{($dados['feedback'])}}</b></span>
                </div>
                @if($method == 'GET')
                <div id="" class="end">                 
                    <button class="button white border font p-05 mr-05">Imprimir / Print</button>
                    <a href="{{route('login')}}" class=" button white border font p-05">Sair / Exit</a>
                </div>
                @endif
        </div>
    </div> 
</form>
@endsection      