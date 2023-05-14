<div class="flex-column offcanvas-mobile w-300px w-xl-325px" id="kt_profile_aside">
    <!--begin::Forms Widget 13-->
    <div class="card card-custom gutter-b">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column mb-3">
                <span class="card-label font-size-h3 font-weight-bolder text-dark">Menu</span>
                <span class="text-muted mt-5 font-weight-bolder font-size-lg">Tienda</span>
            </h3>
        </div>
        <!--begin::Body-->
        <div class="card-body pt-4">
            <div class="d-flex mb-8 justify-content-between">
                <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
                    <div class="navi-item mb-2">
                        <a href="{{ route('productos.ver') }}" class="navi-link py-4 active">
                            <span class="navi-icon mr-2">
                                <span class="svg-icon">
                                    <i class="flaticon-layer icon-xl"></i>
                                </span>
                            </span>
                            <span class="navi-text font-size-lg">Ver productos</span>
                        </a>
                    </div>
                </div>
            </div>
            <h3 class="card-title align-items-start flex-column mb-3">
                <span class="text-muted mt-5 font-weight-bolder font-size-lg">Opciones</span>
            </h3>
            <div class="d-flex mb-8 justify-content-between">
                <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
                    <div class="navi-item mb-2">
                        <a href="{{ route('usuarios.mi-perfil') }}" class="navi-link py-4">
                            <span class="navi-icon mr-2">
                                <span class="svg-icon">
                                    <i class="flaticon-user-settings icon-2x"></i>
                                </span>
                            </span>
                            <span class="navi-text font-size-lg">Mi perfil</span>
                        </a>
                    </div>
                    <div class="navi-item mb-2">
                        <a href="{{ route('favoritos.index') }}" class="navi-link py-4">
                            <span class="navi-icon mr-2">
                                <span class="svg-icon">
                                    <i class="flaticon-black icon-xl"></i>
                                </span>
                            </span>
                            <span class="navi-text font-size-lg">Mis favoritos</span>
                        </a>
                    </div>
                    <div class="navi-item mb-2">
                        <a href="{{ route('pedidos.mis-pedidos') }}" class="navi-link py-4">
                            <span class="navi-icon mr-2">
                                <span class="svg-icon">
                                    <i class="flaticon-truck icon-xl"></i>
                                </span>
                            </span>
                            <span class="navi-text font-size-lg">Mis pedidos</span>
                        </a>
                    </div>
                    <div class="navi-item mb-2">
                        <a href="{{ route('usuarios.configuracion-notificacion') }}" class="navi-link py-4">
                            <span class="navi-icon mr-2">
                                <span class="svg-icon">
                                    <i class="flaticon-email icon-xl"></i>
                                </span>
                            </span>
                            <span class="navi-text font-size-lg">Configuración notificaciones</span>
                        </a>
                    </div>
                    <div class="navi-item mb-2">
                        <a href="#" class="navi-link py-4">
                            <span class="navi-icon mr-2">
                                <span class="svg-icon">
                                    <i class="flaticon-lock icon-xl"></i>
                                </span>
                            </span>
                            <span class="navi-text font-size-lg">Cambiar Contraseña</span>
                        </a>
                    </div>
                </div>
            </div>

            {{-- <div class="mt-6">
                <div class="text-muted mb-4 font-weight-bolder font-size-lg">Product Info</div>
                <!--begin::Input-->
                <div class="form-group mb-8">
                    <label class="font-weight-bolder">Name</label>
                    <input type="text" class="form-control form-control-solid form-control-lg" placeholder="">
                </div>
                <div class="form-group mb-8">
                    <label class="font-weight-bolder">Category</label>
                    <select class="form-control form-control-solid form-control-lg">
                        <option></option>
                        <option>Mens</option>
                        <option>Womens</option>
                        <option>Accessories</option>
                        <option>Technology</option>
                        <option>Appliances</option>
                    </select>
                </div>
                <div class="form-group mb-8">
                    <label class="font-weight-bolder">Size</label>
                    <select class="form-control form-control-solid form-control-lg">
                        <option></option>
                        <option>XS</option>
                        <option>S</option>
                        <option>M</option>
                        <option>L</option>
                        <option>XL</option>
                    </select>
                </div>
                <div class="form-group mb-8">
                    <label for="exampleTextarea" class="font-weight-bolder">Description</label>
                    <textarea class="form-control form-control-solid form-control-lg" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label class="font-weight-bolder">Price (Euro)</label>
                    <input type="text" class="form-control form-control-solid form-control-lg" placeholder="">
                </div>
                <!--begin::Color-->
                <div class="form-group">
                    <label class="font-weight-bolder">Color</label>
                    <div class="radio-inline mb-11">
                        <label class="radio radio-accent radio-danger mr-0">
                            <input type="radio" name="color-selector" checked="checked">
                            <span></span>
                        </label>
                        <label class="radio radio-accent radio-primary mr-0">
                            <input type="radio" name="color-selector">
                            <span></span>
                        </label>
                        <label class="radio radio-accent radio-success mr-0">
                            <input type="radio" name="color-selector">
                            <span></span>
                        </label>
                        <label class="radio radio-accent radio-info mr-0">
                            <input type="radio" name="color-selector">
                            <span></span>
                        </label>
                        <label class="radio radio-accent radio-dark mr-0">
                            <input type="radio" name="color-selector">
                            <span></span>
                        </label>
                        <label class="radio radio-accent radio-secondary mr-0">
                            <input type="radio" name="color-selector">
                            <span></span>
                        </label>
                    </div>
                </div>
                <!--end::Color-->
                <button type="submit" class="btn btn-primary font-weight-bolder mr-2 px-8">Save</button>
                <button type="reset" class="btn btn-clear font-weight-bolder text-muted px-8">Discard</button>
                <!--end::Input-->
            </div> --}}
        </div>
    </div>

    {{-- <div class="card card-custom gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column mb-5">
                <span class="card-label font-weight-bolder text-dark mb-1">Recent Products</span>
                <span class="text-muted mt-2 font-weight-bold font-size-sm">New Arrivals</span>
            </h3>
            <div class="card-toolbar">
                <div class="dropdown dropdown-inline">
                    <a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ki ki-bold-more-hor"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                        <!--begin::Navigation-->
                        <ul class="navi navi-hover">
                            <li class="navi-header font-weight-bold py-4">
                                <span class="font-size-lg">Choose Label:</span>
                                <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="" data-original-title="Click to learn more..."></i>
                            </li>
                            <li class="navi-separator mb-3 opacity-70"></li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-text">
                                        <span class="label label-xl label-inline label-light-success">Customer</span>
                                    </span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-text">
                                        <span class="label label-xl label-inline label-light-danger">Partner</span>
                                    </span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-text">
                                        <span class="label label-xl label-inline label-light-warning">Suplier</span>
                                    </span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-text">
                                        <span class="label label-xl label-inline label-light-primary">Member</span>
                                    </span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-text">
                                        <span class="label label-xl label-inline label-light-dark">Staff</span>
                                    </span>
                                </a>
                            </li>
                            <li class="navi-separator mt-3 opacity-70"></li>
                            <li class="navi-footer py-4">
                                <a class="btn btn-clean font-weight-bold btn-sm" href="#">
                                <i class="ki ki-plus icon-sm"></i>Add new</a>
                            </li>
                        </ul>
                        <!--end::Navigation-->
                    </div>
                </div>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-2">
            <!--begin::Item-->
            <div class="d-flex mb-8">
                <!--begin::Symbol-->
                <div class="symbol symbol-50 symbol-2by3 flex-shrink-0 mr-4">
                    <div class="d-flex flex-column">
                        <div class="symbol-label mb-3" style="background-image: url('/metronic/theme/html/demo1/dist/assets/media/stock-600x400/img-23.jpg')"></div>
                        <a href="#" class="btn btn-light-primary font-weight-bolder py-2 font-size-sm">Edit</a>
                    </div>
                </div>
                <!--end::Symbol-->
                <!--begin::Title-->
                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg mb-2">Darius the Great</a>
                    <span class="text-muted font-weight-bold font-size-sm mb-3">All it takes tank credibility is one glaring error</span>
                    <span class="text-muted font-weight-bold font-size-lg">Price: 
                    <span class="text-dark-75 font-weight-bolder">99.00$</span></span>
                </div>
                <!--end::Title-->
            </div>
            <!--end::Item-->
            <!--begin::Item-->
            <div class="d-flex">
                <!--begin::Symbol-->
                <div class="symbol symbol-50 symbol-2by3 flex-shrink-0 mr-4">
                    <div class="d-flex flex-column">
                        <div class="symbol-label mb-3" style="background-image: url('/metronic/theme/html/demo1/dist/assets/media/stock-600x400/img-25.jpg')"></div>
                        <a href="#" class="btn btn-light-primary font-weight-bolder py-2 font-size-sm">Edit</a>
                    </div>
                </div>
                <!--end::Symbol-->
                <!--begin::Title-->
                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg mb-2">Nike Airmax</a>
                    <span class="text-muted font-weight-bold font-size-sm mb-3">All it takes tank credibility is one glaring error</span>
                    <span class="text-muted font-weight-bold font-size-lg">Price: 
                    <span class="text-dark-75 font-weight-bolder">99.00$</span></span>
                </div>
                <!--end::Title-->
            </div>
            <!--end::Item-->
        </div>
        <!--end::Body-->
    </div> --}}
</div>