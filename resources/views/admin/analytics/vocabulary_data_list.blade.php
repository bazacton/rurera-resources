<style>
    .status-correct i{
        color: #a3e05f;
        font-size: 20px;
    }

    .status-incorrect i{
        color: #ff4b4b;
        font-size: 20px;
    }
    .status-in_review i{
        color: #c8d022;
        font-size: 20px;
    }
    .status-practiced i{
        color: #ecf520;
        font-size: 20px;
    }
    .status-not_attempted i, .status-pending i{
        color: #d6d6d6;
        font-size: 20px;
    }
</style>
@php $colors_array = array('table-col-yellow', 'table-col-red', 'table-col-orange'); @endphp
<div class="statuses-list">
    <span class="status-incorrect"><i class="fas fa-dot-circle"></i> Non Mastered</span> &nbsp;&nbsp;&nbsp;
    <span class="status-correct"><i class="fas fa-dot-circle"></i> Mastered</span> &nbsp;&nbsp;&nbsp;
    <span class="status-practiced"><i class="fas fa-dot-circle"></i> Practiced</span> &nbsp;&nbsp;&nbsp;
    <span class="status-not_attempted"><i class="fas fa-dot-circle"></i> Not Attempted</span>
</div>
<div class="topic-parts-data table-responsive">

    <table class="table heatmap-table">
        <thead>
        <tr class="topic-heading-top">
            <th class="font-14"> &nbsp;</th>
            @if($vocabulary_list->count() > 0)
                @foreach($vocabulary_list as $vocabularyObj)
                    <th class="font-14" colspan="{{$vocabularyObj->quizQuestionsList->count()+2}}"> <span>{{$vocabularyObj->getTitleAttribute()}}</span></th>
                @endforeach
            @endif
        </tr>
        <tr class="topic-heading-top">
            <th class="font-14">Student</th>
            @php $topic_counter = 1; @endphp
            @if($vocabulary_list->count() > 0)
                @foreach($vocabulary_list as $vocabularyObj)
                    @if($vocabularyObj->quizQuestionsList->count() > 0)
                        @foreach($vocabularyObj->quizQuestionsList as $quizQuestionsListObj)
                            @php
                                $SingleQuestionDataObj = $quizQuestionsListObj->SingleQuestionData;
                                if(!isset($SingleQuestionDataObj->id)){ continue; }
                                $layout_elements = isset($SingleQuestionDataObj->layout_elements) ? json_decode($SingleQuestionDataObj->layout_elements) : array();
                                $spell_word = '';
                                if (!empty($layout_elements)) {
                                    foreach ($layout_elements as $elementData) {
                                        $spell_word = isset($elementData->correct_answer) ? $elementData->correct_answer : $spell_word;
                                    }
                                }
                            @endphp
                            <th class="font-14">{{$spell_word}}</th>
                        @endforeach
                    @endif


                    <th class="font-14">Activity Time</th>
                    <th class="font-14">Progress</th>
                    @php $topic_counter++; @endphp
                @endforeach
            @endif
        </tr>

        </thead>
        <tbody id="topic_part_1">
        @if($studentsList->count() > 0)
            @foreach($studentsList as $studentObj)
                <tr>
                    <td>{{$studentObj->get_full_name()}}</td>

                    @if($vocabulary_list->count() > 0)
                        @foreach($vocabulary_list as $vocabularyObj)
                            @php $questions_time_consumed_total = 0; @endphp

                                @if($vocabularyObj->quizQuestionsList->count() > 0)
                                    @foreach($vocabularyObj->quizQuestionsList as $quizQuestionsListObj)

                                    @php
                                       $question_status = 'pending';
                                       $class = '';
                                       $SingleQuestionDataObj = $quizQuestionsListObj->SingleQuestionData;
                                       if(!isset($SingleQuestionDataObj->id)){ continue; }

                                        $questionAnalyticResult = isset($students_questions_result[$studentObj->id][$vocabularyObj->id])? $students_questions_result[$studentObj->id][$vocabularyObj->id] : array();
                                        $userVocabularyObj = isset($users_vocabularies[$studentObj->id])? $users_vocabularies[$studentObj->id] : (object) array();
                                        $mastered_words = isset($userVocabularyObj->mastered_words)? json_decode($userVocabularyObj->mastered_words, true) : array();
                                        $in_progress_words = isset($userVocabularyObj->in_progress_words)? json_decode($userVocabularyObj->in_progress_words, true) : array();
                                        $non_mastered_words = isset($userVocabularyObj->non_mastered_words)? json_decode($userVocabularyObj->non_mastered_words, true) : array();

                                        $resultObj = isset($questionAnalyticResult['resultObj'])? $questionAnalyticResult['resultObj'] : (object) array();

                                        $other_data = isset($resultObj->other_data)? json_decode($resultObj->other_data) : array();
                                        $mastered_words = isset($other_data->mastered_words)? json_decode($other_data->mastered_words, true) : array();
                                        $practiced_words = isset($other_data->practiced_words)? json_decode($other_data->practiced_words, true) : array();

                                        $question_practice_status = '';
                                        $question_practice_status = isset($practiced_words[$SingleQuestionDataObj->id])? '<span class="status-practiced"><i class="fas fa-dot-circle"></i></span>' : $question_practice_status;

                                        $question_status = '<span class="status-not_attempted"><i class="fas fa-dot-circle"></i></span>';
                                        $question_status = isset($non_mastered_words[$SingleQuestionDataObj->id])? '<span class="status-incorrect"><i class="fas fa-dot-circle"></i></span>' : $question_status;
                                        $question_status = isset($in_progress_words[$SingleQuestionDataObj->id])? '<span class="status-correct"><i class="fas fa-dot-circle"></i></span>' : $question_status;
                                        $question_status = isset($mastered_words[$SingleQuestionDataObj->id])? '<span class="status-correct"><i class="fas fa-dot-circle"></i></span>' : $question_status;

                                        $question_status = $question_practice_status.$question_status;

                                        $class = '';
                                        $class = isset($non_mastered_words[$SingleQuestionDataObj->id])? 'wrong' : $class;
                                        $class = isset($in_progress_words[$SingleQuestionDataObj->id])? 'pending' : $class;
                                        $class = isset($mastered_words[$SingleQuestionDataObj->id])? 'correct' : $class;
                                    @endphp

                                    @php
                                        $class = '';
                                        $SingleQuestionDataObj = $quizQuestionsListObj->SingleQuestionData;
                                        if(!isset($SingleQuestionDataObj->id)){ continue; }

                                        $attempt_question_ids = isset($questionAnalyticResult['attempt_question_ids'])? $questionAnalyticResult['attempt_question_ids'] : array();
                                        $questions_attempts = isset($questionAnalyticResult['questions_attempts'])? $questionAnalyticResult['questions_attempts'] : array();

                                        $currentQuestionData = isset($attempt_question_ids[$SingleQuestionDataObj->id])? $attempt_question_ids[$SingleQuestionDataObj->id] : array();
                                        $time_consumed = isset($currentQuestionData['time_consumed'])? $currentQuestionData['time_consumed'] : 0;
                                        $question_result_id = isset($currentQuestionData['question_result_id'])? $currentQuestionData['question_result_id'] : 0;

                                        $question_status_response = '<span class="status-'.$class.'"><i class="fas fa-dot-circle"></i></span>';
                                        if($question_status == 'in_review'){
                                            $question_status_response = '<a href="javascript:;" class="review-question" data-question_id="'.$question_result_id.'"><span class="status-in_review"><i class="fas fa-dot-circle"></i></span></a>';
                                        }
                                        $questions_time_consumed_total += $time_consumed;
                                        $question_status_response = $question_status;

                                    @endphp
                                    <td class="{{$class}}">
                                        {!! $question_status_response !!}
                                    </td>
                                    @endforeach
                                @endif

                            <td>{{getTimeWithText($questions_time_consumed_total)}}</td>
                            <td><div class="circle_percent circle-green" data-percent="50">
                                    <div class="circle_inner">
                                        <div class="round_per" style="transform: rotate(360deg);"></div>
                                    </div>
                                    <div class="circle_inbox">
                                        <span class="percent_text">50%</span>
                                    </div>
                                </div></td>

                        @endforeach
                    @endif

                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

</div>

