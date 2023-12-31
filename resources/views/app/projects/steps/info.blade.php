<form class="form" action="{{ url('projects/save') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="step" value="{{ $step }}" />
    <div class="fv-row mb-7" style="direction: rtl">
        <label class="required fs-6 fw-semibold mb-2">اسم المشروع</label>
        <input type="text" class="form-control form-control-solid" placeholder="إضغط هنا" name="name" required />
    </div>
    <div class="fv-row mb-7" style="direction: rtl">
                <label class="required fs-6 fw-semibold mb-2">يرجى الضغط لاختيار التاريخ</label>
                <input type="datetime-local" class="form-control" name="date" 
                    placeholder="تاريخ المشروع" required />
            </div>
    <div class="fv-row mb-7" style="direction: rtl">
        <label class="required fs-6 fw-semibold mb-2">مكان تنفیذ المشروع /النشاط</label>
        <input type="text" class="form-control form-control-solid" placeholder="إضغط هنا" name="title" required />
    </div>
    <div class="fv-row mb-7" style="direction: rtl">
        <label class="required fs-6 fw-semibold mb-2">حالة المشروع / النشاط</label>
        <select type="text" class="form-control form-control-solid" name="status" required>
            <option value="لم يبدأ ">لم يبدأ</option>
            <option value="في تَقَدم">قائم</option>
            <option value="مكتمل">منتھي</option>
            <option value="Upcoming">القادمة</option>
        </select>
    </div>
    
    <div class="fv-row mb-7" style="direction: rtl">
        <label class="required fs-6 fw-semibold mb-2">ميزانية</label>
        <input type="number" class="form-control form-control-solid" placeholder="إضغط هنا" name="budget" required />
    </div>
    <button type="submit" class="btn btn-primary">
        <span class="indicator-label">التالي</span>
    </button>
</form>



<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("input[type=datetime-local]");
</script>
