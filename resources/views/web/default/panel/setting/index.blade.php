@php
    $layout = auth()->check() && auth()->user()->isParent() 
        ? getTemplate() . '.panel.layouts.panel_layout_full' 
        : getTemplate() . '.panel.layouts.panel_layout';
@endphp
@extends($layout)
@push('styles_top')
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">

    <link href="/assets/default/vendors/svgavatars/css/normalize.css" rel="stylesheet">
	<link href="/assets/default/vendors/svgavatars/css/spectrum.css" rel="stylesheet">
	<link href="/assets/default/vendors/svgavatars/css/svgavatars.css" rel="stylesheet">

    <script src="/assets/default/vendors/svgavatars/js/jquery-3.5.1.min.js"></script>
	<script src="/assets/default/vendors/svgavatars/js/svgavatars.tools.js"></script>
	<script src="/assets/default/vendors/svgavatars/js/svgavatars.defaults.js"></script>
	<script src="/assets/default/vendors/svgavatars/js/languages/svgavatars.en.js"></script>
	<script src="/assets/default/vendors/svgavatars/js/svgavatars.core.min.js"></script>

@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="quiz-data-holder mb-30">
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
                <div class="quiz-data-table">
                    <table>
                        <thead>
                            <tr>
                                <th>
                                    <div class="checkbox-field">
                                        <input type="checkbox" id="q-type">
                                        <label for="q-type">Type</label>
                                    </div>
                                </th>
                                <th>Quiz Name</th>
                                <th class="text-center">Total <br> Participants</th>
                                <th>Accuracy</th>
                                <th>Code</th>
                                <th>Class</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="checkbox-field">
                                        <input type="checkbox" id="assigned">
                                        <label for="assigned">
                                            <span><img src="/assets/default/svgs/list-view.svg" alt=""> Assigned</span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    Science
                                    <small>Dec 3 - <em>Runing</em></small>
                                </td>
                                <td class="text-center">2</td>
                                <td>
                                    <div class="progress-holder">
                                        <div class="progress-box">
                                            <div class="circle_percent" data-percent="50">
                                                <div class="circle_inner">
                                                    <div class="round_per"></div>
                                                </div>
                                                <div class="circle_inbox">
                                                    <span class="percent_text">50%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                    <span class="c-grade">Grade 6</span>
                                </td>
                                <td class="text-center">
                                    <div class="quiz-data-controls">
                                        <button type="button">Edit Questions</button>
                                        <div class="dropdown-box">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="icon-box"><img src="/assets/default/svgs/dots-three.svg" alt="">Play</span>
                                                </a>
                                                <div class="dropdown-menu" style="">
                                                    <a class="dropdown-item" href="#"><img src="/assets/default/svgs/print.svg" alt=""> Print</a>
                                                    <a class="dropdown-item" href="#"><img src="/assets/default/svgs/delete.svg" alt=""> Delete</a>
                                                    <a class="dropdown-item" href="#"><img src="/assets/default/svgs/envelope.svg" alt=""> Email To Prent</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="elements-holder mb-30 bg-white panel-border rounded-sm p-15">
                <div class="quiz-categories mb-25">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="categories-card">
                                <span class="icon-box"><img src="/assets/default/svgs/accuracy.svg" alt=""></span>
                                <div class="text-holder">
                                    <span>Accuracy</span>
                                    <strong>67%</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="categories-card">
                                <span class="icon-box"><img src="/assets/default/svgs/check-circle.svg" alt=""></span>
                                <div class="text-holder">
                                    <span>Completion Rate</span>
                                    <strong>100%</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="categories-card">
                                <span class="icon-box"><img src="/assets/default/svgs/student-users.svg" alt=""></span>
                                <div class="text-holder">
                                    <span>Students Assigned</span>
                                    <strong>2</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="categories-card">
                                <span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt=""></span>
                                <div class="text-holder">
                                    <span>Questions</span>
                                    <strong>8</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="class-insight">
                    <span class="insight-lable">Class Insight</span>
                    <ul>
                        <li><span class="icon-box">&#10003;</span> <em>2</em> completed</li>
                        <li><span class="icon-box">&#10003;</span> <em>0</em> incompleted</li>
                        <li><span class="icon-box">&#10003;</span> <em>2</em> unattempted</li>
                    </ul>
                </div>
                <div class="class-controls">
                    <div class="left-area">
                        <button type="button">View quiz</button>
                        <button type="button">Flashcards</button>
                        <button type="button">Manage Accomodations</button>
                    </div>
                    <div class="right-area">
                        <div class="class-controls-option">
                            <button type="button"><img src="/assets/default/svgs/delete.svg" alt=""></button>
                            <button type="button"><img src="/assets/default/svgs/print.svg" alt=""></button>
                            <button type="button"><img src="/assets/default/svgs/download.svg" alt=""></button>
                        </div>
                        <button type="button"><span class="icon-box"><img src="/assets/default/svgs/envelope.svg" alt=""></span>Email all parents</button>
                        <button type="button"><span class="icon-box"><img src="/assets/default/svgs/share.svg" alt=""></span>Share report</button>
                    </div>
                </div>
            </div>
            <div class="elements-holder mb-30 bg-white panel-border rounded-sm">
                <div class="quiz-tabs">
                    <ul class="nav" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="participants-tab" data-toggle="tab" data-target="#participants" type="button" role="tab" aria-controls="participants" aria-selected="true">Participants</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="questions-tab" data-toggle="tab" data-target="#questions" type="button" role="tab" aria-controls="questions" aria-selected="false">Questions</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="accommodations-tab" data-toggle="tab" data-target="#accommodations" type="button" role="tab" aria-controls="accommodations" aria-selected="false">Accommodations</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="overview-tab" data-toggle="tab" data-target="#overview" type="button" role="tab" aria-controls="overview" aria-selected="false">Overview</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tags-tab" data-toggle="tab" data-target="#tags" type="button" role="tab" aria-controls="tags" aria-selected="false">Tags <span>Beta</span></button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="participants" role="tabpanel" aria-labelledby="participants-tab">
                            <div class="quiz-filters">
                                <div class="select-box">
                                    <span>Showing</span>
                                    <select>
                                        <option value="Best">Best</option>
                                        <option value="Best">Bad</option>
                                    </select>
                                    <span>attempt</span>
                                </div>
                                <div class="sorting-by-filters">
                                    <span class="sorting-lable">Sort by:</span>
                                    <select>
                                        <option value="Accuracy">Accuracy</option>
                                        <option value="Attempt">Attempt</option>
                                    </select>
                                    <button type="button" class="accuracy-btn"><img src="/assets/default/svgs/download.svg" alt=""></button>
                                    <button class="full-screen-btn"><img src="/assets/default/svgs/resize-full.svg" alt=""></button>
                                </div>
                            </div>
                            <div class="participants-holder">
                                <div class="quiz-status">
                                    <ul>
                                        <li class="correct">Correct</li>
                                        <li class="pending">Yet to b graded</li>
                                        <li class="incorrect">Incorrect</li>
                                        <li class="urgent">Urgent</li>
                                    </ul>
                                </div>
                                <div class="participants-table">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th></th>
                                                <th>Accuracy</th>
                                                <th>Points</th>
                                                <th>Score</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="user-info">
                                                        <span class="img-box">
                                                            <img src="/avatar/svgA04056688806304609.png" class="rounded-circle" alt="Rehan Qaiser" width="400" height="400" itemprop="image" loading="eager" title="rounded circle">
                                                        </span>
                                                        <span class="user-name">
                                                            Muhammad Rehan
                                                            <em>2 attempts</em>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="user-attempt-status">
                                                        <ul>
                                                            <li class="correct"><span></span></li>
                                                            <li class="correct"><span></span></li>
                                                            <li class="correct"><span></span></li>
                                                            <li class="pending"><span></span></li>
                                                            <li class="pending"><span></span></li>
                                                            <li class="incorrect"><span></span></li>
                                                            <li class="urgent"><span></span></li>
                                                            <li class="urgent"><span></span></li>
                                                            <li class="correct"><span></span></li>
                                                            <li class="correct"><span></span></li>
                                                            <li class="correct"><span></span></li>
                                                            <li class="pending"><span></span></li>
                                                            <li class="pending"><span></span></li>
                                                            <li class="incorrect"><span></span></li>
                                                            <li class="urgent"><span></span></li>
                                                            <li class="urgent"><span></span></li>
                                                            <li class="correct"><span></span></li>
                                                            <li class="correct"><span></span></li>
                                                            <li class="correct"><span></span></li>
                                                            <li class="pending"><span></span></li>
                                                            <li class="pending"><span></span></li>
                                                            <li class="incorrect"><span></span></li>
                                                            <li class="urgent"><span></span></li>
                                                            <li class="urgent"><span></span></li>
                                                            <li class="correct"><span></span></li>
                                                            <li class="correct"><span></span></li>
                                                            <li class="correct"><span></span></li>
                                                            <li class="pending"><span></span></li>
                                                            <li class="pending"><span></span></li>
                                                            <li class="incorrect"><span></span></li>
                                                            <li class="urgent"><span></span></li>
                                                            <li class="urgent"><span></span></li>
                                                            <li class="correct"><span></span></li>
                                                            <li class="correct"><span></span></li>
                                                            <li class="correct"><span></span></li>
                                                            <li class="pending"><span></span></li>
                                                            <li class="pending"><span></span></li>
                                                            <li class="incorrect"><span></span></li>
                                                            <li class="urgent"><span></span></li>
                                                            <li class="urgent"><span></span></li>
                                                        </ul>
                                                        <div class="attempt-numbers">
                                                            <span class="correct"><i>&#10003;</i> 3</span>
                                                            <span class="incorrect"><i>&#10005;</i> 1</span>
                                                            <span class="urgent"><i>&#10003;</i> 2</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="progress-holder">
                                                        <div class="progress-box">
                                                            <div class="circle_percent" data-percent="35">
                                                                <div class="circle_inner">
                                                                    <div class="round_per"></div>
                                                                </div>
                                                                <div class="circle_inbox">
                                                                    <span class="percent_text">35%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="points">5<em>/6</em></span>
                                                </td>
                                                <td>
                                                    <span class="score">5310</span>
                                                </td>
                                                <td>
                                                    <div class="quiz-controls">
                                                        <button type="button">Evaluate</button>
                                                        <button type="button"><img src="/assets/default/svgs/refresh.svg" alt=""></button>
                                                        <div class="dropdown-box">
                                                            <div class="dropdown">
                                                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                    <span class="icon-box"><img src="/assets/default/svgs/dots-three.svg" alt=""></span>
                                                                </a>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="#"><img src="/assets/default/svgs/print.svg" alt=""> Print</a>
                                                                    <a class="dropdown-item" href="#"><img src="/assets/default/svgs/delete.svg" alt=""> Delete</a>
                                                                    <a class="dropdown-item" href="#"><img src="/assets/default/svgs/envelope.svg" alt=""> Email To Prent</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="user-info">
                                                        <span class="img-box">
                                                            <img src="/avatar/svgA04056688806304609.png" class="rounded-circle" alt="Rehan Qaiser" width="400" height="400" itemprop="image" loading="eager" title="rounded circle">
                                                        </span>
                                                        <span class="user-name">
                                                            Muhammad Rehan
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="user-attempt-status">
                                                        <ul>
                                                            <li class="correct"><span></span></li>
                                                            <li class="correct"><span></span></li>
                                                            <li class="correct"><span></span></li>
                                                            <li class="pending"><span></span></li>
                                                            <li class="pending"><span></span></li>
                                                            <li class="incorrect"><span></span></li>
                                                            <li class="urgent"><span></span></li>
                                                            <li class="urgent"><span></span></li>
                                                        </ul>
                                                        <div class="attempt-numbers">
                                                            <span class="correct"><i>&#10003;</i> 3</span>
                                                            <span class="incorrect"><i>&#10005;</i> 1</span>
                                                            <span class="urgent"><i>&#10003;</i> 2</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="progress-holder">
                                                        <div class="progress-box">
                                                            <div class="circle_percent" data-percent="35">
                                                                <div class="circle_inner">
                                                                    <div class="round_per"></div>
                                                                </div>
                                                                <div class="circle_inbox">
                                                                    <span class="percent_text">50%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="points">5<em>/6</em></span>
                                                </td>
                                                <td>
                                                    <span class="score">300</span>
                                                </td>
                                                <td>
                                                    <div class="quiz-controls">
                                                        <button type="button">Evaluate</button>
                                                        <button type="button"><img src="/assets/default/svgs/refresh.svg" alt=""></button>
                                                        <div class="dropdown-box">
                                                            <div class="dropdown">
                                                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                    <span class="icon-box"><img src="/assets/default/svgs/dots-three.svg" alt=""></span>
                                                                </a>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="#"><img src="/assets/default/svgs/print.svg" alt=""> Print</a>
                                                                    <a class="dropdown-item" href="#"><img src="/assets/default/svgs/delete.svg" alt=""> Delete</a>
                                                                    <a class="dropdown-item" href="#"><img src="/assets/default/svgs/envelope.svg" alt=""> Email To Prent</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="questions" role="tabpanel" aria-labelledby="questions-tab">
                            <div class="quiz-filters">
                                <div class="select-box">
                                    <span>Showing</span>
                                    <select>
                                        <option value="Best">Best</option>
                                        <option value="Best">Bad</option>
                                    </select>
                                    <span>attempt</span>
                                </div>
                                <div class="sorting-by-filters">
                                    <span class="sorting-lable">Sort by:</span>
                                    <select>
                                        <option value="Accuracy">Accuracy</option>
                                        <option value="Attempt">Attempt</option>
                                    </select>
                                    <button type="button" class="accuracy-btn"><img src="/assets/default/svgs/download.svg" alt=""></button>
                                    <button class="full-screen-btn"><img src="/assets/default/svgs/resize-full.svg" alt=""></button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="accommodations" role="tabpanel" aria-labelledby="accommodations-tab">
                            <div class="quiz-filters">
                                <div class="select-box">
                                    <span>Showing</span>
                                    <select>
                                        <option value="Best">Best</option>
                                        <option value="Best">Bad</option>
                                    </select>
                                    <span>attempt</span>
                                </div>
                                <div class="sorting-by-filters">
                                    <span class="sorting-lable">Sort by:</span>
                                    <select>
                                        <option value="Accuracy">Accuracy</option>
                                        <option value="Attempt">Attempt</option>
                                    </select>
                                    <button type="button" class="accuracy-btn"><img src="/assets/default/svgs/download.svg" alt=""></button>
                                    <button class="full-screen-btn"><img src="/assets/default/svgs/resize-full.svg" alt=""></button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <div class="quiz-filters">
                                <div class="select-box">
                                    <span>Showing</span>
                                    <select>
                                        <option value="Best">Best</option>
                                        <option value="Best">Bad</option>
                                    </select>
                                    <span>attempt</span>
                                </div>
                                <div class="sorting-by-filters">
                                    <span class="sorting-lable">Sort by:</span>
                                    <select>
                                        <option value="Accuracy">Accuracy</option>
                                        <option value="Attempt">Attempt</option>
                                    </select>
                                    <button type="button" class="accuracy-btn"><img src="/assets/default/svgs/download.svg" alt=""></button>
                                    <button class="full-screen-btn"><img src="/assets/default/svgs/resize-full.svg" alt=""></button>
                                </div>
                            </div>
                            <div class="overview-table">
                                <div class="overview-table-inner">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Participant</th>
                                                <th>Score</th>
                                                <th>Points <span class="q-num">Out of 6</span></th>
                                                <th>Q1 <span class="q-percent urgent">100%</span></th>
                                                <th>Q2 <span class="q-percent correct">100%</span></th>
                                                <th>Q3 <span class="q-percent correct">100%</span></th>
                                                <th>Q4 <span class="q-percent incorrect">0%</span></th>
                                                <th>Q5 <span class="q-percent warning">100%</span></th>
                                                <th>Q6 <span class="q-percent urgent">100%</span></th>
                                                <th>Q7 <span class="q-percent correct">100%</span></th>
                                                <th>Q8 <span class="q-percent incorrect">100%</span></th>

                                                <th>Q9 <span class="q-percent urgent">100%</span></th>
                                                <th>Q10 <span class="q-percent correct">100%</span></th>
                                                <th>Q11 <span class="q-percent correct">100%</span></th>
                                                <th>Q12 <span class="q-percent incorrect">0%</span></th>
                                                <th>Q13 <span class="q-percent warning">100%</span></th>
                                                <th>Q14 <span class="q-percent urgent">100%</span></th>
                                                <th>Q15 <span class="q-percent correct">100%</span></th>
                                                <th>Q16 <span class="q-percent incorrect">100%</span></th>

                                                <th>Q17 <span class="q-percent urgent">100%</span></th>
                                                <th>Q18 <span class="q-percent correct">100%</span></th>
                                                <th>Q19 <span class="q-percent correct">100%</span></th>
                                                <th>Q20 <span class="q-percent incorrect">0%</span></th>
                                                <th>Q21 <span class="q-percent warning">100%</span></th>
                                                <th>Q22 <span class="q-percent urgent">100%</span></th>
                                                <th>Q23 <span class="q-percent correct">100%</span></th>
                                                <th>Q24 <span class="q-percent incorrect">100%</span></th>

                                                <th>Q25 <span class="q-percent urgent">100%</span></th>
                                                <th>Q26 <span class="q-percent correct">100%</span></th>
                                                <th>Q27 <span class="q-percent correct">100%</span></th>
                                                <th>Q28 <span class="q-percent incorrect">0%</span></th>
                                                <th>Q29 <span class="q-percent warning">100%</span></th>
                                                <th>Q30 <span class="q-percent urgent">100%</span></th>
                                                <th>Q31 <span class="q-percent correct">100%</span></th>
                                                <th>Q32 <span class="q-percent incorrect">100%</span></th>

                                                <th>Q33 <span class="q-percent urgent">100%</span></th>
                                                <th>Q34 <span class="q-percent correct">100%</span></th>
                                                <th>Q35 <span class="q-percent correct">100%</span></th>
                                                <th>Q36 <span class="q-percent incorrect">0%</span></th>
                                                <th>Q37 <span class="q-percent warning">100%</span></th>
                                                <th>Q38 <span class="q-percent urgent">100%</span></th>
                                                <th>Q39 <span class="q-percent correct">100%</span></th>
                                                <th>Q40 <span class="q-percent incorrect">100%</span></th>

                                                <th>Q41 <span class="q-percent urgent">100%</span></th>
                                                <th>Q42 <span class="q-percent correct">100%</span></th>
                                                <th>Q43 <span class="q-percent correct">100%</span></th>
                                                <th>Q44 <span class="q-percent incorrect">0%</span></th>
                                                <th>Q45 <span class="q-percent warning">100%</span></th>
                                                <th>Q46 <span class="q-percent urgent">100%</span></th>
                                                <th>Q47 <span class="q-percent correct">100%</span></th>
                                                <th>Q48 <span class="q-percent incorrect">100%</span></th>

                                                <th>Q49 <span class="q-percent urgent">100%</span></th>
                                                <th>Q50 <span class="q-percent correct">100%</span></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="user-info">
                                                        <span class="user-name">Muhammad Rehan</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    5310
                                                </td>
                                                <td class="points">
                                                    5 <small>(83%)</small>
                                                </td>
                                                <td>
                                                    <div class="quiz-status-tooltip incorrect">
                                                        <div class="tooltip-box">
                                                            <div class="tooltip-top">
                                                                <div class="status-box">
                                                                    <span class="incorrect"><i>&#10005;</i> Incorrect</span>
                                                                    <button type="button"><img src="/assets/default/svgs/checkbox.svg" alt=""></button>
                                                                </div>
                                                                <div class="attempt-info">
                                                                    <span>
                                                                        <em>16</em>
                                                                        time
                                                                    </span>
                                                                    <span>
                                                                        <em>0</em>
                                                                        point
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="quiz-type">
                                                                <span>Multiple Choice question</span>
                                                                <h5>8. Science helps us in:</h5>
                                                            </div>
                                                            <div class="user-response">
                                                                <span>Meheak B's response</span>
                                                                <h5><i>&#10005;</i> Standing</h5>
                                                            </div>
                                                            <div class="btn-holder">
                                                                <button type="button" class="view-all-btn">View for all students</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <em class="urgent"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="pending"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="incorrect"><i>&#10005;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="urgent"><i>&#10003;</i></span>
                                                </td>
                                                <td>
                                                    <em class="pending"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>

                                                <td>
                                                    <div class="quiz-status-tooltip incorrect">
                                                        <div class="tooltip-box">
                                                            <div class="tooltip-top">
                                                                <div class="status-box">
                                                                    <span class="incorrect"><i>&#10005;</i> Incorrect</span>
                                                                    <button type="button"><img src="/assets/default/svgs/checkbox.svg" alt=""></button>
                                                                </div>
                                                                <div class="attempt-info">
                                                                    <span>
                                                                        <em>16</em>
                                                                        time
                                                                    </span>
                                                                    <span>
                                                                        <em>0</em>
                                                                        point
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="quiz-type">
                                                                <span>Multiple Choice question</span>
                                                                <h5>8. Science helps us in:</h5>
                                                            </div>
                                                            <div class="user-response">
                                                                <span>Meheak B's response</span>
                                                                <h5><i>&#10005;</i> Standing</h5>
                                                            </div>
                                                            <div class="btn-holder">
                                                                <button type="button" class="view-all-btn">View for all students</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <em class="urgent"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="pending"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="incorrect"><i>&#10005;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="urgent"><i>&#10003;</i></span>
                                                </td>
                                                <td>
                                                    <em class="pending"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>

                                                <td>
                                                    <div class="quiz-status-tooltip incorrect">
                                                        <div class="tooltip-box">
                                                            <div class="tooltip-top">
                                                                <div class="status-box">
                                                                    <span class="incorrect"><i>&#10005;</i> Incorrect</span>
                                                                    <button type="button"><img src="/assets/default/svgs/checkbox.svg" alt=""></button>
                                                                </div>
                                                                <div class="attempt-info">
                                                                    <span>
                                                                        <em>16</em>
                                                                        time
                                                                    </span>
                                                                    <span>
                                                                        <em>0</em>
                                                                        point
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="quiz-type">
                                                                <span>Multiple Choice question</span>
                                                                <h5>8. Science helps us in:</h5>
                                                            </div>
                                                            <div class="user-response">
                                                                <span>Meheak B's response</span>
                                                                <h5><i>&#10005;</i> Standing</h5>
                                                            </div>
                                                            <div class="btn-holder">
                                                                <button type="button" class="view-all-btn">View for all students</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <em class="urgent"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="pending"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="incorrect"><i>&#10005;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="urgent"><i>&#10003;</i></span>
                                                </td>
                                                <td>
                                                    <em class="pending"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>

                                                <td>
                                                    <div class="quiz-status-tooltip incorrect">
                                                        <div class="tooltip-box">
                                                            <div class="tooltip-top">
                                                                <div class="status-box">
                                                                    <span class="incorrect"><i>&#10005;</i> Incorrect</span>
                                                                    <button type="button"><img src="/assets/default/svgs/checkbox.svg" alt=""></button>
                                                                </div>
                                                                <div class="attempt-info">
                                                                    <span>
                                                                        <em>16</em>
                                                                        time
                                                                    </span>
                                                                    <span>
                                                                        <em>0</em>
                                                                        point
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="quiz-type">
                                                                <span>Multiple Choice question</span>
                                                                <h5>8. Science helps us in:</h5>
                                                            </div>
                                                            <div class="user-response">
                                                                <span>Meheak B's response</span>
                                                                <h5><i>&#10005;</i> Standing</h5>
                                                            </div>
                                                            <div class="btn-holder">
                                                                <button type="button" class="view-all-btn">View for all students</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <em class="urgent"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="pending"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="incorrect"><i>&#10005;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="urgent"><i>&#10003;</i></span>
                                                </td>
                                                <td>
                                                    <em class="pending"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>

                                                <td>
                                                    <div class="quiz-status-tooltip incorrect">
                                                        <div class="tooltip-box">
                                                            <div class="tooltip-top">
                                                                <div class="status-box">
                                                                    <span class="incorrect"><i>&#10005;</i> Incorrect</span>
                                                                    <button type="button"><img src="/assets/default/svgs/checkbox.svg" alt=""></button>
                                                                </div>
                                                                <div class="attempt-info">
                                                                    <span>
                                                                        <em>16</em>
                                                                        time
                                                                    </span>
                                                                    <span>
                                                                        <em>0</em>
                                                                        point
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="quiz-type">
                                                                <span>Multiple Choice question</span>
                                                                <h5>8. Science helps us in:</h5>
                                                            </div>
                                                            <div class="user-response">
                                                                <span>Meheak B's response</span>
                                                                <h5><i>&#10005;</i> Standing</h5>
                                                            </div>
                                                            <div class="btn-holder">
                                                                <button type="button" class="view-all-btn">View for all students</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <em class="urgent"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="pending"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="incorrect"><i>&#10005;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="urgent"><i>&#10003;</i></span>
                                                </td>
                                                <td>
                                                    <em class="pending"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>

                                                <td>
                                                    <div class="quiz-status-tooltip incorrect">
                                                        <div class="tooltip-box">
                                                            <div class="tooltip-top">
                                                                <div class="status-box">
                                                                    <span class="incorrect"><i>&#10005;</i> Incorrect</span>
                                                                    <button type="button"><img src="/assets/default/svgs/checkbox.svg" alt=""></button>
                                                                </div>
                                                                <div class="attempt-info">
                                                                    <span>
                                                                        <em>16</em>
                                                                        time
                                                                    </span>
                                                                    <span>
                                                                        <em>0</em>
                                                                        point
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="quiz-type">
                                                                <span>Multiple Choice question</span>
                                                                <h5>8. Science helps us in:</h5>
                                                            </div>
                                                            <div class="user-response">
                                                                <span>Meheak B's response</span>
                                                                <h5><i>&#10005;</i> Standing</h5>
                                                            </div>
                                                            <div class="btn-holder">
                                                                <button type="button" class="view-all-btn">View for all students</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <em class="urgent"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="pending"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="incorrect"><i>&#10005;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="urgent"><i>&#10003;</i></span>
                                                </td>
                                                <td>
                                                    <em class="pending"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>

                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="user-info">
                                                        <span class="user-name">Muhammad Rehan</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    5310
                                                </td>
                                                <td class="points">
                                                    5 <small>(83%)</small>
                                                </td>
                                                <td>
                                                    <em class="urgent"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="pending"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="incorrect"><i>&#10005;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="urgent"><i>&#10003;</i></span>
                                                </td>
                                                <td>
                                                    <em class="pending"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>

                                                <td>
                                                    <div class="quiz-status-tooltip incorrect">
                                                        <div class="tooltip-box">
                                                            <div class="tooltip-top">
                                                                <div class="status-box">
                                                                    <span class="incorrect"><i>&#10005;</i> Incorrect</span>
                                                                    <button type="button"><img src="/assets/default/svgs/checkbox.svg" alt=""></button>
                                                                </div>
                                                                <div class="attempt-info">
                                                                    <span>
                                                                        <em>16</em>
                                                                        time
                                                                    </span>
                                                                    <span>
                                                                        <em>0</em>
                                                                        point
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="quiz-type">
                                                                <span>Multiple Choice question</span>
                                                                <h5>8. Science helps us in:</h5>
                                                            </div>
                                                            <div class="user-response">
                                                                <span>Meheak B's response</span>
                                                                <h5><i>&#10005;</i> Standing</h5>
                                                            </div>
                                                            <div class="btn-holder">
                                                                <button type="button" class="view-all-btn">View for all students</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <em class="urgent"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="pending"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="incorrect"><i>&#10005;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="urgent"><i>&#10003;</i></span>
                                                </td>
                                                <td>
                                                    <em class="pending"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>

                                                <td>
                                                    <div class="quiz-status-tooltip incorrect">
                                                        <div class="tooltip-box">
                                                            <div class="tooltip-top">
                                                                <div class="status-box">
                                                                    <span class="incorrect"><i>&#10005;</i> Incorrect</span>
                                                                    <button type="button"><img src="/assets/default/svgs/checkbox.svg" alt=""></button>
                                                                </div>
                                                                <div class="attempt-info">
                                                                    <span>
                                                                        <em>16</em>
                                                                        time
                                                                    </span>
                                                                    <span>
                                                                        <em>0</em>
                                                                        point
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="quiz-type">
                                                                <span>Multiple Choice question</span>
                                                                <h5>8. Science helps us in:</h5>
                                                            </div>
                                                            <div class="user-response">
                                                                <span>Meheak B's response</span>
                                                                <h5><i>&#10005;</i> Standing</h5>
                                                            </div>
                                                            <div class="btn-holder">
                                                                <button type="button" class="view-all-btn">View for all students</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <em class="urgent"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="pending"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="incorrect"><i>&#10005;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="urgent"><i>&#10003;</i></span>
                                                </td>
                                                <td>
                                                    <em class="pending"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>

                                                <td>
                                                    <div class="quiz-status-tooltip incorrect">
                                                        <div class="tooltip-box">
                                                            <div class="tooltip-top">
                                                                <div class="status-box">
                                                                    <span class="incorrect"><i>&#10005;</i> Incorrect</span>
                                                                    <button type="button"><img src="/assets/default/svgs/checkbox.svg" alt=""></button>
                                                                </div>
                                                                <div class="attempt-info">
                                                                    <span>
                                                                        <em>16</em>
                                                                        time
                                                                    </span>
                                                                    <span>
                                                                        <em>0</em>
                                                                        point
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="quiz-type">
                                                                <span>Multiple Choice question</span>
                                                                <h5>8. Science helps us in:</h5>
                                                            </div>
                                                            <div class="user-response">
                                                                <span>Meheak B's response</span>
                                                                <h5><i>&#10005;</i> Standing</h5>
                                                            </div>
                                                            <div class="btn-holder">
                                                                <button type="button" class="view-all-btn">View for all students</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <em class="urgent"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="pending"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="incorrect"><i>&#10005;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="urgent"><i>&#10003;</i></span>
                                                </td>
                                                <td>
                                                    <em class="pending"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>

                                                <td>
                                                    <div class="quiz-status-tooltip incorrect">
                                                        <div class="tooltip-box">
                                                            <div class="tooltip-top">
                                                                <div class="status-box">
                                                                    <span class="incorrect"><i>&#10005;</i> Incorrect</span>
                                                                    <button type="button"><img src="/assets/default/svgs/checkbox.svg" alt=""></button>
                                                                </div>
                                                                <div class="attempt-info">
                                                                    <span>
                                                                        <em>16</em>
                                                                        time
                                                                    </span>
                                                                    <span>
                                                                        <em>0</em>
                                                                        point
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="quiz-type">
                                                                <span>Multiple Choice question</span>
                                                                <h5>8. Science helps us in:</h5>
                                                            </div>
                                                            <div class="user-response">
                                                                <span>Meheak B's response</span>
                                                                <h5><i>&#10005;</i> Standing</h5>
                                                            </div>
                                                            <div class="btn-holder">
                                                                <button type="button" class="view-all-btn">View for all students</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <em class="urgent"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="pending"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="incorrect"><i>&#10005;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="urgent"><i>&#10003;</i></span>
                                                </td>
                                                <td>
                                                    <em class="pending"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>

                                                <td>
                                                    <div class="quiz-status-tooltip incorrect">
                                                        <div class="tooltip-box">
                                                            <div class="tooltip-top">
                                                                <div class="status-box">
                                                                    <span class="incorrect"><i>&#10005;</i> Incorrect</span>
                                                                    <button type="button"><img src="/assets/default/svgs/checkbox.svg" alt=""></button>
                                                                </div>
                                                                <div class="attempt-info">
                                                                    <span>
                                                                        <em>16</em>
                                                                        time
                                                                    </span>
                                                                    <span>
                                                                        <em>0</em>
                                                                        point
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="quiz-type">
                                                                <span>Multiple Choice question</span>
                                                                <h5>8. Science helps us in:</h5>
                                                            </div>
                                                            <div class="user-response">
                                                                <span>Meheak B's response</span>
                                                                <h5><i>&#10005;</i> Standing</h5>
                                                            </div>
                                                            <div class="btn-holder">
                                                                <button type="button" class="view-all-btn">View for all students</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <em class="urgent"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="pending"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="incorrect"><i>&#10005;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="urgent"><i>&#10003;</i></span>
                                                </td>
                                                <td>
                                                    <em class="pending"><i>&#10003;</i></em>
                                                </td>
                                                <td>
                                                    <em class="correct"><i>&#10003;</i></em>
                                                </td>

                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tags" role="tabpanel" aria-labelledby="tags-tab">
                            <div class="quiz-filters">
                                <div class="select-box">
                                    <span>Showing</span>
                                    <select>
                                        <option value="Best">Best</option>
                                        <option value="Best">Bad</option>
                                    </select>
                                    <span>attempt</span>
                                </div>
                                <div class="sorting-by-filters">
                                    <span class="sorting-lable">Sort by:</span>
                                    <select>
                                        <option value="Accuracy">Accuracy</option>
                                        <option value="Attempt">Attempt</option>
                                    </select>
                                    <button type="button" class="accuracy-btn"><img src="/assets/default/svgs/download.svg" alt=""></button>
                                    <button class="full-screen-btn"><img src="/assets/default/svgs/resize-full.svg" alt=""></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="quiz-setup-listings">
                <div class="row">
                    <div class="col-12 col-lg-3 col-md-6">
                        <div class="quiz-setup-sidenav">
                            <h3>My library</h3>
                            <ul>
                                <li>
                                    <a href="#"><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt=""></span> Created by me</a>
                                    <span class="count-number">1</span>
                                </li>
                                <li>
                                    <a href="#"><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt=""></span> Imported</a>
                                    <span class="count-number">0</span>
                                </li>
                                <li>
                                    <a href="#"><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt=""></span> Perviously used</a>
                                    <span class="count-number">0</span>
                                </li>
                                <li>
                                    <a href="#"><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt=""></span> Liked by me</a>
                                    <span class="count-number">0</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9 col-md-12">
                        <div class="listing-filters">
                            <div class="filter-box">
                                <span class="icon-box"></span>
                                <select>
                                    <option value="All">All</option>
                                </select>
                            </div>
                            <div class="filter-box">
                                <span class="icon-box"></span>
                                <select>
                                    <option value="Most recent">Most recent</option>
                                    <option value="Least recent">Least recent</option>
                                    <option value="Least recent">Alphabetical</option>
                                </select>
                            </div>
                        </div>
                        <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                            <div class="img-holder">
                                <figure>
                                    <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                </figure>
                            </div>
                            <div class="text-holder">
                                <span class="listing-lable">Assesment</span>
                                <h3><a href="#">Sciency Science</a></h3>
                                <ul class="list-options">
                                    <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> 8 questions</li>
                                    <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> 1st-4th Grade</li>
                                    <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> Science</li>
                                </ul>
                                <div class="author-info">
                                    <span class="img-box"><img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt=""></span>
                                    <span class="info-text">
                                        <span>Kaiser K</span>
                                        <span>2 hours ago</span>
                                    </span>
                                </div>
                                <div class="listing-controls">
                                    <button class="continue-btn">Continue editing</button>
                                </div>
                            </div>
                        </div>
                        <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                            <div class="img-holder">
                                <figure>
                                    <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                </figure>
                            </div>
                            <div class="text-holder">
                                <span class="listing-lable">Assesment</span>
                                <h3><a href="#">Sciency Science</a></h3>
                                <ul class="list-options">
                                    <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> 8 questions</li>
                                    <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> 1st-4th Grade</li>
                                    <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> Science</li>
                                </ul>
                                <div class="author-info">
                                    <span class="img-box"><img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt=""></span>
                                    <span class="info-text">
                                        <span>Kaiser K</span>
                                        <span>2 hours ago</span>
                                    </span>
                                </div>
                                <div class="listing-controls">
                                    <button class="share-btn">Share <span class="icon-box"><img src="/assets/default/svgs/share.svg" alt=""></span></button>
                                    <div class="dropdown-box">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"></a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Play</a>
                                                <a class="dropdown-item" href="#">Pause</a>
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
    <div class="row">
        <div class="col-lg-8 col-md-8 col-12 mx-auto">
            <div class="setup-quiz-body">
                <div class="section-title text-center mb-30">
                    <h2>Sciency Science</h2>
                    <span>8 questions</span>
                </div>
                <div class="setup-quiz-card mb-30 bg-white panel-border rounded-sm">
                    <div class="setup-quiz-header mb-15 p-20">
                        <h3>Set up your quiz</h3>
                    </div>
                    <div class="setup-quiz-content px-20 mb-25">
                        <div class="content-heading d-flex align-items-center justify-content-between mb-25">
                            <h4 class="font-weight-500">Set a start time for activity</h4>
                            <div class="form-group custom-switches-stacked mb-0">
                                <label class="custom-switch pl-0 mb-0">
                                    <input type="checkbox" name="review_required" id="review_required" value="1" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="fields-holder mb-25">
                            <div class="input-field">
                                <button type="button"><img src="/assets/default/svgs/calendar.svg" alt=""></button>
                                <input type="text" placeholder="Tuesday December 3">
                            </div>
                            <span class="comma mx-10">,</span>
                            <div class="select-field">
                                <select>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                </select>
                            </div>
                            <span class="comma mx-10">:</span>
                            <div class="select-field mr-10">
                                <select>
                                    <option value="00">00</option>
                                    <option value="02">02</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                </select>
                            </div>
                            <div class="select-field">
                                <select>
                                    <option value="PM">PM</option>
                                    <option value="AM">AM</option>
                                </select>
                            </div>
                        </div>
                        <span class="time-info d-block text-center">
                            <em>37 minutes</em>
                            from now
                        </span>
                    </div>
                    <div class="setup-quiz-content px-20 d-flex align-items-center justify-content-between">
                        <div class="content-heading">
                            <h4 class="font-weight-500">Set a start time for activity</h4>
                            <span class="d-block pt-5">The number of times a student can attempt the activity.</span>
                        </div>
                        <div class="select-field">
                            <select>
                                <option value="Unlimited">Unlimited</option>
                                <option value="Limited">Limited</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="setup-quiz-card mb-30 bg-white panel-border rounded-sm">
                    <div class="setup-quiz-header mb-15 p-20">
                        <h3>Game Assignment Settings</h3>
                    </div>
                    <div class="setup-quiz-content px-20">
                        <div class="content-heading d-flex align-items-center justify-content-between">
                            <div class="heading-box">
                                <h4 class="font-weight-500">Assign to a class <span>(optional)</span></h4>
                                <span class="d-block pt-5">You have 1 class</span>
                            </div>
                            <div class="btn-holder">
                                <button type="button" class="select-btn">Select a class</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="setup-quiz-card mb-30 bg-white panel-border rounded-sm">
                    <div class="setup-quiz-header mb-15 p-20">
                        <h3>Mastery and learning</h3>
                    </div>
                    <div class="setup-quiz-content px-20 mb-25 disabled-quiz">
                        <div class="content-heading d-flex align-items-center justify-content-between mb-25">
                            <div class="heading-box">
                                <h4 class="font-weight-500">Mastery mode</h4>
                                <span class="d-block pt-5">Achieve mastery by allowing students to reattempt incorrect awensors <br> till they reach the set goal</span>
                            </div>
                            <div class="form-group custom-switches-stacked mb-0">
                                <label class="custom-switch pl-0 mb-0">
                                    <input type="checkbox" name="review_required" id="review_required" value="1" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <span class="timer-off d-block mb-20">Turn off <em>timer</em> to enable feature</span>
                        <div class="mastery-options">
                            <div class="field-option d-flex align-items-center justify-content-between">
                                <span>Mastery goal</span>
                                <div class="select-box">
                                    <select>
                                        <option value="80% accuracy">80% accuracy</option>
                                        <option value="80% accuracy">70% accuracy</option>
                                        <option value="80% accuracy">60% accuracy</option>
                                        <option value="80% accuracy">50% accuracy</option>
                                        <option value="80% accuracy">40% accuracy</option>
                                    </select>
                                </div>
                            </div>
                            <div class="field-option d-flex align-items-center justify-content-between">
                                <span>Reattempts per question</span>
                                <div class="select-box">
                                    <select>
                                        <option value="2 reattempts">2 reattempts</option>
                                        <option value="2 reattempts">2 reattempts</option>
                                        <option value="2 reattempts">60% accuracy</option>
                                        <option value="2 reattempts">50% accuracy</option>
                                        <option value="2 reattempts">40% accuracy</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="setup-quiz-content px-20 mb-25">
                        <div class="content-heading d-flex align-items-center justify-content-between">
                            <div class="heading-box">
                                <h4 class="font-weight-500">Redemption questions</h4>
                                <span class="d-block pt-5">Allow students to reattemt a few incorrect questions.</span>
                            </div>
                            <div class="form-group custom-switches-stacked mb-0">
                                <label class="custom-switch pl-0 mb-0">
                                    <input type="checkbox" name="review_required" id="review_required" value="1" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="setup-quiz-content px-20 mb-25">
                        <div class="content-heading d-flex align-items-center justify-content-between">
                            <div class="heading-box">
                                <h4 class="font-weight-500">Redemption quiz</h4>
                                <span class="d-block pt-5">Allow students to awensor all incorrect questions at the end to improve accuracy.</span>
                            </div>
                            <div class="form-group custom-switches-stacked mb-0">
                                <label class="custom-switch pl-0 mb-0">
                                    <input type="checkbox" name="review_required" id="review_required" value="1" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="setup-quiz-content px-20 d-flex align-items-center justify-content-between">
                        <div class="content-heading">
                            <h4 class="font-weight-500">Adaptive Question Bank Mode</h4>
                            <span class="d-block pt-5">Creates distince set of questions for every quiz attempt. <a href="#">See how it works</a></span>
                        </div>
                        <div class="select-field">
                            <select>
                                <option value="Unlimited">Off</option>
                                <option value="Limited">On</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="bg-white panel-border rounded-sm setup-quiz-btn p-10">
                    <button type="submit" class="assign-btn">Assign</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
		@if(auth()->check() && auth()->user()->isParent())
        <div class="col-lg-8 col-md-8 col-12 mx-auto">
		@endif
            <form method="post" id="userSettingForm" class="mt-10 userSettingForm" action="{{ (!empty($new_user)) ? '/panel/manage/'. $user_type .'/new' : '/panel/setting' }}">
                {{ csrf_field() }}
                <input type="hidden" name="step" value="{{ !empty($currentStep) ? $currentStep : 1 }}">
                <input type="hidden" name="next_step" value="0">

                @if(!empty($organization_id))
                    <input type="hidden" name="organization_id" value="{{ $organization_id }}">
                    <input type="hidden" id="userId" name="user_id" value="{{ $user->id }}">
                @endif

                @if(!empty($new_user) or (!empty($currentStep) and $currentStep == 1))
                    @if(auth()->user()->isUser())
                        @include('web.default.panel.setting.setting_includes.basic_information')
                    @else
                        @include('web.default.panel.setting.setting_includes.parent_profile')
                    @endif
                @endif
                @if(!auth()->user()->isUser())
                    @include('web.default.panel.financial.summary')
                @endif

            </form>
		@if(auth()->check() && auth()->user()->isParent())
        </div>
		@endif
    </div>
@endsection

@push('scripts_bottom')
    <script src="/assets/vendors/cropit/jquery.cropit.js"></script>
    <script src="/assets/default/js/parts/img_cropit.min.js"></script>
    <script src="/assets/default/vendors/select2/select2.min.js"></script>

    <script>
        var editEducationLang = '{{ trans('site.edit_education') }}';
        var editExperienceLang = '{{ trans('site.edit_experience') }}';
        var saveSuccessLang = '{{ trans('webinars.success_store') }}';
        var saveErrorLang = '{{ trans('site.store_error_try_again') }}';
        var notAccessToLang = '{{ trans('public.not_access_to_this_content') }}';
		
		
		$(document).on('submit', '.userSettingForm', function (e) {
			var formData = new FormData($('.userSettingForm')[0]);
			returnType = rurera_validation_process($(".userSettingForm"), 'under_field');
			if (returnType == false) {
				$("#saveData").removeClass('loadingbar');
				$("#saveData").removeAttr('disabled');
				return false;
			}
			return true;
		});
		
        $(document).ready(function () {
            $(".full-screen-btn").click(function (e) {
                e.preventDefault();
                
                $(this).closest('.tab-content').toggleClass('fullscreen');
            });
        });

		
    </script>
	
	userSettingForm

    <script src="/assets/default/js/panel/user_setting.min.js"></script>
@endpush
