@extends(getTemplate().'.layouts.app')

@push('styles_top')
<link rel="stylesheet" href="/assets/default/vendors/scroll-animation/animate.css">

<style>
        .bg-deepskyblue {
            background-color: #46b7e9;
        }
        .bg-blue {
            background-color: #3d358b;
        }
        .bg-yellow {
            background-color: #f6b801;
        }
        .bg-deepyellow {
            background-color: #f18700;
        }
        .bg-lightblue {
            background-color: #7679ee;
        }
        .bg-orange {
            background-color: #f35b05;
        }
        .bg-mdblue {
            background-color: #5e82d8;
        }
        .bg-green {
            background-color: #3cb46e;
        }
        .lms-newsletter {
            background-color: var(--gray-dark);
        }
        .gallery-sub-header {
            min-height: 480px;
        }
        .lms-column-section {
            background-color: #75c0fa;
        }
    </style>
@endpush

@section('content')
<section class="content-section">
    <section class="gallery-sub-header job-singup-sub-header mb-70 page-sub-header pb-10 position-relative pt-80">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 col-lg-6 col-md-6">
                    <h1 class="font-weight-bold font-72"><span class="mr-10 text-scribble">CAT 4</span> Prep Simplified!</h1>
                    <h2 class="font-30 mb-15">Personalised Tests to Boost Your Child’s Success.</h2>
                    <p class="font-19">
                        At Rurera, our CAT4 assessments identify your child’s strengths in verbal, non-verbal, quantitative, and spatial reasoning. With clear insights, we can tailor strategies to improve their learning and confidence.
                    </p>
                    <ul class="mb-30 p-0">
                        <li class="mb-10 font-19"><img alt="#" height="25" src="../assets/default/svgs/mobile.svg" width="25" />100+ Mock Tests</li>
                        <li class="mb-10 font-19"><img alt="#" height="25" src="../assets/default/svgs/preparation.svg" width="25" />Custom Learning Paths</li>
                        <li class="mb-10 font-19"><img alt="#" height="25" src="../assets/default/svgs/graphic-design.svg" width="25" />Endless CAT4 Resources</li>
                        <li class="font-19"><img alt="#" height="25" src="../assets/default/svgs/book-opend.svg" width="25" />Personalized Progress Reports</li>
                    </ul>
                    <a href="https://rurera.com/pricing" class="text-white bg-primary justify-content-center register-btn try-rurera-btn mt-0">Try Rurera for free</a>
                </div>
            </div>
        </div>
        <div class="has-bg masonry-grid-gallery simple">
            <div class="masonry-grid">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-4 grid-item">
                        <div class="img-holder">
                            <figure>
                                <a href="#"><img alt="#" height="46" src="/store/1/default_images/sats-header/ks1-16.png" width="142" class="rounded" /></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 grid-item">
                        <div class="img-holder">
                            <figure>
                                <a href="#"><img alt="#" height="59" src="/store/1/default_images/sats-header/key-16.png" width="142" class="rounded" /></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 grid-item">
                        <div class="img-holder">
                            <figure>
                                <a href="#"><img alt="#" height="46" src="/store/1/default_images/sats-header/ks1-17.png" width="142" class="rounded" /></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 grid-item">
                        <div class="img-holder">
                            <figure>
                                <a href="#"><img alt="#" height="59" src="/store/1/default_images/sats-header/key-17.png" width="142" class="rounded" /></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 grid-item">
                        <div class="img-holder">
                            <figure>
                                <a href="#"><img alt="#" height="46" src="/store/1/default_images/sats-header/ks1-18.png" width="142" class="rounded" /></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 grid-item">
                        <div class="img-holder">
                            <figure>
                                <a href="#"><img alt="#" height="46" src="/store/1/default_images/sats-header/ks1-19.png" width="142" class="rounded" /></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 grid-item">
                        <div class="img-holder">
                            <figure>
                                <a href="#"><img alt="#" height="59" src="/store/1/default_images/sats-header/key-18.png" width="142" class="rounded" /></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 grid-item">
                        <div class="img-holder">
                            <figure>
                                <a href="#"><img alt="#" height="59" src="/store/1/default_images/sats-header/key-19.png" width="142" class="rounded" /></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 grid-item">
                        <div class="img-holder">
                            <figure>
                                <a href="#"><img alt="#" height="46" src="/store/1/default_images/sats-header/ks1-22.png" width="142" class="rounded" /></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 grid-item">
                        <div class="img-holder">
                            <figure>
                                <a href="#"><img alt="#" height="59" src="/store/1/default_images/sats-header/key-22.png" width="142" class="rounded" /></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 grid-item">
                        <div class="img-holder">
                            <figure>
                                <a href="#"><img alt="#" height="46" src="/store/1/default_images/sats-header/ks1-22.png" width="142" class="rounded" /></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 grid-item">
                        <div class="img-holder">
                            <figure>
                                <a href="#"><img alt="#" height="46" src="/store/1/default_images/sats-header/ks1-16.png" width="142" class="rounded" /></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 grid-item">
                        <div class="img-holder">
                            <figure>
                                <a href="#"><img alt="#" height="59" src="/store/1/default_images/sats-header/key-18.png" width="142" class="rounded" /></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 grid-item">
                        <div class="img-holder">
                            <figure>
                                <a href="#"><img alt="#" height="46" src="/store/1/default_images/sats-header/ks1-18.png" width="142" class="rounded" /></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 grid-item">
                        <div class="img-holder">
                            <figure>
                                <a href="#"><img alt="#" height="59" src="/store/1/default_images/sats-header/key-22.png" width="142" class="rounded" /></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 grid-item">
                        <div class="img-holder">
                            <figure>
                                <a href="#"><img alt="#" height="59" src="/store/1/default_images/sats-header/key-19.png" width="142" class="rounded" /></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 grid-item">
                        <div class="img-holder">
                            <figure>
                                <a href="#"><img alt="#" height="46" src="/store/1/default_images/sats-header/ks1-17.png" width="142" class="rounded" /></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 grid-item">
                        <div class="img-holder">
                            <figure>
                                <a href="#"><img alt="#" height="59" src="/store/1/default_images/sats-header/key-19.png" width="142" class="rounded" /></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 grid-item">
                        <div class="img-holder">
                            <figure>
                                <a href="#"><img alt="#" height="46" src="/store/1/default_images/sats-header/ks1-18.png" width="142" class="rounded" /></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 grid-item">
                        <div class="img-holder">
                            <figure>
                                <a href="#"><img alt="#" height="46" src="/store/1/default_images/sats-header/ks1-22.png" width="142" class="rounded" /></a>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="lms-features-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12 col-md-12">
                    <div class="section-title">
                        <h2 class="font-40" itemprop="title">Your Ultimate Package for Comprehensive CAT4 Preparation.</h2>
                        <p class="font-19 text-gray">Get everything needed for CAT4 prep in one complete package, ensuring thorough readiness and confidence for test day.</p>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                    <div class="lms-feature-card mt-50">
                        <figure>
                            <i class="svg-icon bg-mdblue"><img alt="100+ Expert-Crafted Tests" height="150" src="/assets/default/svgs/features-user-white.svg" width="150" /></i>
                        </figure>
                        <div class="lms-text-holder">
                            <h3 class="font-30 mb-15 post-title" itemprop="title">100+ Expert-Crafted Tests</h3>
                            <p class="font-18 text-dark" itemprop="description">
                                <b>Success with Practice Tests</b><br />
                                Experience real exam conditions with practice tests designed by CAT4 specialists. Build confidence and improve performance with simulated exam scenarios.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                    <div class="lms-feature-card mt-50">
                        <figure>
                            <i class="svg-icon bg-green"><img alt="Wide Range of Questions" height="200" src="/assets/default/svgs/features-time-test-white.svg" width="200" /></i>
                        </figure>
                        <div class="lms-text-holder">
                            <h3 class="font-30 mb-15 post-title" itemprop="title">Wide Range of Questions</h3>
                            <p class="font-18 text-dark" itemprop="description">
                                <b>Practices for All CAT4 Sections</b><br />
                                Access a wide range of questions covering verbal, non-verbal, quantitative, and spatial reasoning. Perfect your skills with targeted practice tailored to the CAT4 exam.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                    <div class="lms-feature-card mt-50">
                        <figure>
                            <i class="svg-icon bg-orange"><img alt="Assess and Improve" height="200" src="/assets/default/svgs/features-globe-white.svg" width="200" /></i>
                        </figure>
                        <div class="lms-text-holder">
                            <h3 class="font-30 mb-15 post-title" itemprop="title">Assess and Improve</h3>
                            <p class="font-18 text-dark" itemprop="description">
                                <b>Personalized Skill Enhancement</b><br />
                                Discover your improvement areas with personalized assessments and enhance those skills with focused practice. Our method ensures you concentrate on key areas, increasing both confidence and performance.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                    <div class="lms-feature-card mt-50">
                        <figure>
                            <i class="svg-icon bg-deepskyblue"><img alt="Personalized Learning Paths" height="200" src="/assets/default/svgs/features-resources-white.svg" width="200" /></i>
                        </figure>
                        <div class="lms-text-holder">
                            <h3 class="font-30 mb-15 post-title" itemprop="title">Personalized Learning Paths</h3>
                            <p class="font-18 text-dark" itemprop="description">
                                <b>Custom Study Plans</b><br />
                                Receive custom study plans based on assessment results. Focus on areas needing improvement and enhance your strengths for optimal test preparation.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title mb-50 text-center">
                        <h2 class="mb-10 font-40">Personalized 11 Plus Prep with Rurera</h2>
                        <p class="font-16 text-gray">Empower your child’s learning journey with tailored resources and
                            assessments that meet their unique needs.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                        <figure class="mb-20">

                            <img src="../assets/default/img/ks1-year1-feature.jpg" alt="feature image" height="143"
                                 width="276">

                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                            <span class="text-dark-charcoal">Game-Based Learning</span>
                        </h3>
                        <p itemprop="description">Make study sessions fun with engaging, reward-based activities and
                            instant feedback.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                        <figure class="mb-20">

                            <img src="../assets/default/img/entrance-exams.jpg" alt="feature image" height="143"
                                 width="276">

                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                            <span class="text-dark-charcoal">Essential Mock Exams</span>
                        </h3>
                        <p itemprop="description">Boost confidence with realistic 11+ mock exams that simulate actual
                            test conditions.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                        <figure class="mb-20">

                            <img src="../assets/default/img/sats-home-feature.jpg" alt="feature image" height="143"
                                 width="276">

                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                            <span class="text-dark-charcoal">Parental Insights</span>
                        </h3>
                        <p itemprop="description">Monitor progress with detailed insights to support your child’s
                            academic success.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                        <figure class="mb-20">

                            <img src="../assets/default/img/analytics-feature.jpg" alt="feature image" height="143"
                                 width="276">

                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                            <span class="text-dark-charcoal">Ultimate 11 Plus Practice Toolkit</span>
                        </h3>
                        <p itemprop="description">Encourage continuous improvement with self-assessment tools and
                            progress tracking.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                        <figure class="mb-20">

                            <img src="../assets/default/img/quick-assesments.jpg" alt="feature image" height="143"
                                 width="276">

                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                            <span class="text-dark-charcoal">Top-Tier Study Materials</span>
                        </h3>
                        <p itemprop="description">Access all-encompassing resources to thoroughly prepare for every
                            aspect of the 11+ exam.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                        <figure class="mb-20">

                            <img src="../assets/default/img/feature-automated-marking.jpg" alt="feature image"
                                 height="143" width="276">

                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                            <span class="text-dark-charcoal">Smart Exam Tactics</span>
                        </h3>
                        <p itemprop="description">Learn effective tips for time management, stress reduction, and
                            question strategies.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                        <figure class="mb-20">

                            <img src="../assets/default/img/insights-feature.jpg" alt="feature image" height="143"
                                 width="276">

                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                            <span class="text-dark-charcoal">Adaptive Curriculum</span>
                        </h3>
                        <p itemprop="description">Use a curriculum that adjusts to each student’s needs for personalised
                            learning.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                        <figure class="mb-20">

                            <img src="../assets/default/img/book-shelf-feature.jpg" alt="feature image" height="143"
                                 width="276">

                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                            <span class="text-dark-charcoal">Personalised Practice</span>
                        </h3>
                        <p itemprop="description">Provide practice options that reinforce key concepts and reduce
                            learning anxiety.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                        <figure class="mb-20">

                            <img src="../assets/default/img/timetables-feature.jpg" alt="feature image" height="143"
                                 width="276">

                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                            <span class="text-dark-charcoal">Elevate 11 Plus Preparation</span>
                        </h3>
                        <p itemprop="description">Achieve exam success with tailored practice and confidence-building
                            resources.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="lms-column-section lms-accordion-section w-100 pb-60 pt-60"
             style="background-color: #f6f0ea; max-width: 100%;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-title mb-35 text-center">
                        <h2 itemprop="section title" class="font-40">Why choose Rurera assessments ?</h2>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question" class="accordion lms-accordion-modern"
                         id="accordion-modern">
                        <div class="card active" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <div class="card-header" id="heading-1">
                                <button itemprop="button" class="btn btn-link btn-block text-left collapsed"
                                        type="button" data-toggle="collapse" data-target="#collapse-1" aria-expanded="false"
                                        aria-controls="collapse-1">
                                    <span itemprop="size">#1</span>Adaptive Assessments Testing
                                </button>
                            </div>
                            <div id="collapse-1" class="collapse show" aria-labelledby="heading-1"
                                 data-parent="#accordion-modern">
                                <div class="card-body">
                                    <p itemprop="description" class="font-16 font-weight-normal">
                                        It helps schools to offer adaptive assessments that adjust the difficulty of
                                        questions as below, emerging, expected, exceeding and challenge which is based
                                        on a student's previous responses, history,
                                        reports and performance providing a more tailored learning experience.
                                    </p>
                                </div>
                            </div>
                            <div class="lms-img-holder">
                                <figure><img class="w-100" src="../assets/default/img/adpative-assessment.jpg"
                                             alt="company sats" title="company sats" width="652" height="401"
                                             itemprop="image" loading="eager" /></figure>
                            </div>
                        </div>
                        <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <div class="card-header" id="heading-2">
                                <button itemprop="button" class="btn btn-link btn-block text-left collapsed"
                                        type="button" data-toggle="collapse" data-target="#collapse-2" aria-expanded="false"
                                        aria-controls="collapse-2">
                                    <span itemprop="size">#2</span>Quick Results via automated marking
                                </button>
                            </div>
                            <div id="collapse-2" class="collapse" aria-labelledby="heading-2"
                                 data-parent="#accordion-modern">
                                <div class="card-body">
                                    <p itemprop="description" class="font-16 font-weight-normal">
                                        Real-time marking data allows for quick identification of students who may
                                        require additional support or challenges. Students receive instant personalized
                                        feedback for every question and learning nugget.
                                    </p>
                                </div>
                            </div>
                            <div class="lms-img-holder">
                                <figure><img class="w-100" src="../assets/default/img/company-quiz.jpg"
                                             alt="company performance" title="company performance" width="652" height="401"
                                             itemprop="image" loading="eager" /></figure>
                            </div>
                        </div>
                        <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <div class="card-header" id="heading-3">
                                <button itemprop="button" class="btn btn-link btn-block text-left collapsed"
                                        type="button" data-toggle="collapse" data-target="#collapse-3" aria-expanded="false"
                                        aria-controls="collapse-3">
                                    <span itemprop="size">#3</span>Diverse Question Formats
                                </button>
                            </div>
                            <div id="collapse-3" class="collapse" aria-labelledby="heading-3"
                                 data-parent="#accordion-modern">
                                <div class="card-body">
                                    <p itemprop="description" class="font-16 font-weight-normal">
                                        Online assessments can include a variety of question types, from multiple choice
                                        to audio types offering a more comprehensive evaluation of student knowledge.
                                    </p>
                                </div>
                            </div>
                            <div class="lms-img-holder">
                                <figure><img class="w-100" src="../assets/default/img/all-in-1-platform.jpg"
                                             alt="company rewards" title="company rewards" width="652" height="401"
                                             itemprop="image" loading="eager" /></figure>
                            </div>
                        </div>
                        <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <div class="card-header" id="heading-4">
                                <button itemprop="button" class="btn btn-link btn-block text-left collapsed"
                                        type="button" data-toggle="collapse" data-target="#collapse-4" aria-expanded="false"
                                        aria-controls="collapse-4">
                                    <span itemprop="size">#4</span>Timely Reporting
                                </button>
                            </div>
                            <div id="collapse-4" class="collapse" aria-labelledby="heading-4"
                                 data-parent="#accordion-modern">
                                <div class="card-body">
                                    <p itemprop="description" class="font-16 font-weight-normal">Online platforms often
                                        provide real-time reporting to both students and teachers, allowing for prompt
                                        interventions and support.</p>
                                </div>
                            </div>
                            <div class="lms-img-holder">
                                <figure><img class="w-100" src="../assets/default/img/company-sats.jpg"
                                             alt="company insights" title="company insights" width="652" height="401"
                                             itemprop="image" loading="eager" /></figure>
                            </div>
                        </div>
                        <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <div class="card-header" id="heading-5">
                                <button itemprop="button" class="btn btn-link btn-block text-left collapsed"
                                        type="button" data-toggle="collapse" data-target="#collapse-5" aria-expanded="false"
                                        aria-controls="collapse-5">
                                    <span itemprop="size">#5</span>Breakthrough insights at every level
                                </button>
                            </div>
                            <div id="collapse-5" class="collapse" aria-labelledby="heading-5"
                                 data-parent="#accordion-modern">
                                <div class="card-body">
                                    <p itemprop="description" class="font-16 font-weight-normal">
                                        Students and their parents can access a dashboard that displays their live
                                        progress in various subjects. It allows them to identify their strengths and
                                        areas needing improvement. Parents can monitor
                                        completed work, track their child's progress, and view assigned tasks.
                                    </p>
                                </div>
                            </div>
                            <div class="lms-img-holder">
                                <figure><img class="w-100" src="../assets/default/img/company-insights.jpg"
                                             alt="company quiz" title="company quiz" width="652" height="401"
                                             itemprop="image" loading="eager" /></figure>
                            </div>
                        </div>
                        <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <div class="card-header" id="heading-6">
                                <button itemprop="button" class="btn btn-link btn-block text-left collapsed"
                                        type="button" data-toggle="collapse" data-target="#collapse-6" aria-expanded="true"
                                        aria-controls="collapse-6">
                                    <span itemprop="size">#6</span>Students Engagement
                                </button>
                            </div>
                            <div id="collapse-6" class="collapse" aria-labelledby="heading-6"
                                 data-parent="#accordion-modern">
                                <div class="card-body">
                                    <p itemprop="description" class="font-16 font-weight-normal">
                                        Ignite student’s passion more to join your school. A fantastic learning
                                        experience is possible using interactive challenges, Online Test practices,
                                        Entrance Exams preparations and rewarding them with
                                        trending toys.
                                    </p>
                                </div>
                            </div>
                            <div class="lms-img-holder">
                                <figure><img class="w-100" src="../assets/default/img/company-performance.jpg"
                                             alt="company curriculum" width="652" height="401" title="company curriculum"
                                             itemprop="image" loading="eager" /></figure>
                            </div>
                        </div>
                        <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <div class="card-header" id="heading-7">
                                <button itemprop="button" class="btn btn-link btn-block text-left collapsed"
                                        type="button" data-toggle="collapse" data-target="#collapse-7" aria-expanded="true"
                                        aria-controls="collapse-7">
                                    <span itemprop="size">#7</span>Reward points
                                </button>
                            </div>
                            <div id="collapse-7" class="collapse" aria-labelledby="heading-7"
                                 data-parent="#accordion-modern">
                                <div class="card-body">
                                    <p itemprop="description" class="font-16 font-weight-normal">
                                        Unlock Knowledge and Reward Yourself with Exciting Toys. It implies through
                                        continuous learning and improvement, students can increase their chances of
                                        winning playful toys. We believe in recognizing and
                                        appreciating your loyalty and engagement.
                                    </p>
                                </div>
                            </div>
                            <div class="lms-img-holder">
                                <figure><img class="w-100" src="../assets/default/img/company-rewards.jpg"
                                             alt="company curriculum" width="652" height="401" title="company curriculum"
                                             itemprop="image" loading="eager" /></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-center pt-50">
            <a href="{{url('/')}}/pricing" class="btn-primary font-16 text-dark-blue register-btn try-rurera-btn py-15 px-30">Try Rurera for free</a>
        </div>
    </section>
    <section class="py-100" style="background-color: #fff;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title mb-30 text-center"><h2 class="mb-10 font-40 mt-0">Frequently asked questions</h2></div>
                </div>
                <div class="col-12 col-lg-12 col-md-12 mx-auto">
                    <div class="mt-0">
                        <div class="mt-0 lms-faqs mx-w-100" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <div id="accordion">
                                <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="headingsix">
                                        <h3 class="mb-0">
                                            <button aria-controls="collapsesix" aria-expanded="true" class="font-18 btn btn-link collapsed font-weight-bold" data-target="#collapsesix" data-toggle="collapse">
                                                What is CAT4, and how does it assess a student's cognitive potential?
                                            </button>
                                        </h3>
                                    </div>
                                    <div class="collapse" id="collapsesix" aria-labelledby="headingsix" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>CAT4 is a cognitive abilities test set by GL Assessment. It aims to reveal a child’s hidden potential by assessing their reasoning ability. There are CAT4 levels for different age groups.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="headingTwo">
                                        <h3 class="mb-0">
                                            <button aria-controls="collapseTwo" aria-expanded="false" class="font-18 btn btn-link collapsed font-weight-bold" data-target="#collapseTwo" data-toggle="collapse">
                                                Why do schools use the CAT4 exam?
                                            </button>
                                        </h3>
                                    </div>
                                    <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Some selective independent schools use CAT4 to shortlist children for places.Many schools – both state and private – use CAT4 in early Year 7 to stream students into sets in core subjects.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="headingseven">
                                        <h3 class="mb-0">
                                            <button aria-controls="collapseseven" aria-expanded="false" class="font-18 btn btn-link collapsed font-weight-bold" data-target="#collapseseven" data-toggle="collapse">
                                                How does Rurera help with CAT4 preparation?
                                            </button>
                                        </h3>
                                    </div>
                                    <div class="collapse" id="collapseseven" aria-labelledby="headingseven" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>
                                                Rurera offers comprehensive CAT4 preparation through expert-designed mock tests, practice questions, and detailed feedback. Our platform helps identify strengths and areas for improvement,
                                                providing personalized study plans to enhance your child's performance.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="heading8">
                                        <h3 class="mb-0">
                                            <button aria-controls="collapse8" aria-expanded="false" class="font-18 btn btn-link collapsed font-weight-bold" data-target="#collapse8" data-toggle="collapse">
                                                When is CAT4 typically taken, and are there common times of year for it?
                                            </button>
                                        </h3>
                                    </div>
                                    <div class="collapse" id="collapse8" aria-labelledby="heading8" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>
                                                The CAT4 can be administered at various times throughout the academic year, depending on the school or institution’s schedule but your child will likely take the test in the autumn term or early
                                                spring term in Year 6 Schools that use CAT4 for setting purposes often administer the test in September in Year 7.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="heading9">
                                        <h3 class="mb-0">
                                            <button aria-controls="collapse9" aria-expanded="false" class="font-18 btn btn-link collapsed font-weight-bold" data-target="#collapse9" data-toggle="collapse">
                                                How does Rurera keep my child motivated during CAT4 preparation?
                                            </button>
                                        </h3>
                                    </div>
                                    <div class="collapse" id="collapse9" aria-labelledby="heading9" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>
                                                Rurera employs several strategies to keep your child motivated, including interactive and engaging learning modules, gamified practice sessions, and regular progress tracking that highlights
                                                improvements and milestones.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="heading10">
                                        <h3 class="mb-0">
                                            <button aria-controls="collapse10" aria-expanded="false" class="font-18 btn btn-link collapsed font-weight-bold" data-target="#collapse10" data-toggle="collapse">
                                                What are the major subjects assessed in CAT4?
                                            </button>
                                        </h3>
                                    </div>
                                    <div class="collapse" id="collapse10" aria-labelledby="heading10" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>
                                                The CAT4 evaluates four essential cognitive areas: Verbal Reasoning, which measures language and comprehension skills; Non-Verbal Reasoning, which assesses problem-solving with visual information;
                                                Quantitative Reasoning, which tests mathematical and numerical abilities; and Spatial Awareness, which examines understanding of spatial relationships and shapes.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="heading11">
                                        <h3 class="mb-0">
                                            <button aria-controls="collapse11" aria-expanded="false" class="font-18 btn btn-link collapsed font-weight-bold" data-target="#collapse11" data-toggle="collapse">
                                                What is the format of the CAT4 test, and types of questions?
                                            </button>
                                        </h3>
                                    </div>
                                    <div class="collapse" id="collapse11" aria-labelledby="heading11" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>
                                                CAT4 can be taken online or on paper, although most schools choose to use an online version. It's a non-adaptive test, meaning that all children taking the test at the same time will see the same
                                                questions.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="heading12">
                                        <h3 class="mb-0">
                                            <button aria-controls="collapse12" aria-expanded="false" class="font-18 btn btn-link collapsed font-weight-bold" data-target="#collapse12" data-toggle="collapse">
                                                How long does CAT4 take, and does the duration vary by section&nbsp;or&nbsp;format?
                                            </button>
                                        </h3>
                                    </div>
                                    <div class="collapse" id="collapse12" aria-labelledby="heading12" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>
                                                The test typically takes between 1 to 2 hours to complete, with the exact duration depending on the specific format and the number of sections included. The time required may vary based on the
                                                complexity of the questions and the depth of each section..
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="heading13">
                                        <h3 class="mb-0">
                                            <button aria-controls="collapse13" aria-expanded="false" class="font-18 btn btn-link collapsed font-weight-bold" data-target="#collapse13" data-toggle="collapse">
                                                What is the passing score for the CAT4 test, and how is it determined?
                                            </button>
                                        </h3>
                                    </div>
                                    <div class="collapse" id="collapse13" aria-labelledby="heading13" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>
                                                Each school that administers the CAT4 determines its own pass marks. Generally, a score of 100 is viewed as average, 142 is at the very top end, and scores below 85 are considered low.For Year 7
                                                candidates, many selective schools seek a standardized score of at least 115, and in some cases, even higher.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="heading14">
                                        <h3 class="mb-0">
                                            <button aria-controls="collapse14" aria-expanded="false" class="font-18 btn btn-link collapsed font-weight-bold" data-target="#collapse14" data-toggle="collapse">
                                                Are there practice tests available for CAT4?
                                            </button>
                                        </h3>
                                    </div>
                                    <div class="collapse" id="collapse14" aria-labelledby="heading14" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>
                                                Yes, practice tests are available at Rurera for the CAT4. These tests are designed to simulate the actual exam conditions and help students familiarize themselves with the types of questions they
                                                will encounter. They provide valuable practice and can help identify areas for improvement.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="heading15">
                                        <h3 class="mb-0">
                                            <button aria-controls="collapse15" aria-expanded="false" class="font-18 btn btn-link collapsed font-weight-bold" data-target="#collapse15" data-toggle="collapse">
                                                What are the different elements of the CAT4 test?
                                            </button>
                                        </h3>
                                    </div>
                                    <div class="collapse" id="collapse15" aria-labelledby="heading15" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>
                                                The CAT4 test includes four key elements: <strong>Verbal Reasoning</strong> (understanding and using written concepts), <strong>Non-Verbal Reasoning</strong> (interpreting visual patterns and
                                                shapes), <strong>Quantitative Reasoning</strong> (solving numerical problems), and <strong>Spatial Awareness</strong> (visualizing and manipulating objects in space).
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="heading16">
                                        <h3 class="mb-0">
                                            <button aria-controls="collapse16" aria-expanded="false" class="font-18 btn btn-link collapsed font-weight-bold" data-target="#collapse16" data-toggle="collapse">
                                                How can you prepare your child to take the test?
                                            </button>
                                        </h3>
                                    </div>
                                    <div class="collapse" id="collapse16" aria-labelledby="heading16" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>
                                                Familiarize your child with the test format, and use practice tests to build confidence. Focus on improving weaker areas, encourage problem-solving skills with puzzles, and maintain a balanced
                                                routine of study and rest. Provide positive support to keep them calm and motivated.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="heading17">
                                        <h3 class="mb-0">
                                            <button aria-controls="collapse17" aria-expanded="false" class="font-18 btn btn-link collapsed font-weight-bold" data-target="#collapse17" data-toggle="collapse">
                                                What are the different levels in the CAT4 test?
                                            </button>
                                        </h3>
                                    </div>
                                    <div class="collapse" id="collapse17" aria-labelledby="heading17" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>The CAT4 test is divided into several levels based on age groups, ranging from A to G:</p>
                                            <ul class="my-20">
                                                <li class="mb-10">Group A: For students aged 8 to 9</li>
                                                <li class="mb-10">Group B: For students aged 9 to 10</li>
                                                <li class="mb-10">Group C: For students aged 10 to 11</li>
                                                <li class="mb-10">Group D: For students aged 11 to 12</li>
                                                <li class="mb-10">Group E: For students aged 12 to 13</li>
                                                <li class="mb-10">Level F: For students aged 13–15</li>
                                                <li>Level G:For students aged 15+</li>
                                            </ul>
                                            <p>Each group is tailored to the cognitive development appropriate for that age range, ensuring an accurate assessment of a student’s abilities.</p>
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
    <section class="mt-0 parent-account-section" style="background-color: #0065ff;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-7 col-md-7">
                    <div class="section-title mb-50">
                        <h2 class="font-40 text-white">Parent account</h2>
                        <p class="text-white font-16 font-weight-500">We make it easy to be involved in your child’s learning Ability to assign activities</p>
                    </div>
                    <ul>
                        <li><span class="font-18">Real-Time diagnostics</span></li>
                        <li><span class="font-18">Track Child’s Learning</span></li>
                        <li><span class="font-18">Assign Goals for your Child</span></li>
                        <li><span class="font-18">Regular Notifications on Activities.</span></li>
                        <li><span class="font-18">learning controls</span></li>
                        <li><span class="font-18">Easy to Manage Sibling Accounts</span></li>
                    </ul>
                </div>
                <div class="col-12 col-lg-5 col-md-5">
                    <div class="imb-box"><img alt="banner-home image" height="570" src="/assets/default/img/banner-home.webp" width="548" /></div>
                </div>
            </div>
        </div>
    </section>


    @php
        $packages_only = isset( $packages )? $packages : array();
        $show_details = isset( $show_details )? $show_details : true;
    @endphp
    <section class="lms-setup-progress-section lms-membership-section mb-0 pt-70 pb-60"
             data-currency_sign="{{getCurrencySign()}}" style="background-color: #fff;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 text-center">
                    <div class="section-title text-center mb-40">
                        <h2 itemprop="title" class="font-40 text-dark-charcoal mb-0">Choose the right plan for you</h2>
                        <p class="font-19 pt-10">Save more with annual pricing</p>
                    </div>
                </div>
                <div class="col-12 col-lg-12 text-center">
                    <div class="plan-switch-holder">
                        <div class="plan-switch-option">
                            <span class="switch-label">Pay Monthly</span>
                            <div class="plan-switch">
                                <div class="custom-control custom-switch"><input type="checkbox" name="disabled"
                                                                                 class="custom-control-input subscribed_for-field" value="12"
                                                                                 id="iNotAvailable" /><label class="custom-control-label"
                                                                                                             for="iNotAvailable"></label></div>
                            </div>
                            <span class="switch-label">Pay Yearly</span>
                        </div>
                        <div class="save-plan"><span class="font-18 font-weight-500">Save 25%</span></div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-12 mx-auto">
                    <div class="row">

                        @include('web.default.pricing.packages_list',['subscribes' => array(), 'packages_only' =>
                        $packages_only, 'show_details' => false])

                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade lms-choose-membership" id="subscriptionModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
                <div class="modal-body">
                    <div class="tab-content subscription-content" id="nav-tabContent">
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>



</section>

@endsection

@push('scripts_bottom')
<script src="/assets/default/vendors/masonry/masonry.pkgd.min.js"></script>
<script src="/assets/default/vendors/scroll-animation/wow.js"></script>
@endpush
