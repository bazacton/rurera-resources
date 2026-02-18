@extends(getTemplate() .'.panel.layouts.panel_layout_full')

<link rel="stylesheet" href="/assets/default/css/assignments.css">
<link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
<link rel="stylesheet" href="/assets/admin/vendor/daterangepicker/daterangepicker.min.css">
<link rel="stylesheet" href="/assets/vendors/jquerygrowl/jquery.growl.css">
<link rel="stylesheet" href="/assets/default/css/css-stars.css">
<link rel="stylesheet" href="/assets/default/css/panel-pages/dashboard.css">

<link rel="stylesheet" href="/assets/default/css/panel-pages/timestable.css">
@push('styles_top')
<style>
    .wizard-steps{display:none;}
    .wizard-steps.active{display:block;}
    .show-after-ajax{display:none;}
</style>
@endpush

@section('content')

<div class="set-work-container lms-choose-membership">
    <form action="/panel/set-work/{{ !empty($assignment) ? $assignment->id.'/update' : 'store' }}" method="Post" class="rurera-form-validation p-0">
        {{ csrf_field() }}

        <ul class="set-work-tagss text-left rurera-hide remove-pending"></ul>

        <div class="wizard-steps active" data-step_id="1">
            <div class="wizard-steps-heading mb-30 text-left">
                <h2 class="font-22 mb-10">Set Work</h2>
                <p class="text-muted font-14">The test changes as you go, getting tougher if you keep getting things right, and easier if you find it hard. Let's make a special practice plan just for your student, with questions that are just right for students level.</p>
            </div>
            @if (auth()->check() && auth()->user()->isUser())
                <div class="rurera-hide">
                @php
                    $child_count = 0;
                    $childObj = auth()->user();
                    $userSubscriptions = isset($childObj->id)? $childObj->userSubscriptions : '';
                    $is_user_subscribed = isset( $userSubscriptions->id )? true : false;
                    if($is_user_subscribed == true){
                        $child_count++;
                    }
                    $selected_child = ($child_count == 1)? 'checked' : '';
                @endphp
                @if( $is_user_subscribed == true)
                    <input type="hidden" class="user-permissions" data-type="practice" data-user_id="{{$childObj->id}}" value="{{$childObj->subscription('courses')}}">
                    <input type="hidden" class="user-permissions" data-type="vocabulary" data-user_id="{{$childObj->id}}" value="{{$childObj->subscription('vocabulary')}}">
                    <input type="hidden" class="user-permissions" data-type="timestables" data-user_id="{{$childObj->id}}" value="{{$childObj->subscription('timestables')}}">
                    <input type="hidden" class="user-permissions" data-type="sats" data-user_id="{{$childObj->id}}" value="{{$childObj->subscription('sats')}}">
                    <input type="hidden" class="user-permissions" data-type="11plus" data-user_id="{{$childObj->id}}" value="{{$childObj->subscription('11plus')}}">
                    <input type="hidden" class="user-permissions" data-type="iseb" data-user_id="{{$childObj->id}}" value="{{$childObj->subscription('11plus')}}">
                    <input type="hidden" class="user-permissions" data-type="cat4" data-user_id="{{$childObj->id}}" value="{{$childObj->subscription('11plus')}}">
                    <input type="hidden" class="user-permissions" data-type="independent_exams" data-user_id="{{$childObj->id}}" value="{{$childObj->subscription('11plus')}}">
                    <label class="card-radio">
                        <input type="radio" data-timestables_no="{{$childObj->timestables_no}}" data-year_id="{{$childObj->year_id}}" name="ajax[{{ !empty($assignment) ? $assignment->id : 'new' }}][assignment_users][]"
                                value="{{$childObj->id}}" class="assignment-user-class" data-tag_title="{{$childObj->get_full_name()}}" {{$selected_child}}>
                        <span class="radio-btn">
                                    <div class="card-icon">
                                    <img src="{{ $childObj->getAvatar() }}" alt="card-icon">
                                        <h3>{{$childObj->get_full_name()}}</h3>
                                    </div>
                                </span>
                    </label>
                @else
                    <a href="javascript:;" class="subscription-modal rurera-hide remove-pending" data-type="update_package_confirm" data-id="{{isset($childObj->id)? $childObj->id : 0}}">
                            <span class="radio-btn disabled-style">
                                <div class="card-icon">
                                <img src="{{ $childObj->getAvatar() }}" alt="card-icon">
                                    <h3>{{$childObj->get_full_name()}}</h3>
                                    <span>Buy Membership</span>
                                </div>
                            </span>
                    </a>
                @endif
                </div>
            @endif
            @if (auth()->check() && auth()->user()->isParent())
            <div class="years-group populated-data mb-10">
                <div class="form-section mb-20 text-left 223">
                    <h2 class="section-title font-18 font-weight-bold">Select Student</h2>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="radio-buttons justify-content-left">

                            @if( !empty( $childs ) )
                            @php $child_count = 0; @endphp
                                    @foreach($childs as $childLinkObj)
                                    @if(!isset($childObj->id)) @php continue; @endphp  @endif
                                    @php $childObj = $childLinkObj->user; @endphp
                                    @php
                                    $userSubscriptions = isset($childObj->id)? $childObj->userSubscriptions : '';
                                    $is_user_subscribed = isset( $userSubscriptions->id )? true : false;
                                    if($is_user_subscribed == true){
                                        $child_count++;
                                    }
                                    $selected_child = ($child_count == 1)? 'checked' : '';
                                    @endphp

                                        @if( $is_user_subscribed == true)
                                        <input type="hidden" class="user-permissions" data-type="practice" data-user_id="{{$childObj->id}}" value="{{$childObj->subscription('courses')}}">
                                        <input type="hidden" class="user-permissions" data-type="vocabulary" data-user_id="{{$childObj->id}}" value="{{$childObj->subscription('vocabulary')}}">
                                        <input type="hidden" class="user-permissions" data-type="timestables" data-user_id="{{$childObj->id}}" value="{{$childObj->subscription('timestables')}}">
                                            <input type="hidden" class="user-permissions" data-type="sats" data-user_id="{{$childObj->id}}" value="{{$childObj->subscription('sats')}}">
                                            <input type="hidden" class="user-permissions" data-type="11plus" data-user_id="{{$childObj->id}}" value="{{$childObj->subscription('11plus')}}">
                                            <input type="hidden" class="user-permissions" data-type="iseb" data-user_id="{{$childObj->id}}" value="{{$childObj->subscription('11plus')}}">
                                            <input type="hidden" class="user-permissions" data-type="cat4" data-user_id="{{$childObj->id}}" value="{{$childObj->subscription('11plus')}}">
                                            <input type="hidden" class="user-permissions" data-type="independent_exams" data-user_id="{{$childObj->id}}" value="{{$childObj->subscription('11plus')}}">
                                            <label class="card-radio">
                                                <input type="radio" data-timestables_no="{{$childObj->timestables_no}}" data-year_id="{{$childObj->year_id}}" name="ajax[{{ !empty($assignment) ? $assignment->id : 'new' }}][assignment_users][]"
                                                        value="{{$childObj->id}}" class="assignment-user-class" data-tag_title="{{$childObj->get_full_name()}}" {{$selected_child}}>
                                                <span class="radio-btn">
                                                    <div class="card-icon">
                                                    <img src="{{ $childObj->getAvatar() }}" alt="card-icon">
                                                        <h3>{{$childObj->get_full_name()}}</h3>
                                                    </div>
                                                </span>
                                            </label>
                                        @else
                                        <a href="javascript:;" class="subscription-modal rurera-hide remove-pending" data-type="update_package_confirm" data-id="{{isset($childObj->id)? $childObj->id : 0}}">
                                            <span class="radio-btn disabled-style">
                                                <div class="card-icon">
                                                <img src="{{ $childObj->getAvatar() }}" alt="card-icon">
                                                    <h3>{{$childObj->get_full_name()}}</h3>
                                                    <span>Buy Membership</span>
                                                </div>
                                            </span>
                                        </a>
                                        @endif
                                    @endforeach
                            @endif
                            <label class="card-radio add-student-btn rurera-hide remove-pending">
                                <a href="javascript:;" class="subscription-modal add-student-modal" data-type="child_register" data-id="0" >
                                    <span class="radio-btn">
                                        <div class="card-icon">
                                            <img src="/assets/default/svgs/add-con.svg" alt="add-con" height="800" width="800">
                                            <h3>Student</h3>
                                        </div>
                                    </span>
                                </a>
                            </label>
                            <input type="hidden" class="year_id_field" name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][year_id]" value="0">
                        </div>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
            </div>
            @endif

            <div class="years-group populated-data rurera-hide remove-pending" aria-hidden="true">
                <div class="form-group">
                    <div class="form-section mb-20 text-left 223">
                        <h2 class="section-title font-24">Select Type</h2>
                    </div>
                    <div class="radio-buttons justify-content-left mb-50">
                        <label class="card-radio">
                            <input type="radio" name="ajax[{{ !empty($assignment) ? $assignment->id : 'new' }}][assignment_type_check]"
                                class="assignment_type_check" value="practice_test" data-tag_title="Set Practice" checked>
                            <span class="radio-btn">
                                <div class="card-icon">
                                    <h3>Set Practice</h3>
                                </div>
                            </span>
                        </label>
                        <label class="card-radio">
                            <input type="radio" name="ajax[{{ !empty($assignment) ? $assignment->id : 'new' }}][assignment_type_check]"
                                class="assignment_type_check" value="mock_test" data-tag_title="Set Mock Test">
                            <span class="radio-btn">
                                <div class="card-icon">
                                    <h3>Set Mock Test</h3>
                                </div>
                            </span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="years-group populated-data">
                <fieldset class="form-group">
                    <legend class="input-label">Practice Type</legend>
                        <div class="radio-buttons">
                            <label class="card-radio">
                                <input type="radio" name="ajax[new][assignment_topic_type]" class="assignemnet-types-selection" value="practice" checked>
                                <span class="radio-btn">
                                    <div class="card-icon">
                                        <img src="/assets/default/img/assignment-logo/practice.png" alt="practice">
                                        <span class="card-title">Courses</span>
                                    </div>
                                </span>
                            </label>
                            <label class="card-radio">
                                <input type="radio" name="ajax[new][assignment_topic_type]" class="assignemnet-types-selection" value="tests">
                                <span class="radio-btn">
                                    <div class="card-icon">
                                        <img src="/assets/default/img/assignment-logo/sats.png" alt="sats">
                                        <span class="card-title">Tests</span>
                                    </div>
                                </span>
                            </label>

                            <label class="card-radio">
                                <input type="radio" name="ajax[new][assignment_topic_type]" class="assignemnet_types_selection" value="vocabulary">
                                <span class="radio-btn">
                                <div class="card-icon">
                                    <img src="/assets/default/img/assignment-logo/vocabulary.png" alt="" aria-hidden="true">
                                    <span class="card-title">Vocabulary</span>
                                </div>
                                </span>
                            </label>

                            <label class="card-radio">
                                <input type="radio" name="ajax[new][assignment_topic_type]" class="assignemnet_types_selection" value="timestables">
                                <span class="radio-btn">
                                <div class="card-icon">
                                    <img src="/assets/default/img/assignment-logo/timestables.png" alt="" aria-hidden="true">
                                    <span class="card-title">Timestables</span>
                                </div>
                                </span>
                            </label>

                        <label class="card-radio">
                            <input type="radio" name="ajax[new][assignment_topic_type]" class="assignemnet_types_selection" value="book">
                            <span class="radio-btn">
                                <div class="card-icon">
                                    <img src="/assets/default/img/assignment-logo/books.png" alt="" aria-hidden="true">
                                    <span class="card-title">Book</span>
                                </div>
                            </span>
                        </label>
                        {{--<label class="card-radio rurera-hide">
                            <input type="radio" name="ajax[new][assignment_topic_type]" class="assignemnet_types_selection" value="assignment">
                            <span class="radio-btn">
                                <div class="card-icon">
                                    <img src="/assets/default/img/assignment-logo/practice.png" alt="" aria-hidden="true">
                                    <span class="card-title">Custom Assignment</span>
                                </div>
                            </span>
                        </label>--}}
                    </div>
                    <div class="invalid-feedback"></div>
                </fieldset>
                <fieldset class="form-group rurera_common_hide_field test_types_field">
                    <legend class="input-label">Test Type</legend>
                    <div class="radio-buttons" aria-label="Test Type">
                        <label class="card-radio">
                            <input type="radio" name="ajax[new][assignment_test_type]" class="test_types_selection" value="sats" checked>
                            <span class="radio-btn">
                                <div class="card-icon">
                                    <img src="/assets/default/img/assignment-logo/sats.png" alt="" aria-hidden="true">
                                    <span class="card-title">SATs</span>
                                </div>
                            </span>
                        </label>
                        <label class="card-radio">
                            <input type="radio" name="ajax[new][assignment_test_type]" class="test_types_selection" value="11plus">
                            <span class="radio-btn">
                                <div class="card-icon">
                                    <img src="/assets/default/img/assignment-logo/11plus.png" alt="11plus">
                                    <span class="card-title">11 Plus</span>
                                </div>
                            </span>
                        </label>
                        <label class="card-radio">
                            <input type="radio" name="ajax[new][assignment_test_type]" class="test_types_selection" value="independent_exams">
                            <span class="radio-btn">
                                <div class="card-icon">
                                    <img src="/assets/default/img/assignment-logo/independent-exams.png" alt="independent-exams">
                                    <span class="card-title">Independent Exams</span>
                                </div>
                            </span>
                        </label>

                        <label class="card-radio">
                            <input type="radio" name="ajax[new][assignment_test_type]" class="test_types_selection" value="iseb">
                            <span class="radio-btn">
                                <div class="card-icon">
                                    <img src="/assets/default/img/assignment-logo/iseb.png" alt="iseb">
                                    <span class="card-title">Iseb</span>
                                </div>
                            </span>
                        </label>

                        <label class="card-radio">
                            <input type="radio" name="ajax[new][assignment_test_type]" class="test_types_selection" value="cat4">
                            <span class="radio-btn">
                                <div class="card-icon">
                                    <img src="/assets/default/img/assignment-logo/cat4.png" alt="cat4">
                                    <span class="card-title">Cat 4</span>
                                </div>
                            </span>
                        </label>
                    </div>
                    <div class="invalid-feedback"></div>
                </fieldset>


                <div class="form-section rurera-hide">
                    <h2 class="section-title">Courses</h2>
                </div>


                <div class="form-section rurera-hide">
                    <h2 class="section-title">Sats</h2>
                </div>


                <div class="form-section rurera-hide">
                    <h2 class="section-title">11 Plus</h2>
                </div>


                <div class="form-section rurera-hide">
                    <h2 class="section-title">Independent Exams</h2>
                </div>


                <div class="form-section rurera-hide">
                    <h2 class="section-title">ISEB</h2>
                </div>


                <div class="form-section rurera-hide">
                    <h2 class="section-title">CAT 4</h2>
                </div>


                <div class="form-section rurera-hide">
                    <h2 class="section-title">Vocabulary</h2>
                </div>

                <div class="form-section rurera-hide">
                    <h2 class="section-title">Times Tables</h2>
                </div>


                <div class="rurera_common_hide_field year_group_field">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label class="input-label">Year Group</label>
                                <div class="select-holder">
                                    <select data-default_id="{{isset( $quiz->id)? $quiz->year_id : 0}}"
                                        class="form-control year_quiz_ajax_select select2 @error('year_id') is-invalid @enderror"
                                        name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][year_id]">
                                        <option value="0">Select Year Group</option>

                                        @foreach($categories as $category)
                                            @if(!empty($category->subCategories) and
                                            count($category->subCategories))
                                                @foreach($category->subCategories as $subCategory)
                                                    <option value="{{ $subCategory->id }}" @if(!empty($quiz) and $quiz->year_id == $subCategory->id) selected="selected" @endif>
                                                        {{$subCategory->title}}
                                                    </option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                @error('year_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>


                <div class="rurera_common_hide_field vocabulary_type_fields">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <fieldset class="form-group">
                                <legend class="input-label">Practice Type</legend>
                                <div class="radio-buttons" role="radiogroup" aria-label="Practice Type">
                                    <label class="card-radio">
                                        <input type="radio" class="vocabulary_type" name="ajax[new][vocabulary_type]" value="Word Lists" checked>
                                        <span class="radio-btn">
                                            <div class="card-icon">
                                                <h3>Word Lists</h3>
                                            </div>
                                        </span>
                                    </label>
                                    <label class="card-radio">
                                        <input type="radio" class="vocabulary_type" name="ajax[new][vocabulary_type]" value="Spelling Bee">
                                        <span class="radio-btn">
                                            <div class="card-icon">
                                                <h3>Spelling Bee</h3>
                                            </div>
                                        </span>
                                    </label>
                                    <label class="card-radio">
                                        <input type="radio" class="vocabulary_type" name="ajax[new][vocabulary_type]" value="Syllabus">
                                        <span class="radio-btn">
                                            <div class="card-icon">
                                                <h3>Syllabus</h3>
                                            </div>
                                        </span>
                                    </label>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                </div>


                <div class="rurera_common_hide_field vocabulary_list_data">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="quiz-ajax-fields"></div>
                        </div>
                        <div class="spell-questions-list rurera-hide"></div>
                    </div>
                </div>

                <div class="rurera_common_hide_field vocabulary_practice_type_field">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 conditional_fields_block practice_fields_block">
                            <fieldset class="form-group">
                                <legend class="input-label">Practice Type</legend>
                                <div class="radio-buttons" aria-label="Practice Type">
                                    @php $spell_counter = 1;$spell_modes = get_spell_modes(); @endphp

                                    @if(!empty($spell_modes))
                                        @foreach($spell_modes as $spell_mode_key => $spell_mode_value)
                                            @php $is_checked = ($spell_counter == 1)? 'checked' : ''; @endphp
                                            <label class="card-radio">
                                                <input type="radio" name="ajax[new][spell_practice_type]" value="{{$spell_mode_key}}"
                                                    {{$is_checked}}>
                                                <span class="radio-btn">
                                                                    <div class="card-icon">
                                                                        <h3>{{$spell_mode_value}}</h3>
                                                                    </div>

                                                                </span>
                                            </label>
                                            @php $spell_counter++; @endphp
                                        @endforeach
                                    @endif
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 rurera_common_hide_field show_words_type_field">
                            <div class="form-group">
                                <label class="input-label">Show Words</label>
                                <div class="input-group">
                                    <div class="radio-buttons">

                                        <label class="card-radio">
                                            <input type="radio" name="ajax[new][show_words]" value="words" checked>
                                            <span class="radio-btn">
                                                                <div class="card-icon">
                                                                    <h3>Just Words</h3>
                                                                </div>

                                                            </span>
                                        </label>
                                        <label class="card-radio">
                                            <input type="radio" name="ajax[new][show_words]" value="words_sentences">
                                            <span class="radio-btn">
                                                                <div class="card-icon">
                                                                    <h3>Words with Sentences</h3>
                                                                </div>

                                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="practice-quiz-ajax-fields rurera_common_hide_field courses_fields"></div>


                <div class="rurera_common_hide_field">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label class="input-label d-block">Year Group</label>
                                <div class="select-holder">
                                    <select name="ajax[new][year_group]"
                                        class="form-control select2 " data-placeholder="Select Year Group">
                                        <option value="">Select Year Group</option>
                                        <option value="All">All</option>
                                        <option value="Year 3" selected>Year 3</option>
                                        <option value="Year 4">Year 4</option>
                                        <option value="Year 5">Year 5</option>
                                        <option value="Year 6">Year 6</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label class="input-label">Test Type</label>
                                <div class="input-group">
                                    <div class="radio-buttons">

                                        <label class="card-radio">
                                            <input type="radio" name="ajax[new][subject]" value="English">
                                            <span class="radio-btn">
                                                <div class="card-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="96.000000pt" height="152.000000pt" viewBox="0 0 96.000000 152.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,152.000000) scale(0.100000,-0.100000)" fill="#fff" stroke="none"><path d="M64 1491 c-17 -11 -36 -34 -43 -52 -8 -22 -11 -190 -11 -546 0 -581 -1 -571 72 -602 l37 -16 3 -133 3 -134 66 61 67 61 63 -57 64 -57 5 130 5 129 278 3 277 2 0 510 0 510 -420 0 -420 0 -32 29 c-43 38 -45 92 -4 127 l27 24 365 0 c317 0 364 2 364 15 0 13 -47 15 -367 15 -344 0 -370 -1 -399 -19z m326 -416 l0 -195 -170 0 -170 0 0 25 c0 14 5 25 12 25 9 0 9 3 0 12 -7 7 -12 18 -12 26 0 11 8 9 36 -7 26 -15 52 -21 97 -21 l62 0 -85 50 c-47 27 -91 52 -98 57 -8 5 -12 21 -10 39 l3 32 130 -74 c72 -40 133 -73 138 -74 4 0 7 68 7 150 l0 150 30 0 30 0 0 -195z m220 45 c0 -82 3 -150 8 -150 4 0 70 36 147 80 107 61 141 76 143 64 5 -19 20 -9 -138 -98 l-135 -76 60 0 c53 0 69 6 138 44 l77 45 0 -40 c0 -24 -5 -39 -12 -40 -10 0 -10 -2 0 -6 6 -2 12 -18 12 -34 l0 -29 -180 0 -180 0 0 188 c0 104 3 192 7 195 3 4 17 7 30 7 l23 0 0 -150z m-222 -607 l2 -203 -30 0 -30 0 -2 159 -3 159 -125 -70 c-149 -84 -150 -84 -150 -66 0 8 58 48 129 89 l130 74 -55 3 c-48 3 -63 -2 -129 -38 l-75 -41 0 35 c0 22 5 36 13 37 9 0 9 2 0 6 -7 2 -13 15 -13 28 0 29 23 32 210 31 l125 -1 3 -202z m522 176 c0 -21 -5 -29 -17 -29 -17 -1 -17 -1 0 -14 9 -7 17 -21 17 -30 0 -13 -10 -11 -54 14 -45 26 -64 31 -108 28 l-53 -3 107 -60 c106 -59 107 -61 108 -97 l0 -36 -147 83 -148 84 -3 -160 -3 -160 -27 3 -27 3 -3 190 c-1 104 0 195 3 203 4 10 43 12 180 12 l175 -2 0 -29z m-557 -491 c-3 -46 -7 -85 -9 -87 -2 -2 -22 13 -44 33 l-41 37 -40 -35 c-21 -20 -44 -36 -49 -36 -6 0 -10 35 -10 85 l0 85 100 0 99 0 -6 -82z"></path><path d="M120 1425 c0 -13 44 -15 335 -15 291 0 335 2 335 15 0 13 -44 15 -335 15 -291 0 -335 -2 -335 -15z"></path><path d="M140 1355 c0 -13 45 -15 345 -15 300 0 345 2 345 15 0 13 -45 15 -345 15 -300 0 -345 -2 -345 -15z"></path></g></svg>
                                                    <h3>English</h3>
                                                </div>
                                            </span>
                                        </label>
                                        <label class="card-radio">
                                            <input type="radio" name="ajax[new][subject]" value="Math">
                                            <span class="radio-btn">
                                                <div class="card-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#fff" height="800px" width="800px" version="1.1" id="Capa_1" viewBox="0 0 191.836 191.836" xml:space="preserve" style=""><path d="M70.806,0.975H17.313C7.767,0.975,0,8.741,0,18.288V71.78c0,9.547,7.767,17.314,17.313,17.314h53.492  c9.547,0,17.313-7.767,17.313-17.314V18.288C88.119,8.741,80.353,0.975,70.806,0.975z M61.365,50.034H49.06v12.305  c0,2.761-2.239,5-5,5s-5-2.239-5-5V50.034H26.754c-2.761,0-5-2.239-5-5s2.239-5,5-5H39.06V27.729c0-2.761,2.239-5,5-5s5,2.239,5,5  v12.305h12.305c2.761,0,5,2.239,5,5S64.126,50.034,61.365,50.034z M70.806,102.742H17.313C7.767,102.742,0,110.509,0,120.056v53.492  c0,9.547,7.767,17.314,17.313,17.314h53.492c9.547,0,17.313-7.767,17.313-17.314v-53.492  C88.119,110.509,80.353,102.742,70.806,102.742z M61.365,151.802h-34.61c-2.761,0-5-2.239-5-5s2.239-5,5-5h34.61  c2.761,0,5,2.239,5,5S64.126,151.802,61.365,151.802z M174.523,0.975H121.03c-9.547,0-17.313,7.767-17.313,17.313V71.78  c0,9.547,7.767,17.314,17.313,17.314h53.492c9.547,0,17.313-7.767,17.313-17.314V18.288C191.836,8.741,184.069,0.975,174.523,0.975z   M163.548,53.735c1.953,1.953,1.953,5.119,0,7.071c-0.977,0.976-2.256,1.464-3.536,1.464s-2.559-0.488-3.536-1.464l-8.701-8.701  l-8.701,8.701c-0.977,0.976-2.256,1.464-3.536,1.464s-2.559-0.488-3.536-1.464c-1.953-1.953-1.953-5.119,0-7.071l8.701-8.701  l-8.701-8.701c-1.953-1.953-1.953-5.119,0-7.071c1.953-1.952,5.118-1.952,7.071,0l8.701,8.701l8.701-8.701  c1.953-1.952,5.118-1.952,7.071,0c1.953,1.953,1.953,5.119,0,7.071l-8.701,8.701L163.548,53.735z M174.523,102.742H121.03  c-9.547,0-17.313,7.767-17.313,17.314v53.492c0,9.547,7.767,17.314,17.313,17.314h53.492c9.547,0,17.313-7.767,17.313-17.314  v-53.492C191.836,110.509,184.069,102.742,174.523,102.742z M147.776,123.906c2.807,0,5.083,2.276,5.083,5.083  c0,2.808-2.276,5.083-5.083,5.083c-2.807,0-5.083-2.276-5.083-5.083C142.693,126.182,144.969,123.906,147.776,123.906z   M147.776,169.697c-2.807,0-5.083-2.276-5.083-5.083c0-2.807,2.276-5.083,5.083-5.083c2.807,0,5.083,2.276,5.083,5.083  C152.86,167.422,150.584,169.697,147.776,169.697z M165.082,151.802h-34.61c-2.761,0-5-2.239-5-5s2.239-5,5-5h34.61  c2.761,0,5,2.239,5,5S167.843,151.802,165.082,151.802z"></path></svg>
                                                    <h3>Math</h3>
                                                </div>
                                            </span>
                                        </label>
                                        <label class="card-radio">
                                            <input type="radio" name="ajax[new][subject]" value="Non-Verbal Reasoning">
                                            <span class="radio-btn">
                                                <div class="card-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="96.000000pt" height="152.000000pt" viewBox="0 0 96.000000 152.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,152.000000) scale(0.100000,-0.100000)" fill="#fff" stroke="none"><path d="M64 1491 c-17 -11 -36 -34 -43 -52 -8 -22 -11 -190 -11 -546 0 -581 -1 -571 72 -602 l37 -16 3 -133 3 -134 66 61 67 61 63 -57 64 -57 5 130 5 129 278 3 277 2 0 510 0 510 -420 0 -420 0 -32 29 c-43 38 -45 92 -4 127 l27 24 365 0 c317 0 364 2 364 15 0 13 -47 15 -367 15 -344 0 -370 -1 -399 -19z m326 -416 l0 -195 -170 0 -170 0 0 25 c0 14 5 25 12 25 9 0 9 3 0 12 -7 7 -12 18 -12 26 0 11 8 9 36 -7 26 -15 52 -21 97 -21 l62 0 -85 50 c-47 27 -91 52 -98 57 -8 5 -12 21 -10 39 l3 32 130 -74 c72 -40 133 -73 138 -74 4 0 7 68 7 150 l0 150 30 0 30 0 0 -195z m220 45 c0 -82 3 -150 8 -150 4 0 70 36 147 80 107 61 141 76 143 64 5 -19 20 -9 -138 -98 l-135 -76 60 0 c53 0 69 6 138 44 l77 45 0 -40 c0 -24 -5 -39 -12 -40 -10 0 -10 -2 0 -6 6 -2 12 -18 12 -34 l0 -29 -180 0 -180 0 0 188 c0 104 3 192 7 195 3 4 17 7 30 7 l23 0 0 -150z m-222 -607 l2 -203 -30 0 -30 0 -2 159 -3 159 -125 -70 c-149 -84 -150 -84 -150 -66 0 8 58 48 129 89 l130 74 -55 3 c-48 3 -63 -2 -129 -38 l-75 -41 0 35 c0 22 5 36 13 37 9 0 9 2 0 6 -7 2 -13 15 -13 28 0 29 23 32 210 31 l125 -1 3 -202z m522 176 c0 -21 -5 -29 -17 -29 -17 -1 -17 -1 0 -14 9 -7 17 -21 17 -30 0 -13 -10 -11 -54 14 -45 26 -64 31 -108 28 l-53 -3 107 -60 c106 -59 107 -61 108 -97 l0 -36 -147 83 -148 84 -3 -160 -3 -160 -27 3 -27 3 -3 190 c-1 104 0 195 3 203 4 10 43 12 180 12 l175 -2 0 -29z m-557 -491 c-3 -46 -7 -85 -9 -87 -2 -2 -22 13 -44 33 l-41 37 -40 -35 c-21 -20 -44 -36 -49 -36 -6 0 -10 35 -10 85 l0 85 100 0 99 0 -6 -82z"></path><path d="M120 1425 c0 -13 44 -15 335 -15 291 0 335 2 335 15 0 13 -44 15 -335 15 -291 0 -335 -2 -335 -15z"></path><path d="M140 1355 c0 -13 45 -15 345 -15 300 0 345 2 345 15 0 13 -45 15 -345 15 -300 0 -345 -2 -345 -15z"></path></g></svg>
                                                    <h3>Non-Verbal Reasoning</h3>
                                                </div>
                                            </span>
                                        </label>
                                        <label class="card-radio">
                                            <input type="radio" name="ajax[new][subject]" value="Verbal Reasoning">
                                            <span class="radio-btn">
                                                <div class="card-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="96.000000pt" height="152.000000pt" viewBox="0 0 96.000000 152.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,152.000000) scale(0.100000,-0.100000)" fill="#fff" stroke="none"><path d="M64 1491 c-17 -11 -36 -34 -43 -52 -8 -22 -11 -190 -11 -546 0 -581 -1 -571 72 -602 l37 -16 3 -133 3 -134 66 61 67 61 63 -57 64 -57 5 130 5 129 278 3 277 2 0 510 0 510 -420 0 -420 0 -32 29 c-43 38 -45 92 -4 127 l27 24 365 0 c317 0 364 2 364 15 0 13 -47 15 -367 15 -344 0 -370 -1 -399 -19z m326 -416 l0 -195 -170 0 -170 0 0 25 c0 14 5 25 12 25 9 0 9 3 0 12 -7 7 -12 18 -12 26 0 11 8 9 36 -7 26 -15 52 -21 97 -21 l62 0 -85 50 c-47 27 -91 52 -98 57 -8 5 -12 21 -10 39 l3 32 130 -74 c72 -40 133 -73 138 -74 4 0 7 68 7 150 l0 150 30 0 30 0 0 -195z m220 45 c0 -82 3 -150 8 -150 4 0 70 36 147 80 107 61 141 76 143 64 5 -19 20 -9 -138 -98 l-135 -76 60 0 c53 0 69 6 138 44 l77 45 0 -40 c0 -24 -5 -39 -12 -40 -10 0 -10 -2 0 -6 6 -2 12 -18 12 -34 l0 -29 -180 0 -180 0 0 188 c0 104 3 192 7 195 3 4 17 7 30 7 l23 0 0 -150z m-222 -607 l2 -203 -30 0 -30 0 -2 159 -3 159 -125 -70 c-149 -84 -150 -84 -150 -66 0 8 58 48 129 89 l130 74 -55 3 c-48 3 -63 -2 -129 -38 l-75 -41 0 35 c0 22 5 36 13 37 9 0 9 2 0 6 -7 2 -13 15 -13 28 0 29 23 32 210 31 l125 -1 3 -202z m522 176 c0 -21 -5 -29 -17 -29 -17 -1 -17 -1 0 -14 9 -7 17 -21 17 -30 0 -13 -10 -11 -54 14 -45 26 -64 31 -108 28 l-53 -3 107 -60 c106 -59 107 -61 108 -97 l0 -36 -147 83 -148 84 -3 -160 -3 -160 -27 3 -27 3 -3 190 c-1 104 0 195 3 203 4 10 43 12 180 12 l175 -2 0 -29z m-557 -491 c-3 -46 -7 -85 -9 -87 -2 -2 -22 13 -44 33 l-41 37 -40 -35 c-21 -20 -44 -36 -49 -36 -6 0 -10 35 -10 85 l0 85 100 0 99 0 -6 -82z"></path><path d="M120 1425 c0 -13 44 -15 335 -15 291 0 335 2 335 15 0 13 -44 15 -335 15 -291 0 -335 -2 -335 -15z"></path><path d="M140 1355 c0 -13 45 -15 345 -15 300 0 345 2 345 15 0 13 -45 15 -345 15 -300 0 -345 -2 -345 -15z"></path></g></svg>
                                                    <h3>Verbal Reasoning</h3>
                                                </div>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rurera_common_hide_field practice-quiz-topics-list"></div>



                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                        <div class="form-group rurera_common_hide_field timestables_heatmap">


                        </div>

                        <div class="form-group rurera_common_hide_field timestables_modes_selection">
                            <label class="input-label">Timestables Mode</label>
                            <div class="input-group">
                                <div class="radio-buttons">

                                    <label class="card-radio">
                                        <input type="radio" class="sub_types_selection" name="ajax[new][timestables_type]" value="freedom_mode" checked>
                                        <span class="radio-btn">
                                                                        <div class="card-icon">
                                                                            <h3>Freedom Mode</h3>
                                                                        </div>
                                                                    </span>
                                    </label>
                                    <label class="card-radio">
                                        <input type="radio" class="sub_types_selection" name="ajax[new][timestables_type]" value="powerup_mode">
                                        <span class="radio-btn">
                                                                        <div class="card-icon">
                                                                            <h3>Powerup Mode</h3>
                                                                        </div>
                                                                    </span>
                                    </label>
                                    <label class="card-radio">
                                        <input type="radio" class="sub_types_selection" name="ajax[new][timestables_type]" value="trophy_mode">
                                        <span class="radio-btn">
                                                                        <div class="card-icon">
                                                                            <h3>Trophy Mode</h3>
                                                                        </div>
                                                                    </span>
                                    </label>
                                    <label class="card-radio">
                                        <input type="radio" class="sub_types_selection" name="ajax[new][timestables_type]" value="treasure_mission">
                                        <span class="radio-btn">
                                                                        <div class="card-icon">
                                                                            <h3>Treasure Mission Mode</h3>
                                                                        </div>
                                                                    </span>
                                    </label>
                                    <label class="card-radio">
                                        <input type="radio" class="sub_types_selection" name="ajax[new][timestables_type]" value="showdown_mode">
                                        <span class="radio-btn">
                                                                        <div class="card-icon">
                                                                            <h3>Showdown Mode</h3>
                                                                        </div>
                                                                    </span>
                                    </label>

                                </div>
                            </div>
                        </div>
                        <div class="form-group rurera_common_hide_field arthmetic_operations">
                            <label class="input-label">Select Arithmetic Operations</label>
                            <div class="input-group">
                                <div class="radio-buttons">
                                    <label class="card-radio">
                                        <input type="radio" name="ajax[new][arthmetic_operations]" value="multiplication_division">
                                        <span class="radio-btn">
                                                                        <div class="card-icon">
                                                                            <h3>Multiplication and Division</h3>
                                                                        </div>
                                                                    </span>
                                    </label>
                                    <label class="card-radio">
                                        <input type="radio" name="ajax[new][arthmetic_operations]" value="multiplication" checked>
                                        <span class="radio-btn">
                                                                        <div class="card-icon">
                                                                            <h3>Multiplication only</h3>
                                                                        </div>
                                                                    </span>
                                    </label>
                                    <label class="card-radio">
                                        <input type="radio" name="ajax[new][arthmetic_operations]" value="division">
                                        <span class="radio-btn">
                                                                        <div class="card-icon">
                                                                            <h3>Division only</h3>
                                                                        </div>
                                                                    </span>
                                    </label>
                                </div>
                            </div>
                        </div>




                        @php
                            $tables_no = isset( $assignmentObj->tables_no )? json_decode($assignmentObj->tables_no) : array();
                        @endphp


                        <div class="form-group rurera_common_hide_field select_tables_field">

                            <div class="questions-select-number">
                                <ul class="d-flex justify-content-center flex-wrap mb-30">
                                    <li><input type="checkbox" value="10" name="ajax[new][tables_no][]" {{in_array(10,$tables_no)?
                                                'checked' : ''}} id="tables_ten" /> <label for="tables_ten">10</label></li>
                                    <li><input type="checkbox" value="2" name="ajax[new][tables_no][]" {{in_array(2,$tables_no)?
                                                'checked' : ''}} id="tables_two" /> <label for="tables_two">2</label></li>
                                    <li><input type="checkbox" value="5" name="ajax[new][tables_no][]" {{in_array(5,$tables_no)?
                                                'checked' : ''}} id="tables_five" /> <label for="tables_five">5</label></li>
                                    <li><input type="checkbox" value="3" name="ajax[new][tables_no][]" {{in_array(3,$tables_no)?
                                                'checked' : ''}} id="tables_three" /> <label for="tables_three">3</label></li>
                                    <li><input type="checkbox" value="4" name="ajax[new][tables_no][]" {{in_array(4,$tables_no)?
                                                'checked' : ''}} id="tables_four" /> <label for="tables_four">4</label></li>
                                    <li><input type="checkbox" value="8" name="ajax[new][tables_no][]" {{in_array(8,$tables_no)?
                                                'checked' : ''}} id="tables_eight" /> <label for="tables_eight">8</label></li>
                                    <li><input type="checkbox" value="6" name="ajax[new][tables_no][]" {{in_array(6,$tables_no)?
                                                'checked' : ''}} id="tables_six" /> <label for="tables_six">6</label></li>
                                    <li><input type="checkbox" value="7" name="ajax[new][tables_no][]" {{in_array(7,$tables_no)?
                                                'checked' : ''}} id="tables_seven" /> <label for="tables_seven">7</label></li>
                                    <li><input type="checkbox" value="9" name="ajax[new][tables_no][]" {{in_array(9,$tables_no)?
                                                'checked' : ''}} id="tables_nine" /> <label for="tables_nine">9</label></li>
                                    <li><input type="checkbox" value="11" name="ajax[new][tables_no][]" {{in_array(11,$tables_no)?
                                                'checked' : ''}} id="tables_eleven" /> <label for="tables_eleven">11</label></li>
                                    <li><input type="checkbox" value="12" name="ajax[new][tables_no][]" {{in_array(12,$tables_no)?
                                                'checked' : ''}} id="tables_twelve" /> <label for="tables_twelve">12</label></li>
                                    <li><input type="checkbox" value="13" name="ajax[new][tables_no][]" {{in_array(13,$tables_no)?
                                                'checked' : ''}} id="tables_thirteen" /> <label for="tables_thirteen">13</label></li>
                                    <li><input type="checkbox" value="14" name="ajax[new][tables_no][]" {{in_array(14,$tables_no)?
                                                'checked' : ''}} id="tables_fourteen" /> <label for="tables_fourteen">14</label></li>
                                    <li><input type="checkbox" value="15" name="ajax[new][tables_no][]" {{in_array(15,$tables_no)?
                                                'checked' : ''}} id="tables_fifteen" /> <label for="tables_fifteen">15</label></li>
                                    <li><input type="checkbox" value="16" name="ajax[new][tables_no][]" {{in_array(16,$tables_no)?
                                                'checked' : ''}} id="tables_sixteen" /> <label for="tables_sixteen">16</label></li>
                                </ul>
                            </div>
                        </div>




                        <div class="form-group rurera_common_hide_field table_group_field">
                            <label class="input-label">Select Table Group</label>
                            <div class="input-group">
                                <div class="radio-buttons">
                                    <label class="card-radio">
                                        <input type="radio" name="ajax[new][table_group]" value="1">
                                        <span class="radio-btn">
                                                                        <div class="card-icon">
                                                                            <h3>1-3</h3>
                                                                        </div>
                                                                    </span>
                                    </label>
                                    <label class="card-radio">
                                        <input type="radio" name="ajax[new][table_group]" value="2" checked>
                                        <span class="radio-btn">
                                                                        <div class="card-icon">
                                                                            <h3>1-6</h3>
                                                                        </div>
                                                                    </span>
                                    </label>
                                    <label class="card-radio">
                                        <input type="radio" name="ajax[new][table_group]" value="3">
                                        <span class="radio-btn">
                                                                        <div class="card-icon">
                                                                            <h3>1-9</h3>
                                                                        </div>
                                                                    </span>
                                    </label>
                                    <label class="card-radio">
                                        <input type="radio" name="ajax[new][table_group]" value="4">
                                        <span class="radio-btn">
                                                                        <div class="card-icon">
                                                                            <h3>1-12</h3>
                                                                        </div>
                                                                    </span>
                                    </label>
                                    <label class="card-radio">
                                        <input type="radio" name="ajax[new][table_group]" value="5">
                                        <span class="radio-btn">
                                                                        <div class="card-icon">
                                                                            <h3>1-15</h3>
                                                                        </div>
                                                                    </span>
                                    </label>
                                    <label class="card-radio">
                                        <input type="radio" name="ajax[new][table_group]" value="6">
                                        <span class="radio-btn">
                                                                        <div class="card-icon">
                                                                            <h3>1-18</h3>
                                                                        </div>
                                                                    </span>
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group rurera_common_hide_field practice_duration_field">
                            <label class="input-label">Select Practice Duration</label>
                            <div class="input-group">
                                <div class="radio-buttons">
                                    <label class="card-radio">
                                        <input type="radio" name="ajax[new][powerup_practice_duration]" value="1" checked>
                                        <span class="radio-btn">
                                                                        <div class="card-icon">
                                                                            <h3>1 Minute</h3>
                                                                        </div>
                                                                    </span>
                                    </label>
                                    <label class="card-radio">
                                        <input type="radio" name="ajax[new][powerup_practice_duration]" value="3" >
                                        <span class="radio-btn">
                                                                        <div class="card-icon">
                                                                            <h3>3 Minutes</h3>
                                                                        </div>
                                                                    </span>
                                    </label>
                                    <label class="card-radio">
                                        <input type="radio" name="ajax[new][powerup_practice_duration]" value="5">
                                        <span class="radio-btn">
                                                                        <div class="card-icon">
                                                                            <h3>5 Minutes</h3>
                                                                        </div>
                                                                    </span>
                                    </label>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-6 rurera_common_hide_field no_of_stages_field">
                                <div class="form-group">
                                    <label class="input-label">No of Stages</label>

                                    <div class="invalid-feedback"></div>
                                    <div class="range-slider">
                                        <div id="slider_thumb" class="range-slider_thumb" style="left: 0px;">0</div>
                                        <div class="range-slider_line">
                                            <div id="slider_line" class="range-slider_line-fill" style="width: 0%;"></div>
                                        </div>
                                        <input type="range"
                                                name="ajax[new][no_of_stages]"
                                                value="0"
                                                class="js-ajax-title form-control no_of_stages range-slider-field"
                                                placeholder="" min="1" max="10"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-group rurera_common_hide_field no_of_books_field">
                    <label class="input-label">No of Books</label>
                    <input type="number"
                            name="ajax[new][no_of_books]" min="1"
                            value="{{ !empty($assignmentObj) ? $assignmentObj->no_of_books : 1 }}"
                            class="js-ajax-title form-control rurera-req-field"
                            placeholder=""/>
                </div>

                <div class="form-section rurera-hide">
                    <h2 class="section-title">General information</h2>
                </div>

                <div class="form-group">
                    <label class="input-label">Practice Title</label>
                    <input type="text"
                            name="ajax[new][title]"
                            value="{{ !empty($assignmentObj) ? $assignmentObj->title : old('title') }}"
                            class="js-ajax-title form-control rurera-req-field"
                            placeholder=""/>
                </div>

                <div class="form-group rurera-hide">
                    <label class="input-label">Practice Description</label>
                    <textarea
                        name="ajax[new][description]"
                        class="form-control summernote-editor-mintool"
                        placeholder="" rows="20"></textarea>
                    <div class="invalid-feedback"></div>
                </div>

                <div class="form-section rurera-hide">
                    <h2 class="section-title">Schedule</h2>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-6">
                        <div class="form-group">
                            <label class="input-label">Practice Start Date</label>
                            <div class="input-group">
                                <div class="input-holder">
                                    <img src="/assets/default/svgs/calendar-days.svg" height="64" width="64" alt="calendar-days">
                                    <input type="text" autocomplete="off"
                                            name="ajax[new][assignment_start_date]"
                                            value="{{ !empty($assignmentObj) ? dateTimeFormat($assignmentObj->assignment_start_date, 'Y-m-d', false) : old('assignment_start_date') }}"
                                            class="form-control practice-start-date rureradatepicker rurera-req-field @error('assignment_start_date') is-invalid @enderror"
                                            min="{{date('Y-m-d')}}"
                                            placeholder=""/>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-6">
                        <div class="form-group">
                            <label class="input-label">Practice Due Date</label>
                            <div class="input-group">
                                <div class="input-holder">
                                    <img src="/assets/default/svgs/calendar-days.svg" height="64" width="64" alt="calendar-days">
                                    <input type="text" autocomplete="off"
                                            name="ajax[new][assignment_end_date]"
                                            value="{{ !empty($assignmentObj) ? dateTimeFormat($assignmentObj->assignment_end_date, 'Y-m-d', false) : old('assignment_end_date') }}"
                                            class="form-control practice-due-date rureradatepicker rurera-req-field" min="{{date('Y-m-d')}}"
                                            placeholder=""/>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-4 rurera-hide">
                        <div class="form-group">
                            <label class="input-label">Review Due Date</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="button" class="input-group-text " data-input="logo" data-preview="holder">
                                        <i class="fa fa-calendar-week"></i>
                                    </button>
                                </div>
                                <input type="text" autocomplete="off"
                                        name="ajax[new][assignment_review_due_date]"
                                        value="{{ !empty($assignmentObj) ? dateTimeFormat($assignmentObj->assignment_review_due_date, 'Y-m-d', false) : old('assignment_review_due_date') }}"
                                        class="form-control reviewer-date rureradatepicker" min="{{date('Y-m-d')}}"
                                        placeholder=""/>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group rurera-hide">
                    <label class="input-label">Practice Method</label>
                    <div class="input-group">

                        <div class="radio-buttons">
                            <label class="card-radio">
                                <input type="radio" name="ajax[new][assignment_method]"
                                        class="assignment_method_check" value="practice" checked>
                                <span class="radio-btn">
                                                            <div class="card-icon">
                                                                <h3>Practice</h3>
                                                            </div>

                                                        </span>
                            </label>
                            <label class="card-radio assignment_topic_type_fields practice_fields timestables_fields assignment_fields">
                                <input type="radio" name="ajax[new][assignment_method]"
                                        class="assignment_method_check" value="target_improvements">
                                <span class="radio-btn">
                                                            <div class="card-icon">
                                                                <h3>Target / Improvements</h3>
                                                            </div>

                                                        </span>
                            </label>
                            <label class="card-radio assignment_topic_type_fields 11plus_fields independent_exams_fields iseb_fields cat4_fields">
                                <input type="radio" name="ajax[new][assignment_method]"
                                        class="assignment_method_check" value="mock_exam">
                                <span class="radio-btn">
                                                            <div class="card-icon">
                                                                <h3>Mock Exam</h3>
                                                            </div>

                                                        </span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">

                </div>

                <div class="form-section rurera-hide">
                    <h2 class="section-title">Target</h2>
                </div>


                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-12 col-6 rurera_common_hide_field no_of_questions_field">
                        <div class="form-group">
                            <label class="input-label">No of Questions</label>

                            <div class="invalid-feedback"></div>
                            <div class="range-slider">
                                <div id="slider_thumb" class="range-slider_thumb" style="left: 0px;">0</div>
                                <div class="range-slider_line">
                                    <div id="slider_line" class="range-slider_line-fill" style="width: 0%;"></div>
                                </div>
                                <input type="range"
                                        name="ajax[new][no_of_questions]"
                                        value="10"
                                        step="10"
                                        class="js-ajax-title form-control no_of_questions range-slider-field"
                                        placeholder="" min="10" max="30"/>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-6 rurera_common_hide_field no_of_attemptes_field assignment_topic_type_fields practice_fields timestables_fields assignment_fields">
                        <div class="form-group">
                            <label class="input-label">No of Attempts</label>

                            <div class="invalid-feedback"></div>
                            <div class="range-slider">
                                <div id="slider_thumb" class="range-slider_thumb" style="left: 0px;">0</div>
                                <div class="range-slider_line">
                                    <div id="slider_line" class="range-slider_line-fill" style="width: 0%;"></div>
                                </div>
                                <input type="range"
                                        name="ajax[new][no_of_attempts]"
                                        value="0"
                                        class="js-ajax-title form-control no_of_attempts range-slider-field"
                                        placeholder="" min="1" max="10"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-6 attempts-fields rurera-hide">
                        <div class="form-group rurera_common_hide_field percentage_answer_field">
                            <label class="input-label">Percentage of Correct Answers</label>

                            <div class="invalid-feedback"></div>
                            <div class="range-slider">
                                <div id="slider_thumb" class="range-slider_thumb" style="left: 0px;">0</div>
                                <div class="range-slider_line">
                                    <div id="slider_line" class="range-slider_line-fill" style="width: 0%;"></div>
                                </div>
                                <input type="range"
                                        name="ajax[new][target_percentage]"
                                        value="0" data-label="%"
                                        class="js-ajax-title form-control correct_answers_percentage range-slider-field" min="0" max="100"
                                        placeholder=""/>
                            </div>


                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-6 attempts-fields rurera-hide">
                        <div class="form-group rurera_common_hide_field average_time_field">
                            <label class="input-label">Average Time of Correct Answers (Seconds)</label>

                            <div class="range-slider">
                                <div id="slider_thumb" class="range-slider_thumb" style="left: 0px;">0</div>
                                <div class="range-slider_line">
                                    <div id="slider_line" class="range-slider_line-fill" style="width: 0%;"></div>
                                </div>
                                <input type="range"
                                        name="ajax[new][target_average_time]"
                                        value="0"
                                        class="js-ajax-title form-control average_time range-slider-field" min="0" max="60"
                                        placeholder=""/>
                            </div>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>

                <div class="form-group rurera-hide">
                    <label class="input-label">Assignment Settings</label>
                    <div class="option-field-item mt-20 mb-20">
                        <div class="custom-switch pl-0">
                            <input type="checkbox" id="shuffle_questions">
                            <label for="shuffle_questions" class="custom-switch-description">
                                <span class="custom-switch-indicator"></span>
                                Shuffle Questions
                            </label>
                        </div>
                    </div>
                    <div class="option-field-item mt-20 mb-20">
                        <div class="custom-switch pl-0">
                            <input type="checkbox" name="ajax[new][correct_answer_explaination]" id="correct_answer_explaination" value="1" class="custom-switch-input">
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="correct_answer_explaination">Correct Answer Explanation</label>
                        </div>
                    </div>
                    <div class="option-field-item mt-20 mb-20">
                        <div class="custom-switch pl-0">
                            <input type="checkbox" name="ajax[new][incorrect_answer_explaination]" id="incorrect_answer_explaination" value="1" class="custom-switch-input">
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer" for="incorrect_answer_explaination">Incorrect Answer Explanation</label>
                        </div>
                    </div>
                </div>

                <div class="rurera-hide rurera_js_hide_field1 form-group ">
                    <label class="input-label">Duration Type</label>
                    <div class="input-group">
                        <div class="radio-buttons">
                            <label class="card-radio">
                                <input type="radio" name="ajax[new][duration_type]"
                                        class="duration_conditional_check" value="no_time_limit" checked>
                                <span class="radio-btn">
                                                    <div class="card-icon">
                                                        <h3>No Time Limit</h3>
                                                    </div>

                                                </span>
                            </label>
                            <label class="card-radio">
                                <input type="radio" name="ajax[new][duration_type]"
                                        class="duration_conditional_check" value="total_practice">
                                <span class="radio-btn">
                                                    <div class="card-icon">
                                                        <h3>Total Practice</h3>
                                                    </div>

                                                </span>
                            </label>
                            <label class="card-radio">
                                <input type="radio" name="ajax[new][duration_type]"
                                        class="duration_conditional_check" value="per_question">
                                <span class="radio-btn">
                                                    <div class="card-icon">
                                                        <h3>Per Question</h3>
                                                    </div>

                                                </span>
                            </label>
                        </div>

                        <div class="invalid-feedback"></div>
                    </div>
                </div>

                <div class="form-group duration_type_fields total_practice_fields">
                    <label class="input-label">Practice Time (<span class="practice_interval_data">Minutes</span>)</label>
                    <div class="range-slider">
                        <div id="slider_thumb" class="range-slider_thumb" style="left: 0px;">0</div>
                        <div class="range-slider_line">
                            <div id="slider_line" class="range-slider_line-fill" style="width: 0%;"></div>
                        </div>
                        <input type="range"
                                name="ajax[new][practice_time]"
                                value="0"
                                class="js-ajax-title form-control practice_interval range-slider-field" step="20" min="0" max="240"
                                placeholder=""/>
                    </div>
                    <div class="invalid-feedback"></div>
                </div>

                <div class="form-group duration_type_fields per_question_fields">
                    <label class="input-label">Questions Time Interval (<span class="time_interval_data">Seconds</span>)</label>

                    <div class="range-slider">
                        <div id="slider_thumb" class="range-slider_thumb" style="left: 0px;">0</div>
                        <div class="range-slider_line">
                            <div id="slider_line" class="range-slider_line-fill" style="width: 0%;"></div>
                        </div>
                        <input type="range"
                                name="ajax[new][time_interval]"
                                value="0"
                                class="js-ajax-title form-control time_interval range-slider-field" step="10" min="0" max="1200"
                                placeholder=""/>
                    </div>

                    <div class="invalid-feedback"></div>
                </div>


                <div class="form-group rurera-hide">
                    <label class="input-label">Assignment Reviewer</label>
                    <div class="input-group">
                        <select name="ajax[new][assignment_reviewer]"
                                class="form-control select2 assignment-reviewer-field">
                            <option value="">Select Reviewer</option>
                            @if( !empty( $teachers ) )
                                @foreach( $teachers as $teacherObj)
                                    <option value="{{$teacherObj->id}}">{{$teacherObj->get_full_name()}}</option>
                                @endforeach
                            @endif
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>

                <div class="mt-20 mb-20">
                    <button type="submit"
                            class="js-submit-quiz-form btn btn-sm btn-primary">{{
                                    !empty($assignment) ?
                                    trans('public.save_change') : trans('public.create') }}
                    </button>

                    @if(empty($assignment) and !empty($inWebinarPage))
                        <button type="button"
                                class="btn btn-sm btn-danger ml-10 cancel-accordion">{{
                                    trans('public.close') }}
                        </button>
                    @endif
                </div>
        </div>
        <div class="wizard-steps" data-step_id="2"></div>
        <div class="wizard-pagination1 rurera-hide">
            <div class="next-btn wizard-step" data-next_step="2">Continue</div>
        </div>
    </form>
</div>
<div class="modal fade lms-choose-membership" id="assignmentCreateModal" tabindex="-1" aria-labelledby="assignmentCreateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="panel-header">
                <div class="modal-logo"><img src="/assets/default/img/sidebar/logo.svg" alt="Rurera Logo" width="150" height="38"></div>
                <span class="steps-counter">Step 1</span>
                <button type="button" class="close" ><a href="/{{panelRoute()}}/set-work">Close <span aria-hidden="true">×</span></a></button>
                <div class="progress-line">
                    <span class="progress-count" style="width: 30%;"></span>
                </div>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>

<div class="modal fade lms-choose-membership" id="subscriptionModal" tabindex="-1" aria-labelledby="subscriptionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- <div class="panel-header">
                <div class="modal-logo"><img src="/assets/default/img/sidebar/logo.svg" alt="Rurera Logo" width="150" height="38"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">Back to Dashboard <span aria-hidden="true">×</span></button>
            </div> -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="modal-body">
                <div class="container container-nosidebar">
                    <div class="tab-content subscription-content" id="nav-tabContent"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts_bottom')
<script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>
<script src="/assets/default/js/admin/filters.min.js"></script>
<script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
<script src="/assets/admin/vendor/daterangepicker/daterangepicker.min.js"></script>
<script src="/assets/vendors/jquerygrowl/jquery.growl.js"></script>
<script type="text/javascript">


    function common_fields_check(){
        if ($(".rurera_js_hide_field").length > 0) {

            var hideList = [];

            // Step 1: collect all classes to hide from checked inputs
            $('[data-rurera_hide_class]:checked').each(function () {
                if($(this).closest('.hide_check_field').hasClass('rurera-hide')){
                    return;
                }
                var classes = $(this).attr('data-rurera_hide_class');
                classes = classes.replace(/[\[\]\s]/g, '').split(',');
                hideList = hideList.concat(classes);
            });

            console.log("Hide List:", hideList);

            // Step 2: loop all hide fields
            $('.rurera_js_hide_field').each(function () {
                var HideFieldObj = $(this);
                var recieve_class = HideFieldObj.attr('data-recieve_class');

                if (hideList.includes(recieve_class)) {
                    HideFieldObj.addClass('rurera-hide');
                } else {
                    HideFieldObj.removeClass('rurera-hide');
                }
            });
        }
    }
    $(document).ready(function () {

        if ($('.summernote-editor-mintool').length) {

            $('.summernote-editor-mintool').summernote({
                toolbar: [
                    ['font', ['bold', 'underline']],
                    ['para', ['ul', 'ol', 'paragraph']],
                ],
                callbacks: {
                    onChange: function (contents, $editable) {
                        $('.summernote-editor_' + parent_field_id).val(EditorValueEnocde(contents));
                        trigger_field_change($('.summernote-editor_' + parent_field_id));
                    }
                }
            });
        }


        $('body').on('change', '.select_all', function (e) {
            if ($(this).is(':checked')) {
                $(this).closest('.users_list_block').find('.users-list').find('input').prop('checked', true);
                console.log('checked');
            } else {
                $(this).closest('.users_list_block').find('.users-list').find('input').prop('checked', false);
                console.log('unchecked');
            }
            ;
        });

        $('body').on('click', '.year-group-select', function (e) {
            var thisObj = $('.populated-content-area');
            var year_id = $(this).attr('data-year_id');
            $(".year_id_field").val(year_id);
            rurera_loader(thisObj, 'div');
            jQuery.ajax({
                type: "GET",
                url: '/admin/custom_quiz/subjects_by_year',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {"year_id": year_id},
                success: function (return_data) {
                    $(".populated-data").addClass('rurera-hide');
                    rurera_remove_loader(thisObj, 'button');
                    if (return_data != '') {
                        $(".populated-content-area").append(return_data);
                        subjects_callback();
                    }
                }
            });
        });

        var subjects_callback_bk = function () {
            $('body').on('click', '.subject-group-selects', function (e) {
                var thisObj = $('.populated-content-area');
                var subject_id = $(this).attr('data-subject_id');
                $(".subject_id_field").val(subject_id);
                rurera_loader(thisObj, 'div');
                jQuery.ajax({
                    type: "GET",
                    url: '/admin/custom_quiz/topics_subtopics_by_subject',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {"subject_id": subject_id},
                    success: function (return_data) {
                        $(".populated-data").addClass('rurera-hide');
                        rurera_remove_loader(thisObj, 'button');
                        if (return_data != '') {
                            //$(".populated-content-area").append(return_data);
                            $(".topics-subtopics-content-area").append(return_data);
                            questions_callback();
                            progress_cirlce_refresh();
                        }
                    }
                });
            });
        }

        var subjects_callback = function () {
            $('body').on('change', '.subject_ajax_select', function (e) {
                var thisObj = $('.populated-content-area');
                var subject_id = $(this).val();
                $(".subject_id_field").val(subject_id);
                rurera_loader(thisObj, 'div');
                jQuery.ajax({
                    type: "GET",
                    url: '/admin/custom_quiz/topics_subtopics_by_subject',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {"subject_id": subject_id},
                    success: function (return_data) {
                        //$(".populated-data").addClass('rurera-hide');
                        rurera_remove_loader(thisObj, 'button');
                        if (return_data != '') {
                            //$(".populated-content-area").append(return_data);
                            $(".topics-subtopics-content-area").append(return_data);
                            $("#questions-tab").click();
                            questions_callback();
                            progress_cirlce_refresh();
                        }
                    }
                });
            });
        }
        subjects_callback();


        var questions_callback = function () {
            $('body').on('click', '.subchapter-group-select li', function (e) {
                var thisObj = $('.populated-content-area');
                var subchapter_id = $(this).attr('data-subchapter_id');
                rurera_loader(thisObj, 'div');
                jQuery.ajax({
                    type: "GET",
                    url: '/admin/custom_quiz/questions_by_subchapter',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {"subchapter_id": subchapter_id},
                    success: function (return_data) {
                        //$(".populated-data").addClass('rurera-hide');
                        rurera_remove_loader(thisObj, 'button');
                        //$(".questions-populate-area").html(return_data);
                        $(".selected-questions-group").append(return_data);
                        questions_select_callback();

                    }
                });
            });
        }

        var questions_select_callback = function () {
            $('body').on('click', '.questions-group-select li', function (e) {
                var thisObj = $('.populated-content-area');
                var question_id = $(this).attr('data-question_id');
                var question_title = $(this).find('a').html();
                $('.questions-list li[data-question_id="' + question_id + '"]').remove();
                $(".questions-list").append('<li data-question_id="' + question_id + '"><input type="hidden" name="ajax[new][question_list_ids][]" value="' + question_id + '">' + question_title + '<a href="javascript:;" class="parent-li-remove"><span class="fas fa-trash"></span></a></li>');
            });


        }

        var currentRequest = null;
        var question_search = function () {
            $('body').on('keyup', '.search-questions', function (e) {
                var input, filter, ul, li, a, i, txtValue;
                var search_question_bank = $('.search_question_bank').is(":checked");
                if (search_question_bank == false) {
                    input = document.getElementById("search-questions");
                    filter = input.value.toUpperCase();
                    ul = document.getElementById("questions-group-select");
                    li = ul.getElementsByTagName("li");
                    for (i = 0; i < li.length; i++) {
                        a = li[i].getElementsByTagName("a")[0];
                        txtValue = a.textContent || a.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1 || li[i].className.indexOf("alwaysshow") > -1) {
                            li[i].style.display = "";
                        } else {
                            li[i].style.display = "none";
                        }
                    }
                } else {
                    var input = $(this).val();
                    var thisObj = $('.questions-populate-area');
                    var year_id = $(".year_id_field").val();
                    var subject_id = $(".subject_id_field").val();
                    rurera_loader(thisObj, 'div');

                    currentRequest = jQuery.ajax({
                        type: "GET",
                        url: '/admin/custom_quiz/questions_by_keyword',
                        beforeSend: function () {
                            if (currentRequest != null) {
                                currentRequest.abort();
                            }
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {"keyword": input, "year_id": year_id, "subject_id": subject_id},
                        success: function (return_data) {
                            rurera_remove_loader(thisObj, 'button');
                            $(".questions-group-select").html(return_data);
                        }
                    });
                }
            });
        }

        question_search();


        $(".questions-list").sortable();


        $('body').on('click', '.rurera-back-btn', function (e) {
            $(this).closest('.populated-data').prev('.populated-data').removeClass('rurera-hide');
            $(this).closest('.populated-data').addClass('rurera-hide');
            $(this).closest('.populated-data').remove();
            if ($(this).hasClass('questions-list-btn')) {
                console.log('questions-btn');
            }
        });



        $('body').on('change', '.conditional_field_check', function (e) {
            var current_value = $(this).val();
            $(".conditional_fields_block").addClass('rurera-hide');
            $('.' + current_value + '_fields_block').removeClass('rurera-hide');
        });

        $('body').on('change', '.conditional_check', function (e) {
            var current_value = $(this).val();
            $(".conditional_fields").addClass('rurera-hide');
            $('.' + current_value + '_field').removeClass('rurera-hide');
        });


        $('body').on('change', '.assignment_type_check', function (e) {
            $(".class_condition").change();
        });


        $('body').on('change', '.school_condition', function (e) {
            var school_id = $(this).val();
            jQuery.ajax({
                type: "GET",
                url: '/admin/common/get_school_classes',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {"school_id": school_id, "assignment_id": "new"},
                success: function (return_data) {
                    console.log(return_data);
                    $(".class-section-data").html(return_data);
                }
            });
        });
        $(".school_condition").change();
        $('body').on('change', '.class_condition', function (e) {
            var current_value = $(this).val();
            var assigned_type = $(".assignment_type_check:checked").val();
            console.log(assigned_type);
            if(assigned_type == 'Individual') {
                $(".conditional_sections").addClass('rurera-hide');
                $('.class_sections_' + current_value).removeClass('rurera-hide');
            }else{
                $(".conditional_sections").addClass('rurera-hide');
                $('.class_sections_' + current_value).addClass('rurera-hide');
            }
        });

        $('body').on('change', '.duration_conditional_check', function (e) {
            var current_value = $(this).val();
            $(".duration_type_fields").addClass('rurera-hide');
            $('.' + current_value + '_fields').removeClass('rurera-hide');
        });

        $('body').on('change', '.assignment_topic_type_check1', function (e) {
            var current_value = $(this).val();
            $(".assignment_topic_type_fields").addClass('rurera-hide');
            $('.' + current_value + '_fields').removeClass('rurera-hide');
            var total_questions = 0;
            var current_questions = 0;
            if (current_value == 'timestables') {
                total_questions = 200;
            }
            if( current_value == '11plus' || current_value == 'independent_exams' || current_value == 'iseb' || current_value == 'cat4'){
                total_questions = 50;
                current_questions = 50;
            }

            $(".max_questions").html('Max: ' + total_questions);
            $(".no_of_questions").attr('max', total_questions);
            $(".no_of_questions").val(current_questions);
            slider_fields_refresh();
            $(".assignment_quiz_type:checked").change();
            common_fields_check();
        });

        $('body').on('change', '.assignment_method_check', function (e) {
            var current_value = $(this).val();
            $(".assignment_method_check_fields").addClass('rurera-hide');
            $('.assignment_method_check_fields.' + current_value + '_fields').removeClass('rurera-hide');
        });
        $('body').on('change', '.questions-selection', function (e) {
            var no_of_selections = $(".questions-selection:checked").length;
            $(".max_questions").html('Max: ' + no_of_selections);
            $(".no_of_questions").attr('max', no_of_selections);
            $(".no_of_questions").attr('min', no_of_selections);
            $(".no_of_questions").val(no_of_selections);
            slider_fields_refresh();
        });




        $('body').on('change', '.no_of_attempts', function (e) {
            var no_of_attempts = $(this).val();
            $(".attempts-fields").addClass('rurera-hide');
            if(no_of_attempts > 1){
                $(".attempts-fields").removeClass('rurera-hide');
            }
        });

        $('body').on('change', '.vocabulary_type', function (e) {
            $(".year_quiz_ajax_select").change();
        });
        $('body').on('change', '.year_quiz_ajax_select', function (e) {
            var year_id = $(this).val();
            var user_id = $(".assignment-user-class:checked").val();
            var quiz_type = $(".assignemnet_types_selection:checked").val();
            if(quiz_type == 'tests'){
                var quiz_type = $(".test_types_selection:checked").val();
            }
            var vocabulary_type = '';
            if(quiz_type == 'vocabulary') {
                var vocabulary_type = $(".vocabulary_type:checked").val();
            }

            var thisObj = $(this);//$(".quiz-ajax-fields");
            $(".yeargroup-ajax-fields").html('');
            rurera_loader(thisObj, 'button');
            jQuery.ajax({
                type: "GET",
                url: '/common/types_quiz_by_year_admin',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {"quiz_type": quiz_type, "quiz_category": vocabulary_type, "year_id": year_id, "student_id": user_id},
                success: function (return_data) {
                    if (quiz_type == 'practice') {
                        $(".practice-quiz-ajax-fields").html(return_data);
                    } else {
                        $(".quiz-ajax-fields").html(return_data);
                    }
                    rurera_remove_loader(thisObj, 'button');
                }
            });
        });

        $('body').on('change', '.year_group_quiz_ajax_select', function (e) {
            var year_group = $(this).val();
            var quiz_type = $(".assignemnet_types_selection:checked").val();
            var thisObj = $(this);//$(".yeargroup-ajax-fields");
            $(".practice-quiz-ajax-fields").html('');
            $(".quiz-ajax-fields").html('');
            rurera_loader(thisObj, 'button');
            jQuery.ajax({
                type: "GET",
                url: '/admin/common/types_quiz_by_year_group',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {"quiz_type": quiz_type, "year_group": year_group},
                success: function (return_data) {
                    $(".yeargroup-ajax-fields").html(return_data);
                    rurera_remove_loader(thisObj, 'button');
                }
            });
        });

        $('body').on('change', '.assignment_subject_check', function (e) {
            var subject_id = $(this).val();
            var thisObj = $(this);
            var user_id = $(".assignment-user-class:checked").val();
            rurera_loader($(".practice-quiz-topics-list"), 'div');
            jQuery.ajax({
                type: "GET",
                url: '/common/topics_subtopics_by_subject_admin',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {"subject_id": subject_id, "student_id": user_id},
                success: function (return_data) {
                    //rurera_remove_loader($(".practice-quiz-topics-list"), 'button');
                    $(".practice-quiz-topics-list").html(return_data);
                    progress_cirlce_refresh();
                }
            });
        });

        var slider_fields_refresh = function () {
            $('.range-slider-field').each(function () {
                var thisObj = $(this);
                //var sliderStructure = $('<div class="range-slider"><div id="slider_thumb" class="range-slider_thumb" style="left: 425.5px;">0</div><div class="range-slider_line"><div id="slider_line" class="range-slider_line-fill" style="width: 46%;"></div></div>'+thisObj.clone().wrap('<div>').parent().html() +'</div>');
                //thisObj.replaceWith(sliderStructure);
                var sliderInput = thisObj;
                var sliderThumb = thisObj.closest('.range-slider').find('.range-slider_thumb');
                var sliderLine = thisObj.closest('.range-slider').find('.range-slider_line-fill');
                showSliderValue(sliderInput, sliderThumb, sliderLine);
                $(window).on("resize", function () {
                    showSliderValue(sliderInput, sliderThumb, sliderLine);
                });
                sliderInput.on('input', function () {
                    showSliderValue(sliderInput, sliderThumb, sliderLine);
                });
            });
        }
        slider_fields_refresh();


        function showSliderValue(sliderInput, sliderThumb, sliderLine) {
            var label_value = sliderInput.attr('data-label');
            label_value = (label_value != undefined && label_value != 'undefined') ? label_value : '';
            sliderThumb.html(sliderInput.val() + label_value);
            var max_value = sliderInput.attr('max');
            var current_percentage = (sliderInput.val() * 100 / max_value);
            var bulletPosition = sliderInput.val() / sliderInput.attr('max');
            var space = sliderInput.width() - sliderThumb.width();
            space = parseInt(space) + parseInt(20);
            var text_to_display = sliderInput.val();
            if (sliderInput.hasClass('time_interval')) {
                $(".time_interval_data").html(sliderInput.val() + ' Seconds, ' + formatTime(sliderInput.val(), 'm', 's'));
            }
            if (sliderInput.hasClass('practice_interval')) {
                $(".practice_interval_data").html(sliderInput.val() + ' Minutes, ' + formatTime(sliderInput.val(), 'h', 'm'));
            }

            sliderThumb.css('left', (bulletPosition * space) + 'px');
            sliderLine.css('width', current_percentage + '%');
        }

        function formatTime(seconds, label_1, label_2) {
            var minutes = Math.floor(seconds / 60);
            var remainingSeconds = seconds % 60;

            var formattedTime = "";

            if (minutes > 0) {
                formattedTime += minutes + label_1 + " ";
            }

            formattedTime += remainingSeconds + label_2;

            return formattedTime;
        }

        $('body').on('change', '.topic_selection', function (e) {
            var current_value = $(this).val();
            var total_questions = $(this).find('option[value="' + current_value + '"]').attr('data-total_questions');
            $(".max_questions").html('Max: ' + total_questions);
            $(".no_of_questions").attr('max', total_questions);
            //$( ".no_of_questions" ).val( $( "#slider-range-max" ).slider( "value" ) );
            $(".no_of_questions").val(0);




            var assignment_practice_type = $(".assignment_practice_type:checked").val();
            var assignment_topic_type_check = $(".assignemnet_types_selection:checked").val();
            if(assignment_practice_type == 'test' && assignment_topic_type_check == 'vocabulary'){
                rurera_loader($(".spell-questions-list"), 'div');
                jQuery.ajax({
                    type: "GET",
                    url: '/admin/common/spell_questions_list_by_quiz',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {"quiz_id": current_value},
                    success: function (return_data) {
                        rurera_remove_loader($(".spell-questions-list"), 'button');
                        $(".spell-questions-list").html(return_data);
                    }
                });
            }

        });

        $('body').on('change', '.topics_multi_selection', function (e) {

            var total_questions = 0;
            $('.topics_multi_selection:checked').each(function () {
                total_questions = parseInt(total_questions) + parseInt($(this).attr('data-total_questions'));
            });

            $(".max_questions").html('Max: ' + total_questions);
            $(".no_of_questions").attr('max', total_questions);
            //$( ".no_of_questions" ).val( $( "#slider-range-max" ).slider( "value" ) );
            $(".no_of_questions").val(0);
        });


        $(".conditional_check").change();
        $(".duration_conditional_check:checked").change();
        //$(".assignemnet_types_selection:checked").change();
        $(".assignment_method_check:checked").change();
        $(".year_quiz_ajax_select").change();
        $(".year_group_quiz_ajax_select").change();
        $(".assignment_quiz_type:checked").change();
        $(".assignment_type_check:checked").change();


        $('body').on('change', '.topic-section-parent', function (e) {
            let $this = $(this);
            let parent = $this.parent().closest('.section-box');
            let isChecked = e.target.checked;

            if (isChecked) {
                parent.find('input[type="checkbox"].section-child').prop('checked', true);
            } else {
                parent.find('input[type="checkbox"].section-child').prop('checked', false);
            }

            $(".topics_multi_selection").change();

        });

        $('body').on('submit', '.create-assignment-form', function (e) {
            var review_date = $(".reviewer-date").val();
            $(".assignment-reviewer-field").removeClass('rurera-req-field');
            $(".assignment-reviewer-field").removeClass('backend-field-error');
            if(review_date != ''){
                //$(".assignment-reviewer-field").addClass('rurera-req-field');
            }
        });


        $('body').on('apply.daterangepicker', '.practice-start-date', function (ev, picker) {
            $(".practice-due-date").attr('min', picker.startDate.format('YYYY-MM-DD'));
            $(".reviewer-date").attr('min', picker.startDate.format('YYYY-MM-DD'));
            resetRureraDatePickers();
        });

        $('body').on('apply.daterangepicker', '.practice-due-date', function (ev, picker) {
            $(".reviewer-date").attr('min', picker.startDate.format('YYYY-MM-DD'));
            resetRureraDatePickers();
        });


        $(".assignment_practice_type:checked").change();

    });

    var parents_classes = {
        freedom_mode_parent: 'timestables',
        powerup_mode_parent: 'timestables',
        trophy_mode_parent: 'timestables',
        treasure_mission_parent: 'timestables',
        showdown_mode_parent: 'timestables',
    };

    var conditional_parent_data = {


        practice_fields_array: [
            //'year_group_field',
            'no_of_questions_field',
            'courses_fields',
            'practice-quiz-topics-list',
            'no_of_attemptes_field',
        ],
        tests_fields_array: [
            'test_types_field',
            'vocabulary_list_data',
        ],
        sats_fields_array: [
            'sats_fields',
            //'year_group_field',
            'vocabulary_list_data',
            'no_of_attemptes_field',
        ],
        '11plus_fields_array': [
            '11plus_fields',
            //'year_group_field',
            'vocabulary_list_data',
            'no_of_attemptes_field',
        ],


        independent_exams_fields_array: [
            'independent_exams_fields',
            //'year_group_field',
            'vocabulary_list_data',
            'no_of_attemptes_field',
        ],

        iseb_fields_array: [
            'iseb_fields',
            //'year_group_field',
            'vocabulary_list_data',
            'no_of_attemptes_field',
        ],

        cat4_fields_array: [
            'cat4_fields',
            //'year_group_field',
            'vocabulary_list_data',
            'no_of_attemptes_field',
        ],



        timestables_fields_array: [
            'timestables_type_fields',
            'timestables_modes_selection',
            'timestables_heatmap',
        ],
        freedom_mode_fields_array: [
            'arthmetic_operations',
            'no_of_questions_field',
            'select_tables_field',
            'no_of_attemptes_field',
            'percentage_answer_field',
            'average_time_field',
        ],
        powerup_mode_fields_array: [
            'table_group_field',
            'practice_duration_field',
            'no_of_attemptes_field',
        ],
        trophy_mode_fields_array: [
            '',
        ],
        treasure_mission_fields_array: [
            'no_of_stages_field',
        ],
        showdown_mode_fields_array: [
            '',
        ],
        vocabulary_fields_array: [
            //'year_group_field',
            'vocabulary_list_data',
            'vocabulary_fields',
            'vocabulary_practice_type_field',
            'no_of_questions_field',
            'show_words_type_field',
            'no_of_attemptes_field',

        ],

        book_fields_array: [
            //'year_group_field',
            'no_of_books_field',

        ],
    };



    $('body').on('change', '.assignemnet_types_selection', function (e) {

        var current_selected_type = $(this).val();
        if( $(this).hasClass('subscription-modal')){
            return;
        }

        $(".rurera_common_hide_field").addClass('rurera-hide');




        var fields_to_show_array = conditional_parent_data[current_selected_type+'_fields_array'];
        $(fields_to_show_array).each(function (index, field_to_show) {
            $("."+field_to_show).removeClass('rurera-hide');
        });

        if(current_selected_type == 'timestables'){
            var user_id = $(".assignment-user-class:checked").val();
            var thisObj = $('.timestables_heatmap');
            $(".timestables_heatmap").html('');
            rurera_loader(thisObj, 'div');
            jQuery.ajax({
                type: "GET",
                url: '/timestable/get_heatmap_layout',
                data: {"user_id": user_id},
                success: function (return_data) {
                    rurera_remove_loader(thisObj, 'button');
                    $(".timestables_heatmap").html(return_data);
                }
            });



            if($(".sub_types_selection").length > 0){
                $('.sub_types_selection:checked').each(function () {
                    $(this).change()
                });
            }
        }


        $(".year_quiz_ajax_select").change();
    });

    $('body').on('change', '.test_types_selection', function (e) {
        $(".year_quiz_ajax_select").change();
    });

    $('body').on('change', '.sub_types_selection', function (e) {

        $(".rurera_common_hide_field").addClass('rurera-hide');

        var current_selected_type = $(this).val();

        var parents_class = parents_classes[current_selected_type+'_parent'];

        var show_classes = [];
        var fields_to_show_array = conditional_parent_data[parents_class+'_fields_array'];
        $(fields_to_show_array).each(function (index, field_to_show) {
            //show_classes.push(field_to_show);
            $("."+field_to_show).removeClass('rurera-hide');
        });

        var fields_to_show_array = conditional_parent_data[current_selected_type+'_fields_array'];
        $(fields_to_show_array).each(function (index, field_to_show) {
            $("."+field_to_show).removeClass('rurera-hide');
        });


    });

    $('body').on('change', '.assignment-user-class', function (e) {
        var year_id = $(this).attr('data-year_id');
        var timestables_no = $(this).data('timestables_no').toString().split(',').map(Number);
        console.log(timestables_no);
        $('input[name="ajax[new][tables_no][]"]').each(function () {
            var val = parseInt($(this).val(), 10);
            if ($.inArray(val, timestables_no) === -1) {
                $(this).closest('li').addClass('disable-timetable noselect');
            }
        });
        $('.year_quiz_ajax_select')
            .val(year_id)
            .trigger('change');
        var user_id = $(this).val();

        $('.user-permissions[data-user_id="'+user_id+'"]').each(function(){
            var data_type = $(this).attr('data-type');
            var is_permission = $(this).val();

            $('.assignemnet_types_selection[value="' + data_type + '"]').removeClass('disabled-style');
            $('.assignemnet_types_selection[value="' + data_type + '"]').removeClass('subscription-modal');
            $('.assignemnet_types_selection[value="' + data_type + '"]').attr('data-type', data_type);

            if( is_permission != true) {
                $('.assignemnet_types_selection[value="' + data_type + '"]').addClass('disabled-style');
                $('.assignemnet_types_selection[value="' + data_type + '"]').addClass('subscription-modal');
                $('.assignemnet_types_selection[value="' + data_type + '"]').attr('data-reason', 'module_access');
                $('.assignemnet_types_selection[value="' + data_type + '"]').attr('data-type', 'update_package_confirm');
                $('.assignemnet_types_selection[value="' + data_type + '"]').attr('data-id', user_id);
                $('.sats-listing-card tr[data-assignment_type="'+data_type+'"]').addClass('rurera-hide');
            }

        });

    });


    $(document).ready(function () {

        if ($(".assignemnet_types_selection").length > 0) {
            $('.assignemnet_types_selection:checked').each(function () {
                $(this).change()
            });
        }
        if ($(".assignment-user-class").length > 0) {
            $('.assignment-user-class:checked').each(function () {
                $(this).change()
            });
        }
    });




    function progress_cirlce_refresh(){
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
                        $this.find(".percent_text").text(Math.ceil(now));
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

    }

    $(document).on('click', '.heatmap-type', function (e) {
        var type_limit  = $(this).attr('data-type_limit');
        if( type_limit == 12){
            $(".above_12").hide();
        }
        if( type_limit == 20){
            $(".above_12").show();
        }
    });
</script>

@endpush
