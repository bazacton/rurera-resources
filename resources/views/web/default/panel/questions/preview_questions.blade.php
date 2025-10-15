@php namespace App\Http\Controllers\Web; @endphp
@extends(getTemplate().'.layouts.appstart')
@php
$i = 0; $j = 1;
$rand_id = rand(99,9999);

@endphp

@push('styles_top')
<link rel="stylesheet" href="/assets/default/vendors/video/video-js.min.css">
<link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">
@endpush

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

@section('content')
<div class="learning-page type-practice type-sats">
	<section class="learning-content lms-quiz-section">
        <div class="container questions-data-block read-quiz-content" data-total_questions="0">
            <div class="justify-content-center">
                <div class="col-lg-9 col-md-12 col-sm-12 mt-50 mx-auto">
					<div class="quiz-status-bar">
						<div class="quiz-questions-bar-holder">
							<div class="quiz-questions-bar">
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
                        @php $total_questions = 10; @endphp
                        <div class="question-area dis-arrows1" data-total_questions="10">
                            <div class="correct-appriciate" style="display:none"></div>
                            <div class="question-inner-step-area">
                                <div class="question-layout-block">
									<div class="left-content has-bg">
										@php $is_active = ''; $counter = 0; @endphp
										@if($questions->count() > 0)
											@foreach($questions as $questionObj)
												@php $question_layout = $QuestionsAttemptController->get_question_layout($questionObj); $counter++;@endphp

												<div class="rurera-question-block {{($counter == 1)? 'active' : ''}} question-step question-step-{{ $questionObj->id }}" data-elapsed="0"
												data-qattempt="0"
												data-start_time="0" data-qresult="0"
												data-quiz_result_id="0">
												<span class="questions-total-holder d-block mb-15">
													 <span class="question-number-holder question-number" style="z-index: 999999999;"> {{$counter}}</span>
													<span class="question-dev-details">({{$questionObj->id}}) ({{$questionObj->question_difficulty_level}}) ({{$questionObj->question_type}}) ({{$questionObj->topicPartItem->title}})</span>
												</span>
												<div class="question-layout row">
													{!! $question_layout !!}
												</div>

                                                @if(ReviewPermission(auth()->user()->id))
                                                    <div class="question-explaination">
                                                        Explaination: <br>
                                                        {!! $questionObj->question_solve !!}
                                                    </div>

                                                    <br>
                                                    <a href="javascript:;" id="approve-btn" class="question-approve-btn btn btn-primary" data-toggle="modal" data-target="#approve_modal_{{$questionObj->id}}">
                                                        Approve
                                                    </a>
                                                    <a href="javascript:;" id="question-reject-btn" class="question-reject-btn btn btn-danger"  data-toggle="modal" data-target="#reject_modal_{{$questionObj->id}}">
                                                        Reject
                                                    </a>
                                                @endif

                                                    <div class="modal fade review_submit approve_modal_box" id="approve_modal_{{$questionObj->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                <div class="modal-body">
                                                                    <form action="javascript:;" method="POST" class="row approve_question_form">
                                                                        <input type="hidden" name="question_id" value="{{$questionObj->id}}">
                                                                        <div class="col-12 col-lg-12">
                                                                            <div class="row">
                                                                                <div class="col-12 col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="input-label">Message</label>
                                                                                        <div class="input-group">
                                                                                            <textarea rows="10" name="review_message" class="form-control"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                                        </div>
                                                                    </form>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal fade review_submit reject_modal_box" id="reject_modal_{{$questionObj->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                <div class="modal-body">
                                                                    <form action="javascript:;" method="POST" class="row reject_question_form">
                                                                        <input type="hidden" name="question_id" value="{{$questionObj->id}}">
                                                                        <div class="col-12 col-lg-12">
                                                                            <div class="row">
                                                                                <div class="col-12 col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="input-label">Message</label>
                                                                                        <div class="input-group">
                                                                                            <textarea rows="10" name="review_message" class="form-control"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
												</div>

											@endforeach
										@endif
									<div class="show-notifications" data-show_message="yes"></div>
									<div class="prev-next-controls text-center mb-50 questions-nav-controls disable-div">
										<a href="javascript:;" data-toggle="modal" class="review-btn rurera-hide1" data-target="#review_submit">
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
//
$(document).on('submit', '.approve_question_form', function (evt) {
    console.log('sdfsdf');

    var thisObj = $('.approve_question_form');
    rurera_loader(thisObj, 'div');
    var formData = new FormData($(this)[0]);
    $.ajax({
        type: 'POST',
        url: '/admin/questions_bank/approve_question',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            rurera_remove_loader(thisObj, 'div');
            $(".approve_modal_box").modal('hide');
            rurera_modal_alert(
                'success',
                response,
                false, //confirmButton
            );
        }
    });
});

$(document).on('submit', '.reject_question_form', function (evt) {
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


</script>

@endpush
