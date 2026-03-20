@php namespace App\Http\Controllers\Web; @endphp
@php
    $i = 0; $j = 1;
    $rand_id = rand(99,9999);

@endphp

@php $quiz_type = isset( $quiz->quiz_type )? $quiz->quiz_type : '';
$duration_type = isset( $duration_type )? $duration_type : 'no_time_limit';

$timer_counter = isset($start_timer)? $start_timer : 0;
$time_consumed = isset($time_consumed)? $time_consumed : 0;
$attempted_questions = isset($attempted_questions)? $attempted_questions : 0;
if( $duration_type == 'per_question'){
$timer_counter = $time_interval;
}
if( $duration_type == 'total_practice'){
$timer_counter = $practice_time;
}

if($time_consumed > 0){
    $timer_counter = $time_consumed;
}

$already_attempted_questions = isset($already_attempted_questions)? $already_attempted_questions : array();

$correct_answer_explaination = true;//isset($correct_answer_explaination)? $correct_answer_explaination : 0;
$incorrect_answer_explaination = true;//isset($incorrect_answer_explaination)? $incorrect_answer_explaination : 0;
@endphp
@php $total_questions = isset($questions_list)? count($questions_list) : 0; @endphp
<script>
    window.MathJax = {
        tex: {
            inlineMath: [['$', '$'], ['\\(', '\\)']],
            displayMath: [['$$', '$$']]
        },
        svg: {
            fontCache: 'global'
        }
    };
</script>
<script src="https://cdn.jsdelivr.net/npm/mathjax@4/tex-mml-svg.js" defer></script>





<style>
    html, body {
        height: 100%;
        margin: 0;
        overflow: hidden;
        background: #f5f6f8;
        font-family: Arial, sans-serif;
    }

    * {
        box-sizing: border-box;
    }

    :root {
        --topbar-height: 70px;
    }

    .top-quiz-bar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: var(--topbar-height);
        background: #ffffff;
        border-bottom: 1px solid #dfe3e8;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        padding: 0 20px;
    }

    .top-quiz-title {
        font-size: 24px;
        font-weight: 700;
        color: #222;
        text-align: center;
    }

    .app-wrap {
        width: 100%;
        height: 100vh;
        padding: calc(var(--topbar-height) + 12px) 12px 12px;
    }

    .split-wrapper {
        width: 100%;
        height: 100%;
        display: flex;
        border: 1px solid #d9dee5;
        border-radius: 10px;
        overflow: hidden;
        background: #edf1f5;
        position: relative;
    }

    .pane {
        height: 100%;
        min-width: 220px;
        padding: 14px;
        overflow: hidden;
    }

    .pane-left {
        width: 50%;
        flex: 0 0 auto;
    }

    .pane-right {
        flex: 1 1 auto;
        min-width: 220px;
    }

    .divider {
        width: 12px;
        min-width: 12px;
        position: relative;
        cursor: col-resize;
        flex: 0 0 12px;
        background: transparent;
        z-index: 5;
    }

    .divider::before {
        content: "";
        position: absolute;
        top: 0;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 2px;
        background: #c8ced6;
        transition: all 0.2s ease;
    }

    .divider:hover::before,
    .divider.active::before {
        width: 4px;
        background: #007bff;
        box-shadow: 0 0 0 5px rgba(0, 123, 255, 0.12);
    }

    .story-card,
    .question-card {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        background: #ffffff;
        border: 1px solid #dfe3e8;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .story-title,
    .question-titlebar {
        flex: 0 0 auto;
        padding: 14px 18px;
        border-bottom: 1px solid #ebedf0;
        background: #fafbfc;
        font-size: 18px;
        font-weight: 700;
        color: #222;
    }

    .story-body,
    .question-content {
        flex: 1 1 auto;
        overflow-y: auto;
        overflow-x: hidden;
        padding: 18px;
        line-height: 1.8;
        font-size: 15px;
        color: #333;
        scroll-behavior: smooth;
        min-height: 0;
    }

    .story-body p {
        margin-bottom: 16px;
    }

    .story-controls,
    .question-scroll-controls {
        flex: 0 0 auto;
        padding: 12px 18px;
        border-top: 1px solid #ebedf0;
        background: #fafbfc;
        text-align: center;
    }

    .story-controls.hidden,
    .question-scroll-controls.hidden {
        display: none;
    }

    .right-inner {
        width: 600px;
        max-width: 100%;
        height: 100%;
        margin: 0 auto;
    }

    .scroll-btn {
        min-width: 130px;
    }

    .question-shell {
        position: relative;
        flex: 1 1 auto;
        min-height: 0;
        height: 100%;
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .question-number {
        font-size: 14px;
        font-weight: 700;
        color: #6c757d;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.4px;
    }

    .question-heading {
        font-size: 24px;
        font-weight: 700;
        line-height: 1.35;
        color: #222;
        margin-bottom: 10px;
    }

    .question-instruction {
        font-size: 15px;
        color: #6c757d;
        margin-bottom: 20px;
        font-weight: 600;
    }

    .options-wrap {
        margin-bottom: 16px;
    }

    .option-item {
        width: 100%;
        margin-bottom: 12px;
    }

    .option-label {
        width: 100%;
        margin: 0;
        display: flex;
        align-items: flex-start;
        padding: 14px 16px;
        border: 1px solid #dfe3e8;
        border-radius: 8px;
        background: #fff;
        cursor: pointer;
        transition: all 0.2s ease;
        user-select: none;
    }

    .option-label:hover {
        border-color: #007bff;
        background: #f8fbff;
    }

    .option-item input {
        margin-top: 4px;
        margin-right: 12px;
        transform: scale(1.15);
        flex: 0 0 auto;
    }

    .option-text {
        flex: 1 1 auto;
        font-size: 15px;
        line-height: 1.5;
        color: #222;
    }

    .option-prefix {
        font-weight: 700;
        margin-right: 6px;
    }

    .option-item input:checked + .option-text {
        color: #0056b3;
        font-weight: 600;
    }

    .question-footer {
        flex: 0 0 auto;
        height: 68px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 16px;
        border-top: 1px solid #ebedf0;
        background: #fafbfc;
    }

    .pagination-serial {
        font-size: 15px;
        font-weight: 700;
        color: #495057;
        text-align: center;
        min-width: 90px;
    }

    .footer-btn {
        min-width: 110px;
    }

    @media (max-width: 991px) {
        html, body {
            overflow: auto;
        }

        .top-quiz-bar {
            position: sticky;
        }

        .app-wrap {
            height: auto;
            min-height: 100vh;
            padding-top: 12px;
        }

        .split-wrapper {
            height: auto;
            display: block;
        }

        .pane,
        .pane-left,
        .pane-right {
            width: 100% !important;
            min-width: 100%;
            height: auto;
        }

        .divider {
            display: none;
        }

        .story-card,
        .question-card {
            height: 520px;
            margin-bottom: 14px;
        }
    }
</style>

<div class="content-section">

    <section class="lms-quiz-section">

        <div class="container questions-data-block read-quiz-content" data-total_questions="{{$total_questions}}">

            <div class="justify-content-center w-100">
                <div class="col-lg-9 col-md-12 col-sm-12 mx-auto">

                    <div class="question-step quiz-complete-full" style="display:none">

                        <div class="step-block">Test Completed!!!</div>

                    </div>
                    <div data-result_attempt_id="{{isset($quizAttempt->id)? $quizAttempt->id : 0}}" data-quiz_result_id="{{isset($newQuizStart->id)? $newQuizStart->id : 0}}" class="question-area-block" data-active_question_id="{{$active_question_id}}" data-questions_layout="{{json_encode($questions_layout)}}">
                        <a href="javascript:;" class="load-more-questions rurera-hide">Load More Questions</a>
                        <div class="question-area dis-arrows1" data-total_questions="{{$total_questions}}">
                            <div class="correct-appriciate" style="display:none"></div>



                            @php $active_section = false; $active_question = false; $active_section_id = ''; @endphp
                            @if(!empty($questions_sections_layout))

                                @php $section_counter = 1; @endphp
                                @foreach($questions_sections_layout as $section_id => $questions_section_data)

                                    @php $section_layout = isset($questions_section_data['layout'])? $questions_section_data['layout'] : '';
                                        $section_data = isset($questions_section_data['section_data'])? $questions_section_data['section_data'] : (object) array();

                                        $questions_layout = isset($questions_section_data['questions'])? $questions_section_data['questions'] : (object) array();
                                        $section_time = isset($section_data->time)? $section_data->time : 0;
                                        $section_name = isset($section_data->name)? $section_data->name : '';
                                        $section_time = ($section_time*60);
                                        $start_time = isset($section_data->start_time)? $section_data->start_time : 0;
                                        $section_practice_time = $section_time;
                                        if($start_time > 0){
                                            $section_practice_time = get_practice_time($section_time, $start_time);
                                            if($section_practice_time <= 0){
                                                $section_counter++;
                                                continue;
                                            }
                                        }
                                        $active_section = true;
                                    $is_last_section = 'no';
                                    $is_last_section = ($section_counter == count($questions_sections_layout))? 'yes' : $is_last_section;
                                    @endphp







                                    <div class="container-fluid app-wrap">
                                        <div class="split-wrapper" id="splitWrapper">

                                            <!-- Left Column -->
                                            <div class="pane pane-left" id="leftPane">
                                                <div class="story-card">
                                                    <div class="story-title">Story Passage</div>
                                                    <div class="story-body" id="leftContent"></div>
                                                    <div class="story-controls" id="leftControls">
                                                        <button type="button" class="btn btn-primary scroll-btn" id="leftBtn">Scroll More</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Divider -->
                                            <div class="divider" id="divider"></div>

                                            <!-- Right Column -->
                                            <div class="pane pane-right" id="rightPane">
                                                <div class="right-inner">
                                                    <div class="question-card">
                                                        <div class="question-titlebar text-center">MCQ Question</div>

                                                        <div class="question-shell">
                                                            <div class="question-content" id="rightQuestionContent">




                                                            </div>

                                                            <div class="question-scroll-controls" id="rightControls">
                                                                <button type="button" class="btn btn-primary scroll-btn" id="rightBtn">Scroll More</button>
                                                            </div>

                                                            <div class="question-footer">
                                                                <button type="button" class="btn btn-outline-primary footer-btn">Previous</button>
                                                                <div class="pagination-serial">1 / 10</div>
                                                                <button type="button" class="btn btn-primary footer-btn">Next</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>




                                    <div class="quiz-section-data rurera-hide" data-is_last_section="{{$is_last_section}}" data-section_counter="{{$section_counter}}" data-section_id="{{$section_id}}">
                                        <div class="section-top-bar">
                                            <div class="section-left-top">
                                                <button class="close-practice" type="button"><span aria-hidden="true">×</span></button>
                                                <div class="test-title">
                                                    <h5>{{$quiz->getTitleAttribute()}}</h5>
                                                </div>
                                                <div class="section-title font-14">- Section: {{$section_name}}</div>
                                                <div class="section-counter font-14">- Section {{$section_counter}}/{{count($questions_sections_layout)}}</div>
                                            </div>

                                            <div class="section-right-top">
                                                <div class="quiz-status-bar rurera-hide">
                                                    <div class="quiz-time-bar">
                                                        <div class="timer-wrap">
                                                            <span class="time-label"><img src="/assets/default/svgs/time-past.svg" alt="time-past"></span>
                                                            <div class="quiz-timer-counter" data-time_counter="{{($section_practice_time)}}">
                                                                <div class="time-box" id="hh">00</div>
                                                                <span class="colon">:</span>
                                                                <div class="time-box" id="mm">00</div>
                                                                <span class="colon">:</span>
                                                                <div class="time-box" id="ss">00</div>
                                                            </div>
                                                        </div>
                                                        <button type="button" data-toggle="modal" class="setting-modal-btn" data-target="#rurSettingsModal" fdprocessedid="oan7zr">
                                                            <img src="/assets/default/svgs/setting.svg" alt="setting">
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="section-layout-block">
                                            {!! $section_layout !!}

                                        </div>
                                        <div class="comprehension-block">


                                        </div>
                                        <div class="quiz-section-questions rurera-hide">


                                            <div class="question-pagination-top">
                                                <div class="question-palette">
                                                    <div class="quiz-pagination rurera-hide">

                                                        <ul data-section_id="{{$section_id}}">

                                                            @if( !empty( $questions_layout  ) )
                                                                @php $question_count  = 1; @endphp
                                                                @foreach( $questions_layout as $result_question_id => $questionLayout)
                                                                    @php $active_actual_question_id = isset( $actual_question_ids[$result_question_id] )? $actual_question_ids[$result_question_id] : 0;
                                                                $question_result_id = isset($result_question_ids[$result_question_id])? $result_question_ids[$result_question_id] : 0;
                                                            $active_class = ($active_question_id == $active_actual_question_id)? '' : '';
                                                            $active_class = ($active_class == '' && $question_count == 1)? 'active' : '';
                                                            $question_status = '';
                                                            $question_status = in_array($question_result_id, $already_attempted_questions)? 'attempted' : $question_status;
                                                            $is_flagged = false;
                                                            $active_section_id = ($active_class == 'active')? $section_id : $active_section_id;
                                                                    @endphp
                                                                    <li data-question_counter="{{$question_count}}" data-question_id="{{$question_result_id}}" data-actual_question_id="{{$result_question_id}}" class="{{$question_status}} {{$active_class}} {{ ( $is_flagged == true)?
                                               'has-flag' : ''}} "><a
                                                                                href="javascript:;">
                                                                            {{$question_count}}</a></li>

                                                                    @php $question_count++; @endphp
                                                                @endforeach
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="question-inner-step-area">
                                                <div class="question-layout-block">

                                                    <div class="left-content has-bg">
                                                        <div class="questions-lists-block">

                                                            @if( !empty( $questions_layout  ) )
                                                                @php $question_counter  = 1; @endphp
                                                                @foreach( $questions_layout as $result_question_id => $questionLayout)
                                                                    @php $active_actual_question_id = isset( $actual_question_ids[$result_question_id] )? $actual_question_ids[$result_question_id] : 0;
                                                                    $question_result_id = isset($result_question_ids[$result_question_id])? $result_question_ids[$result_question_id] : 0;
                                                                    $active_class = ($active_question_id == $question_result_id)? '' : '';
                                                                    $active_class = ($active_class == '' && $question_counter == 1)? 'active' : '';
                                                                    $active_class = ($active_question == false)? $active_class : '';
                                                                    if($active_class == 'active'){
                                                                        $active_question = true;
                                                                    }
                                                                    $next_active = ($question_counter == count($questions_layout))? 'no' : 'yes';
                                                                    $question_class = '';
                                                                    $question_class .= ($question_counter == 1)? 'comprehension-question' : '';
                                                                    @endphp

                                                                    <div class=" {{$question_class}} rurera-question-block question-step my-auto question-step-{{ $active_actual_question_id }} {{$active_class}}" data-elapsed="0"
                                                                         data-qattempt="{{isset( $quizAttempt->id )? $quizAttempt->id : 0}}"
                                                                         data-start_time="0" data-qresult="{{isset( $question_result_id )? $question_result_id : 0}}"
                                                                         data-question_no="{{$question_counter}}"
                                                                         data-next_active="{{$next_active}}"
                                                                         data-mark_complete="no"
                                                                         data-quiz_result_id="{{isset( $quizAttempt->quiz_result_id )? $quizAttempt->quiz_result_id : 0}}"
                                                                         data-device_id="{{isset($device_id)? $device_id : 0}}" >
                                                                        <span class="questions-total-holder d-flex align-items-center mb-15 px-0 w-100">
                                                                            <span class="icon-box"><img src="/assets/default/svgs/question-simple.svg" alt="question-simple"></span>
                                                                            Question: {{$question_counter}} of {{count($questions_layout)}}
                                                                        </span>


                                                                        @if($question_counter == 1)
                                                                        <div class="question-comprehension-block rurera-hide">
                                                                            <h3>Cast List</h3>
                                                                            <p>Narrator</p>
                                                                            <p>The Wolf</p>
                                                                            <p>Little Red Riding Hood</p>
                                                                            <p>Mother</p>
                                                                            <p>Grandma</p>
                                                                            <p>Woodcutter</p>

                                                                            <h3>Scene List</h3>
                                                                            <p>Little Red Riding Hood’s House</p>
                                                                            <p>The Woods</p>
                                                                            <p>Grandma’s Cottage</p>

                                                                            <h2>Little Red Riding Hood</h2>

                                                                            <h3>Scene 1 - Little Red Riding Hood’s House</h3>

                                                                            <p><em>Enter Mother carrying a basket of food, and Little Red Riding Hood, wearing her red cape.</em></p>

                                                                            <p><strong>Mother:</strong> Right young lady, I need you to go to Grandma’s with this basket of food. She’s not very well.</p>

                                                                            <p><strong>LRRH:</strong> Ok Mum. I’ll stay and have a cup of tea with her too.</p>

                                                                            <p><strong>Mother:</strong> That will be very nice. Good girl. Now, off you go. And be careful going through that wood.</p>

                                                                            <p><strong>LRRH:</strong> I will.</p>

                                                                            <p><strong>Narrator:</strong> So Little Red Riding Hood trotted off with her basket of goodies for Grandma.</p>

                                                                            <h3>Scene 2 - The Woods</h3>

                                                                            <p><em>Little Red Riding Hood is skipping through the woods, humming to herself. In the background a wolf is lurking behind the trees.</em></p>

                                                                            <p><strong>Narrator:</strong> Little Red Riding Hood loved walking to Grandma’s.</p>

                                                                            <p><strong>LRRH:</strong> I love walking to Grandma’s. The woods are so lovely!</p>

                                                                            <p><strong>Narrator:</strong> Soon, Little Red Riding Hood saw a woodcutter chopping the trees down in the woods.</p>

                                                                            <p><em>Enter a woodcutter with an axe, chopping trees down.</em></p>

                                                                            <p><strong>LRRH:</strong> Hello Woodcutter. How are you today?</p>

                                                                            <p><strong>Woodcutter:</strong> Hello there, Little Red Riding Hood. I’m very well, thank you. Where are you going to?</p>

                                                                            <p><strong>LRRH:</strong> I’m going to Grandma’s house. She lives at the other side of the woods.</p>

                                                                            <p><strong>Woodcutter:</strong> Well, you be careful in these woods. I hear there are wolves around. And say hello to your Grandma from me.</p>

                                                                            <p><strong>LRRH:</strong> I will. And I am careful. But I don’t think there are really any wolves around. They’re just in fairy stories.</p>

                                                                            <p><em>LRRH skips off further into the woods. The wolf pops out from behind a tree and chuckles to himself, rubbing his paws together.</em></p>

                                                                            <p><strong>Wolf:</strong> Ah ha! Going to Grandma’s eh? Well now. I think I might go to Grandma’s too. And I know a short cut there.</p>

                                                                            <p><em>Wolf runs off laughing to himself.</em></p>

                                                                            <p><strong>Wolf:</strong> I’m going to trick that Little Red Riding Hood.</p>

                                                                            <p><em>Wolf knocks on the door.</em></p>

                                                                            <p><strong>Grandma:</strong> Yes? Is that Little Red Riding Hood?<br>(from inside the cottage)</p>

                                                                            <p><em>Wolf coughs and speaks in a high voice.</em></p>

                                                                            <p><strong>Wolf:</strong> Yes Grandma. It is me, Little Red Riding Hood.</p>

                                                                            <p><strong>Grandma:</strong> Come in my dear, come in!</p>

                                                                            <p><em>Wolf tiptoes into the cottage.</em></p>

                                                                            <p><strong>Narrator:</strong> Now, Grandma was very old and she couldn’t see very well. She could not tell it was the wolf.</p>

                                                                            <p><strong>Wolf:</strong> Ah ha! I’ve got you now Grandma!</p>

                                                                            <p><em>Wolf grabs Grandma and lifts her out of bed and locks her in the wardrobe!</em></p>

                                                                            <p><strong>Wolf:</strong> Right, I need a nightdress, a night hat and some glasses.</p>

                                                                            <p><em>Wolf finds all the things he needs and dresses up as Grandma. Then he hops into bed and pulls up the covers and waits.</em></p>

                                                                            <p><strong>Narrator:</strong> The Wolf did not have to wait long. Little Red Riding Hood knocked at the door.</p>

                                                                            <p><strong>LRRH:</strong> Hello Grandma, it’s me, Little Red Riding Hood. I’ve brought you some goodies!</p>

                                                                            <p><em>Wolf coughs and speaks in a high squeaky voice.</em></p>

                                                                            <p><strong>Wolf:</strong> Come in my dear, come in!</p>

                                                                            <p><em>Little Red Riding Hood opens the door and goes inside the cottage.</em></p>

                                                                            <p><strong>LRRH:</strong> Mother has sent some lovely food over for you.</p>

                                                                            <p><strong>Wolf:</strong> Oh, how lovely!<br>(in a squeaky high voice)</p>

                                                                            <p><em>LRRH looks at Grandma in a puzzled way.</em></p>

                                                                            <p><strong>LRRH:</strong> Grandma. What big ears you have!</p>

                                                                            <p><strong>Wolf:</strong> All the better to hear you with, my dear.</p>

                                                                            <p><em>Little Red Riding Hood walks around the bed staring at Grandma.</em></p>

                                                                            <p><strong>LRRH:</strong> And Grandma…. What big eyes you have!</p>

                                                                            <p><strong>Wolf:</strong> All the better to see you with, my dear.</p>

                                                                            <p><strong>LRRH:</strong> And Gr..Grand..Grandma what big TEETH <br>(stuttering) you have!</p>

                                                                            <p><strong>Wolf:</strong> All the better to EAT you with, my dear!</p>

                                                                            <p><em>The wolf leaps out of bed, chases Little Red Riding Hood around the bed one way, and then the other. Little Red Riding Hood screams and shouts.</em></p>

                                                                            <p><em>Suddenly the Woodcutter throws open the door and raises his axe.</em></p>

                                                                            <p><strong>Woodcutter:</strong> Be gone, wolf, or I shall chop you up into little pieces!</p>

                                                                            <p><strong>Wolf:</strong> (whimpering) No! No! I wasn’t really going to eat her! I was just joking. Don’t chop me up into little pieces. Let me go and you shall never see me again!</p>

                                                                            <p><strong>Narrator:</strong> And with that, the wolf ran out of the door and away into the woods. And they never did see him ever again!</p>

                                                                            <h3>Scene 4 – Around the table at Grandma’s Cottage</h3>

                                                                            <p><strong>Narrator:</strong> Little Red Riding Hood and the Woodcutter heard Grandma knocking from inside the wardrobe, and helped her out. Then they all sat down to eat the delicious goodies that Little Red Riding Hood had brought in her basket.</p>

                                                                            <p><em>Woodcutter, Grandma and Little Red Riding Hood are sitting around the table, pouring the tea and eating cake.</em></p>

                                                                            <p><strong>Narrator:</strong> And they all lived happily ever after!</p>
                                                                        </div>
                                                                        @endif
                                                                        {!! $questionLayout !!}

                                                                    </div>

                                                                    @php $question_counter++; @endphp
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                        <div class="show-notifications" data-show_message="yes"></div>
                                                        <a style="display:none;" href="javascript:;" id="question-submit-btn" class="question-submit-btn">
                                                            Mark Answer
                                                        </a>
                                                        <div id="scroll-controls" class="page-prev-next-controls pr-0">
                                                            <div class="controls-inner">
                                                                <!-- Top State: Scroll Down Button -->
                                                                <button id="btn-top" class="btn-top scroll-btn pill btn-hidden">
                                                                    Scroll down <i class="arrow down"></i>
                                                                </button>

                                                                <!-- Bottom State: Scroll Up Button -->
                                                                <button id="btn-bottom" class="scroll-btn pill btn-hidden">
                                                                    Scroll up <i class="arrow up"></i>
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <div class="prev-next-controls text-center mb-50 questions-nav-controls justify-content-start">
                                                            <a href="javascript:;" data-toggle="modal" class="review-btn rurera-hide mr-md-0" data-target="#review_submit">
                                                                Finish
                                                                <img src="/assets/default/svgs/review-btn-flag.svg" width="683" height="683" alt="review-btn-flag">
                                                            </a>

                                                            <a href="javascript:;" id="next-btn" class="rurera-hide next-btn">
                                                                Next
                                                                <img src="/assets/default/svgs/next-btn.svg" width="683" height="683" alt="next-btn">
                                                            </a>
                                                            <a href="javascript:;" id="prev-btn" class="rurera-hide1 prev-btn">
                                                                Previous
                                                                <img src="/assets/default/svgs/next-btn.svg" width="683" height="683" alt="next-btn">
                                                            </a>
                                                            <div class="bottom-pagination">
                                                                <div class="quiz-instance">
                                                                    <div class="palette-content" style="display: none;">
                                                                        <div class="question-palette">
                                                                            <div class="quiz-pagination rurera-hide">

                                                                                <ul data-section_id="{{$section_id}}">



                                                                                    @if( !empty( $questions_layout  ) )
                                                                                        @php $question_count  = 1; @endphp
                                                                                        @foreach( $questions_layout as $result_question_id => $questionLayout)
                                                                                            @php $active_actual_question_id = isset( $actual_question_ids[$result_question_id] )? $actual_question_ids[$result_question_id] : 0;
                                                                $question_result_id = isset($result_question_ids[$result_question_id])? $result_question_ids[$result_question_id] : 0;
                                                            $active_class = ($active_question_id == $active_actual_question_id)? '' : '';
                                                            $active_class = ($active_class == '' && $question_count == 1)? 'active' : '';
                                                            $question_status = '';
                                                            $question_status = in_array($question_result_id, $already_attempted_questions)? 'attempted' : $question_status;
                                                            $is_flagged = false;
                                                            $active_section_id = ($active_class == 'active')? $section_id : $active_section_id;
                                                                                            @endphp
                                                                                            <li data-question_counter="{{$question_count}}" data-question_id="{{$question_result_id}}" data-actual_question_id="{{$result_question_id}}" class="{{$question_status}} {{$active_class}} {{ ( $is_flagged == true)?
                                               'has-flag' : ''}} "><a
                                                                                                        href="javascript:;">
                                                                                                    {{$question_count}}</a></li>

                                                                                            @php $question_count++; @endphp
                                                                                        @endforeach
                                                                                    @endif
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="question-status question-status-trigger">
                                                                        Question <span>1</span>/{{count($questions_layout)}} &#9662;
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ml-auto">
                                                                <a href="javascript:;" class="review-btn finish-section rurera-hide mr-10 ml-auto">
                                                                    Finish Section
                                                                    <img src="/assets/default/svgs/review-btn-flag.svg" width="683" height="683" alt="review-btn-flag">
                                                                </a>
                                                                <a href="javascript:;" id="question-next-btn" class="question-next-btn rurera-hide1 ml-auto">
                                                                    Next
                                                                </a>


                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @php $section_counter++; @endphp
                                @endforeach
                            @endif





                        </div>
                    </div>
                    <div class="question-area-temp hide"></div>
                </div>
            </div>
        </div>
    </section>
</div>

@if($quiz->quiz_type == 'vocabulary')
    <div class="question-status-modal">
        <div class="modal fade question_status_modal" id="question_status_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="modal-box">
                            <div class="modal-title">
                                <h3>Incorrect!</h3>
                                <span class="inc" style="text-decoration: line-through;">are</span>
                                <span class="cor">are</span>
                            </div>
                            <p>
                                <span>verb</span> when more than one person is being something
                            </p>
                            <a href="javascript:;" class="confirm-btn" data-dismiss="modal" aria-label="Close">Okay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<div class="modal fade review_submit" id="review_submit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="modal-body">
                <p></p>
                <a href="javascript:;" class="submit_quiz_final nav-link mt-20 btn-primary rounded-pill" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"> Submit </a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade validation_error" id="validation_error" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="modal-body">
                <p>Please fill all the required fields before submitting.</p>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-md fade rur-settings-modal" id="rurSettingsModal" tabindex="-1" role="dialog" aria-labelledby="rurSettingsTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="rurSettingsTitle">Settings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body py-2">
                <div class="rur-setting-row">
                    <div class="rur-setting-text">
                        <div class="rur-setting-title">Timer</div>
                        <div class="rur-setting-sub">Show countdown badge</div>
                    </div>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input show-timer-check" id="show-timer-check">
                        <label class="custom-control-label" for="show-timer-check"></label>
                    </div>
                </div>
                <div class="rur-setting-row">
                    <div class="rur-setting-text">
                        <div class="rur-setting-title">Pagination</div>
                        <div class="rur-setting-sub">Show Pagination</div>
                    </div>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input show-pagination-check" id="show-pagination-check" checked>
                        <label class="custom-control-label" for="show-pagination-check"></label>
                    </div>
                </div>
            </div>

            <div class="modal-footer d-flex justify-content-end">
                <button type="button" class="btn btn-outline-secondary btn-sm setting-reset-btn" id="setting-reset-btn">Reset</button>
                <div>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade closePractice modal-md" id="closePractice" tabindex="-1" role="dialog" aria-labelledby="closePracticeLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 12px;">

            <!-- Header -->
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold font-16" id="closePracticeLabel">Leave Test?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Body -->
            <div class="modal-body pt-3 font-14">
                <p class="mb-10">You still have time remaining to complete this test.
                    If you exit now, your current progress will be saved.
                </p>

                <p class="mb-10">You can rejoin the test anytime before the time limit ends and continue from where you left off.</p>

                <p>Are you sure you want to leave the test?
                </p>

            </div>

            <!-- Footer -->
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-light border" data-dismiss="modal">Continue Test</button>
                <button type="button" class="btn btn-danger" onclick="exitTest()">Exit Test</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade TimeOutPractice modal-md" id="TimeOutPractice" tabindex="-1" role="dialog" aria-labelledby="TimeOutPracticeLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 12px;">

            <!-- Header -->
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold font-16">
                    ⏱ Time's Up!
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Body -->
            <div class="modal-body pt-3 font-14">
                <p class="mb-10">Your practice time has ended.</p>

                <p class="mb-10">Your progress has been automatically saved.</p>

                <p>You can now review your answers.</p>
            </div>

            <!-- Footer -->
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-primary" data-dismiss="modal">View Results</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade alreaduStarted modal-md" id="alreaduStarted" tabindex="-1" role="dialog" aria-labelledby="alreaduStartedLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 12px;">

            <!-- Header -->
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold font-16">
                    Test already open
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Body -->
            <div class="modal-body pt-3 font-14">
                <p>This test is already open in another tab.</p>
                <p>What would you like to do?</p>

            </div>

            <!-- Footer -->
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-primary remove-tab">Go to other tab</button>
                <button type="button" class="btn btn-primary continue-tab" data-dismiss="modal">Continue here instead</button>
            </div>

        </div>
    </div>
</div>


<div class="modal fade sessionTakenOver modal-md" id="sessionTakenOver" tabindex="-1" role="dialog" aria-labelledby="sessionTakenOverLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 12px;">

            <!-- Header -->
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold font-16">
                    Test switched to another device or browser.
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Body -->
            <div class="modal-body pt-3 font-14">
                <p>Your test has been opened somewhere else.</p>
                <p>This session has now been paused.</p>
                <p>If this wasn’t you, please tell the teacher or site admin right away.</p>

            </div>

            <!-- Footer -->
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-primary remove-tab">Close</button>
                <button type="button" class="btn btn-primary already-started-continue" >Continue on this device</button>
            </div>

        </div>
    </div>
</div>
<!-- Report Modal Html End -->
<a href="#" data-toggle="modal" class="hide review_submit_btn" data-target="#review_submit">modal button</a>


<script src="/assets/default/js/question-layout.js?ver={{$rand_id}}"></script>
<script>
    var correct_answer_explaination = '{{$correct_answer_explaination}}';
    var incorrect_answer_explaination = '{{$incorrect_answer_explaination}}';


    var practice_with_review_check = false;
    var sound_check = false;
    var correct_sound = false;
    var incorrect_sound = false;


    //init_question_functions();
    $('body').addClass('quiz-area-page');
    $('body').addClass('quiz-show');
    var header = document.getElementById("navbar");
    var headerOffset = (header != null) ? header.offsetHeight : 100;
    var header_height = parseInt(headerOffset) + parseInt(85) + "px";

    var attempted_questions = '{{count(array_filter($questions_status_array, fn($value) => $value !== "waiting"))}}';

    var Questioninterval = null;
    var Quizintervals = null;

    var duration_type = '{{$duration_type}}';
    var timer_counter = '{{$timer_counter}}';

    var timePaused = false;

    var focusInterval = null;
    var focusIntervalCount = 240;
    var TimerActive = true;


    function quiz_default_functions() {

        if( focusInterval == null) {

            focusInterval = setInterval(function () {
                var focus_count = focusIntervalCount-1;

                console.log(focus_count);
                focusIntervalCount = focus_count;
                if (focus_count <= 0 && TimerActive == true) {
                    TimerActive = false;
                    timePaused = true;
                    var total_questions = $('.quiz-pagination li').length;
                    focusIntervalCount = 240;
                    //clearInterval(focusInterval);
                    focusInterval = null;
                }
            }, 1000);
        }

        window.addEventListener('focus', function () {
            focusIntervalCount = 240;
            clearInterval(focusInterval);
            focusInterval = null;
        });

        $(document).on('click', '.continue-btn', function (e) {
            TimerActive = true;
            timePaused = false;
            focusIntervalCount = 240;
            focusInterval = null;
        });







        var active_question_id = $(".question-area-block").attr('data-active_question_id');

        if(active_question_id > 0){
            $('.rurera-question-block').removeClass('active');
            $('.rurera-question-block.question-step-'+active_question_id).addClass('active');

        }

        $('.quiz-pagination ul li[data-actual_question_id="'+active_question_id+'"]').click();



        var active_section_id = $('.quiz-pagination ul li.active').closest('ul').attr('data-section_id');



        if(active_section_id != '' && active_section_id != 0){
            console.log('active_section_id===='+active_section_id);
            $('.quiz-section-data[data-section_id="'+active_section_id+'"]').find('.section-start-quiz').click();
        }



        /*
        * Progress Bar set
         */
        var current_question_no = $('.rurera-question-block.question-step-'+active_question_id).attr('data-question_no');
        current_question_no = parseInt(current_question_no)-1;
        var total_no_of_questions = $(".question-area").attr('data-total_questions');
        total_no_of_questions = parseInt(total_no_of_questions);

        var next_question_no_percent = (current_question_no * 100) / total_no_of_questions;
        next_question_no_percent = Math.round(next_question_no_percent);
        console.log('next_question_no_percent==='+next_question_no_percent);


        $('.progress-bar-counter').css('left', next_question_no_percent+'%');
        $('.progress-bar-fill').css('width', next_question_no_percent+'%');
        $('.no-questions-value').html(current_question_no);


        setInterval(function(){
            var count_tabs = countTabs();
            if(count_tabs > 1){
                $(".alreaduStarted").modal('show');
            }
        },2000);

        Quizintervals = setInterval(function () {
            var parentObj = $(".quiz-section-data.active").find(".quiz-status-bar.active");
            if( TimerActive == true){
                var quiz_timer_counter = $(".quiz-section-data.active").find(".quiz-status-bar.active").find(".quiz-timer-counter").attr('data-time_counter');
                if (duration_type == 'no_time_limit') {
                    quiz_timer_counter = parseInt(quiz_timer_counter) + parseInt(1);
                } else {
                    quiz_timer_counter = parseInt(quiz_timer_counter) - parseInt(1);
                }
                $(".quiz-section-data.active").find(".quiz-status-bar.active").find(".quiz-timer-counter").html(getTime(quiz_timer_counter));
                $(".time-counter-modal").html(getTime(quiz_timer_counter));
                if (parentObj.find('.nub-of-sec').length > 0) {
                    parentObj.find('.nub-of-sec').html(getTime(quiz_timer_counter));
                }
                $(".quiz-section-data.active").find(".quiz-status-bar.active").find(".quiz-timer-counter").attr('data-time_counter', quiz_timer_counter);
                if (duration_type == 'per_question') {
                    if (parseInt(quiz_timer_counter) == 0) {
                        clearInterval(Quizintervals);
                        $('.question-submit-btn').attr('data-bypass_validation', 'yes');
                        $('#question-submit-btn')[0].click();
                    }
                }
                if (duration_type == 'total_practice') {
                    if (parseInt(quiz_timer_counter) == 0) {

                        const $active = $('.rurera-question-block.active').closest('.quiz-section-data.active');
                        const $next = $active.next('.quiz-section-data');

                        if($('.swal2-close').length > 0){
                            $(".swal2-close").click();
                        }

                        if ($next.length == 0) {
                            TimerActive = false;
                            clearInterval(Quizintervals);

                            $('.rurera-question-block').removeClass('active');

                            $active.find('.rurera-question-block').last().addClass('active');
                            $('.question-submit-btn').attr('data-bypass_validation', 'yes');
                            $(".question-submit-btn").click();

                            afterSectionFinishConfirm();

                            //On Test time out Modal
                            $(".TimeOutPractice").modal('show');

                        }else{
                            onSectionMoveConfirm();

                            initQuestionStatusPopover();
                        }
                        //$(".review-btn").click();
                        if ($('.question-review-btn').length > 0) {
                            $('.question-review-btn').click();
                        }
                    }
                }
            }

        }, 1000);

        $("body").on("click", ".increasetext", function (e) {
            curSize = parseInt($('.learning-page').css('font-size')) + 2;
            if (curSize <= 32)
                $('.learning-page').css('font-size', curSize);
        });

        $("body").on("click", ".resettext", function (e) {
            if (curSize != 16)
                $('.learning-page').css('font-size', 18);
        });

        $("body").on("click", ".decreasetext", function (e) {
            curSize = parseInt($('.learning-page').css('font-size')) - 2;
            if (curSize >= 16)
                $('.learning-page').css('font-size', curSize);
        });

        var current_question_counter =  $(".quiz-section-data.active").find(".quiz-pagination li.active").attr('data-question_counter');
        $(".quiz-section-data.active").find(".question-status span").html(current_question_counter);
    }

    function beforeQuestionSubmit(){

        return true;
        var $activeLi = $(".quiz-section-data.active").find(".quiz-pagination li.active");
        var response_flag = true;
        var finish_confirm = $(".quiz-section-data.active").attr('data-section_finish_confirm');
        if(finish_confirm == 'yes'){
            return true;
        }
        if ($activeLi.is(":last-child")) {
            console.log("This is the last li");
            afterSectionFinish();

            response_flag = false;
        }
        return response_flag;
    }

    function getTime(secondsString) {
        var h = Math.floor(secondsString / 3600); //Get whole hours
        secondsString -= h * 3600;
        var m = Math.floor(secondsString / 60); //Get remaining minutes
        secondsString -= m * 60;
        var return_string = '';
        if( h > 0) {
            var return_string = return_string + '<div class="time-box" id="hh">'+h+'</div><span class="colon">:</span>';
        }else{
            var return_string = return_string + '<div class="time-box" id="hh">'+h+'</div><span class="colon">:</span>';
        }
        var quiz_type = '<?php echo e($quiz_type); ?>';
        if( (m > 0 || h > 0) || quiz_type != 'vocabulary') {
            var return_string = return_string + '<div class="time-box" id="mm">'+(m < 10 ? '0' + m : m)+'</div><span class="colon">:</span>';
        }
        //var return_string = return_string + (secondsString < 10 ? '0' + secondsString : secondsString);
        var return_string = return_string + '<div class="time-box" id="ss">'+(secondsString < 10 ? '0' + secondsString : secondsString)+'</div>';
        //return_string = return_string + 's';



        return return_string;
    }


    function afterQuestionValidation(return_data, thisForm, question_id, thisBlock) {
        var question_status_class = (return_data.incorrect_flag == true) ? 'incorrect' : 'correct';
        question_status_class = 'attempted';
        $(".quiz-pagination ul li[data-actual_question_id='" + question_id + "']").addClass(question_status_class);
        var notifications_settings_show_message = $(".show-notifications").attr('data-show_message');

        var show_notification = false;

        $('.show-notifications').html('');

        if(return_data.incorrect_flag == true && incorrect_sound == true && sound_check == true){
            $('.show-notifications').append('<audio autoPlay="" className="player-box-audio" id="audio_file_4492" src="/speech-audio/'+notification_sound+'"></audio>');
            show_notification = true;
        }


        var current_question_no = $(".rurera-question-block.active").attr('data-question_no');
        var next_question_no = parseInt(current_question_no)+1;
        var total_no_of_questions = $(".question-area").attr('data-total_questions');
        total_no_of_questions = parseInt(total_no_of_questions);

        var next_question_no_percent = (current_question_no * 100) / total_no_of_questions;
        next_question_no_percent = Math.round(next_question_no_percent);
        console.log('next_question_no_percent==='+next_question_no_percent);


        $('.progress-bar-counter').css('left', next_question_no_percent+'%');
        $('.progress-bar-fill').css('width', next_question_no_percent+'%');
        $('.no-questions-value').html(current_question_no);

        if(return_data.incorrect_flag == true && incorrect_answer_explaination == 1 && practice_with_review_check == true){
            var question_solution = return_data.question_solution;
            var notification_class = (return_data.incorrect_flag == true) ? 'wrong' : 'correct';
            var notification_label = (return_data.incorrect_flag == true) ? 'Thats incorrect, but well done for trying' : 'Well done! Thats exactly right.';
            var notification_sound = (return_data.incorrect_flag == true) ? 'wrong-answer.mp3' : 'correct-answer.mp3';
            $('.show-notifications').append('<span class="question-status-'+notification_class+'">'+notification_label+'</span>');
            $('.show-notifications').append('<div class="question-explaination"> <button class="explaination-btn collapsed" type="button" data-toggle="collapse" data-target="#explaination" aria-expanded="false" aria-controls="collapseExample"><h5 class="font-16 font-weight-bold">Explanation:</h5></button><div class="collapse" id="explaination">'+question_solution+'</div></div>');
            show_notification = true;
        }

        if(return_data.incorrect_flag == false && correct_sound == true && sound_check == true){
            $('.show-notifications').append('<audio autoPlay="" className="player-box-audio" id="audio_file_4492" src="/speech-audio/'+notification_sound+'"></audio>');
            show_notification = true;
        }

        if(return_data.incorrect_flag == false && correct_answer_explaination == 1 && practice_with_review_check == true){
            var question_solution = return_data.question_solution;
            var notification_class = 'correct';
            var notification_label = 'Well done! Thats exactly right.';
            var notification_sound = 'correct-answer.mp3';
            var earned_coins = $(".total-earned-coins").html();
            earned_coins = parseInt(earned_coins)+1;
            $(".total-earned-coins").html(earned_coins);
            $('.show-notifications').append('<span class="question-status-'+notification_class+'">'+notification_label+'</span>');
            $('.show-notifications').append('<div class="question-explaination"> <button class="explaination-btn collapsed" type="button" data-toggle="collapse" data-target="#explaination" aria-expanded="false" aria-controls="collapseExample"><h5 class="font-16 font-weight-bold">Explanation:</h5></button><div class="collapse" id="explaination">'+question_solution+'</div></div>');
            show_notification = true;

        }


        if (show_notification == true) {
            const el = document.querySelector('.show-notifications');
            if (el) {
                el.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }
        if( return_data.is_complete == true) {
            var quiz_result_id = return_data.result_id;
            /*$(".quiz-complete").html(return_data.result_page_layout);
            $(".quiz-status-bar").addClass('rurera-hide');
            $(".questions-nav-controls").addClass('rurera-hide');
            $(".show-notifications").addClass('rurera-hide');
            $(".quiz-pagination").addClass('rurera-hide');
            $(".section-top-bar").addClass('rurera-hide');

            $(".rurera-question-block").removeClass('active');
            $("body").removeClass('quiz-area-page');
            $(".quiz-complete").show();
            TimerActive = false;*/
        }

        if(practice_with_review_check == true){
            $(".question-area-block").find('.question-submit-btn').addClass('rurera-hide');
            $(".question-area-block").find('.question-next-btn').removeClass('rurera-hide');
        }else{
            //$(".question-area-block").find('.question-next-btn').click();
        }
        //$('#ne0xt-btn')[0].click();
    }

    function afterContinue(){
        var firstPending = $(".quiz-section-data.active")
            .find('.quiz-pagination li')
            .not('.correct, .attempted')
            .first();
        firstPending.click();
        afterPrevQuestion();
    }

    function afterPrevQuestion(){
        const $active = $('.rurera-question-block.active');
        const $next = $active.next('.rurera-question-block');
        const $prev = $active.prev('.rurera-question-block');

        var question_id = $(".quiz-section-data.active").find(".rurera-question-block.active").attr('data-qresult');
        $(".quiz-section-data.active").find(".quiz-pagination li").removeClass('active');
        $(".quiz-section-data.active").find('.quiz-pagination li[data-question_id="'+question_id+'"]').addClass('active');

        if ($next.length > 0) {
            $(".question-next-btn").removeClass('disabled-div');
            $(".question-next-btn").removeClass('rurera-hide');
        }else{
            $(".question-next-btn").addClass('rurera-hide');
            $(".question-next-btn").addClass('disabled-div');
            $(".finish-section").removeClass('rurera-hide');
        }

        if ($prev.length > 0) {
            $(".prev-btn").removeClass('disabled-div');
        }else{
            $(".prev-btn").addClass('disabled-div');
        }

        var current_question_counter =  $(".quiz-section-data.active").find(".quiz-pagination li.active").attr('data-question_counter');
        $(".quiz-section-data.active").find(".question-status span").html(current_question_counter);

        initQuestionStatusPopover();

        afterQuestionActive();
    }
    function afterNextQuestion(){
        focusIntervalCount = 240;
        focusInterval = null;
        if (duration_type == 'per_question') {
            $(".quiz-section-data.active").find(".quiz-timer-counter").attr('data-time_counter', timer_counter);
            quiz_default_functions();
        }

        var question_id = $(".quiz-section-data.active").find(".rurera-question-block.active").attr('data-qresult');
        console.log('afterNextQuestion==='+question_id);
        $(".quiz-section-data.active").find(".quiz-pagination li").removeClass('active');
        $(".quiz-section-data.active").find('.quiz-pagination li[data-question_id="'+question_id+'"]').addClass('active');



        const $active = $('.rurera-question-block.active');
        const $next = $active.next('.rurera-question-block');
        const $prev = $active.prev('.rurera-question-block');

        if ($next.length > 0) {
            $(".question-next-btn").removeClass('disabled-div');
            $(".question-next-btn").removeClass('rurera-hide');
        }else{
            $(".question-next-btn").addClass('rurera-hide');
            $(".question-next-btn").addClass('disabled-div');
            $(".finish-section").removeClass('rurera-hide');
        }

        if ($prev.length > 0) {
            $(".prev-btn").removeClass('disabled-div');
        }else{
            $(".prev-btn").addClass('disabled-div');
        }
        var current_question_counter =  $(".quiz-section-data.active").find(".quiz-pagination li.active").attr('data-question_counter');
        $(".quiz-section-data.active").find(".question-status span").html(current_question_counter);

        initQuestionStatusPopover();
        afterQuestionActive();


    }

    function afterQuestionActive(){
        const $activeSection = $(".quiz-section-data.active");
        const $active = $(".quiz-section-data.active").find(".rurera-question-block.active");
        var comprehension_html = '';
        $(".quiz-section-data.active").removeClass('comprehension-layout');
        $('.question-content').html('');
        if($active.find('.question-comprehension-block').length > 0) {
            $activeSection.addClass('comprehension-layout');
            comprehension_html = $active.find('.question-comprehension-block').html();
            $('.question-content').html($active.prop('outerHTML'));
        }
        $(".story-body").html(comprehension_html);
        $(".comprehension-block").html(comprehension_html);
    }


    $(document).on('click', '.question-paging', function (e) {

        var question_id = $(this).attr('data-question_id');
        $(".quiz-section-data.active").find('.quiz-pagination li[data-question_id="'+question_id+'"]').click();
        $(".swal2-close").click();
        afterPrevQuestion();
    });

    function afterNoNextQuestion() {
        //alert('afterNoNextQuestion');
        const $active = $('.rurera-question-block.active').closest('.quiz-section-data.active');

        var quiz_timer_remaining = $active.find('.quiz-timer-counter').attr('data-time_counter');
        var current_section_id = $active.attr('data-section_id');
        const $next = $active.next('.quiz-section-data');
        var total_questions = $('.quiz-pagination ul[data-section_id="' + current_section_id + '"] li').length;
        var section_move_html =
            'Total Questions: ' + total_questions + '<br>' +
            'Correct Questions: ' + correct_questions + '<br>' +
            'Incorrect Questions: ' + incorrect_questions + '<br>' +
            'Pending Questions: ' + (total_questions - (correct_questions + incorrect_questions)) + '<br>' +
            'You still have: ' + getTimeStr(quiz_timer_remaining) + ' remaining';

        var pendingQuestions = $(".quiz-section-data.active")
            .find('.question-pagination-top')
            .find('.quiz-pagination li')
            .not('.correct, .attempted');

        var buttonsHTML = '<div class="d-flex gap-3 mb-5 flex-wrap justify-content-start">';

        pendingQuestions.each(function () {
            var questionId = $(this).data('question_id');
            var questionNumber = $(this).find('a').text().trim();

            buttonsHTML += '<button type="button" data-question_id="' + questionId + '" class="question-paging btn btn-outline-primary px-3">' + questionNumber + '</button>';
        });

        buttonsHTML += '</div>';

        var section_move_html = `

            <h2 class="fw-bold mb-15 font-16 font-weight-bold text-left">Well done!</h2>

            <div class="d-flex px-20 align-items-center gap-3 mb-20 time-left font-14">
                <div class="border rounded px-3 py-2 bg-light">
                    <span class="me-2">
                        <img src="/assets/default/svgs/timer2.svg" alt="" area-hidden="true">
                    </span>
                    <span class="fw-bold text-warning time-counter-modal">${getTimeStr(quiz_timer_remaining)}</span>
                </div>
                <span class="ms-2"> left</span>
            </div>

            <p class="mb-20 font-14 text-left">
                Now is a great time to check your answers and to try to answer the
                following questions that you've skipped:
            </p>
            <div class="d-flex justify-content-start px-0 gap-3 mb-5 flex-wrap">
                ${buttonsHTML}
            </div>

            `;
        if ($next.length > 0) {

            /*rurera_modal_alert(
                '',
                '',
                true, //confirmButton
                section_move_html,
                'onSectionMoveConfirm'
            );*/
        }
        if ($('.sats-summary').length == 0) {
            rurera_modal_alert(
                '',
                '',
                true, //confirmButton
                section_move_html,
                'onSectionMoveConfirm'
            );
            initQuestionStatusPopover();
        }


    }

    function afterSectionFinish(){
        //alert('afterSectionFinish');
        const $active = $('.rurera-question-block.active').closest('.quiz-section-data.active');

        var quiz_timer_remaining = $active.find('.quiz-timer-counter').attr('data-time_counter');
        var current_section_id = $active.attr('data-section_id');
        const $next = $active.next('.quiz-section-data');
        var total_questions = $('.quiz-pagination ul[data-section_id="'+current_section_id+'"] li').length;
        var section_move_html =
            'Total Questions: ' + total_questions + '<br>' +
            'Correct Questions: ' + correct_questions + '<br>' +
            'Incorrect Questions: ' + incorrect_questions + '<br>' +
            'Pending Questions: ' + (total_questions - (correct_questions + incorrect_questions)) + '<br>' +
            'You still have: ' + getTimeStr(quiz_timer_remaining) + ' remaining';

        var pendingQuestions = $(".quiz-section-data.active")
            .find('.quiz-pagination li')
            .not('.correct, .attempted');

        var buttonsHTML = '<div class="d-flex justify-content-center gap-3 mb-5">';

        pendingQuestions.each(function () {
            var questionId = $(this).data('question_id');
            var questionNumber = $(this).find('a').text().trim();

            buttonsHTML += '<button type="button" data-question_id="' + questionId + '" class="question-paging btn btn-outline-primary px-3">' + questionNumber + '</button>';
        });

        buttonsHTML += '</div>';

        var section_move_html = `

            <h2 class="font-weight-bold mb-20 font-16 text-left">Well done!</h2>

            <div class="d-flex justify-content-start align-items-center gap-3 mb-20 font-14 time-left px-20">
                <div class="border rounded px-3 py-2 bg-light">
                    <span class="me-2">⏱</span>
                    <span class="fw-bold text-warning">${getTimeStr(quiz_timer_remaining)}</span>
                </div>
                <span class="ms-2"> left</span>
            </div>

            <p class="text-left font-14 mb-20">
                Now is a great time to check your answers and to try to answer the
                following questions that you've skipped:
            </p>
            <div class="d-flex justify-content-start px-10 gap-3 mb-5 flex-wrap">
                ${buttonsHTML}
            </div>

            `;

        rurera_modal_alert(
            '',
            '',
            true, //confirmButton
            section_move_html,
            'afterSectionFinishConfirm'
        );
        $(".finish-section").addClass('rurera-hide');
        if ($next.length == 0) {
            $(".finish-section").html('Finish');
        }else{
            $(".finish-section").html('Finish Section');
        }

        afterPrevQuestion();


    }

    function afterSectionFinishConfirm(){
        //alert('afterSectionFinishConfirm');
        var current_question_id =  $(".quiz-section-data.active").find(".quiz-pagination li.active").attr('data-question_id');
        $(".quiz-section-data.active").attr('data-section_finish_confirm', 'yes');
        $(".quiz-section-data.active").attr('data-finish-exclude_id', current_question_id);
        $('.question-submit-btn').attr('data-bypass_validation', 'yes');
        $(".question-submit-btn").click();



        initQuestionStatusPopover();
        onSectionMoveConfirm();



        //TimerActive = false;
        //clearInterval(Quizintervals);
        return true;
    }



    function getTimeStr(secondsString) {
        var h = Math.floor(secondsString / 3600); //Get whole hours
        secondsString -= h * 3600;
        var m = Math.floor(secondsString / 60); //Get remaining minutes
        secondsString -= m * 60;
        var return_string = '';
        if( h > 0) {
            var return_string = return_string + h + "h ";
        }
        var quiz_type = '{{$quiz_type}}';
        if( (m > 0 || h > 0) || quiz_type != 'vocabulary') {
            var return_string = return_string + (m < 10 ? '0' + m : m) + "m ";
        }
        var return_string = return_string + (secondsString < 10 ? '0' + secondsString : secondsString);
        return_string = return_string + 's';

        return return_string;
    }

    $(document).on('click', '.finish-section', function (e) {
        //alert('finish-section');
        afterNoNextQuestion();

    });

    function onSectionMoveConfirm(){
        const $active = $('.rurera-question-block.active').closest('.quiz-section-data.active');

        var exclude_question_id = $active.attr('data-finish-exclude_id');
        var current_section_id = $active.attr('data-section_id');

        var is_last_section = $active.attr('data-is_last_section');
        const $next = $active.next('.quiz-section-data');


        var qattempt_id = $(".question-area .question-step").attr('data-qattempt');

        var pendingQuestions = $(".quiz-section-data.active")
            .find('.quiz-pagination li')
            .not('.correct, .attempted');


        var question_ids = [];
        var question_ids_all = [];
        pendingQuestions.each(function () {
            var questionId = $(this).data('question_id');
            question_ids_all.push(questionId);
            if(questionId != exclude_question_id){
                question_ids.push(questionId);
            }

        });

        jQuery.ajax({
            type: "POST",
            url: '/question_attempt/jump_section',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {"is_last_section" : is_last_section, "qattempt_id": qattempt_id, 'question_ids': question_ids, 'question_ids_all': question_ids_all},
            success: function (return_data) {
                if(is_last_section == 'yes'){
                    $(".quiz-complete-full").html(return_data);
                    $(".quiz-status-bar").addClass('rurera-hide');
                    $(".questions-nav-controls").addClass('rurera-hide');
                    $(".show-notifications").addClass('rurera-hide');
                    $(".quiz-pagination").addClass('rurera-hide');
                    $(".section-top-bar").addClass('rurera-hide');

                    $(".rurera-question-block").removeClass('active');
                    $("body").removeClass('quiz-area-page');
                    $(".quiz-complete-full").show();
                    TimerActive = false;
                }
            }
        });


        if ($next.length > 0) {

            $active.addClass('rurera-hide');
            $active.removeClass('active');

            $('.quiz-status-bar').addClass('rurera-hide');
            $active.find('.quiz-status-bar').removeClass('rurera-hide');
            $active.find('.quiz-status-bar').addClass('active');

            $next.addClass('active');
            $next.removeClass('rurera-hide');

            $('.rurera-question-block.active').removeClass('active');



            $next.find('.rurera-question-block').first().addClass('active');
        }else{
            var current_question_id =  $(".quiz-section-data.active").find(".quiz-pagination li.active").attr('data-question_id');
            $(".quiz-section-data.active").attr('data-section_finish_confirm', 'yes');
            $(".quiz-section-data.active").attr('data-finish-exclude_id', current_question_id);
            $('.question-submit-btn').attr('data-bypass_validation', 'yes');
            $(".question-submit-btn").click();
        }

        var result_id = '{{isset($newQuizStart->id)? $newQuizStart->id : 0}}';

        jQuery.ajax({
            type: "POST",
            url: '/common/update_section_time',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {"section_id": current_section_id, "result_id": result_id},
            success: function (return_data) {
            }
        });


        initQuestionStatusPopover();
    }




    function getDivWithValues() {
        // Clone the original div
        let clonedDiv = $('.question-area-block').clone();

        // Update cloned select elements with the values from the original div
        clonedDiv.find('select').each(function(index) {
            // Get the corresponding select element in the original div
            let originalSelect = $('.question-area-block select').eq(index);
            // Set the cloned select element's value to the original select element's value
            $(this).val(originalSelect.val());
        });

        // Update cloned textarea elements with the values from the original div
        clonedDiv.find('textarea').each(function(index) {
            // Get the corresponding textarea element in the original div
            let originalTextarea = $('.question-area-block textarea').eq(index);
            // Set the cloned textarea element's value to the original textarea element's value
            $(this).text(originalTextarea.val());
        });

        // Update cloned input elements with the values from the original div
        clonedDiv.find('input').each(function(index) {
            // Get the corresponding input element in the original div
            let originalInput = $('.question-area-block input').eq(index);
            // Set the cloned input element's value to the original input element's value
            if (originalInput.attr('type') === 'checkbox' || originalInput.attr('type') === 'radio') {
                $(this).prop('checked', originalInput.prop('checked'));
            } else {
                $(this).val(originalInput.val());
            }
        });

        // Generate final HTML with all values set properly
        clonedDiv.find('input').each(function() {
            if ($(this).attr('type') === 'checkbox' || $(this).attr('type') === 'radio') {
                if ($(this).prop('checked')) {
                    $(this).attr('checked', 'checked');
                } else {
                    $(this).removeAttr('checked');
                }
            } else {
                $(this).attr('value', $(this).val());
            }
        });

        clonedDiv.find('textarea').each(function() {
            $(this).text($(this).val());
        });

        clonedDiv.find('select').each(function() {
            $(this).find('option').each(function() {
                if ($(this).parent('select').val() == $(this).val()) {
                    $(this).attr('selected', 'selected');
                } else {
                    $(this).removeAttr('selected');
                }
            });
        });

        clonedDiv.find('.question-submit-btn').removeClass('rurera-processing');
        clonedDiv.find('.rurera-button-loader').remove();

        return clonedDiv;
    }
    $(document).on('keyup', 'body', function (evt) {
        if (evt.key === 'ArrowLeft') {
            $('#prev-btn')[0].click();
        }

        if (evt.key === 'ArrowRight') {



            $('#next-btn')[0].click();
        }
    });





    /*
    * Practice Settings
     */


    $(document).on('click', '.setting-reset-btn', function (evt) {
        $('.show-timer-check').prop('checked', false);
        $('.show-pagination-check').prop('checked', false);
        $('.practice-with-review-check').prop('checked', false);
        $('.play-sounds-check').prop('checked', false);
        $('.show-timer-check').change();
        $('.show-pagination-check').change();
        $('.practice-with-review-check').change();
        $('.play-sounds-check').change();
    });

    $(document).on('change', '.show-timer-check', function (evt) {

        var show_timer = $(this).is(':checked')? true : false;
        $(".timer-wrap").removeClass('rurera-hide');

        if(show_timer == false){
            $(".timer-wrap").addClass('rurera-hide');
        }
    });

    $(document).on('change', '.show-pagination-check', function (evt) {

        var show_pagination = $(this).is(':checked')? true : false;
        $(".question-pagination-top").removeClass('rurera-hide');
        //$(".bottom-pagination").removeClass('rurera-hide');


        if(show_pagination == false){
            $(".question-pagination-top").addClass('rurera-hide');
            //$(".bottom-pagination").addClass('rurera-hide');
        }
    });


    $(document).on('change', '.practice-with-review-check', function (evt) {
        practice_with_review_check = $(this).is(':checked')? true : false;

    });


    $(document).on('change', '.play-sounds-check', function (evt) {
        sound_check = $(this).is(':checked')? true : false;
    });

</script>
<script>
    function quizPageCallback() {

        // Enable tooltips
        $('[data-toggle="tooltip"]').each(function () {

            $(this).tooltip({
                html: true,
                container: $(this).closest('.questions-data-block'),
                trigger: 'hover'
            });

        });

        // Open report modal
        $(document).off('click', '.report-btn').on('click', '.report-btn', function () {
            $('#reportModal').modal('show');
        });

        // Open report modal
        $(document).off('click', '.close-practice').on('click', '.close-practice', function () {
            $('.closePractice').modal('show');
        });


        // Submit report logic
        $(document).off('click', '#submitReport').on('click', '#submitReport', function () {

            var otherChecked = $('#optOther').is(':checked');
            var otherText = $('#otherText').val().trim();

            if (otherChecked && otherText === '') {
                alert('Please explain the issue in the text area.');
                return;
            }

            $('#successMsg').removeClass('d-none');

            setTimeout(function () {
                $('#reportModal').modal('hide');
                $('#reportForm')[0].reset();
                $('#successMsg').addClass('d-none');
            }, 1500);
        });
    }

    $(document).on("change, input", ".editor-field", function (e) {
        $(".rurera-validation-error").remove();
        var thisBlock = $(".rurera-question-block.active");
        var thisForm = thisBlock.find('form');
        returnType = rurera_validation_process(thisForm, 'quiz_page');
    });

    $(document).on("click", ".section-start-quiz", function (e) {
        var result_id = '{{isset($newQuizStart->id)? $newQuizStart->id : 0}}';
        $(".quiz-section-data").removeClass('active');
        $(".quiz-section-data").addClass('rurera-hide');
        console.log('=-----=====');
        var parentObj = $(this).closest('.quiz-section-data');
        parentObj.addClass('active');
        parentObj.removeClass('rurera-hide');
        var section_id = parentObj.attr('data-section_id');
        $('.quiz-pagination').addClass('rurera-hide');
        parentObj.find('.quiz-pagination').removeClass('rurera-hide');
        $('.quiz-status-bar').addClass('rurera-hide');
        parentObj.find('.quiz-status-bar').removeClass('rurera-hide');
        parentObj.find('.quiz-status-bar').addClass('active');
        parentObj.find('.section-layout-block').addClass('rurera-hide');
        $('.quiz-section-questions').addClass('rurera-hide');

        $(this).closest('.quiz-section-data').find('.quiz-section-questions').removeClass('rurera-hide');


        jQuery.ajax({
            type: "POST",
            url: '/common/update_section_time',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {"section_id": section_id, "result_id": result_id},
            success: function (return_data) {
            }
        });

        initQuestionStatusPopover();
        const $active = $('.rurera-question-block.active').closest('.quiz-section-data.active');
        const $next = $active.next('.quiz-section-data');
        $(".finish-section").addClass('rurera-hide');
        if ($next.length == 0) {
            $(".finish-section").html('Finish');
        }else{
            $(".finish-section").html('Finish Section');
        }

        afterPrevQuestion();

    });


    var selected_section = '{{isset($selected_section)? $selected_section : 1}}';

    $('.quiz-section-data[data-section_counter="'+selected_section+'"]').addClass('active');
    $('.quiz-section-data[data-section_counter="'+selected_section+'"]').removeClass('rurera-hide');


    $('[data-toggle="tooltip"]').tooltip({
        container: '.report-btn'
    });

    function exitTest(){
        window.location.href = '/dashboard';
    }



</script>
@if($active_section == false)
    <script>
    var result_id = '{{$quizAttempt->quiz_result_id}}';
    jQuery.ajax({
        type: "GET",
        url: '/common/mark_result',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType:'json',
        data: {"result_id": result_id},
        success: function (return_data) {
            window.location.reload();
        }
    });
</script>
@endif

<script>
    $(document).on('change', '.rureraform-checkbox-medium', function (e) {

        var $group = $(this).closest('.rureraform-input'); // adjust if needed

        var min_options = parseInt($(this).attr('data-min')) || 0;
        var max_options = parseInt($(this).attr('data-max')) || 1;

        // count checked checkboxes in same group
        var checkedCount = $group.find('.rureraform-checkbox-medium:checked').length;

        // condition: within min and max
        if (checkedCount >= min_options && checkedCount <= max_options) {
            $(".question-submit-btn").click();
        }

    });
</script>

<script>
    /*$(function () {
        // Get the HTML content for the popover
        const paletteContent = $('#palette-container').html();

        // Initialize the popover
        $('.question-status-text').popover({
            content: paletteContent,
            html: true,
            placement: 'top',
            sanitize: false, // IMPORTANT
            template: '<div class="popover" role="tooltip" style="max-width: 550px;"><div class="arrow"></div><div class="popover-body p-0"></div></div>'
        });
    });*/
    $(document).on('click', function (e) {

        // If click is NOT on a popover or trigger element
        if (
            !$(e.target).closest('.popover').length &&
            !$(e.target).closest('.question-status-trigger').length
        ) {
            $('.question-status-trigger').popover('hide');
        }

    });
    function initQuestionStatusPopover() {

        $('.quiz-section-data.active').find('.question-status-trigger').each(function () {

            const $trigger = $(this);
            const $instance = $trigger.closest('.quiz-instance');
            const content = $instance.find('.palette-content').html();

            // destroy previous instance if exists
            if ($trigger.data('bs.popover')) {
                $trigger.popover('dispose');
            }

            $trigger.popover({
                content: content,
                html: true,
                placement: 'top',
                sanitize: false,
                template: '<div class="popover" role="tooltip" style="max-width: 550px;"><div class="arrow"></div><div class="popover-body p-0"></div></div>'
            }).on('inserted.bs.popover', function () {

                const popoverId = $(this).attr('aria-describedby');
                $('.quiz-section-data.active').find('#' + popoverId).data('trigger-element', $trigger);

            });

        });

    }

    // Run on page load
    $(function () {
        initQuestionStatusPopover();
    });


    setInterval(function(){
        var result_id = '{{$quizAttempt->quiz_result_id}}';
        var device_id = '{{$device_id}}';
        jQuery.ajax({
            type: "GET",
            url: '/common/quiz_heartbeat',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType:'json',
            data: {"result_id": result_id, "device_id": device_id},
            success: function (return_data) {
                if(return_data.status == 'already_started'){
                    $(".sessionTakenOver").modal('show');
                    return false;
                }
            }
        });
    },15000);


    if (!sessionStorage.tabId) {
        sessionStorage.tabId = Math.random().toString(36).slice(2);
    }

    const tabId = sessionStorage.tabId;

    // Register this tab
    localStorage.setItem("mock_practice-" + tabId, "open");

    // Cleanup
    window.addEventListener("beforeunload", () => {
        localStorage.removeItem("mock_practice-" + tabId);
    });

    // Check how many tabs have form open
    function countTabs() {
        return Object.keys(localStorage).filter(k => k.startsWith("mock_practice-")).length;
    }
    $(document).on("click", ".remove-tab", function (e) {
        e.preventDefault();

        // Get current tabId
        const CurrenttabId = sessionStorage.tabId;

        if (CurrenttabId) {
            // Remove from localStorage (global tracking)
            localStorage.removeItem("mock_practice-" + CurrenttabId);

            // Remove from sessionStorage (this tab identity)
            sessionStorage.removeItem("CurrenttabId");
        }

        // Try to close the tab
        //window.close();
        window.location.href = "/dashboard";
    });


    $(document).on("click", ".continue-tab", function (e) {
        e.preventDefault();

        const currentTabId = sessionStorage.tabId;

        // Tell all tabs which one should stay alive
        localStorage.setItem("active-tab", currentTabId);

        // Trigger event for other tabs
        localStorage.setItem("force-close-tabs", Date.now());
    });





    window.addEventListener("storage", function (e) {

        // Detect force close signal
        if (e.key === "force-close-tabs") {

            const activeTab = localStorage.getItem("active-tab");
            const currentTabId = sessionStorage.tabId;

            if (currentTabId !== activeTab) {

                // Cleanup
                localStorage.removeItem("form-" + currentTabId);
                sessionStorage.removeItem("tabId");
                // Try to close
                window.location.href = "/dashboard";

            }
        }
    });

    $(document).on('click', '.already-started-continue', function (evt) {
        var result_id = '{{$quizAttempt->quiz_result_id}}';
        jQuery.ajax({
            type: "POST",
            url: '/question_attempt/already_started_continue',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {"result_id": result_id},
            success: function (return_data) {
                window.location.reload();
            }
        });
    });

    function wrapRawLatex() {
        console.log('wrapRawLatex');

        const containers = document.querySelectorAll(
            '.question-layout, .question-explaination, .question-layout-block'
        );

        containers.forEach(container => {

            // 1️⃣ Normal text nodes
            container.querySelectorAll('*:not(script):not(style)').forEach(el => {
                if (el.children.length > 0) return;

                let text = el.textContent?.trim();
                if (!text) return;

                // Skip already wrapped math
                if (
                    text.includes('$$') ||
                    text.includes('\\(') ||
                    text.includes('\\[')
                ) return;

                // ✅ STRICT: only real LaTeX commands
                if (/\\[a-zA-Z]+/.test(text)) {
                    el.innerHTML = `$$${text}$$`;
                }
            });

            // 2️⃣ .math-equation spans
            container.querySelectorAll('.math-equation').forEach(el => {
                if (el.dataset.converted) return;

                let latex =
                    el.getAttribute('data-equation') ||
                    el.textContent?.trim();

                if (!latex) return;

                el.innerHTML = `$$${latex}$$`;
                el.dataset.converted = 'true';
            });

        });

        // 3️⃣ MathJax render
        if (window.MathJax?.typesetPromise) {
            MathJax.typesetClear(containers);
            MathJax.typesetPromise(containers).catch(err =>
                console.error('MathJax error:', err)
            );
        }
    }

    document.addEventListener('DOMContentLoaded', wrapRawLatex);
    wrapRawLatex();

</script>



<script>
    var storyHtml = `
      <p>On the far side of a quiet market town, beyond the baker’s shop and the narrow bridge over the river, there stood an old lane lined with sycamore trees. In spring, the lane shimmered with pale green leaves. In summer, it hummed with bees. In autumn, it filled with gold and copper leaves that drifted slowly across the cobbles. At the very end of that lane stood a house with blue shutters, a steep slate roof, and a brass knocker shaped like a sleeping fox.</p>

      <p>Most people in the town passed the house without stopping. Some believed it belonged to a retired musician. Others said it was once owned by a cartographer who had spent his life drawing islands nobody could find. Children invented wilder stories. They said the house was full of clocks that ticked backwards, cupboards full of forgotten recipes, and shelves that carried books whose endings changed every time they were opened. Adults smiled at such stories and told the children not to be silly, but even the adults lowered their voices slightly when they walked by the gate.</p>

      <p>In a smaller house across the square lived a girl named Clara, who was known for asking careful questions. She was not the loudest child in the classroom, nor the fastest runner in the playground, but she noticed details other people missed. She could tell when a shop had changed the arrangement of its window display. She remembered the names of old songs that her grandfather whistled while mending chairs. She noticed when one paving stone had sunk lower than the others after heavy rain. Most of all, she noticed unfinished things.</p>

      <p>There was a scarf in her mother’s basket with one end still waiting to be knitted. There was a birdhouse in her neighbour’s shed that had never received its roof. There was a letter her brother had started writing to a friend after an argument, then folded away before the second paragraph was complete. There was a pencil sketch in Clara’s own desk drawer of the willow tree by the river. The branches were graceful, the trunk was strong, but she had never finished shading the water because she had grown impatient and told herself it was not worth continuing.</p>

      <p>One windy evening in October, after clouds had gathered low over the town and the first drops of rain were beginning to strike the windows, Clara found herself walking alone down the lane of sycamore trees. She had not planned to go there. She had meant only to return a library book before the weather worsened. Yet as she crossed the square and reached the corner, she felt a curious pull, as though some quiet part of the day had been waiting for her to notice it. So instead of going home, she turned towards the lane and followed it to the house with blue shutters.</p>

      <p>The gate was slightly open. The brass fox on the door looked polished by age and countless winters. Clara stood for a moment, listening. The rain was steadier now. Somewhere behind the house a loose branch tapped softly against a wall. She ought to have gone back. She knew that. Yet she also knew that if she left without knocking, she would spend the rest of the evening wondering what might have happened if she had stayed. So she raised her hand and let the fox-head knocker fall once against the wood.</p>

      <p>The sound was deep and unexpectedly musical. It did not echo like a hollow knock. It rang like the note of a bell from very far away. For a few seconds nothing happened. Then the latch shifted, and the door opened inward on its own.</p>

      <p>Inside was a long hallway lit by warm lamplight. The air smelled faintly of cedar wood, old paper, and something sweet that Clara could not quite identify. Along the walls hung framed maps, portraits, and botanical drawings. Some of the portraits showed people reading. Some showed them writing. Some had their eyes closed, as though listening to sounds beyond the room. At the far end of the hallway, where Clara expected another wall, there glowed a softer light, golden and steady, like firelight in a library.</p>

      <p>Clara stepped inside.</p>

      <p>Her footsteps were quiet on the carpet runner. As she reached the end of the hall, the house opened into the largest room she had ever seen. Shelves rose from floor to ceiling. Ladders stood against them. Lanterns hung in the air without visible chains. At the centre of the room stood a long oak table, and at that table sat an elderly woman in a dark green coat reading from a thick ledger bound in blue cloth.</p>

      <p>The woman looked up calmly, as if she had been expecting Clara all afternoon.</p>

      <p>“You are later than I thought,” she said.</p>

      <p>Clara blinked. “Were you expecting me?”</p>

      <p>“I was expecting someone with unfinished business.”</p>

      <p>Clara glanced around the room again. Now that she looked more closely, she saw that the shelves held stranger things than books alone. There were model boats with one sail missing, clocks without hands, music sheets without final bars, folded paper birds with one wing left flat, chessboards paused in the middle of games, and small canvases whose skies had not yet been painted. Nothing in the room looked broken. It all looked paused.</p>

      <p>“What is this place?” Clara asked.</p>

      <p>The woman closed the ledger gently. “A house for unfinished things.”</p>

      <p>Clara did not know how to respond to that, so she asked the question again in a different form. “Why would unfinished things need a house?”</p>

      <p>“Because people mistake unfinished things for failed things,” the woman replied. “They are not the same. Some work is abandoned too early. Some is interrupted by fear. Some is left aside through hurry, grief, distraction, or doubt. Not everything unfinished should be completed, but much of it deserves to be understood before it is dismissed.”</p>

      <p>The answer settled over the room with the weight of something both strange and sensible. Clara thought immediately of her half-finished sketch of the willow tree, and of the letter her brother had hidden in the drawer beneath his socks, and of the little birdhouse in the neighbour’s shed. For the first time, she considered that unfinished things might wait, quietly and stubbornly, for someone to return to them with better patience.</p>

      <p>The keeper led Clara through the house. In one room stood shelves of letters that had never been sent. Some were apologies. Some were invitations. Some were thank-you notes that the writers had postponed until the moment had passed. In another room stood inventions abandoned halfway through their making: a tiny windmill, a folding lantern, a puzzle box that almost opened, a toy carriage awaiting its final wheel. There was a room of unfinished songs, where instruments rested in velvet-lined cases and low threads of melody drifted through the air as if still waiting for their last notes.</p>

      <p>Word spread, quietly at first, then more widely, that old unfinished tasks in the town had begun to stir back into life. The baker returned to a plum tart recipe he had abandoned after one disastrous winter. The dressmaker completed a half-cut coat pattern she had hidden in a drawer for three years. A carpenter repaired a toy cart that had waited in pieces on his workbench since midsummer. None of these things became easier merely because they were resumed. Yet once begun again with patience, they no longer seemed impossible.</p>

      <p>And whenever Clara faced a page, a letter, a drawing, or a task that resisted her halfway through, she remembered the folded bird, the half-painted willow tree, and the keeper’s calm instruction: Begin again, but more carefully.</p>
    `;

    function initScrollableBox(contentId, controlsId, buttonId) {
        const content = document.getElementById(contentId);
        const controls = document.getElementById(controlsId);
        const button = document.getElementById(buttonId);

        function hasOverflow() {
            return content.scrollHeight > content.clientHeight + 1;
        }

        function atBottom() {
            return content.scrollTop + content.clientHeight >= content.scrollHeight - 2;
        }

        function updateUI() {
            if (!hasOverflow()) {
                controls.classList.add("hidden");
                return;
            }

            controls.classList.remove("hidden");
            button.textContent = atBottom() ? "Scroll Up" : "Scroll More";
        }

        function scrollStep() {
            const lineHeight = parseFloat(window.getComputedStyle(content).lineHeight) || 27;
            return Math.round(lineHeight * 10);
        }

        button.addEventListener("click", function () {
            if (!hasOverflow()) {
                updateUI();
                return;
            }

            if (atBottom()) {
                content.scrollTo({
                    top: 0,
                    behavior: "smooth"
                });
            } else {
                content.scrollBy({
                    top: scrollStep(),
                    behavior: "smooth"
                });
            }

            setTimeout(updateUI, 250);
        });

        content.addEventListener("scroll", updateUI);

        return {
            updateUI: updateUI
        };
    }

    document.getElementById("leftContent").innerHTML = storyHtml;

    const leftBox = initScrollableBox("leftContent", "leftControls", "leftBtn");
    const rightBox = initScrollableBox("rightQuestionContent", "rightControls", "rightBtn");

    function refreshAllUI() {
        leftBox.updateUI();
        rightBox.updateUI();
    }

    (function () {
        const wrapper = document.getElementById("splitWrapper");
        const leftPane = document.getElementById("leftPane");
        const divider = document.getElementById("divider");

        let isDragging = false;

        divider.addEventListener("mousedown", function () {
            if (window.innerWidth <= 991) return;
            isDragging = true;
            divider.classList.add("active");
            document.body.style.userSelect = "none";
            document.body.style.cursor = "col-resize";
        });

        document.addEventListener("mousemove", function (e) {
            if (!isDragging || window.innerWidth <= 991) return;

            const rect = wrapper.getBoundingClientRect();
            const dividerWidth = divider.offsetWidth;
            const minLeft = 220;
            const minRight = 220;

            let newLeftWidth = e.clientX - rect.left;
            const maxLeftWidth = rect.width - dividerWidth - minRight;

            if (newLeftWidth < minLeft) newLeftWidth = minLeft;
            if (newLeftWidth > maxLeftWidth) newLeftWidth = maxLeftWidth;

            leftPane.style.width = newLeftWidth + "px";
            refreshAllUI();
        });

        document.addEventListener("mouseup", function () {
            if (!isDragging) return;
            isDragging = false;
            divider.classList.remove("active");
            document.body.style.userSelect = "";
            document.body.style.cursor = "";
            refreshAllUI();
        });
    })();

    window.addEventListener("load", refreshAllUI);
    window.addEventListener("resize", refreshAllUI);
</script>