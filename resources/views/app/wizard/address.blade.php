<div class="" data-kt-stepper-element="content">
    <div class="w-100">
        <div class="pb-10 pb-lg-15">
            <h2 class="fw-bold d-flex align-items-center text-dark">عنوان الجمعية
            </h2>
        </div>
        <div class="mb-10 fv-row fv-plugins-icon-container">
            <label class="form-label mb-3">المحافظة</label>
            <input type="text" class="form-control form-control-lg form-control-solid" name="governorate" placeholder=""
                value="{{ old('governorate') }}" kl_vkbd_parsed="true" required>
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <div class="mb-10 fv-row row fv-plugins-icon-container">
            <div class="col-6">
                <label class="form-label mb-3">اللواء</label>
                <input type="text" class="form-control form-control-lg form-control-solid" name="provenance"
                    placeholder="" value="{{ old('provenance') }}" kl_vkbd_parsed="true" required>
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="col-6">
                <label class="form-label mb-3">القضاء</label>
                <input type="text" class="form-control form-control-lg form-control-solid" name="district"
                    placeholder="" value="{{ old('district') }}" kl_vkbd_parsed="true" required>
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
        </div>
        <div class="mb-10 fv-row row fv-plugins-icon-container">
            <div class="col-6">
                <label class="form-label mb-3">المنطقة</label>
                <input type="text" class="form-control form-control-lg form-control-solid" name="area"
                    placeholder="" value="{{ old('area') }}" kl_vkbd_parsed="true" required>
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="col-6">
                <label class="form-label mb-3">الحي</label>
                <input type="text" class="form-control form-control-lg form-control-solid" name="neighborhood"
                    placeholder="" value="{{ old('neighborhood') }}" kl_vkbd_parsed="true" required>
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
        </div>
        <div class="mb-10 fv-row fv-plugins-icon-container">
            <label class="form-label mb-3">نوع التجمع السكني</label> 
            <select type="text" class="form-control form-control-lg form-control-solid" name="residential_type"
                placeholder="" value="{{ old('residential_type') }}" kl_vkbd_parsed="true" required>
                <option value="volvo">حضر</option>
                <option value="saab">ريف</option>
                <option value="fiat">بادية</option>
            </select>
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
    </div>
</div>
