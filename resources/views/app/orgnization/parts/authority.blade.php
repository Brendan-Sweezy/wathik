<div class="card card-flush h-xl-100" dir="rtl">
    <div class="card-header py-7">
        <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0">
            الهيئة العامة:
        </div>
        
        <!-- MODAL -->
        <div class="modal fade" id="assemblyInfo" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    @include('app.orgnization.modals.assemblyInfo')
                </div>
            </div>
        </div>
        <div class="card-toolbar">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
                data-bs-target="#assemblyInfo">amend</button>
        </div> 


    </div>
    <div class="card-body pt-1">
        <div class="row">
            <div class="col-3">عدد أعضاء الهيئة العامة الحالي (المسددين اشتراكاتهم)</div>
            <div class="col">
                @foreach ($orgnization->info as $info)
                    @if ($info->type == 'assembly_female')
                        @foreach ($orgnization->info as $info2)
                            @if ($info2->type == 'assembly_male')
                                {{ intval($info->info) + intval($info2->info) }}
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>
        </div>
        <div class="separator separator-dashed my-3"></div>
        <div class="row">
            <div class="col-3">عدد أعضاء الهيئة العامة الذكور</div>
            <div class="col">
                @foreach ($orgnization->info as $info)
                    @if ($info->type == 'assembly_male')
                        {{ $info->info }}
                    @endif
                @endforeach
            </div>
        </div>  
        <div class="separator separator-dashed my-3"></div>
        <div class="row">
            <div class="col-3">عدد أعضاء الهيئة العامة الإناث</div>
            <div class="col">
                @foreach ($orgnization->info as $info)
                    @if ($info->type == 'assembly_female')
                        {{ $info->info }}
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
