@php $randomID = rand(0,9999); @endphp


<div id="rureraform-element-{{$element_id}}" class="quiz-group draggable3 rureraform-element-{{$element_id}} rureraform-element rureraform-element-label-undefined rureraform-element-description-undefined ui-sortable-handle" data-type="checkbox">
   @if($elementObj->question_label != '')
	<span class="truefalse_question_label">{{$elementObj->question_label}}</span>
	@endif
   <span class="truefalse_quiz rureraform-input rureraform-cr-layout-undefined rureraform-cr-layout-undefined">
      <div class="form-box rurera-in-row undefined image-right none">
         <div class="lms-radio-select rurera-in-row undefined image-right none">
            
			<div class="field-holder rureraform-cr-container-medium rureraform-cr-container-undefined">
               <input class="editor-field" type="radio" name="field-{{$element_unique_id}}" id="field-{{$element_unique_id}}-0-0" value="True" />
				<label for="field-{{$element_unique_id}}-0">
				<span class="inner-label">True</span></label>
            </div>
            <div class=" field-holder rureraform-cr-container-medium rureraform-cr-container-undefined">
               <input class="editor-field" type="radio" name="field-{{$element_unique_id}}" id="field-{{$element_unique_id}}-0-1" value="False" />
				<label for="field-{{$element_unique_id}}-1">
				<span class="inner-label">False</span></label>
            </div>
			
         </div>
      </div>
   </span>
   @if($elementObj->hint != '')
	<span class="question_hint">{{$elementObj->hint}}</span>
	@endif
   
   <div class="rureraform-element-cover"></div>
</div>
