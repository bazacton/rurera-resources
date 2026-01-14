@php $image_size = isset( $elementObj->image_size ) ? $elementObj->image_size : 'image-small';
 $image_position = isset( $elementObj->image_position ) ? $elementObj->image_position : 'image-left';
 @endphp

<div class="image-element">
<span class="block-holder image-field {{$image_size}} {{$image_position}}"><img data-field_type="image" data-id="{{$element_unique_id}}" id="field-{{$element_unique_id}}" class="image-editor-field" src="{{ isset( $elementObj->content ) ? $elementObj->content : ''}}"></span>
</div>