@php namespace App\Http\Controllers\Web; @endphp
@php
    $i = 0; $j = 1;
    $rand_id = rand(99,9999);

@endphp
<style>
    :root {
        --page-width: 210mm; --page-height: 297mm;
        --page-padding-top: 10mm; --page-padding-right: 16mm; --page-padding-bottom: 8mm; --page-padding-left: 16mm;
        --header-offset-top: 10mm; --footer-offset-bottom: 8mm;
        --header-height: 14mm; --footer-height: 14mm;
        --content-gap-after-header: 5mm; --content-gap-before-footer: 7mm;
        --line: #d6dbe3; --line-strong: #9aa4b2; --text: #111827; --muted: #5b6472; --soft: #f5f7fb; --accent: #1d4ed8;
    }
    * { box-sizing: border-box; }
    html, body { margin: 0; padding: 0; background: #eef2f7; color: var(--text); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 1.45; }
    body { padding: 18px; }
    .toolbar { text-align: center; margin-bottom: 14px; }
    .btn { border: 0; border-radius: 8px; background: var(--accent); color: #fff; padding: 10px 18px; font-size: 14px; font-weight: 700; cursor: pointer; margin: 0 6px 8px; }
    .status-text { margin-top: 8px; color: var(--muted); font-size: 12px; }
    #pages { display: flex; flex-direction: column; gap: 18px; align-items: center; }
    .page { width: var(--page-width); min-height: var(--page-height); height: var(--page-height); box-sizing: border-box; print-color-adjust: exact; background: #fff; position: relative; box-shadow: 0 12px 30px rgba(17,24,39,0.08); overflow: hidden; page-break-after: always; break-after: page; display:flex; flex-direction:column; }
    .page-header, .page-footer { margin-left: var(--page-padding-left); margin-right: var(--page-padding-right); color: var(--muted); flex: 0 0 auto; }
    .page-header { margin-top: var(--header-offset-top); min-height: var(--header-height); border-bottom: 1px solid var(--line); display: flex; align-items: center; justify-content: space-between; gap: 10px; padding-bottom: 3mm; }
    .page-footer { margin-top: auto; margin-bottom: var(--footer-offset-bottom); min-height: var(--footer-height); border-top: 1px solid var(--line); display: flex; flex-direction: column; justify-content: center; gap: 2mm; padding-top: 2.5mm; font-size: 10.5px; }
    .footer-top { font-weight: 700; color: var(--text); text-align: center; }
    .footer-bottom { display: flex; align-items: center; justify-content: space-between; gap: 10px; }
    .page-body { margin-top: var(--content-gap-after-header); margin-left: var(--page-padding-left); margin-right: var(--page-padding-right); margin-bottom: var(--content-gap-before-footer); overflow: hidden; flex:1 1 auto; min-height:0; }
    .header-left { display: flex; align-items: center; gap: 10px; min-width: 0; }
    .paper-badge { display: inline-flex; align-items: center; justify-content: center; min-width: 34px; height: 34px; border-radius: 8px; background: #111827; color: #fff; font-weight: 700; font-size: 13px; flex: 0 0 34px; }
    .header-title { font-size: 12px; font-weight: 700; color: var(--text); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .header-subtitle { font-size: 10.5px; color: var(--muted); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .header-right { text-align: right; font-size: 10.5px; white-space: nowrap; }
    .cover { height: 100%; display: flex; flex-direction: column; gap: 16px; }
    .cover-top { display: flex; justify-content: space-between; gap: 20px; align-items: flex-start; padding-bottom: 14px; border-bottom: 2px solid #111827; }
    .cover h1 { margin: 0 0 8px; font-size: 28px; line-height: 1.15; }
    .cover h2 { margin: 0; font-size: 16px; color: var(--muted); font-weight: 600; }
    .meta-grid { display: grid; grid-template-columns: auto auto; gap: 6px 12px; align-content: start; font-size: 12px; }
    .meta-grid strong { color: var(--text); }
    .qr-box { width: 92px; height: 92px; border: 1px solid var(--line-strong); padding: 6px; background: #fff; flex: 0 0 92px; }
    .qr-box svg, .thumb svg { width: 100%; height: 100%; display: block; }
    .cover-grid { display: grid; grid-template-columns: 1.3fr 1fr; gap: 16px; flex: 1; }
    .panel { border: 1px solid var(--line); border-radius: 10px; overflow: hidden; background: #fff; }
    .panel-title { padding: 10px 12px; border-bottom: 1px solid var(--line); background: var(--soft); font-weight: 700; font-size: 12px; }
    .panel-body { padding: 12px; }
    .instruction-list, .options { margin: 0; padding-left: 18px; }
    .instruction-list li { margin-bottom: 8px; }
    .section-summary { display: flex; justify-content: space-between; gap: 8px; padding: 8px 0; border-bottom: 1px dashed var(--line); }
    .section-summary:last-child { border-bottom: 0; }
    .section-page { display: flex; flex-direction: column; gap: 12px; }
    .section-hero { border: 1px solid var(--line-strong); border-radius: 12px; padding: 18px; background: linear-gradient(180deg, #f9fbff 0%, #ffffff 100%); }
    .eyebrow { font-size: 11px; text-transform: uppercase; letter-spacing: 0.08em; color: var(--muted); font-weight: 700; margin-bottom: 8px; }
    .section-hero h2 { margin: 0 0 8px; font-size: 22px; line-height: 1.2; }
    .section-meta { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 10px; }
    .chip { display: inline-block; border: 1px solid var(--line-strong); border-radius: 999px; padding: 5px 10px; font-size: 11px; font-weight: 700; background: #fff; }
    .section-instructions-wrap { margin-bottom: 14px; }
    .question-block { border: 1px solid var(--line); border-radius: 10px; padding: 14px 14px 12px; margin-bottom: 10px; page-break-inside: avoid; break-inside: avoid; background: #fff; }
    .question-head { display: flex; justify-content: space-between; gap: 12px; margin-bottom: 8px; align-items: flex-start; }
    .q-number { font-weight: 700; font-size: 13px; color: var(--text); }
    .q-type { color: var(--muted); font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; white-space: nowrap; }
    .question-text { font-size: 12.5px; margin-bottom: 10px; }
    .mark-one { font-size: 11px; font-weight: 700; color: var(--muted); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px; }
    .blank-line { display: inline-block; min-width: 90px; border-bottom: 1px solid #111827; transform: translateY(-1px); }
    .tf-grid { display: flex; gap: 18px; flex-wrap: wrap; margin-top: 8px; }
    .mcq-option { margin-bottom: 7px; padding-left: 24px; position: relative; }
    .mcq-option::before { content: attr(data-label); position: absolute; left: 0; top: 0; font-weight: 700; }
    .hint { margin-top: 8px; padding: 8px 10px; border-radius: 8px; background: #f8fafc; border: 1px dashed var(--line-strong); color: var(--muted); font-size: 11.5px; }
    .reading-box { border: 1px solid var(--line); border-left: 4px solid #111827; border-radius: 8px; padding: 10px 12px; background: #fafbfd; margin-bottom: 12px; }
    .thumb { width: 92px; height: 68px; border: 1px solid var(--line-strong); border-radius: 8px; background: #fff; display: inline-flex; align-items: center; justify-content: center; overflow: hidden; margin: 6px 0 10px; }
    .end-of-test { text-align: center; font-weight: 700; letter-spacing: 0.1em; color: var(--text); border: 1px solid var(--line-strong); border-radius: 10px; padding: 14px 12px; margin-top: 12px; background: #fafbfd; }
    .source-content, .template { position: absolute; left: -99999px; top: 0; width: calc(var(--page-width) - var(--page-padding-left) - var(--page-padding-right)); visibility: hidden; }
    [data-force-new-page="true"] { break-before: page; page-break-before: always; }
    body.exporting { background: #fff; padding: 0; }
    body.exporting .toolbar { display:none !important; }
    body.exporting #pages { display:block; gap:0; align-items:stretch; }
    body.exporting .page { margin:0; box-shadow:none; break-after:auto; page-break-after:auto; }
    @media print {
        @page { size: A4; margin: 0; }
        html, body { background:#fff; padding:0; }
        .toolbar, .source-content, .template { display:none !important; }
        #pages { display:block; gap:0; }
        .page { box-shadow:none; margin:0; height: var(--page-height); min-height: var(--page-height); break-after: page; page-break-after: always; }
    }
</style>
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
<div class="toolbar">
    <button class="btn" onclick="downloadPdf()">Download PDF</button>
    <button class="btn" onclick="window.print()">Print / Save as PDF</button>
    <div id="statusText" class="status-text">Preparing pages…</div>
</div>

<div id="pages"></div>

<template id="pageHeaderTemplate" class="template">
    <div class="header-left">
        <div class="paper-badge">KS2</div>
        <div>
            <div class="header-title">KS2 SATs Practice Paper</div>
            <div class="header-subtitle">KS2-2026-MIXED-01</div>
        </div>
    </div>
    <div class="header-right">Mixed Practice Paper</div>
</template>

<template id="pageFooterTemplate" class="template">
    <div class="footer-top">Please go to next page</div>
    <div class="footer-bottom">
        <div>Confidential Practice Material</div>
        <div class="page-number-slot">Page 1 of 1</div>
    </div>
</template>

<div id="source" class="source-content">
    <article class="content-block cover-block">
        <div class="cover">
            <div class="cover-top">
                <div>
                    <h1>KS2 SATs Practice Paper</h1>
                    <h2>Mixed Maths Questions • Multiple Choice • Fill in the Blanks • True/False</h2>
                </div>
                <div class="qr-box">
                    <svg viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg" aria-label="QR code">
                        <rect width="120" height="120" fill="#fff"/><g fill="#000">
                            <rect x="6" y="6" width="30" height="30"/><rect x="12" y="12" width="18" height="18" fill="#fff"/><rect x="16" y="16" width="10" height="10"/>
                            <rect x="84" y="6" width="30" height="30"/><rect x="90" y="12" width="18" height="18" fill="#fff"/><rect x="94" y="16" width="10" height="10"/>
                            <rect x="6" y="84" width="30" height="30"/><rect x="12" y="90" width="18" height="18" fill="#fff"/><rect x="16" y="94" width="10" height="10"/>
                        </g>
                    </svg>
                </div>
            </div>
            <div class="meta-grid">
                <strong>Paper code</strong><span>KS2-2026-MIXED-01</span>
                <strong>Total questions</strong><span>40</span>
                <strong>Total time</strong><span>60 minutes total</span>
                <strong>Sections</strong><span>5</span>
            </div>
            <div class="cover-grid">
                <div class="panel">
                    <div class="panel-title">Instructions</div>
                    <div class="panel-body">
                        <ol class="instruction-list">
                            <li>Read each question carefully before answering.</li>
                            <li>There are five sections in this paper.</li>
                            <li>Each new section starts on a new page.</li>
                            <li>Questions may be multiple choice, fill in the blanks or true / false.</li>
                            <li>Write answers clearly and check your work if you have time.</li>
                        </ol>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-title">Sections and Articles</div>
                    <div class="panel-body">
                        <div class="section-summary"><div><strong>Section 1: Number and Place Value</strong><br><span>Answer all 8 questions in this section.</span></div><div>8 questions • 10 minutes</div></div>
                        <div class="section-summary"><div><strong>Section 2: Calculation</strong><br><span>Answer all 8 questions in this section.</span></div><div>8 questions • 12 minutes</div></div>
                        <div class="section-summary"><div><strong>Section 3: Fractions, Decimals and Percentages</strong><br><span>Answer all 8 questions in this section.</span></div><div>8 questions • 12 minutes</div></div>
                        <div class="section-summary"><div><strong>Section 4: Measurement and Geometry</strong><br><span>Answer all 8 questions in this section.</span></div><div>8 questions • 13 minutes</div></div>
                        <div class="section-summary"><div><strong>Section 5: Reasoning and Word Problems</strong><br><span>Answer all 8 questions in this section.</span></div><div>8 questions • 13 minutes</div></div>
                    </div>
                </div>
            </div>
        </div>
    </article>

@if(!empty($questions_sections_layout))

    @php $section_counter = 1; @endphp
    @foreach($questions_sections_layout as $section_id => $questions_section_data)

        @php $section_layout = isset($questions_section_data['layout'])? $questions_section_data['layout'] : '';
                            $section_data = isset($questions_section_data['section_data'])? $questions_section_data['section_data'] : (object) array();

                            $questions_layout = isset($questions_section_data['questions'])? $questions_section_data['questions'] : (object) array();
                            $section_time = isset($section_data->time)? $section_data->time : 0;
                            $section_time = ($section_time*60);
        @endphp


        {!! $section_layout !!}

        @if( !empty( $questions_layout  ) )
            @php $question_counter  = 1; @endphp
            @foreach( $questions_layout as $result_question_id => $questionLayout)

                {!! $questionLayout !!}

            @endforeach
        @endif
        </div>
@php $section_counter++; @endphp
@endforeach
@endif
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

        var quiz_timer_remaining = $active.find('.quiz-timer-counter').attr('data-time_counter');
        var current_section_id = $active.attr('data-section_id');
        const $next = $active.next('.quiz-section-data');
        var total_questions = $('.quiz-pagination ul[data-section_id="'+current_section_id+'"] li').length;
        console.log(total_questions);
        console.log(correct_questions);
        console.log(incorrect_questions);
        var section_move_html =
            'Total Questions: ' + total_questions + '<br>' +
            'Correct Questions: ' + correct_questions + '<br>' +
            'Incorrect Questions: ' + incorrect_questions + '<br>' +
            'Pending Questions: ' + (total_questions - (correct_questions + incorrect_questions)) + '<br>' +
            'You still have: ' + getTimeStr(quiz_timer_remaining) + ' remaining';


        var section_move_html = `
            <div class="mb-4">
                <img src="confetti.png" alt="Success" width="80">
            </div>

            <h2 class="fw-bold mb-20 font-16">Well done!</h2>

            <div class="d-flex justify-content-start align-items-center gap-3 mb-20 time-left">
                <div class="border rounded px-3 py-2 bg-light mr-2">
                    <span class="me-2">⏱</span>
                    <span class="fw-bold text-warning">${getTimeStr(quiz_timer_remaining)}</span>
                </div>
                <span class="ms-2"> left</span>
            </div>

            <p class="mb-20 font-14 text-left">
                Now is a great time to check your answers and to try to answer the
                following questions that you've skipped:
            </p>

            <div class="d-flex justify-content-start gap-3 mb-5">
                <button class="btn btn-outline-primary px-3">2</button>
                <button class="btn btn-outline-primary px-3">10</button>
            </div>
            `;
        if ($next.length > 0) {

            rurera_modal_alert(
                '',
                '',
                true, //confirmButton
                section_move_html,
                'onSectionMoveConfirm'
            );
        }

    }
    function getTimeStr(secondsString) {
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

    function onSectionMoveConfirm(){
        console.log('onSectionMoveConfirmonSectionMoveConfirmonSectionMoveConfirmonSectionMoveConfirm');
        const $active = $('.rurera-question-block.active').closest('.quiz-section-data.active');
        var current_section_id = $active.attr('data-section_id');
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
<script>
    function setStatus(message) {
        const status = document.getElementById("statusText");
        if (status) status.textContent = message;
    }
    function createPage() {
        const page = document.createElement("section");
        page.className = "page";
        const header = document.createElement("div");
        header.className = "page-header";
        header.innerHTML = document.getElementById("pageHeaderTemplate").innerHTML;
        const body = document.createElement("div");
        body.className = "page-body";
        const footer = document.createElement("div");
        footer.className = "page-footer";
        footer.innerHTML = document.getElementById("pageFooterTemplate").innerHTML;
        page.appendChild(header); page.appendChild(body); page.appendChild(footer);
        return page;
    }
    function fillFooter(page, pageNo, totalPages) {
        const footerTop = page.querySelector(".footer-top");
        const pageSlot = page.querySelector(".page-number-slot");
        if (footerTop) footerTop.textContent = pageNo === totalPages ? "Please check your answers" : "Please go to next page";
        if (pageSlot) pageSlot.textContent = `Page ${pageNo} of ${totalPages}`;
    }

    function paginate() {
        const pagesContainer = document.getElementById("pages");
        const source = document.getElementById("source");
        const blocks = Array.from(source.children);

        pagesContainer.innerHTML = "";

        function makePage() {
            const page = createPage();
            pagesContainer.appendChild(page);
            const body = page.querySelector(".page-body");
            return {
                page,
                body,
                getHeight() {
                    return body.clientHeight || body.getBoundingClientRect().height || 0;
                },
                getScrollHeight() {
                    return body.scrollHeight || body.getBoundingClientRect().height || 0;
                },
                hasContent() {
                    return body.children.length > 0;
                }
            };
        }

        let current = makePage();

        for (const originalBlock of blocks) {
            const block = originalBlock.cloneNode(true);
            const forceNewPage = originalBlock.dataset.forceNewPage === "true";

            if (forceNewPage && current.hasContent()) {
                current = makePage();
            }

            current.body.appendChild(block);

            if (current.getScrollHeight() > current.getHeight()) {
                current.body.removeChild(block);

                if (!current.hasContent()) {
                    // Oversized single block: keep it on the current page rather than creating ghost pages.
                    current.body.appendChild(block);
                    continue;
                }

                current = makePage();
                current.body.appendChild(block);

                if (current.getScrollHeight() > current.getHeight()) {
                    // If a single block is taller than one page, keep it anyway rather than looping into blanks.
                    // This preserves content visibility and avoids empty pages.
                }
            }
        }

        const pages = Array.from(pagesContainer.querySelectorAll(".page"));
        for (let i = pages.length - 1; i >= 0; i -= 1) {
            const body = pages[i].querySelector(".page-body");
            if (pages.length > 1 && body && body.children.length === 0) {
                pages[i].remove();
            }
        }

        const finalPages = Array.from(pagesContainer.querySelectorAll(".page"));
        finalPages.forEach((page, index) => fillFooter(page, index + 1, finalPages.length));
    }
    async function downloadPdf() {
        const pages = Array.from(document.querySelectorAll("#pages .page"));
        const hasJsPdf = window.jspdf && window.jspdf.jsPDF;
        const hasCanvas = typeof html2canvas !== "undefined";
        if (!pages.length) { setStatus("No pages found to export."); return; }
        if (!hasJsPdf || !hasCanvas) { setStatus("PDF libraries could not be loaded. Use Print / Save as PDF instead."); return; }
        setStatus("Generating PDF…");
        document.body.classList.add("exporting");
        try {
            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF({ orientation: "portrait", unit: "mm", format: "a4", compress: true });
            for (let index = 0; index < pages.length; index += 1) {
                const page = pages[index];
                const canvas = await html2canvas(page, { scale: 2, useCORS: true, backgroundColor: "#ffffff", logging: false, windowWidth: page.scrollWidth, windowHeight: page.scrollHeight });
                const imageData = canvas.toDataURL("image/jpeg", 0.98);
                if (index > 0) pdf.addPage("a4", "portrait");
                pdf.addImage(imageData, "JPEG", 0, 0, 210, 297, undefined, "FAST");
            }
            pdf.save("ks2_sats_question_paper.pdf");
            setStatus("PDF downloaded.");
        } catch (error) {
            console.error(error);
            setStatus("PDF download failed. Use Print / Save as PDF instead.");
        } finally {
            document.body.classList.remove("exporting");
        }
    }
    function buildPaper() { paginate(); setStatus("Pages ready."); }
    let resizeTimer = null;
    window.addEventListener("resize", () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => { paginate(); setStatus("Pages updated."); }, 120);
    });
    window.addEventListener("beforeprint", paginate);
    window.addEventListener("load", buildPaper);
</script>
