<form class="form" action="{{ url('orgnization/amendManager') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="modal-header" id="managerModal_header" dir="rtl">
        <h2 class="fw-bold">التعديل على معلومات الإدارة</h2>
        <div onclick="$('#managerModal').modal('hide')" class="btn btn-icon btn-sm btn-active-icon-primary">
            <span class="svg-icon svg-icon-1">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                        transform="rotate(-45 6 17.3137)" fill="currentColor" />
                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                        transform="rotate(45 7.41422 6)" fill="currentColor" />
                </svg>
            </span>
        </div>
    </div>

    <!-- Modal body: Amend management info -->
    <div class="modal-body py-10 px-lg-17" dir="rtl">
        <div class="scroll-y me-n7 pe-7" id="managerModal_scroll" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
            data-kt-scroll-dependencies="#managerModal_header"
            data-kt-scroll-wrappers="#managerModal_scroll" data-kt-scroll-offset="300px">
            
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">اسم رئيس الجمعية</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="إضغط هنا" name="name" required 
                    value="{{ $orgnization->manager->name }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">الرقم الوطني</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="إضغط هنا" name="national_id" required 
                    value="{{ $orgnization->manager->national_id }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">رقم الهاتف الخلوي</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="إضغط هنا" name="phone" required 
                    value="{{ $orgnization->manager->phone }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">البريد الإلكتروني</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="إضغط هنا" name="email" required 
                    value="{{ $orgnization->manager->email }}"/>
            </div>
        </div>
    </div>


    <!--begin::Display errors-->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!--end::Display errors-->
    <input type="hidden" name="edit_management" value="{{ session('edit_management') }}">


    


    <div class="modal-footer flex-center">
        <button type="reset" onclick="$('#managerModal').modal('hide')"
            class="btn btn-light me-3">الغاء</button>
        <button type="submit" id="managerModal_submit" class="btn btn-primary">
            <span class="indicator-label">اضافة</span>
        </button>
    </div>
</form>
