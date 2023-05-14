<?php

namespace App\Http\Controllers\Favoritos;

use App\Exceptions\ErrorException;
use App\Http\Controllers\Controller;
use App\Models\Favorito\Favorito;
use App\Models\Producto\Producto;
use Illuminate\Http\Request;

class FavoritoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        return view('tienda.favoritos.index');
    }

    public function store(Request $request, /* Producto */ $producto)
    {
        $usuario = auth()->user();
        $validar = Favorito::where([
            'estado'      => Favorito::ACTIVO,
            'id_usuario'  => $usuario?->id,
            'id_producto' => $producto
        ])->exists();
        if ($validar) {
            throw new ErrorException("Este producto ya se encuentra agregado en favoritos.");
        }

        $datos['id_producto'] = $producto;
        $datos['id_usuario'] = $usuario?->id;
        $favorito = Favorito::create($datos);
        if (!$favorito) {
            throw new ErrorException("No se pudo agregar a favoritos.");
        }
        return [
            "estado" => "success",
            "mensaje" => "se ha registrado correctamente.",
        ];
    }

    public function listado(Request $request)
    {
        $usuario = auth()->user();
        $pagina = $request->input('pagina') ?? 1;
        $cantidad = $request->input("cantidad_pagina", 6);
        $favoritos = Favorito::with('producto.imagenPrincipal', 'usuario')
            ->where('estado', Favorito::ACTIVO)
            ->where('id_usuario', $usuario?->id);

        $info['ultimaPagina'] = round(count($favoritos->get()) / $cantidad);
        $favoritos = $favoritos->paginate($cantidad, ["*"], "favoritos", $pagina);
        $info["favoritos"] = $favoritos;
        $info['paginaActual'] = $pagina;

        return [
            "estado" => "success",
            "html" => view("tienda.favoritos.ver-favoritos", $info)->render()
        ];
    }
}