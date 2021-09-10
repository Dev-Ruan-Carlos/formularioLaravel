<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Adapter\CPDF;
use Dompdf\Dompdf;
use PDF;

class FormularioController extends Controller
{
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
        return redirect()->route('resultadoresumo.get')->with('dados', $dados);
    }
}
