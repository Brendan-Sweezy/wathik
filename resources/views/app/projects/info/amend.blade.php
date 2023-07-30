<form class="form" action="{{ url('projects/info/amend/' . $project->id)}}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="project_id" value="{{ $id }}" />
    <div class="modal-header" id="kt_modal_add_customer_header" dir="rtl">
        <h2 class="fw-bold">Amend Project Information</h2>
        <div onclick="$('#amendProject{{ $project->id }}').modal('hide')" class="btn btn-icon btn-sm btn-active-icon-primary">
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
    <!-- Modal body: Amend event info -->
    <div class="modal-body py-10 px-lg-17" dir="rtl">
        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
            data-kt-scroll-dependencies="#kt_modal_add_customer_header"
            data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">project name</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="Enter name" name="name" required 
                    value="{{ $project->name }}"/>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">date</label>
                <input type="datetime-local" class="form-control" name="date" 
                    placeholder="click to select date" value='{{ $project->date }}' required />
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">title</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="Enter title" name="title" required 
                    value="{{ $project->title }}"/>
            </div>
            

            <div class="fv-row mb-7" style="direction: rtl">
        <label class="required fs-6 fw-semibold mb-2">حالة المشروع</label>
        <select type="text" class="form-control form-control-solid" placeholder="select project status" value="{{ $project->status }}" name="status" required>
            <option value="لم يبدأ ">لم يبدأ</option>
            <option value="في تَقَدم">في تَقَدم</option>
            <option value="مكتمل">مكتمل</option>
            <option value="Upcoming">القادمة</option>
        </select>
    </div>

            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">budget</label>
                <input type="text" class="form-control form-control-solid" 
                    placeholder="Enter budget" name="budget" required 
                    value="{{ $project->budget }}"/>
            </div>
            
        </div>
    </div>
    
    <div class="modal-footer flex-center">
        <button type="reset" onclick="$('#amendProject{{ $project->id }}').modal('hide')"
            class="btn btn-light me-3">الغاء</button>
        <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
            <span class="indicator-label">اضافة</span>
        </button>
    </div>

    
</form>



<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("input[type=datetime-local]");
</script>