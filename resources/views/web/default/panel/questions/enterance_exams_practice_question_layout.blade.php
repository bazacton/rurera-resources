@php $rand_id = rand(999,99999); $layout_type = isset( $layout_type )? $layout_type : ''; @endphp

<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="question-step quiz-complete" style="display:none">
    <div class="question-layout-block">
        <div class="left-content has-bg">
            <h2>&nbsp;</h2>
            <div id="rureraform-form-1"
                 class="rureraform-form rureraform-elements rureraform-form-input-medium rureraform-form-icon-inside rureraform-form-description-bottom ui-sortable"
                 _data-parent="1"
                 _data-parent-col="0" style="display: block;">
                <div class="question-layout row">

                </div>
            </div>
        </div>
    </div>
</div>

@php
$group_questions_layout  = isset( $group_questions_layout )? $group_questions_layout : '';
$question_layout = html_entity_decode(json_decode(base64_decode(trim(stripslashes($question->question_layout)))));
$question_layout = str_replace('<div class="group_questions_data">Questions Group</div>', $group_questions_layout, $question_layout);
$search_tags = ($question->search_tags != '')? explode(' | ', $question->search_tags) : array();
$is_development = (!empty( $search_tags ) && in_array('development', $search_tags))? true : false;
$total_questions = count(json_decode($quizAttempt->questions_list));

@endphp

<div class="question-area dis-arrows1" data-total_questions="{{$total_questions}}">
    <div class="correct-appriciate" style="display:none"></div>
    <div class="question-step question-step-{{ $question->id }}" data-elapsed="0"
         data-qattempt="{{isset( $quizAttempt->id )? $quizAttempt->id : 0}}"
         data-start_time="0" data-qresult="{{isset( $newQuestionResult->id )? $newQuestionResult->id : 0}}"
         data-quiz_result_id="{{isset( $quizAttempt->quiz_result_id )? $quizAttempt->quiz_result_id : 0}}">
        <div class="question-layout-block">

            <form class="question-fields" action="javascript:;" data-question_id="{{ $question->id }}">
                <div class="left-content has-bg">
                    @php $already_flagged = ($quizResultObj->flagged_questions != '') ? (array)
                    json_decode($quizResultObj->flagged_questions) : array();
                    $flag_class = (in_array($question->id, $already_flagged))? 'flaged' : 'notflaged';
                    @endphp
                    @if( $question->review_required == 1 || $is_development == true)
                    <div class="question-review-required">
                        @if( $question->review_required == 1)
                        <div class="question-label-tag">Review Required</div>
                        @endif
                        @if( $is_development == true)
                        <div class="question-label-tag">Developer Review Required</div>
                        @endif
                    </div>
                    @endif
                    <span class="questions-total-holder d-block mb-30">( {{$question_no}}/{{$total_questions}} Questions ) <span class="question-dev-details">@if($layout_type != 'results') ({{ $question->id }}) @endif  ({{ $question->question_difficulty_level }}) ({{ $question->question_type }}) ({{ isset( $question->subChapter->id)? $question->subChapter->sub_chapter_title : '' }})</span></span>

                        @if($layout_type != 'results')
                        <span class="question-number-holder rurera-hide" style="z-index: 999999999;"> <span class="question-number">{{$question_no}}</span>
                            <span class="question-icon flag-question {{$flag_class}}"
                                  data-qresult_id="{{isset( $newQuestionResult->quiz_result_id )? $newQuestionResult->quiz_result_id : 0}}"
                                  data-question_id="{{$question->id }}" data-question_no="{{$newQuestionResult->id}}">
                                <svg style="width: 42px;height: 42px;"
                                     xmlns="http://www.w3.org/2000/svg"
                                     version="1.0" width="512.000000pt" height="512.000000pt"
                                     viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet"> <g
                                            transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                            fill="#000000"
                                            stroke="none"> <path
                                                d="M1620 4674 c-46 -20 -77 -50 -103 -99 l-22 -40 -3 -1842 -2 -1843 -134 0 c-120 0 -137 -2 -177 -23 -24 -13 -57 -43 -74 -66 -27 -39 -30 -50 -30 -120 0 -66 4 -83 25 -114 14 -21 43 -50 64 -65 l39 -27 503 0 502 0 44 30 c138 97 118 306 -34 370 -27 11 -73 15 -168 15 l-130 0 0 750 0 750 1318 2 1319 3 40 28 c83 57 118 184 75 267 -10 19 -140 198 -290 398 -170 225 -270 367 -265 375 4 7 128 174 276 372 149 197 276 374 283 392 19 45 17 120 -5 168 -23 51 -79 101 -128 114 -26 7 -459 11 -1330 11 l-1293 0 0 20 c0 58 -56 137 -122 171 -45 23 -128 25 -178 3z"></path> </g> </svg> </span>
                        </span>
                        @endif

                    @php $classes = isset( $class )? $class : ''; @endphp
                    <div id="rureraform-form-1"
                         class="{{$classes}} rureraform-form rureraform-elements rureraform-form-input-medium rureraform-form-icon-inside rureraform-form-description-bottom ui-sortable"
                         _data-parent="1"
                         _data-parent-col="0" style="display: block;">
                        <div class="question-layout row">
                            @if( isset( $show_marks ) && $show_marks == true)
                                @if($layout_type != 'results')
                                <span class="marks" data-marks="{{$question->question_score}}">{{$question->question_score}} marks</span>
                                @endif
                            @endif
                            {!! $question_layout !!}

                            <div class="validation-error"></div>
                        </div>

                    </div>
                    <div class="show-notifications" data-show_message="yes"></div>

                    <div class="prev-next-controls text-center mb-50 questions-nav-controls">
                        @if( !isset( $disable_finish ) || $disable_finish == 'false')
                        <a href="javascript:;" data-toggle="modal" class="review-btn" data-target="#review_submit">
                            Finish
                            <img src="/assets/default/svgs/review-btn-flag.svg" width="683" height="683" alt="review-btn-flag">
                        </a>
                        @endif
                        @php $prev_class = (isset( $prev_question ) && $prev_question > 0)? '' : 'disable-btn'; @endphp
                        <a href="javascript:;" id="prev-btn" class="{{$prev_class}} rurera-hide prev-btn" data-question_id="{{$prev_question}}">
                            <img src="/assets/default/svgs/next-btn.svg" width="683" height="683" alt="next-btn">
                        </a>
                        @php $next_class = (isset( $next_question ) && $next_question > 0)? '' : 'disable-btn'; @endphp
                        <a href="javascript:;" id="next-btn" class="{{$next_class}} rurera-hide next-btn" data-question_id="{{$next_question}}" data-actual_question_id="{{$next_question}}">
                            Next
                            <img src="/assets/default/svgs/next-btn.svg" width="683" height="683" alt="next-btn">
                        </a>

                        @if( !isset( $disable_submit ) || $disable_submit == 'false')
                        <a href="javascript:;" id="question-submit-btn" class="question-submit-btn">
                            mark answer
                        </a>

                        <a href="javascript:;" id="question-next-btn" class="question-next-btn rurera-hide">
                            Next
                        </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function question_layout_functions() {
        var Questioninterval = setInterval(function () {
            var seconds_count = $(".question-step-{{ $question->id }}").attr('data-elapsed');
            seconds_count = parseInt(seconds_count) + parseInt(1);
            $(".question-step-{{ $question->id }}").attr('data-elapsed', seconds_count);
        }, 1000);
    }
</script>

