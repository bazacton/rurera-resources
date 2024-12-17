@extends('admin.layouts.app')

@push('styles_top')
    <link href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
    <link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
	<link rel="stylesheet" href="/assets/default/vendors/bootstrap-tagsinput/bootstrap-tagsinput.min.css">
	<link rel="stylesheet" href="/assets/default/css/cropimage.css">
    <link rel="stylesheet" href="/assets/default/css/crop-style.css">
	 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<style>
	
.rurera-upload-area {
  text-align: center;
  width: 80%;
  max-width: 500px;
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

.rurera-upload-area #file-list li {
  margin: 5px 0;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
  background-color: #fff;
  display: flex;
  justify-content: space-between;
  align-items: center;
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


.rurera-upload-area #file-list li {
  margin: 10px 0;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
  background-color: #fff;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 10px;
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
</style>
@endpush


@section('content')
    <section class="section upload-path-rurera" data-location="topic_parts/{{isset( $GalleryImageObj->id )? $GalleryImageObj->id : 0}}">
        <div class="section-header">
            <h1>Upload Images</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/admin/">{{ trans('admin/main.dashboard') }}</a>
                </div>
                <div class="breadcrumb-item active"><a href="/admin/gallery_images">Upload Images</a>
                </div>
                <div class="breadcrumb-item">New</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
			
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="gallery-images-form" id="gallery-images-form" action="/admin/gallery_images/{{$gallery_bulk_list_id}}/store" enctype="multipart/form-data" 
                                  method="Post">
                                {{ csrf_field() }}
								
								
								<div class="row">

								<div class="col-12">
									<div class="form-group">
										<label class="input-label">Search Keywords / Tags (Enter Search terms which will be use when looking for images)</label>
										<input type="text" data-role="tagsinput" value=""
											   name="search_tags"
											   class="form-control @error('search_tags')  is-invalid @enderror"
											   placeholder="List of comma-Separated Search keywords (i.e. Subject-title, topic)"/>
									</div>
								</div>
								</div>
								
								
								
								<div class="row">
									<div class="col-12 col-md-12 col-lg-12">
										<div id="upload-container" class="rurera-upload-area">
											<div id="drag-drop-area">
											  <p>Drag & Drop your files here or click to upload</p>
											  <input type="file" id="file-input" multiple>
											</div>
											<ul id="file-list"></ul>
										</div>
									</div>
								</div>

								<div class="text-left">
									<button class="btn btn-primary">Upload Images</button>
								</div>
								
								
								
								
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	
    <div class="modal" tabindex="-1" role="dialog" id="crop_popup">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center">Crop image</h5>
			<ul class="crop_sizes">
				<li data-crop_size_width="200" data-crop_size_height="200">200 x 200</li>
				<li data-crop_size_width="350" data-crop_size_height="150">350 x 150</li>
			</ul>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body img-contaner w-100"></div>
          <div class="modal-footer text-center justify-content-center mt-3">
            <button type="button" class="crop-it">Crop</button>
            <button type="button" class="reset-it">Reset</button>
            <button type="button" class="dismiss" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('scripts_bottom')
    <script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>
    <script src="/assets/default/js/admin/filters.min.js"></script>
    <script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
    <script src="/assets/default/js/admin/new-images.js"></script>
	<script src="/assets/default/vendors/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
	
	<script src="/assets/default/js/admin/cropimage.js"></script>
	<script src="/assets/default/js/admin/crop-script.js"></script>
	
	
	<script type="text/javascript">
	$(document).ready(function () {
  const dragDropArea = $("#drag-drop-area");
  const fileInput = $("#file-input");
  const fileList = $("#file-list");

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
  });

  function handleFiles(files) {
    for (let i = 0; i < files.length; i++) {
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
      if (img.width > maxDimensions.width || img.height > maxDimensions.height) {
        callback(false, `exceeds maximum dimensions of ${maxDimensions.width}x${maxDimensions.height}px.`);
      } else {
        callback(true);
      }
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
	  if (file.type.startsWith("image/")) {
		const reader = new FileReader();
		reader.onload = function (event) {
		  const img = $('<img data-file_name="'+file.name+'" data-original_src="'+event.target.result+'" src="'+event.target.result+'" alt="'+file.name+'" class="preview-img preview-img-'+randomId+'">');
		  li.prepend(img); // Add image as the first element
		};
		reader.readAsDataURL(file);
	  }
	  const fileNameSpan = $('<span class="file-name">'+file.name+'</span>');
	  const removeBtn = $('<button class="remove-btn">Remove</button>');
	  const cropBTN = $('<button class="crop-btn" data-image_rand_id="'+randomId+'" type="button">Crop</button>');

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
	  li.append(fileNameSpan);
	  li.append(removeBtn);
	  li.append(cropBTN);

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
			var disabled_items = $(this).attr('data-disabled');
			$.ajax({
				type: "GET",
				url: '/admin/webinars/sub_chapters_by_chapter',
				data: {'chapter_id': chapter_id, 'sub_chapter_id': sub_chapter_id, 'disabled_items': disabled_items},
				success: function (return_data) {
					$(".ajax-subchapter-dropdown").html(return_data);
				}
			});
		});
        $(".ajax-category-courses").change();
		
    });
	
	
</script>
@endpush
