<div class="col-6 mb-5">
    <div class="card card-flush h-xl-100">
        <div class="card-header py-7">
            <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0">
                المعلومات
            </div>

            <!-- MODAL -->
            <div class="modal fade" id="infoModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content">
                        @include('app.orgnization.modals.information')
                    </div>
                </div>
            </div>
            <div class="card-toolbar">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
                    data-bs-target="#infoModal">تعديل</button>
            </div>
        </div>

        <!-- CONTENT -->
        <div class="card-body pt-1">
            <div class="row">
                <div class="col-3">اسم الجمعية</div>
                <div class="col">{{ $orgnization->name }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">الرقم الوطني</div>
                <div class="col">{{ $orgnization->national_id }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">الوزارة المختصة</div>
                <div class="col">{{ $orgnization->ministry }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">تاريخ التأسيس</div>
                <div class="col">{{ substr($orgnization->founding_date, 0, 10) }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">Share Code</div>
                <div class="col">{{ $orgnization->wathik_id }}</div>
            </div>
        </div>
    </div>
</div>