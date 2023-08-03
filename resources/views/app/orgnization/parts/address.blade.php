<div class="col-6 mb-5">
    <div class="card card-flush h-xl-100">
        <div class="card-header py-7">
            <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0">
                العنوان
            </div>
            <!-- MODAL -->
            <div class="modal fade" id="amendAddress" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content">
                        @include('app.orgnization.modals.amendAddress')
                    </div>
                </div>
            </div>
            <div class="card-toolbar">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
                    data-bs-target="#amendAddress">تعديل</button>
            </div>
        </div>
        <div class="card-body pt-1">
            <div class="row">
                <div class="col-3">المحافظة</div>
                <div class="col">{{ $address->governorate }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">اللواء</div>
                <div class="col">{{ $address->provenance }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">القضاء</div>
                <div class="col">{{ $address->district }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">المنطقة</div>
                <div class="col">{{ $address->area }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">الحي</div>
                <div class="col">{{ $address->neighborhood }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">نوع التجمع السكاني</div>
                <div class="col">{{ $address->residential_type }}</div>
            </div>
        </div>
    </div>
</div>
