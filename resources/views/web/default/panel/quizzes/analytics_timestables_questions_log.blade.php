@php namespace App\Http\Controllers\Web; @endphp
@extends(getTemplate() .'.panel.layouts.panel_layout')
@php
    $i = 0; $j = 1;
    $rand_id = rand(99,9999);

@endphp

@push('styles_top')
    <link rel="stylesheet" href="/assets/default/css/quiz-common.css">

    <style>
        .field-holder.correct, .form-field.correct, .form-field.correct label {
            background: #d7fbdf !important;
            color: #333;
            border-color: #5ace75;
        }
        .field-holder.wrong, .form-field.wrong, .form-field.wrong label {
            background: #fae3e5 !important;
            color: #333;
            border-color: #f97d89;
        }
    </style>
@endpush


@section('content')

    <div class="section-title mb-15">
        <h2 class="font-22 mb-0">Skill Summary</h2>
    </div>


    <div class="card mb-30">

        <div class="card-header  mb-0 font-14 border-top-0 collapsed" role="button" data-toggle="collapse" data-target="#attempt_questions_1" aria-expanded="false" aria-controls="attempt_questions_5642">

            <span>Attempt 1 </span>

            <span class="analytics-timespend">
                <span>Thu, 02 Apr 26 - 14s</span>
            </span>
            <span class="analytics-cions-earned">
                <span>&nbsp;</span>
            </span>
        </div>




        <div id="attempt_questions_1" class="collapse" data-parent="#analyticsAccordion" style="">

            <div class="card-header  mb-0 font-14 border-top-0 collapsed" role="button" data-toggle="collapse" data-target="#attempt_questions_15_sum" aria-expanded="false" aria-controls="attempt_questions_5642">

                <span>Table 5 </span>

                <span class="analytics-timespend">
                <span>Questions: 5 | Correct: 4 | Incorrect: 1</span>
            </span>
                <span class="analytics-cions-earned">
                <span>&nbsp;</span>
            </span>
            </div>
            <div id="attempt_questions_15_sum" class="collapse" data-parent="#analyticsAccordion" style="">
                <div class="card-body pb-20">

                    <div class="question-result-layout-holder">

                        <div class="question-result-layout question-status-correct mb-10">
                            <div class="status-badge font-14">
                                <i>✓</i>
                                <span class="time-text">33s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 10 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="question-result-layout question-status-incorrect mb-10">
                            <div class="status-badge font-14">
                                <i>×</i>
                                <span class="time-text">04s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 9 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Red Redington answered:</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="question-result-layout question-status-correct mb-10">
                            <div class="status-badge font-14">
                                <i>✓</i>
                                <span class="time-text">12s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 8 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="question-result-layout question-status-correct mb-10">
                            <div class="status-badge font-14">
                                <i>✓</i>
                                <span class="time-text">12s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 7 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="question-result-layout question-status-incorrect mb-10">
                            <div class="status-badge font-14">
                                <i>×</i>
                                <span class="time-text">04s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 6 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Red Redington answered:</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="question-result-layout question-status-correct mb-10">
                            <div class="status-badge font-14">
                                <i>✓</i>
                                <span class="time-text">14s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 5 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="question-result-layout question-status-correct mb-10">
                            <div class="status-badge font-14">
                                <i>✓</i>
                                <span class="time-text">15s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 4 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="question-result-layout question-status-correct mb-10">
                            <div class="status-badge font-14">
                                <i>✓</i>
                                <span class="time-text">23s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 3 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="question-result-layout question-status-incorrect mb-10">
                            <div class="status-badge font-14">
                                <i>×</i>
                                <span class="time-text">09s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 2 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Red Redington answered:</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="question-result-layout question-status-correct mb-10">
                            <div class="status-badge font-14">
                                <i>✓</i>
                                <span class="time-text">14s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 1 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card-header  mb-0 font-14 border-top-0 collapsed" role="button" data-toggle="collapse" data-target="#attempt_questions_12_sum" aria-expanded="false" aria-controls="attempt_questions_5642">

                <span>Table 2 </span>

                <span class="analytics-timespend">
                <span>Questions: 2 | Correct: 1 | Incorrect: 1</span>
            </span>
                <span class="analytics-cions-earned">
                <span>&nbsp;</span>
            </span>
            </div>
            <div id="attempt_questions_12_sum" class="collapse" data-parent="#analyticsAccordion" style="">
                <div class="card-body pb-20">

                    <div class="question-result-layout-holder">

                        <div class="question-result-layout question-status-correct mb-10">
                            <div class="status-badge font-14">
                                <i>✓</i>
                                <span class="time-text">33s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 10 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="question-result-layout question-status-incorrect mb-10">
                            <div class="status-badge font-14">
                                <i>×</i>
                                <span class="time-text">04s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 9 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Red Redington answered:</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="question-result-layout question-status-correct mb-10">
                            <div class="status-badge font-14">
                                <i>✓</i>
                                <span class="time-text">12s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 8 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="question-result-layout question-status-correct mb-10">
                            <div class="status-badge font-14">
                                <i>✓</i>
                                <span class="time-text">12s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 7 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="question-result-layout question-status-incorrect mb-10">
                            <div class="status-badge font-14">
                                <i>×</i>
                                <span class="time-text">04s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 6 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Red Redington answered:</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="question-result-layout question-status-correct mb-10">
                            <div class="status-badge font-14">
                                <i>✓</i>
                                <span class="time-text">14s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 5 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="question-result-layout question-status-correct mb-10">
                            <div class="status-badge font-14">
                                <i>✓</i>
                                <span class="time-text">15s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 4 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="question-result-layout question-status-correct mb-10">
                            <div class="status-badge font-14">
                                <i>✓</i>
                                <span class="time-text">23s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 3 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="question-result-layout question-status-incorrect mb-10">
                            <div class="status-badge font-14">
                                <i>×</i>
                                <span class="time-text">09s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 2 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Red Redington answered:</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="question-result-layout question-status-correct mb-10">
                            <div class="status-badge font-14">
                                <i>✓</i>
                                <span class="time-text">14s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 1 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="card-header  mb-0 font-14 border-top-0 collapsed" role="button" data-toggle="collapse" data-target="#attempt_questions_5642" aria-expanded="false" aria-controls="attempt_questions_5642">

            <span>Attempt 2 </span>

            <span class="analytics-timespend">
                <span>Thu, 02 Apr 26 - 14s</span>
            </span>
            <span class="analytics-cions-earned">
                <span>&nbsp;</span>
            </span>
        </div>




        <div id="attempt_questions_5642" class="collapse" data-parent="#analyticsAccordion" style="">

            <div class="card-header  mb-0 font-14 border-top-0 collapsed" role="button" data-toggle="collapse" data-target="#attempt_questions_5_sum" aria-expanded="false" aria-controls="attempt_questions_5642">

                <span>Table 5 </span>

                <span class="analytics-timespend">
                <span>Questions: 5 | Correct: 4 | Incorrect: 1</span>
            </span>
                <span class="analytics-cions-earned">
                <span>&nbsp;</span>
            </span>
            </div>
            <div id="attempt_questions_5_sum" class="collapse" data-parent="#analyticsAccordion" style="">
                <div class="card-body pb-20">

                    <div class="question-result-layout-holder">

                        <div class="question-result-layout question-status-correct mb-10">
                            <div class="status-badge font-14">
                                <i>✓</i>
                                <span class="time-text">33s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 10 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="question-result-layout question-status-incorrect mb-10">
                            <div class="status-badge font-14">
                                <i>×</i>
                                <span class="time-text">04s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 9 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Red Redington answered:</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="question-result-layout question-status-correct mb-10">
                            <div class="status-badge font-14">
                                <i>✓</i>
                                <span class="time-text">12s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 8 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="question-result-layout question-status-correct mb-10">
                            <div class="status-badge font-14">
                                <i>✓</i>
                                <span class="time-text">12s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 7 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="question-result-layout question-status-incorrect mb-10">
                            <div class="status-badge font-14">
                                <i>×</i>
                                <span class="time-text">04s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 6 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Red Redington answered:</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="question-result-layout question-status-correct mb-10">
                            <div class="status-badge font-14">
                                <i>✓</i>
                                <span class="time-text">14s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 5 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="question-result-layout question-status-correct mb-10">
                            <div class="status-badge font-14">
                                <i>✓</i>
                                <span class="time-text">15s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 4 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="question-result-layout question-status-correct mb-10">
                            <div class="status-badge font-14">
                                <i>✓</i>
                                <span class="time-text">23s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 3 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="question-result-layout question-status-incorrect mb-10">
                            <div class="status-badge font-14">
                                <i>×</i>
                                <span class="time-text">09s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 2 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Red Redington answered:</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="question-result-layout question-status-correct mb-10">
                            <div class="status-badge font-14">
                                <i>✓</i>
                                <span class="time-text">14s</span>
                            </div>
                            <div class="question-counts mb-10 font-14">
                                <span>Question 1 of 10</span>
                            </div>

                            <div class="question-area">
                                <div class="question-step">
                                    <div class="lms-radio-lists">
                                        <div class="lms-user-answer-block">
                                            <span class="list-title">Correct answer:</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card-header  mb-0 font-14 border-top-0 collapsed" role="button" data-toggle="collapse" data-target="#attempt_questions_56421_sum" aria-expanded="false" aria-controls="attempt_questions_5642">

                <span>Table 2 </span>

                <span class="analytics-timespend">
                <span>Questions: 2 | Correct: 1 | Incorrect: 1</span>
            </span>
                <span class="analytics-cions-earned">
                <span>&nbsp;</span>
            </span>
            </div>
            <div id="attempt_questions_56421_sum" class="collapse" data-parent="#analyticsAccordion" style="">
            <div class="card-body pb-20">

                <div class="question-result-layout-holder">

                    <div class="question-result-layout question-status-correct mb-10">
                        <div class="status-badge font-14">
                            <i>✓</i>
                            <span class="time-text">33s</span>
                        </div>
                        <div class="question-counts mb-10 font-14">
                            <span>Question 10 of 10</span>
                        </div>

                        <div class="question-area">
                            <div class="question-step">
                                <div class="lms-radio-lists">
                                    <div class="lms-user-answer-block">
                                        <span class="list-title">Correct answer:</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="question-result-layout question-status-incorrect mb-10">
                        <div class="status-badge font-14">
                            <i>×</i>
                            <span class="time-text">04s</span>
                        </div>
                        <div class="question-counts mb-10 font-14">
                            <span>Question 9 of 10</span>
                        </div>

                        <div class="question-area">
                            <div class="question-step">
                                <div class="lms-radio-lists">
                                    <div class="lms-user-answer-block">
                                        <span class="list-title">Correct answer:</span>
                                    </div>

                                    <div class="lms-user-answer-block">
                                        <span class="list-title">Red Redington answered:</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="question-result-layout question-status-correct mb-10">
                        <div class="status-badge font-14">
                            <i>✓</i>
                            <span class="time-text">12s</span>
                        </div>
                        <div class="question-counts mb-10 font-14">
                            <span>Question 8 of 10</span>
                        </div>

                        <div class="question-area">
                            <div class="question-step">
                                <div class="lms-radio-lists">
                                    <div class="lms-user-answer-block">
                                        <span class="list-title">Correct answer:</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="question-result-layout question-status-correct mb-10">
                        <div class="status-badge font-14">
                            <i>✓</i>
                            <span class="time-text">12s</span>
                        </div>
                        <div class="question-counts mb-10 font-14">
                            <span>Question 7 of 10</span>
                        </div>

                        <div class="question-area">
                            <div class="question-step">
                                <div class="lms-radio-lists">
                                    <div class="lms-user-answer-block">
                                        <span class="list-title">Correct answer:</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="question-result-layout question-status-incorrect mb-10">
                        <div class="status-badge font-14">
                            <i>×</i>
                            <span class="time-text">04s</span>
                        </div>
                        <div class="question-counts mb-10 font-14">
                            <span>Question 6 of 10</span>
                        </div>

                        <div class="question-area">
                            <div class="question-step">
                                <div class="lms-radio-lists">
                                    <div class="lms-user-answer-block">
                                        <span class="list-title">Correct answer:</span>
                                    </div>

                                    <div class="lms-user-answer-block">
                                        <span class="list-title">Red Redington answered:</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="question-result-layout question-status-correct mb-10">
                        <div class="status-badge font-14">
                            <i>✓</i>
                            <span class="time-text">14s</span>
                        </div>
                        <div class="question-counts mb-10 font-14">
                            <span>Question 5 of 10</span>
                        </div>

                        <div class="question-area">
                            <div class="question-step">
                                <div class="lms-radio-lists">
                                    <div class="lms-user-answer-block">
                                        <span class="list-title">Correct answer:</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="question-result-layout question-status-correct mb-10">
                        <div class="status-badge font-14">
                            <i>✓</i>
                            <span class="time-text">15s</span>
                        </div>
                        <div class="question-counts mb-10 font-14">
                            <span>Question 4 of 10</span>
                        </div>

                        <div class="question-area">
                            <div class="question-step">
                                <div class="lms-radio-lists">
                                    <div class="lms-user-answer-block">
                                        <span class="list-title">Correct answer:</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="question-result-layout question-status-correct mb-10">
                        <div class="status-badge font-14">
                            <i>✓</i>
                            <span class="time-text">23s</span>
                        </div>
                        <div class="question-counts mb-10 font-14">
                            <span>Question 3 of 10</span>
                        </div>

                        <div class="question-area">
                            <div class="question-step">
                                <div class="lms-radio-lists">
                                    <div class="lms-user-answer-block">
                                        <span class="list-title">Correct answer:</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="question-result-layout question-status-incorrect mb-10">
                        <div class="status-badge font-14">
                            <i>×</i>
                            <span class="time-text">09s</span>
                        </div>
                        <div class="question-counts mb-10 font-14">
                            <span>Question 2 of 10</span>
                        </div>

                        <div class="question-area">
                            <div class="question-step">
                                <div class="lms-radio-lists">
                                    <div class="lms-user-answer-block">
                                        <span class="list-title">Correct answer:</span>
                                    </div>

                                    <div class="lms-user-answer-block">
                                        <span class="list-title">Red Redington answered:</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="question-result-layout question-status-correct mb-10">
                        <div class="status-badge font-14">
                            <i>✓</i>
                            <span class="time-text">14s</span>
                        </div>
                        <div class="question-counts mb-10 font-14">
                            <span>Question 1 of 10</span>
                        </div>

                        <div class="question-area">
                            <div class="question-step">
                                <div class="lms-radio-lists">
                                    <div class="lms-user-answer-block">
                                        <span class="list-title">Correct answer:</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        </div>


    </div>




    @include('web.default.panel.quizzes.analytics_timestables_questions_log_inner',
    [
    'question'               => $question,
    'attempted_questions_list' => $attempted_questions_list,
    'time_consumed'          => $time_consumed,
    'incorrect_questions' => $incorrect_questions,
    'QuestionsAttemptController' => $QuestionsAttemptController,
    'results_sessions' => $results_sessions,
    'show_topic_performance' => $show_topic_performance,
    'show_graph' => $show_graph,
    'user' => $user,
    ]
    )

@endsection


