<div class="col-6 mb-5">
    <div class="card card-flush h-xl-100">
        <div class="card-header py-7">
            <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0">
                Quarter Three
            </div>

            <!-- MODAL -->
            <div class="modal fade" id="q3ExModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content">
                        @include('app.budget.modals.q3_expenses')
                    </div>
                </div>
            </div>
            <div class="card-toolbar">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
                    data-bs-target="#q3ExModal">تعديل</button>
            </div>
        </div>

        <!-- CONTENT -->
        <div class="card-body pt-1">
            <div class="row">
                <div class="col-3">Salaries</div>
                <div class="col">{{ $q3Ex->salaries }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">Depreciations</div>
                <div class="col">{{ $q3Ex->deprications }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">Office Expenses</div>
                <div class="col">{{ $q3Ex->office_expenses }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">Rent</div>
                <div class="col">{{ $q3Ex->rent }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">Maintenance</div>
                <div class="col">{{ $q3Ex->maintenance }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">Other</div>
                <div class="col">{{ $q3Ex->other }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">Total</div>
                <div class="col">{{ $q3Ex->salaries + $q3Ex->deprications + $q3Ex->office_expenses + $q3Ex->rent + $q3Ex->maintenance + $q3Ex->other }}</div>
            </div>
        </div>
    </div>
</div>