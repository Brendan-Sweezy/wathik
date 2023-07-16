<!DOCTYPE html>
<html lang="en">
@include('app.common.head')

<body id="kt_body" class="app-blank">
    <link rel="stylesheet" href="{{ asset('assets/intl-tel-input/css/intlTelInput.css') }}" />
    <style>
        .iti {
            width: 95%;
        }
    </style>
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-theme-mode");
            } else {
                if (localStorage.getItem("data-theme") !== null) {
                    themeMode = localStorage.getItem("data-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Authentication - Two-stes -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <!--begin::Form-->
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px p-10">
                        <form class="form w-100" novalidate="novalidate" id="loginForm"
                        method='POST' action="{{ url('/createAccountAuthenticate')}}" encrypt='multipart/form-data'>
                            <!--begin::Body-->
                            {{ csrf_field()}}
                            <div class="card-body text-center">
                                {{-- <img alt="Logo" src="{{ asset('images/logo.png') }}"
                                    class="theme-light-show h-100px" /> --}}
                                <br /><br /><br /><br />
                                <!--begin::Heading-->
                                <div class="text-end mb-10">
                                    <!--begin::Title-->
                                    <h1 class="text-dark mb-3 fs-3x" data-kt-translate="sign-in-title">Create Account</h1>
                                    <!--end::Title-->
                                </div>
                                <!--begin::Heading-->
                                <!--begin::Input group=-->
                                <div class="fv-row mb-2">
                                    <input type="string" placeholder="Username" id="username" autocomplete="off" 
                                        required class="form-control form-control-solid" name='username'/> <!--username-->
                                </div>

                                <div class="fv-row mb-2">
                                    <input type="email" placeholder="Email" id="email" autocomplete="off" 
                                        required class="form-control form-control-solid" name='email'/> <!--password-->
                                </div>

                                <div class="fv-row mb-2">
                                    <input type="tel" placeholder="Phone Number" id="phone_number" autocomplete="off" 
                                        required class="form-control form-control-solid" name='phone_number'/> <!--password-->
                                </div>

                                <div class="fv-row mb-2">
                                    <input type="password" placeholder="Password" id="password" autocomplete="off" 
                                        required class="form-control form-control-solid" name='password'/> <!--password-->
                                </div>

                                <div class="fv-row mb-2">
                                    <input type="password" placeholder="Confirm Password" id="password_confirm" autocomplete="off" 
                                        required class="form-control form-control-solid" name='password_confirm'/> <!--password-->
                                </div>

                                <!--end::Input group=-->
                                
                                
                                <!--end::Input group=-->
                                <!--begin::Wrapper-->
                                
                                <!--end::Wrapper-->
                                <!--begin::Actions-->
                                <div class="d-grid gap-2 mb-2">
                                    <!--begin::Submit-->
                                    <button type="Submit" id="login_button"
                                        class="btn btn-primary btn-block me-2 flex-shrink-0">
                                        <!--begin::Indicator label-->
                                        <span class="indicator-label" data-kt-translate="sign-in-submit">Create Account</span>
                                        <!--end::Indicator label-->
                                    </button>
                                    <!--end::Submit-->
                                </div>

                                <div class="d-grid gap-2">
                                    <!--begin::Submit-->
                                    <a href='/login' id="create_account_button"
                                        class="btn btn-secondary btn-block me-2 flex-shrink-0">
                                        <!--begin::Indicator label-->
                                        <span class="indicator-label" data-kt-translate="sign-in-submit">Sign in with Existing Account</span>
                                        <!--end::Indicator label-->
                                    </a>
                                    <!--end::Submit-->
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--begin::Body-->
                        </form>
                        <!--end::Form-->

                        
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Form-->
                <!--begin::Footer-->
                <div class="d-flex flex-center flex-wrap px-5">

                </div>
                <!--end::Footer-->
            </div>
            <!--end::Body-->
            <!--begin::Aside-->
            <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2"
                style="background-image: url({{ asset('assets/media/misc/auth-bg.png') }})">
                <!--begin::Content-->
                <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                    <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">وثيق</h1>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Aside-->
        </div>
        <!--end::Authentication - Two-stes-->
    </div>
    <!--end::Root-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "{{ asset('assets') }}/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('assets/js/custom/authentication/sign-in/two-steps.js') }}"></script>
    <script src="{{ asset('assets/intl-tel-input/js/intlTelInput.js') }}"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
    
</body>
<!--end::Body-->

</html>
