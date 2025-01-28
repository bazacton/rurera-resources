@extends('admin.layouts.app')
@php $rand_id = rand(0,9999); @endphp
@push('styles_top')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
<link rel="stylesheet" href="/assets/admin/css/jquery.flowchart.css?ver={{$rand_id}}">
<link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
<link rel="stylesheet" href="/assets/admin/css/draw-editor.css?ver={{$rand_id}}">
<link rel="stylesheet" href="/assets/admin/vendor/bootstrap-colorpicker/bootstrap-colorpicker.min.css">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/smoothness/jquery-ui.css">

<style type="text/css">
    .field-options {
        display: none !important;
    }
    .right-in2 .flowchart-operator-outputs {
        position: absolute;
        right: 0;
    }
    .right-in2 .flowchart-operator-inputs {
        position: absolute;
        left: 0;
    }


    .field-data1 {
        position: relative;
    }.flowchart-operator-inputs1 {
         position: absolute;
         top: 2;
     }
    .roadmap .roadmap-road {
        stroke: #000000;
        stroke-width:15px;
    }
    .roadmap-path {
        display: none;
    }
    .roadmap .roadmap-path {
        display: block;
    }


    .spacer-block{width:0px !important;}
    .spacer-block svg {
        width: 10px !important;
        height: 10px !important;
    }
    .spacer-svg-controls .flowchart-operator-outputs .flowchart-operator-connector-small-arrow {
        right: 10px !important;!i;!;
    }

    .spacer-svg-controls .flowchart-operator-outputs .flowchart-operator-connector-arrow{
        right:10px !important;
    }

    ul.editor-objects.sets-selection.active {
        background: #b2b2b2;
    }

    .right-in .flowchart-operator-connector-arrow {
        border-right: 10px solid rgb(204, 204, 204);
        border-left: none;
    }
    .right-in .flowchart-operator-inputs, .right-in .flowchart-operator-outputs {
        display: contents !important;
    }
    .flowchart-operator-inputs-outputs.right-in .flowchart-operator-inputs .flowchart-operator-connector-arrow {
        right: -10px !important;
        left: auto !important;
    }
    .flowchart-operator-inputs-outputs.right-in .flowchart-operator-outputs .flowchart-operator-connector-arrow {
        left: -10px !important;
        right: auto !important;
    }

:root {
  --bg-color: #fff;
  --line-color-1: #366;
  --line-color-2: #a9a9a9;
}

*, *::before, *::after {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

	.field_settings .ui-rotatable-handle, .field_settings .ui-resizable-handle, .field_settings .remove{
		display:none !important;
	}

	.field_settings.active {
		opacity: 0.8;
	}

	.field_settings.active .ui-rotatable-handle, .field_settings.active .ui-resizable-handle, .field_settings.active .remove{
		display:block !important;
	}
	.editor-objects-list li.active{
		background: #cbcbcb;
	}

    .no-border {
        border: none;
    }
	.ui-rotatable-handle {
            width: 20px;
            height: 20px;
            position: absolute;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            cursor: pointer;
        }
        .ui-rotatable-handle::before {
            content: '\f111'; /* Font Awesome rotate icon */
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            color: white;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .ui-rotatable-handle.ui-rotatable-handle-nw {
            top: -10px;
            left: -10px;
        }
        .ui-rotatable-handle.ui-rotatable-handle-se {
            bottom: -10px;
            right: -10px;
        }

	.field-data svg{height:auto; width: 100%;}


	/* .editor-controls {
		position: absolute;
		top: 0;
		right: -300px;
		width: 300px;
	} */
    .editor-objects {
        background-color: #e9e9e9;
        padding: 15px;
    }
	ul.editor-objects li {
		display: inline-block;
        vertical-align: top;
        padding: 5px 5px;
        width: 32%;
	}
	a.control-tool-item {
		padding: 10px;
        border: 1px solid #ccc;
        display: block;
        text-align: center;
        border-radius: 3px;
        background-color: #f5f5f5;
	}
	a.control-tool-item.active {
		background: #fff;
	}
    .control-tool-item img {
        height: 35px;
        object-fit: contain;
        width: 35px !important;
    }
	/* .editor-objects-block {
		position: absolute;
		top: 0;
		right: -500px;
		width: 170px;
	} */
	.editor-objects-list li {
		padding: 5px 10px;
		background: #efefef;
		margin: 0 0 3px 0;
	}
    .editor-controls-holder {
        position: absolute;
        right: 0;
        top: 0;
        min-width: 340px;
        max-width: 340px;
        height: calc(100% - 30px);
        background-color: #f2f2f2;
        padding: 30px 30px;
        border-radius: 5px;
        overflow:auto;
    }
    .editor-parent-nav {
        margin: 0 0 25px;
    }
    .editor-parent-nav .nav-link {
        padding: 8px 30px;
        border: 0;
        background-color: #c3c3c3;
        font-size: 16px;
        font-weight: 600;
        outline: none;
        border-radius: 3px;
        color: #666;
        text-shadow: 0 1px 1px #fff;
    }
    .editor-parent-nav .nav-link.active {
        background-color: var(--primary);
        color: #fff;
        text-shadow: none;
    }
    .editor-parent-nav ul {
        gap: 8px 15px;
    }
    .editor-controls-holder .fade:not(.show) {
        visibility: hidden;
        height: 0;
    }
    .editor-controls .nav .nav-item .nav-link {
        padding: 0 10px;
        font-weight: 600;
        color: #afafaf;
        opacity: 1;
    }
    .editor-controls .nav .nav-item .nav-link.active {
        background-color: inherit;
        box-shadow: none;
        color: var(--primary);
    }
    .editor-zone:has(.editor-controls-holder) {
        padding: 0 369px 0 369px;
        overflow: hidden;
        width: 100% !important;
    }
    /* .editor-zone:has(.field-options.hide) {
        padding-left: 0;
    } */
    .editor-objects-list li i {
        display: inline-flex;
        float: right;
        padding: 6px 10px 6px;
        color: #000;
        font-size: 15px;
        cursor: pointer;
    }


	.graph-background {
		background-color: var(--bg-color);
		background-image: linear-gradient(var(--line-color-1) 1.5px, transparent 1.5px), linear-gradient(90deg, var(--line-color-1) 1.5px, transparent 1.5px), linear-gradient(var(--line-color-2) 1px, transparent 1px), linear-gradient(90deg, var(--line-color-2) 1px, transparent 1px) !important;
		background-position: -1.5px -1.5px, -1.5px -1.5px, -1px -1px, -1px -1px !important;
		background-size: 100px 100px, 100px 100px, 20px 20px, 20px 20px !important;
	}

.flowchart-example-container {
    width: 800px;
    height: 400px;
    background: white;
    border: 1px solid #BBB;
    margin-bottom: 10px;
}

</style>
@endpush


@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{!empty($glossary) ?trans('/admin/main.edit'): trans('admin/main.new') }} Learning Journey</h1>
        <a href="javascript:;" class="journey-settings"><i class="fa fa-cog"></i> Settings</a>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/admin/">{{ trans('admin/main.dashboard') }}</a>
            </div>
            <div class="breadcrumb-item active"><a href="/admin/learning_journey">Learning Journey</a>
            </div>
            <div class="breadcrumb-item">{{!empty($glossary) ?trans('/admin/main.edit'): trans('admin/main.new') }}
            </div>
        </div>

    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="/admin/learning_journey/{{ !empty($LearningJourneyObj) ? $LearningJourneyObj->id.'/store' : 'store' }}" class="learning-journey-form"
                              method="Post">
                            {{ csrf_field() }}

                            <div id="journey-settings-modal" class="journey-settings-modal modal fade" role="dialog" data-backdrop="static">
                                <div class="modal-dialog">
                                    <div class="modal-content journey-settings-modal-div">
                                        <div class="modal-body">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <div class="modal-box">

                                                    <div class="row">
                                                        <div class="col-md-12 col-lg-12">

                                                            <div class="form-group">
                                                                <label>Journey Title</label>
                                                                <input type="text" class="form-control" name="journey_title">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{ trans('/admin/main.category')  }}</label>
                                                                <select class="form-control @error('category_id') is-invalid @enderror ajax-category-courses"
                                                                        name="category_id" data-course_id="{{isset( $LearningJourneyObj->subject_id )? $LearningJourneyObj->subject_id : 0}}">
                                                                    <option {{ !empty($trend) ? '' : 'selected' }} disabled>{{ trans('admin/main.choose_category')  }}</option>

                                                                    @foreach($categories as $category)
                                                                        @if(!empty($category->subCategories) and count($category->subCategories))
                                                                            <optgroup label="{{  $category->title }}">
                                                                                @foreach($category->subCategories as $subCategory)
                                                                                    <option value="{{ $subCategory->id }}" @if(!empty($LearningJourneyObj) and $LearningJourneyObj->year_id == $subCategory->id) selected="selected" @endif>{{ $subCategory->title }}</option>
                                                                                @endforeach
                                                                            </optgroup>
                                                                        @else
                                                                            <option value="{{ $category->id }}" class="font-weight-bold" @if(!empty($LearningJourneyObj) and $LearningJourneyObj->year_id == $category->id) selected="selected" @endif>{{ $category->title }}</option>
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
                                                                        data-default_id="{{isset( $LearningJourneyObj->subject_id)? $LearningJourneyObj->subject_id : 0}}" data-chapter_id="{{isset( $LearningJourneyObj->chapter_id )? $LearningJourneyObj->chapter_id : 0}}"
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
                                                    </div>
                                                    <div class="inactivity-controls">
                                                        <button type="button" class="update-journey-settings mt-0">Update</button>
                                                        <!-- <a href="javascript:;" class="close" data-dismiss="modal" aria-label="Continue">Close</a> -->
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

							<input type="hidden" name="posted_data" class="posted-data">






                            <div class="form-group">
                                <button class="btn btn-primary add_learning_journey_set" type="button">Add Stage</button>
                            </div>

                            <div class="learning_journey_sets">

                                @if( !empty( $LearningJourneyObj->learningJourneyLevels ))
                                @foreach( $LearningJourneyObj->learningJourneyLevels as $itemObj)
									{{$thisObj->learning_journey_set_layout($request, $itemObj->id, false, true, $itemObj)}}
                                @endforeach
                                @endif


                            </div>


                            <div class="text-right mt-4">
                                <button class="btn btn-primary">{{ trans('admin/main.submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<div id="level_add_modal" class="level_add_modal modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content edit-quest-modal-div">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-box">
                    <form action="javascript:;" method="POST" id="generate-bulk-list-form" class="px-25 add-level-form">
                        @csrf

                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <h2 class="font-20 font-weight-bold mb-15">Level</h2>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label class="input-label">Type</label>
                                            <select name="level_type" data-plugin-selectTwo class="form-control populate level_type conditional-field">
                                                <option value="topic" data-child="topic-fields">Topic</option>
                                                <option value="treasure_mission" data-child="treasure_mission-fields">Treasure Mission</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 conditional-child-fields treasure_mission-fields">
                                        <div class="form-group">
                                            <label class="input-label">Points</label>
                                            <input name="treasure_mission_points" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 conditional-child-fields topic-fields">
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
                                    <div class="col-md-12 col-lg-12 conditional-child-fields topic-fields">
                                        <div class="form-group">
                                            <label class="input-label">Subjects</label>
                                            <select data-chapter_id="" id="subject_id"
                                                    class="rurera-req-field form-control populate ajax-courses-dropdown year_subjects @error('subject_id') is-invalid @enderror"
                                                    name="subject_id" data-next_index="chapter_id" data-next_value="">
                                                <option value="">Please select year, subject</option>
                                            </select>
                                            @error('subject_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 conditional-child-fields topic-fields">
                                        <div class="form-group">
                                            <label class="input-label">Topic</label>
                                            <select data-sub_chapter_id="" id="chapter_id"
                                                    class="rurera-req-field form-control populate ajax-chapter-dropdown @error('chapter_id') is-invalid @enderror"
                                                    name="chapter_id" data-disabled="{{isset($already_created_bulk_lists)? json_encode($already_created_bulk_lists) : ''}}" data-next_index="sub_chapter_id" data-next_value="">
                                                <option value="">Please select year, subject</option>
                                            </select>
                                            @error('chapter_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 conditional-child-fields topic-fields">
                                        <div class="form-group">
                                            <label class="input-label">Sub Topic</label>
                                            <select id="sub_chapter_id"
                                                    class="rurera-req-field form-control populate ajax-subchapter-dropdown @error('sub_chapter_id') is-invalid @enderror"
                                                    name="sub_chapter_id" data-next_index="topic_part" data-next_value="">
                                                <option value="">Please select year, subject, Topic</option>
                                            </select>
                                            @error('sub_chapter_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-12 conditional-child-fields topic-fields">
                                    <div class="form-group">
                                        <label>Topic Part Items</label>
                                        <select data-return_type="option" multiple

                                                class="topic-parts-data form-control select2"
                                                id="topic_part_item_id" name="topic_part_item_id[]">
                                            <option disabled>Topic Part Item</option>
                                        </select>
                                    </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="inactivity-controls">
                            <button type="button" class="add-level-stage-btn mt-0">Add Level</button>
                            <!-- <a href="javascript:;" class="close" data-dismiss="modal" aria-label="Continue">Close</a> -->
                        </div>
                        <form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts_bottom')
    <script src="/assets/admin/js/jquery.flowchart.js?ver={{$rand_id}}"></script>
<script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>
 <script src="https://www.jqueryscript.net/demo/CSS3-Rotatable-jQuery-UI/jquery.ui.rotatable.js"></script>
<script src="/assets/default/js/admin/filters.min.js"></script>
<script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>

<script type="text/javascript">

    var sub_chapters_fetched = false;
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
                    console.log('cccc-dropdown-list');
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

    $(document).on('change', '.ajax-subchapter-dropdown', function () {
        var sub_chapter_id = $(this).val();
        var topic_part = $(this).attr('data-next_value');
        $.ajax({
            type: "GET",
            url: '/admin/webinars/topic_part_item_by_sub_chapter',
            data: {'subchapter_id': sub_chapter_id, 'show_all': 'yes', 'topic_part': topic_part},
            success: function (return_data) {
                $(".topic-parts-data").html(return_data);
            }
        });
    });
        /*$(document).on('change', '.ajax-chapter-dropdown', function () {
            var thisObj = $(this);
            var chapter_id = $(this).val();
            var sub_chapter_id = $(this).attr('data-sub_chapter_id');
            var data_id = $(this).attr('data-id');
            var sub_chapter_id = $('.field_settings[data-id="' + data_id + '"]').attr('data-select_subchapter_default');


            var disabled_items = $(this).attr('data-disabled');
            console.log('subchapter-dropdown-list');
            if(chapter_id != ''){
                $.ajax({
                    type: "GET",
                    url: '/admin/webinars/sub_chapters_by_chapter',
                    data: {'chapter_id': chapter_id, 'sub_chapter_id': sub_chapter_id, 'disabled_items': disabled_items},
                    success: function (return_data) {
                        sub_chapters_fetched = true;
                        thisObj.closest('.editor-zone').find(".ajax-subchapter-dropdown").html(return_data);
                        thisObj.closest('.editor-zone').find(".ajax-subchapter-dropdown").change();
                    }
                });
            }
        });
        $(document).on('change', '.ajax-subchapter-dropdown', function () {
            var thisObj = $(this);
            var subchapter_id = $(this).val();
            var sub_chapter_id = $(this).attr('data-sub_chapter_id');
            var disabled_items = $(this).attr('data-disabled');
            var data_id = $(this).attr('data-id');
            var default_id = $('.field_settings[data-id="' + data_id + '"]').attr('data-topic_default');
            if(subchapter_id != ''){
                $.ajax({
                    type: "GET",
                    url: '/admin/webinars/topic_part_quiz_by_sub_chapter',
                    data: {'subchapter_id': subchapter_id, 'default_id': default_id},
                    success: function (return_data) {
                        thisObj.closest('.field-options').find(".ajax-topicpart-item-dropdown").html(return_data);
                        thisObj.closest('.field-options').find(".ajax-topicpart-item-dropdown").find('option[value="' + default_id + '"]').attr('selected', 'selected');
                        thisObj.closest('.field-options').find(".ajax-topicpart-item-dropdown").change();
                    }
                });
            }
        });*/
        $(".ajax-category-courses").change();

</script>
<script src="/assets/admin/js/journey-editor.js?ver={{$rand_id}}"></script>
<script src="/assets/admin/vendor/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

		$(".editor-objects-list").sortable();
		//$('.saved-item-class').click();

		$(".editor-objects-list").sortable({
			update: function(event, ui) {
				sorting_render(); // Call your function here
			}
		});

        $(".levels-objects-list").sortable({
            update: function(event, ui) {
                levels_sorting_render(); // Call your function here
            }
        });

        $('body').on('click', '.stage-accordion', function (e) {
            if(!$(this).hasClass('collapsed')){
                levels_sorting_render();
            }
        });

        $('body').on('click', '.delete-parent-li', function (e) {

            $(this).closest('li').remove();
        });


        $('body').on('change', '.category-id-field', function (e) {
            var category_id = $(this).val();
            var subject_id = $(this).attr('data-subject_id');
            var learning_journey_id = '{{isset( $LearningJourneyObj->id )? $LearningJourneyObj->id : 0}}';
            $.ajax({
                type: "GET",
                url: '/national-curriculum/subjects_by_category',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'category_id': category_id, 'subject_id': subject_id, 'learning_journey': 'yes', 'learning_journey_id': learning_journey_id},
                success: function (response) {
                    $(".category_subjects_list").html(response);
					$(".category_subjects_list select").change();


                }
            });

        });

		$("category-id-field").change();
        $('body').on('click', '.add_learning_journey_set', function (e) {
            //$(".learning_journey_sets").html('');
            $.ajax({
                type: "GET",
                url: '/admin/learning_journey/learning_journey_set_layout',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {},
                success: function (response) {
                    $(".learning_journey_sets").append(response);
                    //$(".curriculum-set-ul").sortable();
                    $(".curriculum-item-data-ul").sortable();
                    $(".curriculum-chapter-data-ul").sortable();
                    $(".curriculum-topics-ul").sortable();
                    handleTopicsMultiSelect2('search-topics-select2', '/admin/chapters/search', ['class', 'course', 'subject', 'title']);
                }
            });
        });

        $('body').on('click', '.add-curriculum-item', function (e) {
            //$(".learning_journey_sets").html('');
            var thisObj = $(this);
            var data_id = $(this).attr('data-data_id');
			var subject_id = $('.choose-curriculum-subject').val();
            $.ajax({
                type: "GET",
                url: '/admin/learning_journey/learning_journey_topic_layout',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'data_id': data_id, 'subject_id': subject_id},
                success: function (response) {
                    thisObj.closest('li').find('.curriculum-item-data').find('ul.curriculum-item-data-ul').append(response);

                }
            });
        });


		$('body').on('click', '.add-treasure-item', function (e) {
            //$(".learning_journey_sets").html('');
            var thisObj = $(this);
            var data_id = $(this).attr('data-data_id');
            $.ajax({
                type: "GET",
                url: '/admin/learning_journey/learning_journey_treasure_layout',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'data_id': data_id},
                success: function (response) {
                    thisObj.closest('li').find('.curriculum-item-data').find('ul.curriculum-item-data-ul').append(response);
                }
            });
        });

        $('body').on('click', '.add-curriculum-chapter', function (e) {
            //$(".learning_journey_sets").html('');
            var thisObj = $(this);
            var data_id = $(this).attr('data-data_id');
            var item_id = $(this).attr('data-item_id');
            $.ajax({
                type: "GET",
                url: '/admin/national_curriculum/curriculum_item_chapter_layout',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'data_id': data_id, 'item_id': item_id},
                success: function (response) {
                    thisObj.closest('li').find('ul.curriculum-chapter-data-ul').append(response);
                    $(".curriculum-chapter-data-ul").sortable();
                    $(".curriculum-topics-ul").sortable();
                    handleTopicsMultiSelect2('search-topics-select2', '/admin/chapters/search', ['class', 'course', 'subject', 'title']);
                }
            });
        });

        //$(".learning_journey_sets").sortable();
        //$(".curriculum-item-data-ul").sortable();
        //$(".curriculum-chapter-data-ul").sortable();
        //$(".curriculum-topics-ul").sortable();
        $(".category-id-field").change();
        handleTopicsMultiSelect2('search-topics-select2', '/admin/chapters/search', ['class', 'course', 'subject', 'title']);



    });


	$('body').on('submit', '.learning-journey-form', function (e) {
		console.log('submitted_form');
		var posted_data = generate_stage_area();
        console.log(posted_data);
		$(".posted-data").val(JSON.stringify(posted_data));


        //return false;

	});

    $(document).on('click', '.add-level', function () {
        $(".level_add_modal").modal('show');
    });
    $(document).on('click', '.journey-settings', function () {
        $(".journey-settings-modal").modal('show');
    });

    $(document).on('click', '.update-journey-settings', function () {
        $(".journey-settings-modal").modal('hide');
    });


    $(document).on('click', '.add-level-stage-btn', function () {
        var level_type = $('[name="level_type"]').val();
        var treasure_mission_points = $('[name="treasure_mission_points"]').val();
        var unique_id = Math.floor((Math.random() * 99999) + 1);
        var field_random_number = 'rand_' + unique_id;
        var layer_html = '';
        $el = $('<div></div>');
        if(level_type == 'topic') {
            var topic_part_item_ids = $('[name="topic_part_item_id[]"]').val();
            $.each(topic_part_item_ids, function(index, topic_part_item_id) {
                var unique_id = Math.floor((Math.random() * 99999) + 1);
                var field_random_number = 'rand_' + unique_id;
                // Perform an action with each topic_part_item_id
                $el.append($('<div id="' + field_random_number + '" data-topic_part_item_id="'+topic_part_item_id+'" style="left:0px; top:0px;" data-item_title="Topic" data-unique_id="' + unique_id + '" data-is_new="yes" class="path-initializer flowchart-operator flowchart-default-operator drop-item form-group draggablecl field_settings draggable_field_' + field_random_number + '" data-id="' + field_random_number + '" data-item_path="default/topic_numbers.svg" data-field_type="topic" data-trigger_class="infobox-topic_numbers-fields" data-item_type="topic_numbers" data-paragraph_value="Test text here..."><div class="field-data"><svg width="100%" height="100%" viewBox="0 0 258 264" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="257.641" width="263.774" height="257.64" rx="49.0743" transform="rotate(90 257.641 0)" fill="#8F5C57" fill-opacity="0.79"></rect></svg><div class="flowchart-operator-inputs-outputs"><div class="flowchart-operator-inputs"></div><div class="flowchart-operator-outputs"></div></div>'));
                $el.append('</div>');
                layer_html += `<li data-id="${field_random_number}" data-field_postition="2">Topic Title
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                        <img src="/assets/default/svgs/dots-three.svg" alt="">
                        </button>
                    <div class="dropdown-menu">
                        <i class="fa fa-trash"></i><i class="lock-layer fa fa-unlock"></i><i class="fa fa-sort"></i><i class="fa fa-copy"></i>
                    </div>
                </div>
                </li>`;
            });
        }
        if(level_type == 'treasure_mission') {
            $el.append($('<div data-no_of_coins="'+treasure_mission_points+'" id="' + field_random_number + '" style="left:0px; top:0px;" data-item_title="Treasure" data-unique_id="' + unique_id + '" data-is_new="yes" class="path-initializer flowchart-operator flowchart-default-operator drop-item form-group draggablecl field_settings draggable_field_' + field_random_number + '" data-id="' + field_random_number + '" data-item_path="default/treasure_1.svg" data-field_type="treasure" data-trigger_class="infobox-treasure_1-fields" data-item_type="treasure" data-paragraph_value="Test text here..."><div class="field-data"><svg width="100%" height="100%" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--twemoji" preserveAspectRatio="xMidYMid meet"><path fill="#FFAC33" d="M27.287 34.627c-.404 0-.806-.124-1.152-.371L18 28.422l-8.135 5.834a1.97 1.97 0 0 1-2.312-.008a1.971 1.971 0 0 1-.721-2.194l3.034-9.792l-8.062-5.681a1.98 1.98 0 0 1-.708-2.203a1.978 1.978 0 0 1 1.866-1.363L12.947 13l3.179-9.549a1.976 1.976 0 0 1 3.749 0L23 13l10.036.015a1.975 1.975 0 0 1 1.159 3.566l-8.062 5.681l3.034 9.792a1.97 1.97 0 0 1-.72 2.194a1.957 1.957 0 0 1-1.16.379z"></path></svg><div class="flowchart-operator-inputs-outputs"><div class="flowchart-operator-inputs"></div><div class="flowchart-operator-outputs"></div></div>'));
            $el.append('</div>');
            layer_html += `<li data-id="${field_random_number}" data-field_postition="2">Topic Title
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                <img src="/assets/default/svgs/dots-three.svg" alt="">
                </button>
            <div class="dropdown-menu">
                <i class="fa fa-trash"></i><i class="lock-layer fa fa-unlock"></i><i class="fa fa-sort"></i><i class="fa fa-copy"></i>
            </div>
        </div>
        </li>`;
        }


        $(".levels-objects-list").append(layer_html);

        $(".book-dropzone.active").append($el);
        $(".level_add_modal").modal('hide');

        setTimeout(function() {
            levels_sorting_render();
        }, 2000); // 2000 milliseconds = 2 seconds
    });


    $(document).on('click', '.change-position', function () {
        var data_id = $(this).closest('li').attr('data-id');
        var link_position = $(this).closest('li').attr('data-link_position');
        if(link_position == 'left-in'){
            link_position = 'right-in';
        }else{
            link_position = 'left-in';
        }
        $(this).closest('li').attr('data-link_position', link_position);
        levels_sorting_render();
    });

    $(document).on('click', '.add-spacer', function () {
        var level_type = 'spacer';
        var unique_id = Math.floor((Math.random() * 99999) + 1);
        var field_random_number = 'rand_' + unique_id;
        var layer_html = '';
        if(level_type == 'spacer') {
            var unique_id = Math.floor((Math.random() * 99999) + 1);
            var field_random_number = 'rand_' + unique_id;

            $el = ($('<div id="' + field_random_number + '"  style="left:0px; top:0px;" data-item_title="Spacer" data-unique_id="' + unique_id + '" data-is_new="yes" class="path-initializer spacer-block flowchart-operator flowchart-default-operator drop-item form-group draggablecl field_settings draggable_field_' + field_random_number + '" data-id="' + field_random_number + '" data-item_path="default/topic_numbers.svg" data-field_type="spacer" data-trigger_class="infobox-spacer-fields" data-item_type="spacer" data-paragraph_value="Test text here..."><div class="field-data"><svg width="100%" height="5" xmlns="http://www.w3.org/2000/svg"><circle cx="5" cy="5" r="5" fill="black" /></svg><div class="flowchart-operator-inputs-outputs spacer-svg-controls"><div class="flowchart-operator-inputs"></div><div class="flowchart-operator-outputs"></div></div>'));
            $el.append('<a href="javascript:;" class="remove spacer-remove"><span class="fas fa-trash"></span></a>');
            $el.append('</div>');
            layer_html += `<li data-id="${field_random_number}" data-field_postition="2">Spacer
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                    <img src="/assets/default/svgs/dots-three.svg" alt="">
                    </button>
                <div class="dropdown-menu">
                    <i class="fa fa-trash"></i><i class="lock-layer fa fa-unlock"></i><i class="fa fa-sort"></i><i class="fa fa-copy"></i>
                </div>
            </div>
            </li>`;
        }
        $(".levels-objects-list").append(layer_html);

        $(".book-dropzone.active").append($el);
        $(".level_add_modal").modal('hide');

        $('.draggable_field_' + field_random_number)
            .rotatable({angle: rotate_value})
            .off('wheel'); // Unbinds all wheel events from this element

        setTimeout(function() {
            levels_sorting_render();
        }, 2000); // 2000 milliseconds = 2 seconds
    });






</script>



<script type="text/javascript">
    /* global $ */
    var $flowchart = null;
    $(document).ready(function() {

        $(".conditional-field").change();
        $(".sets-selection.active").click();


        $flowchart = $('#flowchartworkspace');
        $flowchart = $(".book-dropzone.active");
        var $container = $flowchart.parent();





        // Apply the plugin on a standard, empty div...
        $flowchart.flowchart({
            data: defaultFlowchartData,
            defaultSelectedLinkColor: '#000055',
            grid: 10,
            multipleLinksOnInput: true,
            multipleLinksOnOutput: true
        });




        function getOperatorData($element) {
            var nbInputs = parseInt($element.data('nb-inputs'), 10);
            var nbOutputs = parseInt($element.data('nb-outputs'), 10);
            var data = {
                properties: {
                    title: $element.text(),
                    inputs: {},
                    outputs: {}
                }
            };

            var i = 0;
            for (i = 0; i < nbInputs; i++) {
                data.properties.inputs['input_' + i] = {
                    label: 'Input ' + (i + 1)
                };
            }
            for (i = 0; i < nbOutputs; i++) {
                data.properties.outputs['output_' + i] = {
                    label: 'Output ' + (i + 1)
                };
            }

            return data;
        }



        //-----------------------------------------
        //--- operator and link properties
        //--- start
        var $operatorProperties = $('#operator_properties');
        $operatorProperties.hide();
        var $linkProperties = $('#link_properties');
        $linkProperties.hide();
        var $operatorTitle = $('#operator_title');
        var $linkColor = $('#link_color');

        $flowchart.flowchart({
            onOperatorSelect: function(operatorId) {
                $operatorProperties.show();
                $operatorTitle.val($flowchart.flowchart('getOperatorTitle', operatorId));
                return true;
            },
            onOperatorUnselect: function() {
                $operatorProperties.hide();
                return true;
            },
            onLinkSelect: function(linkId) {
                $linkProperties.show();
                $linkColor.val($flowchart.flowchart('getLinkMainColor', linkId));
                return true;
            },
            onLinkUnselect: function() {
                $linkProperties.hide();
                return true;
            }
        });


        //reinitialize_items();

        $operatorTitle.keyup(function() {
            var selectedOperatorId = $flowchart.flowchart('getSelectedOperatorId');
            if (selectedOperatorId != null) {
                $flowchart.flowchart('setOperatorTitle', selectedOperatorId, $operatorTitle.val());
            }
        });

        $linkColor.change(function() {
            var selectedLinkId = $flowchart.flowchart('getSelectedLinkId');
            if (selectedLinkId != null) {
                $flowchart.flowchart('setLinkMainColor', selectedLinkId, $linkColor.val());
            }
        });
        //--- end
        //--- operator and link properties
        //-----------------------------------------

        //-----------------------------------------
        //--- delete operator / link button
        //--- start
        $flowchart.parent().siblings('.delete_selected_button').click(function() {
            $flowchart.flowchart('deleteSelected');
        });
        //--- end
        //--- delete operator / link button
        //-----------------------------------------



        //-----------------------------------------
        //--- create operator button
        //--- start
        var operatorI = 0;
        $flowchart.parent().siblings('.create_operator').click(function() {
            var operatorId = 'created_operator_' + operatorI;
            var operatorData = {
                top: ($flowchart.height() / 2) - 30,
                left: ($flowchart.width() / 2) - 100 + (operatorI * 10),
                properties: {
                    title: 'Operator ' + (operatorI + 3),
                    inputs: {
                        input_1: {
                            label: 'Input 1',
                        }
                    },
                    outputs: {
                        output_1: {
                            label: 'Output 1',
                        }
                    }
                }
            };

            operatorI++;

            $flowchart.flowchart('createOperator', operatorId, operatorData);

        });
        //--- end
        //--- create operator button
        //-----------------------------------------




        //-----------------------------------------
        //--- draggable operators
        //--- start
        //var operatorId = 0;
        var $draggableOperators = $('.draggable_operator');
        $draggableOperators.draggable({
            cursor: "move",
            opacity: 0.7,

            // helper: 'clone',
            appendTo: 'body',
            zIndex: 1000,

            helper: function(e) {
                var $this = $(this);
                var data = getOperatorData($this);
                return $flowchart.flowchart('getOperatorElement', data);
            },
            stop: function(e, ui) {
                var $this = $(this);
                var elOffset = ui.offset;
                var containerOffset = $container.offset();
                if (elOffset.left > containerOffset.left &&
                    elOffset.top > containerOffset.top &&
                    elOffset.left < containerOffset.left + $container.width() &&
                    elOffset.top < containerOffset.top + $container.height()) {

                    var flowchartOffset = $flowchart.offset();

                    var relativeLeft = elOffset.left - flowchartOffset.left;
                    var relativeTop = elOffset.top - flowchartOffset.top;

                    var positionRatio = $flowchart.flowchart('getPositionRatio');
                    relativeLeft /= positionRatio;
                    relativeTop /= positionRatio;

                    var data = getOperatorData($this);
                    data.left = relativeLeft;
                    data.top = relativeTop;

                    $flowchart.flowchart('addOperator', data);
                }
            }
        });
        //--- end
        //--- draggable operators
        //-----------------------------------------


        //-----------------------------------------
        //--- save and load
        //--- start
        function Flow2Text() {
            var data = $flowchart.flowchart('getData');
            $('#flowchart_data').val(JSON.stringify(data, null, 2));
        }
        $('#get_data').click(Flow2Text);

        function Text2Flow() {
            var data = JSON.parse($('#flowchart_data').val());
            $flowchart.flowchart('setData', data);
        }
        $('#set_data').click(Text2Flow);

        /*global localStorage*/
        function SaveToLocalStorage() {
            if (typeof localStorage !== 'object') {
                alert('local storage not available');
                return;
            }
            Flow2Text();
            localStorage.setItem("stgLocalFlowChart", $('#flowchart_data').val());
        }
        $('#save_local').click(SaveToLocalStorage);

        function LoadFromLocalStorage() {
            if (typeof localStorage !== 'object') {
                alert('local storage not available');
                return;
            }
            var s = localStorage.getItem("stgLocalFlowChart");
            if (s != null) {
                $('#flowchart_data').val(s);
                Text2Flow();
            }
            else {
                alert('local storage empty');
            }
        }
        $('#load_local').click(LoadFromLocalStorage);
        //--- end
        //--- save and load
        //-----------------------------------------

        levels_sorting_render();
    });

    var defaultFlowchartData = {
        operators: {
            operator1: {
                top: 20,
                left: 20,
                properties: {
                    title: 'Operator 1',
                    inputs: {},
                    outputs: {
                        output_1: {
                            label: 'Output 1',
                        }
                    }
                }
            },
            operator2: {
                top: 80,
                left: 300,
                properties: {
                    title: 'Operator 2',
                    inputs: {
                        input_1: {
                            label: 'Input 1',
                        },
                        input_2: {
                            label: 'Input 2',
                        },
                    },
                    outputs: {}
                }
            },
        },
        links: {
            link_1: {
                fromOperator: 'operator1',
                fromConnector: 'output_1',
                toOperator: 'operator2',
                toConnector: 'input_2',
            },
            link_2: {
                fromOperator: 'operator1',
                fromConnector: 'output_1',
                toOperator: 'operator2',
                toConnector: 'input_1',
            },
        }
    };

      defaultFlowchartData = {};





    if (false) console.log('remove lint unused warning', defaultFlowchartData);
</script>
@endpush
