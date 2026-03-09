<article class="content-block" data-force-new-page="true">
    <div class="section-page">
        <div class="section-hero">
            <div class="eyebrow">Section 1</div>
            <h2>Section 1: {{isset($section_data->name)? $section_data->name : ''}}</h2>
            <div>Answer all {{isset($section_data->no_of_questions)? $section_data->no_of_questions : 0}}  questions in this section. Show any working if the question asks you to calculate. Choose one answer only for multiple-choice questions.</div>
            <div class="section-meta"><span class="chip">{{isset($section_data->no_of_questions)? $section_data->no_of_questions : 0}} questions</span><span class="chip">Suggested time: {{isset($section_data->time)? $section_data->time : 0}} minutes</span></div>
        </div>
        <div class="section-instructions-wrap">
            <div class="panel">
                <div class="panel-title">Section Instructions</div>
                <div class="panel-body">
                    {!! isset($section_data->instr)? $section_data->instr : '' !!}
                </div>
            </div>
        </div>
    </div>
</article>
