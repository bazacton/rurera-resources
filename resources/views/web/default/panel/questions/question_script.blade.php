<script>
    (function(){

        var field_type = "{{ $field_type }}";
        var field_id = "{{ $field_key }}";
        var user_selected_value = "{{ is_object($user_selected_value)? '' : $user_selected_value }}";
        var user_selected_key = "{{ $user_selected_key }}";
        var correct_value = "{{ $correct_value }}";
        var is_result_question = "{{$is_result_question}}";

        // Get current question block (script's closest parent)
        var questionBlock = document.currentScript.closest('.rurera-question-block');

        if (!questionBlock) return;

        if (field_type === 'text' || field_type === 'number') {

            var textField = questionBlock.querySelector('#field-' + field_id);
            if (!textField) return;

            textField.value = user_selected_value;

            if (is_result_question == true) {
                if (user_selected_value !== correct_value) {
                    textField.classList.add('wrong');
                } else {
                    textField.classList.add('correct');
                }
            }

        } else if (field_type === 'radio') {

            var correctClass = (user_selected_value !== correct_value) ? 'wrong' : 'correct';

            var userInput = questionBlock.querySelector('[name="field-' + field_id + '"][value="' + user_selected_value + '"]');
            var correctInput = questionBlock.querySelector('[name="field-' + field_id + '"][value="' + correct_value + '"]');

            if (userInput) userInput.checked = true;

            if (is_result_question == true) {
                if (userInput) userInput.closest('.field-holder')?.classList.add(correctClass);
                if (correctInput) correctInput.closest('.field-holder')?.classList.add('correct');
            }

        } else if (field_type === 'checkbox') {

            var correctClass = (user_selected_value !== correct_value) ? 'wrong' : 'correct';

            var userInput = questionBlock.querySelector('[name="field-' + field_id + '"][value="' + user_selected_value + '"]');
            var correctInput = questionBlock.querySelector('[name="field-' + field_id + '"][value="' + correct_value + '"]');

            if (userInput) userInput.checked = true;

            if (is_result_question == true) {
                if (userInput) userInput.closest('.form-field')?.classList.add(correctClass);
                if (correctInput) correctInput.closest('.form-field')?.classList.add('correct');
            }

        } else if (field_type === 'truefalse_quiz') {

            var correctClass = (user_selected_value !== correct_value) ? 'wrong' : 'correct';

            var userInput = questionBlock.querySelector('[name="field-' + field_id + '"][value="' + user_selected_value + '"]');
            var correctInput = questionBlock.querySelector('[name="field-' + field_id + '"][value="' + correct_value + '"]');

            if (userInput) userInput.checked = true;

            if (is_result_question == true) {
                if (userInput) userInput.closest('.form-field')?.classList.add(correctClass);
                if (correctInput) correctInput.closest('.form-field')?.classList.add('correct');
            }

        } else if (field_type === 'textarea') {

            var textField = questionBlock.querySelector('#field-' + field_id);
            if (!textField) return;

            textField.value = user_selected_value;

            if (is_result_question == true) {
                if (user_selected_value !== correct_value) {
                    textField.classList.add('wrong');
                } else {
                    textField.classList.add('correct');
                }
            }

        } else {

            var fieldInputs = questionBlock.querySelectorAll('[name="field-' + field_id + '"]');
            var correctInput = questionBlock.querySelector('[name="field-' + field_id + '"][value="' + correct_value + '"]');

            if (user_selected_value !== correct_value) {
                fieldInputs.forEach(function(input) {
                    input.closest('.field-holder')?.classList.add('wrong');
                    input.closest('.form-field')?.classList.add('wrong');
                });
            }

            if (correctInput) {
                correctInput.classList.add('correct-mark');
                correctInput.checked = true;
            }
        }

    })();
</script>
