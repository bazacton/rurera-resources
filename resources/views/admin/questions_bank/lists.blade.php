@extends('admin.layouts.app')

@push('styles_top')
<link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
<link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">
<style>
    .hide {
        display: none;
    }

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

@push('libraries_top')

@endpush

@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{ trans('admin/main.questions_bank') }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/admin/">{{trans('admin/main.dashboard')}}</a>
            </div>
            <div class="breadcrumb-item">{{ trans('admin/main.quizzes') }}</div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>{{ trans('admin/main.total_quizzes') }}</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalQuestions }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Approved</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalApproved }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
            <div class="card card-statistic-1">

                <div class="card-wrap">
                    <div class="card-header">
                        <h4>In-Review</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalInReview }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
            <div class="card card-statistic-1">

                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Improvement</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalImprovement }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-6 col-12 hide">
            <div class="card card-statistic-1">

                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Hold/Reject</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalHoldReject }}
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="section-body">

        <section class="card">
            <div class="card-body">
                <form action="/admin/questions_bank" id="questions_search_form" method="get" class="row mb-0 ttt1">

					<input type="hidden" name="preview_question" class="preview_question" value="no">
                    <input type="hidden" name="page_no" class="page_no" value="{{isset($_GET['page'])? $_GET['page'] : 0}}">

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label">Question ID / Title / Keywords</label>
                            <input type="text" class="form-control" name="title" value="{{ get_filter_request('title', 'questions_search') }}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label">{{ trans('admin/main.start_date') }}</label>
                            <div class="input-group">
                                <input type="date" id="fsdate" class="text-center form-control" name="from"
                                       value="{{ get_filter_request('from', 'questions_search') }}" placeholder="Start Date">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label">{{ trans('admin/main.end_date') }}</label>
                            <div class="input-group">
                                <input type="date" id="lsdate" class="text-center form-control" name="to"
                                       value="{{ get_filter_request('to', 'questions_search') }}" placeholder="End Date">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label">{{trans('admin/main.category')}}</label>
                            <select name="category_id" data-plugin-selectTwo class="form-control populate ajax-category-courses" data-course_id="{{get_filter_request('subject_id', 'questions_search')}}" data-next_index="subject_id" data-next_value="{{get_filter_request('subject_id', 'questions_search')}}">
                                <option value="">{{trans('admin/main.all_categories')}}</option>
                                @foreach($categories as $category)
                                @if(!empty($category->subCategories) and count($category->subCategories))
                                <optgroup label="{{  $category->title }}">
                                    @foreach($category->subCategories as $subCategory)
                                    <option value="{{ $subCategory->id }}" @if(get_filter_request('category_id', 'questions_search') == $subCategory->id) selected="selected" @endif>{{ $subCategory->title }}</option>
                                    @endforeach
                                </optgroup>
                                @else
                                <option value="{{ $category->id }}" @if(get_filter_request('category_id', 'questions_search') == $category->id) selected="selected" @endif>{{ $category->title }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>





					<div class="col-md-3">
					<div class="form-group">
						<label>Subjects</label>
						<select data-return_type="option"
								data-default_id="{{request()->get('subject_id')}}" data-next_index="chapter_id" data-next_value="{{get_filter_request('chapter_id', 'questions_search')}}" data-chapter_id="{{get_filter_request('chapter_id', 'questions_search')}}"
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


					<div class="col-md-3">
					<div class="form-group">
						<label class="input-label">Topic</label>
						<select data-next_index="sub_chapter_id" data-next_value="{{get_filter_request('sub_chapter_id', 'questions_search')}}" data-sub_chapter_id="{{get_filter_request('sub_chapter_id', 'questions_search')}}" id="chapter_id"
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


					<div class="col-md-3">
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



					<div class="col-md-3">
						<div class="form-group">
							<label class="input-label">Author</label>
							<select name="user_id" data-search-option="display_name" class="form-control "
									data-placeholder="Search author">

									<option value="">Select Author</option>
								@if(!empty($users_list) and $users_list->count() > 0)
									@foreach($users_list as $userObj)
										@php $checked = (get_filter_request('user_id', 'questions_search') == $userObj->id)? 'selected' : ''; @endphp
										<option value="{{ $userObj->id }}" {{$checked}}>{{ $userObj->get_full_name() }}</option>
									@endforeach
								@endif
							</select>
						</div>
					</div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label">Difficulty Level</label>
							@php $get_difficulty_levels = get_difficulty_levels(); @endphp
                            <select name="difficulty_level" data-plugin-selectTwo class="form-control populate">
                                <option value="">All Levels</option>
								@if(!empty($get_difficulty_levels ))
									@foreach($get_difficulty_levels as $difficulty_level)
										<option value="{{$difficulty_level}}" @if(get_filter_request('difficulty_level', 'questions_search') == $difficulty_level) selected @endif>{{$difficulty_level}}</option>
									@endforeach
								@endif
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label">Question Type</label>
                            <select name="question_type" data-plugin-selectTwo class="form-control populate">
                                <option value="">All Types</option>
								@if(!empty($questions_types ))
									@foreach($questions_types as $question_type_slug => $question_type)
										<option value="{{$question_type_slug}}" @if(get_filter_request('question_type', 'questions_search') == $question_type) selected @endif>{{$question_type}}</option>
									@endforeach
								@endif
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label">Teacher Review</label>
                            <select name="review_required" data-plugin-selectTwo class="form-control populate">
                                <option value="">All</option>
                                <option value="1" @if(get_filter_request('review_required', 'questions_search') == '1') selected
                                    @endif>Yes
                                </option>
                                <option value="0" @if(get_filter_request('review_required', 'questions_search') == '0') selected
                                    @endif>No
                                </option>

                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label">Example Question</label>
                            <select name="is_example_question" data-plugin-selectTwo class="form-control populate">
                                <option value="">All</option>
                                <option value="1" @if(get_filter_request('is_example_question', 'questions_search') == '1') selected
                                    @endif>Yes
                                </option>
                                <option value="0" @if(get_filter_request('is_example_question', 'questions_search') == '0') selected
                                    @endif>No
                                </option>

                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label">{{ trans('admin/main.status') }}</label>
                            <select name="question_status" data-plugin-selectTwo class="form-control populate">
                                <option value="">{{ trans('admin/main.all_status') }}</option>
                                <option value="Draft" @if(get_filter_request('question_status', 'questions_search') == 'Draft') selected
                                    @endif>Draft
                                </option>
                                <option value="Submit for review" @if(get_filter_request('question_status', 'questions_search') == 'Submit for
                                    review') selected @endif>Submit for review
                                </option>
                                <option value="Hard reject" @if(get_filter_request('question_status', 'questions_search') == 'Hard reject')
                                    selected @endif>Hard reject
                                </option>
                                <option value="Improvement required" @if(get_filter_request('question_status', 'questions_search') ==
                                    'Improvement required') selected @endif>Improvement required
                                </option>
                                <option value="On hold" @if(get_filter_request('question_status', 'questions_search') == 'On hold') selected
                                    @endif>On hold
                                </option>
                                <option value="Accepted" @if(get_filter_request('question_status', 'questions_search') == 'Accepted') selected
                                    @endif>Accepted
                                </option>
                                <option value="Offline" @if(get_filter_request('question_status', 'questions_sear	ch') == 'Offline') selected
                                    @endif>Offline
                                </option>
                                <option value="Published" @if(get_filter_request('question_status', 'questions_search') == 'Published') selected
                                    @endif>Published
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-md-3 d-flex align-items-center justify-content-end">
                        <button type="submit" class="btn btn-primary w-100">{{ trans('admin/main.show_results') }}
                        </button>
                    </div>
                </form>
            </div>
				@php $saved_templates = $user->saved_templates;
				$saved_templates = json_decode( $saved_templates );
				$saved_templates = isset( $saved_templates->questions_search )? $saved_templates->questions_search : array();
				@endphp
				<div class="defined-searches mt-20">
				<span><strong>Defined Searches:</strong></span>
					@if( !empty( $saved_templates ) )
						@foreach( $saved_templates  as $template_name => $template_data)
							@php $template_array = json_decode($template_data);
							$url_params = '<span>'.$template_name.'</span>';
							if( isset( $template_array->url_params )){
								$url_params = '<a href="'.(string) url("").'/admin/questions_bank/?'.$template_array->url_params.'">'.$template_name.'</a>';
							}
							@endphp
							<span class="apply-template-field" data-form_id="questions_search_form" data-template_type="questions_search" data-template_data="{{$template_data}}"> {!! $url_params !!} <a href="javascript:;" data-template_name="{{$template_name}}" class="remove-template"><i class="fas fa-times"></i></a></span>
						@endforeach
					@endif
					<button type="button" class="btn btn-success save-template" data-form_id="questions_search_form" data-template_type="questions_search" ><i class="fas fa-save"></i> Save Template</button>
				</div>
        </section>

        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">

                    @can('admin_questions_bank_create')
                    <div class="card-header">
                        <div class="text-right">
                            <a href="/admin/questions_bank/create" class="btn btn-primary">New Question</a>
                        </div>
						<div class="text-right">
                            <a href="javascript:;" class="btn btn-primary preview-questions">Preview All Questions</a>
                        </div>
                    </div>
                    @endcan

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped font-14">
                                <tr>
                                    <th class="text-left">{{ trans('admin/main.title') }}</th>
                                    <th class="text-left">Class / Subject / Chapter</th>
                                    <th class="text-center">Difficulty Level</th>
                                    <th class="text-center">Added by</th>
                                    <th class="text-center">Created Date</th>
                                    <th class="text-center">Status</th>
                                    <th>{{ trans('admin/main.actions') }}</th>
                                </tr>

                                @foreach($questions as $questionData)
                                <tr>
                                    <td>
                                        <span>{{ ($questionData->title != '')? $questionData->title : $questionData->question_title }}</span>
                                    </td>
                                    <td class="text-left">
                                        <span class="text-primary mt-0 mb-1 font-weight-bold">
                                            {{ isset ($questionData->category->id)?
                                            $questionData->category->getTitleAttribute() : '-'}}
                                            / {{ isset ($questionData->course->id)?
                                            $questionData->course->getTitleAttribute() : '-'}}</span>
                                        <div class="text-small">{{ isset ($questionData->subChapter->id)?
                                            $questionData->subChapter->sub_chapter_title : '' }}
                                        </div>
                                    </td>
                                    <td>
                                        <span>{{ $questionData->question_difficulty_level }}</span>
                                    </td>
                                    <td>
                                        <span>{{ isset( $questionData->user->id)? $questionData->user->get_full_name() : '-' }}</span>
                                    </td>
                                    <td>
                                        <span>{{ dateTimeFormat($questionData->created_at, 'j M y | H:i') }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $questionData->question_status }}</span>
                                    </td>
                                    <td>
                                        @if(auth()->user()->isAuthor() || auth()->user()->isReviewer() || auth()->user()->isDataEntry())
                                        <a href="/admin/questions_bank/{{ $questionData->id }}/log"
                                           class="btn-transparent btn-sm text-primary" data-toggle="tooltip"
                                           data-placement="top" title="Question Log">
                                            <i class="fa fa-th-list"></i>
                                        </a>
                                        @endif

                                        @can('admin_questions_bank_create')
                                        <a href="/admin/questions_bank/{{ $questionData->id }}/duplicate"
                                           class="btn-transparent btn-sm text-primary" data-toggle="tooltip"
                                           data-placement="top" title="Duplicate">
                                            <i class="fa fa-clone"></i>
                                        </a>
                                        @endcan
                                            <a href="/admin/questions_bank/{{ $questionData->id }}/json" target="_blank"
                                               class="btn-transparent btn-sm text-primary" data-toggle="tooltip"
                                               data-placement="top" title="json">
                                                <i class="fa fa-question"></i>
                                            </a>
                                            <a href="/panel/questions/{{ $questionData->id }}/start"
                                           class="btn-transparent btn-sm text-primary" data-toggle="tooltip"
                                           data-placement="top" title="View">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        @if(auth()->user()->can('admin_questions_bank_edit'))
                                            @if($questionData->questions_bulk_list_id > 0 && $questionData->topic_part_item_id > 0)
                                                    <a href="/admin/questions-generator/view-api-response/{{$questionData->questions_bulk_list_id}}/{{$questionData->topic_part_item_id}}/{{$questionData->id}}"
                                                       class="btn-transparent btn-sm text-primary" data-toggle="tooltip"
                                                       data-placement="top" title="{{ trans('admin/main.edit') }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                            @else
                                                <a href="/admin/questions_bank/{{ $questionData->id }}/edit"
                                                   class="btn-transparent btn-sm text-primary" data-toggle="tooltip"
                                                   data-placement="top" title="{{ trans('admin/main.edit') }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                @endif
                                        @endif


                                        @if(auth()->user()->can('admin_questions_bank_delete'))
                                        @include('admin.includes.delete_button',['url' =>
                                        '/admin/questions_bank/'.$questionData->id.'/delete' , 'btnClass' => 'btn-sm'])
                                        @endif

                                        @if($user->role_name == 'reviewer' && ($questionData->question_status ==
                                        'Published' || $questionData->question_status == 'Offline'))
                                        <label class="custom-switch pl-0">
                                            <input type="checkbox" name="publish_question"
                                                   data-question_id="{{$questionData->id}}" id="publish_question"
                                                   value="1" class="custom-switch-input update_question_status"
                                                   @if($questionData->question_status == 'Published') checked="checked"
                                            @endif/>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                        @endif
                                    </td>

                                </tr>
                                @endforeach

                            </table>
                        </div>
                        <div class="text-right">
                            Records found: <b>{{$foundRecords}}</b>
                        </div>
                    </div>


                    <div class="card-footer text-center">
                        {{ $questions->appends(request()->query())->links() }}
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
<script src="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>

<script type="text/javascript">


		$("body").on("click", ".preview-questions", function (t) {
			$(".preview_question").val('yes');
			$("#questions_search_form").attr("target", "_blank");
			$("#questions_search_form").submit();
			$("#questions_search_form").attr("target", "_self");
			$(".preview_question").val('no');
		});

    $("body").on("change", ".update_question_status", function (t) {
        var question_status = 'Offline';
        if ($(this).is(":checked")) {
            var question_status = 'Published';
        }
        var question_id = $(this).attr('data-question_id');
        jQuery.ajax({
            type: "POST",
            url: '/admin/questions_bank/question_status_update',
            data: {"question_id": question_id, "question_status": question_status},
            success: function (return_data) {
                if (return_data.code == 200) {
                    Swal.fire({
                        html: '<h3 class="font-20 text-center text-dark-blue">Updated Successfully</h3>',
                        showConfirmButton: false,
                        icon: 'success',
                    });
                }
            }
        });
    });


    $(document).on('change', '.ajax-category-courses', function () {
			var category_id = $(this).val();
			var course_id = $(this).attr('data-course_id');
			var course_id = $(this).attr('data-next_value');
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
			var chapter_id = $(this).attr('data-next_value');

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
			var sub_chapter_id = $(this).attr('data-next_value');
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

</script>

@endpush
