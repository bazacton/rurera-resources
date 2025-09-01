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
<div class="admin-rurera-tabs-holder d-flex align-items-center flex-wrap pb-15">
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
<div class="topic-parts-data table-responsive">
    <table class="table heatmap-table">
        <thead>
        <tr class="topic-heading-top">
            <th class="font-14"> &nbsp;</th>
            @if($tests_list->count() > 0)
                @foreach($tests_list as $testObj)
                     <th class="font-14" colspan="4"> {{$testObj->getTitleAttribute()}}</th>
                @endforeach
            @endif
        </tr>
        @if($studentsList->count() > 0)
            @foreach($studentsList as $studentObj)
                <tr class="topic-heading-top">
                    <th class="font-14">Student</th>
                    @php $topic_counter = 1; @endphp
                    @while($topic_counter <= $tests_list->count())
                            <th class="font-14">Attempts</th>
                            <th class="font-14">Questions</th>
                            <th class="font-14">Activity Time</th>
                            <th class="font-14">Progress</th>
                        @php $topic_counter++; @endphp
                    @endwhile
                </tr>
            @endforeach
        @endif

        </thead>
        <tbody id="topic_part_1">
            @if($studentsList->count() > 0)
                @foreach($studentsList as $studentObj)
                    <tr>
                        <td>{{$studentObj->get_full_name()}}</td>

                        @if($tests_list->count() > 0)
                            @foreach($tests_list as $testObj)
                                @php $questions_time_consumed_total = 0; @endphp
                                <td>{{$testObj->parentResults->where('status', 'passed')->count()}}</td>
                                <td class="">
                                    @if($testObj->quizQuestionsList->count() > 0)
                                        @foreach($testObj->quizQuestionsList as $quizQuestionsListObj)
                                            @php

                                            $question_status = 'pending';
                                            $class = '';
                                            $SingleQuestionDataObj = $quizQuestionsListObj->SingleQuestionData;
                                            if(!isset($SingleQuestionDataObj->id)){ continue; }
                                            $questionAnalyticResult = isset($students_questions_result[$studentObj->id][$testObj->id])? $students_questions_result[$studentObj->id][$testObj->id] : array();
                                            $attempt_question_ids = isset($questionAnalyticResult['attempt_question_ids'])? $questionAnalyticResult['attempt_question_ids'] : array();
                                            $questions_attempts = isset($questionAnalyticResult['questions_attempts'])? $questionAnalyticResult['questions_attempts'] : array();

                                            $currentQuestionData = isset($attempt_question_ids[$SingleQuestionDataObj->id])? $attempt_question_ids[$SingleQuestionDataObj->id] : array();
                                            $time_consumed = isset($currentQuestionData['time_consumed'])? $currentQuestionData['time_consumed'] : 0;
                                            $question_status = isset($currentQuestionData['status'])? $currentQuestionData['status'] : 'pending';
                                            $question_result_id = isset($currentQuestionData['question_result_id'])? $currentQuestionData['question_result_id'] : 0;


                                            $class = $question_status;

                                            $question_status_response = '<span class="status-'.$class.'"><i class="fas fa-dot-circle"></i></span>';
                                            if($question_status == 'in_review'){
                                                $question_status_response = '<a href="javascript:;" class="review-question" data-question_id="'.$question_result_id.'"><span class="status-in_review"><i class="fas fa-dot-circle"></i></span></a>';
                                            }
                                            $questions_time_consumed_total += $time_consumed;

                                            @endphp
                                            {!! $question_status_response !!}
                                        @endforeach
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
                @endforeach
            @endif
        </tbody>
    </table>
</div>



