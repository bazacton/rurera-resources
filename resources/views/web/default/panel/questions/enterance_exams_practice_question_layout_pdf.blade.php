@php $rand_id = rand(999,99999); $layout_type = isset( $layout_type )? $layout_type : ''; @endphp

<article class="content-block question-block">
    <div class="question-head">
        <div class="q-number">Question 1</div>
        <div class="q-type">Multiple Choice</div>
    </div>
@php
    $is_pdf = isset($is_pdf)? $is_pdf : false;
    $question_layout = $QuestionsAttemptController->get_question_layout($question, false, $is_pdf);
@endphp

    {!! $question_layout !!}
</article>
