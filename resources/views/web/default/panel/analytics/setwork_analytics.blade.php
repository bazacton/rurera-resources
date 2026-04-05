@php $studentAssignments = $analytics_data; @endphp
<div class="analytics-header">
    <div class="header-text font-14 font-weight-bold text-dark-charcoal">
        <span>Setwork Title</span>
        <span>Avg Daily Mins</span>
        <span>Coins Earned</span>
    </div>
</div>
<div class="accordion" id="analyticsAccordion">

    @if( $studentAssignments->count() > 0 )
        @foreach( $studentAssignments as $studentAssignmentObj)
            @php $assignedTopics = $studentAssignmentObj->assignedTopics($selected_child_id)->get();
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
                                    @php $quizObj = $assignedTopicObj->quizData;

                                        $topicAssignmentResults = $assignedTopicObj->topicAssignmentResults;
                                        $total_attempts = $topicAssignmentResults->count();


                                        $analytics_detail_link = '';
                                        $analytics_detail_link = '/analytics/questions-log:assignment='.$assignedTopicObj->id;
                                    @endphp

                                    <li>
                                        <div class="timeline-icon"><img src="/assets/default/img/types/practice.svg" width="26" height="26" alt="avatar"></div>
                                        <div class="timeline-text"><p><strong><a href="{{$analytics_detail_link}}">{{isset( $quizObj->id )? $quizObj->getTitleAttribute() : ''}}</a></strong>
                                                </p>
                                            <span class="analytic-item">Attempts: {{$total_attempts}}</span>
                                            <span class="analytic-item">Questions answered: 10</span>
                                            <span class="analytic-item">Correct answers: 3</span>
                                            <span class="analytics-more_details"><a href="{{$analytics_detail_link}}">More Details</a></span>
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