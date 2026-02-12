@extends(getTemplate().'.layouts.app')

@push('styles_top')
@endpush

@section('content')
<section class="position-relative gallery-sub-header pt-40 pb-80 mb-60" style="min-height: 680px;">
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-12 col-md-12 col-lg-7">
          <h1>Dive into the World of <span class="text-scribble">Books!</span></h1>
          <strong class="d-block font-18">Read Anywhere, Anytime!</strong>
          <p class="pt-10 mb-30">Rurera boosts reading skills with fun books, cool rewards, and personalized challenges. Watch your child's love for reading books for kids grow every day. Rurera’s Books Shelf offers curated reading collections for children aged 4–11, aligned with literacy development goals and reading levels. </p>
          <a href="/pricing" class="try-rurera-btn justify-content-center bg-primary text-white register-btn">Try Rurera for free</a>
        </div>
      </div>
    </div>
    <div class="masonry-grid-gallery">
      <div class="masonry-grid">
        <div class="row">
          <div class="grid-item col-lg-3 col-md-3 col-sm-6">
            <div class="img-holder">
              <figure>
                <img src="/assets/default/img/book-masonry1.png" alt="default staff image" title="default staff image" width="192" height="288" itemprop="image" loading="eager">
              </figure>
            </div>
          </div>
          <div class="grid-item col-lg-3 col-md-3 col-sm-6">
            <div class="img-holder">
              <figure>
                <img src="/assets/default/img/book-masonry6.png" alt="default staff image" title="default staff image" width="192" height="157" itemprop="image" loading="eager">
              </figure>
            </div>
          </div>
          <div class="grid-item col-lg-3 col-md-3 col-sm-6">
            <div class="img-holder">
              <figure>
                <img src="/assets/default/img/book-masonry4.png" alt="default staff image" title="default staff image" width="192" height="284" itemprop="image" loading="eager">
              </figure>
            </div>
          </div>
          <div class="grid-item col-lg-3 col-md-3 col-sm-6">
            <div class="img-holder">
              <figure>
                <img src="/assets/default/img/book05.png" alt="default staff image" title="default staff image" width="192" height="193" itemprop="image" loading="eager">
              </figure>
            </div>
          </div>
          <div class="grid-item col-lg-3 col-md-3 col-sm-6">
            <div class="img-holder">
              <figure>
                <img src="/assets/default/img/book02.png" alt="default staff image" title="default staff image" width="192" height="294" itemprop="image" loading="eager">
              </figure>
            </div>
          </div>
          <div class="grid-item col-lg-3 col-md-3 col-sm-6">
            <div class="img-holder">
              <figure>
                <img src="/assets/default/img/book03.png" alt="default staff image" title="default staff image" width="192" height="228" itemprop="image" loading="eager">
              </figure>
            </div>
          </div>
          <div class="grid-item col-lg-3 col-md-3 col-sm-6">
            <div class="img-holder">
              <figure>
                <img src="/assets/default/img/book-masonry6.png" alt="default staff image" title="default staff image" width="192" height="157" itemprop="image" loading="eager">
              </figure>
            </div>
          </div>
          <div class="grid-item col-lg-3 col-md-3 col-sm-6">
            <div class="img-holder">
              <figure>
                <img src="/assets/default/img/book05.png" alt="default staff image" title="default staff image" width="192" height="193" itemprop="image" loading="eager">
              </figure>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="rurera-services rurera-contact-info mx-w-100 pt-80 pb-50 mb-80 rurera-wave-shape-top" style="background-color: #f6b801;">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-title text-center mb-50">
            <h2 class="mt-0 mb-10">Activities for enhancing Reading skills.</h2>
            <p class="font-14 pt-5 text-dark-charcoal">Curriculum aligned all major literacy strands. <br > Reading helps you think better, understand more, and solve problems more easily.including phonics, comprehension, vocabulary, and grammar skills. </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="services-card text-center mb-30 pr-40 pl-40">
            <div class="services-card-body">
              <figure class="icon-md">
                <img src="/assets/default/svgs/book2.svg" alt="support" title="support" width="100" height="100" itemprop="image" loading="eager">
              </figure>
              <div class="services-text mt-20">
                <h2 class="font-20 font-weight-bold mb-10">Book Chapter Quizzes</h2>
                <p itemprop="description" class="text-dark-charcoal font-14">Your ultimate resource for resolving quizzes and practices tied directly to the stories your child loves.These quizzes reinforce comprehension and retention of key concepts from each book.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="services-card text-center mb-30 pr-40 pl-40">
            <div class="services-card-body">
              <figure class="icon-md">
                <img src="/assets/default/svgs/analysis.svg" alt="knowledge" title="knowledge" width="100" height="100" itemprop="image" loading="eager">
              </figure>
              <div class="services-text mt-20">
                <h2 class="font-20 font-weight-bold mb-10">Assessments &amp; Tests</h2>
                <p itemprop="description" class="text-dark-charcoal font-14">Get reading books for kids online assessments tailored to your child's interests and reading level.Assessments track progress across reading fluency, vocabulary, and comprehension.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="services-card text-center mb-30 pr-40 pl-40">
            <div class="services-card-body">
              <figure class="icon-md">
                <img src="/assets/default/svgs/coins-money.svg" alt="technical" title="technical" width="100" height="100" itemprop="image" loading="eager">
              </figure>
              <div class="services-text mt-20">
                <h2 class="font-20 font-weight-bold mb-10">Earn Reading Rewards</h2>
                <p itemprop="description" class="text-dark-charcoal font-14">The more you read on our books reading website, the more you'll earn Coin Points, unlocking exciting rewards. Rewards motivate consistent reading and celebrate milestones in literacy development. </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="pb-80">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="db-categories">
            <div class="row justify-content-center align-items-center">
              <div class="col-12 col-lg-2 col-md-4 col-sm-3">
                <div class="cat-card text-center">
                    <img src="/assets/default/svgs/headphone2.svg" height="800" width="800" alt="Phonics image">
                    <h5>Phonics</h5>
                </div>
              </div>
              <div class="col-12 col-lg-2 col-md-4 col-sm-3">
                <div class="cat-card text-center">
                    <img src="/assets/default/svgs/telescope.svg" height="800" width="800" alt="Sight Words image">
                    <h5>Sight Words</h5>
                </div>
              </div>
              <div class="col-12 col-lg-2 col-md-4 col-sm-3">
                <div class="cat-card text-center">
                    <img src="/assets/default/svgs/open-book.svg" height="800" width="800" alt="Spelling image">
                    <h5>Spelling</h5>
                </div>
              </div>
              <div class="col-12 col-lg-2 col-md-4 col-sm-3">
                <div class="cat-card text-center">
                    <img src="/assets/default/svgs/cat-light-bulb.svg" height="150" width="150" alt="Comprehension image">
                    <h5>Comprehension</h5>
                </div>
              </div>
              <div class="col-12 col-lg-2 col-md-4 col-sm-3">
                <div class="cat-card text-center">
                    <img src="/assets/default/svgs/loupe-search.svg" height="800" width="800" alt="Gramar image">
                    <h5>Gramar & <br> Punctuation</h5>
                </div>
              </div>
              <div class="col-12 col-lg-2 col-md-4 col-sm-3">
                <div class="cat-card text-center">
                    <img src="/assets/default/svgs/bookshelf2.svg" height="150" width="150" alt="Reading image">
                    <h5>Reading</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="rurera-blog rurera-blog-grid books-blog mx-w-100 pt-80 pb-50 mb-80" style="background-color:#7679ee;">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-12">
          <div class="section-title mb-50">
            <h2 class="text-white">Ignite Every Student’s Passion for Reading and <br /> Let Their Brilliance Shine!</h2>
            <p class="font-14 pt-10 text-white"> Discover ebooks, fiction books, board books, kids' stories, and reading books for kids 5 year and reading books for kids 6 year old collections from the Rurera bookshelf.</p>
          </div>
        </div>
        <div class="col-12 col-lg-12">
          <div class="row">
            <div class="col-12 col-md-4 col-lg-4">
              <div class="mb-40">
                <div class="blog-grid-card pb-0">
                  <div class="blog-grid-detail pr-0">
                    <div class="blog-grid-image lazyload-img">
                      <img src="/assets/default/img/buller-img.png" class="img-sm" alt="How Online Courses Benefit KS1 and KS2 Students" title="How Online Courses Benefit KS1 and KS2 Students" width="20" height="21" itemprop="image" loading="eager">
                      <img src="/assets/default/img/bookchoose-img1.png" width="370" height="250" class="img-cover" loading="eager" alt="#">
                    </div>
                    <h3 class="blog-grid-title mt-15 text-dark-charcoal px-20">
                      <a itemprop="url" href="/pricing">Enjoy Every E-Book Adventure:</a>
                    </h3>
                    <div itemprop="description" class="mt-5 blog-grid-desc px-20 pb-20"><a href="https://rurera.com/">Rurera</a> Rurera lets you access reading books for kids online in various digital formats,compatible with tablets, computers, and smartphones for seamless learning anywhere. Making reading convenient and accessible. </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4">
              <div class="mb-40">
                <div class="blog-grid-card pb-0">
                  <div class="blog-grid-detail pr-0">
                    <div class="blog-grid-image lazyload-img">
                      <img src="/assets/default/img/buller-img.png" class="img-sm" alt="Uncover Your Progress:" title="Uncover Your Progress:" width="20" height="21" itemprop="image" loading="eager">
                      <img src="/assets/default/img/bookchoose-img2.png" width="370" height="250" loading="eager" class="img-cover" alt="#">
                    </div>
                    <h3 class="blog-grid-title mt-15 text-dark-charcoal px-20">
                      <a itemprop="url" href="/pricing">Uncover Your Progress:</a>
                    </h3>
                    <div itemprop="description" class="mt-5 blog-grid-desc px-20 pb-20">Progress reports help parents and teachers identify strengths and areas for improvement.Our platform monitors how much you’ve read, offering detailed insights into your reading habits and growth on our dedicated books reading website.</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4">
              <div class="mb-40">
                <div class="blog-grid-card pb-0">
                  <div class="blog-grid-detail pr-0">
                    <div class="blog-grid-image lazyload-img">
                      <img src="/assets/default/img/buller-img.png" class="img-sm" alt="Personalized Learning Pathways:" title="Personalized Learning Pathways:" width="20" height="21" itemprop="image" loading="eager">
                      <img src="/assets/default/img/bookchoose-img3.png" width="370" height="250" loading="eager" class="img-cover" alt="#">
                    </div>
                    <h3 class="blog-grid-title mt-15 text-dark-charcoal px-20">
                      <a itemprop="url" href="/pricing">Personalized Learning Pathways:</a>
                    </h3>
                    <div itemprop="description" class="mt-5 blog-grid-desc px-20 pb-20">Personalized paths ensure every child builds confidence while enjoying reading. With Rurera, educators can easily tailor literacy development for each student, providing targeted support to boost every reader's progress, regardless of starting level.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-4 col-lg-4">
              <div class="mb-40">
                <div class="blog-grid-card pb-0">
                  <div class="blog-grid-detail pr-0">
                    <div class="blog-grid-image lazyload-img">
                      <img src="/assets/default/img/buller-img.png" class="img-sm" alt="Awesome Rewards as You Read:" title="Awesome Rewards as You Read:" width="20" height="21" itemprop="image" loading="eager">
                      <img src="/assets/default/img/bookchoose-img1.png" width="370" height="250" class="img-cover" loading="eager" alt="#">
                    </div>
                    <h3 class="blog-grid-title mt-15 text-dark-charcoal px-20">
                      <a itemprop="url" href="/pricing">Awesome Rewards as You Read:</a>
                    </h3>
                    <div itemprop="description" class="mt-5 blog-grid-desc px-20 pb-20">Keep reading books for kids to earn Coin Points, which can be exchanged for favorite toys. The more you read, the more points you earn.Reward systems encourage daily reading habits and reinforce literacy engagement. </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4">
              <div class="mb-40">
                <div class="blog-grid-card pb-0">
                  <div class="blog-grid-detail pr-0">
                    <div class="blog-grid-image lazyload-img">
                      <img src="/assets/default/img/buller-img.png" class="img-sm" alt="Effortless Student Engagement:" title="Effortless Student Engagement:" width="20" height="21" itemprop="image" loading="eager">
                      <img src="/assets/default/img/bookchoose-img2.png" width="370" height="250" loading="eager" class="img-cover" alt="#">
                    </div>
                    <h3 class="blog-grid-title mt-15 text-dark-charcoal px-20">
                      <a itemprop="url" href="/pricing">Effortless Student Engagement:</a>
                    </h3>
                    <div itemprop="description" class="mt-5 blog-grid-desc px-20 pb-20">Rurera’s built-in rewards system on our books reading website motivates students by recognizing their reading achievements, keeping them excited and engaged.Gamified features make learning interactive, fun, and measurable.</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4">
              <div class="mb-40">
                <div class="blog-grid-card pb-0">
                  <div class="blog-grid-detail pr-0">
                    <div class="blog-grid-image lazyload-img">
                      <img src="/assets/default/img/buller-img.png" class="img-sm" alt="Reporting Made Easy:" title="Reporting Made Easy:" width="20" height="21" itemprop="image" loading="eager">
                      <img src="/assets/default/img/bookchoose-img3.png" width="370" height="250" loading="eager" class="img-cover" alt="#">
                    </div>
                    <h3 class="blog-grid-title mt-15 text-dark-charcoal px-20">
                      <a itemprop="url" href="/pricing">Reporting Made Easy:</a>
                    </h3>
                    <div itemprop="description" class="mt-5 blog-grid-desc px-20 pb-20">Rurera simplifies task assignments, personalized learning, and reporting, helping teachers efficiently manage literacy instruction and track the books reading benefits for each student.Teachers can quickly review progress, adjust learning plans, and share insights with parents.</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section itemscope itemtype="https://schema.org/FAQPage">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title mb-30 text-center">
                    <h2 class="mb-10 mt-0">Frequently asked questions</h2>
                </div>
            </div>

            <div class="col-12 col-lg-8 col-md-12 mx-auto">
                <div class="rurera-faqs mx-w-100">
                    <div id="faqAccordion" class="accordion">

                        <!-- FAQ 1 -->
                        <div class="card" itemprop="mainEntity" itemscope itemtype="https://schema.org/Question">
                            <div class="card-header" id="faqHeading1">
                                <h3 class="mb-0">
                                    <button class="font-20 btn-link font-weight-bold" type="button" data-toggle="collapse" data-target="#faqCollapse1">
                                        <span itemprop="name">How does Rurera’s bookshelf work?</span>
                                        <span class="icon-box">
                                            <img src="/assets/default/svgs/plus-alt.svg" alt="plus-alt" class="plus-img">
                                            <img src="/assets/default/svgs/minus.svg" alt="minus" class="minus-img">
                                        </span>
                                    </button>
                                </h3>
                            </div>
                            <div id="faqCollapse1" class="collapse show" data-parent="#faqAccordion">
                                <div class="card-body" itemprop="acceptedAnswer" itemscope itemtype="https://schema.org/Answer">
                                    <div itemprop="text">
                                        Rurera is a books reading website that makes reading books for kids interactive and fun for ages 4–11. With eBooks and quizzes, parents and teachers can monitor each child’s progress.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 2 -->
                        <div class="card" itemprop="mainEntity" itemscope itemtype="https://schema.org/Question">
                            <div class="card-header" id="faqHeading2">
                                <h3 class="mb-0">
                                    <button class="font-20 btn-link font-weight-bold collapsed" type="button" data-toggle="collapse" data-target="#faqCollapse2">
                                        <span itemprop="name">Can I read books offline?</span>
                                        <span class="icon-box">
                                            <img src="/assets/default/svgs/plus-alt.svg" alt="plus-alt" class="plus-img">
                                            <img src="/assets/default/svgs/minus.svg" alt="minus" class="minus-img">
                                        </span>
                                    </button>
                                </h3>
                            </div>
                            <div id="faqCollapse2" class="collapse" data-parent="#faqAccordion">
                                <div class="card-body" itemprop="acceptedAnswer" itemscope itemtype="https://schema.org/Answer">
                                    <div itemprop="text">
                                        Currently, an internet connection is required to read books. However, you can bookmark your favourite books for quick access when you’re back online.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 3 -->
                        <div class="card" itemprop="mainEntity" itemscope itemtype="https://schema.org/Question">
                            <div class="card-header" id="faqHeading3">
                                <h3 class="mb-0">
                                    <button class="font-20 btn-link font-weight-bold collapsed" type="button" data-toggle="collapse" data-target="#faqCollapse3">
                                        <span itemprop="name">How do I find books for my child's age?</span>
                                        <span class="icon-box">
                                            <img src="/assets/default/svgs/plus-alt.svg" alt="plus-alt" class="plus-img">
                                            <img src="/assets/default/svgs/minus.svg" alt="minus" class="minus-img">
                                        </span>
                                    </button>
                                </h3>
                            </div>
                            <div id="faqCollapse3" class="collapse" data-parent="#faqAccordion">
                                <div class="card-body" itemprop="acceptedAnswer" itemscope itemtype="https://schema.org/Answer">
                                    <div itemprop="text">
                                        We personalise it! You can easily find reading books for kids by age or grade level using our simple search and tailored recommendations.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 4 -->
                        <div class="card" itemprop="mainEntity" itemscope itemtype="https://schema.org/Question">
                            <div class="card-header" id="faqHeading4">
                                <h3 class="mb-0">
                                    <button class="font-20 btn-link font-weight-bold collapsed" type="button" data-toggle="collapse" data-target="#faqCollapse4">
                                        <span itemprop="name">How do book chapter quizzes work?</span>
                                        <span class="icon-box">
                                            <img src="/assets/default/svgs/plus-alt.svg" alt="plus-alt" class="plus-img">
                                            <img src="/assets/default/svgs/minus.svg" alt="minus" class="minus-img">
                                        </span>
                                    </button>
                                </h3>
                            </div>
                            <div id="faqCollapse4" class="collapse" data-parent="#faqAccordion">
                                <div class="card-body" itemprop="acceptedAnswer" itemscope itemtype="https://schema.org/Answer">
                                    <div itemprop="text">
                                        Quizzes appear after each chapter to check understanding in a fun way, turning online reading into an engaging learning experience.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 5 -->
                        <div class="card" itemprop="mainEntity" itemscope itemtype="https://schema.org/Question">
                            <div class="card-header" id="faqHeading5">
                                <h3 class="mb-0">
                                    <button class="font-20 btn-link font-weight-bold collapsed" type="button" data-toggle="collapse" data-target="#faqCollapse5">
                                        <span itemprop="name">How do I earn Coin Points?</span>
                                        <span class="icon-box">
                                            <img src="/assets/default/svgs/plus-alt.svg" alt="plus-alt" class="plus-img">
                                            <img src="/assets/default/svgs/minus.svg" alt="minus" class="minus-img">
                                        </span>
                                    </button>
                                </h3>
                            </div>
                            <div id="faqCollapse5" class="collapse" data-parent="#faqAccordion">
                                <div class="card-body" itemprop="acceptedAnswer" itemscope itemtype="https://schema.org/Answer">
                                    <div itemprop="text">
                                        Children earn Coin Points by reading books and completing activities, making learning rewarding and motivating.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 6 -->
                        <div class="card" itemprop="mainEntity" itemscope itemtype="https://schema.org/Question">
                            <div class="card-header" id="faqHeading6">
                                <h3 class="mb-0">
                                    <button class="font-20 btn-link font-weight-bold collapsed" type="button" data-toggle="collapse" data-target="#faqCollapse6">
                                        <span itemprop="name">What are the main benefits of reading for my child?</span>
                                        <span class="icon-box">
                                            <img src="/assets/default/svgs/plus-alt.svg" alt="plus-alt" class="plus-img">
                                            <img src="/assets/default/svgs/minus.svg" alt="minus" class="minus-img">
                                        </span>
                                    </button>
                                </h3>
                            </div>
                            <div id="faqCollapse6" class="collapse" data-parent="#faqAccordion">
                                <div class="card-body" itemprop="acceptedAnswer" itemscope itemtype="https://schema.org/Answer">
                                    <div itemprop="text">
                                        Reading builds vocabulary, comprehension, creativity, critical thinking, and empathy. It forms a strong foundation for lifelong learning.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 7 -->
                        <div class="card" itemprop="mainEntity" itemscope itemtype="https://schema.org/Question">
                            <div class="card-header" id="faqHeading7">
                                <h3 class="mb-0">
                                    <button class="font-20 btn-link font-weight-bold collapsed" type="button" data-toggle="collapse" data-target="#faqCollapse7">
                                        <span itemprop="name">Can reading help with school?</span>
                                        <span class="icon-box">
                                            <img src="/assets/default/svgs/plus-alt.svg" alt="plus-alt" class="plus-img">
                                            <img src="/assets/default/svgs/minus.svg" alt="minus" class="minus-img">
                                        </span>
                                    </button>
                                </h3>
                            </div>
                            <div id="faqCollapse7" class="collapse" data-parent="#faqAccordion">
                                <div class="card-body" itemprop="acceptedAnswer" itemscope itemtype="https://schema.org/Answer">
                                    <div itemprop="text">
                                        Yes! Strong reading skills help children perform better across subjects like writing, maths, and science by improving comprehension.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 8 -->
                        <div class="card" itemprop="mainEntity" itemscope itemtype="https://schema.org/Question">
                            <div class="card-header" id="faqHeading8">
                                <h3 class="mb-0">
                                    <button class="font-20 btn-link font-weight-bold collapsed" type="button" data-toggle="collapse" data-target="#faqCollapse8">
                                        <span itemprop="name">How does reading improve language skills?</span>
                                        <span class="icon-box">
                                            <img src="/assets/default/svgs/plus-alt.svg" alt="plus-alt" class="plus-img">
                                            <img src="/assets/default/svgs/minus.svg" alt="minus" class="minus-img">
                                        </span>
                                    </button>
                                </h3>
                            </div>
                            <div id="faqCollapse8" class="collapse" data-parent="#faqAccordion">
                                <div class="card-body" itemprop="acceptedAnswer" itemscope itemtype="https://schema.org/Answer">
                                    <div itemprop="text">
                                        Reading exposes children to new words and sentence structures, naturally improving speaking, writing, and communication skills.
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
  
  @foreach($homeSections as $homeSection)
    @if($homeSection->name == \App\Models\HomeSection::$blog and !empty($blog) and !$blog->isEmpty())
           <section class="home-sections container pb-60 mt-60">
               <div class="d-flex justify-content-between">
                   <div class="section-title">
                       <h2 class="mt-0 mb-10">{{ trans('home.blog') }}</h2>
                       <p class="section-hint font-14">Uncover the Latest News and Trends!</p>
                   </div>
                   <a href="/blog" class="btn btn-border-white">{{ trans('home.all_blog') }}</a>
               </div>
               <div class="row mt-35">
                   @foreach($blog as $post)
                       <div class="col-12 col-md-4 col-lg-4 mt-20 mt-lg-0">
                           @include('web.default.blog.rurera-grid-list',['post' =>$post])
                       </div>
                   @endforeach
               </div>
               <div class="d-flex align-items-center justify-content-center pt-30">
                    <a href="/pricing" class="try-rurera-btn btn-primary font-16 text-dark-blue register-btn py-15 px-30">Try Rurera for free</a>
                </div>
           </section>
       @endif
    @endforeach
	
  @php
    $packages_only = isset( $packages )? $packages : array();
    $show_details = isset( $show_details )? $show_details : true;
    @endphp
    <section class="rurera-setup-progress-section rurera-membership-section mb-0" data-currency_sign="{{getCurrencySign()}}" style="background-color: #fff;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 text-center">
                    <div class="section-title text-center mb-40">
                        <h2 class="mb-10">Choose the right plan for you</h2>
                        <p>Save more with annual pricing</p>
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
    <div class="modal fade rurera-choose-membership" id="subscriptionModal" tabindex="-1" aria-labelledby="subscriptionModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <div class="modal-body">
                    <div class="tab-content subscription-content" id="nav-tabContent"></div>
                </div>
            </div>
        </div>
    </div>
  <div class="modal fade rurera-choose-membership" id="exampleModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <div class="modal-body">
          <div class="tab-content" id="nav-tabContent2">
            <div class="tab-pane fade show active" id="get">
              <div class="membership-steps-holder">
                <div class="container">
                  <div class="row">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center mb-30">
                      <h2>Explore the details of your free trial experience.</h2>
                    </div>
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                      <div class="membership-steps text-center row">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                          <ul class="membership-steps-list mb-20">
                            <li class="active">
                              <a href="#">
                                <span class="icon-svg">
                                    <img src="/assets/default/svgs/lock-steps.svg" alt="lock-steps">
                                </span>
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <span class="icon-svg">
                                    <img src="/assets/default/svgs/bell-steps.svg" alt="bell-steps">
                                </span>
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <span class="icon-svg">
                                    <img src="/assets/default/svgs/check-steps.svg" alt="check-steps">
                                </span>
                              </a>
                            </li>
                          </ul>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                          <div class="membership-steps">
                            <h3 class="mb-5">Today</h3>
                            <p>Begin your rurera journey and start reading for free.</p>
                          </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                          <div class="membership-steps">
                            <h3 class="mb-5">Day 5</h3>
                            <p>An email reminder will be sent as your free trial ends.</p>
                          </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4 col-sm-12">
                          <div class="membership-steps">
                            <h3 class="mb-5">Day 7</h3>
                            <p>Payment processed on 6th day, cancel anytime before date.</p>
                          </div>
                        </div>
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                          <a href="#" class="nav-link mt-20 btn-primary rounded-pill" id="home-tab" data-toggle="tab" data-target="#home" aria-controls="home" role="button"> Start your 7-day free trial </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="home" role="tabpanel">
              <div class="form-login-reading">
                <div class="container">
                  <div class="row">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center mb-30">
                      <h2>Start Reading Today</h2>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-8 mx-auto">
                      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                          <a href="/google" target="_blank" class="social-login mt-20 p-15 text-center d-flex align-items-center justify-content-center">
                            <img src="/assets/default/img/auth/google.svg" height="24" width="24" class="mr-auto" alt=" google svg">
                            <span class="flex-grow-1">Login with Google account</span>
                          </a>
                        </div>
                      </div>
                      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                          <a href="#" target="_blank" class="social-login mt-20 p-15 text-center d-flex align-items-center justify-content-center">
                            <img src="/assets/default/img/auth/facebook.svg" height="24" width="24" class="mr-auto" alt="facebook svg">
                            <span class="flex-grow-1">Login with Facebook account</span>
                          </a>
                        </div>
                      </div>
                      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                          <div class="form-separator">
                            <span>or</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                          <div class="input-field">
                            <input type="text" placeholder="Email Address">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="input-field">
                            <input type="text" placeholder="password">
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                          <a href="#" class="nav-link btn-primary rounded-pill mb-25 text-center" id="book-tab" data-toggle="tab" data-target="#book" aria-controls="book" role="button"> continue </a>
                        </div>
                      </div>
                      <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
                        <p class="mb-20">By Clicking on Start Free Trial, I agree to the <a href="#">Terms of Service</a>And <a href="#">Privacy Policy</a>
                        </p>
                        <div class="subscription mb-20">
                          <span>Already have a subscription? <a href="#" id="contact-tab" data-toggle="tab" data-target="#contact" aria-controls="contact" role="button">log in</a>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="book" role="tabpanel">
              <div class="book-detail-holder">
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="book-detail">
                        <div class="img-holder">
                          <figure>
                            <img src="../assets/default/img/book-list1.png" height="192" width="152" alt="#">
                          </figure>
                        </div>
                        <div class="text-holder mt-20">
                          <h2>Consult a grownup for assistance.</h2>
                          <p class="mt-15">
                            <a href="#">
                            <span class="icon-svg">
                                <img src="/assets/default/svgs/sound-play.svg" height="28" width="28" alt="sound-play">
                            </span>
                            </a> Upgrade to the Family Premium plan to read the rest of this book and enjoy unlimited access to our entire library.
                          </p>
                          <a href="#" class="nav-link btn-primary rounded-pill mb-25" id="subscribe-tab" data-toggle="tab" data-target="#subscribe" aria-controls="subscribe"> Get Rurera </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="subscribe" role="tabpanel">
              <div class="subscribe-plan-holder">
                <div class="container">
                  <div class="row">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center mb-40">
                      <h2>Select the rurera Family plan for your subscription.</h2>
                      <p class="mt-10">Pay monthly or save 44% annually after your free trial!</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="subscribe-plan position-relative bg-white d-flex flex-column align-items-center rounded-sm shadow pt-30 pb-30 px-20 mb-30">
                        <div class="d-flex align-items-start text-primary mt-20">
                          <span class="font-36 line-height-1">$20</span>
                        </div>
                        <ul class="mt-20 plan-feature">
                          <li class="mt-10">15 days of subscription</li>
                        </ul>
                        <button type="submit" id="contact-tab5" data-toggle="tab" data-target="#contact" aria-controls="contact" class="btn btn-primary btn-block mt-30 rounded-pill bg-none"> Purchase </button>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="subscribe-plan position-relative bg-white d-flex flex-column align-items-center rounded-sm shadow pt-30 pb-30 px-20 mb-30">
                        <span class="badge badge-primary badge-popular px-15 py-5">Popular</span>
                        <div class="d-flex align-items-start text-primary mt-20">
                          <span class="font-36 line-height-1">$100</span>
                        </div>
                        <ul class="mt-20 plan-feature">
                          <li class="mt-10">30 days of subscription</li>
                        </ul>
                        <button type="submit" id="contact-tab6" data-toggle="tab" data-target="#contact" aria-controls="contact" class="btn btn-primary btn-block mt-30 rounded-pill"> Purchase </button>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 price-plan-image">
                      <img src="../assets/default/img/price-plan.png" alt="#" height="270" width="166">
                    </div>
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center bg-dark-green bg-dark-green">
                      <strong>96% of subscribing parents in rurera Family report significant improvement in their child's reading skills.</strong>
                      <div class="subscription mt-20">
                        <span>Already have a subscription? <a href=".#" id="contact-tab9" data-toggle="tab" data-target="#contact" aria-controls="contact" role="button">log in</a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel">
              <div class="book-form-holder">
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-12 col-lg-9 col-md-9 col-sm-12 text-center">
                      <h2>The Final Step to Reading!</h2>
                      <p>No need to worry! We won't ask for payment until after your 7-day free trial ends.</p>
                    </div>
                    <div class="col-12 col-lg-9 col-md-9 col-sm-12">
                      <div class="book-form mt-30">
                        <div class="row">
                          <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                              <div class="input-field">
                                <input type="text" placeholder="First Name">
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                              <div class="input-field">
                                <input type="text" placeholder="Last Name">
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                              <div class="input-field input-card">
                                <span class="icon-svg">
                                    <img src="/assets/default/svgs/card.svg" height="24" width="24" alt="card">
                                </span>
                                <input type="text" placeholder="Card Number">
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
                            <p class="mb-25"> Once your 7-day free trial is over, we will automatically charge your chosen payment method $19.99 every month until you decide to cancel. You have the freedom to cancel at any time. Keep in mind that there may be sales tax added. For instructions on how to cancel, please refer to the provided guidelines </p>
                          </div>
                          <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
                            <a href="/login" class="nav-link btn-primary rounded-pill mb-25">Sart Free Trial</a>
                          </div>
                          <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
                            <p class="mb-20">By Clicking on Start Free Trial, I agree to the <a href="#">Terms of Service</a>And <a href="#">Privacy Policy</a>
                            </p>
                            <div class="subscription mb-20">
                              <span>Already have a subscription? <a href="#">log in</a>
                              </span>
                            </div>
                            <div class="secure-server">
                              <figure>
                                <img src="/assets/default/svgs/server-lock.svg" height="26" width="26" alt="server-lock">
                              </figure>
                              <span> Secure Server <br> SSL Encrypted </span>
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
      </div>
    </div>
  </div>
@endsection

@push('scripts_bottom')
<script src="/assets/default/vendors/masonry/masonry.pkgd.min.js"></script>
@endpush
