<div class="row mb-15 mx-0">
    <div class="col-12">
        <div class="section-title mb-15">
            <h2 class="mb-0 font-22">Related posts</h2>
        </div>
    </div>
    @if($related_posts->count() > 0)
        @foreach($related_posts as $blogPostObj)

            <div class="col-12 col-md-4 col-lg-4 mt-20 mt-lg-0 mb-30">
                <div class="rurera-blog blog-medium" itemscope="" itemtype="https://schema.org/NewsArticle">
                    <div class="blog-grid-detail">
                                <span class="badge created-at d-flex align-items-center">
                                    <i data-feather="calendar" style="height: 20px; width: 20px;" class="mr-5"></i>
                                    <span itemprop="datePublished" content="{{ dateTimeFormat($blogPostObj->created_at, 'j M Y') }}">{{ dateTimeFormat($blogPostObj->created_at, 'j M Y') }}</span>
                                </span>
                        <h2 class="blog-grid-title mt-10 font-16 font-weight-bold" itemprop="headline">
                            <a href="/blog/{{$blogPostObj->slug}}" itemprop="url" class="text-dark">{{ $blogPostObj->title }}</a>
                        </h2>
                    </div>
                    <div class="blog-grid-image">
                        <img src="{{ $blogPostObj->image }}" class="img-cover" alt="{{ $blogPostObj->title }}" title="{{ $blogPostObj->title }}" width="370" height="370" itemprop="image" loading="eager">
                    </div>
                </div>
            </div>

        @endforeach
    @endif


</div>
