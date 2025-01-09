@push('styles_top')
<style>
	#nav-home img {
		border-radius: 0 96px;
    	background: linear-gradient(0.06deg, #fafafa 0%, #f6f6f6 29.62%, #eaeaea 58.47%, #d7d7d7 86.92%, #cccccc 99.22%);
	}
	#nav-home .image-field{
		border-radius: 0 100px;
    	background: linear-gradient(0.01deg, #b3b3b3 8.92%, #d5d5d5 31.91%, #f0f0f0 54.33%, #fafafa 67.52%);
		display: inline-block;
		padding: 8px;
	}

	#nav-profile img {
		border-radius: 0 96px;
    background: linear-gradient(0.06deg, #fafafa 0%, #f6f6f6 29.62%, #eaeaea 58.47%, #d7d7d7 86.92%, #cccccc 99.22%);
	}
	#nav-profile .image-field{
		box-shadow: 0 1px 0 #ccc, 0 2px 0 #c9c9c9, 0 3px 0 #bbb, 0 0px 0 #b9b9b9, 0 5px 0 rgba(125, 125, 125, 0.2), 0 6px 1px rgba(0, 0, 0, 0.2), 0 0 5px rgba(0, 0, 0, 0.2), 0 1px 3px rgba(0, 0, 0, 0.2), 0 3px 5px rgba(0, 0, 0, 0.2), 0 5px 10px rgba(0, 0, 0, 0.2), 0 10px 10px rgba(0, 0, 0, 0.2), 0 20px 20px rgba(0, 0, 0, 0.2), 0 0 4px white, 0 0px 3px white, 1px 1px 5px rgba(255, 155, 0, 0.37), 1px 1px 10px rgba(102, 60, 0, 0.5);
		display: inline-block;
		padding: 8px;
		border-radius: 0 100px;
    	background: linear-gradient(0.01deg, #b3b3b3 8.92%, #d5d5d5 31.91%, #f0f0f0 54.33%, #fafafa 67.52%);
	}


	#nav-contact img {
		border-radius: 168px 0;
		background: linear-gradient(0.06deg, #fafafa 0%, #f6f6f6 29.62%, #eaeaea 58.47%, #d7d7d7 86.92%, #cccccc 99.22%);
	}
	#nav-contact .image-field{
		display: inline-block;
		padding: 8px;
		border-radius: 150px 0;
    box-shadow: -1px -1px 2px #eee, -1px 0px 3px #eee, -4px 8px 8px rgba(0, 0, 0, 0.1), -8px 16px 16px rgba(0, 0, 0, 0.1), -16px 32px 32px rgba(0, 0, 0, 0.15), -32px 64px 64px rgba(0, 0, 0, 0.25)
	}


	#nav-contact2 img {
		border-radius: 140px 0;
		background: linear-gradient(0.06deg, #fafafa 0%, #f6f6f6 29.62%, #eaeaea 58.47%, #d7d7d7 86.92%, #cccccc 99.22%);
	}
	#nav-contact2 .image-field{
		display: inline-block;
		padding: 8px;
		border-radius: 150px 0;
		box-shadow: -1px -1px 2px #eee, -1px 0px 3px #eee, -4px 8px 8px rgba(0, 0, 0, 0.1), -8px 16px 16px rgba(0, 0, 0, 0.1), -16px 32px 32px rgba(0, 0, 0, 0.15), -32px 64px 64px rgba(0, 0, 0, 0.25);
	}

	#nav-contact3 .image-field{
		border-radius: 0 100px;
		display: inline-block;
		padding: 8px;
		background: linear-gradient(9deg, #acd07f 0%, #cdf595 100%);
    box-shadow: 0 1px 0 #ccc, 0 2px 0 #c9c9c9, 0 3px 0 #bbb, -4px 8px 8px rgba(0, 0, 0, 0.1), -8px 16px 16px rgba(0, 0, 0, 0.1), -16px 32px 32px rgba(0, 0, 0, 0.15), -32px 64px 64px rgba(0, 0, 0, 0.25);
	}
	#nav-contact3 img {
		border-radius: 0 96px;
		background: linear-gradient(0.06deg, #fafafa 0%, #f6f6f6 29.62%, #eaeaea 58.47%, #d7d7d7 86.92%, #cccccc 99.22%);
	}
	#nav-contact4 .image-field{
		display: inline-block;
		padding: 8px;
		border-radius: 20px;
    background: linear-gradient(0.06deg, #fafafa 0%, #f6f6f6 29.62%, #eaeaea 58.47%, #d7d7d7 86.92%, #cccccc 99.22%);
    box-shadow: -4px 8px 8px rgba(0, 0, 0, 0.1), -8px 16px 16px rgba(0, 0, 0, 0.1), -16px 32px 32px rgba(0, 0, 0, 0.15), -32px 64px 64px rgba(0, 0, 0, 0.25);
	}
	#nav-contact4 img {
		border-left: 15px solid #b3b3b3;
    border-right: 15px solid #fafafa;
    border-radius: 5px;
    box-sizing: border-box;
    background-position: 0 0, 0 100%;
    background-repeat: no-repeat;
    background-size: 100% 20px;
    background-image: linear-gradient(to right, #b3b3b3 0%, #fafafa 100%), linear-gradient(to right, #b3b3b3 0%, #fafafa 100%);
	}
</style>

@endpush
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Image Style 1</button>
    <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Image Style 2</button>
    <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Image Style 3</button>
	<button class="nav-link" id="nav-contact2-tab" data-toggle="tab" data-target="#nav-contact2" type="button" role="tab" aria-controls="nav-contact2" aria-selected="false">Image Style 4</button>
	<button class="nav-link" id="nav-contact3-tab" data-toggle="tab" data-target="#nav-contact3" type="button" role="tab" aria-controls="nav-contact3" aria-selected="false">Image Style 5</button>
	<button class="nav-link" id="nav-contact4-tab" data-toggle="tab" data-target="#nav-contact4" type="button" role="tab" aria-controls="nav-contact3" aria-selected="false">Image Style 6</button>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent" style="background-color: #fafafa; padding: 30px;">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
	<div id="rureraform-element-{{$element_id}}" class="{{ isset( $elementObj->image_position ) ? $elementObj->image_position : ''}} {{ isset( $elementObj->image_size ) ? $elementObj->image_size : ''}} rureraform-element-{{$element_id}} rureraform-element quiz-group rureraform-element-html ui-sortable-handle" data-type="{{$elementObj->type}}">
		<span class="block-holder image-field"><img data-field_type="image" data-id="{{$element_unique_id}}" id="field-{{$element_unique_id}}" class="image-editor-field" src="{{ isset( $elementObj->content ) ? $elementObj->content : ''}}"></span>
	</div>
  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
	<div id="rureraform-element-{{$element_id}}" class="{{ isset( $elementObj->image_position ) ? $elementObj->image_position : ''}} {{ isset( $elementObj->image_size ) ? $elementObj->image_size : ''}} rureraform-element-{{$element_id}} rureraform-element quiz-group rureraform-element-html ui-sortable-handle" data-type="{{$elementObj->type}}">
		<span class="block-holder image-field"><img data-field_type="image" data-id="{{$element_unique_id}}" id="field-{{$element_unique_id}}" class="image-editor-field" src="{{ isset( $elementObj->content ) ? $elementObj->content : ''}}"></span>
	</div>
  </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
	<div id="rureraform-element-{{$element_id}}" class="{{ isset( $elementObj->image_position ) ? $elementObj->image_position : ''}} {{ isset( $elementObj->image_size ) ? $elementObj->image_size : ''}} rureraform-element-{{$element_id}} rureraform-element quiz-group rureraform-element-html ui-sortable-handle" data-type="{{$elementObj->type}}">
		<span class="block-holder image-field"><img data-field_type="image" data-id="{{$element_unique_id}}" id="field-{{$element_unique_id}}" class="image-editor-field" src="{{ isset( $elementObj->content ) ? $elementObj->content : ''}}"></span>
	</div>
  </div>
  <div class="tab-pane fade" id="nav-contact2" role="tabpanel" aria-labelledby="nav-contact2-tab">
	<div id="rureraform-element-{{$element_id}}" class="{{ isset( $elementObj->image_position ) ? $elementObj->image_position : ''}} {{ isset( $elementObj->image_size ) ? $elementObj->image_size : ''}} rureraform-element-{{$element_id}} rureraform-element quiz-group rureraform-element-html ui-sortable-handle" data-type="{{$elementObj->type}}">
		<span class="block-holder image-field"><img data-field_type="image" data-id="{{$element_unique_id}}" id="field-{{$element_unique_id}}" class="image-editor-field" src="{{ isset( $elementObj->content ) ? $elementObj->content : ''}}"></span>
	</div>
  </div>
  <div class="tab-pane fade" id="nav-contact3" role="tabpanel" aria-labelledby="nav-contact3-tab">
	<div id="rureraform-element-{{$element_id}}" class="{{ isset( $elementObj->image_position ) ? $elementObj->image_position : ''}} {{ isset( $elementObj->image_size ) ? $elementObj->image_size : ''}} rureraform-element-{{$element_id}} rureraform-element quiz-group rureraform-element-html ui-sortable-handle" data-type="{{$elementObj->type}}">
		<span class="block-holder image-field"><img data-field_type="image" data-id="{{$element_unique_id}}" id="field-{{$element_unique_id}}" class="image-editor-field" src="{{ isset( $elementObj->content ) ? $elementObj->content : ''}}"></span>
	</div>
  </div>
  <div class="tab-pane fade" id="nav-contact4" role="tabpanel" aria-labelledby="nav-contact4-tab">
	<div id="rureraform-element-{{$element_id}}" class="{{ isset( $elementObj->image_position ) ? $elementObj->image_position : ''}} {{ isset( $elementObj->image_size ) ? $elementObj->image_size : ''}} rureraform-element-{{$element_id}} rureraform-element quiz-group rureraform-element-html ui-sortable-handle" data-type="{{$elementObj->type}}">
		<span class="block-holder image-field"><img data-field_type="image" data-id="{{$element_unique_id}}" id="field-{{$element_unique_id}}" class="image-editor-field" src="{{ isset( $elementObj->content ) ? $elementObj->content : ''}}"></span>
	</div>
  </div>
</div>


@push('scripts_bottom')
	<script src="/assets/admin/vendor/bootstrap/bootstrap.min.js"></script>
@endpush

