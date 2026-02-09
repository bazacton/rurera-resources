<div class="rurera-blog blog-medium"  itemscope itemtype="https://schema.org/NewsArticle">
    <div class="blog-grid-detail">
        <span class="badge created-at d-flex align-items-center">
            <i data-feather="calendar" style="height: 20px; width: 20px;" class="mr-5"></i>
            <span  itemprop="datePublished" content="2023-04-05T08:00:00+08:00">{{ dateTimeFormat($post->created_at, 'j M Y') }}</span>
        </span>
        <h3 class="blog-grid-title mt-10 font-16 font-weight-bold" itemprop="headline">
            <a itemprop="url" href="{{ $post->getUrl() }}">{{ $post->title }}</a>
        </h3>
        @php
            $meta_description = explode(',', $post->meta_description);
            if( !empty( $meta_description ) ){

            }
        @endphp
    </div>
    <div class="blog-grid-image">
        <img src="/assets/default/img/buller-img.png" class="img-sm" alt="{{ $post->title }}" title="{{ $post->title }}" width="20" height="21" itemprop="image" loading="eager">
        <img src="{{ $post->image }}" class="img-cover img-lg" alt="{{ $post->title }}" title="{{ $post->title }}" width="20" height="21" itemprop="image" loading="eager">
    </div>

</div>
