@php $category_id = isset( $category_id )? $category_id : 0; 
$category_id = isset( $category_id )? $category_id : 0; 
$subject_id = isset( $subject_id )? $subject_id : 0; 

@endphp
<div class="row filters-block" data-action_class="{{$action_class}}">
<div class="col-md-4">
	<div class="form-group">
		<label class="input-label">{{trans('admin/main.category')}}</label>
		<select name="category_id_filter" data-plugin-selectTwo class="form-control populate ajax-category-courses-filters" data-course_id="{{$subject_id}}">
			<option value="">{{trans('admin/main.all_categories')}}</option>
			@foreach($categories as $category)
			@if(!empty($category->subCategories) and count($category->subCategories))
			<optgroup label="{{  $category->title }}">
				@foreach($category->subCategories as $subCategory)
				<option value="{{ $subCategory->id }}" @if($category_id == $subCategory->id) selected="selected" @endif>{{ $subCategory->title }}</option>
				@endforeach
			</optgroup>
			@else
			<option value="{{ $category->id }}" @if($category_id == $category->id) selected="selected" @endif>{{ $category->title }}</option>
			@endif
			@endforeach
		</select>
	</div>
</div>

<div class="col-md-4">
<div class="form-group">
	<label>Subjects</label>
	<select data-return_type="option"
			data-default_id="{{request()->get('subject_id_filter')}}" data-chapter_id_filter="{{get_filter_request('chapter_id_filter', 'sub_parts_questions_report')}}"
			class="ajax-courses-dropdown-filters year_subjects form-control select2 @error('subject_id_filter') is-invalid @enderror"
			id="subject_id_filter" name="subject_id_filter">
		<option disabled selected>Subject</option>
	</select>
	@error('subject_id_filter')
	<div class="invalid-feedback">
		{{ $message }}
	</div>
	@enderror
</div>
</div>


<div class="col-md-4">
<div class="form-group">
	<label class="input-label">Topic</label>
	<select data-sub_chapter_id="{{get_filter_request('sub_chapter_id', 'sub_parts_questions_report')}}" id="chapter_id_filter"
			class="form-control populate ajax-chapter-dropdown-filters @error('chapter_id_filter') is-invalid @enderror"
			name="chapter_id_filter">
		<option value="">Please select year, subject</option>
	</select>
	@error('chapter_id_filter')
	<div class="invalid-feedback">
		{{ $message }}
	</div>
	@enderror

</div>
</div>


<div class="col-md-4">
<div class="form-group">
	<label class="input-label">Sub Topic</label>
	<select id="sub_chapter_id_filter"
		class="form-control populate ajax-subchapter-dropdown-filters @error('sub_chapter_id') is-invalid @enderror"
		name="sub_chapter_id_filter">
	<option value="">Please select year, subject, Topic</option>
</select>
@error('sub_chapter_id')
<div class="invalid-feedback">
	{{ $message }}
</div>
@enderror


</div>
</div>
<div class="col-md-4">
<button type="button" class="search-images-gallery btn btn-primary">Search</button>
</div>

</div>

<script type="text/javascript">

    $(document).ready(function () {
		
		$(document).on('click', '.search-images-gallery', function () {
			var category_id = $('[name="category_id_filter"]').val();
			var subject_id = $('[name="subject_id_filter"]').val();
			var chapter_id = $('[name="chapter_id_filter"]').val();
			var sub_chapter_id = $('[name="sub_chapter_id_filter"]').val();
			var action_class = $(".filters-block").attr('data-action_class');
			jQuery.ajax({
				type: "GET",
				url: '/admin/common/get_gallery_images',
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: {"action_class": action_class ,"gallery_directory": '', "category_id": category_id, "subject_id": subject_id, "chapter_id": chapter_id, "sub_chapter_id": sub_chapter_id},
				success: function (return_data) {
					console.log('sdfsdf');
					console.log(return_data);
					//jQuery(action_class).html('sdfsdfsdf');
					jQuery(action_class).html(return_data);
				}
			});
		});
		
		
		
		$(document).on('change', '.ajax-category-courses-filters', function () {
			var category_id = $(this).val();
			var course_id = $(this).attr('data-course_id');
			$.ajax({
				type: "GET",
				url: '/admin/webinars/courses_by_categories',
				data: {'category_id': category_id, 'course_id': course_id},
				success: function (return_data) {
					$(".ajax-courses-dropdown-filters").html(return_data);
					$(".ajax-chapter-dropdown-filters").html('<option value="">Please select year, subject</option>');
					$('.ajax-courses-dropdown-filters').change();
				}
			});
		});

		$(document).on('change', '.ajax-courses-dropdown-filters', function () {
			var course_id = $(this).val();
			var chapter_id = $(this).attr('data-chapter_id_filter');

			$.ajax({
				type: "GET",
				url: '/admin/webinars/chapters_by_course',
				data: {'course_id': course_id, 'chapter_id': chapter_id},
				success: function (return_data) {
					$(".ajax-chapter-dropdown-filters").html(return_data);
					$('.ajax-chapter-dropdown-filters').change();
				}
			});
		});

		$(document).on('change', '.ajax-chapter-dropdown-filters', function () {
			var chapter_id = $(this).val();
			var sub_chapter_id = $(this).attr('data-sub_chapter_id_filter');
			var disabled_items = $(this).attr('data-disabled');
			$.ajax({
				type: "GET",
				url: '/admin/webinars/sub_chapters_by_chapter',
				data: {'chapter_id': chapter_id, 'sub_chapter_id': sub_chapter_id, 'disabled_items': disabled_items},
				success: function (return_data) {
					$(".ajax-subchapter-dropdown-filters").html(return_data);
				}
			});
		});
        $(".ajax-category-courses-filters").change();
		
    });
	
	
</script>