
<div class="test-section panel-border bg-white rounded-sm mb-25 p-20">
    <h2 class="mb-5">
        {{isset($section_data->name)? $section_data->name : ''}}
    </h2>
    <p class="section-lable font-18">Reading Comprehension <span class="font-14 d-block pt-10">Section 2 of 5</span></p>
    <div class="section-bottom">
        <div class="section-no-of-questions">
            <i class="icon-box">
                <img src="/assets/default/svgs/ask.svg" alt="">
            </i>
            <div class="text-box">
                {{isset($section_data->no_of_questions)? $section_data->no_of_questions : 0}} 
                <span>Questions</span>
            </div>
            
        </div>
        <div class="section-time">
            <i class="icon-box">
                <img src="/assets/default/svgs/timer.svg" alt="">
            </i>
            <div class="text-box">
                {{isset($section_data->time)? $section_data->time : 0}} mins <span>Time Limit</span>
            </div>
        </div>
    </div>
</div>
<div class="quiz_section_instructions mb-25">
    <h3 class="mb-5">{!! isset($section_data->instr)? $section_data->instr : '' !!}</h3>
    <p>Answer as many of these Reading Comprehension questions as you can in the 5 minutes provided. You can move on to the next section when the 5 minutes have passed, or if you have finished all of the questions in this section. Try your best, and good luck!</p>
</div>


<button type="button" class="section-start-quiz mb-25">Continue</button>
