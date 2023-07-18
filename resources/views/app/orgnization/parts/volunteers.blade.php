<div class="card card-flush h-xl-100" dir="rtl">
    <div class="card-header py-7">
        <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0">
            المتطوعين
        </div>
        
        <div class="modal fade" id="volunteerModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    @include('app.orgnization.modals.amendVolunteers')
                </div>
            </div>
        </div>
        <div class="card-toolbar">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
                data-bs-target="#volunteerModal">تعديل</button>
        </div> 

    </div>
    <div class="card-body pt-1">
        <div class="row">
            <div class="col-3">عدد المتطوعين الذكور</div>
            <div class="col">
                @foreach ($orgnization->info as $info)
                    @if ($info->type == 'male_volunteers')
                        {{ $info->info }}
                    @endif
                @endforeach
            </div>
        </div>
        <div class="separator separator-dashed my-3"></div>
        <div class="row">
            <div class="col-3">عدد المتطوعين الإناث</div>
            <div class="col">
                @foreach ($orgnization->info as $info)
                    @if ($info->type == 'female_volunteers')
                        {{ $info->info }}
                    @endif
                @endforeach
            </div>
        </div>
        <div class="separator separator-dashed my-3"></div>
        <div class="row">
            <div class="col-3">عدد المتطوعين (المجموع)</div>
            <div class="col">
                @foreach ($orgnization->info as $info)
                    @if ($info->type == 'male_volunteers')
                        @foreach ($orgnization->info as $info2)
                            @if ($info2->type == 'female_volunteers')
                                {{ intval($info->info) + intval($info2->info) }}
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
