<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="blank-canvas-sidebar">
            <h3 class="title">QUESTION <span>({{$questions_data->count()}})</span></h3>
            <div id="sortable">
                @if($questions_data->count() > 0)
                    @php $question_count = 1; @endphp
                    @foreach($questions_data as $questionObj)

                        <div class="question-card">
                            <a href="#" class="question-card-link">
                                <div class="question-content">
                                    <div class="question-text"><div class="q-number">{{$question_count}}</div> {{$questionObj->question_title}}</div>
                                    <div class="question-type">
                                        <span><img src="/assets/default/svgs/multi-choice.svg" alt="">{{$questionObj->question_type}}</span>
                                        <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @php $question_count++; @endphp
                    @endforeach
                @endif

            </div>

        </div>
        <div class="canvas-modal-container">

            @if($questions_data->count() > 0)
                @php $question_count = 1; @endphp
                @foreach($questions_data as $questionObj)
                    <div class="question-layout-holder mb-15 bg-white panel-border rounded-sm p-25">
                        <div class="question-layout-block-holder" data-question_id="{{$questionObj->id}}">
                            <div class="quiz-layout-edit-options">
                                <div class="edit-options-right">
                                    <div class="edit-options-controls">
                                        <button type="button" data-id="{{$questionObj->id}}" class="delete-btn" data-toggle="tooltip" data-placement="top" title="" data-trigger="hover" data-original-title="Trash"><img src="/assets/default/svgs/trash-bin.svg" alt=""></button>
                                        <button type="button" data-id="{{$questionObj->id}}" class="edit-btn" data-toggle="modal" data-target="#blank-canvas-modal1">
                                            <span class="icon-box" data-toggle="tooltip" data-placement="top" title="" data-trigger="hover" data-original-title="Edit"><img src="/assets/default/svgs/clapperboard-edit.svg" alt=""></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="question-layout-holder mb-15 bg-white panel-border rounded-sm p-25">
                                <div class="question-layout-block">
                                    @php echo $QuestionsAttemptController->get_question_layout($questionObj); @endphp
                                </div>
                            </div>
                        </div>
                    </div>
              @endforeach
            @endif
            <div class="section-controls mb-30">
                <button type="button" class="save-btn">Save</button>
                <button type="button" class="cancel-btn">Cancel</button>
            </div>
        </div>
    </div>
</div>
