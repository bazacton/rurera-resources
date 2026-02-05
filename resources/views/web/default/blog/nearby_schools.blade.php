<div class="rurera-schools-section">
    <div class="rurera-schools-container">
        <div class="rurera-schools-grid">
            <div class="rurera-school-col">

                @if($nearbySchools->count() > 0)
                    @foreach($nearbySchools as $grammerSchoolObj)

                        <div class="rurera-school-item">
                            <div class="rurera-school-icon">
                                <img src="https://rurera.com/assets/default/svgs/blog-schools.svg" height="64" width="64" alt="blog-schools">
                            </div>
                            <div class="rurera-school-content">
                                <div class="rurera-school-header">
                                    <a href="/blog/{{isset($grammerSchoolObj->schoolBlog->slug)? $grammerSchoolObj->schoolBlog->slug : ''}}" class="rurera-school-name" data-e01n2-kon-be-r9ayn1="1">{{$grammerSchoolObj->school_name}}</a>
                                </div>
                                <div class="rurera-school-age">{{round($grammerSchoolObj->distance)}} miles</div>
                            </div>
                        </div>

                    @endforeach
                    <p>These distances are calculated in a straight line. The actual route and distance may vary.</p>
                @endif
            </div>
            <div class="rurera-school-col">


            </div>
        </div>
    </div>
</div>
