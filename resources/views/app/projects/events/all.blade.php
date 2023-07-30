<button type="button" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
    data-bs-target="#addEvent">اضافة فعالية</button>
<div class="modal fade" id="addEvent" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            @include('app.projects.events.add')
        </div>
    </div>
</div>


<hr />
<table class="table align-middle table-row-dashed fs-6 gy-5" dir="rtl">
    <!--begin::Table head-->
    <thead>
        <!--begin::Table row-->
        <tr class="text-end text-gray-400 fw-bold fs-7 text-uppercase gs-0">
            <th class="min-w-125px">اسم النشاط</th>
            <th class="min-w-125px">تاريخ النشاط</th>
            <th class="min-w-125px">وقت النشاط</th>
            <th class="min-w-125px">عدد المستفيدين</th>
            <th class="min-w-125px">images</th>
            <th class="text-start min-w-70px"></th>
        </tr>
        <!--end::Table row-->
    </thead>
    <!--end::Table head-->
    <!--begin::Table body-->
    <tbody class="fw-semibold text-gray-600">
        @foreach ($events as $event)
            <tr>
                <td>
                    {{ $event->name }}
                </td>
                <td>
                    {{ substr($event->date, 0, 10) }}
                </td>
                <td>
                    {{ $event->time }}
                </td>
                <td>
                    {{ $event->beneficiaries }}
                </td>
                <td>
                    <img alt="Image" src="{{asset('storage/' . $event->photo)}}" height='100'/>
                </td>
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
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                        data-kt-menu="true">
                        <div class="menu-item px-3">
                            <a href="{{ url('events/amend/' . $event->id) }}" class="menu-link px-3"
                                data-bs-toggle="modal" data-bs-target="#amendEvent{{ $event->id }}">تعديل</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="{{ url('events/delete/' . $event->id) }}" class="menu-link px-3"
                                data-kt-customer-table-filter="delete_row">حذف</a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                </td>
                <!--end::Action=-->
            </tr>
            <div class="modal fade" id="amendEvent{{ $event->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content">
                        @include('app.projects.events.amend')
                    </div>
                </div>
            </div>
        @endforeach


    </tbody>
</table>
