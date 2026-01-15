@extends('web.default.panel.layouts.panel_layout')
@php use App\Models\Quiz; @endphp

@push('styles_top')
    <link rel="stylesheet" href="/assets/default/css/css-stars.css">
    <link rel="stylesheet" href="/assets/default/vendors/video/video-js.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/swiper-slider/swiper-bundle.min.css"/>
@endpush

@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <div class="post-show" style="overflow:hidden;">
                    <section class="count-number-wrapp" style="display:none">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-12">
                                    <div class="section-title">
                                        <h2>{{ $course->title }}</h2>
                                    </div>
                                    <ul class="count-number-boxes row">
                                        <li class="count-number-card col-12 col-sm-6 col-md-6 col-lg-3">
                                            <div class="count-number-icon">
                                                <i data-feather="edit-2" width="20" height="20" class="" style="color:#8cc811"></i>
                                            </div>
                                            <div class="count-number-body">
                                                <h5>answered</h5>
                                                <strong>1,355</strong>
                                                <h5>questions</h5>
                                            </div>
                                        </li>
                                        <li class="count-number-card col-12 col-sm-6 col-md-6 col-lg-3">
                                            <div class="count-number-icon">
                                                <i data-feather="clock" width="20" height="20" class="" style="color:#00aeef"></i>
                                            </div>
                                            <div class="count-number-body">
                                                <h5>spent</h5>
                                                <strong>11 hr 32 min</strong>
                                                <h5>practising</h5>
                                            </div>
                                        </li>
                                        <li class="count-number-card col-12 col-sm-6 col-md-6 col-lg-3">
                                            <div class="count-number-icon">
                                                <i data-feather="bar-chart" width="20" height="20" class="" style="color:#e67035"></i>
                                            </div>
                                            <div class="count-number-body">
                                                <h5>Made progress in</h5>
                                                <strong>73</strong>
                                                <h5>skills</h5>
                                            </div>
                                        </li>
                                        <li class="count-number-card col-12 col-sm-6 col-md-6 col-lg-3">
                                            <div class="count-number-icon">
                                                <i data-feather="bar-chart" width="20" height="20" class="" style="color:#e67035"></i>
                                            </div>
                                            <div class="count-number-body">
                                                <h5>Made progress in</h5>
                                                <strong>73</strong>
                                                <h5>skills</h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="lms-chapter-section">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 lms-chapter-area">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="chapter-nav mb-30 mt-15">

                                                <div class="panel-stats" style="background:{{(isset( $course->learn_background_color ) && $course->learn_background_color != '')? $course->learn_background_color : '#ffff'}}">
                                                    <div class="stats-user">
                                                        <h2 class="font-22 mb-0">{{ $course->title }}</h2>
                                                    </div>
                                                    @if(isset( $course->learn_icon ) && $course->learn_icon != '')
                                                        <div class="course-icon"><img src="{{$course->learn_icon}}" alt="course-icon" width="150" height="150"></div>
                                                    @endif
                                                    <div class="stats-list">
                                                        <ul>
                                                            <li>
                                                                <div class="list-box">
                                                                    <strong>{{$course->chapters->count()}}</strong>
                                                                    <span>Units</span>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="list-box">
                                                                    <strong>{{$course->webinar_sub_chapters->count()}}</strong>
                                                                    <span>Lessons</span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <ul>
                                                    @foreach($course->chapters as $chapter)
                                                        @if((!empty($chapter->chapterItems) and count($chapter->chapterItems)) or (!empty($chapter->quizzes) and count($chapter->quizzes)))
                                                            <li><a href="#subject_{{$chapter->id}}" class="font-14 font-weight-500">{{ $chapter->title}}</a></li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                        {{--<div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-10">
                                            <div class="sorting-filter">
                                                <a href="javascript:;" class="grid-btn active view-change-btn" data-type="chapters-short-view">
                                                    <span><img src="/assets/default/svgs/grid-view.svg" alt="grid-view"></span>
                                                </a>
                                                <a href="javascript:;" class="list-btn view-change-btn" data-type="chapters-detail-view">
                                                    <span><img src="/assets/default/svgs/list-view.svg" alt="list-view"></span>
                                            </a>
                                            </div>
                                        </div>--}}
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 chapter-views chapters-short-view">
                                            <div class="accordion-content-wrapper" id="chaptersAccordion" role="tablist" aria-multiselectable="true">
                                                <ul class="lms-chapter-ul" id="accordion">
                                                    @foreach($course->chapters as $chapter)
                                                        <li id="subject_{{isset($chapter->id)? $chapter->id: 0}}"><div class="element-title mb-20"><h2 class="mb-0 font-22 text-dark-charcoal">{{ $chapter->title }}</h2></div>

                                                            @if($chapter->ChapterYearTopicParts->count() > 0)
                                                                <div class="lms-chapter-ul-outer">
                                                                    <ul>
                                                                        @foreach($chapter->ChapterYearTopicParts as $topicPartObj)

                                                                        @php

                                                                        $total_completion = 0;
                                                                        $quizObj = isset($topicPartObj->partQuiz)? $topicPartObj->partQuiz : (object) array();

                                                                        $topicPerformData = Quiz::getQuizPercentage($quizObj->id, true);
                                                                        $total_completion = isset($topicPerformData['topic_completion'])? $topicPerformData['topic_completion'] : 0;
                                                                        $topic_accuracy = isset($topicPerformData['topic_accuracy'])? $topicPerformData['topic_accuracy'] : 0;

                                                                        $user_difficulty_level = isset($topicPerformData['user_difficulty_level'])? $topicPerformData['user_difficulty_level'] : '';

                                                                        $completion_class = 'accuracy-not-started';
                                                                        $completion_class = ($total_completion > 0)? 'accuracy-practice-needed' : $completion_class;
                                                                        $completion_class = ($total_completion > 39)? 'accuracy-good' : $completion_class;
                                                                        $completion_class = ($total_completion > 59)? 'accuracy-very-good' : $completion_class;
                                                                        $completion_class = ($total_completion > 79)? 'accuracy-excellent' : $completion_class;


                                                                        $completion_title = 'Not Started';
                                                                        $completion_title = ($topic_accuracy > 0)? 'Practice Needed' : $completion_title;
                                                                        $completion_title = ($topic_accuracy > 39)? 'Good' : $completion_title;
                                                                        $completion_title = ($topic_accuracy > 59)? 'Very Good' : $completion_title;
                                                                        $completion_title = ($topic_accuracy > 79)? 'Excellent' : $completion_title;


                                                                        $completion_icon = 'above_0';
                                                                        $completion_icon = ($topic_accuracy > 0)? 'above_25' : $completion_icon;
                                                                        $completion_icon = ($topic_accuracy > 39)? 'above_50' : $completion_icon;
                                                                        $completion_icon = ($topic_accuracy > 59)? 'above_80' : $completion_icon;
                                                                        $completion_icon = ($topic_accuracy > 79)? 'above_80' : $completion_icon;

                                                                        //$total_completion = 40;
                                                                            @endphp

                                                                            <li>
                                                                                <a href="#" class="{{ subscriptionCheckLink('courses') }} collapsed font-16 font-weight-500" data-toggle="collapse" data-target="#collapse{{$topicPartObj->id}}" aria-expanded="true">{{ $topicPartObj->title }}
                                                                                    <span class="topic-accuracy {{$completion_class}}" data-title="{{$completion_title}}"><img src="/assets/default/svgs/{{$completion_icon}}.svg"></span>                                                                                </a>
                                                                                <div id="collapse{{$topicPartObj->id}}" class="collapse" data-parent="#accordion">
                                                                                    <ul>
                                                                                        <li><a href="" class="course-learn-btn" data-toggle="modal" data-target="#subchapter-notes-modal">Learn Concepts</a></li>
                                                                                        <li><a href="/{{$category_slug}}/{{$course->slug}}/{{$quizObj->quiz_slug}}" class="course-practice-btn">Practice Skills</a></li>
                                                                                        <li><a href="javascript:;" class="course-progress-btn">Skill Summary</a></li>
                                                                                        <li><a href="javascript:;" class="debug-details-btn">Debug Details</a>
                                                                                            <div class="debug-details rurera-hide">
                                                                                                Part ID: {{$topicPartObj->id}}<br>
                                                                                                Quiz ID: {{$quizObj->id}}<br>
                                                                                                Difficulty Level: {{$user_difficulty_level}}<br>
                                                                                                Accuracy: {{$topic_accuracy}}<br>
                                                                                                Completion: {{$total_completion}}<br>
                                                                                            </div>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                                
                                                                                <div class="percent-holder">
                                                                                    <div class="chapter_percent circle-blue" data-percent="{{$total_completion}}">
                                                                                        <div class="circle_inner">
                                                                                            <div class="round_per"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </li>


                                                                        @endforeach
                                                                    </ul>
                                                                </div>

                                                                @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 chapter-views chapters-detail-view rurera-hide">
                                            <div class="current-topics-detail bg-white mb-30 mt-15">
                                                <div class="topics-table-group">

                                                    @foreach($course->chapters as $chapter)
                                                        @if((!empty($chapter->chapterItems) and count($chapter->chapterItems)) or (!empty($chapter->quizzes) and count($chapter->quizzes)))

                                                            <div class="topics-table">
                                                                <table class="w-100">
                                                                    <thead>
                                                                    <tr>
                                                                        <th class="text-white text-left p-15">{{ $chapter->title }}</th>
                                                                        <th class="text-white text-left p-15">Mastery Level</th>
                                                                        <th class="text-white text-left p-15">Questions Count</th>
                                                                        <th class="text-white text-left p-15">Rersources</th>
                                                                    </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                    @if(!empty($sub_chapters[$chapter->id]) and count($sub_chapters[$chapter->id]))
                                                                        @foreach($sub_chapters[$chapter->id] as $sub_chapter)
                                                                            @if(!empty($sub_chapter))
                                                                                @php $quizUserData = Quiz::getQuizPercentage($sub_chapter['id'], true);
                                                                        $completion_count = isset( $quizUserData['completion_count'] )? $quizUserData['completion_count'] : 0;
                                                                        $topic_percentage = isset( $quizUserData['topic_percentage'] )? $quizUserData['topic_percentage'] : 0;

                                                                        $topic_percentage_flag = ( $topic_percentage >= 95 && $topic_percentage < 100)? '<img src="/assets/default/svgs/completion-flag.svg" alt="completion-flag">' : '';
                                                                        $topic_percentage_text = ($topic_percentage > 0 && $topic_percentage < 100)? '('.$topic_percentage.')' : '';

                                                                        $completion_counter = 1;
                                                                        while($completion_counter <= $completion_count){
                                                                            $topic_percentage_text .= '<img src="/assets/default/svgs/completion-star.svg" lat="completion-star">';
                                                                            $completion_counter++;
                                                                        }

                                                                        $topic_percentage_text .= $topic_percentage_flag;
                                                                                @endphp

                                                                                <tr>
                                                                                    <td data-label="{{ $chapter->title }}" class="px-15 py-20">
                                                                                        <div class="checkbox-field mb-0">
                                                                                            <label class="m-0 font-weight-bold">{{ $sub_chapter['title'] }} {!! $topic_percentage_text !!}</label>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td data-label="Mastery Level" class="px-15 py-20">
                                                                                <span>
                                                                                @if( $topic_percentage > 0)
                                                                                        <div class="rurera-progress-bar">
                                                                                        <span class="progress-inner" style="width: {{$topic_percentage}}%;"></span>
                                                                                    </div>
                                                                                    @else
                                                                                        -
                                                                                    @endif
                                                                                </span>
                                                                                    </td>
                                                                                    <td data-label="Last Seen" class="px-15 py-20">
                                                                                        <span>{{$sub_chapter['total_questions']}}</span>
                                                                                    </td>
                                                                                    <td data-label="Rersources" class="px-15 py-20">
                                                                                        <a href="#" class="video-btn mr-10">
                                                                                    <span class="icon-box">
                                                                                        <img src="/assets/default/svgs/play-video.svg" alt="play-video" title="Video">
                                                                                    </span>
                                                                                        </a>
                                                                                        <a href="#" class="file-btn">
                                                                                    <span class="icon-box">
                                                                                        <img src="/assets/default/svgs/filesheet.svg" alt="filesheet" title="Helpsheet">
                                                                                    </span>
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>

                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <div id="webinarReportModal" class="d-none">
        <h3 class="section-title after-line font-20 text-dark-blue">{{ trans('product.report_the_course') }}</h3>
        <form action="/course/{{ $course->id }}/report" method="post" class="mt-25">
            <div class="form-group">
                <label class="text-dark-blue font-16">{{ trans('product.reason') }}</label>
                <select id="reason" name="reason" class="form-control">
                    <option value="" selected disabled>{{ trans('product.select_reason') }}</option>
                    @foreach(getReportReasons() as $reason)
                        <option value="{{ $reason }}">{{ $reason }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label class="text-dark-blue font-16" for="message_to_reviewer">{{ trans('public.message_to_reviewer') }}</label>
                <textarea name="message" id="message_to_reviewer" class="form-control" rows="10"></textarea>
                <div class="invalid-feedback"></div>
            </div>
            <p class="text-gray font-16">{{ trans('product.report_modal_hint') }}</p>
            <div class="mt-30 d-flex align-items-center justify-content-end">
                <button type="button" class="js-course-report-submit btn btn-sm btn-primary">{{ trans('panel.report') }}</button>
                <button type="button" class="btn btn-sm btn-danger ml-10 close-swl">{{ trans('public.close') }}</button>
            </div>
        </form>
    </div>

    @include('web.default.course.share_modal')
    @include('web.default.course.buy_with_point_modal')



    <div class="modal fade subchapter-notes-modal" id="subchapter-notes-modal" tabindex="-1" aria-labelledby="subchapter-notes-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><a href="#"><span aria-hidden="true">×</span></a></button>
                <div class="modal-body">
                    <div class="subchapter-slider">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
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
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts_bottom')
    <script src="/assets/default/js/helpers.js"></script>
    <script src="/assets/default/js/parts/time-counter-down.min.js"></script>
    <script src="/assets/default/vendors/barrating/jquery.barrating.min.js"></script>
    <script src="/assets/default/vendors/video/video.min.js"></script>
    <script src="/assets/default/vendors/video/youtube.min.js"></script>
    <script src="/assets/default/vendors/video/vimeo.js"></script>
    <script src="/assets/default/vendors/swiper-slider/swiper-bundle.min.js"></script>

    <script>
        var webinarDemoLang = '{{ trans('webinars.webinar_demo') }}';
        var replyLang = '{{ trans('panel.reply') }}';
        var closeLang = '{{ trans('public.close') }}';
        var saveLang = '{{ trans('public.save') }}';
        var reportLang = '{{ trans('panel.report') }}';
        var reportSuccessLang = '{{ trans('panel.report_success') }}';
        var reportFailLang = '{{ trans('panel.report_fail') }}';
        var messageToReviewerLang = '{{ trans('public.message_to_reviewer') }}';
        var copyLang = '{{ trans('public.copy') }}';
        var copiedLang = '{{ trans('public.copied') }}';
        var learningToggleLangSuccess = '{{ trans('public.course_learning_change_status_success') }}';
        var learningToggleLangError = '{{ trans('public.course_learning_change_status_error') }}';
        var notLoginToastTitleLang = '{{ trans('public.not_login_toast_lang') }}';
        var notLoginToastMsgLang = '{{ trans('public.not_login_toast_msg_lang') }}';
        var notAccessToastTitleLang = '{{ trans('public.not_access_toast_lang') }}';
        var notAccessToastMsgLang = '{{ trans('public.not_access_toast_msg_lang') }}';
        var canNotTryAgainQuizToastTitleLang = '{{ trans('public.can_not_try_again_quiz_toast_lang') }}';
        var canNotTryAgainQuizToastMsgLang = '{{ trans('public.can_not_try_again_quiz_toast_msg_lang') }}';
        var canNotDownloadCertificateToastTitleLang = '{{ trans('public.can_not_download_certificate_toast_lang') }}';
        var canNotDownloadCertificateToastMsgLang = '{{ trans('public.can_not_download_certificate_toast_msg_lang') }}';
        var sessionFinishedToastTitleLang = '{{ trans('public.session_finished_toast_title_lang') }}';
        var sessionFinishedToastMsgLang = '{{ trans('public.session_finished_toast_msg_lang') }}';
        var sequenceContentErrorModalTitle = '{{ trans('update.sequence_content_error_modal_title') }}';
        var courseHasBoughtStatusToastTitleLang = '{{ trans('cart.fail_purchase') }}';
        var courseHasBoughtStatusToastMsgLang = '{{ trans('site.you_bought_webinar') }}';
        var courseNotCapacityStatusToastTitleLang = '{{ trans('public.request_failed') }}';
        var courseNotCapacityStatusToastMsgLang = '{{ trans('cart.course_not_capacity') }}';
        var courseHasStartedStatusToastTitleLang = '{{ trans('cart.fail_purchase') }}';
        var courseHasStartedStatusToastMsgLang = '{{ trans('update.class_has_started') }}';

    </script>

    <script src="/assets/default/js/parts/comment.min.js"></script>
    <script src="/assets/default/js/parts/video_player_helpers.min.js"></script>
    <script src="/assets/default/js/parts/webinar_show.min.js"></script>
    <script src="/assets/default/vendors/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
    @if (!auth()->subscription('courses'))
        <script>
            if( $(".subscription-modal").length > 0){
                $(".subscription-modal").modal('show');
            }
        </script>
    @endif

    <script>
        $(document).on('click', '.view-change-btn', function (e) {

            $(".view-change-btn").removeClass('active');
            $(this).addClass('active');
            var view_chapter = $(this).attr('data-type');
            $(".chapter-views").addClass('rurera-hide');
            $(".chapter-views."+view_chapter).removeClass('rurera-hide');
        });

        /*percent circle function start*/
        $(document).ready(function () {
            $(".chapter_percent").each(function() {
                var $this = $(this),
                    $dataV = $this.data("percent"),
                    $dataDeg = $dataV * 3.6,
                    $round = $this.find(".round_per");
                $round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)");
                $this.append('<div class="circle_inbox"><span class="percent_text"></span></div>');
                $this.prop('Counter', 0).animate({Counter: $dataV},
                    {
                        duration: 2000,
                        easing: 'swing',
                        step: function (now) {
                            $this.find(".percent_text").text(Math.ceil(now)+'%');
                        }
                    });
                if($dataV >= 51){
                    $round.css("transform", "rotate(" + 360 + "deg)");
                    setTimeout(function(){
                        $this.addClass("percent_more");
                    },1000);
                    setTimeout(function(){
                        $round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)");
                    },1000);
                }
            });
        });
        /*percent circle function end*/
    </script>
    <script>
        let subchapterSwiper;

        $('#subchapter-notes-modal').on('shown.bs.modal', function () {

            if (!subchapterSwiper) {
                subchapterSwiper = new Swiper('.subchapter-slider .swiper-container', {
                    centeredSlides: true,
                    slideToClickedSlide: true,
                    loop: false,
                    slidesPerView: 3,
                    spaceBetween: 0,

                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    },

                    pagination: {
                        el: '.swiper-pagination',
                        type: 'progressbar'
                    },

                    breakpoints: {
                        320: {
                            slidesPerView: 1,
                            spaceBetween: 0,
                            centeredSlides: true
                        },
                        480: {
                            slidesPerView: 1,
                            spaceBetween: 0,
                            centeredSlides: true
                        },
                        640: {
                            slidesPerView: 3,
                            spaceBetween: 0,
                            centeredSlides: true
                        }
                    }
                });
            } else {
                subchapterSwiper.update();
            }

        });

        $(document).on('click', '.debug-details-btn', function (e) {
            $(this).closest('li').find('.debug-details').toggleClass('rurera-hide');
        });

    </script>

@endpush
