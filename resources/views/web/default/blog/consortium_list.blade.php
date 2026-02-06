<section class="rurera-schools-section" aria-labelledby="nearby-schools-title">
    <h2 id="nearby-schools-title">
        Grammar Schools Near {{$grammerSchoolsObj->school_name}}
    </h2>
    @if($nearbySchools->count() > 0)
        @foreach($nearbySchools as $grammerSchoolObj)
            <article class="rurera-school-item">
                <figure class="rurera-school-icon">
                    <img
                        src="https://rurera.com/assets/default/svgs/blog-schools.svg"
                        height="64"
                        width="64"
                        alt=""
                        loading="lazy"
                    >
                </figure>

                <div class="rurera-school-content">
                    <header class="rurera-school-header">
                        <h3 class="mt-0">
                            <a href="/blog/{{isset($grammerSchoolObj->schoolBlog->slug)? $grammerSchoolObj->schoolBlog->slug : ''}}" class="rurera-school-name">{{$grammerSchoolObj->school_name}}</a>
                        </h3>
                    </header>

                    <p class="rurera-school-age">
                        {{round($grammerSchoolObj->distance)}} miles away
                    </p>
                </div>
            </article>
        @endforeach
        <p class="rurera-school-note">
            These distances are calculated in a straight line.
            The actual route and distance may vary.
        </p>
    @endif
</section>
