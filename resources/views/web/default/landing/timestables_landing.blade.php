@extends(getTemplate().'.layouts.app')

@push('styles_top')

@endpush

@section('content')
<section class="content-section">
    <section class="time-tables-sub-header pt-70 pb-80 text-center" style="background-color: #333399;">
        <div class="container">
            <div class="row">
                <div class="col-11 mx-auto">
                    <h1 class="text-white mb-20">Master TimesTables with Fun <span class="text-scribble">Tricks!</span></h1>
                    <p class="text-white font-14 mb-20">
                        Fun Techniques-Learning Made Exciting and Rewarding!
                        A brilliant way to learn times tables multiplication and division. With these smart practices, recalling maths times tables will be an enjoyable journey filled with excitement and rewards.
                        recalling maths times tables will be an enjoyable journey filled with excitement and rewards.
                    </p>
                    <div class="row">
                        <div class="col-12 col-lg-4 col-md-4">
                            <div class="icon-box">
                                <span class="icon-holder" style="background-color: #f6b801;">
                                    <img src="/assets/default/svgs/student-user-white.svg" alt="#" height="30" width="30" />
                                </span>
                                <div class="text-holder">
                                    <h2 class="text-white font-18 font-weight-bold mb-10 d-block">Treasure Hunt</h2>
                                    <p class="text-white font-14">Transform learning times tables into an adventurous treasure hunt with our engaging time tables games.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4">
                            <div class="icon-box">
                                <span class="icon-holder" style="background-color: #7679ee;">
                                    <img src="/assets/default/svgs/student-user-white.svg" alt="#" height="30" width="30" />
                                </span>
                                <div class="text-holder">
                                    <h2 class="text-white font-18 font-weight-bold mb-10 d-block"> Division Tables Magic</h2>
                                    <p class="text-white font-14">Bring division and multiplication table magic to life by turning it into a storytelling experience.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4">
                            <div class="icon-box">
                                <span class="icon-holder" style="background-color: #f35b05;">
                                    <img src="/assets/default/svgs/student-user-white.svg" alt="#" height="30" width="30" />
                                </span>
                                <div class="text-holder">
                                    <h2 class="text-white font-18 font-weight-bold mb-10 d-block">Multiplication Challenges</h2>
                                    <p class="text-white font-14">Offering interactive challenges specifically designed for earning bonus points.Offering interactive multiplication times table games specifically designed for earning bonus points.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="rurera-search-services find-instructor-section mt-60 pt-80 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 col-md-6">
                    <div class="position-relative">
                        <img src="/assets/default/img/time-tables/times-tables.png" height="350" width="390" alt="#" />
                        <img src="/assets/default/img/home/circle-4.png" class="find-instructor-section-circle" alt="circle" width="170" height="170" style="top: -50px; right: 25%;" />
                        <img src="/assets/default/img/home/dot.png" class="find-instructor-section-dots" alt="dots" width="70" height="110" style="left: 0; bottom: 0;" />
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-md-6 text-center">
                    <h2 class="mb-10">Rurera</h2>
                    <p class="font-14 text-gray mb-30">
                    <a href="https://rurera.com/">Rurera</a>provides awesome and interactive ways for students to learn times tables while having fun. Immediate feedback helps identify and correct mistakes during times table practice.
                    </p>
                    <strong class="font-18 mb-20 d-block">Memorize times tables, Multiply with Ease!</strong>
                    <p class="font-14 text-gray">
                        Our personalized approach allows students to focus on specific times tables they find challenging, spending more time practice times tables on those facts until they are confidently memorized.
                    </p>
                    <div class="d-flex align-items-center justify-content-center pt-30">
                        <a href="/pricing" class="try-rurera-btn justify-content-center bg-primary text-white register-btn">Try Rurera for free</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="rurera-column-section rurera-text-section mx-w-100 py-50 pr-30 pl-30" style="background-color: #7679ee;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="rurera-text-holder d-flex justify-content-between">
                        <div class="d-flex flex-column">
                            <h3 class="mb-10 d-flex text-white">
                                <span class="icon-svg mr-15 mt-5">
                                    <img src="/assets/default/svgs/bulb-white.svg" alt="#" height="35" width="35" />
                                </span> Boost Your Child's Multiplication and Division Skills with a Splash of Fun!
                            </h3>
                        </div>
                        <div class="rurera-btn-group justify-content-center">
                            <a href="{{url('/')}}/register" class="rurera-btn rounded-pill text-white border-white">Find more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="choose-sats pt-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-30">
                        <h2 class="mt-0 mb-10">How times tables work</h2>
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-6">
                    <div class="sats-box d-inline-flex border-solid border-transparent">
                        <img class="mb-15" src="/assets/default/svgs/exam-multiple.svg" alt="#" height="50" width="50" /> <span class="font-18">Register / login</span>
                        <p class="pt-10 font-14 text-dark">Register today via our website and access tools to learn times tables.</p>
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-6">
                    <div class="sats-box d-inline-flex border-solid border-transparent">
                        <img class="mb-15" src="/assets/default/svgs/lessons.svg" alt="#" height="50" width="50" /> <span class="font-18">Create Accounts</span>
                        <p class="pt-10 font-14 text-dark">Easily setup accounts for parents, students and teachers to benefit from our timetables online game platform.</p>
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-6">
                    <div class="sats-box d-inline-flex border-solid border-transparent">
                        <img class="mb-15" src="/assets/default/svgs/impact.svg" alt="#" height="50" width="50" /> <span class="font-18">Learn &amp; Play</span>
                        <p class="pt-10 font-14 text-dark">Students will have access to both single and multiplayer tables games interfaces.</p>
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-6">
                    <div class="sats-box d-inline-flex border-solid border-transparent">
                        <img class="mb-15" src="/assets/default/svgs/sav-time.svg" alt="#" height="50" width="50" /> <span class="font-18">Progress Tracking</span>
                        <p class="pt-10 font-14 text-dark">Use the stats to keep track of your child's math times tables practice and celebrate their success.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="choose-sats pt-50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 col-md-6">
                    <div class="sats-box d-inline-flex border-solid border-transparent text-left align-items-start" style="background: #f6b801;color: #fff;">
                        <h2 class="mt-0 mb-10 font-24">Essential tool for Maths teachers</h2>
                        <p class="pt-0 font-16" style="text-align: left;">Rurera provides interactive times table practice sessions, personalized feedback, and engaging timetable games to support effective math instruction:</p><br>
                        <ul style="text-align: left;">
                            <li>- Progress can be monitored on a heatmap during times table practice.</li>
                            <li>- Helps track student progress and evaluate understanding of maths time tables.</li>
                            <li>- Provides targeted support and times tables games resources.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-md-6">
                    <div class="sats-box d-inline-flex border-solid border-transparent text-left align-items-start" style="background: #f35b05;color: #fff;">
                        <h2 class="mt-0 mb-10 font-24">Engaging, trusted and easy to use</h2>
                        <p class="pt-0 font-16" style="text-align: left;">Tailor Multiplication and Division Practice times tables to Your Child’s Needs. Daily Quizzes, Adaptive Learning, and Fun Rewards for Consistent Progress!
                        </p><br>
                        <ul style="text-align: left;">
                            <li>- Times table questions and quizzes adapt to each child’s unique learning needs</li>
                            <li>- Give your child daily times table practice and see results.</li>
                            <li>- More practicing gives more chances to win rewards.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="d-flex align-items-center justify-content-center pt-50">
        <a href="/pricing" class="try-rurera-btn justify-content-center bg-primary text-white register-btn">Try Rurera for free</a>
    </div>
    <section class="pt-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title mb-50 text-center">
                        <h2 class="mb-10">Discover the Core Features of Rurera!</h2>
                        <p class="font-14 text-gray">Rurera provides powerful resources that align with student's specific interests and learning goals.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40">
                        <figure class="mb-20">
                            <img src="../assets/default/img/ks1-year1-feature.jpg" alt="feature image" height="143" width="276">
                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold">
                            <span class="text-dark-charcoal">Times Tables Practice</span>
                        </h3>
                        <p itemprop="description">Interactive games and quizzes to help students practice and master their multiplication tables.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40">
                        <figure class="mb-20">
                            <img src="../assets/default/img/entrance-exams.jpg" alt="feature image" height="143" width="276">
                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold">
                            <span class="text-dark-charcoal">Personalised Learning</span>
                        </h3>
                        <p itemprop="description">Adaptive learning paths that adjust to each student's skill level and progress, providing tailored challenges and practice.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40">
                        <figure class="mb-20">
                            <img src="../assets/default/img/sats-home-feature.jpg" alt="feature image" height="143" width="276">
                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold">
                            <span class="text-dark-charcoal">Progress Tracking</span>
                        </h3>
                        <p itemprop="description">Detailed reports and statistics to track individual progress, including speed and accuracy.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40">
                        <figure class="mb-20">
                            <img src="../assets/default/img/analytics-feature.jpg" alt="feature image" height="143" width="276">
                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold">
                            <span class="text-dark-charcoal">Learn & Play</span>
                        </h3>
                        <p itemprop="description">Student will have access to both single and multi player games interfaces.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40">
                        <figure class="mb-20">
                            <img src="../assets/default/img/quick-assesments.jpg" alt="feature image" height="143" width="276">
                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold">
                            <span class="text-dark-charcoal">Achievements and Rewards</span>
                        </h3>
                        <p itemprop="description"> Badges and rewards to celebrate milestones and encourage continued practice.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40">
                        <figure class="mb-20">
                            <img src="../assets/default/img/feature-automated-marking.jpg" alt="feature image" height="143" width="276">
                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold">
                            <span class="text-dark-charcoal">Varied Game Modes</span>
                        </h3>
                        <p itemprop="description">Different modes to keep practice sessions diverse and engaging.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40">
                        <figure class="mb-20">
                            <img src="../assets/default/img/insights-feature.jpg" alt="feature image" height="143" width="276">
                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold">
                            <span class="text-dark-charcoal">Breakthrough insights</span>
                        </h3>
                        <p itemprop="description">It significantly allows to identify student’s learning strengths and areas needing improvement.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40">
                        <figure class="mb-20">
                            <img src="../assets/default/img/timetables-feature.jpg" alt="feature image" height="143" width="276">
                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold">
                            <span class="text-dark-charcoal">TimeTables Revision</span>
                        </h3>
                        <p itemprop="description">Offering interactive Multiplication and division Practices and challenges to Master TimesTables online.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40">
                        <figure class="mb-20">
                            <img src="../assets/default/img/rewards-store-feature.jpg" alt="feature image" height="143" width="276">
                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold">
                            <span class="text-dark-charcoal">Rewards Store</span>
                        </h3>
                        <p itemprop="description">Students can redeem coin points and exchange trending toys with every practice via Rurera toy store.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="rurera-column-section rurera-accordion-section w-100 pb-80 pt-80" style="background-color: #f6f0ea; max-width: 100%;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-title mb-35 text-center">
                        <h2>Why choose Rurera assessments ?</h2>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question" class="accordion rurera-accordion-modern" id="accordion-modern">
                        <div class="card active" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <div class="card-header" id="heading-1">
                                <button class="btn btn-link btn-block text-left collapsed" 
                                    type="button" data-toggle="collapse" data-target="#collapse-1" 
                                    aria-expanded="false" aria-controls="collapse-1">
                                    <span itemprop="size">#1</span> Adaptive Assessments Testing
                                </button>
                            </div>
                            <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" 
                                data-parent="#accordion-modern">
                                <div class="card-body">
                                    <p itemprop="description" class="font-16 font-weight-normal">
                                        It helps schools to offer adaptive assessments that adjust the difficulty of questions as below: 
                                        emerging, expected, exceeding, and challenge—based on a student's previous responses, history, 
                                        reports, and performance, providing a more tailored learning experience.
                                    </p>
                                </div>
                            </div>
                            <div class="rurera-img-holder">
                                <figure><img class="w-100" src="../assets/default/img/adpative-assessment.jpg" alt="company sats" title="company sats" width="652" height="401" itemprop="image" loading="eager" /></figure>
                            </div>
                        </div>
                        <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <div class="card-header" id="heading-2">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                    <span itemprop="size">#2</span>Quick Results via automated marking
                                </button>
                            </div>
                            <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-modern">
                                <div class="card-body">
                                    <p itemprop="description" class="font-16 font-weight-normal">
                                        Real-time marking data allows for quick identification of students who may require additional support or challenges. Students receive instant personalized feedback for every question and learning nugget.
                                    </p>
                                </div>
                            </div>
                            <div class="rurera-img-holder">
                                <figure><img class="w-100" src="../assets/default/img/company-quiz.jpg" alt="company performance" title="company performance" width="652" height="401" itemprop="image" loading="eager" /></figure>
                            </div>
                        </div>
                        <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <div class="card-header" id="heading-3">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                    <span itemprop="size">#3</span>Diverse Question Formats
                                </button>
                            </div>
                            <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-modern">
                                <div class="card-body">
                                    <p itemprop="description" class="font-16 font-weight-normal">
                                        Online assessments can include a variety of question types, from multiple choice to audio types offering a more comprehensive evaluation of student knowledge.
                                    </p>
                                </div>
                            </div>
                            <div class="rurera-img-holder">
                                <figure><img class="w-100" src="../assets/default/img/all-in-1-platform.jpg" alt="company rewards" title="company rewards" width="652" height="401" itemprop="image" loading="eager" /></figure>
                            </div>
                        </div>
                        <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <div class="card-header" id="heading-4">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                    <span itemprop="size">#4</span>Timely Reporting
                                </button>
                            </div>
                            <div id="collapse-4" class="collapse" aria-labelledby="heading-4" data-parent="#accordion-modern">
                                <div class="card-body">
                                    <p itemprop="description" class="font-16 font-weight-normal">Online platforms often provide real-time reporting to both students and teachers, allowing for prompt interventions and support.</p>
                                </div>
                            </div>
                            <div class="rurera-img-holder">
                                <figure><img class="w-100" src="../assets/default/img/company-sats.jpg" alt="company insights" title="company insights" width="652" height="401" itemprop="image" loading="eager" /></figure>
                            </div>
                        </div>
                        <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <div class="card-header" id="heading-5">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
                                    <span itemprop="size">#5</span>Breakthrough insights at every level
                                </button>
                            </div>
                            <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion-modern">
                                <div class="card-body">
                                    <p itemprop="description" class="font-16 font-weight-normal">
                                        Students and their parents can access a dashboard that displays their live progress in various subjects. It allows them to identify their strengths and areas needing improvement. Parents can monitor
                                        completed work, track their child's progress, and view assigned tasks.
                                    </p>
                                </div>
                            </div>
                            <div class="rurera-img-holder">
                                <figure><img class="w-100" src="../assets/default/img/company-insights.jpg" alt="company quiz" title="company quiz" width="652" height="401" itemprop="image" loading="eager" /></figure>
                            </div>
                        </div>
                        <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <div class="card-header" id="heading-6">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse-6" aria-expanded="true" aria-controls="collapse-6">
                                    <span itemprop="size">#6</span>Students Engagement
                                </button>
                            </div>
                            <div id="collapse-6" class="collapse" aria-labelledby="heading-6" data-parent="#accordion-modern">
                                <div class="card-body">
                                    <p itemprop="description" class="font-16 font-weight-normal">
                                        Ignite student’s passion more to join your school. A fantastic learning experience is possible using interactive challenges, Online Test practices, Entrance Exams preparations and rewarding them with
                                        trending toys.
                                    </p>
                                </div>
                            </div>
                            <div class="rurera-img-holder">
                                <figure><img class="w-100" src="../assets/default/img/company-performance.jpg" alt="company curriculum" width="652" height="401" title="company curriculum" itemprop="image" loading="eager" /></figure>
                            </div>
                        </div>
                        <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <div class="card-header" id="heading-7">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse-7" aria-expanded="true" aria-controls="collapse-7">
                                    <span itemprop="size">#7</span>Reward points
                                </button>
                            </div>
                            <div id="collapse-7" class="collapse" aria-labelledby="heading-7" data-parent="#accordion-modern">
                                <div class="card-body">
                                    <p itemprop="description" class="font-16 font-weight-normal">
                                        Unlock Knowledge and Reward Yourself with Exciting Toys. It implies through continuous learning and improvement, students can increase their chances of winning playful toys. We believe in recognizing and
                                        appreciating your loyalty and engagement.
                                    </p>
                                </div>
                            </div>
                            <div class="rurera-img-holder">
                                <figure><img class="w-100" src="../assets/default/img/company-rewards.jpg" alt="company curriculum" width="652" height="401" title="company curriculum" itemprop="image" loading="eager" /></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-center pt-50">
            <a href="/pricing" class="try-rurera-btn justify-content-center bg-primary text-white register-btn">Try Rurera for free</a>
        </div>
    </section>

    @php $faq_items = isset( $faq_items )? $faq_items : array();@endphp
   
    <section class="parent-account-section mt-0" style="background-color: #0065ff;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-7 col-md-7">
                    <div class="section-title mb-50">
                        <h2 class="font-40 text-white">Parent account</h2>
                        <p class="font-16 font-weight-500 text-white">We make it easy to be involved in your child’s learning Ability to assign activities</p>
                    </div>
                    <ul>
                        <li><span>Real-Time diagnostics</span></li>
                        <li><span>Track Child’s Learning</span></li>
                        <li><span>Assign Goals for your Child</span></li>
                        <li><span>Regular Notifications on Activities.</span></li>
                        <li><span>learning controls</span></li>
                        <li><span>Easy to Manage Sibling Accounts</span></li>
                    </ul>
                </div>
                <div class="col-12 col-lg-5 col-md-5">
                    <div class="imb-box">
                        <img src="/assets/default/img/banner-home.webp" width="548" height="570" alt="banner-home image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    @php
    $packages_only = isset( $packages )? $packages : array();
    $show_details = isset( $show_details )? $show_details : true;
    @endphp
    <section class="rurera-setup-progress-section rurera-membership-section mb-0 pt-70" data-currency_sign="{{getCurrencySign()}}" style="background-color: #fff;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 text-center">
                    <div class="section-title text-center mb-40">
                        <h2 class="mb-0">Choose the right plan for you</h2>
                        <p class="pt-10">Save more with annual pricing</p>
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
    <div class="modal fade rurera-choose-membership" id="subscriptionModal">
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
 {!! parseShortcode([SC_times-table-faqs-section-f]') !!}
{!! parseShortcode('[SC_Rurera-Help-Section]') !!}

@endsection

@push('scripts_bottom')
<script src="/assets/default/vendors/masonry/masonry.pkgd.min.js"></script>
@endpush