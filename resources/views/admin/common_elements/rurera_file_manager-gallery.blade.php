<form name="gallery-area" type="POST" class="gallery-load-form" action="javascript:;">

    @if(isset($gallery_fields) && !empty($gallery_fields))

        @foreach($gallery_fields as $field_name => $field_value)
            <input type="hidden" name="{{$field_name}}" value="{{$field_value}}">
        @endforeach
    @endif


    <div class="d-flex flex-wrap align-items-end" style="gap:10px;">
        <select class="form-control form-control-sm rurera-hide" id="rfpFilterType">
            <option value="all">All</option>
            <option value="image">Images (JPG/SVG)</option>
            <option value="pdf">PDF</option>
            <option value="docx">DOCX</option>
        </select>
        <select class="form-control form-control-sm rurera-hide" id="rfpFilterSort">
            <option value="recent">Most recent</option>
            <option value="name">Name (A–Z)</option>
        </select>
        <div class="col-md-4">
            <div class="form-group">
                <label class="input-label">{{trans('admin/main.category')}}</label>
                <div class="select-holder">
                    <select name="category_id" data-plugin-selectTwo class="form-control populate ajax-category-courses-filter form-control" data-course_id="{{isset($gallery_fields['subject_id'])? $gallery_fields['subject_id'] : 0}}">
                        <option value="0">Select Category</option>
                        @if(isset($categories))
                        @foreach($categories as $category)
                            @if(!empty($category->subCategories) and count($category->subCategories))
                                <optgroup label="{{  $category->title }}">
                                    @foreach($category->subCategories as $subCategory)
                                        <option value="{{ $subCategory->id }}" @if((isset($gallery_fields['category_id'])) && $gallery_fields['category_id'] == $subCategory->id) selected="selected" @endif>{{ $subCategory->title }}</option>
                                    @endforeach
                                </optgroup>
                            @else
                                <option value="{{ $category->id }}" @if((isset($gallery_fields['category_id'])) && $gallery_fields['category_id'] == $category->id) selected="selected" @endif>{{ $category->title }}</option>
                            @endif
                        @endforeach
                        @endif
                    </select>
                </div>

            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Subjects</label>
                <select data-return_type="option"
                        data-default_id="{{request()->get('subject_id')}}" data-chapter_id="{{isset($gallery_fields['chapter_id'])? $gallery_fields['chapter_id'] : 0}}"
                        class="ajax-courses-dropdown-filter year_subjects form-control select2 @error('subject_id') is-invalid @enderror"
                        id="subject_id" name="subject_id">
                    <option disabled selected>Subject</option>
                </select>
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label class="input-label">Topic</label>
                <div class="select-holder">
                    <select data-sub_chapter_id="{{isset($gallery_fields['sub_chapter_id'])? $gallery_fields['sub_chapter_id'] : 0}}" id="chapter_id"
                            class="form-control populate ajax-chapter-dropdown-filter @error('chapter_id') is-invalid @enderror"
                            name="chapter_id">
                        <option value="">Please select year, subject</option>
                    </select>
                </div>


            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label class="input-label">Sub Topic</label>
                <div class="select-holder">
                    <select id="chapter_id"
                            class="form-control populate ajax-subchapter-dropdown-filter @error('sub_chapter_id') is-invalid @enderror"
                            name="sub_chapter_id">
                        <option value="">Please select year, subject, Topic</option>
                    </select>
                </div>

            </div>
        </div>

        <div class="form-group d-flex align-items-center m-0">
            <button type="submit" class="btn btn-primary rounded-pill">{{ trans('public.search') }}</button>
        </div>




        <div class="flex-grow-1"></div>
        <div class="text-muted small">Showing up to <strong>{{isset($MyRecentGalleryImages) ? $MyRecentGalleryImages->count() : 0}}</strong> recent files</div>
    </div>
</form>

<div class="grid-area">
    <div id="rfpGalleryGrid" class="mt-3 rfp-gallery-grid">

        @if(isset($MyRecentGalleryImages) && $MyRecentGalleryImages->count() > 0)
        <h3>My Recent Uploads</h3>

            @foreach($MyRecentGalleryImages as $GalleryImageObj)
                <script>
                    GalleryItems.push({
                        dataUrl: null,
                        displayTitle: "",
                        id: "{{$GalleryImageObj->id}}",
                        kind: "",
                        mime: "",
                        name: "",
                        size: null,
                        thumbUrl: "{{$GalleryImageObj->image_path}}",
                        uploadedAt: Date.now(),
                        url: "{{$GalleryImageObj->image_path}}"
                    });
                </script>
            <div class="rfp-tile" data-item-id="{{$GalleryImageObj->id}}">
                <img src="{{$GalleryImageObj->image_path}}" width="200">
                <div class="rfp-tile-check">✓</div>
                <div class="rfp-tile-label" title="{{$GalleryImageObj->title}}">{{$GalleryImageObj->title}}</div>
            </div>
            @endforeach


        @endif


        @if(isset($GalleryImages) && $GalleryImages->count() > 0)
            <h3>Related Images</h3>

            @foreach($GalleryImages as $GalleryImageObj)
                <script>
                    GalleryItems.push({
                        dataUrl: null,
                        displayTitle: "test111 • 2026-02-03 20:58",
                        id: "{{$GalleryImageObj->id}}",
                        kind: "other",
                        mime: "jpg",
                        name: "test111",
                        size: null,
                        thumbUrl: "{{$GalleryImageObj->image_path}}",
                        uploadedAt: Date.now(),
                        url: "{{$GalleryImageObj->image_path}}"
                    });
                </script>
                <div class="rfp-tile" data-item-id="{{$GalleryImageObj->id}}">
                    <img src="{{$GalleryImageObj->image_path}}" width="200">
                    <div class="rfp-tile-check">✓</div>
                    <div class="rfp-tile-label" title="{{$GalleryImageObj->title}}">{{$GalleryImageObj->title}}</div>
                </div>
            @endforeach


        @endif

    </div>
</div>
<script>
    $(".ajax-category-courses-filter").change();
</script>
