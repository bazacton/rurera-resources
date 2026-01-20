@extends('admin.layouts.app')

@push('libraries_top')

@endpush
@push('styles_top')
    <link rel="stylesheet" href="/assets/default/css/panel-pages/dashboard.css">
@endpush

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="section-header">
                    <div class="heading-holder">
                        <h1>Track</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="/admin/">Dashboard</a>
                            </div>
                            <div class="breadcrumb-item">Track</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="quiz-data-holder skeleton mb-30">
                    <div class="content-holder card p-25">
                        <div class="quiz-data-filters">
                            <span class="sorting-lable">Filter by:</span>
                            <div class="select-field">
                                <select>
                                    <option value="All Games">All Games</option>
                                    <option value="Footbal">Footbal</option>
                                    <option value="Car Racing">Car Racing</option>
                                    <option value="Cricket">Cricket</option>
                                    <option value="Hockey">Hockey</option>
                                </select>
                            </div>
                            <div class="select-field">
                                <select>
                                    <option value="All Reports">All Reports</option>
                                    <option value="Weekly Reports">Weekly Reports</option>
                                    <option value="Monthly Reports">Monthly Reports</option>
                                    <option value="Yearly Reports">Yearly Reports</option>
                                </select>
                            </div>
                            <div class="select-field">
                                <select>
                                    <option value="All Classes">All Classes</option>
                                    <option value="Grade 1">Grade 1</option>
                                    <option value="Grade 2">Grade 3</option>
                                    <option value="Grade 3">Grade 3</option>
                                </select>
                            </div>
                            <div class="select-field">
                                <select>
                                    <option value="All Classes">Filter by Date</option>
                                    <option value="04/12/2024">04/12/2024</option>
                                    <option value="04/12/2024">Grade 3</option>
                                    <option value="04/12/2024">Grade 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="quiz-data-table bg-white panel-border table-sm">
                            <table>
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="checkbox-field">
                                                <input type="checkbox" id="q-type">
                                                <label for="q-type">Type</label>
                                            </div>
                                        </th>
                                        <th><div class="d-inline-block">Quiz Name</div></th>
                                        <th>
                                            <div class="d-inline-block">Total <br> Participants</div>
                                        </th>
                                        <th>
                                            <div class="d-inline-block">Accuracy</div>
                                        </th>
                                        <th>
                                            <div class="d-inline-block">Code</div>
                                        </th>
                                        <th>
                                        <div class="d-inline-block">Class</div> 
                                        </th>
                                        <th>
                                            <div class="d-inline-block">Actions</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                <div class="checkbox-field">
                                                    <input type="checkbox" id="assigned">
                                                    <label for="assigned">
                                                        <span><img src="/assets/default/svgs/list-view.svg" alt="list-view"> Assigned</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                Science
                                                <small>Dec 3 - <em>Runing</em></small>
                                            </div>
                                        </td>
                                        <td class="text-center"><div class="skelton-hide skelton-height-lg skelton-mb-0">2</div></td>
                                        <td>
                                            <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                <div class="progress-holder">
                                                    <div class="progress-box">
                                                        <div class="circle_percent" data-percent="50">
                                                            <div class="circle_inner">
                                                                <div class="round_per" style="transform: rotate(360deg);"></div>
                                                            </div>
                                                            <div class="circle_inbox">
                                                                <span class="percent_text">50%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="skelton-hide skelton-height-lg skelton-mb-0"></div>
                                        </td>
                                        <td>
                                            <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                <span class="c-grade">Grade 6</span>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                <div class="quiz-data-controls">
                                                    <button type="button">Edit Questions</button>
                                                    <div class="dropdown-box">
                                                        <div class="dropdown">
                                                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                                <span class="icon-box"><img src="/assets/default/svgs/dots-three.svg" alt="dots-three"></span>
                                                            </a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#"><img src="/assets/default/svgs/print-action.svg" alt="print"> Print</a>
                                                                <a class="dropdown-item" href="#"><img src="/assets/default/svgs/trash-bin.svg" alt="trash-bin"> Delete</a>
                                                                <a class="dropdown-item" href="#"><img src="/assets/default/svgs/envelope.svg" alt="envelope"> Email To Prent</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="quiz-data-slide">
                                <div class="quiz-data-slide-inner">
                                    <div class="slide-controls">
                                        <button type="button" class="close-btn">
                                            <span>×</span>
                                        </button>
                                        <div class="prev-next-controls">
                                            <button type="button" class="prev-btn"><span class="icon-box"><img src="/assets/default/svgs/arrow-left.svg" alt="arrow-left"></span> Prev</button>
                                            <button type="button" class="next-btn"><span class="icon-box">Next <img src="/assets/default/svgs/arrow-right.svg" alt="arrow-right"></span></button>
                                        </div>
                                    </div>

                                    <div class="edit-questions-difficulty-tabs mb-30">
                                        <div class="edit-questions-difficulty-data">
                                            <ul class="col-10 col-md-10 col-lg-10 admin-rurera-tabs nav nav-pills mt-20" id="assignment_tabs" role="tablist">
                                                <li class="nav-item"><a data-bulk_list_id="20" data-part_item_id="1374" class="nav-link difficulty-level-btn active" data-difficulty_level="Emerging" id="section-tabid-Emerging" data-toggle="tab" href="#section-tab-Emerging" role="tab" aria-controls="section-tab-Emerging" aria-selected="true"><span class="tab-title">Emerging</span></a></li>
                                                <li class="nav-item"><a data-bulk_list_id="20" data-part_item_id="1374" class="nav-link difficulty-level-btn" data-difficulty_level="Expected" id="section-tabid-Expected" data-toggle="tab" href="#section-tab-Expected" role="tab" aria-controls="section-tab-Expected" aria-selected="true"><span class="tab-title">Expected</span></a></li>
                                                <li class="nav-item"><a data-bulk_list_id="20" data-part_item_id="1374" class="nav-link difficulty-level-btn" data-difficulty_level="Exceeding" id="section-tabid-Exceeding" data-toggle="tab" href="#section-tab-Exceeding" role="tab" aria-controls="section-tab-Exceeding" aria-selected="true"><span class="tab-title">Exceeding</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="edit-questions-tabs">
                                            <div class="nav questions-nav-bar" id="nav-tab" role="tablist">
                                                <button data-question_index="1" data-question_type="checkbox" data-question_id="30883" data-is_deleted="no" class="checkbox_questions Submit for review question-builder-layout nav-link active" id="nav-q1-tab" data-toggle="tab" data-target="#nav-q1" type="button" role="tab" aria-controls="nav-q1" aria-selected="true"><span class="similiarity-status warning"></span><br>1</button>
                                                <button data-question_index="2" data-question_type="checkbox" data-question_id="30886" data-is_deleted="no" class="checkbox_questions Submit for review question-builder-layout nav-link " id="nav-q2-tab" data-toggle="tab" data-target="#nav-q2" type="button" role="tab" aria-controls="nav-q2" aria-selected="true"><span class="similiarity-status warning"></span><br>2</button>
                                                <button data-question_index="3" data-question_type="checkbox" data-question_id="30889" data-is_deleted="no" class="checkbox_questions Submit for review question-builder-layout nav-link " id="nav-q3-tab" data-toggle="tab" data-target="#nav-q3" type="button" role="tab" aria-controls="nav-q3" aria-selected="true">3</button>
                                                <button data-question_index="4" data-question_type="checkbox" data-question_id="30892" data-is_deleted="no" class="checkbox_questions Submit for review question-builder-layout nav-link " id="nav-q4-tab" data-toggle="tab" data-target="#nav-q4" type="button" role="tab" aria-controls="nav-q4" aria-selected="true"><span class="similiarity-status warning"></span><br>4</button>
                                                <button data-question_index="5" data-question_type="checkbox" data-question_id="30895" data-is_deleted="no" class="checkbox_questions Submit for review question-builder-layout nav-link " id="nav-q5-tab" data-toggle="tab" data-target="#nav-q5" type="button" role="tab" aria-controls="nav-q5" aria-selected="true">5</button>
                                                <button data-question_index="6" data-question_type="checkbox" data-question_id="30898" data-is_deleted="no" class="checkbox_questions Submit for review question-builder-layout nav-link " id="nav-q6-tab" data-toggle="tab" data-target="#nav-q6" type="button" role="tab" aria-controls="nav-q6" aria-selected="true"><span class="similiarity-status warning"></span><br>6</button>
                                                <button data-question_index="7" data-question_type="checkbox" data-question_id="30901" data-is_deleted="no" class="checkbox_questions Submit for review question-builder-layout nav-link " id="nav-q7-tab" data-toggle="tab" data-target="#nav-q7" type="button" role="tab" aria-controls="nav-q7" aria-selected="true"><span class="similiarity-status warning"></span><br>7</button>
                                                <button data-question_index="8" data-question_type="checkbox" data-question_id="30904" data-is_deleted="no" class="checkbox_questions Submit for review question-builder-layout nav-link " id="nav-q8-tab" data-toggle="tab" data-target="#nav-q8" type="button" role="tab" aria-controls="nav-q8" aria-selected="true">8</button>
                                                <button data-question_index="9" data-question_type="checkbox" data-question_id="30907" data-is_deleted="no" class="checkbox_questions Submit for review question-builder-layout nav-link " id="nav-q9-tab" data-toggle="tab" data-target="#nav-q9" type="button" role="tab" aria-controls="nav-q9" aria-selected="true">9</button>
                                                <button data-question_index="10" data-question_type="checkbox" data-question_id="30910" data-is_deleted="no" class="checkbox_questions Submit for review question-builder-layout nav-link " id="nav-q10-tab" data-toggle="tab" data-target="#nav-q10" type="button" role="tab" aria-controls="nav-q10" aria-selected="true">10</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Participants html start -->
                                    <div class="chart-summary-fields result-layout-summary">
                                        <div class="sats-summary">
                                            <div class="row">
                                                <div class="col-12 col-md-4 col-lg-3 bitcoin-box">
                                                    <div class="sats-summary-icon" style="background-color: #8cc811;">
                                                        <img src="/assets/default/svgs/sats_speedometer.svg" alt="sats_speedometer">
                                                    </div>
                                                    <div class="summary-text">
                                                        <label>Questions Answered</label>
                                                        <div class="score">2 / 264</div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4 col-lg-3">
                                                    <div class="sats-summary-icon" style="background-color: #fe3c30;">
                                                        <img src="/assets/default/svgs/question-circle-white.svg" alt="question-circle-white">
                                                    </div>
                                                    <div class="summary-text">
                                                        <label>Incorrect / Not Attempted</label>
                                                        <div class="score">1 / 262</div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-4 col-lg-3">
                                                    <div class="sats-summary-icon" style="background-color: #e67035;">
                                                        <img src="/assets/default/svgs/sats_time.svg" alt="time">
                                                    </div>
                                                    <div class="summary-text">
                                                        <label>Time Spent</label>
                                                        <div class="score">00s</div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4 col-lg-3">
                                                    <div class="sats-summary-icon" style="background-color: #0272b6;">
                                                        <img src="/assets/default/svgs/sats_price.svg" alt="sats_price">
                                                    </div>
                                                    <div class="summary-text">
                                                        <label>Coin earned</label>
                                                        <div class="score">1</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="question-result-layout question-status-incorrect"><meta name="csrf-token" content="0TSlo0r1yRWjsWXWM5vZXOXNgvQNz593JQEnTlAP">


                                        <div class="question-step quiz-complete" style="display:none">
                                            <div class="question-layout-block">
                                                <div class="left-content has-bg">
                                                    <h2>&nbsp;</h2>
                                                    <div id="rureraform-form-1" class="rureraform-form rureraform-elements rureraform-form-input-medium rureraform-form-icon-inside rureraform-form-description-bottom ui-sortable" _data-parent="1" _data-parent-col="0" style="display: block;">
                                                        <div class="question-layout">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form class="question-fields" action="javascript:;" data-question_id="11558">
                                            <meta name="csrf-token" content="0TSlo0r1yRWjsWXWM5vZXOXNgvQNz593JQEnTlAP">
                                            <span class="questions-total-holder d-block mb-15 rurera-hide">
                                                <span class="question-dev-details">(11558) (Learn) (checkbox)</span>
                                            </span>
                                            <div id="rureraform-form-1" class="disable-div rureraform-form rureraform-elements rureraform-form-input-medium rureraform-form-icon-inside rureraform-form-description-bottom ui-sortable" _data-parent="1" _data-parent-col="0" style="display: block;">
                                                <div class="question-layout row d-flex align-items-center">
                                                    <div class="rureraform-col rureraform-col-12">
                                                    <div id="rureraform-element-0" class="rureraform-element-0 rureraform-element quiz-group rureraform-element-html ui-sortable-handle" data-type="drop_and_text">
                                                    Here are diagrams of some 3-D shapes.
                                                <div class="rureraform-element-cover"></div>
                                            </div>
                                        </div>
                                        <div class="rureraform-col rureraform-col-12">
                                            <div id="rureraform-element-0" class="rureraform-element-0 rureraform-element quiz-group rureraform-element-html ui-sortable-handle" data-type="question_label">
                                                <div class="question-label question_label">
                                                    <span>Select each shape that has the same number of faces as vertices.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rureraform-col rureraform-col-12"><div id="rureraform-element-19093" class="quiz-group rureraform-element-19093 rureraform-element ui-sortable-handle" data-type="checkbox">
                                            <div class="rureraform-column-label"><label class="rureraform-label"></label></div>
                                            <div class="rureraform-column-input">
                                                <div class="rureraform-input">
                                                    <div class="form-box lms-checkbox-img image-left rurera-in-cols">
                                                        <div class="form-field rureraform-cr-container-medium correct">
                                                            <input class="editor-field rureraform-checkbox-medium" data-min="1" type="checkbox" name="field-19093" id="field-19093-00-8001" value="Cube">
                                                            <label for="field-19093-00-8001">
                                                                <img src="/media/topic_parts/121/shape-1.png" alt="shape-1">
                                                                Cube
                                                            </label>
                                                        </div>
                                                        <div class="form-field rureraform-cr-container-medium wrong">
                                                            <input class="editor-field rureraform-checkbox-medium" data-min="1" type="checkbox" name="field-19093" id="field-19093-11-8001" value="Square-based pyramid">
                                                            <label for="field-19093-11-8001">
                                                                <img src="/media/topic_parts/121/shape-2.png" alt="shape-2">
                                                                Square-based pyramid
                                                            </label>
                                                        </div>
                                                        <div class="form-field rureraform-cr-container-medium">
                                                            <input class="editor-field rureraform-checkbox-medium" data-min="1" type="checkbox" name="field-19093" id="field-19093-22-8001" value="Triangular prism">
                                                            <label for="field-19093-22-8001">
                                                                <img src="/media/topic_parts/121/shape-3.png" alt="shape-3">
                                                                Triangular prism
                                                            </label>
                                                        </div>
                                                        <div class="form-field rureraform-cr-container-medium">
                                                            <input class="editor-field rureraform-checkbox-medium" data-min="1" type="checkbox" name="field-19093" id="field-19093-33-8001" value="Triangular-based pyramid">
                                                            <label for="field-19093-33-8001">
                                                                <img src="/media/topic_parts/121/shape-4.png" alt="shape-4">
                                                                Triangular-based pyramid
                                                            </label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            <div class="rureraform-element-cover"></div>
                                        </div>
                                        </div>

                                            <div class="validation-error"></div>
                                        </div>

                                        </div>
                                        </form>
                                        
                                        <div class="lms-radio-lists">
                                            <span class="list-title">Correct answer:</span>
                                            <ul class="lms-radio-btn-group lms-user-answer-block">
                                                <li><label class="lms-question-label" for="radio2"><span>Cube</span></label></li>
                                            </ul>
                                            <span class="list-title">Rumaisa Khan answered:</span>
                                            <ul class="lms-radio-btn-group lms-user-answer-block">
                                                <li><label class="lms-question-label wrong" for="radio2"><span>Cube</span></label></li>
                                                <li><label class="lms-question-label wrong" for="radio2"><span>Square-based pyramid</span></label></li>
                                            </ul>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts_bottom')
    <script>
        /*Quiz Data Slide Function Start*/
        $(document).ready(function () {
            $(".quiz-data-table td label, .slide-controls .close-btn").click(function (e) {
                e.stopPropagation(); 
                $(".quiz-data-slide").toggleClass("active");
            });

            $(".quiz-data-slide").click(function (e) {
                const $element = $(this);
                const offset = $element.offset();
                const pseudoAreaWidth = 20; 
                if (
                    e.pageX < offset.left + pseudoAreaWidth || 
                    e.pageY < offset.top + pseudoAreaWidth 
                ) {
                    $element.removeClass("active");
                }
            });

            $(".quiz-data-slide").on("click", function (e) {
                e.stopPropagation();
            });
        });
        /*Quiz Data Slide Function End*/

        /*Skelton Loading Fungtion Start*/
        $(document).ready(function () {
            const $el = document.querySelector(".quiz-data-holder");

            setTimeout(() => {
            $el.classList.remove("skeleton");
            $el
                .querySelectorAll(".skelton-hide")
                .forEach((el) => el.classList.remove("skelton-hide"));
            }, 1000);
        });
        /*Skelton Loading Fungtion End*/
    </script>
@endpush
