@php $hasImage = !empty(array_filter($elementObj->sortable_options, fn($options) => isset($options) && !empty($options->image)));
$has_image_class = ($hasImage == 1)? 'lms-radio-img' : '';
@endphp

<div class="sortable-element">
    <div class="rureraform-column-label"><label class="rureraform-label rureraform-ta-undefined">{{$elementObj->label}}</label></div>
    <div class="rureraform-column-input">
        <div class="rureraform-input rureraform-cr-layout-undefined rureraform-cr-layout-undefined">
		
            <div class="form-box lms-sorting-fields lms-sorting-container-{{$elementObj->field_id}} {{$elementObj->template_style}} {{$elementObj->list_style}} {{$elementObj->image_size}} {{$has_image_class}} {{$elementObj->template_alignment}}">
			
				@if( !empty( $elementObj->sortable_options ))
					@foreach( $elementObj->sortable_options as $option_index => $optionObj)
						@if( !isset( $optionObj->label ))
							@php continue; @endphp
						@endif
						
						<div class="field-holder">
							<span class="sort-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
							<label for="field-{{$element_id}}-{{$option_index}}">
							@if( isset( $optionObj->image ) && $optionObj->image != '')
								<img src="{{$optionObj->image}}" alt="">
							@endif
							<span class="lable-info">
								{{$optionObj->label}}
							</span>
							</label>
						</div>
						
					@endforeach
				@endif
			
			
            </div>
        </div>
        <label class="rureraform-description"></label>
    </div>
</div>
<script>
jQuery(function ($) {
    var $container = $(".lms-sorting-container-{{$elementObj->field_id}}");

    if ($container.length > 0) {
        $container.sortable();
    }
});
</script>