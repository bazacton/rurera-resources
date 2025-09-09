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

    .status-not_attempted i, .status-pending i{
        color: #d6d6d6;
        font-size: 20px;
    }
</style>
@php $colors_array = array('table-col-yellow', 'table-col-red', 'table-col-orange'); @endphp
<div class="statuses-list">
    <span class="status-incorrect"><i class="fas fa-dot-circle"></i> Incorrect</span> &nbsp;&nbsp;&nbsp;
    <span class="status-in_review"><i class="fas fa-dot-circle"></i> In Review</span> &nbsp;&nbsp;&nbsp;
    <span class="status-correct"><i class="fas fa-dot-circle"></i> Correct</span> &nbsp;&nbsp;&nbsp;
    <span class="status-not_attempted"><i class="fas fa-dot-circle"></i> Not Attempted</span>
</div>
<div class="rurera-timeline timeline-container">
    <input type="range" name="timeline_date" id="dateRange" min="0" value="0">
    <div class="date-label" id="dateLabel"></div>
</div>

<div class="topic-parts-data table-responsive">
    <table class="table heatmap-table">
        <thead>
        <tr class="topic-heading-top">
            <th class="font-14"> &nbsp;</th>
            @if(!empty($chapters_list))
                @foreach($chapters_list as $chapter_id => $chapter_title)
                    @php $chapter_questions_list = isset( $chapters_questions_list[$chapter_id] )? $chapters_questions_list[$chapter_id] : array(); @endphp
                    <th class="font-14" colspan="{{count($chapter_questions_list)+3}}">{{$chapter_title}}</th>
                @endforeach
            @endif
        </tr>
        @if($studentsList->count() > 0)
            @foreach($studentsList as $studentObj)
                <tr class="topic-heading-top">
                    <th class="font-14">Student</th>

                    @if(!empty($chapters_list))
                        @foreach($chapters_list as $chapter_id => $chapter_title)
                            @php $chapterStudentData = isset($chapters_students_data[$studentObj->id][$chapter_id])? $chapters_students_data[$studentObj->id][$chapter_id] : array();
                                $questions_list = isset($chapterStudentData['questions_list'])? $chapterStudentData['questions_list'] : array();
                                $questions_list = is_array($questions_list)? $questions_list : json_decode($questions_list, true);

                            @endphp
                            <th class="font-14">Attempts</th>
                            @if(!empty($questions_list))
                                @foreach($questions_list as $question_id)
                                    <th class="font-14">{{$question_id}}</th>
                                @endforeach
                            @endif

                            <th class="font-14">Activity Time</th>
                            <th class="font-14">Accuracy</th>
                        @endforeach
                    @endif
                </tr>
            @endforeach
        @endif

        </thead>
        <tbody id="topic_part_1">
            @if($studentsList->count() > 0)
                @foreach($studentsList as $studentObj)
                    <tr>
                        <td>{{$studentObj->get_full_name()}}</td>



                        @if(!empty($chapters_list))
                            @foreach($chapters_list as $chapter_id => $chapter_title)
                                @php $total_time_consumed = 0; $chapterStudentData = isset($chapters_students_data[$studentObj->id][$chapter_id])? $chapters_students_data[$studentObj->id][$chapter_id] : array();
                                $questions_list = isset($chapterStudentData['questions_list'])? $chapterStudentData['questions_list'] : array();
                                $accuracy = isset($chapterStudentData['accuracy'])? $chapterStudentData['accuracy'] : 0;

                                $result_questions_list = isset($chapterStudentData['result_questions_list'])? $chapterStudentData['result_questions_list'] : array();

                                $questions_list = is_array($questions_list)? $questions_list : json_decode($questions_list, true);

                                @endphp
                                <td>0</td>
                                @if(!empty($questions_list))
                                    @foreach($questions_list as $question_id)
                                        @php $singleQuestionData = isset($result_questions_list[$question_id])? $result_questions_list[$question_id] : array();
                                            $question_status = isset($singleQuestionData['status'])? $singleQuestionData['status'] : 'Pending';
                                            $time_consumed = isset($singleQuestionData['time_consumed'])? $singleQuestionData['time_consumed'] : 0;
                                            $total_time_consumed += $time_consumed;
                                            $class = $question_status;
                                            $question_status_response = '<span class="status-'.$class.'"><i class="fas fa-dot-circle"></i></span>';
                                            if($question_status == 'in_review'){
                                                $question_status_response = '<a href="javascript:;" class="review-question" data-question_id="'.$question_result_id.'"><span class="status-in_review"><i class="fas fa-dot-circle"></i></span></a>';
                                            }
                                        @endphp
                                        <th class="font-14">{!! $question_status_response !!}</th>
                                    @endforeach
                                @endif
                                <td>{{getTimeWithText($total_time_consumed)}}</td>
                                <td>{{$accuracy}}%</td>
                            @endforeach
                        @endif
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>




<script>
    const startDate = new Date("2025-01-01");
    const endDate = new Date(); // current date
    const range = document.getElementById("dateRange");
    const dateLabel = document.getElementById("dateLabel");

    // Calculate total days between start and end
    const totalDays = Math.floor((endDate - startDate) / (1000 * 60 * 60 * 24));
    range.max = totalDays;

    // Function to format date
    function formatDate(date) {
        const options = { day: "numeric", month: "long", year: "numeric" };
        return date.toLocaleDateString("en-US", options);
    }

    // Update label on input
    range.addEventListener("input", () => {
        const daysFromStart = parseInt(range.value, 10);
        const currentDate = new Date(startDate);
        currentDate.setDate(startDate.getDate() + daysFromStart);
        dateLabel.textContent = formatDate(currentDate);
    });

    // Initialize with start date
    range.value = totalDays;
    range.dispatchEvent(new Event("input"));
</script>
