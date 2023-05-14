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
                                        <p style="font-size: 16px; color: #777777; font-family: 'open sans', 'helvetica neue', helvetica, arial, sans-serif;">Su pedido se a realizado correctamente. Le recordamos que para que se realice el envio de su pedido debe realizar el pago del pedido.<br>Te adjuntamos la factura de tu pedido en este correo.</p>
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
                    <td class="esd-container-frame" width="530" valign="top" align="left">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td class="esd-block-button es-p30t es-p15b" align="left">
                                        <p style="font-size: 16px; color: #777777; font-family: 'open sans', 'helvetica neue', helvetica, arial, sans-serif;">Gracias por confiar en <strong>Hanka S.A</strong>.</p>    
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
@endsection