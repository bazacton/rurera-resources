@if($questions_list->count()> 0)
  @foreach( $questions_list as $questionObj)

      <div class="question-layout-holder mb-0 bg-white panel-border p-25 border-bottom-0" data-question_id="{{$questionObj->id}}">
          <div class="question-layout-block">
              <form class="question-fields" action="javascript:;" data-question_id="{{$questionObj->id}}">
                  <div class="left-content has-bg">
                      <div id="rureraform-form-1" class=" rureraform-form rureraform-elements rureraform-form-input-medium rureraform-form-icon-inside rureraform-form-description-bottom ui-sortable" _data-parent="1" _data-parent-col="0" style="display: block;">
                          <div class="question-layout row d-flex align-items-start">
                              <button type="button" class="question-add-btn add-to-list-btn"><i class="fas fa-plus"></i> Add</button>
                              @php $question_layout = $QuestionsAttemptController->get_question_layout($questionObj); @endphp
                              {!! $question_layout !!}
                          </div>
                      </div>
                  </div>
              </form>
          </div>
          <div class="view-explanation ">
              <div class="explanation-controls d-flex align-items-center">
                  <button class="collapsed" type="button" data-toggle="collapse" data-target="#explanation-list{{$questionObj->id}}" aria-expanded="false" aria-controls="explanation-list">
                      <i class="fas fa-plus"></i> Explanation
                  </button>
              </div>
              <div class="collapse" id="explanation-list{{$questionObj->id}}">
                  <div class="explanation-text-holder">
                      <p>Each day, a school has a break from 10:15 am to 10:30 am and lunchtime from 12:40 pm to 1:30 pm.</p>
                  </div>
              </div>
          </div>
      </div>

  @endforeach
@else
    <h3>No Records Found!</h3>
@endif
