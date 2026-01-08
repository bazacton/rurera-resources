@php $hasImage = !empty(array_filter($elementObj->options, fn($options) => isset($options) && !empty($options->image)));
$has_image_class = ($hasImage == 1)? 'lms-radio-img' : '';
@endphp
@php $randomID = rand(0,9999); @endphp


<style>
    .active-option {
        background: #efefef !important;
    }
</style>
<div id="rureraform-element-{{$element_id}}" class="quiz-group draggable3 rureraform-element-{{$element_id}} rureraform-element rureraform-element-label-undefined rureraform-element-description-undefined ui-sortable-handle" data-type="draggable_quiz">


	<div class="rureraform-column-label"><label class="rureraform-label rureraform-ta-undefined">{{$elementObj->label}}</label></div>
	   {!! $content !!}

	   @if( !empty( $elementObj->options ))
		   <ul class="draggable-items pl-0 draggable-items-{{$element_id}}">
			@foreach( $elementObj->options as $option_index => $optionObj)
				@if( !isset( $optionObj->label ))
					@php continue; @endphp
				@endif
				<li><span class="draggable-option-{{$element_id}}"><img src="/assets/default/svgs/drag-dots.svg" alt="drag-dots"> {{$optionObj->label}}</span></li>
			@endforeach
			</ul>
		@endif
    <div class="rureraform-element-cover"></div>
</div>

<script>
    $(".draggable-option-{{$element_id}}").draggable({
        revert: "invalid",
        helper: "clone"
    });
    $(".droppable-field-{{$element_id}}").droppable({
        accept: ".draggable-option-{{$element_id}}",
        drop: function (event, ui) {
            $(this).val($.trim(ui.helper.text()));
        }
    });
    $(document).on("dblclick", ".droppable-field-{{$element_id}}", function () {
        $(this).val('');
    });

    $(document).on("click", ".draggable-option-{{$element_id}}", function () {
        selectedOptionText = $.trim($(this).text());

        $('.draggable-option-{{$element_id}}').removeClass("active-option");
        // Optional visual feedback
        $(".draggable-option").removeClass("active-option");
        $(this).addClass("active-option");
    });

    $(document).on("click", ".droppable-field-{{$element_id}}", function () {
        if (!selectedOptionText) return;

        $('.draggable-option-{{$element_id}}').removeClass("active-option");
        $(this).val(selectedOptionText);
    });
</script>
