@php namespace App\Http\Controllers\Web;
use App\Models\QuestionLogs;
@endphp
@php

$rand_no = rand(99,9999);


@endphp

<link rel="stylesheet" href="/assets/default/css/quiz-common.css?ver={{$rand_no}}">



    <div class="subchapter-slider">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @php $is_active = ''; $counter = 0; @endphp
                @if($questions->count() > 0)
                    @foreach($questions as $questionObj)
                        @php $question_layout = $QuestionsAttemptController->get_question_layout($questionObj); $counter++;@endphp

                        <div class="swiper-slide">
                            <div class="rurera-question-block active">
                                <div class="left-content has-bg">
                                    <div class="question-layout row">
                                        {!! $question_layout !!}
                                    </div>

                                </div>
                            </div>
                        </div>


                    @endforeach
                @endif
                <div class="swiper-slide">
                    <div class="subchapter-img-block">
                        <img src="/assets/default/img/chap1.jpeg" alt="chap1">
                    </div>
                </div>
                <div class="swiper-slide">
                    testing
                    <div class="subchapter-img-block">
                        <img src="/assets/default/img/chap2.jpeg" alt="chap2">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="subchapter-img-block">
                        <img src="/assets/default/img/chap3.jpeg" alt="chap3">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="subchapter-img-block">
                        <img src="/assets/default/img/chap4.jpeg" alt="chap4">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="subchapter-img-block">
                        <img src="/assets/default/img/chap1.jpeg" alt="chap1">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="subchapter-img-block">
                        <img src="/assets/default/img/chap2.jpeg" alt="chap2">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="subchapter-img-block">
                        <img src="/assets/default/img/chap3.jpeg" alt="chap3">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="subchapter-img-block">
                        <img src="/assets/default/img/chap4.jpeg" alt="chap4">
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-controls">
            <div class="swiper-button-next">
                <img src="/assets/default/svgs/arrow-right.svg" alt="arrow-right" height="800" width="800">
            </div>
            <div class="swiper-button-prev">
                <img src="/assets/default/svgs/arrow-left.svg" alt="arrow-left" height="800" width="800">
            </div>
        </div>

    </div>
    <div class="subchapter-footer">
        <div class="swiper-progress">
            <div class="swiper-pagination"></div>
        </div>
        <span class="learn-lable">Learn</span>
        <div class="subchapter-compare">
            <h4>Order and Compare</h4>
            <div class="compare-right">
                <span><em class="icon-box q-icon"><img src="/assets/default/svgs/question-simple.svg" alt="question-simple"></em> 8 questions</span>
                <span> <em class="icon-box clock-icon"><img src="/assets/default/svgs/clock.svg" alt="clock"></em> No limit</span>
                <a href="#" class="start-btn">Start practicing</a>
            </div>
        </div>
    </div>
