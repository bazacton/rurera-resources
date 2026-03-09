@php $randomID = rand(0,9999); $image_position = isset( $elementObj->image_position )? $elementObj->image_position : 'left';
$options = isset( $elementObj->options )? $elementObj->options : array();
$correctCount = count(array_filter($options, function ($option) {
    return isset($option->default) && $option->default === 'on';
}));
$element_unique_id = isset( $element_unique_id )? $element_unique_id : $element_id;
$have_images = isset( $elementObj->have_images )? $elementObj->have_images : 'no';
$image_position = isset( $elementObj->image_position )? $elementObj->image_position : 'left';
$have_images_class = ($have_images == 'yes')? 'lms-checkbox-img'.' image-'.$image_position : '';
@endphp
<div class="options">
    <div class="mcq-option" data-label="A.">7</div><div class="mcq-option" data-label="B.">70</div><div class="mcq-option" data-label="C.">700</div><div class="mcq-option" data-label="D.">7,000</div>
</div>
