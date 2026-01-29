<div class="col-12">
    <div class="heatmap-select-option">
        <div class="select-field">
            <input checked type="radio" id="select-one" name="heatmap">
            <label for="select-one" class="heatmap-type" data-type_limit="12"> 2-12<span>&#215;</span> </label>
            <input type="radio" id="select-two" name="heatmap">
            <label for="select-two" class="border-right-0 heatmap-type" data-type_limit="20"> 2-20<span>&#215;</span> </label>
        </div>
    </div>
    <div class="heatmap-table-holder mb-20">

        <div class="heatmap-table-holder mb-20">
            <table class="heatmap-table">
                <thead>
                <tr>
                    <th></th>
                    @php $count = 2; @endphp
                    @while($count <= 20)
                        <th class="{{ ($count > 12 )? 'above_12' : 'below_12'}}">{{$count}}</th>
                        @php $count++; @endphp
                    @endwhile
                </tr>
                </thead>


                @php $table_main_count = 1; $dates_array = array(); @endphp
                @if( !empty( $times_tables_data ) )
                    @foreach( $times_tables_data as $date => $tableData)
                        @php $activeClass = ($table_main_count == 1)? 'active' : 'hide'; $dates_array[] = $date; @endphp
                        <tbody class="summary-table-item {{$activeClass}}" data-datestring="{{$date}}">
                        @php $count = 2; @endphp
                        @while($count <= 20)
                            @php $table_count = 2;
                                                        $from_table_array = isset( $tableData[$count] )? $tableData[$count] : array();
                            @endphp

                            <tr class="{{ ($count > 12 )? 'above_12' : 'below_12'}}">
                                <td>{{$count}}</td>
                                @while($table_count <= 20)
                                    @php
                                        $to_tableObj = isset( $from_table_array[$table_count] )?
                                        $from_table_array[$table_count] : array();
                                        $class = isset( $to_tableObj['class'] )? $to_tableObj['class'] : '';
                                        $attempts = isset( $to_tableObj['attempts'] )? $to_tableObj['attempts'] : 0;
                                        $class = ($attempts > 0)? $class : '';

                                    @endphp
                                    <td class="{{$class}} {{ ($table_count > 12 )? 'above_12' : 'below_12'}}">
                                        <span>{{$count}} <span>&#215;</span> {{$table_count}}</span></td>
                                    @php $table_count++; @endphp
                                @endwhile
                            </tr>

                            @php $count++; @endphp
                        @endwhile
                        </tbody>
                        @php $table_main_count++; @endphp
                    @endforeach
                @endif

            </table>


        </div>

        <div class="heatmap-heading mb-20">
            <span>Drag to time travel or click below to focus a table</span>
        </div>
        <div class="heatmap-range-slider mb-0">
            <a href="#" class="range-play-btn"><span>&#9654;</span></a>
            <div id="storlekslider"></div>
            <div class="range-value">
                <input type="text" name="storlek" id="storlek_testet" value=""/>
                <span>{{$first_date}}</span>
            </div>
        </div>

    </div>
</div>
