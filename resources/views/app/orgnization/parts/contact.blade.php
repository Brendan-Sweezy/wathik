<div class="col-6 mb-5">
    <div class="card card-flush h-xl-100">
        <div class="card-header py-7">
            <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0">
                معلومات التواصل
            </div>
            <!-- MODAL -->
            <div class="modal fade" id="amendContact" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content">
                        @include('app.orgnization.modals.amendContact')
                    </div>
                </div>
            </div>
            <div class="card-toolbar">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
                    data-bs-target="#amendContact">تعديل</button>
            </div>
        </div>
        <div class="card-body pt-1">
            <div class="row">
                <div class="col-3">البريد الإلكتروني</div>
                <div class="col">
                    {{ $orgEmail->contact }}
                </div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">رقم الهاتف الأرضي</div>
                <div class="col">
                    {{ $orgPhone->contact }}
                </div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">secondary phone</div>
                <div class="col">
                    {{ $orgMobile->contact }}
                </div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">رقم الهاتف الأرضي</div>
                <div class="col">
                    {{ $orgMail->contact }}
                </div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">الرمز البريدي</div>
                <div class="col">
                    {{ $orgZipcode->contact }}
                </div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">الموقع الإلكتروني</div>
                <div class="col">
                    {{ $orgWebsite->contact }}
                </div>
            </div>
        </div>
    </div>
</div>
