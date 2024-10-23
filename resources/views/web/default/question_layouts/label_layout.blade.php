<div id="rureraform-element-{{$element_id}}" class="rureraform-element-{{$element_id}} rureraform-element quiz-group rureraform-element-html ui-sortable-handle" data-type="{{$elementObj->type}}">
	<div class="question-label {{isset( $elementObj->label_type ) ? $elementObj->label_type : ''}}"><span>{!! $elementObj->content !!}</span></div>
</div>
