@extends("sistema.export.layouts-email")

@section('contenido')
<tr>
    <td class="esd-structure es-p40t es-p35r es-p35l" esd-custom-block-id="7685" align="left">
        <table width="100%" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td class="esd-container-frame" width="530" valign="top" align="center">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td class="esd-block-text es-m-txt-l es-p15t" align="left">
                                        <h3>Hola {{$usuario?->nombre}}.</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="esd-block-text es-p15t es-p10b" align="left">
                                        <p style="font-size: 16px; color: #777777; font-family: 'open sans', 'helvetica neue', helvetica, arial, sans-serif;">Para conpletar con tu registro en <strong>HANKA</strong>&nbsp;te invitamos a crear tu contraseña, para&nbsp;que puedas continuar con tu experiencia <strong>HANKA </strong>y disfrutasr de muchos veneficios como ofertas,&nbsp;promociones, descuentos y mucho mas que tenemos para tí.</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>
<tr>
    <td class="esd-structure es-p30t es-p35b es-p35r es-p35l" esd-custom-block-id="7685" align="left">
        <table width="100%" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td class="esd-container-frame" width="530" valign="top" align="center">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td class="esd-block-button es-p30t es-p15b" align="center"><span class="es-button-border" style="background: #ed8e20 none repeat scroll 0% 0%;"><a href="{{route('usuarios.crear-clave', ['usuario' => $usuario?->id])}}" class="es-button es-button-1670166250942" target="_blank" style="font-weight: normal; border-width: 15px 30px; background: #ed8e20 none repeat scroll 0% 0%; border-color: #ed8e20; color: #ffffff; font-size: 18px;">Crear Contraseña</a></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>
@endsection