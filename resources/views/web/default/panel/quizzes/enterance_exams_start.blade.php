@php namespace App\Http\Controllers\Web; @endphp
@php
    $i = 0; $j = 1;
    $rand_id = rand(99,9999);

@endphp



@php $quiz_type = isset( $quiz->quiz_type )? $quiz->quiz_type : '';
$duration_type = isset( $duration_type )? $duration_type : 'no_time_limit';

$timer_counter = 0;
if( $duration_type == 'per_question'){
$timer_counter = $time_interval;
}
if( $duration_type == 'total_practice'){
$timer_counter = $practice_time;
}
$correct_answer_explaination = 1;//isset($correct_answer_explaination)? $correct_answer_explaination : 0;
$incorrect_answer_explaination = 1;//isset($incorrect_answer_explaination)? $incorrect_answer_explaination : 0;
@endphp
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

        <div class="container questions-data-block read-quiz-content" data-total_questions="{{$quizQuestions->count()}}">
            @php $top_bar_class = ($quiz->quiz_type == 'vocabulary')? 'rurera-hide' : ''; @endphp

            <div class="justify-content-center row">
                <div class="col-lg-9 col-md-12 col-sm-12 mx-auto">
                    <div class="question-step quiz-complete" style="display:none">
                        <div class="question-layout-block">
                            <div class="left-content has-bg">
                                <h2>&nbsp;</h2>
                                <div id="rureraform-form-1"
                                     class="rureraform-form rureraform-elements rureraform-form-input-medium rureraform-form-icon-inside rureraform-form-description-bottom ui-sortable"
                                     _data-parent="1"
                                     _data-parent-col="0" style="display: block;">
                                    <div class="question-layout row">

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div data-total_questions="{{count($questions_layout)}}" class="question-area-block" data-active_question_id="{{$active_question_id}}" data-questions_layout="{{json_encode($questions_layout)}}">
                        <button class="status-bar-on-off" type="button" data-toggle="collapse" data-target="#statusbar-data" aria-expanded="false" aria-controls="collapseExample"></button>
                        <p>
                        
                        <div class="collapse" id="statusbar-data">
                            <div class="card card-body">
                                <div class="quiz-status-bar">
                                    <div class="quiz-questions-bar-holder">
                                        <div class="quiz-questions-bar">
                                            <span class="value-lable progress-bar-counter" data-title="Target" style="left:0%"><span>1 / {{count($questions_layout)}}</span></span>
                                            <span class="bar-fill progress-bar-fill" title="0%" style="width: 0%;"></span>
                                        </div>
                                        <span class="coin-numbers">
                                            <img src="/assets/default/img/quests-coin.png" alt="">
                                            <span class="total-earned-coins">0</span>
                                        </span>
                                    </div>
                                    <div class="quiz-timer">
                                        <span class="timer-number"><div class="quiz-timer-counter" data-time_counter="{{($timer_counter)}}">0s</div></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="quiz-time-bar">
                            <div class="timer-wrap">
                            <span class="time-label"><img src="/assets/default/svgs/time-past.svg" alt="time-past"> Time left:</span>

                            <div class="time-box" id="hh">00</div>
                            <span class="colon">:</span>
                            <div class="time-box" id="mm">05</div>
                            <span class="colon">:</span>
                            <div class="time-box" id="ss">15</div>
                            </div>
                            <span class="coin-numbers">
                                <img src="/assets/default/img/quests-coin.png" alt="quests-coin">
                                <span class="total-earned-coins">1</span>
                            </span>
                        </div>
                        <div class="question-counts">
                            <span class="icon-box"><img src="/assets/default/svgs/question-simple.svg" alt="question-simple"></span>
                            <span>Question 8 of 20</span>
                        </div>

                        @php $total_questions = 10; @endphp
                        <div class="question-area dis-arrows1" data-total_questions="{{$total_questions}}">
                            <div class="correct-appriciate" style="display:none"></div>
                            <div class="question-inner-step-area">
                                <div class="question-layout-block">
                                    <div class="left-content has-bg">
                                        @if( is_array( $question ))
                                            @php $question_no = 1; @endphp

                                            @foreach( $question as $questionObj)
                                                @include('web.default.panel.questions.question_layout',[
                                                'question'=> $questionObj,
                                                'prev_question' => 0,
                                                'next_question' => 0,
                                                'question_no' => $question_no,
                                                'quizAttempt' => $quizAttempt,
                                                'newQuestionResult' => $newQuestionResult,
                                                'quizResultObj' => $newQuizStart
                                                ])
                                                @php $question_no++; @endphp
                                            @endforeach
                                        @else

                                            @if( !empty( $questions_layout  ) )
                                                @php $question_counter  = 1; @endphp
                                                @foreach( $questions_layout as $result_question_id => $questionLayout)
                                                @php $active_actual_question_id = isset( $actual_question_ids[$result_question_id] )? $actual_question_ids[$result_question_id] : 0;
                                                $active_class = ($question_counter == 1)? 'active' : '';
                                                if($active_question_id != ''){
                                                    $active_class = ($active_question_id == $active_actual_question_id)? 'active' : '';
                                                }
                                                    @endphp
                                                    <div class="rurera-question-block question-step question-step-{{ $active_actual_question_id }} {{$active_class}}" data-elapsed="0"
                                                         data-qattempt="{{isset( $quizAttempt->id )? $quizAttempt->id : 0}}"
                                                         data-start_time="0" data-qresult="{{isset( $result_question_id )? $result_question_id : 0}}"
                                                         data-quiz_result_id="{{isset( $quizAttempt->quiz_result_id )? $quizAttempt->quiz_result_id : 0}}">

                                                        {!! $questionLayout !!}

                                                    </div>

                                                    @php $question_counter++; @endphp
                                                @endforeach
                                            @endif

                                        @endif
                                        <div class="show-notifications" data-show_message="yes"></div>
                                        <div class="prev-next-controls text-center mb-50 questions-nav-controls">
                                            <a href="javascript:;" data-toggle="modal" class="review-btn" data-target="#review_submit">
                                                Finish
                                                <img src="/assets/default/svgs/review-btn-flag.svg" width="683" height="683" alt="review-btn-flag">
                                            </a>
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
    <div class="modal-dialog modal-dialog-centered">
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
<a href="#" data-toggle="modal" class="hide review_submit_btn" data-target="#review_submit">modal button</a>


<script src="/assets/default/js/question-layout.js?ver={{$rand_id}}"></script>
<script>
    var correct_answer_explaination = '{{$correct_answer_explaination}}';
    var incorrect_answer_explaination = '{{$incorrect_answer_explaination}}';
    //init_question_functions();
    $('body').addClass('quiz-show');
    var header = document.getElementById("navbar");
    var headerOffset = (header != null) ? header.offsetHeight : 100;
    var header_height = parseInt(headerOffset) + parseInt(85) + "px";

    var attempted_questions = '{{count(array_filter($questions_status_array, fn($value) => $value !== "waiting"))}}';

    var Questioninterval = null;
    var Quizintervals = null;

    var duration_type = '{{$duration_type}}';
    var timer_counter = '{{$timer_counter}}';


    function quiz_default_functions() {

        var active_question_id = $(".question-area-block").attr('data-active_question_id');
        $('.quiz-pagination ul li[data-actual_question_id="'+active_question_id+'"]').click();

        Quizintervals = setInterval(function () {
            var quiz_timer_counter = $('.quiz-timer-counter').attr('data-time_counter');
            if (duration_type == 'no_time_limit') {
                quiz_timer_counter = parseInt(quiz_timer_counter) + parseInt(1);
            } else {
                quiz_timer_counter = parseInt(quiz_timer_counter) - parseInt(1);
            }
            $('.quiz-timer-counter').html(getTime(quiz_timer_counter));
            if ($('.nub-of-sec').length > 0) {
                $('.nub-of-sec').html(getTime(quiz_timer_counter));
            }
            $('.quiz-timer-counter').attr('data-time_counter', quiz_timer_counter);
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
                    $(".submit_quiz_final").click();
                    if ($('.question-review-btn').length > 0) {
                        $('.question-review-btn').click();
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
            var return_string = return_string + h + "h ";
        }
        var quiz_type = '{{$quiz_type}}';
        if( (m > 0 || h > 0) || quiz_type != 'vocabulary') {
            var return_string = return_string + (m < 10 ? '0' + m : m) + "m ";
        }
        var return_string = return_string + (secondsString < 10 ? '0' + secondsString : secondsString);
        return_string = return_string + 's';
        return return_string;
    }


    function afterQuestionValidation(return_data, thisForm, question_id, thisBlock) {
        var question_status_class = (return_data.incorrect_flag == true) ? 'incorrect' : 'correct';
        $(".quiz-pagination ul li[data-actual_question_id='" + question_id + "']").addClass(question_status_class);
        var notifications_settings_show_message = $(".show-notifications").attr('data-show_message');

        $(".question-area-block").find('.question-submit-btn').addClass('rurera-hide');
        $(".question-area-block").find('.question-next-btn').removeClass('rurera-hide');

        $(".rurera-question-block.active").addClass('disabled-div');
        if(return_data.incorrect_flag == true && incorrect_answer_explaination == 1){
            var question_solution = return_data.question_solution;
            var notification_class = (return_data.incorrect_flag == true) ? 'wrong' : 'correct';
            var notification_label = (return_data.incorrect_flag == true) ? 'Thats incorrect, but well done for trying' : 'Well done! Thats exactly right.';
            var notification_sound = (return_data.incorrect_flag == true) ? 'wrong-answer.mp3' : 'correct-answer.mp3';
            $('.show-notifications').html('<span class="question-status-'+notification_class+'">'+notification_label+'</span>');
            $('.show-notifications').append('<div class="question-explaination">'+question_solution+'</div>');
            $('.show-notifications').append('<audio autoPlay="" className="player-box-audio" id="audio_file_4492" src="/speech-audio/'+notification_sound+'"></audio>');
        }

        if(return_data.incorrect_flag == false && correct_answer_explaination == 1){
            var notification_class = 'correct';
            var notification_label = 'Well done! Thats exactly right.';
            var notification_sound = 'correct-answer.mp3';
            $('.show-notifications').html('<span class="question-status-'+notification_class+'">'+notification_label+'</span>');
            $('.show-notifications').append('<audio autoPlay="" className="player-box-audio" id="audio_file_4492" src="/speech-audio/'+notification_sound+'"></audio>');
        }
        if( return_data.is_complete == true) {
            var quiz_result_id = $(".question-area .question-step").attr('data-quiz_result_id');
            window.location.href = '/panel/quizzes/' + quiz_result_id + '/check_answers';

        }


        //$('#ne0xt-btn')[0].click();
    }

    function afterJumpReview(return_data){
        var quiz_result_id = $(".question-area .question-step").attr('data-quiz_result_id');
        window.location.href = '/panel/quizzes/' + quiz_result_id + '/check_answers';
    }

    var currentRequest = null;
    function afterNextQuestion(){
        var current_question_serial = $('.rurera-question-block.active').index();
        current_question_serial =  parseInt(current_question_serial)+1;
        var total_questions = parseInt($(".question-area-block").attr('data-total_questions'));
        var current_percentage = (current_question_serial*100)/total_questions;
        $(".progress-bar-counter span").html(current_question_serial+' / '+total_questions);
        $(".progress-bar-counter").css('left', current_percentage+'%');
        $(".progress-bar-fill").css('width', current_percentage+'%');

        var qattempt_id = $('.rurera-question-block.active').attr('data-qattempt');
        var question_id = $('.rurera-question-block.active').attr('data-qresult');
        var actual_question_id = $('.rurera-question-block.active').find(".question-fields").attr('data-question_id');
        currentRequest = jQuery.ajax({
            type: "POST",
            dataType: 'json',
            url: '/question_attempt/mark_as_active',
            async: true,
            beforeSend: function () {
                if (currentRequest != null) {
                    currentRequest.abort();
                }
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {"question_id": question_id, "qattempt_id": qattempt_id, "actual_question_id": actual_question_id},
            success: function (return_data) {
                console.log(return_data);
            }
        });
        if (duration_type == 'per_question') {
            $(".quiz-timer-counter").attr('data-time_counter', timer_counter);
            quiz_default_functions();
        }
    }


    function afterPrevQuestion(){
        var current_question_serial = $('.rurera-question-block.active').index();
        current_question_serial =  parseInt(current_question_serial)+1;
        var total_questions = parseInt($(".question-area-block").attr('data-total_questions'));
        var current_percentage = (current_question_serial*100)/total_questions;
        console.log(current_question_serial);
        $(".progress-bar-counter span").html(current_question_serial+' / '+total_questions);
        $(".progress-bar-counter").css('left', current_percentage+'%');
        $(".progress-bar-fill").css('width', current_percentage+'%');

        if (duration_type == 'per_question') {
            $(".quiz-timer-counter").attr('data-time_counter', timer_counter);
            quiz_default_functions();
        }
    }

    function afterQuestionValidation_bk(return_data, thisForm, question_id) {
        var current_question_layout = getDivWithValues().html();//$(".question-area-block").html();
        //console.log(current_question_layout.html());
        current_question_layout = JSON.stringify(current_question_layout);
        current_question_layout = rureraform_encode64(current_question_layout);
        var questions_layout_obj = JSON.parse($('.question-area-block').attr('data-questions_layout'));
        console.log(questions_layout_obj);
        var question_local_id = $(".quiz-pagination ul li[data-actual_question_id='" + question_id + "']").attr('data-question_id');
        var questions_layout = [];
        var questions_layout_obj = $.map(questions_layout_obj, function (value, index) {
            questions_layout[index] = value;
        });
        var question_layout = rureraform_decode64(questions_layout[question_local_id]);

        var question_layout = JSON.parse(question_layout);
        console.log('afterQuestionValidation');
        console.log('questions_layout.length===='+question_local_id);
        questions_layout[question_local_id] = current_question_layout;

        let questions_layout_object = {};

        $.each(questions_layout, function(question_index, question_value) {
            if (typeof question_value !== 'undefined') {
                questions_layout_object[question_index] = questions_layout[question_index];
            }
        });
        $('.question-area-block').attr('data-questions_layout', JSON.stringify(questions_layout_object))

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

    var current_question_serial = $('.rurera-question-block.active').index();
    current_question_serial =  parseInt(current_question_serial)+1;
    var total_questions = parseInt($(".question-area-block").attr('data-total_questions'));
    var current_percentage = (current_question_serial*100)/total_questions;
    $(".progress-bar-counter span").html(current_question_serial+' / '+total_questions);
    $(".progress-bar-counter").css('left', current_percentage+'%');
    $(".progress-bar-fill").css('width', current_percentage+'%');

    $(document).on('keyup', 'body', function (evt) {
        if (evt.key === 'ArrowLeft') {
            $('#prev-btn')[0].click();
        }

        if (evt.key === 'ArrowRight') {
            $('#next-btn')[0].click();
        }
    });
</script>
<script>
$(document).ready(function () {
  let totalSeconds = (0 * 3600) + (5 * 60) + 15;

  function updateTimer() {
    if (totalSeconds <= 0) return;

    totalSeconds--;

    const h = Math.floor(totalSeconds / 3600);
    const m = Math.floor((totalSeconds % 3600) / 60);
    const s = totalSeconds % 60;

    document.getElementById("hh").textContent = String(h).padStart(2, "0");
    document.getElementById("mm").textContent = String(m).padStart(2, "0");
    document.getElementById("ss").textContent = String(s).padStart(2, "0");
  }

  // ✔ Accurate 1-second timer (NO setInterval)
  setTimeout(function tick() {
    updateTimer();
    setTimeout(tick, 1000);
  }, 1000);
  });
</script>

