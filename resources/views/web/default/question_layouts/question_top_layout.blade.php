<!-- Question Label Html -->
<div class="question-label">
    <span>Question Lbael HTML</span>
</div>
<!-- Select Option Html -->
<div id="rureraform-element-0" class="rureraform-element-0 rureraform-element quiz-group rureraform-element-html ui-sortable-handle" data-type="inner_dropdown"></div>
	<select id="dropdown-1">
    <option value="Option 1">Option 1</option>
    <option value="Option 2">Option 2</option>
    <option value="Option 3">Option 3</option>
  </select>
</div>
<!-- Input Text Html -->
<div id="rureraform-element-2" class="rureraform-element-2 rureraform-element quiz-group rureraform-element-html" data-type="textfield_quiz">
  <span class="input-holder ">
    <input type="" data-field_type="text" class="editor-field input-simple">
  </span>
</div>

@if( $questionObj->review_required == 1 || $questionObj->developer_review_required == 1)
<div class="question-review-required">
    @if( $questionObj->review_required == 1)
    <div class="question-label-tag">Teacher Review Required</div>
    @endif
    @if( $questionObj->developer_review_required == 1)
    <div class="question-label-tag">Developer Review Required</div>
    @endif
</div>
@endif