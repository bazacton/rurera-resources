<div class="finish-steps">
	<div class="col-12 question-layout-block">
		<div class="chart-summary-fields result-layout-summary text-center">
			<h3 class="text-center font-30 mb-50">
				Congratulation
				<span class="icon-box">
					<img src="/assets/default/svgs/event-gift.svg" alt="event-gift">
				</span>
			</h3>
			<p> You have successfully Completed the quest {{$questObj->title}}</p>
			<img src="/assets/default/img/panel-sidebar/coins.svg" alt="coins" width="30"> {{$RewardAccounting->score}}
		</div>
		<div class="quests-list panel-border bg-white rounded-sm p-30">
			<ul>
				<li>
					<div class="quests-item">
						<div class="icon-box">
							<img src="/assets/default/img/types/practice.svg" alt="learning image" width="50" height="50">
						</div>
						<div class="item-text">
							<h5 class="font-16 font-weight-bold text-dark-charcoal">90% Completion in 2 lessons</h5>
							<div class="levels-progress horizontal">
								<span class="progress-box">
									<span class="progress-count" data-progress="50"><span class="progress-numbers">0%</span></span>
									
								</span>
								
							</div>
							<span class="progress-icon font-14">
								<img src="/assets/default/img/quests-coin.png" alt="quests-coin" width="35" height="35">
								+100
							</span>
						</div>
					</div>
				</li>
				<li>
					<div class="quests-item">
						<div class="icon-box">
							<img src="/assets/default/img/types/timestables.svg" alt="learning image" width="50" height="50">
						</div>
						<div class="item-text">
							<h5 class="font-18 font-weight-bold">Play times table Power-Up Mode for 1 minute.</h5>
							<div class="levels-progress horizontal">
								<span class="progress-box">
									<span class="progress-count" data-progress="70"><span class="progress-numbers">0%</span></span>
									
								</span>
								
							</div>
							<span class="progress-icon font-16">
								<img src="/assets/default/img/quests-coin.png" alt="quests-coin" width="35" height="35">
								+100
							</span>
						</div>
					</div>
				</li>
				<li>
					<div class="quests-item">
						<div class="icon-box">
							<img src="/assets/default/img/sidebar/refer_friend.svg" alt="learning image" width="50" height="50">
						</div>
						<div class="item-text">
							<h5 class="font-18 font-weight-bold">Invite 1 friend to get X600&nbsp;Coins</h5>
							<div class="levels-progress horizontal">
								<span class="progress-box">
									<span class="progress-count" data-progress="80"><span class="progress-numbers">0%</span></span>
									
								</span>
								
							</div>
							<span class="progress-icon font-16">
								<img src="/assets/default/img/quests-coin.png" alt="quests-coin" width="35" height="35">
								+100
							</span>
						</div>
					</div>
				</li>
				<li>
					<div class="quests-item">
						<div class="icon-box">
							<img src="/assets/default/img/types/special_quest.svg" alt="learning image" width="50" height="50">
						</div>
						<div class="item-text">
							<h5 class="font-18 font-weight-bold">Rate Rurera on play store to get X500&nbsp;Coins</h5>
							<div class="levels-progress horizontal">
								<span class="progress-box">
									<span class="progress-count" data-progress="90"><span class="progress-numbers">0%</span></span>
									
								</span>
								
							</div>
							<span class="progress-icon font-16">
								<img src="/assets/default/img/quests-coin.png" alt="quests-coin" width="35" height="35">
								+100
							</span>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<div class="prev-next-controls text-center mb-50 questions-nav-controls">
			<a href="javascript:;" class="review-btn finish-next-step">
				NEXT
			</a>
		</div>
	</div>
</div>
<script>
	document.addEventListener("click", function(e) {
	// Only run for Next buttons
	if (!e.target.classList.contains("finish-next-step")) return;

	// Get current step (the one currently visible)
	const currentStep = e.target.closest(".finish-steps");
	if (!currentStep) return;

	// Find next step (the one immediately after current in DOM)
	const nextStep = currentStep.nextElementSibling;
	if (!nextStep) return;

	// 1️⃣ Hide current step
	currentStep.classList.add("rurera-hide");

	// 2️⃣ Show next step
	nextStep.classList.remove("rurera-hide");

	// 3️⃣ Animate progress bars if present in next step
	const bars = nextStep.querySelectorAll(".progress-count");
	if (!bars.length) return;

	// Prevent re-running
	if (nextStep.dataset.progressDone) return;
	nextStep.dataset.progressDone = "true";

	function animateNumber(el, target, duration = 1000) {
		let startTime = null;

		function tick(timestamp) {
			if (!startTime) startTime = timestamp;
			const progress = Math.min((timestamp - startTime) / duration, 1);
			el.textContent = Math.floor(progress * target) + "%";

			if (progress < 1) {
				requestAnimationFrame(tick);
			} else {
				el.textContent = target + "%";
			}
		}

		requestAnimationFrame(tick);
	}

	// ✅ Sequential fill (1st -> 2nd -> 3rd ...)
	function animateBarSequentially(index = 0) {
		if (index >= bars.length) return;

		const bar = bars[index];
		const target = Number(bar.dataset.progress || 0);

		// ✅ FIXED selectors according to your HTML
		const progressBox = bar.closest(".progress-box");
		const numberEl = bar.querySelector(".progress-numbers"); // inside bar

		// Reset
		bar.style.transition = "none";
		bar.style.width = "0%";
		if (numberEl) numberEl.textContent = "0%";

		// Force reflow so transition will apply
		bar.offsetHeight;

		// Apply transition back
		bar.style.transition = "width 1000ms ease";

		// Animate width
		requestAnimationFrame(() => {
			bar.style.width = target + "%";
		});

		// Animate percentage text
		if (numberEl) animateNumber(numberEl, target, 1000);

		// After this bar finishes, animate next
		setTimeout(() => {
			animateBarSequentially(index + 1);
		}, 1050);
	}

	animateBarSequentially(0);
});

/* ✅ Fallback: agar .finish-next-step exist hi na kare,
to page load par card ke andar sequential animation chal jaye */
document.addEventListener("DOMContentLoaded", function () {
const cardBars = document.querySelectorAll(".quests-item .progress-count");
if (!cardBars.length) return;

// Prevent re-running
if (document.body.dataset.progressDone) return;
document.body.dataset.progressDone = "true";

function animateNumber(el, target, duration = 1000) {
	let startTime = null;

	function tick(timestamp) {
		if (!startTime) startTime = timestamp;
		const progress = Math.min((timestamp - startTime) / duration, 1);
		el.textContent = Math.floor(progress * target) + "%";

		if (progress < 1) {
			requestAnimationFrame(tick);
		} else {
			el.textContent = target + "%";
		}
	}

	requestAnimationFrame(tick);
}

function animateBarSequentially(index = 0) {
	if (index >= cardBars.length) return;

	const bar = cardBars[index];
	const target = Number(bar.dataset.progress || 0);
	const numberEl = bar.querySelector(".progress-numbers");

	bar.style.transition = "none";
	bar.style.width = "0%";
	if (numberEl) numberEl.textContent = "0%";

	bar.offsetHeight;

	bar.style.transition = "width 1000ms ease";
	requestAnimationFrame(() => {
	bar.style.width = target + "%";
	});

	if (numberEl) animateNumber(numberEl, target, 1000);

	setTimeout(() => animateBarSequentially(index + 1), 1050);
}

animateBarSequentially(0);
});
</script>