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
                        <a href="/blog" class="post-back-btn font-18 font-weight-normal">&larr; Back to blog</a>
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
        <section class="mt-15 mb-60 lms-blog blog-single-post mt-lg-80 mt-md-50 mt-30">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-9 col-md-8">
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
                        <div class="col-12 col-lg-3 col-md-4">
                            <div class="blog-sidebar">
                            <h2 class="mb-10 font-16 font-weight-bold">Table of content</h2>
                                <div class="single-post-nav mb-0">
                                    <nav aria-label="Table of contents">
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
                        <div class="col-12 col-md-3 col-lg-3 mb-30">
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
          "@type": "BreadcrumbList",
          "@id": "{{url('/')}}blog/",
          "name": "{{$post->title}}",
          "itemListElement": [
            {
              "@type": "ListItem",
              "position": 1,
              "name": "Home",
              "item": "{{url('/')}}/"
            },
            {
              "@type": "ListItem",
              "position": 2,
              "name": "Blog",
              "item": "{{url('').'/blog/'}}"
            },
            {
              "@type": "ListItem",
              "position": 3,
              "name": "{{$post->title}}",
              "item": "{{url('').'/blog/'.$post->slug}}"
            }
          ]
        }
    </script>
    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "BlogPosting",
        "@id": "{{url('').'/blog/'.$post->slug}}",
        "name": "{{$post->title}}",
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "{{url('').'/blog/'.$post->slug}}"
        },
        "headline": "{{$post->title}}",
        "description": "{{getBodyContent($post_description)}}",
        "image": "{{ url('/').$post->image }}",
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
