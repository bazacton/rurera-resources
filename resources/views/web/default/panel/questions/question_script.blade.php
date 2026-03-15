<script class="question-script">
    var field_type = "{{ $field_type }}";
    var field_id = "{{ $field_key }}";
    var result_question_id = "{{ $result_question_id }}";
    var user_selected_value = "{{ is_object($user_selected_value)? '' : $user_selected_value }}";
    var user_selected_key = "{{ $user_selected_key }}";
    var correct_value = "{{ $correct_value }}";
    var is_result_question = "{{$is_result_question}}";

    var questionBlock = $('.rurera-question-block[data-qresult="'+is_result_question+'"]');

    if (field_type === 'text' || field_type === 'number') {

        var textField = questionBlock.find('#field-' + field_id);

        if(textField.length){
            textField.val(user_selected_value);

            if(is_result_question == true){
                if (user_selected_value !== correct_value) {
                    textField.addClass('wrong');
                } else {
                    textField.addClass('correct');
                }
            }
        }

    } else if (field_type === 'radio') {

        var textField = questionBlock.find('#field-' + field_id);
        var correctClass = (user_selected_value !== correct_value) ? 'wrong' : 'correct';

        var selectedInput = questionBlock.find('[name="field-' + field_id + '"][value="' + user_selected_value + '"]');
        var correctInput = questionBlock.find('[name="field-' + field_id + '"][value="' + correct_value + '"]');

        if(is_result_question == true){

            if(selectedInput.length && selectedInput.closest('.field-holder').length){
                selectedInput.closest('.field-holder').addClass(correctClass);
            }

            if(correctInput.length && correctInput.closest('.field-holder').length){
                correctInput.closest('.field-holder').addClass('correct');
            }

        }

        if(selectedInput.length){
            selectedInput.prop('checked', true);
        }

    } else if (field_type === 'checkbox') {

        var textField = questionBlock.find('#field-' + field_id);
        var correctClass = (user_selected_value !== correct_value) ? 'wrong' : 'correct';

        var selectedInput = questionBlock.find('[name="field-' + field_id + '"][value="' + user_selected_value + '"]');
        var correctInput = questionBlock.find('[name="field-' + field_id + '"][value="' + correct_value + '"]');

        if(is_result_question == true){

            if(selectedInput.length && selectedInput.closest('.form-field').length){
                selectedInput.closest('.form-field').addClass(correctClass);
            }

            if(correctInput.length && correctInput.closest('.form-field').length){
                correctInput.closest('.form-field').addClass('correct');
            }

        }

        if(selectedInput.length){
            selectedInput.prop('checked', true);
        }

    } else if (field_type === 'truefalse_quiz') {

        var textField = questionBlock.find('#field-' + field_id);
        var correctClass = (user_selected_value !== correct_value) ? 'wrong' : 'correct';

        var selectedInput = questionBlock.find('[name="field-' + field_id + '"][value="' + user_selected_value + '"]');
        var correctInput = questionBlock.find('[name="field-' + field_id + '"][value="' + correct_value + '"]');

        if(is_result_question == true){

            if(selectedInput.length && selectedInput.closest('.form-field').length){
                selectedInput.closest('.form-field').addClass(correctClass);
            }

            if(correctInput.length && correctInput.closest('.form-field').length){
                correctInput.closest('.form-field').addClass('correct');
            }

        }

        if(selectedInput.length){
            selectedInput.prop('checked', true);
        }

    } else if (field_type === 'textarea') {

        var textField = questionBlock.find('#field-' + field_id);

        if(textField.length){
            textField.val(user_selected_value);

            if(is_result_question == true){
                if (user_selected_value !== correct_value) {
                    textField.addClass('wrong');
                } else {
                    textField.addClass('correct');
                }
            }
        }

    } else if (field_type === 'truefalse_quiz') {

    } else {

        var fieldInputs = questionBlock.find('[name="field-' + field_id + '"]');
        var correctInput = questionBlock.find('[name="field-' + field_id + '"][value="' + correct_value + '"]');

        if (user_selected_value !== correct_value) {

            fieldInputs.each(function(){
                var input = $(this);

                if(input.closest('.field-holder').length){
                    input.closest('.field-holder').addClass('wrong');
                }

                if(input.closest('.form-field').length){
                    input.closest('.form-field').addClass('wrong');
                }

            });

        }

        if(correctInput.length){
            correctInput.addClass('correct-mark');
            correctInput.prop('checked', true);
        }

    }

</script>
