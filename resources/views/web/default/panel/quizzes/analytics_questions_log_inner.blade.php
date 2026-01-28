@php
    $attempted_questions = $attempted_questions_list->count();
    $show_topic_performance = isset($show_topic_performance)? $show_topic_performance : false;
    $show_graph = isset($show_graph)? $show_graph : false;
    $is_skill_summary = isset($is_skill_summary)? $is_skill_summary : false;
@endphp
<div class="content-section">
    <section class="lms-quiz-section no-bg">
        <div class="container-fluid questions-data-block read-quiz-content" data-total_questions="10">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="question-step quiz-complete" style="display:none">
                        <div class="question-layout-block">
                            <div class="left-content has-bg">
                                <h2>&nbsp;</h2>
                                <div id="rureraform-form-1"
                                     class="rureraform-form rureraform-elements rureraform-form-input-medium rureraform-form-icon-inside rureraform-form-description-bottom ui-sortable"
                                     _data-parent="1"
                                     _data-parent-col="0" style="display: block;">
                                    <div class="question-layout">

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="question-area-block">
                        <div class="section-title mb-15">
                            <h2 class="font-22 mb-0">{{isset($SubChapter->id)? $SubChapter->sub_chapter_title : ''}}</h2>
                        </div>
                        <div class="chart-summary-fields result-layout-summary">
                            <div class="sats-summary">
                                <div class="row">
                                    <div class="col-12 col-md-4 col-lg-3">
                                        <div class="sats-summary-icon">
                                            <img src="/assets/default/img/sidebar/all.svg" alt="" style="width: 100%; height: 100%;">
                                        </div>
                                        <div class="summary-text">
                                            <label>Current Smartscore</label>
                                            <div class="score">{{isset($smart_score)? $smart_score : 0}}</div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-3 bitcoin-box">
                                        <div class="sats-summary-icon" style="background-color: #8cc811;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #fff;">
                                                <g id="Group_1264" transform="translate(-188.102 -869.102)">
                                                    <g id="Group_1262">
                                                        <g id="speedometer" transform="translate(188.102 869.102)">
                                                            <path id="Path_1547" d="M20.484 3.515a12 12 0 0 0-16.97 16.97 12 12 0 0 0 16.97-16.97zM12 22.593A10.594 10.594 0 1 1 22.593 12 10.606 10.606 0 0 1 12 22.593zm0 0" class="cls-1"></path>
                                                            <path id="Path_1548" d="M118.647 321.206a.7.7 0 0 0-.5-.206h-8.094a.7.7 0 0 0-.5.206l-2.228 2.228a.7.7 0 0 0-.012.982 9.357 9.357 0 0 0 13.569 0 .7.7 0 0 0-.012-.982zm-4.544 4.716a7.882 7.882 0 0 1-5.273-2l1.517-1.517h7.512l1.517 1.517a7.882 7.882 0 0 1-5.273 2zm0 0" class="cls-1" transform="translate(-102.104 -305.954)"></path>
                                                            <path id="Path_1549" d="M216.719 120.194a.7.7 0 0 0-.919.38l-1.606 3.876h-.091a2.063 2.063 0 1 0 1.39.541l1.606-3.877a.7.7 0 0 0-.38-.919zm-2.616 6.969a.654.654 0 1 1 .654-.654.655.655 0 0 1-.657.654zm0 0" class="cls-1" transform="translate(-202.104 -114.509)"></path>
                                                            <path id="Path_1550" d="M65.375 56A9.385 9.385 0 0 0 56 65.375a.7.7 0 0 0 .7.7h1.25a.7.7 0 1 0 0-1.406h-.516a7.933 7.933 0 0 1 1.83-4.409l.362.362a.7.7 0 1 0 .994-.994l-.362-.362a7.934 7.934 0 0 1 4.41-1.83v.516a.7.7 0 1 0 1.406 0v-.516a7.934 7.934 0 0 1 4.41 1.83l-.362.362a.7.7 0 0 0 .994.994l.362-.362a7.932 7.932 0 0 1 1.83 4.409H72.8a.7.7 0 0 0 0 1.406h1.25a.7.7 0 0 0 .7-.7A9.385 9.385 0 0 0 65.375 56zm0 0" class="cls-1" transform="translate(-53.376 -53.375)"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="summary-text">
                                            <label>Questions Answered</label>
                                            <div class="score">{{$attempted_questions}}</div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-3">
                                        <div class="sats-summary-icon" style="background-color: #fe3c30;">
                                            <img src="/assets/default/svgs/question-circle-white.svg" alt="">
                                        </div>
                                        <div class="summary-text">
                                            <label>Missed Questions</label>
                                            <div class="score">{{$incorrect_questions}}</div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4 col-lg-3">
                                        <div class="sats-summary-icon" style="background-color: #e67035;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="none" style="color:#fff">
                                                <path style="fill: #fff;" fill-rule="evenodd" clip-rule="evenodd" d="M5.01112 11.5747L6.29288 10.2929C6.68341 9.90236 7.31657 9.90236 7.7071 10.2929C8.09762 10.6834 8.09762 11.3166 7.7071 11.7071L4.7071 14.7071C4.51956 14.8946 4.26521 15 3.99999 15C3.73477 15 3.48042 14.8946 3.29288 14.7071L0.292884 11.7071C-0.0976406 11.3166 -0.0976406 10.6834 0.292884 10.2929C0.683408 9.90236 1.31657 9.90236 1.7071 10.2929L3.0081 11.5939C3.22117 6.25933 7.61317 2 13 2C18.5229 2 23 6.47715 23 12C23 17.5228 18.5229 22 13 22C9.85817 22 7.05429 20.5499 5.22263 18.2864C4.87522 17.8571 4.94163 17.2274 5.37096 16.88C5.80028 16.5326 6.42996 16.599 6.77737 17.0283C8.24562 18.8427 10.4873 20 13 20C17.4183 20 21 16.4183 21 12C21 7.58172 17.4183 4 13 4C8.72441 4 5.23221 7.35412 5.01112 11.5747ZM13 5C13.5523 5 14 5.44772 14 6V11.5858L16.7071 14.2929C17.0976 14.6834 17.0976 15.3166 16.7071 15.7071C16.3166 16.0976 15.6834 16.0976 15.2929 15.7071L12.2929 12.7071C12.1054 12.5196 12 12.2652 12 12V6C12 5.44772 12.4477 5 13 5Z" fill="#000000"></path>
                                            </svg>
                                        </div>
                                        <div class="summary-text">
                                            <label>Time Spent</label>
                                            <div class="score">{{getTimeWithText($time_consumed)}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($show_graph == true)
                            <div class="position-relative mb-30 graph-box">
                                <div class="card p-4"><canvas id="usersStatisticsChart"></canvas></div>
                            </div>
                        @endif
                        <!-- Performance Chart -->

                        @if($show_topic_performance == true)
                            <div class="card chart-card mb-30">
                                <div class="card-body p-4">
                                    <div class="chart-title font-16 mb-10 font-weight-bold">Performance by topic</div>
                                    <div class="chart-header mb-4 font-14">
                                        <div class="chart-desc text-muted">
                                            The bar chart shows how likely you are to get an average question correct in each topic.
                                            This is based on your answers in this mock test. It will increase with practice!
                                        </div>
                                    </div>

                                    <div class="chart-container font-14 font-weight-500">

                                        @if(isset($topicSubParts) && $topicSubParts->count() > 0)
                                            @foreach( $topicSubParts as $topicSubPartItemObj)
                                                @php
                                                    $PartItemsPerformance = $quiz->QuizUserPartItemsPerformance->where('topic_part_item_id', $topicSubPartItemObj->id)->where('year_id', $quiz->year_id)->where('user_id', $user->id)->first();
                                                    $smart_score = isset($PartItemsPerformance->smart_score)? $PartItemsPerformance->smart_score : 0;


                                                    $progress_title = 'Not Started';
                                                    $progress_title = ($smart_score > 0)? 'Practice Needed' : $progress_title;
                                                    $progress_title = ($smart_score > 39)? 'Good' : $progress_title;
                                                    $progress_title = ($smart_score > 59)? 'Very Good' : $progress_title;
                                                    $progress_title = ($smart_score > 79)? 'Excellent' : $progress_title;

                                                @endphp


                                                <div class="chart-row">
                                                    <div class="row-label">{{$topicSubPartItemObj->title}}</div>
                                                    <div class="bar-area">
                                                        <div class="bar master" style="width: {{$smart_score}}%;">{{$progress_title}}</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif


                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Accordion -->
                        <div class="accordion" id="analyticsAccordion">
                            <h3 class="font-16 font-weight-bold mb-10">Questions answered</h3>
                            <!-- SESSION 2 -->
                            <div class="card mb-30">

                                @if(!empty($results_sessions))
                                    @php $show_class = ''; $attempt_counter = 1; $question_no = $attempted_questions_list->count(); @endphp
                                    @foreach($results_sessions as $result_id => $resultSessionArray)
                                        @php $show_class = ($attempt_counter == 1)? 'show' : '';
                                        $hidden_class = ($attempt_counter == 1)? '' : 'collapsed';
                                        $log_question_details = isset($resultSessionArray['log_question_details'])? $resultSessionArray['log_question_details'] : array();
                                        @endphp

                                        <div class="card-header {{$hidden_class}} mb-0 font-14 border-top-0"
                                             role="button"
                                             data-toggle="collapse"
                                             data-target="#attempt_questions_{{$result_id}}"
                                             aria-expanded="false"
                                             aria-controls="attempt_questions_{{$result_id}}">

                                            <span>{{isset($resultSessionArray['session_title'])? $resultSessionArray['session_title'] : ''}}</span>

                                            <span class="analytics-timespend">
                                                <img src="/assets/default/img/panel-sidebar/clock.svg" alt="clock">
                                                <span>{{isset($resultSessionArray['session_time'])? $resultSessionArray['session_time'] : ''}}</span>
                                            </span>

                                            <span class="analytics-cions-earned">
                                                <img src="/assets/default/img/sidebar/all.svg" alt="coins">
                                                <span>{{isset($resultSessionArray['smart_code_label'])? $resultSessionArray['smart_code_label'] : ''}}</span>
                                            </span>
                                        </div>




                                        <div id="attempt_questions_{{$result_id}}" class="collapse {{$show_class}}" data-parent="#analyticsAccordion">
                                            <div class="card-body pb-20">

                                                <div class="question-result-layout-holder">
                                                    @if( !empty( $log_question_details ))
                                                        @foreach( $log_question_details as $log_question_array)
                                                            @php $question_layout_template = isset($log_question_array['question_layout'])? $log_question_array['question_layout'] : '';
                                                                $logQuestionObj = isset($log_question_array['logQuestionObj'])? $log_question_array['logQuestionObj'] : (object) array();
                                                                $question_status = isset($logQuestionObj->status)? $logQuestionObj->status : '';
                                                                $correct_answers = isset($logQuestionObj->correct_answer)? json_decode($logQuestionObj->correct_answer, true) : array();
                                                                $correct_answers = array_column($correct_answers, 0);

                                                                $user_answers = isset($logQuestionObj->user_answer)? json_decode($logQuestionObj->user_answer, true) : array();
                                                                $user_answers = array_column($user_answers, 0);
                                                                $status_class = '';
                                                                $status_class = ($question_status == 'correct')? 'question-status-correct' : $status_class;
                                                                $status_class = ($question_status == 'incorrect')? 'question-status-incorrect' : $status_class;
                                                            @endphp

                                                            <div class="question-result-layout {{$status_class}} mb-10">
                                                                <div class="status-badge font-14">
                                                                    @if($question_status == 'incorrect')
                                                                        <i>&#x00D7;</i>
                                                                    @endif
                                                                    @if($question_status == 'correct')
                                                                        <i>&#10003;</i>
                                                                    @endif
                                                                    <span class="time-text">{{getTimeWithText($logQuestionObj->time_consumed)}}</span>
                                                                </div>
                                                                <div class="question-counts mb-10 font-14">
                                                                    <span>Question {{$question_no}} of {{$attempted_questions}}</span>
                                                                </div>
                                                                {!! $question_layout_template !!}
                                                                <div class="question-area">
                                                                    <div class="question-step">
                                                                        <div class="lms-radio-lists">
                                                                            <div class="lms-user-answer-block">
                                                                                <span class="list-title">Correct answer:</span>
                                                                                @if(!empty($correct_answers))
                                                                                    <ul class="lms-radio-btn-group font-14">
                                                                                        @foreach($correct_answers as $field_id => $correct_answer)
                                                                                            <li><label class="lms-question-label" for="radio2"><span>{{$correct_answer}}</span></label></li>
                                                                                        @endforeach
                                                                                    </ul>
                                                                                @endif
                                                                            </div>

                                                                            @if($question_status == 'incorrect')
                                                                                <div class="lms-user-answer-block">
                                                                                    <span class="list-title">{{$user->get_full_name()}} answered:</span>
                                                                                    @if(!empty($user_answers))
                                                                                        <ul class="lms-radio-btn-group font-14">
                                                                                            @foreach($user_answers as $field_id => $user_answer)
                                                                                                <li><label class="lms-question-label wrong" for="radio2"><span>{{$user_answer}}</span></label></li>
                                                                                            @endforeach
                                                                                        </ul>
                                                                                    @endif
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @php $question_no--; @endphp
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        @php $attempt_counter++; @endphp

                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
<div class="scroll-btn">
    <div class="round">
        <div id="cta">
            <span class="arrow primera next"></span>
            <span class="arrow segunda next"></span>
        </div>
    </div>
</div>



@if($show_graph == true)
    <script src="/assets/default/vendors/chartjs/chart.min.js"></script>



    <script>
        var usersStatisticsChart = document.getElementById("usersStatisticsChart").getContext('2d');
        var chart = {};

        var chart_columns = [];
        var chart_values = [];

        @if($attempted_questions_list->count() > 0)
        @php $question_counter = 1;  $smart_score = 0; @endphp
        @foreach($attempted_questions_list->orderBy('attempted_at', 'asc')->get() as $attemptedQuestionObj)
        @php if($attemptedQuestionObj->year_id == $user->year_id){ $smart_score = $attemptedQuestionObj->smart_score;} @endphp
        @php if($is_skill_summary == false){ $smart_score = $attemptedQuestionObj->smart_score;} @endphp
        chart_columns.push({{ $question_counter }});
        chart_values.push({{ $smart_score }});
        @php $question_counter++; @endphp
        @endforeach
        @endif

        makeStatisticsChart(
            'usersStatisticsChart',
            usersStatisticsChart,
            '',
            chart_columns,   // ✅ labels
            chart_values     // ✅ data
        );

        function makeStatisticsChart(name, section, badge, labels, datasets) {
            chart[name] = new Chart(section, {
                type: 'line',

                data: {
                    labels: labels,
                    datasets: [{
                        label: badge,
                        data: datasets,
                        borderWidth: 5,
                        borderColor: '#6777ef',
                        backgroundColor: 'transparent',
                        pointBackgroundColor: '#fff',
                        pointBorderColor: '#6777ef',
                        pointRadius: 4
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                title: function (tooltipItems) {
                                    // X-axis label
                                    return 'Question No: ' + tooltipItems[0].label;
                                },
                                label: function (tooltipItem) {
                                    // Y-axis value
                                    return ' Smart Score: ' + tooltipItem.raw;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            min: 0,
                            max: 100,
                            ticks: {
                                stepSize: 10
                            },
                            grid: {
                                display: true,
                                drawBorder: true
                            }
                        },
                        x: {
                            grid: {
                                display: true,
                                drawBorder: true
                            }
                        }
                    }
                }
            });
        }



    </script>
@endif
