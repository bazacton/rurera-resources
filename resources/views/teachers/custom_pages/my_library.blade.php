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
                    <h1>Collections</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="/admin/">Dashboard</a>
                        </div>
                        <div class="breadcrumb-item">Collections</div>
                    </div>
                </div>
            </div>
            <div class="col-12">
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
                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm active">
                                        <a href="#" class="listing-card-link">
                                            <div class="img-holder">
                                                <figure>
                                                    <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="go-jetters-hero-academy-cc-v2">
                                                </figure>
                                            </div>
                                            <div class="text-holder">
                                                <h3>Sciency Science</h3>
                                                <div class="author-info">
                                                    <span class="info-text">
                                                        <span>Kaiser K</span>
                                                        <span>2 hours ago</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <ul class="list-options">
                                                
                                                <li><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt="question-circle"></span> 8 questions</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/grades.svg" alt="grades"></span> 7th-8th  Grade</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/book-saved.svg" alt="book-saved"></span> Science</li>
                                            </ul>
                                        </a>
                                    </div>
                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <a href="#" class="listing-card-link">
                                            <div class="img-holder">
                                                <figure>
                                                    <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                                </figure>
                                            </div>
                                            <div class="text-holder">
                                                <h3>Maths Magic Adventure</h3>
                                                <div class="author-info">
                                                    <span class="info-text">
                                                        <span>Jane D</span>
                                                        <span>5 hours ago</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <ul class="list-options">

                                                <li><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt="question-circle"></span> 10 questions</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/grades.svg" alt="grades"></span> 3rd-5th Grade</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/mathematical.svg" alt="mathematical"></span> Math</li>
                                            </ul>
                                        </a>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <a href="#" class="listing-card-link">
                                            <div class="img-holder">
                                                <figure>
                                                    <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                                </figure>
                                            </div>
                                            <div class="text-holder">
                                                <h3>Grammar Genius Challenge</h3>
                                                <div class="author-info">
                                                    <span class="info-text">
                                                        <span>Mark T</span>
                                                        <span>1 day ago</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <ul class="list-options">
                                                <li><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt="question-circle"></span> 15 questions</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/grades.svg" alt="grades"></span> 4th-6th Grade</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/book-saved.svg" alt="book-saved"></span> English</li>
                                            </ul>
                                        </a>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <a href="#" class="listing-card-link">
                                            <div class="img-holder">
                                                <figure>
                                                    <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                                </figure>
                                            </div>
                                            <div class="text-holder">
                                                <h3>History Trivia Quest</h3>
                                                <div class="author-info">
                                                    <span class="info-text">
                                                        <span>Lucy W</span>
                                                        <span>2 days ago</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <ul class="list-options">
                                                <li><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt="question-circle"></span> 12 questions</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/grades.svg" alt="grades"></span> 6th-8th Grade</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/book-saved.svg" alt="book-saved"></span> History</li>
                                            </ul>
                                        </a>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <a href="#" class="listing-card-link">
                                            <div class="img-holder">
                                                <figure>
                                                    <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                                </figure>
                                            </div>
                                            <div class="text-holder">
                                                <h3>Artistic Impressions Puzzle</h3>
                                                <div class="author-info">
                                                    <span class="info-text">
                                                        <span>Sara L</span>
                                                        <span>3 days ago</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <ul class="list-options">
                                                <li><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt="question-circle"></span> 5 questions</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/grades.svg" alt="grades"></span> 1st-3rd Grade</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/book-saved.svg" alt="book-saved"></span> Art</li>
                                            </ul>
                                        </a>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <a href="#" class="listing-card-link">
                                            <div class="img-holder">
                                                <figure>
                                                    <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                                </figure>
                                            </div>
                                            <div class="text-holder">
                                                <h3>Science Exploration Mission</h3>
                                                <div class="author-info">
                                                    <span class="info-text">
                                                        <span>Alex P</span>
                                                        <span>5 hours ago</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <ul class="list-options">

                                                <li><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt="question-circle"></span> 8 questions</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/grades.svg" alt="grades"></span> 2nd-5th Grade</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/book-saved.svg" alt="book-saved"></span> Science</li>
                                            </ul>
                                        </a>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <a href="#" class="listing-card-link">
                                            <div class="img-holder">
                                                <figure>
                                                    <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                                </figure>
                                            </div>
                                            <div class="text-holder">
                                                <h3>Geography World Challenges</h3>
                                                <div class="author-info">
                                                    <span class="info-text">
                                                        <span>Chris B</span>
                                                        <span>4 hours ago</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <ul class="list-options">

                                                <li><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt="question-circle"></span> 6 questions</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/grades.svg" alt="grades"></span> 5th-7th Grade</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/book-saved.svg" alt="book-saved"></span> Geography</li>
                                            </ul>
                                        </a>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <a href="#" class="listing-card-link">
                                            <div class="img-holder">
                                                <figure>
                                                    <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                                </figure>
                                            </div>
                                            <div class="text-holder">
                                                <h3>Robotics Mind Challenges</h3>
                                                <div class="author-info">
                                                    <span class="info-text">
                                                        <span>David H</span>
                                                        <span>8 hours ago</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <ul class="list-options">
                                                <li><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt="question-circle"></span> 10 questions</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/grades.svg" alt="grades"></span> 6th-8th  Grade</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/book-saved.svg" alt="book-saved"></span> Technology</li>
                                            </ul>
                                        </a>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <a href="#" class="listing-card-link">
                                            <div class="img-holder">
                                                <figure>
                                                    <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                                </figure>
                                            </div>
                                            <div class="text-holder">
                                                <h3>Animal Kingdom Quiz</h3>
                                                <div class="author-info">
                                                    <span class="info-text">
                                                        <span>Ella S</span>
                                                        <span>2 hours ago</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <ul class="list-options">
                                                <li><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt="question-circle"></span> 10 questions</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/grades.svg" alt="grades"></span> 6th-8th  Grade</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/book-saved.svg" alt="book-saved"></span> Biology</li>
                                            </ul>
                                        </a>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <a href="#" class="listing-card-link">
                                            <div class="img-holder">
                                                <figure>
                                                    <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                                </figure>
                                            </div>
                                            <div class="text-holder">
                                                <h3>Physics Wonders Challenges</h3>
                                                <div class="author-info">
                                                    <span class="info-text">
                                                        <span>Nina F</span>
                                                        <span>6 hours ago</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <ul class="list-options">
                                                <li><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt="question-circle"></span> 10 questions</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/grades.svg" alt="grades"></span> 5th-8th  Grade</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/book-saved.svg" alt="book-saved"></span> Physics</li>
                                            </ul>
                                        </a>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <a href="#" class="listing-card-link">
                                            <div class="img-holder">
                                                <figure>
                                                    <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                                </figure>
                                            </div>
                                            <div class="text-holder">
                                                <h3>Chemistry Formula Puzzles</h3>
                                                <div class="author-info">
                                                    <span class="info-text">
                                                        <span>Oliver K</span>
                                                        <span>3 hours ago</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <ul class="list-options">
                                                <li><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt="question-circle"></span> 10 questions</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/grades.svg" alt="grades"></span> 7th-8th  Grade</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/book-saved.svg" alt="book-saved"></span> Chemistry</li>
                                            </ul>
                                        </a>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <a href="#" class="listing-card-link">
                                            <div class="img-holder">
                                                <figure>
                                                    <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                                </figure>
                                            </div>
                                            <div class="text-holder">
                                                <h3>Sciency Science</h3>
                                                <div class="author-info">
                                                    <span class="info-text">
                                                        <span>Kaiser K</span>
                                                        <span>2 hours ago</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <ul class="list-options">
                                                <li><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt="question-circle"></span> 8 questions</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/grades.svg" alt="grades"></span> 7th-8th  Grade</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/book-saved.svg" alt="book-saved"></span> Science</li>
                                            </ul>
                                        </a>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <a href="#" class="listing-card-link">
                                            <div class="img-holder">
                                                <figure>
                                                    <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                                </figure>
                                            </div>
                                            <div class="text-holder">
                                                <h3>Maths Magic Adventure</h3>
                                                <div class="author-info">
                                                    <span class="info-text">
                                                        <span>Jane D</span>
                                                        <span>5 hours ago</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <ul class="list-options">
                                                <li><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt="question-circle"></span> 10 questions</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/grades.svg" alt="grades"></span> 3rd-5th Grade</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/mathematical.svg" alt="mathematical"></span> Math</li>
                                            </ul>
                                        </a>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <a href="#" class="listing-card-link">
                                            <div class="img-holder">
                                                <figure>
                                                    <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                                </figure>
                                            </div>
                                            <div class="text-holder">
                                                <h3>Grammar Genius Challenge</h3>
                                                <div class="author-info">
                                                    <span class="info-text">
                                                        <span>Mark T</span>
                                                        <span>1 day ago</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <ul class="list-options">
                                                <li><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt="question-circle"></span> 15 questions</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/grades.svg" alt="grades"></span> 4th-6th Grade</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/book-saved.svg" alt="book-saved"></span> English</li>
                                            </ul>
                                        </a>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <a href="#" class="listing-card-link">
                                            <div class="img-holder">
                                                <figure>
                                                    <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                                </figure>
                                            </div>
                                            <div class="text-holder">
                                                <h3>History Trivia Quest</h3>
                                                <div class="author-info">
                                                    <span class="info-text">
                                                        <span>Lucy W</span>
                                                        <span>2 days ago</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <ul class="list-options">
                                                <li><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt="question-circle"></span> 12 questions</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/grades.svg" alt="grades"></span> 6th-8th Grade</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/book-saved.svg" alt="book-saved"></span> History</li>
                                            </ul>
                                        </a>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <a href="#" class="listing-card-link">
                                            <div class="img-holder">
                                                <figure>
                                                    <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                                </figure>
                                            </div>
                                            <div class="text-holder">
                                                <h3>Artistic Impressions Puzzle</h3>
                                                <div class="author-info">
                                                    <span class="info-text">
                                                        <span>Sara L</span>
                                                        <span>3 days ago</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <ul class="list-options">
                                                <li><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt="question-circle"></span> 5 questions</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/grades.svg" alt="grades"></span> 1st-3rd Grade</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/book-saved.svg" alt="book-saved"></span> Art</li>
                                            </ul>
                                        </a>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <a href="#" class="listing-card-link">
                                            <div class="img-holder">
                                                <figure>
                                                    <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                                </figure>
                                            </div>
                                            <div class="text-holder">
                                                <h3>Science Exploration Mission</h3>
                                                <div class="author-info">
                                                    <span class="info-text">
                                                        <span>Alex P</span>
                                                        <span>5 hours ago</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <ul class="list-options">
                                                <li><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt="question-circle"></span> 8 questions</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/grades.svg" alt="grades"></span> 2nd-5th Grade</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/book-saved.svg" alt="book-saved"></span> Science</li>
                                            </ul>
                                        </a>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <a href="#" class="listing-card-link">
                                            <div class="img-holder">
                                                <figure>
                                                    <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                                </figure>
                                            </div>
                                            <div class="text-holder">
                                                <h3>Geography World Challenges</h3>
                                                <div class="author-info">
                                                    <span class="info-text">
                                                        <span>Chris B</span>
                                                        <span>4 hours ago</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <ul class="list-options">
                                                <li><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt="question-circle"></span> 6 questions</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/grades.svg" alt="grades"></span> 5th-7th Grade</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/book-saved.svg" alt="book-saved"></span> Geography</li>
                                            </ul>
                                        </a>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <a href="#" class="listing-card-link">
                                            <div class="img-holder">
                                                <figure>
                                                    <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                                </figure>
                                            </div>
                                            <div class="text-holder">
                                                <h3>Robotics Mind Challenges</h3>
                                                <div class="author-info">
                                                    <span class="info-text">
                                                        <span>David H</span>
                                                        <span>8 hours ago</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <ul class="list-options">
                                                <li><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt="question-circle"></span> 10 questions</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/grades.svg" alt="grades"></span> 6th-8th  Grade</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/book-saved.svg" alt="book-saved"></span> Technology</li>
                                            </ul>
                                        </a>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <a href="#" class="listing-card-link">
                                            <div class="img-holder">
                                                <figure>
                                                    <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                                </figure>
                                            </div>
                                            <div class="text-holder">
                                                <h3>Animal Kingdom Quiz</h3>
                                                <div class="author-info">
                                                    <span class="info-text">
                                                        <span>Ella S</span>
                                                        <span>2 hours ago</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <ul class="list-options">
                                                <li><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt="question-circle"></span> 10 questions</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/grades.svg" alt="grades"></span> 6th-8th  Grade</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/book-saved.svg" alt="book-saved"></span> Biology</li>
                                            </ul>
                                        </a>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <a href="#" class="listing-card-link">
                                            <div class="img-holder">
                                                <figure>
                                                    <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                                </figure>
                                            </div>
                                            <div class="text-holder">
                                                <h3>Physics Wonders Challenges</h3>
                                                <div class="author-info">
                                                    <span class="info-text">
                                                        <span>Nina F</span>
                                                        <span>6 hours ago</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <ul class="list-options">
                                                <li><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt="question-circle"></span> 10 questions</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/grades.svg" alt="grades"></span> 5th-8th  Grade</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/book-saved.svg" alt="book-saved"></span> Physics</li>
                                            </ul>
                                        </a>
                                    </div>

                                    <div class="listing-card mb-15 bg-white panel-border rounded-sm">
                                        <a href="#" class="listing-card-link">
                                            <div class="img-holder">
                                                <figure>
                                                    <img src="/assets/default/img/games/go-jetters-hero-academy-cc-v2.jpg" height="270" width="480" alt="">
                                                </figure>
                                            </div>
                                            <div class="text-holder">
                                                <h3>Chemistry Formula Puzzles</h3>
                                                <div class="author-info">
                                                    <span class="info-text">
                                                        <span>Oliver K</span>
                                                        <span>3 hours ago</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <ul class="list-options">
                                                <li><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt="question-circle"></span> 10 questions</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/grades.svg" alt="grades"></span> 7th-8th  Grade</li>
                                                <li><span class="icon-box"><img src="/assets/default/svgs/book-saved.svg" alt="book-saved"></span> Chemistry</li>
                                            </ul>
                                        </a>
                                    </div>
                                    <button class="load-more-btn"><i class="fas fa-plus"></i> Load More</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8 col-md-8">
                            <div class="elements-holder bg-white panel-border p-15 border-bottom-0">
                                <div class="questions-header">
                                    <div class="questions-header-inner">
                                        <div class="text-holder">
                                            <h5>Exploring Magnetic Matrials and Their Uses<small>(18 questions)</small></h5>
                                        </div>
                                        <div class="questions-header-controls">
                                            <button type="button"><i class="fas fa-plus"></i> Add All</button>
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-options question-list-options mb-15">      
                                    <li><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt="question-circle"></span> 8 questions</li>
                                    <li><span class="icon-box"><img src="/assets/default/svgs/save.svg" alt="save"></span> 7th-8th  Grade</li>
                                    <li><span class="icon-box"><img src="/assets/default/svgs/book-saved.svg" alt="book-saved"></span> Science</li>
                                </ul>
                                <div class="class-controls">
                                    <div class="left-area d-inline-flex align-items-center">
                                        <div class="class-controls-option questions-control-options border-0 mr-0 pr-0 d-inline-flex align-items-center">
                                            <button type="button"><img src="/assets/default/svgs/edit-simple.svg" alt="edit-simple">Copy & edit</button>
                                            <button type="button"><img src="/assets/default/svgs/save.svg" alt="save">Save</button>
                                            <button type="button"><img src="/assets/default/svgs/share.svg" alt="share">Share</button>
                                            <button type="button"><img src="/assets/default/svgs/download.svg" alt="download">Worksheet</button>
                                            <div class="dropdown-box">
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="icon-box"><img src="/assets/default/svgs/dots-three.svg" alt="dots-three"></span>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/print.svg" alt="print"> Print</a>
                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/trash-bin.svg" alt="trash-bin"> Delete</a>
                                                        <a class="dropdown-item" href="#"><img src="/assets/default/svgs/envelope.svg" alt="envelope"> Email To Prent</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right-area w-auto">
                                        <button type="button" class="assignment-btn"><img class="show-img" src="/assets/default/svgs/clock.svg" alt="clock"> Assign</button>
                                        <button type="button" class="perview-btn" data-toggle="modal" data-target="#document-modal"><img class="show-img" src="/assets/default/svgs/eye-show.svg" alt="eye-show"> Perview</button>
                                    </div>
                                </div>
                            </div>
                            <div class="question-layout-holder mb-0 bg-white panel-border p-25 border-bottom-0">
                                <div class="question-layout-block">
                                    <form class="question-fields" action="javascript:;" data-question_id="10180">
                                    <div class="left-content has-bg">
                                        <div id="rureraform-form-1" class=" rureraform-form rureraform-elements rureraform-form-input-medium rureraform-form-icon-inside rureraform-form-description-bottom ui-sortable" _data-parent="1" _data-parent-col="0" style="display: block;">
                                        <div class="question-layout row d-flex align-items-start">
                                            <div class="rureraform-col rureraform-col-12">
                                                <div class="rureraform-element quiz-group rureraform-element-html ui-sortable-handle">
                                                    <div class="question-top-info">
                                                        <div class="question-count">
                                                            <span class="icon-box"><img src="/assets/default/svgs/question-simple.svg" alt="question-simple"></span>
                                                            <span class="question-count-lable">Question 1 of 20</span>
                                                        </div>
                                                        <div class="question-info">
                                                            <span class="q-type"><img src="/assets/default/svgs/multi-choice.svg" alt="multi-choice">Multiple choice</span>
                                                            <span class="q-time">Avg time</span>
                                                            <span class="q-point">1 point</span>
                                                        </div>
                                                        <button type="button" class="question-add-btn" data-toggle="modal" data-target="#general-knowledge-modal"><i class="fas fa-plus"></i> Add</button>
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
                                                    <div class="form-field rureraform-cr-container-medium">
                                                        <input class="editor-field rureraform-checkbox-medium" data-min="2" type="checkbox" name="field-24192" id="field-24192-22-2424" value="3 hours 30 minutes">
                                                        <label for="field-24192-22-2424"> 3 hours 30 minutes </label>
                                                    </div>
                                                    <div class="form-field rureraform-cr-container-medium active-option">
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
                                                        
                                                        <div class="rureraform-properties-item" data-id="template_style">
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
                            <div class="mb-0 bg-white panel-border p-25 border-bottom-0">
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
                                                        <div class="form-field rureraform-cr-container-medium rureraform-cr-container-undefined active-option">
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
                            <div class="mb-15 bg-white panel-border p-25">
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
<div class="modal fade general-knowledge-modal" id="general-knowledge-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <div class="tab-content" id="myTabContent">
            <div class="questions-collection tab-pane fade show active" id="collection" aria-labelledby="collection-tab">
                <div class="questions-collection-inner">
                    <h3>Add this questions to a collection</h3>
                    <div class="questions-collection-fields">
                        <div class="field-holder">
                            <input type="text" placeholder="Filter collections">
                        </div>
                        <div class="collection-item">
                            <input type="checkbox" id="name">
                            <label for="name">
                                <div class="img-holder"></div>
                                <div class="text-holder">
                                    <h4>Name</h4>
                                    <span>0 questions</span>
                                    <span>updated less than a minute ago</span>
                                </div>
                            </label>
                        </div>   
                        <div class="collection-item">
                            <input type="checkbox" id="xx">
                            <label for="xx">
                                <div class="img-holder"></div>
                                <div class="text-holder">
                                    <h4>Xx</h4>
                                    <span>0 questions</span>
                                    <span>updated less than a minute ago</span>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="collection-controls">
                        <button type="button" id="general-tab" data-toggle="tab" data-target="#general-knowledge">Create a new collection</button>
                        <button type="button" class="done-btn">Done</button>
                    </div>
                </div>
            </div>
            <div class="general-knowledge-content tab-pane fade p-0" id="general-knowledge" aria-labelledby="general-tab">
                <div class="modal-header">
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
                        <h2 class="editable" contenteditable="true">General Knowledge & Methodology</h2>
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
                        <div class="general-knowledge-controls d-flex align-items-center justify-content-between">
                            <button type="button" class="create-question-btn">Create question</button>
                            <button type="button" class="cancel-question-btn" id="collection-tab" data-toggle="tab" data-target="#collection">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>

<div class="modal document-modal fade" id="document-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="document-viewer">
            <div class="document-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="document-heading">
                    <a href="#" class="back-btn"><i class="fas fa-chevron-left"></i></a>
                    <h2>Template Name <i class="fas fa-star"></i></h2>
                </div>
                <!-- <div class="document-controls">
                    <button type="button" class="settings-btn"><img src="/assets/default/svgs/settings.svg" alt=""> Settings</button>
                    <button type="button"><img src="/assets/default/svgs/download.svg" alt=""> Download</button>
                </div> -->
            </div>
            <!-- <div class="document-left-sidebar">
                <h3>Pages</h3>
                <div class="document-pages">
                    <div class="page-box">
                        <a href="#" class="active">
                            <figure>
                                <img src="/assets/default/img/page1.png" alt="">
                            </figure>
                            <span class="page-lable">Page 1</span>
                        </a>
                    </div>
                    <div class="page-box">
                        <a href="#">
                            <figure>
                                <img src="/assets/default/img/page2.png" alt="">
                            </figure>
                            <span class="page-lable">Page 2</span>
                        </a>
                    </div>
                </div>
            </div> -->
            <div class="document-right-sidebar">
                <h5>Settings</h5>
                <div class="document-switch-options">
                    <div class="form-group mb-0">
                        <label class="custom-switch mb-15">
                            <em class="switch-lable">Shuffle answer</em>
                            <input type="checkbox" name="document-switch" id="shuffle-ans" class="custom-switch-input" checked>
                            <img src="/assets/default/svgs/shuffle.svg" alt="shuffle">
                        </label>
                    </div>
                    <div class="form-group mb-0">
                        <label class="custom-switch mb-15">
                            <em class="switch-lable">Shuffle questions</em>
                            <input type="checkbox" name="document-switch" id="shuffle-q" class="custom-switch-input">
                            <img src="/assets/default/svgs/shuffle.svg" alt="shuffle">
                        </label>
                    </div>
                    <div class="form-group mb-0">
                        <label class="custom-switch mb-15">
                            <em class="switch-lable">Answer keys</em>
                            <input type="checkbox" name="document-switch" id="ans-key" class="custom-switch-input" checked>
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                </div>
                <div class="document-switch-options">
                    <div class="form-group mb-0">
                        <label class="custom-switch mb-15">
                            <em class="switch-lable">Question tags</em>
                            <input type="checkbox" name="document-switch" id="tags" class="custom-switch-input" checked>
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <div class="form-group mb-0">
                        <label class="custom-switch mb-15">
                            <em class="switch-lable">Instructor name</em>
                            <input type="checkbox" name="document-switch" id="instructor" class="custom-switch-input">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <div class="form-group mb-0">
                        <label class="custom-switch mb-15">
                            <em class="switch-lable">Show answer options</em>
                            <input type="checkbox" name="document-switch" id="ans-key" class="custom-switch-input" checked>
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                </div>
                <div class="document-font-sizes">
                    <span class="fonts-lable">Font size</span>
                    <div class="font-select-options">
                        <div class="font-select-box">
                            <input type="radio" name="font-size" id="font-sm" checked>
                            <label for="font-sm" onclick="document.getElementById('pdf-fonts').style.fontSize='small'">S</label>
                        </div>
                        <div class="font-select-box">
                            <input type="radio" name="font-size" id="font-md">
                            <label for="font-md" onclick="document.getElementById('pdf-fonts').style.fontSize='medium'">M</label>
                        </div>
                        <div class="font-select-box">
                            <input type="radio" name="font-size" id="font-lg">
                            <label for="font-lg" onclick="document.getElementById('pdf-fonts').style.fontSize='large'">L</label>
                        </div>
                        <div class="font-select-box">
                            <input type="radio" name="font-size" id="font-xl">
                            <label for="font-xl" onclick="document.getElementById('pdf-fonts').style.fontSize='large'">XL</label>
                        </div>
                    </div>
                </div>
                <div class="btn-holder px-15 text-center pt-15">
                    <button type="button" class="print-download-btn">Print / Download</button>
                </div>
            </div>
            <div class="document-content">
                <div class="document-pdf" id="pdf-fonts" style="font-size: medium;">
                    <div class="elements-holder panel-border p-15 border-bottom-0" style="background-color: #fafafa;">
                        <div class="site-logo mb-20">
                            <img src="/store/1/logo.svg" class="img-cover" alt="Rurera Logo" title="Rurera Logo" width="150" height="38" itemprop="image" loading="eager">
                        </div>
                        <div class="questions-header">
                            <div class="questions-header-inner">
                                <div class="text-holder">
                                    <h5>Exploring Magnetic Matrials and Their Uses</h5>
                                </div>
                            </div>
                        </div>
                        <span class="instructor-lable">Instructor: Kaizer Can</span>
                        <ul class="list-options question-list-options mb-0">      
                            <li><span class="icon-box">-</span> 8 questions</li>
                            <li><span class="icon-box">-</span> 7th-8th  Grade</li>
                            <li><span class="icon-box">-</span> Science</li>
                        </ul>
                        <div class="about-student">
                            <div class="student-roll-num">
                                Roll No:
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <div class="student-other-info">
                                <span class="student-name">Name: <small></small></span>
                                <span class="student-class">Class: <small></small></span>
                                <span class="student-subject">Subject: <small></small></span>
                                <span class="date">Date: <small></small></span>
                            </div>
                        </div>
                    </div>
                    <div class="examiner-section panel-border p-25 border-bottom-0" style="background-color: #fafafa;">
                        <h5>For Examiner's Use Only</h5>
                        <table>
                            <thead>
                                <tr>
                                    <th>1</th>
                                    <th>2</th>
                                    <th>3</th>
                                    <th>4</th>
                                    <th>5</th>
                                    <th>6</th>
                                    <th>7</th>
                                    <th>8</th>
                                    <th>9</th>
                                    <th>10</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="instructions bg-white panel-border p-25 border-bottom-0">
                        <h5>Instructions to candidates</h5>
                        <ol>
                            <li>Write your name, admission number, and class in the spaces provided.</li>
                            <li>Sign and write the date of examination in the spaces provided above.</li>
                            <li>The paper contains two sections: Section I and II.</li>
                            <li>Answer all questions in Section I and II.</li>
                            <li>All answers and working must be written on the question paper in the spaces provided below each question.</li>
                            <li><strong>Show all the steps in your calculations, giving your answers at each stage in the spaces provided below each question.</strong></li>
                            <li>KNEC Mathematical tables may be used, except where stated otherwise.</li>
                            <li>Silent or non-programmable calculators <strong>SHOULD NOT</strong> be used.</li>
                        </ol>
                    </div>
                    <div class="question-layout-holder mb-0 bg-white panel-border p-25 border-bottom-0">
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
                    </div>
                    <div class="mb-0 bg-white panel-border p-25 border-bottom-0">
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
                                                    <span class="question-count-lable">Question 1 of 20</span>
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
                    <div class="bg-white panel-border p-25 border-bottom-0">
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
                    <div class="bg-white panel-border p-25">
                        <div class="answer-keys">
                            <h5>Answer Keys</h5>
                            <ul>
                                <li>1. <span>n/a</span></li>
                                <li>2. <span>b&#41; Issac Newton</span></li>
                                <li>3. <span>n/a</span></li>
                                <li>4. <span>imagination and creativity</span></li>
                                <li>5. <span>imagination and creativity</span></li>
                                <li>6. <span>a&#41;</span></li>
                                <li>7. <span>n/a</span></li>
                                <li>8. <span>n/a</span></li>
                                <li>9. <span>e&#41; washing</span></li>
                                <li>10. <span>d&#41; 1(correct)</span></li>
                                <li>11. <span>b&#41;2</span></li>
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

@endsection

@push('scripts_bottom')
<script>

$(document).ready(function () {
  const $scrollableDiv = $(".featured-list-sidebar-inner, .document-pages, .document-pdf");
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
    $("#general-tab, #collection-tab").on("click", function() {
        $(this).removeClass("active");
    });
});
</script>
<script>
    document.querySelectorAll('.listing-card-link').forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            document.querySelectorAll('.listing-card').forEach(card => {
                card.classList.remove('active');
            });
            this.closest('.listing-card').classList.add('active');
        });
    });
</script>
@endpush
