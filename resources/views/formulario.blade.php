@extends('layouts.app')
@section('body')
    {{-- cliente --}}           
        <form method="post" action="{{route('resultado')}}">
            @csrf
            @method('POST')
                <div class="fundoazul" id="fundoazul">
                    <div class="flex-jc" id="">
                        <div class="flex-c pr-1" style="position: relative">
                            <label for="" class="white mt-1 mb-1">CNPJ/CPF:</label>
                            <div class="flex-ac">
                                <input type="text" class="formcliente black border pb-05" onblur="buscarCNPJ()" onclick="buscarCNPJ()" value="{{ old('cnpjcpf') }}" name="cnpjcpf" id="cnpjcpf" maxlength="18" placeholder="Informe seu CNPJ/CPF" oninput="formatarCNPJCPF(this)" oninput="validarCNPJCPF()" required autofocus>
                                <div class="input-button" data-tooltip="Consultar dados do CNPJ !" data-tooltip-location="top">
                                    <i class="fas fa-search" id="pesquisar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex-c">
                            <label for="" class="white mt-1 mb-1">Cep:</label>
                            <input type="text" class="formcliente black border mr-1 pb-05" value="" name="cep" id="cep" placeholder="Exemplo (00000-000)" oninput="formatarCEP(this)" maxlength="9" required>
                        </div>
                    </div>
                    <div class="flex-jc">
                        <div class="flex-c">
                            <label for="" class="white mt-1 mb-1">Rua:</label>
                            <input type="text" class="formcliente black border mr-1 pb-05" id="rua" name="rua" maxlength="30" placeholder="Rua: " required>
                        </div>
                        <div class="flex-c">
                            <label for="" class="white mt-1 mb-1">Bairro:</label>
                            <input type="text" class="formcliente black border mr-1 pb-05" id="bairro" name="bairro" maxlength="30" placeholder="Bairro: " required>
                        </div>    
                    </div>
                    <div class="flex-jc">
                        <div class="flex-c">
                            <label for="" class="white mt-1 mb-1">Estados:</label>
                            <select id="estados" class="formcliente border mr-1 pb-05 black" placeholder="Estados" name="estados">
                                <option class="p-1 black" value="null" name="Estados...">Estados..</option>
                                <option class="p-1 black" value="12">Acre (AC)</option>
                                <option class="p-1 black" value="27">Alagoas (AL)</option>
                                <option class="p-1 black" value="16">Amapá (AP)</option>
                                <option class="p-1 black" value="13">Amazonas (AM)</option>
                                <option class="p-1 black" value="29">Bahia (BA)</option>
                                <option class="p-1 black" value="23">Ceará (CE)</option>
                                <option class="p-1 black" value="53">Distrito Federal (DF)</option>
                                <option class="p-1 black" value="32">Espírito Santo (ES)</option>
                                <option class="p-1 black" value="52">Goiás (GO)</option>
                                <option class="p-1 black" value="21">Maranhão (MA)</option>
                                <option class="p-1 black" value="51">Mato Grosso (MT)</option>
                                <option class="p-1 black" value="50">Mato Grosso do Sul (MS)</option>
                                <option class="p-1 black" value="31">Minas Gerais (MG)</option>
                                <option class="p-1 black" value="15">Pará (PA)</option>
                                <option class="p-1 black" value="25">Paraíba (PB)</option>
                                <option class="p-1 black" value="41">Paraná (PR)</option>
                                <option class="p-1 black" value="26">Pernambuco (PE)</option>
                                <option class="p-1 black" value="22">Piauí (PI)</option>
                                <option class="p-1 black" value="33">Rio de Janeiro (RJ)</option>
                                <option class="p-1 black" value="24">Rio Grande do Norte (RN)</option>
                                <option class="p-1 black" value="43">Rio Grande do Sul (RS)</option>
                                <option class="p-1 black" value="11">Rondônia (RO)</option>
                                <option class="p-1 black" value="14">Roraima (RR)</option>
                                <option class="p-1 black" value="42">Santa Catarina (SC)</option>
                                <option class="p-1 black" value="35">São Paulo (SP)</option>
                                <option class="p-1 black" value="28">Sergipe (SE)</option>
                                <option class="p-1 black" value="17">Tocantins (TO)</option>
                            </select>
                            {{-- informar as UFs --}}
                        </div>
                        <div class="flex-c">
                            <label for="" class="white mt-1 mb-1">Cidade:</label>
                            <input type="text" class="formcliente black border mr-1 pb-05" id="cidade" name="cidade" maxlength="40" placeholder="Cidade: " required>
                        </div>
                    </div>
                        <div class="white flex-jc m-1">
                            <h3>Já teve contato com algum site?</h3>
                        </div>
                    <div class="flex-jc white">
                        <div class="form-group white">
                            <input class="radio" name="site" value="Sim" id="radio1" type='radio'/>
                            <label for="radio1" class="">SIM</label>
                            <input class="radio ml-2" name="site" value="Não" id="radio1" type='radio' checked />
                            <label for="radio1" class="">NÃO</label>
                        </div>
                    </div>  
                    <div class="white flex-jc m-1">
                        <h3>1 - A baixo informe sua avaliação referente ao MeuSG !</h3>
                    </div> 
                    <div class="flex-jc white">
                        @foreach ($avaliacoes as $key => $avaliacao)
                            <div class="form-group white mr-05">
                                <input class="checkbox white" id="checkbox{{$key}}a" name="checkbox1" value="{{$avaliacao}}" type='radio' @if($key == 2) checked @endif/>
                                <label for="checkbox{{$key}}a">{{$avaliacao}}</label>
                            </div> 
                        @endforeach 
                    </div>
                    <div class="white flex-jc m-1">
                        <h3>2 - A baixo informe sua avaliação referente ao seu site !</h3>
                    </div>
                    <div class="flex-jc white">
                        @foreach ($avaliacoes as $key => $avaliacao)
                            <div class="form-group white mr-05">
                                <input class="checkbox white" id="checkbox{{$key}}b" name="checkbox2" value="{{$avaliacao}}" type='radio' @if($key == 2) checked @endif/>
                                <label for="checkbox{{$key}}b">{{$avaliacao}}</label>
                            </div> 
                        @endforeach
                    </div>
                    <div class="white flex-jc m-1">
                        <h3>3 - A baixo informe sua avaliação referente ao Pedido de venda Online !</h3>
                    </div> 
                    <div class="flex-jc white">
                        @foreach ($avaliacoes as $key => $avaliacao)
                            <div class="form-group white mr-05">
                                <input class="checkbox white" id="checkbox{{$key}}c" name="checkbox3" value="{{$avaliacao}}" type='radio' @if($key == 2) checked @endif/>
                                <label for="checkbox{{$key}}c">{{$avaliacao}}</label>
                            </div> 
                        @endforeach
                    </div>
                    <div class="white flex-jc m-1">
                        <h3>4 - A baixo informe sua avaliação referente ao suporte prestado pelo MeuSG !</h3>
                    </div> 
                    <div class="flex-jc white">
                        @foreach ($avaliacoes as $key => $avaliacao)
                            <div class="form-group white mr-05">
                                <input class="checkbox white" id="checkbox{{$key}}d" name="checkbox4" value="{{$avaliacao}}" type='radio' @if($key == 2) checked @endif/>
                                <label for="checkbox{{$key}}d">{{$avaliacao}}</label>
                            </div> 
                        @endforeach
                    </div>
                    <div class="white flex-jc m-1">
                        <h3>5 - A baixo informe sua avaliação referente ao E-commerce!</h3>
                    </div> 
                    <div class="flex-jc white">
                        @foreach ($avaliacoes as $key => $avaliacao)
                            <div class="form-group white mr-05">
                                <input class="checkbox white" id="checkbox{{$key}}e" name="checkbox5" value="{{$avaliacao}}" type='radio' @if($key == 2) checked @endif/>
                                <label for="checkbox{{$key}}e">{{$avaliacao}}</label>
                            </div> 
                        @endforeach
                    </div>
                    <div class="white flex-jc m-1">
                        <h3>A baixo informe seu feedback/sugestão referente ao MeuSG !</h3>
                    </div> 
                    <div class="feedback flex-jc p-2">
                        <textarea class="comments border p-1" placeholder="Informe seu feedback/sugestão. Permitido até 330 caracteres (Opcional)" id="" name="feedback" maxlength="330"></textarea>
                    </div>
                    <div id="enviar" class="flex-jc pb-2">                 
                        <button type="submit" class="button enviar">Enviar</button>
                    </div>
                </div>
            </div>
        </form>

<script>

    var cep = document.getElementById('cep');
    var rua = document.getElementById('rua');
    var bairro = document.getElementById('bairro');
    var cidade = document.getElementById('cidade');
    var estados = document.getElementById('estados');
    var cnpjcpf = document.getElementById('cnpjcpf');

    // Adicionamos o evento onclick ao botão com o ID "pesquisar"
    function buscarCNPJ(){

        // Aqui recuperamos o cnpj preenchido do campo e usamos uma expressão regular para limpar da string tudo aquilo que for diferente de números
        cnpjcpf = $('#cnpjcpf').val().replace(/[^0-9]/g, '');
        
        // Fazemos uma verificação simples do cnpj confirmando se ele tem 14 caracteres
        if(cnpjcpf.length == 14) {
        
            // Aqui rodamos o ajax para a url da API concatenando o número do CNPJ na url
            $.ajax({
            url:'https://www.receitaws.com.br/v1/cnpj/' + cnpjcpf,
            method:'GET',
            dataType: 'jsonp', // Em requisições AJAX para outro domínio é necessário usar o formato "jsonp" que é o único aceito pelos navegadores por questão de segurança
            complete: function(xhr){
            
                // Aqui recuperamos o json retornado
                response = xhr.responseJSON;
                
                // Na documentação desta API tem esse campo status que retorna "OK" caso a consulta tenha sido efetuada com sucesso
                if(response.status == 'OK') {
                
                // Agora preenchemos os campos com os valores retornados
                $('#cep').val(response.cep);
                // Aqui exibimos uma mensagem caso tenha ocorrido algum erro
                } else {
                    alert(response.message); // Neste caso estamos imprimindo a mensagem que a própria API retorna
                }
            }
            });
        
        }
    };
     
    function formatarCNPJCPF(obj) {
        var startPos = obj.selectionStart;
        if(startPos == obj.value.length)
            startPos = -1;
            
        if(startPos < 0){
            obj.value = obj.value.replace(/[^0-9]/g,'');
            obj.value = obj.value.trim();
            if (obj.value.length > 14)
                obj.value = obj.value.slice(0, 14);
            if (obj.value.length > 0) {
                if (obj.value.length <= 11)
                    obj.value = obj.value.replace(/(\d{3})(\d)/, '$1.$2').replace(/(\d{3})(\d)/, '$1.$2').replace(/(\d{3})(\d{1,2})$/, '$1-$2')
                else
                    obj.value = obj.value.replace(/^(\d{2})(\d)/, '$1.$2').replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3').replace(/\.(\d{3})(\d)/, '.$1/$2').replace(/(\d{4})(\d)/, '$1-$2')
            }
          }
          if(startPos > 0){
              if(obj.value[startPos + 1] == '/' || obj.value[startPos + 1] == '.' || obj.value[startPos + 1] == '-'){
                  startPos = ++startPos;
              }
              obj.value = obj.value.replace(/[^0-9]/g,'');
              obj.value = obj.value.trim();
              if (obj.value.length > 14)
                  obj.value = obj.value.slice(0, 14);
              if (obj.value.length > 0) {
                  if (obj.value.length <= 11)
                      obj.value = obj.value.replace(/(\d{3})(\d)/, '$1.$2').replace(/(\d{3})(\d)/, '$1.$2').replace(/(\d{3})(\d{1,2})$/, '$1-$2')
                  else
                      obj.value = obj.value.replace(/^(\d{2})(\d)/, '$1.$2').replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3').replace(/\.(\d{3})(\d)/, '.$1/$2').replace(/(\d{4})(\d)/, '$1-$2')
              }
              obj.setSelectionRange(startPos, startPos);
          }
      }
     
      function validarCNPJCPF(val) {
      if (val.length == 14) {
          var cpf = val.trim();
      
          cpf = cpf.replace(/\./g, '');
          cpf = cpf.replace('-', '');
          cpf = cpf.split('');
          
          var v1 = 0;
          var v2 = 0;
          var aux = false;
          
          for (var i = 1; cpf.length > i; i++) {
              if (cpf[i - 1] != cpf[i]) {
                  aux = true;   
              }
          } 
          
          if (aux == false) {
              return false; 
          } 
          
          for (var i = 0, p = 10; (cpf.length - 2) > i; i++, p--) {
              v1 += cpf[i] * p; 
          } 
          
          v1 = ((v1 * 10) % 11);
          
          if (v1 == 10) {
              v1 = 0; 
          }
          
          if (v1 != cpf[9]) {
              return false; 
          } 
          
          for (var i = 0, p = 11; (cpf.length - 1) > i; i++, p--) {
              v2 += cpf[i] * p; 
          } 
          
          v2 = ((v2 * 10) % 11);
          
          if (v2 == 10) {
              v2 = 0; 
          }
          
          if (v2 != cpf[10]) {
              return false; 
          } else {   
              return true; 
          }
      } else if (val.length == 18) {
          var cnpj = val.trim();
          
          cnpj = cnpj.replace(/\./g, '');
          cnpj = cnpj.replace('-', '');
          cnpj = cnpj.replace('/', ''); 
          cnpj = cnpj.split(''); 
          
          var v1 = 0;
          var v2 = 0;
          var aux = false;
          
          for (var i = 1; cnpj.length > i; i++) { 
              if (cnpj[i - 1] != cnpj[i]) {  
                  aux = true;   
              } 
          } 
          
          if (aux == false) {  
              return false; 
          }
          
          for (var i = 0, p1 = 5, p2 = 13; (cnpj.length - 2) > i; i++, p1--, p2--) {
              if (p1 >= 2) {  
                  v1 += cnpj[i] * p1;  
              } else {  
                  v1 += cnpj[i] * p2;  
              } 
          } 
          
          v1 = (v1 % 11);
          
          if (v1 < 2) { 
              v1 = 0; 
          } else { 
              v1 = (11 - v1); 
          } 
     
          if (v1 != cnpj[12]) {  
              return false; 
          } 
          
          for (var i = 0, p1 = 6, p2 = 14; (cnpj.length - 1) > i; i++, p1--, p2--) { 
              if (p1 >= 2) {  
                  v2 += cnpj[i] * p1;  
              } else {   
                  v2 += cnpj[i] * p2; 
              } 
          }
          
          v2 = (v2 % 11); 
          
          if (v2 < 2) {  
              v2 = 0;
          } else { 
              v2 = (11 - v2); 
          } 
          
          if (v2 != cnpj[13]) {   
              return false; 
          } else {  
              return true; 
          }
      } else {
          return false;
      }
     }   

//  AJAX consulta CEP

function formatarCEP(obj) {
    var startPos = obj.selectionStart;
    if(startPos == obj.value.length)
        startPos = -1;
        
    if(startPos < 0){
        obj.value = obj.value.replace(/[^0-9]/g,'');
        obj.value = obj.value.trim();
        if (obj.value.length > 8)
            obj.value = obj.value.slice(0, 8);    
        if (obj.value.length > 0) {
            obj.value = obj.value.replace(/(\d{5})(\d)/, '$1-$2');
        }
    }
    if(startPos > 0){
        obj.value = obj.value.replace(/[^0-9]/g,'');
        obj.value = obj.value.trim();
        if (obj.value.length > 8)
            obj.value = obj.value.slice(0, 8);    
        if (obj.value.length > 0) {
            obj.value = obj.value.replace(/(\d{5})(\d)/, '$1-$2');
        }
        obj.setSelectionRange(startPos, startPos);
    }
}

$(document).ready(function() {

function limpa_formulário_cep() {
    // Limpa valores do formulário de cep.
    // $("#rua").val("");
    // $("#bairro").val("");
    // $("#cidade").val("");
    // $("#estados").val("");

    rua.value = '';
    bairro.value = '';
    cidade.value = '';
    estados.value = '';
}

//Quando o campo cep perde o foco.
    
$("#cep").blur(function() {
    //Nova variável "cep" somente com dígitos.
    var numcep = cep.value.replace(/[^0-9]/g, '');

    //Verifica se campo cep possui valor informado.
    if (numcep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(numcep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            // $("#rua").val("...");
            // $("#bairro").val("...");
            // $("#cidade").val("...");
            // $("#estados").val("...");

            rua.value = 'Carregando/Loading...';
            bairro.value = 'Carregando/Loading...';
            cidade.value = 'Carregando/Loading...';
            estados.value = 'Carregando/Loading...';

            //Consulta o webservice viacep.com.br/
            $.getJSON("https://viacep.com.br/ws/"+ numcep +"/json/?callback=?", function(dados) {
                if (!("erro" in dados)) {
                    //Atualiza os campos com os valores da consulta.
                    // $("#rua").val(dados.logradouro);
                    // $("#bairro").val(dados.bairro);
                    // $("#cidade").val(dados.localidade);
                    // $("#estados").val(dados.uf);

                    rua.value = dados.logradouro;
                    bairro.value = dados.bairro;
                    cidade.value = dados.localidade;
                    estados.value = dados.ibge.substr(0,2);
                } //end if.
                else {
                    //CEP pesquisado não foi encontrado.
                    limpa_formulário_cep();
                    alert("CEP não encontrado.");
                }
            });
        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
});
});
</script>
@endsection