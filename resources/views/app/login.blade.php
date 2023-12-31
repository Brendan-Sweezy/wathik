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
                        <form class="form w-100" novalidate="novalidate" id="loginForm" action="#">
                            <!--begin::Body-->
                            <div class="card-body text-center">
                                {{-- <img alt="Logo" src="{{ asset('images/logo.png') }}"
                                    class="theme-light-show h-100px" /> --}}
                                <br /><br /><br /><br />
                                <!--begin::Heading-->
                                <div class="text-end mb-10">
                                    <!--begin::Title-->
                                    <h1 class="text-dark mb-3 fs-3x" data-kt-translate="sign-in-title">تسجيل الدخول</h1>
                                    <!--end::Title-->
                                </div>
                                <!--begin::Heading-->
                                <!--begin::Input group=-->
                                <div class="fv-row mb-8">
                                    <input type="text" placeholder="رقم الهاتف" id="phone" autocomplete="off" 
                                        required class="form-control form-control-solid" /> <!--phone number-->
                                </div>
                                <!--end::Input group=-->
                                <div class="fv-row mb-7" id="password" style="display: none;">
                                    <!--begin::Password-->
                                    <input type="text" placeholder="Password" name="password" autocomplete="off"
                                        data-kt-translate="sign-in-input-password"
                                        class="form-control form-control-solid" />
                                    <!--end::Password-->
                                </div>
                                <!--end::Input group=-->
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-10">
                                    <div>

                                    </div>
                                    <!--begin::Link-->
                                    <a href="#" class="link-primary" id="forgot_password" style="display: none;"
                                        data-kt-translate="sign-in-forgot-password">Forgot Password
                                        ?</a>
                                    <!--end::Link-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Actions-->
                                <div class="d-grid gap-2">
                                    <!--begin::Submit-->
                                    <button type="button" id="login_button" onclick="login()"
                                        class="btn btn-primary btn-block me-2 flex-shrink-0">
                                        <!--begin::Indicator label-->
                                        <span class="indicator-label" data-kt-translate="sign-in-submit">تسجيل
                                            الدخول</span>
                                        <!--end::Indicator label-->
                                    </button>
                                    <!--end::Submit-->
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--begin::Body-->
                        </form>
                        <!--end::Form-->

                        <form class="form w-100 mb-10 text-center" novalidate="novalidate" id="otpForm"
                            style="display: none ;" data-kt-redirect-url="#">
                            {{-- <img alt="Logo" src="{{ asset('images/logo.png') }}" class="theme-light-show h-100px" /> --}}
                            <br /><br /><br /><br />
                            <!--begin::Icon-->
                            <div class="text-center mb-10">
                                <img alt="Logo" class="theme-light-show mh-125px"
                                    src="{{ asset('assets/media/svg/misc/smartphone-2.svg') }}" />
                                <img alt="Logo" class="theme-dark-show mh-125px"
                                    src="{{ asset('assets/media/svg/misc/smartphone-2-dark.svg') }}" />
                            </div>
                            <!--end::Icon-->
                            <!--begin::Heading-->
                            <div class="text-center mb-10">
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3" data-kt-translate="two-step-title">تاكيد رقم الهاتف</h1>
                                <!--end::Title-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Section-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <div class="fw-bold text-dark fs-6 mb-1 ms-1" data-kt-translate="two-step-label">ادخل
                                    الرمز المكون من ٦ ارقام اللذي وصلك على تطبيق
                                    الواتساب</div>
                                <!--end::Label-->
                                <!--begin::Input group-->
                                <div class="d-flex flex-wrap flex-stack" style="direction: ltr">
                                    <input type="text" id="code_1" data-inputmask="'mask': '9', 'placeholder': ''"
                                        maxlength="1"
                                        class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2 otp"
                                        value="" />
                                    <input type="text" id="code_2" data-inputmask="'mask': '9', 'placeholder': ''"
                                        maxlength="1"
                                        class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2 otp"
                                        value="" />
                                    <input type="text" id="code_3" data-inputmask="'mask': '9', 'placeholder': ''"
                                        maxlength="1"
                                        class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2 otp"
                                        value="" />
                                    <input type="text" id="code_4" data-inputmask="'mask': '9', 'placeholder': ''"
                                        maxlength="1"
                                        class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2 otp"
                                        value="" />
                                    <input type="text" id="code_5" data-inputmask="'mask': '9', 'placeholder': ''"
                                        maxlength="1"
                                        class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2 otp"
                                        value="" />
                                    <input type="text" id="code_6" data-inputmask="'mask': '9', 'placeholder': ''"
                                        maxlength="1"
                                        class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2 otp"
                                        value="" />
                                </div>
                                <!--begin::Input group-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Actions-->
                            <div class="d-grid gap-2">
                                <!--begin::Submit-->
                                <button type="button" id="kt_sing_in_two_steps_submit" class="btn btn-primary"
                                    data-kt-translate="two-step-submit" onclick="otpLogin()">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">متابعه</span>
                                    <!--end::Indicator label-->
                                </button>
                                <!--end::Submit-->
                            </div>
                            <!--end::Actions-->
                        </form>
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
    <script>
        var input = document.querySelector("#phone");
        var iti = window.intlTelInput(input, {
            autoPlaceholder: "off",
            hiddenInput: "phone",
            localizedCountries: {
                'ar': 'Arabic'
            },
            preferredCountries: [
                'jo',
                'ps',
                'sa',
                'sy',
                'lb',
                'iq',
                'eg',
                'sd',
                'bh',
                'kw',
                'qa',
                'ae',
                'om',
                'ye',
                'ly',
                'ma',
                'tu',
                'dz',
            ],
            separateDialCode: true,
            utilsScript: "{{ asset('assets/intl-tel-input/js/utils.js') }}",
        });

        function login() {
            if (iti.isValidNumber()) {
                $.ajax({
                    url: "{{ url('authenticate') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        _token: '{{ csrf_token() }}',
                        phone: iti.getNumber()
                    },
                    success: function(data) {
                        if (data['status']) {
                            $('#loginForm').hide();
                            $('#otpForm').show();
                            $('#code_1').focus();
                        } else {
                            Swal.fire({
                                text: 'يرجى التأكد ان الرقم المدخل يمتلك حساب على تطبيق واتساب', //Please make sure that the entered number has an account on the WhatsApp application.
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "متابعه",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        }
                    }
                });

            } else {
                Swal.fire({
                    text: 'يرجى التأكد ان الرقم المدخل صحيح', //Please make sure that the entered number is correct.
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "متابعه",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });

            }
        }

        function otpLogin() {
            code = $('#code_1').val();
            code += $('#code_2').val();
            code += $('#code_3').val();
            code += $('#code_4').val();
            code += $('#code_5').val();
            code += $('#code_6').val();
            $.ajax({
                url: "{{ url('otp') }}",
                type: 'POST',
                dataType: "json",
                data: {
                    _token: '{{ csrf_token() }}',
                    phone: iti.getNumber(),
                    code: code
                },
                success: function(data) {
                    if (data['status']) {
                        window.location.href = "{{ url('home') }}";
                    } else {
                        Swal.fire({
                            text: data['msg'],
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                }
            });
        }

        $('.otp').keyup(function() {
            $(this).next().focus();
        });
        $('.otp').focus(function() {
            $(this).val('');
        });
    </script>
</body>
<!--end::Body-->

</html>
