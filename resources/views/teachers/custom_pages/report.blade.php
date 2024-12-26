@extends('admin.layouts.app')

@push('libraries_top')

@endpush

@section('content')
<section class="section">
   

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="accuracy-score">
                    <div class="chart-holder">
                        <div class="chart-value-lables">
                            <div class="curved-text-gr">
                                <span>G</span>
                                <span>R</span>
                                <span>E</span>
                                <span>A</span>
                                <span>T</span>
                            </div>
                            <div class="curved-text">
                                <span>E</span>
                                <span>X</span>
                                <span>C</span>
                                <span>E</span>
                                <span>L</span>
                                <span>L</span>
                                <span>E</span>
                                <span>N</span>
                                <span>T</span>
                            </div>
                            <div class="curved-text-bd">
                                <span>B</span>
                                <span>A</span>
                                <span>D</span>
                            </div>  
                        </div>
                        <figure>
                            <img src="/assets/default/img/accuracy-chart.png" alt="">
                            <figcaption>
                                <div class="circle-percent-box">
                                    <div class="circle_percent" data-percent="92">
                                        <div class="circle_inner">
                                            <div class="round_per"></div>
                                        </div>
                                    </div>
                                    <span class="total-percent">/100</span>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="accuracy-text">
                        <span class="accuracy-lable">Accuracy Score</span>
                        <h4>You're on the path to full automation!</h4>
                        <p>We'll soon be able to automatically categorize your consumption date. Keep going</p>
                        <a href="#" class="accuracy-back-btn">Back to dashboard</a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <h2 class="mb-20">Overview</h2>
                <div class="questions-overview-status">
                    <div class="status-header">
                        <div class="status">
                            <span class="status-lable"><em><img src="/assets/default/svgs/live.svg" alt=""></em> LIVE</span>
                            <span class="status-info"><i>&#10003;</i> Completed</span>
                        </div>
                    </div>

                    <div class="quiz-title">
                        <h3>UI Design Fundamentals & Best Practice</h3>
                    </div>

                    <div class="quiz-tags">
                        <div class="tag">Fundamental</div>
                        <div class="tag">Design</div>
                        <div class="tag">Not Urgent</div>
                    </div>

                    <div class="quiz-info-holder">
                        <div class="quiz-info">
                            <span><em><img src="/assets/default/svgs/chat-msg.svg" alt=""></em>Quiz</span>
                            <span class="question-number">20 Questions</span>
                            <span>Started date: 28 Sep 2023</span>
                        </div>
                    </div>

                    <div class="quiz-stats">
                        <ul>
                            <li>
                                <span class="stats-lable">Accuracy</span>
                                <div class="percent-holder">
                                    <div class="stats_percent circle-orange" data-percent="50">
                                        <div class="circle_inner">
                                            <div class="round_per"></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span class="stats-lable">Completed Course</span>
                                <div class="percent-holder">
                                    <div class="stats_percent circle-green" data-percent="100">
                                        <div class="circle_inner">
                                            <div class="round_per"></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span class="stats-lable">Submissions</span>
                                <strong>20</strong>
                            </li>
                            <li>
                                <span class="stats-lable">Avg. Complete Time</span>
                                <strong>4:20</strong>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="questions-overview">
                    <div class="overview-summary">
                        <div class="row">
                            <div class="col-12 col-lg-5 col-md-6">
                                <div class="progress-holder">
                                    <div class="progress-box">
                                        <div class="overview_percent circle-orange" data-percent="164">
                                            <div class="circle_inner">
                                                <div class="round_per"></div>
                                            </div>
                                            <div class="progress-info">
                                                <strong>Out of 601</strong>
                                                <span>Completed</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-7 col-md-8">
                                <div class="summary-content">
                                    <h3>summary</h3>
                                    <ul>
                                        <li>
                                            <span class="summary-lable">Created on</span>
                                            <strong>September 9, 2019</strong>
                                        </li>
                                        <li>
                                            <span class="summary-lable">Launched on</span>
                                            <strong>September 9, 2019</strong>
                                        </li>
                                        <li>
                                            <span class="summary-lable">Last responded</span>
                                            <strong>September 9, 2019</strong>
                                        </li>
                                        <li>
                                            <span class="summary-lable">Completed</span>
                                            <strong>164 respondents</strong>
                                        </li>
                                        <li>
                                            <span class="summary-lable">Abandoned</span>
                                            <strong>437 respondents</strong>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="overview-status">
                        <div class="row">
                            <div class="col-12 col-lg-5 col-md-6">
                                <div class="chart-holder">
                                    <canvas id="statusChart"></canvas>
                                </div>
                            </div>
                            <div class="col-12 col-lg-7 col-md-8">
                                <div class="status-content">
                                    <h3>Sucsess</h3>
                                    <p>Out of all the tasks completed by respondents, 28.0% ended up at a "correct" answer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="overview-time">
                        <div class="row">
                            <div class="col-12 col-lg-5 col-md-6">
                                <div class="chart-holder">
                                    <img src="/assets/default/img/time-chart.png" alt="">
                                </div>
                            </div>
                            <div class="col-12 col-lg-7 col-md-8">
                                <div class="overview-content">
                                    <h3>Time Taken</h3>
                                    <ul>
                                        <li>
                                            <span class="summary-lable">Lowest observed time</span>
                                            <strong>0s (0.00m)</strong>
                                        </li>
                                        <li>
                                            <span class="summary-lable">Lower quartile</span>
                                            <strong>2m 5s (2.09m)</strong>
                                        </li>
                                        <li>
                                            <span class="summary-lable">Median</span>
                                            <strong>3m 18s (3.30m)</strong>
                                        </li>
                                        <li>
                                            <span class="summary-lable">Upper quartile</span>
                                            <strong>5m 10s (5.16m)</strong>
                                        </li>
                                        <li>
                                            <span class="summary-lable">Highest observed time</span>
                                            <strong>30m 60s (30.10m)</strong>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="section-header">
                    <h1>Reports</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="/admin/">Dashboard</a>
                        </div>
                        <div class="breadcrumb-item">Reports</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12">
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
                            <li><span class="icon-box">✓</span> <em>2</em> completed</li>
                            <li><span class="icon-box">✓</span> <em>0</em> incompleted</li>
                            <li><span class="icon-box">✓</span> <em>2</em> unattempted</li>
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
                                                                <span class="correct"><i>✓</i> 3</span>
                                                                <span class="incorrect"><i>✕</i> 1</span>
                                                                <span class="urgent"><i>✓</i> 2</span>
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
                                                                <span class="correct"><i>✓</i> 3</span>
                                                                <span class="incorrect"><i>✕</i> 1</span>
                                                                <span class="urgent"><i>✓</i> 2</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="progress-holder">
                                                            <div class="progress-box">
                                                                <div class="circle_percent" data-percent="35">
                                                                    <div class="circle_inner">
                                                                        <div class="round_per" style="transform: rotate(306deg);"></div>
                                                                    </div>
                                                                    <div class="circle_inbox">
                                                                        <span class="percent_text">35%</span>
                                                                    </div>
                                                                <div class="circle_inbox"><span class="percent_text">35%</span></div></div>
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
                                                    <td 
                                                        data-container="quiz-tabs"
                                                        data-toggle="popover"
                                                        data-placement="top"
                                                        data-html="true"
                                                        title=""
                                                        data-content="
                                                        <div class='quiz-status-tooltip incorrect'>
                                                            <div class='tooltip-box'>
                                                                <div class='tooltip-top'>
                                                                    <div class='status-box'>
                                                                        <span class='incorrect'><i>✕</i> Incorrect</span>
                                                                        <button type='button'><img src='/assets/default/svgs/checkbox.svg' alt=''></button>
                                                                    </div>
                                                                    <div class='attempt-info'>
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
                                                                <div class='quiz-type'>
                                                                    <span>Multiple Choice question</span>
                                                                    <h5>8. Science helps us in:</h5>
                                                                </div>
                                                                <div class='user-response'>
                                                                    <span>Meheak B's response</span>
                                                                    <h5><i>✕</i> Standing</h5>
                                                                </div>
                                                                <div class='btn-holder'>
                                                                    <button type='button' class='view-all-btn'>View for all students</button>
                                                                </div>
                                                            </div>
                                                        </div>">
                                                        <em class="urgent"><i>✓</i></em>
                                                    </td>

                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="pending"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="incorrect"><i>✕</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="urgent"><i>✓</i>
                                                    </em></td>
                                                    <td>
                                                        <em class="pending"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>

                                                    <td>
                                                        <!-- <div class="quiz-status-tooltip incorrect">
                                                            <div class="tooltip-box">
                                                                <div class="tooltip-top">
                                                                    <div class="status-box">
                                                                        <span class="incorrect"><i>✕</i> Incorrect</span>
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
                                                                    <h5><i>✕</i> Standing</h5>
                                                                </div>
                                                                <div class="btn-holder">
                                                                    <button type="button" class="view-all-btn">View for all students</button>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <em class="urgent"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="pending"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="incorrect"><i>✕</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="urgent"><i>✓</i>
                                                    </em></td>
                                                    <td>
                                                        <em class="pending"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>

                                                    <td>
                                                        <!-- <div class="quiz-status-tooltip incorrect">
                                                            <div class="tooltip-box">
                                                                <div class="tooltip-top">
                                                                    <div class="status-box">
                                                                        <span class="incorrect"><i>✕</i> Incorrect</span>
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
                                                                    <h5><i>✕</i> Standing</h5>
                                                                </div>
                                                                <div class="btn-holder">
                                                                    <button type="button" class="view-all-btn">View for all students</button>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <em class="urgent"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="pending"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="incorrect"><i>✕</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="urgent"><i>✓</i>
                                                    </em></td>
                                                    <td>
                                                        <em class="pending"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>

                                                    <td>
                                                        <!-- <div class="quiz-status-tooltip incorrect">
                                                            <div class="tooltip-box">
                                                                <div class="tooltip-top">
                                                                    <div class="status-box">
                                                                        <span class="incorrect"><i>✕</i> Incorrect</span>
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
                                                                    <h5><i>✕</i> Standing</h5>
                                                                </div>
                                                                <div class="btn-holder">
                                                                    <button type="button" class="view-all-btn">View for all students</button>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <em class="urgent"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="pending"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="incorrect"><i>✕</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="urgent"><i>✓</i>
                                                    </em></td>
                                                    <td>
                                                        <em class="pending"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>

                                                    <td>
                                                        <!-- <div class="quiz-status-tooltip incorrect">
                                                            <div class="tooltip-box">
                                                                <div class="tooltip-top">
                                                                    <div class="status-box">
                                                                        <span class="incorrect"><i>✕</i> Incorrect</span>
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
                                                                    <h5><i>✕</i> Standing</h5>
                                                                </div>
                                                                <div class="btn-holder">
                                                                    <button type="button" class="view-all-btn">View for all students</button>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <em class="urgent"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="pending"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="incorrect"><i>✕</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="urgent"><i>✓</i>
                                                    </em></td>
                                                    <td>
                                                        <em class="pending"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>

                                                    <td>
                                                        <!-- <div class="quiz-status-tooltip incorrect">
                                                            <div class="tooltip-box">
                                                                <div class="tooltip-top">
                                                                    <div class="status-box">
                                                                        <span class="incorrect"><i>✕</i> Incorrect</span>
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
                                                                    <h5><i>✕</i> Standing</h5>
                                                                </div>
                                                                <div class="btn-holder">
                                                                    <button type="button" class="view-all-btn">View for all students</button>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <em class="urgent"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="pending"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="incorrect"><i>✕</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="urgent"><i>✓</i>
                                                    </em></td>
                                                    <td>
                                                        <em class="pending"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
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
                                                        <em class="urgent"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="pending"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="incorrect"><i>✕</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="urgent"><i>✓</i>
                                                    </em></td>
                                                    <td>
                                                        <em class="pending"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>

                                                    <td>
                                                        <!-- <div class="quiz-status-tooltip incorrect">
                                                            <div class="tooltip-box">
                                                                <div class="tooltip-top">
                                                                    <div class="status-box">
                                                                        <span class="incorrect"><i>✕</i> Incorrect</span>
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
                                                                    <h5><i>✕</i> Standing</h5>
                                                                </div>
                                                                <div class="btn-holder">
                                                                    <button type="button" class="view-all-btn">View for all students</button>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <em class="urgent"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="pending"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="incorrect"><i>✕</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="urgent"><i>✓</i>
                                                    </em></td>
                                                    <td>
                                                        <em class="pending"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>

                                                    <td>
                                                        <!-- <div class="quiz-status-tooltip incorrect">
                                                            <div class="tooltip-box">
                                                                <div class="tooltip-top">
                                                                    <div class="status-box">
                                                                        <span class="incorrect"><i>✕</i> Incorrect</span>
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
                                                                    <h5><i>✕</i> Standing</h5>
                                                                </div>
                                                                <div class="btn-holder">
                                                                    <button type="button" class="view-all-btn">View for all students</button>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <em class="urgent"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="pending"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="incorrect"><i>✕</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="urgent"><i>✓</i>
                                                    </em></td>
                                                    <td>
                                                        <em class="pending"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>

                                                    <td>
                                                        <!-- <div class="quiz-status-tooltip incorrect">
                                                            <div class="tooltip-box">
                                                                <div class="tooltip-top">
                                                                    <div class="status-box">
                                                                        <span class="incorrect"><i>✕</i> Incorrect</span>
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
                                                                    <h5><i>✕</i> Standing</h5>
                                                                </div>
                                                                <div class="btn-holder">
                                                                    <button type="button" class="view-all-btn">View for all students</button>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <em class="urgent"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="pending"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="incorrect"><i>✕</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="urgent"><i>✓</i>
                                                    </em></td>
                                                    <td>
                                                        <em class="pending"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>

                                                    <td>
                                                        <!-- <div class="quiz-status-tooltip incorrect">
                                                            <div class="tooltip-box">
                                                                <div class="tooltip-top">
                                                                    <div class="status-box">
                                                                        <span class="incorrect"><i>✕</i> Incorrect</span>
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
                                                                    <h5><i>✕</i> Standing</h5>
                                                                </div>
                                                                <div class="btn-holder">
                                                                    <button type="button" class="view-all-btn">View for all students</button>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <em class="urgent"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="pending"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="incorrect"><i>✕</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="urgent"><i>✓</i>
                                                    </em></td>
                                                    <td>
                                                        <em class="pending"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>

                                                    <td>
                                                        <!-- <div class="quiz-status-tooltip incorrect">
                                                            <div class="tooltip-box">
                                                                <div class="tooltip-top">
                                                                    <div class="status-box">
                                                                        <span class="incorrect"><i>✕</i> Incorrect</span>
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
                                                                    <h5><i>✕</i> Standing</h5>
                                                                </div>
                                                                <div class="btn-holder">
                                                                    <button type="button" class="view-all-btn">View for all students</button>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <em class="urgent"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="pending"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="incorrect"><i>✕</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="urgent"><i>✓</i>
                                                    </em></td>
                                                    <td>
                                                        <em class="pending"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="pending"><i>✓</i></em>
                                                    </td>
                                                    <td>
                                                        <em class="correct"><i>✓</i></em>
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
    </div>
</section>

@endsection

@push('scripts_bottom')
    <script src="/assets/default/js/overview-chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script>
    $(document).ready(function () {
        /*Circle Progress Function Start*/
        $(".circle_percent").each(function() {
            var $this = $(this),
            $dataV = $this.data("percent"),
            $dataDeg = $dataV * 3.6,
            $round = $this.find(".round_per");
            $round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)"); 
            $this.append('<div class="circle_inbox"><span class="percent_text"></span></div>');
            $this.prop('Counter', 0).animate({Counter: $dataV},
        {
            duration: 2000, 
            easing: 'swing', 
            step: function (now) {
                    $this.find(".percent_text").text(Math.ceil(now)+"%");
                }
            });
            if($dataV >= 51){
                $round.css("transform", "rotate(" + 360 + "deg)");
                setTimeout(function(){
                $this.addClass("percent_more");
                },1000);
                setTimeout(function(){
                $round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)");
                },1000);
            } 
        });
        /*Circle Progress Function End*/

        /*Overview Circle Progress Function Start*/
        $(".Overview_percent").each(function() {
            var $this = $(this),
            $dataV = $this.data("percent"),
            $dataDeg = $dataV * 3.6,
            $round = $this.find(".round_per");
            $round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)"); 
            $this.append('<div class="circle_inbox"><span class="percent_text"></span></div>');
            $this.prop('Counter', 0).animate({Counter: $dataV},
        {
            duration: 2000, 
            easing: 'swing', 
            step: function (now) {
                    $this.find(".percent_text").text(Math.ceil(now));
                }
            });
            if($dataV >= 51){
                $round.css("transform", "rotate(" + 360 + "deg)");
                setTimeout(function(){
                $this.addClass("percent_more");
                },1000);
                setTimeout(function(){
                $round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)");
                },1000);
            } 
        });
        /*Overview Circle Progress Function End*/
        $(".stats_percent").each(function() {
            var $this = $(this),
                $dataV = $this.data("percent"),
                $dataDeg = $dataV * 3.6,
                $round = $this.find(".round_per");

            $round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)"); 

            // Append circle_inbox outside of circle_percent
            $this.after('<div class="circle_inbox"><span class="percent_text"></span></div>');

            $this.prop('Counter', 0).animate({ Counter: $dataV }, {
                duration: 2000, 
                easing: 'swing', 
                step: function (now) {
                    $this.next(".circle_inbox").find(".percent_text").text(Math.ceil(now) + "%");
                }
            });

            if ($dataV >= 51) {
                $round.css("transform", "rotate(" + 360 + "deg)");
                setTimeout(function() {
                    $this.addClass("percent_more");
                }, 1000);
                setTimeout(function() {
                    $round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)");
                }, 1000);
            } 
        });

        $(function() {
            $('[data-toggle="popover"]').popover()
        })

    });
    </script>
    <script>
        const ctx = document.getElementById('statusChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [''],
                datasets: [{
                    label: 'Value',
                    data: [28],
                    backgroundColor: 'lightgreen',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y', // Makes it a horizontal bar chart
                scales: {
                    x: {
                        beginAtZero: true,
                        max: 100 // Ensure it goes up to 100
                    }
                },
                plugins: {
                    legend: {
                        display: false // Hide the legend
                    },
                    tooltip: {
                        enabled: true // Disable tooltips
                    }
                }
            }
        });
    </script>
@endpush
