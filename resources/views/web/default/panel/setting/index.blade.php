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
		
        $(document).ready(function () {
            $(".full-screen-btn").click(function (e) {
                e.preventDefault();
                
                $(this).closest('.tab-content').toggleClass('fullscreen');
            });
        });

        /*Quiz Data Slide Function Start*/
        $(document).ready(function () {
            $(".quiz-data-table td label, .slide-controls .close-btn").click(function (e) {
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

        /*Circle Progress Function Start*/
        $(".circle_percent").each(function() {
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
					$this.find(".percent_text").text(Math.ceil(now)+"%");
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
        /*Circle Progress Function End*/

		
    </script>

    <script src="/assets/default/js/panel/user_setting.min.js"></script>
@endpush
