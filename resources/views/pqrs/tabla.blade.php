<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
    
 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

</head>
<body>
        <div class="container">
            <main>
                <center>
                    <table id="tabla" border="1" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th class="text-center all">Nombre</th>
                                <th class="text-center all">Documento</th>
                                <th class="text-center all">Tipo Documento</th>
                                <th class="text-center all">Tipo Solicitud</th>
                                <th class="text-center all">Email</th>
                                <th class="text-center all">Estado</th>
                                <th class="text-center all">Acciones</th>
                                <th class="text-center none">Fecha Radicada</th>
                                <th class="text-center none">Fecha Respuesta</th>
                                <th class="text-center none">Usuario</th>
                                <th class="text-center none">Empleado</th>
                                <th class="text-center none">Notificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr>
                                <td>Nombre</td>
                                <td>Documento</td>
                                <td>Tipo Documento</td>
                                <td>Tipo Solicitud</td>
                                <td>Email</td>
                                <td>Estado</td>
                                <td>Acciones</td>
                                <td>Fecha Radicada</td>
                                <td>Fecha Respuesta</td>
                                <td>Usuario</td>
                                <td>Empleado</td>
                                <td>Notificacion</td>
                            </tr>
                            <tr>
                                <td>Nombre</td>
                                <td>Documento</td>
                                <td>Tipo Documento</td>
                                <td>Tipo Solicitud</td>
                                <td>Email</td>
                                <td>Estado</td>
                                <td>Acciones</td>
                                <td>Fecha Radicada</td>
                                <td>Fecha Respuesta</td>
                                <td>Usuario</td>
                                <td>Empleado</td>
                                <td>Notificacion</td>
                            </tr> --}}
                        </tbody>
                    </table>
                </center> 
            </main>
            </div>
</body>
</html>
{{-- <script>
    $(document).ready(function() {
    $('#tabla').DataTable();
} );
</script> --}}
<script type="text/javascript">
    $(function () {

      var table = $('#tabla').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('pqrs.listado') }}",
          columns: [
              {data: 'nombre', name: 'nombre'},
              {data: 'documento', name: 'documento'},
              {data: 'tipo_documento', name: 'tipo_documento'},
              {data: 'tipo_solicitud', name: 'tipo_solicitud'},
              {data: 'email', name: 'email'},
              {data: 'estado', name: 'estado'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
              {data: 'fecha_radicada', name: 'fecha_radicada'},
              {data: 'fecha_respuesta', name: 'fecha_respuesta'},
              {data: 'id_usuario_radica', name: 'id_usuario_radica'},
              {data: 'id_usuario_responde', name: 'id_usuario_responde'},
              {data: 'medio_notificacion', name: 'medio_notificacion'},
          ]
      });
    });
</script>