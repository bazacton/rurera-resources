@extends('web.default.panel.layouts.panel_layout')

@push('styles_top')
<style>
    .book-library-sub-header {
        background-color: #333399;
        background-image: linear-gradient(transparent 11px, rgba(255, 255, 255, 0.2) 12px, transparent 12px), linear-gradient(90deg, transparent 11px, rgba(255, 255, 255, 0.2) 12px, transparent 12px);
        background-size: 100% 12px, 12px 100%;
    }

    .lms-books-listing {
        background-color: #f1f1f1;
    }
</style>
@endpush

@section('content')
<section class="lms-books-listing pt-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="books-listing-holder">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="search-block">
                                    <div class="top-search-form">
                                        <div class="search-input bg-white">
                                            <form action="/books" method="get">
                                                <div class="form-group d-flex align-items-center m-0">
                                                    <input type="text" name="search" class="form-control border-0 font-16" value="{{ request()->get('search','') }}" placeholder="Search by Author, Title, or Keyword"/>
                                                    <button type="submit" class="btn btn-primary rounded-pill">{{ trans('home.find') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                                @if( !empty( $books ))
                                @foreach( $books as $book_category => $category_books)
                                <div class="col-lg-12">
                                    <h3 class="mb-10 font-22" itemprop="title">{{$book_category}}</h3>
                                    <span class="mb-35 d-block font-16" itemprop="sub title">For kids ages 0-3</span>
                                </div>
                                @if( !empty( $category_books ))
                                @foreach( $category_books as $bookData)
                                <div class="col-lg-12">
                                    <div class="listing-card">
                                        <div class="row">
                                            <div class="col-12 col-lg-2 col-md-3 col-sm-3">
                                                <div class="img-holder">
                                                    <figure>
                                                        <a href="/books/{{$bookData->book_slug}}" itemprop="url" class="{{ subscriptionCheckLink('bookshelf') }}">
                                                            <img src="{{$bookData->cover_image }}" alt="#" height="182" width="137" itemprop="image"/>
                                                        </a>
                                                    </figure>
                                                </div>
                                            </div>

                                            <div class="col-12 col-lg-6 col-md-5 col-sm-5">
                                                <div class="text-holder">
                                                    <h3 itemprop="title" class="font-18 font-weight-bold mb-5"><a href="/books/{{$bookData->book_slug}}" class="{{ subscriptionCheckLink('bookshelf') }}" itemprop="url">{{$bookData->book_title}}</a>
                                                    </h3>
                                                    <ul itemprop="books info list">
                                                        <li><span itemprop="info text">Reading Level :</span>{{$bookData->reading_level }}</li>
                                                        <li><span itemprop="info text">Interest Area :</span>{{$bookData->interest_area }}</li>
                                                        <li><span itemprop="info text">Pages :</span>{{$bookData->no_of_pages }}</li>
                                                        <li><span itemprop="info text">Points :</span>{{$bookData->reading_points }} <img src="../assets/default/svgs/coin-earn.svg"
                                                                                                                                          itemprop="svg image" width="20" height="24" alt="#"/></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4 col-md-4 col-sm-4">
                                                <div class="btn-holder">
                                                    <a href="/books/{{$bookData->book_slug}}" class="read-btn {{ subscriptionCheckLink('bookshelf') }}" itemprop="url">
                                                        <span class="btn-icon">
                                                            <img src="/assets/default/svgs/book-open.svg" alt="book open">
                                                        </span>
                                                        Read the eBook
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@push('scripts_bottom')
<script src="/assets/default/vendors/masonry/masonry.pkgd.min.js"></script>
@if (!auth()->subscription('bookshelf'))
    <script>
        if( $(".subscription-modal").length > 0){
            $(".subscription-modal").modal('show');
        }
    </script>
@endif
@endpush
