@extends(getTemplate().'.layouts.app')

@push('styles_top')
<link rel="stylesheet" href="/assets/default/css/blog.min.css">
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js" defer></script>
@endpush

@section('content')
<main id="main-content">
    <article class="single-post">
        <header class="position-relative single-post-subheader pt-70 pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-7 col-lg-7">
                        <a href="/blog" class="post-back-btn font-18 font-weight-normal">Back to blog</a>
                        <h1 class="font-weight-bold my-20">{{ $post->title }}</h1>
                        <div class="post-excerpt">
                            {!! getBodyContent($post_description) !!}
                        </div>
                        <div class="post-date rurera-hide">
                            <span class="mt-15 d-block font-16">{{ dateTimeFormat($post->created_at, 'j M Y') }}</span>
                        </div>
                        <!-- Share bar -->
                        <div class="sharebar mb-0 mt-15" role="group">
                            <div class="sharebar__stats font-12" aria-label="Engagement stats">
                                <div class="stat">
                                    <div class="stat__value stat__value--blue font-22">1.2k</div>
                                    <div class="stat__label">SHARES</div>
                                </div>

                                <div class="stat">
                                    <div class="stat__value font-22">6.4k</div>
                                    <div class="stat__label">VIEWS</div>
                                </div>
                            </div>

                            <div class="sharebar__divider" aria-hidden="true"></div>

                            <button type="button" class="btn btn--fb" aria-label="Share on Facebook">
                                <span class="btn__icon" aria-hidden="true" data-network="facebook">
                                    <img src="/assets/default/svgs/facebook2.svg" alt="" aria-hidden="true">
                                </span>
                                <span class="btn__text">Share on Facebook</span>
                            </button>

                            <button type="button" class="btn btn--x" aria-label="Share on Twitter">
                                <span class="btn__icon" aria-hidden="true">
                                    <img src="/assets/default/svgs/twitter-x.svg" alt="" aria-hidden="true">
                                </span>
                                <span class="btn__text">Share on Twitter</span>
                            </button>
                            <div class="share-secondary">
                                <button type="button" class="btn-pinterest" data-network="pinterest" aria-label="Pinterest"><img src="/assets/default/svgs/pinterest.svg" alt="pinterest"></button>
                                <button type="button" class="btn-whatsapp" data-network="whatsapp" aria-label="Whatsapp"><img src="/assets/default/svgs/whatsapp.svg" alt="whatsapp"></button>
                                <button type="button" class="btn-email" data-network="email" aria-label="Email"><img src="/assets/default/svgs/envelope2.svg" alt="envelope2"></button>
                            </div>
                            <button class="btn btn--share" type="button" aria-label="More share options" aria-expanded="false" aria-controls="share-menu">
                                <span class="btn__icon" aria-hidden="true">
                                    <img src="/assets/default/svgs/share2.svg" alt="" aria-hidden="true">
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5 col-md-5 ml-auto">
                        <div class="img-box">
                            <img src="{{ $post->image }}" class="img-cover img-lg" alt="{{ $post->title }}" title="{{ $post->title }}" width="20" height="21" itemprop="image" loading="eager">
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class="mt-15 mb-60 lms-blog blog-single-post mt-80">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-9 col-md-9">
                        <div class="post-show pb-0 pr-30">
                            {!! getBodyContent($post_content) !!}

                        {{-- post Comments --}}
                        @if($post->enable_comment)
                            @include('web.default.includes.comments',[
                                'comments' => $post->comments,
                                'inputName' => 'blog_id',
                                'inputValue' => $post->id
                            ])
                        @endif
                        {{-- ./ post Comments --}}
                        
                        </div>
                    </div>
                    @if( !empty( $headings_array ) )
                        <div class="col-12 col-lg-3 col-md-3">
                            <div class="blog-sidebar">
                            <h2 class="mb-10 font-18 font-weight-bold">Table of content</h2>
                                <div class="single-post-nav mb-0">
                                    <nav>
                                        <ul>
                                            @php $counter = 1; @endphp
                                            @foreach( $headings_array as $heading_id => $heading_text)
                                                <li><a href="#{{$heading_id}}" class="{{($counter == 1)? 'current' : ''}}">{{$thisController->getPostContent($post, $heading_text)}}</a></li>
                                                @php $counter++; @endphp
                                            @endforeach
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row mb-15 mx-0" aria-label="Related posts">
                        <div class="col-12">
                            <div class="section-title mb-15">
                            <h2 class="mb-0 font-22">Related posts</h2>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 col-lg-3 mt-20 mt-lg-0 mb-30">
                            <article class="rurera-blog blog-medium"
                                    itemscope
                                    itemtype="https://schema.org/BlogPosting">

                                <link itemprop="mainEntityOfPage"
                                    href="https://example.com/blog/personalized-learning-with-educational-technology-a-game-changer-in-education">

                                <meta itemprop="datePublished" content="2023-09-19T08:00:00+08:00">
                                <meta itemprop="dateModified" content="2023-09-19T08:00:00+08:00">

                                <div class="blog-grid-detail">
                                <span class="badge created-at d-flex align-items-center">
                                    <i data-feather="calendar" style="height:20px;width:20px;" class="mr-5"></i>
                                    <span>19 Sep 2023</span>
                                </span>

                                <h3 class="blog-grid-title mt-10 font-16 font-weight-bold" itemprop="headline">
                                    <a href="/blog/personalized-learning-with-educational-technology-a-game-changer-in-education"
                                    class="text-dark"
                                    itemprop="url">
                                    2 Ways to Boost Learning and SATs Success with Rurera
                                    </a>
                                </h3>
                                </div>

                                <div class="blog-grid-image">
                                <img
                                    src="/store/1/default_images/blogs/blog-13.webp"
                                    class="img-cover"
                                    alt="2 Ways to Boost Learning and SATs Success with Rurera"
                                    width="1380"
                                    height="920"
                                    loading="lazy"
                                    decoding="async"
                                    itemprop="image"
                                >
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>
</main>

@endsection

@push('scripts_bottom')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvfmDCJkjaybRUJxjDTEw2C-3UOFE3yGo"></script>
<script src="/assets/admin/vendor/bootstrap/bootstrap.min.js"></script>
    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "BlogPosting",
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "{{url('').'/blog/'.$post->slug}}"
        },
        "headline": "{{$post->title}}",
        "description": "{{getBodyContent($post_description)}}",
        "image": "{{ $post->image }}",
        "author": {
            "@type": "Person",
            "name": "{{$post->author->get_full_name()}}",
            "url": "https://rurera.com"
        },
        "publisher": {
            "@type": "Organization",
            "name": "Rurera",
            "logo": {
            "@type": "ImageObject",
            "url": "https://rurera.com"
            }
        },
        "datePublished": "{{dateTimeFormat($post->created_at,'Y-m-d H:i')}}",
        "dateModified": "{{dateTimeFormat($post->updated_at,'Y-m-d H:i')}}"
        }
    </script>
    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            {
            "@type": "Question",
            "name": "What is the Heckmondwike Grammar School 11+ exam, and what does it test?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "The 11+ exam (FSCE) assesses children on English comprehension, vocabulary and spelling, Maths based on KS2 topics, and creative writing. It evaluates understanding, problem-solving, and communication skills rather than memorisation of advanced material."
            }
            },
            {
            "@type": "Question",
            "name": "How do I register my child for the Heckmondwike Grammar School 11+ test?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "You must register your child during the official registration window (typically May-June). Registration is handled independently from the local authority school application. Check the school's website for the registration link and deadlines."
            }
            },
            {
            "@type": "Question",
            "name": "Does passing the 11+ exam guarantee my child a place in Heckmondwike Grammar School?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "No. Passing the test only makes your child eligible to apply. Places are allocated based on oversubscription rules, catchment area, distance from the school, and other priority criteria if more children meet the standard than there are available places."
            }
            },
            {
            "@type": "Question",
            "name": "Does Heckmondwike Grammar School have a catchment area, and does it affect 11+ chances?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Heckmondwike Grammar School may consider catchment as part of admissions, and living within a catchment area can sometimes improve a child's chances. However, offers are typically based primarily on entrance exam scores. Understanding local policies helps parents plan applications effectively."
            }
            },
            {
            "@type": "Question",
            "name": "How can Rurera help with preparation for the 11+ at Heckmondwike Grammar School?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Rurera provides structured study plans, practice papers, and guidance to prepare for the Heckmondwike Grammar School entrance exam. Daily exercises improve comprehension and confidence, helping children approach the 11+ calmly and effectively."
            }
            },
            {
            "@type": "Question",
            "name": "When is the Heckmondwike Grammar School 11+ exam held, and when are results released?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Heckmondwike Grammar School usually holds the 11+ in September, with results announced before secondary school applications close. Exact dates are confirmed on the school website."
            }
            },
            {
            "@type": "Question",
            "name": "What subjects are tested in the Heckmondwike Grammar School entrance exam?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "The entrance exam at Heckmondwike Grammar School includes English, Maths, and reasoning sections. Some schools also assess writing or problem-solving skills. The 11+ is designed to test understanding and application rather than memorisation."
            }
            },
            {
            "@type": "Question",
            "name": "How should my child prepare for the Heckmondwike Grammar School 11+ and entrance exam?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Preparation should include regular mock papers, reading comprehension, and maths revision for the 11+. Balanced routines and rest improve performance. Familiarity with the entrance exam format builds confidence and reduces anxiety."
            }
            },
            {
            "@type": "Question",
            "name": "Can my child retake the entrance exam if they fail the 11+ at Heckmondwike Grammar School?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Most schools, including Heckmondwike Grammar School, do not allow retakes of the 11+ exam in the same academic year. Exceptions may occur for illness or special circumstances. Preparing well in advance helps children give their best in the first attempt."
            }
            },
            {
            "@type": "Question",
            "name": "What score is required to pass the Heckmondwike Grammar School 11+ exam?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "The pass score varies by year and depends on how the test is standardised and how places are allocated. Check the school’s official admissions or 11+ guidance page for the current qualifying score or eligibility threshold."
            }
            }
        ]
        }
        </script>
    <script>
        var webinarDemoLang = '{{ trans('webinars.webinar_demo') }}';
        var replyLang = '{{ trans('panel.reply') }}';
        var closeLang = '{{ trans('public.close') }}';
        var saveLang = '{{ trans('public.save') }}';
        var reportLang = '{{ trans('panel.report') }}';
        var reportSuccessLang = '{{ trans('panel.report_success') }}';
        var messageToReviewerLang = '{{ trans('public.message_to_reviewer') }}';
    </script>

    <script src="/assets/default/js/parts/comment.min.js"></script>
    <script>
        document.querySelectorAll('.btn--share').forEach(btn => {
            btn.addEventListener('click', function () {
            this.closest('.sharebar').classList.toggle('active');
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            document.querySelectorAll('.gs-map').forEach(function (el) {

                const lat = parseFloat(el.dataset.lat);
                const lng = parseFloat(el.dataset.lng);

                const map = new google.maps.Map(el, {
                    center: { lat, lng },
                    zoom: parseInt(el.dataset.zoom),
                    mapTypeId: el.dataset.maptype,
                    zoomControl: el.dataset.controls === 'true',
                    mapTypeControl: false,
                    streetViewControl: false,
                    fullscreenControl: false,
                    scrollwheel: el.dataset.scrollwheel === 'true',
                    draggable: el.dataset.draggable === 'true'
                });

                new google.maps.Marker({
                    position: { lat, lng },
                    map: map
                });

            });

        });
    </script>
@endpush
