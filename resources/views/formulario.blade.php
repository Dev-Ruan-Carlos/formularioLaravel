@extends('layouts.app')
@section('body')
    {{-- cliente --}}           
        <form method="post" action="{{route('resultado')}}">
            @csrf
            @method('POST')
                <div class="fundoazul" id="fundoazul">
                    <div class="flex-jc" id="">
                        <div class="flex-c">
                            <label for="" class="white mt-1 mb-1">Razão Social:</label>
                            <input type="text" class="formcliente black border mr-1 pb-05" id="" placeholder="ex: SGBr Sistemas LTDA" name="razao" maxlength="70" required>
                        </div>
                        <div class="flex-c">
                            <label for="" class="white mt-1 mb-1">CNPJ/CPF:</label>
                            <input type="text" class="formcliente black border mr-1 pb-05" value="" name="cnpjcpf" placeholder="CNPJ/CPF" name="cnpjcpf" maxlength="18" oninput="formatarCNPJCPF(this)" oninput="validarCNPJCPF()" required>
                        </div>
                    </div>
                    <div class="flex-jc">
                        <div class="flex-c">
                            <label for="" class="white mt-1 mb-1">Endereço:</label>
                            <input type="text" class="formcliente black border mr-1 pb-05" id="" placeholder="Informe seu bairro, rua e número" name="endereco" maxlength="70" required>
                        </div>
                    </div>
                    <div class="flex-jc">
                        <div class="flex-c">
                            <label for="" class="white mt-1 mb-1">Estados:</label>
                            <select id="" class="formcliente border mr-1 pb-05" placeholder="Estados" name="estados">
                                <option class="p-1" value="null" name="Estados...">Estados..</option>
                                <option class="p-1" value="Acre (AC)" name="estado">Acre (AC)</option>
                                <option class="p-1" value="Alagoas (AL)" name="estado">Alagoas (AL)</option>
                                <option class="p-1" value="Amapá (AP)" name="estado">Amapá (AP)</option>
                                <option class="p-1" value="Amazonas (AM)" name="estado">Amazonas (AM)</option>
                                <option class="p-1" value="Bahia (BA)" name="estado">Bahia (BA)</option>
                                <option class="p-1" value="Ceará (CE)" name="estado">Ceará (CE)</option>
                                <option class="p-1" value="Distrito Federal (DF)" name="estado">Distrito Federal (DF)</option>
                                <option class="p-1" value="Espírito Santo (ES)" name="estado">Espírito Santo (ES)</option>
                                <option class="p-1" value="Goiás (GO)" name="estado">Goiás (GO)</option>
                                <option class="p-1" value="Maranhão (MA)" name="estado">Maranhão (MA)</option>
                                <option class="p-1" value="Mato Grosso (MT)" name="estado">Mato Grosso (MT)</option>
                                <option class="p-1" value="Mato Grosso do Sul (MS)" name="estado">Mato Grosso do Sul (MS)</option>
                                <option class="p-1" value="Minas Gerais (MG)" name="estado">Minas Gerais (MG)</option>
                                <option class="p-1" value="Pará (PA)" name="estado">Pará (PA)</option>
                                <option class="p-1" value="Paraíba (PB)" name="estado">Paraíba (PB)</option>
                                <option class="p-1" value="Paraná (PR)" name="estado">Paraná (PR)</option>
                                <option class="p-1" value="Pernambuco (PE)" name="estado">Pernambuco (PE)</option>
                                <option class="p-1" value="Piauí (PI)" name="estado">Piauí (PI)</option>
                                <option class="p-1" value="Rio de Janeiro (RJ)" name="estado">Rio de Janeiro (RJ)</option>
                                <option class="p-1" value="Rio Grande do Norte (RN)" name="estado">Rio Grande do Norte (RN)</option>
                                <option class="p-1" value="Rio Grande do Sul (RS)" name="estado">Rio Grande do Sul (RS)</option>
                                <option class="p-1" value="Rondônia (RO)" name="estado">Rondônia (RO)</option>
                                <option class="p-1" value="Roraima (RR)" name="estado">Roraima (RR)</option>
                                <option class="p-1" value="Santa Catarina (SC)" name="estado">Santa Catarina (SC)</option>
                                <option class="p-1" value="São Paulo (SP)" name="estado">São Paulo (SP)</option>
                                <option class="p-1" value="Sergipe (SE)" name="estado">Sergipe (SE)</option>
                                <option class="p-1" value="Tocantins (TO)" name="estado">Tocantins (TO)</option>
                            </select>
                            {{-- informar as UFs --}}
                        </div>
                        <div class="flex-c">
                            <label for="" class="white mt-1 mb-1">Cidade:</label>
                            <input type="text" class="formcliente black border mr-1 pb-05" id="" placeholder="Cidade" name="cidade" maxlength="40" required>
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
                        <textarea class="comments border p-1" placeholder="Informe seu feedback/sugestão (Opcional)" id="" name="feedback" maxlength="425"></textarea>
                    </div>
                    <div id="enviar" class="flex-jc pb-2">                 
                        <button type="submit" class="button enviar">Enviar</button>
                    </div>
                </div>
            </div>
        </form>
<script>
        window.addEventListener('load', function (){  
     })
     
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
     </script>
@endsection