<div class="marking-element">
    <div class="rureraform-column-label"><label class="rureraform-label rureraform-ta-undefined">{{$elementObj->label}}</label></div>
    <div class="rureraform-column-input">
        <div class="rureraform-input rureraform-cr-layout-undefined rureraform-cr-layout-undefined">
            <div class="form-box">
			
				<div class="marking-quiz-data editor-field" id="field-{{$element_id}}">
					@if( !empty( $elementObj->markings_options ))
						@foreach( $elementObj->markings_options as $option_index => $optionObj)
							@if( !isset( $optionObj->label ))
								@php continue; @endphp
							@endif
							@php $spanClass = ($optionObj->value == 'Simple')? 'simple' : 'Selectable'; @endphp
							<span class="{{$spanClass}}">{{$optionObj->label}}</span>
						@endforeach
					@endif
				</div>
				
            </div>
        </div>
    </div>
</div>
