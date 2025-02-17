@extends('admin.layouts.app')

@push('styles_top')
    <link href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
    <link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
@endpush


@section('content')
    <section class="section upload-path-rurera" data-location="topic_parts/{{isset( $TopicParts->id )? $TopicParts->id : 0}}">
        <div class="section-header">
            <h1>Prompt Generator</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/admin/">{{ trans('admin/main.dashboard') }}</a>
                </div>
                <div class="breadcrumb-item active"><a href="/admin/questions-generator/prompt_generator">Prompt Generator</a>
                </div>
                <div class="breadcrumb-item">Update</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
			
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="topic-parts-form" action="/admin/questions-generator/prompt_generator_submit"
                                  method="Post">
                                {{ csrf_field() }}
								
								
								<div class="row">
								<div class="col-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label>{{ trans('/admin/main.category')  }}</label>
										<select class="form-control @error('category_id') is-invalid @enderror ajax-category-courses" name="category_id" data-course_id="{{isset( $TopicParts->subject_id )? $TopicParts->subject_id : 0}}">
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
												id="subject_id" name="subject_id">
											<option disabled selected>Subject</option>
										</select>
										@error('subject_id')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
										@enderror
									</div>
									
									<div class="form-group custom-switches-stacked">
										<label class="custom-switch pl-0">
											<input type="hidden" name="generate_new_prompt_field" value="disable">
											<input type="checkbox" name="generate_new_prompt" id="generate_new_prompt" value="1" class="custom-switch-input"/>
												<span class="custom-switch-indicator"></span>
												<label class="custom-switch-description mb-0 cursor-pointer" for="generate_new_prompt"><span>Generate New Prompt</span></label>
										</label>
									</div>
									
									<div class="form-group custom-switches-stacked">
										<label class="custom-switch pl-0">
											<input type="hidden" name="generate_for_all_field" value="disable">
											<input type="checkbox" name="generate_for_all" id="generate_for_all" value="1" class="custom-switch-input"/>
												<span class="custom-switch-indicator"></span>
												<label class="custom-switch-description mb-0 cursor-pointer" for="generate_for_all"><span>Generate for All (with Questions also)</span></label>
										</label>
									</div>
									
									<div class="form-group">
										<!-- Grade Selection -->
										<input type="hidden" name="grade" id="grade1" value="7">
										<!-- Question Type -->
										<label>Question Type:</label>
										<div class="list-group list-in-row">
											<div class="row-field">
												<input type="radio" name="question_type" data-condition_key="question_type" class="conditional-parent" id="type_mc" value="multiple-choice" checked>
												<label for="type_mc">Multiple Choice</label>
											</div>
											<div class="row-field">
												<input type="radio" name="question_type" data-condition_key="question_type" class="conditional-parent" id="inner_dropdown" value="inner_dropdown">
												<label for="inner_dropdown">Inner Dropdown</label>
											</div>
											<div class="row-field">
												<input type="radio" name="question_type" data-condition_key="question_type" class="conditional-parent" id="inner_input" value="inner_input">
												<label for="inner_input">Inner Input</label>
											</div>
											
											<div class="row-field">
												<input type="radio" name="question_type" data-condition_key="question_type" class="conditional-parent" id="type_tf" value="true-false">
												<label for="type_tf">True or False</label>
											</div>
											<div class="row-field">
												<input type="radio" name="question_type" data-condition_key="question_type" class="conditional-parent" id="type_oq" value="open-question">
												<label for="type_oq">Open Question</label>
											</div>
											<div class="row-field">
												<input type="radio" name="question_type" data-condition_key="question_type" class="conditional-parent" id="type_fill" value="fill-in-the-blank">
												<label for="type_fill">Fill in the Blank</label>
											</div>
											<div class="row-field">
												<input type="radio" name="question_type" data-condition_key="question_type" class="conditional-parent" id="type_match" value="matching">
												<label for="type_match">Matching</label>
											</div>
										</div>
									</div>
									<div class="form-group custom-switches-stacked">
										<label>Prompts Title</label>
										<input type="text" class="form-control" name="prompt_title">
									</div>
									
									<span>
									<a href="javascript:;" class="copyable-text">[YEAR_GROUP]</a> 
									<a href="javascript:;" class="copyable-text">[TOPIC_PART]</a> 
									<a href="javascript:;" class="copyable-text">[TOPIC_PART_DESCRIPTION]</a> 
									<a href="javascript:;" class="copyable-text">[SUBJECT]</a>
									<a href="javascript:;" class="copyable-text">[SUB_CHAPTER_TITLE]</a>
									
									</span>
									<div class="form-group custom-switches-stacked">
										<label>Prompt</label>
										<textarea name="prompt_txt" class="form-control" rows="20"></textarea>
									</div>
                                </div>
							
								</div>

								<div class="text-left">
									<button class="btn btn-primary">Generate Prompt</button>
								</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts_bottom')
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
        $(".ajax-category-courses").change();
		
    });
	
	
</script>
@endpush
