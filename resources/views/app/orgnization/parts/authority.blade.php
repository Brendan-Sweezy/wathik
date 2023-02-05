<div class="card card-flush h-xl-100" dir="rtl">
    <div class="card-header py-7">
        <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0">
            الهيئة العامة:
        </div>
        <div class="card-toolbar">
            <button type="button" class="btn btn-primary">تعديل</button>
        </div>
    </div>
    <div class="card-body pt-1">
        <div class="row">
            <div class="col-3">عدد أعضاء الهيئة العامة الحالي (المسددين اشتراكاتهم)</div>
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
            <div class="col-3">عدد أعضاء الهيئة العامة الذكور</div>
            <div class="col">
                @foreach ($orgnization->contacts as $contact)
                    @if ($contact->type == 'president_national_id')
                        {{ $contact->contact }}
                    @endif
                @endforeach
            </div>
        </div>
        <div class="separator separator-dashed my-3"></div>
        <div class="row">
            <div class="col-3">عدد أعضاء الهيئة الإدارية الذكور</div>
            <div class="col">
                @foreach ($orgnization->contacts as $contact)
                    @if ($contact->type == 'president_national_id')
                        {{ $contact->contact }}
                    @endif
                @endforeach
            </div>
        </div>
        <div class="separator separator-dashed my-3"></div>
        <div class="row">
            <div class="col-3">عدد أعضاء الهيئة العامة الإناث</div>
            <div class="col">
                @foreach ($orgnization->contacts as $contact)
                    @if ($contact->type == 'president_national_id')
                        {{ $contact->contact }}
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
