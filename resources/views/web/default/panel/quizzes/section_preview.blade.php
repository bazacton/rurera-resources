
<div class="panel-border bg-white rounded-sm">
    <h1>
        {{isset($section_data->name)? $section_data->name : ''}}
    </h1>

    <div class="section-no-of-questions">Questions: {{isset($section_data->no_of_questions)? $section_data->no_of_questions : 0}}</div>
    <div class="section-time">Time: {{isset($section_data->time)? $section_data->time : 0}}</div>
    <div class="quiz_section_instructions">{!! isset($section_data->instr)? $section_data->instr : '' !!}</div>
</div>


<button type="button" class="section-start-quiz">Continue</button>
