<div class="card mb-5 mb-xxl-8" dir="rtl">
    <div class="card-body pt-9 pb-0">
        <div class="d-flex flex-wrap flex-sm-nowrap">
            <div class="flex-grow-1">
                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                    <div class="d-flex flex-column">
                        <div class="d-flex align-items-center mb-2">
                            <span class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">
                                {{ $orgnization->name }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap flex-stack">
                    <div class="d-flex flex-column flex-grow-1 pe-8">
                        <div class="d-flex flex-wrap">
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="4500">0
                                    </div>
                                </div>
                                <div class="fw-semibold fs-6 text-gray-400">المشاريع</div>
                            </div>
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="80">0
                                    </div>
                                </div>
                                <div class="fw-semibold fs-6 text-gray-400">الانشطة</div>
                            </div>
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="60">0</div>
                                </div>
                                <div class="fw-semibold fs-6 text-gray-400">المشاركين</div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                        <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                            <span class="fw-semibold fs-6 text-gray-400">اكتمال المعلومات</span>
                            <span class="fw-bold fs-6">50%</span>
                        </div>
                        <div class="h-5px mx-3 w-100 bg-light mb-3">
                            <div class="bg-success rounded h-5px" role="progressbar" style="width: 50%;"
                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 @if ($target == 'main') active @endif"
                    href="{{ url('orgnization') }}">
                    عن الجمعية
                </a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 @if ($target == 'managment') active @endif"
                    href="{{ url('orgnization/managment') }}">
                    الهيئة الإدارية
                </a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 @if ($target == 'authority') active @endif"
                    href="{{ url('orgnization/authority') }}">
                    الهيئة العامة
                </a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 @if ($target == 'employees') active @endif"
                    href="{{ url('orgnization/employees') }}">
                    الموظفين
                </a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 @if ($target == 'funding') active @endif"
                    href="{{ url('orgnization/funding') }}">جهات
                    التمويل
                    والجهات المانحة الرسمية
                    للجمعية</a>
            </li>
        </ul>
    </div>
</div>
