<style>
    a.progrss-bar {
        width: 50px !important;
        background: #fff;
        border: 1px solid #000;
        height: 20px;
        display: inline-flex;
    }
    span.progrss-bar-span {
        background: green;
    }
    .status-correct{
        background: #a3e05f;
    }

    .status-incorrect{
        background: #ff4b4b;
    }
</style>
<div class="admin-rurera-tabs-holder d-flex align-items-center flex-wrap">
    <ul class="col-10 col-md-10 col-lg-10 admin-rurera-tabs nav nav-pills" id="assignment_tabs" role="tablist">
        <li class="nav-item">
            <div class="skelton-height-lg skelton-mb-0">
                <a class="nav-link attempt-type-btn {{($attempt_to_show == 'last_attempt')? 'active' : ''}}" data-attempt_type="last_attempt" id="topics-tab" href="javascript:;">
                    <i class="fas fa-file mx-0"></i>
                    <span class="tab-title">Last Attempt</span>
                </a>
            </div>
        </li>
        <li class="nav-item">
            <div class="skelton-height-lg skelton-mb-0">
                <a class="nav-link attempt-type-btn {{($attempt_to_show == 'first_attempt')? 'active' : ''}}" data-attempt_type="first_attempt" id="topics-tab" href="javascript:;">
                    <i class="fas fa-calendar-week mx-0"></i>
                    <span class="tab-title">First Attempt</span>
                </a>
            </div>
        </li>

        <li class="nav-item">
            <div class="skelton-height-lg skelton-mb-0">
                <a class="nav-link attempt-type-btn {{($attempt_to_show == 'best_attempt')? 'active' : ''}}" data-attempt_type="best_attempt" id="topics-tab" href="javascript:;">
                    <i class="fas fa-calendar-week mx-0"></i>
                    <span class="tab-title">Best Attempt</span>
                </a>
            </div>
        </li>
    </ul>
</div>
<div class="table-responsive">
    
    <table class="table table-striped font-14">
        <tr>
            <th class="text-center">Student</th>
            <th class="text-center no_of_attempts_column">Attempts</th>
            <th class="text-center">Last Activity</th>
        </tr>

        @if( $assignmentObj->students->count() > 0)
            @foreach( $assignmentObj->students as $assignmentTopicObj)
                @php

                    if($attempt_to_show == 'last_attempt'){
                        $AssignmentFetchedAttempt = $assignmentTopicObj->AssignmentLastAttempt;
                    }
                    if($attempt_to_show == 'first_attempt'){
                        $AssignmentFetchedAttempt = $assignmentTopicObj->AssignmenFirstAttempt;
                    }
                    if($attempt_to_show == 'best_attempt'){
                        $AssignmentFetchedAttempt = $assignmentTopicObj->AssignmentBestAttempt;
                    }
                    if(!isset($AssignmentFetchedAttempt->id)){
                        continue;
                    }
                    $quizz_result_questions_list = $AssignmentFetchedAttempt->quizz_result_questions_list->where('status', '!=', 'not_attempted');
                @endphp
                <tr class="analytics-list-row" data-total_questions="{{$quizz_result_questions_list->count()}}">
                    <td>
                        <span>{{$assignmentTopicObj->user->get_full_name()}}</span>
                    </td>
                    <td>{{$assignmentTopicObj->AssignmentResults()->count()}}</td>
                    @if($quizz_result_questions_list->count() > 0)
                        @foreach($quizz_result_questions_list as $questionResultObj)
                            <td class="status-{{$questionResultObj->status}}">
                            @php $quiz_layout = json_decode($questionResultObj->quiz_layout, true);
                                 $from = isset($quiz_layout['from'])? $quiz_layout['from'] : '';
                                 $type = isset($quiz_layout['type'])? $quiz_layout['type'] : '';
                                 $to = isset($quiz_layout['from'])? $quiz_layout['to'] : '';
                            @endphp
                                {{$from}} {{$type}} {{$to}}
                            </td>
                        @endforeach
                    @endif

                    <td>
                        @if( $assignmentTopicObj->updated_at != '')
                            <span>{{ dateTimeFormat($assignmentTopicObj->updated_at, 'j M y') }}</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        @endif


    </table>
</div>
