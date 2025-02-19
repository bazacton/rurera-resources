@php $rand_id = rand(999,99999); @endphp
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .rurera-hide{display:none;}
	.backend-field-error {
		border: 3px solid #db1919 !important;
	}
</style>



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

$no_of_words = strlen($correct_answer);
$field_width = ($no_of_words * 1.5);
$question->question_average_time = 0.70;
if( isset( $time_limit )){
 $total_time = gmdate("i:s", $time_limit);
 $question->question_average_time = ($time_limit/60);
}
else{
    $total_time = gmdate("i:s", $question->question_average_time*60);
}
$duration_type = isset( $duration_type )? $duration_type : 'no_time_limit';

$timer_counter = 0;
if( isset( $duration_type ) ){
    if( $duration_type == 'per_question'){
    $timer_counter = $time_interval;
    }
    if( $duration_type == 'total_practice'){
    $timer_counter = $practice_time;
    }
}

$quiz_level = isset( $quiz_level )? $quiz_level : 'easy';
$hidden_indexes = getRandomIndexes($correct_answer);
$characters_list = [];
foreach( $hidden_indexes as $index_no){
	$characters_list[] = substr($correct_answer, $index_no,1);
}
$random_characters = getRandomCharacters($characters_list);
$characters_list = array_merge($characters_list, $random_characters);
shuffle($characters_list);

@endphp
<div class="question-area spell-question-area">
    <div class="correct-appriciate" style="display:none"></div>
    <div class="question-step question-step-{{ $question->id }}" data-time_counter="{{$timer_counter}}" data-elapsed="0"
         data-qattempt="{{isset( $quizAttempt->id )? $quizAttempt->id : 0}}"
         data-start_time="0" data-qresult="{{isset( $newQuestionResult->id )? $newQuestionResult->id : 0}}"
         data-quiz_result_id="{{isset( $quizAttempt->quiz_result_id )? $quizAttempt->quiz_result_id : 0}}">
        <div class="question-layout-block">
            <form class="question-fields" action="javascript:;" data-defination="{{isset($word_data['audio_defination'])? $word_data['audio_defination'] : ''}}" data-question_id="{{ $question->id }}">
                <div class="spells-quiz-info">
                    <ul>
                        <li class="show-correct-answer">
                            <span>{{$question_no}}</span> Of {{$total_questions_count}}
                        </li>
                        <li>
                            <span class="nub-of-sec question-time-remaining-{{ $question->id }}" data-remaining="{{($question->question_average_time*60)}}"></span>
                        </li>
                        <li class="total-points" data-total_points="{{isset( $total_points )? $total_points : 0}}">
                            <span>{{(isset( $total_points ) && $total_points > 0)? $total_points : '--'}}</span> <img src="/assets/default/img/panel-sidebar/coins.svg" alt="" width="25">
                        </li>
                        <li class="play-time" data-play_time="{{isset( $total_points )? $total_points : 0}}">
                            <span>{{(isset( $total_points ) && $total_points > 0)? $total_points : '--'}}</span> <img src="/assets/default/img/sidebar/games.svg" alt="" width="25">
                        </li>
                    </ul>
                </div>
                <div class="left-content has-bg">
				<div class="question-label"><span>Complete the sentence.</span></div>
				{!! isset( $layout_data )? $layout_data : ''!!}
                <div class="spells-quiz-sound">
                    <strong>Word <a href="javascript:;"  id="sound-icon-{{ $question->id }}-word" data-id="audio_file_{{ $question->id }}-word" class="play-btn sound-icon">
                      <img class="play-icon" src="/assets/default/svgs/play-circle.svg" alt="play-circle" height="20" width="20">
                      <img class="pause-icon" src="/assets/default/svgs/pause-circle.svg" alt="pause-circle" height="20" width="20">
                    </a> Sentence <a href="javascript:;"  id="sound-icon-{{ $question->id }}" data-id="audio_file_{{ $question->id }}" class="play-btn sound-icon play-sentence-sound pause">
                      <img class="play-icon" src="/assets/default/svgs/play-circle.svg" alt="play-circle" height="20" width="20">
                      <img class="pause-icon" src="/assets/default/svgs/pause-circle.svg" alt="pause-circle" height="20" width="20">
                    </a> </strong>
                </div>
                <div class="player-box hide">
				   <audio  class="player-box-audio" id="audio_file_{{ $question->id }}-word" src="{{isset($word_data['word_audio'])? $word_data['word_audio'] : ''}}"> </audio>
				   <audio  class="player-box-audio" id="audio_file_{{ $question->id }}" src="{{isset($word_data['audio_file'])? $word_data['audio_file'] : ''}}"> </audio>
                </div>
                <div class="spells-quiz-from question-layout">
                    <div class="form-field">
					
						@php $words_counter = 0; $field_html = ''; @endphp
                        @while($words_counter < $no_of_words)
                            @php $words_counterplus = $words_counter+1;
                            $field_width = ($words_counterplus >= $no_of_words)? '1.5' : '1.5';
							$word_character = substr($correct_answer, $words_counter, 1);
							$word_character = in_array($words_counter, $hidden_indexes)? '' : $word_character;
                            
                            $field_html .= '<input type="text" value="" maxlength="1" data-counter_id="'.$words_counter.'" class="rurera-req-field editor-field-inputs drop-target'.$question->id.'" style="width: '.$field_width.'ch;
                                                    background: repeating-linear-gradient(90deg, #747474 0, #747474 1ch, transparent 0, transparent 1.5ch) 0 100%/ 1ch 2px no-repeat;
                                                    font: 1.2rem buntu Mono, monospace;
                                                    letter-spacing: 0.5ch;">';
                        $words_counter++;@endphp
                        @endwhile
					
					@php 
					$sentence_value = isset( $word_data['audio_sentense'] )? $word_data['audio_sentense'] : '';
					$sentence_value = str_replace($correct_answer,'[BLANK]',$sentence_value);
					$sentence_value = str_replace(ucfirst($correct_answer),'[BLANK]',$sentence_value);
					$sentence_value = str_replace(strtolower($correct_answer),'[BLANK]',$sentence_value);
					$exam_sentenses = array($sentence_value);
					@endphp
					
						@if( !empty( $exam_sentenses ) )
						@php $random_index = array_rand($exam_sentenses);
							$sentenceValue = $exam_sentenses[$random_index]; 
							$sentenceValue = str_replace('[BLANK]','________',$sentenceValue);
							
							@endphp
							
							<div class="question-label"><span>{!! $sentenceValue !!}</span></div>
						@endif
						<br>
						<br>
						<div class="quiz-input-fields">
						{!! $field_html !!}
						</div>
						
						<div class="rurera-virtual-keyboard">
							<button type="button" class="keyboard-btn">Keyboard <span class="icon-box"><img src="/assets/default/svgs/keyboard.svg" alt=""></span> </button>
							<div class="virtual-keyboard rurera-hide">
								<div class="row justify-content-center">
								  <input type="button" value="q">
								  <input type="button" value="w">
								  <input type="button" value="e">
								  <input type="button" value="r">
								  <input type="button" value="t">
								  <input type="button" value="y">
								  <input type="button" value="u">
								  <input type="button" value="i">
								  <input type="button" value="o">
								  <input type="button" value="p">
								  <button class="delete" type="button"><span class="icon-box"><img src="/assets/default/svgs/backspace.svg" alt="backspace button"></span></button>
								</div>
								<div class="row justify-content-center">
								  <input type="button" value="a">
								  <input type="button" value="s">
								  <input type="button" value="d">
								  <input type="button" value="f">
								  <input type="button" value="g">
								  <input type="button" value="h">
								  <input type="button" value="j">
								  <input type="button" value="k">
								  <input type="button" value="l">
								</div>
								<div class="row justify-content-center">
								  <input type="button" value="z">
								  <input type="button" value="x">
								  <input type="button" value="c">
								  <input type="button" value="v">
								  <input type="button" value="b">
								  <input type="button" value="n">
								  <input type="button" value="m">
								  <input type="button" value="Cap" class="shift">
								</div>
								<div class="row spacebar justify-content-center">
								  <input type="button" value=" ">
								</div>
						  </div>
						</div>
						<input type="text" class="editor-field hide " data-field_id="{{$field_id}}" data-id="{{$field_id}}" id="field-{{$field_id}}">
                    </div>
                    <div class="question-correct-answere rurera-hide">
                        {{$correct_answer}} - {{$question->id}}
                    </div>
					<div class="question-populated-response"></div>
                    <div class="form-btn-field">
                        <button type="button" class="question-review-btn" data-id="{{ $question->id }}">Finish</button>
                        <button type="submit" class="question-submit-btn">Enter</button>
                        <a href="javascript:;" id="question-next-btn" class="question-next-btn rurera-hide">
                            Next
                            <img src="/assets/default/svgs/next-btn.svg" width="683" height="683" alt="next-btn">
                        </a>
                    </div>
                </div>

                    <div class="prev-next-controls text-center mb-50 questions-nav-controls  rurera-hide">
                        @if( !isset( $disable_finish ) || $disable_finish == 'false')
                        <a href="javascript:;" id="review-btn_{{ $question->id }}" data-toggle="modal" class="review-btn" data-target="#review_submit">
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
                        @else
                        <a href="javascript:;" id="next-btn" class="{{$next_class}} next-btn rurera-hide" data-question_id="{{$next_question}}" data-actual_question_id="{{$next_question}}">&nbsp;</a>
                        @endif
                        @if( !isset( $disable_submit ) || $disable_submit == 'false')
                        <a href="javascript:;" id="question-submit-btn" class="question-submit-btn">
                            mark answer
                        </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    var currentFunctionStart = null;
    var Questioninterval = null;

    var hint_counter = 0;
    var charPosition = 0;
    var userInput = false;
    var excludeArray = [];
    var ansCorr = '{{$correct_answer}}';
    var ansCharactersCount = ansCorr.length;
    var SpellQuestionintervalCountDownFunc = function() {
             currentFunctionStart = 'started';
            Questioninterval = setInterval(function () {
                var seconds_count_done = $(".question-step-{{ $question->id }}").attr('data-elapsed');
                hint_counter = parseInt(hint_counter) + parseInt(1);
                var quiz_level = '{{$quiz_level}}';
                seconds_count_done = parseInt(seconds_count_done) + parseInt(1);
                $(".question-step-{{ $question->id }}").attr('data-elapsed', seconds_count_done);
            }, 1000);

        }

    $(document).on('keyup', ".question-step-{{ $question->id }} .editor-field", function (e) {
        userInput = false;
        hint_counter = 0;
    });
	
	$(document).on('change', ".editor-field-option", function (e) {
        var current_option = $(this).val();
		$(".editor-field-inputs").val('');
		var inputs = $(".editor-field-inputs");
		for (var i = 0; i < inputs.length && i < current_option.length; i++) {
			$(inputs[i]).val(current_option.charAt(i)); // Set each character
		}
    });
	
	

    $(document).on('input keydown paste', ".editor-field-inputs", function (event) {
        var $this = $(this);
        var value = $this.val();

        if (event.type === 'paste') {
            event.preventDefault(); // Prevent default paste behavior

            // Get the pasted text
            var pastedText = (event.originalEvent || event).clipboardData.getData('text');

            // Split the pasted text into individual characters
            var characters = pastedText.split('');

            // Distribute each character into successive input fields
            characters.forEach(function(char) {
                $this.val(char);
                $this = $this.next('.editor-field-inputs');
            });

            // Ensure focus is on the last input field
            $this.focus();
        } else if ((event.type === 'input' || event.type === 'keydown') && value.length === 1) {
            $this.next('.editor-field-inputs').focus();
        } else if (event.type === 'keydown' && event.which === 8 && value === "") {
            $this.prev('.editor-field-inputs').focus();
        }
    });
	
	
	

    function getRandomNumberNotInArray(maxNumber, excludeArray) {
      var randomNumber;
      do {
        randomNumber = Math.floor(Math.random() * parseInt(maxNumber)); // Generate random number from 0 to 8
      } while (excludeArray.includes(randomNumber)); // Repeat if the number is in the array

      return randomNumber;
    }


</script>
<script type="text/javascript">
    window.onload = function() {
      var context = new AudioContext();
    }

    $(document).on('click', '.show-correct-answer', function (e) {
        $(this).closest('.spell-question-area').find('.question-correct-answere').removeClass('rurera-hide');

    });
	
	function onQuestionLoad(){
		console.log('onQuestionLoad');
		$('.editor-field-inputs:eq(0)').focus();
		
	}
	
	document.addEventListener('click', function() {
		const inputs = document.querySelectorAll('.quiz-input-fields .editor-field-inputs');
		for (let input of inputs) {
			if (input.value === '') {
				input.focus();
				return;
			}
		}
	});
	
	
	

    $(document).on('click', '#sound-icon-{{ $question->id }}', function (e) {
        var context = new AudioContext();
        $('.editor-field-inputs:eq(0)').focus();
        //$('#field-{{$field_id}}').focus();
        if( currentFunctionStart == null) {
            SpellQuestionintervalCountDownFunc();
        }
        //SpellQuestionintervalFunc();
        var player_id = $(this).attr('data-id');
		
		document.getElementById(player_id).play();
		$(this).addClass("pause");
        

        /*if ($(this).hasClass('pause')) {
            document.getElementById(player_id).play();
        } else {
            document.getElementById(player_id).pause();
        }*/
    });
    var audio = document.getElementById("audio_file_{{ $question->id }}");

    audio.addEventListener('ended', function () {	
        $('#sound-icon-{{ $question->id }}').toggleClass("pause");
    });
	
	
	$(document).on('click', '#sound-icon-{{ $question->id }}-word', function (e) {
        var context = new AudioContext();
        $('.editor-field-inputs:eq(0)').focus();
        //$('#field-{{$field_id}}').focus();
        if( currentFunctionStart == null) {
            SpellQuestionintervalCountDownFunc();
        }
        //SpellQuestionintervalFunc();
        var player_id = $(this).attr('data-id');
        

        document.getElementById(player_id).play();
		$(this).addClass("pause");
        /*if ($(this).hasClass('pause')) {
			//$(this).toggleClass("pause");
            document.getElementById(player_id).play();
        } else {
			//$(this).toggleClass("pause");
            document.getElementById(player_id).pause();
        }*/

    });

    $(document).on('click', '.start-spell-quiz', function (e) {
    //jQuery(document).ready(function() {

        console.log('focus-field');
		onQuestionLoad();

        $('.editor-field-inputs:eq(0)').focus();
        //$('#field-{{$field_id}}').focus();
        $('#sound-icon-{{ $question->id }}').click();
          var $keyboardWrapper = $('.virtual-keyboard'),
          $key = $keyboardWrapper.find("input"),
          $key_delete = $('.delete'),
          $key_shift = $('.shift'),
          $outputField = $('#field-{{$field_id}}'),
          $currentValue = $outputField.val(),
          actionKeys = $(".delete,.shift")
          activeShiftClass = "shift-activated";

          function _keystroke(keyCase){
            $key.not(actionKeys).on('click',function(e){
              e.preventDefault();

              if($key_shift.hasClass(activeShiftClass)){
                keyCase = 'upper';
                $key_shift.removeClass(activeShiftClass);
              }else{
                keyCase = 'lower';
              }

              if(keyCase == 'upper'){
                var keyValue = $(this).val().toUpperCase();
              }else{
                var keyValue = $(this).val().toLowerCase();
              }

              var output = $('#field-{{$field_id}}').val();
                  $outputField.val(output + keyValue);
                  getCurrentVal();
                  focusOutputField();
            });

            }
            $key_delete.on('click',function(e){
            e.preventDefault();
            $outputField.val($currentValue.substr(0,$currentValue.length - 1));
            getCurrentVal();
            focusOutputField();
            });

            $key_shift.on('click',function(e){
            e.preventDefault();
            $(this).toggleClass(activeShiftClass);
            });

            function getCurrentVal(){
            $currentValue = $outputField.val();
            }

            function focusOutputField(){
            $outputField.focus();
            }

            _keystroke("lower");
        });
</script>

