@php
    $layout = auth()->check() && auth()->user()->isParent() 
        ? getTemplate() . '.panel.layouts.panel_layout_full' 
        : getTemplate() . '.panel.layouts.panel_layout';
@endphp
@extends($layout)
@push('styles_top')
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">

    <link href="/assets/default/vendors/svgavatars/css/normalize.css" rel="stylesheet">
	<link href="/assets/default/vendors/svgavatars/css/spectrum.css" rel="stylesheet">
	<link href="/assets/default/vendors/svgavatars/css/svgavatars.css" rel="stylesheet">

    <script src="/assets/default/vendors/svgavatars/js/jquery-3.5.1.min.js"></script>
	<script src="/assets/default/vendors/svgavatars/js/svgavatars.tools.js"></script>
	<script src="/assets/default/vendors/svgavatars/js/svgavatars.defaults.js"></script>
	<script src="/assets/default/vendors/svgavatars/js/languages/svgavatars.en.js"></script>
	<script src="/assets/default/vendors/svgavatars/js/svgavatars.core.min.js"></script>

@endpush

@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-12 mx-auto">
            <div class="setup-quiz-body">
                <div class="section-title text-center mb-30">
                    <h2>Sciency Science</h2>
                    <span>8 questions</span>
                </div>
                <div class="setup-quiz-card mb-30 bg-white panel-border rounded-sm">
                    <div class="setup-quiz-header mb-15 p-20">
                        <h3>Set up your quiz</h3>
                    </div>
                    <div class="setup-quiz-content px-20 mb-25">
                        <div class="content-heading d-flex align-items-center justify-content-between mb-25">
                            <h4 class="font-weight-500">Set a start time for activity</h4>
                            <div class="form-group custom-switches-stacked mb-0">
                                <label class="custom-switch pl-0 mb-0">
                                    <input type="checkbox" name="review_required" id="review_required" value="1" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="fields-holder mb-25">
                            <div class="input-field">
                                <button type="button"><img src="/assets/default/svgs/calendar.svg" alt=""></button>
                                <input type="text" placeholder="Tuesday December 3">
                            </div>
                            <span class="comma mx-10">,</span>
                            <div class="select-field">
                                <select>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                </select>
                            </div>
                            <span class="comma mx-10">:</span>
                            <div class="select-field mr-10">
                                <select>
                                    <option value="00">00</option>
                                    <option value="02">02</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                </select>
                            </div>
                            <div class="select-field">
                                <select>
                                    <option value="PM">PM</option>
                                    <option value="AM">AM</option>
                                </select>
                            </div>
                        </div>
                        <span class="time-info d-block text-center">
                            <em>37 minutes</em>
                            from now
                        </span>
                    </div>
                    <div class="setup-quiz-content px-20 d-flex align-items-center justify-content-between">
                        <div class="content-heading">
                            <h4 class="font-weight-500">Set a start time for activity</h4>
                            <span class="d-block pt-5">The number of times a student can attempt the activity.</span>
                        </div>
                        <div class="select-field">
                            <select>
                                <option value="Unlimited">Unlimited</option>
                                <option value="Limited">Limited</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="setup-quiz-card mb-30 bg-white panel-border rounded-sm">
                    <div class="setup-quiz-header mb-15 p-20">
                        <h3>Mastery and learning</h3>
                    </div>
                    <div class="setup-quiz-content px-20 mb-25 disabled-quiz">
                        <div class="content-heading d-flex align-items-center justify-content-between mb-25">
                            <div class="heading-box">
                                <h4 class="font-weight-500">Mastery mode</h4>
                                <span class="d-block pt-5">Achieve mastery by allowing students to reattempt incorrect awensors <br> till they reach the set goal</span>
                            </div>
                            <div class="form-group custom-switches-stacked mb-0">
                                <label class="custom-switch pl-0 mb-0">
                                    <input type="checkbox" name="review_required" id="review_required" value="1" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <span class="timer-off d-block mb-20">Turn off <em>timer</em> to enable feature</span>
                        <div class="mastery-options">
                            <div class="field-option d-flex align-items-center justify-content-between">
                                <span>Mastery goal</span>
                                <div class="select-box">
                                    <select>
                                        <option value="80% accuracy">80% accuracy</option>
                                        <option value="80% accuracy">70% accuracy</option>
                                        <option value="80% accuracy">60% accuracy</option>
                                        <option value="80% accuracy">50% accuracy</option>
                                        <option value="80% accuracy">40% accuracy</option>
                                    </select>
                                </div>
                            </div>
                            <div class="field-option d-flex align-items-center justify-content-between">
                                <span>Reattempts per question</span>
                                <div class="select-box">
                                    <select>
                                        <option value="2 reattempts">2 reattempts</option>
                                        <option value="2 reattempts">2 reattempts</option>
                                        <option value="2 reattempts">60% accuracy</option>
                                        <option value="2 reattempts">50% accuracy</option>
                                        <option value="2 reattempts">40% accuracy</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="setup-quiz-content px-20 mb-25">
                        <div class="content-heading d-flex align-items-center justify-content-between mb-25">
                            <div class="heading-box">
                                <h4 class="font-weight-500">Redemption questions</h4>
                                <span class="d-block pt-5">Allow students to reattemt a few incorrect questions.</span>
                            </div>
                            <div class="form-group custom-switches-stacked mb-0">
                                <label class="custom-switch pl-0 mb-0">
                                    <input type="checkbox" name="review_required" id="review_required" value="1" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="setup-quiz-content px-20 mb-25">
                        <div class="content-heading d-flex align-items-center justify-content-between mb-25">
                            <div class="heading-box">
                                <h4 class="font-weight-500">Redemption quiz</h4>
                                <span class="d-block pt-5">Allow students to awensor all incorrect questions at the end to improve accuracy.</span>
                            </div>
                            <div class="form-group custom-switches-stacked mb-0">
                                <label class="custom-switch pl-0 mb-0">
                                    <input type="checkbox" name="review_required" id="review_required" value="1" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
		@if(auth()->check() && auth()->user()->isParent())
        <div class="col-lg-8 col-md-8 col-12 mx-auto">
		@endif
            <form method="post" id="userSettingForm" class="mt-10 userSettingForm" action="{{ (!empty($new_user)) ? '/panel/manage/'. $user_type .'/new' : '/panel/setting' }}">
                {{ csrf_field() }}
                <input type="hidden" name="step" value="{{ !empty($currentStep) ? $currentStep : 1 }}">
                <input type="hidden" name="next_step" value="0">

                @if(!empty($organization_id))
                    <input type="hidden" name="organization_id" value="{{ $organization_id }}">
                    <input type="hidden" id="userId" name="user_id" value="{{ $user->id }}">
                @endif

                @if(!empty($new_user) or (!empty($currentStep) and $currentStep == 1))
                    @if(auth()->user()->isUser())
                        @include('web.default.panel.setting.setting_includes.basic_information')
                    @else
                        @include('web.default.panel.setting.setting_includes.parent_profile')
                    @endif
                @endif
                @if(!auth()->user()->isUser())
                    @include('web.default.panel.financial.summary')
                @endif

            </form>
		@if(auth()->check() && auth()->user()->isParent())
        </div>
		@endif
    </div>
@endsection

@push('scripts_bottom')
    <script src="/assets/vendors/cropit/jquery.cropit.js"></script>
    <script src="/assets/default/js/parts/img_cropit.min.js"></script>
    <script src="/assets/default/vendors/select2/select2.min.js"></script>

    <script>
        var editEducationLang = '{{ trans('site.edit_education') }}';
        var editExperienceLang = '{{ trans('site.edit_experience') }}';
        var saveSuccessLang = '{{ trans('webinars.success_store') }}';
        var saveErrorLang = '{{ trans('site.store_error_try_again') }}';
        var notAccessToLang = '{{ trans('public.not_access_to_this_content') }}';
		
		
		$(document).on('submit', '.userSettingForm', function (e) {
			var formData = new FormData($('.userSettingForm')[0]);
			returnType = rurera_validation_process($(".userSettingForm"), 'under_field');
			if (returnType == false) {
				$("#saveData").removeClass('loadingbar');
				$("#saveData").removeAttr('disabled');
				return false;
			}
			return true;
		});
		
		
    </script>
	
	userSettingForm

    <script src="/assets/default/js/panel/user_setting.min.js"></script>
@endpush
