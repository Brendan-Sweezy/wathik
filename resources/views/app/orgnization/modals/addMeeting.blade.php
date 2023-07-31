<form class="form" action="{{ url('orgnization/authority/addMeeting') }}" method="POST" id="addMeetingForm">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="modal-header" id="kt_modal_add_customer_header" dir="rtl">
        <h2 class="fw-bold">إضافة إجتماع</h2>
        <div onclick="$('#addMeeting').modal('hide')" class="btn btn-icon btn-sm btn-active-icon-primary">
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
    <div class="modal-body py-10 px-lg-17" dir="rtl">
        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
            data-kt-scroll-dependencies="#kt_modal_add_customer_header"
            data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">

            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">الرقم</label>
                <input type="number" class="form-control form-control-solid" name="num" required />
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">تاریخ انعقاد اجتماع الھیئة العامة</label>
                <input type="datetime-local" class="form-control" name="date" placeholder="يرجى الضغط لاختيار التاريخ" required />
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">نوع الاجتماع عادي / غیر عادي </label>
                <input type="text" class="form-control form-control-solid"  name="type" required />
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">عدد الحضور</label>
                <input type="number" class="form-control form-control-solid" name="attendees" required />
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">عدد الانابة</label>
                <input type="number" class="form-control form-control-solid" name="alternate_number"
                    required />
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">اهم القرارات</label>
                <input type="text" class="form-control form-control-solid" placeholder="decisions" name="decisions"
                    required />
            </div>
        </div>
    </div>
    
    <div class="modal-footer flex-center">
        <button type="reset" onclick="$('#addMeeting').modal('hide')"
            class="btn btn-light me-3">الغاء</button>
        <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
            <span class="indicator-label">اضافة</span>
        </button>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("input[type=datetime-local]");

    document.getElementById('addMeetingForm').addEventListener('submit', function (event) {
        // Prevent the form from submitting by default
        event.preventDefault();

        // Get the form element
        var form = event.target;

        // Perform manual validation by checking if the required fields are not empty
        var numInput = form.elements.num;
        var dateInput = form.elements.date;
        var typeInput = form.elements.type;
        var attendeesInput = form.elements.attendees;
        var alternateNumberInput = form.elements.alternate_number;
        var decisionsInput = form.elements.decisions;

        if (
            numInput.value.trim() === '' ||
            dateInput.value.trim() === '' ||
            typeInput.value.trim() === '' ||
            attendeesInput.value.trim() === '' ||
            alternateNumberInput.value.trim() === '' ||
            decisionsInput.value.trim() === ''
        ) {
            alert('Please fill in all required fields.');
            return;
        }

        // If all fields are filled, submit the form
        form.submit();
    });
</script>