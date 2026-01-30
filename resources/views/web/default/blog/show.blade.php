@extends(getTemplate().'.layouts.app')

@push('styles_top')
<link rel="stylesheet" href="/assets/default/css/blog.min.css">
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js" defer></script>
@endpush

@section('content')
    <section class="position-relative single-post-subheader py-70">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 col-lg-7">
                    <a href="/blog" itemprop="url" class="post-back-btn font-18 font-weight-normal">Back to blog</a>
                    <h1 class="font-weight-bold my-20">{{ $post->title }}</h1>
                    <div class="post-excerpt">
                        {!! getBodyContent($post->description) !!}
                    </div>
                    <div class="post-date">
                        <span class="mt-15 d-block font-16">{{ dateTimeFormat($post->created_at, 'j M Y') }}</span>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-4 ml-auto">
                    <div class="img-box">
                        <img src="{{ $post->image }}" class="img-cover img-lg" alt="{{ $post->title }}" title="{{ $post->title }}" width="20" height="21" itemprop="image" loading="eager">
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="mt-15 mb-60 lms-blog blog-single-post mt-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9 col-md-9">
                    <div class="post-show pb-0">

                        <!-- ShareThis BEGINS -->
                        <!-- <div class="sharethis-share-buttons" data-type="inline-share-buttons" data-labels="counts" data-show_total="true" data-size="medium">
                            <span data-network="facebook"></span>
                            <span data-network="pinterest"></span>
                            <span data-network="whatsapp"></span>
                            <span data-network="email"></span>
                        </div> -->
                        <!-- ShareThis ENDS -->

                        
                        <!-- Share bar -->
                        <div class="sharebar" role="group">
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

                            <a class="btn btn--fb" href="#" aria-label="Share on Facebook">
                                <span class="btn__icon" aria-hidden="true" data-network="facebook">
                                    <img src="/assets/default/svgs/facebook2.svg" alt="facebook2">
                                </span>
                                <span class="btn__text">Share on Facebook</span>
                            </a>

                            <a class="btn btn--x" href="#" aria-label="Share on Twitter">
                                <span class="btn__icon" aria-hidden="true">
                                    <img src="/assets/default/svgs/twitter-x.svg" alt="twitter-x">
                                </span>
                                <span class="btn__text">Share on Twitter</span>
                            </a>
                            <div class="share-secondary">
                                <a href="#" class="btn-pinterest" data-network="pinterest" aria-label="Pinterest"><img src="/assets/default/svgs/pinterest.svg" alt="pinterest"></a>
                                <a href="#" class="btn-whatsapp" data-network="whatsapp" aria-label="Whatsapp"><img src="/assets/default/svgs/whatsapp.svg" alt="whatsapp"></a>
                                <a href="#" class="btn-email" data-network="email" aria-label="Email"><img src="/assets/default/svgs/envelope2.svg" alt="envelope2"></a>
                            </div>
                            <button class="btn btn--share" type="button" aria-label="More share options">
                                <span class="btn__icon" aria-hidden="true">
                                    <img src="/assets/default/svgs/share2.svg" alt="share2">
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
                        <div class="col-12">
                            <div class="section-title mb-15">
                                <h2 class="mb-0 font-22">Related posts</h2>
                            </div>
                        </div>
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
						   <h2 class="mb-10 font-22">Table of content</h2>
							<div class="single-post-nav mb-0">
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
