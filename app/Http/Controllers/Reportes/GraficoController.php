<?php

namespace App\Http\Controllers\Reportes;

use App\Http\Controllers\Controller;
use App\Models\Comentario\Comentario;
use App\Models\Pedido\Pedido;
use App\Models\pqrs\Pqrs;
use Illuminate\Http\Request;

class GraficoController extends Controller
{
    const ANO_INICIO = 2021;

    public function index()
    {   
        $info = $this->darDatos();

        return view("dashboard.graficos.index", $info);
    }

    public function darDatos($ano = null)
    {
        $anoInicio = self::ANO_INICIO;
        $anoActual = $ano ?? date("Y");
        $anos=[];
        for ($anoInicio; $anoInicio <= $anoActual; $anoInicio++) { 
            array_push($anos, $anoInicio);
        }

        $fechaInicio = "{$anoActual}-01-01";
        $fechaFin = "{$anoActual}-12-31";
        $pqrs = Pqrs::where('fecha_radicada', '>=', $fechaInicio)
            ->where('fecha_radicada', '<=', $fechaFin)
            ->get();

        $comentarios = Comentario::where('fecha', '>=', $fechaInicio)
            ->where('fecha', '<=', $fechaFin)
            ->where('estado', Comentario::ACTIVO)
            ->get();

        $pedidos = Pedido::where('fecha_pedido', '>=', $fechaInicio)
            ->where('fecha_pedido', '<=', $fechaFin)
            ->where('estado', '!=', Pedido::ELIMINADO)
            ->get();

        $info['pqrs'] = [
            'peticiones'  => $pqrs->where('tipo_solicitud', Pqrs::PETICION)->count(),
            'quejas'      => $pqrs->where('tipo_solicitud', Pqrs::QUEJA)->count(),
            'reclamos'    => $pqrs->where('tipo_solicitud', Pqrs::RECLAMO)->count(),
            'sugerencias' => $pqrs->where('tipo_solicitud', Pqrs::SUGERENCIA)->count()
        ];

        $info['comentarios'] = [
            'unaEstrella'     => $comentarios->where('estrellas', Comentario::UNA_ESTRELLA)->count(),
            'dosEstrellas'    => $comentarios->where('estrellas', Comentario::DOS_ESTRELLA)->count(),
            'tresEstrellas'   => $comentarios->where('estrellas', Comentario::TRES_ESTRELLA)->count(),
            'cuatroEstrellas' => $comentarios->where('estrellas', Comentario::CUATRO_ESTRELLA)->count(),
            'cincoEstrellas'  => $comentarios->where('estrellas', Comentario::CINCO_ESTRELLA)->count()
        ];

        $info['pedidos'] = [
            'enero'      => $pedidos->where('fecha_pedido', '>=', "{$anoActual}-01-01")->where('fecha_pedido', '<=', "{$anoActual}-01-31")->count(),
            'febrero'    => $pedidos->where('fecha_pedido', '>=', "{$anoActual}-02-01")->where('fecha_pedido', '<=', "{$anoActual}-02-29")->count(),
            'marzo'      => $pedidos->where('fecha_pedido', '>=', "{$anoActual}-03-01")->where('fecha_pedido', '<=', "{$anoActual}-03-31")->count(),
            'abril'      => $pedidos->where('fecha_pedido', '>=', "{$anoActual}-04-01")->where('fecha_pedido', '<=', "{$anoActual}-04-30")->count(),
            'mayo'       => $pedidos->where('fecha_pedido', '>=', "{$anoActual}-05-01")->where('fecha_pedido', '<=', "{$anoActual}-05-31")->count(),
            'junio'      => $pedidos->where('fecha_pedido', '>=', "{$anoActual}-06-01")->where('fecha_pedido', '<=', "{$anoActual}-06-30")->count(),
            'julio'      => $pedidos->where('fecha_pedido', '>=', "{$anoActual}-07-01")->where('fecha_pedido', '<=', "{$anoActual}-07-31")->count(),
            'agosto'     => $pedidos->where('fecha_pedido', '>=', "{$anoActual}-08-01")->where('fecha_pedido', '<=', "{$anoActual}-08-31")->count(),
            'septiembre' => $pedidos->where('fecha_pedido', '>=', "{$anoActual}-09-01")->where('fecha_pedido', '<=', "{$anoActual}-09-30")->count(),
            'octubre'    => $pedidos->where('fecha_pedido', '>=', "{$anoActual}-10-01")->where('fecha_pedido', '<=', "{$anoActual}-10-31")->count(),
            'noviembre'  => $pedidos->where('fecha_pedido', '>=', "{$anoActual}-11-01")->where('fecha_pedido', '<=', "{$anoActual}-11-30")->count(),
            'diciembre'  => $pedidos->where('fecha_pedido', '>=', "{$anoActual}-12-01")->where('fecha_pedido', '<=', "{$anoActual}-12-31")->count()
        ];
        $info['anoActual'] = $anoActual;
        $info['anos'] = $anos;

        return $info;
    }

    public function refrescar(int $ano)
    {
        $info = $this->darDatos($ano);

        return [
            'estado'      => 'success',
            'mensaje'     => 'Se a cargado correctamente',
            'pqrs'        => $info['pqrs'],
            'pedidos'     => $info['pedidos'],
            'comentarios' => $info['comentarios'],
            'html'        => view("dashboard.graficos.graficos")->render()
        ];
    }
}
