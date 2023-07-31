<form class="form" action="{{ url('orgnization/authority/amendMeeting/' . $meeting->id)}}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="modal-header" id="kt_modal_add_customer_header" dir="rtl">
        <h2 class="fw-bold">التعديل على إجتماع </h2>
        <div onclick="$('#editMeeting{{ $meeting->id }}').modal('hide')" class="btn btn-icon btn-sm btn-active-icon-primary">
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
    <!-- Modal body: Amend meeting info -->
    <div class="modal-body py-10 px-lg-17" dir="rtl">
        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
            data-kt-scroll-dependencies="#kt_modal_add_customer_header"
            data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">الرقم</label>
                <input type="number" class="form-control form-control-solid" 
                    placeholder="Enter number" name="num" value='{{ $meeting->meeting_num }}' required/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">تاریخ انعقاد اجتماع الھیئة العام</label>
                <input type="datetime-local" class="form-control" name="date" value='{{ $meeting->date }}' placeholder="Click to select date" required />
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">نوع الاجتماع عادي / غیر عادي </label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="Enter type" name="type" required value='{{ $meeting->type }}'/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">عدد الحضور</label>
                <input type="number" class="form-control form-control-solid" 
                    placeholder="Enter number of attendees" name="attendees" required value='{{ $meeting->attendees }}'/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">عدد الانابة</label>
                <input type="number" class="form-control form-control-solid" 
                    placeholder="Enter number" name="alternate_number" required value='{{ $meeting->alternate }}'/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">اهم القرارات</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="Enter important decisions" name="decisions" required value='{{ $meeting->decisions }}'/>
            </div>
        </div>
    </div>
    
    <div class="modal-footer flex-center">
        <button type="reset" onclick="$('#editMeeting{{ $meeting->id }}').modal('hide')"
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