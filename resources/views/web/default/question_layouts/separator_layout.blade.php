@php
    $separator_type = isset($elementObj->separator_type)? $elementObj->separator_type : 'line';
    $margin_top = isset($elementObj->margin_top)? $elementObj->margin_top : 0;
    $margin_bottom = isset($elementObj->margin_bottom)? $elementObj->margin_bottom : 0;
    $style_html = ($margin_top > 0)? 'margin-top:'.$margin_top.'px;' : '';
    $style_html .= ($margin_bottom > 0)? 'margin-bottom:'.$margin_bottom.'px;' : '';
@endphp

<div style="{{$style_html}}" id="rureraform-element-{{$element_id}}" class="separator_{{$separator_type}} rureraform-element-{{$element_id}} rureraform-element quiz-group rureraform-element-html" data-type="separator">
    <span class="question-separator"><hr></span>
</div>
