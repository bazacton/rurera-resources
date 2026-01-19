@php
$attempted_questions = $attempt_questions_list->count();
$total_questions = is_array( $questions_list )? count($questions_list): 0;
@endphp
<div class="col-lg-12 col-md-12 col-sm-12 mt-10">
    <div class="question-area-block" data-questions_layout="{{json_encode($questions_layout)}}">
        @if( !empty( $questions_layout ))
            @foreach( $questions_layout as $question_layout_template)
                {!! $question_layout_template !!}
            @endforeach
        @endif
    </div>

</div>
