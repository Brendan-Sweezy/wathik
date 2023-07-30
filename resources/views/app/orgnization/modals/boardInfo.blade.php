<form class="form" action="{{ url('orgnization/managment/addMember') }}" method="POST" id="addMemberForm">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="modal-header" id="kt_modal_add_customer_header" dir="rtl">
        <h2 class="fw-bold">إضافة عضو مجلس إدارة</h2>
        <div onclick="$('#boardInfo').modal('hide')" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                <label class="required fs-6 fw-semibold mb-2">الاسم من أربعة مقاطع</label>
                <input type="text" class="form-control form-control-solid" placeholder="إضغط هنا" name="name" required />
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">الرقم الوطني</label>
                <input type="text" class="form-control form-control-solid" placeholder="إضغط هنا" name="national_id" required />
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">الجنس</label>
                <select type="text" class="form-control form-control-solid" placeholder="إضغط هنا" name="gender" required>
                    <option value='male'>Male</option>
                    <option value='female'>Female</option>
                </select>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">تاريخ الميلاد</label>
                <input type="datetime-local" class="form-control" name="birthday" placeholder="يرجى الضغط لاختيار التاريخ" required />
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">العمل/المهنة</label>
                <input type="text" class="form-control form-control-solid" placeholder="إضغط هنا" name="work"
                    required />
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">الدرجة العملية</label>
                <input type="text" class="form-control form-control-solid" placeholder="إضغط هنا" name="degree"
                    required />
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">التخصص</label>
                <input type="text" class="form-control form-control-solid" placeholder="إضغط هنا" name="major"
                    required />
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">رقم الهاتف</label>
                <input type="text" class="form-control form-control-solid" placeholder="إضغط هنا" name="phone"
                    required />
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">تاريخ انتخاب في الهيئة الإدارية</label>
                <input type="datetime-local" class="form-control" name="election_date" placeholder="يرجى الضغط لاختيار التاريخ" required />
            </div>
        </div>
    </div>
    
    <div class="modal-footer flex-center">
        <button type="reset" onclick="$('#boardInfo').modal('hide')"
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


<script>
    document.getElementById('addMemberForm').addEventListener('submit', function (event) {
        // Prevent the form from submitting by default
        event.preventDefault();

        // Get the form element
        var form = event.target;

        // Perform manual validation by checking if the required fields are not empty
        var nameInput = form.elements.name;
        var nationalIdInput = form.elements.national_id;
        var genderInput = form.elements.gender;
        var birthdayInput = form.elements.birthday;
        var workInput = form.elements.work;
        var degreeInput = form.elements.degree;
        var majorInput = form.elements.major;
        var phoneInput = form.elements.phone;
        var electionDateInput = form.elements.election_date;

        if (
            nameInput.value.trim() === '' ||
            nationalIdInput.value.trim() === '' ||
            genderInput.value.trim() === '' ||
            birthdayInput.value.trim() === '' ||
            workInput.value.trim() === '' ||
            degreeInput.value.trim() === '' ||
            majorInput.value.trim() === '' ||
            phoneInput.value.trim() === '' ||
            electionDateInput.value.trim() === ''
        ) {
            alert('Please fill in all required fields.');
            return;
        }

        // If all fields are filled, submit the form
        form.submit();
    });
</script>