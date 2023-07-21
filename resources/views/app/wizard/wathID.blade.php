<!DOCTYPE html>
<html lang="en">
@include('app.common.head')
<!-- I need this doc to take what we did in the login controller and
 login blade files that got commented out in order to input a code that 
 will allow a user to authenticate into an organization -->



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
    <style>
    .otpf {
        background-color: #086cec;
        border: 15px solid #086cec;
        border-radius: 10px;
        
    }
    </style>
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
                        method='POST' action="{{ url('/checkID')}}" encrypt='multipart/form-data'>
                            <!--begin::Body-->
                            {{ csrf_field()}}
                            <div class="card-body text-center otpf">
                                {{-- <img alt="Logo" src="{{ asset('images/logo.png') }}"
                                    class="theme-light-show h-100px" /> --}}
                                <br /><br /><br /><br />
                                <!--begin::Heading-->
                                <div class="text-end mb-10">
                                    <!--begin::Title-->
                                    <h1 class="text-light text-center mb-3 fs-3x" data-kt-translate="sign-in-code">Enter your organization's unique WathikID:</h1>
                                    <!--end::Title-->
                                </div>
                                <!--begin::Heading-->
                                
                                
                                <!--end::Input group=-->
                                <!--begin::Wrapper-->
                                
                                <!--end::Wrapper-->

                                <!--//Below is to work on the unique six-digit code hopefully -->
                                <!--begin::Section-->
                            <div class="mb-10">
                                <!--begin::Input group-->
                                
                                <div class="d-flex flex-wrap flex-stack" style="direction: ltr">
                                    <input type="text" id="code_1" name="code_1" data-inputmask="'mask': '9', 'placeholder': ''"
                                        maxlength="1"
                                        class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2 otp"
                                        value="" />
                                    <input type="text" id="code_2" name="code_2" data-inputmask="'mask': '9', 'placeholder': ''"
                                        maxlength="1"
                                        class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2 otp"
                                        value="" />
                                    <input type="text" id="code_3" name="code_3" data-inputmask="'mask': '9', 'placeholder': ''"
                                        maxlength="1"
                                        class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2 otp"
                                        value="" />
                                    <input type="text" id="code_4" name="code_4" data-inputmask="'mask': '9', 'placeholder': ''"
                                        maxlength="1"
                                        class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2 otp"
                                        value="" />
                                    <input type="text" id="code_5" name="code_5" data-inputmask="'mask': '9', 'placeholder': ''"
                                        maxlength="1"
                                        class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2 otp"
                                        value="" />
                                    <input type="text" id="code_6" name="code_6" data-inputmask="'mask': '9', 'placeholder': ''"
                                        maxlength="1"
                                        class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2 otp"
                                        value="" />
                                </div>
                                <!--begin::Input group-->
                            </div>
                            <!--begin::Actions-->
                            <div class="d-grid gap-2">
                                <!--begin::Submit-->
                                <button type="Submit" id="join_in" class="btn btn-primary">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label" data-kt-translate="two-step-submit">Submit</span>
                                    <!--end::Indicator label-->
                                </button>
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
        <!-- Add the button element here -->
        <style>
        /* Custom CSS for the button */
        .btn-bottom-left {
            position: fixed;
            bottom: 10px;
            left: 10px;
            z-index: 9999; /* To make sure it appears above other elements */}
        </style>
        <button onclick="history.go(-1);" class="btn btn-primary btn-bottom-left">Back</button>
        <!-- End of the button element -->
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






