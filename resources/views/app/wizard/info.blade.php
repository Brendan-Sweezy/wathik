<div class="current" data-kt-stepper-element="content">
    <div class="w-100">
        <div class="pb-10 pb-lg-15">
            <h2 class="fw-bold d-flex align-items-center text-dark">معلومات الجمعية
            </h2>
        </div>
        <div class="mb-10 fv-row fv-plugins-icon-container">
            <label class="form-label mb-3">اسم الجمعية</label>
            <input type="text" class="form-control form-control-lg form-control-solid" name="orgnization_name"
                placeholder="" value="" kl_vkbd_parsed="true">
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <div class="mb-10 fv-row fv-plugins-icon-container">
            <label class="form-label mb-3">الرقم الوطني</label>
            <input type="number" class="form-control form-control-lg form-control-solid" name="orgnization_national_id"
                placeholder="" value="" kl_vkbd_parsed="true">
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <div class="mb-10 fv-row fv-plugins-icon-container">
            <label class="form-label mb-3">الوزارة المختصة</label>
            <input type="text" class="form-control form-control-lg form-control-solid" name="orgnization_ministry"
                placeholder="" value="" kl_vkbd_parsed="true">
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <div class="mb-10 fv-row fv-plugins-icon-container">
            <label class="form-label mb-3">تاريخ التأسيس</label>
            <input type="datetime-local" class="form-control form-control-lg form-control-solid"
                name="orgnization_founding_date" placeholder="" value="" kl_vkbd_parsed="true">
            <div class="fv-plugins-message-container invalid-feedback"></div>
            <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
            <script>
                    flatpickr("input[type=datetime-local]");
            </script>
        </div>
    </div>

</div>
