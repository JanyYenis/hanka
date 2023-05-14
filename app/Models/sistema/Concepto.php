<?php

namespace App\Models\sistema;

use App\Classes\Models\Model;

class Concepto extends Model
{
    const ACTIVO = 1;
    const INACTIVO = 0;

    protected $table = "conceptos";

    const TODAS_DEPENDENCIAS = -1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'id_tipo',
        'codigo',
        'nombre',
        'estado',
        'color',
        'icono'
    ];

    /**
     * Get the user that owns the phone.
     */
    public function tipoConcepto()
    {
        return $this->belongsTo(TipoConcepto::class, 'id_tipo', 'id');
    }

    /**
     * Función que retorna el ID del concepto usando el nombre dado.
     * @param string $nombre Nombre del concepto.
     * @return int Retorna el ID del concepto de la red social.
     */
    // public static function obtenerCodigoPorNombre($nombre, $concepto, $conConceptoID = false)
    // {
    //     $tipoConcepto = null;
    //     $nombre = \mb_strtolower($nombre);

    //     $infoConcepto = darConceptos($concepto, true);
    //     $conceptos = $infoConcepto->conceptos;

    //     foreach ($conceptos as $concepto) {
    //         $concepto->nombre = \mb_strtolower($concepto->nombre);
    //         if ($nombre == $concepto->nombre) {
    //             if ($conConceptoID) {
    //                 $tipoConcepto = [
    //                     "codigo" => $concepto->codigo,
    //                     "tipo" => $infoConcepto->id
    //                 ];
    //                 break;
    //             }
    //             $tipoConcepto = $concepto->codigo;
    //             break;
    //         }
    //     }
    //     return $tipoConcepto;
    // }
}