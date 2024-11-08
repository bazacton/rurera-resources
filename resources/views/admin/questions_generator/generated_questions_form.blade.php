<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Generator</title>
	<?php $random_id = rand(111,9999); ?>
	<link rel="stylesheet" href="/assets/default/css/quiz-create.css?ver=<?php echo $random_id; ?>">
	<style>
		.rurera-hide{display:none;}
	</style>
</head>
<body>
<div class="container">
<h2>Edit Questions </h2>
</div>
<?php $counter = 1; ?>
<?php foreach ($questions_array as $index => $question): ?>
	<?php $keywords = isset( $question['keywords'] )? $question['keywords'] : array(); ?>
	<h3>Question #: <?php $counter; ?></h3>
    <div class="api-questions-form container" data-question-index="<?= $index ?>">
		<?php if($AiApiCallObj->api_type != 'chatgpt'){ ?>
		<h5>Cost: ${{$cost_per_question}}</h5>
		<?php } ?>
        <form action="/admin/questions-generator/update-question" method="POST">
			@csrf
			<input type="hidden" name="category_id" value="{{$category_id}}">
			<input type="hidden" name="subject_id" value="{{$subject_id}}">
			<input type="hidden" name="chapter_id" value="{{$chapter_id}}">
			<input type="hidden" name="sub_chapter_id" value="{{$sub_chapter_id}}">
			<input type="hidden" name="difficulty_level" value="{{$AiApiCallObj->difficulty_level}}">
			<input type="hidden" name="example_question_id" value="{{$AiApiCallObj->example_question_id}}">
            <input type="hidden" name="question_id" value="<?= $index ?>">
            <input type="hidden" name="question_type" value="multiple_choice">
            <div class="question-general-block">
				<?php if(isset( $question['intro_text'] )){ ?>
					<div class="question-label question_heading"><span class="editable-content" data-edit_field="intro_text" contenteditable="true"><?= isset( $question['intro_text'] )? htmlspecialchars($question['intro_text']): ''; ?></span></div>
					<textarea class="rurera-hide" name="intro_text" id="intro_text_<?= $index ?>" rows="2"><?= isset( $question['intro_text'] )? htmlspecialchars($question['intro_text']): ''; ?></textarea>
					
				<?php } ?>
				<?php if(isset( $question['passage'] )){ ?>
					<span><textarea name="passage" id="passage_<?= $index ?>" rows="4"><?= isset( $question['passage'] )? htmlspecialchars($question['passage']) : ''; ?></textarea></span>
				<?php } ?>
				
				<div class="question-label question_label"><span class="editable-content" data-edit_field="main_question" contenteditable="true"><?= isset( $question['main_question'] )? htmlspecialchars($question['main_question']): ''; ?></span></div>
				<input type="text" class="rurera-hide" name="main_question" id="main_question_<?= $index ?>" value="<?= htmlspecialchars($question['main_question']) ?>">

				<?php if(isset( $question['instruction'] )){ ?>
				<label for="instruction_<?= $index ?>">Instruction:</label>
				<input type="text" name="instruction" id="instruction_<?= $index ?>" value="<?= htmlspecialchars($question['instruction']) ?>">
				<?php } ?>
				<?php if(isset( $question['options_label'] )){ ?>
				<input type="text" class="rureraform-label" name="options_label" id="options_label<?= $index ?>" value="<?= htmlspecialchars($question['options_label']) ?>">
				<?php } ?>
				<div class="options-container numeric-list-style" data-options-container="<?= $index ?>">
					<?php shuffle($question['options']); ?>
					<?php foreach ($question['options'] as $option_index => $option): ?>
						<div class="option-group" data-option-index="<?= $option_index ?>">
							<input type="text" name="options[]" value="<?= htmlspecialchars($option) ?>">
							<input type="checkbox" name="correct_answers[]" value="<?= $option_index ?>"
								<?php if (in_array($option, $question['correct_answers'])) echo 'checked'; ?>>
							<div class="option-buttons">
								<button type="button" class="move-up-btn" onclick="moveOptionUp(this)">↑</button>
								<button type="button" class="move-down-btn" onclick="moveOptionDown(this)">↓</button>
								<button type="button" class="remove-option-btn" onclick="removeOption(this)">✖</button>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<button type="button" class="add-option-btn" onclick="addOption(<?= $index ?>)">Add Option</button>
			</div>
			<div class="question-explain-block">
			<h3>Explanation</h3>
            <textarea name="explanation" id="explanation_<?= $index ?>" rows="3"><?= htmlspecialchars($question['explanation']) ?></textarea>
			
			<?php if(isset( $question['fact_integration'] )){ ?>
				<textarea name="fact_integration" id="fact_integration_<?= $index ?>" rows="4"><?= isset( $question['fact_integration'] )? htmlspecialchars($question['fact_integration']) : ''; ?></textarea>
			<?php } ?>
			</div>
			<div class="question-keywors-block">
				<!-- Keywords Section -->
				<h3>Keywords</h3>
				<div class="keywords-section">
					<?php foreach ($keywords as $keyword_index => $keyword): ?>
						<div class="keyword-block" data-keyword-index="<?= $keyword_index ?>">
							<input type="text" name="keywords[<?= $keyword_index ?>][term]" value="<?= htmlspecialchars($keyword['term']) ?>">
							<textarea name="keywords[<?= $keyword_index ?>][description]" rows="2"><?= htmlspecialchars($keyword['description']) ?></textarea>
							<div class="keyword-buttons">
								<?php if(count($keywords) > 1){ ?>
								<button type="button" class="move-up-keyword" onclick="moveKeywordUp(this)">↑</button>
								<button type="button" class="move-down-keyword" onclick="moveKeywordDown(this)">↓</button>
								<?php } ?>
								<button type="button" class="remove-keyword" onclick="removeKeyword(this)">✖</button>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

            <button type="button" class="submit-btn">Save Question</button>
        </form>
    </div>
<?php $counter++ endforeach; ?>
<script src="/assets/default/js/admin/jquery.min.js"></script>
<script>
	$(document).on('click', '.submit-btn', function () {
		var form_data = new FormData($(this).closest('form')[0]);
		var thisObj = $(this);
		$.ajax({
			type: "POST",
			url: '/admin/questions-generator/update-question',
			data: form_data,
			contentType: false, // Important: Don't set content type for FormData
			processData: false, // Important: Don't process data for FormData
			success: function (return_data) {
				thisObj.closest('.container').html(return_data);
			}
		});
	});
	
	$(document).on('click change keyup keydown keypress', '.editable-content', function () {
		var editable_field_name = $(this).attr('data-edit_field');
		var new_value = $(this).html();
		$('[name="'+editable_field_name+'"]').val(new_value);
	});
	
	
	
	
	function moveKeywordUp(button) {
		let block = button.closest('.keyword-block');
		let prev = block.previousElementSibling;
		if (prev) block.parentNode.insertBefore(block, prev);
	}

	function moveKeywordDown(button) {
		let block = button.closest('.keyword-block');
		let next = block.nextElementSibling;
		if (next) block.parentNode.insertBefore(next, block);
	}
	
	$(document).on('click', '.remove-keyword', function () {
		$(this).closest('.keyword-block').remove();
		console.log($(this).closest('.keywords-section').find(".keyword-block").length);
		if($(this).closest('.keywords-section').find(".keyword-block").length == 1){
			$(this).closest('.keywords-section').find(".move-up-keyword").remove();
			$(this).closest('.keywords-section').find(".move-down-keyword").remove();
		}
	});

	function removeKeyword(button) {
		let block = button.closest('.keyword-block');
		block.remove();
		
	}
		
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

</body>
</html>
