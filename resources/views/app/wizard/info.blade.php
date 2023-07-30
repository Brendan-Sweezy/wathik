<div class="current" data-kt-stepper-element="content">
    <div class="w-100">
        <div class="pb-10 pb-lg-15">
            <h2 class="fw-bold d-flex align-items-center text-dark">معلومات الجمعية
            </h2>
        </div>
        <div class="mb-10 fv-row fv-plugins-icon-container">
            <label class="form-label mb-3">اسم الجمعية</label>
            <input type="text" class="form-control form-control-lg form-control-solid" name="orgnization_name"
                placeholder="" value="{{ old('orgnization_name') }}" kl_vkbd_parsed="true" required>
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <div class="mb-10 fv-row fv-plugins-icon-container">
            <label class="form-label mb-3">الرقم الوطني</label>
            <input type="number" class="form-control form-control-lg form-control-solid" name="orgnization_national_id"
                placeholder="" value="{{ old('orgnization_national_id') }}" kl_vkbd_parsed="true" required>
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <div class="mb-10 fv-row fv-plugins-icon-container">
            <label class="form-label mb-3">الوزارة المختصة</label>
            <select type="text" class="form-control form-control-lg form-control-solid" name="orgnization_ministry"
                placeholder="" value="{{ old('orgnization_ministry') }}" kl_vkbd_parsed="true" required>
                <option value="وزارة التعليم العالي والبحث العلمي">وزارة التعليم العالي والبحث العلمي</option>
                <option value="وزارة المالية">وزارة المالية</option>
                <option value="وزارة الخارجية وشؤون المغتربين">وزارة الخارجية وشؤون المغتربين</option>
                <option value="وزارة الصناعة و التجارة والتموين">وزارة الصناعة و التجارة والتموين</option>
                <option value="وزارة الداخلية">وزارة الداخلية</option>
                <option value="وزارة الإدارة المحلية">وزارة الإدارة المحلية</option>
                <option value="وزارة التخطيط والتعاون الدولي">وزارة التخطيط والتعاون الدولي</option>
                <option value="وزارة الأشغال العامة والإسكان">وزارة الأشغال العامة والإسكان</option>
                <option value="وزارة التنمية الاجتماعية">وزارة التنمية الاجتماعية</option>
                <option value="وزارة السياحة والآثار">وزارة السياحة والآثار</option>
                <option value="وزارة العمل">وزارة العمل</option>
                <option value="وزارة الزراعة">وزارة الزراعة</option>
                <option value="وزارة الصحة">وزارة الصحة</option>
                <option value="وزارة الأوقاف والشؤون والمقدسات الإسلامية">وزارة الأوقاف والشؤون والمقدسات الإسلامية</option>
                <option value="وزارة الاقتصاد الرقمي والريادة">وزارة الاقتصاد الرقمي والريادة</option>
                <option value="وزارة الثقافة">وزارة الثقافة</option>
                <option value="وزارة الطاقة والثروة المعدنية">وزارة الطاقة والثروة المعدنية</option>
                <option value="وزارة التربية والتعليم">وزارة التربية والتعليم</option>
                <option value="وزارة البيئة">وزارة البيئة</option>
                <option value="وزارة الشؤون السياسية والبرلمانية">وزارة الشؤون السياسية والبرلمانية</option>
                <option value="وزارة الشباب">وزارة الشباب</option>
                <option value="وزارة الإستثمار الأردنية">وزارة الإستثمار الأردنية</option>
            </select>
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <div class="mb-10 fv-row fv-plugins-icon-container">
            <label class="form-label mb-3">تاريخ التأسيس</label>
            <input type="datetime-local" class="form-control form-control-lg form-control-solid"
                name="orgnization_founding_date" placeholder="" value="{{ old('orgnization_founding_date') }}" kl_vkbd_parsed="true">
            <div class="fv-plugins-message-container invalid-feedback"></div>
            <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
            <script>
                    flatpickr("input[type=datetime-local]");
            </script>
        </div>
    </div>

</div>
