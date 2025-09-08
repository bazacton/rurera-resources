

<div class="heatmap-table-holder mb-20">
    <table class="table heatmap-table">
        <tr class="topic-heading-top">
            <th class="font-14">Student</th>
            <th class="font-14">Table</th>
            <th class="font-14" colspan="11">Table Data</th>
        </tr>
        @php $table_main_count = 1; $dates_array = array(); @endphp

        @if($studentsList->count() > 0)
            <tbody class="summary-table-item active" >
            @foreach($studentsList as $studentObj)
                @php $times_tables_data = isset($times_tables_data_array[$studentObj->id])? $times_tables_data_array[$studentObj->id] : array(); @endphp
                    @php $student_name = $studentObj->get_full_name();  @endphp
                <tr class="">
                    @if($student_name != '')
                        <td rowspan="{{count($allowed_table_no)}}">{{$studentObj->get_full_name()}}</td>
                        @php $student_name = ''; @endphp
                    @endif
                        @php $table_no = 2; @endphp
                        @while($table_no <= 20)
                            @php if(!in_array($table_no, $allowed_table_no)){ $table_no++; continue;}

                            $tableData  = isset($times_tables_data[$table_no])? $times_tables_data[$table_no] : array();

                            @endphp
                                <td>{{$table_no}}</td>
                                @php $table_no_counter = 2; @endphp
                                @while($table_no_counter <= 12)
                                    @php $to_tableObj = isset( $tableData[$table_no_counter] )? $tableData[$table_no_counter] : array();
                                         $class = isset( $to_tableObj['class'] )? $to_tableObj['class'] : '';
                                         $is_correct = isset( $to_tableObj['is_correct'] )? $to_tableObj['is_correct'] : '';
                                         $attempts = isset( $to_tableObj['attempts'] )? $to_tableObj['attempts'] : 0;
                                         $class = ($attempts > 0)? $class : '';
                                    @endphp
                                        <td class="{{$class}} below_12" data-is_correct="{{$is_correct}}">
                                            <span>{{$table_no}} <span>&#215;</span> {{$table_no_counter}}</span>
                                        </td>
                                    @php $table_no_counter++; @endphp
                                @endwhile
                            </tr>
                            <tr class="">
                            @php $table_no++; @endphp
                        @endwhile
            @endforeach
            </tbody>
        @endif
    </table>
</div>
<div class="status-in-words">
    <span class="st-wrong">Wrong</span>
    <span class="st-ok">Ok</span>
    <span class="st-fast">Fast</span>
</div>

