<div class="col-6 mb-5">
    <div class="card card-flush h-xl-100">
        <div class="card-header py-7">
            <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0">
                Quarter One
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
                <div class="col-3">Salaries</div>
                <div class="col">{{ $q1Ex->salaries }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">Depreciations</div>
                <div class="col">{{ $q1Ex->deprications }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">Office Expenses</div>
                <div class="col">{{ $q1Ex->office_expenses }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">Rent</div>
                <div class="col">{{ $q1Ex->rent }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">Maintenance</div>
                <div class="col">{{ $q1Ex->maintenance }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">Other</div>
                <div class="col">{{ $q1Ex->other }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">Total</div>
                <div class="col">{{ $q1Ex->salaries + $q1Ex->deprications + $q1Ex->office_expenses + $q1Ex->rent + $q1Ex->maintenance + $q1Ex->other }}</div>
            </div>
        </div>
    </div>
</div>