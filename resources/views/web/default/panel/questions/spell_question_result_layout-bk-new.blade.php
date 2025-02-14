@php $rand_id = rand(999,99999); @endphp
<meta name="csrf-token" content="{{ csrf_token() }}">



<div class="question-step quiz-complete" style="display:none">
    <div class="question-layout-block">
        <div class="left-content has-bg">
            <h2>&nbsp;</h2>
            <div id="rureraform-form-1"
                 class="rureraform-form rureraform-elements rureraform-form-input-medium rureraform-form-icon-inside rureraform-form-description-bottom ui-sortable"
                 _data-parent="1"
                 _data-parent-col="0" style="display: block;"></div>
        </div>

    </div>
</div>

@php
$question_layout = html_entity_decode(json_decode(base64_decode(trim(stripslashes($question->question_layout)))));
$search_tags = ($question->search_tags != '')? explode(' | ', $question->search_tags) : array();
$is_development = (!empty( $search_tags ) && in_array('development', $search_tags))? true : false;

@endphp

<div class="question-area spell-question-area">
    <div class="correct-appriciate" style="display:none"></div>
    <div class="question-step question-step-{{ $question->id }}" data-elapsed="0"
         data-qattempt="{{isset( $quizAttempt->id )? $quizAttempt->id : 0}}"
         data-start_time="0" data-qresult="{{isset( $newQuestionResult->id )? $newQuestionResult->id : 0}}"
         data-quiz_result_id="{{isset( $quizAttempt->quiz_result_id )? $quizAttempt->quiz_result_id : 0}}">
        <div class="question-layout-block">

            <form class="question-fields" action="javascript:;" data-question_id="{{ $question->id }}">
                <div class="left-content has-bg">
                <div class="spells-quiz-info">
                    <ul>
                        <li>
                            <span>{{$question_no}}</span> Of 10
                        </li>
                        <li>
                           XX
                        </li>
                        <li>
                            <span>0</span> Points
                        </li>
                    </ul>
                </div>
                <div class="spells-quiz-sound">
                    <strong>Hear It: <span class="sound-icon" id="sound-icon-{{ $question->id }}" data-id="audio_file_{{ $question->id }}">&#128362</span></strong>
                </div>
                <div class="player-box">
                   <audio class="player-box-audio" id="audio_file_{{ $question->id }}" src="{{isset($word_data['audio_file'])? $word_data['audio_file'] : ''}}"> </audio>
                </div>
                <div class="spells-quiz-from question-layout">
                    <div class="form-field">
                        <input type="text" class="editor-field" disabled value="{{$user_answer}}" data-field_id="{{$field_id}}" data-id="{{$field_id}}" id="field-{{$field_id}}">

                    </div>
                    <div class="correct-answere">
                        {{$correct_answer}}
                    </div>
                </div>
                </div>


                <div class="prev-next-controls text-center mb-50 questions-nav-controls  rurera-hide">
                    @if( !isset( $disable_finish ) || $disable_finish == 'false')
                    <a href="javascript:;" data-toggle="modal" class="review-btn" data-target="#review_submit">
                        Finish
                        <img src="/assets/default/svgs/review-btn-flag.svg" width="683" height="683" alt="review-btn-flag">
                    </a>
                    @endif
                    @php $prev_class = (isset( $prev_question ) && $prev_question > 0)? '' : 'disable-btn'; @endphp
                    @if( !isset( $disable_prev ) || $disable_prev == 'false')
                    <a href="javascript:;" id="prev-btn" class="{{$prev_class}} prev-btn" data-question_id="{{$prev_question}}">
                        <img src="/assets/default/svgs/next-btn.svg" width="683" height="683" alt="next-btn">
                    </a>
                    @endif
                    @php $next_class = (isset( $next_question ) && $next_question > 0)? '' : 'disable-btn'; @endphp
                    @if( !isset( $disable_next ) || $disable_next == 'false')
                    <a href="javascript:;" id="next-btn" class="{{$next_class}} next-btn" data-question_id="{{$next_question}}">
                        Next
                        <img src="/assets/default/svgs/next-btn.svg" width="683" height="683" alt="next-btn">
                    </a>
                    @endif
                    @if( !isset( $disable_submit ) || $disable_submit == 'false')
                    <a href="javascript:;" id="question-submit-btn" class="question-submit-btn">
                        mark answer
                    </a>


                    @endif
                </div>

            </form>

        </div>
    </div>

</div>

<script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>

