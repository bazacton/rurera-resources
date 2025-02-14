
    <div class="elements-holder bg-white panel-border p-15 border-bottom-0">
        <div class="questions-header">
            <div class="questions-header-inner">
                <div class="text-holder">
                    <h5>{{$topicPartItemObj->title}}<small>({{$topicPartItemObj->topicPartItemQuestions->count()}} questions)</small></h5>
                </div>
            </div>
        </div>
        <ul class="list-options question-list-options mb-15">
            <li><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt=""></span> 8 questions</li>
            <li><span class="icon-box"><img src="/assets/default/svgs/save.svg" alt=""></span> 7th-8th  Grade</li>
            <li><span class="icon-box"><img src="/assets/default/svgs/book-saved.svg" alt=""></span> Science</li>
        </ul>
        <div class="class-controls">
            <div class="left-area d-inline-flex align-items-center">
                <div class="class-controls-option questions-control-options border-0 mr-0 pr-0 d-inline-flex align-items-center">
                    <button type="button"><img src="/assets/default/svgs/edit-simple.svg" alt="">Copy & edit</button>
                    <button type="button"><img src="/assets/default/svgs/save.svg" alt="">Save</button>
                    <button type="button"><img src="/assets/default/svgs/share.svg" alt="">Share</button>
                    <button type="button"><img src="/assets/default/svgs/download.svg" alt="">Worksheet</button>
                    <div class="dropdown-box">
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                <span class="icon-box"><img src="/assets/default/svgs/dots-three.svg" alt=""></span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#"><img src="/assets/default/svgs/print.svg" alt=""> Print</a>
                                <a class="dropdown-item" href="#"><img src="/assets/default/svgs/trash-bin.svg" alt=""> Delete</a>
                                <a class="dropdown-item" href="#"><img src="/assets/default/svgs/envelope.svg" alt=""> Email To Prent</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-area w-auto">
                <button type="button" class="assignment-btn add-level-stage-topic-btn" data-id="{{$topicPartItemObj->id}}" data-title="{{$topicPartItemObj->title}}"><img class="show-img" src="/assets/default/svgs/clock.svg" alt=""> Assign</button>
                <button type="button" class="perview-btn" data-toggle="modal" data-target="#document-modal"><img class="show-img" src="/assets/default/svgs/eye-show.svg" alt=""> Perview</button>
            </div>
        </div>
    </div>
    <div class="question-layout-holder mb-0 bg-white panel-border p-25">

        @if($topicPartItemObj->topicPartItemQuestions->count() > 0)
            @foreach($topicPartItemObj->topicPartItemQuestions as $questionObj)
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

