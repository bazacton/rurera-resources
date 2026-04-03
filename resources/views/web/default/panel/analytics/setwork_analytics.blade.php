@php $studentAssignments = $analytics_data; @endphp
<div class="accordion" id="analyticsAccordion">

    @if( $studentAssignments->count() > 0 )
        @foreach( $studentAssignments as $studentAssignmentObj)
            @php $assignedTopics = $studentAssignmentObj->assignedTopics()->get();
            @endphp
            <div class="card">
                <div class="card-header collapsed mb-0 font-14" data-toggle="collapse" role="button" data-target="#report_{{$studentAssignmentObj->id}}" aria-expanded="true" aria-controls="report_{{$studentAssignmentObj->id}}">
                    <span>{{$studentAssignmentObj->title}}</span>
                    <span class="analytics-timespend float-right">
                        <span></span>
                    </span>
                    <span class="analytics-cions-earned float-right mr-10">
                        <img src="/assets/default/img/panel-sidebar/coins.svg" alt="coins">
                        <span>
                            0
                        </span>
                    </span>
                </div>

                <div id="report_{{$studentAssignmentObj->id}}" class="collapse" data-parent="#analyticsAccordion">
                    <div class="card-body">
                        <ul class="timeline-list">

                            @if($assignedTopics->count() > 0)
                                @foreach($assignedTopics as $assignedTopicObj)
                                    @php $quizObj = $assignedTopicObj->quizData; @endphp

                                    <li>
                                        <div class="timeline-icon"><img src="/assets/default/img/types/practice.svg" width="26" height="26" alt="avatar"></div>
                                        <div class="timeline-text"><p><strong><a href="">{{isset( $quizObj->id )? $quizObj->getTitleAttribute() : ''}}</a></strong>
                                                </p>
                                        </div>
                                    </li>


                                @endforeach
                            @endif

                            @if( isset($analyticDataArray) && !empty( $analyticDataArray['data'] ) )
                                @foreach( $analyticDataArray['data'] as $attempt_id => $analyticData)
                                    @php $parent_type_id = isset( $analyticData['parent_type_id'] )? $analyticData['parent_type_id']
                        : '';
                        $parent_type = isset( $analyticData['parent_type'] )? $analyticData['parent_type'] : '';
                        $result_id = isset( $analyticData['result_id'] )? $analyticData['result_id'] : 0;
                        $start_time = isset( $analyticData['start_time'] )? $analyticData['start_time'] : 0;
                        $more_than_minute = isset( $analyticData['more_than_minute'] )? $analyticData['more_than_minute'] : 'yes';
                        $end_time = isset( $analyticData['end_time'] )? $analyticData['end_time'] : 0;
                        $type = isset( $analyticData['type'] )? $analyticData['type'] : '';

                        $analytics_detail_link = get_analytics_detail_link($analyticData);


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
                                        <div class="timeline-text"><p><strong><a href="{{$analytics_detail_link}}">{{isset( $analyticData['topic_title'] )? $analyticData['topic_title'] : ''}}</a></strong> {!! $by_user_label !!} <span class="info-time">{{ dateTimeFormat($start_time,'H:i') }}</span></p>
                                            @if( $type == 'book_read')
                                                <span class="analytic-item">Reading Time: {{isset( $analyticData['read_time'] )? $analyticData['read_time'] : 0}} min</span>
                                                <span class="analytic-item">Pages Read: {{isset( $analyticData['pages_read'] )? $analyticData['pages_read'] : ''}}</span>
                                                <span class="analytic-item">&nbsp;</span>
                                                <span class="analytic-item">&nbsp;</span>
                                            @elseif( $type == 'quest')
                                                <span class="analytic-item">Coins earned: {{isset( $analyticData['coins_earned'] )? $analyticData['coins_earned'] : 0}}</span>
                                            @else
                                                <span class="analytic-item">Active practice: {{isset( $analyticData['practice_time'] )? getTimeWithText($analyticData['practice_time']) : 0}}</span>
                                                <span class="analytic-item">Questions answered: {{isset( $analyticData['question_answered'] )? $analyticData['question_answered'] : 0}}</span>
                                                <span class="analytic-item">Coins earned: {{isset( $analyticData['coins_earned'] )? $analyticData['coins_earned'] : 0}}</span>
                                            @endif
                                            @if( $type != 'quest')
                                                <span class="analytics-more_details"><a href="{{$analytics_detail_link}}">More Details</a></span>
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