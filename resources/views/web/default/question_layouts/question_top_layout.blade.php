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
<!-- True/False Option Html -->
<div class="lms-radio-select">
			
  <div class="form-field rureraform-cr-container-medium rureraform-cr-container-undefined">
    <input class="editor-field" type="radio" name="field-0" id="field-0-0" value="True">
    <label for="field-0-0">
    <span class="inner-label">True</span></label>
  </div>
  <div class="form-field rureraform-cr-container-medium rureraform-cr-container-undefined">
    <input class="editor-field" type="radio" name="field-0" id="field-0-1" value="False">
    <label for="field-0-1">
    <span class="inner-label">False</span></label>
  </div>
  
  </div>
  <!-- Select Check Box Field Html -->
  <div class="form-box">
    <div class="form-field rureraform-cr-container-medium">
      <input class="editor-field rureraform-checkbox-medium" type="checkbox" name="field-0" value="Option 1" id="field-0-00-4579">
      <label for="field-0-00-4579">Option 1</label>
    </div>
    <div class="form-field rureraform-cr-container-medium">
      <input class="editor-field rureraform-checkbox-medium" type="checkbox" name="field-0" id="field-0-11-4579" value="Option 2">
      <label for="field-0-11-4579">Option 2</label>
    </div>
  </div>
  <!-- Attachment Field Html -->
  <div class="form-group mt-15">
    <label class="input-label">Attachment</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <button type="button" class="input-group-text admin-file-manager" data-input="field-86380" data-preview="holder">
                <i class="fa fa-upload"></i>
            </button>
        </div>
        <input type="text" data-field_type="file" class="editor-field input-simple" data-id="86380" id="field-86380" name="field-86380" value="">
        <div class="input-group-append">
            <button type="button" class="input-group-text admin-file-view" data-input="field-86380">
                <i class="fa fa-eye"></i>
            </button>
        </div>
    </div>
</div>
<!-- SortAble Quiz Html -->
<div class="rureraform-column-label">
  <label class="rureraform-label rureraform-ta-undefined">Arrange the following</label>
</div>
<div class="rureraform-column-input">
  <div class="rureraform-input">
    <div class="form-box lms-sorting-fields rurera-in-row undefined image-right none">
      <div class="field-holder ui-sortable-handle">
        <span class="sort-icon">
          <span></span>
          <span></span>
          <span></span>
        </span>
        <label for="field-60965-0">Option 1</label>
      </div>
      <div class="field-holder ui-sortable-handle">
        <span class="sort-icon">
          <span></span>
          <span></span>
          <span></span>
        </span>
        <label for="field-60965-1">Option 2</label>
      </div>
      <div class="field-holder ui-sortable-handle">
        <span class="sort-icon">
          <span></span>
          <span></span>
          <span></span>
        </span>
        <label for="field-60965-2">Option 3</label>
      </div>
    </div>
  </div>
</div>
<!-- Textarea Html -->
<span class="input-holder">
  <textarea data-field_type="textarea" class="editor-field input-simple" data-id="77680" id="field-77680"></textarea>
</span>

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