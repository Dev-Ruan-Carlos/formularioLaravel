<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Adapter\CPDF;
use Dompdf\Dompdf;
use PDF;

class FormularioController extends Controller
{
    public function index(){
        $avaliacoes = [
            'Péssimo - ★', 'Ruim - ★★', 'Neutro - ★★★', 'Bom - ★★★★', 'Ótimo - ★★★★★'  
        ];
        return view ('formulario', compact('avaliacoes'));
    }

    public function resultadoresumo(Request $request){      
        $dados = $request->all();
        $method = $request->getMethod();
        if($method == "GET"){
            return view('exibirformulario', compact('dados', 'method'));
        }
        $pdf            =       PDF::loadView('exibirformulario', compact('dados','method'));
        return $pdf->setPaper('A4', 'portrait')->stream('formulario.pdf');
    }

    public function resultado(Request $request){    
        $dados = $request->all();  
        $dados['uf'] = $this->consultaUF($request->get('estados'));
        return redirect()->route('resultadoresumo.get')->with('dados', $dados);
    }

    public function consultaUF($uf){
        $estados = [
            12 => "Acre (AC)",
            27 => "Alagoas (AL)",
            16 => "Amapá (AP)",
            13 => "Amazonas (AM)",
            29 => "Bahia (BA)",
            23 => "Ceará (CE)",
            53 => "Distrito Federal (DF)",
            32 => "Espírito Santo (ES)",
            52 => "Goiás (GO)",
            21 => "Maranhão (MA)",
            51 => "Mato Grosso (MT)",
            50 => "Mato Grosso do Sul (MS)",
            31 => "Minas Gerais (MG)",
            15 => "Pará (PA)",
            25 => "Paraíba (PB)",
            41 => "Paraná (PR)",
            26 => "Pernambuco (PE)",
            22 => "Piauí (PI)",
            33 => "Rio de Janeiro (RJ)",
            24 => "Rio Grande do Norte (RN)",
            43 => "Rio Grande do Sul (RS)",
            11 => "Rondônia (RO)",
            14 => "Roraima (RR)",
            42 => "Santa Catarina (SC)",
            35 => "São Paulo (SP)",
            28 => "Sergipe (SE)",
            17 => "Tocantins (TO)"
        ];

        return $estados[$uf];
    }
}
