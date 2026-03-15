<script class="question-script">
    var field_type = "{{ $field_type }}";
    var field_id = "{{ $field_key }}";
    var result_question_id = "{{ $result_question_id }}";
    var user_selected_value = "{{ is_object($user_selected_value)? '' : $user_selected_value }}";
    var user_selected_key = "{{ $user_selected_key }}";
    var correct_value = "{{ $correct_value }}";
    var is_result_question = "{{$is_result_question}}";

    var scriptTag = document.currentScript;
    var questionBlock = scriptTag.closest('.rurera-question-block');

    if (field_type === 'text' || field_type === 'number') {

        var textField = questionBlock.querySelector('#field-' + field_id);
        if(textField){
            textField.value = user_selected_value;

            if(is_result_question == true){
                if (user_selected_value !== correct_value) {
                    textField.classList.add('wrong');
                } else {
                    textField.classList.add('correct');
                }
            }
        }

    } else if (field_type === 'radio') {

        var textField = questionBlock.querySelector('#field-' + field_id);
        var correctClass = (user_selected_value !== correct_value) ? 'wrong' : 'correct';

        var selectedInput = questionBlock.querySelector('[name="field-' + field_id + '"][value="' + user_selected_value + '"]');
        var correctInput = questionBlock.querySelector('[name="field-' + field_id + '"][value="' + correct_value + '"]');

        if(is_result_question == true){

            if(selectedInput && selectedInput.closest('.field-holder')){
                selectedInput.closest('.field-holder').classList.add(correctClass);
            }

            if(correctInput && correctInput.closest('.field-holder')){
                correctInput.closest('.field-holder').classList.add('correct');
            }

        }

        if(selectedInput){
            selectedInput.checked = true;
        }

    } else if (field_type === 'checkbox') {

        var textField = questionBlock.querySelector('#field-' + field_id);
        var correctClass = (user_selected_value !== correct_value) ? 'wrong' : 'correct';

        var selectedInput = questionBlock.querySelector('[name="field-' + field_id + '"][value="' + user_selected_value + '"]');
        var correctInput = questionBlock.querySelector('[name="field-' + field_id + '"][value="' + correct_value + '"]');

        if(is_result_question == true){

            if(selectedInput && selectedInput.closest('.form-field')){
                selectedInput.closest('.form-field').classList.add(correctClass);
            }

            if(correctInput && correctInput.closest('.form-field')){
                correctInput.closest('.form-field').classList.add('correct');
            }

        }

        if(selectedInput){
            selectedInput.checked = true;
        }

    } else if (field_type === 'truefalse_quiz') {

        var textField = questionBlock.querySelector('#field-' + field_id);
        var correctClass = (user_selected_value !== correct_value) ? 'wrong' : 'correct';

        var selectedInput = questionBlock.querySelector('[name="field-' + field_id + '"][value="' + user_selected_value + '"]');
        var correctInput = questionBlock.querySelector('[name="field-' + field_id + '"][value="' + correct_value + '"]');

        if(is_result_question == true){

            if(selectedInput && selectedInput.closest('.form-field')){
                selectedInput.closest('.form-field').classList.add(correctClass);
            }

            if(correctInput && correctInput.closest('.form-field')){
                correctInput.closest('.form-field').classList.add('correct');
            }

        }

        if(selectedInput){
            selectedInput.checked = true;
        }

    } else if (field_type === 'textarea') {

        var textField = questionBlock.querySelector('#field-' + field_id);

        if(textField){
            textField.value = user_selected_value;

            if(is_result_question == true){
                if (user_selected_value !== correct_value) {
                    textField.classList.add('wrong');
                } else {
                    textField.classList.add('correct');
                }
            }
        }

    } else if (field_type === 'truefalse_quiz') {

    } else {

        var fieldInputs = questionBlock.querySelectorAll('[name="field-' + field_id + '"]');
        var correctInput = questionBlock.querySelector('[name="field-' + field_id + '"][value="' + correct_value + '"]');

        if (user_selected_value !== correct_value) {

            fieldInputs.forEach(function(input) {

                if(input.closest('.field-holder')){
                    input.closest('.field-holder').classList.add('wrong');
                }

                if(input.closest('.form-field')){
                    input.closest('.form-field').classList.add('wrong');
                }

            });

        }

        if(correctInput){
            correctInput.classList.add('correct-mark');
            correctInput.checked = true;
        }

    }

</script>
