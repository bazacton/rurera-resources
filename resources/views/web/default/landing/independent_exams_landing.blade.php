@extends(getTemplate().'.layouts.app')

@push('styles_top')
<link rel="stylesheet" href="/assets/default/vendors/scroll-animation/aos.css"/>
<style>
    .gallery-sub-header {
        min-height: 850px;
    }

    .lms-search-services {
        background-color: #f27530;
    }

    .lms-column-section {
        background-color: #7679ee;
    }

    .choose-sats-section {
        background-color: #3d358b;
    }
</style>
@endpush

@section('content')
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
        .gallery-sub-header {
            min-height: 480px;
        }
        .lms-column-section {
            background-color: #75c0fa;
        }
        .lms-newsletter {
            background-color: var(--gray-dark);
        }
    </style>
    <section class="gallery-sub-header job-singup-sub-header mb-70 page-sub-header pb-10 position-relative pt-80">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 col-lg-6 col-md-6">
                    <h1 class="font-weight-bold font-72"><span class="mr-10 text-scribble">Independent Schools</span>Entrance Exams</h1>
                    <h2 class="font-30 mb-15">Unlock your Dreams: Master Entrance Exams</h2>
                    <h3>Prepare for UK independent entrance exams with ease using our comprehensive resources. Our expert support helps you excel effortlessly.</h3>
                    <ul class="mb-30 p-0">
                        <li class="mb-10 font-19"><img alt="#" height="25" src="../assets/default/svgs/mobile.svg" width="25" />Learning Practice: Targeted skill-building sessions.</li>
                        <li class="mb-10 font-19"><img alt="#" height="25" src="../assets/default/svgs/preparation.svg" width="25" />Test Preparation: Comprehensive exam strategies.</li>
                        <li class="mb-10 font-19"><img alt="#" height="25" src="../assets/default/svgs/graphic-design.svg" width="25" />Score Guarantee: Commitment to improved performance.</li>
                        <li class="font-19"><img alt="#" height="25" src="../assets/default/svgs/book-opend.svg" width="25" />100% Proven Approach: Proven approach to success.</li>
                    </ul>
                    <div class="d-flex align-items-center"><a href="#" class="rounded-pill btn-primary">11 plus exams</a><a href="#" class="rounded-pill btn-primary ml-15">More practices</a></div>
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
                        <h2 class="font-40" itemprop="title">What Our Independent Exam Preparation Offers</h2>
                        <h3 class="text-gray">Achieve Success with Our Personalized Prep and Guidance</h3>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-6 col-md-6">
                    <div class="lms-feature-card mt-50">
                        <figure>
                            <i class="svg-icon" style="background-color: #5e82d8;"><img alt="Pretest Activities" height="150" src="/assets/default/svgs/features-user.svg" width="150" /></i>
                        </figure>
                        <div class="lms-text-holder">
                            <h3 class="font-30 mb-15 post-title" itemprop="title">Pretest Activities</h3>
                            <p class="font-18 text-dark" itemprop="description">
                                <b>Practice with Rurera.</b><br />
                                Our assessments inspire students to embrace growth, and help them recognize their potential and continuously improve their performance.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-6 col-md-6">
                    <div class="lms-feature-card mt-50">
                        <figure>
                            <i class="svg-icon" style="background-color: #46b7e9;"><img alt="100+ ISEB Resources" height="200" src="/assets/default/svgs/features-resources.svg" width="200" /></i>
                        </figure>
                        <div class="lms-text-holder">
                            <h3 class="font-30 mb-15 post-title" itemprop="title">Timed Test Challenges</h3>
                            <p class="font-18 text-dark" itemprop="description">
                                <b>Excel with Timed Practice.</b><br />
                                Rurera offers custom time limits tailored to the specific requirements of different independent school exams to sharpen skills under pressure with timed sessions, helping students boost performance and build
                                confidence for exam day.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-6 col-md-6">
                    <div class="lms-feature-card mt-50">
                        <figure>
                            <i class="svg-icon" style="background-color: #3cb46e;"><img alt="Timed Test Challenges" height="200" src="/assets/default/svgs/features-time-test.svg" width="200" /></i>
                        </figure>
                        <div class="lms-text-holder">
                            <h3 class="font-30 mb-15 post-title" itemprop="title">Pinpoint and Improve</h3>
                            <p class="font-18 text-dark" itemprop="description">
                                <b>Master Your Weak Spots.</b><br />
                                Identify your areas for improvement through customized assessments, and strengthen those skills with targeted practice. Our approach ensures you focus on what matters most, boosting both confidence and
                                performance.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-6 col-md-6">
                    <div class="lms-feature-card mt-50">
                        <figure>
                            <i class="svg-icon" style="background-color: #f87966;"><img alt="Identify and Improve" height="200" src="/assets/default/svgs/features-globe.svg" width="200" /></i>
                        </figure>
                        <div class="lms-text-holder">
                            <h3 class="font-30 mb-15 post-title" itemprop="title">100+ Practice Resources</h3>
                            <p class="font-18 text-dark" itemprop="description">
                                <b>Unlimited Practice, Unlimited Progress</b><br />
                                Gain access to a wide range of practice resources designed to sharpen your skills. With opportunities to learn and improve, you can build confidence and achieve your academic goals at your own pace.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-6 col-md-6">
                    <div class="lms-feature-card mt-50">
                        <figure>
                            <i class="svg-icon" style="background-color: #3cb46e;"><img alt="Up-to-Date Reports" height="200" src="/assets/default/svgs/features-time-test.svg" width="200" /></i>
                        </figure>
                        <div class="lms-text-holder">
                            <h3 class="font-30 mb-15 post-title" itemprop="title">Frequent Updates &amp; In-Depth Reports</h3>
                            <p class="font-18 text-dark" itemprop="description">
                                <b>Track Progress, Achieve More</b><br />
                                Stay on top of your growth with frequent progress reviews and detailed reports. Our insights help you understand your strengths, identify areas for improvement, and ensure you're always moving towards success.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-6 col-md-6">
                    <div class="lms-feature-card mt-50">
                        <figure>
                            <i class="svg-icon" style="background-color: #46b7e9;"><img alt="Dedicated Professional Support" height="200" src="/assets/default/svgs/features-resources.svg" width="200" /></i>
                        </figure>
                        <div class="lms-text-holder">
                            <h3 class="font-30 mb-15 post-title" itemprop="title">Dedicated Professional Support</h3>
                            <p class="font-18 text-dark" itemprop="description">
                                <b>Expert Guidance, Independent Success</b><br />
                                Rurera's Dedicated Professional Support feature provides students with expertly designed practice tests and clear guidelines, offering valuable feedback to help them improve and excel in their exam preparation.
                                This ensures students have the tools and resources needed to succeed independently.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container-w lms-column-section lms-text-section mt-40 pb-30 pl-30 pr-30 pt-30">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12 col-md-12">
                    <div class="lms-text-holder d-flex justify-content-between">
                        <div class="d-flex flex-column">
                            <h4 class="mb-10 align-items-center d-flex font-24 text-white">
                                <span class="icon-svg mr-15"><img alt="#" height="35" src="../assets/default/svgs/bulb-white.svg" width="35" /></span>Exploring the National Curriculum in the UK?
                            </h4>
                            <p class="mb-0 font-16 text-white">Our resources will help you navigate and provide a comprehensive learning experience for your students.</p>
                        </div>
                        <div class="justify-content-center lms-btn-group"><a href="https://rurera.com" class="text-white border-white lms-btn rounded-pill">Find more</a></div>
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
                        <figure class="mb-20" class="mb-20">

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
                    <div itemprop="mainEntity" itemtype="https://schema.org/Question" class="accordion lms-accordion-modern"
                         id="accordion-modern">
                        <div class="card active" itemprop="mainEntity" itemtype="https://schema.org/Question">
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
                                             alt="company sats" title="company sats" width="100%" height="auto"
                                             itemprop="image" loading="eager" /></figure>
                            </div>
                        </div>
                        <div class="card" itemprop="mainEntity" itemtype="https://schema.org/Question">
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
                                             alt="company performance" title="company performance" width="100%" height="auto"
                                             itemprop="image" loading="eager" /></figure>
                            </div>
                        </div>
                        <div class="card" itemprop="mainEntity" itemtype="https://schema.org/Question">
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
                                             alt="company rewards" title="company rewards" width="100%" height="auto"
                                             itemprop="image" loading="eager" /></figure>
                            </div>
                        </div>
                        <div class="card" itemprop="mainEntity" itemtype="https://schema.org/Question">
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
                                             alt="company insights" title="company insights" width="100%" height="auto"
                                             itemprop="image" loading="eager" /></figure>
                            </div>
                        </div>
                        <div class="card" itemprop="mainEntity" itemtype="https://schema.org/Question">
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
                                             alt="company quiz" title="company quiz" width="100%" height="auto"
                                             itemprop="image" loading="eager" /></figure>
                            </div>
                        </div>
                        <div class="card" itemprop="mainEntity" itemtype="https://schema.org/Question">
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
                                             alt="company curriculum" width="100%" height="auto" title="company curriculum"
                                             itemprop="image" loading="eager" /></figure>
                            </div>
                        </div>
                        <div class="card" itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <div class="card-header" id="heading-6">
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
                                             alt="company curriculum" width="100%" height="auto" title="company curriculum"
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
                        <div class="mt-0 lms-faqs mx-w-100" itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <div id="accordion">
                                <div class="card" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="headingonsix">
                                        <h3 class="mb-0">
                                            <button aria-controls="collapsesix" aria-expanded="true" class="font-18 btn btn-link collapsed font-weight-bold" data-target="#collapsesix" data-toggle="collapse">
                                                What types of vocabulary resources does Rurera provide?
                                            </button>
                                        </h3>
                                    </div>
                                    <div class="collapse" id="collapsesix" aria-labelledby="headingsix" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>
                                                Rurera offers a comprehensive curriculum based Word Directory, custom word lists, and sets to expand your child’s word knowledge. These resources are tailored to meet individual learning needs and
                                                interests.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="headingTwo">
                                        <h3 class="mb-0">
                                            <button aria-controls="collapseTwo" aria-expanded="false" class="font-18 btn btn-link collapsed font-weight-bold" data-target="#collapseTwo" data-toggle="collapse">
                                                What is the importance of vocabulary in language learning?
                                            </button>
                                        </h3>
                                    </div>
                                    <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body"><p>Vocabulary is crucial for effective communication and understanding. A strong vocabulary enhances reading comprehension, writing ability, and overall language skills.</p></div>
                                    </div>
                                </div>
                                <div class="card" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="headingseven">
                                        <h3 class="mb-0">
                                            <button aria-controls="collapseseven" aria-expanded="false" class="font-18 btn btn-link collapsed font-weight-bold" data-target="#collapseseven" data-toggle="collapse">
                                                What are some common strategies for memorizing spelling words?
                                            </button>
                                        </h3>
                                    </div>
                                    <div class="collapse" id="collapseseven" aria-labelledby="headingseven" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>
                                                Strategies include breaking words into smaller parts, using mnemonic devices, practicing writing words repeatedly, and employing visual aids. Engaging in regular review and practice helps
                                                reinforce spelling.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="heading8">
                                        <h3 class="mb-0">
                                            <button aria-controls="collapse8" aria-expanded="false" class="font-18 btn btn-link collapsed font-weight-bold" data-target="#collapse8" data-toggle="collapse">
                                                What are some effective methods for teaching vocabulary?
                                            </button>
                                        </h3>
                                    </div>
                                    <div class="collapse" id="collapse8" aria-labelledby="heading8" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>
                                                Effective methods include using flashcards, reading diverse texts, playing word games, and incorporating new words into daily conversations. Creating thematic word lists and practicing in context
                                                can also help build vocabulary.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="heading9">
                                        <h3 class="mb-0">
                                            <button aria-controls="collapse9" aria-expanded="false" class="font-18 btn btn-link collapsed font-weight-bold" data-target="#collapse9" data-toggle="collapse">
                                                How do the Play and Learn Quizzes work?
                                            </button>
                                        </h3>
                                    </div>
                                    <div class="collapse" id="collapse9" aria-labelledby="heading9" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Our Play and Learn Quizzes turn vocabulary and spelling practice into engaging games. Kids complete interactive challenges that reinforce their learning in a fun and motivating way.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="heading10">
                                        <h3 class="mb-0">
                                            <button aria-controls="collapse10" aria-expanded="false" class="font-18 btn btn-link collapsed font-weight-bold" data-target="#collapse10" data-toggle="collapse">
                                                How can Progress Rewards benefit my child?
                                            </button>
                                        </h3>
                                    </div>
                                    <div class="collapse" id="collapse10" aria-labelledby="heading10" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Progress Rewards provide tangible recognition for your child’s achievements. Earning rewards for milestones and improvements helps keep them motivated and engaged in their learning journey.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="heading11">
                                        <h3 class="mb-0">
                                            <button aria-controls="collapse11" aria-expanded="false" class="font-18 btn btn-link collapsed font-weight-bold" data-target="#collapse11" data-toggle="collapse">
                                                Why should I choose Rurera for my child’s vocabulary and spelling practice?
                                            </button>
                                        </h3>
                                    </div>
                                    <div class="collapse" id="collapse11" aria-labelledby="heading11" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>
                                                Rurera stands out with its engaging features, personalized learning tools, and a fun, interactive approach. We provide a comprehensive platform that makes vocabulary and spelling practice both
                                                effective and enjoyable for kids.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="heading12">
                                        <h3 class="mb-0">
                                            <button aria-controls="collapse12" aria-expanded="false" class="font-18 btn btn-link collapsed font-weight-bold" data-target="#collapse12" data-toggle="collapse">
                                                How can I find new vocabulary words to learn on Rurera?
                                            </button>
                                        </h3>
                                    </div>
                                    <div class="collapse" id="collapse12" aria-labelledby="heading12" data-parent="#accordion">
                                        <div class="card-body"><p>Explore Rurera’s word lists, daily vocabulary features, and spelling bee vocabulary sets to discover new words to learn.</p></div>
                                    </div>
                                </div>
                                <div class="card" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="heading13">
                                        <h3 class="mb-0">
                                            <button aria-controls="collapse13" aria-expanded="false" class="font-18 btn btn-link collapsed font-weight-bold" data-target="#collapse13" data-toggle="collapse">
                                                How often should I practice spelling on Rurera to improve?
                                            </button>
                                        </h3>
                                    </div>
                                    <div class="collapse" id="collapse13" aria-labelledby="heading13" data-parent="#accordion">
                                        <div class="card-body"><p>For the best results, practice regularly aim for a few times a week. Consistent practice helps reinforce your spelling skills and improve over time.</p></div>
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
                        <h2 class="text-white font-40">Parent account</h2>
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
    <section class="lms-setup-progress-section lms-membership-section mb-0 pt-70 pb-60" data-currency_sign="{{getCurrencySign()}}" style="background-color: #fff;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 text-center">
                    <div class="element-title text-center mb-40">
                        <h2 itemprop="title" class="font-40 text-dark-charcoal mb-0">Choose the right plan for you</h2>
                        <p class="font-19 pt-10">Save more with annual pricing</p>
                    </div>
                </div>
                <div class="col-12 col-lg-12 text-center">
                    <div class="plan-switch-holder">
                        <div class="plan-switch-option">
                            <span class="switch-label">Pay Monthly</span>
                            <div class="plan-switch">
                                <div class="custom-control custom-switch"><input type="checkbox" name="disabled" class="custom-control-input subscribed_for-field" value="12" id="iNotAvailable" /><label class="custom-control-label" for="iNotAvailable"></label></div>
                            </div>
                            <span class="switch-label">Pay Yearly</span>
                        </div>
                        <div class="save-plan"><span class="font-18 font-weight-500">Save 25%</span></div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-12 mx-auto">
                    <div class="row">

                        @include('web.default.pricing.packages_list',['subscribes' => array(), 'packages_only' => $packages_only, 'show_details' => false])

                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade lms-choose-membership" id="subscriptionModal" tabindex="-1" aria-labelledby="subscriptionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <div class="modal-body">
                    <div class="tab-content subscription-content" id="nav-tabContent">
                    </div>
                </div>
            </div>
        </div>
    </div>

    </section>
@endsection

@push('scripts_bottom')
<script src="/assets/default/vendors/scroll-animation/aos.js"></script>
<script>
    AOS.init();
</script>
<script src="/assets/default/js/helpers.js"></script>
<script src="/assets/default/vendors/masonry/masonry.pkgd.min.js"></script>
@endpush
