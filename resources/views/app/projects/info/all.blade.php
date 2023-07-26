<!-- begin: Button to open "amend info" popup -->
<button type="button" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
    data-bs-target="#amendInfo">Amend Info</button>
<div class="modal fade" id="amendInfo" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            @include('app.projects.info.amend')
        </div>
    </div>
</div>

<hr />
<!-- end: Button... -->

<table class="table align-middle table-row-dashed fs-6 gy-5 " dir="rtl">
    <!--begin::Table head-->
    <thead>
        <!--begin::Table row-->
        <tr class="text-end text-gray-400 fw-bold fs-7 text-uppercase gs-0">
            <th class="min-w-50px">name</th>
            <th class="min-w-50px">start date</th>
            <th class="min-w-50px">title</th>
            <th class="min-w-50px">state</th>
            <th class="min-w-50px">budget</th>
            <th class="text-start min-w-50px"></th>
        </tr>
        <!--end::Table row-->
    </thead>
    <!--end::Table head-->
    <!--begin::Table body-->
    <tbody class="fw-semibold text-gray-600">
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
                    {{ $project->budget }}
                </td>
                <!--end::Name=-->
            </tr>
    </tbody>
</table>
