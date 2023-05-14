<?php

namespace App\Http\Controllers\usuario;

use App\Exceptions\ErrorException;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use App\Models\pais\Pais;
use App\Models\Telefono;
use App\Models\usuario\Usuario;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {   
        // if (!can(Usuario::PERMISO_LISTADO)) {
        //     throw new ErrorException("No tienes permisos para acceder a esta sección.");
        // }
        
        $tipos = Usuario::darTipoGenero();
        $info["tiposGeneros"] = $tipos?->conceptosActivos;
        $tipos = Usuario::darTipoDocumento();
        $info["tiposDocumentos"] = $tipos?->conceptosActivos;
        return view('dashboard.usuarios.index', $info); 
    }

    public function listado(Request $request)
    {
        // if (!can(Usuario::PERMISO_LISTADO)) {
        //     throw new ErrorException("No tienes permisos para acceder a esta sección.");
        // }

        $usuarios = Usuario::with('ciudad');

        return DataTables::eloquent($usuarios)
            ->addColumn("nombreCompleto", function ($model) {
                return $model?->nombre." ".$model?->apellido ?? "N/A";
            })
            ->addColumn("estado", function ($model) {
                return $model?->nombre." ".$model?->apellido ?? "N/A";
            })
            ->addColumn("genero", function ($model) {
                return $model?->infoGenero?->nombre ?? "N/A";
            })
            ->addColumn("tipo_documento", function ($model) {
                return $model?->infoDocumento?->nombre_corto ?? "N/A";
            })
            ->addColumn("id_ciudad", function ($model) {
                return $model?->ciudad?->nombre ?? "N/A";
            })
            ->addColumn("estado", function ($model) {
                $info['concepto'] = $model?->infoEstado;
                return view("sistema.estado", $info);
            })
            ->addColumn("action", "dashboard/usuarios/columnas/acciones")
            ->rawColumns(["action"])
            ->make(true);
    }

    public function editar(/*Usuario*/ $usuario)
    {
        $usuario = Usuario::with('ciudad.pais')->find($usuario);
        $info["usuario"] = $usuario;
        $tipos = Usuario::darTipoGenero();
        $info["tiposGeneros"] = $tipos?->conceptosActivos;
        $tipos = Usuario::darTipoDocumento();
        $info["tiposDocumentos"] = $tipos?->conceptosActivos;

        $respuesta["estado"] = "success";
        $respuesta["mensaje"] = "Datos cargados correctamente";
        $respuesta['html'] = view("dashboard.usuarios.editar", $info)->render();
    
        return response()->json($respuesta);
    }

    public function update(UsuarioRequest $request, /*Usuario*/ $usuario)
    {
        $datos = $request->all();
        
        if ($request?->input('password')) {
            $datos['password'] = password_hash($request?->input('password'), PASSWORD_DEFAULT, ['cost' =>10]); //encriptacion
        }

        $usuario = Usuario::find($usuario);
        $actualizo = $usuario->update($datos);
        if (!$actualizo) {
            throw new ErrorException("No se ha actualizado la información.");
        }

        return [
            "estado" => "success",
            "mensaje" => "Se ha actualizado la información correctamente.",
            "redirecion" => $request?->input('password') ? true : false
        ];
    }

    public function guardarContacto(Request $request)
    {
        $datos = $request->all();
        $usuario = auth()->user();
        $datos['telefonable_type'] = Usuario::darNombreTabla();
        $datos['telefonable_id'] = $usuario?->id;
        $nuevo = $usuario->crearTelefono($datos);
        if (!$nuevo) {
            throw new ErrorException("No se pudo guardar la telefono.");
        }

        if ($request->input('principal')) {
            Telefono::where('principal', Telefono::PRINCIPAL)
                ->where('id', '!=', $nuevo?->id)
                ->update(['principal' => Telefono::ADICIONAL]);
        }

        return [
            "estado" => "success",
            "mensaje" => "Se ha actualizado la información correctamente."
        ];
    }

    public function store(UsuarioRequest $request)
    {
        $datos = $request->all();
        $usuario = Usuario::create($datos);
        if (!$usuario) {
            throw new ErrorException("No se pudo generar el usuario.");
        }

        $rol = Role::firstWhere('name', Usuario::ROL_CLIENTE);
        $usuario->syncRoles($rol?->id);
        
        return [
            "estado" => "success",
            "mensaje" => "se ha registrado correctamente.",
        ];
    }

    public function buscarPaises(Request $request)
    {
        $nombre = $request->get("busqueda");
        $filtro = "%$nombre%";
        $paises = Pais::select("id", "nombre as text")
            ->where("estado", Pais::ACTIVO)
            ->whereRaw("LOWER(nombre) LIKE LOWER(?)", $filtro)
            ->get();
        return response()->json($paises);
    }

    public function crearClave($usuario)
    {
        $info['usuario'] = Usuario::find($usuario);
        return view('dashboard.usuarios.crear-clave', $info);
    }

    public function buscarUsuarios(Request $request)
    {
        $nombre = $request->get("busqueda");
        $filtro = "%$nombre%";
        $usuarios = Usuario::select("id", "nombre as text")
            ->where("estado", Usuario::ACTIVO)
            ->whereRaw("LOWER(nombre) LIKE LOWER(?)", $filtro)
            ->get();
        return response()->json($usuarios);
    }

    public function delete(Request $request, $usuario)
    {
        $usuario = Usuario::find($usuario);
        $eliminar = $usuario->update(['estado' => Usuario::ELIMINADO]);
        if (!$eliminar) {
            throw new ErrorException("Ha ocurrido un error al eliminar la venta.");
        }

        return [
            'estado' => 'success',
            'mensaje' => 'Se elimino correctamente.'
        ];
    }

    public function miPerfil(Request $request)
    {
        $usuario = auth()->user();
        $usuario->load(
            'ciudad.pais',
            'telefonos.infoEstado',
            'telefonos.infoTipo',
        );
        $info["usuario"] = $usuario;
        $tipos = Usuario::darTipoGenero();
        $info["tiposGeneros"] = $tipos?->conceptosActivos;
        $tipos = Usuario::darTipoDocumento();
        $info["tiposDocumentos"] = $tipos?->conceptosActivos;
        $tiposTelefono = Telefono::darTipo();
        $info["tiposTelefonos"] = $tiposTelefono?->conceptosActivos;

        return view('tienda.usuarios.index', $info);
    }

    public function configuracionNotificacion(Request $request)
    {
        return view('tienda.usuarios.configuracion');
    }

    public function editarTelefono(/*Telefono*/ $telefono)
    {
        $telefono = Telefono::with('infoTipo')->find($telefono);
        $tiposTelefono = Telefono::darTipo();
        $info["tiposTelefonos"] = $tiposTelefono?->conceptosActivos;
        $info["telefono"] = $telefono;

        $respuesta["estado"] = "success";
        $respuesta["mensaje"] = "Datos cargados correctamente";
        $respuesta['html'] = view("tienda.usuarios.pasos.telefono.editar-telefono", $info)->render();
    
        return response()->json($respuesta);
    }

    public function actualizarTelefono(Request $request, /* Telefono */ $telefono)
    {
        $telefono = Telefono::find($telefono);
        if ($request->input('cambiarPrincipal')) {
            $actualizar = $telefono->update(['principal' => Telefono::PRINCIPAL]);
            if (!$actualizar) {
                throw new ErrorException("No se pudo actualizar el telefono.");
            }

            Telefono::where('principal', Telefono::PRINCIPAL)
                ->where('id', '!=', $telefono?->id)
                ->update(['principal' => Telefono::ADICIONAL]);

            return [
                "estado" => "success",
                "mensaje" => "Se ha actualizado la información correctamente."
            ];
        }

        $datos = $request->all();
        $datos['principal'] = $request->input('principal') ?? Telefono::ADICIONAL;
        $datos['whatsapp'] = $request->input('whatsapp') ?? Telefono::NO_TIENE_WHATSAPP;
        $actualizar = $telefono->update($datos);
        if (!$actualizar) {
            throw new ErrorException("No se pudo actualizar el telefono.");
        }

        if ($request->input('principal') == Telefono::PRINCIPAL) {
            Telefono::where('principal', Telefono::PRINCIPAL)
                ->where('id', '!=', $telefono?->id)
                ->update(['principal' => Telefono::ADICIONAL]);
        }

        return [
            "estado" => "success",
            "mensaje" => "Se ha actualizado la información correctamente."
        ];
    }

    public function refrescarSeccionTelefono(Request $request)
    {
        $usuario = auth()->user();
        $usuario->load(
            'telefonos.infoEstado',
            'telefonos.infoTipo'
        );
        
        $info['telefonos'] = $usuario?->telefonos;

        $respuesta["estado"] = "success";
        $respuesta["mensaje"] = "Datos cargados correctamente";
        $respuesta['html'] = view("tienda.usuarios.pasos.telefono.ver-telefonos", $info)->render();
    
        return response()->json($respuesta);
    }

    public function miPerfilAdmin(Request $request)
    {
        $usuario = auth()->user();
        $usuario->load(
            'ciudad.pais',
            'telefonos.infoEstado',
            'telefonos.infoTipo',
        );
        $info["usuario"] = $usuario;
        $tipos = Usuario::darTipoGenero();
        $info["tiposGeneros"] = $tipos?->conceptosActivos;
        $tipos = Usuario::darTipoDocumento();
        $info["tiposDocumentos"] = $tipos?->conceptosActivos;
        $tiposTelefono = Telefono::darTipo();
        $info["tiposTelefonos"] = $tiposTelefono?->conceptosActivos;

        return view('dashboard.usuarios.perfil', $info);
    }
}
