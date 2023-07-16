<div class="card card-flush h-xl-100" dir="rtl">
    <div class="card-header py-7">
        <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0">
            Salaried Employees
        </div>
        

    <!-- MODAL -->
        <div class="modal fade" id="addEmployee" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    @include('app.orgnization.modals.addEmployee')
                </div>
            </div>
        </div>
        <div class="card-toolbar">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
                data-bs-target="#addEmployee">add</button>
        </div> 


    </div>
    <div class="card-body pt-1">
        <table class="table align-middle table-row-dashed fs-6 gy-5" dir="rtl">
            <thead>
                <tr class="text-end text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    
                    <th class="min-w-125px">name</th>
                    <th class="min-w-125px">qualification</th>
                    <th class="min-w-125px">title</th>
                    <th class="min-w-125px">gender</th>
                    <th class="text-start min-w-70px"></th>
                </tr>
            </thead>

            <!-- TABLE BODY AND EDITING SHITE -->
            <tbody class="fw-semibold text-gray-600">
                @foreach ($orgnization->employees as $employee)
                

                                <tr>
                                    <td>
                                        {{ $employee->name }}
                                    </td>
                                    <td>
                                        {{ $employee->qualification }}
                                    </td>
                                    <td>
                                        {{ $employee->title }}
                                    </td>
                                    <td>
                                        {{ $employee->gender }}
                                    </td>
                                    
                                    <!-- TODO: edit and delete buttons for individual employees -->
                                    
                                </tr>
                                    
                                    
                    
            @endforeach
            
            </tbody>
            
        </table>
    </div>
    
</div>




