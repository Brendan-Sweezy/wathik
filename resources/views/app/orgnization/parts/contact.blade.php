<div class="col-6 mb-5">
    <div class="card card-flush h-xl-100">
        <div class="card-header py-7">
            <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0">
                معلومات التواصل
            </div>
            <div class="card-toolbar">
                <button type="button" class="btn btn-primary">تعديل</button>
            </div>
        </div>
        <div class="card-body pt-1">
            <div class="row">
                <div class="col-3">البريد الإلكتروني</div>
                <div class="col">
                    @foreach ($orgnization->contacts as $contact)
                        @if ($contact->type == 'email')
                            {{ $contact->contact }}
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">رقم الهاتف الأرضي</div>
                <div class="col">
                    @foreach ($orgnization->contacts as $contact)
                        @if ($contact->type == 'phone')
                            {{ $contact->contact }}
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">صندوق بريد</div>
                <div class="col">
                    @foreach ($orgnization->contacts as $contact)
                        @if ($contact->type == 'mail')
                            {{ $contact->contact }}
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">الرمز البريدي</div>
                <div class="col">
                    @foreach ($orgnization->contacts as $contact)
                        @if ($contact->type == 'zipcode')
                            {{ $contact->contact }}
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">الموقع الإلكتروني</div>
                <div class="col">
                    @foreach ($orgnization->contacts as $contact)
                        @if ($contact->type == 'website')
                            {{ $contact->contact }}
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
