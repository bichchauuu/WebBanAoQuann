<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="/admin">
            <div class="d-flex flex-wrap app-sidebar-logo-default">
                <div class="app-sidebar-logo-default">
                    <img alt="Logo" src="{{ asset('admin_assets/media/logos/default-dark.svg') }}"
                        class="h-25px " />
                </div>
                <div class="app-sidebar-logo-default">
                    <h2 class="ms-5" style="color: white">Trang Admin</h2>
                </div>
            </div>
            <img alt="Logo" src="{{ asset('admin_assets/media/logos/default-dark.svg') }}"
                class="h-20px app-sidebar-logo-minimize" />
        </a>
        <!--end::Logo image-->
    </div>
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">
                <!--begin:Menu item-->
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="/admin" class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-element-11 fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span>
                        <span class="menu-title">Dashboards</span>
                    </a>
                    <!--end:Menu link-->
                </div>

                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="/admin/user" class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-users"></i>
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span>
                        <span class="menu-title">Quản lý user</span>
                    </a>
                    <!--end:Menu link-->
                </div>


                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="/admin/category" class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-tags"></i>
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span>
                        <span class="menu-title">Quản lý danh mục</span>
                    </a>
                    <!--end:Menu link-->
                </div>

                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="/admin/product" class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-tshirt"></i>
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span>
                        <span class="menu-title">Quản lý sản phẩm</span>
                    </a>
                    <!--end:Menu link-->
                </div>

                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="/admin/order" class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-clipboard-check"></i>
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span>
                        <span class="menu-title">Quản lý order</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="/admin/promotion" class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-basket fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span>
                        <span class="menu-title">Quản lý mã khuyến mãi</span>
                    </a>
                    <!--end:Menu link-->
                </div>
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
</div>
