@php namespace App\Http\Controllers\Web;
use App\Models\QuestionLogs;
@endphp
@extends(getTemplate().'.layouts.appstart')
@php
$i = 0; $j = 1;
$rand_id = rand(99,9999);

@endphp

@push('styles_top')
<link rel="stylesheet" href="/assets/default/vendors/video/video-js.min.css">
<link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">
<script>
    window.MathJax = {
        tex: {
            inlineMath: [['$', '$'], ['\\(', '\\)']],
            displayMath: [['$$', '$$']]
        },
        svg: {
            fontCache: 'global'
        }
    };
</script>
<script src="https://cdn.jsdelivr.net/npm/mathjax@4/tex-mml-svg.js" defer></script>
    <style>.disabled-div {pointer-events: none;}</style>
@endpush

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

@section('content')
    
    <div class="learning-page type-practice type-sats preview-question-area">
        
        <section class="learning-content lms-quiz-section">
            <div class="container questions-data-block read-quiz-content" data-total_questions="0">
                <div class="justify-content-center">
                    <div class="col-lg-9 col-md-9 col-sm-12 mt-50 mx-auto">

                        <div class="question-area-block" data-active_question_id="0" data-questions_layout="">
                            @php $total_questions = 10; @endphp
                            <div class="question-area dis-arrows1" data-total_questions="10">
                                <div class="correct-appriciate" style="display:none"></div>
                                <div class="question-inner-step-area">
                                    <div class="question-layout-block">

                                            @php $is_active = ''; $counter = 0; @endphp
                                            @if($questions->count() > 0)
                                                @foreach($questions as $questionObj)
                                                    @php $question_layout = $QuestionsAttemptController->get_question_layout($questionObj); $counter++;@endphp

                                                    @php $questionLogs = QuestionLogs::where('question_id', $questionObj->id)->orderBy('id', 'desc')->with('user')
                                                                                    ->get();
                                                    @endphp
                                                    <div class="rurera-question-block {{($counter == 1)? 'active' : ''}} question-step question-step-{{ $questionObj->id }}" data-elapsed="0"
                                                    data-qattempt="0"
                                                    data-start_time="0" data-qresult="0"
                                                    data-quiz_result_id="0">
                                                        <div class="left-content has-bg">
                                                            <!-- <div class="quiz-status-bar">
                                                                <div class="quiz-questions-bar-holder">
                                                                    <div class="quiz-questions-bar">
                                                                        <span class="value-lable" data-title="Target" style="left:80%"><span>80%</span></span>
                                                                        <span class="bar-fill" title="80%" style="width: 80%;"></span>
                                                                    </div>
                                                                    <span class="coin-numbers">
                                                                        <img src="/assets/default/img/quests-coin.png" alt="">
                                                                        <span class="total-earned-coins">0</span>
                                                                    </span>
                                                                </div>
                                                                <div class="quiz-corrects-incorrects">
                                                                    <span class="quiz-corrects">0</span>
                                                                    <span class="quiz-incorrects">0</span>
                                                                </div>
                                                            </div> -->
                                                            <div class="quiz-time-bar pt-15">
                                                                <div class="timer-wrap">
                                                                    <span class="time-label"><img src="/assets/default/svgs/time-past.svg" alt="time-past"> Time left:</span>

                                                                    <div class="time-box" id="hh">00</div>
                                                                    <span class="colon">:</span>
                                                                    <div class="time-box" id="mm">00</div>
                                                                    <span class="colon">:</span>
                                                                    <div class="time-box" id="ss">00</div>
                                                                </div>
                                                                <span class="coin-numbers">
                                                                    <img src="/assets/default/img/quests-coin.png" alt="quests-coin">
                                                                    <span class="total-earned-coins">1</span>
                                                                </span>
                                                            </div>
                                                    <div class="question-layout row">
                                                        {!! $question_layout !!}
                                                    </div>

                                                    @if(ReviewPermission(auth()->user()->id))
                                                        <div class="question-explaination mt-15">
                                                            <h5 class="mb-15 font-16">Explanation:</h5>
                                                            {!! $questionObj->question_solve !!}
                                                        </div>

                                                        <br>
                                                        <a href="javascript:;" id="approve-btn" class="question-approve-btn btn btn-primary rurera-hide" data-toggle="modal" data-target="#approve_modal_{{$questionObj->id}}">
                                                            Take Action
                                                        </a>
                                                    @endif

                                                        </div>
                                                        <div class="question-right-side mt-0">
                                                            <button class="toggle-btn" id="toggleBtn" onclick="toggleSidebar()">
                                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                                    <polyline points="15 18 9 12 15 6"></polyline>
                                                                </svg>
                                                            </button>
                                                            <div class="question-right-inner">
                                                                <div class="prev-next-controls text-center mb-50 questions-nav-controls disable-div">
                                                                    <a href="javascript:;" id="prev-btn" class="rurera-hide1 prev-btn">
                                                                        prev
                                                                        <img src="/assets/default/svgs/next-btn.svg" width="683" height="683" alt="next-btn">
                                                                    </a>
                                                                    <a href="javascript:;" id="next-btn" class="rurera-hide1 next-btn">
                                                                        Next
                                                                        <img src="/assets/default/svgs/next-btn.svg" width="683" height="683" alt="next-btn">
                                                                    </a>
                                                                </div>
                                                                <div class="question-detail-holder">
                                                                    <div class="question-right-header">
                                                                        <p>Question {{$counter}} / {{$questions->count()}}</p>
                                                                        <span class="questions-total-holder d-block">
                                                                            <span class="question-number-holder question-number" style="z-index: 999999999;"> {{$counter}}</span>

                                                                            @php $chapter_title = isset($questionObj->subChapter->id)? $questionObj->subChapter->chapter->title : '';

                                                                                $sub_chapter_title = isset($questionObj->subChapter->id)? $questionObj->subChapter->sub_chapter_title : '';
                                                                            @endphp
                                                                            <span class="question-dev-details">({{$questionObj->id}}) - <a href="{{url('/admin/questions_bank/'.$questionObj->id.'/edit')}}" target="_blank">Edit</a></span>
                                                                        </span>
                                                                    </div>
                                                                    
                                                                    <ul class="question-details">
                                                                        <li>Category: <span>{{isset($questionObj->topicPartItem->id)? $questionObj->topicPartItem->category->getTitleAttribute() : '-'}}</span></li>
                                                                        <li>Subject: <span>{{isset($questionObj->course->id)? $questionObj->course->getTitleAttribute() : ''}}</span></li>
                                                                        <li>Chapter: <span>{{isset($questionObj->topicPartItem->id)? $questionObj->topicPartItem->chapter->getTitleAttribute() : ''}}</span></li>
                                                                        <li>Part Item: <span>{{isset($questionObj->topicPartItem->id)? $questionObj->topicPartItem->title : ''}}</span></li>
                                                                        <li>Status: <span class="question_status_label question_status_{{$questionObj->id}}">{{$questionObj->question_status}}</span></li>
                                                                    </ul>
                                                                </div>
                                                                
                                                                <div class="review-question-holder">
                                                                    <div class="question-right-header">
                                                                        <h3>Question Review</h3>
                                                                    </div>
                                                                    <form action="javascript:;" method="POST" class="row approve_question_form">
                                                                        <input type="hidden" name="question_id" value="{{$questionObj->id}}">
                                                                        <div class="col-12 col-lg-12">
                                                                            <div class="row">
                                                                                <div class="col-12 col-md-12">
                                                                                    <div class="form-group">

                                                                                        <div class="btn-group btn-group-toggle d-block mt-2" data-toggle="buttons" id="actionButtons">
                                                                                            <label class="btn btn-success active">
                                                                                                <input type="radio" name="question_status" value="Published" autocomplete="off" checked> Publish
                                                                                            </label>
                                                                                            <label class="btn btn-warning">
                                                                                                <input type="radio" name="question_status" value="Improvement required" autocomplete="off"> Improvements Required
                                                                                            </label>
                                                                                            <label class="btn btn-danger">
                                                                                                <input type="radio" name="question_status" value="Hard reject" autocomplete="off"> Reject
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-12 col-md-12">
                                                                                    <div class="review-msg-box">
                                                                                        <div class="form-group">
                                                                                            <div class="input-group">
                                                                                                <textarea rows="10" name="review_message" required class="form-control">The content has been reviewed and meets the QA standards. It is now approved for publishing.</textarea>
                                                                                                <div class="review-msg-control">
                                                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>


                                                                            <div class="row questions_logs_block">
                                                                                <h4>Question Logs</h4>
                                                                                @if($questionLogs->count() > 0)
                                                                                    <ul class="lms-card-timeline">

                                                                                        @if( !empty( $questionLogs ))
                                                                                            @foreach($questionLogs as $logObj)
                                                                                                <li>
                                                                                                    <div class="card">
                                                                                                        <div class="card-body">
                                                                                                            <div class="media">
                                                                                                                <img src="{{url('/').$logObj->user->getAvatar(40)}}" width="40" class="mr-2 rounded-circle" alt="User">
                                                                                                                <div class="media-body">
                                                                                                                    <div class="d-flex justify-content-between align-items-center lms-card-info">
                                                                                                                        <h5 class="mt-0 mb-1">
                                                                                                                            {{$logObj->user->get_full_name()}}
                                                                                                                            <small class="text-muted">{{ dateTimeFormat($logObj->action_at, 'j M y | H:i') }}</small>
                                                                                                                        </h5>
                                                                                                                        <div class="log_details">
                                                                                                                            <span class="badge mb-2">{{$logObj->action_type}}</span>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <p class="mb-0">
                                                                                                                {!! $logObj->log_data !!}
                                                                                                            </p>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </li>

                                                                                            @endforeach
                                                                                        @endif
                                                                                    </ul>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                        </div>

                                                        <div class="modal fade review_submit approve_modal_box" id="approve_modal_{{$questionObj->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h3>Question Review</h3>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                    </div>

                                                                    <div class="modal-body">

                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>

                                                @endforeach
                                            @endif
                                        <div class="show-notifications" data-show_message="yes"></div>
                                        <div id="scroll-controls" class="page-prev-next-controls">
                                            <div class="controls-inner">
                                                <!-- Top State: Scroll Down Button -->
                                                <button id="btn-top" class="scroll-btn pill hidden">
                                                    Scroll down <i class="arrow down"></i>
                                                </button>

                                                <!-- Middle State: Two Circular Buttons -->
                                                <!-- <div id="group-middle" class="middle-group hidden">
                                                    <button id="btn-mid-up" class="scroll-btn circle">
                                                        <i class="arrow up"></i>
                                                    </button>
                                                    <button id="btn-mid-down" class="scroll-btn circle">
                                                        <i class="arrow down"></i>
                                                    </button>
                                                </div> -->

                                                <!-- Bottom State: Scroll Up Button -->
                                                <button id="btn-bottom" class="scroll-btn pill hidden">
                                                    Scroll up <i class="arrow up"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="prev-next-controls text-center mb-50 questions-nav-controls disable-div">
                                            <a href="javascript:;" data-toggle="modal" class="review-btn rurera-hide1" data-target="#review_submit">
                                                Finish
                                                <img src="/assets/default/svgs/review-btn-flag.svg" width="683" height="683" alt="review-btn-flag">
                                            </a>
                                            <a href="javascript:;" id="prev-btn" class="rurera-hide1 prev-btn">
                                                prev
                                                <img src="/assets/default/svgs/next-btn.svg" width="683" height="683" alt="next-btn">
                                            </a>
                                            <a href="javascript:;" id="next-btn" class="rurera-hide1 next-btn">
                                                Next
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
                        <div class="question-area-temp hide"></div>
                    </div>
                </div>
            </div>
        </section>
</div>


@endsection

@push('scripts_bottom')
<script src="/assets/default/js/sortable.js"></script>
<script src="/assets/default/vendors/video/video.min.js"></script>
<script src="/assets/default/vendors/jquery.simple.timer/jquery.simple.timer.js"></script>
<script src="/assets/default/js/parts/quiz-start.min.js?var={{$rand_id}}"></script>
<script src="/assets/admin/js/custom.js?ver={{$rand_id}}"></script>


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="/assets/admin/vendor/bootstrap/bootstrap.min.js"></script>

<script>
$(document).on('keyup', 'body', function (evt) {
    if (evt.key === 'ArrowLeft') {
        if( $('.rurera-question-block.active').prev('.rurera-question-block').length > 0){
            $(".question-area-block").find('.show-notifications').html('');
            $('.rurera-question-block.active').removeClass('active').prev().addClass('active');
        }
    }
    if (evt.key === 'ArrowRight') {
        if( $('.rurera-question-block.active').next('.rurera-question-block').length > 0){
        $(".question-area-block").find('.show-notifications').html('');
        $('.rurera-question-block.active').removeClass('active').next().addClass('active');
    }
    }
});

$(document).on('click', '.next-btn', function (e) {
    if( $('.rurera-question-block.active').next('.rurera-question-block').length > 0){
        $(".question-area-block").find('.show-notifications').html('');
        $('.rurera-question-block.active').removeClass('active').next().addClass('active');
    }
});
$(document).on('click', '.prev-btn', function (e) {
    if( $('.rurera-question-block.active').prev('.rurera-question-block').length > 0){
        $(".question-area-block").find('.show-notifications').html('');
        $('.rurera-question-block.active').removeClass('active').prev().addClass('active');
    }
});
//
$(document).on('submit', '.approve_question_form', function (evt) {

    var thisObj = $('.approve_question_form');
    var thisParentObj = $('.rurera-question-block.active');
    //rurera_loader(thisObj, 'div');
    var formData = new FormData($(this)[0]);
    $.ajax({
        type: 'POST',
        url: '/admin/questions_bank/approve_question',
        data: formData,
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData: false,
        contentType: false,
        success: function (response) {
            //rurera_remove_loader(thisObj, 'div');
            //$(".approve_modal_box").modal('hide');
            thisParentObj.find(".questions_logs_block").html(response.logs_response);
            var question_id = response.question_id;
            $(".question_status_"+question_id).html(response.question_status);
        }
    });
});

$(document).on('submit', '.reject_question_form-----', function (evt) {
    console.log('sdfsdf');


    var thisObj = $(this);
    rurera_loader(thisObj, 'div');
    var formData = new FormData($(this)[0]);
    $.ajax({
        type: 'POST',
        url: '/admin/questions_bank/reject_question',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData: false,
        contentType: false,
        success: function (response) {
            //rurera_remove_loader(thisObj, 'div');
            $(".reject_modal_box").modal('hide');
            rurera_modal_alert(
                'success',
                response,
                false, //confirmButton
            );
        }
    });
});

$(document).on('change', 'input[name="question_status"]', function (evt) {
    var current_value = $(this).val(); // ✅ Get the selected value correctly
    var thisParent = $(this).closest('.approve_question_form');

    if (current_value === 'Improvement required') {
        thisParent.find('textarea[name="review_message"]').val(
            'The overall work is acceptable but needs minor revisions for better clarity and presentation. Please address the highlighted areas before approval.'
        );
    }

    if (current_value === 'Published') {
        thisParent.find('textarea[name="review_message"]').val(
            'The content has been reviewed and meets the QA standards. It is now approved for publishing.'
        );
    }

    if (current_value === 'Hard reject') {
        thisParent.find('textarea[name="review_message"]').val(
            'The submission does not meet the required standards. Please review all feedback carefully and make necessary corrections before resubmitting.'
        );
    }
});

</script>
<script>
    var container = document.querySelector('.question-area-block');
    var btnTop = document.getElementById('btn-top');
    var btnBottom = document.getElementById('btn-bottom');

    function updateScrollState() {
        var contentHeight = container.scrollHeight;
        var containerHeight = container.clientHeight;
        var scrollTop = container.scrollTop;

        // No scroll needed
        if (contentHeight <= containerHeight + 5) {
            btnTop.classList.add('hidden');
            btnBottom.classList.add('hidden');
            return;
        }

        // At bottom → show UP
        if (scrollTop + containerHeight >= contentHeight - 5) {
            btnTop.classList.add('hidden');
            btnBottom.classList.remove('hidden');
        }
        // Else → show DOWN
        else {
            btnTop.classList.remove('hidden');
            btnBottom.classList.add('hidden');
        }
    }

    /* 🔼 FULL scroll to top */
    function scrollUp() {
        container.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    /* 🔽 FULL scroll to bottom */
    function scrollDown() {
        container.scrollTo({
            top: container.scrollHeight,
            behavior: 'smooth'
        });
    }

    btnTop.addEventListener('click', scrollDown);
    btnBottom.addEventListener('click', scrollUp);

    container.addEventListener('scroll', updateScrollState);
    window.addEventListener('resize', updateScrollState);

    updateScrollState();


</script>
<script>
    function wrapRawLatex() {
        console.log('wrapRawLatex');

        const mathLikePattern = /([a-zA-Z0-9]\s*[\^_=+\-\/]\s*[a-zA-Z0-9{])/;

        // 1️⃣ Normal text nodes
        document.querySelectorAll('*:not(script):not(style)').forEach(el => {
            if (el.children.length > 0) return;

            let text = el.textContent?.trim();
            if (!text) return;

            // Skip already wrapped math
            if (text.includes('$$') || text.includes('\\(') || text.includes('\\[')) return;

            // Detect LaTeX OR math-like expressions
            if (text.includes('\\') || mathLikePattern.test(text)) {
                el.innerHTML = `$$${text}$$`;
            }
        });

        // 2️⃣ .math-equation spans
        document.querySelectorAll('.math-equation').forEach(el => {
            if (el.dataset.converted) return;

            let latex = el.getAttribute('data-equation') || el.textContent?.trim();
            if (!latex) return;

            el.innerHTML = `$$${latex}$$`;
            el.dataset.converted = 'true';
        });

        // 3️⃣ Render with MathJax
        if (window.MathJax?.typesetPromise) {
            MathJax.typesetClear();
            MathJax.typesetPromise().catch(err =>
                console.error('MathJax error:', err)
            );
        }
    }

    document.addEventListener('DOMContentLoaded', wrapRawLatex);
</script>
<script>
    function toggleSidebar() {
        const sidebar = document.querySelector('.question-right-side');
        const mainContent = document.querySelector('.preview-question-area');

        sidebar.classList.toggle('hidden');

        if (sidebar.classList.contains('hidden')) {
            mainContent.classList.add('centered');
        } else {
            mainContent.classList.remove('centered');
        }
    }
</script>
@endpush
