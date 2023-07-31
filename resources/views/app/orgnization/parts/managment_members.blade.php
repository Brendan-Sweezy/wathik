<div class="card card-flush h-xl-100" dir="rtl">
    <div class="card-header py-7">
        <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0">
            أعضاء الهيئة الإدارية
        </div>

        <!-- MODAL -->
        <div class="modal fade" id="boardInfo" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    @include('app.orgnization.modals.boardInfo')
                </div>
            </div>
        </div>
        <div class="card-toolbar">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
                data-bs-target="#boardInfo">تعديل</button>
        </div> 
        
    </div>
    
    <div class="card-body pt-1">
        <table class="table align-middle table-row-dashed fs-6 gy-5" dir="rtl">
            <thead>
                <tr class="text-end text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th class="min-w-100px">الاسم من أربعة مقاطع</th>
                    <th class="min-w-100px">الرقم الوطني</th>
                    <th class="min-w-100px">الجنس</th>
                    <th class="min-w-100px">تاريخ الميلاد</th>
                    <th class="min-w-100px">العمل/المهنة</th>
                    <th class="min-w-100px">الدرجة العملية</th>
                    <th class="min-w-100px">التخصص</th>
                    <th class="min-w-100px">رقم الهاتف</th>
                    <th class="min-w-100px">تاريخ انتخاب في الهيئة الإدارية</th>
                    <th class="text-start min-w-70px"></th>
                </tr>
            </thead>
            <tbody class="fw-semibold text-gray-600">
                @foreach ($orgnization->members as $member)
                <tr>
                    <td>
                        {{ $member->name }}
                    </td>
                    <td>
                        {{ $member->national_id }}
                    </td>
                    <td>
                        {{ $member->gender }}
                    </td>
                    <td>
                        {{ substr($member->birthday, 0, 10) }}
                    </td>
                    <td>
                        {{ $member->work }}
                    </td>
                    <td>
                        {{ $member->degree }}
                    </td>
                    <td>
                        {{ $member->major }}
                    </td>
                    <td>
                        {{ $member->phone }}
                    </td>
                    <td>
                        {{ substr($member->election_date, 0, 10) }}
                    </td>
                    
                    <!--begin::menu=-->
                        <td class="text-start">
                            <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click"
                                data-kt-menu-placement="bottom-end">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                <span class="svg-icon svg-icon-5 m-0">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                            <!--begin::EDIT MEMBER-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                data-kt-menu="true">



    <!-- EDIT MEMBER -->
        <div class="menu-item px-3">
            <a href="{{ url('orgnization/managment/members/amendMember/' . $member->id) }}" data-bs-toggle="modal" data-bs-target="#editMember{{ $member->id }}"
            data-member="{{ json_encode($member) }}" class="menu-link px-3">تعديل</a> 
        </div>
    <!--end::EDIT MEMBER-->
                                        
                                <!--begin::DELETE MEMBER-->
                                <div class="menu-item px-3">
                                    <a href="{{ url('orgnization/managment/members/delete/' . $member->id) }}" class="menu-link px-3"
                                        data-kt-customer-table-filter="delete_row">حذف</a>
                                </div>
                                <!--end::DELETE MEMBER-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    <!--end::menu=-->
                </tr>
                <div class="modal fade" id="editMember{{ $member->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                @include('app.orgnization.modals.amendMember')
            </div>
        </div>
    </div>
            @endforeach
        </tbody>
        </table>
    </div>
</div>