@extends('app.theme')

@section('content')
<div class="row">
    <div class="col-md-6" style="direction: rtl">
        <div class="card h-400px" dir="ltr">
            <div class="card-body d-flex flex-column flex-center">
                <div class="mb-2">
                    <h1 class="fw-semibold text-gray-800 text-center lh-lg">تقرير وزارة التنمية السنوي</h1>
                    <div class="py-10 text-center">
                        <img src="{{ url('assets/media/svg/illustrations/easy/2.svg') }}" class="theme-light-show w-200px" alt="" />
                        <img src="{{ url('assets/media/svg/illustrations/easy/2-dark.svg') }}" class="theme-dark-show w-200px" alt="" />
                    </div>
                </div>
                <div class="text-center mb-1">
                    <a href="/reports/generate" class="btn btn-sm btn-primary me-2">إصدار التقرير السنوي</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6" style="direction: rtl">
        <div class="card h-400px" dir="ltr">
            <div class="card-body d-flex flex-column flex-center">
                <div class="mb-2">
                    <h1 class="fw-semibold text-gray-800 text-center lh-lg">التقارير الأسبوعية</h1>
                    <div class="py-10 text-center">
                        <img src="{{ url('assets/media/svg/illustrations/easy/1.svg') }}" class="theme-light-show w-200px" alt="" />
                        <img src="{{ url('assets/media/svg/illustrations/easy/1-dark.svg') }}" class="theme-dark-show w-200px" alt="" />
                    </div>
                </div>
                <div class="text-center mb-1">
                    <button type="button" class="btn btn-sm btn-primary me-2" data-bs-toggle="modal" 
                        data-bs-target="#weeklyReport">إصدار تقرير أسبوعي</button>
                </div>
            </div>
        </div>
        <div class="modal fade" id="weeklyReport" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content">
                        @include('app.reports.modals.weeklyReport')
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
