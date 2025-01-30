@php use App\Models\QuizzesQuestion; @endphp
@extends('admin.layouts.app')

@push('libraries_top')

<style>
.table-responsive {
    max-height: 800px;
    overflow-y: auto; 
}
.freeze-row th {
    position: sticky;
    top: 0;
    z-index: 10;
	 background-color: #fafafa;
}
.freeze-cols {
	 left: 0;
    position: sticky;
    z-index: 9; 
	 background-color: #fafafa;
}
.scrolled{position:fixed !important;}
.top-row {
    z-index: 11 !important; 
}
.col-1 {
    left: 0;
}
.col-2 {
    left: 80px;
}
.col-3 {
    left: 200px;
}
.col-4 {
    left: 300px;
}
.topic-tr {
    background: #c7c7c7;
}

.subtopic-tr {
    background: #ededed;
}

.part-tr {
    background: #f7f7f7;
}
</style>
<style>
        .show_hide_table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .show_hide_table th, .show_hide_table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .show_hide_table th {
            background-color: #f2f2f2;
        }
        .show_hide_table .normal {
            color: grey;
            text-decoration: none;
            cursor: pointer;
        }
        .show_hide_table .active {
            color: blue;
            text-decoration: underline;
            cursor: pointer;
        }
        .show_hide_table .reset, .show_hide_table .remove-all {
            color: blue;
            cursor: pointer;
            margin-top: 8px;
            display: block;
        }
    </style>
	<style>
	
	.defined-searches {
		background: #efefef;
		padding: 10px;
	}
	.defined-searches .apply-template-field {
		margin-right: 10px;
		display: inline-block;
	}

	.save-template {
		float: right;
	}
</style>
@endpush

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Parts Questions Report</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/admin/">{{trans('admin/main.dashboard')}}</a>
            </div>
            <div class="breadcrumb-item">Parts Questions Report</div>
        </div>
    </div>


    <div class="section-body">

        <section class="card">
            <div class="card-body">
                <form action="/admin/reports/topics_sub_parts_questions" id="sub_parts_questions_report_search_form" method="get" class="row mb-0">

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label">{{trans('admin/main.category')}}</label>
                            <select name="category_id" data-plugin-selectTwo class="form-control populate ajax-category-courses" data-course_id="{{$subject_id}}">
                                <option value="">{{trans('admin/main.all_categories')}}</option>
                                @foreach($categories as $category)
                                @if(!empty($category->subCategories) and count($category->subCategories))
                                <optgroup label="{{  $category->title }}">
                                    @foreach($category->subCategories as $subCategory)
                                    <option value="{{ $subCategory->id }}" @if($category_id == $subCategory->id) selected="selected" @endif>{{ $subCategory->title }}</option>
                                    @endforeach
                                </optgroup>
                                @else
                                <option value="{{ $category->id }}" @if($category_id == $category->id) selected="selected" @endif>{{ $category->title }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

					<div class="col-md-2">
					<div class="form-group">
						<label>Subjects</label>
						<select data-return_type="option"
								data-default_id="{{request()->get('subject_id')}}" data-chapter_id="{{get_filter_request('chapter_id', 'sub_parts_questions_report')}}"
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
					</div>
					
					
					<div class="col-md-2">
					<div class="form-group">
						<label class="input-label">Topic</label>
						<select data-sub_chapter_id="{{get_filter_request('sub_chapter_id', 'sub_parts_questions_report')}}" id="chapter_id"
								class="form-control populate ajax-chapter-dropdown @error('chapter_id') is-invalid @enderror"
								name="chapter_id">
							<option value="">Please select year, subject</option>
						</select>
						@error('chapter_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror

					</div>
					</div>
					
					
					<div class="col-md-2">
					<div class="form-group">
						<label class="input-label">Sub Topic</label>
						<select id="chapter_id"
							class="form-control populate ajax-subchapter-dropdown @error('sub_chapter_id') is-invalid @enderror"
							name="sub_chapter_id">
						<option value="">Please select year, subject, Topic</option>
					</select>
					@error('sub_chapter_id')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
					@enderror
					

					</div>
					</div>
					
					


                    <div class="col-12 col-md-3 d-flex align-items-center justify-content-end">
                        <button type="submit" class="btn btn-primary w-100">{{ trans('admin/main.show_results') }}</button>
						
                    </div>
                </form>
            </div>
			@php $saved_templates = $user->saved_templates;
			$saved_templates = json_decode( $saved_templates );
			$saved_templates = isset( $saved_templates->sub_parts_questions_report )? $saved_templates->sub_parts_questions_report : array();
			@endphp
			<div class="defined-searches mt-20">
			<span><strong>Defined Searches:</strong></span>
				@if( !empty( $saved_templates ) )
					@foreach( $saved_templates  as $template_name => $template_data)
						@php $template_array = json_decode($template_data); 
						$url_params = '<span>'.$template_name.'</span>'; 
						if( isset( $template_array->url_params )){
							$url_params = '<a href="'.(string) url("").'/admin/reports/topics_questions/?'.$template_array->url_params.'">'.$template_name.'</a>';
						}
						@endphp
						<span class="apply-template-field" data-form_id="sub_parts_questions_report_search_form" data-template_type="sub_parts_questions_report" data-template_data="{{$template_data}}"> {!! $url_params !!} <a href="javascript:;" data-template_name="{{$template_name}}" class="remove-template"><i class="fas fa-times"></i></a></span>
					@endforeach
				@endif
				<button type="button" class="btn btn-success save-template" data-form_id="sub_parts_questions_report_search_form" data-template_type="sub_parts_questions_report" ><i class="fas fa-save"></i> Save Template</button>
			</div>
        </section>

        <div class="row">
		
				<div class="col-md-12 col-lg-12">
						<pre class="prompt-text"></pre>
						
						<div id="accordion" class="topic-parts-data">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr class="topic-heading-top">
											<th class="font-14">&nbsp;</th>
											<th class="warning font-14">&nbsp;</th>
											@if(!empty($difficulty_levels))
												@foreach($difficulty_levels as $difficulty_level)
													@php $difficulty_level_class = '';
													$difficulty_level_class = ($difficulty_level == 'Emerging')? 'table-col-red' : $difficulty_level_class;
													$difficulty_level_class = ($difficulty_level == 'Expected')? 'table-col-orange' : $difficulty_level_class;
													$difficulty_level_class = ($difficulty_level == 'Exceeding')? 'table-col-yellow' : $difficulty_level_class;
													@endphp
													<th colspan="3" class="{{$difficulty_level_class}}">{{$difficulty_level}}</th>
												@endforeach
											@endif
											<th class="font-14">&nbsp;</th>
											<th class="font-14">&nbsp;</th>
										</tr>
										<tr>
											<th>Topic Part Item</th>
											<th>Created Date</th>
											@if(!empty($difficulty_levels))
												@foreach($difficulty_levels as $difficulty_level)
													@php $difficulty_level_class = '';
														$difficulty_level_class = ($difficulty_level == 'Emerging')? 'table-col-red' : $difficulty_level_class;
														$difficulty_level_class = ($difficulty_level == 'Expected')? 'table-col-orange' : $difficulty_level_class;
														$difficulty_level_class = ($difficulty_level == 'Exceeding')? 'table-col-yellow' : $difficulty_level_class;
													@endphp
													<th class="{{$difficulty_level_class}}">Expected</th>
													<th class="{{$difficulty_level_class}}">Total</th>
													<th class="{{$difficulty_level_class}}">Pending</th>
												@endforeach
											@endif
											<th>Total Pending Questions</th>
											<th>Total unreviewed Questions</th>
										</tr>
									 </thead>
									  <tbody id="topic_part_1">
									  @if($WebinarChapters->count() > 0 )
										  @php $chapter_counter = 0; @endphp
												@foreach($WebinarChapters as $WebinarChapterObj)
												@php $chapter_counter++; @endphp
												<tr class="topic_parts_parent accordion-parent" data-child_class="topic_parts_{{$WebinarChapterObj->id}}">
													<td><span class="topic-part-title"><i class="fas fa-chevron-down"></i>&nbsp;{{$WebinarChapterObj->getTitleAttribute()}}</span></td>
													<td>-</td>
													@if(!empty($difficulty_levels))
														@foreach($difficulty_levels as $difficulty_level)
															<td class="{{$difficulty_level_class}} 1expected-questions-{{$difficulty_level}}">0</td>
															<td class="{{$difficulty_level_class}} 1total-questions-{{$difficulty_level}}">0</td>
															<td class="{{$difficulty_level_class}} 1pending-questions-{{$difficulty_level}} table-col-pending">0</td>
														@endforeach
													@endif
													<td class="1total-pending-questions">0</td>
													<td class="1total-unreviewed-questions">0</td>
												</tr>
												
											@if($WebinarChapterObj->ChapterTopicParts->count() > 0 )
												@php $part_counter = 0; @endphp
												@foreach($WebinarChapterObj->ChapterTopicParts as $TopicPartObj)
												@php $part_counter++; @endphp
												
												@php 
												$total_pending_questions = $total_unreviewed_questions = 0;
												$expected_part_questions = 0;
												$total_part_questions = $TopicPartObj->topicPartQuestions->count();
												$pending_part_questions = $expected_part_questions-$total_part_questions;
												$pending_part_questions = ( $pending_part_questions < 0 )? 0 : $pending_part_questions;
												$total_unreviewed_questions = $TopicPartObj->topicPartQuestions->where('question_status', 'api_pending')->count();
												@endphp
												
												<tr class="topic_parts accordion-parent topic_parts_{{$WebinarChapterObj->id}}" data-child_class="subtopics_{{$TopicPartObj->id}}">
													<td><span class="topic-part-title"><i class="fas fa-chevron-down"></i>{{$TopicPartObj->title}}</span></td>
													<td>-</td>
													@if(!empty($difficulty_levels))
														@foreach($difficulty_levels as $difficulty_level)
															@php $difficulty_level_class = '';
															$difficulty_level_class = ($difficulty_level == 'Emerging')? 'table-col-red' : $difficulty_level_class;
															$difficulty_level_class = ($difficulty_level == 'Expected')? 'table-col-orange' : $difficulty_level_class;
															$difficulty_level_class = ($difficulty_level == 'Exceeding')? 'table-col-yellow' : $difficulty_level_class;
															@endphp
															@php $total_questions = $TopicPartObj->topicPartQuestions->where('question_difficulty_level', $difficulty_level)->count();
															$pending_questions = $expected_part_questions-$total_questions;
															$pending_questions = ($pending_questions < 0)? 0 : $pending_questions;
															$total_pending_questions += $pending_questions;
															@endphp
															<td class="{{$difficulty_level_class}} expected-questions-{{$difficulty_level}} value-for-parent" data-parent_key="1expected-questions-{{$difficulty_level}}">{{$expected_part_questions}}</td>
															<td class="{{$difficulty_level_class}} total-questions-{{$difficulty_level}} value-for-parent" data-parent_key="1total-questions-{{$difficulty_level}}">{{$total_questions}}</td>
															<td class="{{$difficulty_level_class}} pending-questions-{{$difficulty_level}} value-for-parent table-col-pending" data-parent_key="1pending-questions-{{$difficulty_level}}">{{$pending_questions}}</td>
														@endforeach
													@endif
													<td class="total-pending-questions value-for-parent" data-parent_key="1total-pending-questions">{{$total_pending_questions}}</td>
													<td class="total-unreviewed-questions value-for-parent" data-parent_key="1total-unreviewed-questions">{{$total_unreviewed_questions}}</td>
												</tr>
												
												@if($TopicPartObj->topicSubParts->count() > 0 )
												@foreach($TopicPartObj->topicSubParts as $subTopicObj)
													@php 
													$total_pending_questions = $total_unreviewed_questions = 0;
													$expected_part_questions = getPartQuestions($subTopicObj->difficulty_level);
													$total_part_questions = $subTopicObj->topicPartItemQuestions->count();
													$pending_part_questions = $expected_part_questions-$total_part_questions;
													$pending_part_questions = ( $pending_part_questions < 0 )? 0 : $pending_part_questions;
													$total_unreviewed_questions = $subTopicObj->topicPartItemQuestions->where('question_status', 'api_pending')->count();
													@endphp
													<tr class="topic_sub_parts subtopics_{{$TopicPartObj->id}}">
														<td><span class="topic-part-title">{{$subTopicObj->title}}</span></td>
														<td>-</td>
														@if(!empty($difficulty_levels))
															@foreach($difficulty_levels as $difficulty_level)
																@php $difficulty_level_class = '';
																$difficulty_level_class = ($difficulty_level == 'Emerging')? 'table-col-red' : $difficulty_level_class;
																$difficulty_level_class = ($difficulty_level == 'Expected')? 'table-col-orange' : $difficulty_level_class;
																$difficulty_level_class = ($difficulty_level == 'Exceeding')? 'table-col-yellow' : $difficulty_level_class;
																@endphp
																@php $total_questions = $subTopicObj->topicPartItemQuestions->where('question_difficulty_level', $difficulty_level)->count();
																$pending_questions = $expected_part_questions-$total_questions;
																$pending_questions = ($pending_questions < 0)? 0 : $pending_questions;
																$total_pending_questions += $pending_questions;
																@endphp
																<td class="{{$difficulty_level_class}} value-for-parent" data-parent_key="expected-questions-{{$difficulty_level}}">{{$expected_part_questions}}</td>
																<td class="{{$difficulty_level_class}} value-for-parent" data-parent_key="total-questions-{{$difficulty_level}}">{{$total_questions}}</td>
																<td class="{{$difficulty_level_class}} value-for-parent table-col-pending" data-parent_key="pending-questions-{{$difficulty_level}}">{{$pending_questions}}</td>
															@endforeach
														@endif
														<td class="value-for-parent" data-parent_key="total-pending-questions">{{$total_pending_questions}}</td>
														<td class="value-for-parent" data-parent_key="total-unreviewed-questions">{{$total_unreviewed_questions}}</td>
													</tr>
													
												@endforeach
											@endif
												@endforeach
											@endif
												@endforeach
											@endif
										</tbody>
									</table>
								</div>
							</div>

				</div>
		
        </div>
    </div>
</section>

<div id="template_save_modal" class="template_save_modal modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content edit-quest-modal-div">
            <div class="modal-body">
			  <div class="modal-box">
				<h3 class="font-20 font-weight-normal mb-10">Save the Template</h3>
				<p class="mb-15 font-16">
					<input type="text" name="template_name" class="template_name form-control">
				</p>
				<input type="hidden" name="form_data_encoded" class="form_data_encoded">
				<input type="hidden" name="template_type" class="template_type">
				<input type="hidden" name="form_id" class="form_id">
				
				<div class="inactivity-controls">
					<a href="javascript:;" class="continue-btn save-template-btn button btn btn-primary">Save Template</a>
					<a href="javascript:;" class="close" data-dismiss="modal" aria-label="Continue">Close</a>
				</div>
			  </div>
			</div>
        </div>
    </div>
</div>
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
			$.ajax({
				type: "GET",
				url: '/admin/webinars/sub_chapters_by_chapter',
				data: {'chapter_id': chapter_id, 'sub_chapter_id': sub_chapter_id},
				success: function (return_data) {
					$(".ajax-subchapter-dropdown").html(return_data);
				}
			});
		});
        $(".ajax-category-courses").change();
		
		$(document).on('change', 'select[name="columns_to_show[]"]', function () {
			/*var columns_to_show = $(this).val();
			$('.column-condition').addClass('rurera-hide');
			$.each(columns_to_show, function(index, column_id) {
				if(column_id == 'All'){
					$('.column-condition').removeClass('rurera-hide');
				}else{
				$('.column-condition[data-col_id="'+column_id+'"]').removeClass('rurera-hide');
				}
			});*/
		});
        $('select[name="columns_to_show[]"]').change();
		
		
		
		
		$(document).on('click', '.show_hide_table td span', function () {
			var column_id = $(this).attr('data-col_id');
			$(this).toggleClass('active');
			$('select[name="columns_to_show[]"]').find('option[value="'+column_id+'"]').prop('selected', function(_, selected) {
				return !selected;
			});
			$('select[name="columns_to_show[]"]').change();
			$('.column-condition[data-col_id="'+column_id+'"]').toggleClass('rurera-hide');
		});
		
		
		$(document).on('click', '.show_hide_table td span.remove-all', function () {
			
			$.each($(this).closest('td').find('span'), function() {
				var column_id = $(this).attr('data-col_id');
				$(this).removeClass('active');
				$('.column-condition[data-col_id="'+column_id+'"]').addClass('rurera-hide');
				
				$('select[name="columns_to_show[]"]').find('option[value="'+column_id+'"]').prop('selected', false);
				$('select[name="columns_to_show[]"]').change();
				
			});
		});
		
		
		$(document).on('click', '.show_hide_table td span.reset', function () {
			
			$.each($(this).closest('td').find('span'), function() {
				var column_id = $(this).attr('data-col_id');
				$(this).addClass('active');
				$('.column-condition[data-col_id="'+column_id+'"]').removeClass('rurera-hide');
				$('select[name="columns_to_show[]"]').find('option[value="'+column_id+'"]').prop('selected', true);
				$('select[name="columns_to_show[]"]').change();
			});
		});
		
		
		
		
		
		
    });
	
		$(document).on('click', '.topic_sub_parts', function () {
			var pId = $(this).attr("id");
			if($('.'+pId).is(":visible")) {
				$('.'+pId).hide(150);
				$(this).find('.fas').removeClass('fa-chevron-down').addClass('fa-chevron-right')
			} else {
				$('.'+pId).show(150);
				$(this).find('.fas').removeClass('fa-chevron-right').addClass('fa-chevron-down')
			}

		});
		
		$(document).on('click', '.accordion-parent', function () {
			var thisObj = $(this);
			var child_class = thisObj.attr('data-child_class');
			
			// Toggle the visibility of the child class elements
			$('.' + child_class).toggle(300, function () {
				if ($('.' + child_class).is(':visible')) {
					// Update the icon to 'down' when visible
					thisObj.find('.fas').removeClass('fa-chevron-right').addClass('fa-chevron-down');
				} else {
					// Update the icon to 'right' when hidden and hide nested children
					thisObj.find('.fas').removeClass('fa-chevron-down').addClass('fa-chevron-right');
					toggleChild($('.' + child_class));
				}
			});
		});

		// Recursive function to collapse all child elements
		function toggleChild(thisObj) {
			// Iterate through each matched element to handle nested child accordions
			thisObj.each(function () {
				var childElement = $(this);
				var child_sub_class = childElement.attr('data-child_class');
				
				// Hide the current child element
				$('.' + child_sub_class).hide(300);
				childElement.find('.fas').removeClass('fa-chevron-down').addClass('fa-chevron-right');
				
				// Recursive call if further child elements exist
				if ($('.' + child_sub_class).length > 0) {
					toggleChild($('.' + child_sub_class));
				}
			});
		}
		
		$(document).on('click', '.accordion-parent11', function () {
			var is_visible = $(this).find('.fas').hasClass('fa-chevron-down');
			$(this).find('.fas').removeClass('fa-chevron-down').addClass('fa-chevron-right');
			var child_class = $(this).attr('data-child_class');
			if($('.'+child_class).is(":visible")) {
				$(this).find('.fas').removeClass('fa-chevron-down').addClass('fa-chevron-right');
				if ($('.' + child_class).hasClass('accordion-parent')) {
					var sub_child_class = $('.'+child_class).attr('data-child_class');
					$('.'+sub_child_class).hide(300);
					$('.'+child_class).find('.fas').removeClass('fa-chevron-down').addClass('fa-chevron-right');
				}
			}else{
				$(this).find('.fas').removeClass('fa-chevron-right').addClass('fa-chevron-down');
			}
			$('.'+child_class).toggle(300);
		});
		
		

		$(document).on('click', '.topic_parts12', function () {
			var practiceId = $(this).parent('tbody').attr("id") + "_subpart";
			var providerId = $(this).parent('tbody').attr("id") + "_provider";
			if($('.'+practiceId).is(":visible")) {
			$('.'+practiceId).hide(150);
			$('.'+providerId).hide(150);
			$(this).find('.fas').removeClass('fa-chevron-down').addClass('fa-chevron-right')
			} else {
			$('.'+practiceId).show(300);
			
			
			$(this).find('.fas').removeClass('fa-chevron-right').addClass('fa-chevron-down')
			}
		});
		
		
		$.each($('.topic_parts'), function() {
			var topic_object = $(this); 
			var childs_class = topic_object.attr('data-child_class'); 
			var parent_values = {}; 

			$.each($('.' + childs_class), function() {
				$.each($(this).find('.value-for-parent'), function() {
					var parent_key = $(this).attr('data-parent_key'); 
					if (parent_values[parent_key] === undefined) {
						parent_values[parent_key] = 0;
					}
					parent_values[parent_key] += parseInt($(this).html(), 10);
				});
			});

			$.each(parent_values, function(field_class, field_value) {
				topic_object.find('.' + field_class).html(field_value);
			});
		});
		$.each($('.topic_parts_parent'), function() {
			var topic_object = $(this); 
			var childs_class = topic_object.attr('data-child_class'); 
			var parent_values = {}; 

			$.each($('.' + childs_class), function() {
				$.each($(this).find('.value-for-parent'), function() {
					var parent_key = $(this).attr('data-parent_key'); 
					if (parent_values[parent_key] === undefined) {
						parent_values[parent_key] = 0;
					}
					parent_values[parent_key] += parseInt($(this).html(), 10);
				});
			});

			$.each(parent_values, function(field_class, field_value) {
				topic_object.find('.' + field_class).html(field_value);
			});
		});
		
	
</script>

@endpush
