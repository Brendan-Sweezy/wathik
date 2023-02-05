<div class="col-6 mb-5">
    <div class="card card-flush h-xl-100">
        <div class="card-header py-7">
            <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0">
                معلومات الإدارة
            </div>
            <div class="card-toolbar">
                <button type="button" class="btn btn-primary">تعديل</button>
            </div>
        </div>
        <div class="card-body pt-1">
            <div class="row">
                <div class="col-3">اسم رئيس الجمعية</div>
                <div class="col">{{ $orgnization->manager->name }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">الرقم الوطني</div>
                <div class="col">{{ $orgnization->manager->national_id }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">رقم الهاتف الخلوي</div>
                <div class="col">{{ $orgnization->manager->phone }}</div>
            </div>
            <div class="separator separator-dashed my-3"></div>
            <div class="row">
                <div class="col-3">البريد الإلكتروني</div>
                <div class="col">{{ $orgnization->manager->email }}</div>
            </div>
        </div>
    </div>
</div>
