@php
    $id = $model->id ?? '';
@endphp
<div class="card-toolbar">
    <div class="dropdown dropdown-inline">
        <button class="btn btn-secondary" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-h"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right" x-placement="top-end" style="position: absolute; transform: translate3d(-200px, -350px, 0px); top: 0px; left: 0px; will-change: transform;">
            <ul class="navi navi-hover">
                <li class="navi-header font-weight-bold py-4">
                    <span class="font-size-lg">Opciones</span>
                    <i class="flaticon-cogwheel-1" data-toggle="tooltip" data-placement="right" title="" data-original-title="Click to learn more..."></i>
                </li>
                <li class="navi-separator mb-3 opacity-70"></li>
                <li class="navi-item">
                    <a class="navi-link btnEditarSubcategoria" title="Editar subcategoria." data-modificar="{{$id}}">
                        <i class="text-warning -icon fas fa-edit"></i>
                        <span class="navi-text">
                            <span class="text-dark">&nbsp;&nbsp;Editar</span>
                        </span>
                    </a>
                </li>
                <li class="navi-item" title="Eliminar subcategoria." data-eliminar="{{ $id }}">
                    <a class="navi-link btnEliminarSubcategoria">
                        <i class="text-danger fas fa-trash"></i>
                        <span class="navi-text">
                            <span class="text-dark">&nbsp;&nbsp;Eliminar</span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>