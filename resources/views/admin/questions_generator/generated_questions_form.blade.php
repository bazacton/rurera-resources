<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Generator</title>
    <style>
        /* Basic styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 100%;
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
            color: #555;
        }
        textarea, input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid transparent;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 15px;
        }
        textarea:focus, input[type="text"]:focus {
            border-color: #ddd;
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
            cursor: pointer;
            margin-top: 20px;
            display: block;
            width: 100%;
            border: 0;
            background-color: inherit;
            text-align: right;
            text-decoration: underline;
        }
        .remove-option-btn {
            background-color: #f44336;
            color: white;
        }
        .move-up-btn, .move-down-btn {
            background-color: #2196F3;
            color: white;
        }
    </style>
</head>
<body>
<h2>Edit Questions </h2>

<?php foreach ($questions_array as $index => $question): ?>
    <div class="container" data-question-index="<?= $index ?>">
		<h5>Cost: ${{$cost_per_question}}</h5>
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
            
			<?php if(isset( $question['intro_text'] )){ ?>
				<label for="intro_text_<?= $index ?>">Intro Text:</label>
				<textarea name="intro_text" id="intro_text_<?= $index ?>" rows="2"><?= isset( $question['intro_text'] )? htmlspecialchars($question['intro_text']): ''; ?></textarea>
			<?php } ?>
            <?php if(isset( $question['passage'] )){ ?>
				<label for="passage_<?= $index ?>">Passage:</label>
				<textarea name="passage" id="passage_<?= $index ?>" rows="4"><?= isset( $question['passage'] )? htmlspecialchars($question['passage']) : ''; ?></textarea>
			<?php } ?>

            <label for="main_question_<?= $index ?>">Main Question:</label>
            <input type="text" name="main_question" id="main_question_<?= $index ?>" value="<?= htmlspecialchars($question['main_question']) ?>">

			<?php if(isset( $question['instruction'] )){ ?>
            <label for="instruction_<?= $index ?>">Instruction:</label>
            <input type="text" name="instruction" id="instruction_<?= $index ?>" value="<?= htmlspecialchars($question['instruction']) ?>">
			<?php } ?>

            <label>Options:</label>
            <div class="options-container" data-options-container="<?= $index ?>">
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

            <label for="explanation_<?= $index ?>">Explanation:</label>
            <textarea name="explanation" id="explanation_<?= $index ?>" rows="3"><?= htmlspecialchars($question['explanation']) ?></textarea>
			
			<?php if(isset( $question['fact_integration'] )){ ?>
				<label for="fact_integration_<?= $index ?>">Fact Integration:</label>
				<textarea name="fact_integration" id="fact_integration_<?= $index ?>" rows="4"><?= isset( $question['fact_integration'] )? htmlspecialchars($question['fact_integration']) : ''; ?></textarea>
			<?php } ?>
			

            <button type="button" class="submit-btn">Save Question</button>
        </form>
    </div>
<?php endforeach; ?>
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
