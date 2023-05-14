<?php

namespace App\Http\Controllers;

use App\Models\categoria\Categoria;
use App\Models\Producto\Producto;
use App\Models\sede\Sede;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function index()
    {
        $info['categorias'] = Categoria::where('principal', Categoria::PRINCIPAL)->get();
        $info['destacados'] = Producto::with('comentarios', 'imagenPrincipal')
            ->where('estado', Producto::ACTIVO)
            ->orderBy('calificacion', 'desc')
            ->limit(3)->get();
        
        $sede = Sede::with('telefonoPrincipal')->firstWhere('principal', Sede::PRINCIPAL);
        session(['sede' => $sede]);
        return view('index', $info);
    }

    public function detalle(Request $request, /* Producto */ $producto)
    {
        $producto = Producto::with(
            'imagenPrincipal',
            'marca',
            'subcategoria.categoria',
        )->find($producto);
        $info['producto'] = $producto;

        return view('tienda.detalle', $info);
    }
    
    public function prueba()
    {
        return view('pruebas.index');
    }

    public function admin(Request $request)
    {
        return view('dashboard.index');
    }
}
