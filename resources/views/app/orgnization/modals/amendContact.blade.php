<form class="form" action="{{ url('orgnization/amendContact') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="modal-header" id="infoModal_header" dir="rtl">
        <h2 class="fw-bold">amend contact information</h2>
        <div onclick="$('#amendContact').modal('hide')" class="btn btn-icon btn-sm btn-active-icon-primary">
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

    <!-- Modal body: Amend contact info -->
    <div class="modal-body py-10 px-lg-17" dir="rtl">
        <div class="scroll-y me-n7 pe-7" id="infoModal_scroll" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
            data-kt-scroll-dependencies="#infoModal_header"
            data-kt-scroll-wrappers="#infoModal_scroll" data-kt-scroll-offset="300px">
            
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">Email</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="Email" name="email" required 
                    value="{{ $orgEmail->contact }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">phone </label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder=" phone" name="phone" required 
                    value="{{ $orgPhone->contact }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class=" fs-6 fw-semibold mb-2">secondary phone </label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="secondary phone" name="mobile" required 
                    value="{{ $orgMobile->contact }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class=" fs-6 fw-semibold mb-2">mail </label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="mail" name="mail" required 
                    value="{{ $orgMail->contact }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class=" fs-6 fw-semibold mb-2">zip code</label>
                <input type="number" class="form-control form-control-solid" 
                    placeholder="zip code" name="zipcode" required 
                    value="{{ $orgZipcode->contact }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class=" fs-6 fw-semibold mb-2">website</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="website" name="website" required 
                    value="{{ $orgWebsite->contact }}"/>
            </div>
        </div>
    </div>

    <!--begin::Display errors-->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!--end::Display errors-->
    <input type="hidden" name="edit_contact" value="{{ session('edit_contact') }}">

    
    <div class="modal-footer flex-center">
        <button type="reset" onclick="$('#amendContact').modal('hide')"
            class="btn btn-light me-3">الغاء</button>
        <button type="submit" id="infoModal_submit" class="btn btn-primary">
            <span class="indicator-label">اضافة</span>
        </button>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("input[type=datetime-local]");
</script>