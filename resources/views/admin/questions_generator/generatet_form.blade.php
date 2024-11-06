@php use App\Models\QuizzesQuestion; @endphp
@extends('admin.layouts.app')

@push('libraries_top')
<style>
	/* Basic styling */
	.rurera-hide{
		display:none;
	}
	
	.list-group {
		display: flex;
		gap: 10px;
		margin-top: 5px;
		flex-wrap: wrap;
	}
	.list-group input[type="radio"],
	.list-group input[type="checkbox"] {
		display: none;
	}
	.list-group label {
		padding: 8px 12px;
		border-radius: 4px;
		cursor: pointer;
		background-color: #f1f1f1;
		color: #333;
		font-size: 14px;
	}
	.list-group input[type="radio"]:checked + label,
	.list-group input[type="checkbox"]:checked + label {
		background-color: #4CAF50;
		color: white;
	}
	.range-output {
		display: flex;
		align-items: center;
		gap: 10px;
	}
	input[type="range"], input[type="number"] {
		width: 100%;
		padding: 8px;
		margin-top: 5px;
		border: 1px solid #ddd;
		border-radius: 4px;
		box-sizing: border-box;
	}
	button.submit-btn {
		width: 100%;
		padding: 10px;
		background-color: #4CAF50;
		color: white;
		border: none;
		border-radius: 4px;
		font-size: 16px;
		cursor: pointer;
		margin-top: 20px;
	}
	button.submit-btn:hover {
		background-color: #45a049;
	}
	
	/* Add this CSS for the range slider styling */
    .range-output {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 10px;
    }
    input[type="range"] {
        flex: 1;
        -webkit-appearance: none;
        width: 100%;
        height: 8px;
        background: #ddd;
        border-radius: 5px;
        outline: none;
    }
    input[type="range"]::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 15px;
        height: 15px;
        background: #4CAF50;
        cursor: pointer;
        border-radius: 50%;
    }
    input[type="range"]::-moz-range-thumb {
        width: 15px;
        height: 15px;
        background: #4CAF50;
        cursor: pointer;
        border-radius: 50%;
    }
    output {
        font-weight: bold;
        color: #333;
    }
	.option-group {
            display: flex;
            gap: 10px;
            margin-top: 5px;
            align-items: center;
        }
        .option-group input[type="text"] {
            flex: 1;
        }
        .option-buttons button {
            cursor: pointer;
            padding: 5px 8px;
            font-size: 14px;
            border: none;
            border-radius: 4px;
        }
		.add-option-btn {
			color: var(--primary);
			text-decoration: underline;
			border: 0;
			background: none;
		}
        .submit-btn {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
            display: block;
            width: 100%;
        }
        .remove-option-btn {
            background-color: #f44336;
            color: white;
        }
        .move-up-btn, .move-down-btn {
            background-color: #2196F3;
            color: white;
        }
		/* Question Type List In A Row Style Start */
		.list-group.list-in-row {
			display: flex;
			flex-direction: row;
			gap: 3px;
		}
		/* Question Type List In A Row Style End */

		/* Note-Editable Order List Style Start */
		.note-editable ul {
			padding-left: 25px;
		}
		/* Note-Editable Order List Style End */
		/* Note-Editable Table Default Style Start */
		table {
			width: 100%;
		}
		table, th, td {
			border: 1px solid #f6f6f6;
			border-collapse: collapse;
			padding: 5px;
		}
		/* Note-Editable Table Default Style End */
		/* Note-Dropdown-Menu Style Start */
		.note-dropdown-menu h1,
		.note-dropdown-menu h2,
		.note-dropdown-menu h3,
		.note-dropdown-menu h4,
		.note-dropdown-menu h5,
		.note-dropdown-menu h6 {
			font-size: 14px;
		}
		/* Note-Dropdown-Menu Style End */
		
		.example-question-block {
			border-left: 1px solid #e4e6fc;
			padding-left: 30px;
			height: 100%;
		}
		
		/* Questions Defined Searches style Start */
		.defined-searches {
			display: flex;
			align-items: center;
			gap: 10px;
			margin-bottom: 25px;
			background-color: #efefef;
    		padding: 10px;
		}
		.defined-searches .save-template {
			margin-left: auto;
		}
		.apply-template-field span {
			background-color: #fff;
			padding: 5px 10px;
			border-radius: 3px;
			color: var(--primary);
			text-decoration: underline;
			cursor: pointer;
		}
	/* Questions Defined Searches style end */
    </style>
<link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
@endpush

@section('content')
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
				
				<div class="inactivity-controls">
					<a href="javascript:;" class="continue-btn save-template-btn btn btn-primary">Save Template</a>
					<a href="javascript:;" class="btn btn-danger" data-dismiss="modal" aria-label="Continue">Close</a>
				</div>
			  </div>
			</div>
        </div>
    </div>
</div>
<section class="section">
	<div class="row">
		<div class="col-12 col-md-12">
			<div class="card">
				<div class="card-body px-0 pt-0">
				
					
					@php $saved_templates = $user->saved_templates;
					$saved_templates = json_decode( $saved_templates );
					$saved_templates = isset( $saved_templates->question_ai_genearte_form )? $saved_templates->question_ai_genearte_form : array();
					@endphp
					<div class="defined-searches">
					<span><strong>Save Forms:</strong></span>
						@if( !empty( $saved_templates ) )
							@foreach( $saved_templates  as $template_name => $template_data)
								@php $template_array = json_decode($template_data); 
								$url_params = '<span class="">'.$template_name.'</span>'; 
								if( isset( $template_array->url_params )){
									$url_params = '<a href="'.(string) url("").'/admin/questions_bank/?'.$template_array->url_params.'">'.$template_name.'</a>';
								}
								@endphp
								<span class="apply-template-field" data-form_id="question-generator-form" data-template_type="question_ai_genearte_form" data-template_data="{{$template_data}}"> {!! $url_params !!} <a href="javascript:;" data-template_name="{{$template_name}}" class="remove-template"><i class="fas fa-times"></i></a></span>
							@endforeach
						@endif
						<button type="button" class="btn btn-success save-template" data-form_id="question-generator-form" data-template_type="question_ai_genearte_form" ><i class="fas fa-save"></i> Save Form</button>
					</div>

	<form action="/admin/questions-generator/generate-questions" method="POST" id="question-generator-form" class="px-25">
	@csrf

	<div class="row">
		<div class="col-md-6 col-lg-6">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<h2 class="font-20 font-weight-bold mb-15">Questions Generator</h2>
				</div>
				<div class="col-md-12 col-lg-12">
					<div class="form-group">
						<!-- Content Text Area -->
						<label for="instructions_ai">Instructions for AI:</label>
						<textarea class="w-100 form-control" name="instructions_ai" id="instructions_ai" rows="4" maxlength="400"></textarea>
					</div>
				</div>
				<div class="col-md-6 col-lg-6">
					<div class="form-group">
						<label class="input-label">{{trans('admin/main.category')}}</label>
						<select name="category_id" data-plugin-selectTwo class="form-control populate ajax-category-courses" data-course_id="" data-next_index="subject_id" data-next_value="">
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
				<div class="col-md-6 col-lg-6">
					<div class="form-group">
						<label class="input-label">Subjects</label>
						<select data-chapter_id="" id="subject_id"
								class="form-control populate ajax-courses-dropdown year_subjects @error('subject_id') is-invalid @enderror"
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
				<div class="col-md-6 col-lg-6">
					<div class="form-group">
						<label class="input-label">Topic</label>
						<select data-sub_chapter_id="" id="chapter_id"
								class="form-control populate ajax-chapter-dropdown @error('chapter_id') is-invalid @enderror"
								name="chapter_id" data-next_index="sub_chapter_id" data-next_value="">
							<option value="">Please select year, subject</option>
						</select>
						@error('chapter_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror

					</div>
				</div>
				<div class="col-md-6 col-lg-6">
					<div class="form-group">
						<label class="input-label">Sub Topic</label>
						<select id="sub_chapter_id"
							class="form-control populate ajax-subchapter-dropdown @error('sub_chapter_id') is-invalid @enderror"
							name="sub_chapter_id" data-next_value="">
						<option value="">Please select year, subject, Topic</option>
					</select>
					@error('sub_chapter_id')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
					@enderror

					</div>
				</div>
				<div class="col-md-12 col-lg-12">
					<div class="form-group">
						<!-- Grade Selection -->
						<input type="hidden" name="grade" id="grade1" value="7">
						<!-- Question Type -->
						<label>Question Type (optional):</label>
						<div class="list-group list-in-row">
							<div class="row-field">
								<input type="radio" name="question_type" id="type_mc" value="multiple-choice" checked>
								<label for="type_mc">Multiple Choice</label>
							</div>
							<div class="row-field">
								<input type="radio" name="question_type" id="type_tf" value="true-false">
								<label for="type_tf">True or False</label>
							</div>
							<div class="row-field">
								<input type="radio" name="question_type" id="type_oq" value="open-question">
								<label for="type_oq">Open Question</label>
							</div>
							<div class="row-field">
								<input type="radio" name="question_type" id="type_fill" value="fill-in-the-blank">
								<label for="type_fill">Fill in the Blank</label>
							</div>
							<div class="row-field">
								<input type="radio" name="question_type" id="type_match" value="matching">
								<label for="type_match">Matching</label>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-lg-12">
					<div class="form-group">
						<!-- Number of Options -->
						<label>Number of Options (0-6):</label>
						<div class="list-group list-in-row">
							<div class="row-field">
								<input type="radio" name="num_options" id="options1" value="1">
								<label for="options1">1</label>
							</div>
							<div class="row-field">
								<input type="radio" name="num_options" id="options2" value="2">
								<label for="options2">2</label>
							</div>
							<div class="row-field">
								<input type="radio" name="num_options" id="options3" value="3" checked>
								<label for="options3">3</label>
							</div>
							<div class="row-field">
								<input type="radio" name="num_options" id="options4" value="4">
								<label for="options4">4</label>
							</div>
							<div class="row-field">
								<input type="radio" name="num_options" id="options5" value="5">
								<label for="options5">5</label>
							</div>
							<div class="row-field">
								<input type="radio" name="num_options" id="options6" value="6">
								<label for="options6">6</label>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-lg-12">
					<div class="form-group">
						<!-- Correct Answers -->
						<label>Select Correct Answers (2-3):</label>
						<div class="list-group list-in-row">
							<div class="row-field">
								<input type="checkbox" name="num_correct_answers[]" id="correct1" value="1" checked>
								<label for="correct1">1</label>
							</div>
							<div class="row-field">
								<input type="checkbox" name="num_correct_answers[]" id="correct2" value="2" checked>
								<label for="correct2">2</label>
							</div>
							<div class="row-field">
								<input type="checkbox" name="num_correct_answers[]" id="correct3" value="3">
								<label for="correct3">3</label>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-lg-12">
					<div class="form-group mb-0">
						<label>Setting</label>
						<!-- Include Intro Text and Passage Checkboxes -->
						<div class="list-group list-in-row">
							<div class="row-field">
							
								<label class="custom-switch pl-0">
								<label class="custom-switch-description mb-0 cursor-pointer" for="include_intro_text">Intro Text</label>
									<input type="checkbox" name="include_intro_text" id="include_intro_text" value="1" class="custom-switch-input include_intro_text" checked>
									<span class="custom-switch-indicator"></span>
								</label>
							</div>
							<div class="row-field">
							
								<label class="custom-switch pl-0">
									<label class="custom-switch-description mb-0 cursor-pointer" for="include_passage">Passage</label>
									<input type="checkbox" name="include_passage" id="include_passage" value="1" class="custom-switch-input include_passage" checked>
									<span class="custom-switch-indicator"></span>
								</label>
							</div>
							<div class="row-field">
								<label class="custom-switch pl-0">
									<label class="custom-switch-description mb-0 cursor-pointer" for="include_fact_integration">Fact Integration</label>
									<input type="checkbox" name="include_fact_integration" id="include_fact_integration" value="1" class="custom-switch-input include_fact_integration" checked>
									<span class="custom-switch-indicator"></span>
								</label>
							</div>
							<div class="row-field">
								<label class="custom-switch pl-0">
									<label class="custom-switch-description mb-0 cursor-pointer" for="example_question_switch">Example</label>
									<input type="checkbox" name="example_question_switch" id="example_question_switch" value="1" class="custom-switch-input example_question_switch" checked>
									<span class="custom-switch-indicator"></span>	
								</label>
							</div>
							<div class="row-field">
								<label class="custom-switch pl-0">
									<label class="custom-switch-description mb-0 cursor-pointer" for="include_keywords">keywords</label>
									<input type="checkbox" name="include_keywords" id="include_keywords" value="1" class="custom-switch-input include_keywords" checked>
									<span class="custom-switch-indicator"></span>	
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-lg-12 mt-4">
					<div class="passage-field">
						<div class="form-group">
							<label for="original_passage">Original Passage:</label>
							<textarea name="original_passage" id="original_passage" class="form-control w-100" rows="4"></textarea>
						</div>
					</div>
					<div class="intro-field">
						<div class="form-group">
							<label for="intro_text_main">Intro Text:</label>
							<textarea name="intro_text_main" id="intro_text_main" class="form-control w-100" rows="4"></textarea>
						</div>
					</div>
					<div class="row">
					<div class="col-md-12 col-lg-4">
						<div class="form-group">
							<label for="rewording_level" class="mb-0">Rewording Level (0 - 100%):</label>
							<div class="range-output">
								<input type="range" name="rewording_level" id="rewording_level" min="0" max="100" value="50" onchange="this.nextElementSibling.value = this.value" oninput="this.nextElementSibling.value = this.value">
								<output>50</output>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-lg-4">
						<div class="form-group">
							<label for="content_text_length" class="mb-0">Content Text Length (Max 50 Words):</label>
							<div class="range-output">
								<input type="range" name="content_text_length" id="content_text_length" min="10" max="50" value="50" onchange="this.nextElementSibling.value = this.value" oninput="this.nextElementSibling.value = this.value">
								<output>50</output>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-lg-4">
						<div class="form-group">
						<!-- Number of Questions -->
						<label for="num_questions" class="mb-0">Number of Questions (Max 20):</label>
						<div class="range-output">
							<input type="range" name="num_questions" id="num_questions" min="1" max="20" value="2" onchange="this.nextElementSibling.value = this.value" oninput="this.nextElementSibling.value = this.value">
							<output>2</output>
						</div>
					</div>
					</div>
				</div>
				</div>
				
				<div class="col-md-12 col-lg-12">
					<div class="form-group">
						<!-- Difficulty Level -->
						<label>Select Difficulty Level:</label>
						<div class="list-group list-in-row">
							<div class="row-field">
								<input type="radio" name="difficulty" id="level_0" value="Easy" checked>
								<label for="level_0">Easy</label>
							</div>
							<div class="row-field">
								<input type="radio" name="difficulty" id="level_1" value="Moderate">
								<label for="level_1">Moderate</label>
							</div>
							<div class="row-field">
								<input type="radio" name="difficulty" id="level_2" value="Hard">
								<label for="level_2">Hard</label>
							</div>
						</div>
					</div>
				</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<button type="submit" class="submit-btn mt-0">Generate Questions</button>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-12">
				<div class="example-question-block rurera-hide">
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<h2 class="font-20 font-weight-bold mb-15">Example Questions</h2>
						</div>
						<div class="col-md-12 col-lg-12">
							<div class="form-group intro-field">
								<label for="intro_text_0">Intro Text:</label>
								<textarea name="intro_text" id="intro_text_0" rows="2" class="w-100 form-control"></textarea>
							</div>
						</div>
						<div class="col-md-12 col-lg-12">
							<div class="form-group passage-field">
								<label for="passage_0">Passage:</label>
								<textarea name="passage" id="passage_0" rows="4" class="w-100 form-control"></textarea>
							</div>
						</div>
						<div class="col-md-12 col-lg-12">
							<div class="form-group">
								<label for="main_question_0">Main Question:</label>
								<input type="text" name="main_question" id="main_question_0" class="w-100 form-control" value="">
							</div>
						</div>
						<div class="col-md-6 col-lg-12 fact-integration-field">
							<div class="form-group">
								<label for="fact_integration">Fact Integration:</label>
								<textarea class="note-codable summernote w-100 form-control" id="fact_integration" name="fact_integration"></textarea>
							</div>
						</div>
						<div class="col-md-6 col-lg-12">
							<div class="form-group">
								<label for="options_label">Options Label:</label>
								<input type="text" name="options_label" id="options_label" class="w-100 form-control" value="">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Options:</label>
						<div class="options-container" data-options-container="0" >
							<div class="option-group" data-option-index="0">
								<input type="text" class="form-control" name="options[]" value="Option 1">
								<input type="checkbox" name="correct_answers[]" value="0">
								<div class="option-buttons">
									<button type="button" class="move-up-btn" onclick="moveOptionUp(this)">↑</button>
									<button type="button" class="move-down-btn" onclick="moveOptionDown(this)">↓</button>
									<button type="button" class="remove-option-btn" onclick="removeOption(this)">✖</button>
								</div>
							</div>
							<div class="option-group" data-option-index="1">
								<input type="text" class="form-control" name="options[]" value="Option 2">
								<input type="checkbox" name="correct_answers[]" value="1">
								<div class="option-buttons">
									<button type="button" class="move-up-btn" onclick="moveOptionUp(this)">↑</button>
									<button type="button" class="move-down-btn" onclick="moveOptionDown(this)">↓</button>
									<button type="button" class="remove-option-btn" onclick="removeOption(this)">✖</button>
								</div>
							</div>
							<div class="option-group" data-option-index="3">
								<input type="text" class="form-control" name="options[]" value="Option 3">
								<input type="checkbox" name="correct_answers[]" value="3">
								<div class="option-buttons">
									<button type="button" class="move-up-btn" onclick="moveOptionUp(this)">↑</button>
									<button type="button" class="move-down-btn" onclick="moveOptionDown(this)">↓</button>
									<button type="button" class="remove-option-btn" onclick="removeOption(this)">✖</button>
								</div>
							</div>
							<div class="option-group" data-option-index="4">
								<input type="text" class="form-control" name="options[]" value="Option 4">
								<input type="checkbox" name="correct_answers[]" value="4">
								<div class="option-buttons">
									<button type="button" class="move-up-btn" onclick="moveOptionUp(this)">↑</button>
									<button type="button" class="move-down-btn" onclick="moveOptionDown(this)">↓</button>
									<button type="button" class="remove-option-btn" onclick="removeOption(this)">✖</button>
								</div>
							</div>
						</div>
					</div>
					<button type="button" class="add-option-btn" onclick="addOption(0)">Add Option</button>
					<div class="row mt-3">
						<div class="col-md-12 col-lg-12">
							<div class="form-group">
								<label for="explanation_0">Explanation:</label>
								<textarea class="note-codable summernote w-100 form-control" id="explanation" name="explanation"></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

        <!-- Other fields (ranges, difficulty, language) are the same as before -->
		
    </form>
	</div>
	</div>
	</div>
	</div>
</section>

@endsection

@push('scripts_bottom')
<script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
<script src="/assets/vendors/summernote/summernote-table-headers.js"></script>
<script type="text/javascript">

    $(document).ready(function () {
		$('#options-container').on('paste', function(event) {
			const pasteData = event.originalEvent.clipboardData.getData('text');
			const items = pasteData.split('\n').filter(item => item.trim() !== '');

			console.log('sdfjsdflsjdlfjsdlfjlsdjfl');

			// Ensure enough fields are available
			while ($('[name="options[]"]').length < items.length) {
				addOption();
			}

			// Distribute items into fields
			$('[name="options[]"]').each(function(index) {
				$(this).val(items[index] || ''); // Fill available items or leave empty
			});

			event.preventDefault();
		});
		
		$(document).on('click', '.save-template-btn', function () {
			$(".template_save_modal").modal('hide');
			var template_name = $('.template_name').val();
			var form_data_encoded  = $('.form_data_encoded').val();
			var course_id = $(this).val();
			$.ajax({
				type: "POST",
				url: '/admin/users/save_templates',
				data: {'template_type': 'question_ai_genearte_form', 'template_name': template_name, 'form_data_encoded': form_data_encoded},
				success: function (return_data) {
					console.log(return_data);
				}
			});
		});
		
		$(document).on('click', '.save-template', function () {
			// Show the modal

			// Get the form ID
			var form_id = $(this).attr('data-form_id');
			var formFields = $('#' + form_id).find('input, select, textarea');
			
			// Initialize an object to store the form data
			var formData = {};

			// Iterate over each form field
			formFields.each(function() {
				var name = $(this).attr('name');
				var value;

				if ($(this).is(':checkbox')) {
					// Handle checkboxes with the same name (multiple values)
					value = formFields.filter('[name="' + name + '"]:checked').map(function() {
						return $(this).val();
					}).get();
				} else if ($(this).is(':radio')) {
					// Handle radio buttons (single selected value)
					value = formFields.filter('[name="' + name + '"]:checked').val();
				} else {
					// Handle other inputs (text, select, textarea)
					value = $(this).val();
				}

				if (name) {
					// If the field name ends with "[]", store values in an array
					if (name.endsWith('[]')) {
						// Remove the "[]" from the field name for consistency
						name = name.slice(0, -2);

						// Initialize as an array if it doesn’t already exist
						if (!formData[name]) {
							formData[name] = [];
						}
						
						// Concatenate value(s) for this field
						formData[name] = formData[name].concat(value);
					} else {
						// Store single value fields directly
						formData[name] = value;
					}
				}
			});

			console.log(formData);
			
			// Encode the form data as JSON and store it in a hidden input
			var jsonFormData = JSON.stringify(formData);
			$(".form_data_encoded").val(jsonFormData);
			$(".template_save_modal").modal('show');
		});

	
	
		
		$(document).on('change', '.example_question_switch', function () {
			var is_checked = $(this).is(':checked');
			$(".example-question-block").removeClass('rurera-hide');
			if(is_checked == false){
				$(".example-question-block").addClass('rurera-hide');
			}
		});
		
		
		$(document).on('change', '.include_fact_integration', function () {
			var is_checked = $(this).is(':checked');
			$(".fact-integration-field").removeClass('rurera-hide');
			if(is_checked == false){
				$(".fact-integration-field").addClass('rurera-hide');
			}
		});
		
		$(document).on('change', '.include_passage', function () {
			var is_checked = $(this).is(':checked');
			$(".passage-field").removeClass('rurera-hide');
			if(is_checked == false){
				$(".passage-field").addClass('rurera-hide');
			}
		});
		$(document).on('change', '.include_intro_text', function () {
			var is_checked = $(this).is(':checked');
			$(".intro-field").removeClass('rurera-hide');
			if(is_checked == false){
				$(".intro-field").addClass('rurera-hide');
			}
		});
		$(".include_fact_integration").change();
		$(".include_passage").change();
		$(".include_intro_text").change();
		$(".example_question_switch").change();
		
		
		
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
		
		
		
    });
	
	

	function addOption(questionIndex) {
        const container = document.querySelector(`[data-options-container="${questionIndex}"]`);
        const optionIndex = container.children.length;

        const optionGroup = document.createElement('div');
        optionGroup.classList.add('option-group');
        optionGroup.setAttribute('data-option-index', optionIndex);

        optionGroup.innerHTML = `
            <input type="text" name="options[]" value="" class="form-control">
            <input type="checkbox" name="correct_answers[]" value="${optionIndex}">
            <div class="option-buttons">
                <button type="button" class="move-up-btn" onclick="moveOptionUp(this)">↑</button>
                <button type="button" class="move-down-btn" onclick="moveOptionDown(this)">↓</button>
                <button type="button" class="remove-option-btn" onclick="removeOption(this)">✖</button>
            </div>
        `;
        container.appendChild(optionGroup);
    }

    function removeOption(button) {
        const optionGroup = button.closest('.option-group');
        optionGroup.remove();
    }

    function moveOptionUp(button) {
        const optionGroup = button.closest('.option-group');
        const prevSibling = optionGroup.previousElementSibling;
        if (prevSibling) {
            optionGroup.parentNode.insertBefore(optionGroup, prevSibling);
        }
    }

    function moveOptionDown(button) {
        const optionGroup = button.closest('.option-group');
        const nextSibling = optionGroup.nextElementSibling;
        if (nextSibling) {
            optionGroup.parentNode.insertBefore(nextSibling, optionGroup);
        }
    }
	
</script>

@endpush