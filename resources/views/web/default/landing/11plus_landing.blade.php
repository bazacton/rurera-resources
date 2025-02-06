@extends(getTemplate().'.layouts.app')

@push('styles_top')
<style>
.gallery-sub-header {
    min-height: 650px;
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
</style>
@endpush

@section('content')
<section class="content-section">
    <section class="position-relative job-singup-sub-header gallery-sub-header page-sub-header pb-0 pt-80 mb-70">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 col-md-6 col-lg-6">
                    <h1 class="font-72 font-weight-bold"><span class="text-scribble mr-10">11 Plus</span>and Entrance Exams</h1>
                    <h2 class="mb-15 font-30">Unlock Opportunities: Ace the 11 Plus Exam!
                    </h2>
                    <p class="font-19">Prepare for selective school admissions with comprehensive learning and practice tools.</p>
                    <ul class="mb-30 p-0">
                        <li class="mb-10 font-19">
                            <img src="../assets/default/svgs/mobile.svg" alt="mobile" title="mobile" width="25" height="25" itemprop="image" loading="eager">11+ Learning practice
                        </li>
                        <li class="mb-10 font-19">
                            <img src="../assets/default/svgs/preparation.svg" alt="preparation" title="preparation" width="25" height="25" itemprop="image" loading="eager">11+ Assessment & 11+ Tests
                        </li>
                        <li class="mb-10 font-19">
                            <img src="../assets/default/svgs/graphic-design.svg" alt="graphic-design" title="graphic-design" width="25" height="25" itemprop="image" loading="eager">11+
                            Quizzes & Exam Prep
                        </li>
                        <li class="font-19">
                            <img src="../assets/default/svgs/book-opend.svg" alt="book-opend" title="book-opend" width="25" height="25" itemprop="image" loading="eager">Guaranteed Results
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
    <section class="lms-features-section mx-w-100 mt-20">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-title">
                        <h2 itemprop="title" class="mb-5 font-40">Comprehensive 11+ Exam Prep with Rurera</h2>
                        <p itemprop="description" class="font-19 text-gray">Boost Your Success: Tailored 11+ Practice &
                            Resources
                        </p>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="lms-feature-card mt-50">
                        <figure>
                            <i class="svg-icon bg-blue" style="background-color: #3d358b;">
                               <img src="/assets/default/svgs/feature-mock.svg" height="24" width="24" alt="Mock Exams"> 
                            </i>
                        </figure>
                        <div class="lms-text-holder">
                            <h3 itemprop="title" class="post-title font-30 mb-15">Mock Exams</h3>
                            <p itemprop="description" class="font-18 text-dark">Experience realistic 11+ mock exams
                                designed to simulate actual test conditions. These practice exams help build your
                                child's confidence and improve their exam readiness by familiarising them with the
                                format, timing, and pressure of the real test.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="lms-feature-card mt-50">
                        <figure>
                            <i class="svg-icon bg-yellow">
                                <img src="/assets/default/svgs/feature-time.svg" height="24" width="24" alt="Timed Practices"> 
                            </i>
                        </figure>
                        <div class="lms-text-holder">
                            <h3 itemprop="title" class="post-title font-30 mb-15">Timed Practices</h3>
                            <p itemprop="description" class="font-18 text-dark">Our timed practice exercises are
                                specifically designed to develop your child’s time management skills. By working within
                                set time limits, your child learns to pace themselves effectively, ensuring they can
                                complete all sections of the exam within the allotted time.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="lms-feature-card mt-50">
                        <figure>
                            <i class="svg-icon bg-deepyellow">
                                <img src="/assets/default/svgs/feature-target.svg" height="24" width="24" alt="Target Identification">
                            </i>
                        </figure>
                        <div class="lms-text-holder">
                            <h3 itemprop="title" class="post-title font-30 mb-15">Target Identification</h3>
                            <p itemprop="description" class="font-18 text-dark">We provide personalised strategies to
                                identify and address your child’s specific weaknesses. By focusing on areas that need
                                improvement, we help your child overcome challenges and excel in their 11+ exam
                                preparation.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="lms-feature-card mt-50">
                        <figure>
                            <i class="svg-icon bg-lightblue">
                                <img src="/assets/default/svgs/feature-exam.svg" height="24" width="24" alt="Exam Practice Resources">
                            </i>
                        </figure>
                        <div class="lms-text-holder">
                            <h3 itemprop="title" class="post-title font-30 mb-15">Exam Practice Resources</h3>
                            <p itemprop="description" class="font-18 text-dark">Our comprehensive self-assessment tools
                                offer continuous opportunities for growth and improvement. These resources enable your
                                child to regularly evaluate their progress and fine-tune their skills, ensuring they
                                stay on track</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="lms-feature-card mt-50">
                        <figure>
                            <i class="svg-icon bg-orange">
                                <img src="/assets/default/svgs/feature-progress.svg" height="24" width="24" alt="Progress Reports">
                            </i>
                        </figure>
                        <div class="lms-text-holder">
                            <h3 itemprop="title" class="post-title font-30 mb-15">Progress Reports</h3>
                            <p itemprop="description" class="font-18 text-dark">Receive detailed progress reports that
                                track your child’s development over time. These insights, paired with expert guidance,
                                help you understand their strengths and areas for improvement, ensuring a targeted and
                                effective preparation plan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="lms-feature-card mt-50">
                        <figure>
                            <i class="svg-icon bg-deepskyblue" style="background-color: #46b7e9;">
                                <img src="/assets/default/svgs/feature-Professional.svg" height="24" width="24" alt="Professional Support">
                            </i>
                        </figure>
                        <div class="lms-text-holder">
                            <h3 itemprop="title" class="post-title font-30 mb-15">Professional Support</h3>
                            <p itemprop="description" class="font-18 text-dark">Benefit from expert feedback tailored to
                                refine your child’s skills and guide them toward achieving excellence. Our professional
                                support ensures that your child is fully prepared to tackle the 11+ exam with
                                confidence.</p>
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
                        <h2 itemprop="title" class="text-white font-40">Discover Top Resources for 11 Plus & Entrance Exams!</h2>
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
                                        <h3 itemprop="title" class="post-title font-19 font-weight-bold">English</h3>
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
                                        <h3 itemprop="title" class="post-title font-19 font-weight-bold">
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
                                        <h3 itemprop="title" class="post-title font-19 font-weight-bold">
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
                                        <h3 itemprop="title" class="post-title font-19 font-weight-bold">
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
    <section class="lms-counter-section pb-10 bg-counter">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-title mb-50 text-center">
                        <h2 itemprop="section title" class="mb-10 font-40">Real practice, Proven Results</h2>
                        <p itemprop="description" class="font-19 text-gray">It’s hugely trusted by parents, recommended by teachers and loved by students</p>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="counter-holder row mt-100">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-30 position-relative">
                            <div class="lms-counter-card counter-purple-bg text-white">
                                <strong itemprop="size" class="custom-counter" data-count="100"></strong><span itemprop="plus" class="plus-icons">+</span>
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
                            <div class="lms-counter-card counter-yellow-bg text-white">
                                <strong itemprop="size" class="custom-counter" data-count="5000"></strong><span itemprop="plus"
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
                            <div class="lms-counter-card counter-orange-bg text-white">
                                <strong itemprop="size" class="custom-counter" data-count="60"></strong><span itemprop="plus" class="plus-icons">+</span>
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
                        <p class="font-16 text-gray">Empower your child’s learning journey with tailored resources and assessments that meet their unique needs.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                        <figure class="mb-20">
                            <img src="../assets/default/img/ks1-year1-feature.jpg" alt="feature image" height="143" width="276">
                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                            <span class="text-dark-charcoal">Game-Based Learning</span>
                        </h3>
                        <p itemprop="description">Make study sessions fun with engaging, reward-based activities and instant feedback.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                        <figure class="mb-20">
                            <img src="../assets/default/img/entrance-exams.jpg" alt="feature image" height="143" width="276">
                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                            <span class="text-dark-charcoal">Essential Mock Exams</span>
                        </h3>
                        <p itemprop="description">Boost confidence with realistic 11+ mock exams that simulate actual test conditions.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                        <figure class="mb-20">
                            <img src="../assets/default/img/sats-home-feature.jpg" alt="feature image" height="143" width="276">
                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                            <span class="text-dark-charcoal">Parental Insights</span>
                        </h3>
                        <p itemprop="description">Monitor progress with detailed insights to support your child’s academic success.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                        <figure class="mb-20">
                            <img src="../assets/default/img/analytics-feature.jpg" alt="feature image" height="143" width="276">
                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                            <span class="text-dark-charcoal">Ultimate 11 Plus Practice Toolkit</span>
                        </h3>
                        <p itemprop="description">Encourage continuous improvement with self-assessment tools and progress tracking.</p>
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
                            <img src="../assets/default/img/feature-automated-marking.jpg" alt="feature image" height="143" width="276">
                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                            <span class="text-dark-charcoal">Smart Exam Tactics</span>
                        </h3>
                        <p itemprop="description">Learn effective tips for time management, stress reduction, and question strategies.</p>
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
                        <p itemprop="description">Use a curriculum that adjusts to each student’s needs for personalised learning.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                        <figure class="mb-20">
                            <img src="../assets/default/img/book-shelf-feature.jpg" alt="feature image" height="143" width="276">
                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                            <span class="text-dark-charcoal">Personalised Practice</span>
                        </h3>
                        <p itemprop="description">Provide practice options that reinforce key concepts and reduce learning anxiety.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="feature-grid text-center mb-40" itemprop="feature learning course">
                        <figure class="mb-20">
                            <img src="../assets/default/img/timetables-feature.jpg" alt="feature image" height="143" width="276">
                        </figure>
                        <h3 class="mb-5 font-20 font-weight-bold" itemprop="title">
                            <span class="text-dark-charcoal">Elevate 11 Plus Preparation</span>
                        </h3>
                        <p itemprop="description">Achieve exam success with tailored practice and confidence-building resources.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="lms-column-section lms-accordion-section w-100 pb-60 pt-60" style="background-color: #f6f0ea; max-width: 100%;">
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
                                <button itemprop="button" class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse-1" aria-expanded="false" aria-controls="collapse-1">
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
            <a href="{{url('/')}}/pricing" class="btn-primary text-dark-blue register-btn try-rurera-btn py-15 px-30">Try Rurera for free</a>
        </div>
    </section>
    @php $faq_items = isset( $faq_items )? $faq_items : array();@endphp
    <section class="py-100" style="background-color: #fff">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-30">
                        <h2 class="mt-0 mb-10 font-40">Frequently asked questions</h2>
                    </div>
                </div>
                <div class="col-12 col-lg-12 col-md-12 mx-auto">
                    <div class="mt-0">
                        <div class="lms-faqs mx-w-100 mt-0" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <div id="accordion">
                                @if( !empty( $faq_items ))

                                @foreach( $faq_items as $itemData)
                                <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="heading77">
                                        <h3 class="mb-0">
                                            <button class="btn btn-link font-18 font-weight-bold" data-toggle="collapse"
                                                data-target="#collapsesix" aria-expanded="true"
                                                aria-controls="collapsesix">{{isset( $itemData['title'])? $itemData['title'] : '' }}</button>
                                        </h3>
                                    </div>
                                    <div id="collapsesix" class="collapse" aria-labelledby="heading77"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <p>{{isset( $itemData['description'])? $itemData['description'] : '' }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                @else
                                <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="heading66">
                                        <h3 class="mb-0">
                                            <button class="btn btn-link font-18 font-weight-bold collapsed"
                                                data-toggle="collapse" data-target="#collapsesix" aria-expanded="true"
                                                aria-controls="collapsesix">What is the 11 Plus exam?</button>
                                        </h3>
                                    </div>
                                    <div id="collapsesix" class="collapse" aria-labelledby="heading66"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <p>The 11+ exam is a selective entrance test used by grammar schools and
                                                some independent schools in the UK to determine which students are
                                                eligible for admission. Taken by students in their final year of primary
                                                school (typically around age 10 or 11), the exam assesses a range of
                                                skills, including English, mathematics, verbal reasoning, and non-verbal
                                                reasoning.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="headingTwo">
                                        <h3 class="mb-0"><button class="btn btn-link font-18 font-weight-bold collapsed"
                                                data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo">How Will Rurera Help in Preparing for the 11
                                                Plus Exam?</button></h3>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Rurera helps students prepare for the 11+ exam by offering tailored
                                                practice tests, expert-led tutorials, and detailed feedback that covers
                                                all key subjects—English, mathematics, verbal reasoning, and non-verbal
                                                reasoning. The platform provides customizable study plans, tracks
                                                progress, and offers exam strategies to build confidence and reduce
                                                stress.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="headingseven">
                                        <h3 class="mb-0">
                                            <button class="btn btn-link font-18 font-weight-bold collapsed"
                                                data-toggle="collapse" data-target="#collapseseven"
                                                aria-expanded="false" aria-controls="collapseseven"> How do I register
                                                my child for the 11 Plus exam?</button>
                                        </h3>
                                    </div>
                                    <div id="collapseseven" class="collapse" aria-labelledby="headingseven"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <p>To register your child for the 11+ exam, you typically need to apply
                                                directly to the schools you are interested in or through your local
                                                education authority. The registration process usually involves filling
                                                out an application form and, in some cases, paying a registration fee.
                                                Deadlines for registration vary by region and school, so it's important
                                                to begin the process early to ensure your child is registered before the
                                                cutoff date. Some schools may also have online registration systems,
                                                while others may require paper forms to be submitted.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="heading8">
                                        <h3 class="mb-0">
                                            <button class="btn btn-link font-18 font-weight-bold collapsed"
                                                data-toggle="collapse" data-target="#collapse8" aria-expanded="false"
                                                aria-controls="collapse8">What subjects are covered in 11 Plus exam
                                                preparation?</button>
                                        </h3>
                                    </div>
                                    <div id="collapse8" class="collapse" aria-labelledby="heading8"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <p>11+ exam preparation includes English, Maths, and Reasoning (if
                                                applicable), the core subjects assessed in the exams. Our expert tutors
                                                offer thorough guidance and practice to ensure your child is
                                                well-prepared in all three areas.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="heading9">
                                        <h3 class="mb-0">
                                            <button class="btn btn-link font-18 font-weight-bold collapsed"
                                                data-toggle="collapse" data-target="#collapse9" aria-expanded="false"
                                                aria-controls="collapse9"> Do I need to help my child use
                                                Rurera?</button>
                                        </h3>
                                    </div>
                                    <div id="collapse9" class="collapse" aria-labelledby="heading9"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <p> No, Rurera is designed to be intuitive and easy for children to use on
                                                their own. The platform encourages independent learning, helping your
                                                child build confidence as they navigate and complete their studies
                                                without needing constant assistance.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="heading10">
                                        <h3 class="mb-0">
                                            <button class="btn btn-link font-18 font-weight-bold collapsed"
                                                data-toggle="collapse" data-target="#collapse10" aria-expanded="false"
                                                aria-controls="collapse10"> When are the results of the 11 Plus exam
                                                released?</button>
                                        </h3>
                                    </div>
                                    <div id="collapse10" class="collapse" aria-labelledby="heading10"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <p>The results of the 11+ exam are typically released in late October or
                                                early November, depending on the exam board or school administering the
                                                test. The timing of the results allows parents and students to know
                                                whether they have been offered a place at their chosen school in time to
                                                plan for the next academic year. Each school or local authority will
                                                provide specific details on when and how results will be communicated,
                                                so it’s important to stay informed and check for any updates.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="heading11">
                                        <h3 class="mb-0">
                                            <button class="btn btn-link font-18 font-weight-bold collapsed"
                                                data-toggle="collapse" data-target="#collapse11" aria-expanded="false"
                                                aria-controls="collapse11">When is the 11 Plus exam taken?</button>
                                        </h3>
                                    </div>
                                    <div id="collapse11" class="collapse" aria-labelledby="heading11"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <p>The 11+ exam is typically taken in September or October of a student's
                                                final year of primary school, when they are around 10 or 11 years old.
                                                This timing allows schools to use the results to offer places for the
                                                next academic year, beginning the following September. Some areas may
                                                have slightly different testing dates, so it's essential for parents to
                                                confirm the specific dates with their local education authority or the
                                                schools they are applying to.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <div class="card-header" id="heading12">
                                        <h3 class="mb-0">
                                            <button class="btn btn-link font-18 font-weight-bold collapsed"
                                                data-toggle="collapse" data-target="#collapse12" aria-expanded="false"
                                                aria-controls="collapse12">How is the 11 Plus Exam scored?</button>
                                        </h3>
                                    </div>
                                    <div id="collapse12" class="collapse" aria-labelledby="heading12"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <p> Students who sit an Eleven Plus Exam will receive a standardised score
                                                for each paper they sit. Standardised scores are usually between 70 and
                                                140, but again, these can vary across different areas and schools.</p>
                                        </div>
                                    </div>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="parent-account-section mt-0" style="background-color: #0065ff;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-7 col-md-7">
                    <div class="section-title mb-50">
                        <h2 class="font-40 text-white">Parent account</h2>
                        <p class="font-16 font-weight-500 text-white">We make it easy to be involved in your child’s learning
                            Ability to assign activities</p>
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