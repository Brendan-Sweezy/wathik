<div class="card card-flush h-xl-100" dir="rtl">
    <div class="card-header py-7">
        <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0">
            الفروع  
        </div>
        

    <!-- MODAL -->
        <div class="modal fade" id="addBranch" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    @include('app.orgnization.modals.addBranch')
                </div>
            </div>
        </div>
        <div class="card-toolbar">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
                data-bs-target="#addBranch">تعديل</button>
        </div> 


    </div>
    <div class="card-body pt-1">
        <table class="table align-middle table-row-dashed fs-6 gy-5" dir="rtl">
            <thead>
                <tr class="text-end text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    
                    <th class="min-w-125px">تاريخ</th>
                    <th class="min-w-125px">اسم</th>
                    <th class="min-w-125px">محافظة</th>
                    <th class="min-w-125px">لواء</th>
                    <th class="min-w-125px">اِسْتَبْعَد</th>
                    <th class="min-w-125px">سكان</th>
                    <th class="text-start min-w-70px"></th>
                </tr>
            </thead>

            <!-- TABLE BODY AND EDITING SHITE -->
            <tbody class="fw-semibold text-gray-600">
                @foreach ($orgnization->branch as $branch)
                

                                <tr>
                                    <td>
                                        {{ $branch->date }}
                                    </td>
                                    <td>
                                        {{ $branch->name }}
                                    </td>
                                    <td>
                                        {{ $branch->governorate }}
                                    </td>
                                    <td>
                                        {{ $branch->major_general }}
                                    </td>
                                    <td>
                                        {{ $branch->eleminate }}
                                    </td>
                                    <td>
                                        {{ $branch->population }}
                                    </td>
                                    

                                    <!--begin::Action=-->
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


                                        <!--begin::EDIT BRANCH-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                            data-kt-menu="true">

                                            <div class="menu-item px-3">
                                                <a href="{{ url('orgnization/amendBranch/' . $branch->id) }}" data-bs-toggle="modal" data-bs-target="#amendBranch{{ $branch->id }}"
                                                    class="menu-link px-3">تعديل</a>
                                            </div>
                                        <!--end::EDIT BRANCH-->
                                                    
                                        <!--begin::DELETE BRANCH-->
                                            <div class="menu-item px-3">
                                                <a href="{{ url('orgnization/delete/' . $branch->id) }}" class="menu-link px-3"
                                                    data-kt-customer-table-filter="delete_row">حذف</a>
                                            </div>
                                        <!--end::DELETE BRANCH-->

                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->
                                    
                                </tr>
                                <div class="modal fade" id="amendBranch{{ $branch->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                        <div class="modal-content">
                                            @include('app.orgnization.modals.amendBranch')
                                        </div>
                                    </div>
                                </div>
                                    
                                    
                    
            @endforeach
            
            </tbody>
            
        </table>
    </div>
    
</div>




