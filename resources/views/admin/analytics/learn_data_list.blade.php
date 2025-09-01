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



    .split-progress.progress-container {
        display: flex;
        width: 600px; /* total width */
        height: 40px;
        border-radius: 10px;
        overflow: hidden;
        background: #eee;
    }

    .split-progress .progress {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: left;
        color: #fff;
        font-weight: bold;
    }

    .split-progress .progress.green {
        background: #72d075;
        flex: 1; /* each section gets equal space */
    }
    .split-progress .progress.orange {
        background: #fbbf67;
        flex: 1;
    }
    .split-progress .progress.red {
        background: #f7837b;
        flex: 1;
    }

    /* Fill widths relative to each section */
    .split-progress .fill {
        height: 100%;
        background: rgba(255,255,255,0.2);
    }

    .split-progress .green .fill { background: #4caf50; width: 0%; }
    .split-progress .orange .fill { background: #ff9800; width: 0%; }
    .split-progress .red .fill { background: #f44336; width: 0%; }
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
                    <th class="font-14" colspan="2"> {{$topics_list_title}}</th>
                @endforeach
            @endif
        </tr>
        <tr class="topic-heading-top">
            <th class="font-14">Student</th>
            @php $topic_counter = 1; @endphp
            @while($topic_counter <= count($topics_list_array))
                <th class="font-14">Attempts</th>
                <th class="font-14 table-col-red">Emerging / Expected / Exceeding</th>
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
                                    @endphp
                                    <td>

                                        {{$quizObj->parentResults->where('status', 'passed')->count()}}</td>

                                    <td><div class="progress-container split-progress">
                                            <div class="progress green">
                                                <div class="fill" style="width: {{$emerging_performance}}%"></div>
                                                <span style="position:absolute;">&nbsp;&nbsp;&nbsp;&nbsp;{{$emerging_performance}}%</span>
                                            </div>
                                            <div class="progress orange">
                                                <div class="fill" style="width: {{$expected_performance}}%"></div>
                                                <span style="position:absolute;">&nbsp;&nbsp;&nbsp;&nbsp;{{$expected_performance}}%</span>
                                            </div>
                                            <div class="progress red">
                                                <div class="fill" style="width: {{$exceeding_performance}}%"></div>
                                                <span style="position:absolute;">&nbsp;&nbsp;&nbsp;&nbsp;{{$exceeding_performance}}%</span>
                                            </div>
                                        </div></td>
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
