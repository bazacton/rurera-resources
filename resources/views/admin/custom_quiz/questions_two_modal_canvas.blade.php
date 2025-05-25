<div class="grammar-modal-container question-update-modal" data-action_type="{{$action_type}}" data-question_id="{{$question_id}}" data-temp_question_id="{{$temp_question_id}}">

    <br><br><br>
    <div class="col-12 col-md-12">
        <div class="row">

        <div class="col-6 col-md-6">
            <h3>Original Question</h3>
            {!! $question_layout !!}
        </div>
        <div class="col-6 col-md-6">
            <h3>Updated Question</h3>
            {!! $builder_layout !!}
        </div>
        </div>
    </div>


    <div class="section-controls">
        <button type="button" class="save-btn">Save</button>
        <button type="button" class="cancel-btn">Cancel</button>
    </div>
</div>
