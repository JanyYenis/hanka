<?php

namespace App\Http\Controllers\Empleados;

use App\Http\Controllers\Controller;
use App\Models\Empleado\Cargo;
use ErrorException;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CargoController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.empleados.cargos.index');
    }

    public function listado(Request $request)
    {
        $cargos = Cargo::with(
            'infoEstado',
            'empleados.usuario'
        );

        return DataTables::eloquent($cargos)
            ->addColumn("estado", function ($model) {
                $info['concepto'] = $model?->infoEstado;
                return view("sistema.estado", $info);
            })
            ->addColumn("action", "dashboard/empleados/cargos/columnas/acciones")
            ->rawColumns(["action", "estado"])
            ->make(true);
    }

    public function store(Request $request)
    {
        $datos = $request->all();
        $cargo = Cargo::create($datos);
        if (!$cargo) {
            throw new ErrorException("No se pudo crear la cargo.");
        }

        return [
            "estado"  => "success",
            "mensaje" => "Se creo el registro correctamente."
        ];
    }

    public function buscarCargos(Request $request)
    {
        $nombre = $request->get("busqueda");
        $filtro = "%$nombre%";
        $empleado = $request->input('empleado') ?? '';
        if (!$empleado) {
            // throw new ErrorException("Por favor, especifica un rol.");
        }

        $cargos = Cargo::selectRaw('id, nombre as text')
            ->where('estado', Cargo::ACTIVO)
            ->whereRaw("LOWER(nombre) LIKE LOWER(?)", $filtro)
            ->get();
        
        return response()->json($cargos);

    }

    public function editar(/*Cargo*/ $cargo)
    {
        $cargo = Cargo::find($cargo);
        $info["cargo"] = $cargo;

        $respuesta["estado"] = "success";
        $respuesta["mensaje"] = "Datos cargados correctamente";
        $respuesta['html'] = view("dashboard.empleados.cargos.editar", $info)->render();
    
        return response()->json($respuesta);
    }

    public function update(Request $request, /*Cargo*/ $cargo)
    {
        $datos = $request->all();
        $cargo = Cargo::find($cargo);
        $actualizo = $cargo->update($datos);
        if (!$actualizo) {
            throw new ErrorException("No se ha actualizado la información.");
        }

        return [
            "estado" => "success",
            "mensaje" => "Se ha actualizado la información correctamente."
        ];
    }
}
