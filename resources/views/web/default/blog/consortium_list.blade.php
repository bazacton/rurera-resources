<section class="rurera-schools-section" aria-labelledby="consortium-schools-title">
    <h2 id="consortium-schools-title">
        Grammar Schools in Same Consortium
    </h2>

    @if($consortium_schools->count() > 0)
        @foreach($consortium_schools as $consortium_schoolObj)
        <article class="rurera-school-item">
            <div class="rurera-school-content">
                <header class="rurera-school-header">
                    <a href="/blog/{{isset($consortium_schoolObj->schoolBlog->slug)? $consortium_schoolObj->schoolBlog->slug : ''}}" class="font-weight-500">
                        {{$consortium_schoolObj->school_name}}
                    </a>
                </header>
            </div>
        </article>
        @endforeach
    @endif
</section>