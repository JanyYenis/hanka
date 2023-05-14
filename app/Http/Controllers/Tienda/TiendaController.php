<?php

namespace App\Http\Controllers\Tienda;

use App\Exceptions\ErrorException;
use App\Http\Controllers\Controller;
use App\Models\Producto\Producto;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TiendaController extends Controller
{
    public function index(Request $request)
    {
        $info['productos'] = Producto::with('imagenPrincipal', 'comentarios')
            ->where('estado', Producto::ACTIVO)
            ->get();
        
        return view('tienda.index', $info);
    }

    public function listado(Request $request)
    {
        $pagina = $request->input('pagina') ?? 1;
        $cantidad = $request->input("cantidad_pagina", 6);
        $productos = Producto::with('imagenPrincipal')
            ->where('estado', Producto::ACTIVO)
            ->where('cantidad', '!=', 0);

        $this->filtroListado($request, $productos);

        $info['ultimaPagina'] = round(count($productos->get()) / $cantidad);
        $productos = $productos->paginate($cantidad, ["*"], "productos", $pagina);
        $info["productos"] = $productos;
        $info['paginaActual'] = $pagina;

        return [
            "estado" => "success",
            "html" => view("tienda.ver-productos", $info)->render()
        ];
    }

    public function filtroListado(Request $request, $productos)
    {
        $valor = $request->input('valor') ?? null;
        if ($valor) {
            if ($valor == 2) {
                $productos = $productos->whereNotNull('oferta');
            } elseif ($valor == 3) {
                $productos = $productos->whereNotNull('descuento');
            }
        }

        return $productos;
    }
}
