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
													<span class="question-dev-details">({{$questionObj->id}}) ({{$questionObj->question_difficulty_level}}) ({{$questionObj->question_type}})</span>
												</span>
												<div class="question-layout row">
													{!! $question_layout !!}
												</div>
												</div>

											@endforeach
										@endif
									<div class="show-notifications" data-show_message="yes"></div>


									<div class="prev-next-controls text-center mb-50 questions-nav-controls disable-div">
										<a href="javascript:;" data-toggle="modal" class="review-btn rurera-hide1 test" data-target="#review_submit">
											Finish
											<svg style="width: 22px;height: 22px;" xmlns="http://www.w3.org/2000/svg" version="1.0"
												 width="512.000000pt" height="512.000000pt"
												 viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
												<g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000"
												   stroke="none">
													<path
															d="M1405 5080 c-350 -40 -655 -161 -975 -388 -18 -13 -21 -9 -48 47 -24 50 -28 70 -24 114 12 153 -150 248 -279 162 -42 -27 -79 -96 -79 -146 0 -47 38 -120 76 -144 18 -11 39 -24 47 -30 9 -5 498 -1013 1088 -2240 589 -1227 1088 -2264 1109 -2305 45 -89 80 -115 142 -107 65 9 115 71 105 132 -3 18 -228 496 -501 1063 -273 566 -496 1034 -496 1038 1 5 29 30 63 55 204 153 442 257 707 311 164 33 453 33 618 0 179 -36 311 -84 537 -197 128 -64 257 -120 330 -144 358 -117 765 -109 1118 19 90 33 130 65 158 125 22 48 24 89 5 141 -34 96 -999 2081 -1024 2107 -66 70 -129 76 -282 27 -181 -57 -256 -70 -415 -77 -170 -6 -278 5 -430 44 -133 34 -213 67 -413 167 -250 125 -368 166 -586 207 -127 23 -421 33 -551 19z m665 -297 c123 -34 232 -79 405 -167 77 -40 163 -81 190 -92 l50 -20 99 -210 c54 -115 101 -215 104 -222 2 -8 -35 6 -84 31 -179 90 -382 152 -576 178 l-93 12 -117 246 c-64 135 -120 255 -124 265 -8 22 -10 22 146 -21z m-814 -297 c74 -154 134 -284 134 -290 0 -6 -28 -22 -62 -35 -131 -49 -324 -161 -447 -260 -35 -29 -68 -48 -72 -44 -9 10 -290 595 -287 598 2 1 30 22 63 47 82 62 206 138 290 178 90 43 216 90 234 87 7 -1 74 -128 147 -281z m2804 -279 c88 -183 135 -290 127 -292 -153 -51 -500 -94 -523 -64 -15 20 -254 525 -254 536 0 6 37 13 82 17 94 8 216 33 333 70 44 13 84 24 88 23 4 -1 71 -132 147 -290z m-1739 -274 l166 -348 -176 -7 c-185 -7 -321 -28 -471 -72 -47 -14 -88 -22 -91 -18 -19 22 -328 687 -322 693 13 11 181 55 278 73 114 20 139 22 310 24 l141 2 165 -347z m729 47 c121 -62 328 -119 506 -140 l101 -12 91 -191 c50 -106 125 -263 167 -351 l75 -158 -67 7 c-186 18 -390 76 -545 154 l-92 46 -109 230 c-60 127 -133 280 -162 342 -59 124 -60 121 35 73z m-321 -451 c131 -27 312 -89 433 -149 57 -28 108 -57 114 -63 14 -15 306 -628 301 -633 -2 -2 -41 15 -88 38 -168 82 -416 155 -593 175 l-69 8 -153 323 c-85 177 -154 325 -154 328 0 9 99 -4 209 -27z m-835 -381 c81 -172 147 -317 146 -323 -2 -5 -40 -24 -84 -41 -164 -63 -298 -135 -431 -231 -32 -24 -62 -43 -65 -43 -6 0 -75 140 -236 477 l-63 132 62 49 c139 108 281 193 437 259 41 18 77 32 80 33 3 0 72 -141 154 -312z m2811 -281 l154 -318 -27 -10 c-106 -41 -319 -79 -438 -79 l-71 0 -152 321 c-84 176 -151 323 -148 325 2 3 66 9 141 14 124 9 296 39 350 60 12 5 25 8 30 6 4 -1 77 -145 161 -319z"></path>
												</g>
											</svg>
										</a>
										<a href="javascript:;" id="next-btn" class="rurera-hide next-btn">
											Next
											<svg style="width: 22px;height: 22px;" xmlns="http://www.w3.org/2000/svg" version="1.0"
												 width="512.000000pt" height="512.000000pt"
												 viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
												<g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000"
												   stroke="none">
													<path
															d="M1340 5111 c-118 -36 -200 -156 -187 -272 3 -27 14 -66 23 -86 11 -25 377 -398 1093 -1116 l1076 -1077 -1076 -1078 c-716 -717 -1082 -1090 -1093 -1115 -61 -135 4 -296 140 -347 66 -24 114 -25 180 -4 45 15 146 113 1242 1208 1095 1093 1194 1195 1212 1244 11 29 20 70 20 92 0 22 -9 63 -20 92 -18 49 -117 151 -1212 1244 -1096 1095 -1197 1193 -1242 1208 -52 17 -114 20 -156 7z"></path>
												</g>
											</svg>
										</a>
										<a href="javascript:;" id="prev-btn" class="rurera-hide prev-btn">
											prev
											<svg style="width: 22px;height: 22px;" xmlns="http://www.w3.org/2000/svg" version="1.0"
												 width="512.000000pt" height="512.000000pt"
												 viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
												<g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000"
												   stroke="none">
													<path
															d="M1340 5111 c-118 -36 -200 -156 -187 -272 3 -27 14 -66 23 -86 11 -25 377 -398 1093 -1116 l1076 -1077 -1076 -1078 c-716 -717 -1082 -1090 -1093 -1115 -61 -135 4 -296 140 -347 66 -24 114 -25 180 -4 45 15 146 113 1242 1208 1095 1093 1194 1195 1212 1244 11 29 20 70 20 92 0 22 -9 63 -20 92 -18 49 -117 151 -1212 1244 -1096 1095 -1197 1193 -1242 1208 -52 17 -114 20 -156 7z"></path>
												</g>
											</svg>
										</a>
										<a href="javascript:;" id="question-submit-btn" class="question-submit-btn">
											mark answer
											<svg style="width: 22px;height: 22px;" xmlns="http://www.w3.org/2000/svg" version="1.0"
												 width="512.000000pt" height="512.000000pt"
												 viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
												<g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000"
												   stroke="none">
													<path
															d="M1405 5080 c-350 -40 -655 -161 -975 -388 -18 -13 -21 -9 -48 47 -24 50 -28 70 -24 114 12 153 -150 248 -279 162 -42 -27 -79 -96 -79 -146 0 -47 38 -120 76 -144 18 -11 39 -24 47 -30 9 -5 498 -1013 1088 -2240 589 -1227 1088 -2264 1109 -2305 45 -89 80 -115 142 -107 65 9 115 71 105 132 -3 18 -228 496 -501 1063 -273 566 -496 1034 -496 1038 1 5 29 30 63 55 204 153 442 257 707 311 164 33 453 33 618 0 179 -36 311 -84 537 -197 128 -64 257 -120 330 -144 358 -117 765 -109 1118 19 90 33 130 65 158 125 22 48 24 89 5 141 -34 96 -999 2081 -1024 2107 -66 70 -129 76 -282 27 -181 -57 -256 -70 -415 -77 -170 -6 -278 5 -430 44 -133 34 -213 67 -413 167 -250 125 -368 166 -586 207 -127 23 -421 33 -551 19z m665 -297 c123 -34 232 -79 405 -167 77 -40 163 -81 190 -92 l50 -20 99 -210 c54 -115 101 -215 104 -222 2 -8 -35 6 -84 31 -179 90 -382 152 -576 178 l-93 12 -117 246 c-64 135 -120 255 -124 265 -8 22 -10 22 146 -21z m-814 -297 c74 -154 134 -284 134 -290 0 -6 -28 -22 -62 -35 -131 -49 -324 -161 -447 -260 -35 -29 -68 -48 -72 -44 -9 10 -290 595 -287 598 2 1 30 22 63 47 82 62 206 138 290 178 90 43 216 90 234 87 7 -1 74 -128 147 -281z m2804 -279 c88 -183 135 -290 127 -292 -153 -51 -500 -94 -523 -64 -15 20 -254 525 -254 536 0 6 37 13 82 17 94 8 216 33 333 70 44 13 84 24 88 23 4 -1 71 -132 147 -290z m-1739 -274 l166 -348 -176 -7 c-185 -7 -321 -28 -471 -72 -47 -14 -88 -22 -91 -18 -19 22 -328 687 -322 693 13 11 181 55 278 73 114 20 139 22 310 24 l141 2 165 -347z m729 47 c121 -62 328 -119 506 -140 l101 -12 91 -191 c50 -106 125 -263 167 -351 l75 -158 -67 7 c-186 18 -390 76 -545 154 l-92 46 -109 230 c-60 127 -133 280 -162 342 -59 124 -60 121 35 73z m-321 -451 c131 -27 312 -89 433 -149 57 -28 108 -57 114 -63 14 -15 306 -628 301 -633 -2 -2 -41 15 -88 38 -168 82 -416 155 -593 175 l-69 8 -153 323 c-85 177 -154 325 -154 328 0 9 99 -4 209 -27z m-835 -381 c81 -172 147 -317 146 -323 -2 -5 -40 -24 -84 -41 -164 -63 -298 -135 -431 -231 -32 -24 -62 -43 -65 -43 -6 0 -75 140 -236 477 l-63 132 62 49 c139 108 281 193 437 259 41 18 77 32 80 33 3 0 72 -141 154 -312z m2811 -281 l154 -318 -27 -10 c-106 -41 -319 -79 -438 -79 l-71 0 -152 321 c-84 176 -151 323 -148 325 2 3 66 9 141 14 124 9 296 39 350 60 12 5 25 8 30 6 4 -1 77 -145 161 -319z"></path>
												</g>
											</svg>
										</a>
										<a href="javascript:;" id="question-next-btn" class="question-next-btn rurera-hide">
											Next
											<svg style="width: 22px;height: 22px;" xmlns="http://www.w3.org/2000/svg" version="1.0"
												 width="512.000000pt" height="512.000000pt"
												 viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
												<g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000"
												   stroke="none">
													<path
															d="M1405 5080 c-350 -40 -655 -161 -975 -388 -18 -13 -21 -9 -48 47 -24 50 -28 70 -24 114 12 153 -150 248 -279 162 -42 -27 -79 -96 -79 -146 0 -47 38 -120 76 -144 18 -11 39 -24 47 -30 9 -5 498 -1013 1088 -2240 589 -1227 1088 -2264 1109 -2305 45 -89 80 -115 142 -107 65 9 115 71 105 132 -3 18 -228 496 -501 1063 -273 566 -496 1034 -496 1038 1 5 29 30 63 55 204 153 442 257 707 311 164 33 453 33 618 0 179 -36 311 -84 537 -197 128 -64 257 -120 330 -144 358 -117 765 -109 1118 19 90 33 130 65 158 125 22 48 24 89 5 141 -34 96 -999 2081 -1024 2107 -66 70 -129 76 -282 27 -181 -57 -256 -70 -415 -77 -170 -6 -278 5 -430 44 -133 34 -213 67 -413 167 -250 125 -368 166 -586 207 -127 23 -421 33 -551 19z m665 -297 c123 -34 232 -79 405 -167 77 -40 163 -81 190 -92 l50 -20 99 -210 c54 -115 101 -215 104 -222 2 -8 -35 6 -84 31 -179 90 -382 152 -576 178 l-93 12 -117 246 c-64 135 -120 255 -124 265 -8 22 -10 22 146 -21z m-814 -297 c74 -154 134 -284 134 -290 0 -6 -28 -22 -62 -35 -131 -49 -324 -161 -447 -260 -35 -29 -68 -48 -72 -44 -9 10 -290 595 -287 598 2 1 30 22 63 47 82 62 206 138 290 178 90 43 216 90 234 87 7 -1 74 -128 147 -281z m2804 -279 c88 -183 135 -290 127 -292 -153 -51 -500 -94 -523 -64 -15 20 -254 525 -254 536 0 6 37 13 82 17 94 8 216 33 333 70 44 13 84 24 88 23 4 -1 71 -132 147 -290z m-1739 -274 l166 -348 -176 -7 c-185 -7 -321 -28 -471 -72 -47 -14 -88 -22 -91 -18 -19 22 -328 687 -322 693 13 11 181 55 278 73 114 20 139 22 310 24 l141 2 165 -347z m729 47 c121 -62 328 -119 506 -140 l101 -12 91 -191 c50 -106 125 -263 167 -351 l75 -158 -67 7 c-186 18 -390 76 -545 154 l-92 46 -109 230 c-60 127 -133 280 -162 342 -59 124 -60 121 35 73z m-321 -451 c131 -27 312 -89 433 -149 57 -28 108 -57 114 -63 14 -15 306 -628 301 -633 -2 -2 -41 15 -88 38 -168 82 -416 155 -593 175 l-69 8 -153 323 c-85 177 -154 325 -154 328 0 9 99 -4 209 -27z m-835 -381 c81 -172 147 -317 146 -323 -2 -5 -40 -24 -84 -41 -164 -63 -298 -135 -431 -231 -32 -24 -62 -43 -65 -43 -6 0 -75 140 -236 477 l-63 132 62 49 c139 108 281 193 437 259 41 18 77 32 80 33 3 0 72 -141 154 -312z m2811 -281 l154 -318 -27 -10 c-106 -41 -319 -79 -438 -79 l-71 0 -152 321 c-84 176 -151 323 -148 325 2 3 66 9 141 14 124 9 296 39 350 60 12 5 25 8 30 6 4 -1 77 -145 161 -319z"></path>
												</g>
											</svg>
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


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
</script>

@endpush
