<div class="card card-flush h-xl-100" dir="rtl">
    <div class="card-header py-7">
        <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0">
            الهيئة الإدارية
        </div>


        <div class="modal fade" id="adminInfo" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    @include('app.orgnization.modals.adminInfo')
                </div>
            </div>
        </div>
        <div class="card-toolbar">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
                data-bs-target="#adminInfo">تعديل</button>
        </div> 


    </div>
    <div class="card-body pt-1">
        <div class="row">
            <div class="col-3">عدد أعضاء الهيئة الإدارية الحالية</div>
            <div class="col">
                {{ $male_mems + $female_mems }}
            </div>
        </div>
        <div class="separator separator-dashed my-3"></div>
        <div class="row">
            <div class="col-3">عدد أعضاء الهية الإدارية الواردة في النظام الأساسي</div>
            <div class="col">
                @foreach ($orgnization->info as $info)
                    @if ($info->type == 'mentioned_members')
                        {{ $info->info }}
                    @endif
                @endforeach
            </div>
        </div>
        <div class="separator separator-dashed my-3"></div>
        <div class="row">
            <div class="col-3">عدد أعضاء الهيئة الإدارية الذكور</div>
            <div class="col">
                {{ $male_mems }}
            </div>
        </div>
        <div class="separator separator-dashed my-3"></div>
        <div class="row">
            <div class="col-3">عدد أعضاء الهيئة الإدارية الإناث</div>
            <div class="col">
                {{ $female_mems }}   
            </div>
        </div>
        <div class="separator separator-dashed my-3"></div>
        <div class="row">
            <div class="col-3">النصاب القانوني</div>
            <div class="col">
                @foreach ($orgnization->info as $info)
                    @if ($info->type == 'quorum')
                        {{ $info->info }}
                    @endif
                @endforeach   
            </div>
        </div>
        <div class="separator separator-dashed my-3"></div>
        <div class="row">
            <div class="col-3">Term</div>
            <div class="col">
                @foreach ($orgnization->info as $info)
                    @if ($info->type == 'term')
                        {{ $info->info }}
                    @endif
                @endforeach   
            </div>
        </div>
        <div class="separator separator-dashed my-3"></div>
        <div class="row">
            <div class="col-3">تاريخ الانتخاب</div>
            <div class="col">
                @foreach ($orgnization->info as $info)
                    @if ($info->type == 'election_date')
                        {{ $info->info }}
                    @endif
                @endforeach   
            </div>
        </div>
    </div>
</div>
