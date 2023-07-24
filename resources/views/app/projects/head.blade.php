<div class="card mb-5 mb-xxl-8" dir="rtl">
    <div class="card-body pt-9 pb-0">
        <div class="d-flex flex-wrap flex-sm-nowrap">
            <div class="flex-grow-1">
                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                    <div class="d-flex flex-column">
                        <div class="d-flex align-items-center mb-2">
                            <span class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">
                                {{ $project->name }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap flex-stack">
                    <div class="d-flex flex-column flex-grow-1 pe-8">
                        <div class="d-flex flex-wrap">
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value=" {{ $num_events }} ">0</div>
                                </div>
                                <div class="fw-semibold fs-6 text-gray-400">الانشطة</div>
                            </div>
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $num_participants }}">0</div>
                                </div>
                                <div class="fw-semibold fs-6 text-gray-400">المشاركين</div>
                            </div>
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $project->beneficiaries }}">0</div>
                                </div>
                                <div class="fw-semibold fs-6 text-gray-400"># of beneficiaries</div>
                            </div>
                            
                            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                                <li class="nav-item mt-2">
                                    <a class="nav-link text-active-primary ms-0 me-10 py-5"
                                        href="{{ url('projects') }}">
                                        return to other projects
                                    </a>
                                </li>                                
                            </ul>
                            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                                <li class="nav-item mt-2">
                                    <a href="{{ url('participants/amend/' . $project->id) }}" 
                                        data-bs-toggle="modal" data-bs-target="#deleteProject{{ $project->id }}" 
                                        class="nav-link text-active-primary ms-0 me-10 py-5">permanently delete this project</a>   
                                </li>                                
                            </ul>
                            <div class="modal fade" id="deleteProject{{ $id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                    <div class="modal-content">
                                        @include('app.projects.deleteProject')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>  
    </div>
</div>
