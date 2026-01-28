@if( $incorrect_flag == true)
	<span class="question-status-wrong">Thats incorrect, but well done for trying
	</span>
	<span class="inc" style="text-decoration: line-through;">{{is_array($question_user_input)? explode(',', $question_user_input) : $question_user_input}}</span>
	<span class="cor">{{is_array($question_correct_answere)? explode(',', $question_correct_answere) : $question_correct_answere}}</span>

@else
	<span class="question-status-correct">Well done! Thats exactly right.</span>
@endif