<?php

namespace App\Models\pqrs;

use App\Classes\Models\Model;
use App\Models\usuario\Usuario;

class Pqrs extends Model
{
    // Estados
    const TC_ESTADO = 'TC_ESTADO_PQRS';
    const ENVIADO = 1;
    const VISTO = 2;
    const RESPONDIDO = 3;

    const TC_TIPO = 'TC_TIPO_PQRS';
    const PETICION = 1;
    const QUEJA = 2;
    const RECLAMO = 3;
    const SUGERENCIA = 4;

    const TC_TIPO_NOTIFICACION = 'TC_TIPO_NOTIFICACION_PQRS';
    const EMAIL = 1;
    const CHAT = 2;
    const MESANJE_TEXT = 3;

    const TC_TIPO_DOCUMENTO = "TC_TIPO_DOCUMENTO_USUARIO";

    protected $table = "pqrs";

    /** Campos que pueden ser usados en create/update. */
    protected $fillable = [
        'nombre',
        'tipo_documento',
        'documento',
        'tipo_solicitud',
        'email',
        'descripcion',
        'fecha_radicada',
        'estado',
        'fecha_respuesta',
        'descripcion_respuesta',
        'id_usuario_radica',
        'id_usuario_responde',
        'medio_notificacion'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario_radica', 'id');
    }

    public static function darEstado($infoTipoConcepto = true)
    {
        return darConceptos(self::TC_ESTADO, $infoTipoConcepto);
    }

    public function infoEstado()
    {
        return darInfoConcepto($this, self::TC_ESTADO, 'estado')->selectRaw('conceptos.*');
    }
    
    public function infoTipo()
    {
        return darInfoConcepto($this, self::TC_TIPO, 'tipo_solicitud')->selectRaw('conceptos.*');
    }

    public static function darTipos($infoTipoConcepto = true)
    {
        return darConceptos(self::TC_TIPO, $infoTipoConcepto);
    }

    public function infoDocumento()
    {
        return darInfoConcepto($this, self::TC_TIPO_DOCUMENTO, 'tipo_documento')->selectRaw('conceptos.*');
    }

    public function infoTipoNotificacion()
    {
        return darInfoConcepto($this, self::TC_TIPO_NOTIFICACION, 'medio_notificacion')->selectRaw('conceptos.*');
    }

    public static function darTiposNotificaciones($infoTipoConcepto = true)
    {
        return darConceptos(self::TC_TIPO_NOTIFICACION, $infoTipoConcepto);
    }
}
