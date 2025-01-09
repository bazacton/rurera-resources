<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Image Style 1</button>
    <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Image Style 2</button>
    <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Image Style 3</button>
	<button class="nav-link" id="nav-contact2-tab" data-toggle="tab" data-target="#nav-contact2" type="button" role="tab" aria-controls="nav-contact2" aria-selected="false">Image Style 4</button>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
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
</div>

