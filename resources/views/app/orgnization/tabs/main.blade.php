<!-- TODO: add section that list organization address and offers amendment option-->

<div class="row gy-5 g-xl-10" dir="rtl">
    @include('app.orgnization.parts.info')
    @include('app.orgnization.parts.contact')
</div>
<div class="row gy-5 g-xl-10" dir="rtl">
    @include('app.orgnization.parts.address')
    @include('app.orgnization.parts.manager')
</div>
<div class="row gy-5 g-xl-10" dir="rtl">
    <div class="col-12 mb-5">
        @include('app.orgnization.parts.branches')  
    </div>
</div>