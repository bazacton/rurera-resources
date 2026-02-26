@extends('web.default.panel.layouts.panel_layout')
@php use App\Models\Quiz; @endphp

@push('styles_top')
    <link rel="stylesheet" href="/assets/default/css/css-stars.css">
    <link rel="stylesheet" href="/assets/default/vendors/swiper-slider/swiper-bundle.min.css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
@endpush

@section('content')
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
            <div class="lms-chapter-area">
                <div class="panel-stats" style="background:{{(isset( $course->learn_background_color ) && $course->learn_background_color != '')? $course->learn_background_color : '#ffff'}}">
                    <div class="stats-user">
                        <h2 class="font-22 mb-0 text-uppercase">{{ $course->title }}</h2>
                    </div>
                    @if(isset( $course->learn_icon ) && $course->learn_icon != '')
                        <div class="course-icon"><img src="{{$course->learn_icon}}" alt="course-icon" width="150" height="150"></div>
                    @endif
                    <div class="stats-list">
                        <ul>
                            <li>
                                <div class="list-box">
                                    <strong class="font-19 font-weight-bold">{{$course->chapters->count()}}</strong>
                                    <span class="font-14">Units</span>
                                </div>
                            </li>
                            <li>
                                <div class="list-box">
                                    <strong class="font-19 font-weight-bold">{{$course->webinar_sub_chapters->count()}}</strong>
                                    <span class="font-14">Lessons</span>
                                </div>
                            </li>
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



                <div class="rurera-topics-search">
                    <div class="topic-search-area panel-border bg-white rounded-sm mb-25">
                        <div class="input-field">
                            <img src="/assets/default/svgs/search2.svg" alt="" aria-hidden="true">
                            <span class="search-clear">&times;</span>
                            <input type="text" id="search" placeholder="Search..." class="search-field">
                            <div class="search-results-box">
                                <div class="search-results" id="search-results"></div>
                            </div>
                        </div>
                        <div class="chapter-nav mb-0">
                            <ul class="font-14 font-weight-500">
                                @foreach($course->chapters as $chapter)
                                    @if((!empty($chapter->chapterItems) and count($chapter->chapterItems)) or (!empty($chapter->quizzes) and count($chapter->quizzes)))
                                        <li><a href="#subject_{{$chapter->id}}">{{ $chapter->title}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="chapter-views chapters-short-view">
                        <div class="accordion-content-wrapper" id="chaptersAccordion" role="tablist" aria-multiselectable="true">
                            <ul class="lms-chapter-ul font-14 font-weight-500" id="accordion">
                                @foreach($course->chapters as $chapter)

                                    <li id="subject_{{isset($chapter->id)? $chapter->id: 0}}">
                                        <h3 class="mb-10 font-14 font-weight-bold">{{ $chapter->title }} <span class="total-sub-topics"><em>{{$chapter->ChapterYearTopicParts->count()}}</em> Topics</span></h3>
                                        @if($chapter->ChapterYearTopicParts->count() > 0)
                                            <div class="lms-chapter-ul-outer">
                                                @foreach($chapter->ChapterYearTopicParts as $topicPartObj)

                                                    @php

                                                        $total_completion = 0;
                                                        $chapter_slug = $chapter->chapter_slug;
                                                        $quizObj = isset($topicPartObj->partQuiz)? $topicPartObj->partQuiz : (object) array();

                                                        $slug = isset($topicPartObj->slug)? $topicPartObj->slug : '';

                                                        $topicPerformData = Quiz::getQuizPercentage($quizObj->id, true);
                                                        $total_completion = isset($topicPerformData['topic_completion'])? $topicPerformData['topic_completion'] : 0;
                                                        $topic_accuracy = isset($topicPerformData['topic_accuracy'])? $topicPerformData['topic_accuracy'] : 0;

                                                        $sas_score = isset($topicPerformData['sas_score'])? $topicPerformData['sas_score'] : 0;
                                                        $sas_accuracy = isset($topicPerformData['sas_accuracy'])? $topicPerformData['sas_accuracy'] : 0;
                                                        $smart_score = isset($topicPerformData['smart_score'])? $topicPerformData['smart_score'] : 0;


                                                        $tier1_incorrects = isset($topicPerformData['tier1_incorrects'])? $topicPerformData['tier1_incorrects'] : 0;
                                                        $tier2_incorrects = isset($topicPerformData['tier2_incorrects'])? $topicPerformData['tier2_incorrects'] : 0;
                                                        $tier3_incorrects = isset($topicPerformData['tier3_incorrects'])? $topicPerformData['tier3_incorrects'] : 0;

                                                        $user_difficulty_level = isset($topicPerformData['user_difficulty_level'])? $topicPerformData['user_difficulty_level'] : '';

                                                        $completion_class = 'accuracy-not-started';
                                                        $completion_class = ($smart_score > 0)? 'accuracy-practice-needed' : $completion_class;
                                                        $completion_class = ($smart_score > 39)? 'accuracy-good' : $completion_class;
                                                        $completion_class = ($smart_score > 59)? 'accuracy-very-good' : $completion_class;
                                                        $completion_class = ($smart_score > 79)? 'accuracy-excellent' : $completion_class;


                                                        $completion_title = 'Not Started';
                                                        $completion_title = ($smart_score > 0)? 'Practice Needed' : $completion_title;
                                                        $completion_title = ($smart_score > 39)? 'Good' : $completion_title;
                                                        $completion_title = ($smart_score > 59)? 'Very Good' : $completion_title;
                                                        $completion_title = ($smart_score > 79)? 'Excellent' : $completion_title;


                                                        $completion_icon = 'above_0';
                                                        $completion_icon = ($smart_score > 0)? 'above_25' : $completion_icon;
                                                        $completion_icon = ($smart_score > 39)? 'above_50' : $completion_icon;
                                                        $completion_icon = ($smart_score > 59)? 'above_80' : $completion_icon;
                                                        $completion_icon = ($smart_score > 79)? 'above_80' : $completion_icon;

                                                        //$total_completion = 40;
                                                    @endphp
                                                    <div class="chapter-card">
                                                        <a href="#" class="{{ subscriptionCheckLink('courses') }} collapsed" data-toggle="collapse" data-target="#collapse{{$topicPartObj->id}}" aria-expanded="true">{{ $topicPartObj->title }} {{($smart_score > 0)? '('.$smart_score.')' : ''}}
                                                            <span class="topic-accuracy {{$completion_class}}" data-title="{{$completion_title}}"><img src="/assets/default/svgs/{{$completion_icon}}.svg"></span>                                                                                </a>
                                                        <div id="collapse{{$topicPartObj->id}}" class="collapse" data-parent="#accordion">
                                                            <ul class="chapter-tags">
                                                                <li>
                                                                    <a href="javascript:;" data-topic_part_id="{{$topicPartObj->id}}" class="course-learn-btn" data-toggle="modal" data-target="#subchapter-notes-modal">Learn Concepts</a>
                                                                </li>
                                                                <li>
                                                                    <a href="/{{$course->slug}}/{{$category_slug}}/{{$chapter_slug}}/{{$slug}}/practice-skills" class="course-practice-btn">Practice Skills</a>
                                                                </li>
                                                                <li>
                                                                    <a href="/{{$course->slug}}/{{$category_slug}}/{{$chapter_slug}}/{{$slug}}/skill-summary" class="course-progress-btn">Skill Summary</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;" class="debug-details-btn">Debug Details</a>
                                                                    <div class="debug-details rurera-hide">
                                                                        <span class="debug-detail-item">Part ID: <span>{{$topicPartObj->id}}</span></span>
                                                                        <span class="debug-detail-item">Quiz ID: <span>{{$quizObj->id}}</span></span>
                                                                        <span class="debug-detail-item">Difficulty Level: <span>{{$user_difficulty_level}}</span></span>
                                                                        <span class="debug-detail-item">Accuracy: <span>{{$topic_accuracy}}</span></span>
                                                                        <span class="debug-detail-item">Completion: <span>{{$total_completion}}</span></span>
                                                                        <span class="debug-detail-item">SAS Score: <span>{{$sas_score}}</span></span>
                                                                        <span class="debug-detail-item">SAS Accuracy: <span>{{$sas_accuracy}}%</span></span>
                                                                        <span class="debug-detail-item">Smart Score: <span>{{$smart_score}}</span></span>
                                                                        <span class="debug-detail-item">Tier 1 Incorrects: <span>{{$tier1_incorrects}}</span></span>
                                                                        <span class="debug-detail-item">Tier 2 Incorrects: <span>{{$tier2_incorrects}}</span></span>
                                                                        <span class="debug-detail-item">Tier 3 Incorrects: <span>{{$tier3_incorrects}}</span></span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        @php $total_completion = rand(0,100);

                                                    $completion_class = 'smartscore-not-started';
                                                    $completion_class = ($total_completion > 0)? 'smartscore-practice-needed' : $completion_class;
                                                    $completion_class = ($total_completion > 39)? 'smartscore-good' : $completion_class;
                                                    $completion_class = ($total_completion > 59)? 'smartscore-very-good' : $completion_class;
                                                    $completion_class = ($total_completion > 79)? 'smartscore-excellent' : $completion_class;
                                                        @endphp

                                                        <div class="percent-holder rurera-hide">
                                                            <div class="chapter_percent circle-blue {{$completion_class}}" data-percent="{{$total_completion}}">
                                                                <div class="circle_inner">
                                                                    <div class="round_per"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="seg-progress">
                                                            <div class="seg-fill {{$completion_class}} width_{{$total_completion}}" title="Smart Score: {{$total_completion}}"></div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="chapter-views chapters-detail-view rurera-hide">
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
                                                                <span class="progress-inner width_{{$topic_percentage}}" ></span>
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
        </section>
    </div>
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



    <!-- <div class="modal fade subchapter-notes-modal" id="subchapter-notes-modal" tabindex="-1" aria-labelledby="subchapter-notes-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><a href="#"><span aria-hidden="true">×</span></a></button>
                <div class="modal-body learn-concept-data">

                    <div class="slider-shell">
                        <div class="top-track d-flex align-items-center">
                            <div class="track w-100 d-flex">
                                <span class="seg"></span>
                                <span class="seg"></span>
                                <span class="seg"></span>
                                <span class="seg"></span>
                                <span class="seg"></span>
                                <span class="seg"></span>
                                <span class="seg"></span>
                                <span class="seg"></span>
                                <span class="seg"></span>
                                <span class="seg"></span>
                            </div>
                        </div>
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="p-4">
                                        <div class="row align-items-center">
                                            <div class="col-md-5 mb-4 mb-md-0">
                                                <div class="media-card">
                                                    <img class="img-fluid" src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=1200&auto=format&fit=crop" alt="slide visual">
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <h2 class="title mb-3">Understanding Workplace Conflict</h2>
                                                <p class="lead-desc mb-5">Conflict is inevitable, but it doesn’t have to be destructive! Explore the nature of workplace conflict. Learn to recognize different types of conflict and understand their potential impact on team dynamics and productivity. See conflict not as a roadblock, but as a chance for innovation!</p>
                                                <div class="d-flex justify-content-center mt-3">
                                                    <button class="btn btn-primary continue-btn-intro">Next Slide</button>
                                                </div>
                                                <div class="d-flex justify-content-end align-items-center">
                                                    <div class="swiper-button-prev nav-btn"></div>
                                                    <div class="swiper-button-next nav-btn ml-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="p-4">
                                        <div class="slide-scroll">
                                            <h2 class="title mb-4">Common Sources of Conflict</h2>
                                            <div id="conflictAccordion" class="accordion">
                                                <div class="card item">
                                                    <div class="card-header p-0" id="h1">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link btn-block text-left item-btn" data-toggle="collapse" data-target="#c1" aria-expanded="false" aria-controls="c1">
                                                                <span class="plus">+</span>
                                                                <span>Differences in Work Styles</span>
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="c1" class="collapse" data-parent="#conflictAccordion">
                                                        <div class="card-body">People approach tasks differently, which can cause friction.</div>
                                                    </div>
                                                </div>
                                                <div class="card item">
                                                    <div class="card-header p-0" id="h2">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link btn-block text-left item-btn" data-toggle="collapse" data-target="#c2" aria-expanded="false" aria-controls="c2">
                                                                <span class="plus">+</span>
                                                                <span>Disagreements on Tasks or Priorities</span>
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="c2" class="collapse" data-parent="#conflictAccordion">
                                                        <div class="card-body">Unclear ownership and changing priorities can trigger disputes.</div>
                                                    </div>
                                                </div>
                                                <div class="card item">
                                                    <div class="card-header p-0" id="h3">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link btn-block text-left item-btn" data-toggle="collapse" data-target="#c3" aria-expanded="false" aria-controls="c3">
                                                                <span class="plus">+</span>
                                                                <span>Organizational Change</span>
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="c3" class="collapse" data-parent="#conflictAccordion">
                                                        <div class="card-body">New processes, tools, or roles can create uncertainty.</div>
                                                    </div>
                                                </div>
                                                <div class="card item">
                                                    <div class="card-header p-0" id="h4">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link btn-block text-left item-btn" data-toggle="collapse" data-target="#c4" aria-expanded="false" aria-controls="c4">
                                                                <span class="plus">+</span>
                                                                <span>Lack of Support or Recognition</span>
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="c4" class="collapse" data-parent="#conflictAccordion">
                                                        <div class="card-body">Insufficient feedback or recognition can reduce morale.</div>
                                                    </div>
                                                </div>
                                                <div class="card item">
                                                    <div class="card-header p-0" id="h5">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link btn-block text-left item-btn" data-toggle="collapse" data-target="#c5" aria-expanded="false" aria-controls="c5">
                                                                <span class="plus">+</span>
                                                                <span>Competition</span>
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="c5" class="collapse" data-parent="#conflictAccordion">
                                                        <div class="card-body">Scarcity of opportunities can lead to unhelpful rivalry.</div>
                                                    </div>
                                                </div>
                                                <div class="card item">
                                                    <div class="card-header p-0" id="h6">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link btn-block text-left item-btn" data-toggle="collapse" data-target="#c6" aria-expanded="false" aria-controls="c6">
                                                                <span class="plus">+</span>
                                                                <span>Communication Gaps</span>
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="c6" class="collapse" data-parent="#conflictAccordion">
                                                        <div class="card-body">Missing context or assumptions often create misunderstandings.</div>
                                                    </div>
                                                </div>
                                                <div class="card item">
                                                    <div class="card-header p-0" id="h7">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link btn-block text-left item-btn" data-toggle="collapse" data-target="#c7" aria-expanded="false" aria-controls="c7">
                                                                <span class="plus">+</span>
                                                                <span>Resource Constraints</span>
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="c7" class="collapse" data-parent="#conflictAccordion">
                                                        <div class="card-body">Limited time or budget can heighten tensions between teams.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mt-3">
                                            <button class="btn btn-primary continue-btn-acc">Continue</button>
                                        </div>
                                        <div class="d-flex justify-content-end align-items-center mt-4">
                                            <div class="swiper-button-prev nav-btn prev-only"></div>
                                            <div class="step-pill ml-2">
                                                <button class="pill-prev" type="button" aria-label="Previous">‹</button>
                                                <span class="divider"></span>
                                                <span id="countDisplay">0/7</span>
                                                <span class="divider"></span>
                                                <button class="pill-next" type="button" aria-label="Next">›</button>
                                            </div>
                                            <div class="swiper-button-next nav-btn ml-2 main-next-acc d-none"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="p-4">
                                        <div class="slide-scroll">
                                            <h2 class="title mb-4">Your Conflict Resolution Style</h2>
                                            <div class="flash-deck">
                                                <div class="flash-card active">
                                                    <div class="flash-body">Do you Confront or Avoid?</div>
                                                    <button class="flip-btn" type="button">↻</button>
                                                </div>
                                                <div class="flash-card">
                                                    <div class="flash-body">Do you engage directly to find a solution, or do you avoid conflict?</div>
                                                    <button class="flip-btn" type="button">↻</button>
                                                </div>
                                                <div class="flash-card">
                                                    <div class="flash-body">How do you respond when deadlines create pressure?</div>
                                                    <button class="flip-btn" type="button">↻</button>
                                                </div>
                                                <div class="flash-card">
                                                    <div class="flash-body">Do you prefer collaboration or independent decision-making?</div>
                                                    <button class="flip-btn" type="button">↻</button>
                                                </div>
                                                <div class="flash-card">
                                                    <div class="flash-body">What do you value more: speed or consensus?</div>
                                                    <button class="flip-btn" type="button">↻</button>
                                                </div>
                                                <div class="flash-card">
                                                    <div class="flash-body">Do you seek feedback proactively or wait for it?</div>
                                                    <button class="flip-btn" type="button">↻</button>
                                                </div>
                                                <div class="flash-card">
                                                    <div class="flash-body">How do you de-escalate when emotions rise?</div>
                                                    <button class="flip-btn" type="button">↻</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mt-3">
                                            <button class="btn btn-primary continue-btn-flash">Continue</button>
                                        </div>
                                        <div class="d-flex justify-content-end align-items-center mt-4">
                                            <div class="swiper-button-prev nav-btn prev-only"></div>
                                            <div class="step-pill ml-2">
                                                <button class="pill-prev pill-prev-flash" type="button" aria-label="Previous">‹</button>
                                                <span class="divider"></span>
                                                <span id="flashCount">0/7</span>
                                                <span class="divider"></span>
                                                <button class="pill-next pill-next-flash" type="button" aria-label="Next">›</button>
                                            </div>
                                            <div class="swiper-button-next nav-btn ml-2 main-next-flash d-none"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="p-4">
                                        <div class="slide-scroll">
                                            <h2 class="title mb-4">Action Plan for Conflict Resolution</h2>
                                            <ul class="plan-list list-unstyled">
                                                <li class="plan-item"><span class="chk"></span><span class="txt">Identify potential conflicts early to address them proactively. Take action now! This will make resolution easier. Act today!</span></li>
                                                <li class="plan-item"><span class="chk"></span><span class="txt">Actively listen to all perspectives involved in the conflict. Hear the other side! You never know when they might surprise you.</span></li>
                                                <li class="plan-item"><span class="chk"></span><span class="txt">Practice empathy to understand the emotions and needs of others. Put yourself in their shoes to see another perspective.</span></li>
                                                <li class="plan-item"><span class="chk"></span><span class="txt">Use “I” statements to communicate your feelings and needs constructively. Be respectful of everyone. Your feelings matter!</span></li>
                                                <li class="plan-item"><span class="chk"></span><span class="txt">Brainstorm solutions collaboratively, seeking win-win outcomes. Everyone deserves to win in the end! Work together to make sure everyone wins.</span></li>
                                                <li class="plan-item"><span class="chk"></span><span class="txt">Implement the agreed-upon solution and monitor its effectiveness. Follow up often! Stay flexible and change the plan if necessary.</span></li>
                                                <li class="plan-item"><span class="chk"></span><span class="txt">Regularly assess team dynamics, offering support and encouragement. Support each other. Growth is a key aspect of a healthy work environment.</span></li>
                                            </ul>
                                        </div>
                                        <div class="d-flex justify-content-center mt-3">
                                            <button class="btn btn-primary continue-btn-plan">Continue</button>
                                        </div>
                                        <div class="d-flex justify-content-end align-items-center mt-4">
                                            <div class="swiper-button-prev nav-btn prev-only"></div>
                                            <div class="step-pill ml-2">
                                                <button class="pill-prev pill-prev-plan" type="button" aria-label="Previous">‹</button>
                                                <span class="divider"></span>
                                                <span id="planCount">0/7</span>
                                                <span class="divider"></span>
                                                <button class="pill-next pill-next-plan" type="button" aria-label="Next">›</button>
                                            </div>
                                            <div class="swiper-button-next nav-btn ml-2 main-next-plan d-none"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="p-4">
                                        <div class="slide-scroll">
                                            <h2 class="title mb-4">Which actions contribute to an inclusive workplace?</h2>
                                            <p class="lead-desc mb-3">(Select all that apply)</p>
                                            <ul class="select-list list-unstyled">
                                                <li class="select-item"><span class="chk"></span><span class="txt">Promoting stereotypes.</span></li>
                                                <li class="select-item"><span class="chk"></span><span class="txt">Ignoring microaggressions.</span></li>
                                                <li class="select-item"><span class="chk"></span><span class="txt">Actively listening to diverse perspectives.</span></li>
                                                <li class="select-item"><span class="chk"></span><span class="txt">Advocating for equitable policies.</span></li>
                                            </ul>
                                        </div>
                                        <div class="d-flex justify-content-center mt-3">
                                            <button class="btn btn-primary continue-btn-select" disabled>Continue</button>
                                        </div>
                                        <div class="d-flex justify-content-end align-items-center mt-4">
                                            <div class="swiper-button-prev nav-btn prev-only"></div>
                                            <div class="step-pill ml-2">
                                                <span id="selectCount">0/4</span>
                                            </div>
                                            <div class="swiper-button-next nav-btn ml-2 main-next-select d-none"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="p-4">
                                        <div class="slide-scroll">
                                            <h2 class="title mb-4">Reveal Sections Sequentially</h2>
                                            <ul class="reveal-list list-unstyled">
                                                <li class="reveal-item"><div class="box">Step 1: Introduction to policy.</div></li>
                                                <li class="reveal-item"><div class="box">Step 2: Key responsibilities.</div></li>
                                                <li class="reveal-item"><div class="box">Step 3: Escalation process.</div></li>
                                            </ul>
                                        </div>
                                        <div class="d-flex justify-content-center mt-3">
                                            <button class="btn btn-primary continue-btn-reveal">Continue</button>
                                        </div>
                                        <div class="d-flex justify-content-end align-items-center mt-4">
                                            <div class="swiper-button-prev nav-btn prev-only"></div>
                                            <div class="step-pill ml-2">
                                                <button class="pill-prev pill-prev-reveal" type="button" aria-label="Previous">‹</button>
                                                <span class="divider"></span>
                                                <span id="revealCount">0/3</span>
                                                <span class="divider"></span>
                                                <button class="pill-next pill-next-reveal" type="button" aria-label="Next">›</button>
                                            </div>
                                            <div class="swiper-button-next nav-btn ml-2 main-next-reveal d-none"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="p-4">
                                        <div class="slide-scroll">
                                            <h2 class="title mb-2">Question</h2>
                                            <p class="lead-desc mb-3">How should a team handle recurring delays? (Reveal points one by one)</p>
                                            <ul class="reveal-list reveal-qa list-unstyled">
                                                <li class="reveal-item"><div class="box">A) Identify root causes with a blameless retrospective.</div></li>
                                                <li class="reveal-item"><div class="box">B) Re-align priorities and remove blockers transparently.</div></li>
                                                <li class="reveal-item"><div class="box">C) Set clear ownership and track outcomes.</div></li>
                                            </ul>
                                        </div>
                                        <div class="d-flex justify-content-center mt-3">
                                            <button class="btn btn-primary continue-btn-revealq">Continue</button>
                                        </div>
                                        <div class="d-flex justify-content-end align-items-center mt-4">
                                            <div class="swiper-button-prev nav-btn prev-only"></div>
                                            <div class="step-pill ml-2">
                                                <button class="pill-prev pill-prev-revealq" type="button" aria-label="Previous">‹</button>
                                                <span class="divider"></span>
                                                <span id="revealQCount">0/3</span>
                                                <span class="divider"></span>
                                                <button class="pill-next pill-next-revealq" type="button" aria-label="Next">›</button>
                                            </div>
                                            <div class="swiper-button-next nav-btn ml-2 main-next-revealq d-none"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide fib-slide">
                                    <div class="p-4">
                                        <div class="slide-scroll">
                                            <h2 class="title mb-2">Fill in the Blanks</h2>
                                            <p class="lead-desc mb-3">Next press par pehle Question reveal hoga, phir neeche second question, aur phir fields sequentially fill hongi.</p>
                                            <div class="fib-list">
                                                <div class="fib-item">
                                                    <div class="q mb-2">Team should ____ blockers and ____ priorities.</div>
                                                    <div class="inputs d-flex">
                                                        <input class="form-control fib-input mr-2" data-answer="address" placeholder="_______" />
                                                        <input class="form-control fib-input" data-answer="reprioritize" placeholder="_______" />
                                                    </div>
                                                </div>
                                                <div class="fib-item">
                                                    <div class="q mb-2">Retrospective helps ____ causes and ____ actions.</div>
                                                    <div class="inputs d-flex">
                                                        <input class="form-control fib-input mr-2" data-answer="identify" placeholder="_______" />
                                                        <input class="form-control fib-input" data-answer="commit" placeholder="_______" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mt-3">
                                            <button class="btn btn-primary continue-btn-fib">Continue</button>
                                        </div>
                                        <div class="d-flex justify-content-end align-items-center mt-4">
                                            <div class="swiper-button-prev nav-btn prev-only"></div>
                                            <div class="step-pill ml-2">
                                                <button class="pill-prev pill-prev-fib" type="button" aria-label="Previous">‹</button>
                                                <span class="divider"></span>
                                                <span id="fibCount">0/6</span>
                                                <span class="divider"></span>
                                                <button class="pill-next pill-next-fib" type="button" aria-label="Next">›</button>
                                            </div>
                                            <div class="swiper-button-next nav-btn ml-2 main-next-fib d-none"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide frame-slide" data-initial="5" data-increments="2,2">
                                    <div class="p-4">
                                        <div class="slide-scroll">
                                            <h2 class="title mb-2">Bar models can be used with 10s frames.</h2>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="frame-text">
                                                        <p class="oneline t1 d-none"><strong>First</strong> there were<br>5 frogs on a log.</p>
                                                        <p class="oneline t2 d-none"><strong>Then</strong> 2 more<br>frogs jump on.</p>
                                                        <p class="oneline t3 d-none"><strong>Then</strong> 2 more<br>frogs jump on.</p>
                                                        <p class="oneline tNow d-none"><strong>Now</strong> there are<br>9 frogs on the log.</p>
                                                    </div>
                                                    <div class="ten-frame">
                                                        <div class="cell"><span class="dot blue d-none"></span></div>
                                                        <div class="cell"><span class="dot blue d-none"></span></div>
                                                        <div class="cell"><span class="dot blue d-none"></span></div>
                                                        <div class="cell"><span class="dot blue d-none"></span></div>
                                                        <div class="cell"><span class="dot blue d-none"></span></div>
                                                        <div class="cell"><span class="dot red d-none"></span></div>
                                                        <div class="cell"><span class="dot red d-none"></span></div>
                                                        <div class="cell"><span class="dot green d-none"></span></div>
                                                        <div class="cell"><span class="dot green d-none"></span></div>
                                                        <div class="cell"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="bar-model">
                                                        <div class="bar-top"><span class="num num-total d-none">9</span></div>
                                                        <div class="bar-bottom">
                                                            <div class="seg seg-left"><span class="num d-none">5</span></div>
                                                            <div class="seg seg-mid"><span class="num d-none">2</span></div>
                                                            <div class="seg seg-right"><span class="num d-none">2</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mt-3">
                                            <button class="btn btn-primary continue-btn-frame">Continue</button>
                                        </div>
                                        <div class="d-flex justify-content-end align-items-center mt-4">
                                            <div class="swiper-button-prev nav-btn prev-only"></div>
                                            <div class="step-pill ml-2">
                                                <button class="pill-prev pill-prev-frame" type="button" aria-label="Previous">‹</button>
                                                <span class="divider"></span>
                                                <span id="frameCount">0/5</span>
                                                <span class="divider"></span>
                                                <button class="pill-next pill-next-frame" type="button" aria-label="Next">›</button>
                                            </div>
                                            <div class="swiper-button-next nav-btn ml-2 main-next-frame d-none"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="modal fade subchapter-notes-modal" id="subchapter-notes-modal" tabindex="-1" role="dialog" aria-labelledby="fullscreenLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="fullscreenLabel">Full Screen Modal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <div class="container py-4">
                <div class="slider-shell">
                <div class="top-track d-flex align-items-center">
                    <div class="track w-100 d-flex">
                    <span class="seg"></span>
                    <span class="seg"></span>
                    <span class="seg"></span>
                    <span class="seg"></span>
                    <span class="seg"></span>
                    <span class="seg"></span>
                    <span class="seg"></span>
                    <span class="seg"></span>
                    <span class="seg"></span>
                    <span class="seg"></span>
                    </div>
                </div>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="p-4">
                        <div class="row align-items-center">
                            <div class="col-md-5 mb-4 mb-md-0">
                            <div class="media-card">
                                <img class="img-fluid" src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=1200&auto=format&fit=crop" alt="slide visual">
                            </div>
                            </div>
                            <div class="col-md-7">
                            <h2 class="title mb-3">Understanding Workplace Conflict</h2>
                            <p class="lead-desc mb-5">Conflict is inevitable, but it doesn’t have to be destructive! Explore the nature of workplace conflict. Learn to recognize different types of conflict and understand their potential impact on team dynamics and productivity. See conflict not as a roadblock, but as a chance for innovation!</p>
                            <div class="d-flex justify-content-center mt-3">
                                <button class="btn btn-primary continue-btn-intro">Next Slide</button>
                            </div>
                            <div class="d-flex justify-content-end align-items-center">
                                <div class="swiper-button-prev nav-btn"></div>
                                <div class="swiper-button-next nav-btn ml-2"></div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="p-4">
                        <div class="slide-scroll">
                            <h2 class="title mb-4">Common Sources of Conflict</h2>
                            <div id="conflictAccordion" class="accordion">
                            <div class="card item">
                            <div class="card-header p-0" id="h1">
                                <h5 class="mb-0">
                                <button class="btn btn-link btn-block text-left item-btn" data-toggle="collapse" data-target="#c1" aria-expanded="false" aria-controls="c1">
                                    <span class="plus">+</span>
                                    <span>Differences in Work Styles</span>
                                </button>
                                </h5>
                            </div>
                            <div id="c1" class="collapse" data-parent="#conflictAccordion">
                                <div class="card-body">People approach tasks differently, which can cause friction.</div>
                            </div>
                            </div>
                            <div class="card item">
                            <div class="card-header p-0" id="h2">
                                <h5 class="mb-0">
                                <button class="btn btn-link btn-block text-left item-btn" data-toggle="collapse" data-target="#c2" aria-expanded="false" aria-controls="c2">
                                    <span class="plus">+</span>
                                    <span>Disagreements on Tasks or Priorities</span>
                                </button>
                                </h5>
                            </div>
                            <div id="c2" class="collapse" data-parent="#conflictAccordion">
                                <div class="card-body">Unclear ownership and changing priorities can trigger disputes.</div>
                            </div>
                            </div>
                            <div class="card item">
                            <div class="card-header p-0" id="h3">
                                <h5 class="mb-0">
                                <button class="btn btn-link btn-block text-left item-btn" data-toggle="collapse" data-target="#c3" aria-expanded="false" aria-controls="c3">
                                    <span class="plus">+</span>
                                    <span>Organizational Change</span>
                                </button>
                                </h5>
                            </div>
                            <div id="c3" class="collapse" data-parent="#conflictAccordion">
                                <div class="card-body">New processes, tools, or roles can create uncertainty.</div>
                            </div>
                            </div>
                            <div class="card item">
                            <div class="card-header p-0" id="h4">
                                <h5 class="mb-0">
                                <button class="btn btn-link btn-block text-left item-btn" data-toggle="collapse" data-target="#c4" aria-expanded="false" aria-controls="c4">
                                    <span class="plus">+</span>
                                    <span>Lack of Support or Recognition</span>
                                </button>
                                </h5>
                            </div>
                            <div id="c4" class="collapse" data-parent="#conflictAccordion">
                                <div class="card-body">Insufficient feedback or recognition can reduce morale.</div>
                            </div>
                            </div>
                            <div class="card item">
                            <div class="card-header p-0" id="h5">
                                <h5 class="mb-0">
                                <button class="btn btn-link btn-block text-left item-btn" data-toggle="collapse" data-target="#c5" aria-expanded="false" aria-controls="c5">
                                    <span class="plus">+</span>
                                    <span>Competition</span>
                                </button>
                                </h5>
                            </div>
                            <div id="c5" class="collapse" data-parent="#conflictAccordion">
                                <div class="card-body">Scarcity of opportunities can lead to unhelpful rivalry.</div>
                            </div>
                            </div>
                            <div class="card item">
                            <div class="card-header p-0" id="h6">
                                <h5 class="mb-0">
                                <button class="btn btn-link btn-block text-left item-btn" data-toggle="collapse" data-target="#c6" aria-expanded="false" aria-controls="c6">
                                    <span class="plus">+</span>
                                    <span>Communication Gaps</span>
                                </button>
                                </h5>
                            </div>
                            <div id="c6" class="collapse" data-parent="#conflictAccordion">
                                <div class="card-body">Missing context or assumptions often create misunderstandings.</div>
                            </div>
                            </div>
                            <div class="card item">
                            <div class="card-header p-0" id="h7">
                                <h5 class="mb-0">
                                <button class="btn btn-link btn-block text-left item-btn" data-toggle="collapse" data-target="#c7" aria-expanded="false" aria-controls="c7">
                                    <span class="plus">+</span>
                                    <span>Resource Constraints</span>
                                </button>
                                </h5>
                            </div>
                            <div id="c7" class="collapse" data-parent="#conflictAccordion">
                                <div class="card-body">Limited time or budget can heighten tensions between teams.</div>
                            </div>
                            </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button class="btn btn-primary continue-btn-acc">Continue</button>
                        </div>
                        <div class="d-flex justify-content-end align-items-center mt-4">
                            <div class="swiper-button-prev nav-btn prev-only"></div>
                            <div class="step-pill ml-2">
                            <button class="pill-prev" type="button" aria-label="Previous">‹</button>
                            <span class="divider"></span>
                            <span id="countDisplay">0/7</span>
                            <span class="divider"></span>
                            <button class="pill-next" type="button" aria-label="Next">›</button>
                            </div>
                            <div class="swiper-button-next nav-btn ml-2 main-next-acc d-none"></div>
                        </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="p-4">
                        <div class="slide-scroll">
                            <h2 class="title mb-4">Your Conflict Resolution Style</h2>
                            <div class="flash-deck">
                            <div class="flash-card active">
                            <div class="flash-body">Do you Confront or Avoid?</div>
                            <button class="flip-btn" type="button">↻</button>
                            </div>
                            <div class="flash-card">
                            <div class="flash-body">Do you engage directly to find a solution, or do you avoid conflict?</div>
                            <button class="flip-btn" type="button">↻</button>
                            </div>
                            <div class="flash-card">
                            <div class="flash-body">How do you respond when deadlines create pressure?</div>
                            <button class="flip-btn" type="button">↻</button>
                            </div>
                            <div class="flash-card">
                            <div class="flash-body">Do you prefer collaboration or independent decision-making?</div>
                            <button class="flip-btn" type="button">↻</button>
                            </div>
                            <div class="flash-card">
                            <div class="flash-body">What do you value more: speed or consensus?</div>
                            <button class="flip-btn" type="button">↻</button>
                            </div>
                            <div class="flash-card">
                            <div class="flash-body">Do you seek feedback proactively or wait for it?</div>
                            <button class="flip-btn" type="button">↻</button>
                            </div>
                            <div class="flash-card">
                            <div class="flash-body">How do you de-escalate when emotions rise?</div>
                            <button class="flip-btn" type="button">↻</button>
                            </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button class="btn btn-primary continue-btn-flash">Continue</button>
                        </div>
                        <div class="d-flex justify-content-end align-items-center mt-4">
                            <div class="swiper-button-prev nav-btn prev-only"></div>
                            <div class="step-pill ml-2">
                            <button class="pill-prev pill-prev-flash" type="button" aria-label="Previous">‹</button>
                            <span class="divider"></span>
                            <span id="flashCount">0/7</span>
                            <span class="divider"></span>
                            <button class="pill-next pill-next-flash" type="button" aria-label="Next">›</button>
                            </div>
                            <div class="swiper-button-next nav-btn ml-2 main-next-flash d-none"></div>
                        </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="p-4">
                        <div class="slide-scroll">
                            <h2 class="title mb-4">Action Plan for Conflict Resolution</h2>
                            <ul class="plan-list list-unstyled">
                            <li class="plan-item"><span class="chk"></span><span class="txt">Identify potential conflicts early to address them proactively. Take action now! This will make resolution easier. Act today!</span></li>
                            <li class="plan-item"><span class="chk"></span><span class="txt">Actively listen to all perspectives involved in the conflict. Hear the other side! You never know when they might surprise you.</span></li>
                            <li class="plan-item"><span class="chk"></span><span class="txt">Practice empathy to understand the emotions and needs of others. Put yourself in their shoes to see another perspective.</span></li>
                            <li class="plan-item"><span class="chk"></span><span class="txt">Use “I” statements to communicate your feelings and needs constructively. Be respectful of everyone. Your feelings matter!</span></li>
                            <li class="plan-item"><span class="chk"></span><span class="txt">Brainstorm solutions collaboratively, seeking win-win outcomes. Everyone deserves to win in the end! Work together to make sure everyone wins.</span></li>
                            <li class="plan-item"><span class="chk"></span><span class="txt">Implement the agreed-upon solution and monitor its effectiveness. Follow up often! Stay flexible and change the plan if necessary.</span></li>
                            <li class="plan-item"><span class="chk"></span><span class="txt">Regularly assess team dynamics, offering support and encouragement. Support each other. Growth is a key aspect of a healthy work environment.</span></li>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button class="btn btn-primary continue-btn-plan">Continue</button>
                        </div>
                        <div class="d-flex justify-content-end align-items-center mt-4">
                            <div class="swiper-button-prev nav-btn prev-only"></div>
                            <div class="step-pill ml-2">
                            <button class="pill-prev pill-prev-plan" type="button" aria-label="Previous">‹</button>
                            <span class="divider"></span>
                            <span id="planCount">0/7</span>
                            <span class="divider"></span>
                            <button class="pill-next pill-next-plan" type="button" aria-label="Next">›</button>
                            </div>
                            <div class="swiper-button-next nav-btn ml-2 main-next-plan d-none"></div>
                        </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="p-4">
                        <div class="slide-scroll">
                            <h2 class="title mb-4">Which actions contribute to an inclusive workplace?</h2>
                            <p class="lead-desc mb-3">(Select all that apply)</p>
                            <ul class="select-list list-unstyled">
                            <li class="select-item"><span class="chk"></span><span class="txt">Promoting stereotypes.</span></li>
                            <li class="select-item"><span class="chk"></span><span class="txt">Ignoring microaggressions.</span></li>
                            <li class="select-item"><span class="chk"></span><span class="txt">Actively listening to diverse perspectives.</span></li>
                            <li class="select-item"><span class="chk"></span><span class="txt">Advocating for equitable policies.</span></li>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button class="btn btn-primary continue-btn-select" disabled>Continue</button>
                        </div>
                        <div class="d-flex justify-content-end align-items-center mt-4">
                            <div class="swiper-button-prev nav-btn prev-only"></div>
                            <div class="step-pill ml-2">
                            <span id="selectCount">0/4</span>
                            </div>
                            <div class="swiper-button-next nav-btn ml-2 main-next-select d-none"></div>
                        </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="p-4">
                        <div class="slide-scroll">
                            <h2 class="title mb-4">Reveal Sections Sequentially</h2>
                            <ul class="reveal-list list-unstyled">
                            <li class="reveal-item"><div class="box">Step 1: Introduction to policy.</div></li>
                            <li class="reveal-item"><div class="box">Step 2: Key responsibilities.</div></li>
                            <li class="reveal-item"><div class="box">Step 3: Escalation process.</div></li>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button class="btn btn-primary continue-btn-reveal">Continue</button>
                        </div>
                        <div class="d-flex justify-content-end align-items-center mt-4">
                            <div class="swiper-button-prev nav-btn prev-only"></div>
                            <div class="step-pill ml-2">
                            <button class="pill-prev pill-prev-reveal" type="button" aria-label="Previous">‹</button>
                            <span class="divider"></span>
                            <span id="revealCount">0/3</span>
                            <span class="divider"></span>
                            <button class="pill-next pill-next-reveal" type="button" aria-label="Next">›</button>
                            </div>
                            <div class="swiper-button-next nav-btn ml-2 main-next-reveal d-none"></div>
                        </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="p-4">
                        <div class="slide-scroll">
                            <h2 class="title mb-2">Question</h2>
                            <p class="lead-desc mb-3">How should a team handle recurring delays? (Reveal points one by one)</p>
                            <ul class="reveal-list reveal-qa list-unstyled">
                            <li class="reveal-item"><div class="box">A) Identify root causes with a blameless retrospective.</div></li>
                            <li class="reveal-item"><div class="box">B) Re-align priorities and remove blockers transparently.</div></li>
                            <li class="reveal-item"><div class="box">C) Set clear ownership and track outcomes.</div></li>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button class="btn btn-primary continue-btn-revealq">Continue</button>
                        </div>
                        <div class="d-flex justify-content-end align-items-center mt-4">
                            <div class="swiper-button-prev nav-btn prev-only"></div>
                            <div class="step-pill ml-2">
                            <button class="pill-prev pill-prev-revealq" type="button" aria-label="Previous">‹</button>
                            <span class="divider"></span>
                            <span id="revealQCount">0/3</span>
                            <span class="divider"></span>
                            <button class="pill-next pill-next-revealq" type="button" aria-label="Next">›</button>
                            </div>
                            <div class="swiper-button-next nav-btn ml-2 main-next-revealq d-none"></div>
                        </div>
                        </div>
                    </div>
                    <div class="swiper-slide fib-slide">
                        <div class="p-4">
                        <div class="slide-scroll">
                            <h2 class="title mb-2">Fill in the Blanks</h2>
                            <p class="lead-desc mb-3">Next press par pehle Question reveal hoga, phir neeche second question, aur phir fields sequentially fill hongi.</p>
                            <div class="fib-list">
                            <div class="fib-item">
                                <div class="q mb-2">Team should ____ blockers and ____ priorities.</div>
                                <div class="inputs d-flex">
                                <input class="form-control fib-input mr-2" data-answer="address" placeholder="_______" />
                                <input class="form-control fib-input" data-answer="reprioritize" placeholder="_______" />
                                </div>
                            </div>
                            <div class="fib-item">
                                <div class="q mb-2">Retrospective helps ____ causes and ____ actions.</div>
                                <div class="inputs d-flex">
                                <input class="form-control fib-input mr-2" data-answer="identify" placeholder="_______" />
                                <input class="form-control fib-input" data-answer="commit" placeholder="_______" />
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button class="btn btn-primary continue-btn-fib">Continue</button>
                        </div>
                        <div class="d-flex justify-content-end align-items-center mt-4">
                            <div class="swiper-button-prev nav-btn prev-only"></div>
                            <div class="step-pill ml-2">
                            <button class="pill-prev pill-prev-fib" type="button" aria-label="Previous">‹</button>
                            <span class="divider"></span>
                            <span id="fibCount">0/6</span>
                            <span class="divider"></span>
                            <button class="pill-next pill-next-fib" type="button" aria-label="Next">›</button>
                            </div>
                            <div class="swiper-button-next nav-btn ml-2 main-next-fib d-none"></div>
                        </div>
                        </div>
                    </div>
                    <div class="swiper-slide frame-slide" data-initial="5" data-increments="2,2">
                        <div class="p-4">
                        <div class="slide-scroll">
                            <h2 class="title mb-2">Bar models can be used with 10s frames.</h2>
                            <div class="row">
                            <div class="col-md-6">
                                <div class="frame-text">
                                <p class="oneline t1 d-none"><strong>First</strong> there were<br>5 frogs on a log.</p>
                                <p class="oneline t2 d-none"><strong>Then</strong> 2 more<br>frogs jump on.</p>
                                <p class="oneline t3 d-none"><strong>Then</strong> 2 more<br>frogs jump on.</p>
                                <p class="oneline tNow d-none"><strong>Now</strong> there are<br>9 frogs on the log.</p>
                                </div>
                                <div class="ten-frame">
                                <div class="cell"><span class="dot blue d-none"></span></div>
                                <div class="cell"><span class="dot blue d-none"></span></div>
                                <div class="cell"><span class="dot blue d-none"></span></div>
                                <div class="cell"><span class="dot blue d-none"></span></div>
                                <div class="cell"><span class="dot blue d-none"></span></div>
                                <div class="cell"><span class="dot red d-none"></span></div>
                                <div class="cell"><span class="dot red d-none"></span></div>
                                <div class="cell"><span class="dot green d-none"></span></div>
                                <div class="cell"><span class="dot green d-none"></span></div>
                                <div class="cell"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="bar-model">
                                <div class="bar-top"><span class="num num-total d-none">9</span></div>
                                <div class="bar-bottom">
                                    <div class="seg seg-left"><span class="num d-none">5</span></div>
                                    <div class="seg seg-mid"><span class="num d-none">2</span></div>
                                    <div class="seg seg-right"><span class="num d-none">2</span></div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button class="btn btn-primary continue-btn-frame">Continue</button>
                        </div>
                        <div class="d-flex justify-content-end align-items-center mt-4">
                            <div class="swiper-button-prev nav-btn prev-only"></div>
                            <div class="step-pill ml-2">
                            <button class="pill-prev pill-prev-frame" type="button" aria-label="Previous">‹</button>
                            <span class="divider"></span>
                            <span id="frameCount">0/5</span>
                            <span class="divider"></span>
                            <button class="pill-next pill-next-frame" type="button" aria-label="Next">›</button>
                            </div>
                            <div class="swiper-button-next nav-btn ml-2 main-next-frame d-none"></div>
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
    </div>
@endsection

@push('scripts_bottom')
    <script src="https://unpkg.com/swiper@9/swiper-bundle.min.js"></script>

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

    @if (!auth()->subscription('courses'))
        <div class="modal fade subscription-modal" id="subscription-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        @include('web.default.panel.unauthorized_modal', array(
                            'title'             => 'Unauthorized',
                            'unauthorized_text' => 'You are not authorize for this page',
                            'unauthorized_link' => '/panel',
                        ))
                    </div>
                </div>
            </div>
        </div>
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

        $(document).on('click', '.debug-details-btn', function (e) {
            $(this).closest('li').find('.debug-details').toggleClass('rurera-hide');
        });

        $(document).on('click', '.course-learn-btn', function (e) {
            var topic_part_id = $(this).attr('data-topic_part_id');
            var loaderDiv = $('.learn-concept-data1');
            rurera_loader(loaderDiv, 'button');
            $.ajax({
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/learn/get_topic_part_learn_concepts',
                data: {'topic_part_id': topic_part_id},
                success: function (return_data) {
                    rurera_remove_loader(loaderDiv, 'button');
                    $(".learn-concept-data1").html(return_data);


                }
            });
        });





    </script>
    <script>
        $(function() {
            var $parent = $('.rurera-topics-search');
            var $searchInput = $parent.find('#search');
            var $searchResultsDiv = $parent.find('#search-results');
            var $accordionList = $parent.find('#accordion');
            var $clearBtn = $parent.find('.search-clear');

            // Shared function
            function scrollAndHighlight($el) {

                if (!$el || !$el.length) return;

                $('html, body').animate({
                    scrollTop: $el.offset().top - 100
                }, 400);

                $el.addClass('highlight');

                clearTimeout($el.data('highlightTimer'));

                var timer = setTimeout(function() {
                    $el.removeClass('highlight');
                }, 2000);

                $el.data('highlightTimer', timer);
            }
            // INPUT EVENT
            $searchInput.on('input', function() {

                var query = ($searchInput.val() || '').toLowerCase().trim();

                // Toggle clear button
                if (query.length > 0) {
                    $clearBtn.addClass('active');
                } else {
                    $clearBtn.removeClass('active');
                    $searchResultsDiv.removeClass('active').empty();
                    return;
                }

                // Hide results if less than 3 characters
                if (query.length < 3) {
                    $searchResultsDiv.removeClass('active').empty();
                    return;
                }

                var results = [];

                $accordionList.find('li').each(function() {
                    var $chapter = $(this);
                    var titleText = $chapter.find('h3').text();
                    var title = (titleText || '').toLowerCase();
                    var $cards = $chapter.find('.chapter-card a');

                    // Main topic match
                    if (title.indexOf(query) !== -1) {
                        results.push({
                            name: titleText,
                            description: 'Main Topic: ' + titleText,
                            target: '#' + $chapter.attr('id')
                        });
                    }

                    // Sub topic match
                    $cards.each(function() {
                        var $card = $(this);
                        var cardTextOriginal = $card.text();
                        var cardText = (cardTextOriginal || '').toLowerCase();

                        if (cardText.indexOf(query) !== -1) {
                            results.push({
                                name: cardTextOriginal,
                                description: 'Sub Topic under ' + titleText,
                                target: $card.attr('data-target')
                            });
                        }
                    });
                });

                displayResults(results);
            });


            // CLEAR BUTTON CLICK
            $clearBtn.on('click', function() {
                $searchInput.val('').focus();
                $clearBtn.removeClass('active');
                $searchResultsDiv.removeClass('active').empty();
            });


            function displayResults(results) {

                $searchResultsDiv.empty();

                if (results.length === 0) {
                    $searchResultsDiv
                        .html('<p class="no-results">No results found</p>')
                        .addClass('active');
                    return;
                }

                $searchResultsDiv.addClass('active');

                results.forEach(function(result) {

                    var $resultElement = $('<a/>', {
                        href: result.target,
                        class: 'search-result-item'
                    });

                    var $resultTitle = $('<div/>', {
                        class: 'result-title',
                        text: result.name
                    });

                    var $resultDescription = $('<div/>', {
                        class: 'result-description',
                        text: result.description
                    });

                    var $expandIcon = $('<span/>', {
                        class: 'expand-icon',
                        text: '✕'
                    });

                    $resultElement.append($resultTitle, $resultDescription, $expandIcon);

                    $resultElement.on('click', function(e) {
                        e.preventDefault();

                        $parent.find('.highlight').removeClass('highlight');

                        var targetSelector = result.target;
                        var $target = $(targetSelector);

                        if (!$target.length) return;

                        var $chapterParent;

                        // CASE 1: If clicked result is a collapse item
                        if ($target.hasClass('collapse')) {

                            $chapterParent = $target.closest('.lms-chapter-ul-outer');

                            $target.collapse('show');

                            setTimeout(function() {
                                scrollAndHighlight($chapterParent);
                            }, 300);

                        }
                        // CASE 2: If clicked result is a main chapter (li with id like subject_203)
                        else if ($target.is('li')) {

                            $chapterParent = $target.find('.lms-chapter-ul-outer');

                            scrollAndHighlight($chapterParent);
                        }
                        // CASE 3: fallback
                        else {

                            $chapterParent = $target.closest('.lms-chapter-ul-outer');

                            scrollAndHighlight($chapterParent);
                        }

                        // Clear search UI
                        $searchInput.val('');
                        $clearBtn.removeClass('active');
                        $searchResultsDiv.removeClass('active').empty();

                    });



                    $searchResultsDiv.append($resultElement);
                });
            }
            /* =========================
            CHAPTER NAV CLICK
            ========================= */

            $('.chapter-nav li a').on('click', function(e) {

                e.preventDefault();

                $parent.find('.highlight').removeClass('highlight');

                var targetSelector = $(this).attr('href');
                var $target = $(targetSelector);

                if (!$target.length) return;

                var $chapterParent;

                // CASE 1: If target is collapse
                if ($target.hasClass('collapse')) {

                    $chapterParent = $target.closest('.lms-chapter-ul-outer');

                    $target.collapse('show');

                    setTimeout(function() {
                        scrollAndHighlight($chapterParent);
                    }, 300);

                }
                // CASE 2: If target is main chapter (li like #subject_203)
                else if ($target.is('li')) {

                    $chapterParent = $target.find('.lms-chapter-ul-outer');
                    scrollAndHighlight($chapterParent);

                }
                // CASE 3: fallback
                else {

                    $chapterParent = $target.closest('.lms-chapter-ul-outer');
                    scrollAndHighlight($chapterParent);
                }

            });
        });

    </script>

    <script>
        $(document).ready(function () {
        var swiper = new Swiper('.slider-shell .swiper-container', {
        slidesPerView: 1,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        speed: 500
        });
        $('#subchapter-notes-modal').on('shown.bs.modal', function () {
        if (swiper && typeof swiper.update === 'function') {
            swiper.update();
        }
        });
        function updateTrack(i) {
        var segs = document.querySelectorAll('.track .seg');
        for (var s = 0; s < segs.length; s++) {
            segs[s].classList.toggle('active', s < i + 1);
        }
        }
        updateTrack(swiper.activeIndex);
        swiper.on('slideChange', function () {
        updateTrack(swiper.activeIndex);
        });
        var firstSlide = document.querySelectorAll('.swiper-slide')[0];
        if (firstSlide) {
        var continueIntro = firstSlide.querySelector('.continue-btn-intro');
        if (continueIntro) {
            continueIntro.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            swiper.slideNext();
            });
        }
        }
        var collapses = Array.prototype.slice.call(document.querySelectorAll('#conflictAccordion .collapse'));
        var currentAccordionIndex = -1;
        var closingLastToAdvance = false;
        function updateCount() {
        var d = document.getElementById('countDisplay');
        if (d) d.textContent = (currentAccordionIndex + 1) + '/' + collapses.length;
        }
        function getMainNext2() {
        var s = document.querySelectorAll('.swiper-slide')[1];
        return s ? s.querySelector('.main-next-acc') : null;
        }
        function updateAccordionMainNext() {
        var nextEl = getMainNext2();
        if (!nextEl) return;
        if (currentAccordionIndex >= collapses.length - 1 && currentAccordionIndex >= 0) {
            swiper.allowSlideNext = true;
            nextEl.classList.remove('d-none');
        } else {
            nextEl.classList.add('d-none');
        }
        }
        function openAccordionAt(idx) {
        if (idx < 0 || idx >= collapses.length) return;
        $(collapses[idx]).collapse('show');
        var container = document.querySelectorAll('.swiper-slide')[1];
        if (container) {
            var sc = container.querySelector('.slide-scroll');
            var item = collapses[idx].closest('.item');
            if (sc && item && typeof item.scrollIntoView === 'function') {
            item.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }
        }
        }
        $('#conflictAccordion').on('shown.bs.collapse', function (e) {
        var id = e.target.id;
        for (var i = 0; i < collapses.length; i++) {
            if (collapses[i].id === id) {
            currentAccordionIndex = i;
            break;
            }
        }
        updateCount();
        updateAccordionMainNext();
        var s2 = document.querySelectorAll('.swiper-slide')[1];
        var cont2 = s2 ? s2.querySelector('.continue-btn-acc') : null;
        if (cont2) {
            if (currentAccordionIndex >= collapses.length - 1 && currentAccordionIndex >= 0) {
            cont2.textContent = 'Next Slide';
            } else {
            cont2.textContent = 'Continue';
            }
        }
        });
        $('#conflictAccordion').on('hidden.bs.collapse', function () {
        if (closingLastToAdvance) {
            closingLastToAdvance = false;
            swiper.allowSlideNext = true;
            swiper.slideNext();
        }
        });
        updateCount();
        swiper.on('slideChange', function () {
        if (swiper.activeIndex === 1) {
            swiper.allowSlideNext = false;
            currentAccordionIndex = -1;
            updateCount();
            if (secondSlide && nextMain2) nextMain2.classList.add('d-none');
            var cont = secondSlide ? secondSlide.querySelector('.continue-btn-acc') : null;
            if (cont) cont.textContent = 'Continue';
        } else {
            swiper.allowSlideNext = true;
            if (secondSlide && nextMain2) nextMain2.classList.add('d-none');
        }
        });
        var secondSlide = document.querySelectorAll('.swiper-slide')[1];
        if (secondSlide) {
        var nextBtn2 = secondSlide.querySelector('.pill-next');
        var prevBtn2 = secondSlide.querySelector('.swiper-button-prev');
        var pillPrev2 = secondSlide.querySelector('.pill-prev');
        var nextMain2 = secondSlide.querySelector('.main-next-acc');
        var continueBtn2 = secondSlide.querySelector('.continue-btn-acc');
        function updateContinueBtn2() {
            if (!continueBtn2) return;
            if (swiper.activeIndex !== 1) {
            continueBtn2.textContent = 'Continue';
            return;
            }
            if (currentAccordionIndex >= collapses.length - 1 && currentAccordionIndex >= 0) {
            continueBtn2.textContent = 'Next Slide';
            } else {
            continueBtn2.textContent = 'Continue';
            }
        }
        if (nextBtn2) {
            nextBtn2.addEventListener('click', function (e) {
            if (swiper.activeIndex !== 1) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            if (currentAccordionIndex < collapses.length - 1) {
                openAccordionAt(currentAccordionIndex + 1);
                updateAccordionMainNext();
                updateContinueBtn2();
            } else {
                swiper.allowSlideNext = true;
                updateAccordionMainNext();
                updateContinueBtn2();
            }
            });
        }
        if (continueBtn2) {
            continueBtn2.addEventListener('click', function (e) {
            if (swiper.activeIndex !== 1) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            if (currentAccordionIndex < 0) {
                openAccordionAt(0);
            } else if (currentAccordionIndex < collapses.length - 1) {
                openAccordionAt(currentAccordionIndex + 1);
            } else {
                swiper.allowSlideNext = true;
                swiper.slideNext();
            }
            updateAccordionMainNext();
            updateContinueBtn2();
            });
        }
        if (nextMain2) {
            nextMain2.addEventListener('click', function (e) {
            if (swiper.activeIndex !== 1) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            if (currentAccordionIndex >= collapses.length - 1) {
                swiper.allowSlideNext = true;
                swiper.slideNext();
            }
            });
        }
        if (prevBtn2) {
            prevBtn2.addEventListener('click', function (e) {
            if (swiper.activeIndex !== 1) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            if (currentAccordionIndex > 0) {
                openAccordionAt(currentAccordionIndex - 1);
                updateAccordionMainNext();
                updateContinueBtn2();
            } else {
                swiper.allowSlidePrev = true;
                swiper.slidePrev();
            }
            });
        }
        if (pillPrev2) {
            pillPrev2.addEventListener('click', function (e) {
            if (swiper.activeIndex !== 1) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            if (currentAccordionIndex > 0) {
                openAccordionAt(currentAccordionIndex - 1);
                updateAccordionMainNext();
                updateContinueBtn2();
            } else {
                return;
            }
            });
        }
        updateContinueBtn2();
        }
        var flashCards = Array.prototype.slice.call(document.querySelectorAll('.flash-deck .flash-card'));
        var currentFlashIndex = -1;
        function updateFlashCount() {
        var d = document.getElementById('flashCount');
        if (d) d.textContent = (currentFlashIndex + 1) + '/' + flashCards.length;
        }
        function getMainNext3() {
        var s = document.querySelectorAll('.swiper-slide')[2];
        return s ? s.querySelector('.main-next-flash') : null;
        }
        function updateFlashMainNext() {
        var nextEl = getMainNext3();
        if (!nextEl) return;
        if (currentFlashIndex >= flashCards.length - 1 && currentFlashIndex >= 0) {
            swiper.allowSlideNext = true;
            nextEl.classList.remove('d-none');
        } else {
            nextEl.classList.add('d-none');
        }
        }
        function showCardAt(idx) {
        if (idx < 0 || idx >= flashCards.length) return;
        for (var i = 0; i < flashCards.length; i++) {
            flashCards[i].classList.toggle('active', i === idx);
        }
        currentFlashIndex = idx;
        updateFlashCount();
        updateFlashMainNext();
        }
        swiper.on('slideChange', function () {
        if (swiper.activeIndex === 2) {
            swiper.allowSlideNext = false;
            currentFlashIndex = -1;
            updateFlashCount();
            if (thirdSlide && nextMain3) nextMain3.classList.add('d-none');
            var cont3 = thirdSlide ? thirdSlide.querySelector('.continue-btn-flash') : null;
            if (cont3) cont3.textContent = 'Continue';
        } else if (swiper.activeIndex !== 1) {
            swiper.allowSlideNext = true;
        }
        });
        var thirdSlide = document.querySelectorAll('.swiper-slide')[2];
        if (thirdSlide) {
        var nextBtn3 = thirdSlide.querySelector('.pill-next-flash');
        var prevBtn3 = thirdSlide.querySelector('.swiper-button-prev');
        var pillPrev3 = thirdSlide.querySelector('.pill-prev-flash');
        var nextMain3 = thirdSlide.querySelector('.main-next-flash');
        var continueBtn3 = thirdSlide.querySelector('.continue-btn-flash');
        function updateContinueBtn3() {
            if (!continueBtn3) return;
            if (swiper.activeIndex !== 2) {
            continueBtn3.textContent = 'Continue';
            return;
            }
            if (currentFlashIndex >= flashCards.length - 1 && currentFlashIndex >= 0) {
            continueBtn3.textContent = 'Next Slide';
            } else {
            continueBtn3.textContent = 'Continue';
            }
        }
        if (nextBtn3) {
            nextBtn3.addEventListener('click', function (e) {
            if (swiper.activeIndex !== 2) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            if (currentFlashIndex < flashCards.length - 1) {
                showCardAt(currentFlashIndex + 1);
                updateFlashMainNext();
                updateContinueBtn3();
            } else {
                swiper.allowSlideNext = true;
                updateFlashMainNext();
                updateContinueBtn3();
            }
            });
        }
        if (continueBtn3) {
            continueBtn3.addEventListener('click', function (e) {
            if (swiper.activeIndex !== 2) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            if (currentFlashIndex < 0) {
                showCardAt(0);
            } else if (currentFlashIndex < flashCards.length - 1) {
                showCardAt(currentFlashIndex + 1);
            } else {
                swiper.allowSlideNext = true;
                swiper.slideNext();
            }
            updateFlashMainNext();
            updateContinueBtn3();
            });
        }
        if (nextMain3) {
            nextMain3.addEventListener('click', function (e) {
            if (swiper.activeIndex !== 2) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            if (currentFlashIndex >= flashCards.length - 1) {
                swiper.allowSlideNext = true;
                swiper.slideNext();
            }
            });
        }
        if (prevBtn3) {
            prevBtn3.addEventListener('click', function (e) {
            if (swiper.activeIndex !== 2) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            if (currentFlashIndex > 0) {
                showCardAt(currentFlashIndex - 1);
                if (nextMain3) nextMain3.classList.add('d-none');
                updateContinueBtn3();
            } else {
                swiper.allowSlidePrev = true;
                swiper.slidePrev();
            }
            });
        }
        if (pillPrev3) {
            pillPrev3.addEventListener('click', function (e) {
            if (swiper.activeIndex !== 2) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            if (currentFlashIndex > 0) {
                showCardAt(currentFlashIndex - 1);
                updateContinueBtn3();
            } else {
                return;
            }
            });
        }
        thirdSlide.addEventListener('click', function (e) {
            if (e.target.classList.contains('flip-btn')) {
            e.preventDefault();
            }
        });
        updateContinueBtn3();
        }
        var planItems = Array.prototype.slice.call(document.querySelectorAll('.plan-list .plan-item'));
        var currentPlanIndex = -1;
        function renderPlan() {
        for (var i = 0; i < planItems.length; i++) {
            planItems[i].classList.toggle('done', i <= currentPlanIndex);
        }
        }
        function updatePlanCount() {
        var d = document.getElementById('planCount');
        if (d) d.textContent = (currentPlanIndex + 1) + '/' + planItems.length;
        }
        function getMainNext4() {
        var s = document.querySelectorAll('.swiper-slide')[3];
        return s ? s.querySelector('.main-next-plan') : null;
        }
        function updatePlanMainNext() {
        var nextEl = getMainNext4();
        if (!nextEl) return;
        if (currentPlanIndex >= planItems.length - 1 && currentPlanIndex >= 0) {
            swiper.allowSlideNext = true;
            nextEl.classList.remove('d-none');
        } else {
            nextEl.classList.add('d-none');
        }
        }
        swiper.on('slideChange', function () {
        if (swiper.activeIndex === 3) {
            swiper.allowSlideNext = false;
            currentPlanIndex = -1;
            renderPlan();
            updatePlanCount();
            if (fourthSlide && nextMain4) nextMain4.classList.add('d-none');
        } else if (swiper.activeIndex !== 1 && swiper.activeIndex !== 2) {
            swiper.allowSlideNext = true;
        }
        });
        document.addEventListener('keydown', function (e) {
        var isLeft = e.key === 'ArrowLeft';
        var isRight = e.key === 'ArrowRight';
        if (!isLeft && !isRight) return;
        if (swiper.activeIndex === 1) {
            if (isRight) {
            if (currentAccordionIndex < collapses.length - 1) {
                openAccordionAt(currentAccordionIndex + 1);
            } else if (swiper.allowSlideNext) {
                swiper.slideNext();
            }
            } else {
            if (currentAccordionIndex > 0) {
                openAccordionAt(currentAccordionIndex - 1);
            } else {
                swiper.slidePrev();
            }
            }
            e.preventDefault();
            return;
        }
        if (swiper.activeIndex === 2) {
            if (isRight) {
            if (currentFlashIndex < flashCards.length - 1) {
                showCardAt(currentFlashIndex + 1);
            } else if (swiper.allowSlideNext) {
                swiper.slideNext();
            }
            } else {
            if (currentFlashIndex > 0) {
                showCardAt(currentFlashIndex - 1);
            } else {
                swiper.slidePrev();
            }
            }
            e.preventDefault();
            return;
        }
        if (swiper.activeIndex === 3) {
            if (isRight) {
            if (currentPlanIndex < planItems.length - 1) {
                currentPlanIndex += 1;
                renderPlan();
                updatePlanCount();
            } else if (swiper.allowSlideNext) {
                swiper.slideNext();
            }
            } else {
            if (currentPlanIndex >= 0) {
                currentPlanIndex -= 1;
                renderPlan();
                updatePlanCount();
            } else {
                swiper.slidePrev();
            }
            }
            e.preventDefault();
            return;
        }
        if (isRight) swiper.slideNext();
        if (isLeft) swiper.slidePrev();
        });
        var fourthSlide = document.querySelectorAll('.swiper-slide')[3];
        if (fourthSlide) {
        var nextBtn4 = fourthSlide.querySelector('.pill-next-plan');
        var prevBtn4 = fourthSlide.querySelector('.swiper-button-prev');
        var pillPrev4 = fourthSlide.querySelector('.pill-prev-plan');
        var nextMain4 = fourthSlide.querySelector('.main-next-plan');
        var continueBtn4 = fourthSlide.querySelector('.continue-btn-plan');
        function updateContinueBtn4() {
            if (!continueBtn4) return;
            if (swiper.activeIndex !== 3) {
            continueBtn4.textContent = 'Continue';
            return;
            }
            if (currentPlanIndex >= planItems.length - 1 && currentPlanIndex >= 0) {
            continueBtn4.textContent = 'Next Slide';
            } else {
            continueBtn4.textContent = 'Continue';
            }
        }
        if (nextBtn4) {
            nextBtn4.addEventListener('click', function (e) {
            if (swiper.activeIndex !== 3) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            if (currentPlanIndex < planItems.length - 1) {
                currentPlanIndex += 1;
                renderPlan();
                updatePlanCount();
                updatePlanMainNext();
                updateContinueBtn4();
            var sc4 = fourthSlide ? fourthSlide.querySelector('.slide-scroll') : null;
            if (sc4 && planItems[currentPlanIndex] && typeof planItems[currentPlanIndex].scrollIntoView === 'function') {
            planItems[currentPlanIndex].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }
            } else {
                swiper.allowSlideNext = true;
                updatePlanMainNext();
                updateContinueBtn4();
            }
            });
        }
        if (continueBtn4) {
            continueBtn4.addEventListener('click', function (e) {
            if (swiper.activeIndex !== 3) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            if (currentPlanIndex < 0) {
                currentPlanIndex = 0;
                renderPlan();
                updatePlanCount();
            } else if (currentPlanIndex < planItems.length - 1) {
                currentPlanIndex += 1;
                renderPlan();
                updatePlanCount();
            } else {
                swiper.allowSlideNext = true;
                swiper.slideNext();
            }
            updatePlanMainNext();
            updateContinueBtn4();
            });
        }
        if (nextMain4) {
            nextMain4.addEventListener('click', function (e) {
            if (swiper.activeIndex !== 3) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            if (currentPlanIndex >= planItems.length - 1) {
                swiper.allowSlideNext = true;
                swiper.slideNext();
            }
            });
        }
        if (prevBtn4) {
            prevBtn4.addEventListener('click', function (e) {
            if (swiper.activeIndex !== 3) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            if (currentPlanIndex >= 0) {
                currentPlanIndex -= 1;
                renderPlan();
                updatePlanCount();
                updatePlanMainNext();
                updateContinueBtn4();
            } else {
                swiper.allowSlidePrev = true;
                swiper.slidePrev();
            }
            });
        }
        if (pillPrev4) {
            pillPrev4.addEventListener('click', function (e) {
            if (swiper.activeIndex !== 3) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            if (currentPlanIndex >= 0) {
                currentPlanIndex -= 1;
                renderPlan();
                updatePlanCount();
                updatePlanMainNext();
                updateContinueBtn4();
            } else {
                return;
            }
            });
        }
        updateContinueBtn4();
        }
        var fifthSlide = document.querySelectorAll('.swiper-slide')[4];
        if (fifthSlide) {
        var selectItems = Array.prototype.slice.call(fifthSlide.querySelectorAll('.select-list .select-item'));
        var selectedCount = 0;
        var nextMain5 = fifthSlide.querySelector('.main-next-select');
        var continueBtn5 = fifthSlide.querySelector('.continue-btn-select');
        function updateSelectCounter() {
            var d = document.getElementById('selectCount');
            if (d) d.textContent = selectedCount + '/' + selectItems.length;
        }
        function updateSelectState() {
            selectedCount = fifthSlide.querySelectorAll('.select-list .select-item.on').length;
            updateSelectCounter();
            if (nextMain5) {
            if (selectedCount === selectItems.length && selectItems.length > 0) {
                swiper.allowSlideNext = true;
                nextMain5.classList.remove('d-none');
            } else {
                swiper.allowSlideNext = false;
                nextMain5.classList.add('d-none');
            }
            }
            if (continueBtn5) {
            if (selectedCount === selectItems.length && selectItems.length > 0) {
                continueBtn5.disabled = false;
                continueBtn5.textContent = 'Next Slide';
            } else {
                continueBtn5.disabled = true;
                continueBtn5.textContent = 'Continue';
            }
            }
        }
        fifthSlide.querySelector('.select-list').addEventListener('click', function (e) {
            var li = e.target.closest('.select-item');
            if (!li) return;
            li.classList.toggle('on');
            updateSelectState();
        });
        if (nextMain5) {
            nextMain5.addEventListener('click', function (e) {
            if (swiper.activeIndex !== 4) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            if (selectedCount === selectItems.length && selectItems.length > 0) {
                swiper.slideNext();
            }
            });
        }
        swiper.on('slideChange', function () {
            if (swiper.activeIndex === 4) {
            swiper.allowSlideNext = false;
            if (nextMain5) nextMain5.classList.add('d-none');
            if (continueBtn5) {
                continueBtn5.disabled = true;
                continueBtn5.textContent = 'Continue';
            }
            }
        });
        if (continueBtn5) {
            continueBtn5.addEventListener('click', function (e) {
            if (swiper.activeIndex !== 4) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            if (selectedCount === selectItems.length && selectItems.length > 0) {
                swiper.slideNext();
            }
            });
        }
        updateSelectState();
        }
        var sixthSlide = document.querySelectorAll('.swiper-slide')[5];
        if (sixthSlide) {
        var revealItems = Array.prototype.slice.call(sixthSlide.querySelectorAll('.reveal-list .reveal-item'));
        var revealIdx = -1;
        var nextBtn6 = sixthSlide.querySelector('.pill-next-reveal');
        var prevBtn6 = sixthSlide.querySelector('.pill-prev-reveal');
        var nextMain6 = sixthSlide.querySelector('.main-next-reveal');
        var continueBtn6 = sixthSlide.querySelector('.continue-btn-reveal');
        function updateRevealCount() {
            var d = document.getElementById('revealCount');
            if (d) d.textContent = (revealIdx + 1) + '/' + revealItems.length;
        }
        function updateRevealMainNext() {
            if (!nextMain6) return;
            if (revealIdx >= revealItems.length - 1 && revealIdx >= 0) {
            swiper.allowSlideNext = true;
            nextMain6.classList.remove('d-none');
            } else {
            nextMain6.classList.add('d-none');
            }
        }
        function updateContinueBtn6() {
            if (!continueBtn6) return;
            if (swiper.activeIndex !== 5) {
            continueBtn6.textContent = 'Continue';
            return;
            }
            if (revealIdx >= revealItems.length - 1 && revealIdx >= 0) {
            continueBtn6.textContent = 'Next Slide';
            } else {
            continueBtn6.textContent = 'Continue';
            }
        }
        function showRevealAt(i) {
            if (i < 0 || i >= revealItems.length) return;
            revealItems[i].classList.add('on');
            revealIdx = i;
            updateRevealCount();
            updateRevealMainNext();
            updateContinueBtn6();
            var sc = sixthSlide.querySelector('.slide-scroll');
            if (sc && typeof revealItems[i].scrollIntoView === 'function') {
            revealItems[i].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }
        }
        function hideRevealAt(i) {
            if (i < 0 || i >= revealItems.length) return;
            revealItems[i].classList.remove('on');
            revealIdx = i - 1;
            updateRevealCount();
            updateRevealMainNext();
            updateContinueBtn6();
        }
        swiper.on('slideChange', function () {
            if (swiper.activeIndex === 5) {
            swiper.allowSlideNext = false;
            revealIdx = -1;
            for (var r = 0; r < revealItems.length; r++) revealItems[r].classList.remove('on');
            updateRevealCount();
            if (nextMain6) nextMain6.classList.add('d-none');
            if (continueBtn6) continueBtn6.textContent = 'Continue';
            } else if (swiper.activeIndex !== 1 && swiper.activeIndex !== 2 && swiper.activeIndex !== 3) {
            swiper.allowSlideNext = true;
            }
        });
        if (nextBtn6) {
            nextBtn6.addEventListener('click', function (e) {
            if (swiper.activeIndex !== 5) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            if (revealIdx < revealItems.length - 1) {
                showRevealAt(revealIdx + 1);
            } else {
                swiper.allowSlideNext = true;
                updateRevealMainNext();
                updateContinueBtn6();
            }
            });
        }
        if (prevBtn6) {
            prevBtn6.addEventListener('click', function (e) {
            if (swiper.activeIndex !== 5) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            if (revealIdx >= 0) {
                hideRevealAt(revealIdx);
            } else {
                return;
            }
            });
        }
        if (continueBtn6) {
            continueBtn6.addEventListener('click', function (e) {
            if (swiper.activeIndex !== 5) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            if (revealIdx < 0) {
                showRevealAt(0);
            } else if (revealIdx < revealItems.length - 1) {
                showRevealAt(revealIdx + 1);
            } else {
                swiper.allowSlideNext = true;
                swiper.slideNext();
            }
            });
        }
        if (nextMain6) {
            nextMain6.addEventListener('click', function (e) {
            if (swiper.activeIndex !== 5) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            if (revealIdx >= revealItems.length - 1) {
                swiper.allowSlideNext = true;
                swiper.slideNext();
            }
            });
        }
        document.addEventListener('keydown', function (e) {
            var isLeft = e.key === 'ArrowLeft';
            var isRight = e.key === 'ArrowRight';
            if (swiper.activeIndex !== 5 || (!isLeft && !isRight)) return;
            e.preventDefault();
            if (isRight) {
            if (revealIdx < revealItems.length - 1) {
                showRevealAt(revealIdx + 1);
            } else if (swiper.allowSlideNext) {
                swiper.slideNext();
            }
            } else {
            if (revealIdx >= 0) {
                hideRevealAt(revealIdx);
            } else {
                swiper.slidePrev();
            }
            }
        });
        updateContinueBtn6();
        }
        var seventhSlide = document.querySelectorAll('.swiper-slide')[6];
        if (seventhSlide) {
        var revealItemsQ = Array.prototype.slice.call(seventhSlide.querySelectorAll('.reveal-qa .reveal-item'));
        var revealQIdx = -1;
        var nextBtn7 = seventhSlide.querySelector('.pill-next-revealq');
        var prevBtn7 = seventhSlide.querySelector('.pill-prev-revealq');
        var nextMain7 = seventhSlide.querySelector('.main-next-revealq');
        var continueBtn7 = seventhSlide.querySelector('.continue-btn-revealq');
        function updateRevealQCount() {
            var d = document.getElementById('revealQCount');
            if (d) d.textContent = (revealQIdx + 1) + '/' + revealItemsQ.length;
        }
        function updateRevealQMainNext() {
            if (!nextMain7) return;
            if (revealQIdx >= revealItemsQ.length - 1 && revealQIdx >= 0) {
            swiper.allowSlideNext = true;
            nextMain7.classList.remove('d-none');
            } else {
            nextMain7.classList.add('d-none');
            }
        }
        function updateContinueBtn7() {
            if (!continueBtn7) return;
            if (swiper.activeIndex !== 6) {
            continueBtn7.textContent = 'Continue';
            return;
            }
            if (revealQIdx >= revealItemsQ.length - 1 && revealQIdx >= 0) {
            continueBtn7.textContent = 'Next Slide';
            } else {
            continueBtn7.textContent = 'Continue';
            }
        }
        function showRevealQAt(i) {
            if (i < 0 || i >= revealItemsQ.length) return;
            revealItemsQ[i].classList.add('on');
            revealQIdx = i;
            updateRevealQCount();
            var sc = seventhSlide.querySelector('.slide-scroll');
            if (sc && typeof revealItemsQ[i].scrollIntoView === 'function') {
            revealItemsQ[i].scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }
            updateRevealQMainNext();
            updateContinueBtn7();
        }
        function hideRevealQAt(i) {
            if (i < 0 || i >= revealItemsQ.length) return;
            revealItemsQ[i].classList.remove('on');
            revealQIdx = i - 1;
            updateRevealQCount();
            updateRevealQMainNext();
            updateContinueBtn7();
        }
        swiper.on('slideChange', function () {
            if (swiper.activeIndex === 6) {
            swiper.allowSlideNext = false;
            revealQIdx = -1;
            for (var r = 0; r < revealItemsQ.length; r++) revealItemsQ[r].classList.remove('on');
            updateRevealQCount();
            if (nextMain7) nextMain7.classList.add('d-none');
            if (continueBtn7) continueBtn7.textContent = 'Continue';
            } else if (swiper.activeIndex !== 1 && swiper.activeIndex !== 2 && swiper.activeIndex !== 3 && swiper.activeIndex !== 5) {
            swiper.allowSlideNext = true;
            }
        });
        if (nextBtn7) {
            nextBtn7.addEventListener('click', function (e) {
            if (swiper.activeIndex !== 6) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            if (revealQIdx < revealItemsQ.length - 1) {
                showRevealQAt(revealQIdx + 1);
            }
            });
        }
        if (prevBtn7) {
            prevBtn7.addEventListener('click', function (e) {
            if (swiper.activeIndex !== 6) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            if (revealQIdx >= 0) {
                hideRevealQAt(revealQIdx);
            } else {
                return;
            }
            });
        }
        if (continueBtn7) {
            continueBtn7.addEventListener('click', function (e) {
            if (swiper.activeIndex !== 6) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            if (revealQIdx < 0) {
                showRevealQAt(0);
            } else if (revealQIdx < revealItemsQ.length - 1) {
                showRevealQAt(revealQIdx + 1);
            } else {
                swiper.allowSlideNext = true;
                swiper.slideNext();
            }
            });
        }
        if (nextMain7) {
            nextMain7.addEventListener('click', function (e) {
            if (swiper.activeIndex !== 6) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            if (revealQIdx >= revealItemsQ.length - 1) {
                swiper.allowSlideNext = true;
                swiper.slideNext();
            }
            });
        }
        document.addEventListener('keydown', function (e) {
            var isLeft = e.key === 'ArrowLeft';
            var isRight = e.key === 'ArrowRight';
            if (swiper.activeIndex !== 6 || (!isLeft && !isRight)) return;
            e.preventDefault();
            if (isRight) {
            if (revealQIdx < revealItemsQ.length - 1) {
                showRevealQAt(revealQIdx + 1);
            } else if (swiper.allowSlideNext) {
                swiper.slideNext();
            }
            } else {
            if (revealQIdx >= 0) {
                hideRevealQAt(revealQIdx);
            } else {
                swiper.slidePrev();
            }
            }
        });
        updateContinueBtn7();
        }
        var fibSlideEl = document.querySelector('.swiper-slide.fib-slide');
        if (fibSlideEl) {
        var slidesArrFib = Array.prototype.slice.call(document.querySelectorAll('.swiper-slide'));
        var fibIndex = slidesArrFib.indexOf(fibSlideEl);
        var fibItems = Array.prototype.slice.call(fibSlideEl.querySelectorAll('.fib-list .fib-item'));
        var fibInputs = Array.prototype.slice.call(fibSlideEl.querySelectorAll('.fib-input'));
        var fibStagesTotal = 2 + fibInputs.length;
        var fibStage = -1;
        var nextBtn8 = fibSlideEl.querySelector('.pill-next-fib');
        var prevBtn8 = fibSlideEl.querySelector('.pill-prev-fib');
        var nextMain8 = fibSlideEl.querySelector('.main-next-fib');
        var continueBtn8 = fibSlideEl.querySelector('.continue-btn-fib');
        function updateFibCount() {
            var d = document.getElementById('fibCount');
            if (d) d.textContent = (fibStage + 1) + '/' + fibStagesTotal;
        }
        function updateFibMainNext() {
            if (!nextMain8) return;
            if (fibStage >= fibStagesTotal - 1) {
            swiper.allowSlideNext = true;
            nextMain8.classList.remove('d-none');
            } else {
            nextMain8.classList.add('d-none');
            }
        }
        function updateContinueBtn8() {
            if (!continueBtn8) return;
            if (swiper.activeIndex !== fibIndex) {
            continueBtn8.textContent = 'Continue';
            return;
            }
            if (fibStage >= fibStagesTotal - 1) {
            continueBtn8.textContent = 'Next Slide';
            } else {
            continueBtn8.textContent = 'Continue';
            }
        }
        function applyStage(next) {
            if (next) {
            if (fibStage < fibStagesTotal - 1) fibStage += 1;
            } else {
            if (fibStage >= 0) fibStage -= 1;
            }
            for (var i = 0; i < fibItems.length; i++) {
            fibItems[i].classList.toggle('on', i <= Math.min(fibStage, fibItems.length - 1));
            }
            for (var j = 0; j < fibInputs.length; j++) {
            if (fibStage >= 2 + j) {
                var ans = fibInputs[j].getAttribute('data-answer') || '';
                fibInputs[j].value = ans;
                fibInputs[j].classList.add('filled');
            } else {
                fibInputs[j].value = '';
                fibInputs[j].classList.remove('filled');
            }
            }
            updateFibCount();
            updateFibMainNext();
            updateContinueBtn8();
            var sc = fibSlideEl.querySelector('.slide-scroll');
            var target = null;
            if (fibStage < fibItems.length) target = fibItems[fibStage];
            else {
            var idx = fibStage - 2;
            target = fibInputs[idx] || null;
            }
            if (sc && target && typeof target.scrollIntoView === 'function') {
            target.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }
        }
        swiper.on('slideChange', function () {
            if (swiper.activeIndex === fibIndex) {
            swiper.allowSlideNext = false;
            fibStage = -1;
            for (var i = 0; i < fibItems.length; i++) fibItems[i].classList.remove('on');
            for (var j = 0; j < fibInputs.length; j++) {
                fibInputs[j].value = '';
                fibInputs[j].classList.remove('filled');
            }
            updateFibCount();
            if (nextMain8) nextMain8.classList.add('d-none');
            if (continueBtn8) continueBtn8.textContent = 'Continue';
            }
        });
        if (nextBtn8) {
            nextBtn8.addEventListener('click', function (e) {
            if (swiper.activeIndex !== fibIndex) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            applyStage(true);
            });
        }
        if (prevBtn8) {
            prevBtn8.addEventListener('click', function (e) {
            if (swiper.activeIndex !== fibIndex) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            applyStage(false);
            });
        }
        if (continueBtn8) {
            continueBtn8.addEventListener('click', function (e) {
            if (swiper.activeIndex !== fibIndex) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            applyStage(true);
            if (fibStage >= fibStagesTotal - 1) {
                swiper.allowSlideNext = true;
            }
            });
        }
        if (nextMain8) {
            nextMain8.addEventListener('click', function (e) {
            if (swiper.activeIndex !== fibIndex) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            if (fibStage >= fibStagesTotal - 1) {
                swiper.allowSlideNext = true;
                swiper.slideNext();
            }
            });
        }
        document.addEventListener('keydown', function (e) {
            var isLeft = e.key === 'ArrowLeft';
            var isRight = e.key === 'ArrowRight';
            if (swiper.activeIndex !== fibIndex || (!isLeft && !isRight)) return;
            e.preventDefault();
            if (isRight) applyStage(true);
            else applyStage(false);
        });
        updateContinueBtn8();
        }
        var frameSlideEl = document.querySelector('.swiper-slide.frame-slide');
        if (frameSlideEl) {
        var slidesArr = Array.prototype.slice.call(document.querySelectorAll('.swiper-slide'));
        var frameIndex = slidesArr.indexOf(frameSlideEl);
        var frameStage = -1;
        var initialCount = parseInt(frameSlideEl.getAttribute('data-initial') || '5', 10);
        var incrementsStr = (frameSlideEl.getAttribute('data-increments') || '2,2').split(',');
        var incrementsVals = [];
        for (var ii = 0; ii < incrementsStr.length; ii++) {
            var v = parseInt(incrementsStr[ii].trim(), 10);
            if (!isNaN(v) && v > 0) incrementsVals.push(v);
        }
        var nextBtnF = frameSlideEl.querySelector('.pill-next-frame');
        var prevBtnF = frameSlideEl.querySelector('.pill-prev-frame');
        var nextMainF = frameSlideEl.querySelector('.main-next-frame');
        var continueBtnF = frameSlideEl.querySelector('.continue-btn-frame');
        var text1 = frameSlideEl.querySelector('.t1');
        var text2 = frameSlideEl.querySelector('.t2');
        var text3 = frameSlideEl.querySelector('.t3');
        var textNow = frameSlideEl.querySelector('.tNow');
        var blueDots = frameSlideEl.querySelectorAll('.ten-frame .dot.blue');
        var redDots = frameSlideEl.querySelectorAll('.ten-frame .dot.red');
        var greenDots = frameSlideEl.querySelectorAll('.ten-frame .dot.green');
        var num5 = frameSlideEl.querySelector('.bar-model .seg-left .num');
        var num2mid = frameSlideEl.querySelector('.bar-model .seg-mid .num');
        var num2right = frameSlideEl.querySelector('.bar-model .seg-right .num');
        var numTotal = frameSlideEl.querySelector('.bar-model .bar-top .num-total');
        if (text1) text1.innerHTML = '<strong>First</strong> there were<br>' + initialCount + ' frogs on a log.';
        if (text2 && incrementsVals[0] != null) text2.innerHTML = '<strong>Then</strong> ' + incrementsVals[0] + ' more<br>frogs jump on.';
        if (text3 && incrementsVals[1] != null) text3.innerHTML = '<strong>Then</strong> ' + incrementsVals[1] + ' more<br>frogs jump on.';
        var totalAll = initialCount;
        for (var ti = 0; ti < incrementsVals.length; ti++) totalAll += incrementsVals[ti];
        if (textNow) textNow.innerHTML = '<strong>Now</strong> there are<br>' + totalAll + ' frogs on the log.';
        if (num5) num5.textContent = initialCount;
        if (num2mid) {
            if (incrementsVals[0] != null) {
            num2mid.textContent = incrementsVals[0];
            } else {
            num2mid.classList.add('d-none');
            }
        }
        if (num2right) {
            if (incrementsVals[1] != null) {
            num2right.textContent = incrementsVals[1];
            } else {
            num2right.classList.add('d-none');
            }
        }
        if (numTotal) numTotal.textContent = totalAll;
        var sText1 = 0;
        var sBlue = 1;
        var sNumInit = 2;
        var sIncText = [], sIncDots = [], sIncNum = [];
        for (var si = 0; si < incrementsVals.length; si++) {
            sIncText.push(3 + si * 3);
            sIncDots.push(4 + si * 3);
            sIncNum.push(5 + si * 3);
        }
        var sNow = 3 + incrementsVals.length * 3;
        var frameStagesTotal = sNow + 1;
        function updateFrameCount() {
            var d = document.getElementById('frameCount');
            if (d) d.textContent = (frameStage + 1) + '/' + frameStagesTotal;
        }
        function updateFrameMainNext() {
            if (!nextMainF) return;
            if (frameStage >= frameStagesTotal - 1) {
            swiper.allowSlideNext = true;
            nextMainF.classList.remove('d-none');
            } else {
            nextMainF.classList.add('d-none');
            }
        }
        function updateContinueBtnF() {
            if (!continueBtnF) return;
            if (swiper.activeIndex !== frameIndex) {
            continueBtnF.textContent = 'Continue';
            return;
            }
            if (frameStage >= frameStagesTotal - 1) {
            continueBtnF.textContent = 'Next Slide';
            } else {
            continueBtnF.textContent = 'Continue';
            }
        }
        function applyFrameStage(next) {
            if (next) {
            if (frameStage < frameStagesTotal - 1) frameStage += 1;
            } else {
            if (frameStage >= 0) frameStage -= 1;
            }
            if (text1) text1.classList.toggle('d-none', !(frameStage >= sText1));
            for (var i = 0; i < blueDots.length; i++) {
            blueDots[i].classList.toggle('d-none', !(frameStage >= sBlue) || i >= initialCount);
            }
            if (num5) num5.classList.toggle('d-none', !(frameStage >= sNumInit));
            if (text2) text2.classList.toggle('d-none', !(frameStage >= (sIncText[0] != null ? sIncText[0] : Infinity)));
            for (var j = 0; j < redDots.length; j++) {
            var limR = incrementsVals[0] || 0;
            redDots[j].classList.toggle('d-none', !(frameStage >= (sIncDots[0] != null ? sIncDots[0] : Infinity)) || j >= limR);
            }
            if (text3) text3.classList.toggle('d-none', !(frameStage >= (sIncText[1] != null ? sIncText[1] : Infinity)));
            for (var k = 0; k < greenDots.length; k++) {
            var limG = incrementsVals[1] || 0;
            greenDots[k].classList.toggle('d-none', !(frameStage >= (sIncDots[1] != null ? sIncDots[1] : Infinity)) || k >= limG);
            }
            if (num2mid) num2mid.classList.toggle('d-none', !(frameStage >= (sIncNum[0] != null ? sIncNum[0] : Infinity)));
            if (num2right) num2right.classList.toggle('d-none', !(frameStage >= (sIncNum[1] != null ? sIncNum[1] : Infinity)));
            if (textNow) textNow.classList.toggle('d-none', !(frameStage >= sNow));
            if (numTotal) numTotal.classList.toggle('d-none', !(frameStage >= sNow));
            updateFrameCount();
            updateFrameMainNext();
            updateContinueBtnF();
        }
        swiper.on('slideChange', function () {
            if (swiper.activeIndex === frameIndex) {
            swiper.allowSlideNext = false;
            frameStage = -1;
            if (text1) text1.classList.add('d-none');
            if (text2) text2.classList.add('d-none');
            if (text3) text3.classList.add('d-none');
            if (textNow) textNow.classList.add('d-none');
            for (var i = 0; i < blueDots.length; i++) blueDots[i].classList.add('d-none');
            for (var j = 0; j < redDots.length; j++) redDots[j].classList.add('d-none');
            for (var k = 0; k < greenDots.length; k++) greenDots[k].classList.add('d-none');
            if (num5) num5.classList.add('d-none');
            if (num2mid) num2mid.classList.add('d-none');
            if (num2right) num2right.classList.add('d-none');
            if (numTotal) numTotal.classList.add('d-none');
            updateFrameCount();
            if (nextMainF) nextMainF.classList.add('d-none');
            if (continueBtnF) continueBtnF.textContent = 'Continue';
            }
        });
        if (nextBtnF) {
            nextBtnF.addEventListener('click', function (e) {
            if (swiper.activeIndex !== frameIndex) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            applyFrameStage(true);
            });
        }
        if (prevBtnF) {
            prevBtnF.addEventListener('click', function (e) {
            if (swiper.activeIndex !== frameIndex) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            applyFrameStage(false);
            });
        }
        if (continueBtnF) {
            continueBtnF.addEventListener('click', function (e) {
            if (swiper.activeIndex !== frameIndex) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            applyFrameStage(true);
            if (frameStage >= frameStagesTotal - 1) {
                swiper.allowSlideNext = true;
            }
            });
        }
        if (nextMainF) {
            nextMainF.addEventListener('click', function (e) {
            if (swiper.activeIndex !== frameIndex) return;
            e.preventDefault();
            e.stopImmediatePropagation();
            if (frameStage >= frameStagesTotal - 1) {
                swiper.allowSlideNext = true;
                swiper.slideNext();
            }
            });
        }
        document.addEventListener('keydown', function (e) {
            var isLeft = e.key === 'ArrowLeft';
            var isRight = e.key === 'ArrowRight';
            if (swiper.activeIndex !== frameIndex || (!isLeft && !isRight)) return;
            e.preventDefault();
            if (isRight) applyFrameStage(true);
            else applyFrameStage(false);
        });
        updateContinueBtnF();
        }
});
    </script>

@endpush

