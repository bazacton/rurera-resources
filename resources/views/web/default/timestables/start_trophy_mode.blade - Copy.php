@php namespace App\Http\Controllers\Web; @endphp
@extends(getTemplate().'.layouts.appstart')
@php
$i = 0; $j = 1;
$rand_id = rand(99,9999);

@endphp

@push('styles_top')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="/assets/admin/vendor/bootstrap/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width">

<style>
    .ui-state-highlight {
        margin: 0px 10px;
    }

    .field-holder.wrong, .form-field.wrong, .form-field.wrong label {
        background: #ff4a4a;
        color: #fff;
    }
    .active-level{background:red;}

</style>
@endpush
@section('content')
@php $timer_counter = 0;
if( $duration_type == 'per_question'){
    $timer_counter = $time_interval;
}
if( $duration_type == 'total_practice'){
    $timer_counter = $practice_time;
}
@endphp
<div class="content-section">

    <section class="lms-quiz-section1 justify-content-start">


        <div class="container-fluid questions-data-block read-quiz-content"
             data-total_questions="30">

            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12 col-sm-12">
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

                    <div class="start-counter"></div>

                    <div class="learning-content start-btn-container hide" id="learningPageContent">
                        <div class="learning-title">
                            <h3 class="mb-5"></h3>
                        </div>
                        <div class="d-flex align-items-center justify-content-center w-100">


                            <div class="learning-content-box d-flex align-items-center justify-content-center flex-column p-15 p-lg-30 rounded-lg">
                                <div class="learning-content-box-icon">
                                    <img src="/assets/default/img/learning/quiz.svg" alt="downloadable icon">
                                </div>

                                <p>Press Start button when you are ready!</p>

                                <a href="javascript:;" class="btn btn-primary btn-sm mt-15 start-timestables-quiz">Start</a>
                                <div class="learning-content-quiz"></div>

                            </div>
                        </div>

                    </div>

                    <div class="question-area-block quiz-first-question" data-duration_type="{{$duration_type}}" data-time_interval="{{$time_interval}}" data-practice_time="{{$practice_time}}" style="display:none" data-quiz_result_id="{{$QuizzAttempts->quiz_result_id}}" data-attempt_id="{{$QuizzAttempts->id}}" data-total_questions="{{count($questions_list)}}" data-corrected_questions="0">



                        <div class="col-12 col-lg-8 mx-auto">
                            <div class="spells-quiz-info">
                                <ul>
                                    <li class="show-correct-answer">
                                        <span class="tt_question_no">1</span>
                                    </li>
                                    <li>
                                        <span class="quiz-timer-counter" data-time_counter="{{$timer_counter}}">{{getTime($timer_counter)}}</span>
                                    </li>
                                    <li class="total-points">
                                        <span class="tt_points">0</span> Points
                                    </li>
                                </ul>
                            </div> <br><br>

                            @if( is_array( $questions_list ))
                            @php $question_no = 1; @endphp

                            @foreach( $questions_list as $questionIndex => $questionObj)

                            @php $class = ($questionIndex == 0)? 'active' : 'hide'; @endphp


                            <div class="questions-block {{$class}}" data-id="{{$questionIndex}}" data-tconsumed="0">
                            <form action="javascript:;" class="question-form" method="post"
                                                                  data-id="{{$questionIndex}}">
                                <div class="questions-status d-flex mb-15">
                                </div>
                                <div class="questions-arithmetic-box d-flex align-items-center">
                            		<span>{{$questionObj->from}} <span>{{$questionObj->type}}</span> {{$questionObj->to}} <span>&equals;</span></span>
                                   <input type="text" data-from="{{$questionObj->from}}"
                                                                           data-type="{{$questionObj->type}}"data-table_no="{{$questionObj->table_no}}" data-to="{{$questionObj->to}}"
                                                                           class="editor-fields" id="editor-fields-{{$questionIndex}}" autocomplete="off" >
                                    <div class="questions-controls">
                                       <span class="time-count-seconds" style="display:none;">0</span>
                                       <a href="javascript:;">
                                           <img src="/assets/default/svgs/unmute.svg" class="unmute_sound mute_unmute_sound" data-action="mute_sound" alt="mute svg">
                                           <img src="/assets/default/svgs/mute.svg" class="mute_sound mute_unmute_sound hide" data-action="unmute_sound" alt="unmute svg">
                                       </a>
                                   </div>
                                </div>
                                <div class="questions-block-numbers">
                                   <ul class="d-flex justify-content-center flex-wrap">
                                      <li id="key-7" data-value="7"><span>7</span></li>
                            			<li id="key-8" data-value="8"><span>8</span></li>
                            			<li id="key-9" data-value="9"><span>9</span></li>
                            			<li id="key-4" data-value="4"><span>4</span></li>
                            			<li id="key-5" data-value="5"><span>5</span></li>
                            			<li id="key-6" data-value="6"><span>6</span></li>
                            			<li id="key-1" data-value="1"><span>1</span></li>
                            			<li id="key-2" data-value="2"><span>2</span></li>
                            			<li id="key-3" data-value="3"><span>3</span></li>
                            			<li class="delete" data-value="delete"><span>Delete</span></li>
                            			<li id="key-0" data-value="0"><span>0</span></li>
                            			<li class="enter" data-value="enter"><span>Enter</span></li>
                                   </ul>
                                </div>
                            	</form>
                             </div>


                            @php $question_no++; @endphp
                            @endforeach

                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <div class="trophy-levels">
        <div class="flex-parent">
            <div class="input-flex-container">
                <div class="input explorer">
                    <span data-year="1" data-info="Explorer"></span>
                </div>
                <div class="input junior">
                    <span data-year="6" data-info="Junior"></span>
                </div>
                <div class="input active smarty">
                    <span data-year="12" data-info="Smarty"></span>
                </div>
                <div class="input brainy">
                    <span data-year="15" data-info="Brainy"></span>
                </div>
                <div class="input genius">
                    <span data-year="20" data-info="Genius"></span>
                </div>
                <div class="input creative">
                    <span data-year="30" data-info="Creative"></span>
                </div>
                <div class="input champion">
                    <span data-year="40" data-info="Champion"></span>
                </div>
                <div class="input mastery">
                    <span data-year="60" data-info="Mastery"></span>
                </div>
                <div class="input majesty">
                    <span data-year="75" data-info="Majesty"></span>
                </div>
                <div class="input expert">
                    <span data-year="100" data-info="Expert"></span>
                </div>
                <div class="input maestro">
                    <span data-year="150" data-info="Maestro"></span>
                </div>
            </div>
            <div class="description-flex-container">
                <p>Explorer</p>
                <p>Junior</p>
                <p class="active">Smarty</p>
                <p>Brainy</p>
                <p>Genius</p>
                <p>Creative</p>
                <p>Champion</p>
                <p>Mastery</p>
                <p>Majesty</p>
                <p>Expert</p>
                <p>Maestro</p>
            </div>
        </div>
    </div>
</div>
<div class="question-status-modal">
  <div class="modal fade timestables_question_status_modal" id="timestables_question_status_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="modal-box">
            <div class="modal-title">
              <h3>Time Over!</h3>
            </div>
            <a href="javascript:;" class="confirm-btn timestables-question-confirm-btn" data-dismiss="modal" aria-label="Close">Continue</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="question-status-modal">
  <div class="modal fade timestables_complete_status_modal" id="timestables_complete_status_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="modal-box">
            <div class="modal-title">
              <h3>Completed!</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts_bottom')

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    //init_question_functions();

    var user_data = [];
    var Quizintervals = null;

    var start_counter = 6;
    var is_sound_enabled = true;
    $(document).on('click', '.mute_unmute_sound', function (e) {
        $('.mute_unmute_sound').addClass('hide');
        this_action = $(this).attr('data-action');
        $('.'+this_action).removeClass('hide');
        if( this_action == 'mute_sound'){
            is_sound_enabled = false;
        }else{
            is_sound_enabled = true;
        }
        $(".editor-fields").focus();
    });

    var Startintervals = setInterval(function () {
        if (parseInt(start_counter) > 1) {
            start_counter = parseInt(start_counter) - parseInt(1);
            $(".start-counter").html(start_counter);
        } else {
            $(".start-counter").remove();
            clearInterval(Startintervals);
            $(".start-timestables-quiz").click();
        }
    }, 1000);

    var duration_type = $(".question-area-block").attr('data-duration_type');
    var time_interval = $(".question-area-block").attr('data-time_interval');
    var practice_time = $(".question-area-block").attr('data-practice_time');

    $(document).on('click', '.timestables-question-confirm-btn', function (e) {
        if( duration_type == 'total_practice'){
            $(".questions-block.active").nextAll('.questions-block').remove();
            $(".question-area-block").attr('data-total_questions', $('.questions-block').length);
        }
        $(".questions-block.active .question-form").submit();

    });

    $(document).on('click', '.start-timestables-quiz', function (e) {
        $(".quiz-first-question").show();
        $(".start-btn-container").hide();
        if (isMobileOrTablet()) {
            $(".editor-fields").attr('readonly', 'readonly');
        }
        $(".editor-fields").focus();
        var Questionintervals = setInterval(function () {
            if ($('.questions-block[data-id="0"]').hasClass('active')) {
                var seconds_count = $('.questions-block[data-id="0"]').attr('data-tconsumed');
                seconds_count = parseInt(seconds_count) + parseInt(1);
                seconds_count = (seconds_count == 10)? 1 : seconds_count;
                console.log(seconds_count);
                $('.questions-block[data-id="0"]').attr('data-tconsumed', seconds_count);
                $('.questions-block[data-id="0"]').find(".time-count-seconds").html(parseInt(seconds_count) / 10);
            } else {
                clearInterval(Questionintervals);
            }
        }, 100);

        Quizintervals = setInterval(function () {
            var quiz_timer_counter = $('.quiz-timer-counter').attr('data-time_counter');

            if( duration_type == 'no_time_limit'){
                quiz_timer_counter = parseInt(quiz_timer_counter) + parseInt(1);
            }else {
                quiz_timer_counter = parseInt(quiz_timer_counter) - parseInt(1);
            }
            var seconds_count = $('.questions-block[data-id="0"]').attr('data-tconsumed');
            console.log('Seconds = '+quiz_timer_counter);

            $('.quiz-timer-counter').html(getTime(quiz_timer_counter));
            $('.quiz-timer-counter').attr('data-time_counter', quiz_timer_counter);
            if( duration_type == 'per_question'){
                if( parseInt(quiz_timer_counter) == 0){
                    clearInterval(Questionintervals);
                    clearInterval(Quizintervals);
                    $("#timestables_question_status_modal").modal('show');
                    $(".questions-block.active .question-form").attr('data-bypass_validation', 'yes');
                    //$(".questions-block.active .question-form").submit();
                }
            }
            if( duration_type == 'total_practice'){
                if( parseInt(quiz_timer_counter) == 0){
                    clearInterval(Questionintervals);
                    clearInterval(Quizintervals);
                    $("#timestables_question_status_modal").modal('show');
                    $(".questions-block.active .question-form").attr('data-bypass_validation', 'yes');
                    //$(".question-form").submit();
                }
            }

        }, 1000);

    });

    function getTime(secondsString) {
        var h = Math.floor(secondsString / 3600); //Get whole hours
        secondsString -= h * 3600;
        var m = Math.floor(secondsString / 60); //Get remaining minutes
        secondsString -= m * 60;

        var return_string = '';
        if( h > 0) {
            var return_string = return_string + h + ":";
        }
        if( m > 0) {
            var return_string = return_string + (m < 10 ? '0' + m : m) + ":";
        }
        var return_string = return_string + (secondsString < 10 ? '0' + secondsString : secondsString);

        return return_string;
    }

    $(document).on('click', '.questions-block-numbers ul li', function (e) {
        var current_value = $(this).attr('data-value');
        if (isMobileOrTablet()) {
            $(".editor-fields").attr('readonly', 'readonly');
        }
        $(this).closest('form').find('.editor-fields').focus();
        var current_field_value = $(this).closest('form').find('.editor-fields').val();
        if( current_value == 'delete'){
            current_field_value = current_field_value.substring(0,current_field_value.length - 1);
            $(this).closest('form').find('.editor-fields').val(current_field_value);
        }else if( current_value == 'enter'){
            $(this).closest('form').submit();
        }else {
            $(this).closest('form').find('.editor-fields').val(current_field_value + current_value);
        }
    });




    $(document).on('submit', '.question-form', function (e) {

        var bypass_validation = $(this).closest('form').attr('data-bypass_validation');
        var total_questions = $(".question-area-block").attr('data-total_questions');
        var attempt_id = $(".question-area-block").attr('data-attempt_id');
        var quiz_result_id = $(".question-area-block").attr('data-quiz_result_id');
        var attempted_questions = parseInt($(".tt_question_no").html());
        var correct_questions = parseInt($(".question-area-block").attr('data-corrected_questions'));

        $(".powerup-levels ul li").removeClass('active-level');

        $('.powerup-levels ul li').each(function() {
            var minq = parseInt($(this).attr('data-minq'));
            var maxq = parseInt($(this).attr('data-maxq'));
            console.log(minq);
            console.log(maxq);

            if (correct_questions >= minq && correct_questions <= maxq) {
              $(this).addClass('active-level'); // You can replace 'active' with your desired class
            }
        });

        console.log(correct_questions);

        console.log($(this).closest('form'));
        returnType = rurera_validation_process($(this).closest('form'));

        if( rurera_is_field(bypass_validation) && bypass_validation == 'yes' ){
            returnType = true;
        }
        if (returnType == false) {
            return false;
        }


        clearInterval(Questionintervals);
        var data_id = $(this).attr('data-id');
        var time_consumed = $(this).closest('.questions-block').attr('data-tconsumed');
        var next_question = parseInt(data_id) + 1;
        user_data[data_id] = [];

        var from = $("#editor-fields-" + data_id).attr('data-from');
        var to = $("#editor-fields-" + data_id).attr('data-to');
        var type = $("#editor-fields-" + data_id).attr('data-type');
        var table_no = $("#editor-fields-" + data_id).attr('data-table_no');
        var answer = $("#editor-fields-" + data_id).val();



        var correct_answer = rurera_correct_value(from, to, type);
        var is_correct = (answer == correct_answer)? true : false;
        user_data[data_id] = {'from': from, 'to': to, 'type': type, 'answer': answer, 'time_consumed': time_consumed, 'table_no':table_no, 'is_correct':is_correct, 'correct_answer':correct_answer};

        var status_class = (answer == correct_answer)? 'successful' : 'wrong';

        $('.questions-status').append('<span class="'+status_class+'"></span>');

        if( status_class == 'successful') {
            var tt_points = $(".tt_points").html();
            tt_points = parseInt(tt_points) + 1;
            $(".tt_points").html(tt_points);
            var correct_questions_count = parseInt($(".question-area-block").attr('data-corrected_questions'));
            $(".question-area-block").attr('data-corrected_questions', parseInt(correct_questions_count)+1);
            if( is_sound_enabled == true) {
                $(this).append('<audio autoPlay="" className="player-box-audio" id="audio_file_4492" src="/audios/times-tables-correct.mp3"></audio>');
            }
        }else{
            if( is_sound_enabled == true) {
                $(this).append('<audio autoPlay="" className="player-box-audio" id="audio_file_4492" src="/speech-audio/wrong-answer.mp3"></audio>');
            }
        }



        if (parseInt(next_question) < parseInt(total_questions)) {
            $('.questions-block').addClass('hide');
            $('.questions-block').removeClass('active');

            $('.questions-block[data-id="' + next_question + '"]').removeClass('hide');
            $('.questions-block[data-id="' + next_question + '"]').addClass('active');
            var tt_question_no = $(".tt_question_no").html();
            tt_question_no = parseInt(tt_question_no) + 1;
            $(".tt_question_no").html(tt_question_no);
            if (isMobileOrTablet()) {
                $(".editor-fields").attr('readonly', 'readonly');
            }
            $("#editor-fields-" + next_question).focus();

            var Questionintervals = setInterval(function () {
                var seconds_count = $('.questions-block[data-id="' + next_question + '"].active').attr('data-tconsumed');
                seconds_count = parseInt(seconds_count) + parseInt(1);
                $('.questions-block[data-id="' + next_question + '"].active').attr('data-tconsumed', seconds_count);
                $('.questions-block[data-id="' + next_question + '"].active').find(".time-count-seconds").html(parseInt(seconds_count) / 10);
            }, 100);

            if( duration_type == 'per_question') {
                console.log('clear interval');
                clearInterval(Quizintervals);
                $('.quiz-timer-counter').html(time_interval);
                $('.quiz-timer-counter').attr('data-time_counter', time_interval);
                Quizintervals = setInterval(function () {
                    var quiz_timer_counter = $('.quiz-timer-counter').attr('data-time_counter');
                    quiz_timer_counter = parseInt(quiz_timer_counter) - parseInt(1);
                    $('.quiz-timer-counter').html(getTime(quiz_timer_counter));
                    $('.quiz-timer-counter').attr('data-time_counter', quiz_timer_counter);

                    if (duration_type == 'per_question') {
                        if (parseInt(quiz_timer_counter) == 0) {
                            clearInterval(Quizintervals);
                            $("#timestables_question_status_modal").modal('show');
                            //$(".questions-block.active .question-form").submit();
                        }
                    }

                }, 1000);
            }

        } else {
            clearInterval(Quizintervals);
            $('.questions-block').addClass('disable-div');
            $("#timestables_complete_status_modal").modal('show');
            var response_layout = '';

            var currentRequest = null;
            currentRequest = jQuery.ajax({
                type: "POST",
                url: '/question_attempt/timestables_submit',
                beforeSend: function () {
                    if (currentRequest != null) {
                        currentRequest.abort();
                    }
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'timestables_data':user_data, 'attempt_id':attempt_id},
                success: function (return_data) {
                    console.log(return_data);
                }
            });

            //window.location.href = '/timestables/summary';
            //window.location = '/panel/results/'+quiz_result_id+'/timetables';
            window.location.href = '/panel/results/'+quiz_result_id+'/timetables';

            return false;




            $.each(user_data, function (field_id, user_data_obj) {
                var from = user_data_obj.from;
                var to = user_data_obj.to;
                var action_type = user_data_obj.type;
                var user_answer = user_data_obj.answer;
                var time_consumed = user_data_obj.time_consumed;
                var time_consumed_seconds = parseInt(time_consumed) / 10;

                var correct_answer = rurera_correct_value(from, to, action_type);

                var is_correct_label = (user_answer == correct_answer)? 'Correct' : 'Incorrect';

                response_layout += '<div class="question-answer-block">\n\
                    '+from+' '+action_type+' '+to+' = '+user_answer+'   '+is_correct_label+' ('+time_consumed_seconds+' seconds)\n\
                    </div>';

                console.log(user_answer+'===='+correct_answer+'====='+time_consumed+'======='+time_consumed_seconds);

            });
            response_layout = '';

            $(".question-area-block").html(response_layout);
        }

    });

    function rurera_correct_value(from, to, operator) {
        var correct_value = '';
        switch (operator) {

            case "÷":
                var correct_value = parseInt(from) / parseInt(to);
                break;

            case "x":
                var correct_value = parseInt(from) * parseInt(to);
                break;
        }
        return correct_value;
    }

    $(document).on('click', '.next', function (e) {
        $(".prevm").removeClass('active');
        $(".nextm").addClass('active');
    });



    $('body').addClass('quiz-show');
    var header = document.getElementById("navbar");
    var headerOffset = (header != null) ? header.offsetHeight : 100;
    var header_height = parseInt(headerOffset) + parseInt(85) + "px";


    if (jQuery('.quiz-pagination .swiper-container').length > 0) {
        console.log('slides-count');
        console.log($(".quiz-pagination ul li").length);
        const swiper = new Swiper('.quiz-pagination .swiper-container', {
            slidesPerView: ($(".quiz-pagination ul li").length > 20) ? 20 : $(".quiz-pagination ul li").length,
            spaceBetween: 0,
            slidesPerGroup: 5,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                320: {
                    slidesPerView: 3,
                    spaceBetween: 5
                },

                480: {
                    slidesPerView: ($(".quiz-pagination ul li").length > 20) ? 20 : $(".quiz-pagination ul li").length,
                    spaceBetween: 5
                },

                640: {
                    slidesPerView: ($(".quiz-pagination ul li").length > 20) ? 20 : $(".quiz-pagination ul li").length,
                    spaceBetween: 5
                }
            }
        })
    }
    function isMobileOrTablet() {
        // Adjust the width and height values based on your needs
      const maxWidth = 768;
      const maxHeight = 1024;
      return (
        window.innerWidth <= maxWidth &&
        window.innerHeight <= maxHeight &&
        /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)
      );
    }
    if (isMobileOrTablet()) {
        $(".editor-fields").attr('readonly', 'readonly');
    }
</script>
@endpush
