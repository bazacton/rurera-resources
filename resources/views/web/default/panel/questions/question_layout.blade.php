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
                <div class="question-layout">

                </div>
            </div>
        </div>
    </div>
</div>

@php
$group_questions_layout  = isset( $group_questions_layout )? $group_questions_layout : '';
//$question_layout = html_entity_decode(json_decode(base64_decode(trim(stripslashes($question->question_layout)))));
//$question_layout = str_replace('<div class="group_questions_data">Questions Group</div>', $group_questions_layout, $question_layout);
$question_layout = $QuestionsAttemptController->get_question_layout($question);

$search_tags = ($question->search_tags != '')? explode(' | ', $question->search_tags) : array();
$is_development = (!empty( $search_tags ) && in_array('development', $search_tags))? true : false;
$total_questions = count(json_decode($quizAttempt->questions_list));

@endphp
			
<form class="question-fields" action="javascript:;" data-question_id="{{ $question->id }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <span class="questions-total-holder d-block mb-15">

        <span class="question-icon flag-question {{$flag_class}}"
              data-qresult_id="{{isset( $quizResultObj->id )? $quizResultObj->id : 0}}"
              data-question_id="{{$question->id }}">
                            <svg style="width: 42px;height: 42px;"
                                 xmlns="http://www.w3.org/2000/svg"
                                 version="1.0" width="512.000000pt" height="512.000000pt"
                                 viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet"> <g
                                        transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                        fill="#000000"
                                        stroke="none"> <path
                                            d="M1620 4674 c-46 -20 -77 -50 -103 -99 l-22 -40 -3 -1842 -2 -1843 -134 0 c-120 0 -137 -2 -177 -23 -24 -13 -57 -43 -74 -66 -27 -39 -30 -50 -30 -120 0 -66 4 -83 25 -114 14 -21 43 -50 64 -65 l39 -27 503 0 502 0 44 30 c138 97 118 306 -34 370 -27 11 -73 15 -168 15 l-130 0 0 750 0 750 1318 2 1319 3 40 28 c83 57 118 184 75 267 -10 19 -140 198 -290 398 -170 225 -270 367 -265 375 4 7 128 174 276 372 149 197 276 374 283 392 19 45 17 120 -5 168 -23 51 -79 101 -128 114 -26 7 -459 11 -1330 11 l-1293 0 0 20 c0 58 -56 137 -122 171 -45 23 -128 25 -178 3z"></path> </g> </svg>
                        </span>

        @if($layout_type != 'results') <span class="question-number-holder question-number" style="z-index: 999999999;"> {{$question_no}}</span>
        @endif
        <span class="question-dev-details">({{ $question->id }}) ({{ $question->question_difficulty_level }}) ({{ $question->question_type }})</span>
    </span>

    @php $classes = isset( $class )? $class : ''; @endphp
    <div id="rureraform-form-1"
            class="{{$classes}} rureraform-form rureraform-elements rureraform-form-input-medium rureraform-form-icon-inside rureraform-form-description-bottom ui-sortable"
            _data-parent="1"
            _data-parent-col="0" style="display: block;">
        <div class="question-layout row d-flex align-items-center">
            @if( isset( $show_marks ) && $show_marks == true)
                @if($layout_type != 'results')
                <span class="marks" data-marks="{{$question->question_score}}">{{$question->question_score}} marks</span>
                @endif
            @endif

            <span class="questions-total-holder d-block mb-15 px-15">( {{$question_no}}/{{$total_questions}} Questions )</span>
            {!! $question_layout !!}

            <div class="validation-error"></div>
        </div>
    </div>
</form>


<script>
    function question_layout_functions() {
        var Questioninterval = setInterval(function () {
            var seconds_count = $(".question-step-{{ $question->id }}").attr('data-elapsed');
            seconds_count = parseInt(seconds_count) + parseInt(1);
            $(".question-step-{{ $question->id }}").attr('data-elapsed', seconds_count);
        }, 1000);
    }
</script>

