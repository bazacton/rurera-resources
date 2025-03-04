@php use App\Models\QuizzesQuestion; $random_id = rand(99, 9999);@endphp
@extends('admin.layouts.app')

@push('libraries_top')

	<link rel="stylesheet" href="/assets/default/css/cropimage.css">
    <link rel="stylesheet" href="/assets/default/css/crop-style.css">
	 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<style>
    .hide {
        display: none;
    }

	.defined-searches {
		background: #efefef;
		padding: 10px;
	}
	.defined-searches .apply-template-field {
		margin-right: 10px;
		display: inline-block;
	}

	.save-template {
		float: right;
	}

.rurera-upload-area {
  text-align: center;
  width: 100%;
  max-width: 100%;
}

.rurera-upload-area #drag-drop-area {
border: 2px dashed #ddd;
  border-radius: 5px;
  padding: 20px;
  background-color: #ffffff;
  cursor: pointer;
  position: relative;
  width: 100%;
  min-height: 200px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.rurera-upload-area #drag-drop-area p {
  margin: 0;
  color: #333;
}

.rurera-upload-area #file-input {
  opacity: 0;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  cursor: pointer;
}

.rurera-upload-area #file-list {
  margin-top: 20px;
  list-style: none;
  padding: 0;
}


.rurera-upload-area .file-name {
  flex: 1;
}

.rurera-upload-area .remove-btn {
  background-color: #ff4d4d;
  color: white;
  border: none;
  border-radius: 3px;
  padding: 5px 10px;
  cursor: pointer;
}

.rurera-upload-area .remove-btn:hover {
  background-color: #e60000;
}

.rurera-upload-area .preview-img {
  width: 50px;
  height: 50px;
  object-fit: cover;
  border-radius: 5px;
  border: 1px solid #ccc;
}

.rurera-upload-area .file-name {
  flex: 1;
}
ul.crop_sizes {
    display: flex;
	margin-bottom: 10px;
}
.crop_sizes li {
    background: #efefef;
    padding: 6px 10px;
    margin: 5px;
    cursor: pointer;
    line-height: normal;
    border-radius: 5px;
}
.crop_sizes li.active {
    color: #fff;
    box-shadow: 0 0 0 1px #007bff inset;
    background: rgb(97, 171, 250);
    background: linear-gradient(0deg, rgba(97, 171, 250, 1) 25%, rgba(0, 123, 255, 1) 100%);
}
.R-cover {
    width: 100%;
    inset: 0px 0px !important;
	background:none;
}
</style>
@endpush


@section('content')
<section class="section">
    <div class="section-header">
        <h1>Gallery Images</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/admin/">{{trans('admin/main.dashboard')}}</a>
            </div>
            <div class="breadcrumb-item">Gallery Images</div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Images Added</h4>
                    </div>
                    <div class="card-body">
                        {{$total_added_images}}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Mohsin Today Count ({{$date_text}})</h4>
                    </div>
                    <div class="card-body">
                        {{$mohsin_today_count}}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Danish Today Count ({{$date_text}})</h4>
                    </div>
                    <div class="card-body">
                        {{$danish_today_count}}
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="section-body">

        <section class="card">
            <div class="card-body">
                <form action="/admin/gallery_images" id="gallery_images_search_form" method="get" class="row mb-0">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="input-label">{{trans('admin/main.category')}}</label>
                            <select name="category_id" data-plugin-selectTwo class="form-control populate ajax-category-courses" data-course_id="{{get_filter_request('subject_id', 'gallery_images_search')}}">
                                <option value="">{{trans('admin/main.all_categories')}}</option>
                                @foreach($categories as $category)
                                @if(!empty($category->subCategories) and count($category->subCategories))
                                <optgroup label="{{  $category->title }}">
                                    @foreach($category->subCategories as $subCategory)
                                    <option value="{{ $subCategory->id }}" @if(get_filter_request('category_id', 'gallery_images_search') == $subCategory->id) selected="selected" @endif>{{ $subCategory->title }}</option>
                                    @endforeach
                                </optgroup>
                                @else
                                <option value="{{ $category->id }}" @if(get_filter_request('category_id', 'gallery_images_search') == $category->id) selected="selected" @endif>{{ $category->title }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>





					<div class="col-md-4">
					<div class="form-group">
						<label>Subjects</label>
						<select data-return_type="option"
								data-default_id="{{request()->get('subject_id')}}" data-chapter_id="{{get_filter_request('chapter_id', 'gallery_images_search')}}"
								class="ajax-courses-dropdown year_subjects form-control select2 @error('subject_id') is-invalid @enderror"
								id="subject_id" name="subject_id">
							<option disabled selected>Subject</option>
						</select>
						@error('subject_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					</div>


					<div class="col-md-4">
					<div class="form-group">
						<label class="input-label">Topic</label>
						<select data-sub_chapter_id="{{get_filter_request('sub_chapter_id', 'gallery_images_search')}}" id="chapter_id"
								class="form-control populate ajax-chapter-dropdown @error('chapter_id') is-invalid @enderror"
								name="chapter_id">
							<option value="">Please select year, subject</option>
						</select>
						@error('chapter_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror

					</div>
					</div>


					<div class="col-md-3">
					<div class="form-group">
						<label class="input-label">Sub Topic</label>
						<select id="chapter_id"
							class="form-control populate ajax-subchapter-dropdown @error('sub_chapter_id') is-invalid @enderror"
							name="sub_chapter_id">
						<option value="">Please select year, subject, Topic</option>
					</select>
					@error('sub_chapter_id')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
					@enderror


					</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="input-label">Status</label>
							<select name="status" data-search-option="status" class="form-control "
									data-placeholder="Search Status">
									<option value="">Select All</option>
									<option value="Pending">Pending</option>
									<option value="Generated">Generated</option>
									<option value="Reset">Removed</option>
                                <option value="Rejected">Rejected</option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="input-label">Author</label>
							<select name="user_id" data-search-option="display_name" class="form-control "
									data-placeholder="Search author">

									<option value="">Select Author</option>
								@if(!empty($users_list) and $users_list->count() > 0)
									@foreach($users_list as $userObj)
										@php $checked = (get_filter_request('user_id', 'gallery_images_search') == $userObj->id)? 'selected' : ''; @endphp
										<option value="{{ $userObj->id }}" {{$checked}}>{{ $userObj->get_full_name() }}</option>
									@endforeach
								@endif
							</select>
						</div>
					</div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label">{{ trans('admin/main.start_date') }}</label>
                            <div class="input-group">
                                <input type="date" id="fsdate" class="text-center form-control" name="from"
                                       value="{{ get_filter_request('from', 'gallery_images_search') }}" placeholder="Start Date">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="input-label">{{ trans('admin/main.end_date') }}</label>
                            <div class="input-group">
                                <input type="date" id="lsdate" class="text-center form-control" name="to"
                                       value="{{ get_filter_request('to', 'gallery_images_search') }}" placeholder="End Date">
                            </div>
                        </div>
                    </div>


                    <div class="col-12 col-md-3 d-flex align-items-center justify-content-end">
                        <button type="submit" class="btn btn-primary w-100">{{ trans('admin/main.show_results') }}</button>

                    </div>
                </form>
            </div>
				@php $saved_templates = $user->saved_templates;
				$saved_templates = json_decode( $saved_templates );
				$saved_templates = isset( $saved_templates->gallery_images_search )? $saved_templates->gallery_images_search : array();
				@endphp
				<div class="defined-searches mt-20">
				<span><strong>Defined Searches:</strong></span>
					@if( !empty( $saved_templates ) )
						@foreach( $saved_templates  as $template_name => $template_data)
							@php $template_array = json_decode($template_data);
							$url_params = '<span>'.$template_name.'</span>';
							if( isset( $template_array->url_params )){
								$url_params = '<a href="'.(string) url("").'/admin/topics_parts/?'.$template_array->url_params.'">'.$template_name.'</a>';
							}
							@endphp
							<span class="apply-template-field" data-form_id="gallery_images_search_form" data-template_type="gallery_images_search" data-template_data="{{$template_data}}"> {!! $url_params !!} <a href="javascript:;" data-template_name="{{$template_name}}" class="remove-template"><i class="fas fa-times"></i></a></span>
						@endforeach
					@endif
					<button type="button" class="btn btn-success save-template" data-form_id="gallery_images_search_form" data-template_type="gallery_images_search" ><i class="fas fa-save"></i> Save Template</button>
				</div>
        </section>

        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">

                    <div class="card-header rurera-hide">
						@can('admin_gallery_images_create')
							<div class="text-right">
                            <a href="javascript:;" class="create-gallery-bulk-list-btn btn btn-primary">Create Gallery Bulk List</a>
                        </div>
							<div class="text-right">
								<a href="/admin/gallery_images/create" class="btn btn-primary">Upload Images</a>
							</div>
						@endcan
                    </div>



                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped font-14">
                                <tr>
									<th class="text-left">&nbsp;</th>
									<th class="text-left">Category</th>
									<th class="text-left">Image Recomendations</th>
									<th class="text-left">Questions</th>
                                    <th class="text-left">Status</th>
                                    <th class="text-left">Reference</th>
                                    <th class="text-left">Added Date</th>
                                    <th class="text-left">User</th>
                                    <th>{{ trans('admin/main.actions') }}</th>
                                </tr>

                                @foreach($GalleryBulkLists as $GalleryBulkListObj)
								@php $questions_ids = isset( $GalleryBulkListObj->questions_ids )? json_decode($GalleryBulkListObj->questions_ids) : array();
                                $galleryImageObj = $GalleryBulkListObj->GalleryBulkListImages->last();
                                $image_reference_url = isset($galleryImageObj->image_reference_url)? $galleryImageObj->image_reference_url : '';
                                @endphp
								@php $image_recomendations = isset( $GalleryBulkListObj->image_recomendations )? json_decode($GalleryBulkListObj->image_recomendations, true) : array();
								$image_recomendations = isset( $image_recomendations['searchable_keywords'] )? array($image_recomendations) : $image_recomendations;
                                $tr_classes = ($GalleryBulkListObj->status == 'Rejected')? 'bg-danger text-white' : '';
								@endphp
                                <tr class="{{$tr_classes}}">
									<td class="text-left" data-id="user">
										@if( $GalleryBulkListObj->image_path != '')
											<img class="image-preview-modal" width="50" src="/assets/default/questions_gallery/{{$GalleryBulkListObj->image_path}}">
                                            {{$galleryImageObj->image_width}} X {{$galleryImageObj->image_height}}
										@else
											-
										@endif
									</td>
									<td data-id="category" class="text-left">{{ (isset($GalleryBulkListObj->category->id))? $GalleryBulkListObj->category->getTitleAttribute() : '-' }}
									<br>
										<small>
										{{ (isset($GalleryBulkListObj->subject->id))? $GalleryBulkListObj->subject->getTitleAttribute() : '-' }} /
										{{ (isset($GalleryBulkListObj->chapter->id))? $GalleryBulkListObj->chapter->getTitleAttribute() : '-' }} /
										{{ (isset($GalleryBulkListObj->subChapter->id))? $GalleryBulkListObj->subChapter->sub_chapter_title : '-' }}
										</small>
									</td>
									<td class="text-left" data-id="user">
										@if(!empty($image_recomendations))
											@foreach($image_recomendations as $image_recomendation_data)
												@php $searchable_keywords = isset( $image_recomendation_data['searchable_keywords'] )? $image_recomendation_data['searchable_keywords'] : '';

													$searchable_keywords = is_array($searchable_keywords)? $searchable_keywords : explode(' ', $searchable_keywords);

												$keywords_list  = '';
												if(!empty($searchable_keywords)){
													foreach($searchable_keywords as $keyword_text){
														$keywords_list .= '<a href="javascrit:;" class="copyable-text">'.$keyword_text.'</a> ';
													}
												}

												$explanation = isset( $image_recomendation_data['explanation'] )? $image_recomendation_data['explanation'] : '';
												@endphp
												Keywords: {!! $keywords_list !!}<br>
												Explanation: {{$explanation}}<br>
											@endforeach
										@endif
										<a href="javascript:;" class="topic_details" data-bulk_id="{{$GalleryBulkListObj->id}}">Details</a><br><br>
										<span class="topic-part-item-details rurera-hide" data-bulk_id="{{$GalleryBulkListObj->id}}">
										@if(isset( $GalleryBulkListObj->topicPartItem->id))
											{!! $GalleryBulkListObj->topicPartItem->description !!}
										@endif
										</span>
									</td>
                                    <td class="text-left" data-id="user">
										@if(!empty($questions_ids))
											@foreach($questions_ids as $question_id)
												<a href="/panel/questions/{{$question_id}}/start" target="_blank">{{$question_id}}</a><br>
											@endforeach
										@endif
									</td>
                                    <td class="text-left" data-id="user">{{ $GalleryBulkListObj->status }}

                                        @if($GalleryBulkListObj->status == 'Rejected')
                                            <br><br>{{$GalleryBulkListObj->rejected_comment}}
                                        @endif

                                    </td>
                                    <td class="text-left" data-id="user">{{ $image_reference_url }}</td>
                                    <td class="text-left" data-id="created_at">
									@if($GalleryBulkListObj->status == 'Pending')
										-
									@else
										{{dateTimeFormat($GalleryBulkListObj->updated_at, 'j M y | H:i')}}
									@endif
									</td>
									<td class="text-left" data-id="created_at">
									@if($GalleryBulkListObj->status == 'Pending')
										-
									@else
										{{$GalleryBulkListObj->updatedUser->get_full_name()}}
									@endif
									</td>
                                    <td data-id="action">

                                        @if($GalleryBulkListObj->status == 'Pending')
											<a href="javascript:;" data-id="{{ $GalleryBulkListObj->id }}" class="upload-image-btn btn-transparent btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="Upload image"><i class="fas fa-upload"></i></a>&nbsp;&nbsp;&nbsp;
										@endif
										@if($GalleryBulkListObj->status == 'Generated' || $GalleryBulkListObj->status == 'Rejected')
											<a href="javascript:;" data-id="{{ $GalleryBulkListObj->id }}" class="upload-image-btn btn-transparent btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="Re-upload image"><i class="fas fa-sync"></i></a>&nbsp;&nbsp;&nbsp;
											<a href="/admin/questions-generator/remove_question_image/{{ $GalleryBulkListObj->id }}" data-id="{{ $GalleryBulkListObj->id }}" class="remove-image-btn btn-transparent btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="Remove image"><i class="fas fa-times"></i></a>&nbsp;&nbsp;&nbsp;
                                            @if($GalleryBulkListObj->status == 'Generated')

                                                @if($user->id == 1325)
                                                        <a href="javascript:;" data-id="{{ $GalleryBulkListObj->id }}" class="reject-btn btn-transparent btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="Reject"><i class="fas fa-ban"></i></a>&nbsp;&nbsp;&nbsp;
                                                @endif
                                            @endif
                                        @endif
@if($GalleryBulkListObj->status == 'Reset')
<a href="javascript:;" data-id="{{ $GalleryBulkListObj->id }}" class="upload-image-btn btn-transparent btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="Re-upload image"><i class="fas fa-sync"></i></a>&nbsp;&nbsp;&nbsp;
@endif


</td>
</tr>
@endforeach

</table>
</div>
</div>

<div class="card-footer text-center">
{{ $GalleryBulkLists->appends(request()->query())->links(); }}
</div>
</div>
</div>
</div>
</div>
</section>

<div class="modal fade" id="imagemodal-list" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-body">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
<img src="" class="imagepreview-list" style="max-width: 460px;">
</div>
</div>
</div>
</div>

<div id="template_save_modal" class="template_save_modal modal fade" role="dialog" data-backdrop="static">
<div class="modal-dialog">
<div class="modal-content edit-quest-modal-div">
<div class="modal-body">
<div class="modal-box">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h3 class="font-20 font-weight-normal mb-10">Save the Template</h3>
<p class="mb-15 font-16">
<input type="text" name="template_name" class="template_name form-control">
</p>
<input type="hidden" name="form_data_encoded" class="form_data_encoded">
<input type="hidden" name="template_type" class="template_type">
<input type="hidden" name="form_id" class="form_id">

<div class="inactivity-controls">
<a href="javascript:;" class="continue-btn save-template-btn button btn btn-primary">Save Template</a>
</div>
</div>
</div>
</div>
</div>
</div>



<div id="gallery_bulk_list" class="gallery_bulk_list modal fade" role="dialog" data-backdrop="static">
<div class="modal-dialog">
<div class="modal-content edit-quest-modal-div">
<div class="modal-body">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<div class="modal-box">
<form action="/admin/gallery_images/gallery-bulk-list" method="POST" id="gallery-bulk-list-form" class="px-25 gallery-bulk-list-form">
@csrf

<div class="row">
<div class="col-md-12 col-lg-12">
<div class="row">
<div class="col-md-12 col-lg-12">
<h2 class="font-20 font-weight-bold mb-15">Generate Bulk Images List</h2>
</div>
<div class="col-md-12 col-lg-12 conditional-child-fields Course-fields">
<div class="form-group">
<label class="input-label">{{trans('admin/main.category')}}</label>
<select name="category_id" data-plugin-selectTwo class="rurera-req-field form-control populate ajax-category-courses" data-course_id="" data-next_index="subject_id" data-next_value="">
<option value="">{{trans('admin/main.all_categories')}}</option>
@foreach($categories as $category)
@if(!empty($category->subCategories) and count($category->subCategories))
<optgroup label="{{  $category->title }}">
@foreach($category->subCategories as $subCategory)
<option value="{{ $subCategory->id }}">{{ $subCategory->title }}</option>
@endforeach
</optgroup>
@else
<option value="{{ $category->id }}">{{ $category->title }}</option>
@endif
@endforeach
</select>
</div>
</div>
<div class="col-md-12 col-lg-12 conditional-child-fields Course-fields">
<div class="form-group">
<label class="input-label">Subjects</label>
<select data-chapter_id="" id="subject_id"
class="rurera-req-field form-control populate ajax-courses-dropdown year_subjects @error('subject_id') is-invalid @enderror"
name="subject_id" data-next_index="chapter_id" data-next_value="">
<option value="">Please select year, subject</option>
</select>
@error('subject_id')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror

</div>
</div>
<div class="col-md-12 col-lg-12 conditional-child-fields course-fields">
<div class="form-group">
<label class="input-label">Topic</label>
<select data-sub_chapter_id="" id="chapter_id"
class="rurera-req-field form-control populate ajax-chapter-dropdown @error('chapter_id') is-invalid @enderror"
name="chapter_id" data-disabled="{{isset($already_created_bulk_lists)? json_encode($already_created_bulk_lists) : ''}}" data-next_index="sub_chapter_id" data-next_value="">
<option value="">Please select year, subject</option>
</select>
@error('chapter_id')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror

</div>
</div>
<div class="col-md-12 col-lg-12 conditional-child-fields course-fields">
<div class="form-group">
<label class="input-label">Sub Topic</label>
<select id="sub_chapter_id"
class="rurera-req-field form-control populate ajax-subchapter-dropdown @error('sub_chapter_id') is-invalid @enderror"
name="sub_chapter_id" data-next_index="topic_part" data-next_value="">
<option value="">Please select year, subject, Topic</option>
</select>
@error('sub_chapter_id')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror

</div>
</div>

</div>
</div>
</div>
<div class="inactivity-controls">
<button type="submit" class="submit-btn mt-0">Generate List</button>
<!-- <a href="javascript:;" class="close" data-dismiss="modal" aria-label="Continue">Close</a> -->
</div>
</form>
</div>
</div>
</div>
</div>
</div>


<div id="upload_image_area" class="upload_image_area modal fade" role="dialog" data-backdrop="static">
<div class="modal-dialog modal-lg" style="max-width:100%;">
<div class="modal-content edit-quest-modal-div">
<div class="modal-body">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<div class="modal-box">
<form action="/admin/questions-generator/apply_template" method="POST" id="upload_image_area_form" class="px-25 upload_image_area_form" enctype="multipart/form-data">
@csrf

<input type="hidden" name="bulk_list_id" class="bulk_list_id" value="0">

<div class="image-upload-block">
<div class="row">
<div class="col-md-12 col-lg-12s">
<div class="row">
<div class="col-md-12 col-lg-12">
<h2 class="font-20 font-weight-bold mb-15">Image Upload</h2>
</div>
<div class="col-12 col-md-12 col-lg-12">
<input type="hidden" name="crop_size" class="crop_size">
<ul class="crop_sizes">
@php $sizes_references = sizes_references(); $size_count = 1;@endphp
@if(!empty( $sizes_references ))
@foreach( $sizes_references as $size_reference_index => $size_reference_data)
@php $size_reference_label = isset( $size_reference_data['label'] )? $size_reference_data['label'] : '';
$size_reference_width = isset( $size_reference_data['width'] )? $size_reference_data['width'] : '';
$size_reference_height = isset( $size_reference_data['height'] )? $size_reference_data['height'] : '';
@endphp
<li data-size_class="{{$size_reference_index}}" data-crop_size_width="{{$size_reference_width}}" data-crop_size_height="{{$size_reference_height}}" class="{{($size_count == 1)? 'active' : ''}}">{{$size_reference_label}}</li>
@php $size_count++ @endphp
@endforeach
@endif
</ul>
<div id="upload-container" class="rurera-upload-area">
<div id="drag-drop-area">
<p>Drag & Drop your files here or click to upload</p>
<input type="file" id="file-input">
</div>
<ul id="file-list"></ul>
</div>
</div>
<div class="col-12 col-md-12 col-lg-12 img-contaner w-100 image-crop-area"></div>
<div class="col-12 col-md-12 col-lg-12  preview-cropped-img"></div>

<div class="col-12 col-md-12 col-lg-12">
<div class="form-group">
<label class="input-label">Image Reference Text</label>
<input type="text" name="image_reference_url" id="image_reference_url"
class="rurera-req-field form-control ">
</div>
</div>

</div>
</div>
</div>
<div class="inactivity-controls">
<button type="button" class="btn btn-primary crop-it mt-0">Crop</button>
<button type="submit" class="btn btn-primary crop-image-next-btn rurera-hide mt-0">Next</button>
<!-- <a href="javascript:;" class="close" data-dismiss="modal" aria-label="Continue">Close</a> -->
</div>

</div>
<div class="template-selection rurera-hide">
<div class="example-selected-questions"></div>
<div class="row">
<div class="col-md-12 col-lg-12">
<button type="button" class="btn btn-primary crop-image-back-btn mt-0">Back</button>
</div>
<div class="col-12">
<ul class="col-10 col-md-10 col-lg-10 admin-rurera-tabs nav nav-pills" id="assignment_tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="section-tabid-Emerging" data-toggle="tab" href="#section-tab-Emerging" role="tab"
           aria-controls="section-tab-Emerging" aria-selected="true"><span class="tab-title">Emerging</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="section-tabid-Expected" data-toggle="tab" href="#section-tab-Expected" role="tab"
           aria-controls="section-tab-Expected" aria-selected="true"><span class="tab-title">Expected</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="section-tabid-Exceeding" data-toggle="tab" href="#section-tab-Exceeding" role="tab"
           aria-controls="section-tab-Exceeding" aria-selected="true"><span class="tab-title">Exceeding</span></a>
    </li>
</ul>

<div class="tab-content" id="myTabContent2">
    <div class="tab-pane mt-3 fade in active show difficulty_levels" id="section-tab-Emerging" role="tabpanel" aria-labelledby="section-tab-Emerging-tab">
        <div class="row">
            @if($emerging_example_questions->count() > 0)
                @php $counter = 1; @endphp
                @foreach($emerging_example_questions as $exampleQuestionObj)
                    @php $class = ($exampleQuestionObj->is_shortlisted == 1)? 'shortlisted' : ''; @endphp
                    @php $sizes_reference = json_decode($exampleQuestionObj->sizes_reference);
                    $sizes_reference_classes = is_array($sizes_reference)? implode(' ', $sizes_reference) : '';
                    @endphp
                    <div class="col-12 col-lg-4 col-md-6 {{$sizes_reference_classes}} {{$class}} template-item templates-list-{{$exampleQuestionObj->question_type}}">
                        <div class="template-box">
                            <div class="rating-stars">
                                <div class="rating-box">
                                    <input type="checkbox" id="star-one">
                                    <label for="star-one">
                                        <i class="fas fa-star"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="card-icon pop">
                                <img src="{{$exampleQuestionObj->example_thumbnail}}">
                            </div>
                            <div class="template-controls">
                                <button type="button" class="preview-template-btn">Preview template (#{{$exampleQuestionObj->id}}) ({{$exampleQuestionObj->question_difficulty_level}})
                                </button>
                                <button type="button" class="template-btn" data-template_image="{{$exampleQuestionObj->example_thumbnail}}" data-template_name="{{$exampleQuestionObj->getTitleAttribute()}}" data-template_id="{{$exampleQuestionObj->id}}">Select Template</button>
                            </div>
                            <div class="template-data-info">
                                <span>{{$exampleQuestionObj->search_tags}}</span>
                            </div>
                        </div>
                    </div>
                @php $counter++; @endphp
                @endforeach
            @endif
        </div>
    </div>

    <div class="tab-pane mt-3 fade difficulty_levels" id="section-tab-Expected" role="tabpanel" aria-labelledby="section-tab-Expected-tab">
       <div class="row">
            @if($expected_example_questions->count() > 0)
                @php $counter = 1; @endphp
                @foreach($expected_example_questions as $exampleQuestionObj)
                @php $class = ($exampleQuestionObj->is_shortlisted == 1)? 'shortlisted' : ''; @endphp
                @php $sizes_reference = json_decode($exampleQuestionObj->sizes_reference);
                    $sizes_reference_classes = is_array($sizes_reference)? implode(' ', $sizes_reference) : '';
                    @endphp
                    <div class="col-12 col-lg-4 col-md-6 {{$sizes_reference_classes}} {{$class}} template-item templates-list-{{$exampleQuestionObj->question_type}}">
                        <div class="template-box">
                            <div class="rating-stars">
                                <div class="rating-box">
                                    <input type="checkbox" id="star-one">
                                    <label for="star-one">
                                        <i class="fas fa-star"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="card-icon pop">
                                <img src="{{$exampleQuestionObj->example_thumbnail}}">
                            </div>
                            <div class="template-controls">
                                <button type="button" class="preview-template-btn">Preview template (#{{$exampleQuestionObj->id}}) ({{$exampleQuestionObj->question_difficulty_level}})
                                </button>
                                <button type="button" class="template-btn" data-template_image="{{$exampleQuestionObj->example_thumbnail}}" data-template_name="{{$exampleQuestionObj->getTitleAttribute()}}" data-template_id="{{$exampleQuestionObj->id}}">Select Template</button>
                            </div>
                            <div class="template-data-info">
                                <span>{{$exampleQuestionObj->search_tags}}</span>
                            </div>
                        </div>
                    </div>
                @php $counter++; @endphp
                @endforeach
            @endif
        </div>
    </div>

    <div class="tab-pane mt-3 fade difficulty_levels" id="section-tab-Exceeding" role="tabpanel" aria-labelledby="section-tab-Exceeding-tab">
       <div class="row">
            @if($exceeding_example_questions->count() > 0)
                @php $counter = 1; @endphp
                @foreach($exceeding_example_questions as $exampleQuestionObj)
                @php $class = ($exampleQuestionObj->is_shortlisted == 1)? 'shortlisted' : ''; @endphp
                @php $sizes_reference = json_decode($exampleQuestionObj->sizes_reference);
                    $sizes_reference_classes = is_array($sizes_reference)? implode(' ', $sizes_reference) : '';
                    @endphp
                    <div class="col-12 col-lg-4 col-md-6 {{$sizes_reference_classes}} {{$class}} template-item templates-list-{{$exampleQuestionObj->question_type}}">
                        <div class="template-box">
                            <div class="rating-stars">
                                <div class="rating-box">
                                    <input type="checkbox" id="star-one">
                                    <label for="star-one">
                                        <i class="fas fa-star"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="card-icon pop">
                                <img src="{{$exampleQuestionObj->example_thumbnail}}">
                            </div>
                            <div class="template-controls">
                                <button type="button" class="preview-template-btn">Preview template (#{{$exampleQuestionObj->id}}) ({{$exampleQuestionObj->question_difficulty_level}})
                                </button>
                                <button type="button" class="template-btn" data-template_image="{{$exampleQuestionObj->example_thumbnail}}" data-template_name="{{$exampleQuestionObj->getTitleAttribute()}}" data-template_id="{{$exampleQuestionObj->id}}">Select Template</button>
                            </div>
                            <div class="template-data-info">
                                <span>{{$exampleQuestionObj->search_tags}}</span>
                            </div>
                        </div>
                    </div>
                @php $counter++; @endphp
                @endforeach
            @endif
        </div>
    </div>

</div>
</div>



<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <img src="" class="imagepreview">
        </div>
    </div>
</div>
</div>
<div class="col-md-12 col-lg-12">
<button type="submit" class="btn btn-primary apply-template-btn1 mt-0">Apply Template</button>
</div>
</div>
</div>

</form>
</div>
</div>
</div>
</div>
</div>

<div class="modal fade" id="topic-part-details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-body">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
<div class="topic-part-details copyable-text">
</div>
</div>
</div>
</div>
</div>

<div class="modal fade reject-comment-block" id="reject-comment-block" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-body">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

<form action="/admin/gallery_images/reject-gallery" method="POST" id="upload_image_area_form" class="px-25 upload_image_area_form" enctype="multipart/form-data">
@csrf

<input type="hidden" name="bulk_list_id" class="bulk_list_id" value="0">

<div class="image-upload-block">
<div class="row">
<div class="col-md-12 col-lg-12s">

<div class="form-group mt-15">
<label class="input-label">Reject Comment</label>
<textarea name="reject-comment" rows="10" class="form-control reject-comment" placeholder="Reject Comment"></textarea>

</div>


</div>
<div class="col-12 col-md-3 d-flex align-items-center justify-content-end">
<button type="submit" class="reject-btn-submit btn btn-primary w-100">Submit</button>
</div>
</div>
</div>
</form>



</div>
</div>
</div>
</div>
@endsection

@push('scripts_bottom')

<script src="/assets/default/js/admin/cropimage.js?ver={{$random_id}}"></script>
<script src="/assets/default/js/admin/crop-script.js?ver={{$random_id}}"></script>



<script type="text/javascript">


$(document).on('click', '.topic_details', function () {
var bulk_id = $(this).attr('data-bulk_id');
var part_item_details = $('.topic-part-item-details[data-bulk_id="'+bulk_id+'"]').html();
$(".topic-part-details").html(part_item_details);
$("#topic-part-details").modal('show');

});
$(document).on('click', '.apply-template-btn', function () {
var formData = new FormData($('#upload_image_area_form')[0]);
var loaderDiv = $(".submit-btn");
//rurera_loader(loaderDiv, 'button');
$.ajax({
type: "POST",
dataType: "json",
url: '/admin/questions-generator/apply_template',
data: formData,
processData: false,
contentType: false,
success: function (return_data) {
console.log(return_data);
$("."+return_data.response_class).html(return_data.response_msg);

}
});
});
$(document).on('click', '.crop-image-next-btn', function () {
if($("#image_reference_url").val() == ''){
alert('Please Provide the Reference Text');
return false;
}
if($(".dynaCanvas").length < 1){
alert('Please upload image first');
return false;
}
});
$(document).on('click', '.crop-image-back-btn', function () {
$(".preview-cropped-img").html("");
$(".image-upload-block").removeClass('rurera-hide');
$(".template-selection").addClass('rurera-hide');
});


$(document).on('click', '.template-btn', function () {
var template_image = $(this).attr('data-template_image');
var template_name = $(this).attr('data-template_name');
var template_id = $(this).attr('data-template_id');
if($('[name="example_question_id[]"][value="'+template_id+'"]').length > 0){
$('[name="example_question_id[]"][value="'+template_id+'"]').remove();
$(this).closest('.template-item').removeClass('active');
}else{
$(this).closest('.difficulty_levels').find('.template-btn').each(function () {
var template_id_selected = $(this).attr('data-template_id');
if($('[name="example_question_id[]"][value="'+template_id_selected+'"]').length > 0){
$('[name="example_question_id[]"][value="'+template_id_selected+'"]').remove();
$(this).closest('.template-item').removeClass('active');
}
});
$(".example-selected-questions").append('<input type="hidden" name="example_question_id[]" class="example_question_id" value="'+template_id+'">');
$(this).closest('.template-item').addClass('active');
}
});


$(document).ready(function () {
const dragDropArea = $("#drag-drop-area");
const fileInput = $("#file-input");
const fileList = $("#file-list");
const cropBTN = $(".crop-btn");

// Allowed settings
const allowedTypes = ["image/jpeg", "image/png", "application/pdf"];
const maxSizeMB = 5; // Maximum size in MB
const maxDimensions = { width: 1920, height: 1080 }; // Maximum dimensions in px

// Files array
let uploadedFiles = [];

// Open file picker on click
dragDropArea.on("click", function () {
fileInput.click();
});

// Handle file selection
fileInput.on("change", function (event) {
handleFiles(event.target.files);
console.log('cropbtnksdfsdfsdf');
$(".crop-btn").click();
});

// Drag events
dragDropArea.on("dragover", function (event) {
event.preventDefault();
event.stopPropagation();
dragDropArea.addClass("dragging");
});

dragDropArea.on("dragleave", function (event) {
event.preventDefault();
event.stopPropagation();
dragDropArea.removeClass("dragging");
});

dragDropArea.on("drop", function (event) {
event.preventDefault();
event.stopPropagation();
dragDropArea.removeClass("dragging");
const files = event.originalEvent.dataTransfer.files;
handleFiles(files);
console.log('cropbtnksdfsdfsdf');
});

function handleFiles(files) {
for (let i = 0; i < 1; i++) {
const file = files[i];

if (!allowedTypes.includes(file.type)) {
alert(`File "${file.name}" is not an allowed type.`);
continue;
}

if (file.size > maxSizeMB * 1024 * 1024) {
alert(`File "${file.name}" exceeds the size limit of ${maxSizeMB} MB.`);
continue;
}

if (file.type.startsWith("image/")) {
validateImageDimensions(file, (isValid, error) => {
if (isValid) {
addFile(file);

} else {
alert(`File "${file.name}" ${error}`);
}
});
} else {
addFile(file); // Non-image files are added directly

}
}

}

function validateImageDimensions(file, callback) {
const img = new Image();
const url = URL.createObjectURL(file);
img.onload = function () {
callback(true);
URL.revokeObjectURL(url);
};
img.onerror = function () {
callback(false, "is not a valid image file.");
URL.revokeObjectURL(url);
};
img.src = url;
}

function addFile(file) {
if (!uploadedFiles.some((f) => f.name === file.name)) {
uploadedFiles.push(file);
renderFile(file);
} else {
alert(`File "${file.name}" is already added.`);
}
}

function renderFile(file) {
const li = $('<li></li>');

var randomId = Math.floor(Math.random() * (999999 - 999 + 1)) + 999;
// Create an image preview if the file is an image
let  image_orignal_source = '';
if (file.type.startsWith("image/")) {
const reader = new FileReader();
reader.onload = function (event) {
image_orignal_source = event.target.result;
const img = $('<img data-file_name="'+file.name+'" data-original_src="'+event.target.result+'" src="'+event.target.result+'" alt="'+file.name+'" class="preview-img preview-img-'+randomId+'">');
//li.prepend(img); // Add image as the first element
li.prepend('<script>init_crop_function("'+randomId+'", "'+file.name+'", "'+image_orignal_source+'");<\/script>'); // Add image as the first element
};
reader.readAsDataURL(file);
}
const fileNameSpan = $('<span class="file-name">'+file.name+'</span>');
const removeBtn = $('<button class="remove-btn">Remove</button>');
const cropBTN = $('<button class="crop-btn" data-image_rand_id="'+randomId+'" type="button">CROP</button>');

// Create a hidden input element
const hiddenInput = $('<input type="file" name="upload_images[]" class="image_paths_'+randomId+'" hidden>');

// Append the hidden input to the file input container (not directly to the list)
const fileClone = new DataTransfer();
fileClone.items.add(file);
hiddenInput[0].files = fileClone.files;

// Add remove functionality
removeBtn.on("click", function () {
removeFile(file.name);
hiddenInput.remove(); // Remove the corresponding hidden input
li.remove();
});

// Append elements in the desired order
li.append(hiddenInput);
//li.append(fileNameSpan);
//li.append(removeBtn);
//li.append(cropBTN);

// Add the list item to the file list
fileList.append(li);

}



function removeFile(fileName) {
uploadedFiles = uploadedFiles.filter((file) => file.name !== fileName);
}
});




</script>


<script type="text/javascript">

$(document).ready(function () {

$(document).on('submit', '.gallery-bulk-list-form', function() {
var thisForm = $(this);
returnType = rurera_validation_process(thisForm);
if (returnType == false) {
return false;
}
return true;

});

$(document).on('click', '.create-gallery-bulk-list-btn', function () {
$(".gallery_bulk_list").modal('show');
});

$(document).on('click', '.upload-image-btn', function () {
$(".image-upload-block").removeClass('rurera-hide');
$(".template-selection").addClass('rurera-hide');
$(".image-crop-area").html('');
$(".preview-cropped-img").html('');
$(".preview-cropped-img").html('');
$('.template-item').removeClass('active');
var bulk_list_id = $(this).attr('data-id');
$('.bulk_list_id').val(bulk_list_id);
$(".rurera-upload-area").removeClass('rurera-hide');
$(".upload_image_area").modal('show');
});

$(document).on('click', '.reject-btn', function () {

var bulk_list_id = $(this).attr('data-id');
$('.bulk_list_id').val(bulk_list_id);
$(".reject-comment").val('');
$(".reject-comment-block").modal('show');
});



$(document).on('change', '.ajax-category-courses', function () {
var category_id = $(this).val();
var course_id = $(this).attr('data-course_id');
$.ajax({
type: "GET",
url: '/admin/webinars/courses_by_categories',
data: {'category_id': category_id, 'course_id': course_id},
success: function (return_data) {
$(".ajax-courses-dropdown").html(return_data);
$(".ajax-chapter-dropdown").html('<option value="">Please select year, subject</option>');
$('.ajax-courses-dropdown').change();
}
});
});

$(document).on('change', '.ajax-courses-dropdown', function () {
var course_id = $(this).val();
var chapter_id = $(this).attr('data-chapter_id');

$.ajax({
type: "GET",
url: '/admin/webinars/chapters_by_course',
data: {'course_id': course_id, 'chapter_id': chapter_id},
success: function (return_data) {
$(".ajax-chapter-dropdown").html(return_data);
$('.ajax-chapter-dropdown').change();
}
});
});

$(document).on('change', '.ajax-chapter-dropdown', function () {
var chapter_id = $(this).val();
var sub_chapter_id = $(this).attr('data-sub_chapter_id');
$.ajax({
type: "GET",
url: '/admin/webinars/sub_chapters_by_chapter',
data: {'chapter_id': chapter_id, 'sub_chapter_id': sub_chapter_id},
success: function (return_data) {
$(".ajax-subchapter-dropdown").html(return_data);
}
});
});
$(".ajax-category-courses").change();

});

$(document).on('click', '.image-preview-modal', function () {
$('.imagepreview-list').attr('src', $(this).attr('src'));
$('#imagemodal-list').modal('show');
});

</script>


@endpush
