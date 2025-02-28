@extends('admin.layouts.app')

@push('libraries_top')

@endpush

@push('styles_top')
<link rel="stylesheet" href="/assets/default/css/quiz-create.css">
@endpush

@section('content')
<section class="section">
   

    <div class="section-body skeleton">
    <div class="row">
            <div class="col-12 col-md-9 col-lg-9 mx-auto">

                <!-- Modal -->
                <div class="modal fade" id="dragModal" tabindex="-1" role="dialog" aria-labelledby="dragModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="dragModalLabel">Draggable Grid</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="grid-container" id="gridContainer">
                                    <!-- Grid Items -->
                                    <div class="grid-item" draggable="true">1</div>
                                    <div class="grid-item" draggable="true">2</div>
                                    <div class="grid-item" draggable="true">3</div>
                                    <div class="grid-item" draggable="true">4</div>
                                    <div class="grid-item" draggable="true">5</div>
                                    <div class="grid-item" draggable="true">6</div>
                                    <div class="grid-item" draggable="true">7</div>
                                    <div class="grid-item" draggable="true">8</div>
                                    <div class="grid-item" draggable="true">9</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="q-ai-nav-controls">
                    <a href="#home" class="active skelton-hide" data-toggle="modal" data-target="#templatesleModal"><img src="/assets/default/svgs/add-question.svg" alt=""> Add Question</a>
                    <a href="#q-collections" class="skelton-hide" data-toggle="modal" data-target="#templatesleModal"><img src="/assets/default/svgs/add-collection.svg" alt=""> Add question from Collection</a>
                    <a href="#generate-ai" class="skelton-hide" data-toggle="modal" data-target="#templatesleModal"><img src="/assets/default/svgs/ai.svg" alt=""> Generate quiz using AI</a>
                    <a href="#import-q" class="skelton-hide" data-toggle="modal" data-target="#templatesleModal"><img src="/assets/default/svgs/import-worksheet.svg" alt=""> Import Worksheets</a>
                </div>
                <div class="mb-30 bg-white panel-border rounded-sm p-15" style="display: none;">
                    <h6 class="search-lable">Search question from library</h6>
                    <div class="rureraform-search-field mb-15">
                        <div class="input-field">
                            <input type="text" placeholder="Search question..">
                            <button type="button"><i class="fas fa-search"></i> <span>Search questions</span></button>
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
                <div class="mb-30 bg-white panel-border rounded-sm p-15 bulk-quiz skelton-hide">
                    <div class="bulk-heading">
                        <h6>Bulk Settings</h6>
                    </div>
                    <div class="bulk-ai">
                        <div class="bulk-ai-box">
                            <span class="bulk-lable">Rendomize</span>
                            <div class="btn-field">
                                <a href="#">Question order</a>
                                <a href="#">Options order</a>
                            </div>
                        </div>
                        <div class="bulk-ai-box">
                            <span class="bulk-lable">Estimation time</span>
                            <div class="select-field">
                                <select>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <span class="bulk-text">Mins <i class="fas fa-clock"></i></span>
                            </div>
                        </div>
                        <div class="bulk-ai-box">
                            <span class="bulk-lable">Mark as point</span>
                            <div class="select-field">
                                <select>
                                    <option value="1">1</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <span class="bulk-text">Points <i class="fas fa-circle"></i></span>
                            </div>
                        </div>
                        <div class="bulk-ai-box">
                            <span class="bulk-lable">Questions Order</span>
                            <div class="btn-field">
                                <a href="#" class="delete-btn" data-toggle="modal" data-target="#dragModal">Rearrange</a>
                            </div>
                        </div>
                        <div class="bulk-ai-box">
                            <span class="bulk-lable">Bulk Delete</span>
                            <div class="btn-field">
                                <a href="#" class="delete-btn">Delete All Questions</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="quiz-ai-tags mb-30 bg-white panel-border rounded-sm p-15 alert-dismissible alert fade show skelton-hide">
                    <button type="button" class="close" data-dismiss="quiz-ai-tags" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h6 class="search-lable">Enhance this quiz using AI</h6>
                    <ul>
                        <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Add similar questions</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#document-modal"><img src="/assets/default/svgs/ai.svg" alt="">Fix grammatical and spelling errors</a></li>
                        <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Translate questions</a></li>
                        <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Simplify questions</a></li>
                        <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Add questions on particular topic</a></li>
                        <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Reduce/increase Options From MCQs</a></li>
                        <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Add learner’s name in the questions</a></li>
                        <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Add answer's explanation</a></li>
                        <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Write custom prompt</a></li>
                    </ul>
                </div>
                <div class="quiz-setup-listings">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="quiz-layout-edit-options skelton-hide">
                                <div class="edit-options-right">
                                    <div class="edit-options-controls">
                                        <button type="button" class="arrow-up-btn" data-toggle="tooltip" data-placement="top" title="Move up" data-trigger="hover"><img src="/assets/default/svgs/arrow-up-btn.svg" alt=""></button>
                                        <button type="button" class="arrow-down-btn" data-toggle="tooltip" data-placement="top" title="Move down" data-trigger="hover"><img src="/assets/default/svgs/arrow-down-btn.svg" alt=""></button>

                                        <!-- <button type="button" class="show-btn" data-toggle="tooltip" data-placement="top" title="Show/Hide question">
                                            <img class="show-img" src="/assets/default/svgs/eye-show.svg" alt="">
                                            <img class="hide-img" src="/assets/default/svgs/eye-off.svg" alt="">
                                        </button> -->

                                        <button type="button" class="copy-btn" data-toggle="tooltip" data-placement="top" title="Duplicate question" data-trigger="hover"><img src="/assets/default/svgs/copy-btn.svg" alt=""></button>
                                        <button type="button" class="edit-btn" data-toggle="modal" data-target="#blank-canvas-modal">
                                            <span class="icon-box" data-toggle="tooltip" data-placement="top" title="Edit" data-trigger="hover"><img src="/assets/default/svgs/clapperboard-edit.svg" alt=""></span>
                                        </button>
                                        <button type="button" class="delete-btn" data-toggle="tooltip" data-placement="top" title="Trash" data-trigger="hover"><img src="/assets/default/svgs/trash-bin.svg" alt=""></button>
                                        <div class="dropdown">
                                            <button class="btn btn-link dropdown-toggle stars-btn" type="button" title="Stars" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="icon-box" data-toggle="tooltip" data-placement="top" data-trigger="hover" title="Ask Ai" data-trigger="hover"><img src="/assets/default/svgs/ai.svg" alt=""></span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                <ul>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/ai.svg" alt=""> Add a similar question</a>
                                                        <ul class="sub-dropdown">
                                                            <li><a href="#">1</a></li>
                                                            <li><a href="#">3</a></li>
                                                            <li><a href="#">5</a></li>
                                                            <li><a href="#">10</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/ai.svg" alt=""> Turn into</a>
                                                        <ul class="sub-dropdown">
                                                            <li><a href="#">Drag Drop</a></li>
                                                            <li><a href="#">Dropdown</a></li>
                                                            <li><a href="#">Fill-in-blank</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/ai.svg" alt=""> Add explanation</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/ai.svg" alt=""> Fix grammatical and spelling</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/ai.svg" alt=""> Replace with a similar question</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/ai.svg" alt=""> Reduce options</a>
                                                        <ul class="sub-dropdown">
                                                            <li><a href="#">4</a></li>
                                                            <li><a href="#">3</a></li>
                                                            <li><a href="#">2</a></li>
                                                            <li><a href="#">1</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/ai.svg" alt=""> Write custom prompt</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question-layout-holder mb-15 bg-white panel-border rounded-sm p-25 skelton-hide">
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
                                <div class="rureraform-col rureraform-col-12">
                                    <div class="rureraform-table">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>a shadow</td>
                                                    <td class="respondents">1 respondent</td>
                                                    <td class="percent-value">20%</td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>a text</td>
                                                    <td class="respondents">0 respondents</td>
                                                    <td class="percent-value">0%</td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>a pop-up</td>
                                                    <td class="respondents">1 respondent</td>
                                                    <td class="percent-value">20%</td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="success-status">
                                                    <td><strong>An action by the user that creates an effect</strong></td>
                                                    <td class="respondents">3 respondents</td>
                                                    <td class="percent-value">60%</td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="view-explanation">
                                    <div class="explanation-controls d-flex align-items-center">
                                        <button class="collapsed" type="button" data-toggle="collapse" data-target="#explanation-list" aria-expanded="false" aria-controls="explanation-list">
                                           <i class="fas fa-plus"></i> Add Explanation
                                        </button>
                                    </div>
                                    <div class="collapse" id="explanation-list">
                                        <textarea class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="listing-dropdown skelton-hide">
                                <div class="btn-holder">
                                    <button class="" data-toggle="modal" data-target="#templatesleModal"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="quiz-layout-edit-options skelton-hide">
                                <div class="edit-options-right">
                                <div class="edit-options-controls">
                                        <button type="button" class="arrow-up-btn" data-toggle="tooltip" data-placement="top" title="Move up" data-trigger="hover"><img src="/assets/default/svgs/arrow-up-btn.svg" alt=""></button>
                                        <button type="button" class="arrow-down-btn" data-toggle="tooltip" data-placement="top" title="Move down" data-trigger="hover"><img src="/assets/default/svgs/arrow-down-btn.svg" alt=""></button>

                                        <!-- <button type="button" class="show-btn" data-toggle="tooltip" data-placement="top" title="Show/Hide question">
                                            <img class="show-img" src="/assets/default/svgs/eye-show.svg" alt="">
                                            <img class="hide-img" src="/assets/default/svgs/eye-off.svg" alt="">
                                        </button> -->

                                        <button type="button" class="copy-btn" data-toggle="tooltip" data-placement="top" title="Duplicate question" data-trigger="hover"><img src="/assets/default/svgs/copy-btn.svg" alt=""></button>
                                        <button type="button" class="edit-btn" data-toggle="tooltip" data-placement="top" title="Edit" data-trigger="hover"><img src="/assets/default/svgs/clapperboard-edit.svg" alt=""></button>
                                        <button type="button" class="delete-btn" data-toggle="tooltip" data-placement="top" title="Trash" data-trigger="hover"><img src="/assets/default/svgs/trash-bin.svg" alt=""></button>
                                        <div class="dropdown">
                                            <button class="btn btn-link dropdown-toggle stars-btn" type="button" title="Stars" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="icon-box" data-toggle="tooltip" data-placement="top" data-trigger="hover" title="Ask Ai" data-trigger="hover"><img src="/assets/default/svgs/ai.svg" alt=""></span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                <ul>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/ai.svg" alt=""> Add a similar question</a>
                                                        <ul class="sub-dropdown">
                                                            <li><a href="#">1</a></li>
                                                            <li><a href="#">3</a></li>
                                                            <li><a href="#">5</a></li>
                                                            <li><a href="#">10</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/ai.svg" alt=""> Turn into</a>
                                                        <ul class="sub-dropdown">
                                                            <li><a href="#">Drag Drop</a></li>
                                                            <li><a href="#">Dropdown</a></li>
                                                            <li><a href="#">Fill-in-blank</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/ai.svg" alt=""> Add explanation</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/ai.svg" alt=""> Fix grammatical and spelling</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/ai.svg" alt=""> Replace with a similar question</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/ai.svg" alt=""> Reduce options</a>
                                                        <ul class="sub-dropdown">
                                                            <li><a href="#">4</a></li>
                                                            <li><a href="#">3</a></li>
                                                            <li><a href="#">2</a></li>
                                                            <li><a href="#">1</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/ai.svg" alt=""> Write custom prompt</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-35 bg-white panel-border rounded-sm p-25 skelton-hide">
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
                                        <button class="collapsed" type="button" data-toggle="collapse" data-target="#explanation-list" aria-expanded="false" aria-controls="explanation-list">
                                           <i class="fas fa-plus"></i> Add Explanation
                                        </button>
                                    </div>
                                    <div class="collapse" id="explanation-list2" style="">
                                        <textarea class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="quiz-layout-edit-options skelton-hide">
                                <div class="edit-options-right">
                                <div class="edit-options-controls">
                                        <button type="button" class="arrow-up-btn" data-toggle="tooltip" data-placement="top" title="Move up" data-trigger="hover"><img src="/assets/default/svgs/arrow-up-btn.svg" alt=""></button>
                                        <button type="button" class="arrow-down-btn" data-toggle="tooltip" data-placement="top" title="Move down" data-trigger="hover"><img src="/assets/default/svgs/arrow-down-btn.svg" alt=""></button>

                                        <!-- <button type="button" class="show-btn" data-toggle="tooltip" data-placement="top" title="Show/Hide question">
                                            <img class="show-img" src="/assets/default/svgs/eye-show.svg" alt="">
                                            <img class="hide-img" src="/assets/default/svgs/eye-off.svg" alt="">
                                        </button> -->

                                        <button type="button" class="copy-btn" data-toggle="tooltip" data-placement="top" title="Duplicate question" data-trigger="hover"><img src="/assets/default/svgs/copy-btn.svg" alt=""></button>
                                        <button type="button" class="edit-btn" data-toggle="tooltip" data-placement="top" title="Edit" data-trigger="hover"><img src="/assets/default/svgs/clapperboard-edit.svg" alt=""></button>
                                        <button type="button" class="delete-btn" data-toggle="tooltip" data-placement="top" title="Trash" data-trigger="hover"><img src="/assets/default/svgs/trash-bin.svg" alt=""></button>
                                        <div class="dropdown">
                                            <button class="btn btn-link dropdown-toggle stars-btn" type="button" title="Stars" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="icon-box" data-toggle="tooltip" data-placement="top" data-trigger="hover" title="Ask Ai" data-trigger="hover"><img src="/assets/default/svgs/ai.svg" alt=""></span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                <ul>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/ai.svg" alt=""> Add a similar question</a>
                                                        <ul class="sub-dropdown">
                                                            <li><a href="#">1</a></li>
                                                            <li><a href="#">3</a></li>
                                                            <li><a href="#">5</a></li>
                                                            <li><a href="#">10</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/ai.svg" alt=""> Turn into</a>
                                                        <ul class="sub-dropdown">
                                                            <li><a href="#">Drag Drop</a></li>
                                                            <li><a href="#">Dropdown</a></li>
                                                            <li><a href="#">Fill-in-blank</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/ai.svg" alt=""> Add explanation</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/ai.svg" alt=""> Fix grammatical and spelling</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/ai.svg" alt=""> Replace with a similar question</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/ai.svg" alt=""> Reduce options</a>
                                                        <ul class="sub-dropdown">
                                                            <li><a href="#">4</a></li>
                                                            <li><a href="#">3</a></li>
                                                            <li><a href="#">2</a></li>
                                                            <li><a href="#">1</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/ai.svg" alt=""> Write custom prompt</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-15 bg-white panel-border rounded-sm p-25 skelton-hide">
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
                                                            <span class="question-count-lable">Question 3 of 18</span>
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
                                        <button class="collapsed" type="button" data-toggle="collapse" data-target="#explanation-list" aria-expanded="false" aria-controls="explanation-list">
                                           <i class="fas fa-plus"></i> Add Explanation
                                        </button>
                                    </div>
                                    <div class="collapse" id="explanation-list3" style="">
                                        <textarea class="form-control"></textarea>
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
                                <a href="#home" class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="false">Blank Canvas</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#q-collections" class="nav-link" id="q-collections-tab" data-toggle="tab" data-target="#q-collections" type="button" role="tab" aria-controls="q-collections" aria-selected="true">Collections</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#generate-ai" class="nav-link" id="generate-ai-tab" data-toggle="tab" data-target="#generate-ai" type="button" role="tab" aria-controls="generate-ai" aria-selected="false">Generate with AI</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#import-q" class="nav-link" id="import-tab" data-toggle="tab" data-target="#import-q" type="button" role="tab" aria-controls="import-q" aria-selected="false">Import Questions</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#collection" class="nav-link" id="collection-tab" data-toggle="tab" data-target="#collection" type="button" role="tab" aria-controls="collection" aria-selected="false">My Collection</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                        <div class="tab-pane fade" id="q-collections" role="tabpanel" aria-labelledby="q-collections-tab">
                            
                        </div>
                        <div class="tab-pane fade" id="generate-ai" role="tabpanel" aria-labelledby="generate-ai-tab">
                            <div class="quiz-ai-tags mb-30 bg-white panel-border rounded-sm p-15 alert-dismissible alert fade show">
                                <button type="button" class="close" data-dismiss="quiz-ai-tags" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <h6 class="search-lable">Enhance this quiz using AI</h6>
                                <ul>
                                    <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Add similar questions</a></li>
                                    <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Fix grammatical and spelling errors</a></li>
                                    <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Translate questions</a></li>
                                    <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Simplify questions</a></li>
                                    <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Add questions on particular topic</a></li>
                                    <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Reduce/increase Options From MCQs</a></li>
                                    <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Add learner’s name in the questions</a></li>
                                    <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Add answer's explanation</a></li>
                                    <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Write custom prompt</a></li>
                                </ul>
                            </div>
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
                                            <button type="button"><i class="fas fa-search"></i> <span>Search questions</span></button>
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
<div class="modal fade blank-canvas-modal" id="blank-canvas-modal" tabindex="-1" aria-labelledby="blank-canvas-modalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="blank-canvas-sidebar">
                    <h3 class="title">QUESTION <span>(5)</span> <button class="add-btn" data-toggle="modal" data-target="#general-knowledge-modal">+</button></h3>
                    <div id="sortable">
                        <div class="question-card">
                            <a href="#" class="question-card-link">
                                <div class="question-content">
                                    <div class="question-text"><div class="q-number">1</div> What does UI <br > stand fo...</div>
                                    <div class="question-type">
                                        <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span> 
                                        <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="question-card">
                            <a href="#" class="question-card-link">
                                <div class="question-content">
                                    <div class="question-text"><div class="q-number">2</div> Which aspect of UI de...</div>
                                    <div class="question-type">
                                        <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                        <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="question-card">
                            <a href="#" class="question-card-link">
                                <div class="question-content">
                                    <div class="question-text"><div class="q-number">3</div> How to export a pictu...</div>
                                    <div class="question-type">
                                        <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                        <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="question-card">
                            <a href="#" class="question-card-link">
                                <div class="question-content">
                                    <div class="question-text"><div class="q-number">4</div> What does UI <br > stand fo...</div>
                                    <div class="question-type">
                                        <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span> 
                                        <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="question-card">
                            <a href="#" class="question-card-link">
                                <div class="question-content">
                                    <div class="question-text"><div class="q-number">5</div> Which aspect of UI de...</div>
                                    <div class="question-type">
                                        <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                        <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="question-card">
                            <a href="#" class="question-card-link">
                                <div class="question-content">
                                    <div class="question-text"><div class="q-number">6</div> How to export a pictu...</div>
                                    <div class="question-type">
                                        <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                        <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="question-card">
                            <a href="#" class="question-card-link">
                                <div class="question-content">
                                    <div class="question-text"><div class="q-number">7</div> What does UI <br > stand fo...</div>
                                    <div class="question-type">
                                        <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span> 
                                        <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="question-card">
                            <a href="#" class="question-card-link">
                                <div class="question-content">
                                    <div class="question-text"><div class="q-number">8</div> Which aspect of UI de...</div>
                                    <div class="question-type">
                                        <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                        <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="question-card">
                            <a href="#" class="question-card-link">
                                <div class="question-content">
                                    <div class="question-text"><div class="q-number">9</div> How to export a pictu...</div>
                                    <div class="question-type">
                                        <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                        <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="question-card">
                            <a href="#" class="question-card-link">
                                <div class="question-content">
                                    <div class="question-text"><div class="q-number">10</div> What does UI <br > stand fo...</div>
                                    <div class="question-type">
                                        <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span> 
                                        <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="question-card">
                            <a href="#" class="question-card-link">
                                <div class="question-content">
                                    <div class="question-text"><div class="q-number">11</div> Which aspect of UI de...</div>
                                    <div class="question-type">
                                        <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                        <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="question-card">
                            <a href="#" class="question-card-link">
                                <div class="question-content">
                                    <div class="question-text"><div class="q-number">12</div> How to export a pictu...</div>
                                    <div class="question-type">
                                        <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                        <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="question-card">
                            <a href="#" class="question-card-link">
                                <div class="question-content">
                                    <div class="question-text"><div class="q-number">13</div> What does UI <br > stand fo...</div>
                                    <div class="question-type">
                                        <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span> 
                                        <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="question-card">
                            <a href="#" class="question-card-link">
                                <div class="question-content">
                                    <div class="question-text"><div class="q-number">14</div> Which aspect of UI de...</div>
                                    <div class="question-type">
                                        <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                        <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="question-card">
                            <a href="#" class="question-card-link">
                                <div class="question-content">
                                    <div class="question-text"><div class="q-number">15</div> How to export a pictu...</div>
                                    <div class="question-type">
                                        <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                        <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="question-card">
                            <a href="#" class="question-card-link">
                                <div class="question-content">
                                    <div class="question-text"><div class="q-number">16</div> What does UI <br > stand fo...</div>
                                    <div class="question-type">
                                        <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span> 
                                        <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="question-card">
                            <a href="#" class="question-card-link">
                                <div class="question-content">
                                    <div class="question-text"><div class="q-number">17</div> Which aspect of UI de...</div>
                                    <div class="question-type">
                                        <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                        <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="question-card">
                            <a href="#" class="question-card-link">
                                <div class="question-content">
                                    <div class="question-text"><div class="q-number">18</div> How to export a pictu...</div>
                                    <div class="question-type">
                                        <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                        <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                </div>
                <div class="canvas-modal-container">
                    <div class="mb-30 bg-white panel-border rounded-sm p-15 bulk-quiz">
                        <div class="bulk-heading">
                            <h6>Bulk Settings</h6>
                        </div>
                        <div class="bulk-ai">
                            <div class="bulk-ai-box">
                                <span class="bulk-lable">Rendomize</span>
                                <div class="btn-field">
                                    <a href="#">Question order</a>
                                    <a href="#">Options order</a>
                                </div>
                            </div>
                            <div class="bulk-ai-box">
                                <span class="bulk-lable">Estimation time</span>
                                <div class="select-field">
                                    <select>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <span class="bulk-text">Mins <i class="fas fa-clock"></i></span>
                                </div>
                            </div>
                            <div class="bulk-ai-box">
                                <span class="bulk-lable">Mark as point</span>
                                <div class="select-field">
                                    <select>
                                        <option value="1">1</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <span class="bulk-text">Points <i class="fas fa-circle"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="quiz-ai-tags mb-30 bg-white panel-border rounded-sm p-15 alert-dismissible alert fade show">
                        <button type="button" class="close" data-dismiss="quiz-ai-tags" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h6 class="search-lable">Enhance this quiz using AI</h6>
                        <ul>
                            <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Add similar questions</a></li>
                            <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Fix grammatical and spelling errors</a></li>
                            <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Translate questions</a></li>
                            <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Simplify questions</a></li>
                            <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Add questions on particular topic</a></li>
                            <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Reduce/increase Options From MCQs</a></li>
                            <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Add learner’s name in the questions</a></li>
                            <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Add answer's explanation</a></li>
                            <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Write custom prompt</a></li>
                        </ul>
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
                                                    <span class="icon-box"><img src="/assets/default/svgs/question-simple.svg" alt=""></span>
                                                    <span class="question-count-lable">Question 1 of 20</span>
                                                </div>
                                                <div class="question-info">
                                                    <span class="q-type"><img src="/assets/default/svgs/multi-choice.svg" alt="">Multiple choice</span>
                                                    <span class="q-time">Avg time</span>
                                                    <span class="q-point">1 point</span>
                                                    <div class="edit-options-controls">
                                                        <div class="dropdown">
                                                            <button class="btn btn-link dropdown-toggle stars-btn" type="button" title="Stars" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="icon-box" data-toggle="tooltip" data-placement="top" data-trigger="hover" title="" data-original-title="Ask Ai"><img src="/assets/default/svgs/ai.svg" alt=""></span>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                                <ul>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/ai.svg" alt=""> Add a similar question</a>
                                                                        <ul class="sub-dropdown">
                                                                            <li><a href="#">1</a></li>
                                                                            <li><a href="#">3</a></li>
                                                                            <li><a href="#">5</a></li>
                                                                            <li><a href="#">10</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/ai.svg" alt=""> Turn into</a>
                                                                        <ul class="sub-dropdown">
                                                                            <li><a href="#">Drag Drop</a></li>
                                                                            <li><a href="#">Dropdown</a></li>
                                                                            <li><a href="#">Fill-in-blank</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/ai.svg" alt=""> Add explanation</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/ai.svg" alt=""> Fix grammatical and spelling</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/ai.svg" alt=""> Replace with a similar question</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/ai.svg" alt=""> Reduce options</a>
                                                                        <ul class="sub-dropdown">
                                                                            <li><a href="#">4</a></li>
                                                                            <li><a href="#">3</a></li>
                                                                            <li><a href="#">2</a></li>
                                                                            <li><a href="#">1</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/ai.svg" alt=""> Write&nbsp;custom&nbsp;prompt</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rureraform-col rureraform-col-12">
                                        <div id="rureraform-element-0" class="rureraform-element-0 rureraform-element quiz-group rureraform-element-html ui-sortable-handle" data-type="question_label">
                                            <h4>Read the text, then answer the question.</h4>
                                        </div>
                                        <div class="elements-tooltip">
                                            <div class="elements-controls">
                                                <button type="button"><img src="/assets/default/svgs/speech-bubble.svg" alt=""></button>
                                                <button type="button"><img src="/assets/default/svgs/lock-open.svg" alt=""></button>
                                                <button type="button"><img src="/assets/default/svgs/add-btn.svg" alt=""></button>
                                                <button type="button"><img src="/assets/default/svgs/trash-bin.svg" alt=""></button>
                                                <div class="edit-options-controls">
                                                    <div class="dropdown">
                                                        <button class="btn btn-link text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Rewrite</a>
                                                            <a class="dropdown-item" href="#"><i class="fas fa-lock"></i> More fun</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                    <i class="fas fa-plus"></i> Add Explanation
                                </button>
                            </div>
                            <div class="collapse" id="explanation-list">
                                <textarea class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="canvas-editable-options-holder">
                            <div class="canvas-editable-options lms-quiz-create">
                                <div class="lms-element-properties">
                                    <div class="row">
                                        <div class="topic-parts-block rurera-hide" style="display:contents;"></div>
                                    </div>
                                    <div class="rureraform-admin-popup active" id="rureraform-element-properties" style="display: block;" data-element_id="rureraform-element-3">
                                        <div class="rureraform-admin-popup-inner">
                                        <div class="rureraform-admin-popup-title">
                                            <a href="#" title="Close">
                                            <i class="fas fa-times"></i>
                                            </a>
                                            <h3>
                                            <i class="fas fa-cog element-properties-label"></i> Multiple Choice 1
                                            </h3>
                                        </div>
                                        <div class="rureraform-admin-popup-content">
                                            <div class="rureraform-admin-popup-content-form">
                                            <div id="rureraform-tab-basic" class="rureraform-tab-content" style="display: block;">
                                                <input type="hidden" name="rureraform-field_id" id="rureraform-field_id" value="48453" placeholder="">
                                                <div class="rureraform-properties-item " data-id="label">
                                                <div class="rureraform-properties-label">
                                                    <label>Label</label>
                                                </div>
                                                <div class="rureraform-properties-content">
                                                    <input type="text" name="rureraform-label" id="rureraform-label" value="Mark One answer" placeholder="">
                                                </div>
                                                </div>
                                                <div class="rureraform-properties-item d-flex align-items-center justify-content-between" data-id="have_images">
                                                    <div class="rureraform-properties-label pb-0">
                                                        <label>Answer with image</label>
                                                    </div>
                                                    <div class="form-group custom-switches-stacked mb-0">
                                                        <label class="custom-switch pl-0 mb-0">
                                                            <input type="checkbox" name="answer-with-image" id="answer-with-image" value="1" class="custom-switch-input">
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="rureraform-properties-item">
                                                    <div class="properties-select-boxes">
                                                        <div class="img-select-box">
                                                            <input type="radio" name="img-box" id="box1">
                                                            <label for="box1">
                                                                <img src="/store/1/tool-images/d5.png" alt="">
                                                                <span>List</span>
                                                            </label>
                                                        </div>
                                                        <div class="img-select-box">
                                                            <input type="radio" name="img-box" id="box2">
                                                            <label for="box2">
                                                                <img src="/store/1/tool-images/d14.png" alt="">
                                                                <span>Essay</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="rureraform-properties-item rurera-image-depend rurera-hide" data-id="image_position">
                                                    <div class="rureraform-properties-label">
                                                        <label>Image Position</label>
                                                    </div>
                                                <div class="rureraform-properties-tooltip"></div>
                                                <div class="rureraform-properties-content">
                                                    <div class="rureraform-third">
                                                    <select name="rureraform-image_position" id="rureraform-image_position" class="">
                                                        <option selected="selected" value="top">Top</option>
                                                        <option value="left">Left</option>
                                                        <option value="right">Right</option>
                                                    </select>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="rureraform-properties-item" data-id="options">
                                                    <div class="rureraform-properties-label">
                                                        <label>Options</label>
                                                    </div>
                                                    <div class="rureraform-properties-content rureraform-properties-image-options-table">
                                                        <div class="rureraform-properties-options-table-header">
                                                        <div class="rurera-image-depend rurera-hide">Image</div>
                                                        <div class="rurera-hide">Value</div>
                                                        <div></div>
                                                        </div>
                                                        <div class="rureraform-properties-options-box ui-resizable">
                                                        <div class="rureraform-properties-options-container ui-sortable" data-multi="on">
                                                            <div class="rureraform-properties-options-item rureraform-properties-options-item-default">
                                                            <div class="rureraform-properties-options-table">
                                                                <div>
                                                                <input class="rureraform-properties-options-label" type="text" value="Cells" placeholder="Label">
                                                                </div>
                                                                <div class="rureraform-image-url rurera-image-depend rurera-hide">
                                                                <div class="input-group-prepend">
                                                                    <button type="button" class="input-group-text admin-file-manager" data-input="image-options-0" data-preview="holder">
                                                                    <i class="fa fa-upload"></i>
                                                                    </button>
                                                                </div>
                                                                <input class="rureraform-properties-options-image" type="text" id="image-options-0" value="" placeholder="Upload Image">
                                                                <span>
                                                                    <i class="far fa-image"></i>
                                                                </span>
                                                                </div>
                                                                <div class="rurera-hide">
                                                                <input class="rureraform-properties-options-value" type="text" value="Cells" placeholder="Value">
                                                                </div>
                                                                <div>
                                                                <span onclick="return rureraform_properties_options_default(this);" title="Set the option as correct value">
                                                                    <i class="fas fa-check"></i>
                                                                </span>
                                                                <span onclick="return rureraform_properties_options_copy(this);" title="Duplicate the option">
                                                                    <i class="far fa-copy"></i>
                                                                </span>
                                                                <span onclick="return rureraform_properties_options_delete(this);" title="Delete the option">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </span>
                                                                <span title="Move the option">
                                                                    <i class="fas fa-arrows-alt rureraform-properties-options-item-handler ui-sortable-handle"></i>
                                                                </span>
                                                                </div>
                                                            </div>
                                                            </div>
                                                            <div class="rureraform-properties-options-item">
                                                            <div class="rureraform-properties-options-table">
                                                                <div>
                                                                <input class="rureraform-properties-options-label" type="text" value="Chloroplasts" placeholder="Label">
                                                                </div>
                                                                <div class="rureraform-image-url rurera-image-depend rurera-hide">
                                                                <div class="input-group-prepend">
                                                                    <button type="button" class="input-group-text admin-file-manager" data-input="image-options-1" data-preview="holder">
                                                                    <i class="fa fa-upload"></i>
                                                                    </button>
                                                                </div>
                                                                <input class="rureraform-properties-options-image" type="text" id="image-options-1" value="" placeholder="Upload Image">
                                                                <span>
                                                                    <i class="far fa-image"></i>
                                                                </span>
                                                                </div>
                                                                <div class="rurera-hide">
                                                                <input class="rureraform-properties-options-value" type="text" value="Chloroplasts" placeholder="Value">
                                                                </div>
                                                                <div>
                                                                <span onclick="return rureraform_properties_options_default(this);" title="Set the option as correct value">
                                                                    <i class="fas fa-check"></i>
                                                                </span>
                                                                <span onclick="return rureraform_properties_options_copy(this);" title="Duplicate the option">
                                                                    <i class="far fa-copy"></i>
                                                                </span>
                                                                <span onclick="return rureraform_properties_options_delete(this);" title="Delete the option">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </span>
                                                                <span title="Move the option">
                                                                    <i class="fas fa-arrows-alt rureraform-properties-options-item-handler ui-sortable-handle"></i>
                                                                </span>
                                                                </div>
                                                            </div>
                                                            </div>
                                                            <div class="rureraform-properties-options-item">
                                                            <div class="rureraform-properties-options-table">
                                                                <div>
                                                                <input class="rureraform-properties-options-label" type="text" value="Tissues" placeholder="Label">
                                                                </div>
                                                                <div class="rureraform-image-url rurera-image-depend rurera-hide">
                                                                <div class="input-group-prepend">
                                                                    <button type="button" class="input-group-text admin-file-manager" data-input="image-options-2" data-preview="holder">
                                                                    <i class="fa fa-upload"></i>
                                                                    </button>
                                                                </div>
                                                                <input class="rureraform-properties-options-image" type="text" id="image-options-2" value="" placeholder="Upload Image">
                                                                <span>
                                                                    <i class="far fa-image"></i>
                                                                </span>
                                                                </div>
                                                                <div class="rurera-hide">
                                                                <input class="rureraform-properties-options-value" type="text" value="Tissues" placeholder="Value">
                                                                </div>
                                                                <div>
                                                                <span onclick="return rureraform_properties_options_default(this);" title="Set the option as correct value">
                                                                    <i class="fas fa-check"></i>
                                                                </span>
                                                                <span onclick="return rureraform_properties_options_copy(this);" title="Duplicate the option">
                                                                    <i class="far fa-copy"></i>
                                                                </span>
                                                                <span onclick="return rureraform_properties_options_delete(this);" title="Delete the option">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </span>
                                                                <span title="Move the option">
                                                                    <i class="fas fa-arrows-alt rureraform-properties-options-item-handler ui-sortable-handle"></i>
                                                                </span>
                                                                </div>
                                                            </div>
                                                            </div>
                                                            <div class="rureraform-properties-options-item">
                                                            <div class="rureraform-properties-options-table">
                                                                <div>
                                                                <input class="rureraform-properties-options-label" type="text" value="Nuclei" placeholder="Label">
                                                                </div>
                                                                <div class="rureraform-image-url rurera-image-depend rurera-hide">
                                                                <div class="input-group-prepend">
                                                                    <button type="button" class="input-group-text admin-file-manager" data-input="image-options-3" data-preview="holder">
                                                                    <i class="fa fa-upload"></i>
                                                                    </button>
                                                                </div>
                                                                <input class="rureraform-properties-options-image" type="text" id="image-options-3" value="" placeholder="Upload Image">
                                                                <span>
                                                                    <i class="far fa-image"></i>
                                                                </span>
                                                                </div>
                                                                <div class="rurera-hide">
                                                                <input class="rureraform-properties-options-value" type="text" value="Nuclei" placeholder="Value">
                                                                </div>
                                                                <div>
                                                                <span onclick="return rureraform_properties_options_default(this);" title="Set the option as correct value">
                                                                    <i class="fas fa-check"></i>
                                                                </span>
                                                                <span onclick="return rureraform_properties_options_copy(this);" title="Duplicate the option">
                                                                    <i class="far fa-copy"></i>
                                                                </span>
                                                                <span onclick="return rureraform_properties_options_delete(this);" title="Delete the option">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </span>
                                                                <span title="Move the option">
                                                                    <i class="fas fa-arrows-alt rureraform-properties-options-item-handler ui-sortable-handle"></i>
                                                                </span>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
                                                        </div>
                                                        <div class="rureraform-properties-options-table-footer">
                                                            <a class="rureraform-admin-button rureraform-admin-button-gray rureraform-admin-button-small" data-toggle="collapse" href="#explanation" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                <i class="fas fa-plus"></i>
                                                                <label>Add Explanation..</label>
                                                            </a>
                                                            <div class="explanation-box collapse mt-15" id="explanation">
                                                                <textarea name="explanation" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="rureraform-properties-item " data-id="template_style">
                                                    <div class="rureraform-properties-tooltip"></div>
                                                    <div class="rureraform-properties-content">
                                                        <div class="rureraform-third">
                                                        <select name="rureraform-template_style" id="rureraform-template_style" class="">
                                                            <option selected="selected" value="rurera-in-row">Row</option>
                                                            <option value="rurera-in-cols">Columns</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="rureraform-properties-item " data-id="list_style">
                                                    <div class="rureraform-properties-label">
                                                        <label>Bullet list Style</label>
                                                    </div>
                                                    <div class="rureraform-properties-tooltip"></div>
                                                    <div class="rureraform-properties-content">
                                                        <div class="bullet-controls">
                                                            <button type="button">Enabled</button>
                                                            <button type="button">Enabled</button>
                                                            <button type="button" class="active">Selected</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <input type="hidden" name="rureraform-elements_data" id="rureraform-elements_data" value="W3t9XQ==" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rureraform-admin-popup-buttons">
                                            <a class="rureraform-admin-button duplicate-element btn btn-primary" href="#">
                                            <label>Update</label>
                                            </a>
                                            <a class="rureraform-admin-button generate-question-code rurera-hide" href="#">
                                            <label>Apply Changes</label>
                                            </a>
                                        </div>
                                        <div class="rureraform-admin-popup-loading" style="display: none;">
                                            <i class="fas fa-spinner fa-spin"></i>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-controls">
                        <button type="button" class="save-btn">Save</button>
                        <button type="button" class="cancel-btn">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade general-knowledge-modal" id="general-knowledge-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <div class="img-holder">
            <figure>
                <img src="/assets/default/img/ecommerce-img.webp" alt="">
                <figcaption>
                    <div class="upload-box">
                        <input type="file" id="upload-thumbnail">
                        <label for="upload-thumbnail"><img src="/assets/default/svgs/file-image.svg" alt=""> Upload thumbnail</label>
                    </div>
                    <div class="book-btn">
                        <button type="button"><img src="/assets/default/svgs/book-saved.svg" alt=""></button>
                    </div>
                </figcaption>
            </figure>
          </div>
        </div>
        <div class="modal-body">
          <div class="text-holder">
            <h2 class="editable" contenteditable="true">General Knowledge &amp; Methodology</h2>
            <ul>
                <li>
                    <img src="/assets/default/svgs/title.svg" alt="">
                    <input type="text" placeholder="Title" title="Title">
                    <div class="dropdown">
                        <button class="btn-link dropdown-toggle" type="button" id="generalMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Choose Category
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="generalMenu" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(30px, 30px, 0px);">
                           <div class="select-categories-holder">
                                <div class="selected-category">
                                    <a href="#">Prototyping</a>
                                </div>
                                <div class="categories">
                                    <span>Select category or create one</span>
                                    <a href="#" class="active">Prototyping</a>
                                    <a href="#">UI/UX</a>
                                    <a href="#">Design</a>
                                    <a href="#">Card</a>
                                    <a href="#">Not Urgent</a>
                                    <a href="#">Line</a>
                                </div>
                           </div> 
                        </div>
                    </div>
                </li>
                <li>
                    <img src="/assets/default/svgs/grades.svg" alt="">
                    <input type="text" placeholder="Grade" title="Grade">
                    <em>Empty</em>
                </li>
                <li>
                    <img src="/assets/default/svgs/book-saved.svg" alt="">
                    <input type="text" placeholder="Subject" title="Subject">
                    <em>Empty</em>
                </li>
                <li>
                    <img src="/assets/default/svgs/teacher-with-stick.svg" alt="">
                    <input type="text" placeholder="Co-teacher" title="Co-teacher">
                    <div class="dropdown">
                        <button class="btn-link dropdown-toggle" type="button" id="generalMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Select Language
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="generalMenu" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(30px, 30px, 0px);">
                           <div class="select-languages-holder">
                                <div class="languages">
                                    <span>Select Languages</span>
                                    <a href="#" class="active">English</a>
                                    <a href="#">Deutsch</a>
                                    <a href="#">Espanol</a>
                                    <a href="#">Francais</a>
                                    <a href="#">Italian</a>
                                </div>
                           </div> 
                        </div>
                    </div>
                </li>
                <li>
                    <img src="/assets/default/svgs/calendar-days.svg" alt="">
                    <input type="text" placeholder="Start Date" title="Start Date">
                    <em>Empty</em>
                </li>
                <li>
                    <img src="/assets/default/svgs/deadlines.svg" alt="">
                    <input type="text" placeholder="Deadline :" title="Deadline :">
                    <em>Empty</em>
                </li>
                <li>
                    <img src="/assets/default/svgs/attempt.svg" alt="">
                    <input type="text" placeholder="Participant attempts :" title="Participant attempts :">
                    <em>Empty</em>
                </li>
            </ul>
            <div class="description-field">
                <textarea name="description" placeholder="Type description here..."></textarea>
                <span class="description-count">0/400</span>
            </div>
            <p>Let your learner know a title about the learning path</p>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="modal document-modal enhance-questions-modal fade" id="document-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="document-viewer">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="document-content" style="padding-right: 15px;">
                <div class="document-pdf" id="pdf-fonts" style="font-size: medium;">
                    <div class="row">
                        <div class="col-12">
                            <div class="questions-heading d-flex align-items-center justify-content-between flex-wrap mb-15">
                                <h3 class="font-20 font-weight-bold mb-0">Enhance Questions</h3>
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
                        <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                            <div class="question-layout-holder mb-0 bg-white panel-border rounded-sm p-25 mb-25">
                                <span class="quiz-element-icon"><i class="fas fa-chevron-right"></i></span>
                                <div class="question-check-option">
                                    <input type="checkbox" id="q-check1">
                                    <label for="q-check1" class="question-check-box">
                                        <div class="question-layout-block">
                                            <form class="question-fields" action="javascript:;" data-question_id="10180">
                                            <div class="left-content has-bg">
                                                <div id="rureraform-form-1" class=" rureraform-form rureraform-elements rureraform-form-input-medium rureraform-form-icon-inside rureraform-form-description-bottom ui-sortable" _data-parent="1" _data-parent-col="0" style="display: block;">
                                                <div class="question-layout row d-flex align-items-start">
                                                    <div class="rureraform-col rureraform-col-12">
                                                        <div class="rureraform-element quiz-group rureraform-element-html ui-sortable-handle">
                                                            <div class="question-top-info">
                                                                <div class="question-count">
                                                                    <span class="question-count-lable">Question 1 of 20</span>
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
                                                                <div class="form-box  rurera-in-row alphabet-list-style">
                                                                <div class="form-field rureraform-cr-container-medium ">
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
                                        <div class="canvas-editable-options-holder">
                                            <div class="canvas-editable-options lms-quiz-create">
                                                <div class="lms-element-properties">
                                                    <div class="row">
                                                        <div class="topic-parts-block rurera-hide" style="display:contents;"></div>
                                                    </div>
                                                    <div class="rureraform-admin-popup active" id="rureraform-element-properties" style="display: block;" data-element_id="rureraform-element-3">
                                                        <div class="rureraform-admin-popup-inner">
                                                        <div class="rureraform-admin-popup-title">
                                                            <a href="#" title="Close">
                                                            <i class="fas fa-times"></i>
                                                            </a>
                                                            <h3>
                                                            <i class="fas fa-cog element-properties-label"></i> Multiple Choice 1
                                                            </h3>
                                                        </div>
                                                        <div class="rureraform-admin-popup-content">
                                                            <div class="rureraform-admin-popup-content-form">
                                                            <div id="rureraform-tab-basic" class="rureraform-tab-content" style="display: block;">
                                                                <input type="hidden" name="rureraform-field_id" id="rureraform-field_id" value="48453" placeholder="">
                                                                <div class="rureraform-properties-item " data-id="label">
                                                                <div class="rureraform-properties-label">
                                                                    <label>Label</label>
                                                                </div>
                                                                <div class="rureraform-properties-content">
                                                                    <input type="text" name="rureraform-label" id="rureraform-label" value="Mark One answer" placeholder="">
                                                                </div>
                                                                </div>
                                                                <div class="rureraform-properties-item d-flex align-items-center justify-content-between" data-id="have_images">
                                                                    <div class="rureraform-properties-label pb-0">
                                                                        <label>Answer with image</label>
                                                                    </div>
                                                                    <div class="form-group custom-switches-stacked mb-0">
                                                                        <label class="custom-switch pl-0 mb-0">
                                                                            <input type="checkbox" name="answer-with-image" id="answer-with-image" value="1" class="custom-switch-input">
                                                                            <span class="custom-switch-indicator"></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="rureraform-properties-item">
                                                                    <div class="properties-select-boxes">
                                                                        <div class="img-select-box">
                                                                            <input type="radio" name="img-box" id="box1">
                                                                            <label for="box1">
                                                                                <img src="/store/1/tool-images/d5.png" alt="">
                                                                                <span>List</span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="img-select-box">
                                                                            <input type="radio" name="img-box" id="box2">
                                                                            <label for="box2">
                                                                                <img src="/store/1/tool-images/d14.png" alt="">
                                                                                <span>Essay</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="rureraform-properties-item rurera-image-depend rurera-hide" data-id="image_position">
                                                                    <div class="rureraform-properties-label">
                                                                        <label>Image Position</label>
                                                                    </div>
                                                                <div class="rureraform-properties-tooltip"></div>
                                                                <div class="rureraform-properties-content">
                                                                    <div class="rureraform-third">
                                                                    <select name="rureraform-image_position" id="rureraform-image_position" class="">
                                                                        <option selected="selected" value="top">Top</option>
                                                                        <option value="left">Left</option>
                                                                        <option value="right">Right</option>
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                <div class="rureraform-properties-item" data-id="options">
                                                                    <div class="rureraform-properties-label">
                                                                        <label>Options</label>
                                                                    </div>
                                                                    <div class="rureraform-properties-content rureraform-properties-image-options-table">
                                                                        <div class="rureraform-properties-options-table-header">
                                                                        <div class="rurera-image-depend rurera-hide">Image</div>
                                                                        <div class="rurera-hide">Value</div>
                                                                        <div></div>
                                                                        </div>
                                                                        <div class="rureraform-properties-options-box ui-resizable">
                                                                        <div class="rureraform-properties-options-container ui-sortable" data-multi="on">
                                                                            <div class="rureraform-properties-options-item rureraform-properties-options-item-default">
                                                                            <div class="rureraform-properties-options-table">
                                                                                <div>
                                                                                <input class="rureraform-properties-options-label" type="text" value="Cells" placeholder="Label">
                                                                                </div>
                                                                                <div class="rureraform-image-url rurera-image-depend rurera-hide">
                                                                                <div class="input-group-prepend">
                                                                                    <button type="button" class="input-group-text admin-file-manager" data-input="image-options-0" data-preview="holder">
                                                                                    <i class="fa fa-upload"></i>
                                                                                    </button>
                                                                                </div>
                                                                                <input class="rureraform-properties-options-image" type="text" id="image-options-0" value="" placeholder="Upload Image">
                                                                                <span>
                                                                                    <i class="far fa-image"></i>
                                                                                </span>
                                                                                </div>
                                                                                <div class="rurera-hide">
                                                                                <input class="rureraform-properties-options-value" type="text" value="Cells" placeholder="Value">
                                                                                </div>
                                                                                <div>
                                                                                <span onclick="return rureraform_properties_options_default(this);" title="Set the option as correct value">
                                                                                    <i class="fas fa-check"></i>
                                                                                </span>
                                                                                <span onclick="return rureraform_properties_options_copy(this);" title="Duplicate the option">
                                                                                    <i class="far fa-copy"></i>
                                                                                </span>
                                                                                <span onclick="return rureraform_properties_options_delete(this);" title="Delete the option">
                                                                                    <i class="fas fa-trash-alt"></i>
                                                                                </span>
                                                                                <span title="Move the option">
                                                                                    <i class="fas fa-arrows-alt rureraform-properties-options-item-handler ui-sortable-handle"></i>
                                                                                </span>
                                                                                </div>
                                                                            </div>
                                                                            </div>
                                                                            <div class="rureraform-properties-options-item">
                                                                            <div class="rureraform-properties-options-table">
                                                                                <div>
                                                                                <input class="rureraform-properties-options-label" type="text" value="Chloroplasts" placeholder="Label">
                                                                                </div>
                                                                                <div class="rureraform-image-url rurera-image-depend rurera-hide">
                                                                                <div class="input-group-prepend">
                                                                                    <button type="button" class="input-group-text admin-file-manager" data-input="image-options-1" data-preview="holder">
                                                                                    <i class="fa fa-upload"></i>
                                                                                    </button>
                                                                                </div>
                                                                                <input class="rureraform-properties-options-image" type="text" id="image-options-1" value="" placeholder="Upload Image">
                                                                                <span>
                                                                                    <i class="far fa-image"></i>
                                                                                </span>
                                                                                </div>
                                                                                <div class="rurera-hide">
                                                                                <input class="rureraform-properties-options-value" type="text" value="Chloroplasts" placeholder="Value">
                                                                                </div>
                                                                                <div>
                                                                                <span onclick="return rureraform_properties_options_default(this);" title="Set the option as correct value">
                                                                                    <i class="fas fa-check"></i>
                                                                                </span>
                                                                                <span onclick="return rureraform_properties_options_copy(this);" title="Duplicate the option">
                                                                                    <i class="far fa-copy"></i>
                                                                                </span>
                                                                                <span onclick="return rureraform_properties_options_delete(this);" title="Delete the option">
                                                                                    <i class="fas fa-trash-alt"></i>
                                                                                </span>
                                                                                <span title="Move the option">
                                                                                    <i class="fas fa-arrows-alt rureraform-properties-options-item-handler ui-sortable-handle"></i>
                                                                                </span>
                                                                                </div>
                                                                            </div>
                                                                            </div>
                                                                            <div class="rureraform-properties-options-item">
                                                                            <div class="rureraform-properties-options-table">
                                                                                <div>
                                                                                <input class="rureraform-properties-options-label" type="text" value="Tissues" placeholder="Label">
                                                                                </div>
                                                                                <div class="rureraform-image-url rurera-image-depend rurera-hide">
                                                                                <div class="input-group-prepend">
                                                                                    <button type="button" class="input-group-text admin-file-manager" data-input="image-options-2" data-preview="holder">
                                                                                    <i class="fa fa-upload"></i>
                                                                                    </button>
                                                                                </div>
                                                                                <input class="rureraform-properties-options-image" type="text" id="image-options-2" value="" placeholder="Upload Image">
                                                                                <span>
                                                                                    <i class="far fa-image"></i>
                                                                                </span>
                                                                                </div>
                                                                                <div class="rurera-hide">
                                                                                <input class="rureraform-properties-options-value" type="text" value="Tissues" placeholder="Value">
                                                                                </div>
                                                                                <div>
                                                                                <span onclick="return rureraform_properties_options_default(this);" title="Set the option as correct value">
                                                                                    <i class="fas fa-check"></i>
                                                                                </span>
                                                                                <span onclick="return rureraform_properties_options_copy(this);" title="Duplicate the option">
                                                                                    <i class="far fa-copy"></i>
                                                                                </span>
                                                                                <span onclick="return rureraform_properties_options_delete(this);" title="Delete the option">
                                                                                    <i class="fas fa-trash-alt"></i>
                                                                                </span>
                                                                                <span title="Move the option">
                                                                                    <i class="fas fa-arrows-alt rureraform-properties-options-item-handler ui-sortable-handle"></i>
                                                                                </span>
                                                                                </div>
                                                                            </div>
                                                                            </div>
                                                                            <div class="rureraform-properties-options-item">
                                                                            <div class="rureraform-properties-options-table">
                                                                                <div>
                                                                                <input class="rureraform-properties-options-label" type="text" value="Nuclei" placeholder="Label">
                                                                                </div>
                                                                                <div class="rureraform-image-url rurera-image-depend rurera-hide">
                                                                                <div class="input-group-prepend">
                                                                                    <button type="button" class="input-group-text admin-file-manager" data-input="image-options-3" data-preview="holder">
                                                                                    <i class="fa fa-upload"></i>
                                                                                    </button>
                                                                                </div>
                                                                                <input class="rureraform-properties-options-image" type="text" id="image-options-3" value="" placeholder="Upload Image">
                                                                                <span>
                                                                                    <i class="far fa-image"></i>
                                                                                </span>
                                                                                </div>
                                                                                <div class="rurera-hide">
                                                                                <input class="rureraform-properties-options-value" type="text" value="Nuclei" placeholder="Value">
                                                                                </div>
                                                                                <div>
                                                                                <span onclick="return rureraform_properties_options_default(this);" title="Set the option as correct value">
                                                                                    <i class="fas fa-check"></i>
                                                                                </span>
                                                                                <span onclick="return rureraform_properties_options_copy(this);" title="Duplicate the option">
                                                                                    <i class="far fa-copy"></i>
                                                                                </span>
                                                                                <span onclick="return rureraform_properties_options_delete(this);" title="Delete the option">
                                                                                    <i class="fas fa-trash-alt"></i>
                                                                                </span>
                                                                                <span title="Move the option">
                                                                                    <i class="fas fa-arrows-alt rureraform-properties-options-item-handler ui-sortable-handle"></i>
                                                                                </span>
                                                                                </div>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
                                                                        </div>
                                                                        <div class="rureraform-properties-options-table-footer">
                                                                            <a class="rureraform-admin-button rureraform-admin-button-gray rureraform-admin-button-small" data-toggle="collapse" href="#explanation" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                                <i class="fas fa-plus"></i>
                                                                                <label>Add Explanation..</label>
                                                                            </a>
                                                                            <div class="explanation-box collapse mt-15" id="explanation">
                                                                                <textarea name="explanation" class="form-control"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="rureraform-properties-item " data-id="template_style">
                                                                    <div class="rureraform-properties-tooltip"></div>
                                                                    <div class="rureraform-properties-content">
                                                                        <div class="rureraform-third">
                                                                        <select name="rureraform-template_style" id="rureraform-template_style" class="">
                                                                            <option selected="selected" value="rurera-in-row">Row</option>
                                                                            <option value="rurera-in-cols">Columns</option>
                                                                        </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="rureraform-properties-item " data-id="list_style">
                                                                    <div class="rureraform-properties-label">
                                                                        <label>Bullet list Style</label>
                                                                    </div>
                                                                    <div class="rureraform-properties-tooltip"></div>
                                                                    <div class="rureraform-properties-content">
                                                                        <div class="bullet-controls">
                                                                            <button type="button">Enabled</button>
                                                                            <button type="button">Enabled</button>
                                                                            <button type="button" class="active">Selected</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <input type="hidden" name="rureraform-elements_data" id="rureraform-elements_data" value="W3t9XQ==" placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="rureraform-admin-popup-buttons">
                                                            <a class="rureraform-admin-button duplicate-element btn btn-primary" href="#">
                                                            <label>Update</label>
                                                            </a>
                                                            <a class="rureraform-admin-button generate-question-code rurera-hide" href="#">
                                                            <label>Apply Changes</label>
                                                            </a>
                                                        </div>
                                                        <div class="rureraform-admin-popup-loading" style="display: none;">
                                                            <i class="fas fa-spinner fa-spin"></i>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="mb-0 bg-white panel-border rounded-sm p-25 mb-25">
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
                                                            <span class="question-count-lable">Question 3 of 20</span>
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
                                                                <span class="label-box"></span>
                                                                <span class="inner-label">True</span>
                                                            </label>
                                                        </div>
                                                        <div class="form-field rureraform-cr-container-medium rureraform-cr-container-undefined">
                                                            <input class="editor-field" type="radio" name="field-40008" id="field-40008-1" value="False">
                                                            <label for="field-40008-1">
                                                                <span class="label-box"></span>
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
                                                                <span class="label-box"></span>
                                                                <span class="inner-label">True</span>
                                                            </label>
                                                        </div>
                                                        <div class="form-field rureraform-cr-container-medium rureraform-cr-container-undefined">
                                                            <input class="editor-field" type="radio" name="field-84793" id="field-84793-1" value="False">
                                                            <label for="field-84793-1">
                                                                <span class="label-box"></span>
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
                                                                <span class="label-box"></span>
                                                                <span class="inner-label">True</span>
                                                            </label>
                                                        </div>
                                                        <div class="form-field rureraform-cr-container-medium rureraform-cr-container-undefined">
                                                            <input class="editor-field" type="radio" name="field-21459" id="field-21459-1" value="False">
                                                            <label for="field-21459-1">
                                                                <span class="label-box"></span>
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
                            </div>
                            <div class="bg-white panel-border rounded-sm p-25">
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
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                            <div class="question-layout-holder mb-0 bg-white panel-border rounded-sm p-25 mb-25">
                                <div class="question-check-option">
                                    <input type="checkbox" id="q-check2">
                                    <label for="q-check2" class="question-check-box">
                                        <div class="question-layout-block">
                                            <form class="question-fields" action="javascript:;" data-question_id="10180">
                                                <div class="left-content has-bg">
                                                    <div id="rureraform-form-1" class=" rureraform-form rureraform-elements rureraform-form-input-medium rureraform-form-icon-inside rureraform-form-description-bottom ui-sortable" _data-parent="1" _data-parent-col="0" style="display: block;">
                                                        <div class="question-layout row d-flex align-items-start">
                                                            <div class="rureraform-col rureraform-col-12">
                                                                <div class="rureraform-element quiz-group rureraform-element-html ui-sortable-handle">
                                                                    <div class="question-top-info">
                                                                        <div class="question-count">
                                                                            <span class="question-count-lable">Question 5 of 20</span>
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
                                                                            <div class="form-box  rurera-in-row alphabet-list-style">
                                                                                <div class="form-field rureraform-cr-container-medium ">
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
                                                <div class="canvas-editable-options-holder">
                                                    <div class="canvas-editable-options lms-quiz-create">
                                                        <div class="lms-element-properties">
                                                            <div class="row">
                                                                <div class="topic-parts-block rurera-hide" style="display:contents;"></div>
                                                            </div>
                                                            <div class="rureraform-admin-popup active" id="rureraform-element-properties" style="display: block;" data-element_id="rureraform-element-3">
                                                                <div class="rureraform-admin-popup-inner">
                                                                <div class="rureraform-admin-popup-title">
                                                                    <a href="#" title="Close">
                                                                        <i class="fas fa-times"></i>
                                                                    </a>
                                                                    <h3>
                                                                        <i class="fas fa-cog element-properties-label"></i> Multiple Choice 1
                                                                    </h3>
                                                                </div>
                                                                <div class="rureraform-admin-popup-content">
                                                                    <div class="rureraform-admin-popup-content-form">
                                                                        <div id="rureraform-tab-basic" class="rureraform-tab-content" style="display: block;">
                                                                            <input type="hidden" name="rureraform-field_id" id="rureraform-field_id" value="48453" placeholder="">
                                                                            <div class="rureraform-properties-item " data-id="label">
                                                                                <div class="rureraform-properties-label">
                                                                                    <label>Label</label>
                                                                                </div>
                                                                                <div class="rureraform-properties-content">
                                                                                    <input type="text" name="rureraform-label" id="rureraform-label" value="Mark One answer" placeholder="">
                                                                                </div>
                                                                        </div>
                                                                        <div class="rureraform-properties-item d-flex align-items-center justify-content-between" data-id="have_images">
                                                                            <div class="rureraform-properties-label pb-0">
                                                                                <label>Answer with image</label>
                                                                            </div>
                                                                            <div class="form-group custom-switches-stacked mb-0">
                                                                                <label class="custom-switch pl-0 mb-0">
                                                                                    <input type="checkbox" name="answer-with-image" id="answer-with-image" value="1" class="custom-switch-input">
                                                                                    <span class="custom-switch-indicator"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="rureraform-properties-item">
                                                                            <div class="properties-select-boxes">
                                                                                <div class="img-select-box">
                                                                                    <input type="radio" name="img-box" id="box1">
                                                                                    <label for="box1">
                                                                                        <img src="/store/1/tool-images/d5.png" alt="d5">
                                                                                        <span>List</span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="img-select-box">
                                                                                    <input type="radio" name="img-box" id="box2">
                                                                                    <label for="box2">
                                                                                        <img src="/store/1/tool-images/d14.png" alt="d14">
                                                                                        <span>Essay</span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="rureraform-properties-item rurera-image-depend rurera-hide" data-id="image_position">
                                                                            <div class="rureraform-properties-label">
                                                                                <label>Image Position</label>
                                                                            </div>
                                                                        <div class="rureraform-properties-tooltip"></div>
                                                                        <div class="rureraform-properties-content">
                                                                            <div class="rureraform-third">
                                                                            <select name="rureraform-image_position" id="rureraform-image_position" class="">
                                                                                <option selected="selected" value="top">Top</option>
                                                                                <option value="left">Left</option>
                                                                                <option value="right">Right</option>
                                                                            </select>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                        <div class="rureraform-properties-item" data-id="options">
                                                                            <div class="rureraform-properties-label">
                                                                                <label>Options</label>
                                                                            </div>
                                                                            <div class="rureraform-properties-content rureraform-properties-image-options-table">
                                                                                <div class="rureraform-properties-options-table-header">
                                                                                <div class="rurera-image-depend rurera-hide">Image</div>
                                                                                <div class="rurera-hide">Value</div>
                                                                                <div></div>
                                                                                </div>
                                                                                <div class="rureraform-properties-options-box ui-resizable">
                                                                                <div class="rureraform-properties-options-container ui-sortable" data-multi="on">
                                                                                    <div class="rureraform-properties-options-item rureraform-properties-options-item-default">
                                                                                    <div class="rureraform-properties-options-table">
                                                                                        <div>
                                                                                        <input class="rureraform-properties-options-label" type="text" value="Cells" placeholder="Label">
                                                                                        </div>
                                                                                        <div class="rureraform-image-url rurera-image-depend rurera-hide">
                                                                                        <div class="input-group-prepend">
                                                                                            <button type="button" class="input-group-text admin-file-manager" data-input="image-options-0" data-preview="holder">
                                                                                            <i class="fa fa-upload"></i>
                                                                                            </button>
                                                                                        </div>
                                                                                        <input class="rureraform-properties-options-image" type="text" id="image-options-0" value="" placeholder="Upload Image">
                                                                                        <span>
                                                                                            <i class="far fa-image"></i>
                                                                                        </span>
                                                                                        </div>
                                                                                        <div class="rurera-hide">
                                                                                        <input class="rureraform-properties-options-value" type="text" value="Cells" placeholder="Value">
                                                                                        </div>
                                                                                        <div>
                                                                                        <span onclick="return rureraform_properties_options_default(this);" title="Set the option as correct value">
                                                                                            <i class="fas fa-check"></i>
                                                                                        </span>
                                                                                        <span onclick="return rureraform_properties_options_copy(this);" title="Duplicate the option">
                                                                                            <i class="far fa-copy"></i>
                                                                                        </span>
                                                                                        <span onclick="return rureraform_properties_options_delete(this);" title="Delete the option">
                                                                                            <i class="fas fa-trash-alt"></i>
                                                                                        </span>
                                                                                        <span title="Move the option">
                                                                                            <i class="fas fa-arrows-alt rureraform-properties-options-item-handler ui-sortable-handle"></i>
                                                                                        </span>
                                                                                        </div>
                                                                                    </div>
                                                                                    </div>
                                                                                    <div class="rureraform-properties-options-item">
                                                                                    <div class="rureraform-properties-options-table">
                                                                                        <div>
                                                                                        <input class="rureraform-properties-options-label" type="text" value="Chloroplasts" placeholder="Label">
                                                                                        </div>
                                                                                        <div class="rureraform-image-url rurera-image-depend rurera-hide">
                                                                                        <div class="input-group-prepend">
                                                                                            <button type="button" class="input-group-text admin-file-manager" data-input="image-options-1" data-preview="holder">
                                                                                            <i class="fa fa-upload"></i>
                                                                                            </button>
                                                                                        </div>
                                                                                        <input class="rureraform-properties-options-image" type="text" id="image-options-1" value="" placeholder="Upload Image">
                                                                                        <span>
                                                                                            <i class="far fa-image"></i>
                                                                                        </span>
                                                                                        </div>
                                                                                        <div class="rurera-hide">
                                                                                        <input class="rureraform-properties-options-value" type="text" value="Chloroplasts" placeholder="Value">
                                                                                        </div>
                                                                                        <div>
                                                                                        <span onclick="return rureraform_properties_options_default(this);" title="Set the option as correct value">
                                                                                            <i class="fas fa-check"></i>
                                                                                        </span>
                                                                                        <span onclick="return rureraform_properties_options_copy(this);" title="Duplicate the option">
                                                                                            <i class="far fa-copy"></i>
                                                                                        </span>
                                                                                        <span onclick="return rureraform_properties_options_delete(this);" title="Delete the option">
                                                                                            <i class="fas fa-trash-alt"></i>
                                                                                        </span>
                                                                                        <span title="Move the option">
                                                                                            <i class="fas fa-arrows-alt rureraform-properties-options-item-handler ui-sortable-handle"></i>
                                                                                        </span>
                                                                                        </div>
                                                                                    </div>
                                                                                    </div>
                                                                                    <div class="rureraform-properties-options-item">
                                                                                    <div class="rureraform-properties-options-table">
                                                                                        <div>
                                                                                        <input class="rureraform-properties-options-label" type="text" value="Tissues" placeholder="Label">
                                                                                        </div>
                                                                                        <div class="rureraform-image-url rurera-image-depend rurera-hide">
                                                                                        <div class="input-group-prepend">
                                                                                            <button type="button" class="input-group-text admin-file-manager" data-input="image-options-2" data-preview="holder">
                                                                                            <i class="fa fa-upload"></i>
                                                                                            </button>
                                                                                        </div>
                                                                                        <input class="rureraform-properties-options-image" type="text" id="image-options-2" value="" placeholder="Upload Image">
                                                                                        <span>
                                                                                            <i class="far fa-image"></i>
                                                                                        </span>
                                                                                        </div>
                                                                                        <div class="rurera-hide">
                                                                                        <input class="rureraform-properties-options-value" type="text" value="Tissues" placeholder="Value">
                                                                                        </div>
                                                                                        <div>
                                                                                        <span onclick="return rureraform_properties_options_default(this);" title="Set the option as correct value">
                                                                                            <i class="fas fa-check"></i>
                                                                                        </span>
                                                                                        <span onclick="return rureraform_properties_options_copy(this);" title="Duplicate the option">
                                                                                            <i class="far fa-copy"></i>
                                                                                        </span>
                                                                                        <span onclick="return rureraform_properties_options_delete(this);" title="Delete the option">
                                                                                            <i class="fas fa-trash-alt"></i>
                                                                                        </span>
                                                                                        <span title="Move the option">
                                                                                            <i class="fas fa-arrows-alt rureraform-properties-options-item-handler ui-sortable-handle"></i>
                                                                                        </span>
                                                                                        </div>
                                                                                    </div>
                                                                                    </div>
                                                                                    <div class="rureraform-properties-options-item">
                                                                                    <div class="rureraform-properties-options-table">
                                                                                        <div>
                                                                                        <input class="rureraform-properties-options-label" type="text" value="Nuclei" placeholder="Label">
                                                                                        </div>
                                                                                        <div class="rureraform-image-url rurera-image-depend rurera-hide">
                                                                                        <div class="input-group-prepend">
                                                                                            <button type="button" class="input-group-text admin-file-manager" data-input="image-options-3" data-preview="holder">
                                                                                            <i class="fa fa-upload"></i>
                                                                                            </button>
                                                                                        </div>
                                                                                        <input class="rureraform-properties-options-image" type="text" id="image-options-3" value="" placeholder="Upload Image">
                                                                                        <span>
                                                                                            <i class="far fa-image"></i>
                                                                                        </span>
                                                                                        </div>
                                                                                        <div class="rurera-hide">
                                                                                        <input class="rureraform-properties-options-value" type="text" value="Nuclei" placeholder="Value">
                                                                                        </div>
                                                                                        <div>
                                                                                        <span onclick="return rureraform_properties_options_default(this);" title="Set the option as correct value">
                                                                                            <i class="fas fa-check"></i>
                                                                                        </span>
                                                                                        <span onclick="return rureraform_properties_options_copy(this);" title="Duplicate the option">
                                                                                            <i class="far fa-copy"></i>
                                                                                        </span>
                                                                                        <span onclick="return rureraform_properties_options_delete(this);" title="Delete the option">
                                                                                            <i class="fas fa-trash-alt"></i>
                                                                                        </span>
                                                                                        <span title="Move the option">
                                                                                            <i class="fas fa-arrows-alt rureraform-properties-options-item-handler ui-sortable-handle"></i>
                                                                                        </span>
                                                                                        </div>
                                                                                    </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
                                                                                </div>
                                                                                <div class="rureraform-properties-options-table-footer">
                                                                                    <a class="rureraform-admin-button rureraform-admin-button-gray rureraform-admin-button-small" data-toggle="collapse" href="#explanation" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                                        <i class="fas fa-plus"></i>
                                                                                        <label>Add Explanation..</label>
                                                                                    </a>
                                                                                    <div class="explanation-box collapse mt-15" id="explanation">
                                                                                        <textarea name="explanation" class="form-control"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="rureraform-properties-item " data-id="template_style">
                                                                            <div class="rureraform-properties-tooltip"></div>
                                                                            <div class="rureraform-properties-content">
                                                                                <div class="rureraform-third">
                                                                                <select name="rureraform-template_style" id="rureraform-template_style" class="">
                                                                                    <option selected="selected" value="rurera-in-row">Row</option>
                                                                                    <option value="rurera-in-cols">Columns</option>
                                                                                </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="rureraform-properties-item " data-id="list_style">
                                                                            <div class="rureraform-properties-label">
                                                                                <label>Bullet list Style</label>
                                                                            </div>
                                                                            <div class="rureraform-properties-tooltip"></div>
                                                                            <div class="rureraform-properties-content">
                                                                                <div class="bullet-controls">
                                                                                    <button type="button">Enabled</button>
                                                                                    <button type="button">Enabled</button>
                                                                                    <button type="button" class="active">Selected</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <input type="hidden" name="rureraform-elements_data" id="rureraform-elements_data" value="W3t9XQ==" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="rureraform-admin-popup-buttons">
                                                                    <a class="rureraform-admin-button duplicate-element btn btn-primary" href="#">
                                                                    <label>Update</label>
                                                                    </a>
                                                                    <a class="rureraform-admin-button generate-question-code rurera-hide" href="#">
                                                                    <label>Apply Changes</label>
                                                                    </a>
                                                                </div>
                                                                <div class="rureraform-admin-popup-loading" style="display: none;">
                                                                    <i class="fas fa-spinner fa-spin"></i>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                    </label>
                                </div>
                            </div>
                            <div class="mb-0 bg-white panel-border rounded-sm p-25 mb-25">
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
                                                            <span class="question-count-lable">Question 2 of 20</span>
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
                                                                    <span class="label-box"></span>
                                                                    <span class="inner-label">True</span>
                                                                </label>
                                                            </div>
                                                            <div class="form-field rureraform-cr-container-medium rureraform-cr-container-undefined">
                                                                <input class="editor-field" type="radio" name="field-40008" id="field-40008-1" value="False">
                                                                <label for="field-40008-1">
                                                                    <span class="label-box"></span>
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
                                                                <span class="label-box"></span>
                                                                <span class="inner-label">True</span>
                                                            </label>
                                                        </div>
                                                        <div class="form-field rureraform-cr-container-medium rureraform-cr-container-undefined">
                                                            <input class="editor-field" type="radio" name="field-84793" id="field-84793-1" value="False">
                                                            <label for="field-84793-1">
                                                                <span class="label-box"></span>
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
                                                                    <span class="label-box"></span>
                                                                    <span class="inner-label">True</span>
                                                                </label>
                                                            </div>
                                                            <div class="form-field rureraform-cr-container-medium rureraform-cr-container-undefined">
                                                                <input class="editor-field" type="radio" name="field-21459" id="field-21459-1" value="False">
                                                                <label for="field-21459-1">
                                                                    <span class="label-box"></span>
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
                            </div>
                            <div class="bg-white panel-border rounded-sm p-25">
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
  const $scrollableDiv = $(".enhance-questions-modal");
  $scrollableDiv.niceScroll({
    cursorcolor: "red",
    cursorwidth: "8px",
    autohidemode: true
  });

  $(".document-modal").on("shown.bs.modal", function () {
    $scrollableDiv.getNiceScroll().resize();
  });

});
</script>
<script>
$(document).ready(function() {
    $(".blank-canvas-modal .rureraform-element, .lms-quiz-create .rureraform-admin-popup-title a").click(function(e) {
        e.stopPropagation();
        $(".canvas-editable-options-holder").toggleClass("active");
    });

    $(document).mouseup(function(e) {
        var container = $(".canvas-editable-options-holder");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.removeClass("active");
        }
    });
});
</script>

<script type="text/javascript">

$(document).ready(function () {
  const $scrollableDiv = $(".blank-canvas-sidebar, .canvas-editable-options");

  // Initialize NiceScroll with auto-hide enabled
  $scrollableDiv.niceScroll({
    cursorcolor: "red",
    cursorwidth: "8px",
    autohidemode: true // Auto-hide enabled initially
  });


  // Reinitialize NiceScroll when the modal is shown
  $(".blank-canvas-modal").on("shown.bs.modal", function () {
    $scrollableDiv.getNiceScroll().resize();
  });

});
</script>
<script>
    document.querySelectorAll('.editable').forEach(element => {
        element.addEventListener('focus', () => {
            // Save the initial text if needed
            element.dataset.oldText = element.textContent;
        });

        element.addEventListener('blur', () => {
            // Handle the change if needed
            if (element.textContent !== element.dataset.oldText) {
                console.log("Text changed to:", element.textContent);
            }
        });
    });
</script>

<script src="/assets/default/js/jquery-ui.js"></script>
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip({
            container: '.admin_teacher_role'
        });

        $('.show-btn').on('click',function () {
            $('.show-btn').toggleClass('show');
        });
    });
</script>

<!-- JavaScript for Drag and Drop -->
 <!-- Enable Sortable Functionality -->
 <script>
    $(document).ready(function () {
        // Make the sidebar list sortable
        $("#sortable").sortable();
        $("#sortable").disableSelection();
    });
</script>
<script>
    const gridContainer = document.getElementById("gridContainer");
    let draggedItem = null;

    // Event listeners for drag and drop
    document.querySelectorAll(".grid-item").forEach(item => {
        item.addEventListener("dragstart", (e) => {
            draggedItem = item;
            setTimeout(() => item.classList.add("dragging"), 0);
        });

        item.addEventListener("dragend", () => {
            draggedItem.classList.remove("dragging");
            draggedItem = null;
        });
    });

    gridContainer.addEventListener("dragover", (e) => {
        e.preventDefault();
        const afterElement = getDragAfterElement(gridContainer, e.clientY);
        if (afterElement == null) {
            gridContainer.appendChild(draggedItem);
        } else {
            gridContainer.insertBefore(draggedItem, afterElement);
        }
    });

    // Helper function to determine position
    function getDragAfterElement(container, y) {
        const draggableElements = [...container.querySelectorAll(".grid-item:not(.dragging)")];

        return draggableElements.reduce((closest, child) => {
            const box = child.getBoundingClientRect();
            const offset = y - box.top - box.height / 2;
            if (offset < 0 && offset > closest.offset) {
                return { offset: offset, element: child };
            } else {
                return closest;
            }
        }, { offset: Number.NEGATIVE_INFINITY }).element;
    }
</script>
<!-- <script>
    // Open modal and activate tab based on URL fragment
    $(document).ready(function() {
        // Check if the URL contains a fragment
        var hash = window.location.hash;
        if (hash) {
            // Open the modal
            $('#templatesleModal').modal('show');
            // Activate the corresponding tab
            $('a[href="' + hash + '"]').tab('show');
        }

        // Listen for tab change to update URL fragment
        $('#templatesleModal').on('shown.bs.modal', function () {
            var activeTab = $('#myTab .nav-link.active').attr('href');
            window.location.hash = activeTab;
        });
        // When the modal is closed, remove the hash from the URL
        $('#templatesleModal').on('hidden.bs.modal', function () {
            history.pushState("", document.title, window.location.pathname + window.location.search);
        });
    });
</script> -->
<script>
    /*Skelton Loading Fungtion Start*/
    $(document).ready(function () {
        const $el = document.querySelector(".section-body");

        setTimeout(() => {
        $el.classList.remove("skeleton");
        $el
            .querySelectorAll(".skelton-hide")
            .forEach((el) => el.classList.remove("skelton-hide"));
        }, 3000);
    });
    /*Skelton Loading Fungtion End*/
</script>

@endpush
