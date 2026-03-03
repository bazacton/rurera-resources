@extends('web.default.panel.layouts.panel_layout')

@section('content')
<main id="main-content">
    <section class="content-section">
        <div class="page-section template-grid mx-w-100 p-0 news-section">
            <div class="timestables-modes">
                <div class="section-title mb-15">
                    <h2 class="font-22 mb-0">Time Tables</h2>
                </div>
                <div class="modal fade"
                id="exampleModalCenter"
                tabindex="-1"
                role="dialog"
                aria-modal="true"
                aria-labelledby="exampleModalCenterTitle"
                aria-describedby="modalDescription">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-body">
                        <div class="col-12 col-lg-12 pt-15">
                        <div class="sound-card panel-border bg-white rounded-sm p-20">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                            <h2 class="selective-sound font-22">very</h2>
                                <div class="sound-box">
                                    <span class="icon-box">
                                        <img src="/assets/default/svgs/sound.svg" alt="sound svg image" height="800" width="800">
                                    </span>
                                    <h2 id="exampleModalCenterTitle" class="current-sound font-22">very</h2>
                                </div>
                                <div class="sound-list">
                                    <h5>adjective</h5>
                                    <ol>
                                        <li>being actual or real</li>
                                        <li>exact, precise</li>
                                        <li>exactly suitable or necessary</li>
                                    </ol>
                                </div>
                                <div class="sound-list mb-0">
                                    <h5>adverb</h5>
                                    <ol>
                                        <li>in actual fact: truly</li>
                                        <li>to a great degree: extremely</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        </div>

                        </div>
                    </div>
                </div>
                <div class="type-list-data single-player-data">
                    <article class="grid-card timestables-mode-data" data-mode_type="freedom_mode">
                        <div class="text-holder">
                            <h3 class="font-16 font-weight-bold">
                                <a class="stretched-link" href="/timestable/freedom-mode">
                                    Freedom mode
                                </a>
                            </h3>
                        </div>
                        <div class="img-holder">
                            <img src="/assets/default/svgs/eagle.svg" class="img-cover" alt="" aria-hidden="true" loading="lazy" title="Engaging Students through Interactive Technologies">
                        </div>
                        <p class="text-gray font-14">Explore multiplication, division, or both at your own pace.</p>
                    </article>
                    <article class="grid-card timestables-mode-data" data-mode_type="powerup-mode">
                        <div class="text-holder">
                            <h3 class="font-16 font-weight-bold">
                                <a class="stretched-link" href="/timestable/powerup-mode">
                                    Power-up Heatmap
                                </a>
                            </h3>
                        </div>
                        <div class="img-holder">
                            <img src="/assets/default/svgs/battery-level.svg" class="img-cover" alt="" aria-hidden="true" title="Engaging Students through Interactive Technologies" itemprop="image" loading="lazy">
                        </div>
                        <p class="text-gray font-14">Conquer questions to turn your heatmap green.</p>
                    </article>
                    <article class="grid-card timestables-mode-data" data-mode_type="trophy-mode">
                        <div class="text-holder">
                            <h3 class="font-16 font-weight-bold">
                                <a class="stretched-link" href="/timestable/trophy-mode">
                                    Trophy Mode
                                </a>
                            </h3>
                        </div>
                        <div class="img-holder">
                            <img src="/assets/default/svgs/shuttlecock.svg" class="img-cover" alt="Engaging Students through Interactive Technologies" title="Engaging Students through Interactive Technologies" itemprop="image" loading="lazy">
                        </div>
                        <p class="text-gray font-14">Speed trophy badge by playing 10 games.</p>
                    </article>
                    <article class="grid-card timestables-mode-data" data-mode_type="treasure-mission">
                        <div class="text-holder">
                            <h3 class="font-16 font-weight-bold">
                                <a class="stretched-link" href="/timestable/treasure-mission">
                                    Treasure Mission
                                </a>
                            </h3>
                            <div class="coin-counts">
                            <strong aria-label="46 hearts remaining">
                                <img src="/assets/default/img/panel-sidebar/heart-red.png" alt="" aria-hidden="true">
                                {{$authUser->user_life_lines}}
                            </strong>
                            </div>
                        </div>
                        <div class="img-holder">
                            <img src="/assets/default/img/treasure.png" class="img-cover" alt="" aria-hidden="true" itemprop="image" loading="lazy">
                        </div>
                        <p class="text-gray font-14">Journey through times tables practice and discover hidden treasures.</p>

                    </article>
                    <article class="grid-card timestables-mode-data" data-mode_type="showdown-mode">
                        <div class="text-holder">
                            <h3 class="font-16 font-weight-bold">
                                <a class="stretched-link" href="/timestable/showdown-mode">
                                    Showdown
                                </a>
                            </h3>
                        </div>
                        <div class="img-holder">
                            <img src="/assets/default/img/showdown.png" class="img-cover" alt="" aria-hidden="true" itemprop="image" loading="lazy">
                        </div>
                        <p class="text-gray font-14">Journey through times tables practice and discover hidden treasures.</p>
                    </article>
                    <article class="grid-card timestables-mode-data" data-mode_type="heat-map">
                        <div class="text-holder">
                            <h3 class="font-16 font-weight-bold">
                                <a class="stretched-link" href="/timestable/heat-map">
                                    Heat Map
                                </a>
                            </h3>
                        </div>
                        <div class="img-holder">
                            <img src="/assets/default/svgs/fire.svg" class="img-cover" alt="" aria-hidden="true" title="Engaging Students through Interactive Technologies" itemprop="image" loading="lazy">
                        </div>
                        <p class="text-gray font-14">Colours visualization for user data in heatmap</p>
                    </article>
                    <article class="grid-card timestables-mode-data" data-mode_type="Analytics">
                        <div class="text-holder">
                            <h3 class="font-16 font-weight-bold">
                                <a class="stretched-link" href="/analytics">
                                    Analytics
                                </a>
                            </h3>
                        </div>
                        <div class="img-holder">
                            <img src="/assets/default/svgs/analytics.svg" class="img-cover" alt="" aria-hidden="true" title="Engaging Students through Interactive Technologies" itemprop="image" loading="lazy">
                        </div>
                        <p class="text-gray font-14">Connect with individuals worldwide in a Cloud.</p>

                    </article>
                </div>

                <div class="type-list-data multi-player-data rurera-hide">
                    <div class="grid-card timestables-mode-data">
                        <div class="text-holder">
                            <h3 class="font-16 font-weight-bold">
                                <button type="button" class="grid-btn" disabled>
                                    Tournament
                                    <span class="title-label">Coming Soon</span>
                                </button>
                            </h3>
                        </div>
                        <div class="img-holder">
                            <img src="/assets/default/svgs/worldCup-colord.svg" class="img-cover" alt="Preparing for Success: Online Courses for Year 5 Students" title="Preparing for Success: Online Courses for Year 5 Students" itemprop="image" loading="lazy">
                        </div>
                        <p class="text-gray font-14">Play and compete with classmates in exciting challenges.</p>
                    </div>
                    <div class="grid-card timestables-mode-data">
                        <div class="text-holder">
                            <h3 class="font-16 font-weight-bold">
                                <a class="grid-btn" href="javascript:;">Global Arena
                                    <span class="title-label">Coming Soon</span>
                                </a>
                            </h3>
                        </div>
                        <div class="img-holder">
                            <img src="/assets/default/svgs/global-arena.svg" class="img-cover" alt="" aria-hidden="true" title="Engaging Students through Interactive Technologies" itemprop="image" loading="lazy">
                        </div>
                        <p class="text-gray font-14">Connect with individuals worldwide in a Cloud.</p>

                    </div>
                </div>
                <div class="rurera-hide">
                    <div class="preferences panel-border bg-white rounded-sm p-20">
                        <h5 class="font-19 font-weight-bold">Preferences</h5>
                        <h6 class="font-weight-500 mb-20">Lesson experience</h6>
                        <div class="preferences-switch-list">
                            <div class="preferences-switch-box mb-15">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="sound" name="sound">
                                    <label class="custom-control-label" for="sound">Sound effect</label>
                                </div>
                            </div>
                            <div class="preferences-switch-box mb-15">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="disabled" class="custom-control-input" id="animation">
                                    <label class="custom-control-label" for="animation">Animation</label>
                                </div>
                            </div>
                            <div class="preferences-switch-box mb-15">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="disabled" class="custom-control-input" id="motivational">
                                    <label class="custom-control-label" for="motivational">Motivational message</label>
                                </div>
                            </div>
                            <div class="preferences-switch-box mb-15">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="disabled" class="custom-control-input" id="listing">
                                    <label class="custom-control-label" for="listing">Listing exercises</label>
                                </div>
                            </div>
                        </div>
                        <h6 class="font-weight-500 mb-20">Appearance</h6>
                        <div class="preferences-select">
                            <label for="themeSelect" class="font-weight-500 mb-5 d-block">Dark mode</label>
                            <select id="themeSelect" name="theme">
                                <option value="system">System default</option>
                                <option value="light">Light</option>
                                <option value="dark">Dark</option>
                            </select>
                        </div>
                        <h6 class="font-weight-500 mb-20">Japanese</h6>
                        <div class="preferences-switch-box mb-10">
                            <span class="switch-lable">Show pronunciation</span>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" name="disabled" class="custom-control-input" id="pronunciation">
                                <label class="custom-control-label" for="pronunciation"></label>
                            </div>
                        </div>
                        <div class="select-language">
                            <div class="language-box">
                                <input type="radio" name="language" id="language-romanized" value="romanized">
                                <label for="language-romanized">
                                    <span class="country-lable">Romanized</span>
                                </label>
                                <button type="button"
                                        class="info-btn"
                                        data-toggle="modal"
                                        data-target="#exampleModalCenter"
                                        aria-label="Preview Romanized pronunciation">
                                i
                                </button>
                            </div>
                            <div class="language-box">
                                <input type="radio" name="language" id="language-japanese" value="japanese">
                                <label for="language-japanese">
                                    <span class="icon-box"></span>
                                    <span class="country-lable">Japanese</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="timestables-mode-block">
                <div class="timestables-mode-content">

                </div>
            </div>
        </div>
        <div class="show-section-data"></div>
        

    </section>
</main>


@endsection

@push('scripts_bottom')
<script src="/assets/default/vendors/masonry/masonry.pkgd.min.js"></script>
<script src="/assets/default/vendors/apexcharts/apexcharts.min.js"></script>
<script src="/assets/default/vendors/chartjs/chart.min.js"></script>
<script>

    $(document).on('click', '.timestables-back-btn', function (e) {
        $(".timestables-mode-block").slideUp();
        $(".timestables-modes").slideDown();
    });
$(document).on('click', '.ajax-callback', function (e) {
    var thisObj = $(this);
    var thisContent_div = $(".timestables-mode-content");
    var ajax_type = $(this).attr('data-type');
    rurera_loader(thisObj.closest('.timestables-mode-data'), 'div');
    jQuery.ajax({
       type: "GET",
       url: '/timestables/'+ajax_type,
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
       data: {'ajax_type':ajax_type},
       success: function (return_data) {
           thisContent_div.html(return_data);
           //jQuery(".show-section-data").html(return_data);
           $(".timestables-modes").slideUp();
           $(".timestables-mode-block").slideDown();
           rurera_remove_loader(thisObj.closest('.timestables-mode-data'), 'div');
       }
   });
});

$(document).on('click', '.week-selection-btn', function (e) {
    var thisObj = $(this);
    var week_no = $(this).attr('data-week_no');
    var thisContent_div = $(".timestables-mode-content");
    var ajax_type = 'showdown_mode';
    rurera_loader(thisContent_div, 'div');
    jQuery.ajax({
       type: "GET",
       url: '/timestables/'+ajax_type,
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
       data: {'ajax_type':ajax_type, 'weekNumber':week_no},
       success: function (return_data) {
           thisContent_div.html(return_data);
           //jQuery(".show-section-data").html(return_data);
           $(".timestables-modes").slideUp();
           $(".timestables-mode-block").slideDown();
           rurera_remove_loader(thisContent_div, 'div');
       }
   });
});


$(document).on('click', '.type-list li', function (e) {
    $(".type-list li").removeClass('active');
    $(this).addClass('active');
    var data_type = $(this).attr('data-type');
    $(".type-list-data").addClass('rurera-hide');
    $("."+data_type+"-data").removeClass('rurera-hide');

});
$(document).on('click', '.back-btn', function (e) {
    $('.deals-section').addClass("hide-sec");
    $('.challenge-sec').addClass("hide-sec");
    $('.no-challeng-sec').addClass("hide-sec");
    $('.tournament-sec').addClass("hide-sec");
    $('.news-section').removeClass("hide-sec");
    e.preventDefault();
});
</script>

<script>
    $(document).ready(function () {
        if(jQuery('.back-btn').length > 0){
        $('.back-btn').on('click', function(e) {
            $('.deals-section').addClass("hide-sec");
            $('.challenge-sec').addClass("hide-sec");
            $('.no-challeng-sec').addClass("hide-sec");
            $('.tournament-sec').addClass("hide-sec");
            $('.news-section').removeClass("hide-sec");
            e.preventDefault();
        });
        }

        if(jQuery('.template-grid .grid-btn1').length > 0){
        $('.template-grid .grid-btn1').on('click', function(e) {
            $('.news-section').addClass("hide-sec");
            $('.deals-section').removeClass("hide-sec");
            e.preventDefault();
        });

        }
        if(jQuery('.template-grid .challenge-btn').length > 0){
            $('.template-grid .challenge-btn').on('click', function(e) {
                //$('.news-section').addClass("hide-sec");
                $('.deals-section').addClass("hide-sec");
                $('.challenge-sec').addClass("hide-sec");
                $('.no-challeng-sec').removeClass("hide-sec");
                e.preventDefault();
            });
        }
        if(jQuery('.template-grid .assignment-btn').length > 0){
            $('.template-grid .assignment-btn').on('click', function(e) {
                //$('.news-section').addClass("hide-sec");
                $('.deals-section').addClass("hide-sec");
                $('.no-challeng-sec').addClass("hide-sec");
                $('.challenge-sec').removeClass("hide-sec");
                e.preventDefault();
            });
        }
        if(jQuery('.template-grid .tournament-btn').length > 0){
            $('.template-grid .tournament-btn').on('click', function(e) {
                //$('.news-section').addClass("hide-sec");
                $('.deals-section').addClass("hide-sec");
                $('.no-challeng-sec').addClass("hide-sec");
                $('.challenge-sec').addClass("hide-sec");
                $('.tournament-sec').removeClass("hide-sec");
                e.preventDefault();
            });
        }
    });
</script>

<script>
    $( window ).on( "load", function() {
        if(jQuery('.listings-card .swiper-container').length > 0){
        const swiper = new Swiper(".listings-card .swiper-container", {
            slidesPerView: 4,
            spaceBetween: 20,
            observer: true,
            observeParents: true,
            loop: true,
            autoplay: { delay: 5e3, disableOnInteraction: !1 },
            breakpoints: {
              991: {
                slidesPerView: 4,
                spaceBetween: 20
              },
              660: {
                slidesPerView: 1,
                spaceBetween: 0
              },
              480: {
                slidesPerView: 1,
                spaceBetween: 0
              },
              320: {
                slidesPerView: 1,
                spaceBetween: 0
              }
            },
        });
      }
    });
</script>

@endpush

