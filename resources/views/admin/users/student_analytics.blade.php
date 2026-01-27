

<div class="chart-filters p-0">
    <div class="filters-list mb-0 font-14">
        <a href="#" class="filter-mobile-btn">Filters</a>
        <ul class="analytics-type">
            @php $link_append = (isset($_GET['child'])) ? '?child='.$_GET['child'] : ''; @endphp
            @php $passing_data = array(
                       'student_id' => isset($studentObj->id)? $studentObj->id : 0,
                       'type' => 'all'
                    );
            @endphp
            <li {{($type_selected == 'all')? 'class=active' : ''}}><a href="javascript:;" id="students-tab-analytics" class="rurera-ajax-tabs" data-passing_data="{{json_encode($passing_data)}}" data-ajax_url="/admin/students/student_analytics" data-graph_type="all"><img src="/assets/default/img/sidebar/all.svg" height="800" width="800" alt="all">All</a></li>
            @php $passing_data['type'] = 'learn'; @endphp
            <li {{($type_selected == 'learn')? 'class=active' : ''}}><a href="javascript:;" id="students-tab-analytics" class="rurera-ajax-tabs" data-passing_data="{{json_encode($passing_data)}}" data-ajax_url="/admin/students/student_analytics" data-graph_type="learn"><img src="/assets/default/img/sidebar/learn.svg" height="800" width="800" alt="learn">Learn</a></li>
            @php $passing_data['type'] = 'timestables'; @endphp
            <li {{($type_selected == 'timestables')? 'class=active' : ''}}><a href="javascript:;" id="students-tab-analytics" class="rurera-ajax-tabs" data-passing_data="{{json_encode($passing_data)}}" data-ajax_url="/admin/students/student_analytics" data-graph_type="timestables"><img src="/assets/default/img/sidebar/timestable.svg" height="800" width="800" alt="timestable">Timestable</a></li>
            @php $passing_data['type'] = 'vocabulary'; @endphp
            <li {{($type_selected == 'vocabulary')? 'class=active' : ''}}><a href="javascript:;" id="students-tab-analytics" class="rurera-ajax-tabs" data-passing_data="{{json_encode($passing_data)}}" data-ajax_url="/admin/students/student_analytics" data-graph_type="word_lists"><img src="/assets/default/img/sidebar/spell.svg" height="800" width="800" alt="spell">Word Lists</a></li>
            @php $passing_data['type'] = 'books'; @endphp
            <li {{($type_selected == 'books')? 'class=active' : ''}}><a href="javascript:;" id="students-tab-analytics" class="rurera-ajax-tabs" data-passing_data="{{json_encode($passing_data)}}" data-ajax_url="/admin/students/student_analytics" data-graph_type="books"><img src="/assets/default/img/sidebar/books.svg" height="800" width="800" alt="books">Books</a></li>
            @php $passing_data['type'] = 'tests'; @endphp
            <li {{($type_selected == 'tests')? 'class=active' : ''}}><a href="javascript:;" id="students-tab-analytics" class="rurera-ajax-tabs" data-passing_data="{{json_encode($passing_data)}}" data-ajax_url="/admin/students/student_analytics" data-graph_type="tests"><img src="/assets/default/img/sidebar/test.svg" height="800" width="800" alt="test">Test</a></li>
        </ul>
    </div>

    <ul class="analytics-data-ul">
        <li><a href="javascript:;" class=" hide graph_Custom" data-graph_id="graph_id_Custom">{{dateTimeFormat($start_date, 'F d, Y')}} - {{dateTimeFormat($end_date, 'F d, Y')}}</a>
        </li>
    </ul>
</div>
<div class="analytics-dropdown font-14">
    <div class="date-range-holder">
        <h5 class="font-14 font-weight-500">Date Range</h5>
        <div class="date-range-box">
            @php $passing_data = array(
               'student_id' => isset($studentObj->id)? $studentObj->id : 0,
               'type' => $type_selected
            );
            @endphp
            <input type="text" data-field_key="analytics_date" id="reportrange1" value="{{$analytics_date}}" data-target_class="students-tab-analytics" class="rurera-ajax-tabs-change" data-passing_data="{{json_encode($passing_data)}}" data-ajax_url="/admin/students/student_analytics" >
        </div>
    </div>
</div>
<div class="analytics-header">
    <div class="header-text font-14 font-weight-bold text-dark-charcoal">
        <span>Date</span>
        <span>Avg Daily Mins</span>
        <span>Coins Earned</span>
    </div>
</div>
<div class="accordion" id="analyticsAccordion">
    @if( !empty( $analytics_data) )
        @foreach( $analytics_data as $date_str => $analyticDataArray)
            @php if(!isset( $analyticDataArray['practice_time'] ) || $analyticDataArray['practice_time'] == 0){ continue; } @endphp
            @php $report_date = strtotime(str_replace('_', '-', $date_str)); @endphp
            <div class="card">
                <div class="card-header collapsed mb-0 font-14" data-toggle="collapse" role="button" data-target="#report_{{$date_str}}" aria-expanded="true" aria-controls="report_{{$date_str}}">
                    <span>{{ dateTimeFormat($report_date,'d F Y') }}</span>
                    <span class="analytics-timespend float-right">
                        <img src="/assets/default/img/panel-sidebar/clock.svg" alt="clock">
                        <span>{{ isset( $analyticDataArray['practice_time'] )? getTimeWithText($analyticDataArray['practice_time']) : 0 }}</span>
                    </span>
                    <span class="analytics-cions-earned float-right mr-10">
                        <img src="/assets/default/img/panel-sidebar/coins.svg" alt="coins">
                        <span>
                            {{ isset( $analyticDataArray['coins_earned'] )? $analyticDataArray['coins_earned'] : 0 }}
                        </span>
                    </span>
                </div>

                <div id="report_{{$date_str}}" class="collapse" data-parent="#analyticsAccordion">
                    <div class="card-body">
                        <ul class="timeline-list">

                            @if( !empty( $analyticDataArray['data'] ) )
                                @foreach( $analyticDataArray['data'] as $attempt_id => $analyticData)
                                    @php $parent_type_id = isset( $analyticData['parent_type_id'] )? $analyticData['parent_type_id']
                        : '';
                        $parent_type = isset( $analyticData['parent_type'] )? $analyticData['parent_type'] : '';
                        $result_id = isset( $analyticData['result_id'] )? $analyticData['result_id'] : 0;
                        $start_time = isset( $analyticData['start_time'] )? $analyticData['start_time'] : 0;
                        $more_than_minute = isset( $analyticData['more_than_minute'] )? $analyticData['more_than_minute'] : 'yes';
                        $end_time = isset( $analyticData['end_time'] )? $analyticData['end_time'] : 0;
                        $type = isset( $analyticData['type'] )? $analyticData['type'] : '';


                        $detail_link = '';
                        if( $parent_type == 'practice' || $parent_type == 'sats' || $parent_type == '11plus' || $parent_type == 'assessment' || $parent_type == 'book_page' || $parent_type == 'vocabulary' || $parent_type == 'assignment'){
                            $detail_link = '/panel/quizzes/'.$result_id.'/check_answers';
                        }
                        if( $parent_type == 'timestables' || $parent_type == 'timestables_assignment'){
                            $detail_link = '/panel/analytics/timestables/result/'.$result_id;
                        }

                        if( $parent_type == 'book_read'){
                           $book_slug = isset( $analyticData['book_slug'] )? $analyticData['book_slug'] : '';
                            $detail_link = '/books/'.$book_slug.'/activity';
                        }
                        $analytic_icon = '/assets/default/img/types/'.$parent_type.'.svg';
                        $analytic_icon =   isset( $analyticData['list_icon'] )? $analyticData['list_icon'] : $analytic_icon;

                        $by_user_label = '';
                        if(auth()->check() && (auth()->user()->isParent() || auth()->user()->isTutor())){
                            $userObj = isset( $analyticData['user'] )? $analyticData['user'] : array();
                            if( isset( $userObj->id)){
                                $by_user_label .= 'By <img src="'.$userObj->getAvatar().'" width="26" height="26" alt="avatar"> ' . $userObj->get_full_name();
                            }
                        }
                                    @endphp
                                    <li>
                                        <div class="timeline-icon"><img src="{{$analytic_icon}}" width="26" height="26" alt="avatar"></div>
                                        <div class="timeline-text"><p><strong><a href="{{$detail_link}}">{{isset( $analyticData['topic_title'] )? $analyticData['topic_title'] : ''}}</a></strong> {!! $by_user_label !!} <span class="info-time">{{ dateTimeFormat($start_time,'H:i') }}</span></p>
                                            @if( $type == 'book_read')
                                                <span class="analytic-item">Reading Time: {{isset( $analyticData['read_time'] )? $analyticData['read_time'] : 0}} min</span>
                                                <span class="analytic-item">Pages Read: {{isset( $analyticData['pages_read'] )? $analyticData['pages_read'] : ''}}</span>
                                                <span class="analytic-item">&nbsp;</span>
                                                <span class="analytic-item">&nbsp;</span>
                                            @elseif( $type == 'quest')
                                                <span class="analytic-item">Coins earned: {{isset( $analyticData['coins_earned'] )? $analyticData['coins_earned'] : 0}}</span>
                                            @else
                                                <span class="analytic-item">Active practice: {{isset( $analyticData['practice_time'] )? getTimeWithText($analyticData['practice_time']) : 0}}</span>
                                                <span class="analytic-item">Coins earned: {{isset( $analyticData['coins_earned'] )? $analyticData['coins_earned'] : 0}}</span>
                                            @endif
                                            @if( $type != 'quest')
                                                <span class="analytics-more_details"><a href="{{$detail_link}}">More Details</a></span>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach

    @else
        <div class="card">
            <div class="card-header collapsed mb-0" id="headingOne2" data-toggle="collapse" role="button" data-target="#report_07_03_2024" aria-expanded="true" aria-controls="report_07_03_2024">
                <span>&nbsp;</span>
                <span class="analytics-timespend float-right">
                            <span class="no-records-found">No Records Found</span>
                        </span>
                <span class="analytics-cions-earned float-right mr-10">
                            &nbsp;
                        </span>
            </div>
        </div>
    @endif
</div>
<script>
    var dateRanges = new Array();

    dateRanges["Today"] = [moment(), moment()];
    dateRanges["Yesterday"] = [
        moment().subtract(1, "days"),
        moment().subtract(1, "days")
    ];
    dateRanges["Last 7 Days"] = [moment().subtract(6, "days"), moment()];
    dateRanges["Last 30 Days"] = [moment().subtract(31, "days"), moment()];
    dateRanges["This Month"] = [
        moment().startOf("month"),
        moment().endOf("month")
    ];
    dateRanges["Last Month"] = [
        moment().subtract(1, "month").startOf("month"),
        moment().subtract(1, "month").endOf("month")
    ];

    $("#reportrange1").daterangepicker(
        {
            startDate: moment().subtract(31, "days"),
            endDate: moment(),
            parentEl: '.analytics-dropdown',
            opens: 'left',
            ranges: dateRanges,
            autoApply: false,
            drops: "auto",
            autoUpdateInput: false, // ✅ prevent auto filling
            isInvalidDate: function (date) {
                // Sunday Disabled
                return date.day() == 0;
            }
        },
        function(start, end) {
            // ✅ manually update field when applied
            $("#reportrange1").val(start.format("MM/DD/YYYY") + " - " + end.format("MM/DD/YYYY"));
            $("#reportrange1").change();
        }
    );
</script>
