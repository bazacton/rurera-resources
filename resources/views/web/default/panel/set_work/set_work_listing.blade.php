<div class="rurera-tasks-card bg-white panel-border rounded-sm px-20 py-15" id="rureraTasksCard">
    @if( $assignmentsArray->count() > 0 )
        @foreach( $assignmentsArray as $assignmentObj)
            @php
                if(!isset($assignmentObj->StudentAssignmentData->id)){
                    continue;
                }
                $assignmentTitle = $assignmentObj->StudentAssignmentData->title;
                $assignmentLink = '/assignment/'.$assignmentObj->id;
            @endphp
            <div class="rurera-tasks-item">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="d-flex align-items-center">
                            <div class="rurera-tasks-content">
                                <div class="rurera-tasks-title-row">
                                    <h3 class="rurera-tasks-name font-16 font-weight-bold">{{$assignmentTitle}}</h3>
                                    <span class="rurera-tasks-tag rurera-tasks-tag-due-soon">Due Soon</span>
                                </div>
                                <p class="subject-info font-14 text-gray">{{ucfirst($assignmentObj->StudentAssignmentData->assignment_type)}} • Deadline 01/07/24 • Assigned by you</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 rurera-tasks-row-right">
                        <div class="rurera-tasks-actions font-14">
                            <button class="rurera-tasks-btn rurera-tasks-btn-outline">Download</button>
                            <div class="rurera-tasks-actions-dropdown dropdown">
                                <button type="button"
                                        class="dropdown-toggle"
                                        id="rurera-tasks-dropdown"
                                        data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                    <img src="/assets/default/svgs/dots-three.svg" alt="" aria-hidden="true">
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="rurera-tasks-dropdown">
                                    <button type="button" class="rurera-tasks-close-btn">
                                        <img src="/assets/default/svgs/delete.svg" alt="" aria-hidden="true">
                                        <span>Delete</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif


    <div class="rurera-tasks-item">
        <div class="row align-items-center">
            <div class="col-md-7">
                <div class="d-flex align-items-center">
                    <div class="rurera-tasks-content">
                        <div class="rurera-tasks-title-row">
                            <h3 class="rurera-tasks-name font-16 font-weight-bold">English Placement Assessment</h3>
                            <span class="rurera-tasks-tag rurera-tasks-tag-overdue">Overdue</span>
                        </div>
                        <p class="subject-info font-14 text-gray">Mock test • Deadline 01/07/24 • Assigned by you</p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 rurera-tasks-row-right">
                <div class="rurera-tasks-actions font-14">
                    <button class="rurera-tasks-btn rurera-tasks-btn-outline">Resume</button>
                    <div class="rurera-tasks-actions-dropdown">
                        <button type="button" class="dropdown-toggle" id="rurera-tasks-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="/assets/default/svgs/dots-three.svg" alt="" aria-hidden="true">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="rurera-tasks-dropdown">
                            <button type="button" class="rurera-tasks-close-btn">
                                <img src="/assets/default/svgs/delete.svg" alt="" aria-hidden="true">
                                <span>Delete</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rurera-tasks-item">
        <div class="row align-items-center">
            <div class="col-md-7">
                <div class="d-flex align-items-center">
                    <div class="rurera-tasks-content">
                        <div class="rurera-tasks-title-row">
                            <h3 class="rurera-tasks-name font-16 font-weight-bold">Quantitative Reasoning Practice</h3>
                            <span class="rurera-tasks-tag rurera-tasks-tag-due-soon">Due Soon</span>
                        </div>
                        <p class="subject-info font-14 text-gray">Mock test • Deadline 01/07/24 • Assigned by you</p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 rurera-tasks-row-right">
                <div class="rurera-tasks-actions font-14">
                    <button class="rurera-tasks-btn rurera-tasks-btn-outline">Continue</button>
                    <div class="rurera-tasks-actions-dropdown">
                        <button type="button" class="dropdown-toggle" id="rurera-tasks-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="/assets/default/svgs/dots-three.svg" alt="" aria-hidden="true">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="rurera-tasks-dropdown">
                            <button type="button" class="rurera-tasks-close-btn">
                                <img src="/assets/default/svgs/delete.svg" alt="" aria-hidden="true">
                                <span>Delete</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="rureraHiddenTasks" class="collapse" style="margin-top: 18px; border-top: 1px solid #e6ebf0; padding-top: 18px;">
        <div class="rurera-tasks-item">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="d-flex align-items-center">
                        <div class="rurera-tasks-content">
                            <div class="rurera-tasks-title-row">
                                <h3 class="rurera-tasks-name font-16 font-weight-bold">Reading Comprehension Mock</h3>
                                <span class="rurera-tasks-tag rurera-tasks-tag-due-soon">Due Soon</span>
                            </div>
                            <p class="subject-info font-14 text-gray">Mock test • Deadline 01/07/24 • Assigned by you</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 rurera-tasks-row-right">
                    <div class="rurera-tasks-actions font-14">
                        <button class="rurera-tasks-btn rurera-tasks-btn-outline">Join</button>
                        <div class="rurera-tasks-actions-dropdown">
                            <button type="button" class="dropdown-toggle" id="rurera-tasks-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="/assets/default/svgs/dots-three.svg" alt="" aria-hidden="true">
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="rurera-tasks-dropdown">
                                <button type="button" class="rurera-tasks-close-btn">
                                    <img src="/assets/default/svgs/delete.svg" alt="" aria-hidden="true">
                                    <span>Delete</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rurera-tasks-item">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="d-flex align-items-center">
                        <div class="rurera-tasks-content">
                            <div class="rurera-tasks-title-row">
                                <h3 class="rurera-tasks-name font-16 font-weight-bold">Vocabulary Builder Challenge</h3>
                                <span class="rurera-tasks-tag rurera-tasks-tag-overdue">Overdue</span>
                            </div>
                            <p class="subject-info font-14 text-gray">Mock test • Deadline 01/07/24 • Assigned by you</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 rurera-tasks-row-right">
                    <div class="rurera-tasks-actions font-14">
                        <button class="rurera-tasks-btn rurera-tasks-btn-outline">Open</button>
                        <div class="rurera-tasks-actions-dropdown">
                            <button type="button" class="dropdown-toggle" id="rurera-tasks-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="/assets/default/svgs/dots-three.svg" alt="" aria-hidden="true">
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="rurera-tasks-dropdown">
                                <button type="button" class="rurera-tasks-close-btn">
                                    <img src="/assets/default/svgs/delete.svg" alt="" aria-hidden="true">
                                    <span>Delete</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rurera-tasks-item">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="d-flex align-items-center">
                        <div class="rurera-tasks-content">
                            <div class="rurera-tasks-title-row">
                                <h3 class="rurera-tasks-name font-16 font-weight-bold">Verbal Skills Final Check</h3>
                                <span class="rurera-tasks-tag rurera-tasks-tag-overdue">Overdue</span>
                            </div>
                            <p class="subject-info font-14 text-gray">Mock test • Deadline 01/07/24 • Assigned by you</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 rurera-tasks-row-right">
                    <div class="rurera-tasks-actions font-14">
                        <button class="rurera-tasks-btn rurera-tasks-btn-outline">Submit</button>
                        <div class="rurera-tasks-actions-dropdown">
                            <button type="button" class="dropdown-toggle" id="rurera-tasks-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="/assets/default/svgs/dots-three.svg" alt="" aria-hidden="true">
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="rurera-tasks-dropdown">
                                <button type="button" class="rurera-tasks-close-btn">
                                    <img src="/assets/default/svgs/delete.svg" alt="" aria-hidden="true">
                                    <span>Delete</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rurera-tasks-toggle-wrap" id="rureraTasksToggleWrap">
        <a class="rurera-tasks-toggle font-weight-500" data-toggle="collapse" href="#rureraHiddenTasks" role="button" aria-expanded="false" aria-controls="rureraHiddenTasks" id="rureraTasksToggle">
            View all tasks →
        </a>
    </div>
</div>