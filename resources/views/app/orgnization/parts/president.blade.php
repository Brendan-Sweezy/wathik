<div class="card card-flush h-xl-100" dir="rtl">
    <div class="card-header py-7">
        <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0">
            إدارة الجمعية
        </div>

        <!-- MODAL -->
        <div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    @include('app.orgnization.modals.boardPresident')
                </div>
            </div>
        </div>
        <div class="card-toolbar">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
                data-bs-target="#kt_modal_add_customer">تعديل</button>
        </div> 
    </div>

    <!-- CONTENT -->
    <div class="card-body pt-1">
        <div class="row">
            <div class="col-3">الرئيس الفخري</div>
            <div class="col">
                @foreach ($orgnization->info as $info)
                    @if ($info->type == 'president')
                        {{ $info->info }}
                    @endif
                @endforeach
            </div>
        </div>
        <div class="separator separator-dashed my-3"></div>
        <div class="row">
            <div class="col-3">الرقم الوطني</div>
            <div class="col">
                @foreach ($orgnization->info as $info)
                    @if ($info->type == 'president_national_id')
                        {{ $info->info }}
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var triggerEditButton = {!! json_encode(session('trigger_edit_button')) !!};
        if (triggerEditButton) {
            $('#kt_modal_add_customer').modal('show');
        }
    });
</script>