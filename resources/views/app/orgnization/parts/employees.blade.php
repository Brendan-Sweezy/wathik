<div class="card card-flush h-xl-100" dir="rtl">
    <div class="card-header py-7">
        <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0">
            الموظفين العاملين بأجر
        </div>
        
        <div class="modal fade" id="employeeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    @include('app.orgnization.modals.amendEmployees')
                </div>
            </div>
        </div>
        <div class="card-toolbar">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
                data-bs-target="#employeeModal">تعديل</button>
        </div> 

    </div>
    <div class="card-body pt-1">
        <div class="row">
            <div class="col-3">عدد الموظفين الذكور</div>
            <div class="col">
                male #
            </div>
        </div>
        <div class="separator separator-dashed my-3"></div>
        <div class="row">
            <div class="col-3">عدد الموظفين الإناث</div>
            <div class="col">
                female #
            </div>
        </div>
        <div class="separator separator-dashed my-3"></div>
        <div class="row">
            <div class="col-3">عدد الموظفين (المجموع)</div>
            <div class="col">
                total #
            </div>
        </div>
    </div>
</div>
