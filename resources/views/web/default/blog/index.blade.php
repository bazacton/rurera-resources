
@extends(getTemplate().'.layouts.app')

@push('styles_top')
<link rel="stylesheet" href="/assets/default/css/blog.min.css">
@endpush

@section('content')
<section class="blog-sub-header lms-call-to-action position-relative page-sub-header pt-70 pb-70 overflow-hidden">
        <div class="container">
            <div class="line-shap-holder h-100">
                <div class="line-shap-svg">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="cell-card">
                        <div class="cell-body">
                            <div class="row">
                                <div class="col-12 col-lg-8 col-md-8">
                                    <div class="cell-inner">
                                        <h1 class="font-50 mb-15">Your Guide to <br /> Learning Success</h1>
                                        <p class="mb-0 font-19">Helping parents and students learn and prepare with confidence.</p>
                                        <form class="w-75 mx-auto rurera-hide">
                                            <div class="field-holder has-icon d-flex">
                                                <span class="search-icon">
                                                    <img src="../assets/default/svgs/search.svg" alt="default search" title="default search" width="24" height="24" loading="eager">
                                                </span>
                                                <input class="px-40" type="text" placeholder="What we can help you find ?">
                                                <button type="submit">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="lms-categories-section pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3 col-md-4 col-sm-6">
                    <div class="categories-grid" style="background-color: #abf9ae;">
                        <div class="categories-detail">
                            <h2 class="categories-title" itemprop="headline">
                                <span>For</span>
                                <a itemprop="url" href="/blog">Grammar Schools</a>
                            </h2>
                            <p>Clear guidance on grammar school entry.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-4 col-sm-6">
                    <div class="categories-grid" style="background-color: #69e3fa;">
                        <div class="categories-detail">
                            <h2 class="categories-title" itemprop="headline">
                                <span>For</span>
                                <a itemprop="url" href="/blog">Entrance Exams</a>
                            </h2>
                            <p>Everything you need to know about selective school exams, including the 11+.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-4 col-sm-6">
                    <div class="categories-grid" style="background-color: #a7a5f9;">
                        <div class="categories-detail">
                            <h2 class="categories-title" itemprop="headline">
                                <span>For</span>
                                <a itemprop="url" href="/blog">Parents’ Guides</a>
                            </h2>
                            <p>Practical advice for parents beyond the school syllabus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-4 col-sm-6">
                    <div class="categories-grid" style="background-color: #fbdb62;">
                        <div class="categories-detail">
                            <h2 class="categories-title" itemprop="headline">
                                <span>For</span>
                                <a itemprop="url" href="/blog">Learning</a>
                            </h2>
                            <p>Year-by-year learning support (Year 3–6 and beyond).</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container mt-50 mt-md-50 lms-blog">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="section-title mb-15">
                    <h2 class="mb-0 font-22">Latest posts</h2>
                </div>
            </div>
            <div class="col-12 col-lg-12">
                <div class="row">
                    @foreach($blog as $post)
                        <div class="col-12 col-md-4 col-lg-3 col-sm-6 mb-30">
                            @include('web.default.blog.grid-list',['post' => $post])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{ $blog->appends(request()->input())->links('vendor.pagination.panel') }}

    </section>
    <section class="lms-newsletter blog-newsletter mt-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-12 col-lg-5 col-md-7">
                            <div class="section-title">
                                <h2 class="mb-15 text-white font-40">Ready to start learning <br /> using Rurera</h2>
                                <p class="mb-0 text-white">Determine what skills or knowledge you want to acquire or improve upon selecting the appropriate learning platform.</p>
                            </div>
                        <div class="lms-btn-group mt-30 "><a href="{{url('/')}}/register" class="lms-btn rounded-pill text-white border-white">Signup</a></div>
                        </div>
                        <div class="col-12 col-lg-7 col-md-7">
                            <div class="svg-holder">
                                <span class="icon-svg">
                                    <img class="w-100" src="../assets/default/svgs/blog-newsletter.svg" alt="default newsletter" title="default newsletter" width="689" height="463" loading="eager" />
                                </span>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<!-- <script>
    <script src="https://unpkg.com/opentype.js@latest/dist/opentype.min.js"></script>
document.addEventListener("DOMContentLoaded", function () {

    function convertParagraphsToSVG(fontUrl) {
        opentype.load(fontUrl, function (err, font) {
            if (err) {
                console.error("Font load failed:", err);
                return;
            }

            document.querySelectorAll("p").forEach(p => {

                const text = p.textContent.trim();
                if (!text) return;

                const style = getComputedStyle(p);
                const fontSize = parseFloat(style.fontSize);
                const color = style.color;
                const maxWidth = p.clientWidth;

                const words = text.split(" ");
                let lines = [];
                let currentLine = "";

                // 🔹 Word wrapping logic
                words.forEach(word => {
                    let testLine = currentLine + word + " ";
                    let testPath = font.getPath(testLine, 0, fontSize, fontSize);
                    let testWidth = testPath.getBoundingBox().x2;

                    if (testWidth > maxWidth && currentLine !== "") {
                        lines.push(currentLine);
                        currentLine = word + " ";
                    } else {
                        currentLine = testLine;
                    }
                });
                lines.push(currentLine);

                // 🔹 Create SVG
                const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
                const lineHeight = fontSize * 1.4;
                svg.setAttribute("width", maxWidth);
                svg.setAttribute("height", lines.length * lineHeight);

                let y = fontSize;

                lines.forEach(line => {
                    const path = font.getPath(line, 0, y, fontSize);
                    const pathEl = document.createElementNS("http://www.w3.org/2000/svg", "path");
                    pathEl.setAttribute("d", path.toPathData(2));
                    pathEl.setAttribute("fill", color);
                    svg.appendChild(pathEl);
                    y += lineHeight;
                });

                svg.style.display = "block";
                p.replaceWith(svg);
            });
        });
    }

    // ✅ REAL TTF FONT
    convertParagraphsToSVG(
        "https://fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu4mxP.ttf"
    );

});
</script> -->


