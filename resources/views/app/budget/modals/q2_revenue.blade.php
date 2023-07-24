<form class="form" action="{{ url('budget/amendRev/2') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="modal-header" id="q2RevModal_header" dir="rtl">
        <h2 class="fw-bold">تعديل إيرادات الربع الثاني</h2>
        <div onclick="$('#q2RevModal').modal('hide')" class="btn btn-icon btn-sm btn-active-icon-primary">
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
        <div class="scroll-y me-n7 pe-7" id="q2RevModal_scroll" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
            data-kt-scroll-dependencies="#q2RevModal_header"
            data-kt-scroll-wrappers="#q2RevModal_scroll" data-kt-scroll-offset="300px">
            
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">التمويل المحلي</label>
                    <input type="text" class="form-control form-control-solid" 
                        placeholder="أدخل قيمة التمويل المحلي" name="local_financing" required 
                        value='{{ $q2Rev->local_financing }}'/>
            </div>

            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">التمويل الأجنبي</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="أدخل قيمة التمويل الأجنبي" name="foreign_financing" required 
                    value="{{ $q2Rev->foreign_financing }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">إيرادات المشاريع</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="أدخل قيمة إيرادات المشاريع" name="project_revenue" required 
                    value="{{ $q2Rev->project_revenue }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">الاشتراكات</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="أدخل قيمة الاشتراكات" name="subscriptions" required 
                    value="{{ $q2Rev->subscriptions }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">فائدة البنوك</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="أدخل قيمة فائدة البنوك" name="bank_interest" required 
                    value="{{ $q2Rev->bank_interest }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">الأملاك الثابتة</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="أدخل قيمة الأملاك الثابتة" name="immoveable_properties" required 
                    value="{{ $q2Rev->immoveable_properties }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">أخرى</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="أدخل قيمة الإيرادات الأخرى" name="other" required 
                    value="{{ $q2Rev->other }}"/>
            </div>
        </div>
    </div>
    
    <div class="modal-footer flex-center">
        <button type="reset" onclick="$('#q2RevModal').modal('hide')"
            class="btn btn-light me-3">الغاء</button>
        <button type="submit" id="q2RevModal_submit" class="btn btn-primary">
            <span class="indicator-label">اضافة</span>
        </button>
    </div>
</form>
