@php use App\Models\QuizzesQuestion; @endphp
@extends('admin.layouts.app')

@push('libraries_top')

<link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
@endpush

@section('content')
<div id="template_save_modal" class="template_save_modal modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content edit-quest-modal-div">
            <div class="modal-body">
			  <div class="modal-box">
				<h3 class="font-20 font-weight-bold text-dark mb-10">Save the Form</h3>
				<p class="mb-15 font-16">
					<input type="text" name="template_name" class="template_name form-control">
				</p>
				<input type="hidden" name="form_data_encoded" class="form_data_encoded">
				
				<div class="inactivity-controls">
					<a href="javascript:;" class="continue-btn save-template-btn btn btn-primary">Save Form</a>
					<a href="javascript:;" class="btn btn-danger" data-dismiss="modal" aria-label="Continue">Close</a>
				</div>
			  </div>
			</div>
        </div>
    </div>
</div>
<section class="section">
	<div class="row">
		<div class="col-md-12 col-lg-12">
			<div class="section-header">
				<h1 class="copyable-text">Questions Generator</h1>
				<div class="section-header-breadcrumb">
					<div class="breadcrumb-item active"><a href="/admin/">{{trans('admin/main.dashboard')}}</a>
					</div>
					<div class="breadcrumb-item">Questions Generator</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-12">
			<div class="card">
				<div class="card-body px-0 pt-0">
				
					<div class="defined-searches">
					<span><strong>Save Forms:</strong></span>
						@if( !empty( $saved_templates_array ) )
							@foreach( $saved_templates_array  as $saved_templates_data)
								@php $saved_templates = $saved_templates_data;
								$saved_templates = json_decode( $saved_templates );
								$saved_templates = isset( $saved_templates->question_ai_genearte_form )? $saved_templates->question_ai_genearte_form : array();
								@endphp
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
						@endforeach
						@endif
						<button type="button" class="btn btn-success save-template" data-form_id="question-generator-form" data-template_type="question_ai_genearte_form" ><i class="fas fa-save"></i> Save Form</button>
					</div>

	<form action="/admin/questions-generator/generate-questions/{{$questionsBulkListObj->id}}" method="POST" id="question-generator-form" class="px-25 question-generator-form">
	@csrf

	<div class="row">
		<div class="col-md-6 col-lg-6">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="form-group">
						<label for="prompt_title">Prompt Title:</label>
						<input type="text" name="prompt_title" id="prompt_title" class="w-100 form-control" value="">
					</div>
				</div>
				<div class="col-md-12 col-lg-12 rurera-hide">
					<div class="form-group">
						<!-- Content Text Area -->
						<label for="example_question_id">Question Layout ID:</label>
						<input type="number" name="example_question_id" id="example_question_id" class="w-100 form-control" value="13061">
					</div>
				</div>
				<div class="col-md-12 col-lg-12">
					<div class="form-group">
						<!-- Content Text Area -->
						<label for="instructions_ai">Instructions for AI:</label>
						<textarea class="w-100 form-control unicode-rm" name="instructions_ai" id="instructions_ai" rows="4" maxlength="400"></textarea>
					</div>
				</div>
				
				<div class="col-md-12 col-lg-12">
					<div id="accordion" class="topic-parts-data">
						
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
									<input type="checkbox" name="include_fact_integration" id="include_fact_integration" value="1" class="custom-switch-input include_fact_integration">
									<span class="custom-switch-indicator"></span>
								</label>
							</div>
							<div class="row-field">
								<label class="custom-switch pl-0">
									<label class="custom-switch-description mb-0 cursor-pointer" for="example_question_switch">Example</label>
									<input type="checkbox" name="example_question_switch" id="example_question_switch" value="1" class="custom-switch-input example_question_switch">
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
					<div class="intro-field">
						<div class="form-group">
							<label for="intro_text_main">Intro Text:</label>
							<textarea name="intro_text_main" id="intro_text_main" class="form-control w-100 unicode-rm" rows="4"></textarea>
						</div>
					</div>
					<div class="passage-field">
						<div class="form-group">
							<label for="original_passage">Original Passage:</label>
							<textarea name="original_passage" id="original_passage" class="form-control w-100 unicode-rm" rows="4"></textarea>
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
								<input type="radio" name="difficulty" id="Emerging" value="Emerging" checked>
								<label for="Emerging">Emerging</label>
							</div>
							<div class="row-field">
								<input type="radio" name="difficulty" id="Expected" value="Expected">
								<label for="Expected">Expected</label>
							</div>
							<div class="row-field">
								<input type="radio" name="difficulty" id="Exceeding" value="Exceeding">
								<label for="Exceeding">Exceeding</label>
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
								<textarea name="intro_text" id="intro_text_0" rows="2" class="w-100 form-control unicode-rm"></textarea>
							</div>
						</div>
						<div class="col-md-12 col-lg-12">
							<div class="form-group passage-field">
								<label for="passage_0">Passage:</label>
								<textarea name="passage" id="passage_0" rows="4" class="w-100 form-control unicode-rm"></textarea>
							</div>
						</div>
						<div class="col-md-12 col-lg-12">
							<div class="form-group">
								<label for="main_question_0">Main Question:</label>
								<input type="text" name="main_question" id="main_question_0" class="w-100 form-control unicode-rm" value="">
							</div>
						</div>
						<div class="col-md-6 col-lg-12 fact-integration-field">
							<div class="form-group">
								<label for="fact_integration">Fact Integration:</label>
								<textarea class="note-codable summernote-editor1 w-100 form-control unicode-rm" id="fact_integration unicode-rm" name="fact_integration"></textarea>
							</div>
						</div>
						<div class="col-md-6 col-lg-12">
							<div class="form-group">
								<label for="options_label">Options Label:</label>
								<input type="text" name="options_label" id="options_label" class="w-100 form-control unicode-rm" value="">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Options:</label>
						<div class="options-container" data-options-container="0" >
							<div class="option-group" data-option-index="0">
								<input type="text" class="form-control unicode-rm" name="options[]" value="Option 1">
								<input type="checkbox" name="correct_answers[]" value="0">
								<div class="option-buttons">
									<button type="button" class="move-up-btn" onclick="moveOptionUp(this)">↑</button>
									<button type="button" class="move-down-btn" onclick="moveOptionDown(this)">↓</button>
									<button type="button" class="remove-option-btn" onclick="removeOption(this)">✖</button>
								</div>
							</div>
							<div class="option-group" data-option-index="1">
								<input type="text" class="form-control unicode-rm" name="options[]" value="Option 2">
								<input type="checkbox" name="correct_answers[]" value="1" checked>
								<div class="option-buttons">
									<button type="button" class="move-up-btn" onclick="moveOptionUp(this)">↑</button>
									<button type="button" class="move-down-btn" onclick="moveOptionDown(this)">↓</button>
									<button type="button" class="remove-option-btn" onclick="removeOption(this)">✖</button>
								</div>
							</div>
							<div class="option-group" data-option-index="3">
								<input type="text" class="form-control unicode-rm" name="options[]" value="Option 3">
								<input type="checkbox" name="correct_answers[]" value="3">
								<div class="option-buttons">
									<button type="button" class="move-up-btn" onclick="moveOptionUp(this)">↑</button>
									<button type="button" class="move-down-btn" onclick="moveOptionDown(this)">↓</button>
									<button type="button" class="remove-option-btn" onclick="removeOption(this)">✖</button>
								</div>
							</div>
							<div class="option-group" data-option-index="4">
								<input type="text" class="form-control unicode-rm" name="options[]" value="Option 4">
								<input type="checkbox" name="correct_answers[]" value="4">
								<div class="option-buttons">
									<button type="button" class="move-up-btn" onclick="moveOptionUp(this)">↑</button>
									<button type="button" class="move-down-btn" onclick="moveOptionDown(this)">↓</button>
									<button type="button" class="remove-option-btn" onclick="removeOption(this)">✖</button>
								</div>
							</div>
						</div>
					</div>
					<button type="button" class="add-option-btn" onclick="addOption(0)"><i class="fas fa-plus"></i> Add Option</button>
					<div class="row mt-3">
						<div class="col-md-12 col-lg-12">
							<div class="form-group">
								<label for="explanation_0">Explanation:</label>
								<textarea class="note-codable summernote-editor1 unicode-rm w-100 form-control" id="explanation" name="explanation"></textarea>
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
		
		$(document).on('submit', '.question-generator-form', function() {
			var thisForm = $(this);
			returnType = rurera_validation_process(thisForm);
			if (returnType == false) {
				return false;
			}
			return true;
			
		});
		
		$(document).on('input', '.unicode-rm', function() {
			// Convert Unicode representations
			$(this).val(function(_, val) {
				// Decode Unicode escape sequences like \u2019 to their characters
				val = val.replace(/\\u([\dA-F]{4})/gi, function(match, grp) {
					return String.fromCharCode(parseInt(grp, 16));
				});

				// Decode HTML entities like &nbsp;, &amp;, etc.
				var txt = $('<textarea>').html(val).text();
				return txt;
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

		$(document).on('click', '.topic_parts', function () {
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
						formData[name] = [];
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
					$('.ajax-subchapter-dropdown').change();
				}
			});
		});
		
		
		$(document).on('change', '.ajax-subchapter-dropdown', function () {
			var sub_chapter_id = $(this).val();
			var topic_part = $(this).attr('data-next_value');
			$.ajax({
				type: "GET",
				url: '/admin/webinars/topic_parts_by_sub_chapter_generation_form',
				data: {'sub_chapter_id': sub_chapter_id, 'topic_part': topic_part},
				success: function (return_data) {
					$(".topic-parts-data").html(return_data);
				}
			});
		});
		
		var sub_chapter_id = '{{$questionsBulkListObj->sub_chapter_id}}';
		$.ajax({
			type: "GET",
			url: '/admin/webinars/topic_parts_by_sub_chapter_generation_form',
			data: {'sub_chapter_id': sub_chapter_id},
			success: function (return_data) {
				$(".topic-parts-data").html(return_data);
			}
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