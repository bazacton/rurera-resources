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
<section class="lms-books-listing pt-0">
    <div class="books-listing-holder">
        <div class="row">
            <div class="col-lg-12">
                <div class="search-block">
                    <div class="top-search-form">
                        <div class="search-input bg-white">
                            <form action="/books" method="get">
                                <div class="form-group d-flex align-items-center m-0 rounded-sm">
                                    <input type="text" name="search" class="form-control border-0 font-14" value="{{ request()->get('search','') }}" placeholder="Search by Author, Title, or Keyword"/>
                                    <button type="submit" class="btn btn-primary rounded-pill">{{ trans('home.find') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
             {!! parseShortcode('[SC_books-slider-student]') !!}
            @if( !empty( $books ))
            @foreach( $books as $book_category => $category_books)
            <div class="col-lg-12">
                <div class="section-title mb-15">
                    <h2 class="mb-0 font-22">{{$book_category}}</h2>
                </div>
            </div>
            <div class="col-12">
                <div class="panel-border bg-white rounded-sm px-30 pt-30 mb-30 pb-10">
                    <div class="row">
                        @if( !empty( $category_books ))
                            @foreach( $category_books as $bookData)
                            <div class="col-lg-12">
                                <div class="listing-card">
                                    <div class="row">
                                        <div class="col-12 col-lg-2 col-md-3 col-sm-3">
                                            <div class="img-holder">
                                                <figure>
                                                    <a href="/books/{{$bookData->book_slug}}" class="{{ subscriptionCheckLink('bookshelf') }}">
                                                        <img src="{{$bookData->cover_image }}" alt="{{$bookData->book_title}}" height="182" width="137"/>
                                                    </a>
                                                </figure>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-6 col-md-5 col-sm-5">
                                            <div class="text-holder">
                                                <h3 class="font-16 font-weight-bold text-dark-charcoal mb-5"><a href="/books/{{$bookData->book_slug}}" class="{{ subscriptionCheckLink('bookshelf') }}">{{$bookData->book_title}}</a>
                                                </h3>
                                                <ul class="font-14">
                                                    <li><span>Reading Level :</span>{{$bookData->reading_level }}</li>
                                                    <li><span>Interest Area :</span>{{$bookData->interest_area }}</li>
                                                    <li><span>Pages :</span>{{$bookData->no_of_pages }}</li>
                                                    <li><span>Points :</span>{{$bookData->reading_points }} <img src="/assets/default/svgs/coin-earn.svg" width="18" height="18" alt="coin-earn"/></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 col-md-4 col-sm-4">
                                            <div class="btn-holder">
                                                <a href="/books/{{$bookData->book_slug}}" class="read-btn font-14 {{ subscriptionCheckLink('bookshelf') }}" aria-label="Read the eBook">
                                                    <span class="btn-icon">
                                                        <img src="/assets/default/svgs/book-open.svg" alt="book-open" width="18" height="18">
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

                    </div>
                    
                </div>
            </div>
                @endforeach
            @endif
            
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
        <script>
      var books = [
        { title:"The Psychology of Money", author:"Morgan Housel", rating:4.4, pages:262, lang:"Eng", audio:"2h14m", progress:35, cover:"https://covers.openlibrary.org/b/id/10535506-L.jpg" },
        { title:"Earth: Free Lives", author:"Tere Liye", rating:4.3, pages:320, lang:"Ind", audio:"—", progress:10, cover:"https://covers.openlibrary.org/b/id/12651636-L.jpg" },
        { title:"Filosofi Teras", author:"Henry Manampiring", rating:4.5, pages:304, lang:"Ind", audio:"—", progress:62, cover:"https://covers.openlibrary.org/b/id/10509263-L.jpg" },
        { title:"Sapiens", author:"Yuval Noah Harari", rating:4.6, pages:498, lang:"Eng", audio:"15h17m", progress:12, cover:"https://covers.openlibrary.org/b/id/9255892-L.jpg" },
        { title:"Atomic Habits", author:"James Clear", rating:4.7, pages:320, lang:"Eng", audio:"5h35m", progress:78, cover:"https://covers.openlibrary.org/b/id/9251836-L.jpg" },
        { title:"Man's Search for Meaning", author:"Viktor E. Frankl", rating:4.4, pages:200, lang:"Eng", audio:"4h45m", progress:42, cover:"https://covers.openlibrary.org/b/id/11153219-L.jpg" },
        { title:"Deep Work", author:"Cal Newport", rating:4.3, pages:304, lang:"Eng", audio:"7h45m", progress:22, cover:"https://covers.openlibrary.org/b/id/10535506-L.jpg" },
        { title:"Thinking, Fast and Slow", author:"Daniel Kahneman", rating:4.2, pages:499, lang:"Eng", audio:"20h", progress:18, cover:"https://covers.openlibrary.org/b/id/9255892-L.jpg" },
        { title:"Ikigai", author:"Héctor García", rating:4.1, pages:208, lang:"Eng", audio:"3h10m", progress:55, cover:"https://covers.openlibrary.org/b/id/12651636-L.jpg" },
        { title:"Ego Is the Enemy", author:"Ryan Holiday", rating:4.2, pages:256, lang:"Eng", audio:"6h", progress:9, cover:"https://covers.openlibrary.org/b/id/11153219-L.jpg" }
      ];

      // restore stats section scripts (sparklines)
      function spark(svgId, data, color){
        var svg = document.getElementById(svgId);
        if(!svg) return;
        var w = svg.viewBox.baseVal && svg.viewBox.baseVal.width ? svg.viewBox.baseVal.width : svg.getAttribute('width');
        var h = svg.viewBox.baseVal && svg.viewBox.baseVal.height ? svg.viewBox.baseVal.height : svg.getAttribute('height');
        w = parseFloat(w); h = parseFloat(h);
        var max = Math.max.apply(null, data);
        var min = Math.min.apply(null, data);
        var dx = w/(data.length-1);
        var path = '';
        for(var i=0;i<data.length;i++){
          var x = i*dx;
          var y = h - ((data[i]-min)/(max-min||1))*h;
          path += (i===0?'M':'L')+x+','+y;
        }
        var fill = document.createElementNS('http://www.w3.org/2000/svg','path');
        fill.setAttribute('d', path+' L '+w+','+h+' L 0,'+h+' Z');
        fill.setAttribute('class','fill');
        fill.setAttribute('fill',color);
        var stroke = document.createElementNS('http://www.w3.org/2000/svg','path');
        stroke.setAttribute('d', path);
        stroke.setAttribute('class','stroke');
        stroke.setAttribute('fill','none');
        stroke.setAttribute('stroke',color);
        stroke.setAttribute('stroke-width','2');
        while(svg.firstChild){ svg.removeChild(svg.firstChild); }
        svg.appendChild(fill);
        svg.appendChild(stroke);
      }

      document.querySelectorAll('.stat-card').forEach(function(el, i){
        if(i===0) el.classList.add('green');
        if(i===1) el.classList.add('red');
        if(i===2) el.classList.add('blue');
      });

      var stats = { time:42, books:16, streak:12 };
      document.getElementById('statTime').textContent = stats.time;
      document.getElementById('statBooks').textContent = stats.books;
      document.getElementById('statStreak').textContent = stats.streak;
      spark('sparkTime',[12,18,22,20,26,31,35,30,38,42], '#4caf50');
      spark('sparkBooks',[4,6,8,9,11,12,14,15,16,16], '#f44336');
      spark('sparkStreak',[2,3,4,6,5,7,8,9,11,12], '#2196f3');

      var track = document.getElementById('bookTrack');
      var nextBtn = document.getElementById('btnNext');
      var prevBtn = document.getElementById('btnPrev');
      var dotsEl = document.getElementById('dots');
      var currentIndex = 0;
      var isAnimating = false;
      var targetIndex = null;

      function renderTrack(){
        track.innerHTML = '';
        books.forEach(function(b, idx){
          var card = document.createElement('div');
          card.className = 'book-card';
          card.dataset.index = idx;
          card.innerHTML = '<img alt="'+b.title+' cover" src="'+b.cover+'">';
          card.addEventListener('click', function(){ goTo(idx); });
          track.appendChild(card);
        });
        renderDots();
      }

      function stepWidth(){
        var cards = track.children;
        if(cards.length < 2) return 140;
        return cards[1].offsetLeft - cards[0].offsetLeft;
      }

      function getPadLeft(){
        return parseFloat(window.getComputedStyle(track).paddingLeft) || 0;
      }

      function goTo(i){
        if(i < 0 || i >= books.length) return;
        setActive(i);
        var pad = getPadLeft();
        var card = track.children[i];
        isAnimating = true;
        targetIndex = i;
        track.scrollTo({ left: card.offsetLeft - pad, behavior: 'smooth' });
        currentIndex = i;
      }

      function setActive(i){
        var b = books[i];
        document.getElementById('activeCover').src = b.cover;
        document.getElementById('activeTitle').textContent = b.title;
        document.getElementById('activeAuthor').textContent = b.author;
        document.getElementById('activeRating').textContent = '★ ' + b.rating.toFixed(1);
        document.getElementById('activePages').textContent = b.pages;
        document.getElementById('activeLang').textContent = b.lang;
        document.getElementById('activeAudio').textContent = b.audio;
        document.getElementById('activeProgress').style.width = b.progress + '%';
        Array.prototype.forEach.call(track.children, function(el, idx){
          el.classList.toggle('active', idx === i);
        });
        updateDots(i);
      }

      function updateActiveFromScroll(){
        var idx = leftIndexByRect();
        setActive(idx);
        currentIndex = idx;
        updateArrows();
      }

      nextBtn.addEventListener('click', function(){
        goTo(currentIndex + 1);
      });
      prevBtn.addEventListener('click', function(){
        goTo(currentIndex - 1);
      });
      track.addEventListener('scroll', function(){
        if(isAnimating && targetIndex != null){
          var pad = getPadLeft();
          var card = track.children[targetIndex];
          var goal = card.offsetLeft - pad;
          if(Math.abs(track.scrollLeft - goal) < 2){
            isAnimating = false;
            currentIndex = targetIndex;
            updateArrows();
          }
          return;
        }
        updateActiveFromScroll();
      });
      window.addEventListener('resize', function(){ updateActiveFromScroll(); });

      renderTrack();
      goTo(0);

      function updateArrows(){
        prevBtn.disabled = currentIndex <= 0;
        nextBtn.disabled = currentIndex >= books.length - 1;
      }

      function leftIndexByRect(){
        var tRect = track.getBoundingClientRect();
        var closest = 0;
        var best = Infinity;
        for(var i=0;i<track.children.length;i++){
          var cRect = track.children[i].getBoundingClientRect();
          var delta = Math.abs(cRect.left - tRect.left);
          var bias = (cRect.left >= tRect.left) ? 0 : 1000;
          var score = delta + bias;
          if(score < best){ best = score; closest = i; }
        }
        return closest;
      }
      function renderDots(){
        if(!dotsEl) return;
        dotsEl.innerHTML = '';
        for(var i=0;i<books.length;i++){
          var btn = document.createElement('button');
          btn.className = 'dot';
          (function(index){
            btn.addEventListener('click', function(){ goTo(index); });
          })(i);
          dotsEl.appendChild(btn);
        }
        updateDots(currentIndex);
      }

      function updateDots(i){
        if(!dotsEl) return;
        var children = dotsEl.children;
        for(var k=0;k<children.length;k++){
          children[k].classList.toggle('active', k === i);
        }
      }
    </script>
@endif
@endpush
