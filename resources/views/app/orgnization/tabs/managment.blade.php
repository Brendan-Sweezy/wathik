<div class="row gy-5 g-xl-10" dir="rtl">
    <div class="col-12 mb-5">
        @include('app.orgnization.parts.managment_members')
    </div>
</div>



@section('TODO')
<!-- TODO: show this information in editable tables: -->

<div class="row gy-5 g-xl-10" dir="rtl">           
    <div class="col-6 mb-5">                        
        @include('app.orgnization.parts.president') 
    </div>                                          
    <div class="col-6 mb-5">                        
        @include('app.orgnization.parts.managment') 
    </div>                                          
 </div>                                             
@endsection