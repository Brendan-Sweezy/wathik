<form class="form" action="{{ url('budget/amendEx/2') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="modal-header" id="q2ExModal_header" dir="rtl">
        <h2 class="fw-bold">تعديل مصاريف الربع الثاني</h2>
        <div onclick="$('#q2ExModal').modal('hide')" class="btn btn-icon btn-sm btn-active-icon-primary">
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
        <div class="scroll-y me-n7 pe-7" id="q2ExModal_scroll" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
            data-kt-scroll-dependencies="#q2ExModal_header"
            data-kt-scroll-wrappers="#q2ExModal_scroll" data-kt-scroll-offset="300px">
            
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">رواتب وعلاوات</label>
                    <input type="text" class="form-control form-control-solid" 
                        placeholder="أدخل قيمة الرواتب" name="salaries" required 
                        value='{{ $q2Ex->salaries }}'/>
            </div>

            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">إھتلاكات</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="أدخل قيمة الاستهلاكات" name="deprications" required 
                    value="{{ $q2Ex->deprications }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">مصاریف مكتبیة</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="أدخل قيمة مصروفات المكتب" name="office_expenses" required 
                    value="{{ $q2Ex->office_expenses }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">إیجار</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="أدخل قيمة الإيجار" name="rent" required 
                    value="{{ $q2Ex->rent }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">صیانة</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="أدخل قيمة الصيانة" name="maintenance" required 
                    value="{{ $q2Ex->maintenance }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2"><غیرھا- حدد></label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="أدخل قيمة المصروفات الأخرى" name="other" required 
                    value="{{ $q2Ex->other }}"/>
            </div>
        </div>
    </div>
    
    <div class="modal-footer flex-center">
        <button type="reset" onclick="$('#q2ExModal').modal('hide')"
            class="btn btn-light me-3">الغاء</button>
        <button type="submit" id="q2ExModal_submit" class="btn btn-primary">
            <span class="indicator-label">اضافة</span>
        </button>
    </div>
</form>
