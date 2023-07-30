@extends('app.theme')



@section('content')
@include('app.projects.head')

    <div class="row gy-5 g-xl-10" dir="rtl">
        <div class="col-12 mb-5">
            <div class="card card-flush h-xl-100" dir="rtl">
                <div class="card-header py-7">
                    <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0">
                    معلومات المشروع
                    </div>
                </div>
                <div class="card-body pt-1">
                    @include('app.projects.info.all')
                </div>
            </div>
        </div>
    </div>
    <div class="row gy-5 g-xl-10" dir="rtl">
        <div class="col-12 mb-5">
            <div class="card card-flush h-xl-100" dir="rtl">
                <div class="card-header py-7">
                    <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0">
                        المشاركين
                    </div>
                </div>
                <div class="card-body pt-1">
                    @include('app.projects.participants.all')
                </div>
            </div>
        </div>
    </div>
    <div class="row gy-5 g-xl-10" dir="rtl">
        <div class="col-12 mb-5">
            <div class="card card-flush h-xl-100" dir="rtl">
                <div class="card-header py-7">
                    <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0">
                        الفعاليات
                    </div>
                </div>
                <div class="card-body pt-1">
                    @include('app.projects.events.all')
                </div>
            </div>
        </div>
    </div>
@endsection
