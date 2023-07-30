<div class="" data-kt-stepper-element="content">
    <div class="w-100">
        <div class="pb-10 pb-lg-15">
            <h2 class="fw-bold d-flex align-items-center text-dark">CBO معلومات التواصل
            </h2>
        </div>
        <div class="mb-10 fv-row fv-plugins-icon-container">
            <label class="form-label mb-3">البريد الالكتروني</label>
            <input type="email" class="form-control form-control-lg form-control-solid" name="email" placeholder=""
                value="{{ old('email') }}" kl_vkbd_parsed="true" required>
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <div class="mb-10 fv-row fv-plugins-icon-container">
            <label class="form-label mb-3">رقم الهاتف</label>
            <input type="tel" class="form-control form-control-lg form-control-solid" name="phone" placeholder=""
                value="{{ old('phone') }}" kl_vkbd_parsed="true" required>
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <div class="mb-10 fv-row fv-plugins-icon-container">
            <label class="form-label mb-3">الهاتف النقال secondary phone</label>
            <input type="tel" class="form-control form-control-lg form-control-solid" name="mobile" placeholder=""
                value="{{ old('mobile') }}" kl_vkbd_parsed="true">
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <div class="mb-10 fv-row row fv-plugins-icon-container">
            <div class="col-6">
                <label class="form-label mb-3">صندوق البريد</label>
                <input type="text" class="form-control form-control-lg form-control-solid" name="mail"
                    placeholder="" value="{{ old('mail') }}" kl_vkbd_parsed="true" required>
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="col-6">
                <label class="form-label mb-3">الرمز البريدي</label>
                <input type="number" class="form-control form-control-lg form-control-solid" name="zipcode"
                    placeholder="" value="{{ old('zipcode') }}" kl_vkbd_parsed="true" required>
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
        </div>
        <div class="mb-10 fv-row fv-plugins-icon-container">
            <label class="form-label mb-3">الموقع الالكتروني</label>
            <input type="url" class="form-control form-control-lg form-control-solid" name="website" placeholder=""
                value="{{ old('website') }}" kl_vkbd_parsed="true" required>
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
    </div>
</div>
