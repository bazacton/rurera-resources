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
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h6>Or select a question type to add question</h6>
                <div class="canvas-list">
                    <ul>
                        <li>Multiple Choice</li>
                        <li>Fill in the Blank</li>
                    </ul>
                    <span class="canvas-sub-title">Open ended responses</span>
                    <ul>
                        <li>Draw</li>
                        <li>Open Ended</li>
                        <li>Video Response</li>
                        <li>Audio Response</li>
                        <li>Poll</li>
                        <li>Word Cloud</li>
                    </ul>
                    
                    <span>Interactive/Higher-order thinking</span>
                    <ul>
                        <li>Match</li>
                        <li>Reorder</li>
                        <li>Drag and Drop</li>
                        <li>Drop Down</li>
                        <li>Hotspot</li>
                        <li>Labeling</li>
                        <li>Categorize</li>
                        <li>Mathematics</li>
                        <li>Math Response</li>
                        <li>Graphing</li>
                    </ul>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="staff-picks-holder">
                    <div class="upload-options">
                        <div class="field-box">
                            <input type="file" id="drag-drop">
                            <label for="drag-drop">drag and drop a study material</label>
                        </div>
                        <div class="upload-controls">
                            <div class="field-box">
                                <input type="file" id="drag-drop">
                                <label for="drag-drop">Upload from device</label>
                            </div>
                            <div class="field-box">
                                <input type="file" id="drag-drop">
                                <label for="drag-drop">Import from device</label>
                            </div>
                            <div class="field-box">
                                <input type="file" id="drag-drop">
                                <label for="drag-drop">Take a picture</label>
                            </div>
                        </div>
                        <p>Supported formates: PDF, PPT, PPTX, DOC</p>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
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
