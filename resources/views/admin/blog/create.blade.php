@extends('admin.layouts.app')

@push('styles_top')
    <link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
@endpush

@section('content')
    <section class="section">
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
                                            <div class="col-12 col-md-6">
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
                                            <div class="col-12 col-md-6">
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
                                            <div class="col-12 col-md-6">
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
                                            <div class="col-12 col-md-6">
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
                                            <div class="col-12 col-md-6">
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

                            <div class="list-group" id="ceList" style="max-height: 380px; overflow:auto;"></div>

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
@endpush
