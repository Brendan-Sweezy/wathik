<div class="" data-kt-stepper-element="content">
    <div class="w-100">
        <div class="pb-10 pb-lg-15">
            <h2 class="fw-bold d-flex align-items-center text-dark">عنوان الجمعية
            </h2>
        </div>
        <div class="mb-10 fv-row fv-plugins-icon-container">
            <label class="form-label mb-3 required">المحافظة</label>
            <input type="text" class="form-control form-control-lg form-control-solid" name="governorate" placeholder="governorate"
                value="{{ old('governorate') }}" kl_vkbd_parsed="true" required/>
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <div class="mb-10 fv-row row fv-plugins-icon-container">
            <div class="col-6">
                <label class="form-label mb-3 required">اللواء</label>
                <input type="text" class="form-control form-control-lg form-control-solid" name="provenance"
                    placeholder="provenance" value="{{ old('provenance') }}" kl_vkbd_parsed="true" >
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="col-6">
                <label class="form-label mb-3 required">القضاء</label>
                <input type="text" class="form-control form-control-lg form-control-solid" name="district"
                    placeholder="district" value="{{ old('district') }}" kl_vkbd_parsed="true" >
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
        </div>
        <div class="mb-10 fv-row row fv-plugins-icon-container">
            <div class="col-6">
                <label class="form-label mb-3 required">المنطقة</label>
                <input type="text" class="form-control form-control-lg form-control-solid" name="area"
                    placeholder="area" value="{{ old('area') }}" kl_vkbd_parsed="true" >
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="col-6">
                <label class="form-label mb-3 required">الحي</label>
                <input type="text" class="form-control form-control-lg form-control-solid" name="neighborhood"
                    placeholder="neighborhood" value="{{ old('neighborhood') }}" kl_vkbd_parsed="true" required>
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
        </div>
        <div class="mb-10 fv-row fv-plugins-icon-container">
            <label class="form-label mb-3 required">نوع التجمع السكني</label> 
            <select type="text" class="form-control form-control-lg form-control-solid" name="residential_type"
                value="{{ old('residential_type') }}" kl_vkbd_parsed="true" required>
                <option value="" disabled selected>select an option</option>
                <option value="حضر">حضر</option>
                <option value="ريف">ريف</option>
                <option value="بادية">بادية</option>
            </select>
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
    </div>
</div>
