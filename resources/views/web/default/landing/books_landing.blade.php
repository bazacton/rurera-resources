@extends(getTemplate().'.layouts.app')

@push('styles_top')
<style>
    .book-library-sub-header {
        background-color: #333399;
        background-image: linear-gradient(transparent 11px, rgba(255, 255, 255, 0.2) 12px, transparent 12px), linear-gradient(90deg, transparent 11px, rgba(255, 255, 255, 0.2) 12px, transparent 12px);
        background-size: 100% 12px, 12px 100%;
    }
</style>
@endpush

@section('content')
<section class="position-relative job-singup-sub-header gallery-sub-header pb-80" style="min-height: 680px;">
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-12 col-md-12 col-lg-7">
          <h1 itemprop="title" class="font-72 font-weight-bold">Dive into the World of <span class="text-scribble">Books!</span>
          </h1>
          <strong class="d-block font-36">Read Anywhere, Anytime!</strong>
          <p itemprop="description" class="lms-subtitle font-19 font-weight-normal pt-20">Rurera boosts reading skills with fun books, cool rewards, and personalized challenges. Watch your child's love for reading grow every day!</p>
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
                <a href="#">
                  <img src="/assets/default/img/book-masonry1.png" alt="default staff image" title="default staff image" width="192" height="288" itemprop="image" loading="eager">
                </a>
              </figure>
            </div>
          </div>
          <div class="grid-item col-lg-3 col-md-3 col-sm-6">
            <div class="img-holder">
              <figure>
                <a href="#">
                  <img src="../assets/default/img/book-masonry6.png" alt="default staff image" title="default staff image" width="192" height="157" itemprop="image" loading="eager">
                </a>
              </figure>
            </div>
          </div>
          <div class="grid-item col-lg-3 col-md-3 col-sm-6">
            <div class="img-holder">
              <figure>
                <a href="#">
                  <img src="../assets/default/img/book-masonry4.png" alt="default staff image" title="default staff image" width="192" height="284" itemprop="image" loading="eager">
                </a>
              </figure>
            </div>
          </div>
          <div class="grid-item col-lg-3 col-md-3 col-sm-6">
            <div class="img-holder">
              <figure>
                <a href="#">
                  <img src="../assets/default/img/book05.png" alt="default staff image" title="default staff image" width="192" height="193" itemprop="image" loading="eager">
                </a>
              </figure>
            </div>
          </div>
          <div class="grid-item col-lg-3 col-md-3 col-sm-6">
            <div class="img-holder">
              <figure>
                <a href="#">
                  <img src="../assets/default/img/book02.png" alt="default staff image" title="default staff image" width="192" height="294" itemprop="image" loading="eager">
                </a>
              </figure>
            </div>
          </div>
          <div class="grid-item col-lg-3 col-md-3 col-sm-6">
            <div class="img-holder">
              <figure>
                <a href="#">
                  <img src="../assets/default/img/book03.png" alt="default staff image" title="default staff image" width="192" height="228" itemprop="image" loading="eager">
                </a>
              </figure>
            </div>
          </div>
          <div class="grid-item col-lg-3 col-md-3 col-sm-6">
            <div class="img-holder">
              <figure>
                <a href="#">
                  <img src="/assets/default/img/book-masonry6.png" alt="default staff image" title="default staff image" width="192" height="157" itemprop="image" loading="eager">
                </a>
              </figure>
            </div>
          </div>
          <div class="grid-item col-lg-3 col-md-3 col-sm-6">
            <div class="img-holder">
              <figure>
                <a href="#">
                  <img src="/assets/default/img/book05.png" alt="default staff image" title="default staff image" width="192" height="193" itemprop="image" loading="eager">
                </a>
              </figure>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="lms-services lms-contact-info mx-w-100 pt-80 pb-50 mb-80 lms-wave-shape-top" style="background-color: #f6b801;">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-title text-center mb-50">
            <h2 class="mt-0 mb-10 font-40">Activities for enhancing Reading skills.</h2>
            <p class="font-19 pt-5 text-dark-charcoal">Curriculum aligned all major literacy strands. <br > Reading helps you think better, understand more, and solve problems more easily.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="services-card text-center mb-30 pr-40 pl-40">
            <div class="services-card-body">
              <figure class="icon-md">
                <img src="../assets/default/svgs/book2.svg" alt="support" title="support" width="100" height="100" itemprop="image" loading="eager">
              </figure>
              <div class="services-text mt-20">
                <h2 itemprop="title" class="font-24 mb-10">Book Chapter Quizzes</h2>
                <p itemprop="description" class="text-dark-charcoal">Your ultimate resource help for resolving quizzes and practices.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="services-card text-center mb-30 pr-40 pl-40">
            <div class="services-card-body">
              <figure class="icon-md">
                <img src="../assets/default/svgs/analysis.svg" alt="knowledge" title="knowledge" width="100" height="100" itemprop="image" loading="eager">
              </figure>
              <div class="services-text mt-20">
                <h2 itemprop="title" class="font-24 mb-10">Assessments &amp; Tests</h2>
                <p itemprop="description" class="text-dark-charcoal">Get assessments related to your reading interests and level.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="services-card text-center mb-30 pr-40 pl-40">
            <div class="services-card-body">
              <figure class="icon-md">
                <img src="../assets/default/svgs/coins-money.svg" alt="technical" title="technical" width="100" height="100" itemprop="image" loading="eager">
              </figure>
              <div class="services-text mt-20">
                <h2 itemprop="title" class="font-24 mb-10">Earn Reading Rewards</h2>
                <p itemprop="description" class="text-dark-charcoal">The more you read, the more you'll earn Coin Points, giving you even more.</p>
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
                  <a href="#">
                    <img src="/assets/default/svgs/headphone2.svg" height="800" width="800" alt="Phonics image">
                    <h5>Phonics</h5>
                  </a>
                </div>
              </div>
              <div class="col-12 col-lg-2 col-md-4 col-sm-3">
                <div class="cat-card text-center">
                  <a href="#">
                    <img src="/assets/default/svgs/telescope.svg" height="800" width="800" alt="Sight Words image">
                    <h5>Sight Words</h5>
                  </a>
                </div>
              </div>
              <div class="col-12 col-lg-2 col-md-4 col-sm-3">
                <div class="cat-card text-center">
                  <a href="#">
                    <img src="/assets/default/svgs/open-book.svg" height="800" width="800" alt="Spelling image">
                    <h5>Spelling</h5>
                  </a>
                </div>
              </div>
              <div class="col-12 col-lg-2 col-md-4 col-sm-3">
                <div class="cat-card text-center">
                  <a href="#">
                    <img src="/assets/default/svgs/cat-light-bulb.svg" height="150" width="150" alt="Comprehension image">
                    <h5>Comprehension</h5>
                  </a>
                </div>
              </div>
              <div class="col-12 col-lg-2 col-md-4 col-sm-3">
                <div class="cat-card text-center">
                  <a href="#">
                    <img src="/assets/default/svgs/loupe-search.svg" height="800" width="800" alt="Gramar image">
                    <h5>Gramar & <br> Punctuation</h5>
                  </a>
                </div>
              </div>
              <div class="col-12 col-lg-2 col-md-4 col-sm-3">
                <div class="cat-card text-center">
                  <a href="#">
                    <img src="/assets/default/svgs/bookshelf2.svg" height="150" width="150" alt="Reading image">
                    <h5>Reading</h5>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="lms-blog lms-blog-grid books-blog mx-w-100 pt-80 pb-50 mb-80" style="background-color:#7679ee;">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-12">
          <div class="section-title mb-50">
            <h2 itemprop="title" class="text-dark-charcoal text-white font-40">Ignite Every Student’s Passion for Reading and <br /> Let Their Brilliance Shine!</h2>
            <p class="font-19 pt-10 text-white"> Discover ebooks, fiction books, board books, kids stories , children books, and more from Rurera book shelf.</p>
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
                      <img src="../assets/default/img/bookchoose-img1.png" width="370" height="250" class="img-cover" loading="eager" alt="#">
                    </div>
                    <h3 itemprop="title" class="blog-grid-title mt-15 text-dark-charcoal px-20">
                      <a itemprop="url" href="#">Enjoy Every E-Book Adventure:</a>
                    </h3>
                    <div itemprop="description" class="mt-5 blog-grid-desc px-20 pb-20">Rurera lets you access books in various digital. This feature ensures that you can read your ebooks on any device, making reading convenient.</div>
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
                      <img src="../assets/default/img/bookchoose-img2.png" width="370" height="250" loading="eager" class="img-cover" alt="#">
                    </div>
                    <h3 itemprop="title" class="blog-grid-title mt-15 text-dark-charcoal px-20">
                      <a itemprop="url" href="/register">Uncover Your Progress:</a>
                    </h3>
                    <div itemprop="description" class="mt-5 blog-grid-desc px-20 pb-20">Monitors how much you’ve read, offering detailed insights into your reading habits and growth. It helps you understand your progress and set goals for better reading.</div>
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
                      <img src="../assets/default/img/bookchoose-img3.png" width="370" height="250" loading="eager" class="img-cover" alt="#">
                    </div>
                    <h3 itemprop="title" class="blog-grid-title mt-15 text-dark-charcoal px-20">
                      <a itemprop="url" href="#">Personalized Learning Pathways:</a>
                    </h3>
                    <div itemprop="description" class="mt-5 blog-grid-desc px-20 pb-20">With Rurera, educators can easily tailor literacy development for each student, regardless of age or skill level. Enjoy targeted support and easy differentiation to boost every student’s progress.</div>
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
                      <img src="../assets/default/img/bookchoose-img1.png" width="370" height="250" class="img-cover" loading="eager" alt="#">
                    </div>
                    <h3 itemprop="title" class="blog-grid-title mt-15 text-dark-charcoal px-20">
                      <a itemprop="url" href="#">Awesome Rewards as You Read:</a>
                    </h3>
                    <div itemprop="description" class="mt-5 blog-grid-desc px-20 pb-20">Keep reading to earn Coin Points, which can be exchanged for your favorite toys. The more you read, the more points you earn, leading to even more exciting rewards!</div>
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
                      <img src="../assets/default/img/bookchoose-img2.png" width="370" height="250" loading="eager" class="img-cover" alt="#">
                    </div>
                    <h3 itemprop="title" class="blog-grid-title mt-15 text-dark-charcoal px-20">
                      <a itemprop="url" href="/register">Effortless Student Engagement:</a>
                    </h3>
                    <div itemprop="description" class="mt-5 blog-grid-desc px-20 pb-20">Rurera’s built-in rewards system motivates students by recognizing their achievements. As they learn more, they earn rewards, keeping them excited and engaged with their learning journey.</div>
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
                      <img src="../assets/default/img/bookchoose-img3.png" width="370" height="250" loading="eager" class="img-cover" alt="#">
                    </div>
                    <h3 itemprop="title" class="blog-grid-title mt-15 text-dark-charcoal px-20">
                      <a itemprop="url" href="/rewards">Reporting Made Easy:</a>
                    </h3>
                    <div itemprop="description" class="mt-5 blog-grid-desc px-20 pb-20">Rurera simplifies task assignments, personalized learning, and reporting. The platform helps teachers efficiently manage literacy across all subjects, saving time and supporting effective instruction.</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container">
      <div class="row">
          <div class="col-12">
            <div class="section-title text-center mb-30">
                <h2 class="mt-0 mb-10 font-40">Frequently asked questions</h2>
            </div>
          </div>
          <div class="col-12 col-lg-12 col-md-12 mx-auto">
            <div class="lms-faqs mx-w-100" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
              <div id="accordion">
                <div class="card" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                  <div class="card-header active" id="heading">
                    <button class="btn font-18 font-weight-bold btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">How does Rurera’s bookshelf work?</button>
                  </div>
                  <div id="collapseOne" class="collapse show" aria-labelledby="heading" data-parent="#accordion">
                    <div class="card-body">
                      <p>Rurera is a digital reading service that makes reading interactive, motivating and engaging for children aged 4-11. With eBooks and comprehension quizzes to suit all, teachers and parents can also monitor and support each child's personal reading and comprehension progress.</p>
                    </div>
                  </div>
                </div>
                <div class="card" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                  <div class="card-header" id="headingTwo">
                    <button class="btn font-18 font-weight-bold btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Can I read books offline?</button>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                      <p>Currently, Rurera requires an internet connection to access and read books. However, you can bookmark books for quick access and view them when you’re online.</p>
                    </div>
                  </div>
                </div>
                <div class="card" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                  <div class="card-header" id="headingThree">
                    <button class="btn font-18 font-weight-bold btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">How can I find books that match my reading level?</button>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                      <p>Rurera provides personalized recommendations based on your reading preferences and level. You can use the search and filter options to find books that match your reading ability and interests.</p>
                    </div>
                  </div>
                </div>
                <div class="card" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                  <div class="card-header" id="headingfour">
                    <button class="btn font-18 font-weight-bold btn-link collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">How do book chapter quizzes work?</button>
                  </div>
                  <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordion">
                    <div class="card-body">
                      <p>Book chapter quizzes test your understanding of each chapter. They are designed to reinforce key concepts and ensure comprehension. You can take these quizzes after reading each chapter to check your knowledge.</p>
                    </div>
                  </div>
                </div>
                <div class="card" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                  <div class="card-header" id="headingfive">
                    <button class="btn font-18 font-weight-bold btn-link collapsed" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">How do I earn Coin Points through reading?</button>
                  </div>
                  <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordion">
                    <div class="card-body">
                      <p>You earn Coin Points by completing reading milestones and participating in activities. The more books you read and engage with, the more Coin Points you accumulate, which can be exchanged for rewards.</p>
                    </div>
                  </div>
                </div>
                <div class="card" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                  <div class="card-header" id="headingsix">
                    <button class="btn font-18 font-weight-bold btn-link collapsed" data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">How does reading benefit a child's development?</button>
                  </div>
                  <div id="collapsesix" class="collapse" aria-labelledby="headingsix" data-parent="#accordion">
                    <div class="card-body">
                      <p>Reading enhances a child’s cognitive skills, including vocabulary, comprehension, and critical thinking. It also fosters imagination, creativity, and empathy by exposing them to diverse perspectives and experiences.</p>
                    </div>
                  </div>
                </div>
                <div class="card" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                  <div class="card-header" id="heading7">
                    <button class="btn font-18 font-weight-bold btn-link collapsed" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">Can reading help with academic performance?</button>
                  </div>
                  <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordion">
                    <div class="card-body">
                      <p>Yes, regular reading improves comprehension and analytical skills, which can boost overall academic performance. Children who read often tend to perform better in subjects like reading, writing, and even math.</p>
                    </div>
                  </div>
                </div>
                <div class="card" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                  <div class="card-header" id="heading8">
                    <button class="btn font-18 font-weight-bold btn-link collapsed" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapse8">How does reading improve a child's language skills?</button>
                  </div>
                  <div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#accordion">
                    <div class="card-body">
                      <p>Reading helps expand a child’s vocabulary and grammar by exposing them to new words and sentence structures. It also improves their understanding of language through context and usage, aiding in better communication skills.</p>
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
                       <h2 class="mt-0 mb-10 font-40">{{ trans('home.blog') }}</h2>
                       <p class="section-hint">Uncover the Latest News and Trends!</p>
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
    <section class="lms-setup-progress-section lms-membership-section mb-0 pb-50" data-currency_sign="{{getCurrencySign()}}" style="background-color: #fff;">
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
    <div class="modal fade lms-choose-membership" id="subscriptionModal" tabindex="-1" aria-labelledby="subscriptionModal" aria-hidden="true">
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
  <div class="modal fade lms-choose-membership" id="exampleModal">
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
                                <img src="/assets/default/svgs/server-lock.svg" height="26" width="26" alt="">
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
