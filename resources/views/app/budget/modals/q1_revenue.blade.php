<form class="form" action="{{ url('budget/amendRev/1') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="modal-header" id="q1RevModal_header" dir="rtl">
        <h2 class="fw-bold">تعديل إيرادات الربع الأول</h2>
        <div onclick="$('#q1RevModal').modal('hide')" class="btn btn-icon btn-sm btn-active-icon-primary">
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
        <div class="scroll-y me-n7 pe-7" id="q1RevModal_scroll" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
            data-kt-scroll-dependencies="#q1RevModal_header"
            data-kt-scroll-wrappers="#q1RevModal_scroll" data-kt-scroll-offset="300px">
            
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">تمویل محلي (حدد)</label>
                    <input type="text" class="form-control form-control-solid" 
                        placeholder="أدخل التمويل المحلي" name="local_financing" required 
                        value='{{ $q1Rev->local_financing }}'/>
            </div>

            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">تمویل أجنبي(حدد)</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="أدخل التمويل الأجنبي" name="foreign_financing" required 
                    value="{{ $q1Rev->foreign_financing }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">أرباح مشاریع الجمعیة</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="أدخل إيرادات المشروع" name="project_revenue" required 
                    value="{{ $q1Rev->project_revenue }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">إشتراكات أعضاء الجمعیة</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="أدخل الاشتراكات" name="subscriptions" required 
                    value="{{ $q1Rev->subscriptions }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">فائدة بنكیة</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="أدخل فوائد البنوك" name="bank_interest" required 
                    value="{{ $q1Rev->bank_interest }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">اموال غیر منقولة (عقار، سیارات،....)</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="أدخل العقارات الثابتة" name="immoveable_properties" required 
                    value="{{ $q1Rev->immoveable_properties }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">>غیرھا- حدد<</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="أدخل الإيرادات الأخرى" name="other" required 
                    value="{{ $q1Rev->other }}"/>
            </div>
        </div>
    </div>
    
    <div class="modal-footer flex-center">
        <button type="reset" onclick="$('#q1RevModal').modal('hide')"
            class="btn btn-light me-3">الغاء</button>
        <button type="submit" id="q1RevModal_submit" class="btn btn-primary">
            <span class="indicator-label">اضافة</span>
        </button>
    </div>
</form>
