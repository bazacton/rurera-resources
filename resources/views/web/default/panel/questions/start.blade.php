@php namespace App\Http\Controllers\Web; @endphp
@extends(getTemplate().'.layouts.appstart')
@php
$i = 0; $j = 1;
$rand_id = rand(99,9999);

@endphp

@push('styles_top')
<link rel="stylesheet" href="/assets/default/vendors/video/video-js.min.css">
@endpush

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/assets/default/css/responsive.css?ver={{$rand_id}}">

@section('content')


<div class="learning-page type-practice type-sats">
	<section class="lms-quiz-section">
        <div class="container questions-data-block read-quiz-content" data-total_questions="0">
            <div class="justify-content-center">
                <div class="col-lg-9 col-md-12 col-sm-12 mt-80 mx-auto">
					<div class="quiz-status-bar">
						<div class="quiz-questions-bar-holder">
							<div class="quiz-questions-bar pl-0">
								<span class="value-lable" data-title="Target" style="left:80%"><span>80%</span></span>
								<span class="bar-fill" title="0%" style="width: 0%;"></span>
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
					</div>
					<div class="question-area-block" data-active_question_id="0" data-questions_layout="">
						<div class="question-area dis-arrows1" data-total_questions="4">
							<div class="question-step question-step-10180" data-elapsed="318" data-qattempt="4821" data-start_time="0" data-qresult="142478" data-quiz_result_id="2821">
								<div class="question-layout-block">
									<form class="question-fields" action="javascript:;" data-question_id="10180">
										<div class="left-content has-bg">
											<span class="questions-total-holder d-block mb-10"><span class="question-dev-details">({{$question->id}}) ({{ $question->question_difficulty_level }}) ({{ $question->question_type }})</span></span>
											<span class="question-number-holder" style="z-index: 999999999;"> <span class="question-number">1</span></span>
												
											<div id="rureraform-form-1" class=" rureraform-form rureraform-elements rureraform-form-input-medium rureraform-form-icon-inside rureraform-form-description-bottom ui-sortable" _data-parent="1" _data-parent-col="0" style="display: block;">
												<div class="question-layout row d-flex align-items-start">
												@php $question_layout = $QuestionsAttemptController->get_question_layout($question); @endphp
													{!! $question_layout !!}
												</div>
											</div>
											<div class="show-notifications" data-show_message="yes"></div>

											<div class="prev-next-controls text-center mb-50 questions-nav-controls disabled-div">
												<a href="javascript:;" data-toggle="modal" class="review-btn rurera-hide1" data-target="#review_submit">
													Finish
													<img src="/assets/default/svgs/review-btn-flag.svg" width="683" height="683" alt="review-btn-flag">
												</a>
												<a href="javascript:;" id="question-submit-btn" class="question-submit-btn">
													mark answer
												</a>
											</div>
										</div>
									</form>
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


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

@endpush
