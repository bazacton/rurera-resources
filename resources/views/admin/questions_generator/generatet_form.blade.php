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
    </style>
@endpush

@section('content')
<section class="section">
	<form action="/admin/testt" method="POST">
		@csrf
		
        <!-- Content Text Area -->
        <label for="content">Enter Content (Max 400 Words):</label>
        <textarea name="content" id="content" rows="4" maxlength="400" required></textarea>

		
		
		<div class="col-md-3">
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
	
	
	
	

	<div class="col-md-3">
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
	
	
	<div class="col-md-2">
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
		
        <!-- Grade Selection -->
		<input type="hidden" name="grade" id="grade1" value="7">
        <!-- Question Type -->
        <label>Question Type (optional):</label>
        <div class="list-group">
            <input type="radio" name="question_type" id="type_mc" value="multiple_choice">
            <label for="type_mc">Multiple Choice</label>
            <input type="radio" name="question_type" id="type_tf" value="true_false">
            <label for="type_tf">True or False</label>
            <input type="radio" name="question_type" id="type_oq" value="open_question">
            <label for="type_oq">Open Question</label>
            <input type="radio" name="question_type" id="type_fill" value="fill_in_the_blank">
            <label for="type_fill">Fill in the Blank</label>
            <input type="radio" name="question_type" id="type_match" value="matching">
            <label for="type_match">Matching</label>
        </div>

        <!-- Number of Options -->
        <label>Number of Options (0-6):</label>
        <div class="list-group">
            <input type="radio" name="num_options" id="options1" value="1">
            <label for="options1">1</label>
            <input type="radio" name="num_options" id="options2" value="2">
            <label for="options2">2</label>
            <input type="radio" name="num_options" id="options3" value="3">
            <label for="options3">3</label>
            <input type="radio" name="num_options" id="options4" value="4">
            <label for="options4">4</label>
            <input type="radio" name="num_options" id="options5" value="5">
            <label for="options5">5</label>
            <input type="radio" name="num_options" id="options6" value="6">
            <label for="options6">6</label>
        </div>

        <!-- Correct Answers -->
        <label>Select Correct Answers (2-3):</label>
        <div class="list-group">
			<input type="checkbox" name="num_correct_answers[]" id="correct1" value="1">
            <label for="correct1">1</label>
            <input type="checkbox" name="num_correct_answers[]" id="correct2" value="2">
            <label for="correct2">2</label>
            <input type="checkbox" name="num_correct_answers[]" id="correct3" value="3">
            <label for="correct3">3</label>
        </div>

        <!-- Include Intro Text and Passage Checkboxes -->
        <div class="list-group">
            <input type="checkbox" name="include_intro_text" class="include_intro_text" id="include_intro_text">
            <label for="include_intro_text">Include Intro Text</label>
            <input type="checkbox" name="include_passage" class="include_passage" id="include_passage">
            <label for="include_passage">Include Passage</label>
        </div>
		
		<!-- Rewording Level -->
		<label for="rewording_level">Rewording Level (0 - 100%):</label>
		<div class="range-output">
			<input type="range" name="rewording_level" id="rewording_level" min="0" max="100" value="50" oninput="this.nextElementSibling.value = this.value">
			<output>50</output>
		</div>

		<!-- Content Text Length -->
		<label for="content_text_length">Content Text Length (Max 50 Words):</label>
		<div class="range-output">
			<input type="range" name="content_text_length" id="content_text_length" min="1" max="50" value="50" oninput="this.nextElementSibling.value = this.value">
			<output>50</output>
		</div>

		<!-- Number of Questions -->
		<label for="num_questions">Number of Questions (Max 20):</label>
		<div class="range-output">
			<input type="range" name="num_questions" id="num_questions" min="1" max="20" value="2" oninput="this.nextElementSibling.value = this.value">
			<output>2</output>
		</div>
		
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
		
		
		
		<!-- Example Form -->
		
		<div class="list-group">
            <input type="checkbox" name="example_question_switch" value="yes" class="example_question_switch" id="example_question_switch">
            <label for="example_question_switch">Include Example</label>
        </div>
		<div class="example-question-block rurera-hide">
			<div class="form-control">
				<label for="main_question">Main Question:</label>
				<input type="text" class="form-control" name="main_question" id="main_question" >
			</div>
			
			<div class="form-control">
				<label for="fact_integration">Fact Integration:</label>
				<input type="text" class="form-control" name="fact_integration" id="fact_integration" >
			</div>
			<div class="form-control">
				<label for="instruction">Instruction:</label>
				<input type="text" class="form-control" name="instruction" id="instruction" >
			</div>
			<div class="form-control intro-field">
				<label for="intro_text">Intro Text:</label>
				<textarea class="form-control" rows="5" name="intro_text" id="intro_text" ></textarea>
			</div>
			<div class="form-control passage-field">
				<label for="passage">Passage:</label>
				<textarea class="form-control" rows="5" name="passage" id="passage" ></textarea>
			</div>
			<div class="form-control">
				<label for="options">Options:</label>
				<textarea class="form-control" rows="5" name="options" id="options" ></textarea>
			</div>
			<div class="form-control">
				<label for="correct_answers">Correct Answers:</label>
				<input type="text" class="form-control" name="correct_answers" id="correct_answers" >
			</div>
			<div class="form-control">
				<label for="explanation">Explanation:</label>
				<textarea class="form-control" rows="5" name="explanation" id="explanation" ></textarea>
			</div>
		</div>
			

        <!-- Other fields (ranges, difficulty, language) are the same as before -->

        <button type="submit" class="submit-btn">Generate Questions</button>
    </form>
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
	
</script>

@endpush