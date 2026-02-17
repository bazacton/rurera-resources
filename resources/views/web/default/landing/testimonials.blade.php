@extends(getTemplate().'.layouts.app')

@section('content')
<section class="position-relative job-singup-sub-header text-center page-sub-header pt-60 pb-0" style="min-height: auto;">
  <div class="container h-100">
    <div class="row h-100 align-items-center text-left">
      <div class="col-12 col-md-12 col-lg-9">
        <p class="rurera-subtitle">How we've helped others</p>
        <h1 class="mb-10">
          Stories of Trust and <span class="text-scribble">Triumph!</span>
        </h1>
        <p class="mb-10">
          Rurera has earned the trust of parents, educators, and students by delivering personalized, engaging, and effective learning. From SATs prep to fun rewards, discover why so many confidently choose Rurera to enhance their learning journeys.
        </p>
      </div>
    </div>
  </div>
</section>
<section class="rurera-testimonials testimonials-fancy">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-3 col-md-6 col-sm-12">
        <div class="testimonial-card fancy">
          <div class="testimonial-img text-center">
            <figure>
              <img src="../assets/default/img/bri-client2.jpg" alt="bran images" title="bran images" width="120" height="120" itemprop="image" loading="eager" />
            </figure>
          </div>
          <div class="testimonial-body">
            <h2 class="post-title">Cristian Miller</h2>
            <span class="sub-title">Teacher</span>
            <p itemprop="description">Rurera is an advance emerging learning platform. Love it!</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-3 col-md-6 col-sm-12">
        <div class="testimonial-card fancy">
          <div class="testimonial-img text-center">
            <figure>
              <img src="../store/1/default_images/home_video_section.png" alt="bran images" title="bran images" width="120" height="120" itemprop="image" loading="eager" />
            </figure>
          </div>
          <div class="testimonial-body">
            <h2 class="post-title">Peter J.</h2>
            <span class="sub-title">Student</span>
            <p itemprop="description">
              My first choice is Rurera when it comes to pro level learning.
            </p>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-3 col-md-6 col-sm-12">
        <div class="testimonial-card fancy">
          <div class="testimonial-img text-center">
            <figure>
              <img src="../assets/default/img/bri-client3.jpg" alt="bran images" title="bran images" width="120" height="120" itemprop="image" loading="eager" />
            </figure>
          </div>
          <div class="testimonial-body">
            <h2 class="post-title">Fiona Thompson</h2>
            <span class="sub-title">Parent</span>
            <p itemprop="description">Rurera has recognized itself a great platform. Recommmended</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-3 col-md-6 col-sm-12">
        <div class="testimonial-card fancy">
          <div class="testimonial-img text-center">
            <figure>
              <img src="../assets/default/img/bri-client6.jpg" alt="bran images" title="bran images" width="120" height="120" itemprop="image" loading="eager" />
            </figure>
          </div>
          <div class="testimonial-body">
            <h2 class="post-title">Kyle Matt</h2>
            <span class="sub-title">Teacher</span>
            <p itemprop="description">As a teacher i would encourage to follow Rurera for sure.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="testimonials-fancy-bg">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="rurera-text-section">
            <div class="rurera-text-holder text-center">
              <small itemprop="best work">Shape your success story with </small><b>Rurera</b>
              <p itemprop="description" class="mt-10">
                Discover everything you need to guide learners toward success!
              </p>
              <div class="rurera-btn-group mt-30">
                <a href="{{url('/')}}/register" class="rurera-btn rounded-pill"
                  >Get Started<span class="svg-icon"><img src="/assets/default/svgs/btn-right-arrow.svg" height="15" width="15" alt="btn-right-arrow"></span
                ></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="home-sections home-sections-swiper find-instructor-section find-instructor-testimonial position-relative mt-20">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12 col-lg-12 mb-50">
        <div class="section-title text-center">
          <h2  class="mb-15">Trusted by Many, Loved by All</h2>
          <p itemprop="description"  class="text-center mb-10">
            Hear heartfelt stories from students, teachers, <br> and parents about their experiences.
          </p>
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <div class="position-relative left">
          <div class="find-instructor-circle">
            <span itemprop="number" class="rurera-serial-no">#1</span>
          </div>
          <p itemprop="datePublished" content="2023-06-05">Happy parent / 4 June 2023</p>
          <h3 class="font-36 font-weight-bold text-dark">Cristian Miller</h3>
          <p itemprop="description" class="font-16 font-weight-normal text-gray mt-10">As a parent, I want to share my incredible experience that has made a significant impact on my child's education. Rurera has truly transformed the way my child learns and engages with educational content. Recommended!</p>
        </div>
      </div>
      <div class="col-12 col-lg-6 mb-30">
        <div class="position-relative">
          <div class="vidio-holder">
            <img src="../store/1/default_images/home_video_section.png" class="find-instructor-section-hero" alt="Find the best instructor" title="Find the best instructor" width="435" height="245" itemprop="image" loading="eager" />
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="home-sections home-sections-swiper find-instructor-section find-instructor-testimonial position-relative pb-sm-0">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12 col-lg-6 mb-30">
        <div class="position-relative">
          <div class="vidio-holder">
            <img src="../assets/default/img/testimonial-2.jpg" class="find-instructor-section-hero" alt="Find the best instructor" title="Find the best instructor" width="435" height="245" itemprop="image" loading="eager" />
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <div class="position-relative right">
          <div class="find-instructor-circle">
            <span itemprop="number" class="rurera-serial-no">#2</span>
          </div>
          <p itemprop="datePublished" content="2023-06-05">Experienced Teacher / 30 May 2023</p>
          <h3 class="font-36 font-weight-bold text-dark">Peter J.</h3>
          <p itemprop="description" class="font-16 font-weight-normal text-gray mt-10">One of the standout features of Rurera is its assessment and analytics capabilities. It provides real-time data on student performance, allowing me to track their progress and identify areas where additional support is needed.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="rurera-column-section rurera-text-section container-w mt-50 mb-0 pt-30 pb-30 pr-30 pl-30"
    style="background-color: #eaf7f0;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="rurera-text-holder d-flex justify-content-between">
                    <div class="d-flex flex-column">
                        <h3 class="mb-10 font-24 align-items-center d-flex"> <span class="icon-svg mr-20">
                            <img src="/assets/default/svgs/column-text-bulb.svg" height="30" width="30" alt="column-text-bulb">
                            </span>Step into Success—Join the Rurera Family Today!</h3>
                        <p itemprop="description" class="font-16">Be part of a thriving community where learners excel—experience the support and inspiration that can transform your journey today!</p>
                    </div>
                    <div class="rurera-btn-group justify-content-center">
                      <a href="{{url('/')}}/pricing" class="rurera-btn rounded-pill">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="rurera-testimonial-tabs pt-50">
  <div class="container">
    <div class="rurera-testimonials row">
      <div class="col-12 mb-20">
        <div class="section-title">
          <h2 class="text-center w-100 mb-10 pt-0">Discover What Makes Rurera Loved!</h2>
          <p itemprop="description" class="mb-25 text-center">
            Read heartfelt testimonials from our community and see how Rurera has <br > transformed their learning experiences.
          </p>
        </div>
      </div>
      <div class="col-12">
        <div class="testimonial-filters">
          <ul class="testimonial-tabs filters-button" id="filters">
            <li class="active"><a href="javascript:;" class="filter-btn" data-filter="*">All Testimonials</a></li>
            <li><a href="javascript:;" class="filter-btn" data-filter=".student">Student</a></li>
            <li><a href="javascript:;" class="filter-btn" data-filter=".parent">Parent</a></li>
            <li><a href="javascript:;" class="filter-btn" data-filter=".teacher">Teacher</a></li>
          </ul>
        </div>
        <div class="rurera-masonry">
          <div class="masonry-grid row">
             @foreach($testimonials as $testimonial)
                <div class="grid-item col-lg-3 col-md-4 col-sm-6 student">
                    <div class="testimonial-card">
                        <div class="testimonial-body">
                          <p itemprop="description">{!! nl2br($testimonial->comment) !!}</p>
                          <div itemprop="author" class="author-name">
                            <span>{{ $testimonial->user_name }}</span><small><em>|</em>{{ $testimonial->testimonial_by }}</small>
                          </div>
                        </div>
                    </div>
                </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@push('scripts_bottom')
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
<script src="/assets/default/vendors/masonry/masonry.pkgd.min.js"></script>

<script>
  $(document).ready(function () {

    // Init Masonry after images load
    var $grid = $('.masonry-grid').imagesLoaded(function () {
        $grid.masonry({
            itemSelector: '.grid-item',
            percentPosition: true
        });
    });

    // Filter click callback
    $('.testimonial-tabs li').on('click', function (e) {
        e.preventDefault();

        // active class toggle
        $('.testimonial-tabs li').removeClass('active');
        $(this).addClass('active');

        // filter value
        var filterValue = $(this).text().toLowerCase();

        // show/hide items
        if (filterValue === 'all testimonials') {
            $('.grid-item').show();
        } else {
            $('.grid-item').hide();
            $('.grid-item.' + filterValue).show();
        }

        // re-layout masonry
        $grid.masonry('layout');
    });

});
</script>
<script>
  // Play Video Function
  $(document).ready(function () {
    var video = document.getElementById("video");
    var circlePlayButton = document.getElementById("play-vidio");
    var posterImg = document.getElementById("poster-img");

    function togglePlay() {
      if (video.paused || video.ended) {
        video.play();
      } else {
        video.pause();
      }
    }

    circlePlayButton.addEventListener("click", togglePlay);
    video.addEventListener("playing", function () {
      circlePlayButton.style.opacity = 0;
      posterImg.style.opacity = 0
    });

    video.addEventListener("pause", function () {
      circlePlayButton.style.opacity = 1;
      posterImg.style.opacity = 0
    });
  });
</script>
<script>
  
</script>
@endpush
