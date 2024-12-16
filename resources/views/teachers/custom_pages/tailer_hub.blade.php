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
            <div class="col-12 col-md-9 col-lg-9 mx-auto">
                <div class="d-flex align-items-center justify-content-between flex-wrap mb-20">
                    <div class="section-header mb-0 pb-0">
                        <h1>Tailer Hub <button class="setting-btn" type="button" data-toggle="tooltip" data-placement="top" title="Settings"><img src="/assets/default/svgs/settings.svg" alt=""></button></h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="/admin/">Dashboard</a>
                            </div>
                            <div class="breadcrumb-item">Tailer Hub</div>
                        </div>
                    </div>
                    <div class="page-controls">
                        <button type="button" class="preview-btn"><img src="/assets/default/svgs/eye-show.svg" alt=""> Preview</button>
                        <button type="button" class="publish-btn"><img src="/assets/default/svgs/publish.svg" alt=""> Publish</button>
                    </div>
                    <div class="quiz-data-slide">
                        <div class="quiz-data-slide-inner">
                            <div class="slide-controls">
                                <button type="button" class="close-btn">
                                    <span>×</span>
                                </button>
                            </div>
                            <div class="setup-quiz-body mb-20">
                                <div class="setup-quiz-card mb-30 bg-white panel-border rounded-sm">
                                    <div class="setup-quiz-header mb-15 p-20">
                                        <h3>Set up your quiz</h3>
                                    </div>
                                    <div class="setup-quiz-content px-20 mb-25">
                                        <div class="content-heading d-flex align-items-center justify-content-between mb-25">
                                            <h4 class="font-weight-600 font-16 mb-0">Set a start time for activity</h4>
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
                                            <h4 class="font-weight-600 font-16 mb-1">Set a start time for activity</h4>
                                            <span class="d-block">The number of times a student can attempt the activity.</span>
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
                                                <h4 class="font-weight-600 font-16 mb-1">Assign to a class <span>(optional)</span></h4>
                                                <span class="d-block">You have 1 class</span>
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
                                                <h4 class="font-weight-600 font-16 mb-1">Mastery mode</h4>
                                                <span class="d-block">Achieve mastery by allowing students to reattempt incorrect awensors <br> till they reach the set goal</span>
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
                                                <h4 class="font-weight-600 font-16 mb-1">Redemption questions</h4>
                                                <span class="d-block">Allow students to reattemt a few incorrect questions.</span>
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
                                                <h4 class="font-weight-600 font-16 mb-1">Redemption quiz</h4>
                                                <span class="d-block">Allow students to awensor all incorrect questions at the end to improve accuracy.</span>
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
                                            <h4 class="font-weight-600 font-16 mb-1">Adaptive Question Bank Mode</h4>
                                            <span class="d-block">Creates distince set of questions for every quiz attempt. <a href="#">See how it works</a></span>
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
                </div>
                <div class="mb-30 bg-white panel-border rounded-sm p-15">
                    <h6 class="search-lable">Search question from library</h6>
                    <div class="rureraform-search-field">
                        <div class="input-field">
                            <input type="text" placeholder="Search question..">
                            <button type="button"><i class="fas fa-search"></i> Search questions</button>
                        </div>
                        <div class="search-option-btn">
                            <span class="search-or-lable">Or</span>
                            <button type="button"><i class="fas fa-plus"></i> Add question</button>
                        </div>
                    </div>
                </div>
                <div class="quiz-ai-box mb-30 bg-white panel-border rounded-sm p-15">
                    <h6 class="search-lable">Enhance this quiz using AI</h6>
                </div>
                <div class="quiz-setup-listings">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="quiz-layout-edit-options">
                                <div class="edit-options-right">
                                    <div class="edit-options-controls">
                                        <button type="button" class="arrow-up-btn" data-toggle="tooltip" data-placement="top" title="Move up"><img src="/assets/default/svgs/arrow-up-btn.svg" alt=""></button>
                                        <button type="button" class="arrow-down-btn" data-toggle="tooltip" data-placement="top" title="Move down"><img src="/assets/default/svgs/arrow-down-btn.svg" alt=""></button>

                                        <!-- <button type="button" class="show-btn" data-toggle="tooltip" data-placement="top" title="Show/Hide question">
                                            <img class="show-img" src="/assets/default/svgs/eye-show.svg" alt="">
                                            <img class="hide-img" src="/assets/default/svgs/eye-off.svg" alt="">
                                        </button> -->

                                        <button type="button" class="copy-btn" data-toggle="tooltip" data-placement="top" title="Duplicate question"><img src="/assets/default/svgs/copy-btn.svg" alt=""></button>
                                        <button type="button" class="delete-btn" data-toggle="tooltip" data-placement="top" title="Trash"><img src="/assets/default/svgs/trash-bin.svg" alt=""></button>
                                        <div class="dropdown" data-toggle="tooltip" data-placement="top" title="Ask Ai">
                                            <button class="btn btn-link dropdown-toggle stars-btn" type="button" title="Stars" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="/assets/default/svgs/stars-colord.svg" alt="">
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                <ul>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/stars-colord.svg" alt=""> Add a similar question</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Turn into</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-lock"></i> Add explanation</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><i class="fa fa-archive"></i> Fix grammatical and spelling</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item text-danger" href="#"><i class="fa fa-trash"></i> Replace with a similar question</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><i class="fa fa-archive"></i> Reduce options</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Write custom prompt</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question-layout-holder mb-15 bg-white panel-border rounded-sm p-25">
                                <div class="question-layout-block">
                                    <form class="question-fields" action="javascript:;" data-question_id="10180">
                                    <div class="left-content has-bg">
                                        <div id="rureraform-form-1" class=" rureraform-form rureraform-elements rureraform-form-input-medium rureraform-form-icon-inside rureraform-form-description-bottom ui-sortable" _data-parent="1" _data-parent-col="0" style="display: block;">
                                        <div class="question-layout row d-flex align-items-start">
                                            <div class="rureraform-col rureraform-col-12">
                                                <div class="rureraform-element quiz-group rureraform-element-html ui-sortable-handle">
                                                    <div class="question-top-info">
                                                        <div class="question-count">
                                                            <span class="icon-box"><i></i></span>
                                                            <span class="question-count-lable">Question 1 of 20</span>
                                                        </div>
                                                        <div class="question-info">
                                                            <span class="q-type">Multiple choice</span>
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
                                                    <div class="form-field rureraform-cr-container-medium">
                                                        <input class="editor-field rureraform-checkbox-medium" data-min="2" type="checkbox" name="field-24192" id="field-24192-00-2424" value="3 hours 45 minutes">
                                                        <label for="field-24192-00-2424"> 3 hours 45 minutes </label>
                                                    </div>
                                                    <div class="form-field rureraform-cr-container-medium">
                                                        <input class="editor-field rureraform-checkbox-medium" data-min="2" type="checkbox" name="field-24192" id="field-24192-11-2424" value="4 hours 10 minutes">
                                                        <label for="field-24192-11-2424"> 4 hours 10 minutes </label>
                                                    </div>
                                                    <div class="form-field rureraform-cr-container-medium">
                                                        <input class="editor-field rureraform-checkbox-medium" data-min="2" type="checkbox" name="field-24192" id="field-24192-22-2424" value="3 hours 30 minutes">
                                                        <label for="field-24192-22-2424"> 3 hours 30 minutes </label>
                                                    </div>
                                                    <div class="form-field rureraform-cr-container-medium">
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
                                        <button class="collapsed" type="button" data-toggle="collapse" data-target="#explanation-list" aria-expanded="false" aria-controls="explanation-list">
                                            View Explanation
                                        </button>
                                    </div>
                                    <div class="collapse" id="explanation-list">
                                        <ul class="mt-10">
                                            <li>1. Lorem ipsum dolor sit amet consectetur adipiscing elit.</li>
                                            <li>2. Pellentesque nec est gravida eleifend turpis vsodales tortor.</li>
                                            <li>3. Vivamus dapibus nunc necm consectetur lacinia.</li>
                                            <li>4. Phasellus non turpis dignissim mattis tellus nec malesuada.</li>
                                            <li>5. Pellentesque efficitur erat in interdum viverra.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="listing-dropdown">
                                <div class="btn-holder">
                                    <button class="" data-toggle="modal" data-target="#templatesleModal"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="quiz-layout-edit-options">
                                <div class="edit-options-right">
                                    <div class="edit-options-controls">
                                        <button type="button" class="arrow-up-btn" data-toggle="tooltip" data-placement="top" title="Move up"><img src="/assets/default/svgs/arrow-up-btn.svg" alt=""></button>
                                        <button type="button" class="arrow-down-btn" data-toggle="tooltip" data-placement="top" title="Move down"><img src="/assets/default/svgs/arrow-down-btn.svg" alt=""></button>

                                        <button type="button" class="show-btn" data-toggle="tooltip" data-placement="top" title="Show/Hide question">
                                            <img class="show-img" src="/assets/default/svgs/eye-show.svg" alt="">
                                            <img class="hide-img" src="/assets/default/svgs/eye-off.svg" alt="">
                                        </button>

                                        <button type="button" class="copy-btn" data-toggle="tooltip" data-placement="top" title="Duplicate question"><img src="/assets/default/svgs/copy-btn.svg" alt=""></button>
                                        <button type="button" class="delete-btn" data-toggle="tooltip" data-placement="top" title="Trash"><img src="/assets/default/svgs/trash-bin.svg" alt=""></button>
                                        <button type="button" class="crown-btn" data-toggle="tooltip" data-placement="top" title="Crown"><img src="/assets/default/svgs/crown-btn.svg" alt=""></button>
                                        <button type="button" class="stars-btn" data-toggle="tooltip" data-placement="top" title="Stars"><img src="/assets/default/svgs/stars-new.svg" alt=""></button>
                                        <button type="button" class="add-btn" data-toggle="tooltip" data-placement="top" title="Add question"><img src="/assets/default/svgs/add-btn.svg" alt=""></button>
                                        <div class="dropdown">
                                            <button class="btn btn-link text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Shorten</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Rewrite</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-lock"></i> More fun</a>
                                                <a class="dropdown-item" href="#"><i class="fa fa-archive"></i> More formal</a>
                                                <a class="dropdown-item text-danger" href="#"><i class="fa fa-trash"></i> Sprinkle fairy dust</a>
                                                <a class="dropdown-item" href="#"><i class="fa fa-archive"></i> Change voice</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Fix spelling</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Custom prompt...</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-35 bg-white panel-border rounded-sm p-25">
                                <div class="question-layout-block">
                                    <form class="question-fields" action="javascript:;" data-question_id="10180">
                                        <div class="left-content has-bg">
                                        <span class="questions-total-holder d-block mb-10">
                                            <span class="question-dev-details">(34328) (Emerging) (truefalse_quiz)</span>
                                        </span>
                                        <span class="question-number-holder" style="z-index: 999999999;">
                                            <span class="question-number">1</span>
                                        </span>
                                        <div id="rureraform-form-1" class=" rureraform-form rureraform-elements rureraform-form-input-medium rureraform-form-icon-inside rureraform-form-description-bottom ui-sortable" _data-parent="1" _data-parent-col="0" style="display: block;">
                                            <div class="question-layout row d-flex align-items-start">
                                            <div class="rureraform-col rureraform-col-12">
                                                <div class="rureraform-element quiz-group rureraform-element-html ui-sortable-handle">
                                                    <div class="question-top-info">
                                                        <div class="question-count">
                                                            <span class="icon-box"><i></i></span>
                                                            <span class="question-count-lable">Question 1 of 20</span>
                                                        </div>
                                                        <div class="question-info">
                                                            <span class="q-type">Multiple choice</span>
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
                                                        <div class="form-field rureraform-cr-container-medium rureraform-cr-container-undefined">
                                                            <input class="editor-field" type="radio" name="field-40008" id="field-40008-0" value="True">
                                                            <label for="field-40008-0">
                                                            <span class="inner-label">True</span>
                                                            </label>
                                                        </div>
                                                        <div class="form-field rureraform-cr-container-medium rureraform-cr-container-undefined">
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
                                            View Explanation
                                        </button>
                                    </div>
                                    <div class="collapse" id="explanation-list2" style="">
                                        <ul class="mt-10">
                                            <li>1. Lorem ipsum dolor sit amet consectetur adipiscing elit.</li>
                                            <li>2. Pellentesque nec est gravida eleifend turpis vsodales tortor.</li>
                                            <li>3. Vivamus dapibus nunc necm consectetur lacinia.</li>
                                            <li>4. Phasellus non turpis dignissim mattis tellus nec malesuada.</li>
                                            <li>5. Pellentesque efficitur erat in interdum viverra.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="quiz-layout-edit-options">
                                <div class="edit-options-right">
                                    <div class="edit-options-controls">
                                        <button type="button" class="arrow-up-btn" data-toggle="tooltip" data-placement="top" title="Move up"><img src="/assets/default/svgs/arrow-up-btn.svg" alt=""></button>
                                        <button type="button" class="arrow-down-btn" data-toggle="tooltip" data-placement="top" title="Move down"><img src="/assets/default/svgs/arrow-down-btn.svg" alt=""></button>

                                        <button type="button" class="show-btn" data-toggle="tooltip" data-placement="top" title="Show/Hide question">
                                            <img class="show-img" src="/assets/default/svgs/eye-show.svg" alt="">
                                            <img class="hide-img" src="/assets/default/svgs/eye-off.svg" alt="">
                                        </button>

                                        <button type="button" class="copy-btn" data-toggle="tooltip" data-placement="top" title="Duplicate question"><img src="/assets/default/svgs/copy-btn.svg" alt=""></button>
                                        <button type="button" class="delete-btn" data-toggle="tooltip" data-placement="top" title="Trash"><img src="/assets/default/svgs/trash-bin.svg" alt=""></button>
                                        <button type="button" class="crown-btn" data-toggle="tooltip" data-placement="top" title="Crown"><img src="/assets/default/svgs/crown-btn.svg" alt=""></button>
                                        <button type="button" class="stars-btn" data-toggle="tooltip" data-placement="top" title="Stars"><img src="/assets/default/svgs/stars-new.svg" alt=""></button>
                                        <button type="button" class="add-btn" data-toggle="tooltip" data-placement="top" title="Add question"><img src="/assets/default/svgs/add-btn.svg" alt=""></button>
                                        <div class="dropdown">
                                            <button class="btn btn-link text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Shorten</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Rewrite</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-lock"></i> More fun</a>
                                                <a class="dropdown-item" href="#"><i class="fa fa-archive"></i> More formal</a>
                                                <a class="dropdown-item text-danger" href="#"><i class="fa fa-trash"></i> Sprinkle fairy dust</a>
                                                <a class="dropdown-item" href="#"><i class="fa fa-archive"></i> Change voice</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Fix spelling</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Custom prompt...</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-15 bg-white panel-border rounded-sm p-25">
                                <div class="question-layout-block">
                                    <form class="question-fields" action="javascript:;" data-question_id="10180">
                                        <div class="left-content has-bg">
                                        <span class="questions-total-holder d-block mb-10">
                                            <span class="question-dev-details">(22300) (Expected) (drop_and_text)</span>
                                        </span>
                                        <span class="question-number-holder" style="z-index: 999999999;">
                                            <span class="question-number">1</span>
                                        </span>
                                        <div id="rureraform-form-1" class=" rureraform-form rureraform-elements rureraform-form-input-medium rureraform-form-icon-inside rureraform-form-description-bottom ui-sortable" _data-parent="1" _data-parent-col="0" style="display: block;">
                                            <div class="question-layout row d-flex align-items-start">
                                            <div class="rureraform-col rureraform-col-12">
                                                <div class="rureraform-element quiz-group rureraform-element-html ui-sortable-handle">
                                                    <div class="question-top-info">
                                                        <div class="question-count">
                                                            <span class="icon-box"><i></i></span>
                                                            <span class="question-count-lable">Question 1 of 20</span>
                                                        </div>
                                                        <div class="question-info">
                                                            <span class="q-type">Multiple choice</span>
                                                            <span class="q-time">Avg time</span>
                                                            <span class="q-point">1 point</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                            View Explanation
                                        </button>
                                    </div>
                                    <div class="collapse" id="explanation-list3" style="">
                                        <ul class="mt-10">
                                            <li>1. Lorem ipsum dolor sit amet consectetur adipiscing elit.</li>
                                            <li>2. Pellentesque nec est gravida eleifend turpis vsodales tortor.</li>
                                            <li>3. Vivamus dapibus nunc necm consectetur lacinia.</li>
                                            <li>4. Phasellus non turpis dignissim mattis tellus nec malesuada.</li>
                                            <li>5. Pellentesque efficitur erat in interdum viverra.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade question_templates_modal" id="templatesleModal" tabindex="-1" aria-labelledby="templatesleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="question-ai-tabs">
                    <div class="nav-tabs-holder">
                        <h1>The <span>Ultimate</span> No-Code Quiz Maker</h1>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="false">Blank Canvas</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="q-collections-tab" data-toggle="tab" data-target="#q-collections" type="button" role="tab" aria-controls="q-collections" aria-selected="true">Collections</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Generate with AI</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="import-tab" data-toggle="tab" data-target="#import-q" type="button" role="tab" aria-controls="import-q" aria-selected="false">Import Questions</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="collection-tab" data-toggle="tab" data-target="#collection" type="button" role="tab" aria-controls="collection" aria-selected="false">My Collection</button>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h6>Or select a question type to add question</h6>
                            <div class="question_templates-holder">
                                <ul class="question_templates">
                                    <li data-type="question_templates" data-option="multichoice_template" data-elements="question_label_multichoice_template,paragraph_multichoice_template,radio">
                                        <span class="templates-lable">Multiple Templates</span>
                                        <a href="#" data-title="Questions Templates">
                                            <img src="/store/1/tool-images/d1.png" alt=""> Multiple Choice 
                                            <div class="templete-hover-element">
                                                <div class="hover-box">
                                                    <div class="img-holder"></div>
                                                    <div class="text-holder">
                                                        <h6>Multiple Choice</h6>
                                                        <p>Check for retention by asking students to pick one or more correct answers. Use text, images, or math questions to spice things up!</p>
                                                        <span class="text-lable"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" data-title="Questions Templates">
                                            <img src="/store/1/tool-images/d2.png" alt=""> Multiple Response
                                            <div class="templete-hover-element">
                                                <div class="hover-box">
                                                    <div class="img-holder"></div>
                                                    <div class="text-holder">
                                                        <h6>Multiple Response</h6>
                                                        <p>Check for retention by asking students to pick one or more correct answers. Use text, images, or math questions to spice things up!</p>
                                                        <span class="text-lable">Auto-graded</span>
                                                    </div>
                                                </div>
                                            </div> 
                                        </a>
                                    </li>
                                    <li data-type="question_templates" data-option="true_false_template" data-elements="question_label_true_false,question_label_paragraph,truefalse_quiz">
                                        <span class="templates-lable">Multiple Templates</span>    
                                        <a href="#" data-title="Questions Templates">
                                        <img src="/store/1/tool-images/d3.png" alt=""> True/False </a>
                                        <a href="#" data-title="Questions Templates">
                                        <img src="/store/1/tool-images/d4.png" alt=""> Short Answer </a>
                                        <a href="#" data-title="Questions Templates">
                                        <img src="/store/1/tool-images/d5.png" alt=""> Numeric </a>
                                        <a href="#" data-title="Questions Templates">
                                        <img src="/store/1/tool-images/d6.png" alt=""> Sequence </a>
                                    </li>
                                    <li data-type="question_templates" data-option="matching_template" data-elements="question_label_matching_template,match_quiz">
                                        <span class="templates-lable">Multiple Templates</span>    
                                        <a href="#" data-title="Questions Templates">
                                        <img src="/store/1/tool-images/d7.png" alt=""> Matching </a>
                                        <a href="#" data-title="Questions Templates">
                                        <img src="/store/1/tool-images/d8.png" alt=""> Fill in the Blanks </a>
                                        <a href="#" data-title="Questions Templates">
                                        <img src="/store/1/tool-images/d9.png" alt=""> Select from Lists </a>
                                        <a href="#" data-title="Questions Templates">
                                        <img src="/store/1/tool-images/d10.png" alt=""> Drag the Words </a>
                                        <a href="#" data-title="Questions Templates">
                                        <img src="/store/1/tool-images/d11.png" alt=""> Hotspot </a>
                                        <a href="#" data-title="Questions Templates">
                                        <img src="/store/1/tool-images/d12.png" alt=""> Drag and Drop </a>
                                    </li>
                                
                                    <li data-type="question_templates" data-option="likert_template" data-elements="question_label">
                                        <span class="templates-lable">Multiple Templates</span>
                                        <a href="#" data-title="Questions Templates">
                                        <img src="/store/1/tool-images/d13.png" alt=""> Likert Scale </a>
                                        <a href="#" data-title="Questions Templates">
                                        <img src="/store/1/tool-images/d14.png" alt=""> Essay </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade active show" id="q-collections" role="tabpanel" aria-labelledby="q-collections-tab">
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
                                        <div class="quiz-layout-edit-options">
                                            <div class="edit-options-right">
                                                <div class="edit-options-controls">
                                                    <button type="button" class="arrow-up-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move up"><img src="/assets/default/svgs/arrow-up-btn.svg" alt=""></button>
                                                    <button type="button" class="arrow-down-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move down"><img src="/assets/default/svgs/arrow-down-btn.svg" alt=""></button>

                                                    <button type="button" class="show-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show/Hide question">
                                                        <img class="show-img" src="/assets/default/svgs/eye-show.svg" alt="">
                                                        <img class="hide-img" src="/assets/default/svgs/eye-off.svg" alt="">
                                                    </button>

                                                    <button type="button" class="copy-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Duplicate question"><img src="/assets/default/svgs/copy-btn.svg" alt=""></button>
                                                    <button type="button" class="delete-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Trash"><img src="/assets/default/svgs/trash-bin.svg" alt=""></button>
                                                    <button type="button" class="crown-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Crown"><img src="/assets/default/svgs/crown-btn.svg" alt=""></button>
                                                    <button type="button" class="stars-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Stars"><img src="/assets/default/svgs/stars-new.svg" alt=""></button>
                                                    <button type="button" class="add-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add question"><img src="/assets/default/svgs/add-btn.svg" alt=""></button>
                                                    <div class="dropdown">
                                                        <button class="btn btn-link text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Shorten</a>
                                                            <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Rewrite</a>
                                                            <a class="dropdown-item" href="#"><i class="fas fa-lock"></i> More fun</a>
                                                            <a class="dropdown-item" href="#"><i class="fa fa-archive"></i> More formal</a>
                                                            <a class="dropdown-item text-danger" href="#"><i class="fa fa-trash"></i> Sprinkle fairy dust</a>
                                                            <a class="dropdown-item" href="#"><i class="fa fa-archive"></i> Change voice</a>
                                                            <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Fix spelling</a>
                                                            <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Custom prompt...</a>
                                                        </div>
                                                    </div>
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
                                                                        <span class="icon-box"><i></i></span>
                                                                        <span class="question-count-lable">Question 1 of 20</span>
                                                                    </div>
                                                                    <div class="question-info">
                                                                        <span class="q-type">Multiple choice</span>
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
                                                                <div class="form-field rureraform-cr-container-medium">
                                                                    <input class="editor-field rureraform-checkbox-medium" data-min="2" type="checkbox" name="field-24192" id="field-24192-00-2424" value="3 hours 45 minutes">
                                                                    <label for="field-24192-00-2424"> 3 hours 45 minutes </label>
                                                                </div>
                                                                <div class="form-field rureraform-cr-container-medium">
                                                                    <input class="editor-field rureraform-checkbox-medium" data-min="2" type="checkbox" name="field-24192" id="field-24192-11-2424" value="4 hours 10 minutes">
                                                                    <label for="field-24192-11-2424"> 4 hours 10 minutes </label>
                                                                </div>
                                                                <div class="form-field rureraform-cr-container-medium">
                                                                    <input class="editor-field rureraform-checkbox-medium" data-min="2" type="checkbox" name="field-24192" id="field-24192-22-2424" value="3 hours 30 minutes">
                                                                    <label for="field-24192-22-2424"> 3 hours 30 minutes </label>
                                                                </div>
                                                                <div class="form-field rureraform-cr-container-medium">
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
                                                    <button class="collapsed" type="button" data-toggle="collapse" data-target="#explanation-list" aria-expanded="false" aria-controls="explanation-list">
                                                        View Explanation
                                                    </button>
                                                </div>
                                                <div class="collapse" id="explanation-list">
                                                    <ul class="mt-10">
                                                        <li>1. Lorem ipsum dolor sit amet consectetur adipiscing elit.</li>
                                                        <li>2. Pellentesque nec est gravida eleifend turpis vsodales tortor.</li>
                                                        <li>3. Vivamus dapibus nunc necm consectetur lacinia.</li>
                                                        <li>4. Phasellus non turpis dignissim mattis tellus nec malesuada.</li>
                                                        <li>5. Pellentesque efficitur erat in interdum viverra.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="quiz-layout-edit-options">
                                            <div class="edit-options-right">
                                                <div class="edit-options-controls">
                                                    <button type="button" class="arrow-up-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move up"><img src="/assets/default/svgs/arrow-up-btn.svg" alt=""></button>
                                                    <button type="button" class="arrow-down-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move down"><img src="/assets/default/svgs/arrow-down-btn.svg" alt=""></button>

                                                    <button type="button" class="show-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show/Hide question">
                                                        <img class="show-img" src="/assets/default/svgs/eye-show.svg" alt="">
                                                        <img class="hide-img" src="/assets/default/svgs/eye-off.svg" alt="">
                                                    </button>

                                                    <button type="button" class="copy-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Duplicate question"><img src="/assets/default/svgs/copy-btn.svg" alt=""></button>
                                                    <button type="button" class="delete-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Trash"><img src="/assets/default/svgs/trash-bin.svg" alt=""></button>
                                                    <button type="button" class="crown-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Crown"><img src="/assets/default/svgs/crown-btn.svg" alt=""></button>
                                                    <button type="button" class="stars-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Stars"><img src="/assets/default/svgs/stars-new.svg" alt=""></button>
                                                    <button type="button" class="add-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add question"><img src="/assets/default/svgs/add-btn.svg" alt=""></button>
                                                    <div class="dropdown">
                                                        <button class="btn btn-link text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Shorten</a>
                                                            <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Rewrite</a>
                                                            <a class="dropdown-item" href="#"><i class="fas fa-lock"></i> More fun</a>
                                                            <a class="dropdown-item" href="#"><i class="fa fa-archive"></i> More formal</a>
                                                            <a class="dropdown-item text-danger" href="#"><i class="fa fa-trash"></i> Sprinkle fairy dust</a>
                                                            <a class="dropdown-item" href="#"><i class="fa fa-archive"></i> Change voice</a>
                                                            <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Fix spelling</a>
                                                            <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Custom prompt...</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-35 bg-white panel-border rounded-sm p-25">
                                            <div class="question-layout-block">
                                                <form class="question-fields" action="javascript:;" data-question_id="10180">
                                                    <div class="left-content has-bg">
                                                    <span class="questions-total-holder d-block mb-10">
                                                        <span class="question-dev-details">(34328) (Emerging) (truefalse_quiz)</span>
                                                    </span>
                                                    <span class="question-number-holder" style="z-index: 999999999;">
                                                        <span class="question-number">1</span>
                                                    </span>
                                                    <div id="rureraform-form-1" class=" rureraform-form rureraform-elements rureraform-form-input-medium rureraform-form-icon-inside rureraform-form-description-bottom ui-sortable" _data-parent="1" _data-parent-col="0" style="display: block;">
                                                        <div class="question-layout row d-flex align-items-start">
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
                                                                    <div class="form-field rureraform-cr-container-medium rureraform-cr-container-undefined">
                                                                        <input class="editor-field" type="radio" name="field-40008" id="field-40008-0" value="True">
                                                                        <label for="field-40008-0">
                                                                        <span class="inner-label">True</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-field rureraform-cr-container-medium rureraform-cr-container-undefined">
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
                                                        View Explanation
                                                    </button>
                                                </div>
                                                <div class="collapse" id="explanation-list2">
                                                    <ul class="mt-10">
                                                        <li>1. Lorem ipsum dolor sit amet consectetur adipiscing elit.</li>
                                                        <li>2. Pellentesque nec est gravida eleifend turpis vsodales tortor.</li>
                                                        <li>3. Vivamus dapibus nunc necm consectetur lacinia.</li>
                                                        <li>4. Phasellus non turpis dignissim mattis tellus nec malesuada.</li>
                                                        <li>5. Pellentesque efficitur erat in interdum viverra.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="quiz-layout-edit-options">
                                            <div class="edit-options-right">
                                                <div class="edit-options-controls">
                                                    <button type="button" class="arrow-up-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move up"><img src="/assets/default/svgs/arrow-up-btn.svg" alt=""></button>
                                                    <button type="button" class="arrow-down-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move down"><img src="/assets/default/svgs/arrow-down-btn.svg" alt=""></button>

                                                    <button type="button" class="show-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show/Hide question">
                                                        <img class="show-img" src="/assets/default/svgs/eye-show.svg" alt="">
                                                        <img class="hide-img" src="/assets/default/svgs/eye-off.svg" alt="">
                                                    </button>

                                                    <button type="button" class="copy-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Duplicate question"><img src="/assets/default/svgs/copy-btn.svg" alt=""></button>
                                                    <button type="button" class="delete-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Trash"><img src="/assets/default/svgs/trash-bin.svg" alt=""></button>
                                                    <button type="button" class="crown-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Crown"><img src="/assets/default/svgs/crown-btn.svg" alt=""></button>
                                                    <button type="button" class="stars-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Stars"><img src="/assets/default/svgs/stars-new.svg" alt=""></button>
                                                    <button type="button" class="add-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add question"><img src="/assets/default/svgs/add-btn.svg" alt=""></button>
                                                    <div class="dropdown">
                                                        <button class="btn btn-link text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Shorten</a>
                                                            <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Rewrite</a>
                                                            <a class="dropdown-item" href="#"><i class="fas fa-lock"></i> More fun</a>
                                                            <a class="dropdown-item" href="#"><i class="fa fa-archive"></i> More formal</a>
                                                            <a class="dropdown-item text-danger" href="#"><i class="fa fa-trash"></i> Sprinkle fairy dust</a>
                                                            <a class="dropdown-item" href="#"><i class="fa fa-archive"></i> Change voice</a>
                                                            <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Fix spelling</a>
                                                            <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Custom prompt...</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-15 bg-white panel-border rounded-sm p-25">
                                            <div class="question-layout-block">
                                                <form class="question-fields" action="javascript:;" data-question_id="10180">
                                                    <div class="left-content has-bg">
                                                    <span class="questions-total-holder d-block mb-10">
                                                        <span class="question-dev-details">(22300) (Expected) (drop_and_text)</span>
                                                    </span>
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
                                                        View Explanation
                                                    </button>
                                                </div>
                                                <div class="collapse" id="explanation-list3">
                                                    <ul class="mt-10">
                                                        <li>1. Lorem ipsum dolor sit amet consectetur adipiscing elit.</li>
                                                        <li>2. Pellentesque nec est gravida eleifend turpis vsodales tortor.</li>
                                                        <li>3. Vivamus dapibus nunc necm consectetur lacinia.</li>
                                                        <li>4. Phasellus non turpis dignissim mattis tellus nec malesuada.</li>
                                                        <li>5. Pellentesque efficitur erat in interdum viverra.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="questions-inner-tabs">
                                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                    <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="document-tab" data-toggle="tab" data-target="#document" type="button" role="tab" aria-controls="document" aria-selected="true">Document</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="prompt-tab" data-toggle="tab" data-target="#prompt" type="button" role="tab" aria-controls="prompt" aria-selected="false">Text/Prompt</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="website-tab" data-toggle="tab" data-target="#website" type="button" role="tab" aria-controls="website" aria-selected="false">Website</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="utube-tab" data-toggle="tab" data-target="#utube" type="button" role="tab" aria-controls="utube" aria-selected="false">YouTube</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent2">
                                    <div class="tab-pane fade show active" id="document" role="tabpanel" aria-labelledby="document-tab">
                                        <h6>Generate question from study materials (presentations/documents)</h6>
                                        <div class="staff-picks-holder">
                                            <div class="upload-options">
                                                <div class="field-box">
                                                    <input type="file" id="drag-drop">
                                                    <label for="drag-drop">
                                                        <i class="fas fa-cloud-download-alt"></i>
                                                        <span>Drag and drop a study material</span>
                                                    </label>
                                                </div>
                                                <span class="field-separated">
                                                    <span>Or</span>
                                                </span>
                                                <div class="upload-controls">
                                                    <div class="field-box">
                                                        <input type="file" id="drag-drop">
                                                        <label for="drag-drop"><i class="fas fa-desktop"></i> Upload from device</label>
                                                    </div>
                                                    <div class="field-box">
                                                        <input type="file" id="drag-drop">
                                                        <label for="drag-drop"><i class="fas fa-desktop"></i> Import from device</label>
                                                    </div>
                                                    <div class="field-box">
                                                        <input type="file" id="drag-drop">
                                                        <label for="drag-drop"><i class="fas fa-camera"></i> Take a picture</label>
                                                    </div>
                                                </div>
                                                <p>Supported formates: PDF, PPT, PPTX, DOC</p>
                                            </div>
                                        </div>
                                        <div class="question-hints">
                                            <h6>Hints</h6>
                                            <div class="question-hints-holder">
                                                <div class="hints-box">
                                                    <strong>Total Referred Users</strong>
                                                    <span>Users that registerd on the plateform using the referral code.</span>
                                                </div>
                                                <div class="hints-box">
                                                    <strong>Total Referred Users</strong>
                                                    <span>Users that registerd on the plateform using the referral code.</span>
                                                </div>
                                                <div class="hints-box">
                                                    <strong>Total Referred Users</strong>
                                                    <span>Users that registerd on the plateform using the referral code.</span>
                                                </div>
                                                <div class="hints-box">
                                                    <strong>Total Referred Users</strong>
                                                    <span>Users that registerd on the plateform using the referral code.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="prompt" role="tabpanel" aria-labelledby="prompt-tab">
                                        <h6>Copy and paste questions text from anywhere to create a quiz from it</h6>
                                        <div class="copy-paste-questions"> 
                                            <span class="text-lable">Paste your content</span>
                                            <div class="pasted-question">
                                                <ul>
                                                    <li>
                                                        Question 1
                                                        <ul>
                                                            <li>Option 1</li>
                                                            <li>Option 2</li>
                                                            <li>Option 3</li>
                                                            <li>Option 4 (Correct)</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <ul>
                                                    <li>
                                                        Question 2
                                                        <ul>
                                                            <li>Option 1</li>
                                                            <li>Option 2</li>
                                                            <li>Option 3</li>
                                                            <li>Option 4 (Correct)</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="website" role="tabpanel" aria-labelledby="website-tab">
                                        <h6>Generate questions from websites/online articles</h6>
                                        <div class="rureraform-search-field">
                                            <div class="input-field web-input-field">
                                                <i class="fas fa-link"></i>
                                                <input type="text" placeholder="Enter any website URL (eg https://rurera.com/) ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="utube" role="tabpanel" aria-labelledby="utube-tab">
                                        <h6 class="search-lable">Find or create an Interactive Video from YouTube <span class="beta-lable">Beta</span></h6>
                                        <div class="bg-white panel-border rounded-sm p-15">
                                            <div class="rureraform-search-field">
                                                <div class="input-field youtube-input-field w-100">
                                                    <img src="/assets/default/svgs/youtube.svg" alt="">
                                                    <input type="text" placeholder="Search question..">
                                                    <button type="button"><i class="fas fa-search"></i> Browse YouTube</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="import-q" role="tabpanel" aria-labelledby="import-tab">
                            <div class="questions-inner-tabs">
                                <ul class="nav nav-tabs" id="myTab3" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="paste-q-tab" data-toggle="tab" data-target="#paste-q" type="button" role="tab" aria-controls="paste-q" aria-selected="true">Paste Questions</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="google-form-tab" data-toggle="tab" data-target="#google-form" type="button" role="tab" aria-controls="google-form" aria-selected="false">Google Form</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="spreadsheet-tab" data-toggle="tab" data-target="#spreadsheet" type="button" role="tab" aria-controls="spreadsheet" aria-selected="false">Spreadsheet/CSV</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent3">
                                    <div class="tab-pane fade show active" id="paste-q" role="tabpanel" aria-labelledby="paste-q-tab">
                                        <h6>Copy and paste questions text from anywhere to create a quiz from it</h6>
                                        <div class="copy-paste-questions"> 
                                            <span class="text-lable">Paste your content</span>
                                            <div class="pasted-question">
                                                <ul>
                                                    <li>
                                                        Question 1
                                                        <ul>
                                                            <li>Option 1</li>
                                                            <li>Option 2</li>
                                                            <li>Option 3</li>
                                                            <li>Option 4 (Correct)</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <ul>
                                                    <li>
                                                        Question 2
                                                        <ul>
                                                            <li>Option 1</li>
                                                            <li>Option 2</li>
                                                            <li>Option 3</li>
                                                            <li>Option 4 (Correct)</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="google-form" role="tabpanel" aria-labelledby="google-form-tab">
                                        <h6>Import Google Form as a quiz</h6>
                                        <div class="staff-picks-holder">
                                            <div class="upload-options">
                                                <div class="field-box">
                                                    <input type="file" id="drag-drop">
                                                    <label for="drag-drop">
                                                        <i class="fas fa-file-alt"></i>
                                                        <span>Select a google form</span>
                                                    </label>
                                                </div>
                                                <div class="upload-controls">
                                                    <div class="field-box">
                                                        <input type="file" id="drag-drop">
                                                        <label for="drag-drop"><i class="fas fa-desktop"></i> Import from drive</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="spreadsheet" role="tabpanel" aria-labelledby="spreadsheet-tab">
                                        <h6>Bulk import questions using spreadsheet</h6>
                                        <div class="staff-picks-holder">
                                            <div class="upload-options">
                                                <div class="field-box">
                                                    <input type="file" id="drag-drop">
                                                    <label for="drag-drop">
                                                        <img src="/assets/default/svgs/spreadsheet.svg" alt="">
                                                        <span>Drag and drop your spreadsheet</span>
                                                    </label>
                                                </div>
                                                <span class="field-separated">
                                                    <span>Or</span>
                                                </span>
                                                <div class="upload-controls">
                                                    <div class="field-box">
                                                        <input type="file" id="drag-drop">
                                                        <label for="drag-drop"><i class="fas fa-desktop"></i> Upload from device</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="collection" role="tabpanel" aria-labelledby="collection-tab">
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
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip({
            container: '.admin_teacher_role'
        });
        
        $('.show-btn').on('click',function () {
            $('.show-btn').toggleClass('show');
        });
    });
    /*Quiz Data Slide Function Start*/
    $(document).ready(function () {
        $(".section-header .setting-btn, .slide-controls .close-btn").click(function (e) {
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
</script>

@endpush
