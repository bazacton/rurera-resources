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
        <h1>Topics Questions Report</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/admin/">{{trans('admin/main.dashboard')}}</a>
            </div>
            <div class="breadcrumb-item">Topics Questions Report</div>
        </div>
    </div>


    <div class="section-body">

        <section class="card">
            <div class="card-body">
                <form action="/admin/reports/topics_questions" id="topics_questions_report_search_form" method="get" class="row mb-0">


					<div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label">{{ trans('admin/main.start_date') }}</label>
                            <div class="input-group">
                                <input type="date" id="fsdate" class="text-center form-control" name="from"
                                       value="{{ get_filter_request('from', 'topics_questions_report_search') }}" placeholder="Start Date">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label">{{ trans('admin/main.end_date') }}</label>
                            <div class="input-group">
                                <input type="date" id="lsdate" class="text-center form-control" name="to"
                                       value="{{ get_filter_request('to', 'topics_questions_report_search') }}" placeholder="End Date">
                            </div>
                        </div>
                    </div>
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



					<div class="col-md-3">
					<div class="form-group">
						<label>Subjects</label>
						<select data-return_type="option"
								data-default_id="{{request()->get('subject_id')}}" data-chapter_id="{{get_filter_request('chapter_id', 'topics_questions_report_search')}}"
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
						<select data-sub_chapter_id="{{get_filter_request('sub_chapter_id', 'topics_questions_report_search')}}" id="chapter_id"
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

					<div class="col-md-2">
						<div class="form-group">
							<label class="input-label">Author</label>
							<select name="user_id" data-search-option="display_name" class="form-control "
									data-placeholder="Search author">

									<option value="">Select Author</option>
								@if(!empty($authors_list) and $authors_list->count() > 0)
									@foreach($authors_list as $userObj)
										@php $checked = (get_filter_request('user_id', 'topics_questions_report_search') == $userObj->id)? 'selected' : ''; @endphp
										<option value="{{ $userObj->id }}" {{$checked}}>{{ $userObj->get_full_name() }}</option>
									@endforeach
								@endif
							</select>
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<label class="input-label">Columns to Show</label>
							<select name="columns_to_show[]" class="form-control select2 " multiple="multiple">
								<option value="All" {{in_array('All', $columns_to_show)? 'selected' : ''}}>All</option>
								<option value="Topic" {{in_array('Topic', $columns_to_show)? 'selected' : ''}}>Topic</option>
								<option value="No of Parts" {{in_array('No of Parts', $columns_to_show)? 'selected' : ''}}>No of Parts</option>
								<option value="Questions Expected" {{in_array('Questions Expected', $columns_to_show)? 'selected' : ''}}>Questions Expected</option>
								<option value="Total Questions" {{in_array('Total Questions', $columns_to_show)? 'selected' : ''}}>Total Questions</option>


								<optgroup label="Authors">
								@if( !empty( $authors_list ) )

									@foreach ($authors_list as $authorObj)
										@php if( !isset( $authorObj->id)){continue;} @endphp
										<option value="{{$authorObj->id}}" {{in_array($authorObj->id, $columns_to_show)? 'selected' : ''}}>{{$authorObj->get_full_name()}}</option>
									@endforeach
								@endif
                                </optgroup>
							</select>
						</div>
					</div>


                    <div class="col-12 col-md-3 d-flex align-items-center justify-content-end">
                        <button type="submit" class="btn btn-primary w-100">{{ trans('admin/main.show_results') }}</button>

                    </div>
                </form>
            </div>
			@php $saved_templates = $user->saved_templates;
			$saved_templates = json_decode( $saved_templates );
			$saved_templates = isset( $saved_templates->topics_questions_report_search )? $saved_templates->topics_questions_report_search : array();
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
						<span class="apply-template-field" data-form_id="topics_questions_report_search_form" data-template_type="topics_questions_report_search" data-template_data="{{$template_data}}"> {!! $url_params !!} <a href="javascript:;" data-template_name="{{$template_name}}" class="remove-template"><i class="fas fa-times"></i></a></span>
					@endforeach
				@endif
				<button type="button" class="btn btn-success save-template" data-form_id="topics_questions_report_search_form" data-template_type="topics_questions_report_search" ><i class="fas fa-save"></i> Save Template</button>
			</div>
        </section>

        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-body">

						<table class="show_hide_table">
							<tr>
								<th>Content Structure</th>
								<th>User Roles and Permissions</th>
							</tr>
							<tr>
								<td>

									<span class="active" data-col_id="Topic">Topic</span>,
									<span class="active" data-col_id="Sub Topic">Sub Topic</span>,
									<span class="active" data-col_id="No of Parts">No of Parts</span>,
									<span class="active" data-col_id="Questions Expected">Questions Expected</span>,
									<span class="active" data-col_id="Total Questions">Total Questions</span>
									<br>
									<span class="remove-all">Remove All</span> |
									<span class="reset">Reset</span>
								</td>
								<td>
									@if( !empty( $authors_list ) )

									@foreach ($authors_list as $authorObj)
										@php if( !isset( $authorObj->id)){continue;} @endphp
										<span class="active" data-col_id="{{$authorObj->id}}">{{$authorObj->get_full_name()}}</span>,
									@endforeach
								@endif
									<br>
									<span class="remove-all">Remove All</span> |
									<span class="reset">Reset</span>
								</td>
							</tr>
						</table>


                        <div class="table-responsive">
							<table class="table table-striped font-14">
								<tr class="freeze-row1">
                                    <th class="text-left freeze-cols1 top-row col-11 column-condition" data-col_id="Topic">Topic</th>
                                    <th class="text-left freeze-cols1 top-row col-21 column-condition" data-col_id="Sub Topic">Sub Topic</th>
									<th class="text-left column-condition" data-col_id="No of Parts">No of Parts</th>
									<th class="text-left column-condition" data-col_id="Questions Expected">Questions Expected</th>
									<th class="text-left column-condition" data-col_id="Total Questions">Total Questions</th>
									@if( !empty( $authors_list ) )

										@foreach ($authors_list as $authorObj)
											@php if( !isset( $authorObj->id)){continue;} @endphp
											<th class="text-left column-condition" data-col_id="{{$authorObj->id}}">{{$authorObj->get_full_name()}}</th>
										@endforeach
									@endif
								</tr>
								@php $chapter_ids = $sub_chapter_ids =  $zones_array = $difficulty_levels_array =[]; @endphp
								@if(!empty( $report_data ) )
									@foreach( $report_data as $reportObj)
										@php $topic_title = isset( $reportObj['topic'] )? $reportObj['topic'] : '';

                                        $topic_preview_link = isset( $reportObj['preview_link'] )? $reportObj['preview_link'] : '';
										$sub_topic_title = isset( $reportObj['sub_topic']['title'] )? $reportObj['sub_topic']['title'] : '';
                                        $sub_topic_preview_link = isset( $reportObj['sub_topic']['preview_link'] )? $reportObj['sub_topic']['preview_link'] : '';
                                        $topic_data = isset($reportObj['sub_topic']['data'])? $reportObj['sub_topic']['data'] : array();

										@endphp

														@php $chapter_ids[$topic_title]	= isset( $chapter_ids[$topic_title] )? $chapter_ids[$topic_title]+1: 1; @endphp
														@php $sub_chapter_ids[$sub_topic_title]	= isset( $sub_chapter_ids[$sub_topic_title] )? $sub_chapter_ids[$sub_topic_title]+1: 1;

                                                         @endphp
														<tr>
															<td class="text-left freeze-cols1 col-11 column-condition" data-col_id="Topic">
															@if(!isset( $chapter_ids[$topic_title] ) || $chapter_ids[$topic_title] == 1)
                                                                    <a href="{{$topic_preview_link}}" target="_blank"><i class="fa fa-eye"></i></a> {{$topic_title}}
															@endif
															</td>
															<td class="text-left freeze-cols1 col-21 column-condition" data-col_id="Sub Topic">
															@if(!isset( $sub_chapter_ids[$sub_topic_title] ) || $sub_chapter_ids[$sub_topic_title] == 1)
                                                                    {{$sub_topic_title}}
															@endif
															</td>


															<td class="text-left column-condition" data-col_id="No of Parts">{{isset( $topic_data['no_of_parts'] )? $topic_data['no_of_parts'] : 0}}</td>
															<td class="text-left column-condition" data-col_id="Questions Expected">{{isset( $topic_data['questions_expected'] )? $topic_data['questions_expected'] : 0}}</td>
															<td class="text-left column-condition" data-col_id="Total Questions">{{isset( $topic_data['total_questions'] )? $topic_data['total_questions'] : 0}} <a href="{{$sub_topic_preview_link}}" target="_blank"><i class="fa fa-eye"></i></a> </td>

															@if( !empty( $authors_list ) )

																@foreach ($authors_list as $authorObj)
																	@php if( !isset( $authorObj->id)){continue;}
																	$author_name = $authorObj->get_full_name();
																	$author_name = str_replace(' ', '', $author_name);
																	@endphp
																	<td class="text-left column-condition" data-col_id="{{$authorObj->id}}">{{isset( $topic_data['authors'][$authorObj->id] )? $topic_data['authors'][$authorObj->id] : 0}}</td>
																@endforeach
															@endif

														</tr>


									@endforeach
								@endif


							</table>
                        </div>
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

</script>

@endpush
