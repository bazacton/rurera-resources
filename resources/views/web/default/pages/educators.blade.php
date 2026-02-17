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
                    <h1>Upgrade Your Classroom <span itemprop="sub title" class="text-scribble">Experience</span></h1>
                    <p itemprop="description" class="font-14">Rurera offers a platform for teachers and educators designed to enhance their teaching skills and effectiveness.</p>
                    <ul class="mb-30">
                        <li class="mb-10"><img alt="#" height="18" src="../assets/default/svgs/check-simple.svg" width="18" itemprop="check image" class="img-sm mr-10" />Enhance teaching skills</li>
                        <li class="mb-10"><img alt="#" height="18" src="../assets/default/svgs/check-simple.svg" width="18" itemprop="check image" class="img-sm mr-10" />Reduced workload</li>
                        <li class="mb-10">
                            <img alt="#" height="18" src="../assets/default/svgs/check-simple.svg" width="18" itemprop="check image" class="img-sm mr-10" />Fast grading using automated marking
                        </li>
                        <li>
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
                    <h2 class="font-40 mb-20">Rurera's Impact on Your School</h2>
                    <p itemprop="description" class="font-16 mb-0">
                        Rurera simplifies teaching with user-friendly features that are loved by both teachers and students.<br />
                        Explore the array of flexible benefits below:
                    </p>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div>
                    <h2 class="font-weight-bold font-36 text-dark">Ease Teacher's Workload</h2>
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
                    <h2 class="font-weight-bold font-36 text-dark">Efficiently Track Student Progress</h2>
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
                    <h2 class="font-weight-bold font-36 text-dark">Real-Time diagnostics</h2>
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
                    <h2 class="font-weight-bold font-36 text-dark">Quick &amp; precise Assessments</h2>
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
                    <h2 class="font-weight-bold font-36 text-dark">Improved Educational Standard</h2>
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
    <section class="pb-60 rurera-testimonials mt-50 testimonials-fancy">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12 col-md-12">
                    <div class="text-center section-title mb-40"><h2 class="mb-10 font-40 mt-20">Schools trusting Ruera for enternace exams preps</h2></div>
                </div>
                <div class="col-12 col-sm-12 col-lg-3 col-md-6">
                    <div class="fancy testimonial-card">
                        <div class="text-center testimonial-img">
                            <figure><img alt="bran images" height="120" src="/assets/default/img/bri-client2.jpg" width="120" itemprop="image" loading="eager" title="bran images" /></figure>
                        </div>
                        <div class="testimonial-body">
                            <h2 class="post-title">Cristian Miller</h2>
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
                            <h2 class="post-title">Peter J.</h2>
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
                            <h2 class="post-title">Fiona Thompson</h2>
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
                            <h2 class="post-title">Kyle Matt</h2>
                            <span itemprop="sub title" class="sub-title">Teacher</span>
                            <p itemprop="description">As a teacher i would encourage to follow Rurera for sure.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pb-50 find-instructor-section rurera-search-services mb-70 parent-account-section pt-70 mt-0" style="background-color: #7679ee;" id="assessments">
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
   {!! parseShortcode('[SC_accordion-slider-section-f]') !!}
   {!! parseShortcode('[SC_educator-faqs-section-f]') !!}

    <section class="mx-w-100 rurera-column-section rurera-text-section py-70" style="background-color: #f27530;" id="request-demo">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 col-md-8">
                    <div class="d-flex flex-column rurera-text-holder">
                        <div class="col-12 col-lg-12 col-md-12">
                            <h2 class="text-white font-40 mb-20">Explore Rurera: Schedule Your Demo</h2>
                            <p itemprop="description" class="font-16 mb-0 text-white">
                                Interested in how Rurera assessments can benefit your school? Schedule a meeting with our team to explore how our solutions can integrate with your educational approach. Click the button below to book a demo
                                today!
                            </p>
                            <div class="rurera-btn-group mt-30"><a class="text-white border-white rurera-btn rounded-pill" href="https://rurera.com/request-a-demo" itemprop="url">Request a demo</a></div>
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