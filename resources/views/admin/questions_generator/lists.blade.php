@php use App\Models\QuizzesQuestion; @endphp
@extends('admin.layouts.app')

@push('libraries_top')
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
            display: inline-block;
        }

        .save-template {
            float: right;
        }


        /* Customizing jQuery UI Slider to match Bootstrap/Purple Theme */
        /* Using class .rurera-slider-ui instead of ID */
        .rurera-slider-ui {
            height: 8px;
            background: #e9ecef; /* Bootstrap light gray */
            border: none;
            border-radius: 10px;
        }

        /* The colored bar between handles */
        .rurera-slider-ui .ui-slider-range {
            background: #5a67d8; /* Custom Purple/Blue */
            border-radius: 10px;
        }

        /* The handles (circles) */
        .rurera-slider-ui .ui-slider-handle {
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: #ffffff;
            border: 3px solid #5a67d8;
            top: -8px; /* Center vertically */
            cursor: pointer;
            outline: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.15);
            transition: transform 0.2s, background-color 0.2s;
            position:relative;
        }

        .rurera-slider-ui .ui-slider-handle:hover {
            transform: scale(1.15);
        }

        .rurera-slider-ui .ui-slider-handle:active {
            background: #5a67d8;
            border-color: #fff;
            transform: scale(1.2);
        }
    </style>
    <style>
        .table-container { margin-top: 20px; }
        .dropdown-menu { padding: 15px; width: 300px; max-height: 400px; overflow-y: auto; }
        .dropdown-menu h5 { margin-top: 10px; font-weight: bold; }
        .search-input { width: 100%; margin-bottom: 10px; padding: 5px; border: 1px solid #ccc; border-radius: 4px; }
        .toggle-switch { display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px; }
        .drag-handle { cursor: move; padding: 0 5px; color: #007bff; font-weight: bold; margin-right: 10px; }
        .dropdown-toggle { background-color: #007bff; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; }
        .hidden-column { display: none; }
        .conditional-child-fields{display:none;}
    </style>


    <style>
        /* =========================
           Scoped CSS (prefixed)
           ========================= */
        .mock-exam { background:#f5f7fb; min-height:100vh; }
        .mock-exam .mock-exam-page-wrap { padding: 28px 0; }

        /* Full-width, full-height modal (scoped via .mock-exam-modal class) */
        .mock-exam-modal.modal-fullwidth .modal-dialog {
            max-width: 100%;
            width: 100%;
            margin: 0;
            height: 100%;
        }
        .mock-exam-modal.modal-fullwidth .modal-content {
            height: 100vh;
            border-radius: 0;
            border: 0;
        }
        .mock-exam-modal.modal-fullwidth .modal-header { border-bottom: 1px solid #e9ecef; }
        .mock-exam-modal.modal-fullwidth .modal-body { overflow: auto; }
        .mock-exam-modal .modal-footer { border-top: 1px solid #e9ecef; }

        .mock-exam .mock-exam-section-card { border: 1px solid #e9ecef; border-radius: .5rem; background:#fff; }
        .mock-exam .mock-exam-section-card .card-header { background: #fff; border-bottom: 1px solid #f1f3f5; }
        .mock-exam .mock-exam-drag-handle { cursor: grab; user-select: none; }
        .mock-exam .mock-exam-section-label-badge { font-weight: 600; }
        .mock-exam .mock-exam-muted { color: #6c757d; }
        .mock-exam .mock-exam-small-help { font-size: 12px; color:#6c757d; }

        .mock-exam .mock-exam-item-row { background: #fff; border:1px solid #e9ecef; border-radius: .5rem; padding: 12px 14px; }
        .mock-exam .mock-exam-item-row + .mock-exam-item-row { margin-top: 10px; }
        .mock-exam .mock-exam-icon-btn { width: 34px; height: 34px; border-radius: 999px; display:inline-flex; align-items:center; justify-content:center; }
        .mock-exam .mock-exam-pill { border:1px solid #e9ecef; border-radius: 999px; padding: 2px 10px; font-size: 12px; background:#fff; }
        .mock-exam .mock-exam-assigned-item { display:flex; align-items:center; justify-content:space-between; padding:6px 8px; border:1px dashed #e9ecef; border-radius:.4rem; margin-top:6px; }
        .mock-exam .mock-exam-assigned-item:first-child { margin-top:0; }
        .mock-exam .mock-exam-assigned-item .mock-exam-rm { cursor:pointer; color:#dc3545; font-weight:600; padding:0 6px; }
        .mock-exam .mock-exam-empty-note { font-size: 13px; color:#6c757d; }

        /* Small nested modal */
        .mock-exam-modal.modal-sm2 .modal-dialog { max-width: 720px; margin: 15px auto; border: 1px solid #e9ecef; border-radius: 8px; overflow: hidden; }
        .mock-exam-modal .note-editor.note-frame { border-radius: .25rem; }

        .mock-exam .mock-exam-btn-remove-main { border-color:#f1c6cc; color:#dc3545; }
        .mock-exam .mock-exam-btn-remove-main:hover { background:#dc3545; color:#fff; }
        .mock-exam .mock-exam-btn-disabled { opacity:.55; cursor:not-allowed; }

        /* template container is hidden */
        #mockExam-templates { display:none !important; }
    </style>

    <link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="heading-holder">
                <h1>AI prompt</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/admin/">{{trans('admin/main.dashboard')}}</a>
                    </div>
                    <div class="breadcrumb-item">AI prompt</div>
                </div>
            </div>
        </div>


        <div class="section-body">

            <section class="card">
                <div class="card-body">
                    <form action="/admin/questions-generator" id="topic_parts_search_form" method="get" class="row mb-0">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="input-label">{{trans('admin/main.category')}}</label>
                                <div class="select-holder">
                                    <select name="category_id" data-plugin-selectTwo class="form-control populate ajax-category-courses-filter form-control" data-course_id="{{get_filter_request('subject_id', 'bulk_list_search')}}">
                                        <option value="">{{trans('admin/main.all_categories')}}</option>
                                        @foreach($categories as $category)
                                            @if(!empty($category->subCategories) and count($category->subCategories))
                                                <optgroup label="{{  $category->title }}">
                                                    @foreach($category->subCategories as $subCategory)
                                                        <option value="{{ $subCategory->id }}" @if(get_filter_request('category_id', 'bulk_list_search') == $subCategory->id) selected="selected" @endif>{{ $subCategory->title }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @else
                                                <option value="{{ $category->id }}" @if(get_filter_request('category_id', 'bulk_list_search') == $category->id) selected="selected" @endif>{{ $category->title }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Subjects</label>
                                <select data-return_type="option"
                                        data-default_id="{{request()->get('subject_id')}}" data-chapter_id="{{get_filter_request('chapter_id', 'bulk_list_search')}}"
                                        class="ajax-courses-dropdown-filter year_subjects form-control select2 @error('subject_id') is-invalid @enderror"
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


                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="input-label">Topic</label>
                                <div class="select-holder">
                                    <select data-sub_chapter_id="{{get_filter_request('sub_chapter_id', 'bulk_list_search')}}" id="chapter_id"
                                            class="form-control populate ajax-chapter-dropdown-filter @error('chapter_id') is-invalid @enderror"
                                            name="chapter_id">
                                        <option value="">Please select year, subject</option>
                                    </select>
                                </div>

                                @error('chapter_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="input-label">Sub Topic</label>
                                <div class="select-holder">
                                    <select id="chapter_id"
                                            class="form-control populate ajax-subchapter-dropdown-filter @error('sub_chapter_id') is-invalid @enderror"
                                            name="sub_chapter_id">
                                        <option value="">Please select year, subject, Topic</option>
                                    </select>
                                </div>

                                @error('sub_chapter_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror


                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="input-label">Author</label>
                                <div class="select-holder">
                                    <select name="user_id" data-search-option="display_name" class="form-control "
                                            data-placeholder="Search author">

                                        <option value="">Select Author</option>
                                        @if(!empty($users_list) and $users_list->count() > 0)
                                            @foreach($users_list as $userObj)
                                                @php $checked = (get_filter_request('user_id', 'bulk_list_search') == $userObj->id)? 'selected' : ''; @endphp
                                                <option value="{{ $userObj->id }}" {{$checked}}>{{ $userObj->get_full_name() }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                            </div>
                        </div>


                        <div class="col-12 col-md-3 d-flex align-items-center justify-content-end">
                            <button type="submit" class="btn btn-primary w-100">{{ trans('admin/main.show_results') }}</button>

                        </div>
                    </form>
                </div>
                @php $saved_templates = $user->saved_templates;
			$saved_templates = json_decode( $saved_templates );
			$saved_templates = isset( $saved_templates->bulk_list_search )? $saved_templates->bulk_list_search : array();
                @endphp
                <div class="defined-searches mt-20" style="display:none">
                    <span><strong>Defined Searches:</strong></span>
                    @if( !empty( $saved_templates ) )
                        @foreach( $saved_templates  as $template_name => $template_data)
                            @php $template_array = json_decode($template_data);
						$url_params = '<span>'.$template_name.'</span>';
						if( isset( $template_array->url_params )){
							$url_params = '<a href="'.(string) url("").'/admin/topics_parts/?'.$template_array->url_params.'">'.$template_name.'</a>';
						}
                            @endphp
                            <span class="apply-template-field" data-form_id="topic_parts_search_form" data-template_type="bulk_list_search" data-template_data="{{$template_data}}"> {!! $url_params !!} <a href="javascript:;" data-template_name="{{$template_name}}" class="remove-template"><i class="fas fa-times"></i></a></span>
                        @endforeach
                    @endif
                    <button type="button" class="btn btn-success save-template" data-form_id="topic_parts_search_form" data-template_type="bulk_list_search" ><i class="fas fa-save"></i> Save Template</button>
                </div>
            </section>

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">

                        <div class="card-header">
                            <div class="columns-settings">
                                <div class="dropdown">
                                    <button class="dropdown-toggle" type="button" data-toggle="dropdown">
                                        <img src="/assets/default/svgs/grid-plus.svg">
                                    </button>
                                    <div class="dropdown-menu">
                                        <input type="text" class="search-input" id="searchInput" placeholder="Search by item..." onkeyup="filterColumns()">

                                        <h5>Shown Attributes</h5>
                                        <ul id="shownAttributes" class="column-list"></ul>

                                        <h5>Hidden Attributes</h5>
                                        <ul id="hiddenAttributes" class="column-list"></ul>

                                        <button class="btn btn-secondary w-100 mt-3" onclick="restoreDefault()">Restore Default</button>
                                        <button class="btn btn-primary w-100 mt-2" onclick="saveChanges()">Save Changes</button>
                                    </div>
                                </div>

                            </div>
                            @can('admin_topic_parts_create')
                                <div class="text-right">
                                    <a href="javascript:;" class="create-questions-bulk-list-btn btn btn-primary">Create Question Bulk List</a>
                                </div>
                            @endcan
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14" id="myTable">
                                    <tr id="tableHeader">
                                        <th class="text-left">Category</th>
                                        <th class="text-left">Type</th>
                                        <th class="text-left">Generated / Waiting / Rejected</th>
                                        <th class="text-left">Added by</th>
                                        <th class="text-left">Added Date</th>
                                        <th>{{ trans('admin/main.actions') }}</th>
                                    </tr>

                                    @foreach($QuestionsBulkLists as $QuestionsBulkListObj)

                                        <tr>
                                            <td data-id="category" class="text-left">{{ (isset($QuestionsBulkListObj->category->id))? $QuestionsBulkListObj->category->getTitleAttribute() : '-' }}
                                                <br>
                                                <small>
                                                    {{ (isset($QuestionsBulkListObj->subject->id))? $QuestionsBulkListObj->subject->getTitleAttribute() : '-' }} /
                                                    {{ (isset($QuestionsBulkListObj->chapter->id))? $QuestionsBulkListObj->chapter->getTitleAttribute() : '-' }} /
                                                    {{ (isset($QuestionsBulkListObj->subChapter->id))? $QuestionsBulkListObj->subChapter->sub_chapter_title : '-' }}
                                                </small>
                                            </td>
                                            <td class="text-left" data-id="list_type">{{ $QuestionsBulkListObj->list_type }}</td>
                                            <td class="text-left" data-id="generated_questions">{{ $QuestionsBulkListObj->generated_questions }} / {{ $QuestionsBulkListObj->waiting_questions }} / {{ $QuestionsBulkListObj->rejected_questions }}</td>
                                            <td class="text-left" data-id="user">{{ $QuestionsBulkListObj->user->get_full_name() }}</td>
                                            <td class="text-left" data-id="created_at">{{ dateTimeFormat($QuestionsBulkListObj->created_at, 'j M y | H:i') }}</td>
                                            <td data-id="action">
                                                @can('admin_topic_parts_edit')
                                                    @if($QuestionsBulkListObj->status == 'active')

                                                        <a href="/admin/questions-generator/add-prompt/{{ $QuestionsBulkListObj->id }}" class="btn-transparent btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="Add Prompt">
                                                            <i class="fas fa-plus-circle"></i>
                                                        </a>&nbsp;&nbsp;&nbsp;
                                                        <a href="/admin/questions-generator/add-response/{{ $QuestionsBulkListObj->id }}" class="btn-transparent btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="Import Questions">
                                                            <i class="fas fa-download"></i>
                                                        </a>&nbsp;&nbsp;&nbsp;

                                                        <a href="/admin/questions-generator/view-api-response/{{ $QuestionsBulkListObj->id }}" class="btn-transparent btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="Questions List">
                                                            <i class="fas fa-sitemap"></i>
                                                        </a>

                                                    @endif
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach

                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            {{ $QuestionsBulkLists->links() }}
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-box">
                        <h3 class="font-20 font-weight-bold text-dark mb-10">Save Form</h3>
                        <p class="mb-15 font-16">
                            <input type="text" name="template_name" class="template_name form-control">
                        </p>
                        <input type="hidden" name="form_data_encoded" class="form_data_encoded">
                        <input type="hidden" name="template_type" class="template_type">
                        <input type="hidden" name="form_id" class="form_id">

                        <div class="inactivity-controls">
                            <a href="javascript:;" class="continue-btn save-template-btn button btn btn-primary">Save Form</a>
                            <!-- <a href="javascript:;" class="close" data-dismiss="modal" aria-label="Continue">Close</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="questions_bulk_list" class="questions_bulk_list modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-xl">
            <div class="modal-content edit-quest-modal-div container">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-box">
                        <form action="/admin/questions-generator/generate-bulk-list" method="POST" id="generate-bulk-list-form" class="px-25 generate-bulk-list-form">
                            @csrf

                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <h2 class="font-20 font-weight-bold mb-15">Generate Bulk Questions List</h2>
                                        </div>

                                        <div class="col-md-3 col-lg-3">
                                            <div class="form-group ">
                                                <label class="input-label d-block">Quiz Title</label>
                                                <input type="text" name="quiz_title" class="form-control rurera-req-field">
                                            </div>
                                        </div>



                                        <div class="col-md-3 col-lg-3">
                                            <div class="form-group ">
                                                <label class="input-label d-block">Quiz Slug</label>
                                                <input type="text" name="quiz_slug" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 col-lg-3">
                                            <div class="form-group ">
                                                <label class="input-label d-block">Auto Generated Questions</label>
                                                <select name="mock_type"
                                                        class="form-control conditional_field_parent" data-placeholder="Select Type">
                                                    <option data-target_common_class="practice_type_fields" data-target_field_class="mock_practice_fields" value="mock_practice">Yes</option>
                                                    <option data-target_common_class="practice_type_fields" data-target_field_class="" value="mock_exam">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-3">
                                            <div class="form-group">
                                                <label class="input-label">Exam Category</label>
                                                <select name="list_sub_type" data-plugin-selectTwo class="form-control populate list_sub_type ">
                                                    <option value="sats">Sats</option>
                                                    <option value="11plus">11plus</option>
                                                    <option value="independent_exams">Independent Exams</option>
                                                    <option value="iseb">Iseb</option>
                                                    <option value="cat4">Cat 4</option>
                                                </select>
                                            </div>
                                        </div>




                                        <div class="col-md-12 col-lg-12">
                                            <div class="form-group quiz-image-group">
                                                <label class="input-label d-block mb-3">Quiz Image</label>

                                                <div class="d-flex align-items-center gap-3">


                                                    <!-- Upload Button (Your Existing Button) -->
                                                    <button
                                                        type="button"
                                                        class="btn upload-btn rurera-file-manager"
                                                        data-input="image"
                                                        data-preview="preview_img-image"
                                                        data-image_attr='{
																					"upload_type":"gallery",
																					"upload_dir":"public",
																					"upload_path":"/quiz",
																					"is_multiple":false,
																					"preview_div":"preview_img-image",
																					"hidden_field":"<input name=\"quiz_image\" type=\"hidden\" id=\"quiz_image\" placeholder=\"Upload Image\">",
																					"field_name":"quiz_image"
																				}'
                                                        data-gallery_fields='{"gallery_type":"gallery","folder_name":"quiz"}'
                                                    >
                                                        <i class="fa fa-upload me-2"></i> Upload Image
                                                    </button>

                                                    <!-- Remove Button -->

                                                    <button type="button" class="btn remove-btn" id="remove-quiz-image">
                                                        <i class="fa fa-trash me-2"></i> Remove
                                                    </button>
                                                </div>

                                                <!-- Preview -->
                                                <div class="preview_img-image mt-3"></div>

                                                <!-- Hidden Field -->
                                                <input name="quiz_image" type="hidden" id="quiz_image">

                                                <!-- Support Text -->
                                                <small class="text-muted d-block mt-2">
                                                    Supports Only: PNG, JPEG, JPG (Under 500KB)
                                                </small>
                                            </div>


                                            <div class="form-group rurera-hide">
                                                <label class="input-label">Quiz Image</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button
                                                            type="button"
                                                            class="input-group-text rurera-file-manager"
                                                            data-input="image"
                                                            data-preview="preview_img-image"
                                                            data-image_attr='{
																						"upload_type":"gallery",
																						"upload_dir":"public",
																						"upload_path":"/quiz",
																						"is_multiple":false,
																						"preview_div":"preview_img-image",
																						"hidden_field":"<input name=\"quiz_image\" type=\"hidden\" id=\"quiz_image\" placeholder=\"Upload Image\">",
																						"field_name":"quiz_image"
																					}'
                                                            data-gallery_fields='{"gallery_type":"gallery","folder_name":"quiz"}'
                                                        >
                                                            <i class="fa fa-upload"></i>
                                                        </button>
                                                        <div class="preview_img-image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="questions_bulk_list-tabs">
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="questions_bulk2-tab" data-toggle="tab" data-target="#questions_bulk2" type="button" role="tab" aria-controls="questions_bulk2" aria-selected="false">Sections</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="questions_bulk1-tab" data-toggle="tab" data-target="#questions_bulk1" type="button" role="tab" aria-controls="questions_bulk1" aria-selected="true">Questions bulk Tab 1</button>
                                                    </li>

                                                </ul>
                                                <div class="tab-content" id="myTabContent">
													<div class="container">
														<div class="tab-pane fade " id="questions_bulk1" role="tabpanel" aria-labelledby="questions_bulk1-tab">
															<div class="row">
																<div class="col-md-4 col-lg-4 ">
																	<div class="form-group">
																		<label class="input-label">{{trans('admin/main.category')}}</label>
																		<select name="category_id" data-plugin-selectTwo class="rurera-req-field form-control populate ajax-category-courses" data-course_id="" data-next_index="subject_id" data-next_value="">
																			<option value="">{{trans('admin/main.all_categories')}}</option>
																			@foreach($categories as $category)
																				@if(!empty($category->subCategories) and count($category->subCategories))
																					<optgroup label="{{  $category->title }}">
																						@foreach($category->subCategories as $subCategory)
																							<option value="{{ $subCategory->id }}">{{ $subCategory->title }}</option>
																						@endforeach
																					</optgroup>
																				@else
																					<option value="{{ $category->id }}">{{ $category->title }}</option>
																				@endif
																			@endforeach
																		</select>
																	</div>
																</div>

																<div class="col-md-12 col-lg-12 subjects-listing-data practice_type_fields mock_practice_fields">

																</div>
																<div class="col-12">
																	<div class="practice-quiz-topics-list practice_type_fields mock_practice_fields"></div>
																</div>

															</div>
														</div>
														<div class="tab-pane fade show active" id="questions_bulk2" role="tabpanel" aria-labelledby="profile-tab">



															<div class="d-flex flex-wrap align-items-center justify-content-between">
																<div class="mb-2">

																	<button class="btn btn-primary btn-sm ml-2" id="mockExam-addOneBtn">
																		+ Add Section
																	</button>
																</div>
															</div>



															<div class="mt-3">

																<div id="mockExam-sectionsContainer"></div>

																<div id="mockExam-noSectionsNote" class="mock-exam-empty-note mt-3" style="display:none;">
																	No sections yet. Click <b>Create multiple shortlist Sections</b> or <b>+ Add Section</b>.
																</div>
															</div>



															<!-- =========================
																HTML TEMPLATES (CLONE)
																========================= -->
															<div id="mockExam-templates">
																<!-- Item row template -->
																<div class="mockExam-tpl-item-row mock-exam-item-row d-flex align-items-center justify-content-between">
																	<div>
																		<div class="font-weight-600 mockExam-tpl-item-title"></div>
																		<div class="mock-exam-small-help mockExam-tpl-item-meta"></div>
																	</div>
																	<div class="d-flex align-items-center mockExam-tpl-item-actions">
																		<button type="button" class="btn btn-outline-primary mock-exam-icon-btn mockExam-tpl-plus-btn">+</button>
																		<button type="button" class="btn btn-outline-danger mock-exam-icon-btn ml-2 mock-exam-btn-remove-main mockExam-tpl-remove-btn">×</button>
																	</div>
																</div>

																<!-- Assigned item template -->
																<div class="mockExam-tpl-assigned-item mock-exam-assigned-item">
																	<div class="mockExam-tpl-assigned-title"></div>
																	<div class="mock-exam-rm mockExam-tpl-assigned-remove" title="Remove">×</div>
																</div>

																<!-- Section card template (builder modal + sections list) -->
																<div class="mockExam-tpl-section-card mock-exam-section-card mb-3" data-section-id="">
																	<div class="card-header d-flex align-items-center justify-content-between">
																		<div class="d-flex align-items-center">
																			<span class="mock-exam-drag-handle mr-2 text-muted" title="Drag to reorder">≡</span>
																			<span class="badge badge-light mock-exam-section-label-badge mr-2 mockExam-tpl-section-label"></span>
																			<span class="font-weight-600 mockExam-tpl-section-title"></span>
																		</div>
																		<div>
																			<button class="btn btn-sm btn-outline-secondary mr-2 mockExam-tpl-section-edit" type="button">Edit</button>
																			<button class="btn btn-sm btn-outline-danger mockExam-tpl-section-delete" type="button">Delete</button>
																		</div>
																	</div>

																	<div class="card-body">
																		<div class="row rurera-hide">
																			<div class="col-md-6">
																				<div class="mock-exam-small-help mb-1">Name</div>
																				<div class="mb-2 mockExam-tpl-section-name"></div>

																				<div class="mock-exam-small-help mb-1">Instructions</div>
																				<div class="mb-2 mockExam-tpl-section-instr"></div>
																			</div>

																			<div class="col-md-6">
																				<div class="d-flex">
																					<div class="mr-3">
																						<div class="mock-exam-small-help mb-1">No. of questions</div>
																						<div class="mb-2 mockExam-tpl-section-q"></div>
																					</div>
																					<div>
																						<div class="mock-exam-small-help mb-1">Time (mins)</div>
																						<div class="mb-2 mockExam-tpl-section-t"></div>
																					</div>
																				</div>

																				<hr class="my-2">

																				<div class="d-flex align-items-center justify-content-between">
																					<div>
																						<div class="mock-exam-small-help mb-1">Items in this section</div>
																						<div class="mock-exam-small-help">Use <b>+</b> on the main page to add items.</div>
																					</div>
																					<span class="mock-exam-pill"><span class="mockExam-tpl-section-count"></span> items</span>
																				</div>

																				<div class="mt-2 mockExam-tpl-section-items"></div>
																			</div>
																		</div>
																		<div class="mock-exam-section-table">
																			<table>
																				<thead>
																				<tr>
																					<th>
																					<div class="mock-exam-small-help mb-1">Name</div>
																					</th>
																					<th>
																					<div class="mock-exam-small-help mb-1">Instructions</div>
																					</th>
																					<th>
																					<div class="mock-exam-small-help mb-1">No. of questions</div>
																					</th>
																					<th>
																					<div class="mock-exam-small-help mb-1">Time (mins)</div>
																					</th>
																					<th>
																					<div class="mock-exam-small-help mb-1">Items in this section</div>
																					</th>
																				</tr>
																				</thead>
																				<tbody>
																				<tr>
																					<td>
																					<div class="mb-2 mockExam-tpl-section-name"></div>
																					</td>
																					<td>
																					<div class="mb-2 mockExam-tpl-section-instr"></div>
																					</td>
																					<td>
																					<div class="mb-2 mockExam-tpl-section-q"></div>
																					</td>
																					<td>
																					<div class="mb-2 mockExam-tpl-section-t"></div>
																					</td>
																					<td>
																					<div class="align-items-center justify-content-between rurera-hide">
																						<div>
																							<div class="mock-exam-small-help">Use <b>+</b> on the main page to add items.</div>
																						</div>
																						<span class="mock-exam-pill"><span class="mockExam-tpl-section-count"></span> items</span>
																					</div>
																					<div class="mockExam-tpl-section-items"></div>
																					</td>
																				</tr>
																				</tbody>
																			</table>
																		</div>
																	</div>
																</div>

																<!-- Assign modal section card template -->
																<div class="mockExam-tpl-assign-section mock-exam-section-card mb-3" data-section-id="">
																	<div class="card-header d-flex align-items-center justify-content-between">
																		<div>
																			<span class="badge badge-light mock-exam-section-label-badge mr-2 mockExam-tpl-assign-label"></span>
																			<span class="font-weight-600 mockExam-tpl-assign-title"></span>
																			<span class="mock-exam-pill ml-2"><span class="mockExam-tpl-assign-count"></span> items</span>
																		</div>
																		<button class="btn btn-sm mockExam-tpl-assign-btn" type="button">Add selected item</button>
																	</div>
																	<div class="card-body">
																		<div class="mock-exam-small-help mb-2 mockExam-tpl-assign-instr"></div>
																		<div class="mock-exam-small-help mb-2 mockExam-tpl-assign-meta"></div>
																		<div class="mockExam-tpl-assign-items"></div>
																	</div>
																</div>
															</div>
														</div>
													</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="inactivity-controls">
                                    <button type="submit" class="submit-btn mt-0">Generate List</button>
                                    <!-- <a href="javascript:;" class="close" data-dismiss="modal" aria-label="Continue">Close</a> -->
                                </div>
                                <form>
                            </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- MODAL 1: Sections Builder (FULL WIDTH) -->
        <div class="modal fade modal-fullwidth mock-exam-modal" id="mockExam-builderModal" tabindex="-1" role="dialog" aria-labelledby="mockExam-builderModalTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-3">
              <span class="mock-exam-icon-btn bg-light text-primary" style="border:1px solid #e9ecef;">
                <span style="font-size:20px; line-height:1;">+</span>
              </span>
                            </div>
                            <div>
                                <h5 class="modal-title mb-0" id="mockExam-builderModalTitle">Create new list</h5>
                                <div class="mock-exam-small-help">Create sections, sort them, edit/delete. Assign items from the main page.</div>
                            </div>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" id="mockExam-saveAndCloseBtn">Done</button>
                    </div>

                </div>
            </div>
        </div>

        <!-- MODAL 2: Assign Items (FULL WIDTH) -->
        <div class="modal fade modal-fullwidth mock-exam-modal" id="mockExam-assignModal" tabindex="-1" role="dialog" aria-labelledby="mockExam-assignModalTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <div>
                            <h5 class="modal-title mb-0" id="mockExam-assignModalTitle">Assign item to a section</h5>
                            <div class="mock-exam-small-help">Choose a section to add the selected item. Items can only belong to one section at a time.</div>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="align-items-start justify-content-between flex-wrap rurera-hide">
                            <div class="mb-2">
                                <div class="mock-exam-muted">Selected item</div>
                                <h5 id="mockExam-selectedItemTitle" class="mb-1">None</h5>
                                <div id="mockExam-selectedItemAssignedNote" class="mock-exam-small-help" style="display:none;"></div>
                            </div>
                            <div class="mb-2">
                                <span class="mock-exam-pill">Total sections: <span id="mockExam-assignSectionsCount">0</span></span>
                            </div>
                        </div>

                        <hr class="rurera-hide">

                        <div id="mockExam-assignSectionsList"></div>

                        <div id="mockExam-assignNoSections" class="mock-exam-empty-note mt-3" style="display:none;">
                            No sections created yet. Open <b>List Builder</b> and create sections first.
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" id="mockExam-assignDoneBtn">Done</button>
                    </div>

                </div>
            </div>
        </div>

        <!-- MODAL 3: Add/Edit Section (SMALL NESTED MODAL) -->
        <div class="modal fade modal-sm2 mock-exam-modal" id="mockExam-sectionFormModal" tabindex="-1" role="dialog" aria-labelledby="mockExam-sectionFormTitle" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="mockExam-sectionFormTitle">Add Section</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <!-- Single mode -->
                        <div id="mockExam-singleModeFields">
                            <div class="form-group">
                                <label>Section name</label>
                                <input type="text" class="form-control" id="mockExam-secName" placeholder="Enter section name">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>No. of questions</label>
                                    <input type="number" min="0" class="form-control" id="mockExam-secQuestions" placeholder="e.g. 10">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Time (mins)</label>
                                    <input type="number" min="0" class="form-control" id="mockExam-secTime" placeholder="e.g. 15">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Instructions</label>
                                <textarea id="mockExam-secInstructions" class="form-control"></textarea>
                            </div>
                        </div>

                        <!-- Bulk mode -->
                        <div id="mockExam-bulkModeFields" style="display:none;">
                            <div class="alert alert-info small mb-3">
                                This will create multiple sections at once. Names will be generated like: <b>Prefix 1</b>, <b>Prefix 2</b>, ...
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>How many?</label>
                                    <input type="number" min="1" class="form-control" id="mockExam-bulkCount" value="3">
                                </div>
                                <div class="form-group col-md-8">
                                    <label>Name prefix</label>
                                    <input type="text" class="form-control" id="mockExam-bulkPrefix" placeholder="e.g. Section" value="Section">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>No. of questions</label>
                                    <input type="number" min="0" class="form-control" id="mockExam-bulkQuestions" placeholder="e.g. 10">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Time (mins)</label>
                                    <input type="number" min="0" class="form-control" id="mockExam-bulkTime" placeholder="e.g. 15">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Instructions</label>
                                <textarea id="mockExam-bulkInstructions" class="form-control"></textarea>
                            </div>
                        </div>

                        <div id="mockExam-formError" class="text-danger small" style="display:none;"></div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" id="mockExam-formSaveBtn">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL 3: Add/Edit Section (SMALL NESTED MODAL) -->
        <div class="modal fade modal-sm2 mock-exam-modal" id="mockExam-sectionFormModal" tabindex="-1" role="dialog" aria-labelledby="mockExam-sectionFormTitle" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="mockExam-sectionFormTitle">Add Section</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <!-- Single mode -->
                        <div id="mockExam-singleModeFields">
                            <div class="form-group">
                                <label>Section name</label>
                                <input type="text" class="form-control" id="mockExam-secName" placeholder="Enter section name">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>No. of questions</label>
                                    <input type="number" min="0" class="form-control" id="mockExam-secQuestions" placeholder="e.g. 10">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Time (mins)</label>
                                    <input type="number" min="0" class="form-control" id="mockExam-secTime" placeholder="e.g. 15">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Instructions</label>
                                <textarea id="mockExam-secInstructions" class="form-control"></textarea>
                            </div>
                        </div>

                        <!-- Bulk mode -->
                        <div id="mockExam-bulkModeFields" style="display:none;">
                            <div class="alert alert-info small mb-3">
                                This will create multiple sections at once. Names will be generated like: <b>Prefix 1</b>, <b>Prefix 2</b>, ...
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>How many?</label>
                                    <input type="number" min="1" class="form-control" id="mockExam-bulkCount" value="3">
                                </div>
                                <div class="form-group col-md-8">
                                    <label>Name prefix</label>
                                    <input type="text" class="form-control" id="mockExam-bulkPrefix" placeholder="e.g. Section" value="Section">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>No. of questions</label>
                                    <input type="number" min="0" class="form-control" id="mockExam-bulkQuestions" placeholder="e.g. 10">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Time (mins)</label>
                                    <input type="number" min="0" class="form-control" id="mockExam-bulkTime" placeholder="e.g. 15">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Instructions</label>
                                <textarea id="mockExam-bulkInstructions" class="form-control"></textarea>
                            </div>
                        </div>

                        <div id="mockExam-formError" class="text-danger small" style="display:none;"></div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" id="mockExam-formSaveBtn">Save</button>
                    </div>
                </div>
            </div>
        </div>
        @endsection

        @push('scripts_bottom')

            <script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
            <script src="/assets/vendors/summernote/summernote-table-headers.js"></script>

            <script>
                $(document).ready(function () {

                    $(".summernote-editor").summernote({
                        dialogsInBody: true,
                        tabsize: 2,
                        //height: $(".summernote-editor").attr('data-height') ?? 250,
                        height: null,
                        minHeight: 150,
                        maxHeight: 400,
                        fontNames: [],
                        toolbar: [
                            ['style', ['style']],
                            ['font', ['bold', 'underline']],
                            ['para', ['paragraph', 'ul', 'ol']],
                            ['table', ['table']],
                            ['insert', ['link']],
                            ['history', ['undo']],
                        ],
                        buttons: {
                            //lfm: LFMButton
                        },
                        callbacks: {
                            onPaste: function (e) {
                                e.preventDefault();

                                var clipboardData = (e.originalEvent || e).clipboardData || window.clipboardData;
                                var pastedData = clipboardData.getData('text/html') || clipboardData.getData('text/plain');

                                // Create a temporary DOM element to parse the HTML
                                var tempDiv = document.createElement('div');
                                tempDiv.innerHTML = pastedData;

                                // Remove all tags except <strong> and <table> with children, but retain the text content
                                tempDiv.querySelectorAll("*:not(p):not(h1):not(h2):not(h3):not(h4):not(h5):not(h6):not(ul):not(ol):not(li):not(strong):not(table):not(tbody):not(tr):not(td):not(th)").forEach(node => {
                                    // Replace each disallowed element with its text content
                                    const textNode = document.createTextNode(node.textContent);
                                    node.replaceWith(textNode);
                                });

                                // Remove attributes from <table> and its child tags
                                tempDiv.querySelectorAll("table, td, th, tr").forEach(node => {
                                    for (let attr of node.attributes) {
                                        node.removeAttribute(attr.name);
                                    }
                                });

                                // Insert the cleaned HTML into the editor
                                document.execCommand('insertHTML', false, tempDiv.innerHTML);
                            }
                        }
                    });

                    $(document).on('change', '.mock-practice-data', function () {
                        var course_id = $(this).val();
                        var chapter_id = $(this).attr('data-chapter_id');
                        var category_id = $(".ajax-category-courses").val();
                        var quiz_id = 0;

                        $.ajax({
                            type: "GET",
                            url: '/admin/webinars/mock_practice_data',
                            data: {'subject_id': course_id, 'category_id': category_id, 'quiz_id': quiz_id},
                            success: function (return_data) {
                                $(".mock-practice-data-block").html(return_data);
                            }
                        });
                    });


                    $(document).on('input change', '.rurera-req-field1', function() {
                        var thisForm = $('.generate-bulk-list-form');
                        rurera_validation_process(thisForm);
                    });
                    $(document).on('submit', '.generate-bulk-list-form', function() {
                        var thisForm = $(this);
                        returnType = rurera_validation_process(thisForm);
                        if (returnType == false) {
                            return false;
                        }


                        var quiz_id = $(".quiz_id").val();
                        console.log(quiz_id);
                        if(quiz_id > 0){
                            return true;
                        }else{
                            returnType = rurera_validation_process(thisForm);
                            if (returnType == false) {
                                return false;
                            }
                        }
                        return true;

                    });

                    const defaultColumns = [
                        { id: 'category', text: 'Category', visible: true },
                        { id: 'list_type', text: 'Type', visible: true },
                        { id: 'generated_questions', text: 'Generated / Waiting / Rejected', visible: true },
                        { id: 'user', text: 'Added by', visible: true },
                        { id: 'created_at', text: 'Added Date', visible: true },
                        { id: 'action', text: 'Action', visible: true }
                    ];

                    let columns = $.extend(true, [], defaultColumns); // Deep copy of default columns
                    const $shownAttributes = $('#shownAttributes');
                    const $hiddenAttributes = $('#hiddenAttributes');
                    const $tableHeader = $('#tableHeader');
                    const $searchInput = $('#searchInput');
                    let currentOrder = columns.map(col => col.id);

                    function renderTableHeaders() {
                        $tableHeader.empty();
                        columns.forEach(col => {
                            const $th = $('<th>').text(col.text).data('id', col.id);
                            $th.toggleClass('hidden-column', !col.visible);
                            $tableHeader.append($th);
                        });

                        $('#myTable tbody tr').each(function () {
                            $(this).children().each(function (index) {
                                $(this).toggleClass('hidden-column', !columns[index].visible);
                            });
                        });
                    }

                    function renderColumnLists() {
                        $shownAttributes.empty();
                        $hiddenAttributes.empty();

                        columns.forEach(col => {
                            const $li = $('<li>').addClass('toggle-switch').data('id', col.id).attr('draggable', true);
                            const $label = $('<span>').text(col.text);
                            const $toggle = $('<input>').attr('type', 'checkbox').prop('checked', col.visible);
                            const $dragHandle = $('<span>').text('☰').addClass('drag-handle');

                            $toggle.change(() => toggleColumnVisibility(col.id));
                            $li.append($dragHandle, $label, $toggle);

                            if (col.visible) {
                                $shownAttributes.append($li);
                            } else {
                                $hiddenAttributes.append($li);
                            }

                            $li.on('dragstart', handleDragStart)
                                .on('dragover', handleDragOver)
                                .on('drop', handleDrop)
                                .on('dragend', handleDragEnd);
                        });
                    }

                    let draggedItem = null;

                    function handleDragStart(event) {
                        draggedItem = $(event.target);
                        event.originalEvent.dataTransfer.effectAllowed = 'move';
                        setTimeout(() => draggedItem.addClass('dragging'), 0);
                    }

                    function handleDragOver(event) {
                        event.preventDefault();
                        const $target = $(event.target).closest('li');
                        if ($target.length && $target[0] !== draggedItem[0]) {
                            const bounding = $target[0].getBoundingClientRect();
                            const offset = event.originalEvent.clientY - bounding.top;
                            if (offset > bounding.height / 2) {
                                $target.after(draggedItem);
                            } else {
                                $target.before(draggedItem);
                            }
                        }
                    }

                    function handleDrop(event) {
                        event.preventDefault();
                        draggedItem.removeClass('dragging');
                        updateCurrentOrder();
                        renderTableHeaders();
                    }

                    function handleDragEnd() {
                        draggedItem = null;
                    }

                    function toggleColumnVisibility(id) {
                        const col = columns.find(col => col.id === id);
                        col.visible = !col.visible;
                        renderTableHeaders();
                        renderColumnLists();
                    }

                    function updateCurrentOrder() {
                        currentOrder = $shownAttributes.children('li').map((_, li) => $(li).data('id')).get();
                        columns.sort((a, b) => currentOrder.indexOf(a.id) - currentOrder.indexOf(b.id));
                    }

                    function filterColumns() {
                        const filter = $searchInput.val().toLowerCase();
                        columns.forEach(col => {
                            const $li = $(`li[data-id="${col.id}"]`);
                            if (col.text.toLowerCase().includes(filter)) {
                                $li.show();
                            } else {
                                $li.hide();
                            }
                        });
                    }

                    function restoreDefault() {
                        columns = $.extend(true, [], defaultColumns); // Reset to default columns
                        currentOrder = defaultColumns.map(col => col.id); // Reset to default order
                        renderTableHeaders();
                        renderColumnLists();

                        const visibleColumns = columns.filter(col => col.visible).map(col => col.id);
                        const hiddenColumns = columns.filter(col => !col.visible).map(col => col.id);
                        $('#output').html(`
				<p>Visible Columns (Default): ${visibleColumns.join(', ')}</p>
				<p>Hidden Columns (Default): ${hiddenColumns.join(', ')}</p>
				<p>Current Order (Default): ${currentOrder.join(', ')}</p>
			`);
                    }

                    function saveChanges() {
                        const visibleColumns = columns.filter(col => col.visible).map(col => col.id);
                        const hiddenColumns = columns.filter(col => !col.visible).map(col => col.id);
                        $('#output').html(`
				<p>Visible Columns: ${visibleColumns.join(', ')}</p>
				<p>Hidden Columns: ${hiddenColumns.join(', ')}</p>
				<p>Current Order: ${currentOrder.join(', ')}</p>
			`);
                    }

                    $searchInput.on('input', filterColumns);
                    $('#restoreDefault').on('click', restoreDefault);
                    $('#saveChanges').on('click', saveChanges);

                    renderTableHeaders();
                    renderColumnLists();






                    function calculateTotalRange() {
                        let totalMin = 0;
                        let totalMax = 0;

                        $('.mock_practice_questions').each(function () {
                            let value = $(this).val().trim();

                            if (value !== '') {

                                if (value.indexOf('-') !== -1) {
                                    let parts = value.split('-');
                                    let min = parseInt(parts[0]) || 0;
                                    let max = parseInt(parts[1]) || 0;

                                    totalMin += min;
                                    totalMax += max;
                                } else {
                                    let number = parseInt(value) || 0;
                                    totalMin += number;
                                    totalMax += number;
                                }
                            }
                        });

                        return { min: totalMin, max: totalMax };
                    }


// Show min/max info dynamically
                    function updateRangeInfo() {
                        let totals = calculateTotalRange();

                        $('.question-range-info').html(
                            "Allowed range: <strong>" + totals.min + "</strong> to <strong>" + totals.max + "</strong> questions"
                        );
                    }


// Validate only on blur (NOT while typing)
                    $('input[name="no_of_questions"]').on('blur', function () {

                        let totals = calculateTotalRange();
                        let enteredValue = parseInt($(this).val());

                        $('.question-error').hide();

                        if (!enteredValue) return;

                        if (enteredValue < totals.min) {
                            $('.question-error')
                                .text("Minimum allowed questions is " + totals.min)
                                .show();
                        }

                        if (enteredValue > totals.max) {
                            $('.question-error')
                                .text("Maximum allowed questions is " + totals.max)
                                .show();
                        }
                    });

                });

            </script>
            <script type="text/javascript">

                $(document).ready(function () {



                    $(document).on('click', '.create-questions-bulk-list-btn', function () {
                        $(".questions_bulk_list").modal('show');
                    });

                    $(document).on('change', '.ajax-category-courses', function () {
                        var category_id = $(this).val();
                        var course_id = $(this).attr('data-course_id');
                        $.ajax({
                            type: "GET",
                            url: '/admin/webinars/courses_by_categories_list',
                            data: {'category_id': category_id, 'course_id': course_id},
                            success: function (return_data) {
                                $(".subjects-listing-data").html(return_data);
                            }
                        });
                    });

                    $('body').on('change', '.assignment_subject_check', function (e) {
                        var subject_id = $(this).val();
                        var category_id = $('.ajax-category-courses').val();
                        var thisObj = $(this);
                        rurera_loader($(".practice-quiz-topics-list"), 'div');
                        jQuery.ajax({
                            type: "GET",
                            url: '/admin/common/topics_subtopics_by_subject',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {"subject_id": subject_id, 'category_id': category_id},
                            success: function (return_data) {
                                rurera_remove_loader($(".practice-quiz-topics-list"), 'button');
                                $(".practice-quiz-topics-list").html(return_data);

                                document.querySelectorAll('.range-container').forEach((container) => {
                                    const rangeMinValue = container.querySelector('.range-input#range-min-value');
                                    const rangeMaxValue = container.querySelector('.range-input#range-max-value');
                                    const inputMinValue = container.querySelector('.range-input-text#input-min-value');
                                    const inputMaxValue = container.querySelector('.range-input-text#input-max-value');
                                    const rangeElement = container.querySelector('.range');

                                    const MIN_VALUE = 0;
                                    const MAX_VALUE = 100;

                                    function valueToPercentage(value) {
                                        return (value / MAX_VALUE) * 100;
                                    }

                                    function percentageToValue(percentage) {
                                        return Math.round((percentage / 100) * MAX_VALUE);
                                    }

                                    function setThumbPosition(thumbType, percentage) {
                                        const cssVar =
                                            thumbType === 'min' ? '--min-thumb-percent' : '--max-thumb-percent';
                                        rangeElement.style.setProperty(cssVar, percentage);
                                    }

                                    function getThumbPosition(thumbType) {
                                        const cssVar =
                                            thumbType === 'min' ? '--min-thumb-percent' : '--max-thumb-percent';
                                        return rangeElement.style.getPropertyValue(cssVar);
                                    }

                                    function validateAndSetValue(input, value, minValue, maxValue) {
                                        if (value < minValue) {
                                            input.value = minValue;
                                        } else if (value > maxValue) {
                                            input.value = maxValue;
                                        }
                                        return parseInt(input.value);
                                    }

                                    function sanitizeInputValue(input) {
                                        if (!/^\d+$/.test(input.value)) {
                                            input.value = input.value.replace(/[^0-9]/g, '');
                                        }
                                    }

                                    inputMinValue.addEventListener('input', function () {
                                        sanitizeInputValue(this);

                                        const maxValue = parseInt(inputMaxValue.value) || MAX_VALUE;
                                        const value = validateAndSetValue(
                                            this,
                                            parseInt(this.value) || MIN_VALUE,
                                            MIN_VALUE,
                                            MAX_VALUE
                                        );

                                        if (value >= maxValue) {
                                            this.value = maxValue - 1;
                                        }

                                        const percentage = valueToPercentage(parseInt(this.value));

                                        if (!isNaN(value)) {
                                            rangeMinValue.value = percentage;
                                            setThumbPosition('min', percentage);
                                        }
                                    });

                                    inputMaxValue.addEventListener('input', function () {
                                        sanitizeInputValue(this);

                                        const minValue = parseInt(inputMinValue.value) || MIN_VALUE;
                                        const value = validateAndSetValue(
                                            this,
                                            parseInt(this.value),
                                            minValue + 1,
                                            MAX_VALUE
                                        );
                                        const percentage = valueToPercentage(parseInt(this.value));

                                        if (!isNaN(value)) {
                                            rangeMaxValue.value = percentage;
                                            setThumbPosition('max', percentage);
                                        }
                                    });

                                    rangeMinValue.addEventListener('input', function () {
                                        const maxThumbPercent = getThumbPosition('max');

                                        if (parseInt(this.value) >= parseInt(maxThumbPercent)) {
                                            this.value = maxThumbPercent;
                                        }

                                        const percentage = parseInt(this.value);
                                        const value = percentageToValue(percentage);

                                        inputMinValue.value = value;
                                        setThumbPosition('min', percentage);
                                    });

                                    rangeMaxValue.addEventListener('input', function () {
                                        const minThumbPercent = getThumbPosition('min');

                                        if (parseInt(this.value) <= parseInt(minThumbPercent)) {
                                            this.value = minThumbPercent;
                                        }

                                        const percentage = parseInt(this.value);
                                        const value = percentageToValue(percentage);

                                        inputMaxValue.value = value;
                                        setThumbPosition('max', percentage);
                                    });

                                    // Initialize positions
                                    rangeMinValue.dispatchEvent(new Event('input'));
                                    rangeMaxValue.dispatchEvent(new Event('input'));
                                });



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
                            data: {'chapter_id': chapter_id, 'sub_chapter_id': sub_chapter_id,  'disabled_items': disabled_items},
                            success: function (return_data) {
                                $(".ajax-subchapter-dropdown").html(return_data);
                            }
                        });
                    });
                    $(".ajax-category-courses").change();


                    //Filters

                    $(document).on('change', '.ajax-category-courses-filter', function () {
                        var category_id = $(this).val();
                        var course_id = $(this).attr('data-course_id');
                        $.ajax({
                            type: "GET",
                            url: '/admin/webinars/courses_by_categories',
                            data: {'category_id': category_id, 'course_id': course_id},
                            success: function (return_data) {
                                $(".ajax-courses-dropdown-filter").html(return_data);
                                $(".ajax-chapter-dropdown-filter").html('<option value="">Please select year, subject</option>');
                                $('.ajax-courses-dropdown-filter').change();
                            }
                        });
                    });

                    $(document).on('change', '.ajax-courses-dropdown-filter', function () {
                        var course_id = $(this).val();
                        var chapter_id = $(this).attr('data-chapter_id');

                        $.ajax({
                            type: "GET",
                            url: '/admin/webinars/chapters_by_course',
                            data: {'course_id': course_id, 'chapter_id': chapter_id},
                            success: function (return_data) {
                                $(".ajax-chapter-dropdown-filter").html(return_data);
                                $('.ajax-chapter-dropdown-filter').change();
                            }
                        });
                    });

                    $(document).on('change', '.ajax-chapter-dropdown-filter', function () {
                        var chapter_id = $(this).val();
                        var sub_chapter_id = $(this).attr('data-sub_chapter_id');
                        var disabled_items = $(this).attr('data-disabled');
                        $.ajax({
                            type: "GET",
                            url: '/admin/webinars/sub_chapters_by_chapter',
                            data: {'chapter_id': chapter_id, 'sub_chapter_id': sub_chapter_id,  'disabled_items': disabled_items},
                            success: function (return_data) {
                                $(".ajax-subchapter-dropdown-filter").html(return_data);
                            }
                        });
                    });
                    $(".ajax-category-courses-filter").change();


                    $(document).on('change', '.conditional-field', function () {
                        $(".conditional-child-fields").hide();
                        var child_value = $(this).val();
                        var selectedOption = $(this).find('option:selected');
                        var child_class = selectedOption.attr('data-child');
                        $('.'+child_class).show();
                    });

                    $(".list_type").change();
                    $(document).on('change', '.list_sub_type', function () {
                        var quiz_type = $(this).val();
                        var list_type = $(".list_type").val();
                        $.ajax({
                            type: "GET",
                            url: '/admin/webinars/get_quiz_by_type',
                            data: {'quiz_type': quiz_type, 'list_type': list_type},
                            success: function (return_data) {
                                $(".quiz-list").html(return_data);
                            }
                        });
                    });
                    $(".list_sub_type").change();

                    function applyRangeSlider(context) {

                        $(context).find(".rurera-range-selector").each(function () {

                            var $input = $(this);

                            // ⛔ prevent double init
                            if ($input.data("slider-initialized")) return;
                            $input.data("slider-initialized", true);

                            var minRange = parseInt($input.data("min")) || 0;
                            var maxRange = parseInt($input.data("max")) || 100;

                            var currentVal = $input.val() || "";
                            var parts = currentVal.split(/[\s-]+/).filter(Boolean);

                            var initialMin = parts.length ? parseInt(parts[0]) : minRange;
                            var initialMax = parts.length > 1 ? parseInt(parts[1]) : maxRange;

                            var $slider = $("<div>").addClass("rurera-slider-ui mb-3 mt-4");
                            $input.after($slider);

                            $slider.slider({
                                range: true,
                                min: minRange,
                                max: maxRange,
                                values: [initialMin, initialMax],
                                slide: function (e, ui) {
                                    $input.val(ui.values[0] + " - " + ui.values[1]);
                                }
                            });

                            $input.on("change", function () {
                                var parts = $(this).val().split(/[\s-]+/).filter(Boolean);

                                if (parts.length === 2) {
                                    var v1 = parseInt(parts[0]);
                                    var v2 = parseInt(parts[1]);

                                    if (!isNaN(v1) && !isNaN(v2)) {
                                        v1 = Math.max(minRange, v1);
                                        v2 = Math.min(maxRange, v2);
                                        if (v1 > v2) [v1, v2] = [v2, v1];

                                        $slider.slider("values", [v1, v2]);
                                        $(this).val(v1 + " - " + v2);
                                        return;
                                    }
                                }

                                var cur = $slider.slider("values");
                                $(this).val(cur[0] + " - " + cur[1]);
                            });
                        });
                    }

                    // 👉 Initial load
                    applyRangeSlider(document);

                    // 👉 After ANY ajax completes
                    $(document).ajaxComplete(function (event, xhr, settings) {
                        applyRangeSlider(document);
                    });

                });


            </script>


            <script>

                $(document).on('click', '.parent-filters', function () {
                    $('.parent-filters').removeClass('active');
                    $('.parent-filters').find('.active-tick').remove();
                    $(this).addClass('active');
                    var filter_html = $(this).html();
                    $(this).html('<span class="active-tick">✓</span> '+filter_html);

                    var selectedLevel = $('.performance-level-selection').val();
                    var id = $(this).attr('data-id');

                    $('.listing-data-row').each(function () {
                        var rowLevel = $(this).data('level_type');
                        var parent_id = $(this).attr('data-parent_id');

                        // Show all if "all" selected
                        if (selectedLevel === 'all' && (id == 'all' || id == parent_id)) {
                            $(this).removeClass('rurera-hide');
                        }
                        // Match selected level
                        else if (rowLevel === selectedLevel && (id == 'all' || id == parent_id)) {
                            $(this).removeClass('rurera-hide');
                        }
                        // Hide others
                        else {
                            $(this).addClass('rurera-hide');
                        }
                    });





                });
            </script>
            <script>
                $(document).on('hidden.bs.modal', function () {
                    if ($('.modal.show').length > 0) {
                        $('body').addClass('modal-open');
                    }
                });
            </script>




            <script>
                /**
                 * window.mockExam
                 * IMPORTANT: Item list is NOT rendered by JS. Items must exist in HTML.
                 * JS reads items from DOM and only updates UI state (enable/disable, assigned badges, etc).
                 */
                window.mockExam = (function($) {
                    const state = {
                        sections: [],
                        items: [],
                        selectedItemId: null,
                        sectionFormMode: "single",
                        editingSectionId: null
                    };

                    const $els = {};
                    const $tpl = {};
                    let sortable = null;

                    function cacheEls() {
                        $els.root = $("#mockExam-root");
                        $els.itemsList = $("#mockExam-itemsList");
                        $els.sectionsCountPill = $("#mockExam-sectionsCountPill");

                        $els.builderModal = $("#mockExam-builderModal");
                        $els.assignModal = $("#mockExam-assignModal");
                        $els.sectionFormModal = $("#mockExam-sectionFormModal");

                        $els.sectionsContainer = $("#mockExam-sectionsContainer");
                        $els.noSectionsNote = $("#mockExam-noSectionsNote");

                        $els.selectedItemTitle = $("#mockExam-selectedItemTitle");
                        $els.selectedItemAssignedNote = $("#mockExam-selectedItemAssignedNote");
                        $els.assignSectionsCount = $("#mockExam-assignSectionsCount");
                        $els.assignSectionsList = $("#mockExam-assignSectionsList");
                        $els.assignNoSections = $("#mockExam-assignNoSections");

                        $els.formError = $("#mockExam-formError");

                        $els.singleModeFields = $("#mockExam-singleModeFields");
                        $els.bulkModeFields = $("#mockExam-bulkModeFields");

                        $els.secName = $("#mockExam-secName");
                        $els.secQuestions = $("#mockExam-secQuestions");
                        $els.secTime = $("#mockExam-secTime");
                        $els.secInstructions = $("#mockExam-secInstructions");

                        $els.bulkCount = $("#mockExam-bulkCount");
                        $els.bulkPrefix = $("#mockExam-bulkPrefix");
                        $els.bulkQuestions = $("#mockExam-bulkQuestions");
                        $els.bulkTime = $("#mockExam-bulkTime");
                        $els.bulkInstructions = $("#mockExam-bulkInstructions");
                    }

                    function cacheTemplates() {
                        const $t = $("#mockExam-templates");
                        $tpl.assignedItem = $t.find(".mockExam-tpl-assigned-item").first();
                        $tpl.sectionCard = $t.find(".mockExam-tpl-section-card").first();
                        $tpl.assignSection = $t.find(".mockExam-tpl-assign-section").first();
                    }

                    function uid() { return "s_" + Math.random().toString(16).slice(2) + "_" + Date.now().toString(16); }
                    function sectionLabel(index, total) { return `Section ${index + 1}/${total}`; }

                    function stripHtml(html) {
                        const div = document.createElement("div");
                        div.innerHTML = String(html || "");
                        return (div.textContent || div.innerText || "").trim();
                    }

                    /** Read items from DOM (no JS rendering) */
                    function loadItemsFromDom() {
                        const items = [];
                        $els.itemsList.find("[data-mockexam-item-id]").each(function() {
                            const $row = $(this);
                            const id = String($row.attr("data-mockexam-item-id") || "").trim();
                            const title = String($row.attr("data-mockExam-item-title") || "").trim();
                            if (!id) return;
                            items.push({ id, title: title || id });
                        });
                        state.items = items;
                    }

                    function getSelectedItem() {
                        return state.items.find(i => i.id === state.selectedItemId) || null;
                    }

                    function findAssignedSection(itemId) {
                        for (let i = 0; i < state.sections.length; i++) {
                            const sec = state.sections[i];
                            if (sec.items.includes(itemId)) return { sectionId: sec.id, sectionIndex: i };
                        }
                        return null;
                    }

                    /** Update existing item rows in HTML (enable/disable +, show/hide remove, show assigned label) */
                    function refreshItemsUI() {
                        const total = state.sections.length;

                        $els.itemsList.find("[data-mockexam-item-id]").each(function() {
                            const $row = $(this);
                            const itemId = String($row.attr("data-mockexam-item-id") || "");
                            const assigned = findAssignedSection(itemId);
                            const label = assigned ? sectionLabel(assigned.sectionIndex, total) : "";

                            const $assignBtn = $row.find("[data-mockexam-action='assign']").first();
                            const $unassignBtn = $row.find("[data-mockexam-action='unassign']").first();
                            const $meta = $row.find(".mockExam-item-meta").first();

                            // base meta always has ID
                            const base = ``;

                            if (assigned) {
                                $assignBtn.prop("disabled", true).addClass("mock-exam-btn-disabled").attr("title", "Already assigned (remove first)");
                                $unassignBtn.removeClass("d-none");
                                $meta.html(`${base} • <span class="badge badge-success">Assigned</span> <span class="ml-1">${label}</span>`);
                            } else {
                                $assignBtn.prop("disabled", false).removeClass("mock-exam-btn-disabled").attr("title", "Shortlist (assign to section)");
                                $unassignBtn.addClass("d-none");
                                $meta.html(base);
                            }
                        });

                        $els.sectionsCountPill.text(String(state.sections.length));
                    }

                    /* =========================
                       Sections rendering (templates + clone)
                       ========================= */
                    function renderSections() {
                        $els.sectionsContainer.empty();

                        const total = state.sections.length;
                        $els.noSectionsNote.toggle(total === 0);

                        state.sections.forEach((sec, idx) => {
                            const $card = $tpl.sectionCard.clone(false, false);
                            $card.attr("data-section-id", sec.id);
                            $card.attr("data-mockexam-section-id", sec.id);

                            const label = sectionLabel(idx, total);
                            const instructionsPlain = stripHtml(sec.instructions || "");

                            $card.find(".mockExam-tpl-section-label").text(label);
                            $card.find(".mockExam-tpl-section-title").text(sec.name || "Untitled section");
                            $card.find(".mockExam-tpl-section-name").text(sec.name || "-");
                            $card.find(".mockExam-tpl-section-instr").text(instructionsPlain || "-");
                            $card.find(".mockExam-tpl-section-q").text(String(sec.numQuestions ?? "-"));
                            $card.find(".mockExam-tpl-section-t").text(String(sec.timeMins ?? "-"));
                            $card.find(".mockExam-tpl-section-count").text(String(sec.items.length));

                            const $itemsWrap = $card.find(".mockExam-tpl-section-items").empty();
                            if (!sec.items.length) {
                                $itemsWrap.append(`<div class="mock-exam-empty-note">No items added yet.</div>`);
                            } else {
                                sec.items.forEach(itemId => {
                                    const item = state.items.find(i => i.id === itemId);
                                    const $it = $tpl.assignedItem.clone(false, false);
                                    $it.attr("data-mockexam-item-id", itemId);
                                    $it.find(".mockExam-tpl-assigned-title").text(item ? item.title : itemId);
                                    $it.find(".mockExam-tpl-assigned-remove")
                                        .off("click.mockExam")
                                        .on("click.mockExam", () => removeItemFromSection(sec.id, itemId));
                                    $itemsWrap.append($it);
                                });
                            }

                            $card.find(".mockExam-tpl-section-delete")
                                .off("click.mockExam")
                                .on("click.mockExam", () => deleteSection(sec.id));
                            $card.find(".mockExam-tpl-section-edit")
                                .off("click.mockExam")
                                .on("click.mockExam", () => openEditSection(sec.id));

                            $els.sectionsContainer.append($card);
                        });

                        renderAssignModal();
                        refreshItemsUI();
                    }

                    function renderAssignModal() {
                        const selected = getSelectedItem();
                        $els.selectedItemTitle.text(selected ? selected.title : "None");

                        $els.selectedItemAssignedNote.hide().text("");
                        $els.assignSectionsList.empty();

                        const total = state.sections.length;
                        $els.assignSectionsCount.text(String(total));
                        $els.assignNoSections.toggle(total === 0);

                        const assigned = selected ? findAssignedSection(selected.id) : null;
                        if (selected && assigned) {
                            $els.selectedItemAssignedNote
                                .show()
                                .html(`This item is already assigned to <b>${sectionLabel(assigned.sectionIndex, total)}</b>. Remove it first to assign again.`);
                        }

                        state.sections.forEach((sec, idx) => {
                            const $wrap = $tpl.assignSection.clone(false, false);
                            $wrap.attr("data-section-id", sec.id);
                            $wrap.attr("data-mockexam-section-id", sec.id);

                            const label = sectionLabel(idx, total);
                            const isAssignedHere = assigned && assigned.sectionId === sec.id;
                            const isAssignedElsewhere = assigned && assigned.sectionId !== sec.id;

                            $wrap.find(".mockExam-tpl-assign-label").text(label);
                            $wrap.find(".mockExam-tpl-assign-title").text(sec.name || "Untitled section");
                            $wrap.find(".mockExam-tpl-assign-count").text(String(sec.items.length));
                            $wrap.find(".mockExam-tpl-assign-instr").text(stripHtml(sec.instructions || "") || "No instructions");
                            $wrap.find(".mockExam-tpl-assign-meta").html(
                                `Questions: <b>${String(sec.numQuestions ?? "-")}</b> • Time: <b>${String(sec.timeMins ?? "-")}</b> mins`
                            );

                            const $btn = $wrap.find(".mockExam-tpl-assign-btn");
                            $btn.off("click.mockExam").removeClass("btn-success btn-primary");

                            if (isAssignedHere) {
                                $btn.addClass("btn-success").text("Assigned here").prop("disabled", true);
                            } else if (!selected || isAssignedElsewhere) {
                                $btn.addClass("btn-primary").text("Add selected item").prop("disabled", true);
                            } else {
                                $btn.addClass("btn-primary").text("Add selected item").prop("disabled", false)
                                    .on("click.mockExam", () => addItemToSection(sec.id, selected.id));
                            }

                            const $secItems = $wrap.find(".mockExam-tpl-assign-items").empty();
                            if (!sec.items.length) {
                                $secItems.append(`<div class="mock-exam-empty-note">No items in this section.</div>`);
                            } else {
                                sec.items.forEach(itemId => {
                                    const item = state.items.find(i => i.id === itemId);
                                    const $it = $tpl.assignedItem.clone(false, false);
                                    $it.attr("data-mockexam-item-id", itemId);
                                    $it.find(".mockExam-tpl-assigned-title").text(item ? item.title : itemId);
                                    $it.find(".mockExam-tpl-assigned-remove")
                                        .off("click.mockExam")
                                        .on("click.mockExam", () => removeItemFromSection(sec.id, itemId));
                                    $secItems.append($it);
                                });
                            }

                            $els.assignSectionsList.append($wrap);
                        });
                    }

                    /* =========================
                       Form + summernote
                       ========================= */
                    function initSummernote($el) {
                        if ($el.data("summernote")) return;
                        $el.summernote({
                            height: 140,
                            toolbar: [
                                ['style', ['bold','italic','underline','clear']],
                                ['para', ['ul','ol','paragraph']],
                                ['insert', ['link']],
                                ['view', ['codeview']]
                            ]
                        });
                    }

                    function openAddSection() {
                        state.sectionFormMode = "single";
                        state.editingSectionId = null;

                        $("#mockExam-sectionFormTitle").text("Add Section");
                        $els.singleModeFields.show();
                        $els.bulkModeFields.hide();
                        $els.formError.hide().text("");

                        $els.secName.val("");
                        $els.secQuestions.val("");
                        $els.secTime.val("");

                        initSummernote($els.secInstructions);
                        $els.secInstructions.summernote("code", "");

                        $els.sectionFormModal.modal("show");
                    }

                    function openBulkSections() {
                        state.sectionFormMode = "bulk";
                        state.editingSectionId = null;

                        $("#mockExam-sectionFormTitle").text("Create Multiple Sections");
                        $els.singleModeFields.hide();
                        $els.bulkModeFields.show();
                        $els.formError.hide().text("");

                        $els.bulkCount.val(3);
                        $els.bulkPrefix.val("Section");
                        $els.bulkQuestions.val("");
                        $els.bulkTime.val("");

                        initSummernote($els.bulkInstructions);
                        $els.bulkInstructions.summernote("code", "");

                        $els.sectionFormModal.modal("show");
                    }

                    function openEditSection(sectionId) {
                        const sec = state.sections.find(s => s.id === sectionId);
                        if (!sec) return;

                        state.sectionFormMode = "edit";
                        state.editingSectionId = sectionId;

                        $("#mockExam-sectionFormTitle").text("Edit Section");
                        $els.singleModeFields.show();
                        $els.bulkModeFields.hide();
                        $els.formError.hide().text("");

                        $els.secName.val(sec.name || "");
                        $els.secQuestions.val(sec.numQuestions ?? "");
                        $els.secTime.val(sec.timeMins ?? "");

                        initSummernote($els.secInstructions);
                        $els.secInstructions.summernote("code", sec.instructions || "");

                        $els.sectionFormModal.modal("show");
                    }

                    function saveSectionForm() {
                        $els.formError.hide().text("");

                        if (state.sectionFormMode === "bulk") {
                            const count = Math.max(1, parseInt($els.bulkCount.val(), 10) || 1);
                            const prefix = ($els.bulkPrefix.val() || "Section").trim();
                            const q = ($els.bulkQuestions.val() || "").trim();
                            const t = ($els.bulkTime.val() || "").trim();
                            const instr = $els.bulkInstructions.summernote("code");

                            for (let i = 1; i <= count; i++) {
                                state.sections.push({
                                    id: uid(),
                                    name: `${prefix} ${i}`,
                                    numQuestions: (q === "" ? "" : Number(q)),
                                    timeMins: (t === "" ? "" : Number(t)),
                                    instructions: instr || "",
                                    items: []
                                });
                            }

                            $els.sectionFormModal.modal("hide");
                            renderSections();
                            return;
                        }

                        const name = ($els.secName.val() || "").trim();
                        if (!name) {
                            $els.formError.show().text("Section name is required.");
                            return;
                        }

                        const q = ($els.secQuestions.val() || "").trim();
                        const t = ($els.secTime.val() || "").trim();
                        const instr = $els.secInstructions.summernote("code");

                        const payload = {
                            name,
                            numQuestions: (q === "" ? "" : Number(q)),
                            timeMins: (t === "" ? "" : Number(t)),
                            instructions: instr || ""
                        };

                        if (state.sectionFormMode === "edit") {
                            const sec = state.sections.find(s => s.id === state.editingSectionId);
                            if (!sec) return;
                            sec.name = payload.name;
                            sec.numQuestions = payload.numQuestions;
                            sec.timeMins = payload.timeMins;
                            sec.instructions = payload.instructions;
                        } else {
                            state.sections.push({ id: uid(), ...payload, items: [] });
                        }

                        $els.sectionFormModal.modal("hide");
                        renderSections();
                    }

                    /* =========================
                       Assign actions
                       ========================= */
                    function openAssignForItem(itemId) {
                        state.selectedItemId = itemId;
                        renderAssignModal();
                        $els.assignModal.modal("show");
                    }

                    function deleteSection(sectionId) {
                        if (!confirm("Delete this section? Items in it will become unassigned.")) return;
                        state.sections = state.sections.filter(s => s.id !== sectionId);
                        renderSections();
                    }

                    function resetList() {
                        if (!confirm("Create new list? This will remove all sections and assignments.")) return;
                        state.sections = [];
                        state.selectedItemId = null;
                        renderSections();
                        renderAssignModal();
                        refreshItemsUI();
                    }

                    function addItemToSection(sectionId, itemId) {
                        if (findAssignedSection(itemId)) return;
                        const sec = state.sections.find(s => s.id === sectionId);
                        if (!sec) return;
                        sec.items.push(itemId);
                        renderSections();
                    }

                    function removeItemFromSection(sectionId, itemId) {
                        const sec = state.sections.find(s => s.id === sectionId);
                        if (!sec) return;
                        sec.items = sec.items.filter(id => id !== itemId);
                        renderSections();
                    }

                    function removeItemEverywhere(itemId) {
                        state.sections.forEach(sec => {
                            if (sec.items.includes(itemId)) sec.items = sec.items.filter(id => id !== itemId);
                        });
                        renderSections();
                    }

                    /* =========================
                       Sortable
                       ========================= */
                    function initSortable() {
                        const container = document.getElementById("mockExam-sectionsContainer");
                        if (!container) return;
                        if (sortable) sortable.destroy();

                        sortable = new Sortable(container, {
                            handle: ".mock-exam-drag-handle",
                            animation: 150,
                            onEnd: function () {
                                const ids = Array.from(container.querySelectorAll("[data-section-id]"))
                                    .map(el => el.getAttribute("data-section-id"));

                                const newOrder = [];
                                ids.forEach(id => {
                                    const sec = state.sections.find(s => s.id === id);
                                    if (sec) newOrder.push(sec);
                                });
                                state.sections = newOrder;
                                renderSections();
                            }
                        });
                    }

                    /* =========================
                       Events (delegation for item list)
                       ========================= */
                    function bindEvents() {
                        $("#mockExam-openBuilderLink").on("click.mockExam", function(e) {
                            e.preventDefault();
                            $els.builderModal.modal("show");
                            renderSections();
                        });

                        $("#mockExam-addOneBtn").on("click.mockExam", openAddSection);
                        $("#mockExam-addMultipleBtn").on("click.mockExam", openBulkSections);
                        $("#mockExam-newListBtn").on("click.mockExam", resetList);

                        $("#mockExam-saveAndCloseBtn").on("click.mockExam", () => $els.builderModal.modal("hide"));
                        $("#mockExam-assignDoneBtn").on("click.mockExam", () => $els.assignModal.modal("hide"));
                        $("#mockExam-formSaveBtn").on("click.mockExam", saveSectionForm);

                        $els.builderModal.on("shown.bs.modal.mockExam", function () {
                            initSortable();
                            renderSections();
                        });

                        $els.sectionFormModal.on("shown.bs.modal.mockExam", function () {
                            if (state.sectionFormMode === "bulk") initSummernote($els.bulkInstructions);
                            else initSummernote($els.secInstructions);
                        });

                        // ✅ Delegated item events (no per-row binding)
                        $els.itemsList.on("click.mockExam", "[data-mockexam-action='assign']", function() {
                            const itemId = String($(this).closest("[data-mockexam-item-id]").attr("data-mockexam-item-id") || "");
                            if (!itemId) return;
                            // prevent if already assigned
                            if (findAssignedSection(itemId)) return;
                            openAssignForItem(itemId);
                        });

                        $els.itemsList.on("click.mockExam", "[data-mockexam-action='unassign']", function() {
                            const itemId = String($(this).closest("[data-mockexam-item-id]").attr("data-mockexam-item-id") || "");
                            if (!itemId) return;
                            removeItemEverywhere(itemId);
                        });
                    }

                    function init() {
                        cacheEls();
                        cacheTemplates();
                        loadItemsFromDom();
                        refreshItemsUI();
                        renderSections();
                        renderAssignModal();
                        bindEvents();
                    }

                    return { init, state };
                })(jQuery);

                jQuery(function() {
                    window.mockExam.init();
                });
            </script>


    @endpush
