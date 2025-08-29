<style>
    .status-correct i{
        color: #a3e05f;
        font-size: 20px;
    }

    .status-correct-fast i{
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
<div class="topic-parts-data table-responsive">




    <table class="table heatmap-table">
        <thead>
        <tr class="topic-heading-top">
            <th class="font-14"> &nbsp;</th>
            @if(!empty($allowed_table_no))
                @foreach($allowed_table_no as $table_no)
                    <th class="font-14" colspan="4"> Table of {{$table_no}}</th>
                @endforeach
            @endif
        </tr>
        @if($studentsList->count() > 0)
            @foreach($studentsList as $studentObj)
                <tr class="topic-heading-top">
                    <th class="font-14">Student</th>
                    @php $topic_counter = 1; @endphp
                    @while($topic_counter <= count($allowed_table_no))
                        <th class="font-14">Attempts</th>
                        <th class="font-14">Questions</th>
                        <th class="font-14">Average Time</th>
                        <th class="font-14">Progress</th>
                        @php $topic_counter++; @endphp
                    @endwhile
                </tr>
            @endforeach
        @endif

        </thead>
        <tbody id="topic_part_1">
        @if($studentsList->count() > 0)
            @foreach($studentsList as $studentObj)
                <tr>
                    <td>{{$studentObj->get_full_name()}}</td>

                    @if(!empty($allowed_table_no))
                        @foreach($allowed_table_no as $table_no)
                            @php $times_tables_data = isset($times_tables_data_array[$studentObj->id][$table_no])? $times_tables_data_array[$studentObj->id][$table_no] : array();
                            $questions_time_consumed_total = 0; @endphp
                            <td>1</td>
                            <td class="">
                                @php $table_counter = 2; @endphp

                                @while($table_counter <= 12)
                                    @php
                                        $tableData = isset($times_tables_data[$table_counter])? $times_tables_data[$table_counter] : array();
                                        $class = isset( $tableData['class'] )? $tableData['class'] : 'pending';
                                        $class = ($class == 'wrong')? 'incorrect' : $class;
                                        $question_status_response = '<span class="status-'.$class.'"><i class="fas fa-dot-circle" title="'.$table_no.' X '.$table_counter.'"></i></span>';
                                        if(!empty($tableData)){
                                        //pre($tableData);
                                        }
                                    @endphp
                                    {!! $question_status_response !!}
                                    @php $table_counter++; @endphp
                                @endwhile
                            </td>
                            <td>
                                @php $times_tables_data = isset($average_time_data_array[$studentObj->id][$table_no])? $average_time_data_array[$studentObj->id][$table_no] : array();
                                $average_time = isset($times_tables_data['average_time'])? $times_tables_data['average_time'] : 0;
                                @endphp
                                {{$average_time}}s
                            </td>
                            <td>
                                <div class="circle_percent circle-green" data-percent="50">
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
