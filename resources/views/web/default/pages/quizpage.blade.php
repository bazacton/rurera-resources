@extends(getTemplate().'.layouts.app')

@push('styles_top')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="/assets/vendors/flipbook/css/flipbook.style.css">
<link rel="stylesheet" type="text/css" href="/assets/vendors/flipbook/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="/assets/vendors/flipbook/css/slide-menu.css">
<script src="/assets/vendors/flipbook/js/flipbook.min.js"></script>
<style>nav.navbar, nav.navbar1, footer {
                display: none;
        }</style>

<script type="text/javascript">

    $(document).ready(function () {
        $(".read-quiz-info").flipBook({
            pdfUrl:'store/1/books/2016-Sample-Reading-Booklet.pdf',
            btnZoomIn : {enabled:true},
            btnZoomOut : {enabled:true},
            btnToc : {enabled:false},
            btnShare : {enabled:false},
            btnDownloadPages : {enabled:false},
            btnDownloadPdf : {enabled:false},
            btnSound : {enabled:false},
            btnAutoplay : {enabled:false},
            btnSelect : {enabled:false},
            btnBookmark : {enabled:false},
            btnThumbs : {enabled:false},
            btnPrint : {enabled:false},
            currentPage:{enabled:false},
            // btnNext: {enabled:true, icon: 'fa-long-arrow-right', title: 'Next page'},
            // btnPrev: {enabled:true, icon: 'fa-long-arrow-left', title: 'Previouse page'},

            viewMode:"swipe",
            singlePageMode:true,

            skin:'dark',

            menuMargin:10,
            menuBackground:'none',
            menuShadow:'none',
            menuAlignHorizontal:'right',
            menuOverBook:true,

            btnRadius:40,
            btnMargin:4,
            btnSize:14,
            btnPaddingV:16,
            btnPaddingH:16,
            btnBorder:'2px solid rgba(255,255,255,.7)',
            btnBackground:"rgba(0,0,0,.3)",
            btnColor:'rgb(255,120,60)',

            sideBtnRadius:60,
            sideBtnSize:60,
            sideBtnBackground:"rgba(0,0,0,.7)",
            sideBtnColor:'rgb(255,120,60)',
        });
    });
</script>

@endpush

@section('content')
<section class="content-section">
    <section class="lms-quiz-section">
        <div class="read-quiz-info quiz-show"></div>
        <div class="container-fluid read-quiz-content">
            <section class="quiz-topbar">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-sm-12">
                            <div class="quiz-top-info">
                                <p>Smarter Balanced Grade 8 ELA Practice ( 3/ 25 Questions )</p>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12">
                            <div class="topbar-right">
                                <div class="quiz-pagination">
                                    <div class="swiper-container">
                                        <ul class="swiper-wrapper">
                                            <li class="swiper-slide"><a href="#">1</a></li>
                                            <li class="swiper-slide"><a href="#">2</a></li>
                                            <li class="swiper-slide"><a href="#">3</a></li>
                                            <li class="swiper-slide"><a href="#">4</a></li>
                                            <li class="swiper-slide"><a href="#">5</a></li>
                                            <li class="swiper-slide"><a href="#">6</a></li>
                                            <li class="swiper-slide"><a href="#">7</a></li>
                                            <li class="swiper-slide"><a href="#">8</a></li>
                                            <li class="has-flag swiper-slide"><a href="#"> 9</a></li>
                                            <li class="swiper-slide"><a href="#">10</a></li>
                                            <li class="has-flag swiper-slide"><a href="#">11</a></li>
                                            <li class="swiper-slide"><a href="#">12</a></li>
                                            <li class="swiper-slide"><a href="#">13</a></li>
                                            <li class="swiper-slide"><a href="#">14</a></li>
                                            <li class="swiper-slide"><a href="#">15</a></li>
                                            <li class="swiper-slide"><a href="#">16</a></li>
                                            <li class="swiper-slide"><a href="#">17</a></li>
                                            <li class="swiper-slide"><a href="#">18</a></li>
                                            <li class="swiper-slide"><a href="#">19</a></li>
                                            <li class="has-flag swiper-slide"><a href="#">20</a></li>
                                        </ul>
                                    </div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                                <div class="quiz-timer">
                                    <span class="timer-number">4<em>m</em></span> 
                                    <span
                                        class="timer-number">50<em>s</em>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12 col-sm-12 mt-50">
                    <span class="question-number-holder">
                    <span class="question-number">7</span>
                    <span class="question-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="512.000000pt" height="512.000000pt"
                            viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000"
                                stroke="none">
                                <path
                                    d="M1620 4674 c-46 -20 -77 -50 -103 -99 l-22 -40 -3 -1842 -2 -1843 -134 0 c-120 0 -137 -2 -177 -23 -24 -13 -57 -43 -74 -66 -27 -39 -30 -50 -30 -120 0 -66 4 -83 25 -114 14 -21 43 -50 64 -65 l39 -27 503 0 502 0 44 30 c138 97 118 306 -34 370 -27 11 -73 15 -168 15 l-130 0 0 750 0 750 1318 2 1319 3 40 28 c83 57 118 184 75 267 -10 19 -140 198 -290 398 -170 225 -270 367 -265 375 4 7 128 174 276 372 149 197 276 374 283 392 19 45 17 120 -5 168 -23 51 -79 101 -128 114 -26 7 -459 11 -1330 11 l-1293 0 0 20 c0 58 -56 137 -122 171 -45 23 -128 25 -178 3z"></path>
                            </g>
                        </svg>
                    </span>
                    </span>
                    <span>A family of 2 adults and 3 children went to a movie. the tickets cost $8 for adults and $5 for children. which expression represents the total cost of the tickets?</span>
                    <div class="img-holder text-center mb-50">
                        <figure><img src="../assets/default/img/graph-img.png" alt=""></figure>
                    </div>
                    <div class="mb-50 p-0 text-center">
                        <div class="question-label">
                            <span>Solve the follwing problems. Use pen and paper where required</span></div>
                        <span> <span>1 x 2 x 3</span> <span class="input-holder"> <input type="text"
                            class="editor-field input-simple extra-small"> </span> <span>1 + 2 + 3</span> </span>
                        <span> <span>2 x 2 x 2</span> <span class="input-holder"> <input type="text"
                            class="editor-field input-simple extra-small"> </span> <span>2 + 2 + 2</span> </span>
                        <span> <span>1 x 10 x 10</span> <span class="input-holder"> <input type="text"
                            class="editor-field input-simple extra-small"> </span> <span>1 + 10 + 10</span> </span>
                        <span> <span>0 x 10 x 10</span> <span class="input-holder"> <input type="text"
                            class="editor-field input-simple extra-small"> </span> <span>0 + 10 + 10</span> </span>
                        <span class="marks">1 mark</span>
                    </div>
                    <div class="prev-next-controls text-center mb-50">
                        <a href="#" class="review-btn">
                            Review
                            <img src="/assets/default/svgs/review-btn-flag.svg" width="683" height="683" alt="review-btn-flag">
                        </a>
                        <a href="#" class="prev-btn">
                            <img src="/assets/default/svgs/next-btn.svg" width="683" height="683" alt="next-btn">
                        </a>
                        <a href="#" class="next-btn">
                            Next
                            <img src="/assets/default/svgs/next-btn.svg" width="683" height="683" alt="next-btn">
                        </a>
                    </div>
                    <div class="lms-drwa-lines" id="original" style="display:block;"></div>
                </div>
            </div>
        </div>
    </section>
    <a href="#" class="scroll-btn" style="display: block;">
        <div class="round">
            <div id="cta"><span class="arrow primera next"></span> <span class="arrow segunda next"></span></div>
        </div>
    </a>
</section>

@endsection

@push('scripts_bottom')
<script src="/assets/default/vendors/draw-lines/draw-lines.js"></script>
@endpush
