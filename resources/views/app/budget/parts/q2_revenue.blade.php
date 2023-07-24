<div class="col-6 mb-5">
    <div class="card card-flush h-xl-100">
        <div class="card-header py-7">
            <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0">
            الربع الثاني (نیسان، أیار، حزیران)
            </div>

            <!-- MODAL -->
            <div class="modal fade" id="q2RevModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content">
                        @include('app.budget.modals.q2_revenue')
                    </div>
                </div>
            </div>
            <div class="card-toolbar">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
                    data-bs-target="#q2RevModal">تعديل</button>
            </div>
        </div>

        <!-- CONTENT -->
        <div class="card-body pt-1">
            <div class="row">
                <div class="col-3">تمویل محلي (حدد)</div>
                <div class="col">{{ $q2Rev->local_financing }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">تمویل أجنبي(حدد)</div>
                <div class="col">{{ $q2Rev->foreign_financing }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">أرباح مشاریع الجمعیة</div>
                <div class="col">{{ $q2Rev->project_revenue }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">إشتراكات أعضاء الجمعیة</div>
                <div class="col">{{ $q2Rev->subscriptions }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">فائدة بنكیة</div>
                <div class="col">{{ $q2Rev->bank_interest }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">اموال غیر منقولة (عقار، سیارات،....)</div>
                <div class="col">{{ $q2Rev->immoveable_properties }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">>غیرھا- حدد<</div>
                <div class="col">{{ $q2Rev->other }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">مجموع إیرادات الجمعیة</div>
                <div class="col">{{ $q2Rev->local_financing + $q2Rev->foreign_financing + $q2Rev->project_revenue + $q2Rev->subscriptions + $q2Rev->bank_interest + $q2Rev->immoveable_properties + $q2Rev->other }}</div>
            </div>
        </div>
    </div>
</div>