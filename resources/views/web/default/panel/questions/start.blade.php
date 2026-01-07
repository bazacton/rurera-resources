@php namespace App\Http\Controllers\Web; @endphp
@extends(getTemplate().'.layouts.appstart')
@php
$i = 0; $j = 1;
$rand_id = rand(99,9999);

@endphp

@push('styles_top')
<link rel="stylesheet" href="/assets/default/vendors/video/video-js.min.css" media="print" onload="this.onload=null;this.media='all';">
@endpush

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" media="print" onload="this.onload=null;this.media='all';">
<link rel="stylesheet" href="/assets/default/css/responsive.css?ver={{$rand_id}}" media="print" onload="this.onload=null;this.media='all';">
<script src="https://cdn.jsdelivr.net/npm/mathjax@4/tex-mml-svg.js" defer></script>
@section('content')


<div class="learning-page type-practice type-sats">
	<section class="lms-quiz-section ttt">
        <div class="container questions-data-block read-quiz-content" data-total_questions="0">
            <div class="justify-content-center">
                <div class="col-lg-9 col-md-12 col-sm-12 mt-80 mx-auto">
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


<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
    function convertAllMathToSVG() {
        console.log('convertAllMathToSVG');
        MathJax.startup.promise.then(() => {

            /* 1️⃣ math-equation spans */
            document.querySelectorAll('.math-equation').forEach(el => {
                if (el.dataset.converted) return;

                let latex = el.getAttribute('data-equation') || el.textContent.trim();
                if (!latex) return;

                // ✅ Normalize risky commands
                latex = latex
                    .replace(/\\dfrac/g, '\\frac')
                    .replace(/\\tfrac/g, '\\frac');

                // ✅ Fix missing space after fractions ( \frac{..}{..}by )
                latex = latex.replace(
                    /(\\(?:dfrac|frac)\{[^}]+\}\{[^}]+\})([a-zA-Z])/g,
                    '$1 $2'
                );

                const wrapper = document.createElement('span');
                wrapper.innerHTML = `\\(${latex}\\)`;

                MathJax.typesetPromise([wrapper]).then(() => {
                    const svg = wrapper.querySelector('svg');
                    if (svg) {
                        el.innerHTML = '';
                        el.appendChild(svg.cloneNode(true));
                        el.dataset.converted = '1';
                    }
                });
            });

            /* 2️⃣ auto-wrap label math (STRICT detection) */
            document.querySelectorAll('.rureraform-cr-container-medium label')
                .forEach(label => {
                    if (label.dataset.converted) return;

                    const text = label.textContent.trim();

                    // ✅ Only wrap if it REALLY looks like math
                    const looksLikeLatex =
                        /\\[a-zA-Z]+/.test(text) ||
                        /[_^]/.test(text) ||
                        /\{[^}]+\}/.test(text);

                    if (!looksLikeLatex) return;

                    label.innerHTML = `\\(${text}\\)`;
                    label.dataset.converted = '1';
                });

            /* 3️⃣ numbers inside .question-layout-block (excluding labels) */
            document.querySelectorAll('.question-layout-block').forEach(block => {
                if (block.dataset.numberWrapped) return;

                wrapNumbersInTextNodes(block);
                block.dataset.numberWrapped = '1';
            });

            /* 4️⃣ Final typeset */
            MathJax.typesetPromise();
        });
    }

    /* ===========================
       SAFE number wrapper
    =========================== */
    function wrapNumbersInTextNodes(root) {
        const walker = document.createTreeWalker(
            root,
            NodeFilter.SHOW_TEXT,
            {
                acceptNode(node) {

                    if (!node.nodeValue.trim()) return NodeFilter.FILTER_REJECT;

                    // ❌ Skip labels completely
                    if (node.parentNode.closest('label')) return NodeFilter.FILTER_REJECT;

                    // ❌ Skip math-equation & SVG
                    if (node.parentNode.closest('.math-equation')) return NodeFilter.FILTER_REJECT;
                    if (node.parentNode.closest('svg')) return NodeFilter.FILTER_REJECT;

                    // ❌ Skip already converted MathJax output
                    if (node.parentNode.closest('[data-converted]')) return NodeFilter.FILTER_REJECT;

                    return /\b\d+(\.\d+)?\b/.test(node.nodeValue)
                        ? NodeFilter.FILTER_ACCEPT
                        : NodeFilter.FILTER_REJECT;
                }
            }
        );

        const nodes = [];
        while (walker.nextNode()) nodes.push(walker.currentNode);

        nodes.forEach(textNode => {
            const span = document.createElement('span');
            span.innerHTML = textNode.nodeValue.replace(
                /\b\d+(\.\d+)?\b/g,
                m => `\\(${m}\\)`
            );
            textNode.replaceWith(span);
        });
    }

    document.addEventListener('DOMContentLoaded', convertAllMathToSVG);
</script>
@endpush
