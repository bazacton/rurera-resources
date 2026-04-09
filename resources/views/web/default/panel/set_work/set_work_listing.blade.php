
    @if( $assignments->count() > 0 )
        @foreach( $assignments as $studentAssignmentData)
            <div class="rurera-tasks-card bg-white panel-border rounded-sm px-20 py-15 mb-10" id="rureraTasksCard">
            <div class="container setwork-block">

                <!-- Header -->
                <div class="header">
                    <div>
                        <div class="fw-bold">{{$studentAssignmentData->title}}</div>
                        <div class="deadline">DEADLINE : {{dateTimeFormat($studentAssignmentData->assignment_end_date, 'd, M Y', false)}}</div>
                    </div>

                    <!-- 3-dot dropdown -->
                    <div class="dropdown">
                        <button class="menu-btn" data-bs-toggle="dropdown">
                            ⋮
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                            <li><a class="dropdown-item" href="#">Edit</a></li>
                        </ul>
                    </div>
                </div>

                <!-- List -->
                @if($studentAssignmentData->userAssignedTopics->count() > 0)
                    <ul class="assignment-list">
                    @foreach($studentAssignmentData->userAssignedTopics as $assignmentObj)
                            @php
                                if(!isset($assignmentObj->StudentAssignmentData->id)){
                                    continue;
                                }
                                $quizObj = $assignmentObj->quizData;
                                $assignmentTitle = isset($quizObj->id)? $quizObj->getTitleAttribute() : '';
                                $assignmentTitle = ($assignmentTitle == '')? ucfirst($assignmentObj->StudentAssignmentData->assignment_type) : $assignmentTitle;
                                $assignmentLink = '/assignment/'.$assignmentObj->id;
                                $time_difference = TimeDifference(time(), $assignmentObj->deadline_date , 'minutes');
                                $assignmentLink = getAssignmentLink($assignmentObj, $assignmentObj->StudentAssignmentData);
                                $due_label = '';
                                $due_class = '';
                                $due_label = ($time_difference <= 4000)? '- Due Soon' : $due_label;
                                $due_label = ($time_difference <= 5)? '- Overdue' : $due_label;

                                $due_label = ($time_difference <= 4000)? 'rurera-tasks-tag-due-soon' : $due_class;
                                $due_label = ($time_difference <= 5)? 'rurera-tasks-tag-overdue' : $due_class;

                            @endphp
                            <li class="assignment-item">
                                <div class="assignment-left">
                                    <div class="icon-box">🎓</div>
                                    <div>
                                        <div class="assignment-title">{{$assignmentTitle}}</div>
                                        <div class="assignment-meta">
                                            Attempts : 2/10 &nbsp;&nbsp; SmartScore : 50/100
                                        </div>
                                    </div>
                                </div>
                                <div class="arrow">→</div>
                            </li>
                    @endforeach
                    </ul>
                @endif

            </div>
            </div>
        @endforeach
    @endif