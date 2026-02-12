 @extends(getTemplate().'.layouts.app')

@push('styles_top')
<link rel="stylesheet" href="/assets/default/vendors/scroll-animation/animate.css">
@endpush

@section('content')
<section class="content-section">
    <section class="text-center page-sub-header py-80 mb-60" style="background-color: var(--primary);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-white mb-15">Key Stage 2 Learning<span class="text-scribble">(KS2)</span></h1>
                    <p class="text-white">
                        If you are aged between 7 and 11, then have fun and learn with 5k+ KS2 quizzes and interactive<br />
                        resources written especially for you. Dive into our targeted KS2 tests and assessments.
                        Key Stage 2 (KS2) is part of the UK National Curriculum for Years 3–6, covering Maths, 
                        English, Science and other courses with preparation for Year 6 SATs.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mb-30 align-items-center d-flex"><a href="/pricing" class="text-white bg-primary justify-content-center register-btn try-rurera-btn">Try Rurera for free</a></div>
                </div>
                <div class="col-12">
                    <div class="categories-element-title">
                        <h2><span>ks2 - Year 3</span></h2>
                        <p>Master the foundational curriculum for Year 3 with engaging KS2 quizzes and practice materials. Build essential skills early.through introductory Science, History, and creative subjects.</p>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-2 mt-20">
                            <div class="categories-boxes">
                                <div class="categories-card">
                                    <span class="topic-numbers" style="background-color: #fff; color: #27325e;">Course</span>
                                    <div class="categories-icon" style="background: #2d6a4f;">
                                        <img src="/assets/default/svgs/categories-science.svg" width="300" height="300" alt="categories-science">
                                    </div>
                                    <a href="/pricing"><h3 class="categories-title">Science</h3></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 mt-20">
                            <div class="categories-boxes">
                                <div class="categories-card">
                                    <span class="topic-numbers" style="background-color: #fff; color: #27325e;">Course</span>
                                    <div class="categories-icon" style="background: #66f;">
                                        <img src="/assets/default/svgs/categories-history.svg" width="2560" height="2560" alt="categories-history">
                                    </div>
                                    <a href="/pricing"><h3 class="categories-title">History</h3></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 mt-20">
                            <div class="categories-boxes">
                                <div class="categories-card">
                                    <span class="topic-numbers" style="background-color: #fff; color: #27325e;">Course</span>
                                    <div class="categories-icon" style="background: #f90;">
                                        <img src="/assets/default/svgs/categories-education.svg" width="200" height="200" alt="categories-education">
                                    </div>
                                    <a href="/pricing"><h3 class="categories-title">Religious Education</h3></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 mt-20">
                            <div class="categories-boxes">
                                <div class="categories-card">
                                    <span class="topic-numbers" style="background-color: #fff; color: #27325e;">Course</span>
                                    <div class="categories-icon" style="background: #f60;">
                                        <img src="/assets/default/svgs/categories-art.svg" width="150" height="150" alt="categories-art">
                                    </div>
                                    <a href="/pricing"><h3 class="categories-title">Art</h3></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="categories-element-title">
                        <h2><span>ks2 - Year 4</span></h2>
                        <p>Advance your learning in Year 4 with our comprehensive KS2 practices and resources 
                        designed to deepen understanding and apply concepts across Science, History, and foundation subjects. </p>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-2 mt-20">
                            <div class="categories-boxes">
                                <div class="categories-card">
                                    <span class="topic-numbers" style="background-color: #fff; color: #27325e;">Course</span>
                                    <div class="categories-icon" style="background: #2d6a4f;">
                                        <img src="/assets/default/svgs/categories-science.svg" width="300" height="300" alt="categories-science">
                                    </div>
                                    <a href="/pricing"><h3 class="categories-title">Science</h3></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 mt-20">
                            <div class="categories-boxes">
                                <div class="categories-card">
                                    <span class="topic-numbers" style="background-color: #fff; color: #27325e;">Course</span>
                                    <div class="categories-icon" style="background: #66f;">
                                        <img src="/assets/default/svgs/categories-history.svg" width="2500" height="2500" alt="categories-history">
                                    </div>
                                    <a href="/pricing"><h3 class="categories-title">History</h3></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 mt-20">
                            <div class="categories-boxes">
                                <div class="categories-card">
                                    <span class="topic-numbers" style="background-color: #fff; color: #27325e;">Course</span>
                                    <div class="categories-icon" style="background: #f90;">
                                        <img src="/assets/default/svgs/categories-education.svg" width="200" height="200" alt="categories-education">
                                    </div>
                                    <a href="/pricing"><h3 class="categories-title">Religious Education</h3></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 mt-20">
                            <div class="categories-boxes">
                                <div class="categories-card">
                                    <span class="topic-numbers" style="background-color: #fff; color: #27325e;">Course</span>
                                    <div class="categories-icon" style="background: #f60;">
                                        <img src="/assets/default/svgs/categories-art.svg" width="150" height="150" alt="categories-art">
                                    </div>
                                    <a href="/pricing"><h3 class="categories-title">Art</h3></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="categories-element-title">
                        <h2><span>ks2 - Year 5</span></h2>
                        <p>Excel in Year 5 with targeted preparation, including practice that mirrors sats papers to build confidence and ability.This stage strengthens reasoning and exam-style problem solving ahead of Year 6. </p>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-2 mt-20">
                            <div class="categories-boxes">
                                <div class="categories-card">
                                    <span class="topic-numbers" style="background-color: #fff; color: #27325e;">Course</span>
                                    <div class="categories-icon" style="background: #339;">
                                        <img src="/assets/default/svgs/categories-math.svg" width="800" height="800" alt="categories-math">
                                    </div>
                                    <a href="/pricing"><h3 class="categories-title">Maths</h3></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 mt-20">
                            <div class="categories-boxes">
                                <div class="categories-card">
                                    <span class="topic-numbers" style="background-color: #fff; color: #27325e;">Course</span>
                                    <div class="categories-icon" style="background: #e63946;">
                                        <img src="/assets/default/svgs/categories-english.svg" width="128" height="128" alt="categories-english">
                                    </div>
                                    <a href="/pricing"><h3 class="categories-title">English</h3></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 mt-20">
                            <div class="categories-boxes">
                                <div class="categories-card">
                                    <span class="topic-numbers" style="background-color: #fff; color: #27325e;">Course</span>
                                    <div class="categories-icon" style="background: #2d6a4f;">
                                        <img src="/assets/default/svgs/categories-science.svg" width="300" height="300" alt="categories-science">
                                    </div>
                                    <a href="/pricing"><h3 class="categories-title">Science</h3></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 mt-20">
                            <div class="categories-boxes">
                                <div class="categories-card">
                                    <span class="topic-numbers" style="background-color: #fff; color: #27325e;">Course</span>
                                    <div class="categories-icon" style="background: #3cc;">
                                        <img src="/assets/default/svgs/categories-computing.svg" width="683" height="683" alt="categories-computing">
                                    </div>
                                    <a href="/pricing"><h3 class="categories-title">Computing</h3></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 mt-20">
                            <div class="categories-boxes">
                                <div class="categories-card">
                                    <span class="topic-numbers" style="background-color: #fff; color: #27325e;">Course</span>
                                    <div class="categories-icon" style="background: #66f;">
                                        <img src="/assets/default/svgs/categories-history.svg" width="2560" height="2560" alt="categories-history">
                                    </div>
                                    <a href="/pricing"><h3 class="categories-title">History</h3></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 mt-20">
                            <div class="categories-boxes">
                                <div class="categories-card">
                                    <span class="topic-numbers" style="background-color: #fff; color: #27325e;">Course</span>
                                    <div class="categories-icon" style="background: #f90;">
                                        <img src="/assets/default/svgs/categories-education.svg" width="128" height="203" alt="categories-education">
                                    </div>
                                    <a href="/pricing"><h3 class="categories-title">Religious Education</h3></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 mt-20">
                            <div class="categories-boxes">
                                <div class="categories-card">
                                    <span class="topic-numbers" style="background-color: #fff; color: #27325e;">Course</span>
                                    <div class="categories-icon" style="background: #f60;">
                                        <img src="/assets/default/svgs/categories-art.svg" width="150" height="150" alt="categories-art">
                                    </div>
                                    <a href="/pricing"><h3 class="categories-title">Art</h3></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 mt-20">
                            <div class="categories-boxes">
                                <div class="categories-card">
                                    <span class="topic-numbers" style="background-color: #fff; color: #27325e;">Course</span>
                                    <div class="categories-icon" style="background: #339;">
                                        <img src="/assets/default/svgs/categories-math.svg" width="800" height="800" alt="categories-math">
                                    </div>
                                    <a href="/pricing"><h3 class="categories-title">Vocabulary</h3></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="categories-element-title">
                        <h2><span>ks2 - Year 6</span></h2>
                        <p>Ensure success in Year 6 and beyond with our ultimate preparation tools. Access<a href="https://rurera.com/sats-preparation">year 6 sats papers</a>sats past papers, and full sats mock papers for complete readiness.These assessments measure national expectations and prepare pupils for secondary school.
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-2 mt-20">
                            <div class="categories-boxes">
                                <div class="categories-card">
                                    <span class="topic-numbers" style="background-color: #fff; color: #27325e;">Course</span>
                                    <div class="categories-icon" style="background: #2d6a4f;">
                                        <img src="/assets/default/svgs/categories-science.svg" width="300" height="300" alt="categories-science">
                                    </div>
                                    <a href="/pricing"><h3 class="categories-title">Science</h3></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 mt-20">
                            <div class="categories-boxes">
                                <div class="categories-card">
                                    <span class="topic-numbers" style="background-color: #fff; color: #27325e;">Course</span>
                                    <div class="categories-icon" style="background: #66f;">
                                        <img src="/assets/default/svgs/categories-history.svg" width="2560" height="2560" alt="categories-history">
                                    </div>
                                    <a href="/pricing"><h3 class="categories-title">History</h3></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 mt-20">
                            <div class="categories-boxes">
                                <div class="categories-card">
                                    <span class="topic-numbers" style="background-color: #fff; color: #27325e;">Course</span>
                                    <div class="categories-icon" style="background: #f90;">
                                        <img src="/assets/default/svgs/categories-education.svg" width="200" height="200" alt="categories-education">
                                    </div>
                                    <a href="/pricing"><h3 class="categories-title">Religious Education</h3></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 mt-20">
                            <div class="categories-boxes">
                                <div class="categories-card">
                                    <span class="topic-numbers" style="background-color: #fff; color: #27325e;">Course</span>
                                    <div class="categories-icon" style="background: #f60;">
                                        <img src="/assets/default/svgs/categories-art.svg" width="150" height="150" alt="categories-art">
                                    </div>
                                    <a href="/pricing"><h3 class="categories-title">Art</h3></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 mt-20">
                            <div class="categories-boxes">
                                <div class="categories-card">
                                    <span class="topic-numbers" style="background-color: #fff; color: #27325e;">Course</span>
                                    <div class="categories-icon" style="background: #2d6a4f;">
                                        <img src="/assets/default/svgs/categories-art.svg" width="150" height="150" alt="categories-science">
                                    </div>
                                    <a href="/pricing"><h3 class="categories-title">SAT</h3></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 mt-20">
                            <div class="categories-boxes">
                                <div class="categories-card">
                                    <span class="topic-numbers" style="background-color: #fff; color: #27325e;">Course</span>
                                    <div class="categories-icon" style="background: #339;">
                                        <img src="/assets/default/svgs/categories-math.svg" width="800" height="800" alt="categories-math">
                                    </div>
                                    <a href="/pricing"><h3 class="categories-title">Maths</h3></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="find-instructor-section mb-60">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 col-md-6">
                    <figure class="position-relative">
                        <img alt="The next-generation e-learning platform" height="406" src="../assets/default/img/ks2-image.jpg" width="570" class="mw-100 rounded-sm" />
                        <img alt="circle" height="170" src="/assets/default/img/home/circle-4.png" width="170" class="find-instructor-section-circle" style="right: -70px;" />
                        <img alt="dots" height="110" src="/assets/default/img/home/dot.png" width="70" class="find-instructor-section-dots" />
                    </figure>
                </div>
                <div class="col-12 col-lg-6 col-md-6 text-center">
                    <div class="section-title">
                        <h2 class="mb-20">Best Part about KS2?</h2>
                        <p class="mb-30">
                            Experience a new way of revising with our teacher-written KS2 quizzes designed for Years 3, 4, 5, and 6. Success in the KS2 curriculum is within reach. 
                            We bring education to life with Key Stage 2 Resources, KS2 quizzes, KS2 practices, KS2 assessments, and KS2 Tests.
                            All content follows the UK National Curriculum and is written by experienced teachers.
                        </p>
                    </div>
                    <div class="section-title">
                        <h3 class=" mb-20">The best part about KS2 quizzes?</h3>
                        <p>
                        They're enjoyable! We make mastering maths sats papers and sats english papers engaging. We help students discover how rewarding learning can be while preparing for key milestones.
                    </div>
                    <div class="align-items-center d-flex justify-content-center pt-30"><a href="/pricing" class="btn btn-primary rounded-pill">View all courses</a></div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-80 mb-60" style="background-color: #f18700;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-50"><h2 class="text-white font-40 mb-10">Parent’s Role!</h2></div>
                </div>
                <div class="col-12">
                    <ul class="row circle-icon-list">
                        <li class="text-white font-19 col-lg-6 col-md-6 pl-50 position-relative mb-20">
                            <img alt="check icon" height="35" src="/assets/default/svgs/check-white.svg" width="35" /> Check progress regularly using our KS2 assessments and trackers.
                        </li>
                        <li class="text-white font-19 col-lg-6 col-md-6 pl-50 position-relative mb-20">
                            <img alt="check icon" height="35" src="/assets/default/svgs/check-white.svg" width="35" /> Offer guidance on using sats past papers and managing study time effectively.
                        </li>
                        <li class="text-white font-19 col-lg-6 col-md-6 pl-50 position-relative mb-20">
                            <img alt="check icon" height="35" src="/assets/default/svgs/check-white.svg" width="35" /> Break down revision of year 6 maths questions into manageable tasks.
                        </li>
                        <li class="text-white font-19 col-lg-6 col-md-6 pl-50 position-relative mb-20">
                            <img alt="check icon" height="35" src="/assets/default/svgs/check-white.svg" width="35" /> Stay informed about the curriculum and your child's use of KS2 practice resources.
                            guidelines.
                        </li>
                        <li class="text-white font-19 col-lg-6 col-md-6 pl-50 position-relative">
                            <img alt="check icon" height="35" src="/assets/default/svgs/check-white.svg" width="35" /> Provide a quiet, organized space for tackling sats maths papers or sats english test papers.
                        </li>
                        <li class="text-white font-19 col-lg-6 col-md-6 pl-50 position-relative">
                            <img alt="check icon" height="35" src="/assets/default/svgs/check-white.svg" width="35" /> Celebrate efforts and milestones in their KS2 learning journey.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="font-40 mb-10">The Importance of KS2</h2>
                        <p>
                            Years 3 to 6 are crucial stages. While KS1 lays the foundation, KS2 is where students set the tone for their future academic journey. 
                        </p>
                        <p class="pt-20">
                           A strong performance here, supported by practice with previous sats papers ks2 and year 6 sats practice papers, builds the confidence and skills needed for success, including the Year 6 SATs.
                           Progress during KS2 is assessed nationally through Year 6 SATs.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-60 rurera-counter-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="section-title text-center mb-40">
                        <h2 class="font-40 mb-10 mt-0">Our impact</h2>
                        <p itemprop="description">
                            We truly Understand the challenges and limitations faced by educators and learners<br />
                            in the current system.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-4 col-sm-6 mb-30">
                    <div class="rurera-counter-card">
                        <strong class="custom-counter" itemprop="number">100</strong><span class="plus-icons">+</span>
                        <p class="font-16 font-weight-normal" itemprop="description">Sats Practices</p>
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-4 col-sm-6 mb-30">
                    <div class="rurera-counter-card">
                        <strong class="custom-counter" itemprop="number">60</strong><span class="plus-icons">+</span>
                        <p class="font-16 font-weight-normal" itemprop="description">Cities</p>
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-4 col-sm-6 mb-30">
                    <div class="rurera-counter-card">
                        <strong class="custom-counter" itemprop="number">5000</strong><span class="plus-icons">+</span>
                        <p class="font-16 font-weight-normal" itemprop="description">Questions</p>
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-4 col-sm-6 mb-30">
                    <div class="rurera-counter-card">
                        <strong class="custom-counter" itemprop="number">100</strong><span class="plus-icons">+</span>
                        <p class="font-16 font-weight-normal" itemprop="description">Books</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="mb-10">KS2 Expert Resources</h2>
                        <p>
                            Our resources are crafted by teachers who understand the KS2 curriculum. Each KS2 quiz and piece of practice material, from ks2 sats papers revision to topic-specific assessments, is designed to meet
                            National Curriculum requirements. We provide the essential tools, including sats papers ks2, to ensure thorough preparation.
                            For comprehensive Key Stage 2 preparation, explore all our resource
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
