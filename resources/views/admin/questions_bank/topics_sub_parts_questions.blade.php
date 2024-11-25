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
		padding-top: 9px;
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
					<div id="accordion" class="topic-parts-data"><div class="table-responsive"><table class="table">
						  <thead>
							  <tr>
								<th>Title</th>
								<th>Sub Parts</th>
								<th>Essential Questions</th>
								<th>Overall Questions</th>
								<th>Pending Target</th>
							  </tr>
						  </thead>
						  <tbody>
							@php $no_of_parts_total = $questions_expected_total = $total_questions_total = $pending_target_total = 0; @endphp
							@if(!empty( $report_data ))
								@foreach($report_data as $topic_id => $reportObj)
							
									@php  $topic_title = isset( $reportObj['topic_title'] )? $reportObj['topic_title'] : '';
									$topic_summary = isset( $reportObj['topic_summary'] )? $reportObj['topic_summary'] : array(); 
									$topic_data = isset( $reportObj['topic_data'] )? $reportObj['topic_data'] : array(); 
									
									$no_of_parts = isset( $topic_summary['no_of_parts'] )? $topic_summary['no_of_parts'] : 0;
									$questions_expected = isset( $topic_summary['questions_expected'] )? $topic_summary['questions_expected'] : 0;
									$total_questions = isset( $topic_summary['total_questions'] )? $topic_summary['total_questions'] : 0;
									$pending_target = isset( $topic_summary['pending_questions'] )? $topic_summary['pending_questions'] : 0;
									$pending_target = ( $pending_target < 0)? 0 : $pending_target;
									$no_of_parts_total	+= $no_of_parts;
									$questions_expected_total	+= $questions_expected;
									$total_questions_total	+= $total_questions;
									$pending_target_total	+= $pending_target;
									@endphp
									<tr class="topic-tr accordion-parent" data-child_class="topics_sub_topics_{{$topic_id}}">
									  <td><span class="topic-part-title"><i class="fas fa-chevron-down"></i>&nbsp;{{$topic_title}}</span></td>
									  <td>{{$no_of_parts}}</td>
									  <td>{{$questions_expected}}</td>
									  <td>{{$total_questions}}</td>
									  <td>{{$pending_target}}</td>
									</tr>
									
									@if(!empty($topic_data))
										@foreach($topic_data as $sub_topic_id => $topicDataObj)
											@php 
											$topicDataObj = isset( $topicDataObj['sub_topic'] )? $topicDataObj['sub_topic'] : array();
											$sub_topic_title = isset( $topicDataObj['title'] )? $topicDataObj['title'] : '';
											$sub_topic_summary = isset( $topicDataObj['sub_topic_summary'] )? $topicDataObj['sub_topic_summary'] : array();
											$topicDataObj = isset( $topicDataObj['data'] )? $topicDataObj['data'] : array();
											
											$no_of_parts = isset( $sub_topic_summary['no_of_parts'] )? $sub_topic_summary['no_of_parts'] : 0;
											$questions_expected = isset( $sub_topic_summary['questions_expected'] )? $sub_topic_summary['questions_expected'] : 0;
											$total_questions = isset( $sub_topic_summary['total_questions'] )? $sub_topic_summary['total_questions'] : 0;
											$pending_target = isset( $sub_topic_summary['pending_questions'] )? $sub_topic_summary['pending_questions'] : 0;
											$pending_target = ( $pending_target < 0)? 0 : $pending_target;
											
											
											$style_attr = '';
											@endphp
											<tr style="{{$style_attr}}" class="subtopic-tr topics_sub_topics_{{$topic_id}} accordion-parent" data-child_class="sub_topic_data_{{$sub_topic_id}}">
											  <td><span class="topic-part-title"><i class="fas fa-chevron-down"></i>&nbsp;{{$sub_topic_title}}</span></td>
											  <td>{{$no_of_parts}}</td>
											  <td>{{$questions_expected}}</td>
											  <td>{{$total_questions}}</td>
											  <td>{{$pending_target}}</td>
											</tr>
											@if(!empty($topicDataObj))
												@foreach($topicDataObj as $part_id => $partObj)
													@php 
													$part_title  = isset( $partObj['part_title'] )? $partObj['part_title'] : '';
													$partData = isset( $partObj['part_data'] )? $partObj['part_data'] : array();
													$partSummary = isset( $partObj['part_summary'] )? $partObj['part_summary'] : array();
													
													$questions_expected = isset( $partSummary['questions_expected'] )? $partSummary['questions_expected'] : 0;
													$total_questions = isset( $partSummary['total_questions'] )? $partSummary['total_questions'] : 0;
													$pending_target = $questions_expected - $total_questions;
													$pending_target = ( $pending_target < 0)? 0 : $pending_target;
													$style_attr = '';
													@endphp
													<tr style="{{$style_attr}}" class="child-accord part-tr sub_topic_data_{{$sub_topic_id}} accordion-parent" data-child_class="part_data_{{$sub_topic_id}}_{{$part_id}}">
													  <td><span class="topic-part-title"><i class="fas fa-chevron-right"></i>&nbsp;&nbsp;{{$part_title}}</span></td>
													  <td>-</td>
													  <td>{{$questions_expected}}</td>
													  <td>{{$total_questions}}</td>
													  <td>{{$pending_target}}</td>
													</tr>
													
													@if(!empty( $difficulty_levels ))
														@foreach($difficulty_levels as $difficulty_level)
															@php
															$questions_expected = isset( $partData[$difficulty_level]['questions_expected'] )? $partData[$difficulty_level]['questions_expected'] : 0;
															$total_questions = isset( $partData[$difficulty_level]['total_questions'] )? $partData[$difficulty_level]['total_questions'] : 0;
															$pending_target = $questions_expected - $total_questions;
															$pending_target = ( $pending_target < 0)? 0 : $pending_target;
															$style_attr = 'display:none;';
															@endphp
															<tr style="{{$style_attr}}" class="child-accord levels-tr part_data_{{$sub_topic_id}}_{{$part_id}}">
															  <td>{{$difficulty_level}}</td>
															  <td>-</td>
															  <td>{{$questions_expected}}</td>
															  <td>{{$total_questions}}</td>
															  <td>{{$pending_target}}</td>
															</tr>
														@endforeach
													@endif
												@endforeach
											@endif
										@endforeach
									@endif
									
									
								@endforeach
							@endif
							<tr class="topic-tr accordion-parent" data-child_class="topics_sub_topics_{{$topic_id}}">
							  <td><strong>Total</strong></td>
							  <td><strong>{{$no_of_parts_total}}</strong></td>
							  <td><strong>{{$questions_expected_total}}</strong></td>
							  <td><strong>{{$total_questions_total}}</strong></td>
							  <td><strong>{{$pending_target_total}}</strong></td>
							</tr>			
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
				<h3 class="font-24 font-weight-normal mb-10">Save the Template</h3>
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
	
</script>

@endpush
