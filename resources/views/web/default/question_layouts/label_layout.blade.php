@php $label_type = isset( $elementObj->label_type ) ? $elementObj->label_type : 'question_label'; @endphp
<div id="rureraform-element-{{$element_id}}" class="rureraform-element-{{$element_id}} rureraform-element quiz-group rureraform-element-html ui-sortable-handle" data-type="{{$elementObj->type}}">
	@if($label_type == 'h1' || $label_type == 'h2' || $label_type == 'h3' || $label_type == 'h4' || $label_type == 'h5' || $label_type == 'h6')
		<{{$label_type}}>{!! $elementObj->content !!}</{{$label_type}}>
	@elseif($label_type == 'cloud_text')
        @php pre($elementObj, false); @endphp
        <div class="question-label {{$label_type}} medium left_top"><span class="cloud_text_element"><span class="cloud_avatar"><img src="/assets/default/svgs/cloud-kids-avatars/boy-svg-2.svg"></span><span class="cloud_nner_text" style="background:white"><svgdata class="rurera-svg-data0_6684">{!! $elementObj->content !!}</svgdata></span></span></div>
    @else
		<div class="question-label {{$label_type}}"><span>{!! $elementObj->content !!}</span></div>
	@endif
</div>
