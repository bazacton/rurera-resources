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
                <div class="report-table">
                    <table>
                        <thead>
                            <tr>
                                <th rowspan="2">First Name</th>
                                <th rowspan="2">Last Name</th>
                                <th colspan="4" class="report-title bg-danger">1: Global Geography</th>
                                <th colspan="5" class="report-title">2: UK Geographical Issues</th>
                                <th colspan="4" class="report-title">3: People & Environment</th>
                                <th rowspan="2">Maximum Target Grade</th>
                                <th rowspan="2">Unit Marks</th>
                                <th rowspan="2">Current Grade</th>
                                <th rowspan="2">Average Unit %</th>
                            </tr>
                            <tr>
                                <th style="background-color: #ffb3b3"><span>Hazardous Earth</span></th>
                                <th style="background-color: #ffb3b3"><span>Development Dynamics</span></th>
                                <th style="background-color: #ffb3b3"><span>Challenges of Urbanization</span></th>
                                <th style="background-color: #ffb3b3">Paper Grade <span></span></th>
                                <th><span>The UK Economy</span></th>
                                <th><span>Coastal Changes</span></th>
                                <th><span>Dynamic Urban Areas</span></th>
                                <th><span>Choice 1</span></th>
                                <th><span>Choice 2</span></th>
                                <th><span>People Under Threat</span></th>
                                <th><span>Consuming Resources</span></th>
                                <th><span>Paper Grade</span></th>
                                <th><span>Overall Marks</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tracy</td>
                                <td>Beaker</td>
                                <td>17</td>
                                <td>17</td>
                                <td>15</td>
                                <td class="highlight-blue">5</td>
                                <td>25</td>
                                <td>12</td>
                                <td>15</td>
                                <td>9</td>
                                <td>9</td>
                                <td>17</td>
                                <td>17</td>
                                <td class="highlight-green">7</td>
                                <td>50</td>
                                <td>64</td>
                                <td>4</td>
                                <td>3.80</td>
                            </tr>
                            <tr>
                                <td>Lyra</td>
                                <td>Belacqua</td>
                                <td>18</td>
                                <td>18</td>
                                <td>16</td>
                                <td class="highlight-blue">5</td>
                                <td>22</td>
                                <td>16</td>
                                <td>13</td>
                                <td>8</td>
                                <td>8</td>
                                <td>18</td>
                                <td>18</td>
                                <td class="highlight-green">7</td>
                                <td>51</td>
                                <td>87</td>
                                <td>5</td>
                                <td>3.80</td>
                            </tr>
                            <tr>
                                <td>Charlie</td>
                                <td>Bucket</td>
                                <td>15</td>
                                <td>15</td>
                                <td>14</td>
                                <td class="highlight-red">3</td>
                                <td>20</td>
                                <td>11</td>
                                <td>12</td>
                                <td>7</td>
                                <td>6</td>
                                <td>16</td>
                                <td>14</td>
                                <td class="highlight-red">4</td>
                                <td>38</td>
                                <td>53</td>
                                <td>3</td>
                                <td>3.03</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12">
                <div class="progress-table">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>
                                    <div class="word-selection-box">
                                        <div class="word-controls">
                                            <button type="button">U</button>
                                            <button type="button" class="target">T</button>
                                            <button type="button" class="almost">A</button>
                                            <button type="button" class="met">M</button>
                                            <button type="button" class="exceeding">E</button>
                                            <button class="remove-btn"><img src="/assets/default/svgs/paint-brush.svg" alt=""></button>
                                        </div>
                                        <span class="selection-status"><em>0</em> Selection</span>
                                        <button type="button" class="clear-btn"><img src="/assets/default/svgs/dot-circle.svg" alt=""> Clear Selection</button>
                                    </div>
                                </th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Azeneth Armando</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Amelie Austin</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Eloise Chapman</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Aaliyah Collier</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Bailey Cook</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Jasmine Doyle</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Jorginho Gaspar</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Jayden Glover</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Prabodh Iyer</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Avinash Jain</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Ansel Jobin</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Makary Kaczmarek</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Kajal Korrapati</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Rishi Korrapati</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Bùi Thị Lự Chị</th>
                                <th><span class="icon-box"><i class="fas fa-user"></i></span>Yue Wan Lü</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="has-met">
                                    <div class="text-box">
                                        <button type="button" class="collaps-btn"><span class="icon-box"><img src="/assets/default/svgs/arrow-right.svg" alt=""></span></button>
                                        Count NAHT KPI Count 2.1.a.1 Count in tens from any number, forward and backward
                                    </div>
                                </td>
                                <td class="met"><span>Met</span>M</td>
                                <td class="almost"><span>Almost</span>A</td>
                                <td class="target"><span>Target</span>T</td>
                                <td class="met"><span>Met</span>M</td>
                                <td class="almost"><span>Almost</span>A</td>
                                <td class="met"><span>Met</span>M</td>
                                <td class="met"><span>Met</span>M</td>
                                <td class="almost"><span>Almost</span>A</td>
                                <td class="met"><span>Met</span>M</td>
                                <td class="almost"><span>Almost</span>A</td>
                                <td class="met"><span>Met</span>M</td>
                                <td class="almost"><span>Almost</span>A</td>
                                <td class="met"><span>Met</span>M</td>
                                <td class="almost"><span>Almost</span>A</td>
                                <td class="met"><span>Met</span>M</td>
                                <td class="almost"><span>Almost</span>A</td>
                            </tr>
                            <tr>
                                <td class="has-met">
                                    <div class="text-box">
                                        <button type="button" class="collaps-btn"><span class="icon-box"><img src="/assets/default/svgs/arrow-right.svg" alt=""></span></button>
                                        Count NAHT KPI Count 2.1.a.2 Identify ten more or ten less than any given number
                                    </div>
                                </td>
                                <td class="almost">A</td>
                                <td class="exceeding">E</td>
                                <td class="target">T</td>
                                <td class="met">M</td>
                                <td class="met">M</td>
                                <td class="met">M</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="met">M</td>
                                <td class="target">T</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                            </tr>
                            <tr>
                                <td class="has-met">
                                    <div class="text-box">
                                        <button type="button" class="collaps-btn"><span class="icon-box"><img src="/assets/default/svgs/arrow-right.svg" alt=""></span></button>
                                        Order and compare NAHT KPI Order and compare 2.1.c.1 Compare and order numbers from 0 up to 100; use &lt;, &gt; and = signs
                                    </div>
                                </td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="met">M</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="met">M</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                                <td class="almost">A</td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
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
                                                            <span class="question-count-lable">Question 2 of 12</span>
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
                                        <button class="collapsed" type="button" data-toggle="collapse" data-target="#explanation-list1" aria-expanded="false" aria-controls="explanation-list">
                                            <i class="fas fa-plus"></i> Add Explanation
                                        </button>
                                    </div>
                                    <div class="collapse" id="explanation-list1">
                                        <textarea class="form-control"></textarea>
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
                                            <i class="fas fa-plus"></i> Add Explanation
                                        </button>
                                    </div>
                                    <div class="collapse" id="explanation-list2">
                                        <textarea class="form-control"></textarea>
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
                                            <i class="fas fa-plus"></i> Add Explanation
                                        </button>
                                    </div>
                                    <div class="collapse" id="explanation-list3">
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
</section>

@endsection

@push('scripts_bottom')


@endpush
