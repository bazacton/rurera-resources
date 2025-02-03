<html lang="{{ app()->getLocale() }}">
@php
    $rtlLanguages = !empty($generalSettings['rtl_languages']) ? $generalSettings['rtl_languages'] : [];

    $isRtl = ((in_array(mb_strtoupper(app()->getLocale()), $rtlLanguages)) or (!empty($generalSettings['rtl_layout']) and $generalSettings['rtl_layout'] == 1));
	$rand_no = rand(99,9999);
@endphp
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $pageTitle ?? '' }} </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- General CSS File -->
    <link rel="stylesheet" href="/assets/admin/vendor/bootstrap/bootstrap.min.css"/>
    <link rel="stylesheet" href="/assets/vendors/fontawesome/css/all.min.css"/>
    <link rel="stylesheet" href="/assets/default/vendors/toast/jquery.toast.min.css">


    @stack('libraries_top')

    <link rel="stylesheet" href="/assets/admin/css/style.css?ver={{$rand_no}}">
    <link rel="stylesheet" href="/assets/admin/css/custom.css?ver={{$rand_no}}">
    <link rel="stylesheet" href="/assets/admin/css/components.css?ver={{$rand_no}}">
    @if($isRtl)
        <link rel="stylesheet" href="/assets/admin/css/rtl.css?ver={{$rand_no}}">
    @endif
    <link rel="stylesheet" href="/assets/admin/vendor/daterangepicker/daterangepicker.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
	
	@if(auth()->user()->isAdminTeacher())
		<link rel="stylesheet" href="/assets/admin/css/teacher-style.css?ver={{$rand_no}}">
	@endif

    @stack('styles_top')
    @stack('scripts_top')

    <style>
        {!! !empty(getCustomCssAndJs('css')) ? getCustomCssAndJs('css') : '' !!}

        {!! getThemeColorsSettings(true) !!}
    </style>
</head>
@php $user_role = isset( auth()->user()->role_name )? auth()->user()->role_name : ''; @endphp
<body class="@if($isRtl) rtl @endif {{$user_role}}_role">
    <div id="app">
        <div class="main-wrapper">
            @include('admin.includes.navbar')

            @include('admin.includes.sidebar')


            @if(auth()->user()->isAdminTeacher())
                @if(request()->is('admin/custom_page/tailer_hub'))
                    <div class="question-content-header">
                        <div class="section-heading">
                            <h1>Tailer Hub</h1>
                        </div>
                        <div class="page-controls">
                            <button class="setting-btn" type="button" data-toggle="tooltip" data-placement="top" data-trigger="hover" title="" data-original-title="Settings"><img src="/assets/default/svgs/settings.svg" alt=""></button>
                            <button type="button" class="preview-btn"><img src="/assets/default/svgs/eye-show.svg" alt=""> Preview</button>
                            <button type="button" class="publish-btn"><img src="/assets/default/svgs/publish.svg" alt=""> Publish</button>
                        </div>
                    </div>
                @endif
            @endif
            
            <div class="main-content">

                @yield('content')

            </div>
        </div>

        <div class="modal fade" id="fileViewModal" tabindex="-1" aria-labelledby="fileViewModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <img src="" class="w-100" height="350px" alt="">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('public.close') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="quiz-data-slide">
            <div class="quiz-data-slide-inner">
                <div class="slide-controls">
                    <button type="button" class="close-btn">
                        <span>×</span>
                    </button>
                </div>
                <div class="setup-quiz-body mb-20">
                    <div class="setup-quiz-card mb-30 bg-white panel-border rounded-sm">
                        <div class="setup-quiz-header mb-15 p-20">
                            <h3>Set up your quiz</h3>
                        </div>
                        <div class="setup-quiz-content px-20 mb-25">
                            <div class="content-heading d-flex align-items-center justify-content-between mb-25">
                                <h4 class="font-weight-600 font-16 mb-0">Set a start time for activity</h4>
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
                                <h4 class="font-weight-600 font-16 mb-1">Set a start time for activity</h4>
                                <span class="d-block">The number of times a student can attempt the activity.</span>
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
                            <h3>Game Assignment Settings</h3>
                        </div>
                        <div class="setup-quiz-content px-20">
                            <div class="content-heading d-flex align-items-center justify-content-between">
                                <div class="heading-box">
                                    <h4 class="font-weight-600 font-16 mb-1">Assign to a class <span>(optional)</span></h4>
                                    <span class="d-block">You have 1 class</span>
                                </div>
                                <div class="btn-holder">
                                    <button type="button" class="select-btn">Select a class</button>
                                </div>
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
                                    <h4 class="font-weight-600 font-16 mb-1">Mastery mode</h4>
                                    <span class="d-block">Achieve mastery by allowing students to reattempt incorrect awensors <br> till they reach the set goal</span>
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
                            <div class="content-heading d-flex align-items-center justify-content-between">
                                <div class="heading-box">
                                    <h4 class="font-weight-600 font-16 mb-1">Redemption questions</h4>
                                    <span class="d-block">Allow students to reattemt a few incorrect questions.</span>
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
                            <div class="content-heading d-flex align-items-center justify-content-between">
                                <div class="heading-box">
                                    <h4 class="font-weight-600 font-16 mb-1">Redemption quiz</h4>
                                    <span class="d-block">Allow students to awensor all incorrect questions at the end to improve accuracy.</span>
                                </div>
                                <div class="form-group custom-switches-stacked mb-0">
                                    <label class="custom-switch pl-0 mb-0">
                                        <input type="checkbox" name="review_required" id="review_required" value="1" class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setup-quiz-content px-20 d-flex align-items-center justify-content-between">
                            <div class="content-heading">
                                <h4 class="font-weight-600 font-16 mb-1">Adaptive Question Bank Mode</h4>
                                <span class="d-block">Creates distince set of questions for every quiz attempt. <a href="#">See how it works</a></span>
                            </div>
                            <div class="select-field">
                                <select>
                                    <option value="Unlimited">Off</option>
                                    <option value="Limited">On</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white panel-border rounded-sm setup-quiz-btn p-10">
                        <button type="submit" class="assign-btn">Assign</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- General JS Scripts -->
    <script src="/assets/admin/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="/assets/default/js/admin/jquery-ui.min.js"></script>
    <script id="tooltipster" src="/assets/default/js/admin/tooltipster.bundle.js"></script>
    <script src="/assets/admin/vendor/poper/popper.min.js"></script>
    <script src="/assets/admin/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="/assets/admin/vendor/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="/assets/admin/vendor/moment/moment.min.js"></script>
    <script src="/assets/admin/js/stisla.js"></script>
    <script src="/assets/default/vendors/toast/jquery.toast.min.js"></script>

    <script>
        (function () {
            "use strict";

            window.csrfToken = $('meta[name="csrf-token"]');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            window.adminPanelPrefix = '{{ getAdminPanelUrl() }}';

            @if(session()->has('toast'))
            $.toast({
                heading: '{{ session()->get('toast')['title'] ?? '' }}',
                text: '{{ session()->get('toast')['msg'] ?? '' }}',
                bgColor: '@if(session()->get('toast')['status'] == 'success') #43d477 @else #f63c3c @endif',
                textColor: 'white',
                hideAfter: 10000,
                position: 'bottom-right',
                icon: '{{ session()->get('toast')['status'] }}'
            });
            @endif
        })(jQuery);
    </script>

    <script src="/assets/admin/vendor/daterangepicker/daterangepicker.min.js"></script>
    <script src="/assets/default/vendors/select2/select2.min.js"></script>

    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <!-- Template JS File -->
    <script src="/assets/admin/js/scripts.js?ver={{$rand_no}}"></script>

    @stack('styles_bottom')
    @stack('scripts_bottom')

    <script>
        var deleteAlertTitle = '{{ trans('public.are_you_sure') }}';
        var deleteAlertHint = '{{ trans('public.deleteAlertHint') }}';
        var deleteAlertConfirm = '{{ trans('public.deleteAlertConfirm') }}';
        var deleteAlertCancel = '{{ trans('public.cancel') }}';
        var deleteAlertSuccess = '{{ trans('public.success') }}';
        var deleteAlertFail = '{{ trans('public.fail') }}';
        var deleteAlertFailHint = '{{ trans('public.deleteAlertFailHint') }}';
        var deleteAlertSuccessHint = '{{ trans('public.deleteAlertSuccessHint') }}';
        var forbiddenRequestToastTitleLang = '{{ trans('public.forbidden_request_toast_lang') }}';
        var forbiddenRequestToastMsgLang = '{{ trans('public.forbidden_request_toast_msg_lang') }}';
    </script>

    <script src="/assets/admin/js/custom.js?ver={{$rand_no}}"></script>
    <script>
        {!! !empty(getCustomCssAndJs('js')) ? getCustomCssAndJs('js') : '' !!}
    </script>
    <script>
        /*Quiz Data Slide Function Start*/
        $(document).ready(function () {
            $(".page-controls button.setting-btn, .slide-controls .close-btn").click(function (e) {
                e.stopPropagation(); 
                $(".quiz-data-slide").toggleClass("active");
            });

            $(".quiz-data-slide").click(function (e) {
                const $element = $(this);
                const offset = $element.offset();
                const pseudoAreaWidth = 20; 
                if (
                    e.pageX < offset.left + pseudoAreaWidth || 
                    e.pageY < offset.top + pseudoAreaWidth 
                ) {
                    $element.removeClass("active");
                }
            });

            $(".quiz-data-slide").on("click", function (e) {
                e.stopPropagation();
            });
        });
        /*Quiz Data Slide Function End*/
    </script>
</body>
</html>
