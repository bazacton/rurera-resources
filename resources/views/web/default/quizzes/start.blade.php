@extends('web.default.layouts.appstart',['appFooter' => false, 'appHeader' => false])
@php
$rand_id = rand(99,9999);
$learning_journey = (isset( $learning_journey ) && $learning_journey == 'yes')? 'yes' : 'no';
$test_type = isset( $test_type )? $test_type : '';
$question_ids = isset( $question_ids )? $question_ids : array();
$is_new = isset( $is_new )? $is_new : 'no';
$started_already = isset($started_already)? $started_already : false;
@endphp

@section('content')

<div class="learning-page type-{{$quiz->quiz_type}} type-sats" >


    <div class="d-flex position-relative">


        <div class="learning-page-content flex-grow-1 bg-info-light p-15">
            <div class="default-loaded-data rurera-hide" data-is_started_already="{{isset( $resultObj->id)? 'yes' : 'no' }}"></div>
            <div class="learning-content read-quiz-content {{isset( $resultObj->id)? 'rurera-hide' : '' }}" id="learningPageContent">

                @php $content_class = ''; @endphp
                @if( $quiz->quiz_type == 'vocabulary' || $quiz->quiz_type == 'practice')
                @php $content_class = 'hide'; @endphp
                @endif

                <section class="quiz-topbar start-landing-page {{$content_class}}">
                <div class="container-fluid">
                    <div class="row">


                        <div class="col-lg-5 col-md-6 col-sm-12">
                            @if( isset( $quiz->quiz_type ))
                                <img class="quiz-type-icon" src="/assets/default/img/assignment-logo/{{$quiz->quiz_type}}.png">
                            @endif
                            <div class="quiz-top-info"><p>{{$quiz->getTitleAttribute()}}</p>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12">

                            <div class="topbar-right">
                                <div class="quiz-timer">

								@php
								$remaining_time = 0;
									if(isset( $resultObj->total_time_consumed)){
										$remaining_time = ($quiz->time*60)-$resultObj->total_time_consumed;

									}
								@endphp

                                    <span class="timer-number"><div class="quiz-timer-counter {{isset( $timer_hide )? $timer_hide : ''}}" data-time_counter="{{isset( $timer_counter )? $timer_counter : ''}}">{{getTimeWithText($remaining_time, true, true)}}</div></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
                <div class="row justify-content-center h-100">
                <div class="d-flex align-items-center justify-content-center w-100">
                    @php $content_class = ''; @endphp
                    @if( $quiz->quiz_type == 'vocabulary' || $quiz->quiz_type == 'practice')
                    @php $content_class = 'hide1'; @endphp
                        <div class="start-counter"></div>
                    @endif


                    <div class="learning-content-box learning-start-box {{$content_class}} d-flex align-items-center justify-content-center flex-column p-15 p-lg-30 rounded-lg">

                        @if(isset($instruction_layout))
                            {!! $instruction_layout !!}
                        @endif
                        <div class="container rurera-hide">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    @if( isset( $quiz->quiz_instructions ) && $quiz->quiz_instructions != '')
                                        <div class="instruction-text">
                                            <h3>INSTRUCTIONS</h3>
                                            {!! $quiz->quiz_instructions !!}
                                        </div>
                                    @endif
                                    <a href="javascript:;" >{{isset( $button_label)? $button_label : 'Start Test'}} <img src="/assets/default/svgs/clock.svg" alt="clock"></a>
                                    <div class="instruction-text rurera-hide">
                                        <h3>INSTRUCTIONS</h3>
                                        <h4>Setting Up Your Page</h4>
                                        <p>Before you start the test you can use the buttons on the top right of the screen to choose:</p>
                                        <ul>
                                            <li>a coloured overlay (this will change the background colour and may help you read the questions better)</li>
                                        </ul>
                                        <img src="/assets/default/img/overlay.png" alt="#">
                                        <ul>
                                            <li>the font size</li>
                                        </ul>
                                        <img src="/assets/default/img/font-size.png">
                                        <p>We recommend you setup your page BEFORE the test starts.</p>
                                        <p>Changing these features during the test will reduce the amount of time you have to answer the questions.</p>
                                        <hr style="border-color:rgba(130, 80, 232, 0.15)">
                                        <h4>Navigating The Test</h4>
                                        <p>Read the instructions for each question carefully.</p>
                                        <p>Choose your answer by clicking on it. If you want to change your mind, click on a different answer.</p>
                                        <p>Once you are sure of your answer click ‘Submit Answer’. You will not be able to go back to change your answer.</p>
                                        <img src="/assets/default/img/answer.png" alt="#">
                                        <p>You can use a pen/pencil and paper to make notes if you wish. Your working and notes will not be marked.</p>
                                        <hr style="border-color:rgba(130, 80, 232, 0.15)">
                                        <h4>About The Test</h4>
                                        <p>The Verbal Reasoning Test assesses a range of English language skills including:</p>
                                        <ul>
                                            <li>Comprehension</li>
                                            <li>Reasoning</li>
                                            <li>Logic</li>
                                        </ul>
                                        <p>The questions you see in this Walkthrough are examples of these types.</p>
                                        <p>Some of these types may appear in the test, while others may not.</p>
                                    </div>
                                    <div class="learning-content-quiz"></div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="learning-content-box-icon">
                                        <img src="/assets/default/img/learning/quiz.svg" alt="downloadable icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if( !empty( $resultData ) && !empty((array) $resultData)  )

                <section class="lms-data-table {{$content_class}} my-80">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h3>Summary of your previous attempts</h3>
                                <table class="table table-striped table-bordered dataTable display responsive" style="width: 100%;"
                                       aria-describedby="example_info">
                                    <thead>
                                    <tr>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Date: activate to sort column descending">Attempt #
                                        </th>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Date: activate to sort column descending">Date
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                            aria-label="Time: activate to sort column ascending">Time
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                            aria-label="Questions: activate to sort column ascending">Questions
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                            aria-label="Correct: activate to sort column ascending">Correct
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                            aria-label="Incorrect: activate to sort column ascending">Incorrect
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                            aria-label="Unanswered: activate to sort column ascending">Unanswered
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                            aria-label="Percent: activate to sort column ascending">Accuracy
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                            aria-label="Quiz: activate to sort column ascending">Quiz Status
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $attempt_count = 1; @endphp
                                    @foreach( $resultData as $resultObj)

                                    <tr class="odd">
                                        <td>{{$attempt_count}}</td>
                                        <td>{{ dateTimeFormat($resultObj->created_at, 'j M Y H:iA') }}</td>
                                        <td>{{ ($resultObj->status == 'waiting')? '-' : $resultObj->time_consumed .'/'. $resultObj->average_time }} </td>
                                        <td>{{$resultObj->attempted}} / {{$resultObj->total_questions}}</td>
                                        <td>{{ ($resultObj->status == 'waiting')? '-' : $resultObj->correct }} </td>
                                        <td>{{ ($resultObj->status == 'waiting')? '-' : $resultObj->incorrect }} </td>
                                        <td>{{ ($resultObj->status == 'waiting')? '-' : $resultObj->unanswered }} </td>
                                        <td>{{ ($resultObj->status == 'waiting')? '-' : $resultObj->percentage.'%'}} </td>
                                        @if( $resultObj->status == 'waiting')
                                            <td><a href="javascript:;" data-id="{{$quiz->id}}" class="quiz-start-btn" data-quiz_url="/panel/quizzes/{{$quiz->id}}/start">Resume</a></td>
                                        @else
                                        <td><a href="/panel/quizzes/{{$resultObj->result_id}}/check_answers">Check Answers</a></td>
                                        @endif

                                    </tr>
                                    @php $attempt_count++; @endphp
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                @endif
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
@endsection

@push('scripts_bottom')
<script src="/assets/admin/vendor/bootstrap/popper.min.js"></script>
<script src="/assets/admin/vendor/bootstrap/bootstrap.min.js"></script>


<script src="/assets/default/js/question-layout.js?var={{$rand_id}}"></script>
<script src="/assets/learning_page/scripts.min.js?var={{$rand_id}}"></script>

<script>
    //init_question_functions();

    var show_timer_check_parent = false;
    var practice_with_review_check_parent = false;
    var question_pagination_check_parent = false;
    var sound_check_parent = false;


    $(document).on('change', '.show-timer-check-1', function () {
        show_timer_check_parent = this.checked;
    });

    $(document).on('change', '.show-pagination-check-1', function () {
        question_pagination_check_parent = this.checked;
    });

    $(document).on('change', '.practice-with-review-check-1', function () {
        practice_with_review_check_parent = this.checked;
    });

    $(document).on('change', '.play-sounds-check-1', function () {
        sound_check_parent = this.checked;
    });

    $(".show-timer-check-1").change();
    $(".show-pagination-check-1").change();
    $(".practice-with-review-check-1").change();
    $(".play-sounds-check-1").change();


    $(document).on('click', '.quiz-start-btn', function (evt) {
        if(show_timer_check_parent == true){
            $('.show-timer-check').prop('checked', true);
        }
        if(question_pagination_check_parent == true){
            $('.show-pagination-check').prop('checked', true);
        }
        if(practice_with_review_check_parent == true){
            $('.practice-with-review-check').prop('checked', true);
        }
        if(sound_check_parent == true){
            $('.play-sounds-check').prop('checked', true);
        }
        $('.show-timer-check').change();
        $('.show-pagination-check').change();
        $('.practice-with-review-check').change();
        $('.play-sounds-check').change();
    });

    $(document).ready(function () {

        var messages = [
            "Hold tight, we’re setting up the perfect questions for you.",
            "Calibrating your brainpower, please wait.",
            "Selecting questions based on your difficulty level.",
            "Get ready, your challenge is being prepared.",
            "Warming up the questions, stretch those neurons.",
            "Almost there, lining up questions to test your knowledge.",
            "Take a deep breath, quiz mode is about to begin.",
            "No random questions here, everything is tailored for you.",
            "Loading smart questions, stay focused.",
            "Ready up, your brain workout starts soon.",
            "Sharpening the questions, hope your mind is sharp too.",
            "Difficulty set, confidence recommended.",
            "Preparing questions that are tricky but fair.",
            "Focus mode on, quiz starting shortly.",
            "Pull yourself together, knowledge is about to be tested."
        ];

        function shuffle(array) {
            for (let i = array.length - 1; i > 0; i--) {
                let j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
            return array;
        }

        messages = shuffle(messages);

        var index = 0;
        var typingSpeed = 20;
        var delayBetweenMessages = 2000;
        var timeoutRef = null;   // store timeout reference
        var stopped = false;    // stop flag

        function typeMessage(text, element, callback) {
            let i = 0;
            element.text("");

            let interval = setInterval(function () {
                element.append(text.charAt(i));
                i++;

                if (i === text.length) {
                    clearInterval(interval);
                    if (callback) callback();
                }
            }, typingSpeed);
        }

        function showNextMessage() {

            // STOP CHECK (this works)
            if ($(".practice-start-block").attr('data-quiz_loaded') === 'yes') {
                var Startintervals = setInterval(function () {
                    console.log('inner interval');
                    clearInterval(Startintervals);
                    stopped = true;
                    clearTimeout(timeoutRef);
                    $(".practice-start-block").addClass('rurera-hide');
                    $(".start-practice-btn").removeClass('rurera-hide');
                    return;
                }, 5000);
            }

            if (index >= messages.length) {
                index = 0;
                messages = shuffle(messages);
            }

            var message_str = messages[index];

            typeMessage(message_str, $(".practice-start-block span"), function () {
                index++;
                timeoutRef = setTimeout(showNextMessage, delayBetweenMessages);
            });
        }

        showNextMessage();
    });


    /*if( "{{$quiz->quiz_type}}" == 'vocabulary' || "{{$quiz->quiz_type}}" == 'practice') {
        var start_counter = 6;

        var Startintervals = setInterval(function () {
            if (parseInt(start_counter) > 1) {
                start_counter = parseInt(start_counter) - parseInt(1);
                $(".start-counter").html(start_counter);
            } else {
                $(".start-counter").remove();
                clearInterval(Startintervals);
                //$(".quiz-start-btn").click();
                //$(".learning-content-box").removeClass('hide')
            }
        }, 1000);
    }*/
</script>
<script>
var btnDown = null;
var btnUp   = null;
var container = null;
var initialized = false;

/* Get elements safely */
function getButtons() {
    btnDown = document.getElementById('btn-top');
    btnUp   = document.getElementById('btn-bottom');
    return btnDown && btnUp;
}

function getContainer() {
    return document.querySelector('.quiz-area-page .lms-quiz-section .questions-data-block');
}

function isScrollable(el) {
    return el && el.scrollHeight > el.clientHeight + 5;
}

function updateButtons() {
    if (!container || !isScrollable(container)) {
        btnDown?.classList.add('btn-hidden');
        btnUp?.classList.add('btn-hidden');
        return;
    }

    var top = container.scrollTop;
    var max = container.scrollHeight - container.clientHeight;

    if (top <= 0) {
        btnUp.classList.add('btn-hidden');
        btnDown.classList.remove('btn-hidden');
    } else if (top >= max - 5) {
        btnDown.classList.add('btn-hidden');
        btnUp.classList.remove('btn-hidden');
    } else {
        btnDown.classList.remove('btn-hidden');
        btnUp.classList.add('btn-hidden');
    }
}

function attachScroll() {
    if (initialized) return;

    if (!getButtons()) return;

    var el = getContainer();
    if (!el) return;

    container = el;
    initialized = true;

    container.addEventListener('scroll', updateButtons);

    btnDown.addEventListener('click', () =>
        container.scrollTo({ top: container.scrollHeight, behavior: 'smooth' })
    );

    btnUp.addEventListener('click', () =>
        container.scrollTo({ top: 0, behavior: 'smooth' })
    );

    updateButtons();
}

/* Detect Start Practice */
document.addEventListener('click', function (e) {
    if (e.target.closest('.quiz-start-btn')) {
        initialized = false;

        let wait = setInterval(() => {
            if (getButtons() && getContainer()) {
                clearInterval(wait);
                attachScroll();
            }
        }, 100);
    }
});

/* Resize safety */
window.addEventListener('resize', updateButtons);
</script>
<script>
$(document).ready(function () {

    // Run when Start Practice button is clicked
    $(document).on('click', '.quiz-start-btn', function () {

        // Wait until quiz content is fully loaded/rendered
        setTimeout(function () {
            quizPageCallback();
        }, 300); // increase to 500 if needed
    });

});


/**
 * CALLBACK FUNCTION
 * Runs only after quiz page is loaded
 */
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

$(document).on('click', '.load-more-questions', function (evt) {

    var thisObj = $('.question-area');
    var quiz_result_id = $(this).closest('.question-area-block').attr('data-quiz_result_id');
    var result_attempt_id = $(this).closest('.question-area-block').attr('data-result_attempt_id');
    var total_questions = thisObj.attr('data-total_questions');
    total_questions = parseInt(total_questions);
    console.log(total_questions);

    $.ajax({
        type: "GET",
        url: '/get_practice_more_questions',
        dataType: 'json',
        data: {'quiz_result_id': quiz_result_id, 'result_attempt_id': result_attempt_id, 'total_questions': total_questions},
        success: function (return_data) {

            if(return_data.total_new_questions > 0){
                $('.question-inner-step-area .questions-lists-block').append(return_data.question_response_layout);
                var total_no_of_questions = $(".total-no-of-questions").html();
                total_no_of_questions = parseInt(total_no_of_questions)+return_data.total_new_questions;
                $(".total-no-of-questions").html(total_no_of_questions);
                thisObj.attr('data-total_questions', total_no_of_questions);
            }
            console.log(return_data);
        }
    });

});
</script>

@endpush
