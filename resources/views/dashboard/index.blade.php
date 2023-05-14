@extends("dashboard.layouts.index")

@section('contenido')
<div class="card-header border-0 pt-5">
    <h1 class="mt-4">Dashboard</h1>
</div><br><br>
<div class="card-body pt-2 pb-0 mt-n3">
    <main>
        <div class="col-lg-12">
            <select name="" id="select2" class="form-control">
                <option value="1">jany</option>
                <option value="2">laura</option>
                <option value="3">yinsi</option>
                <option value="4">lorena</option>
                <option value="5">ana</option>
                <option value="6">susy</option>
                <option value="7">hellen</option>
            </select>
        </div><br>
        <div class="col-lg-12">
            <select name="" id="selectpicker" class="form-control">
                <option value="1">jany</option>
                <option value="2">laura</option>
                <option value="3">yinsi</option>
                <option value="4">lorena</option>
                <option value="5">ana</option>
                <option value="6">susy</option>
                <option value="7">hellen</option>
            </select>
        </div><br>
        <div class="col-lg-12">
            <button type="button" class="btn btn-success" id="swal">Abrir Swal</button>
        </div><br>
        <div class="col-lg-12">
            <label for="">Tel</label>
            <input type="text" class="form-control tel">
        </div><br>
        <div class="col-lg-12">
            <label for="">Fecha</label>
            <input type="text" class="form-control fecha">
        </div><br>
        <div class="form-group row">
            <label class="col-form-label col-lg-12">Fecha y Hora</label>
            <div class="col-lg-12">
              <input type="text" class="form-control form-control-solid datetimepicker-input" id="datetimepicker" placeholder="Select date & time"  data-toggle="datetimepicker" data-target="#datetimepicker"/>
            </div>
        </div><br>
        <div class="form-group row">
            <label class="col-form-label col-lg-12">Hora</label>
            <div class="col-lg-12">
                <input class="form-control" id="timepicker" readonly placeholder="Select time" type="text"/>
            </div>
        </div><br>
        <div class="col-lg-12">
            <label for="">Touchspin </label>
            <input type="text" class="form-control Touchspin">
        </div><br>
        <div class="col-lg-12">
            <textarea name="" id="summernote" cols="30" rows="10"></textarea>
        </div><br>
        <div class="col-lg-12">
            <form action="" method="post" enctype="multipart/form-data">
                <button type="button" class="btn btn-primary" id="archivo">Adjuntar Archivo</button>
            </form>
        </div><br>
        <div class="image-input image-input-outline" id="kt_image_4" style="background-image: url({{asset('img/blank.png')}})">
            <div class="image-input-wrapper kt-avatar_holder" id="avatar" style="background-image: url('https://leonelaarguello.com/wp-content/uploads/2020/06/fotos-de-hombres-para-perfil.jpg')"></div>
            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                <i class="fa fa-pen icon-sm text-muted"></i>
                <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg"/>
                <input type="hidden" name="profile_avatar_remove"/>
            </label>
            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow kt-avatar_cancel" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                <i class="ki ki-bold-close icon-xs text-muted"></i>
            </span>
            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                <i class="ki ki-bold-close icon-xs text-muted"></i>
            </span>
        </div>
        <br><br>
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="tablaUsuarios">
                    <thead>
                        <tr>
                            <th class="text-center all">#</th>
                            <th class="text-center all">Nombre</th>
                            <th class="text-center all">Documento</th>
                            <th class="text-center all">Tipo Documento</th>
                            <th class="text-center none">Genero</th>
                            <th class="text-center none">Fecha de nacimiento</th>
                            <th class="text-center none">Telefono</th>
                            <th class="text-center none">Direccion</th>
                            <th class="text-center none">Email</th>
                            <th class="text-center none">Ciudad</th>
                            <th class="text-center all">Estado</th>
                            <th class="text-center all">Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div><br><br><br>
    </main>
</div>
@endsection

@section('scripts')
    <script>
        $('#select2').select2({
            placeholder: "Select a state",
            allowClear: true
        });

        $('#selectpicker').selectpicker();
        $(`#selectpicker`)
        .selectpicker()
        .on("change", function () {
                let formularioCercano = $(this).closest("form");
                if (formularioCercano.data("validator")) {
                        $(this).valid();
                    }
                });

        $(document).on('click', `#swal`, function () {
            generalidades.mensajeGeneral('Excelente', 'Si se abrio', 'success', 'Ok', 'Cancelar');
        });

	    generalidades.initTelefonoInput(`.tel`);
        generalidades.maskTelefono(`.tel`);
        generalidades.datePickerGenerico(`.fecha`);
        generalidades.touchSpinGenerico(`.Touchspin`);
        $(`#summernote`).summernote({
            height: 100,
        });
        $('#timepicker').timepicker({
            minuteStep: 1,
            defaultTime: '',
            showSeconds: true,
            showMeridian: false,
            snapToStep: true
        });
        $('#datetimepicker').datetimepicker();
        $("#archivo").dropzone({ url: "/file/post" });
        // generalidades.maskCorreo(`${form} .email`);
        var avatar4 = new KTAvatar('kt_image_4');

        // avatar4.on('cancel', function(imageInput) {
        //     swal.fire({
        //         title: 'Image successfully canceled !',
        //         type: 'success',
        //         buttonsStyling: false,
        //         confirmButtonText: 'Awesome!',
        //         confirmButtonClass: 'btn btn-primary font-weight-bold'
        //     });
        // });

        // avatar4.on('change', function(imageInput) {
        //     swal.fire({
        //         title: 'Image successfully changed !',
        //         type: 'success',
        //         buttonsStyling: false,
        //         confirmButtonText: 'Awesome!',
        //         confirmButtonClass: 'btn btn-primary font-weight-bold'
        //     });
        // });

        // avatar4.on('remove', function(imageInput) {
        //     swal.fire({
        //         title: 'Image successfully removed !',
        //         type: 'error',
        //         buttonsStyling: false,
        //         confirmButtonText: 'Got it!',
        //         confirmButtonClass: 'btn btn-primary font-weight-bold'
        //     });
        // });
        const config = {
            paging: true,
            responsive: true,
            ajax: {
                url: route("usuarios.listado"),
                type: "GET",                  
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                },
                data: function (data) {
                    generalidades.mostrarCargando("#tablaUsuarios")
                    data = Object.assign(data);
                },
                dataSrc: function (json) {
                    generalidades.ocultarCargando("#tablaUsuarios");
                    return json.data
                },
            },
            buttons: [
                {
                    extend: 'csvHtml5',
                    text: 'CSV',
                    titleAttr: 'Generate CSV',
                    className: 'btn-outline-primary btn-sm mr-1'
                },
                {
                    extend: 'copyHtml5',
                    text: 'Copy',
                    titleAttr: 'Copy to clipboard',
                    className: 'btn-outline-primary btn-sm mr-1'
                },
                {
                    extend: 'print',
                    text: 'Print',
                    titleAttr: 'Print Table',
                    className: 'btn-outline-primary btn-sm'
                },
                {
                    extend: "pdf",
                    text: '<i class="fa fa-download"></i> PDF',
                    className: "btn-outline-primary btn-sm mr-1",
                    title: "Listado.",
                    exportOptions: {
                        columns: ":not(.excluir)"
                    }
                },
                {
                    text: '<i class="fa fa-sync-alt"></i> Actualizar',
                    className: "btn-outline-primary btn-sm mr-1",
                    action: function (e, dt, node, config) {
                        dt.ajax.reload(null, false);
                    }
                }
            ],
            serverSide: true,
            autowidth: false,
            columnDefs: [
                {
                    "targets": "all",
                    "className": "text-center"
                },
                {
                    "targets": "none",
                    "className": "text-justify"
                }
            ],
            columns: [
                {
                    render: function (data, type, full, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    data: 'nombreCompleto',
                    name: 'nombreCompleto'
                },
                {
                    data: 'documento',
                    name: 'documento'
                },
                {
                    data: 'tipo_documento',
                    name: 'tipo_documento'
                },
                {
                    data: 'genero',
                    name: 'genero'
                },
                {
                    data: 'fecha_nacimiento',
                    name: 'fecha_nacimiento'
                },
                {
                    data: 'telefono',
                    name: 'telefono'
                },
                {
                    data: 'direccion',
                    name: 'direccion'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'id_ciudad',
                    name: 'id_ciudad'
                },
                {
                    data: 'estado',
                    name: 'estado'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            order: [
                [0, "asc"]
            ], 
            lengthMenu: [
                [5, 10, 20, 50, -1],
                [5, 10, 20, 50, "Todos"] // change per page values here
            ],
            pageLength: 5,
            dom : `<'row mb-2'<'col-12 text-right'B>><'row'<'col-md-6 col-sm-12'i><'col-md-6 col-sm-12 text-right dataTables_pager'lp>><'table-scrollable't><'row'<'col-md-6 col-sm-12'i><'col-md-6 col-sm-12 text-right dataTables_pager'lp>>`,
            initComplete: function () {}
        };
    generalidades.dataTables("#tablaUsuarios", config);
    </script>
@endsection