
    <div class="elements-holder bg-white panel-border p-15 border-bottom-0">
        <div class="questions-header">
            <div class="questions-header-inner">
                <div class="text-holder">
                    <h5>{{$quizObj->getTitleAttribute()}}<small>({{$quizObj->quizQuestionsList->count()}} questions)</small></h5>
                </div>
            </div>
        </div>
        <ul class="list-options question-list-options mb-15">
            <li><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt=""></span> 8 questions</li>
            <li><span class="icon-box"><img src="/assets/default/svgs/save.svg" alt=""></span> 7th-8th  Grade</li>
            <li><span class="icon-box"><img src="/assets/default/svgs/book-saved.svg" alt=""></span> Science</li>
        </ul>
    </div>
    <div class="question-layout-holder mb-0 bg-white panel-border p-25 border-bottom-0">

        @if($quizObj->quizQuestionsList->count() > 0)
            @foreach($quizObj->quizQuestionsList as $quizQuestionObj)
                @php $questionObj = $quizQuestionObj->SingleQuestionData; @endphp
                <div class="question-layout-block">
                    <form class="question-fields" action="javascript:;" data-question_id="10180">
                        <div class="left-content has-bg">
                            <div id="rureraform-form-1" class=" rureraform-form rureraform-elements rureraform-form-input-medium rureraform-form-icon-inside rureraform-form-description-bottom ui-sortable" _data-parent="1" _data-parent-col="0" style="display: block;">
                                <div class="question-layout row d-flex align-items-start">
                                    @php $question_layout = $QuestionsAttemptController->get_question_layout($questionObj); @endphp
                                    {!! $question_layout !!}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
          @endforeach
        @endif

