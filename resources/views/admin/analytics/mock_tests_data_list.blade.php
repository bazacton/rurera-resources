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
            @if(!empty($chapters_list))
                @foreach($chapters_list as $chapter_id => $chapter_title)
                    <th class="font-14" colspan="2"> <span>{{$chapter_title}}</span></th>
                @endforeach
            @endif
        </tr>
        <tr class="topic-heading-top">
            <th class="font-14">Student</th>
            @if(!empty($chapters_list))
                @foreach($chapters_list as $chapter_id => $chapter_title)
                    <th class="font-14">Accuracy</th>
                    <th class="font-14 table-col-red">Completion</th>
                @endforeach
            @endif

        </tr>

        </thead>
        <tbody id="topic_part_1">
            @if(!empty($studentsList))
                @foreach($studentsList as $studentObj)
                    <tr>
                        <td>{{$studentObj->get_full_name()}}</td>
                    @php $studentTestData = isset($chapters_students_data[$studentObj->id])? $chapters_students_data[$studentObj->id] : array(); @endphp
                        @if(!empty($chapters_list))
                            @foreach($chapters_list as $chapter_id => $chapter_title)
                                @php $studentTestChapterData = isset($studentTestData[$chapter_id])? $studentTestData[$chapter_id] : array();

                                $all_accuracy = isset($studentTestChapterData['all_accuracy'])? $studentTestChapterData['all_accuracy'] : 0;
                                $all_completion_performance = isset($studentTestChapterData['all_completion_performance'])? $studentTestChapterData['all_completion_performance'] : 0;

                                @endphp
                                <td>{{$all_accuracy}}%</td>
                                <td>{{$all_completion_performance}}%</td>
                            @endforeach
                       @endif

                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
