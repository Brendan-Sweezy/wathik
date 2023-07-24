<form class="form" action="{{ url('budget/amendRev/3') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="modal-header" id="q3RevModal_header" dir="rtl">
        <h2 class="fw-bold">تعديل إيرادات الربع الثالث</h2>
        <div onclick="$('#q3RevModal').modal('hide')" class="btn btn-icon btn-sm btn-active-icon-primary">
            <span class="svg-icon svg-icon-1">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                </svg>
            </span>
        </div>
    </div>
    <!-- Modal body: Amend organization info -->
    <div class="modal-body py-10 px-lg-17" dir="rtl">
        <div class="scroll-y me-n7 pe-7" id="q3RevModal_scroll" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
            data-kt-scroll-dependencies="#q3RevModal_header"
            data-kt-scroll-wrappers="#q3RevModal_scroll" data-kt-scroll-offset="300px">
            
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">التمويل المحلي</label>
                    <input type="text" class="form-control form-control-solid" 
                        placeholder="أدخل التمويل المحلي" name="local_financing" required 
                        value='{{ $q3Rev->local_financing }}'/>
            </div>

            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">التمويل الأجنبي</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="أدخل التمويل الأجنبي" name="foreign_financing" required 
                    value="{{ $q3Rev->foreign_financing }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">إيرادات المشروع</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="أدخل إيرادات المشروع" name="project_revenue" required 
                    value="{{ $q3Rev->project_revenue }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">الاشتراكات</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="أدخل الاشتراكات" name="subscriptions" required 
                    value="{{ $q3Rev->subscriptions }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">فوائد البنوك</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="أدخل فوائد البنوك" name="bank_interest" required 
                    value="{{ $q3Rev->bank_interest }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">العقارات الثابتة</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="أدخل العقارات الثابتة" name="immoveable_properties" required 
                    value="{{ $q3Rev->immoveable_properties }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">أخرى</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="أدخل الإيرادات الأخرى" name="other" required 
                    value="{{ $q3Rev->other }}"/>
            </div>
        </div>
    </div>
    
    <div class="modal-footer flex-center">
        <button type="reset" onclick="$('#q3RevModal').modal('hide')"
            class="btn btn-light me-3">الغاء</button>
        <button type="submit" id="q3RevModal_submit" class="btn btn-primary">
            <span class="indicator-label">اضافة</span>
        </button>
    </div>
</form>
