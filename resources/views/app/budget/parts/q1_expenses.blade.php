<div class="col-6 mb-5">
    <div class="card card-flush h-xl-100">
        <div class="card-header py-7">
            <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0">
            الربع الأول (كانون ثاني، شباط ،اذار)
            </div>

            <!-- MODAL -->
            <div class="modal fade" id="q1ExModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content">
                        @include('app.budget.modals.q1_expenses')
                    </div>
                </div>
            </div>
            <div class="card-toolbar">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
                    data-bs-target="#q1ExModal">تعديل</button>
            </div>
        </div>

        <!-- CONTENT -->
        <div class="card-body pt-1">
            <div class="row">
                <div class="col-3">رواتب وعلاوات</div>
                <div class="col">{{ $q1Ex->salaries }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">إھتلاكات</div>
                <div class="col">{{ $q1Ex->deprications }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">مصاریف مكتبیة</div>
                <div class="col">{{ $q1Ex->office_expenses }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">إیجار</div>
                <div class="col">{{ $q1Ex->rent }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">صیانة</div>
                <div class="col">{{ $q1Ex->maintenance }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3"><غیرھا- حدد></div>
                <div class="col">{{ $q1Ex->other }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">مجموع المصاریف التشغیلیة</div>
                <div class="col">{{ $q1Ex->salaries + $q1Ex->deprications + $q1Ex->office_expenses + $q1Ex->rent + $q1Ex->maintenance + $q1Ex->other }}</div>
            </div>
        </div>
    </div>
</div>