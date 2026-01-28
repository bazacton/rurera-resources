@php
    $learning_journey = (isset( $learning_journey ) && $learning_journey == 'yes')? 'yes' : 'no';
    $test_type = isset( $test_type )? $test_type : '';
    $question_ids = isset( $question_ids )? $question_ids : array();
    $is_new = isset( $is_new )? $is_new : 'no';
    $started_already = isset($started_already)? $started_already : false;
@endphp
<div class="learn-test-start mx-auto pt-0">
    <div class="learn-test-title mb-30">
        <h2 class="font-30 font-weight-bold">{{$quiz->getTitleAttribute()}}</h2>
        <p class="font-16 text-dark-charcoal pt-5 text-gray">Earn Coins by answering questions and completing</p>
    </div>
    <div class="learn-chats row mb-35">
        <div class="col-lg-4 col-4">
            <div class="chat-box left-bottom">
                <div class="avatar active">
                    <img src="/assets/default/svgs/avatar-left-top.svg" alt="avatar-left-top">
                </div>
                <div class="avatar">
                    <img src="/assets/default/svgs/avatar-left.svg" alt="avatar-left">
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-4">
            <div class="avatar main-avatar">
                <img src="/assets/default/svgs/avatar-main.svg" alt="avatar-main">
            </div>
        </div>
        <div class="col-lg-4 col-4">
            <div class="chat-box left-top">
                <div class="avatar">
                    <img src="/assets/default/svgs/avatar-right-top.svg" alt="avatar-right-top">
                </div>
                <div class="avatar active">
                    <img src="/assets/default/svgs/avatar-right.svg" alt="avatar-right">
                </div>
            </div>
        </div>
    </div>
    <div class="stats-card">
        <div class="card-box">
            <div class="icon-box">
                <img src="/assets/default/svgs/clipboard-list.svg" height="64" width="64" alt="clipboard-list">
            </div>
            <div class="stat-label font-14 font-weight-500">Question</div>
            <div class="stat-value font-14 font-weight-bold">{{$quiz->quizQuestionsList->count()}}</div>
        </div>
        <div class="card-box">
            <div class="icon-box">
                <img src="/assets/default/svgs/clock-colord.svg" height="64" width="64" alt="clock-colord">
            </div>
            <div class="stat-label font-14 font-weight-500">Time for quiz</div>
            <div class="stat-value font-14 font-weight-bold">{{$quiz->time}} min</div>
        </div>
        <div class="card-box">
            <div class="icon-box">
                <img src="/assets/default/svgs/coin-colord.svg" height="64" width="64" alt="coin-colord">
            </div>
            <div class="stat-label font-14 font-weight-500">Earn up to</div>
            <div class="stat-value stat-value-accent font-14 font-weight-bold">1 XP</div>
        </div>

        <div class="rur-setting-row-holder">

            <div class="rur-setting-row">
                <div class="rur-setting-text">
                    <div class="rur-setting-title font-14">Timer</div>
                    <div class="rur-setting-sub">Show countdown badge</div>
                </div>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input show-timer-check-1" checked="" id="show-timer-check-1">
                    <label class="custom-control-label" for="show-timer-check-1"></label>
                </div>
            </div>
        </div>

    </div>

    <div class="btn-holder practice-start-block font-14" data-quiz_loaded="no">
        <svg xmlns="http://www.w3.org/2000/svg" height="200px" width="200px" viewBox="0 0 200 200" class="pencil">
            <defs>
                <clipPath id="pencil-eraser">
                    <rect height="30" width="30" ry="5" rx="5"></rect>
                </clipPath>
            </defs>
            <circle transform="rotate(-113,100,100)" stroke-linecap="round" stroke-dashoffset="439.82"
                    stroke-dasharray="439.82 439.82" stroke-width="2" stroke="currentColor" fill="none" r="70"
                    class="pencil__stroke"></circle>
            <g transform="translate(100,100)" class="pencil__rotate">
                <g fill="none">
                    <circle transform="rotate(-90)" stroke-dashoffset="402" stroke-dasharray="402.12 402.12" stroke-width="30"
                            stroke="hsl(223,90%,50%)" r="64" class="pencil__body1"></circle>
                    <circle transform="rotate(-90)" stroke-dashoffset="465" stroke-dasharray="464.96 464.96" stroke-width="10"
                            stroke="hsl(223,90%,60%)" r="74" class="pencil__body2"></circle>
                    <circle transform="rotate(-90)" stroke-dashoffset="339" stroke-dasharray="339.29 339.29" stroke-width="10"
                            stroke="hsl(223,90%,40%)" r="54" class="pencil__body3"></circle>
                </g>
                <g transform="rotate(-90) translate(49,0)" class="pencil__eraser">
                    <g class="pencil__eraser-skew">
                        <rect height="30" width="30" ry="5" rx="5" fill="hsl(223,90%,70%)"></rect>
                        <rect clip-path="url(#pencil-eraser)" height="30" width="5" fill="hsl(223,90%,60%)"></rect>
                        <rect height="20" width="30" fill="hsl(223,10%,90%)"></rect>
                        <rect height="20" width="15" fill="hsl(223,10%,70%)"></rect>
                        <rect height="20" width="5" fill="hsl(223,10%,80%)"></rect>
                        <rect height="2" width="30" y="6" fill="hsla(223,10%,10%,0.2)"></rect>
                        <rect height="2" width="30" y="13" fill="hsla(223,10%,10%,0.2)"></rect>
                    </g>
                </g>
                <g transform="rotate(-90) translate(49,-30)" class="pencil__point">
                    <polygon points="15 0,30 30,0 30" fill="hsl(33,90%,70%)"></polygon>
                    <polygon points="15 0,6 30,0 30" fill="hsl(33,90%,50%)"></polygon>
                    <polygon points="15 0,20 10,10 10" fill="hsl(223,10%,10%)"></polygon>
                </g>
            </g>
        </svg>
        <div class="static-text">Preparing</div>
        <div class="animated-text-wrapper">
            <div class="animated-text"><span></span></div>
        </div>
    </div>
    <div class="btn-holder start-practice-btn rurera-hide mb-30">


        <button data-id="{{$quiz->id}}" data-is_new="{{$is_new}}" data-question_ids="{{json_encode($question_ids)}}" data-test_type="{{$test_type}}" data-learning_journey="{{$learning_journey}}" data-journey_item_id="{{isset( $journey_item_id )? $journey_item_id : 0}}"  data-quiz_url="/panel/quizzes/{{$quiz->id}}/start"
                class="quiz-start-btn start-spell-quiz mt-10" type="button">
            @if($started_already == true)
                Start Practice
            @else
                Start Practice
            @endif
        </button>
    </div>
</div>
