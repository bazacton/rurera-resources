@extends('web.default.panel.layouts.panel_layout')

@push('styles_top')
<link rel="stylesheet" href="/assets/default/css/panel-pages/wordlist.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

@endpush

@section('content')

<section class="content-section spells-page">
    <div class="section-title text-left mb-30">
        <h2 class="mt-0 mb-10 font-22">Spelling word lists</h2>
        <p class="font-14">Strengthen your vocabulary with curated word lists tailored to different levels. Learn meanings, usage, and improve retention through regular practice.</p>
    </div>
    <!-- Listing Search Start -->
    <div class="listing-search lms-jobs-form mb-20">
        <a href="#." class="filter-mobile-btn">Filters</a>
        <ul class="inline-filters font-14">
            @php $active = ($quiz_category == '')? 'active' :'' @endphp
            <li class="{{$active}}"><a href="/spells">All Word Lists</a></li>
            @php $active = ($quiz_category == 'Word Lists')? 'active' :'' @endphp
            <li class="{{$active}}"><a href="/spells/word-lists">Word Lists</a></li>
            @php $active = ($quiz_category == 'Spelling Bee')? 'active' :'' @endphp
            <li class="{{$active}}"><a href="/spells/spelling-bee">Spelling Bee</a></li>
        </ul>
    </div>
    <!-- Listing Search End -->
    @if( !empty( $data))
    <section class="lms-data-table mt-0 mb-0 spells elevenplus-block w-100">
        @php $total_questions_all = $total_attempts_all = $total_questions_attempt_all = $correct_questions_all =
            $incorrect_questions_all = $pending_questions_all = $not_used_words_all = 0;
            @endphp

            @foreach( $data as $dataObj)
            @php

            $total_questions = 0;//isset( $dataObj->quizQuestionsList )? count($dataObj->quizQuestionsList) : 0;
            $spell_test_count = 555;
            $spell_test_completed = 666;
            $word_search_count = 777;
            $word_cloud_count = 888;
            $word_missing_count = 999;


            //$quizResultObj = $dataObj->parentResults->where('user_id', $user->id)->where('quiz_result_type', 'vocabulary')->where('attempt_mode', '')->where('status', 'passed')->last();
            $percentage_class = '';
            /*if( isset( $quizResultObj->id)){
                $percentage_correct_answer = 20;//$QuestionsAttemptController->get_percetange_corrct_answer($quizResultObj);
                $percentage_class = 'danger';
                $percentage_class = ($percentage_correct_answer >= 70 )? 'improvement' : $percentage_class;
                $percentage_class = ($percentage_correct_answer > 90 )? 'success' : $percentage_class;
            }*/


            $overall_percentage = 0;

            $spell_quiz_completed = '';


            $treasure_box_closed = '<li class="treasure">
                                <a href="#">
                                    <span class="thumb-box">
                                        <img src="/assets/default/img/treasure2.png" alt="treasure2">
                                    </span>
                                </a>
                            </li>';
            $treasure_box_opened = '<li class="treasure">
                                        <a href="#">
                                            <span class="thumb-box">
                                                <img src="/assets/default/img/treasure.png" alt="treasure">
                                            </span>
                                        </a>
                                    </li>';
            @endphp
            <!-- Spell Levels Listing Start -->
            <div class="spell-levels {{$spell_quiz_completed}}">
                <div class="spell-levels-top">
                    <div class="spell-top-left">
                        <h3 class="font-16 font-weight-bold">{{$dataObj->getTitleAttribute()}} 
                            <!-- <span class="progress-star {{$percentage_class}}"><img src="/assets/default/img/tick-white.png"></span> -->
                        </h3>
                        <div class="spell-links font-14">
                        <a href="javascript:;" class="spell-popup-btn text-gray" data-heading="{{$dataObj->getTitleAttribute()}}" data-play_link="/spells/{{isset( $dataObj->quizYear->slug )? $dataObj->quizYear->slug : ''}}/{{$dataObj->quiz_slug}}/" data-spell_type="word-hunts" data-spell_id="{{$dataObj->id}}">
                            Practice Words
                        </a>
                        <a href="javascript:;" class="spell-popup-btn1 rurera-tooltip dropup text-gray">
                        <span class="dropdown-toggle h-100 w-100 d-flex align-items-center justify-content-center" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Take a test</span>
                        <div class="lms-tooltip dropdown-menu">
                            <div class="tooltip-box">
                                <button data-heading="Take a test" class="tooltip-btn practice font-16 d-block mb-15 text-center spell-test-btn"  data-play_link="/spelling/{{isset( $dataObj->quizYear->slug )? $dataObj->quizYear->slug : ''}}/{{$dataObj->quiz_slug}}/test" data-spell_type="test">Take Test</button>
                                @if($spell_test_count > 0)
                                    <button class="tooltip-btn legendary d-block font-16 text-center" onclick='window.location.href = "/spelling/{{isset( $dataObj->quizYear->slug )? $dataObj->quizYear->slug : ''}}/{{$dataObj->quiz_slug}}/test"'>Continue</button>
                                @endif
                                @if($spell_test_completed > 0)
                                    <button class="tooltip-btn practice font-16 d-block mt-15 text-center" onclick='window.location.href = "/panel/analytics/vocabulary/{{$dataObj->id}}"'>Track</button>
                                @endif
                            </div>
                            </div>
                        </a>
                        </div>
                        @if($overall_percentage > 0 && $overall_percentage != 100)
                        <div class="levels-progress horizontal">
                            <span class="progress-box">
                                <span class="progress-count" style="width: {{$overall_percentage}}%;"></span>
                            </span>
                        </div>
                        @endif
                    </div>
                    <div class="spell-top-right font-14">
                        <a href="/spells/{{isset( $dataObj->quizYear->slug )? $dataObj->quizYear->slug : ''}}/{{$dataObj->quiz_slug}}/spelling-list" class="words-count"><span>{{$total_questions}}</span>word(s)</a>
                        <a href="/spells/{{isset( $dataObj->quizYear->slug )? $dataObj->quizYear->slug : ''}}/{{$dataObj->quiz_slug}}/spelling-list" class="words-count"><span>12</span>Practiced</a>
                        <a href="/spells/{{isset( $dataObj->quizYear->slug )? $dataObj->quizYear->slug : ''}}/{{$dataObj->quiz_slug}}/spelling-list" class="words-count"><span>22</span>Mastered</a>
                    </div>
                </div>
            </div>
            <!-- Spell Levels Listing End -->
        @endforeach
    </section>
    @endif
</section>

<div class="modal fade spell_words_popup lms-choose-membership" id="spell_words_popup" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <div class="modal-body spell_words_popup_body">
        <div class="container container-nosidebar">
            <div class="row">
                <div class="col-10 col-lg-10 col-md-12">
                    <h2 class="page-title">Filter Words</h2>
                    <p>From sources across the web</p>
                </div>
                <div class="col-2 col-lg-2 col-md-12 spell-words-filters pt-5">
                <a href="javascript:;" data-href="javascript:;" class="play-again">Play (<span class="selected_questions">All</span>)</a>
                </div>
            </div>
            <form class="spell-quiz-form" action="#" method="POST">
            <h3 class="mt-30">Choose Practice Type</h3>
            <div class="tests-list-holder spell-type-check mb-25 mt-20">
                <a href="#." class="filter-mobile-btn">Filters</a>
                <ul class="tests-list mb-30 font-14">
                    <li data-type="word-hunts" class="active">Word Hunts</li>
                    <li data-type="word-search">Word Search</li>
                    <li data-type="word-cloud">Word Cloud</li>
                    <li data-type="word-missing">Practice Test</li>
                    <li data-type="cards">Cards</li>
                </ul>
                <input type="text" name="spell_type" class="spell_type_check rurera-hide" value="word-hunts">
            </div>

            <h3 class="mt-30">Choose No of Words</h3>
            <div class="tests-list-holder question_no_check mb-25 mt-20">
                <a href="#." class="filter-mobile-btn">Filters</a>
                <ul class="tests-list mb-30 font-14">
                    <li data-type="10" class="active">10</li>
                    <li data-type="20">20</li>
                    <li data-type="30">30</li>
                </ul>
                <input type="text" name="no_of_questions" class="spell_no_of_questions_check rurera-hide" value="10">
            </div>

            <div class="spell-words-filters" data-spell_id="0" data-spell_type="">


            <input type="hidden" name="is_new" value="yes">
            {{ csrf_field() }}

            </form>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
<form class="spell-test-quiz-form" action="#" method="POST">
<input type="hidden" name="is_new" value="yes">
{{ csrf_field() }}
</form>
@endsection

@push('scripts_bottom')

<script type="text/javascript">
    $(document).ready(function () {
        $('body').on('click', '.graph-data-ul li a', function (e) {
            $('.graph-data-ul li a').removeClass('active');
            $(this).addClass('active');
            var graph_id = $(this).attr('data-graph_id');
            $('.graph_div').addClass('hide');
            $('.' + graph_id).removeClass('hide');
        });
    });

</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.spell-levels ul').slideUp();
        $('body').on('click', '.graph-data-ul li a', function (e) {
            $('.graph-data-ul li a').removeClass('active');
            $(this).addClass('active');
            var graph_id = $(this).attr('data-graph_id');
            $('.graph_div').addClass('hide');
            $('.' + graph_id).removeClass('hide');
        });

        $('body').on('change', '.analytics_graph_type', function (e) {
            var thisObj = $('.chart-summary-fields');
            rurera_loader(thisObj, 'div');
            var graph_type = $(this).val();
            jQuery.ajax({
                type: "GET",
                url: '/panel/analytics/graph_data',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {"graph_type": graph_type},
                success: function (return_data) {
                    rurera_remove_loader(thisObj, 'div');
                    if (return_data != '') {
                        $(".analytics-graph-data").html(return_data);
                    }
                }
            });

        });


        //$(".master-card.master span").html('{{$correct_questions_all}}');
        //$(".master-card.non-master span").html('{{$incorrect_questions_all}}');
        $(".master-card.non-use span").html('{{$not_used_words_all}}');

    });
    $(document).on('click', '.play-btn', function (e) {
        var player_id = $(this).attr('data-id');

        $(this).toggleClass("pause");
        if($(this).hasClass('pause')) {
            document.getElementById(player_id).play();
        }else{
            document.getElementById(player_id).pause();
        }
    });

    $(document).on('click', '.spell-levels ul li a', function (e) {

        var quiz_id = $(this).closest('li').attr('data-id');
        var quiz_level = $(this).closest('li').attr('data-quiz_level');
        localStorage.setItem('quiz_level_'+quiz_id, quiz_level);
    });


    $(document).on('click', '.spell-levels-top', function (e) {
        if (!$(e.target).closest('.spell-top-right').length) {
            $(this).closest('.spell-levels').find('ul').slideToggle();
        }

    });

	var spellPopupRequest = null;

	$(document).on('click', '.spell-test-btn', function (e) {
		var play_link = $(this).attr('data-play_link');
		$(".spell-test-quiz-form").attr('action',play_link);
		$(".spell-test-quiz-form").submit();
	});


	$(document).on('click', '.spell-popup-btn', function (e) {
		var thisObj = $(this);
		var spell_id = $(this).attr('data-spell_id');
		var spell_heading = $(this).attr('data-heading');
		$(".spell_words_popup_body .container-nosidebar .page-title").html(spell_heading);
		var spell_type = $(this).attr('data-spell_type');
		var play_link = $(this).attr('data-play_link');
		$(".play-again").attr('data-href', play_link);

		rurera_loader(thisObj.closest(".spell-levels "), 'div');
		//rurera_loader(thisObj, 'div');
		$(".spell-words-filters").attr('data-spell_id', spell_id);
		$(".spell-words-filters").attr('data-spell_type', spell_type);
		$(".spell-words-filters").attr('data-play_link', play_link);
		spellPopupRequest = jQuery.ajax({
			type: "GET",
			beforeSend: function () {
				if (spellPopupRequest != null) {
					rurera_remove_loader($(".spell-levels "), 'div');
					spellPopupRequest.abort();
					//rurera_loader(thisObj, 'div');
					rurera_loader(thisObj.closest(".spell-levels "), 'div');
				}
			},
			url: '/spells/words-data',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data: {"spell_id": spell_id, "spell_type": spell_type},
			success: function (return_data) {
				spellPopupRequest = null;
				rurera_remove_loader(thisObj.closest(".spell-levels "), 'div');
				$(".spell-words-data").html(return_data);
				$(".spell_words_popup").modal('show');
			}
		});

    });

	$(document).on('click', '.play-again', function (e) {
		var selected_words = $('.word-block.active').length;
		selected_words = (selected_words > 0)? selected_words : 'All';
		$(".rurera-error").addClass('rurera-hide');
		if( selected_words != 'All' && selected_words < 3){
			$(".rurera-error").removeClass('rurera-hide');
			/*var error_message = jQuery.growl.error({
                message: 'Select atleast 15 words to continue!',
                duration: 10000,
            });*/
		}else{
			var play_link = $(".spell-words-filters").attr('data-play_link');
			var spell_type = $(".spell_type_check").val();
			play_link += spell_type;
			$(".spell-quiz-form").attr('action',play_link);
			$(".spell-quiz-form").submit();
		}
    });



	var spellFilterRequest = null;
	$(document).on('change', '.sort_by_filter', function (e) {
		filter_words();
    });

	function filter_words(){
		var sort_by = $('.sort_by_filter').val();
		var spell_id = $(".spell-words-filters").attr('data-spell_id');
		var spell_type = $(".spell-words-filters").attr('data-spell_type');

		var search_word = '';


		var thisObj = $('.spell-words-data');
		rurera_loader(thisObj, 'div');
		$(".spell-words-filters").attr('data-spell_id', spell_id);
		$(".spell-words-filters").attr('data-spell_type', spell_type);
		spellFilterRequest = jQuery.ajax({
			type: "GET",
			beforeSend: function () {
				if (spellFilterRequest != null) {
					rurera_remove_loader($(".spell-levels "), 'div');
					spellFilterRequest.abort();
					rurera_loader(thisObj, 'div');
				}
			},
			url: '/spells/words-data',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data: {"spell_id": spell_id, "spell_type": spell_type, 'sort_by' : sort_by, 'search_word' : search_word},
			success: function (return_data) {
				rurera_remove_loader(thisObj, 'div');
				$(".spell-words-data").html(return_data);
				document.oncontextmenu = function() {
				  return false;
				}
			}
		});
	}





</script>


@endpush
