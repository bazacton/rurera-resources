@extends(getTemplate().'.layouts.app')

@push('styles_top')
<link rel="stylesheet" href="/assets/default/vendors/scroll-animation/animate.css">
@endpush

@section('content')
<section class="content-section">
    <section class="position-relative find-instructor-section gallery-sub-header job-singup-sub-header mb-0 page-sub-header pb-50 pt-80">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 col-lg-7 col-md-7">
                    <h1 class="font-weight-bold font-72" itemprop="title">Upgrade Your Classroom <span itemprop="sub title" class="text-scribble">Experience</span></h1>
                    <p itemprop="description" class="font-19">Rurera offers a platform for teachers and educators designed to enhance their teaching skills and effectiveness.</p>
                    <ul class="mb-30" itemprop="courses list">
                        <li class="mb-10 font-19" itemprop="course short info"><img alt="#" height="18" src="../assets/default/svgs/check-simple.svg" width="18" itemprop="check image" class="img-sm mr-10" />Enhance teaching skills</li>
                        <li class="mb-10 font-19" itemprop="course short info"><img alt="#" height="18" src="../assets/default/svgs/check-simple.svg" width="18" itemprop="check image" class="img-sm mr-10" />Reduced workload</li>
                        <li class="mb-10 font-19" itemprop="course short info">
                            <img alt="#" height="18" src="../assets/default/svgs/check-simple.svg" width="18" itemprop="check image" class="img-sm mr-10" />Fast grading using automated marking
                        </li>
                        <li class="mb-10 font-19" itemprop="course short info">
                            <img alt="#" height="18" src="../assets/default/svgs/check-simple.svg" width="18" itemprop="check image" class="img-sm mr-10" />Homework aligned with national curriculum
                        </li>
                    </ul>
                    <a class="text-white bg-primary justify-content-center mt-0 register-btn try-rurera-btn" href="https://rurera.com/pricing">Try Rurera for free</a>
                </div>
                <div class="col-12 col-lg-5 col-md-5">
                    <figure class="position-relative mb-80 mt-sm-50">
                        <img alt="The next-generation e-learning platform" height="460" src="../assets/default/img/educatormain-image1.jpg" width="414" itemprop="image" class="rounded-sm" />
                        <img alt="sub image" height="257" src="../assets/default/img/educatormain-image2.jpg" width="220" itemprop="image" class="rounded-sm sub-thumb" />
                        <img alt="circle" height="170" src="/assets/default/img/home/circle-4.png" width="170" itemprop="image" class="find-instructor-section-circle" style="right: -70px;" />
                        <img alt="dots" height="110" src="/assets/default/img/home/dot.png" width="70" itemprop="image" class="find-instructor-section-dots" />
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <section class="position-relative find-instructor-section container home-sections home-sections-swiper mt-0">
        <div class="row align-items-center">
            <div class="col-12 col-sm-12 col-lg-12 col-md-12">
                <div class="section-title mb-50">
                    <h2 class="font-40 mb-20" itemprop="title">Rurera's Impact on Your School</h2>
                    <p itemprop="description" class="font-16 mb-0">
                        Rurera simplifies teaching with user-friendly features that are loved by both teachers and students.<br />
                        Explore the array of flexible benefits below:
                    </p>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div>
                    <h2 class="font-weight-bold font-36 text-dark" itemprop="title">Ease Teacher's Workload</h2>
                    <p itemprop="description" class="font-16 font-weight-normal mt-10 text-gray">
                        Easily Create and personalize Homework and Lessons with Teacher-Created Resources Tailored for KS1, KS2 Courses, 11+, SATs exam, and Entrance Exams preps. Teachers can leverage these resources to enhance their lessons,
                        engage students, and create dynamic learning experiences.
                    </p>
                </div>
            </div>
            <div class="col-12 col-lg-6 mt-20 mt-lg-0">
                <div class="position-relative">
                    <img alt="Have a Question? Ask it in forum and get answer" height="524" src="/store/1/default_images/home_sections_banners/curriculum.jpg" width="402" itemprop="image" class="find-instructor-section-hero" loading="eager" title="get answer" />
                    <img alt="circle" height="170" src="/assets/default/img/home/circle-4.png" width="170" itemprop="image" class="find-instructor-section-circle" loading="eager" title="circle" />
                    <img alt="dots" height="110" src="/assets/default/img/home/dot.png" width="110" itemprop="image" class="find-instructor-section-dots" loading="eager" title="dots" />
                </div>
            </div>
        </div>
    </section>
    <section class="position-relative find-instructor-section container home-sections home-sections-swiper instructor-img-first">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 mt-20 mt-lg-0">
                <div class="position-relative">
                    <img
                        alt="Become an instructor"
                        height="460"
                        src="/store/1/default_images/home_sections_banners/analytics.jpg"
                        width="400"
                        itemprop="image"
                        class="find-instructor-section-hero"
                        loading="eager"
                        title="Become an instructor"
                    />
                    <img alt="circle" height="170" src="/assets/default/img/home/circle-4.png" width="170" itemprop="image" class="find-instructor-section-circle" loading="eager" title="circle" />
                    <img alt="dots" height="110" src="/assets/default/img/home/dot.png" width="70" itemprop="image" class="find-instructor-section-dots" loading="eager" title="dots" />
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div>
                    <h2 class="font-weight-bold font-36 text-dark" itemprop="title">Efficiently Track Student Progress</h2>
                    <p itemprop="description" class="font-16 font-weight-normal mt-10 text-gray">
                        Tracking student progress is essential for creating an effective learning environment. Rurera offers a user-friendly platform where teachers can analyze individual and group performance trends. Students can also access
                        their academic progress and compare themselves with their peers.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="position-relative find-instructor-section container home-sections home-sections-swiper">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6">
                <div>
                    <h2 class="font-weight-bold font-36 text-dark" itemprop="title">Real-Time diagnostics</h2>
                    <p itemprop="description" class="font-16 font-weight-normal mt-10 text-gray">
                        Analyze the level of student engagement through interactive tools, quizzes, assessments, SATs practice papers, entrance exams practices. This will ensure immediate feedback to students and detailed insights for teachers.
                    </p>
                </div>
            </div>
            <div class="col-12 col-lg-6 mt-20 mt-lg-0">
                <div class="position-relative">
                    <img
                        alt="Track Student Progress"
                        height="524"
                        src="/store/1/default_images/home_sections_banners/diagnostics.jpg"
                        width="402"
                        itemprop="image"
                        class="find-instructor-section-hero"
                        loading="eager"
                        title="Track Student Progress"
                    />
                    <img alt="circle" height="170" src="/assets/default/img/home/circle-4.png" width="170" itemprop="image" class="find-instructor-section-circle" loading="eager" title="circle" />
                    <img alt="dots" height="70" src="/assets/default/img/home/dot.png" width="110" itemprop="image" class="find-instructor-section-dots" loading="eager" title="dots" />
                </div>
            </div>
        </div>
    </section>
    <section class="position-relative find-instructor-section container home-sections home-sections-swiper instructor-img-first">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 mt-20 mt-lg-0">
                <div class="position-relative">
                    <img
                        alt="Have a Question? Ask it in forum and get answer"
                        height="524"
                        src="/store/1/default_images/home_sections_banners/assesment-quiz.jpg"
                        width="402"
                        itemprop="image"
                        class="find-instructor-section-hero"
                        loading="eager"
                        title="get answer"
                    />
                    <img alt="circle" height="170" src="/assets/default/img/home/circle-4.png" width="170" itemprop="image" class="find-instructor-section-circle" loading="eager" title="circle" />
                    <img alt="dots" height="110" src="/assets/default/img/home/dot.png" width="70" itemprop="image" class="find-instructor-section-dots" loading="eager" title="dots" />
                    <div class="align-items-center d-flex bg-white border example-instructor-card p-5 p-md-15 rounded-sm shadow-lg">
                        <div class="example-instructor-card-avatar">
                            <img alt="user name" height="512" src="/assets/default/img/home/become_instructor.svg" width="512" itemprop="image" class="img-cover rounded-circle" loading="eager" title="user name" />
                        </div>
                        <div class="flex-grow-1 ml-15"><span class="font-weight-bold d-block font-14 text-secondary">Take a quiz</span><span class="text-gray font-12 font-weight-500">Start earning with practice now..</span></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div>
                    <h2 class="font-weight-bold font-36 text-dark" itemprop="title">Quick &amp; precise Assessments</h2>
                    <p itemprop="description" class="font-16 font-weight-normal mt-10 text-gray">
                        Automated marking is implemented, where answers to questions are automatically assessed. Real-time marking data allows for quick identification of students who may require additional support or challenges. Students
                        receive instant personalized feedback for every question and learning nugget.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="position-relative find-instructor-section container home-sections home-sections-swiper">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6">
                <div>
                    <h2 class="font-weight-bold font-36 text-dark" itemprop="title">Improved Educational Standard</h2>
                    <p itemprop="description" class="font-16 font-weight-normal mt-10 text-gray">
                        It provide training on new technologies, instructional strategies, and assessment methods specific to the online environment. These opportunities can enhance teachers' skills and keep them up to date with the latest
                        educational trends.
                    </p>
                </div>
            </div>
            <div class="col-12 col-lg-6 mt-20 mt-lg-0">
                <div class="position-relative">
                    <img
                        alt="Find the best instructor"
                        height="402"
                        src="/store/1/default_images/home_sections_banners/empower.jpg"
                        width="524"
                        itemprop="image"
                        class="find-instructor-section-hero"
                        loading="eager"
                        title="Find the best instructor"
                    />
                    <img alt="circle" height="170" src="/assets/default/img/home/circle-4.png" width="170" itemprop="image" class="find-instructor-section-circle" loading="eager" title="circle" />
                    <img alt="dots" height="110" src="/assets/default/img/home/dot.png" width="70" itemprop="image" class="find-instructor-section-dots" loading="eager" title="dots" />
                </div>
            </div>
        </div>
    </section>
    <section class="pb-60 lms-testimonials mt-50 testimonials-fancy">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12 col-md-12">
                    <div class="text-center section-title mb-40"><h2 class="mb-10 font-40 mt-20" itemprop="title">Schools trusting Ruera for enternace exams preps</h2></div>
                </div>
                <div class="col-12 col-sm-12 col-lg-3 col-md-6">
                    <div class="fancy testimonial-card">
                        <div class="text-center testimonial-img">
                            <figure><img alt="bran images" height="120" src="/assets/default/img/bri-client2.jpg" width="120" itemprop="image" loading="eager" title="bran images" /></figure>
                        </div>
                        <div class="testimonial-body">
                            <h2 class="post-title" itemprop="title">Cristian Miller</h2>
                            <span itemprop="sub title" class="sub-title">Teacher</span>
                            <p itemprop="description">Rurera is an advance emerging learning platform. Love it!</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-3 col-md-6">
                    <div class="fancy testimonial-card">
                        <div class="text-center testimonial-img">
                            <figure><img alt="bran images" height="120" src="/assets/default/img/bri-client1.jpg" width="120" itemprop="image" loading="eager" title="bran images" /></figure>
                        </div>
                        <div class="testimonial-body">
                            <h2 class="post-title" itemprop="title">Peter J.</h2>
                            <span itemprop="sub title" class="sub-title">Student</span>
                            <p itemprop="description">My first choice is Rurera when it comes to pro level learning.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-3 col-md-6">
                    <div class="fancy testimonial-card">
                        <div class="text-center testimonial-img">
                            <figure><img alt="bran images" height="120" src="/assets/default/img/bri-client3.jpg" width="120" itemprop="image" loading="eager" title="bran images" /></figure>
                        </div>
                        <div class="testimonial-body">
                            <h2 class="post-title" itemprop="title">Fiona Thompson</h2>
                            <span itemprop="sub title" class="sub-title">Parent</span>
                            <p itemprop="description">Rurera has recognized itself a great platform. Recommmended</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-3 col-md-6">
                    <div class="fancy testimonial-card">
                        <div class="text-center testimonial-img">
                            <figure><img alt="bran images" height="120" src="../assets/default/img/bri-client6.jpg" width="120" itemprop="image" loading="eager" title="bran images" /></figure>
                        </div>
                        <div class="testimonial-body">
                            <h2 class="post-title" itemprop="title">Kyle Matt</h2>
                            <span itemprop="sub title" class="sub-title">Teacher</span>
                            <p itemprop="description">As a teacher i would encourage to follow Rurera for sure.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pb-50 find-instructor-section lms-search-services mb-70 parent-account-section pt-70 mt-0" style="background-color: #7679ee;" id="assessments">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 col-md-6">
                    <div class="position-relative"><img alt="#" height="350" src="../assets/default/img/assessments-educators.png" width="390" /></div>
                </div>
                <div class="col-12 col-lg-6 col-md-6">
                    <h2 class="font-weight-bold font-36 d-block mb-15 text-white">Rapid Assessments for Schools</h2>
                    <ul class="pt-30" itemprop="courses list">
                        <li class="text-white font-18" itemprop="course short info">Adaptive Learning</li>
                        <li class="text-white font-18" itemprop="course short info">For ages 5 to 11</li>
                        <li class="text-white font-18" itemprop="course short info">Teacher-Written Content</li>
                        <li class="text-white font-18" itemprop="course short info">Creative Problem Solving</li>
                        <li class="text-white font-18" itemprop="course short info">Comprehensive Quiz &amp; Questions</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="w-100 lms-accordion-section lms-column-section pb-60" style="max-width: 100%;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12 col-md-12">
                    <div class="text-center section-title mb-0"><h2 class="font-40" itemprop="section title">Why choose Rurera assessments ?</h2></div>
                </div>
                <div class="col-12 col-sm-12 col-lg-12 col-md-12">
                    <div class="accordion lms-accordion-modern" id="accordion-modern" itemscope="" itemtype="https://schema.org/accordion">
                        <div class="card active">
                            <div class="card-header" id="heading-1">
                                <button aria-controls="collapse-1" aria-expanded="false" class="btn btn-link collapsed btn-block text-left" data-target="#collapse-1" data-toggle="collapse" itemprop="button" type="button">
                                    <span itemprop="size">#1</span>Adaptive Assessments Testing
                                </button>
                            </div>
                            <div class="collapse show" id="collapse-1" aria-labelledby="heading-1" data-parent="#accordion-modern">
                                <div class="card-body">
                                    <p itemprop="description" class="font-16 font-weight-normal">
                                        It helps schools to offer adaptive assessments that adjust the difficulty of questions as below, emerging, expected, exceeding and challenge which is based on a student's previous responses, history,
                                        reports and performance providing a more tailored learning experience.
                                    </p>
                                </div>
                            </div>
                            <div class="lms-img-holder">
                                <figure><img alt="company sats" height="auto" src="../assets/default/img/adpative-assessment.jpg" width="100%" itemprop="image" class="w-100" loading="eager" title="company sats" /></figure>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading-2">
                                <button aria-controls="collapse-2" aria-expanded="false" class="btn btn-link collapsed btn-block text-left" data-target="#collapse-2" data-toggle="collapse" itemprop="button" type="button">
                                    <span itemprop="size">#2</span>Quick Results via automated marking
                                </button>
                            </div>
                            <div class="collapse" id="collapse-2" aria-labelledby="heading-2" data-parent="#accordion-modern">
                                <div class="card-body">
                                    <p itemprop="description" class="font-16 font-weight-normal">
                                        Real-time marking data allows for quick identification of students who may require additional support or challenges. Students receive instant personalized feedback for every question and learning nugget.
                                    </p>
                                </div>
                            </div>
                            <div class="lms-img-holder">
                                <figure><img alt="company performance" height="401" src="/assets/default/img/company-quiz.jpg" width="652" itemprop="image" class="w-100" loading="eager" title="company performance" /></figure>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading-3">
                                <button aria-controls="collapse-3" aria-expanded="false" class="btn btn-link collapsed btn-block text-left" data-target="#collapse-3" data-toggle="collapse" itemprop="button" type="button">
                                    <span itemprop="size">#3</span>Diverse Question Formats
                                </button>
                            </div>
                            <div class="collapse" id="collapse-3" aria-labelledby="heading-3" data-parent="#accordion-modern">
                                <div class="card-body">
                                    <p itemprop="description" class="font-16 font-weight-normal">
                                        Online assessments can include a variety of question types, from multiple choice to audio types offering a more comprehensive evaluation of student knowledge.
                                    </p>
                                </div>
                            </div>
                            <div class="lms-img-holder">
                                <figure><img alt="company rewards" height="401" src="../assets/default/img/all-in-1-platform.jpg" width="652" itemprop="image" class="w-100" loading="eager" title="company rewards" /></figure>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading-4">
                                <button aria-controls="collapse-4" aria-expanded="false" class="btn btn-link collapsed btn-block text-left" data-target="#collapse-4" data-toggle="collapse" itemprop="button" type="button">
                                    <span itemprop="size">#4</span>Timely Reporting
                                </button>
                            </div>
                            <div class="collapse" id="collapse-4" aria-labelledby="heading-4" data-parent="#accordion-modern">
                                <div class="card-body">
                                    <p itemprop="description" class="font-16 font-weight-normal">Online platforms often provide real-time reporting to both students and teachers, allowing for prompt interventions and support.</p>
                                </div>
                            </div>
                            <div class="lms-img-holder">
                                <figure><img alt="company insights" height="401" src="../assets/default/img/company-sats.jpg" width="652" itemprop="image" class="w-100" loading="eager" title="company insights" /></figure>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading-5">
                                <button aria-controls="collapse-5" aria-expanded="false" class="btn btn-link collapsed btn-block text-left" data-target="#collapse-5" data-toggle="collapse" itemprop="button" type="button">
                                    <span itemprop="size">#5</span>Breakthrough insights at every level
                                </button>
                            </div>
                            <div class="collapse" id="collapse-5" aria-labelledby="heading-5" data-parent="#accordion-modern">
                                <div class="card-body">
                                    <p itemprop="description" class="font-16 font-weight-normal">
                                        Students and their parents can access a dashboard that displays their live progress in various subjects. It allows them to identify their strengths and areas needing improvement. Parents can monitor
                                        completed work, track their child's progress, and view assigned tasks.
                                    </p>
                                </div>
                            </div>
                            <div class="lms-img-holder">
                                <figure><img alt="company quiz" height="401" src="../assets/default/img/company-insights.jpg" width="652" itemprop="image" class="w-100" loading="eager" title="company quiz" /></figure>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading-6">
                                <button aria-controls="collapse-6" aria-expanded="true" class="btn btn-link collapsed btn-block text-left" data-target="#collapse-6" data-toggle="collapse" itemprop="button" type="button">
                                    <span itemprop="size">#6</span>Students Engagement
                                </button>
                            </div>
                            <div class="collapse" id="collapse-6" aria-labelledby="heading-6" data-parent="#accordion-modern">
                                <div class="card-body">
                                    <p itemprop="description" class="font-16 font-weight-normal">
                                        Ignite student’s passion more to join your school. A fantastic learning experience is possible using interactive challenges, Online Test practices, Entrance Exams preparations and rewarding them with
                                        trending toys.
                                    </p>
                                </div>
                            </div>
                            <div class="lms-img-holder">
                                <figure><img alt="company curriculum" height="401" src="../assets/default/img/company-performance.jpg" width="652" itemprop="image" class="w-100" loading="eager" title="company curriculum" /></figure>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading-6">
                                <button aria-controls="collapse-7" aria-expanded="true" class="btn btn-link collapsed btn-block text-left" data-target="#collapse-7" data-toggle="collapse" itemprop="button" type="button">
                                    <span itemprop="size">#7</span>Reward points
                                </button>
                            </div>
                            <div class="collapse" id="collapse-7" aria-labelledby="heading-7" data-parent="#accordion-modern">
                                <div class="card-body">
                                    <p itemprop="description" class="font-16 font-weight-normal">
                                        Unlock Knowledge and Reward Yourself with Exciting Toys. It implies through continuous learning and improvement, students can increase their chances of winning playful toys. We believe in recognizing and
                                        appreciating your loyalty and engagement.
                                    </p>
                                </div>
                            </div>
                            <div class="lms-img-holder">
                                <figure><img alt="company curriculum" height="auto" src="../assets/default/img/company-rewards.jpg" width="100%" itemprop="image" class="w-100" loading="eager" title="company curriculum" /></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center section-title mb-50"><h2 class="mb-10 font-40 text-dark-charcoal">Frequently asked questions</h2></div>
                </div>
                <div class="col-12 col-sm-12 col-lg-12 col-md-12 mx-auto">
                    <div class="mt-0 lms-faqs mx-w-100" itemtype="https://schema.org/Question" itemprop="mainEntity">
                        <div id="accordion">
                            <div class="card" itemtype="https://schema.org/Question" itemprop="mainEntity">
                                <div class="card-header" id="headingon11">
                                    <button aria-controls="collapse11" aria-expanded="false" class="font-weight-bold btn btn-link collapsed font-18" data-target="#collapse11" data-toggle="collapse">
                                        What makes Rurera different from other educational platforms?
                                    </button>
                                </div>
                                <div class="collapse" id="collapse11" aria-labelledby="heading11" data-parent="#accordion">
                                    <div class="card-body" itemtype="https://schema.org/Answer" itemprop="acceptedAnswer">
                                        <p itemprop="text">
                                            Rurera offers a range of adaptive learning tools, teacher-created resources, and real-time performance tracking, designed to enhance both teaching and learning. Our platform focuses on personalized
                                            learning to meet the unique needs of each student and supports teachers with efficient lesson planning and progress monitoring.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card" itemtype="https://schema.org/Question" itemprop="mainEntity">
                                <div class="card-header" id="headingon12">
                                    <button aria-controls="collapse12" aria-expanded="true" class="font-weight-bold btn btn-link collapsed font-18" data-target="#collapse12" data-toggle="collapse">
                                        What kind of features does Rurera provide for teachers?
                                    </button>
                                </div>
                                <div class="collapse" id="collapse12" aria-labelledby="heading12" data-parent="#accordion">
                                    <div class="card-body" itemtype="https://schema.org/Answer" itemprop="acceptedAnswer">
                                        <p itemprop="text">
                                            Rurera offers a hub of teacher-created materials, including lesson plans, real-time performance tracking, quizzes, mock tests, and interactive activities. These resources are designed to be flexible
                                            and easily integrated into your existing curriculum.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card" itemtype="https://schema.org/Question" itemprop="mainEntity">
                                <div class="card-header" id="heading">
                                    <button aria-controls="collapseOne" aria-expanded="true" class="font-weight-bold btn btn-link collapsed font-18" data-target="#collapseOne" data-toggle="collapse">
                                        How can Rurera help reduce educators' workload?
                                    </button>
                                </div>
                                <div class="collapse" id="collapseOne" aria-labelledby="heading" data-parent="#accordion">
                                    <div class="card-body" itemtype="https://schema.org/Answer" itemprop="acceptedAnswer">
                                        <p itemprop="text">
                                            By offering easy-to-use tools for creating and customizing lessons and homework, as well as automated grading, Rurera streamlines administrative tasks and allows you to focus more on teaching.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card" itemtype="https://schema.org/Question" itemprop="mainEntity">
                                <div class="card-header" id="headingThree">
                                    <button aria-controls="collapseThree" aria-expanded="false" class="font-weight-bold btn btn-link collapsed font-18" data-target="#collapseThree" data-toggle="collapse">
                                        Can Rurera help with student assessments?
                                    </button>
                                </div>
                                <div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body" itemtype="https://schema.org/Answer" itemprop="acceptedAnswer">
                                        <p itemprop="text">
                                            Yes, Rurera includes a variety of assessment tools, such as quizzes and mock tests, that helps teachers to evaluate student understanding and track their progress over time. Detailed performance
                                            reports assist in identifying areas for improvement.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card" itemtype="https://schema.org/Question" itemprop="mainEntity">
                                <div class="card-header" id="headingfive">
                                    <button aria-controls="collapsefive" aria-expanded="false" class="font-weight-bold btn btn-link collapsed font-18" data-target="#collapsefive" data-toggle="collapse">
                                        Are Rurera’s resources aligned with the national curriculum?
                                    </button>
                                </div>
                                <div class="collapse" id="collapsefive" aria-labelledby="headingfive" data-parent="#accordion">
                                    <div class="card-body" itemtype="https://schema.org/Answer" itemprop="acceptedAnswer">
                                        <p itemprop="text">Yes, Rurera’s resources are designed to align with national curriculum standards, ensuring they are relevant and useful for a variety of educational requirements.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card" itemtype="https://schema.org/Question" itemprop="mainEntity">
                                <div class="card-header" id="heading6">
                                    <button aria-controls="collapse6" aria-expanded="false" class="font-weight-bold btn btn-link collapsed font-18" data-target="#collapse6" data-toggle="collapse">How can I create quizzes on Rurera?</button>
                                </div>
                                <div class="collapse" id="collapse6" aria-labelledby="heading6" data-parent="#accordion">
                                    <div class="card-body" itemtype="https://schema.org/Answer" itemprop="acceptedAnswer">
                                        <p itemprop="text">
                                            Rurera provides an easy-to-use quiz creation tool where teachers can design custom quizzes to assess student understanding. You can choose from various question formats, set difficulty levels, and
                                            schedule quizzes according to your teaching plan.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card" itemtype="https://schema.org/Question" itemprop="mainEntity">
                                <div class="card-header" id="heading7">
                                    <button aria-controls="collapse7" aria-expanded="false" class="font-weight-bold btn btn-link collapsed font-18" data-target="#collapse7" data-toggle="collapse">
                                        Can I get insights into individual student performance?
                                    </button>
                                </div>
                                <div class="collapse" id="collapse7" aria-labelledby="heading7" data-parent="#accordion">
                                    <div class="card-body" itemtype="https://schema.org/Answer" itemprop="acceptedAnswer">
                                        <p itemprop="text">
                                            Yes, Rurera offers detailed insights into student performance, including breakdowns of quiz results, assignment scores, and overall progress. You can view individual performance data to identify
                                            strengths and areas for improvement.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mx-w-100 lms-column-section lms-text-section py-70" style="background-color: #f27530;" id="request-demo">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 col-md-8">
                    <div class="d-flex flex-column lms-text-holder">
                        <div class="col-12 col-lg-12 col-md-12">
                            <h2 class="text-white font-40 mb-20" itemprop="title">Explore Rurera: Schedule Your Demo</h2>
                            <p itemprop="description" class="font-16 mb-0 text-white">
                                Interested in how Rurera assessments can benefit your school? Schedule a meeting with our team to explore how our solutions can integrate with your educational approach. Click the button below to book a demo
                                today!
                            </p>
                            <div class="lms-btn-group mt-30"><a class="text-white border-white lms-btn rounded-pill" href="https://rurera.com/request-a-demo" itemprop="url">Request a demo</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-4">
                    <div class="position-relative"><img alt="#" height="270" src="../assets/default/img/request-a-demo.png" width="375" /></div>
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
