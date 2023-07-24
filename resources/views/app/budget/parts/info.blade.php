<div class="col-6 mb-5">
    <div class="card card-flush h-xl-100">
        <div class="card-header py-7">
            <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0">
                المعلومات
            </div>

            <!-- MODAL -->
            <div class="modal fade" id="infoModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content">
                        @include('app.budget.modals.information')
                    </div>
                </div>
            </div>
            <div class="card-toolbar">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
                    data-bs-target="#infoModal">تعديل</button>
            </div>
        </div>

        <!-- CONTENT -->
        <div class="card-body pt-1">
            <div class="row">
                <div class="col-3">الرصید في بدایة العام</div>
                <div class="col">
                    @foreach ($orgnization->info as $info)
                        @if ($info->type == 'beginning_balance')
                            {{ $info->info }}
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">الرصید في نھایة العام</div>
                <div class="col">
                    {{ $beginning_balance + $total_rev - $total_ex }}
                </div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">اسم المحاسب القانوني (مدقق الحسابات)/ شركة تدقیق الحسابات</div>
                <div class="col">
                    @foreach ($orgnization->info as $info)
                        @if ($info->type == 'auditor')
                            {{ $info->info }}
                        @endif
                    @endforeach
                </div>
            </div>
            
        </div>
    </div>
</div>