@extends('app.theme')


@section('content')
    <div class="row gy-5 g-xl-10" dir="rtl">
        @foreach ($projects as $project)
            @if ($project->events->isEmpty())
                @php
                    if ($project->threats->isEmpty()) {
                        $project->progress = 25;
                        $project->url = url('projects/addThreats/' . $project->id);
                    } elseif ($project->participants->isEmpty()) {
                        $project->progress = 50;
                        $project->url = url('projects/addParticipants/' . $project->id);
                    } else {
                        $project->progress = 75;
                        $project->url = url('projects/addEvents/' . $project->id);
                    }
                @endphp
                <div class="col-3 mb-5 h-150px">
                    <a href="{{ $project->url }}">
                        <div class="card card-flush h-150px">
                            <div class="card-header pt-5">
                                <div class="card-title d-flex flex-column">
                                    <h3>{{ $project->name }}</h3>
                                    <span class="text-gray-400 pt-1 fw-semibold fs-6">خطوات قليلة لتنهي تعبئة المشروع، قم
                                        بتعبئتها
                                        الآن.</span>
                                </div>
                            </div>
                            <div class="card-body d-flex align-items-end pt-0">
                                <div class="d-flex align-items-center flex-column mt-3 w-100">
                                    <div class="h-8px mx-3 w-100 bg-light-success rounded">
                                        <div class="bg-success rounded h-8px" role="progressbar"
                                            style="width: {{ $project->progress }}%;"
                                            aria-valuenow="{{ $project->progress }}" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
        @endforeach
    </div>
    <br />
    <div class="row gy-5 g-xl-10" dir="rtl">
        <div class="col-12 mb-5" style="direction: rtl">
            <div class="card card-flush h-xl-100">
                <div class="card-header py-7">
                    <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0">
                    ملخص عن مشاریع وبرامج الجمعیة وأنشطتھا وإنجازاتھا والتي تساھم في تحقیق أھداف الجمعیة
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ url('projects/add') }}" type="button" class="btn btn-primary">اضافة مشروع</a>
                    </div>
                </div>
                <div class="card-body pt-1">

                    <table class="table align-middle table-row-dashed fs-6 gy-5" dir="rtl">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-end text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-125px">اسم المشروع / النشاط</th>
                                <th class="min-w-125px">تاريخ المشروع</th>
                                <th class="min-w-125px">موقع المشروع</th>
                                <th class="min-w-125px">حالة النشاط</th>
                                <th class="min-w-125px">عدد المستفيدين</th>
                                <th class="min-w-125px">اكتمال المعلومات</th>
                                <th class="text-start min-w-70px"></th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-semibold text-gray-600">
                            @foreach ($projects as $project)
                                @php
                                    if ($project->threats->isEmpty()) {
                                        $project->progress = 25;
                                        $project->url = url('projects/addThreats/' . $project->id);
                                    } elseif ($project->participants->isEmpty()) {
                                        $project->progress = 50;
                                        $project->url = url('projects/addParticipants/' . $project->id);
                                    } elseif ($project->events->isEmpty()) {
                                        $project->progress = 75;
                                        $project->url = url('projects/addEvents/' . $project->id);
                                    } else {
                                        $project->progress = 100;
                                        $project->url = url('projects/view/' . $project->id);
                                    }
                                @endphp
                                <tr>
                                    <td>
                                        {{ $project->name }}
                                    </td>
                                    <td>
                                        {{ substr($project->date, 0, 10) }}
                                    </td>
                                    <td>
                                        {{ $project->title }}
                                    </td>
                                    <td>
                                        {{ $project->status }}
                                    </td>
                                    <td>
                                        {{ $project->beneficiaries }}
                                    </td>
                                    <td>
                                        <div class="bg-success rounded h-8px" role="progressbar"
                                            style="width: {{ $project->progress }}%;"
                                            aria-valuenow="{{ $project->progress }}" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </td>
                                    <td class="text-start">
                                        <a href="{{ $project->url }}"
                                            class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                            <span class="svg-icon svg-icon-2">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="6" y="11" width="13"
                                                        height="2" rx="1" fill="currentColor" />
                                                    <path
                                                        d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
