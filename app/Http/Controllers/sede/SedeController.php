<?php

namespace App\Http\Controllers\sede;

use App\Exceptions\ErrorException;
use App\Http\Controllers\Controller;
use App\Models\pais\Pais;
use App\Models\sede\Sede;
use App\Models\Telefono;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SedeController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.sedes.index');
    }

    public function listado(Request $request)
    {
        $sedes = Sede::with(
            'ciudad',
            'telefono'
        );

        return DataTables::eloquent($sedes)
            ->addColumn("id_ciudad", function ($model) {
                return $model?->ciudad?->nombre ?? "N/A";
            })
            ->addColumn("estado", function ($model) {
                $info['concepto'] = $model?->infoEstado;
                return view("sistema.estado", $info);
            })
            ->addColumn("tel", function ($model) {
                return $model?->telefono?->numero ?? 'N/A';
            })
            ->addColumn("action", function($model){
                $info['model'] = $model;
                $info['mostrarPrincipal'] = $model?->principal ? false : true;
                return view("dashboard/sedes/columnas/acciones", $info);
            })
            ->rawColumns(["action", "estado"])
            ->make(true);
    }

    public function store(Request $request)
    {
        $datos = $request->all();
        $sede = Sede::create($datos);
        if (!$sede) {
            throw new ErrorException("No se pudo crear la sede.");
        }

        if ($request?->input('numero')) {
            $datos['telefonable_type'] = Sede::darNombreTabla();
            $datos['telefonable_id'] = $sede?->id;
            $datos['principal'] = Telefono::PRINCIPAL;
            $telefono = $sede->crearTelefono($datos);
            if (!$telefono) {
                throw new ErrorException("No se pudo guardar la telefono.");
            }
        }

        if ($request->input('principal')) {
            Sede::where('principal', Sede::PRINCIPAL)
                ->where('id', '!=', $sede?->id)
                ->update(['principal' => Sede::NO_PRINCIPAL]);
        }

        return [
            "estado"  => "success",
            "mensaje" => "Se creo el registro correctamente."
        ];
    }

    public function editar(/*Sede*/ $sede)
    {
        $sede = Sede::with(
            'ciudad.pais',
            'telefono'
            )->find($sede);
        $info["sede"] = $sede;
        $info['telefono'] = $sede?->telefono;

        $respuesta["estado"] = "success";
        $respuesta["mensaje"] = "Datos cargados correctamente";
        $respuesta['html'] = view("dashboard.sedes.editar", $info)->render();
    
        return response()->json($respuesta);
    }

    public function update(Request $request, /*Sede*/ $sede)
    {
        $datos = $request->all();
        $principal = $request->input('cambiarPrincipal') ?? false;
        $sede = Sede::find($sede);
        
        if ($principal) {
            $actualizo = $sede->update(['principal' => Sede::PRINCIPAL]);
            if (!$actualizo) {
                throw new ErrorException("Ha ocurrido un error al pasar la sede como principal.");
            }
            Sede::where('principal', Sede::PRINCIPAL)
                ->where('id', '!=', $sede?->id)
                ->update(['principal' => Sede::NO_PRINCIPAL]);
        } else {
            $datos['principal'] = $request->input('principal') ?? Sede::NO_PRINCIPAL;
            $actualizo = $sede->update($datos);
            if (!$actualizo) {
                throw new ErrorException("No se ha actualizado la información.");
            }
        }

        $telefono = $sede?->telefono;
        if ($telefono) {
            $telefono = $telefono->update($datos);
            if (!$telefono) {
                throw new ErrorException("No se pudo guardar la telefono.");
            }
        } else {
            $datos['telefonable_type'] = Sede::darNombreTabla();
            $datos['telefonable_id'] = $sede?->id;
            $datos['principal'] = Telefono::PRINCIPAL;
            $telefono = $sede->crearTelefono($datos);
            if (!$telefono) {
                throw new ErrorException("No se pudo guardar la telefono.");
            }
        }

        return [
            "estado" => "success",
            "mensaje" => "Se ha actualizado la información correctamente."
        ];
    }
}
