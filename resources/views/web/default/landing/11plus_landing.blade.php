@extends(getTemplate().'.layouts.app')

@push('styles_top')

@endpush

@section('content')
<section class="content-section">
    <section class="position-relative job-singup-sub-header gallery-sub-header page-sub-header pb-0 pt-80 mb-70" style="min-height: 650px;">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 col-md-6 col-lg-6">
                    <h1 class="font-72 font-weight-bold"><span class="text-scribble mr-10">11 Plus</span>and Entrance Exams</h1>
                    <h2 class="mb-15 font-30">Unlock Opportunities: Ace the 11 Plus Exam!
                    </h2>
                    <p class="font-19">The 11 Plus is a selective entrance exam for grammar and independent schools in England, 
                    taken in Year 6. It assesses English, Maths, and reasoning skills under timed conditions. </p>
                    <ul class="mb-30 p-0 categories-option">
                        <li class="mb-10 font-19">
                            11 plus practice papers & learning modules
                        </li>
                        <li class="mb-10 font-19">
                            11 plus assessment & standardised 11 plus tests
                        </li>
                        <li class="mb-10 font-19">
                            11 plus quizzes & strategic exam prep
                        </li>
                        <li class="font-19">
                            Focused results and progress guarantees
                        </li>
                    </ul>
                    <a href="{{url('/')}}/pricing" class="py-15 px-30 text-dark-blue register-btn try-rurera-btn  mt-0">Try Rurera for free</a>
                </div>
            </div>
        </div>
        <div class="masonry-grid-gallery has-fix-height">
            <div class="masonry-grid">
                <div class="row">
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/pricing">
                                    <img src="../assets/default/img/11-plus/paper1.png" alt="sats-header"
                                        title="sats-header" width="192" height="157" itemprop="image" loading="eager"
                                        class="rounded has-shadow-x"></a>
                            </figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/pricing">
                                    <img src="../assets/default/img/11-plus/paper2.png" alt="sats-header"
                                        title="sats-header" width="192" height="294" itemprop="image" loading="eager"
                                        class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/pricing"><img src="../assets/default/img/11-plus/paper3.png"
                                        alt="sats-header" title="sats-header" width="192" height="294"
                                        itemprop="image" loading="eager" class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/pricing"><img src="../assets/default/img/11-plus/paper4.png"
                                        alt="sats-header" title="sats-header" width="192" height="294"
                                        itemprop="image" loading="eager" class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/pricing"><img src="../assets/default/img/11-plus/paper5.png"
                                        alt="sats-header" title="sats-header" width="192" height="193"
                                        itemprop="image" loading="eager" class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/pricing"><img src="../assets/default/img/11-plus/paper6.png"
                                        alt="sats-header" title="sats-header" width="192" height="228"
                                        itemprop="image" loading="eager" class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/pricing"><img src="../assets/default/img/11-plus/paper1.png"
                                        alt="sats-header" title="sats-header" width="192" height="157"
                                        itemprop="image" loading="eager" class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/pricing"><img src="../assets/default/img/11-plus/paper2.png"
                                        alt="sats-header" title="sats-header" width="192" height="294"
                                        itemprop="image" loading="eager" class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/pricing"><img src="../assets/default/img/11-plus/paper3.png"
                                        alt="sats-header" title="sats-header" width="192" height="294"
                                        itemprop="image" loading="eager" class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/pricing"><img src="../assets/default/img/11-plus/paper4.png"
                                        alt="sats-header" title="sats-header" width="192" height="294"
                                        itemprop="image" loading="eager" class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/pricing"><img src="../assets/default/img/11-plus/paper5.png"
                                        alt="sats-header" title="sats-header" width="192" height="193"
                                        itemprop="image" loading="eager" class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/pricing"><img src="../assets/default/img/11-plus/paper6.png"
                                        alt="sats-header" title="sats-header" width="192" height="228"
                                        itemprop="image" loading="eager" class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/pricing"><img src="../assets/default/img/11-plus/paper1.png"
                                        alt="sats-header" title="sats-header" width="192" height="157"
                                        itemprop="image" loading="eager" class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/pricing"><img src="../assets/default/img/11-plus/paper2.png"
                                        alt="sats-header" title="sats-header" width="192" height="294"
                                        itemprop="image" loading="eager" class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/pricing"><img src="../assets/default/img/11-plus/paper3.png"
                                        alt="sats-header" title="sats-header" width="192" height="294"
                                        itemprop="image" loading="eager" class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/pricing"><img src="../assets/default/img/11-plus/paper4.png"
                                        alt="sats-header" title="sats-header" width="192" height="294"
                                        itemprop="image" loading="eager" class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/pricing"><img src="../assets/default/img/11-plus/paper5.png"
                                        alt="sats-header" title="sats-header" width="192" height="193"
                                        itemprop="image" loading="eager" class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/pricing"><img src="../assets/default/img/11-plus/paper6.png"
                                        alt="sats-header" title="sats-header" width="192" height="228"
                                        itemprop="image" loading="eager" class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/pricing"><img src="../assets/default/img/11-plus/paper3.png"
                                        alt="sats-header" title="sats-header" width="192" height="294"
                                        itemprop="image" loading="eager" class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                    <div class="grid-item col-lg-3 col-md-4 col-sm-4">
                        <div class="img-holder">
                            <figure><a href="{{url('/')}}/pricing"><img src="../assets/default/img/11-plus/paper1.png"
                                        alt="sats-header" title="sats-header" width="192" height="157"
                                        itemprop="image" loading="eager" class="rounded has-shadow-x"></a></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="rurera-features-section mx-w-100 mt-20">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-title">
                        <h2 class="mb-5 font-40">Comprehensive 11 Plus Exam Prep with Rurera</h2>
                        <p itemprop="description" class="font-19 text-gray">Every year, over 100,000 children sit the 11 Plus across England, making early preparation an advantage rather than a luxury.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="rurera-feature-card mt-50">
                        <figure>
                            <i class="svg-icon bg-blue" style="background-color: #3d358b;">
                               <img src="/assets/default/svgs/feature-mock.svg" height="24" width="24" alt="Mock Exams"> 
                            </i>
                        </figure>
                        <div class="rurera-text-holder">
                            <h3 class="post-title font-30 mb-15">Mock Exams</h3>
                            <p itemprop="description" class="font-18 text-dark">Mock exams mirror real 11 Plus papers, helping children manage time, understand question 
                            patterns, and reduce exam-day anxiety. </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="rurera-feature-card mt-50">
                        <figure>
                            <i class="svg-icon bg-yellow" style="background-color: #f6b801;">
                                <img src="/assets/default/svgs/feature-time.svg" height="24" width="24" alt="Timed Practices"> 
                            </i>
                        </figure>
                        <div class="rurera-text-holder">
                            <h3 class="post-title font-30 mb-15">Timed Practices</h3>
                            <p itemprop="description" class="font-18 text-dark">Timed practice sessions train children to work accurately under pressure, improving pacing 
                            and decision-making so they can complete every section of the 11 Plus confidently.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="rurera-feature-card mt-50">
                        <figure>
                            <i class="svg-icon bg-deepyellow" style="background-color: #f18700;">
                                <img src="/assets/default/svgs/feature-target.svg" height="24" width="24" alt="Target Identification">
                            </i>
                        </figure>
                        <div class="rurera-text-holder">
                            <h3 class="post-title font-30 mb-15">Target Identification</h3>
                            <p itemprop="description" class="font-18 text-dark">Smart analysis highlights weaker topics from each 11 Plus paper, allowing children to 
                            practise the right areas instead of repeating content they already understand.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="rurera-feature-card mt-50">
                        <figure>
                            <i class="svg-icon bg-lightblue" style="background-color: #7679ee;">
                                <img src="/assets/default/svgs/feature-exam.svg" height="24" width="24" alt="Exam Practice Resources">
                            </i>
                        </figure>
                        <div class="rurera-text-holder">
                            <h3 class="post-title font-30 mb-15">Exam Practice Resources</h3>
                            <p itemprop="description" class="font-18 text-dark">A wide range of 11 Plus papers and interactive tools help children build exam stamina, 
                            reinforce core concepts, and practise consistently across all key subjects. </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="rurera-feature-card mt-50">
                        <figure>
                            <i class="svg-icon bg-orange" style="background-color: #f35b05;">
                                <img src="/assets/default/svgs/feature-progress.svg" height="24" width="24" alt="Progress Reports">
                            </i>
                        </figure>
                        <div class="rurera-text-holder">
                            <h3 class="post-title font-30 mb-15">Progress Reports</h3>
                            <p itemprop="description" class="font-18 text-dark">Detailed reports show how your child is improving across 11 Plus maths, English, and 
                            reasoning, helping parents support learning with clarity and confidence. </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="rurera-feature-card mt-50">
                        <figure>
                            <i class="svg-icon bg-deepskyblue" style="background-color: #46b7e9;">
                                <img src="/assets/default/svgs/feature-Professional.svg" height="24" width="24" alt="Professional Support">
                            </i>
                        </figure>
                        <div class="rurera-text-holder">
                            <h3 class="post-title font-30 mb-15">Professional Support</h3>
                            <p itemprop="description" class="font-18 text-dark">Professional feedback on 11 Plus mock exams helps refine exam technique, correct 
                            mistakes early, and build confidence through structured improvement.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="exames-section mt-50 mb-80 pt-70 pb-90 bg-exames">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-title mb-50 text-center">
                        <h2 class="text-white font-40">Discover Top Resources for 11 Plus & Entrance Exams!</h2>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="exame-listing">
                        <ul class="exame-holder">
                            <li class="exame-list border-right">
                                <a href="{{url('/')}}/pricing" class="d-flex align-items-center">
                                    <div class="img-holder">
                                        <figure>
                                            <span class="icon-savg">
                                                <img src="/assets/default/svgs/ex-english.svg" alt="ex-english">
                                            </span>
                                        </figure>
                                    </div>
                                    <div class="text-holder">
                                        <h3 class="post-title font-19 font-weight-bold">English</h3>
                                        <p itemprop="description" class="font-16 text-gray">Patterns, sequencing and geometry</p>
                                    </div>
                                </a>
                            </li>
                            <li class="exame-list">
                                <a href="{{url('/')}}/pricing" class="d-flex align-items-center">
                                    <div class="img-holder">
                                        <figure>
                                            <span class="icon-savg">
                                                <img src="/assets/default/svgs/ex-math.svg" alt="ex-math">
                                            </span>
                                        </figure>
                                    </div>
                                    <div class="text-holder">
                                        <h3 class="post-title font-19 font-weight-bold">
                                            Maths
                                        </h3>
                                        <p itemprop="description" class="font-16 text-gray">Patterns, sequencing and geometry</p>
                                    </div>
                                </a>
                            </li>
                            <li class="exame-list border-right">
                                <a href="{{url('/')}}/pricing" class="d-flex align-items-center">
                                    <div class="img-holder">
                                        <figure>
                                            <span class="icon-savg">
                                                <img src="/assets/default/svgs/ex-computing.svg" alt="ex-computing">
                                            </span>
                                        </figure>
                                    </div>
                                    <div class="text-holder">
                                        <h3 class="post-title font-19 font-weight-bold">
                                            Computing
                                        </h3>
                                        <p itemprop="description" class="font-16 text-gray">Patterns, sequencing and geometry</p>
                                    </div>
                                </a>
                            </li>
                            <li class="exame-list">
                                <a href="{{url('/')}}/pricing" class="d-flex align-items-center">
                                    <div class="img-holder">
                                        <figure>
                                            <span class="icon-savg">
                                                <img src="/assets/default/svgs/ex-science.svg" alt="ex-science">
                                            </span>
                                        </figure>
                                    </div>
                                    <div class="text-holder">
                                        <h3 class="post-title font-19 font-weight-bold">
                                            Science
                                        </h3>
                                        <p itemprop="description" class="font-16 text-gray">Patterns, sequencing and geometry</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="rurera-counter-section pb-10 bg-counter">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-title mb-50 text-center">
                        <h2 class="mb-10 font-40">Real practice, Proven Results</h2>
                        <p itemprop="description" class="font-19 text-gray">A platform hugely trusted by parents for 11 plus tuition near me , quality,
                            highly recommended by teachers, and loved by students for its engaging approach.</p>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="counter-holder row mt-100">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-30 position-relative">
                            <div class="rurera-counter-card counter-purple-bg text-white">
                                <strong itemprop="size" class="custom-counter" data-count="100"></strong><span class="plus-icons">+</span>
                                <p itemprop="description" class="font-16 text-white">
                                    11+ practices
                                </p>
                            </div>
                            <div class="svg-shapes-top">
                                <span class="icon-svg">
                                    <img src="/assets/default/svgs/svg-shapes-top.svg" width="64" height="64" alt="shapes-top svg">
                                </span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-30">
                            <div class="rurera-counter-card counter-yellow-bg text-white">
                                <strong itemprop="size" class="custom-counter" data-count="5000"></strong><span
                                    class="plus-icons">+</span>
                                <p itemprop="description" class="font-16 text-white">Questions</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-30 position-relative">
                            <div class="svg-shapes-bottom">
                                <span class="icon-svg">
                                    <img src="/assets/default/svgs/shapes-bottom.svg" width="64" height="64" alt="shapes-bottom svg">
                                </span>
                            </div>
                            <div class="rurera-counter-card counter-orange-bg text-white">
                                <strong itemprop="size" class="custom-counter" data-count="60"></strong><span class="plus-icons">+</span>
                                <p itemprop="description" class="font-16 text-white">
                                    Cities
                                </p>
                            </div>
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
                        <p class="font-16 text-gray">Empower your child’s unique learning journey with adaptive 11 plus tests and resources that respond to their individual needs.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40">
                        <figure class="mb-20">
                            <img src="../assets/default/img/ks1-year1-feature.jpg" alt="feature image" height="143" width="276">
                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold">
                            Game-Based Learning
                        </h3>
                        <p itemprop="description">Interactive games make 11 Plus practice enjoyable, helping children master skills while 
                        staying motivated and building confidence.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40">
                        <figure class="mb-20">
                            <img src="../assets/default/img/entrance-exams.jpg" alt="feature image" height="143" width="276">
                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold">
                            Essential Mock Exams
                        </h3>
                        <p itemprop="description">Full-length mock exams simulate real tests, teaching timing, question patterns, and 
                        strategies while reducing exam-day stress.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40">
                        <figure class="mb-20">
                            <img src="../assets/default/img/sats-home-feature.jpg" alt="feature image" height="143" width="276">
                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold">
                            Parental Insights
                        </h3>
                        <p itemprop="description">Parents can track completion, strengths, and areas for improvement to guide their child’s 
                        learning effectively and confidently.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40">
                        <figure class="mb-20">
                            <img src="../assets/default/img/analytics-feature.jpg" alt="feature image" height="143" width="276">
                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold">
                            Ultimate 11 Plus Practice Toolkit
                        </h3>
                        <p itemprop="description">A complete set of practice modules and progress tracking tools helps children improve skills independently and steadily.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40">
                        <figure class="mb-20">

                            <img src="../assets/default/img/quick-assesments.jpg" alt="feature image" height="143"
                                width="276">

                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold">
                            Top-Tier Study Materials
                        </h3>
                        <p itemprop="description">High-quality materials cover English, Maths, and reasoning, reinforcing core skills and preparing children for real 11 Plus exams.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40">
                        <figure class="mb-20">
                            <img src="../assets/default/img/feature-automated-marking.jpg" alt="feature image" height="143" width="276">
                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold">
                            Smart Exam Tactics
                        </h3>
                        <p itemprop="description">Children learn pacing, question strategies, and stress management to tackle each 11 Plus paper efficiently and confidently.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40">
                        <figure class="mb-20">

                            <img src="../assets/default/img/insights-feature.jpg" alt="feature image" height="143"
                                width="276">

                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold">
                            Adaptive Curriculum
                        </h3>
                        <p itemprop="description">The curriculum adapts in real time to each child’s strengths and weaknesses, focusing practice where it is needed most.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40">
                        <figure class="mb-20">
                            <img src="../assets/default/img/book-shelf-feature.jpg" alt="feature image" height="143" width="276">
                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold">
                            <span class="text-dark-charcoal">Personalised Practice</span>
                        </h3>
                        <p itemprop="description">Targeted practice sets strengthen weak areas, consolidate skills, and build confidence in a structured, achievable way.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40">
                        <figure class="mb-20">
                            <img src="../assets/default/img/timetables-feature.jpg" alt="feature image" height="143" width="276">
                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold">
                            <span class="text-dark-charcoal">Elevate 11 Plus Preparation</span>
                        </h3>
                        <p itemprop="description">Tailored practice papers and systematic guidance help children excel, boosting confidence, skills, and overall exam.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {!! parseShortcode('[SC_accordion-slider-section-f]') !!}
    @php $faq_items = isset( $faq_items )? $faq_items : array();@endphp

{!! parseShortcode('[SC_iseb-parent-account-section-f-end]') !!}

    @php
    $packages_only = isset( $packages )? $packages : array();
    $show_details = isset( $show_details )? $show_details : true;
    @endphp
    <section class="rurera-setup-progress-section rurera-membership-section mb-0 pt-70"
        data-currency_sign="{{getCurrencySign()}}" style="background-color: #fff;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 text-center">
                    <div class="section-title text-center mb-40">
                        <h2 class="font-40 text-dark-charcoal mb-0">Choose the right plan for you</h2>
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
    <div class="modal fade rurera-choose-membership" id="subscriptionModal">
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
{!! parseShortcode('[SC_11-plus-faqs-f]') !!}
{!! parseShortcode('[SC_Rurera-Help-Section]') !!}
@endsection

@push('scripts_bottom')
<script src="/assets/default/vendors/masonry/masonry.pkgd.min.js"></script>

<script>
    var counted = 0;
    $(window).scroll(function() {

    var oTop = $('.counter-holder').offset().top - window.innerHeight;
    if (counted == 0 && $(window).scrollTop() > oTop) {
        $('.custom-counter').each(function() {
        var $this = $(this),
            countTo = $this.attr('data-count');
        $({
            countNum: $this.text()
        }).animate({
            countNum: countTo
            },

            {

            duration: 2000,
            easing: 'swing',
            step: function() {
                $this.text(Math.floor(this.countNum));
            },
            complete: function() {
                $this.text(this.countNum);
                //alert('finished');
            }

            });
        });
        counted = 1;
    }

    });
</script>
@endpush