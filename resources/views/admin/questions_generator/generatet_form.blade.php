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
        .add-option-btn, .submit-btn {
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
    </style>
@endpush

@section('content')
<section class="section">
	<div class="row">
		<div class="col-12 col-md-12">
			<div class="card">
				<div class="card-body">

	<form action="/admin/questions-generator/generate-questions" method="POST">
	@csrf

	<div class="row">
		<div class="col-md-6 col-lg-6">
			<div class="row">
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
						<select name="category_id" data-plugin-selectTwo class="form-control populate ajax-category-courses" data-course_id="">
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
						<label>Subjects</label>
						<select data-return_type="option"
								data-default_id="{{request()->get('subject_id')}}" data-chapter_id=""
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
				<div class="col-md-6 col-lg-6">
					<div class="form-group">
						<label class="input-label">Topic</label>
						<select data-sub_chapter_id="" id="chapter_id"
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
				<div class="col-md-6 col-lg-6">
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
				<div class="col-md-12 col-lg-12">
					<div class="form-group">
						<!-- Grade Selection -->
						<input type="hidden" name="grade" id="grade1" value="7">
						<!-- Question Type -->
						<label>Question Type (optional):</label>
						<div class="list-group list-in-row">
							<div class="row-field">
								<input type="radio" name="question_type" id="type_mc" value="multiple_choice">
								<label for="type_mc">Multiple Choice</label>
							</div>
							<div class="row-field">
								<input type="radio" name="question_type" id="type_tf" value="true_false">
								<label for="type_tf">True or False</label>
							</div>
							<div class="row-field">
								<input type="radio" name="question_type" id="type_oq" value="open_question">
								<label for="type_oq">Open Question</label>
							</div>
							<div class="row-field">
								<input type="radio" name="question_type" id="type_fill" value="fill_in_the_blank">
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
								<input type="radio" name="num_options" id="options3" value="3">
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
								<input type="checkbox" name="num_correct_answers[]" id="correct1" value="1">
								<label for="correct1">1</label>
							</div>
							<div class="row-field">
								<input type="checkbox" name="num_correct_answers[]" id="correct2" value="2">
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
					<!-- Include Intro Text and Passage Checkboxes -->
					<div class="list-group">
						<input type="checkbox" name="include_intro_text" class="include_intro_text" id="include_intro_text">
						<label for="include_intro_text">Include Intro Text</label>
						<input type="checkbox" name="include_passage" class="include_passage" id="include_passage">
						<label for="include_passage">Include Passage</label>
					</div>
				</div>
				<div class="col-md-12 col-lg-12 mt-4">
					<div class="passage-field">
						<div class="form-group">
							<label for="original_passage" class="mb-0">Original Passage:</label>
							<textarea name="original_passage" id="original_passage" rows="4"></textarea>
						</div>
					</div>
					<div class="col-md-12 col-lg-12 mt-4">
						<div class="form-group">
							<label for="rewording_level" class="mb-0">Rewording Level (0 - 100%):</label>
							<div class="range-output">
								<input type="range" name="rewording_level" id="rewording_level" min="0" max="100" value="50" oninput="this.nextElementSibling.value = this.value">
								<output>50</output>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-lg-12 mt-4">
						<div class="form-group">
							<label for="content_text_length" class="mb-0">Content Text Length (Max 50 Words):</label>
							<div class="range-output">
								<input type="range" name="content_text_length" id="content_text_length" min="1" max="50" value="50" oninput="this.nextElementSibling.value = this.value">
								<output>50</output>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-lg-12">
					<div class="form-group">
						<!-- Number of Questions -->
						<label for="num_questions" class="mb-0">Number of Questions (Max 20):</label>
						<div class="range-output">
							<input type="range" name="num_questions" id="num_questions" min="1" max="20" value="2" oninput="this.nextElementSibling.value = this.value">
							<output>2</output>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-lg-12 mt-4">
					<div class="form-group mb-0">
						<!-- Difficulty Level -->
						<label>Select Difficulty Level:</label>
						<div class="list-group">
							<input type="radio" name="difficulty" id="level_0" value="Easy" checked>
							<label for="level_0">Easy</label>
							
							<input type="radio" name="difficulty" id="level_1" value="Moderate">
							<label for="level_1">Moderate</label>
							
							<input type="radio" name="difficulty" id="level_2" value="Hard">
							<label for="level_2">Hard</label>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-lg-12">
					<div class="list-group">
						<input type="checkbox" name="example_question_switch" value="yes" class="example_question_switch" id="example_question_switch">
						<label for="example_question_switch">Include Example</label>
					</div>
				</div>
				</div>
				<div class="example-question-block rurera-hide">
					<div class="row">
						<div class="col-md-6 col-lg-6">
							<div class="form-group intro-field">
								<label for="intro_text_0">Intro Text:</label>
								<textarea name="intro_text" id="intro_text_0" rows="2" class="w-100 form-control"></textarea>
							</div>
						</div>
						<div class="col-md-6 col-lg-6">
							<div class="form-group passage-field">
								<label for="passage_0">Passage:</label>
								<textarea name="passage" id="passage_0" rows="4" class="w-100 form-control"></textarea>
							</div>
						</div>
						<div class="col-md-6 col-lg-6">
							<div class="form-group">
								<label for="main_question_0">Main Question:</label>
								<input type="text" name="main_question" id="main_question_0" class="w-100 form-control" value="">
							</div>
						</div>
						<div class="col-md-6 col-lg-6">
							<div class="form-group">
								<label for="fact_integration">Fact Integration:</label>
								<input type="text" name="fact_integration" id="fact_integration" class="w-100 form-control" value="">
							</div>
						</div>
						<div class="col-md-6 col-lg-6">
							<div class="form-group">
								<label for="options_label">Options Label:</label>
								<input type="text" name="options_label" id="options_label" class="w-100 form-control" value="">
							</div>
						</div>
					</div>
					
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
					</div>
					<button type="button" class="add-option-btn" onclick="addOption(0)">Add Option</button>
					<div class="row mt-3">
						<div class="col-md-12 col-lg-12">
							<label for="explanation_0">Explanation:</label>
							<textarea name="explanation" id="explanation_0" rows="3" class="w-100"></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>

        <!-- Other fields (ranges, difficulty, language) are the same as before -->

        <button type="submit" class="submit-btn">Generate Questions</button>
    </form>
	</div>
	</div>
	</div>
	</div>
</section>

@endsection

@push('scripts_bottom')
<script src="/assets/default/js/admin/jquery.min.js"></script>
<script type="text/javascript">

    $(document).ready(function () {
		
		$(document).on('change', '.example_question_switch', function () {
			var is_checked = $(this).is(':checked');
			$(".example-question-block").removeClass('rurera-hide');
			if(is_checked == false){
				$(".example-question-block").addClass('rurera-hide');
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
		$(".include_passage").change();
		$(".include_intro_text").change();
		
		
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
		
		
		
    });
	function addOption(questionIndex) {
        const container = document.querySelector(`[data-options-container="${questionIndex}"]`);
        const optionIndex = container.children.length;

        const optionGroup = document.createElement('div');
        optionGroup.classList.add('option-group');
        optionGroup.setAttribute('data-option-index', optionIndex);

        optionGroup.innerHTML = `
            <input type="text" name="options[]" value="">
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