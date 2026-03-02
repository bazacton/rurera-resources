
<div class="panel-border bg-white rounded-sm mb-25 p-20">
    <h1>
        {{isset($section_data->name)? $section_data->name : ''}}
    </h1>

    <div class="section-no-of-questions">{{isset($section_data->no_of_questions)? $section_data->no_of_questions : 0}} Questions</div>
    <div class="section-time">{{isset($section_data->time)? $section_data->time : 0}} mins <span>Time Limit</span></div>
    <div class="quiz_section_instructions">{!! isset($section_data->instr)? $section_data->instr : '' !!}</div>
</div>
<div class="test-description">
    <h2>Section Instructions</h2>
    <p>Answer as many of these Reading Comprehension questions as you can in the 5 minutes provided. You can move on to the next section when the 5 minutes have passed, or if you have finished all of the questions in this section. Try your best, and good luck!</p>
</div>


<button type="button" class="section-start-quiz">Continue</button>
