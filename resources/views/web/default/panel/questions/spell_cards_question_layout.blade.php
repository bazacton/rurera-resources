@php $rand_id = rand(999,99999); @endphp
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .rurera-hide{display:none;}
	.rurera-selectable-options li.active {background:#86b46c}
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

$checkbox_layout = isset($checkbox_layout)? $checkbox_layout : '';
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


            <form class="question-fields" action="javascript:;" data-defination="{{isset($word_data['audio_defination'])? $word_data['audio_defination'] : ''}}" data-question_id="{{ $question->id }}">

                <div class="words-list-holder">
                    <div class="words-list-card card-flip">
                        <div class="card-header">
                            <span class="card-number">1</span>
                        </div>
                        <div class="card-body">
                            <div class="word-icon">
                                <i>&#128360;</i>
                                <strong class="word-label">adept</strong>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="card-flip-btn"><img src="/assets/default/svgs/bulb.svg" alt="bulb" height="30" width="30"><span>Tip: Tap card to flip</span></button>
                        </div>
                    </div>
                    <div class="words-list-card">
                        <div class="card-header">
                            <span class="card-icon">
                                <i>&#128360;</i>
                            </span>
                            <strong class="word-label">adept</strong>
                        </div>
                        <div class="card-body">
                            <div class="word-boxes">
                                <div class="word-char">
                                    <span class="pronounce-letter">a</span>
                                    <span class="pronounce-word">/a/</span>
                                    <span class="pronounce-audio">
                                        <a href="javascript:;" class="play-btn">
                                            <img class="play-icon" src="/assets/default/svgs/play-circle.svg" alt="play-circle" height="20" width="20">
                                            <img class="pause-icon" src="/assets/default/svgs/pause-circle.svg" alt="pause-circle" height="20" width="20">
                                            <div class="player-box">
                                                <audio class="player-box-audio" id="player-phonics-379674-1" src="/phonics/a.mp3"></audio>
                                            </div>
                                        </a>
                                    </span>
                                </div>
                                <div class="word-char">
                                    <span class="pronounce-letter">b</span>
                                    <span class="pronounce-word">/b/</span>
                                    <span class="pronounce-audio">
                                        <a href="javascript:;" class="play-btn">
                                            <img class="play-icon" src="/assets/default/svgs/play-circle.svg" alt="play-circle" height="20" width="20">
                                            <img class="pause-icon" src="/assets/default/svgs/pause-circle.svg" alt="pause-circle" height="20" width="20">
                                            <div class="player-box">
                                                    <audio class="player-box-audio" id="player-phonics-379674-2" src="/phonics/b.mp3"></audio>
                                            </div>
                                        </a>
                                    </span>
                                </div>
                                <div class="word-char">
                                    <span class="pronounce-letter">a</span>
                                    <span class="pronounce-word">/a/</span>
                                    <span class="pronounce-audio">
                                        <a href="javascript:;" class="play-btn">
                                            <img class="play-icon" src="/assets/default/svgs/play-circle.svg" alt="play-circle" height="20" width="20">
                                            <img class="pause-icon" src="/assets/default/svgs/pause-circle.svg" alt="pause-circle" height="20" width="20">
                                            <div class="player-box">
                                                <audio class="player-box-audio" id="player-phonics-379674-3" src="/phonics/a.mp3"></audio>
                                            </div>
                                        </a>
                                    </span>
                                </div>
                                <div class="word-char">
                                    <span class="pronounce-letter">t</span>
                                    <span class="pronounce-word">/ch/</span>
                                    <span class="pronounce-audio">
                                        <a href="javascript:;" class="play-btn">
                                            <img class="play-icon" src="/assets/default/svgs/play-circle.svg" alt="play-circle" height="20" width="20">
                                            <img class="pause-icon" src="/assets/default/svgs/pause-circle.svg" alt="pause-circle" height="20" width="20">
                                            <div class="player-box">
                                                <audio class="player-box-audio" id="player-phonics-379674-4" src="/phonics/ch.mp3"></audio>
                                            </div>
                                        </a>
                                    </span>
                                </div>
                                <div class="word-char">
                                    <span class="pronounce-letter">e</span>
                                    <span class="pronounce-word">/e/</span>
                                    <span class="pronounce-audio">
                                        <a href="javascript:;" class="play-btn">
                                            <img class="play-icon" src="/assets/default/svgs/play-circle.svg" alt="play-circle" height="20" width="20">
                                            <img class="pause-icon" src="/assets/default/svgs/pause-circle.svg" alt="pause-circle" height="20" width="20">
                                            <div class="player-box">
                                                <audio class="player-box-audio" id="player-phonics-379674-5" src="/phonics/e.mp3"></audio>
                                            </div>
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <h5>Sentence</h5>
                            <p>He is adept at mental arithmetic..</p>
                            <h5>Meaning</h5>
                            <p>Highly skilled or proficient</p>
                        </div>
                    </div>
                    
                </div>
            </form>


<script>

	/*$(document).ready(function() {
		const draggableItems = document.querySelectorAll('.draggable');
		const dropTargets = document.getElementsByClassName('drop-target{{ $question->id }}');


		draggableItems.forEach(item => {
			item.addEventListener('dragstart', (event) => {
				event.dataTransfer.setData('text/plain', event.target.id);
			});
		});

		Array.from(dropTargets).forEach(dropTarget => {
			dropTarget.addEventListener('dragover', (event) => {
				event.preventDefault(); // Necessary to allow drop
			});
		});

		Array.from(dropTargets).forEach(dropTarget => {
			dropTarget.addEventListener('drop', (event) => {
				const id = event.dataTransfer.getData('text/plain');
				console.log('sdfsdfsdfsdf');
				const draggedElement = document.getElementById(id);
				console.log(draggedElement.innerHTML);
				if (draggedElement) {
					dropTarget.value  = draggedElement.innerHTML;
				}
			});
		});
	});*/

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

