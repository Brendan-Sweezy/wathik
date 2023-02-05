<form class="form" action="{{ url('projects/save') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="step" value="{{ $step }}" />
    <div class="fv-row mb-7" style="direction: rtl">
        <label class="required fs-6 fw-semibold mb-2">اسم المشروع</label>
        <input type="text" class="form-control form-control-solid" placeholder="" name="name" required />
    </div>
    <div class="fv-row mb-7" style="direction: rtl">
        <label class="required fs-6 fw-semibold mb-2">تاريخ المشروع</label>
        <input type="text" class="form-control form-control-solid" placeholder="" name="date" required />
    </div>
    <div class="fv-row mb-7" style="direction: rtl">
        <label class="required fs-6 fw-semibold mb-2">عنوان المشروع</label>
        <input type="text" class="form-control form-control-solid" placeholder="" name="title" required />
    </div>
    <div class="fv-row mb-7" style="direction: rtl">
        <label class="required fs-6 fw-semibold mb-2">حالة المشروع</label>
        <input type="text" class="form-control form-control-solid" placeholder="" name="status" required />
    </div>
    <div class="fv-row mb-7" style="direction: rtl">
        <label class="required fs-6 fw-semibold mb-2">عدد المستفيدين</label>
        <input type="text" class="form-control form-control-solid" placeholder="" name="beneficiaries" required />
    </div>
    <button type="submit" class="btn btn-primary">
        <span class="indicator-label">التالي</span>
    </button>
</form>
