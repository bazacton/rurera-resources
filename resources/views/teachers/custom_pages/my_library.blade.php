@extends('admin.layouts.app')

@push('libraries_top')

@endpush

@section('content')
<section class="section">
    <div class="question-ai-tabs">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Blank Canvas</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Staff picks</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Generate with AI</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="import-tab" data-toggle="tab" data-target="#import-q" type="button" role="tab" aria-controls="import-q" aria-selected="false">Import Questions</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h6>Or select a question type to add question</h6>
                <div class="canvas-list">
                    <ul>
                        <li><span class="icon-box" style="background-color: #8854bf;"><i class="fas fa-check"></i></span> Multiple Choice</li>
                        <li><span class="icon-box" style="background-color: #8854bf;"><i class="fas fa-fill-drip"></i></span> Fill in the Blank</li>
                    </ul>
                    <span class="canvas-sub-title">Open ended responses</span>
                    <ul>
                        <li><span class="icon-box" style="background-color: #2e73af;"><i class="fas fa-pencil-alt"></i></span> Draw</li>
                        <li><span class="icon-box" style="background-color: #2e73af;"><i class="fas fa-bars"></i></span> Open Ended</li>
                        <li><span class="icon-box" style="background-color: #2e73af;"><i class="fas fa-video"></i></span> Video Response</li>
                        <li><span class="icon-box" style="background-color: #2e73af;"><i class="fas fa-microphone"></i></span> Audio Response</li>
                        <li><span class="icon-box" style="background-color: #2e73af;"><i class="fas fa-meh-blank"></i></span> Poll</li>
                        <li><span class="icon-box" style="background-color: #2e73af;"><i class="fas fa-meh-blank"></i></span> Word Cloud</li>
                    </ul>
                    
                    <span>Interactive/Higher-order thinking</span>
                    <ul>
                        <li><span class="icon-box" style="background-color: #00a068;"><i class="fas fa-meh-blank"></i></span> Match</li>
                        <li><span class="icon-box" style="background-color: #00a068;"><i class="fas fa-meh-blank"></i></span> Reorder</li>
                        <li><span class="icon-box" style="background-color: #00a068;"><i class="fas fa-hand-paper"></i></span> Drag and Drop</li>
                        <li><span class="icon-box" style="background-color: #00a068;"><i class="fas fa-meh-blank"></i></span> Drop Down</li>
                        <li><span class="icon-box" style="background-color: #00a068;"><i class="fas fas fa-wifi"></i></span> Hotspot</li>
                        <li><span class="icon-box" style="background-color: #00a068;"><i class="fas fa-meh-blank"></i></span> Labeling</li>
                        <li><span class="icon-box" style="background-color: #00a068;"><i class="fas fa-meh-blank"></i></span> Categorize</li>
                    </ul>
                    <span>Mathematics</span>
                    <ul>
                        <li><span class="icon-box" style="background-color: #e27a16;"><i class="fas fa-meh-blank"></i></span> Math Response</li>
                        <li><span class="icon-box" style="background-color: #e27a16;"><i class="fas fa-meh-blank"></i></span> Graphing</li>
                    </ul>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
                        </div>
                        <div class="tab-pane fade" id="prompt" role="tabpanel" aria-labelledby="prompt-tab">...</div>
                        <div class="tab-pane fade" id="website" role="tabpanel" aria-labelledby="website-tab">...</div>
                        <div class="tab-pane fade" id="utube" role="tabpanel" aria-labelledby="utube-tab">...</div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="mb-30 bg-white panel-border rounded-sm p-15">
                    <h6 class="search-lable">Srarch question from library</h6>
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
            </div>
            <div class="tab-pane fade" id="import-q" role="tabpanel" aria-labelledby="import-tab">
                <div class="copy-paste-questions">
                    <h6>Copy and paste questions text from anywhere to create a quiz from it</h6>
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
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="section-header">
                    <h1>My library</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="/admin/">Dashboard</a>
                        </div>
                        <div class="breadcrumb-item">My library</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="quiz-setup-listings">
                    <div class="row">
                        <div class="col-12 col-lg-3 col-md-6">
                            <div class="quiz-setup-sidenav">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="fas fa-user"></i> Created by me
                                        </a>
                                        <span class="count-number">1</span>
                                    </li>
                                    <li>
                                        <a href="#">
                                        <i class="fas fa-file-import"></i> Imported</a>
                                        <span class="count-number">0</span>
                                    </li>
                                    <li>
                                        <a href="#">
                                        <i class="fas fa-history"></i> Perviously used</a>
                                        <span class="count-number">0</span>
                                    </li>
                                    <li>
                                        <a href="#">
                                        <i class="fas fa-heart"></i> Liked by me</a>
                                        <span class="count-number">0</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-lg-9 col-md-12">
                            <div class="listing-filters">
                                <div class="filter-box">
                                    <i class="fas fa-filter"></i>
                                    <select>
                                        <option value="All">All</option>
                                    </select>
                                </div>
                                <div class="filter-box">
                                    <i class="fas fa-sort"></i>
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
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Play</a>
                                            <div class="dropdown-menu" style="">
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
</section>

@endsection

@push('scripts_bottom')


@endpush
