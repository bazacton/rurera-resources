@extends(getTemplate().'.layouts.app')

@push('styles_top')
<link rel="stylesheet" href="/assets/default/css/blog.min.css">
@endpush

@section('content')
    <section class="cart-banner position-relative single-post-subheader">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <a href="/blog" itemprop="url" class="post-back-btn font-18 font-weight-normal">Back to blog</a>
                    <h1 class="font-weight-bold my-20">{{ $post->title }}</h1>
                    <div class="post-date">
                        <span class="mt-15 d-block font-16">{{ dateTimeFormat($post->created_at, 'j M Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="mt-15 mb-60 lms-blog blog-single-post">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9 col-md-9">
                    
                    <div class="post-show pb-0 pr-50">
                        <div class="post-image">
                            <img src="{{ $post->image }}" class="img-cover img-lg" alt="{{ $post->title }}" title="{{ $post->title }}" width="20" height="21" itemprop="image" loading="eager">
                        </div>
                        <!-- Share bar -->
                        <div class="sharebar mt-30" role="group" aria-label="Share statistics and actions">
                            <div class="sharebar__stats" aria-label="Engagement stats">
                                <div class="stat">
                                <div class="stat__value stat__value--blue">1.2k</div>
                                <div class="stat__label">SHARES</div>
                                </div>

                                <div class="stat">
                                <div class="stat__value">6.4k</div>
                                <div class="stat__label">VIEWS</div>
                                </div>
                            </div>

                            <div class="sharebar__divider" aria-hidden="true"></div>

                            <a class="btn btn--fb" href="#" aria-label="Share on Facebook">
                                <span class="btn__icon" aria-hidden="true">
                                <!-- Facebook icon (simple) -->
                                <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
                                    <path d="M14 9h3V6h-3c-2.2 0-4 1.8-4 4v2H7v3h3v6h3v-6h3l1-3h-4v-2c0-.6.4-1 1-1Z"/>
                                </svg>
                                </span>
                                <span class="btn__text">Share on Facebook</span>
                            </a>

                            <a class="btn btn--x" href="#" aria-label="Share on Twitter">
                                <span class="btn__icon" aria-hidden="true">
                                <!-- X icon (simple) -->
                                <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
                                    <path d="M18.9 3H21l-6.6 7.6L22 21h-6.2l-4.9-6.1L5.6 21H3l7.1-8.1L2 3h6.3l4.4 5.7L18.9 3Zm-1.1 16h1.7L7.1 4.9H5.3L17.8 19Z"/>
                                </svg>
                                </span>
                                <span class="btn__text">Share on Twitter</span>
                            </a>
                            <div class="share-secondary">
                                <a href="#" class="btn-pinterest"><img src="/assets/default/svgs/envelope2.svg" alt="envelope2"></a>
                                <a href="#" class="btn-whatsapp"><img src="/assets/default/svgs/envelope2.svg" alt="envelope2"></a>
                                <a href="#" class="btn-email"><img src="/assets/default/svgs/envelope2.svg" alt="envelope2"></a>
                            </div>
                            <button class="btn btn--share" type="button" aria-label="More share options">
                                <span class="btn__icon" aria-hidden="true">
                                <!-- Share arrow -->
                                <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
                                    <path d="M14 9V5l7 7-7 7v-4H8a5 5 0 0 1-5-5V8h2v2a3 3 0 0 0 3 3h6V9Z"/>
                                </svg>
                                </span>
                            </button>
                        </div>

                        {!! getBodyContent($post->content) !!}
                    
                    {{-- post Comments --}}
                    @if($post->enable_comment)
                        @include('web.default.includes.comments',[
                            'comments' => $post->comments,
                            'inputName' => 'blog_id',
                            'inputValue' => $post->id
                        ])
                    @endif
                    {{-- ./ post Comments --}}

                    <div class="row mb-15 mt-30">
                        <div class="col-12 col-md-4 col-lg-4 mt-20 mt-lg-0 mb-30">
                            <div class="rurera-blog blog-medium" itemscope="" itemtype="https://schema.org/NewsArticle">
                                <div class="blog-grid-detail">
                                    <span class="badge created-at d-flex align-items-center">
                                    <i data-feather="calendar" style="height: 20px; width: 20px;" class="mr-5"></i>
                                    <span itemprop="datePublished" content="2023-04-05T08:00:00+08:00">19 Sep 2023</span>
                                    </span>
                                    <h2 class="blog-grid-title mt-10 font-16 font-weight-bold" itemprop="headline">
                                        <a href="/blog/personalized-learning-with-educational-technology-a-game-changer-in-education" itemprop="url" class="text-dark">2 Ways to Boost Learning and SATs Success with Rurera</a>
                                    </h2>
                                </div>
                                <div class="blog-grid-image">
                                    <img src="/store/1/default_images/blogs/blog-13.webp" class="img-cover" alt="2 Ways to Boost Learning and SATs Success with Rurera" title="2 Ways to Boost Learning and SATs Success with Rurera" width="1380" height="920" itemprop="image" loading="eager">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4 mt-20 mt-lg-0 mb-30">
                            <div class="rurera-blog blog-medium" itemscope="" itemtype="https://schema.org/NewsArticle">
                                <div class="blog-grid-detail">
                                    <span class="badge created-at d-flex align-items-center">
                                    <i data-feather="calendar" style="height: 20px; width: 20px;" class="mr-5"></i>
                                    <span itemprop="datePublished" content="2023-04-05T08:00:00+08:00">27 Apr 2023</span>
                                    </span>
                                    <h2 class="blog-grid-title mt-10 font-16 font-weight-bold" itemprop="headline">
                                        <a href="/blog/navigating-the-rurera-reward-redemption-process-for-11-exams-and-more" itemprop="url" class="text-dark">Experience realistic 11+ mock exams designed to simulate act</a>
                                    </h2>
                                </div>
                                <div class="blog-grid-image">
                                    <img src="/store/1/default_images/blogs/blog-29.jpg" class="img-cover" alt="Experience realistic 11+ mock exams designed to simulate act" title="Experience realistic 11+ mock exams designed to simulate act" width="370" height="370" itemprop="image" loading="eager">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4 mt-20 mt-lg-0 mb-30">
                            <div class="rurera-blog blog-medium" itemscope="" itemtype="https://schema.org/NewsArticle">
                                <div class="blog-grid-detail">
                                    <span class="badge created-at d-flex align-items-center">
                                        <i data-feather="calendar" style="height: 20px; width: 20px;" class="mr-5"></i>
                                        <span itemprop="datePublished" content="2023-04-05T08:00:00+08:00">28 Apr 2023</span>
                                    </span>
                                    <h2 class="blog-grid-title mt-10 font-16 font-weight-bold" itemprop="headline">
                                        <a href="/blog/elevating-education-exploring-the-future-of-learning-for-year-6-students" itemprop="url" class="text-dark">How to Explore the Future of Learning for Year 6 Students.</a>
                                    </h2>
                                </div>
                                <div class="blog-grid-image">
                                    <img src="/store/1/default_images/blogs/blog-27.jpg" class="img-cover" alt="How to Explore the Future of Learning for Year 6 Students." title="How to Explore the Future of Learning for Year 6 Students." width="370" height="370" itemprop="image" loading="eager">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-post-block mb-50">
                        <div class="post-inner">
                            <ul class="order-list">
                                <li><span>Why everybody needs a brand</span></li>
                                <li><span>Find yor propostion, personality and purpose</span></li>
                                <li><span>Freelancing tips: How you can usebrand propostion</span></li>
                                <li><span>Useful resources for your Freelancing business</span></li>
                                <li><span>Create a brand with value</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog-newsletter text-center py-40">
                        <span class="icon-box">
                            <img src="../assets/default/svgs/envelope-mail-svgrepo-com.svg" alt="envelope image" height="800" width="800">
                        </span>
                        <div class="section-title mb-30">
                            <h2 class="font-40 mb-0">Want more Stuff like this?</h2>
                            <span class="d-block pt-5 font-19">Get the best viral stories straight into your box!</span>
                        </div>
                        <form action="">
                            <div class="form-element">
                                <input type="email" placeholder="Your email address">
                                <button type="submit">Subscribe</button>
                            </div>
                            <span class="d-block text-right font-14 ">Don't worry, we don't spam</span>
                        </form>
                    </div>
                    </div>
                </div>
                @if( !empty( $headings_array ) )
					<div class="col-12 col-lg-3 col-md-3">
						<div class="blog-sidebar">
						   <h2 class="mb-20">Content</h2>
							<div class="single-post-nav mb-30">
								<nav>
									<ul>
										@php $counter = 1; @endphp
										@foreach( $headings_array as $heading_id => $heading_text)
											<li><a href="#{{$heading_id}}" class="{{($counter == 1)? 'current' : ''}}">{{$heading_text}}</a></li>
											@php $counter++; @endphp
										@endforeach
									</ul>
								</nav>
							</div>
                            <div class="share-links">
                                <h2 class="mb-20">Share Article</h2>
                                <ul>
                                    <li><a href="#"><img src="/assets/default/svgs/instagram-blog.svg"  height="150" width="150" alt="instagram"></a></li>
                                    <li><a href="#"><img src="/assets/default/svgs/linkedin-blog.svg"  height="2500" width="2500" alt="linkedin"></a></li>
                                    <li><a href="#"><img src="/assets/default/svgs/tiktok-blog.svg"  height="150" width="150" alt="tiktok"></a></li>
                                </ul>
                            </div>
						</div>
					</div>
				@endif
            </div>
        </div>
    </section>
@endsection

@push('scripts_bottom')
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
@endpush
