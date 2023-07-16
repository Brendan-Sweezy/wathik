<div class="col-6 mb-5">
    <div class="card card-flush h-xl-100">
        <div class="card-header py-7">
            <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0">
                Quarter Four
            </div>

            <!-- MODAL -->
            <div class="modal fade" id="q4RevModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content">
                        @include('app.budget.modals.q4_revenue')
                    </div>
                </div>
            </div>
            <div class="card-toolbar">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
                    data-bs-target="#q4RevModal">تعديل</button>
            </div>
        </div>

        <!-- CONTENT -->
        <div class="card-body pt-1">
            <div class="row">
                <div class="col-3">Local Financing</div>
                <div class="col">{{ $q4Rev->local_financing }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">Foreign Financing</div>
                <div class="col">{{ $q4Rev->foreign_financing }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">Project Revenue</div>
                <div class="col">{{ $q4Rev->project_revenue }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">Subscriptions</div>
                <div class="col">{{ $q4Rev->subscriptions }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">Bank Interest</div>
                <div class="col">{{ $q4Rev->bank_interest }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">Immoveable Properties</div>
                <div class="col">{{ $q4Rev->immoveable_properties }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">Other</div>
                <div class="col">{{ $q4Rev->other }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">Total</div>
                <div class="col">{{ $q4Rev->local_financing + $q4Rev->foreign_financing + $q4Rev->project_revenue + $q4Rev->subscriptions + $q4Rev->bank_interest + $q4Rev->immoveable_properties + $q4Rev->other }}</div>
            </div>
        </div>
    </div>
</div>