<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="svg-icon menu-icon">
            <i class="flaticon-user-settings icon-xl"></i>
        </span>
        <span class="menu-text">Empleados</span>
        <i class="kt-menu__ver-arrow la la-angle-right"></i>
    </a>
    <div class="menu-submenu">
        <ul class="menu-subnav">
            <li class="menu-item menu-item-parent" aria-haspopup="true">
                <span class="menu-link">
                    <span class="menu-text">Empleados</span>
                </span>
            </li>
            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('empleados.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                    </i>
                    <span class="menu-text">Listado</span>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                </a>
            </li>
            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{route('empleados.cargos.index')}}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                    </i>
                    <span class="menu-text">Cargos</span>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                </a>
            </li>
        </ul>
    </div>
</li>