@extends('app.theme')

@section('content')
    <div class="row gy-5 g-xl-10">
        <div class="col-12 mb-5">
            <div class="card card-flush p-20">
                <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid"
                    id="kt_modal_create_app_stepper">
                    <div class="flex-row-fluid py-lg-5 px-lg-15">
                        @include('app.projects.steps.' . $step)
                    </div>
                    <div class="d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px">
                        <div class="stepper-nav ps-lg-10">
                            <div class="stepper-item 
                            @if ($step == 'info') current @endif 
                            @if ($step == 'threats') completed @endif
                            @if ($step == 'participants') completed @endif
                            @if ($step == 'events') completed @endif"
                                data-kt-stepper-element="nav">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">1</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">معلومات المشروع</h3>
                                    </div>
                                </div>
                                <div class="stepper-line h-40px"></div>
                            </div>
                            <div class="stepper-item 
                            @if ($step == 'threats') current @endif
                            @if ($step == 'participants') completed @endif
                            @if ($step == 'events') completed @endif "
                                data-kt-stepper-element="nav">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">2</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">التهديدات</h3>
                                    </div>
                                </div>
                                <div class="stepper-line h-40px"></div>
                            </div>
                            <div class="stepper-item 
                            @if ($step == 'participants') current @endif
                            @if ($step == 'events') completed @endif"
                                data-kt-stepper-element="nav">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">3</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">المشاركين</h3>
                                    </div>
                                </div>
                                <div class="stepper-line h-40px"></div>
                            </div>
                            <div class="stepper-item @if ($step == 'events') current @endif "
                                data-kt-stepper-element="nav">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">4</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">الفعاليات</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
