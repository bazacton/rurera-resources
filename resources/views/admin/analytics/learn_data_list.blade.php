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



<div class="topic-parts-data table-responsive">



    <table class="table heatmap-table">
        <thead>
        <tr class="topic-heading-top">
            <th class="font-14"> &nbsp;</th>
            @php $total_sub_topics_count = 0; @endphp
            @if(!empty($topics_list_array))
                @foreach($topics_list_array as $topics_list_id => $topics_list_title)
                    <th class="font-14" colspan="4"> {{$topics_list_title}}</th>
                @endforeach
            @endif
        </tr>
        <tr class="topic-heading-top">
            <th class="font-14">Student</th>
            @php $topic_counter = 1; @endphp
            @while($topic_counter <= count($topics_list_array))
                <th class="font-14">Attempts</th>
                <th class="font-14 table-col-red">Emerging</th>
                <th class="font-14 table-col-orange">Expected</th>
                <th class="font-14 table-col-yellow">Exceeding</th>
                @php $topic_counter++; @endphp
            @endwhile
        </tr>

        </thead>
        <tbody id="topic_part_1">
        @if($studentsList->count() > 0)
            @foreach($studentsList as $studentObj)
                <tr>
                    <td>{{$studentObj->get_full_name()}}</td>

                    @if(!empty($topic_part_data[$studentObj->id]))
                        @foreach($topic_part_data[$studentObj->id] as $sub_chapter_data)
                            @php $topic_part_items = isset($sub_chapter_data['items'])? $sub_chapter_data['items'] : array();
                                 $quizObj = isset($sub_chapter_data['quizObj'])? $sub_chapter_data['quizObj'] : (object) array();
                                 $sub_chapter_id = isset($sub_chapter_data['sub_chapter_id'])? $sub_chapter_data['sub_chapter_id'] : 0;
                            @endphp
                            @if(!empty($topic_part_items))
                                @foreach($topic_part_items as $topic_part_item_single)
                                    @php $questions_time_consumed_total = 0;
                                $topic_part_item_id = isset($topic_part_item_single['topic_part_item_id'])? $topic_part_item_single['topic_part_item_id'] : 0;
                                 $emerging_performance = isset($sub_chapter_data[$topic_part_item_id]['emerging_performance'])? $sub_chapter_data[$topic_part_item_id]['emerging_performance'] : 0;
                                 $expected_performance = isset($sub_chapter_data[$topic_part_item_id]['expected_performance'])? $sub_chapter_data[$topic_part_item_id]['expected_performance'] : 0;
                                 $exceeding_performance = isset($sub_chapter_data[$topic_part_item_id]['exceeding_performance'])? $sub_chapter_data[$topic_part_item_id]['exceeding_performance'] : 0;
                                 $questionAnalyticResult = isset($sub_chapter_data[$topic_part_item_id]['students_questions_result'])? $sub_chapter_data[$topic_part_item_id]['students_questions_result'] : array();
                                 $attempt_question_ids = isset($questionAnalyticResult[$topic_part_item_id]['attempt_question_ids'])? $questionAnalyticResult[$topic_part_item_id]['attempt_question_ids'] : array();
                                 $questions_attempts = isset($questionAnalyticResult[$topic_part_item_id]['questions_attempts'])? $questionAnalyticResult[$topic_part_item_id]['questions_attempts'] : array();

                                    @endphp
                                    <td>{{$quizObj->parentResults->where('status', 'passed')->count()}}</td>
                                    <td class="">
                                        {{$emerging_performance}}%
                                    </td>
                                    <td>{{$expected_performance}}%</td>
                                    <td>{{$exceeding_performance}}%</td>


                                @endforeach
                            @endif
                        @endforeach
                    @endif
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
