<div id="kt_app_sidebar" class="app-sidebar" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle" style="z-index:0;">
    <!--begin::Sidebar primary-->
    <div class="app-sidebar-primary">
        <!--begin::Header-->
        <div class="d-flex flex-column flex-center fs-6 fw-bold px-2 mb-5" id="kt_app_sidebar_primary_header">
        </div>
        <!--end::Header-->
        <!--begin::Sidebar navbar-->
        <div class="app-sidebar-nav flex-grow-1 hover-scroll-overlay-y px-5 pt-2" id="kt_app_sidebar_primary_nav"
            data-kt-scroll="true" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_header, #kt_app_sidebar_primary_header, #kt_app_sidebar_primary_footer"
            data-kt-scroll-wrappers="#kt_app_content, #kt_app_sidebar_primary_nav" data-kt-scroll-offset="5px">
            <!--begin::Nav-->
            <ul class="nav">
                <li class="nav-item py-1">
                    <a href="{{ url('home') }}"
                        class="nav-link py-4 px-1 btn {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                        <i class="fonticon-home fs-1"></i>
                        <span class="pt-2 fs-9 fs-lg-7 fw-bold">الرئيسية</span>
                    </a>
                </li>
                <li class="nav-item py-1">
                    <a href="{{ url('orgnization') }}"
                        class="nav-link py-4 px-1 btn {{ Route::currentRouteName() == 'orgnization' ? 'active' : '' }}">
                        <i class="fonticon-content-marketing fs-1"></i>
                        <span class="pt-2 fs-9 fs-lg-7 fw-bold">الجمعية</span>
                    </a>
                </li>
                <li class="nav-item py-1">
                    <a href="{{ url('projects') }}"
                        class="nav-link py-4 px-1 btn {{ Route::currentRouteName() == 'projects' ? 'active' : '' }}">
                        <i class="fonticon-paperclip fs-1"></i>
                        <span class="pt-2 fs-9 fs-lg-7 fw-bold">المشاريع</span>
                    </a>
                </li>
                <li class="nav-item py-1">
                    <a href="{{ url('budget') }}"
                        class="nav-link py-4 px-1 btn {{ Route::currentRouteName() == 'budget' ? 'active' : '' }}">
                        <i class="fa-solid fa-money-bill"></i>
                        <span class="pt-2 fs-9 fs-lg-7 fw-bold">ميزانية</span>
                    </a>
                </li>
                <li class="nav-item py-1">
                    <a href="{{ url('reports') }}"
                        class="nav-link py-4 px-1 btn {{ Route::currentRouteName() == 'reports' ? 'active' : '' }}">
                        <i class="fonticon-stats fs-1"></i>
                        <span class="pt-2 fs-9 fs-lg-7 fw-bold">التقارير</span>
                    </a>
                </li>
            </ul>
            <!--end::Nav-->
        </div>
        <!--end::Sidebar navbar-->
        <!--begin::Footer-->
        <div class="app-sidebar-footer d-flex flex-column flex-center" id="kt_app_sidebar_primary_footer">
            <!--begin::Menu-->
            <div class="mb-0">
                <button type="button" class="btn btn-icon btn-color-gray-400 btn-active-color-primary"
                    data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-overflow="true"
                    data-kt-menu-placement="top-start">
                    <i class="fonticon-setting fs-1"></i>
                </button>
                <!--begin::Menu 2-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                    data-kt-menu="true">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3">الاعدادات</a>
                    </div>
                    <!--end::Menu item-->

                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="{{ url('logout') }}" class="menu-link px-3">تسجيل الخروج</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu separator-->
                    <div class="separator mt-3 opacity-75"></div>
                    <!--end::Menu separator-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <div class="menu-content px-3 py-3">
                            <a class="btn btn-primary btn-sm px-4" href="#">انشاء التقرير</a>
                        </div>
                    </div>
                    <!--end::Menu item-->
                </div>
                <!--end::Menu 2-->
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Footer-->
    </div>
</div>
