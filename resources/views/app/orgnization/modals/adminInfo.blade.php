<form class="form" action="{{ url('orgnization/managment/amendAdminInfo') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="modal-header" id="kt_modal_add_customer_header" dir="rtl">
        <h2 class="fw-bold">تعديل الهيئة الإدارية</h2>
        <div onclick="$('#adminInfo').modal('hide')" class="btn btn-icon btn-sm btn-active-icon-primary">
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

    <!-- Modal body: Amend board info -->
    <div class="modal-body py-10 px-lg-17" dir="rtl">
        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
            data-kt-scroll-dependencies="#kt_modal_add_customer_header"
            data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
            
            

            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">عدد أعضاء الهية الإدارية الواردة في النظام الأساسي</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="إضغط هنا  " name="mentioned_members" required
                    value='{{ $mentioned_members->info }}'/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">النصاب القانوني</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="إضغط هنا  " name="quorum" required
                    value='{{ $quorum->info }}'/>
            </div>

            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">مدة الھیئة الإداریة بالسنوات</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="إضغط هنا  " name="term" required
                    value='{{ $term->info }}'/>
            </div>

            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">تاريخ الانتخاب</label>
                
                <input type="datetime-local" class="form-control" name="election_date" placeholder="يرجى الضغط لاختيار التاريخ " value='{{ $election_date->info }}' required />
            </div>
            


        </div>
    </div>
    
    <div class="modal-footer flex-center">
        <button type="reset" onclick="$('#adminInfo').modal('hide')"
            class="btn btn-light me-3">الغاء</button>
        <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
            <span class="indicator-label">اضافة</span>
        </button>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("input[type=datetime-local]");
</script>