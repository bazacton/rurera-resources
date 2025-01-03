@extends('admin.layouts.app')

@push('libraries_top')

@endpush

@push('styles_top')
    <link rel="stylesheet" href="/assets/default/css/quiz-create.css">
@endpush

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="section-header">
                    <h1>My Collections</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="/admin/">Dashboard</a>
                        </div>
                        <div class="breadcrumb-item">My Collections</div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="staff-picks-tabs">
                    <div class="mb-30 bg-white panel-border rounded-sm p-15">
                        <div class="rureraform-search-field mb-15">
                            <div class="input-field">
                                <input type="text" placeholder="Search question..">
                                <button type="button"><i class="fas fa-search"></i> Search questions</button>
                            </div>
                            <div class="featured-controls">
                                <button type="button" class="active">Featured List</button>
                                <button type="button">Community</button>
                                <button type="button">My Collection</button>
                            </div>
                        </div>
                        <div class="search-filters mb-0">
                            <div class="select-field">
                                <span>By:</span>
                                <select>
                                    <option value="All providers">All providers</option>
                                    <option value="All providers">All providers</option>
                                    <option value="All providers">All providers</option>
                                </select>
                            </div>
                            <div class="select-field">
                                <span>Capability:</span>
                                <select>
                                    <option value="All providers">Embeddings</option>
                                    <option value="All providers">Embeddings</option>
                                    <option value="All providers">Embeddings</option>
                                </select>
                            </div>
                            <div class="select-field">
                                <span>Tag:</span>
                                <select>
                                    <option value="All">All</option>
                                    <option value="All">All</option>
                                    <option value="All">All</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-4 col-md-4">
                            <div class="featured-list-sidebar">
                                <div class="featured-filters">
                                    <div class="text-box">
                                        <h6>Reported Oprations</h6>
                                    </div>
                                    <div class="select-field">
                                        <select>
                                            <option value="Critical">Critical</option>
                                            <option value="Critical">Critical</option>
                                            <option value="Critical">Critical</option>
                                            <option value="Critical">Critical</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="featured-list-sidebar-inner">
                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <div class="img-holder">
                                            <figure>
                                                <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                            </figure>
                                        </div>
                                        <div class="text-holder">
                                            <h3><a href="#">Sciency Science</a></h3>
                                            <div class="author-info">
                                                <span class="info-text">
                                                    <span>Kaiser K</span>
                                                    <span>2 hours ago</span>
                                                </span>
                                            </div>
                                        </div>
                                        <ul class="list-options">
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> 8 questions</li>
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> 1st-4th Grade</li>
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> Science</li>
                                        </ul>
                                    </div>
                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <div class="img-holder">
                                            <figure>
                                                <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                            </figure>
                                        </div>
                                        <div class="text-holder">
                                            <h3><a href="#">Maths Magic Adventure</a></h3>
                                            <div class="author-info">
                                                <span class="info-text">
                                                    <span>Jane D</span>
                                                    <span>5 hours ago</span>
                                                </span>
                                            </div>
                                        </div>
                                        <ul class="list-options">
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> 10 questions</li>
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> 3rd-5th Grade</li>
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> Math</li>
                                        </ul>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <div class="img-holder">
                                            <figure>
                                                <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                            </figure>
                                        </div>
                                        <div class="text-holder">
                                            <h3><a href="#">Grammar Genius Challenge</a></h3>
                                            <div class="author-info">
                                                <span class="info-text">
                                                    <span>Mark T</span>
                                                    <span>1 day ago</span>
                                                </span>
                                            </div>
                                        </div>
                                        <ul class="list-options">
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> 15 questions</li>
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> 4th-6th Grade</li>
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> English</li>
                                        </ul>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <div class="img-holder">
                                            <figure>
                                                <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                            </figure>
                                        </div>
                                        <div class="text-holder">
                                            <h3><a href="#">History Trivia Quest</a></h3>
                                            <div class="author-info">
                                                <span class="info-text">
                                                    <span>Lucy W</span>
                                                    <span>2 days ago</span>
                                                </span>
                                            </div>
                                        </div>
                                        <ul class="list-options">
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> 12 questions</li>
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> 6th-8th Grade</li>
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> History</li>
                                        </ul>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <div class="img-holder">
                                            <figure>
                                                <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                            </figure>
                                        </div>
                                        <div class="text-holder">
                                            <h3><a href="#">Artistic Impressions Puzzle</a></h3>
                                            <div class="author-info">
                                                <span class="info-text">
                                                    <span>Sara L</span>
                                                    <span>3 days ago</span>
                                                </span>
                                            </div>
                                        </div>
                                        <ul class="list-options">
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> 5 questions</li>
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> 1st-3rd Grade</li>
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> Art</li>
                                        </ul>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <div class="img-holder">
                                            <figure>
                                                <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                            </figure>
                                        </div>
                                        <div class="text-holder">
                                            <h3><a href="#">Science Exploration Mission</a></h3>
                                            <div class="author-info">
                                                <span class="info-text">
                                                    <span>Alex P</span>
                                                    <span>5 hours ago</span>
                                                </span>
                                            </div>
                                        </div>
                                        <ul class="list-options">
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> 8 questions</li>
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> 2nd-5th Grade</li>
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> Science</li>
                                        </ul>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <div class="img-holder">
                                            <figure>
                                                <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                            </figure>
                                        </div>
                                        <div class="text-holder">
                                            <h3><a href="#">Geography World Challenges</a></h3>
                                            <div class="author-info">
                                                <span class="info-text">
                                                    <span>Chris B</span>
                                                    <span>4 hours ago</span>
                                                </span>
                                            </div>
                                        </div>
                                        <ul class="list-options">
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> 6 questions</li>
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> 5th-7th Grade</li>
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> Geography</li>
                                        </ul>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <div class="img-holder">
                                            <figure>
                                                <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                            </figure>
                                        </div>
                                        <div class="text-holder">
                                            <h3><a href="#">Robotics Mind Challenges</a></h3>
                                            <div class="author-info">
                                                <span class="info-text">
                                                    <span>David H</span>
                                                    <span>8 hours ago</span>
                                                </span>
                                            </div>
                                        </div>
                                        <ul class="list-options">
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> 10 questions</li>
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> 6th-8th Grade</li>
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> Technology</li>
                                        </ul>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <div class="img-holder">
                                            <figure>
                                                <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                            </figure>
                                        </div>
                                        <div class="text-holder">
                                            <h3><a href="#">Animal Kingdom Quiz</a></h3>
                                            <div class="author-info">
                                                <span class="info-text">
                                                    <span>Ella S</span>
                                                    <span>2 hours ago</span>
                                                </span>
                                            </div>
                                        </div>
                                        <ul class="list-options">
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> 8 questions</li>
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> 1st-3rd Grade</li>
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> Biology</li>
                                        </ul>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <div class="img-holder">
                                            <figure>
                                                <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                            </figure>
                                        </div>
                                        <div class="text-holder">
                                            <h3><a href="#">Physics Wonders Challenges</a></h3>
                                            <div class="author-info">
                                                <span class="info-text">
                                                    <span>Nina F</span>
                                                    <span>6 hours ago</span>
                                                </span>
                                            </div>
                                        </div>
                                        <ul class="list-options">
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> 12 questions</li>
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> 5th-8th Grade</li>
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> Physics</li>
                                        </ul>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <div class="img-holder">
                                            <figure>
                                                <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                            </figure>
                                        </div>
                                        <div class="text-holder">
                                            <h3><a href="#">Chemistry Formula Puzzles</a></h3>
                                            <div class="author-info">
                                                <span class="info-text">
                                                    <span>Oliver K</span>
                                                    <span>3 hours ago</span>
                                                </span>
                                            </div>
                                        </div>
                                        <ul class="list-options">
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> 10 questions</li>
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> 7th-8th Grade</li>
                                            <li><span class="icon-box"><img src="/assets/default/svgs/list-view.svg" alt=""></span> Chemistry</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8 col-md-8">
                            <div class="questions-header">
                                <div class="questions-header-inner">
                                    <div class="text-holder">
                                        <h5>Exploring Magnetic Matrials and Their Uses<small>(18 questions)</small></h5>
                                    </div>
                                    <div class="questions-header-controls">
                                        <button type="button"><img src="/assets/default/svgs/plus-circle.svg" alt="">Add all 18 questions</button>
                                    </div>
                                </div>
                            </div>
                            <div class="question-layout-holder mb-35 bg-white panel-border rounded-sm p-25">
                                <div class="question-layout-block">
                                    <form class="question-fields" action="javascript:;" data-question_id="10180">
                                    <div class="left-content has-bg">
                                        <div id="rureraform-form-1" class=" rureraform-form rureraform-elements rureraform-form-input-medium rureraform-form-icon-inside rureraform-form-description-bottom ui-sortable" _data-parent="1" _data-parent-col="0" style="display: block;">
                                        <div class="question-layout row d-flex align-items-start">
                                            <div class="rureraform-col rureraform-col-12">
                                                <div class="rureraform-element quiz-group rureraform-element-html ui-sortable-handle">
                                                    <div class="question-top-info">
                                                        <div class="question-count">
                                                            <span class="icon-box"><img src="/assets/default/svgs/question-simple.svg" alt=""></span>
                                                            <span class="question-count-lable">Question 1 of 20</span>
                                                        </div>
                                                        <div class="question-info">
                                                            <span class="q-type"><img src="/assets/default/svgs/multi-choice.svg" alt="">Multiple choice</span>
                                                            <span class="q-time">Avg time</span>
                                                            <span class="q-point">1 point</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rureraform-col rureraform-col-12">
                                                <div id="rureraform-element-0" class="rureraform-element-0 rureraform-element quiz-group rureraform-element-html ui-sortable-handle" data-type="question_label">
                                                    <h4>Read the text, then answer the question.</h4>
                                                </div>
                                            </div>
                                            <div class="rureraform-col rureraform-col-12">
                                            <div id="rureraform-element-0" class="rureraform-element-0 rureraform-element quiz-group rureraform-element-html ui-sortable-handle" data-type="paragraph_quiz"> Each day, a school has a break from 10:15 am to 10:30 am and lunchtime from 12:40 pm to 1:30 pm. <div class="rureraform-element-cover"></div>
                                            </div>
                                            </div>
                                            <div class="rureraform-col rureraform-col-12">
                                            <div id="rureraform-element-0" class="rureraform-element-0 rureraform-element quiz-group rureraform-element-html ui-sortable-handle" data-type="question_label">
                                                <div class="question-label question_label">
                                                    <h6>When oxygen combines with glucose during respiration, energy and carbon dioxide are produced.</h6>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="rureraform-col rureraform-col-12">
                                            <div id="rureraform-element-24192" class="quiz-group rureraform-element-24192 rureraform-element ui-sortable-handle" data-type="checkbox">
                                                <div class="rureraform-column-label">
                                                <label class="rureraform-label">Mark two answers</label>
                                                </div>
                                                <div class="rureraform-column-input">
                                                <div class="rureraform-input">
                                                    <div class="form-box  rurera-in-row alphabet-list-style  ">
                                                    <div class="form-field rureraform-cr-container-medium ">
                                                        <input class="editor-field rureraform-checkbox-medium" data-min="2" type="checkbox" name="field-24192" id="field-24192-00-2424" value="3 hours 45 minutes">
                                                        <label for="field-24192-00-2424"> 3 hours 45 minutes </label>
                                                    </div>
                                                    <div class="form-field rureraform-cr-container-medium">
                                                        <input class="editor-field rureraform-checkbox-medium" data-min="2" type="checkbox" name="field-24192" id="field-24192-11-2424" value="4 hours 10 minutes">
                                                        <label for="field-24192-11-2424"> 4 hours 10 minutes </label>
                                                    </div>
                                                    <div class="form-field rureraform-cr-container-medium correct">
                                                        <input class="editor-field rureraform-checkbox-medium" data-min="2" type="checkbox" name="field-24192" id="field-24192-22-2424" value="3 hours 30 minutes">
                                                        <label for="field-24192-22-2424"> 3 hours 30 minutes </label>
                                                    </div>
                                                    <div class="form-field rureraform-cr-container-medium wrong">
                                                        <input class="editor-field rureraform-checkbox-medium" data-min="2" type="checkbox" name="field-24192" id="field-24192-33-2424" value="4 hours 35 minutes">
                                                        <label for="field-24192-33-2424"> 4 hours 35 minutes </label>
                                                    </div>
                                                    <div class="form-field rureraform-cr-container-medium">
                                                        <input class="editor-field rureraform-checkbox-medium" data-min="2" type="checkbox" name="field-24192" id="field-24192-44-2424" value="4 hours">
                                                        <label for="field-24192-44-2424"> 4 hours </label>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <div class="view-explanation">
                                    <div class="explanation-controls d-flex align-items-center">
                                        <button class="collapsed" type="button" data-toggle="collapse" data-target="#explanation-list1" aria-expanded="false" aria-controls="explanation-list">
                                            <i class="fas fa-plus"></i> Explanation
                                        </button>
                                    </div>
                                    <div class="collapse" id="explanation-list1">
                                        <div class="explanation-text-holder">
                                            <p>Each day, a school has a break from 10:15 am to 10:30 am and lunchtime from 12:40 pm to 1:30 pm.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-35 bg-white panel-border rounded-sm p-25">
                                <div class="question-layout-block">
                                    <form class="question-fields" action="javascript:;" data-question_id="10180">
                                        <div class="left-content has-bg">
                                        <span class="question-number-holder" style="z-index: 999999999;">
                                            <span class="question-number">1</span>
                                        </span>
                                        <div id="rureraform-form-1" class=" rureraform-form rureraform-elements rureraform-form-input-medium rureraform-form-icon-inside rureraform-form-description-bottom ui-sortable" _data-parent="1" _data-parent-col="0" style="display: block;">
                                            <div class="question-layout row d-flex align-items-start">
                                            <div class="rureraform-col rureraform-col-12">
                                                <div class="rureraform-element quiz-group rureraform-element-html ui-sortable-handle">
                                                    <div class="question-top-info">
                                                        <div class="question-count">
                                                            <span class="icon-box"><img src="/assets/default/svgs/question-simple.svg" alt=""></span>
                                                            <span class="question-count-lable">Question 1 of 20</span>
                                                        </div>
                                                        <div class="question-info">
                                                            <span class="q-type"><img src="/assets/default/svgs/multi-choice.svg" alt="">Multiple choice</span>
                                                            <span class="q-time">Avg time</span>
                                                            <span class="q-point">1 point</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rureraform-col rureraform-col-12">
                                                <div id="rureraform-element-0" class="rureraform-element-0 rureraform-element quiz-group rureraform-element-html ui-sortable-handle" data-type="question_label">
                                                    <h4>Mark the following true and false:</h4>
                                                </div>
                                            </div>
                                            <div class="rureraform-col rureraform-col-8">
                                                <div id="rureraform-element-0" class="rureraform-element-0 rureraform-element quiz-group rureraform-element-html ui-sortable-handle" data-type="question_label">
                                                <h6>When oxygen combines with glucose during respiration, energy and carbon dioxide are produced.</h6>
                                                </div>
                                                <div id="rureraform-element-0" class="rureraform-element-0 rureraform-element quiz-group rureraform-element-html ui-sortable-handle" data-type="paragraph_quiz">
                                                <i>Hint:&nbsp;&nbsp;Think about what happens inside cells during respiration and what is released.</i>
                                                <div class="rureraform-element-cover"></div>
                                                </div>
                                            </div>
                                            <div class="rureraform-col rureraform-col-4">
                                                <div id="rureraform-element-1" class="quiz-group draggable3 rureraform-element-1 rureraform-element rureraform-element-label-undefined rureraform-element-description-undefined ui-sortable-handle" data-type="checkbox">
                                                <div class="rureraform-column-input">
                                                    <div class="rureraform-input rureraform-cr-layout rureraform-cr-layout">
                                                    <div class="form-box ">
                                                        <div class="lms-radio-select rurera-in-row justify-content-end">
                                                        <div class="form-field rureraform-cr-container-medium rureraform-cr-container-undefined wrong">
                                                            <input class="editor-field" type="radio" name="field-40008" id="field-40008-0" value="True">
                                                            <label for="field-40008-0">
                                                            <span class="inner-label">True</span>
                                                            </label>
                                                        </div>
                                                        <div class="form-field rureraform-cr-container-medium rureraform-cr-container-undefined correct">
                                                            <input class="editor-field" type="radio" name="field-40008" id="field-40008-1" value="False">
                                                            <label for="field-40008-1">
                                                            <span class="inner-label">False</span>
                                                            </label>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <label class="rureraform-description"></label>
                                                </div>
                                                <div class="rureraform-element-cover"></div>
                                                </div>
                                            </div>
                                            <div class="rureraform-col rureraform-col-8">
                                                <div id="rureraform-element-0" class="rureraform-element-0 rureraform-element quiz-group rureraform-element-html ui-sortable-handle" data-type="question_label">
                                                <h6>When balanced forces act on an object, it remains stationary or continues moving at the same speed.</h6>
                                                </div>
                                                <div id="rureraform-element-0" class="rureraform-element-0 rureraform-element quiz-group rureraform-element-html ui-sortable-handle" data-type="paragraph_quiz">
                                                <i>Hint:&nbsp;&nbsp;Balanced forces cancel each other out, meaning no change in motion happens.</i>
                                                <div class="rureraform-element-cover"></div>
                                                </div>
                                            </div>
                                            <div class="rureraform-col rureraform-col-4">
                                                <div id="rureraform-element-1" class="quiz-group draggable3 rureraform-element-1 rureraform-element rureraform-element-label-undefined rureraform-element-description-undefined ui-sortable-handle" data-type="checkbox">
                                                <div class="rureraform-column-input">
                                                    <div class="rureraform-input rureraform-cr-layout rureraform-cr-layout">
                                                    <div class="form-box ">
                                                        <div class="lms-radio-select rurera-in-row justify-content-end">
                                                        <div class="form-field rureraform-cr-container-medium rureraform-cr-container-undefined">
                                                            <input class="editor-field" type="radio" name="field-84793" id="field-84793-0" value="True">
                                                            <label for="field-84793-0">
                                                            <span class="inner-label">True</span>
                                                            </label>
                                                        </div>
                                                        <div class="form-field rureraform-cr-container-medium rureraform-cr-container-undefined">
                                                            <input class="editor-field" type="radio" name="field-84793" id="field-84793-1" value="False">
                                                            <label for="field-84793-1">
                                                            <span class="inner-label">False</span>
                                                            </label>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <label class="rureraform-description"></label>
                                                </div>
                                                <div class="rureraform-element-cover"></div>
                                                </div>
                                            </div>
                                            <div class="rureraform-col rureraform-col-8">
                                                <div id="rureraform-element-0" class="rureraform-element-0 rureraform-element quiz-group rureraform-element-html ui-sortable-handle" data-type="question_label">
                                                <h6>When an endothermic reaction occurs, energy is absorbed, making the surroundings cooler.</h6>
                                                </div>
                                                <div id="rureraform-element-0" class="rureraform-element-0 rureraform-element quiz-group rureraform-element-html ui-sortable-handle" data-type="paragraph_quiz">
                                                <i>Hint:&nbsp;&nbsp;Endothermic reactions pull in heat from the surroundings.</i>
                                                <div class="rureraform-element-cover"></div>
                                                </div>
                                            </div>
                                            <div class="rureraform-col rureraform-col-4">
                                                <div id="rureraform-element-1" class="quiz-group draggable3 rureraform-element-1 rureraform-element rureraform-element-label-undefined rureraform-element-description-undefined ui-sortable-handle" data-type="checkbox">
                                                <div class="rureraform-column-input">
                                                    <div class="rureraform-input rureraform-cr-layout rureraform-cr-layout">
                                                    <div class="form-box ">
                                                        <div class="lms-radio-select rurera-in-row justify-content-end">
                                                        <div class="form-field rureraform-cr-container-medium rureraform-cr-container-undefined">
                                                            <input class="editor-field" type="radio" name="field-21459" id="field-21459-0" value="True">
                                                            <label for="field-21459-0">
                                                            <span class="inner-label">True</span>
                                                            </label>
                                                        </div>
                                                        <div class="form-field rureraform-cr-container-medium rureraform-cr-container-undefined">
                                                            <input class="editor-field" type="radio" name="field-21459" id="field-21459-1" value="False">
                                                            <label for="field-21459-1">
                                                            <span class="inner-label">False</span>
                                                            </label>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <label class="rureraform-description"></label>
                                                </div>
                                                <div class="rureraform-element-cover"></div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="view-explanation">
                                    <div class="explanation-controls d-flex align-items-center">
                                        <button class="collapsed" type="button" data-toggle="collapse" data-target="#explanation-list2" aria-expanded="false" aria-controls="explanation-list">
                                            <i class="fas fa-plus"></i> Explanation
                                        </button>
                                    </div>
                                    <div class="collapse" id="explanation-list2">
                                        <div class="explanation-text-holder">
                                            <p>Each day, a school has a break from 10:15 am to 10:30 am and lunchtime from 12:40 pm to 1:30 pm.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-15 bg-white panel-border rounded-sm p-25">
                                <div class="question-layout-block">
                                    <form class="question-fields" action="javascript:;" data-question_id="10180">
                                        <div class="left-content has-bg">
                                        <span class="question-number-holder" style="z-index: 999999999;">
                                            <span class="question-number">1</span>
                                        </span>
                                        <div id="rureraform-form-1" class=" rureraform-form rureraform-elements rureraform-form-input-medium rureraform-form-icon-inside rureraform-form-description-bottom ui-sortable" _data-parent="1" _data-parent-col="0" style="display: block;">
                                            <div class="question-layout row d-flex align-items-start">
                                            <div class="rureraform-col rureraform-col-12">
                                                <div id="rureraform-element-0" class="rureraform-element-0 rureraform-element quiz-group rureraform-element-html ui-sortable-handle" data-type="question_label">
                                                    <h4>Read the text and choose the correct answer.</h4>
                                                </div>
                                            </div>
                                            <div class="rureraform-col rureraform-col-12">
                                                <div id="rureraform-element-0" class="rureraform-element-0 rureraform-element quiz-group rureraform-element-html ui-sortable-handle" data-type="drop_and_text"> When <select type="inner_dropdown" class="editor-field" id="dropdown-1" data-identifier="49226" name="field-dropdown1_options">
                                                    <option value="Select Option">Select Option</option>
                                                    <option value="lava">lava</option>
                                                    <option value="extrusive">extrusive</option>
                                                    <option value="magma">magma</option>
                                                </select> cools below the Earth's surface, it forms <select type="inner_dropdown" class="editor-field" id="dropdown-2" data-identifier="49226" name="field-dropdown2_options">
                                                    <option value="Select Option">Select Option</option>
                                                    <option value="water">water</option>
                                                    <option value="extrusive">extrusive</option>
                                                    <option value="sedimentary">sedimentary</option>
                                                    <option value="magma">magma</option>
                                                </select> igneous rocks with large crystals. <div class="rureraform-element-cover"></div>
                                                </div>
                                            </div>
                                            <div class="rureraform-col rureraform-col-12">
                                                <div id="rureraform-element-0" class="rureraform-element-0 rureraform-element quiz-group rureraform-element-html ui-sortable-handle" data-type="paragraph_quiz">
                                                <p>
                                                    <i>Hint: Think about the Moon’s effect on Earth, especially on tides and sunlight.</i>
                                                </p>
                                                <div class="rureraform-element-cover"></div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="view-explanation">
                                    <div class="explanation-controls d-flex align-items-center">
                                        <button class="collapsed" type="button" data-toggle="collapse" data-target="#explanation-list3" aria-expanded="false" aria-controls="explanation-list">
                                            <i class="fas fa-plus"></i> Explanation
                                        </button>
                                    </div>
                                    <div class="collapse" id="explanation-list3">
                                        <div class="explanation-text-holder">
                                            <p>Each day, a school has a break from 10:15 am to 10:30 am and lunchtime from 12:40 pm to 1:30 pm.</p>
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
$(document).ready(function () {

    const $scrollableDiv = $(".featured-list-sidebar-inner");
    // Initialize NiceScroll with auto-hide enabled
    $scrollableDiv.niceScroll({
        cursorcolor: "red",
        cursorwidth: "8px",
        autohidemode: true // Auto-hide enabled initially
    });

});
</script>
@endpush
