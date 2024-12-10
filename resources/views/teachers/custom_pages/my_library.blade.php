@extends('admin.layouts.app')

@push('libraries_top')

@endpush

@section('content')
<section class="section">
   

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
