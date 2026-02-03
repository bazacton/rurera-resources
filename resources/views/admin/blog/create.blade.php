@extends('admin.layouts.app')

@push('styles_top')
    <link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">

<style>
    /* Blog Single Post Style Start */
    .sharebar,
    .single-post-block,
    .blog-single-post > p,
    .blog-single-post ul,
    .lms-blog table {
        margin-bottom: 30px;
    }
    .blog-single-post h2,
    .blog-single-post h3,
    .blog-single-post h4 {
        margin-bottom: 10px;
    }
    .blog-single-post > div {
        line-height: 26px;
    }
    .blog-single-post .blog-sidebar {
        position: -webkit-sticky;
        position: sticky;
        top: 100px;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px 15px 15px;
    }
    .single-post-nav ul {
        display: flex;
        flex-direction: column;
        position: relative;
    }
    /* ===== Scrollbar CSS ===== */
    .single-post-nav ul::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.1);
        border-radius: 10px;
        background-color: #F5F5F5;
    }

    .single-post-nav ul::-webkit-scrollbar
    {
        width: 5px;
        background-color: #F5F5F5;
    }

    .single-post-nav ul::-webkit-scrollbar-thumb
    {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.1);
        background-color: #ccc;
    }
    .blog-single-post .single-post-nav li {
        list-style: none;
    }
    .single-post-nav a {
        display: block;
        background-color: #fff;
        color: var(--primary);
        font-size: 14px;
        font-weight: 500;
        position: relative;
        padding: 10px 10px;
    }
    .single-post-nav a.current {
        color: #333;
        background-color: #2962ff1a;
    }
    .single-post-nav a:before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 1px;
        background-color: var(--primary);
        border-radius: 0;
        opacity: 0;
        visibility: hidden;
    }
    .single-post-nav a.current:before {
        opacity: 1;
        visibility: visible;
    }
    .blog-single-post .entry-content > br:first-child {
        display: none;
    }
    .blog-single-post .wp-block-list li a {
        color: var(--primary);
    }
    .single-post-block {
        background-color: #dce2f8;
        padding: 25px;
        border-radius: 5px;
        border: 1px solid #d0d2dd;
    }
    .blog-single-post .order-list {
        gap: 15px;
        display: flex;
        flex-direction: column;
        counter-reset: section;
        margin: 0;
        padding: 0;
    }
    .blog-single-post .single-post-block .order-list li {
        position: relative;
        padding-left: 35px;
        list-style: none;
    }
    .blog-single-post .single-post-block .order-list li:before {
        counter-increment: section;
        position: absolute;
        left: 0;
        top: 50%;
        height: 25px;
        width: 25px;
        background-color: #f8f8fb;
        color: #797770;
        margin-top: -12px;
        border-radius: 100%;
        content: counter(section);
        text-align: center;
        line-height: 25px;
    }
    .blog-single-post .post-back-btn {
        display: inline-block;
        position: relative;
        color: var(--primary);
    }
    .blog-single-post .post-back-btn:before {
        content: "\2190";
        margin-right: 5px;
        display: inline-block;
        color: var(--primary);
    }
    .blog-single-post h3 {
        font-size: 1.5rem;
    }
    .blog-single-post h4 {
        font-size: 1.125rem;
    }
    .blog-single-post li {
        list-style: inherit;
    }
    .blog-single-post ul li {
        list-style: disc;
    }
    .blog-single-post ul {
        display: flex;
        flex-direction: column;
        padding-left: 15px;
        gap: 10px;
    }
    .single-post-subheader {
        background-color: #fafafa;
        min-height: 400px;
        display: flex;
        align-items: center;
    }
    .blog-single-post a {
        color: #007bff;
    }

    /* Social Bar Style Start */
    .sharebar{
        display:flex;
        align-items:stretch;
        gap: 10px;
        width:fit-content;
        border-radius:4px;
        overflow:hidden;
        background:#fff;
    }
    .sharebar__stats{
        display:flex;
        align-items:center;
        padding: 0 15px 0 0;
        gap:18px;
    }
    .stat{
        display:flex;
        flex-direction:column;
        line-height:1.05;
    }
    .stat__value{
        color:#4b4b4b;
    }
    .stat__value--blue{
        color:#2a8bdc;
    }
    .stat__label{
        margin-top:4px;
        color:#9a9a9a;
    }
    .sharebar__divider{
        width: 1px;
        background: #e6e6e6;
        margin-right: 5px;
        transform: rotate(15deg);
    }
    /* Buttons */
    .sharebar .btn{
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        padding: 0 10px;
        min-width: 180px;
        height: 38px;
        border: 0;
        color: #fff;
        user-select: none;
        border-radius: 3px;
    }
    .btn__icon{
        display:inline-flex;
        align-items:center;
        justify-content:center;
    }
    .btn--fb{ background:#3f5e9a; }
    .btn--x { background:#3a3a3a; }
    .sharebar .btn--share{
        min-width: 50px;
        padding: 0;
        background: #dcdcdc;
    }
    .btn--share img {
        filter: invert(100%) sepia(0%) saturate(886%) hue-rotate(83deg) brightness(120%) contrast(100%);
    }
    .btn:hover{ filter:brightness(0.95); }
    .btn:focus-visible{
        outline:3px solid #1a73e8;
        outline-offset:-3px;
    }
    .sharebar .btn img {
        height: 20px;
        width: 20px;
        -webkit-transition: all 0.3s ease-out;
        -moz-transition: all 0.3s ease-out;
        -ms-transition: all 0.3s ease-out;
        -o-transition: all 0.3s ease-out;
        transition: all 0.3s ease-out;
    }
    .sharebar.active .btn--share img {
        transform: scale(-1);
    }
    .btn--fb img {
        filter: invert(100%) sepia(0%) saturate(886%) hue-rotate(83deg) brightness(120%) contrast(100%);
    }
    .share-secondary {
        display: none;
    }
    .active .share-secondary {
        display: inline-flex;
        gap: 10px;
    }
    .share-secondary img {
        height: 20px;
        width: 20px;
        filter: invert(100%) sepia(0%) saturate(886%) hue-rotate(83deg) brightness(120%) contrast(100%);
    }
    .share-secondary a {
        height: 38px;
        width: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 3px;
    }
    .btn-pinterest {
        background-color: #cf2830;
    }
    .btn-whatsapp {
        background-color: #075e54;
    }
    .btn-email {
        background-color: #eb4d3f;
    }
    @media (max-width: 900px){
        .sharebar{ width:100%; }
    }

    /* Single Post Accordions Style Start */
    .blog-single-post {
        color: #404040;
    }
    .blog-single-post .row > [class*="col-"] > .card {
        padding: 15px 10px 0;
    }
    .blog-single-post .form-group:has(.note-editor) {
        max-width: 862px;
        margin: 0 auto;
    }
    .blog-single-post .faq-edit-bar {
        display: none;
    }
    .blog-single-post .accordion .card {
        background-color: #f7f7f7;
        box-shadow: none;
        margin: 0 0 5px;
        border: 0;
        text-align: left;
        padding: 0;
        border-radius: 5px;
        overflow: hidden;
    }
    .blog-single-post .accordion>.card:not(:first-of-type):not(:last-of-type) {
        border-radius: 5px;
    }
    .blog-single-post .card .card-header {
        background-color: inherit;
        text-align: left;
        padding: 0;
        border: 0;
        line-height: normal;
        min-height: auto;
    }
    .blog-single-post .card .card-header h5 {
        width: 100%;
    }
    .blog-single-post .card .card-header .btn-link {
        background-color: inherit;
        padding: 15px;
        height: auto;
        font-weight: 700;
        position: relative;
        text-decoration: none;
        color: #343434;
        font-size: .875rem;
        border: 0;
    }
    .blog-single-post .card-body {
        padding: 0 15px 15px;
    }
    .blog-single-post .card .card-header .btn-link:after {
        position: absolute;
        top: 21px;
        right: 15px;
        height: 8px;
        width: 8px;
        border: 2px solid;
        content: "";
        border-bottom: 0;
        border-right: 0;
        transform: rotate(45deg);
    }
    .blog-single-post .card .card-header .btn-link.collapsed:after {
        transform: rotate(-135deg);
    }
    /* Single Post Accordions Style End */

    /* Table Default Style Start */
    .blog-single-post table {
        color: inherit;
        border: 1px solid #ddd;
        border-radius: 5px;
        border-collapse: separate;
        margin-bottom: 15px;
        width: 100%;
    }
    .blog-single-post thead td,
    .blog-single-post .card table thead td p {
        font-weight: 700;
    }
    .blog-single-post table td {
        border: 0;
        padding: .75rem;
    }
    .blog-single-post table td p {
        margin: 0;
    }
    .blog-single-post tbody tr:nth-child(odd) {
        background-color: #f7f7f7;
    }
    .blog-single-post tbody tr:nth-child(even) {
        background-color: #fff;
    }
    /* Table Default Style End */

    /* Blog Single Post Alert Style Start */
    .blog-single-post .alert {
        display: flex;
        align-items: flex-start;
        flex-wrap: wrap;
        background-color: #fefaf1;
        border-color: #ffebc4;
        border-radius: 5px;
        padding: 25px;
    }
    .blog-single-post .alert .info-icon {
        margin-right: 10px;
        font-size: 1.5rem;
        margin-top: 2px;
    }
    .blog-single-post .alert .text-box {
        width: calc(100% - 50px);
    }
    /* Blog Single Post Alert Style End */

    /* Blog Single Post Style End */
</style>
@endpush

@section('content')
    <section class="section blog-single-post">
        <div class="section-header">
            <h1>{{ trans('admin/main.'.(!empty($post) ? 'edit_blog' : 'create_blog')) }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ getAdminPanelUrl() }}">{{trans('admin/main.dashboard')}}</a>
                </div>
                <div class="breadcrumb-item">{{ trans('admin/main.blog') }}</div>
            </div>
        </div>

        <div class="section-body ">

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">

                        <div class="card-body">

                            <form action="{{ getAdminPanelUrl() }}/blog/{{ (!empty($post) ? $post->id.'/update' : 'store') }}" method="post">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-12 col-md-12">

                                        @if(!empty(getGeneralSettings('content_translate')) and !empty($userLanguages))
                                            <div class="form-group">
                                                <label class="input-label">{{ trans('auth.language') }}</label>
                                                <select name="locale" class="form-control {{ !empty($post) ? 'js-edit-content-locale' : '' }}">
                                                    @foreach($userLanguages as $lang => $language)
                                                        <option value="{{ $lang }}" @if(mb_strtolower(request()->get('locale', app()->getLocale())) == mb_strtolower($lang)) selected @endif>{{ $language }}</option>
                                                    @endforeach
                                                </select>
                                                @error('locale')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        @else
                                            <input type="hidden" name="locale" value="{{ getDefaultLocale() }}">
                                        @endif
                                        <div class="row">
                                            <div class="col-12 col-md-3">
                                                <div class="form-group">
                                                    <label class="input-label d-block">{{ trans('update.author') }}</label>

                                                    <select name="author_id" class="form-control search-user-select2"
                                                            data-placeholder="{{ trans('update.select_a_user') }}"
                                                            data-search-option="except_user"
                                                    >
                                                        @if(!empty($post))
                                                            <option value="{{ $post->author->id }}" selected>{{ $post->author->get_full_name() }}</option>
                                                        @else
                                                            <option selected disabled>{{ trans('update.select_a_user') }}</option>
                                                        @endif
                                                    </select>

                                                    @error('teacher_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <div class="form-group">
                                                    <label>{{ trans('admin/main.title') }}</label>
                                                    <input type="text" name="title"
                                                        class="form-control  @error('title') is-invalid @enderror"
                                                        value="{{ !empty($post) ? $post->title : old('title') }}"
                                                        placeholder="{{ trans('admin/main.choose_title') }}"/>
                                                    @error('title')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <div class="form-group">
                                                    <label>Post URL</label>
                                                    <input type="text" name="slug"
                                                        class="form-control  @error('slug') is-invalid @enderror"
                                                        value="{{ !empty($post) ? $post->slug : old('slug') }}"
                                                        placeholder="Post URL"/>
                                                    @error('slug')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <div class="form-group">
                                                    <label>{{ trans('/admin/main.category') }}</label>
                                                    <div class="select-holder">
                                                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                                            <option {{ !empty($trend) ? '' : 'selected' }} disabled>{{ trans('admin/main.choose_category') }}</option>

                                                            @foreach($categories as $category)
                                                                <option value="{{ $category->id }}" {{ (((!empty($post) and $post->category_id == $category->id) or (old('category_id') == $category->id)) ? 'selected="selected"' : '') }}>{{ $category->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>


                                                    @error('category_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <div class="form-group">
                                                    <label class="input-label">{{ trans('public.cover_image') }}</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <button type="button" class="input-group-text admin-file-manager" data-input="image" data-preview="holder">
                                                                <i class="fa fa-chevron-up"></i>
                                                            </button>
                                                        </div>
                                                        <input type="text" name="image" id="image" value="{{ (!empty($post)) ? $post->image : old('image') }}" class="form-control @error('image') is-invalid @enderror" placeholder="{{ trans('update.blog_cover_image_placeholder') }}"/>
                                                        @error('image')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group custom-switches-stacked flex-row">
                                    <label class="input-label">{{ trans('admin/main.robot') }}:</label>
                                    <label class="custom-switch pl-0">
                                        <label class="custom-switch-description mb-0 mr-2">{{ trans('admin/main.no_follow') }}</label>
                                        <input type="hidden" name="seo_robot_access" value="0">
                                        <input type="checkbox" name="seo_robot_access" id="seo_robot_access" value="1" {{ (!empty($post) and $post->seo_robot_access) ? 'checked="checked"' : '' }} class="custom-switch-input"/>
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description mb-0 cursor-pointer" for="seo_robot_access">{{ trans('admin/main.follow') }}</label>
                                    </label>
                                </div>

                                <div class="form-group custom-switches-stacked flex-row mt-10">
                                       <label class="input-label">Include In XML:</label>
                                       <label class="custom-switch pl-0">
                                           <label class="custom-switch-description mb-0 mr-2">Not Include</label>
                                           <input type="hidden" name="include_xml" value="0">
                                           <input type="checkbox" name="include_xml" id="include_xml" value="1" {{ (!empty($post) and $post->include_xml) ? 'checked="checked"' : '' }} class="custom-switch-input"/>
                                           <span class="custom-switch-indicator"></span>
                                           <label class="custom-switch-description mb-0 cursor-pointer" for="include_xml">Include</label>
                                       </label>
                                   </div>

                                <div class="form-group mt-15 mb-15 d-flex align-items-center cursor-pointer">
                                    <div class="custom-control custom-switch align-items-start">
                                        <input type="checkbox" name="enable_comment" class="custom-control-input" id="commentsSwitch" {{ (!empty($post) and !$post->enable_comment) ? '' : 'checked' }}>
                                        <label class="custom-control-label" for="commentsSwitch"></label>
                                    </div>
                                    <label for="commentsSwitch" class="mb-0">{{ trans('admin/main.comments_section') }}</label>
                                </div>

                                <div class="form-group mt-0 d-flex align-items-center cursor-pointer">
                                    <div class="custom-control custom-switch align-items-start">
                                        <input type="checkbox" name="status" class="custom-control-input" id="statusSwitch" {{ (!empty($post) and $post->status == 'pending') ? '' : 'checked' }}>
                                        <label class="custom-control-label" for="statusSwitch"></label>
                                    </div>
                                    <label for="statusSwitch" class="mb-0">{{ trans('admin/main.publish') }}</label>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-12">
                                        <div class="form-group mt-15">
                                            <label class="input-label">{{ trans('public.description') }}</label>
                                            <div class="text-muted text-small mb-3">{{ trans('admin/main.create_blog_description_hint') }}</div>
                                            <textarea id="summernote" name="description" class="summernote-source form-control @error('description')  is-invalid @enderror" placeholder="{{ trans('admin/main.description_placeholder') }}">{!! !empty($post) ? $post->description : old('description')  !!}</textarea>
                                            @error('description')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mt-15">
                                            <label class="input-label">{{ trans('admin/main.content') }}</label>
                                            <div class="text-muted text-small mb-3">{{ trans('admin/main.create_blog_content_hint') }}</div>
                                            <textarea id="contentSummernote" name="content" class="summernote-source form-control @error('content')  is-invalid @enderror" placeholder="{{ trans('admin/main.content_placeholder') }}">{!! !empty($post) ? $post->content : old('content')  !!}</textarea>
                                            @error('content')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <!-- Blog Stats -->
                                        <h4 class="section-header">Blog Stats</h4>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <label for="shares">Shares</label>
                                                <input type="number" class="form-control" id="shares" placeholder="Number of Shares" required>
                                                <div class="invalid-feedback">Please provide shares count.</div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="views">Views</label>
                                                <input type="number" class="form-control" id="views" placeholder="Number of Views" required>
                                                <div class="invalid-feedback">Please provide views count.</div>
                                            </div>
                                        </div>

                                        <!-- At a glance -->
                                        <h4 class="section-header">At a glance</h4>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <label for="schoolName">School Name</label>
                                                <input type="text" class="form-control" id="schoolName" required>
                                                <div class="invalid-feedback">School Name is required.</div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="localAuthority">Local Authority</label>
                                                <input type="text" class="form-control" id="localAuthority" required>
                                                <div class="invalid-feedback">Local Authority is required.</div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="assessment">Assessment</label>
                                                <input type="text" class="form-control" id="assessment" value="FSCE" readonly>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="feesType">Fees Type</label>
                                                <select class="form-control" id="feesType" required>
                                                    <option value="">Choose...</option>
                                                    <option value="Free">Free</option>
                                                    <option value="Paid">Paid</option>
                                                </select>
                                                <div class="invalid-feedback">Please select fees type.</div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="boarding">Boarding</label>
                                                <select class="form-control" id="boarding" required>
                                                    <option value="">Choose...</option>
                                                    <option value="Day school">Day school</option>
                                                    <option value="Boarding">Boarding</option>
                                                </select>
                                                <div class="invalid-feedback">Please select boarding type.</div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="types">Types</label>
                                                <select class="form-control" id="types" required>
                                                    <option value="">Choose...</option>
                                                    <option value="Mixed Boys and Girls">Mixed Boys and Girls</option>
                                                    <option value="Girls only">Girls only</option>
                                                    <option value="Boys Only">Boys Only</option>
                                                </select>
                                                <div class="invalid-feedback">Please select type.</div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="placesPerYear">Places per year</label>
                                                <input type="number" class="form-control" id="placesPerYear" value="210" required>
                                                <div class="invalid-feedback">Please enter places per year.</div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="ofstedRating">Ofsted Rating</label>
                                                <select class="form-control" id="ofstedRating" required>
                                                    <option value="">Choose...</option>
                                                    <option value="Outstanding">Outstanding</option>
                                                    <option value="Good">Good</option>
                                                    <option value="Requires Improvement">Requires Improvement</option>
                                                </select>
                                                <div class="invalid-feedback">Please select Ofsted rating.</div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="competition">Competition</label>
                                                <input type="text" class="form-control" id="competition" placeholder="e.g. 5-6 applicants per place" required>
                                                <div class="invalid-feedback">Please enter competition details.</div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="examFormat">Exam Format</label>
                                                <input type="text" class="form-control" id="examFormat" placeholder="e.g. GL Assessment 11+" required>
                                                <div class="invalid-feedback">Please enter exam format.</div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="catchmentArea">Catchment area</label>
                                                <select class="form-control" id="catchmentArea" required>
                                                    <option value="">Choose...</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                                <div class="invalid-feedback">Please select catchment area option.</div>
                                            </div>
                                        </div>

                                        <!-- Assessment Criteria -->
                                        <h4 class="section-header">Assessment Criteria</h4>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <label for="english">English</label>
                                                <select class="form-control" id="english" required>
                                                    <option value="">Choose...</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="maths">Maths</label>
                                                <select class="form-control" id="maths" required>
                                                    <option value="">Choose...</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="verbalReasoning">Verbal Reasoning</label>
                                                <select class="form-control" id="verbalReasoning" required>
                                                    <option value="">Choose...</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="nonVerbalReasoning">Non-Verbal Reasoning</label>
                                                <select class="form-control" id="nonVerbalReasoning" required>
                                                    <option value="">Choose...</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="additional">Additional</label>
                                                <select class="form-control" id="additional" required>
                                                    <option value="">Choose...</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Location -->
                                        <h4 class="section-header">Location</h4>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <label for="address">Complete address</label>
                                                <input type="text" class="form-control" id="address" required>
                                                <div class="invalid-feedback">Address is required.</div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <label for="mapLat">Map LAT</label>
                                                <input type="text" class="form-control" id="mapLat" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="mapLog">Map LOG</label>
                                                <input type="text" class="form-control" id="mapLog" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="phone">Phone number</label>
                                                <input type="tel" class="form-control" id="phone" required>
                                                <div class="invalid-feedback">Phone number is required.</div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" required>
                                                <div class="invalid-feedback">Valid email is required.</div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="website">Website link</label>
                                                <input type="url" class="form-control" id="website" required>
                                                <div class="invalid-feedback">Valid website URL is required.</div>
                                            </div>
                                        </div>

                                        <!-- Offset report (Ofsted) -->
                                        <h4 class="section-header">Ofsted Report</h4>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <label for="qualityEducation">The quality of education</label>
                                                <select class="form-control" id="qualityEducation" required>
                                                    <option value="">Choose...</option>
                                                    <option value="Outstanding">Outstanding</option>
                                                    <option value="Good">Good</option>
                                                    <option value="Requires Improvement">Requires Improvement</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="behaviour">Behaviour and attitude</label>
                                                <select class="form-control" id="behaviour" required>
                                                    <option value="">Choose...</option>
                                                    <option value="Outstanding">Outstanding</option>
                                                    <option value="Good">Good</option>
                                                    <option value="Requires Improvement">Requires Improvement</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="personalDev">Personal development</label>
                                                <select class="form-control" id="personalDev" required>
                                                    <option value="">Choose...</option>
                                                    <option value="Outstanding">Outstanding</option>
                                                    <option value="Good">Good</option>
                                                    <option value="Requires Improvement">Requires Improvement</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="leadership">Leadership and management</label>
                                                <select class="form-control" id="leadership" required>
                                                    <option value="">Choose...</option>
                                                    <option value="Outstanding">Outstanding</option>
                                                    <option value="Good">Good</option>
                                                    <option value="Requires Improvement">Requires Improvement</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="sixForm">Six form provision</label>
                                                <select class="form-control" id="sixForm" required>
                                                    <option value="">Choose...</option>
                                                    <option value="Outstanding">Outstanding</option>
                                                    <option value="Good">Good</option>
                                                    <option value="Requires Improvement">Requires Improvement</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="inspectionDate">Inspection date</label>
                                                <input type="date" class="form-control" id="inspectionDate" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="overallRating">Overall rating</label>
                                                <select class="form-control" id="overallRating" required>
                                                    <option value="">Choose...</option>
                                                    <option value="Outstanding">Outstanding</option>
                                                    <option value="Good">Good</option>
                                                    <option value="Requires Improvement">Requires Improvement</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="reportFile">Ofsted report File</label>
                                                <input type="file" class="form-control-file" id="reportFile">
                                            </div>
                                        </div>

                                        <!-- Important Dates -->
                                        <h4 class="section-header">Important Dates</h4>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <label for="regOpen">Registration opens</label>
                                                <input type="date" class="form-control" id="regOpen" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="regClose">Registration Closes</label>
                                                <input type="date" class="form-control" id="regClose" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="examDate">11+ Exam Date</label>
                                                <input type="date" class="form-control" id="examDate" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="resultDate">Results date</label>
                                                <input type="date" class="form-control" id="resultDate" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="resultPublished">Results published</label>
                                                <input type="date" class="form-control" id="resultPublished" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="caafDeadline">CAAF applications deadline</label>
                                                <input type="date" class="form-control" id="caafDeadline" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="offerDay">National offer day</label>
                                                <input type="date" class="form-control" id="offerDay" required>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary mt-3" type="submit">Submit form</button>
                                    </div>
                                </div>
                                

                                <div class="form-group">
                                    <label>SEO Title</label>
                                    <input type="text" name="seo_title"
                                           class="form-control  @error('seo_title') is-invalid @enderror"
                                           value="{{ !empty($post) ? $post->seo_title : old('seo_title') }}"
                                           placeholder="SEO Title"/>
                                    @error('seo_title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                                <div class="form-group mt-15">
                                    <label class="input-label">{{ trans('admin/pages/blog.meta_description') }}</label>
                                    <textarea name="meta_description" rows="5" class="form-control @error('meta_description')  is-invalid @enderror" placeholder="{{ trans('admin/pages/blog.meta_description_placeholder') }}">{!! !empty($post) ? $post->meta_description : old('meta_description')  !!}</textarea>
                                    @error('meta_description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                

                                <button type="submit" class="btn btn-primary mt-1">{{ trans('admin/main.save_change') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- FAQ Builder Modal (Bootstrap 4) -->
    <div class="modal fade" id="faqBuilderModal" tabindex="-1" role="dialog" aria-labelledby="faqBuilderTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="faqBuilderTitle">Insert / Edit FAQs</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label class="font-weight-bold mb-2">Title (optional)</label>
                        <input type="text" class="form-control" id="faqTitleInput" placeholder="Frequently Asked Questions">
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="font-weight-bold mb-0">FAQs</label>
                        <button type="button" class="btn btn-sm btn-primary" id="faqAddRowBtn">+ Add FAQ</button>
                    </div>

                    <div id="faqRows"></div>

                    <small class="text-muted d-block mt-2">
                        Tip: To edit an existing FAQ block, click inside it in the editor and press the FAQs button again.
                    </small>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" id="faqSaveBtn">Insert</button>
                </div>

            </div>
        </div>
    </div>



    <!-- Canned Elements Manager Modal (Bootstrap 4.2) -->
    <div class="canned-templates-content-area rurera-hide">
        @if($cannedTemplates->count() > 0)
            @foreach($cannedTemplates as $cannedTemplateObj)
                <div class="rurera-hide canned-templates-content" data-template_id="{{$cannedTemplateObj->id}}">{!! $cannedTemplateObj->html_content !!}</div>
            @endforeach
        @endif
    </div>
    <div class="modal fade" id="cannedElementsModal" tabindex="-1" role="dialog" aria-labelledby="cannedElementsTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="cannedElementsTitle">Canned Elements</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">

                        <!-- Left: list -->
                        <div class="col-md-4 mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <strong>Saved</strong>
                                <button type="button" class="btn btn-sm btn-primary" id="ceNewBtn">+ New</button>
                            </div>

                            <div class="list-group" id="ceList" style="max-height: 380px; overflow:auto;">
                                @if($cannedTemplates->count() > 0)
                                    @foreach($cannedTemplates as $cannedTemplateObj)
                                        <button type="button" class="list-group-item list-group-item-action ce-item" data-id="{{$cannedTemplateObj->id}}">{{$cannedTemplateObj->title}}</button>
                                    @endforeach
                                @endif


                            </div>

                            <small class="text-muted d-block mt-2">
                                Click an item to edit. Use toolbar dropdown to insert into editor.
                            </small>
                        </div>

                        <!-- Right: editor -->
                        <div class="col-md-8">
                            <input type="hidden" id="ceId">

                            <div class="form-group">
                                <label class="font-weight-bold">Title</label>
                                <input type="text" class="form-control" id="ceTitle" placeholder="e.g., Newsletter Block">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">HTML</label>
                                <textarea class="form-control" id="ceHtml" rows="10" placeholder="<div>...</div>"></textarea>
                                <small class="text-muted">
                                    This HTML will be inserted and remain editable in Summernote.
                                </small>
                            </div>
                            <input type="hidden" name="template_id" class="template_id" value="0">

                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-outline-danger" id="ceDeleteBtn" disabled>Delete</button>
                                <div>
                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success" id="ceSaveBtn">Save</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection

@push('scripts_bottom')
    <script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
    <script>


        var templates_items = {};

        @if($cannedTemplates->count() > 0)
            @foreach($cannedTemplates as $cannedTemplateObj)
            templates_items[{{ $cannedTemplateObj->id }}] = {
                id: {{ $cannedTemplateObj->id }},
                title: @json($cannedTemplateObj->title),
                html_content: @json($cannedTemplateObj->html_content)
            };
        @endforeach
        @endif


        var list_data = '{!! $list_data !!}';
        function reset_templatest_list(){
            //$(".canned-templates-list").html(list_data);
        }
        reset_templatest_list();
    </script>
@endpush
