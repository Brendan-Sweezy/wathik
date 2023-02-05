@extends('pages.theme')

@section('head')
    <div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
        <!--begin::Title-->
        <h1 class="text-white lh-base fw-bold fs-2x fs-lg-3x mb-15">The <span
                style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                Trustworthy</span> Reporting Solution
            </span>
        </h1>
        <!--end::Title-->
        <!--begin::Action-->
        <a href="{{ url('home') }}" class="btn btn-primary">Try it now</a>
        <!--end::Action-->
    </div>
@stop

@section('content')

    <div class="z-index-2">
        <div class="container">
            <div class="text-center mb-17">
                <h3 class="fs-2hx text-dark mb-5" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">Impact
                    struggling
                    with paperwork</h3>
                <div class="fs-5 text-muted fw-bold">+6800 Community-based
                    organizations are required to submit
                    an annual report to the government
                </div>
                <div class="fs-5 text-muted fw-bold">CBOs (Community-based organizations) used to engage in
                    M&E exclusively to satisfy a donor requirement. Not to get
                    the real benefit of M&E.
                </div>
                <div class="fs-5 text-muted fw-bold">One of the key reasons is the level of wage-earning employees:
                    18.2% of community organizations do not have any employees
                    at all, 30% have 1 to 2 employees, 25.6% between 3 and 10
                    based on Civil Society Index Analytical Report for Jordan
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <!--begin::Curve top-->
        <div class="landing-curve landing-dark-color">
            <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                    fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve top-->
        <!--begin::Wrapper-->
        <div class="py-20 landing-dark-bg">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Plans-->
                <div class="d-flex flex-column container pt-lg-20">
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <h1 class="fs-2hx fw-bold text-white mb-5" id="pricing"
                            data-kt-scroll-offset="{default: 100, lg: 150}">The Trustworthy
                            Reporting Solution</h1>
                        <div class="text-gray-600 fw-semibold fs-5">Enable Community-based
                            organizations meet the government
                            requirement and satisfy donors
                        </div>
                        <div class="text-gray-600 fw-semibold fs-5">To reach new donors and build a partnership for CBO’s
                            impact mission it’s very important to have trustworthiness
                            and honesty in the documentation process.
                        </div>
                        <div class="text-gray-600 fw-semibold fs-5">Also, The power of technology like AI and big data will
                            make these processes much easier and without need for
                            dedicated team.
                        </div>
                    </div>
                    <!--end::Heading-->
                </div>
                <!--end::Plans-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Curve bottom-->
        <div class="landing-curve landing-dark-color">
            <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                    fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve bottom-->
    </div>
    <div class="mt-20 z-index-2">
        <div class="container">
            <div class="text-center mb-17">
                <h3 class="fs-2hx text-dark mb-5" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">
                    Streamlining
                    Reporting with Wathik</h3>
                <div class="fs-5 text-muted fw-bold">Step-by-step process for
                    Community-based organizations to
                    add the data and one-click for
                    generating the reports.
                </div>
                <div class="fs-5 text-muted fw-bold">The platform experience is designed to collect the data
                    and validate it step-by-step, and if you need your report,
                    you need to finish your warning list!
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
@stop
