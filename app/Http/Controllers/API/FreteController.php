<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cotacao;
use Illuminate\Http\Request;

class FreteController extends Controller
{
    public function cotacoes(Request $request)
    {
        $cepOrigem = str_replace('-', '', $request->input('cep_origem'));
        $cepDestino = str_replace('-', '', $request->input('cep_destino'));
        $peso = $request->input('peso');
        $altura = $request->input('altura');
        $largura = $request->input('largura');
        $comprimento = $request->input('comprimento');
        $valorDeclarado = $request->input('valor_declarado');

        $cotacoes = Cotacao::with('servico.transportadora')
            ->where('cep_inicio', $cepOrigem)
            ->where('cep_final', $cepDestino)
            ->where('peso_final', '>=', $peso)
            ->get();

        $retorno = [
            'cotacao' => []
        ];

        foreach ($cotacoes as $cotacao) {
            $retorno['cotacao'][] = [
                'servico' => $cotacao->servico->nm_servico,
                'transportadora' => $cotacao->servico->transportadora->nm_transportadora,
                'prazo' => $cotacao->prazo_entrega . ' dias úteis',
                'valor_frete' => $cotacao->valor
            ];
        }

        return response()->json($retorno);
    }
}
