<div class="col-6 mb-5">
    <div class="card card-flush h-xl-100">
        <div class="card-header py-7">
            <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0">
                معلومات الإدارة
            </div>

            <!-- button to amend manager information -->
            <div class="card-toolbar">
            
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
                    data-bs-target="#kt_modal_add_customer">تعديل</button>
                    <!-- (see modal section below) -->
                    
                <!-- 
                    /** OLD (non-functional) button: **/
                    <button type="button" class="btn btn-primary">تعديل</button>
                -->

            </div> 
             <!-- end button -->

        </div>
        <div class="card-body pt-1">
            <div class="row">
                <div class="col-3">اسم رئيس الجمعية</div>
                <div class="col">{{ $orgnization->manager->name }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">الرقم الوطني</div>
                <div class="col">{{ $orgnization->manager->national_id }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">رقم الهاتف الخلوي</div>
                <div class="col">{{ $orgnization->manager->phone }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">البريد الإلكتروني</div>
                <div class="col">{{ $orgnization->manager->email }}</div>
            </div>
        </div>
    </div>
</div>

<!-- popup to amend management info -->
@section('modals')
    <div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                @include('app.orgnization.modals.managment')
            </div>
        </div>
    </div>
@stop
