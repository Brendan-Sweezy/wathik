<form class="form" action="{{ url('projects/delete/' . $id )}}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="project_id" value="{{ $id }}" />
    <div class="modal-header" id="kt_modal_add_customer_header" dir="rtl">
        <h2 class="fw-bold">حذف هذا المشروع بشكل دائم</h2>
        <div onclick="$('#deleteProject{{ $id }}').modal('hide')" class="btn btn-icon btn-sm btn-active-icon-primary">
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
    <!-- Modal body: Amend participant info -->
    <div class="modal-body py-10 px-lg-17" dir="rtl">
        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
            data-kt-scroll-dependencies="#kt_modal_add_customer_header"
            data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
            <div class="fv-row mb-7">
            هل انت متاكد من الحذف ؟ علما انه عند الحذف لا يمكن اعادته
                
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="confirmCheckbox">
                <label class="form-check-label" for="confirmCheckbox">اوافق على الحذف بشكل دائم. علما انه عند الحذف لا يمكن اعادته</label>
            </div>
        </div>
    </div>
    
    <div class="modal-footer flex-center">
        <button type="reset" onclick="$('#deleteProject{{ $id }}').modal('hide')"
            class="btn btn-primary me-3">الغاء</button>
        <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-light" disabled>
            <a href="{{ url('projects/deleteProject/' . $project->id) }}" class="menu-link px-3"
                data-kt-customer-table-filter="delete_row">تأكيد</a>
        </button>
    </div>

    
</form>


<script>
    document.getElementById('confirmCheckbox').addEventListener('change', function() {
        const confirmButton = document.getElementById('kt_modal_add_customer_submit');
        confirmButton.disabled = !this.checked;
    });
</script>

