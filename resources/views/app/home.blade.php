@extends('app.theme')


@section('content')
    <div class="row g-5 g-xl-10 mb-xl-10">
        <div class="col-3" style="direction: rtl">
            <div class="card h-300px card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center border-0"
                style="background-color: #080655">
                <div class="card-header pt-5">
                    <div class="card-title d-flex flex-column">
                        <span class="text-white opacity-50 pt-1 fw-semibold fs-6">هنالك بعض الخطوات التي
                            لم تكملها منذ دخولك الماضي
                            للنظام، قم بتكملتها الآن.</span>
                    </div>
                </div>
                <div class="card-body align-items-end pt-0">
                    <div class="d-flex align-items-center flex-column mt-3 w-100">
                        <div class="h-8px mx-3 w-100 bg-light-danger rounded">
                            <div class="bg-danger rounded h-8px" role="progressbar" style="width: 72%;" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <br /><br />
                    <div class="mb-3 row">
                        <a href='{{ url('orgnization') }}' class="btn btn-danger fw-semibold me-2">اكمل الان</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3" style="direction: rtl">
            <div class="card border-transparent h-300px" data-theme="light"
                style="background-color: #F1416C;background-image:url('assets/media/patterns/vector-1.png');">
                <div class="card-body ps-xl-15">
                    <div class="m-0">
                        <div class="position-relative fs-2 z-index-2 fw-bold text-white mb-7">
                            هل قمتم بأي نشاط في
                            الفترة الماضية؟ أو
                            تخططون لنشاط قريب؟
                        </div>
                    </div> 
                    <div class="mb-3">
                        <a href="{{ url('projects') }}"
                            class="btn btn-color-white bg-white bg-opacity-15 bg-hover-opacity-25 fw-semibold">قم بتعبئته من
                            خلال خطوات بسيطة.</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6" style="direction: rtl">
            <div class="card h-300px">
                <div class="card-body d-flex flex-column flex-center">
                    <div class="mb-2">
                        <h1 class="fw-semibold text-gray-800 text-center lh-lg">Welcome, {{ $user->username }}!</h1>
                        <div class="py-10 text-center fs-2">
                            Current organization: {{ $orgnization->name }}
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <div class="row g-5 g-xl-10 mb-xl-10">
        <div class="col-6" style="direction: rtl">
            <div class="card h-400px">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">أحدث المشاريع</span>
                    </h3>
                    <div class="card-toolbar">
                        <a href="{{ url('projects') }}" class="btn btn-sm btn-light">جميع المشاريع</a>
                    </div>
                </div>
                <div class="card-body pt-6">
                    @foreach ($projects as $project)
                        <div class="d-flex flex-stack">
                            <div class="symbol symbol-40px me-4">
                                <div class="symbol-label fs-2 fw-semibold bg-danger text-inverse-danger">
                                    {{ substr($project->name, 0, 1) }}</div>
                            </div>
                            <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                <div class="flex-grow-1 me-2">
                                    <a href="{{ url('projects/view/' . $project->id) }}"
                                        class="text-gray-800 text-hover-primary fs-6 fw-bold">{{ $project->name }}</a>
                                </div>
                                <a href="#"
                                    class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="18" y="13" width="13"
                                                height="2" rx="1" transform="rotate(-180 18 13)"
                                                fill="currentColor" />
                                            <path
                                                d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-4"></div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-6" style="direction: rtl">
            <div class="card h-400px" dir="ltr">
                <div class="card-body d-flex flex-column flex-center">
                    <div class="mb-2">
                        <h1 class="fw-semibold text-gray-800 text-center lh-lg">قم باصدار التقارير الان
                        </h1>
                        <div class="py-10 text-center">
                            <img src="{{ url('assets/media/svg/illustrations/easy/1.svg') }}"
                                class="theme-light-show w-200px" alt="" />
                            <img src="{{ url('assets/media/svg/illustrations/easy/1-dark.svg') }}"
                                class="theme-dark-show w-200px" alt="" />
                        </div>
                    </div>
                    <div class="text-center mb-1">
                        <a href="{{ url('reports') }}" class="btn btn-sm btn-primary me-2">اصدر التقرير</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
