<style>
    .hide-class {
        display: none;
    }

    .questions-list ul li {
        background: #efefef;
        margin-bottom: 10px;
        padding: 5px 10px;
    }

    .questions-list ul li a.parent-remove {
        float: right;
        margin: 8px 0 0 0;
        color: #ff0000;
    }

    .questions-block ul li {
        background: #efefef;
        margin: 5px 5px;
    }

    .question-select {
        background: #617fe9;
        color: #fff;
    }
    .card-header.inner-header{
        padding-left:45px;
    }
    .test_type_conditional_fields .card-body {
        padding-left: 60px;
    }
</style>
<link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
@php $subject_id = isset( $quiz->subject_id )? $quiz->subject_id : 0;
$quiz_id = isset( $quiz->id )? $quiz->id : 0;
 @endphp
<div data-action="{{ getAdminPanelUrl() }}/quizzes/{{ !empty($quiz) ? $quiz->id .'/update' : 'store' }}"
     class="js-content-form quiz-form webinar-form">
    {{ csrf_field() }}
    <section>

        <div class="row">
            <div class="col-12 col-md-12">


                <div class="d-flex align-items-center justify-content-between">
                    <div class="">
                        <h2 class="section-title">{{ !empty($quiz) ? (trans('public.edit').' ('. $quiz->title .')') :
                            trans('quiz.new_quiz') }}</h2>

                        @if(!empty($creator))
                        <p>{{ trans('admin/main.instructor') }}: {{ $creator->get_full_name() }}</p>
                        @endif
                    </div>
                </div>

                @if(!empty(getGeneralSettings('content_translate')))
                <div class="form-group">
                    <label class="input-label">{{ trans('auth.language') }}</label>
                    <select name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][locale]"
                            class="form-control {{ !empty($quiz) ? 'js-edit-content-locale' : '' }}">
                        @foreach($userLanguages as $lang => $language)
                        <option value="{{ $lang }}" @if(mb_strtolower(request()->get('locale', app()->getLocale())) ==
                            mb_strtolower($lang)) selected @endif>{{ $language }}
                        </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback"></div>
                </div>
                @else
                <input type="hidden" name="[{{ !empty($quiz) ? $quiz->id : 'new' }}][locale]"
                       value="{{ getDefaultLocale() }}">
                @endif

				@if(!isset($quiz->id))
					<div class="form-group mt-15 ">
						<label class="input-label d-block">Quiz Type</label>
						<select name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][quiz_type]"
								class="form-control quiz-type" data-placeholder="Select Quiz Type">
							<option value="practice" {{ (!empty($quiz) and $quiz->quiz_type == 'practice') ? 'selected' : ''
								}}>Practice
							</option>
							<option value="assessment" {{ (!empty($quiz) and $quiz->quiz_type == 'assessment') ? 'selected'
								: '' }}>Assessment
							</option>
							<option value="sats" {{ (!empty($quiz) and $quiz->quiz_type == 'sats') ? 'selected' : ''
								}}>SATs
							</option>
							<option value="11plus" {{ (!empty($quiz) and $quiz->quiz_type == '11plus') ? 'selected' : ''
								}}>11 Plus
							</option>
							<option value="independent_exams" {{ (!empty($quiz) and $quiz->quiz_type == 'independent_exams') ? 'selected' : ''}}>Independent Exams</option>
							<option value="iseb" {{ (!empty($quiz) and $quiz->quiz_type == 'iseb') ? 'selected' : ''}}>ISEB</option>
							<option value="cat4" {{ (!empty($quiz) and $quiz->quiz_type == 'cat4') ? 'selected' : ''}}>CAT 4</option>
							<option value="challenge" {{ (!empty($quiz) and $quiz->quiz_type == 'challenge') ? 'selected' : ''
								}}>Challenge
							</option>
							<option value="vocabulary" {{ (!empty($quiz) and $quiz->quiz_type == 'vocabulary') ? 'selected' : ''
								}}>Vocabulary
							</option>
						</select>
					</div>
				@endif

                <div class="form-group">
                    <label class="input-label">Quiz Title</label>
                    <input type="text" name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][title]"
                           value="{{ !empty($quiz) ? $quiz->title : old('title') }}" class="js-ajax-title form-control "
                           placeholder=""/>
                    <div class="invalid-feedback"></div>
                </div>

                <div class="form-group">
                    <label class="input-label">Quiz Slug</label>
                    <input type="text" name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][quiz_slug]"
                           value="{{ !empty($quiz) ? $quiz->quiz_slug : old('quiz_slug') }}" class="form-control "
                           placeholder=""/>
                    <div class="invalid-feedback"></div>
                </div>

				@if(!isset($quiz->id))
                <div class="conditional-fields sats-fields 11plus-fields independent_exams-fields iseb-fields cat4-fields">
                    <div class="form-group mt-15 ">
                        <label class="input-label d-block">Type</label>
                        <select name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][mock_type]"
                                class="form-control mock_type" data-placeholder="Select Type">
                            <option value="mock_practice" {{ (!empty($quiz) and ($quiz->mock_type == 'mock_practice' || $quiz->mock_practice == ''))
                                ? 'selected'
                                : ''
                                }}>Practice
                            </option>
                            <option value="mock_exam" {{ (!empty($quiz) and $quiz->mock_type == 'mock_exam') ?
                                'selected'
                                : '' }}>Mock Exam
                            </option>


                        </select>
                    </div>
                </div>
				@endif

                <div class="conditional-fields vocabulary-fields">
                    <div class="form-group mt-15 ">
                        <label class="input-label d-block">Treasure</label>
                        <select name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][treasure_after]"
                                class="form-control" data-placeholder="Select Topic Size">
                            <option value="no_treasure" {{ (!empty($quiz) and $quiz->treasure_after == 'no_treasure') ? 'selected' : ''
                                }}>No Treasure
                            </option>
                            <option value="after_easy" {{ (!empty($quiz) and $quiz->treasure_after == 'after_easy') ? 'selected'
                                : '' }}>After Easy
                            </option>
                            <option value="after_medium" {{ (!empty($quiz) and $quiz->treasure_after == 'after_medium') ? 'selected' : ''
                                }}>After Medium
                            </option>
                            <option value="after_hard" {{ (!empty($quiz) and $quiz->treasure_after == 'after_hard') ? 'selected' : ''
                                }}>After Hard
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="input-label">Treasure Coins</label>
                        <input type="number"
                               value="{{ !empty($quiz) ? $quiz->treasure_coins : old('treasure_coins') }}"
                               name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][treasure_coins]"
                               class="form-control @error('treasure_coins')  is-invalid @enderror"
                               placeholder=""/>
                    </div>
                </div>

				@if(!isset($quiz->id))
					<div class="form-group">
						<label>{{ trans('/admin/main.category')  }}</label>
						<select class="form-control @error('category_id') is-invalid @enderror ajax-category-courses" name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][year_id]" data-course_id="{{isset( $TopicParts->subject_id )? $TopicParts->subject_id : 0}}">
							<option {{ !empty($trend) ? '' : 'selected' }} disabled>{{ trans('admin/main.choose_category')  }}</option>

							@foreach($categories as $category)
								@if(!empty($category->subCategories) and count($category->subCategories))
									<optgroup label="{{  $category->title }}">
										@foreach($category->subCategories as $subCategory)
											<option value="{{ $subCategory->id }}" @if(!empty($TopicParts) and $TopicParts->category_id == $subCategory->id) selected="selected" @endif>{{ $subCategory->title }}</option>
										@endforeach
									</optgroup>
								@else
									<option value="{{ $category->id }}" class="font-weight-bold" @if(!empty($TopicParts) and $TopicParts->category_id == $category->id) selected="selected" @endif>{{ $category->title }}</option>
								@endif
							@endforeach
						</select>
						@error('category_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>

					<div class="form-group">
						<label>Subjects</label>
						<select data-return_type="option"
								data-default_id="{{isset( $TopicParts->subject_id)? $TopicParts->subject_id : 0}}" data-chapter_id="{{isset( $TopicParts->chapter_id )? $TopicParts->chapter_id : 0}}"
								class="ajax-courses-dropdown year_subjects form-control select2 @error('subject_id') is-invalid @enderror"
								id="subject_id" name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][subject_id]">
							<option disabled selected>Subject</option>
						</select>
						@error('subject_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>

					<div class="form-group">
						<label class="input-label">Topic</label>
						<select data-sub_chapter_id="{{isset( $TopicParts->sub_chapter_id ) ? $TopicParts->sub_chapter_id : 0}}" id="chapter_id"
								class="form-control populate ajax-chapter-dropdown @error('chapter_id') is-invalid @enderror"
								name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][chapter_id]" data-disabled="{{isset($already_created_subtopics)? json_encode($already_created_subtopics) : ''}}">
							<option value="">Please select year, subject</option>
						</select>
						@error('chapter_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>


					<div class="form-group">
						<label class="input-label">Sub Topic</label>
						<select id="chapter_id"
							class="form-control populate ajax-subchapter-dropdown @error('sub_chapter_id') is-invalid @enderror"
							name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][sub_chapter_id]" >
						<option value="">Please select year, subject, Topic</option>
						</select>
						@error('sub_chapter_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror

					</div>

					<div class="form-group">
						<label class="input-label">Topic Part Item</label>
						<select id="topic_part_item_id"
							class="form-control populate ajax-topicpart-item-dropdown @error('topic_part_item_id') is-invalid @enderror"
							name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][topic_part_item_id]" >
						<option value="">Please select year, subject, Topic, Sub Topic</option>
						</select>
						@error('topic_part_item_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror

					<p>The disable Topic Part has already been created and cannot be created again.</p>
					</div>

					<div class="no-of-questions-field rurera-hide">
						<div class="form-group">
							<label class="input-label">No of Questions</label>
							<input type="number" value="{{ !empty($quiz) ? $quiz->no_of_questions : old('no_of_questions') }}"
								   name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][no_of_questions]"
								   class="form-control @error('no_of_questions')  is-invalid @enderror" placeholder=""/>
						</div>
					</div>
				@endif


                <div class="conditional-fields vocabulary-fields ">
                    <div class="form-group mt-15 ">
                        <label class="input-label d-block">Vocabulary Category</label>
                        <select name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][quiz_category]"
                                class="form-control" data-placeholder="Select Year Group">
                            <option value="Word Lists" {{ (!empty($quiz) and ($quiz->quiz_category == 'Word Lists' || $quiz->quiz_category == ''))
                                ? 'selected'
                                : ''
                                }}>Word Lists
                            </option>
                            <option value="Spelling Bee" {{ (!empty($quiz) and $quiz->quiz_category == 'Spelling Bee') ?
                                'selected'
                                : '' }}>Spelling Bee
                            </option>

                            <option value="Syllabus" {{ (!empty($quiz) and $quiz->quiz_category == 'Syllabus') ?
                                'selected'
                                : '' }}>Syllabus
                            </option>

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="input-label">Quiz Instructions</label>
                    <textarea rows="7" name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][quiz_instructions]"
                              class="summernote form-control ">{{ !empty($quiz) ? $quiz->quiz_instructions : old('quiz_instructions') }}</textarea>
                    <div class="invalid-feedback"></div>
                </div>

                <div class="form-group">
                    <label class="input-label">Quiz Image</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="button" class="input-group-text admin-file-manager" data-input="quiz_image"
                                    data-preview="holder">
                                <i class="fa fa-upload"></i>
                            </button>
                        </div>
                        <input type="text" name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][quiz_image]"
                               id="quiz_image"
                               value="{{ !empty($quiz) ? $quiz->quiz_image : old('quiz_image') }}"
                               class="form-control @error('quiz_image')  is-invalid @enderror"/>
                        <div class="input-group-append">
                            <button type="button" class="input-group-text admin-file-view" data-input="quiz_image">
                                <i class="fa fa-eye"></i>
                            </button>
                        </div>
                        @error('quiz_image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="input-label">Quiz PDF</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="button" class="input-group-text admin-file-manager"
                                    data-input="quiz_pdf"
                                    data-preview="holder">
                                <i class="fa fa-upload"></i>
                            </button>
                        </div>
                        <input type="text" name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][quiz_pdf]" id="quiz_pdf"
                               value="{{ !empty($quiz) ? $quiz->quiz_pdf : old('quiz_pdf') }}"
                               class="form-control @error('quiz_pdf')  is-invalid @enderror"/>
                        @error('quiz_pdf')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label class="input-label">Mastery Points</label>
                    <input type="number" value="{{ !empty($quiz) ? $quiz->mastery_points : old('mastery_points') }}"
                           name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][mastery_points]"
                           class="form-control @error('mastery_points')  is-invalid @enderror" placeholder=""/>
                </div>

                @php
                $assessment_hide_class = (!empty($quiz ) && $quiz->quiz_type != 'assessment')? 'hide-class' : '';
                $practice_hide_class = (empty($quiz ) || $quiz->quiz_type == 'practice')? '' : 'hide-class';
                $sats_hide_class = (empty($quiz ) || $quiz->quiz_type == 'sats')? '' : 'hide-class';
                $eleven_plus_hide_class = (empty($quiz ) || $quiz->quiz_type == '11plus')? 'hide-class' : '';
                @endphp

                <div class="conditional-fields sats-fields 11plus-fields {{$sats_hide_class}}">
                    <div class="form-group">
                        <label class="input-label">Quiz Sub Title</label>
                        <input type="text" name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][sub_title]"
                               value="{{ !empty($quiz) ? $quiz->sub_title : old('sub_title') }}" class="form-control "
                               placeholder=""/>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>

                <div class="conditional-fields 11plus-fields independent_exams-fields iseb-fields cat4-fields {{$eleven_plus_hide_class}}">


                    <div class="form-group mt-15 ">
                        <label class="input-label d-block">Year Group</label>
                        <select name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][year_group]"
                                class="form-control" data-placeholder="Select Year Group">
                            <option value="All" {{ (!empty($quiz) and ($quiz->year_group == 'All' || $quiz->year_group
                                == '')) ? 'selected'
                                : ''
                                }}>All
                            </option>
                            <option value="Year 3" {{ (!empty($quiz) and $quiz->year_group == 'Year 3') ?
                                'selected'
                                : '' }}>Year 3
                            </option>

                            <option value="Year 4" {{ (!empty($quiz) and $quiz->year_group == 'Year 4') ?
                                'selected'
                                : '' }}>Year 4
                            </option>

                            <option value="Year 5" {{ (!empty($quiz) and $quiz->year_group == 'Year 5') ?
                                'selected'
                                : '' }}>Year 5
                            </option>

                            <option value="Year 6" {{ (!empty($quiz) and $quiz->year_group == 'Year 6') ?
                                'selected'
                                : '' }}>Year 6
                            </option>
                        </select>
                    </div>

                    <div class="form-group mt-15 ">
                        <label class="input-label d-block">Subject</label>
                        <select name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][subject]"
                                class="form-control" data-placeholder="Select Year Group">
                            <option value="All" {{ (!empty($quiz) and ($quiz->subject == 'All' || $quiz->subject == ''))
                                ? 'selected'
                                : ''
                                }}>All
                            </option>
                            <option value="English" {{ (!empty($quiz) and $quiz->subject == 'English') ?
                                'selected'
                                : '' }}>English
                            </option>
                            <option value="Math" {{ (!empty($quiz) and $quiz->subject == 'Math') ?
                                'selected'
                                : '' }}>Math
                            </option>

                            <option value="Non-Verbal Reasoning" {{ (!empty($quiz) and $quiz->subject == 'Non-Verbal
                                Reasoning') ?
                                'selected'
                                : '' }}>Non-Verbal Reasoning
                            </option>

                            <option value="Verbal Reasoning" {{ (!empty($quiz) and $quiz->subject == 'Verbal Reasoning')
                                ?
                                'selected'
                                : '' }}>Verbal Reasoning
                            </option>

                        </select>
                    </div>

                    <div class="form-group mt-15 ">
                        <label class="input-label d-block">Exam Board</label>
                        <select name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][examp_board]"
                                class="form-control" data-placeholder="Select Year Group">
                            <option value="All" {{ (!empty($quiz) and ($quiz->examp_board == 'All' || $quiz->examp_board == ''))
                                ? 'selected'
                                : ''
                                }}>All
                            </option>
                            <option value="GL" {{ (!empty($quiz) and $quiz->examp_board == 'GL') ?
                                'selected'
                                : '' }}>GL
                            </option>

                            <option value="CEM" {{ (!empty($quiz) and $quiz->examp_board == 'CEM') ?
                                'selected'
                                : '' }}>CEM
                            </option>

                        </select>
                    </div>

                </div>
				<div class="form-group">
					<label class="input-label">Target Score</label>
					<input type="number" value="{{ !empty($quiz) ? $quiz->target_score : old('target_score') }}"
						   name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][target_score]"
						   class="form-control @error('target_score')  is-invalid @enderror" max="100" placeholder=""/>
				</div>
                <div class="conditional-fields sats-fields 11plus-fields assessment-fields {{$assessment_hide_class}}">
                    <div class="form-group">
                        <label class="input-label">No of Attempts</label>
                        <input type="number" value="{{ !empty($quiz) ? $quiz->attempt : old('attempt') }}"
                               name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][attempt]"
                               class="form-control @error('attempt')  is-invalid @enderror" placeholder=""/>
                    </div>
                    <div class="form-group">
                        <label class="input-label">Total Time</label>
                        <input type="number" value="{{ !empty($quiz) ? $quiz->time : old('time') }}"
                               name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][time]"
                               class="form-control @error('time')  is-invalid @enderror" placeholder=""/>
                    </div>
                </div>
                <div class="conditional-fields assessment-fields {{$assessment_hide_class}}">
                    <div class="form-group">
                        <label class="input-label">Display no of Questions</label>
                        <input type="number"
                               value="{{ !empty($quiz) ? $quiz->display_number_of_questions : old('display_number_of_questions') }}"
                               name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][display_number_of_questions]"
                               class="form-control @error('display_number_of_questions')  is-invalid @enderror"
                               placeholder=""/>
                    </div>
                </div>

                <div class="conditional-fields practice-fields {{$practice_hide_class}}">

                    <div class="form-group mt-15 ">
                            <label class="input-label d-block">Topic Size</label>
                            <select name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][quiz_size]"
                                    class="form-control" data-placeholder="Select Topic Size">
                                <option value="Large" {{ (!empty($quiz) and $quiz->quiz_size == 'Large') ? 'selected' : ''
                                    }}>Large
                                </option>
                                <option value="Medium" {{ (!empty($quiz) and $quiz->quiz_size == 'Medium') ? 'selected'
                                    : '' }}>Medium
                                </option>
                                <option value="Small" {{ (!empty($quiz) and $quiz->quiz_size == 'Small') ? 'selected' : ''
                                    }}>Small
                                </option>
                                <option value="X-Small" {{ (!empty($quiz) and $quiz->quiz_size == 'X-Small') ? 'selected' : ''
                                    }}>X-Small
                                </option>
                            </select>
                        </div>

                    @php
                    $quiz_settings = array();
                    if( isset( $quiz->quiz_settings ) ){
                    $quiz_settings = $quiz->quiz_settings;
                    $quiz_settings = json_decode($quiz_settings, true);
                    }
                    @endphp

					@if(!empty( $difficulty_levels))
						@foreach($difficulty_levels as $difficulty_level_key => $difficulty_level_label)

							@php $target_percentage = isset( $quiz_settings[$difficulty_level_key]['target_percentage'] )? $quiz_settings[$difficulty_level_key]['target_percentage'] : 0; @endphp
							@php $questions_types_selected = isset( $quiz_settings[$difficulty_level_key]['question_types'] )? $quiz_settings[$difficulty_level_key]['question_types'] : array(); @endphp
							<div class="row">
								<div class="col-12 col-md-12">
									<h4>{{$difficulty_level_label}}</h4>
								</div>
								<div class="col-6 col-md-6">
									<div class="form-group mt-15 ">
										<label class="input-label d-block">Question Types</label>
										<select name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][quiz_settings][{{$difficulty_level_key}}][question_types][]"
												class="form-control select2" data-placeholder="Select Question Types" multiple>
												@if(!empty($questions_types))
													@foreach($questions_types as $question_type_key => $question_type_level)
														<option value="{{$question_type_key}}" {{in_array($question_type_key, $questions_types_selected) ? 'selected' : ''}}>{{$question_type_level}}</option>
													@endforeach
												@endif
										</select>
									</div>
								</div>
								<div class="col-6 col-md-6">
									<div class="form-group mt-15">
										<label class="input-label d-block">Target Percentage</label>
										<input type="number" value="{{$target_percentage}}"
											   name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][quiz_settings][{{$difficulty_level_key}}][target_percentage]"
											   class="form-control @error('target_percentage')  is-invalid @enderror" max="100" placeholder=""/>
									</div>
								</div>
							</div>
						@endforeach
					@endif

                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label class="input-label">Incorrect Attempts</label>
                                <input type="number"
                                       value="{{isset( $quiz_settings['Exceeding']->incorrect_attempts)? $quiz_settings['Exceeding']->incorrect_attempts : 0}}"
                                       name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][incorrect_attempts]"
                                       class="form-control" placeholder=""/>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label class="input-label">Excess Time Taken</label>
                                <input type="number"
                                       value="{{isset( $quiz_settings['Exceeding']->excess_time_taken)? $quiz_settings['Exceeding']->excess_time_taken : 0}}"
                                       name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][excess_time_taken]"
                                       class="form-control @error('title')  is-invalid @enderror" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="form-group mt-15 search-questions-block conditional-fields sats-fields 11plus-fields independent_exams-fields iseb-fields cat4-fields">
                    <label class="input-label d-block">Questions</label>

                    <select id="questions_ids" multiple="multiple" data-search-option="questions_ids"
                            class="form-control search-questions-select2" data-placeholder="Search Question"></select>
                </div>

                <div class="questions-block">
                    <ul>
                    </ul>
                </div>


                <div class="questions-list conditional-fields sats-fields 11plus-fields independent_exams-fields iseb-fields cat4-fields">
                    <ul>
                        @if( !empty( $quiz->quizQuestionsList))
                        @foreach( $quiz->quizQuestionsList as $questionObj)
                        @if( !empty( $questionObj->QuestionData))
                        @foreach( $questionObj->QuestionData as $questionDataObj)
                        <li data-id="{{$questionDataObj->id}}" data-question_type="{{$questionDataObj->question_type}}">{{$questionDataObj->getTitleAttribute()}} <input
                                    type="hidden" name="ajax[{{ !empty($quiz) ? $quiz->id : 'new'
                                                           }}][question_list_ids][]"
                                    value="{{$questionDataObj->id}}">
                            <a href="javascript:;" class="parent-remove"><span class="fas fa-trash"></span></a>
                        </li>
                        @endforeach
                        @endif
                        @endforeach
                        @endif

                    </ul>
                </div>

                <div class="form-group custom-switches-stacked">
                    <label class="custom-switch pl-0">
                        <input type="hidden" name="show_all_questions" value="disable">
                        <input type="checkbox" name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][show_all_questions]"
                               id="show_all_questions" value="1" {{
                               (!empty($quiz) and $quiz->show_all_questions == '1') ? 'checked="checked"' : ''
                        }} class="custom-switch-input"/>
                        <span class="custom-switch-indicator"></span>
                        <label class="custom-switch-description mb-0 cursor-pointer"
                               for="show_all_questions">Show All Questions</label>
                    </label>
                </div>

            </div>
        </div>
    </section>


    <input type="hidden" name="ajax[{{ !empty($quiz) ? $quiz->id : 'new' }}][is_webinar_page]"
           value="@if(!empty($inWebinarPage) and $inWebinarPage) 1 @else 0 @endif">

    <div class="mt-20 mb-20">
        <button type="button" class="js-submit-quiz-form btn btn-sm btn-primary">{{ !empty($quiz) ?
            trans('public.save_change') : trans('public.create') }}
        </button>

        @if(empty($quiz) and !empty($inWebinarPage))
        <button type="button" class="btn btn-sm btn-danger ml-10 cancel-accordion">{{ trans('public.close') }}</button>
        @endif
    </div>
</div>

@if(!empty($quiz))
@include('admin.quizzes.modals.multiple_question')
@include('admin.quizzes.modals.descriptive_question')
@endif
@push('scripts_bottom')
@php
$quiz_add_edit = !empty($quiz) ? $quiz->id : 'new';
@endphp
<script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
<script src="/assets/vendors/summernote/summernote-table-headers.js"></script>



<script type="text/javascript">

    $(document).ready(function () {
		$(document).on('change', '.ajax-category-courses', function () {
			var category_id = $(this).val();
			var course_id = $(this).attr('data-course_id');
			$.ajax({
				type: "GET",
				url: '/admin/webinars/courses_by_categories',
				data: {'category_id': category_id, 'course_id': course_id},
				success: function (return_data) {
					$(".ajax-courses-dropdown").html(return_data);
					$(".ajax-chapter-dropdown").html('<option value="">Please select year, subject</option>');
					$('.ajax-courses-dropdown').change();
				}
			});
		});

		$(document).on('change', '.ajax-courses-dropdown', function () {
			var course_id = $(this).val();
			var chapter_id = $(this).attr('data-chapter_id');

			$.ajax({
				type: "GET",
				url: '/admin/webinars/chapters_by_course',
				data: {'course_id': course_id, 'chapter_id': chapter_id},
				success: function (return_data) {
					$(".ajax-chapter-dropdown").html(return_data);
					$('.ajax-chapter-dropdown').change();
				}
			});
		});
		$(document).on('change', '.ajax-chapter-dropdown', function () {
			var chapter_id = $(this).val();
			var sub_chapter_id = $(this).attr('data-sub_chapter_id');
			var disabled_items = $(this).attr('data-disabled');
			$.ajax({
				type: "GET",
				url: '/admin/webinars/sub_chapters_by_chapter',
				data: {'chapter_id': chapter_id, 'sub_chapter_id': sub_chapter_id, 'disabled_items': disabled_items},
				success: function (return_data) {
					$(".ajax-subchapter-dropdown").html(return_data);
				}
			});
		});
		$(document).on('change', '.ajax-subchapter-dropdown', function () {
			var subchapter_id = $(this).val();
			var sub_chapter_id = $(this).attr('data-sub_chapter_id');
			var disabled_items = $(this).attr('data-disabled');
			$.ajax({
				type: "GET",
				url: '/admin/webinars/topic_part_item_by_sub_chapter',
				data: {'subchapter_id': subchapter_id},
				success: function (return_data) {
					$(".ajax-topicpart-item-dropdown").html(return_data);
					console.log(return_data);
				}
			});
		});
        $(".ajax-category-courses").change();

    });
</script>

<script type="text/javascript">
    $(document).ready(function () {


        handleQuestionsMultiSelect2('search-questions-select2', '/admin/questions_bank/search', ['class', 'course', 'subject', 'title']);


		$('body').on('change', '.mock_type', function (e) {
			var mock_type = $(this).val();
			$(".search-questions-block").removeClass('rurera-hide');
			if( mock_type == 'mock_practice') {
				$(".search-questions-block").addClass('rurera-hide');
			}
		});
		$(".mock_type:checked").change();


		$(document).on('change', '.pick_auto_switch', function (e) {
			let isChecked = e.target.checked;
			if(isChecked){
				$(".mock-exams-quiz-settings").addClass('rurera-hide');
				$(".no-of-questions-field").removeClass('rurera-hide');
			}else{
				$(".mock-exams-quiz-settings").removeClass('rurera-hide');
				$(".no-of-questions-field").addClass('rurera-hide');
			}
        });


        $(document).on('change', '.quiz-type', function (e) {
            var quiz_type = $(this).val();
            $(".conditional-fields").addClass('hide-class');
            $('.' + quiz_type + "-fields").removeClass('hide-class');
        });
        $(document).on('change', '.test_type_field', function (e) {
           var test_type = $(this).val();
           $(".test_type_conditional_fields").addClass('hide-class');
           $('.test_type_conditional_fields.' + test_type + "-fields").removeClass('hide-class');
       });


        $(".quiz-type").change();
        $(".test_type_field").change();

        $(document).on('change', '.search-questions-select2', function (e) {
            var field_value = $(this).val();
            var field_label = $(this).text();
            $(".questions-list ul").append('<li data-id="' + field_value + '">' + field_label + '  <input type="hidden" name="ajax[{{ $quiz_add_edit }}][question_list_ids][]" ' +
                'value="' + field_value + '"><a href="javascript:;"' +
                ' ' +
                'class="parent-remove"><span class="fas ' +
                'fa-trash"></span></a></li>');
            $(".questions-list ul").sortable();
            $(this).html('');
        });


        $(document).on('click', '.questions-block ul li .question-select', function (e) {
            var field_value = $(this).closest('li').attr('data-id');
            var question_type = $(this).closest('li').attr('data-question_type');
            var field_label = $(this).closest('li').find('.question-title').html();
            $(".questions-list ul").append('<li data-id="' + field_value + '" data-question_type="' + question_type + '">' + field_label + '  <input type="hidden" name="ajax[{{ $quiz_add_edit }}][question_list_ids][]" ' +
                'value="' + field_value + '"><a href="javascript:;"' +
                ' ' +
                'class="parent-remove"><span class="fas ' +
                'fa-trash"></span></a></li>');
            $(this).closest('li').remove();
            $(".questions-list ul").sortable();
            update_total_questions();
        });

        $(".questions-list ul").sortable();
    });
</script>
@endpush
