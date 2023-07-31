<div class="col-6 mb-5">
    <div class="card card-flush h-xl-100">
        <div class="card-header py-7">
            <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0">
                معلومات الإدارة
            </div>

            <!-- MODAL -->
            <div class="modal fade" id="managerModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content">
                        @include('app.orgnization.modals.managment')
                    </div>
                </div>
            </div>
            <div class="card-toolbar">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
                    data-bs-target="#managerModal">تعديل</button>
            </div>
        </div>
        
        <!-- CONTENT -->
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var triggerEditButton = {!! json_encode(session('trigger_edit_button')) !!};
        if (triggerEditButton) {
            $('#managerModal').modal('show');
        }
    });
</script>
