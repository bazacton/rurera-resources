@php use App\Models\QuizzesResult; @endphp
@extends(getTemplate() .'.panel.layouts.panel_layout')

@push('styles_top')
    <link rel="stylesheet" href="/assets/default/vendors/chartjs/chart.min.css"/>
    <link rel="stylesheet" href="/assets/default/vendors/apexcharts/apexcharts.css"/>
@endpush

@section('content')
<section>

    <div class="bg-white dashboard-banner-container position-relative px-15 px-ld-35 py-10 panel-shadow panel-border rounded-sm mb-30">
        <h2 class="font-22 font-weight-bold text-primary line-height-1">
            <span class="d-block">{{ trans('panel.hi') }} {{ $authUser->get_full_name() }},</span>
            <span class="font-14 font-weight-bold">{{ trans('panel.have_event',['count' => !empty($unReadNotifications) ? count($unReadNotifications) : 0]) }}</span>
        </h2>

        <ul class="mt-15 unread-notification-lists font-14">
            @if(!empty($unReadNotifications) and !$unReadNotifications->isEmpty())
            @foreach($unReadNotifications->take(5) as $unReadNotification)
            <li class="mt-1 text-gray">- {{ $unReadNotification->title }}</li>
            @endforeach

            @if(count($unReadNotifications) > 5)
            <li>&nbsp;&nbsp;...</li>
            @endif
            @endif
        </ul>

        <a href="/panel/notifications" class="mt-15 font-14 font-weight-500 panel-view-btn d-inline-block">{{
            trans('panel.view_all_events') }}</a>

        <div class="dashboard-banner">
            <img src="{{ getPageBackgroundSettings('dashboard') }}" alt="dashboard-banner image" class="img-cover">
        </div>
    </div>
    <div class="mt-15 rurera-hide">
        <div class="section-title text-left mb-30">
            <h2 class="font-22 font-weight-bold">Subjects Progress <a href="#" class="text-primary">How we calculated?</a></h2>
        </div>
        <div class="row">
            <!-- English Card -->
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card text-center subject-card">
                    <div class="card-body">
                        <h5 class="card-title">English</h5>
                        <p class="text-danger">Needs Practice</p>
                        <div class="subject-info mb-10">
                            <strong class="text-primary">20</strong>
                            <span class="text-muted">/130</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Verbal Reasoning Card -->
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card text-center subject-card">
                    <div class="card-body">
                        <h5 class="card-title">Verbal Reasoning</h5>
                        <p class="text-danger">Needs Practice</p>
                        <div class="subject-info mb-10">
                            <strong class="text-primary">1412</strong>
                            <span class="text-muted">/4000</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Non-Verbal Reasoning Card -->
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card text-center subject-card">
                    <div class="card-body">
                        <h5 class="card-title">Non-Verbal Reasoning</h5>
                        <p class="text-danger">Needs Practice</p>
                        <div class="subject-info mb-10">
                            <strong class="text-primary">935</strong>
                            <span class="text-muted">/4000</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 23%" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Science Card -->
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card text-center subject-card">
                    <div class="card-body">
                        <h5 class="card-title">Science</h5>
                        <p class="text-danger">Needs Practice</p>
                        <div class="subject-info mb-10">
                            <strong class="text-primary">1757</strong>
                            <span class="text-muted">/4000</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 44%" aria-valuenow="44" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Prep Plan -->
            <div class="col-12">
                <div class="prep-plan">
                    <div class="section-title text-left mb-30">
                        <h2 class="font-22">Exam Prep Plan</h2>
                    </div>
                    <div class="plan-item red">
                        <div class="progress-bar" style="width: 100%;"></div>
                        <div class="plan-inner">
                            <div class="subject-title">
                                <span class="icon-box"><img src="/assets/default/svgs/book-bookmark.svg" alt="book-bookmark" title="book-bookmark"></span>
                                English
                            </div>
                            <div class="plan-progress text-right">
                                <i>&#10003;</i>
                                <strong>5<em>/5</em></strong>
                                <span>islands done this week</span>
                            </div>
                        </div>
                        <span class="arrow">&#10140;</span>
                    </div>
                    <div class="plan-item green">
                        <div class="progress-bar" style="width: 50%;"></div>
                        <div class="plan-inner">
                            <div class="subject-title">
                                <span class="icon-box"><img src="/assets/default/svgs/book-bookmark.svg" alt="book-bookmark" title="book-bookmark"></span>
                                VR
                            </div>
                            <div class="plan-progress text-right">
                                <strong>1<em>/2</em></strong>
                                <span>islands done this week</span>
                            </div>
                        </div>
                        <span class="arrow">&#10140;</span>
                    </div>
                    <div class="plan-item blue">
                        <div class="progress-bar" style="width: 25%;"></div>
                        <div class="plan-inner">
                            <div class="subject-title">
                                <span class="icon-box"><img src="/assets/default/svgs/mathematical.svg" alt="mathematical" title="book-bookmark"></span>
                                Maths
                            </div>
                            <div class="plan-progress">
                                <strong>1<em>/4</em></strong>
                                <span>islands done this week</span>
                            </div>
                        </div>
                        <span class="arrow">&#10140;</span>
                    </div>
                    <div class="plan-item yellow">
                        <div class="progress-bar" style="width: 25%;"></div>
                        <div class="plan-inner">
                            <div class="subject-title">
                                <span class="icon-box"><img src="/assets/default/svgs/book-bookmark.svg" alt="book-bookmark" title="book-bookmark"></span>
                                NVR
                            </div>
                            <div class="plan-progress">
                                <strong>1<em>/4</em></strong>
                                <span>islands done this week</span>
                            </div>
                        </div>
                        <span class="arrow">&#10140;</span>
                    </div>
                </div>
            </div>
            @if( isset($LearningJourneys) && $LearningJourneys->count() > 0)
            <div class="col-12">
                <div class="prep-plan">
                    <div class="section-title text-left mb-30">
                        <h2 class="font-22">Learning Journey</h2>
                    </div>
                    @foreach( $LearningJourneys as $learningJourneyObj)
                        @php $level_stages = $learningJourneyObj->learningJourneyStages->pluck('id')->toArray();
			            $completed_stages = auth()->user()->studentJourneyItems->where('status', 'completed')->whereIn('learning_journey_item_id', $level_stages)->count() @endphp
                        <div class="plan-item yellow">
                            <div class="progress-bar" style="width: 25%;"></div>
                            <div class="plan-inner">
                                <div class="subject-title">
                                    <span class="icon-box">@if($learningJourneyObj->subject->icon_code != '')
                                        {!! $learningJourneyObj->subject->icon_code !!}
                                    @else
                                        <img src="{!! $learningJourneyObj->subject->thumbnail !!}" alt="learning image" width="50" height="50">
                                    @endif
                                    </span>
                                    {{$learningJourneyObj->subject->getTitleAttribute()}}
                                </div>
                                <div class="plan-progress">
                                    <strong>{{$completed_stages}}/<em>{{$learningJourneyObj->learningJourneyStages->count()}}</em></strong>
                                    <span>islands done this week</span>
                                </div>
                            </div>
                            <span class="arrow"><a href="/learning-journey/{{$learningJourneyObj->subject->slug}}">&#10140;</a></span>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
            <!-- progress-learning -->
            <div class="col-12 rurera-hide">
                <div class="progress-learning">
                    <div class="progress-learning-header">
                        <h2 class="font-22">In progress learning content</h2>
                        <a href="#">View all</a>
                    </div>
                    <div class="progress-learning-inner">
                        <div class="progress-course-card">
                            <div class="course-info">
                                <div class="course-title">
                                    <p class="course-lable"><span class="icon-box"><img src="/assets/default/svgs/multi-choice.svg" alt=""></span> Course</p>
                                    <h3>Mastering UI/UX Design: A Guide</h3>
                                </div>
                                <ul class="course-info-list">
                                    <li>
                                        <span>Content</span>
                                        <strong><img src="/assets/default/svgs/document-file.svg" alt="document file"> 5 Materials</strong>
                                    </li>
                                    <li>
                                        <span>Complation</span>
                                        <strong>-</strong>
                                    </li>
                                    <li>
                                        <span>Deadline</span>
                                        <strong><img src="/assets/default/svgs/clock.svg" alt="clock"> 1 Day</strong>
                                    </li>
                                </ul>
                            </div>
                            <button class="button">Start</button>
                        </div>
                        <div class="progress-course-card">
                            <div class="course-info">
                                <div class="course-title">
                                    <p class="course-lable"><span class="icon-box"><img src="/assets/default/svgs/multi-choice.svg" alt=""></span> Course</p>
                                    <h3>Creating Engaging Learning Journeys</h3>
                                </div>
                                <ul class="course-info-list">
                                    <li>
                                        <span>Content</span>
                                        <strong><img src="/assets/default/svgs/document-file.svg" alt="document file"> 5 Materials</strong>
                                    </li>
                                    <li>
                                        <span>Complation</span>
                                        <div class="progress-box">
                                            <div class="circle_percent circle-green" data-percent="64">
                                                <div class="circle_inner">
                                                    <div class="round_per"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <span>Deadline</span>
                                        <strong class="over-time"><img src="/assets/default/svgs/clock.svg" alt="clock"> 12 hrs</strong>
                                    </li>
                                </ul>
                            </div>
                            <button class="button secondary">Continue</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="assignments-table count-number-wrapp mt-30 rurera-hide">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <ul class="count-number-boxes row">
                        <li class="count-number-card col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="count-number-icon">
                                <i data-feather="edit-2" width="20" height="20" style="color:#8cc811"></i>
                            </div>
                            <div class="count-number-body">
                                <h5>answered</h5>
                                <strong>1,355</strong>
                                <h5>questions</h5>
                            </div>
                        </li>
                        <li class="count-number-card col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="count-number-icon">
                                <i data-feather="clock" width="20" height="20" style="color:#00aeef"></i>
                            </div>
                            <div class="count-number-body">
                                <h5>spent</h5>
                                <strong>11 hr 32 min</strong>
                                <h5>practising</h5>
                            </div>
                        </li>
                        <li class="count-number-card col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="count-number-icon">
                                <i data-feather="bar-chart" width="20" height="20" style="color:#e67035"></i>
                            </div>
                            <div class="count-number-body">
                                <h5>Made progress in</h5>
                                <strong>73</strong>
                                <h5>skills</h5>
                            </div>
                        </li>
                        <li class="count-number-card col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="count-number-icon">
                                <i data-feather="bar-chart" width="20" height="20" style="color:#e67035"></i>
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
</section>
@if(!auth()->user()->isUser())
<div class="dashboard-students-holder mt-30">
    <div class="member-card-header mb-15">
        <div class="section-title text-left">
            <h2 class="font-22 font-weight-bold">Set Work</h2>
        </div>
    </div>
	@include('web.default.flash_message')
    @if(isset($assignments))
	    @include('web.default.panel.set_work.set_work_listing',['assignments' => $assignments])
    @endif
</div>
@endif
@if(auth()->user()->isUser())

    <div class="dashboard-students-holder mt-30 rurera-hide">
        <div class="member-card-header mb-15">
            <div class="section-title text-left">
                <h2 class="font-22 font-weight-bold">Set Work</h2>
            </div>
        </div>
        @include('web.default.panel.set_work.set_work_listing',['assignments' => []])
    </div>
@endif
@if(auth()->user()->isUser())

@if( $continueTests->count() > 0 || $assignmentsArray->count() > 0)

	<div class="quests-list quests-learning mt-30">
		<div class="section-title text-left mb-15 d-flex flex-wrap justify-content-between align-items-center mt-5">
			<h2 class="font-22">Continue Learning</h2>
        </div>
		<section class="dashboard">
			<div class="db-form-tabs mb-15">
				<div class="db-members">
					<div class="row g-3 list-unstyled students-requests-list">
						@foreach( $continueTests as $resultObj)
							<div class="col-12 col-lg-12 students-requests-list-item">
								<div class="notification-card mb-20 rounded-sm panel-shadow bg-white py-15 py-lg-20 px-15 px-lg-20">
									<div class="row align-items-center">
										<div class="col-12 col-lg-9 mt-10 mt-lg-0 d-flex align-items-start">
											<span class="notification-badge badge mr-10 mt-5 d-flex align-items-center justify-content-center"></span>
											<div>
												<h3 class="notification-title font-18 font-weight-bold text-dark-blue mb-5">{{$resultObj->parentQuiz->getTitleAttribute()}} ({{$resultObj->sameParent->count()}})</h3>
												<span class="notification-time d-block text-gray mt-5">{{dateTimeFormat($resultObj->created_at, 'j M Y')}}</span>
											</div>
										</div>
										<div class="col-12 col-lg-3 mt-10 mt-lg-0 text-right resume-test">
											<a href="/sats/{{$resultObj->parentQuiz->quiz_slug}}" data-request_type="approved" class="request-action-btn js-show-message btn btn-border-white">Resume Test</a>
										</div>
									</div>
								</div>
							</div>
						@endforeach
						@if( $assignmentsArray->count() > 0 )
						@foreach( $assignmentsArray as $assignmentObj)
						@php
                        if(!isset($assignmentObj->StudentAssignmentData->id)){
                            continue;
                        }
						$assignmentTitle = $assignmentObj->StudentAssignmentData->title;
						$assignmentLink = '/assignment/'.$assignmentObj->id;
						@endphp

						<div class="col-12 col-lg-12 students-requests-list-item">
							<div class="notification-card mb-20 rounded-sm panel-shadow bg-white py-15 py-lg-20 px-15 px-lg-20">
								<div class="row align-items-center">
									<div class="col-12 col-lg-9 mt-10 mt-lg-0 d-flex align-items-start">
										<span class="notification-badge badge mr-10 mt-5 d-flex align-items-center justify-content-center"></span>
										<div>
											<h3 class="notification-title font-18 font-weight-bold text-dark-blue mb-5">{{$assignmentTitle}} by {{$assignmentObj->StudentAssignmentData->creator->get_full_name()}} ({{ucfirst($assignmentObj->StudentAssignmentData->assignment_type)}})</h3>
											<span class="notification-time d-block text-gray mt-5"> {{dateTimeFormat($assignmentObj->deadline_date, 'd F Y')}}</span>
										</div>
									</div>
									<div class="col-12 col-lg-3 mt-10 mt-lg-0 text-right resume-test">
										<a href="{{$assignmentLink}}" data-request_type="approved" class="request-action-btn js-show-message btn btn-border-white">Start Practicing</a>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						@endif
					</div>
				</div>
			</div>
		</section>
	</div>
@endif

<div class="quests-list quests-learning mt-30 rurera-hide">
	@if( $quests->count() > 0)
    <div class="section-title text-left mb-10">
        <h2 class="font-16 font-weight-bold">Weekly Learning Journeys</h2>
    </div>
	<ul>
		@foreach( $quests as $questObj)

			@php

			$questUserData = $DailyQuestsController->getQuestUserData($questObj);
			$resultsRecords = isset( $questUserData['resultsRecords'] )? $questUserData['resultsRecords'] : array();
			$no_of_practices = isset( $questUserData['no_of_practices'] )? $questUserData['no_of_practices'] : 0;


			$quest_icon = '/assets/default/img/types/'.$questObj->quest_topic_type.'.png';
			$quest_icon = ( $questObj->quest_icon != '')? $questObj->quest_icon : $quest_icon;
			@endphp
			@php $link = isset( $questObj->learningJourney->subject->slug )? $questObj->learningJourney->subject->slug : ''; @endphp


			<li class="d-flex align-items-center justify-content-between flex-wrap bg-white p-20 mb-20 bg-danger">
				<div class="quests-item">
					<div class="icon-box d-inline-flex justify-content-center align-items-center mr-10" >
						<img src="{{$quest_icon}}" alt="learning image" width="50" height="50">
					</div>
					<div class="item-text">
						<h5 class="font-14 font-weight-500"><a href="/learning-journey/{{$link}}">{{$questObj->title}}</a></h5>
						<div class="levels-progress horizontal">
							<span class="progress-box">
								<span class="progress-count" style="width: 0%;"></span>
							</span>
						</div>
						<span class="progress-icon font-14 font-weight-normal">
							<img src="/assets/default/img/quests-coin.png" alt="quests-coin" width="35" height="35">
							+{{isset( $questUserData['questScore'] )? $questUserData['questScore'] : 0}}
						</span>
						<span class="progress-info d-block pt-5 font-14 font-weight-normal">
							<strong>{{isset( $questUserData['quest_bar_label'] )? $questUserData['quest_bar_label'] : ''}}</strong> Stages Completed
						</span>
					</div>
				</div>
				<div class="icon-box mt-20 stages-items ">
					@php $attempted_count = 0; @endphp
					@if( !empty($resultsRecords))
						@foreach( $resultsRecords as $result_id => $percentage)
							@php $resultObj = QuizzesResult::find($result_id); @endphp
							@if(isset( $resultObj->id))
								@php $attempted_count++; @endphp
								<a href="javascript:;" class="locked_nugget rurera-tooltip">
									<img src="{{$quest_icon}}" alt="{{$quest_icon}}">
									<div class="lms-tooltip">
										<div class="tooltip-box">
											<h5 class="font-16 font-weight-bold text-white mb-5">
											Active practice: 11<br>
											Questions answered: 11 <br>
											<img src="/assets/default/img/panel-sidebar/coins.svg" alt="coins" width="30">Coins earned:11
											</h5>
											<button class="tooltip-button" onclick="window.location.href='/panel/quizzes/11/check_answers';">Result</button>
										</div>
									</div>
								</a>
							@endif
						@endforeach
					@endif

					@php $remaining_attempts = $no_of_practices - $attempted_count; @endphp

					@if( $questObj->quest_topic_type == 'learning_journey')
    					@while( $remaining_attempts >= 1)
    						<a href="/learning-journey/{{$link}}" class="locked_nugget">
    							<span class="learning-journey-item"></span>
    						</a>
    						@php $remaining_attempts--; @endphp
    					@endwhile
					@endif
				</div>
			</li>
		@endforeach

	</ul>
	@endif
</div>

<div class="quests-list quests-learning rurera-hide">

	@if( $LearningJourneys->count() > 0)
	<div class="section-title text-left mb-30">
		<h2 class="font-22">Learning Journeys</h2>
	</div>
	<ul>
		@foreach( $LearningJourneys as $learningJourneyObj)
			@php $level_stages = $learningJourneyObj->learningJourneyStages->pluck('id')->toArray();
			$user_completed_stages = $userObj->studentJourneyItems->where('status', 'completed')->whereIn('learning_journey_item_id', $level_stages);
			$completed_stages = $userObj->studentJourneyItems->where('status', 'completed')->whereIn('learning_journey_item_id', $level_stages)->count() @endphp
			<li class="d-flex align-items-center justify-content-between flex-wrap bg-white p-20 mb-20 bg-danger">
				<div class="quests-item">
					<div class="icon-box">
						@if($learningJourneyObj->subject->icon_code != '')
							   {!! $learningJourneyObj->subject->icon_code !!}
						@else
						   <img src="{!! $learningJourneyObj->subject->thumbnail !!}" alt="learning image" width="50" height="50">
						@endif
					</div>
					<div class="item-text">
						<h5 class="font-18 font-weight-bold"><a href="/learning-journey/{{$learningJourneyObj->subject->slug}}">{{$learningJourneyObj->subject->getTitleAttribute()}}</a></h5>
						<div class="levels-progress horizontal">
							<span class="progress-box">
								<span class="progress-count" style="width: 0%;"></span>
							</span>
						</div>
						<span class="progress-icon font-16 font-weight-normal">
							<img src="/assets/default/img/quests-coin.png" alt="quests-coin" width="35" height="35">
							+20
						</span>
						<span class="progress-info d-block pt-5">
							<strong>{{$completed_stages}}/{{$learningJourneyObj->learningJourneyStages->count()}}</strong> Stages Completed
						</span>
					</div>
				</div>
				@if( $user_completed_stages->count() > 0)
					<div class="p-0 mt-30 treasure-mission-layout" style="width:100%;">
						<div class="spell-levels border-0" data-mission_id="mission_1">
							<div class="treasure-stage">
								<ul class="justify-content-start horizontal-list p-0 " style="display: block;">
									@foreach( $user_completed_stages as $stageObj)
										@php $resultObj = $stageObj->result;@endphp
										@if(isset( $resultObj->id))
										<li class="intermediate completed " data-id="nugget_1_1_1" data-quiz_level="medium">
											<a href="javascript:;" class="locked_nugget rurera-tooltip" data-id="nugget_1_1_1" title="1Plant cells"><img src="/assets/default/img/tick-white.png" alt="">

												<div class="lms-tooltip">
													<div class="tooltip-box">
														<h5 class="font-18 font-weight-bold text-white mb-5">
														Active practice: {{getTimeWithText($resultObj->quizz_result_questions_list->where('status', '!=', 'waiting')->sum('time_consumed'))}}<br>
														Questions answered: {{$resultObj->quizz_result_questions_list->where('status', '!=', 'waiting')->count()}} <br>
														<img src="/assets/default/img/panel-sidebar/coins.svg" alt="coins" width="30">Coins earned:{{$resultObj->quizz_result_questions_list->where('status', 'correct')->sum('quiz_grade')}}
														</h5>
														<button class="tooltip-button" onclick="window.location.href='/panel/results/{{$resultObj->id}}/timetables';">Result</button>
													</div>
												</div>
											</a>
										</li>
										@endif
									@endforeach
								</ul>
							</div>
						</div>
					</div>
				@endif
			</li>
		@endforeach
	</ul>
	@endif
</div>

@endif
<div class="dashboard rurera-hide">
    @if(auth()->check() && (auth()->user()->isUser()))
    <div class="row ">
        <div class="col-12 col-lg-12 mt-35">
           <section>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="verticle-tabs">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                     aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill"
                                       href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                        <div class="count-number-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                 stroke-linejoin="round" class="feather feather-edit-2" style="color:#8cc811">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                            </svg>
                                        </div>
                                        <div class="count-number-body">
                                            <span>Assessments</span>
                                            <strong>48</strong>
                                            <h5>Courses</h5>
                                        </div>
                                    </a>
                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill"
                                       href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                        <div class="count-number-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                 stroke-linejoin="round" class="feather feather-clock" style="color:#00aeef">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <polyline points="12 6 12 12 16 14"></polyline>
                                            </svg>
                                        </div>
                                        <div class="count-number-body">
                                            <span>Q. Attempt</span>
                                            <strong>300</strong>
                                            <h5>SATS</h5>
                                        </div>
                                    </a>
                                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill"
                                       href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                        <div class="count-number-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                 stroke-linejoin="round" class="feather feather-bar-chart" style="color:#e67035">
                                                <line x1="12" y1="20" x2="12" y2="10"></line>
                                                <line x1="18" y1="20" x2="18" y2="4"></line>
                                                <line x1="6" y1="20" x2="6" y2="16"></line>
                                            </svg>
                                        </div>
                                        <div class="count-number-body">
                                            <span>Coins</span>
                                            <strong>5000</strong>
                                            <h5>11+</h5>
                                        </div>
                                    </a>
                                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill"
                                       href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                                        <div class="count-number-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                 stroke-linejoin="round" class="feather feather-bar-chart" style="color:#e67035">
                                                <line x1="12" y1="20" x2="12" y2="10"></line>
                                                <line x1="18" y1="20" x2="18" y2="4"></line>
                                                <line x1="6" y1="20" x2="6" y2="16"></line>
                                            </svg>
                                        </div>
                                        <div class="count-number-body">
                                            <span>Assessments</span>
                                            <strong>73</strong>
                                            <h5>Books</h5>
                                        </div>
                                    </a>
                                </div>
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                         aria-labelledby="v-pills-home-tab">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="chart-box">
                                                    <div class="chart-title text-center">
                                                        <h2>Pageviews</h2>
                                                    </div>
                                                    <div class="chart">
                                                        <canvas id="chartBarHorizontal2" height="250"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                         aria-labelledby="v-pills-profile-tab">
                                        Profile
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                         aria-labelledby="v-pills-messages-tab">
                                        Messages
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                         aria-labelledby="v-pills-settings-tab">
                                        Settings
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @endif

   <div class="row">
        <div class="col-12 col-lg-3 mt-35">
            <a href="@if($authUser->isUser()) /panel/webinars/purchases @else /panel/meetings/requests @endif" class="dashboard-stats rounded-sm panel-shadow p-10 p-md-20 d-flex align-items-center">
                <div class="stat-icon requests">
                    <img src="/assets/default/img/icons/request.svg" alt="request">
                </div>
                <div class="d-flex flex-column ml-15">
                    <span class="font-30 text-secondary">{{ !empty($pendingAppointments) ? $pendingAppointments : (!empty($webinarsCount) ? $webinarsCount : 0) }}</span>
                    <span class="font-16 text-gray font-weight-500">{{ $authUser->isUser() ? trans('panel.purchased_courses') : trans('panel.pending_appointments') }}</span>
                </div>
            </a>

            <a href="@if($authUser->isUser()) /panel/meetings/reservation @else /panel/financial/sales @endif" class="dashboard-stats rounded-sm panel-shadow p-10 p-md-20 d-flex align-items-center mt-15 mt-md-30">
                <div class="stat-icon monthly-sales">
                    <img src="@if($authUser->isUser()) /assets/default/img/icons/meeting.svg @else /assets/default/img/icons/monay.svg @endif" alt="monay">
                </div>
                <div class="d-flex flex-column ml-15">
                    <span class="font-30 text-secondary">{{ !empty($monthlySalesCount) ? handlePrice($monthlySalesCount) : (!empty($reserveMeetingsCount) ? $reserveMeetingsCount : 0) }}</span>
                    <span class="font-16 text-gray font-weight-500">{{ $authUser->isUser() ? trans('panel.meetings') : trans('panel.monthly_sales') }}</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-lg-3 mt-35">
            <a href="/panel/support" class="dashboard-stats rounded-sm panel-shadow p-10 p-md-20 d-flex align-items-center">
                <div class="stat-icon support-messages">
                    <img src="/assets/default/img/icons/support.svg" alt="support">
                </div>
                <div class="d-flex flex-column ml-15">
                    <span class="font-30 text-secondary">{{ !empty($supportsCount) ? $supportsCount : 0 }}</span>
                    <span class="font-16 text-gray font-weight-500">{{ trans('panel.support_messages') }}</span>
                </div>
            </a>

            <a href="@if($authUser->isUser()) /panel/webinars/my-comments @else /panel/webinars/comments @endif" class="dashboard-stats rounded-sm panel-shadow p-10 p-md-20 d-flex align-items-center mt-15 mt-md-30">
                <div class="stat-icon comments">
                    <img src="/assets/default/img/icons/comment.svg" alt="comment">
                </div>
                <div class="d-flex flex-column ml-15">
                    <span class="font-30 text-secondary">{{ !empty($commentsCount) ? $commentsCount : 0 }}</span>
                    <span class="font-16 text-gray font-weight-500">{{ trans('panel.comments') }}</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-lg-3 mt-35">
            <div class="bg-white account-balance rounded-sm panel-shadow py-15 py-md-15 px-10 px-md-20">
                <div data-percent="{{ !empty($nextBadge) ? $nextBadge['percent'] : 0 }}" data-label="{{ (!empty($nextBadge) and !empty($nextBadge['earned'])) ? $nextBadge['earned']->title : '' }}" id="nextBadgeChart" class="text-center">
                </div>
                <div class="mt-10 pt-10 border-top border-gray300 d-flex align-items-center justify-content-between">
                    <span class="font-16 font-weight-500 text-gray">{{ trans('panel.next_badge') }}:</span>
                    <span class="font-16 font-weight-bold text-secondary">{{ (!empty($nextBadge) and !empty($nextBadge['badge'])) ? $nextBadge['badge']->title : trans('public.not_defined') }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-12 mt-35">
            <div class="bg-white noticeboard rounded-sm panel-shadow py-10 py-md-20 px-15 px-md-30">
                <h3 class="font-16 text-dark-blue font-weight-bold">{{ trans('panel.noticeboard') }}</h3>

                @foreach($authUser->getUnreadNoticeboards() as $getUnreadNoticeboard)
                <div class="noticeboard-item py-15">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="js-noticeboard-title font-weight-500 text-secondary">{!!
                                truncate($getUnreadNoticeboard->title,150) !!}</h4>
                            <div class="font-12 text-gray mt-5">
                                <span class="mr-5">{{ trans('public.created_by') }} {{ $getUnreadNoticeboard->sender }}</span>
                                |
                                <span class="js-noticeboard-time ml-5">{{ dateTimeFormat($getUnreadNoticeboard->created_at,'j M Y | H:i') }}</span>
                            </div>
                        </div>

                        <div>
                            <button type="button" data-id="{{ $getUnreadNoticeboard->id }}"
                                    class="js-noticeboard-info btn btn-sm btn-border-white">{{ trans('panel.more_info')
                                }}
                            </button>
                            <input type="hidden" class="js-noticeboard-message" value="{{ $getUnreadNoticeboard->message }}">
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    </section>
    <section style="padding: 0 0 60px;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9 col-md-8 mt-35">
                    <div class="bg-white monthly-sales-card rounded-sm panel-shadow py-10 py-md-20 px-15 px-md-30">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="font-16 text-dark-blue font-weight-bold">{{ ($authUser->isUser()) ?
                                trans('panel.learning_statistics') : trans('panel.monthly_sales') }}</h3>

                            <span class="font-16 font-weight-500 text-gray">{{ dateTimeFormat(time(),'M Y') }}</span>
                        </div>

                        <div class="monthly-sales-chart">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-4 mt-35">
                    <div class="assignments-table count-number-wrapp">
                        <ul class="count-number-boxes count-number-verticle row">
                            <li class="count-number-card col-12">
                                <a href="#" class="count-number-btn">
                                    <div class="count-number-icon">
                                        <i data-feather="edit-2" width="20" height="20" style="color:#8cc811"></i>
                                    </div>
                                    <div class="count-number-body">
                                        <h5>Assessments</h5>
                                        <strong>48</strong>
                                        <h5>Courses</h5>
                                    </div>
                                </a>
                            </li>
                            <li class="count-number-card col-12">
                                <a href="#" class="count-number-btn">
                                    <div class="count-number-icon">
                                        <i data-feather="clock" width="20" height="20" style="color:#00aeef"></i>
                                    </div>
                                    <div class="count-number-body">
                                        <h5>Q. Attempt</h5>
                                        <strong>300</strong>
                                        <h5>SATS</h5>
                                    </div>
                                </a>
                            </li>
                            <li class="count-number-card col-12">
                                <a href="#" class="count-number-btn">
                                    <div class="count-number-icon">
                                        <i data-feather="bar-chart" width="20" height="20" style="color:#e67035"></i>
                                    </div>
                                    <div class="count-number-body">
                                        <h5>Coins</h5>
                                        <strong>5000</strong>
                                        <h5>11+</h5>
                                    </div>
                                </a>
                            </li>
                            <li class="count-number-card col-12">
                                <a href="#" class="count-number-btn">
                                    <div class="count-number-icon">
                                        <i data-feather="bar-chart" width="20" height="20" style="color:#e67035"></i>
                                    </div>
                                    <div class="count-number-body">
                                        <h5>Assessments</h5>
                                        <strong>73</strong>
                                        <h5>Books</h5>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="d-none" id="iNotAvailableModal">
        <div class="offline-modal">
            <h3 class="section-title after-line">{{ trans('panel.offline_title') }}</h3>
            <p class="mt-20 font-16 text-gray">{{ trans('panel.offline_hint') }}</p>

            <div class="form-group mt-15">
                <label>{{ trans('panel.offline_message') }}</label>
                <textarea name="message" rows="4" class="form-control">{{ $authUser->offline_message }}</textarea>
                <div class="invalid-feedback"></div>
            </div>

            <div class="mt-30 d-flex align-items-center justify-content-end">
                <button type="button" class="js-save-offline-toggle btn btn-primary btn-sm">{{ trans('public.save') }}
                </button>
                <button type="button" class="btn btn-danger ml-10 close-swl btn-sm">{{ trans('public.close') }}</button>
            </div>
        </div>
    </div>

    <div class="d-none" id="noticeboardMessageModal">
        <div class="text-center">
            <h3 class="modal-title font-20 font-weight-500 text-dark-blue"></h3>
            <span class="modal-time d-block font-12 text-gray mt-25"></span>
            <p class="modal-message font-weight-500 text-gray mt-4"></p>
        </div>
    </div>
    </div>

    @endsection

    @push('scripts_bottom')
    <script src="/assets/default/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="/assets/default/vendors/chartjs/chart.min.js"></script>

    <script>
        var offlineSuccess = '';
        var $chartDataMonths = @json($monthlyChart['months']);
        var $chartData = @json($monthlyChart['data']);
    </script>

    <script type="text/javascript">
        feather.replace();
    </script>
		<script type="text/javascript">
var searchRequest = null;


$('body').on('click', '.progress-info', function (e) {
	$(this).closest('li').find('.stages-items').toggleClass('rurera-hide');
});

$('body').on('click', '.set-work-ajax li', function (e) {
    rurera_loader($(".set-work-content"), 'div');
    $(".set-work-ajax li").removeAttr('class');
    $(this).addClass('active');
    var assignment_status = $(this).attr('data-type');
    searchRequest = jQuery.ajax({
        type: "GET",
        url: '/panel/set-work/search',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function () {
            if (searchRequest != null) {
                searchRequest.abort();
            }
        },
        data: {"assignment_status": assignment_status},
        success: function (return_data) {
            rurera_remove_loader($(".set-work-content"), 'div');
            $(".set-work-content").html(return_data);
        }
    });

});
</script>
<script>
$(document).ready(function () {
    $(".circle_percent").each(function() {
        var $this = $(this),
            $dataV = $this.data("percent"),
            $dataDeg = $dataV * 3.6,
            $round = $this.find(".round_per");

        $round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)");

        // Append circle_inbox outside of circle_percent
        $this.after('<div class="circle_inbox"><span class="percent_text"></span></div>');

        $this.prop('Counter', 0).animate({ Counter: $dataV }, {
            duration: 2000,
            easing: 'swing',
            step: function (now) {
                $this.next(".circle_inbox").find(".percent_text").text(Math.ceil(now) + "%");
            }
        });

        if ($dataV >= 51) {
            $round.css("transform", "rotate(" + 360 + "deg)");
            setTimeout(function() {
                $this.addClass("percent_more");
            }, 1000);
            setTimeout(function() {
                $round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)");
            }, 1000);
        }
    });
});
</script>
@endpush

    @if(!empty($giftModal))
    @push('scripts_bottom2')
    <script>
        (function () {
            "use strict";

            handleLimitedAccountModal('{!! $giftModal !!}', 40)
        })(jQuery)
    </script>

    @endpush
    @endif

