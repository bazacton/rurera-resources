@php namespace App\Http\Controllers\Web; @endphp
@php
    $i = 0; $j = 1;
    $rand_id = rand(99,9999);

@endphp

@php $quiz_type = isset( $quiz->quiz_type )? $quiz->quiz_type : '';
$duration_type = isset( $duration_type )? $duration_type : 'no_time_limit';

$timer_counter = isset($start_timer)? $start_timer : 0;
$time_consumed = isset($time_consumed)? $time_consumed : 0;
$attempted_questions = isset($attempted_questions)? $attempted_questions : 0;
if( $duration_type == 'per_question'){
$timer_counter = $time_interval;
}
if( $duration_type == 'total_practice'){
$timer_counter = $practice_time;
}

if($time_consumed > 0){
    $timer_counter = $time_consumed;
}

$correct_answer_explaination = true;//isset($correct_answer_explaination)? $correct_answer_explaination : 0;
$incorrect_answer_explaination = true;//isset($incorrect_answer_explaination)? $incorrect_answer_explaination : 0;
@endphp
@php $total_questions = isset($questions_list)? count($questions_list) : 0; @endphp
<div class="content-section">

    <section class="lms-quiz-section">

        @if( $quiz->quiz_pdf != '')
            <script type="text/javascript">
                $(document).ready(function () {
                    $(".read-quiz-info").flipBook({
                        pdfUrl: '{{$quiz->quiz_pdf}}',
                        btnZoomIn: {enabled: true},
                        btnZoomOut: {enabled: true},
                        btnToc: {enabled: false},
                        btnShare: {enabled: false},
                        btnDownloadPages: {enabled: false},
                        btnDownloadPdf: {enabled: false},
                        btnSound: {enabled: false},
                        btnAutoplay: {enabled: false},
                        btnSelect: {enabled: false},
                        btnBookmark: {enabled: false},
                        btnThumbs: {enabled: false},
                        btnPrint: {enabled: false},
                        currentPage: {enabled: false},
                        viewMode: "swipe",
                        singlePageMode: true,
                        skin: 'dark',
                        menuMargin: 10,
                        menuBackground: 'none',
                        menuShadow: 'none',
                        menuAlignHorizontal: 'right',
                        menuOverBook: true,
                        btnRadius: 40,
                        btnMargin: 4,
                        btnSize: 14,
                        btnPaddingV: 16,
                        btnPaddingH: 16,
                        btnBorder: '2px solid rgba(255,255,255,.7)',
                        btnBackground: "rgba(0,0,0,.3)",
                        btnColor: 'rgb(255,120,60)',
                        sideBtnRadius: 60,
                        sideBtnSize: 60,
                        sideBtnBackground: "rgba(0,0,0,.7)",
                        sideBtnColor: 'rgb(255,120,60)',
                    });
                });

            </script>
            <div class="read-quiz-info quiz-show"></div>
        @endif

        <div class="container questions-data-block read-quiz-content" data-total_questions="{{$total_questions}}">


            <div class="justify-content-center w-100">
                <div class="col-lg-9 col-md-12 col-sm-12 mx-auto">
                    <div class="question-step quiz-complete" style="display:none">

                        <div class="step-block">Test Completed!!!</div>

                    </div>
                    <div data-result_attempt_id="{{isset($quizAttempt->id)? $quizAttempt->id : 0}}" data-quiz_result_id="{{isset($newQuizStart->id)? $newQuizStart->id : 0}}" class="question-area-block" data-active_question_id="{{$active_question_id}}" data-questions_layout="{{json_encode($questions_layout)}}">
                        <a href="javascript:;" class="load-more-questions rurera-hide">Load More Questions</a>
                        <div class="question-area dis-arrows1" data-total_questions="{{$total_questions}}">
                            <div class="correct-appriciate" style="display:none"></div>



                            @if(!empty($questions_sections_layout))

                                @php $section_counter = 1; @endphp
                                @foreach($questions_sections_layout as $section_id => $questions_section_data)

                                    @php $section_layout = isset($questions_section_data['layout'])? $questions_section_data['layout'] : '';
                                        $section_data = isset($questions_section_data['section_data'])? $questions_section_data['section_data'] : (object) array();

                                        $section_time = isset($section_data->time)? $section_data->time : 0;
                                        $section_time = ($section_time*60);
                                    @endphp


                                    <div class="quiz-section-data rurera-hide" data-section_counter="{{$section_counter}}" data-section_id="{{$section_id}}">


                                        <div class="quiz-status-bar mb-md-50 mt-15">
                                            <div class="questions-bar-box">
                                                <div class="quiz-questions-bar-holder">
                                                    <div class="quiz-questions-bar">
                                                        <span class="value-lable progress-bar-counter" data-title="" style="left:0%">
                                                            <span class="no-questions-lable">No of Questions</span>
                                                            <span class="no-questions-value">0</span>
                                                        </span>
                                                        <span class="bar-fill progress-bar-fill" data-title="" style="width: 0%;"></span>
                                                    </div>
                                                    <span class="coin-numbers">
                                                            <img src="/assets/default/img/quests-coin.png" alt="quests-coin">
                                                            <span class="total-earned-coins">0</span>
                                                        </span>
                                                </div>
                                            </div>
                                            <div class="quiz-time-bar">
                                                <div class="timer-wrap">
                                                    <span class="time-label"><img src="/assets/default/svgs/time-past.svg" alt="time-past"></span>
                                                    <div class="quiz-timer-counter" data-time_counter="{{($section_time)}}">
                                                        <div class="time-box" id="hh">00</div>
                                                        <span class="colon">:</span>
                                                        <div class="time-box" id="mm">00</div>
                                                        <span class="colon">:</span>
                                                        <div class="time-box" id="ss">00</div>
                                                    </div>
                                                </div>
                                                <button type="button" data-toggle="modal" class="setting-modal-btn" data-target="#rurSettingsModal" fdprocessedid="oan7zr">
                                                    <img src="/assets/default/svgs/setting.svg" alt="setting">
                                                </button>
                                            </div>
                                        </div>



                                    {!! $section_layout !!}

                                        <div class="quiz-section-questions rurera-hide">

                                            <div class="question-inner-step-area">
                                                <div class="question-layout-block">

                                                    <div class="left-content has-bg">
                                                        <div class="questions-lists-block">
                                                            @if( !empty( $questions_layout  ) )
                                                                @php $question_counter  = 1; @endphp
                                                                @foreach( $questions_layout as $result_question_id => $questionLayout)
                                                                    @php $active_actual_question_id = isset( $actual_question_ids[$result_question_id] )? $actual_question_ids[$result_question_id] : 0;
                                                            $active_class = ($active_question_id == $active_actual_question_id)? 'active' : '';
                                                            $active_class = ($active_class == '' && $question_counter == 1)? 'active' : '';
                                                                    @endphp
                                                                    <div class="rurera-question-block question-step my-auto question-step-{{ $active_actual_question_id }} {{$active_class}}" data-elapsed="0"
                                                                         data-qattempt="{{isset( $quizAttempt->id )? $quizAttempt->id : 0}}"
                                                                         data-start_time="0" data-qresult="{{isset( $result_question_id )? $result_question_id : 0}}"
                                                                         data-question_no="{{$question_counter}}"
                                                                         data-quiz_result_id="{{isset( $quizAttempt->quiz_result_id )? $quizAttempt->quiz_result_id : 0}}">

                                                                        {!! $questionLayout !!}

                                                                    </div>

                                                                    @php $question_counter++; @endphp
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                        <div class="show-notifications" data-show_message="yes"></div>
                                                        <div id="scroll-controls" class="page-prev-next-controls pr-0">
                                                            <div class="controls-inner">
                                                                <!-- Top State: Scroll Down Button -->
                                                                <button id="btn-top" class="btn-top scroll-btn pill btn-hidden">
                                                                    Scroll down <i class="arrow down"></i>
                                                                </button>

                                                                <!-- Bottom State: Scroll Up Button -->
                                                                <button id="btn-bottom" class="scroll-btn pill btn-hidden">
                                                                    Scroll up <i class="arrow up"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="prev-next-controls text-center mb-50 questions-nav-controls">
                                                            <a href="javascript:;" data-toggle="modal" class="review-btn rurera-hide1 mr-md-0" data-target="#review_submit">
                                                                Finish
                                                                <img src="/assets/default/svgs/review-btn-flag.svg" width="683" height="683" alt="review-btn-flag">
                                                            </a>
                                                            <button type="button" class="report-btn mr-md-auto"
                                                                    data-toggle="tooltip"
                                                                    title="Report this question"
                                                                    data-target="#reportModal"
                                                                    data-toggle2="modal">
                                                                Report
                                                            </button>
                                                            <a href="javascript:;" id="next-btn" class="rurera-hide next-btn">
                                                                Next
                                                                <img src="/assets/default/svgs/next-btn.svg" width="683" height="683" alt="next-btn">
                                                            </a>
                                                            <a href="javascript:;" id="prev-btn" class="rurera-hide prev-btn">
                                                                prev
                                                                <img src="/assets/default/svgs/next-btn.svg" width="683" height="683" alt="next-btn">
                                                            </a>
                                                            <a href="javascript:;" id="question-submit-btn" class="question-submit-btn">
                                                                mark answer
                                                            </a>
                                                            <a href="javascript:;" id="question-next-btn" class="question-next-btn rurera-hide">
                                                                Next
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @php $section_counter++; @endphp
                                @endforeach
                            @endif





                        </div>
                    </div>
                    <div class="question-area-temp hide"></div>
                </div>
            </div>
        </div>
    </section>
</div>

@if($quiz->quiz_type == 'vocabulary')
    <div class="question-status-modal">
        <div class="modal fade question_status_modal" id="question_status_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="modal-box">
                            <div class="modal-title">
                                <h3>Incorrect!</h3>
                                <span class="inc" style="text-decoration: line-through;">are</span>
                                <span class="cor">are</span>
                            </div>
                            <p>
                                <span>verb</span> when more than one person is being something
                            </p>
                            <a href="javascript:;" class="confirm-btn" data-dismiss="modal" aria-label="Close">Okay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<div class="modal fade review_submit" id="review_submit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="modal-body">
                <p></p>
                <a href="javascript:;" class="submit_quiz_final nav-link mt-20 btn-primary rounded-pill" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"> Submit </a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade validation_error" id="validation_error" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="modal-body">
                <p>Please fill all the required fields before submitting.</p>
            </div>
        </div>
    </div>
</div>
<div class="modal fade rur-settings-modal" id="rurSettingsModal" tabindex="-1" role="dialog" aria-labelledby="rurSettingsTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="rurSettingsTitle">Settings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body py-2">
                <div class="rur-setting-row">
                    <div class="rur-setting-text">
                        <div class="rur-setting-title">Timer</div>
                        <div class="rur-setting-sub">Show countdown badge</div>
                    </div>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input show-timer-check" id="show-timer-check">
                        <label class="custom-control-label" for="show-timer-check"></label>
                    </div>
                </div>
            </div>

            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-outline-secondary btn-sm setting-reset-btn" id="setting-reset-btn">Reset</button>
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Report Modal Html Start -->
<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 12px;">

            <!-- Header -->
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title font-weight-bold font-16" id="reportModalLabel">Report Issue</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Body -->
            <div class="modal-body pt-3">
                <div class="report-options d-flex flex-column gap-2 font-14">
                    <label class="radio-label d-flex align-items-center mb-2">
                        <input type="radio" name="reportReason" value="wrong_answer" class="mr-2" onchange="handleReasonChange(this)">
                        <span>The answer options are wrong</span>
                    </label>

                    <label class="radio-label d-flex align-items-center mb-2">
                        <input type="radio" name="reportReason" value="unclear" class="mr-2" onchange="handleReasonChange(this)">
                        <span>The question is unclear or confusing</span>
                    </label>

                    <label class="radio-label d-flex align-items-center mb-2">
                        <input type="radio" name="reportReason" value="typo" class="mr-2" onchange="handleReasonChange(this)">
                        <span>Typo or grammatical error</span>
                    </label>

                    <label class="radio-label d-flex align-items-center mb-2">
                        <input type="radio" name="reportReason" value="other" class="mr-2" onchange="handleReasonChange(this)">
                        <span>Other reason</span>
                    </label>
                </div>

                <!-- Dynamic Feedback Area -->
                <div class="feedback-area mt-3" id="feedbackArea">
                    <label id="feedbackLabel" class="font-weight-bold font-16">Please provide details:</label>
                    <textarea class="form-control" id="feedbackInput" rows="3" placeholder="Describe the issue here..."></textarea>
                </div>
            </div>

            <!-- Footer -->
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-light border" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="submitReport()">Submit Report</button>
            </div>
        </div>
    </div>
</div>
<!-- Report Modal Html End -->
<a href="#" data-toggle="modal" class="hide review_submit_btn" data-target="#review_submit">modal button</a>

<div class="modal fade question_inactivity_modal" id="question_inactivity_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-box">
        <span class="icon-box d-block mb-15">
            <img src="/assets/default/img/clock-modal-img.png" alt="clock-modal-img">
        </span>
                    <h3 class="font-24 font-weight-normal mb-10">Are you still there?</h3>
                    <p class="mb-15 font-16">
                        You've been inactive for a while, and your session was paused. You can continue learning by using the following links
                    </p>
                    <ul class="activity-info">
                        <li>Total Attempted Questions: <strong class="total-questions">10</strong></li>
                        <li><span class="icon-box"></span> Correct: <strong class="correct-questions">1</strong></li>
                        <li>Incorrect: <strong class="incorrect-questions">2</strong></li>
                    </ul>
                    <div class="inactivity-controls">
                        <a href="javascript:;" class="continue-btn" data-dismiss="modal" aria-label="Continue">Continue Test</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/assets/default/js/question-layout.js?ver={{$rand_id}}"></script>
<script>
    var correct_answer_explaination = '{{$correct_answer_explaination}}';
    var incorrect_answer_explaination = '{{$incorrect_answer_explaination}}';


    var practice_with_review_check = false;
    var sound_check = false;
    var correct_sound = false;
    var incorrect_sound = false;


    //init_question_functions();
    $('body').addClass('quiz-area-page');
    $('body').addClass('quiz-show');
    var header = document.getElementById("navbar");
    var headerOffset = (header != null) ? header.offsetHeight : 100;
    var header_height = parseInt(headerOffset) + parseInt(85) + "px";

    var attempted_questions = '{{count(array_filter($questions_status_array, fn($value) => $value !== "waiting"))}}';

    var Questioninterval = null;
    var Quizintervals = null;

    var duration_type = '{{$duration_type}}';
    var timer_counter = '{{$timer_counter}}';

    var timePaused = false;

    var focusInterval = null;
    var focusIntervalCount = 240;
    var TimerActive = true;


    function quiz_default_functions() {

        console.log('-----------quiz_default_functions------------');
        if( focusInterval == null) {

            focusInterval = setInterval(function () {
                var focus_count = focusIntervalCount-1;

                console.log(focus_count);
                focusIntervalCount = focus_count;
                if (focus_count <= 0 && TimerActive == true) {
                    TimerActive = false;
                    timePaused = true;
                    var total_questions = $('.quiz-pagination li').length;
                    $(".question_inactivity_modal .modal-body .total-questions").html(correct_questions+incorrect_questions);
                    $(".question_inactivity_modal .modal-body .correct-questions").html(correct_questions);
                    $(".question_inactivity_modal .modal-body .incorrect-questions").html(incorrect_questions);
                    $(".question_inactivity_modal").modal('show');
                    focusIntervalCount = 240;
                    //clearInterval(focusInterval);
                    focusInterval = null;
                }
            }, 1000);
        }

        window.addEventListener('focus', function () {
            focusIntervalCount = 240;
            clearInterval(focusInterval);
            focusInterval = null;
        });

        $(document).on('click', '.continue-btn', function (e) {
            TimerActive = true;
            timePaused = false;
            focusIntervalCount = 240;
            focusInterval = null;
        });




        var active_question_id = $(".question-area-block").attr('data-active_question_id');

        if(active_question_id > 0){
            $('.rurera-question-block').removeClass('active');
            $('.rurera-question-block.question-step-'+active_question_id).addClass('active');

        }

        $('.quiz-pagination ul li[data-actual_question_id="'+active_question_id+'"]').click();



        /*
        * Progress Bar set
         */
        var current_question_no = $('.rurera-question-block.question-step-'+active_question_id).attr('data-question_no');
        current_question_no = parseInt(current_question_no)-1;
        var total_no_of_questions = $(".question-area").attr('data-total_questions');
        total_no_of_questions = parseInt(total_no_of_questions);

        var next_question_no_percent = (current_question_no * 100) / total_no_of_questions;
        next_question_no_percent = Math.round(next_question_no_percent);
        console.log('next_question_no_percent==='+next_question_no_percent);


        $('.progress-bar-counter').css('left', next_question_no_percent+'%');
        $('.progress-bar-fill').css('width', next_question_no_percent+'%');
        $('.no-questions-value').html(current_question_no);




        Quizintervals = setInterval(function () {
            var parentObj = $(".quiz-section-data.active");
            if( TimerActive == true){
                var quiz_timer_counter = $(".quiz-section-data.active").find(".quiz-timer-counter").attr('data-time_counter');
                if (duration_type == 'no_time_limit') {
                    quiz_timer_counter = parseInt(quiz_timer_counter) + parseInt(1);
                } else {
                    quiz_timer_counter = parseInt(quiz_timer_counter) - parseInt(1);
                }
                $(".quiz-section-data.active").find(".quiz-timer-counter").html(getTime(quiz_timer_counter));
                if (parentObj.find('.nub-of-sec').length > 0) {
                    parentObj.find('.nub-of-sec').html(getTime(quiz_timer_counter));
                }
                $(".quiz-section-data.active").find(".quiz-timer-counter").attr('data-time_counter', quiz_timer_counter);
                if (duration_type == 'per_question') {
                    if (parseInt(quiz_timer_counter) == 0) {
                        clearInterval(Quizintervals);
                        $('.question-submit-btn').attr('data-bypass_validation', 'yes');
                        $('#question-submit-btn')[0].click();
                    }
                }
                if (duration_type == 'total_practice') {
                    if (parseInt(quiz_timer_counter) == 0) {
                        clearInterval(Quizintervals);
                        $(".review-btn").click();
                        if ($('.question-review-btn').length > 0) {
                            $('.question-review-btn').click();
                        }
                    }
                }
            }

        }, 1000);

        $("body").on("click", ".increasetext", function (e) {
            curSize = parseInt($('.learning-page').css('font-size')) + 2;
            if (curSize <= 32)
                $('.learning-page').css('font-size', curSize);
        });

        $("body").on("click", ".resettext", function (e) {
            if (curSize != 16)
                $('.learning-page').css('font-size', 18);
        });

        $("body").on("click", ".decreasetext", function (e) {
            curSize = parseInt($('.learning-page').css('font-size')) - 2;
            if (curSize >= 16)
                $('.learning-page').css('font-size', curSize);
        });
    }

    function getTime(secondsString) {
        var h = Math.floor(secondsString / 3600); //Get whole hours
        secondsString -= h * 3600;
        var m = Math.floor(secondsString / 60); //Get remaining minutes
        secondsString -= m * 60;
        var return_string = '';
        if( h > 0) {
            var return_string = return_string + '<div class="time-box" id="hh">'+h+'</div><span class="colon">:</span>';
        }else{
            var return_string = return_string + '<div class="time-box" id="hh">'+h+'</div><span class="colon">:</span>';
        }
        var quiz_type = '<?php echo e($quiz_type); ?>';
        if( (m > 0 || h > 0) || quiz_type != 'vocabulary') {
            var return_string = return_string + '<div class="time-box" id="mm">'+(m < 10 ? '0' + m : m)+'</div><span class="colon">:</span>';
        }
        //var return_string = return_string + (secondsString < 10 ? '0' + secondsString : secondsString);
        var return_string = return_string + '<div class="time-box" id="ss">'+(secondsString < 10 ? '0' + secondsString : secondsString)+'</div>';
        //return_string = return_string + 's';



        return return_string;
    }


    function afterQuestionValidation(return_data, thisForm, question_id, thisBlock) {
        var question_status_class = (return_data.incorrect_flag == true) ? 'incorrect' : 'correct';
        $(".quiz-pagination ul li[data-actual_question_id='" + question_id + "']").addClass(question_status_class);
        var notifications_settings_show_message = $(".show-notifications").attr('data-show_message');

        var show_notification = false;

        $('.show-notifications').html('');

        if(return_data.incorrect_flag == true && incorrect_sound == true && sound_check == true){
            $('.show-notifications').append('<audio autoPlay="" className="player-box-audio" id="audio_file_4492" src="/speech-audio/'+notification_sound+'"></audio>');
            show_notification = true;
        }


        var current_question_no = $(".rurera-question-block.active").attr('data-question_no');
        var next_question_no = parseInt(current_question_no)+1;
        var total_no_of_questions = $(".question-area").attr('data-total_questions');
        total_no_of_questions = parseInt(total_no_of_questions);

        var next_question_no_percent = (current_question_no * 100) / total_no_of_questions;
        next_question_no_percent = Math.round(next_question_no_percent);
        console.log('next_question_no_percent==='+next_question_no_percent);


        $('.progress-bar-counter').css('left', next_question_no_percent+'%');
        $('.progress-bar-fill').css('width', next_question_no_percent+'%');
        $('.no-questions-value').html(current_question_no);

        if(return_data.incorrect_flag == true && incorrect_answer_explaination == 1 && practice_with_review_check == true){
            var question_solution = return_data.question_solution;
            var notification_class = (return_data.incorrect_flag == true) ? 'wrong' : 'correct';
            var notification_label = (return_data.incorrect_flag == true) ? 'Thats incorrect, but well done for trying' : 'Well done! Thats exactly right.';
            var notification_sound = (return_data.incorrect_flag == true) ? 'wrong-answer.mp3' : 'correct-answer.mp3';
            $('.show-notifications').append('<span class="question-status-'+notification_class+'">'+notification_label+'</span>');
            $('.show-notifications').append('<div class="question-explaination"> <button class="explaination-btn collapsed" type="button" data-toggle="collapse" data-target="#explaination" aria-expanded="false" aria-controls="collapseExample"><h5 class="font-16 font-weight-bold">Explanation:</h5></button><div class="collapse" id="explaination">'+question_solution+'</div></div>');
            show_notification = true;
        }

        if(return_data.incorrect_flag == false && correct_sound == true && sound_check == true){
            $('.show-notifications').append('<audio autoPlay="" className="player-box-audio" id="audio_file_4492" src="/speech-audio/'+notification_sound+'"></audio>');
            show_notification = true;
        }

        if(return_data.incorrect_flag == false && correct_answer_explaination == 1 && practice_with_review_check == true){
            var question_solution = return_data.question_solution;
            var notification_class = 'correct';
            var notification_label = 'Well done! Thats exactly right.';
            var notification_sound = 'correct-answer.mp3';
            var earned_coins = $(".total-earned-coins").html();
            earned_coins = parseInt(earned_coins)+1;
            $(".total-earned-coins").html(earned_coins);
            $('.show-notifications').append('<span class="question-status-'+notification_class+'">'+notification_label+'</span>');
            $('.show-notifications').append('<div class="question-explaination"> <button class="explaination-btn collapsed" type="button" data-toggle="collapse" data-target="#explaination" aria-expanded="false" aria-controls="collapseExample"><h5 class="font-16 font-weight-bold">Explanation:</h5></button><div class="collapse" id="explaination">'+question_solution+'</div></div>');
            show_notification = true;

        }
        if(practice_with_review_check == true){
            $(".question-area-block").find('.question-submit-btn').addClass('rurera-hide');
            $(".question-area-block").find('.question-next-btn').removeClass('rurera-hide');
        }else{
            $(".question-area-block").find('.question-next-btn').click();
        }

        if (show_notification == true) {
            const el = document.querySelector('.show-notifications');
            if (el) {
                el.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }
        if( return_data.is_complete == true) {
            var quiz_result_id = return_data.result_id;
            $(".quiz-complete").html(return_data.result_page_layout);
            $(".quiz-status-bar").addClass('rurera-hide');
            $(".questions-nav-controls").addClass('rurera-hide');
            $(".show-notifications").addClass('rurera-hide');

            $(".rurera-question-block").removeClass('active');
            $("body").removeClass('quiz-area-page');
            $(".quiz-complete").show();
            TimerActive = false;
            //window.location.href = '/panel/quizzes/' + quiz_result_id + '/check_answers';
        }


        //$('#ne0xt-btn')[0].click();
    }

    function afterNextQuestion(){
        focusIntervalCount = 240;
        focusInterval = null;
        if (duration_type == 'per_question') {
            $(".quiz-section-data.active").find(".quiz-timer-counter").attr('data-time_counter', timer_counter);
            quiz_default_functions();
        }
    }


    function afterNoNextQuestion(){
        console.log('afterNoNextQuestionafterNoNextQuestionafterNoNextQuestion');
        const $active = $('.rurera-question-block.active').closest('.quiz-section-data.active');
        const $next = $active.next('.quiz-section-data');
        if ($next.length > 0) {
            $active.addClass('rurera-hide');
            $active.removeClass('active');

            $next.addClass('active');
            $next.removeClass('rurera-hide');

            $('.rurera-question-block.active').removeClass('active');

            $next.find('.rurera-question-block').first().addClass('active');
        }

    }



    function getDivWithValues() {
        // Clone the original div
        let clonedDiv = $('.question-area-block').clone();

        // Update cloned select elements with the values from the original div
        clonedDiv.find('select').each(function(index) {
            // Get the corresponding select element in the original div
            let originalSelect = $('.question-area-block select').eq(index);
            // Set the cloned select element's value to the original select element's value
            $(this).val(originalSelect.val());
        });

        // Update cloned textarea elements with the values from the original div
        clonedDiv.find('textarea').each(function(index) {
            // Get the corresponding textarea element in the original div
            let originalTextarea = $('.question-area-block textarea').eq(index);
            // Set the cloned textarea element's value to the original textarea element's value
            $(this).text(originalTextarea.val());
        });

        // Update cloned input elements with the values from the original div
        clonedDiv.find('input').each(function(index) {
            // Get the corresponding input element in the original div
            let originalInput = $('.question-area-block input').eq(index);
            // Set the cloned input element's value to the original input element's value
            if (originalInput.attr('type') === 'checkbox' || originalInput.attr('type') === 'radio') {
                $(this).prop('checked', originalInput.prop('checked'));
            } else {
                $(this).val(originalInput.val());
            }
        });

        // Generate final HTML with all values set properly
        clonedDiv.find('input').each(function() {
            if ($(this).attr('type') === 'checkbox' || $(this).attr('type') === 'radio') {
                if ($(this).prop('checked')) {
                    $(this).attr('checked', 'checked');
                } else {
                    $(this).removeAttr('checked');
                }
            } else {
                $(this).attr('value', $(this).val());
            }
        });

        clonedDiv.find('textarea').each(function() {
            $(this).text($(this).val());
        });

        clonedDiv.find('select').each(function() {
            $(this).find('option').each(function() {
                if ($(this).parent('select').val() == $(this).val()) {
                    $(this).attr('selected', 'selected');
                } else {
                    $(this).removeAttr('selected');
                }
            });
        });

        clonedDiv.find('.question-submit-btn').removeClass('rurera-processing');
        clonedDiv.find('.rurera-button-loader').remove();

        return clonedDiv;
    }
    $(document).on('keyup', 'body', function (evt) {
        if (evt.key === 'ArrowLeft') {
            $('#prev-btn')[0].click();
        }

        if (evt.key === 'ArrowRight') {



            $('#next-btn')[0].click();
        }
    });





    /*
    * Practice Settings
     */


    $(document).on('click', '.setting-reset-btn', function (evt) {
        $('.show-timer-check').prop('checked', false);
        $('.show-pagination-check').prop('checked', false);
        $('.practice-with-review-check').prop('checked', false);
        $('.play-sounds-check').prop('checked', false);
        $('.show-timer-check').change();
        $('.show-pagination-check').change();
        $('.practice-with-review-check').change();
        $('.play-sounds-check').change();
    });

    $(document).on('change', '.show-timer-check', function (evt) {

        var show_timer = $(this).is(':checked')? true : false;
        $(".timer-wrap").removeClass('rurera-hide');

        if(show_timer == false){
            $(".timer-wrap").addClass('rurera-hide');
        }
    });

    $(document).on('change', '.show-pagination-check', function (evt) {

        var show_timer = $(this).is(':checked')? true : false;
        $(".questions-total-holder").removeClass('rurera-hide');

        if(show_timer == false){
            $(".questions-total-holder").addClass('rurera-hide');
        }
    });


    $(document).on('change', '.practice-with-review-check', function (evt) {
        practice_with_review_check = $(this).is(':checked')? true : false;

    });


    $(document).on('change', '.play-sounds-check', function (evt) {
        sound_check = $(this).is(':checked')? true : false;
    });

</script>
<script>
    function quizPageCallback() {

        // Enable tooltips
        $('[data-toggle="tooltip"]').each(function () {

            $(this).tooltip({
                html: true,
                container: $(this).closest('.questions-data-block'),
                trigger: 'hover'
            });

        });

        // Open report modal
        $(document).off('click', '.report-btn').on('click', '.report-btn', function () {
            $('#reportModal').modal('show');
        });

        // Submit report logic
        $(document).off('click', '#submitReport').on('click', '#submitReport', function () {

            var otherChecked = $('#optOther').is(':checked');
            var otherText = $('#otherText').val().trim();

            if (otherChecked && otherText === '') {
                alert('Please explain the issue in the text area.');
                return;
            }

            $('#successMsg').removeClass('d-none');

            setTimeout(function () {
                $('#reportModal').modal('hide');
                $('#reportForm')[0].reset();
                $('#successMsg').addClass('d-none');
            }, 1500);
        });
    }

    $(document).on("change, input", ".editor-field", function (e) {
        $(".rurera-validation-error").remove();
        var thisBlock = $(".rurera-question-block.active");
        var thisForm = thisBlock.find('form');
        returnType = rurera_validation_process(thisForm, 'quiz_page');
    });

    $(document).on("click", ".section-start-quiz", function (e) {
        $('.quiz-section-questions').addClass('rurera-hide');
        $(this).closest('.quiz-section-data').find('.quiz-section-questions').removeClass('rurera-hide');
    });


    var selected_section = '{{isset($selected_section)? $selected_section : 1}}';

    $('.quiz-section-data[data-section_counter="'+selected_section+'"]').addClass('active');
    $('.quiz-section-data[data-section_counter="'+selected_section+'"]').removeClass('rurera-hide');




</script>
