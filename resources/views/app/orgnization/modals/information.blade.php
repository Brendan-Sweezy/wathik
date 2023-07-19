<form class="form" action="{{ url('orgnization/amendInfo') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="modal-header" id="infoModal_header" dir="rtl">
        <h2 class="fw-bold">Amend Organization Information</h2>
        <div onclick="$('#infoModal').modal('hide')" class="btn btn-icon btn-sm btn-active-icon-primary">
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

    <!-- Modal body: Amend organization info -->
    <div class="modal-body py-10 px-lg-17" dir="rtl">
        <div class="scroll-y me-n7 pe-7" id="infoModal_scroll" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
            data-kt-scroll-dependencies="#infoModal_header"
            data-kt-scroll-wrappers="#infoModal_scroll" data-kt-scroll-offset="300px">
            
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">Organization name</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="Enter name" name="name" required 
                    value="{{ $orgnization->name }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">ID number</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="Enter ID number" name="national_id" required 
                    value="{{ $orgnization->national_id }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">Ministry</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="Enter ministry" name="ministry" required 
                    value="{{ $orgnization->ministry }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">Founding date</label>
                <input type="datetime-local" class="form-control" name="founding_date" placeholder="Click to select founding date"  value='{{ $orgnization->founding_date }}' required />
            </div>
        </div>
    </div>
    
    <div class="modal-footer flex-center">
        <button type="reset" onclick="$('#infoModal').modal('hide')"
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