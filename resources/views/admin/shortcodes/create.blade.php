@extends('admin.layouts.app')

@push('styles_top')
    <link href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
    <link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
@endpush


@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{!empty($shortCodeObj) ? $shortCodeObj->title: trans('admin/main.new') }} Shortcode
            @if(isset($shortCodeObj->id))
                <div class=copyable-text>[SC_{{$shortCodeObj->shortcode_slug}}]</div>
            @endif
            </h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/admin/">{{ trans('admin/main.dashboard') }}</a>
                </div>
                <div class="breadcrumb-item active"><a href="/admin/shortcodes">Shortcode</a>
                </div>
                <div class="breadcrumb-item">{{!empty($shortCodeObj) ?trans('/admin/main.edit'): trans('admin/main.new') }}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="/admin/shortcodes/{{ !empty($shortCodeObj) ? $shortCodeObj->id.'/store' : 'store' }}"
                                  method="Post" class="glossary_form">
                                {{ csrf_field() }}
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <div class="form-field">
                                                <label for="schoolName">Shortcode Title</label>
                                                <input type="text" name="shortcode_title" value="{{isset($shortCodeObj->id)? $shortCodeObj->shortcode_title : ''}}" class="form-control" id="schoolName" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-field">
                                                <label for="schoolName">Shortcode HTML</label>
                                                <textarea rows="20" name="shortcode_data" class="form-control summernote-editor1" id="school_overview">{{isset($shortCodeObj->id)? $shortCodeObj->shortcode_data : ''}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary mt-3" type="submit">Submit form</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts_bottom')
    <script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>
    <script src="/assets/default/js/admin/filters.min.js"></script>
    <script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
@endpush
