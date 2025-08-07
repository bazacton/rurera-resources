@php $rand_id = rand(999,99999);




@endphp
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .rurera-hide{display:none;}
	.rurera-selectable-options li.active {background:#86b46c}
	.backend-field-error {
		border: 3px solid #db1919 !important;
	}

	table {
		border-collapse: collapse;
	}
	td {
		width: 30px;
		height: 30px;
		text-align: center;
		border: 1px solid black;
		cursor: pointer;
		user-select: none;
	}
	.selected {
		background-color: yellow;
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

$gridSize = 18;
$grid = createEmptyGrid($gridSize);
$correct_answer_upper = strtoupper($correct_answer);
$words = ["$correct_answer_upper"];

foreach ($words as $word) {
    placeWordInGrid($grid, $word);
}

fillGridWithRandomLetters($grid);
@endphp
<div class="question-area spell-question-area">
    <div class="correct-appriciate" style="display:none"></div>
    <div class="question-step question-step-{{ $question->id }}" data-time_counter="{{$timer_counter}}" data-elapsed="0"
         data-qattempt="{{isset( $quizAttempt->id )? $quizAttempt->id : 0}}"
         data-start_time="0" data-qresult="{{isset( $newQuestionResult->id )? $newQuestionResult->id : 0}}"
         data-quiz_result_id="{{isset( $quizAttempt->quiz_result_id )? $quizAttempt->quiz_result_id : 0}}">
        <div class="question-layout-block">

            <form class="question-fields" action="javascript:;" data-defination="{{isset($word_data['audio_defination'])? $word_data['audio_defination'] : ''}}" data-question_id="{{ $question->id }}">

                <div class="left-content has-bg">
				<div class="question-label"><span>Fill in the Blank(s) to Complete the Hidden Word.</span></div>
				{!! isset( $layout_data )? $layout_data : ''!!}

                <div class="spells-quiz-sound">
                    <strong>Word <a href="javascript:;"  id="sound-icon-{{ $question->id }}-word" data-id="audio_file_{{ $question->id }}-word" class="play-btn sound-icon play-word-btn">
                      <img class="play-icon" src="/assets/default/svgs/play-circle.svg" alt="" height="20" width="20">
                      <img class="pause-icon" src="/assets/default/svgs/pause-circle.svg" alt="" height="20" width="20">
                    </a>
                        @php $is_sentence_show = isset($is_sentence_show)? $is_sentence_show : false; @endphp
                        @if($is_sentence_show == true)
                        Sentence <a href="javascript:;"  id="sound-icon-{{ $question->id }}" data-id="audio_file_{{ $question->id }}" class="play-btn sound-icon play-sentence-sound">
                      <img class="play-icon" src="/assets/default/svgs/play-circle.svg" alt="" height="20" width="20">
                      <img class="pause-icon" src="/assets/default/svgs/pause-circle.svg" alt="" height="20" width="20">
                    </a> @endif</strong>
                </div>
                <div class="player-box">
				   <audio  class="player-box-audio" id="audio_file_{{ $question->id }}-word" src="{{isset($word_data['word_audio'])? $word_data['word_audio'] : ''}}"> </audio>
				   <audio  class="player-box-audio" id="audio_file_{{ $question->id }}" src="{{isset($word_data['audio_file'])? $word_data['audio_file'] : ''}}"> </audio>
                </div>
                <div class="spells-quiz-from question-layout">
                    <div class="form-field">


						<table id="word-search-{{ $question->id }}">
						@foreach ($grid as $rowIndex => $row)
							<tr>
								@foreach($row as $colIndex => $letter)
									<td data-row="{{$rowIndex}}" data-col="{{$colIndex}}">{{$letter}}</td>
								@endforeach
							</tr>
						@endforeach
					</table>


                        <input type="text" data-min="{{$no_of_words}}" class="editor-field rurera-min-char hide" data-field_id="{{$field_id}}" data-id="{{$field_id}}" id="field-{{$field_id}}">
                    </div>



                    <div class="question-correct-answere rurera-hide">
                        {{$correct_answer}} - {{$question->id}}
                    </div>




                </div>


                </div>
            </form>
        </div>
    </div>
</div>

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



	function onQuestionLoad(){
		console.log('onQuestionLoad');
		const words = '{{json_encode($words)}}';
        let selectedCells = [];
        let isMouseDown = false;

        const table = document.getElementById('word-search-{{ $question->id }}');
        table.addEventListener('mousedown', (event) => {
            isMouseDown = true;
            const cell = event.target;
            if (cell.tagName === 'TD') {
                handleSelection(cell);
            }
        });

        table.addEventListener('mouseover', (event) => {
            if (isMouseDown) {
                const cell = event.target;
                if (cell.tagName === 'TD') {
                    handleSelection(cell);
                }
            }
        });

        table.addEventListener('mouseup', () => {
            isMouseDown = false;
            checkWord();
            selectedCells.forEach(c => c.classList.remove('selected'));
            selectedCells = [];
        });

        document.addEventListener('mouseup', () => {
            isMouseDown = false;
        });

        function handleSelection(cell) {
            if (selectedCells.includes(cell)) {
                cell.classList.remove('selected');
                selectedCells = selectedCells.filter(c => c !== cell);
            } else {
                cell.classList.add('selected');
                selectedCells.push(cell);
            }
        }

        function checkWord() {
            const selectedWord = selectedCells.map(cell => cell.textContent).join('');
            const reversedWord = selectedWord.split('').reverse().join('');
			selectedCells.forEach(cell => cell.style.backgroundColor = 'gray');
            /*if (words.includes(selectedWord) || words.includes(reversedWord)) {
                selectedCells.forEach(cell => cell.style.backgroundColor = 'gray');
            }*/
			if( selectedWord == '{{$correct_answer_upper}}'){
				$(".editor-field").val(selectedWord);
				$('#question-submit-btn')[0].click();
				return true;
			}else{
				$(".editor-field").val(selectedWord);
				$('#question-submit-btn')[0].click();
				return true;
			}
        }
	}


</script>

