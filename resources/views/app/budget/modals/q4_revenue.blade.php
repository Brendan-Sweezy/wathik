<form class="form" action="{{ url('budget/amendRev/4') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="modal-header" id="q4RevModal_header" dir="rtl">
        <h2 class="fw-bold">تعديل إيرادات الربع الرابع</h2>
        <div onclick="$('#q4RevModal').modal('hide')" class="btn btn-icon btn-sm btn-active-icon-primary">
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

    <!-- Modal body: Amend organization info -->
    <div class="modal-body py-10 px-lg-17" dir="rtl">
        <div class="scroll-y me-n7 pe-7" id="q4RevModal_scroll" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
            data-kt-scroll-dependencies="#q4RevModal_header"
            data-kt-scroll-wrappers="#q4RevModal_scroll" data-kt-scroll-offset="300px">
            
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">تمویل محلي (حدد)</label>
                    <input type="text" class="form-control form-control-solid" 
                        placeholder="Enter local financing" name="local_financing" required 
                        value='{{ $q4Rev->local_financing }}'/>
            </div>

            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">تمویل أجنبي(حدد)</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="Enter foreign financing" name="foreign_financing" required 
                    value="{{ $q4Rev->foreign_financing }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">أرباح مشاریع الجمعیة</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="Enter project revenue" name="project_revenue" required 
                    value="{{ $q4Rev->project_revenue }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">إشتراكات أعضاء الجمعیة</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="Enter subscriptions" name="subscriptions" required 
                    value="{{ $q4Rev->subscriptions }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">فائدة بنكیة</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="Enter bank interest" name="bank_interest" required 
                    value="{{ $q4Rev->bank_interest }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">اموال غیر منقولة (عقار، سیارات،....)</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="Enter immoveable properties" name="immoveable_properties" required 
                    value="{{ $q4Rev->immoveable_properties }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">>غیرھا- حدد<</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="Enter other revenue" name="other" required 
                    value="{{ $q4Rev->other }}"/>
            </div>
        </div>
    </div>
    
    <div class="modal-footer flex-center">
        <button type="reset" onclick="$('#q4RevModal').modal('hide')"
            class="btn btn-light me-3">الغاء</button>
        <button type="submit" id="q4RevModal_submit" class="btn btn-primary">
            <span class="indicator-label">اضافة</span>
        </button>
    </div>
</form>
