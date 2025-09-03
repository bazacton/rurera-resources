<style>
    .status-correct i{
        color: #a3e05f;
        font-size: 20px;
    }

    .status-incorrect i{
        color: #ff4b4b;
        font-size: 20px;
    }
    .status-in_review i{
        color: #c8d022;
        font-size: 20px;
    }

    .status-not_attempted i, .status-pending i{
        color: #d6d6d6;
        font-size: 20px;
    }
</style>
@php $colors_array = array('table-col-yellow', 'table-col-red', 'table-col-orange'); @endphp
<div class="statuses-list">
    <span class="status-incorrect"><i class="fas fa-dot-circle"></i> Incorrect</span> &nbsp;&nbsp;&nbsp;
    <span class="status-in_review"><i class="fas fa-dot-circle"></i> In Review</span> &nbsp;&nbsp;&nbsp;
    <span class="status-correct"><i class="fas fa-dot-circle"></i> Correct</span> &nbsp;&nbsp;&nbsp;
    <span class="status-not_attempted"><i class="fas fa-dot-circle"></i> Not Attempted</span>
</div>
<div class="admin-rurera-tabs-holder d-flex align-items-center flex-wrap">
    <ul class="col-10 col-md-10 col-lg-10 admin-rurera-tabs nav nav-pills" id="assignment_tabs" role="tablist">
        <li class="nav-item">
            <div class="skelton-height-lg skelton-mb-0">
                <a class="nav-link attempt-type-btn {{($attempt_to_show == 'last_attempt')? 'active' : ''}}" data-attempt_type="last_attempt" id="topics-tab" href="javascript:;">
                    <span class="tab-title">Last Attempt</span>
                </a>
            </div>
        </li>
        <li class="nav-item">
            <div class="skelton-height-lg skelton-mb-0">
                <a class="nav-link attempt-type-btn {{($attempt_to_show == 'first_attempt')? 'active' : ''}}" data-attempt_type="first_attempt" id="topics-tab" href="javascript:;">
                    <span class="tab-title">First Attempt</span>
                </a>
            </div>
        </li>

        <li class="nav-item">
            <div class="skelton-height-lg skelton-mb-0">
                <a class="nav-link attempt-type-btn {{($attempt_to_show == 'best_attempt')? 'active' : ''}}" data-attempt_type="best_attempt" id="topics-tab" href="javascript:;">
                    <span class="tab-title">Best Attempt</span>
                </a>
            </div>
        </li>
    </ul>
</div>
<div class="table-responsive">
    <table class="table heatmap-table">
        <thead>
        <tr class="topic-heading-top 33333">
            <th class="font-14"> &nbsp;</th>
            <th class="font-14" colspan="4"> {{$assignmentObj->title}}</th>
        </tr>
        <tr class="topic-heading-top">
            <th class="font-14">Student</th>
            <th class="font-14">Attempts</th>

            <th class="font-14">Questions</th>
            <th class="font-14">Activity Time</th>
            <th class="font-14">Progress</th>
        </tr>

        </thead>
        <tbody id="topic_part_1">
        @if($studentsList->count() > 0)
            @foreach($studentsList as $studentObj)
                @php $AssignmentFetchAttempt = isset($assignments_data_array[$studentObj->id])? $assignments_data_array[$studentObj->id] : (object) array();
                $assignmentTopicObj = isset($assignment_topics_array[$studentObj->id])? $assignment_topics_array[$studentObj->id] : (object) array();

                //$quizz_result_questions_list = isset($assignment_questions_list[$studentObj->id])? $assignment_questions_list[$studentObj->id] : (object) array();


                $quizz_result_questions_list = isset($AssignmentFetchAttempt->id)? $AssignmentFetchAttempt->quizz_result_questions_list : (object) array();
                @endphp
                <tr>
                    <td>{{$studentObj->get_full_name()}}</td>

                    @php $questions_time_consumed_total = 0; @endphp
                    <td>{{isset($assignmentTopicObj->id)? $assignmentTopicObj->AssignmentResults->count() : 0}}</td>
                    <td class="">

                        @if(isset($assignmentTopicObj->id))
                            @if(!empty($quizz_result_questions_list))
                                @foreach($quizz_result_questions_list as $questionResultObj)
                                    @php $status_label = '';
                                             $status_label = ($questionResultObj->status == 'not_attempted')? 'Not Attempted' : $status_label;
                                             $status_label = ($questionResultObj->status == 'correct')? 'Correct' : $status_label;
                                             $status_label = ($questionResultObj->status == 'incorrect')? 'Incorrect' : $status_label;

                                             $time_consumed = $questionResultObj->time_consumed;
                                              $class = $questionResultObj->status;

                                                $question_status_response = '<span class="status-'.$class.'" title="'.$questionResultObj->question_id.'"><i class="fas fa-dot-circle"></i></span>';
                                                if($questionResultObj->status == 'in_review'){
                                                    $question_status_response = '<a href="javascript:;" class="review-question" data-question_id="'.$questionResultObj->id.'"><span class="status-in_review"><i class="fas fa-dot-circle"></i></span></a>';
                                                }
                                                $questions_time_consumed_total += $time_consumed;

                                    @endphp
                                    {!! $question_status_response !!}
                                @endforeach
                            @endif
                        @endif
                    </td>
                    <td>{{getTimeWithText($questions_time_consumed_total)}}</td>
                    <td><div class="circle_percent circle-green" data-percent="50">
                            <div class="circle_inner">
                                <div class="round_per" style="transform: rotate(360deg);"></div>
                            </div>
                            <div class="circle_inbox">
                                <span class="percent_text">50%</span>
                            </div>
                        </div></td>

                    @endforeach
                    @endif

                </tr>
        </tbody>
    </table>
</div>
