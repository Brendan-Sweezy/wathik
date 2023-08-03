<form class="form" action="{{ url('orgnization/amendAddress') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="modal-header" id="infoModal_header" dir="rtl">
        <h2 class="fw-bold">amend address information</h2>
        <div onclick="$('#amendAddress').modal('hide')" class="btn btn-icon btn-sm btn-active-icon-primary">
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

    <!-- Modal body: Amend address info -->
    <div class="modal-body py-10 px-lg-17" dir="rtl">
        <div class="scroll-y me-n7 pe-7" id="infoModal_scroll" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
            data-kt-scroll-dependencies="#infoModal_header"
            data-kt-scroll-wrappers="#infoModal_scroll" data-kt-scroll-offset="300px">
            
            <div class="fv-row mb-7 ">
                <label class="required fs-6 fw-semibold mb-2">governorate</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="governorate" name="governorate" required 
                    value="{{ $address->governorate }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">provenance</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder=" provenance" name="provenance" required 
                    value="{{ $address->provenance }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">district</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="district" name="district" required 
                    value="{{ $address->district }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">area</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="area" name="area" required 
                    value="{{ $address->area }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">neighborhood</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="neighborhood" name="neighborhood" required 
                    value="{{ $address->neighborhood }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">residential type</label>
                <select type="text" class="form-control form-control-lg form-control-solid" name="residential_type"
                    value="{{ $address->neighborhood }}" required>
                    <option value="" disabled selected>select an option</option>
                    <option value="حضر">حضر</option>
                    <option value="ريف">ريف</option>
                    <option value="بادية">بادية</option>
                </select>
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
    <input type="hidden" name="edit_address" value="{{ session('edit_address') }}">

    
    <div class="modal-footer flex-center">
        <button type="reset" onclick="$('#amendAddress').modal('hide')"
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