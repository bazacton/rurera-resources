
  let cropper;
  let file_name_original;

$(document).ready(function(){
  var img
  $('#imagUpload').change(function(e){
    img = e.target.files[0]

    $('#image_preview').attr('src', URL.createObjectURL(img))
    $('#image_preview,#crop').removeClass('d-none')
  })

  $('#crop').click(function(){
    var img_link = $('#image_preview').attr('src')

    $('#crop_popup').on('shown.bs.modal', function(){
      const cropOptions = {
        image: img_link,
        // imgFormat: 'auto', // Formats: 3/2, 200x360, auto
        // circleCrop: true,
        zoomable: true
      }

      // Initiate cropper
      cropper = $('#crop_popup .modal-body').cropimage( cropOptions )

      setTimeout( () => {console.log('set-image'); cropper.setImage( img_link )}, 8000 )
    })
    .modal()
  });

  $(document).on('click', '.crop-btn22', function () {
	 // Get the cropped image source URL
	var image_id = $(this).attr('data-image_rand_id');
	$(".crop-it").attr('data-image_rand_id', image_id);
	var img_link = $(this).closest('li').find('img').attr('data-original_src');

    $('#crop_popup').on('shown.bs.modal', function(){
      const cropOptions = {
        image: img_link,
        // imgFormat: 'auto', // Formats: 3/2, 200x360, auto
        // circleCrop: true,
        zoomable: true
      }

      // Initiate cropper
      cropper = $('#crop_popup .modal-body').cropimage( cropOptions )

      setTimeout( () => {console.log('set-image'); cropper.setImage( img_link )}, 8000 )
    })
    .modal()
  });



  $(document).on('click', '.crop-btn', function () {
	 // Get the cropped image source URL
	var image_id = $(this).attr('data-image_rand_id');
	$(".crop-it").attr('data-image_rand_id', image_id);
	var img_link = $(this).closest('li').find('img').attr('data-original_src');

	console.log(img_link);
    const cropOptions = {
        image: img_link,
        // imgFormat: 'auto', // Formats: 3/2, 200x360, auto
        // circleCrop: true,
        zoomable: true
      }

	  console.log(cropOptions);

	  // Initiate cropper
	  cropper = $('.image-crop-area').cropimage( cropOptions );
	  cropper.setImage( img_link );
  });


	function getFileNameFromBlobURL(blobDataURL, blob) {
	  // Try to extract filename from URL path
	  let fileName = blobDataURL.split('/').pop().split('?')[0];
	  console.log(fileName);

	  // If no filename is found in the URL, generate one
	  if (!fileName || fileName === "blob") {
		const mimeExtensionMap = {
		  "image/jpeg": "jpg",
		  "image/png": "png",
		  "image/gif": "gif",
		  "text/plain": "txt",
		  "application/pdf": "pdf",
		  // Add more MIME types as needed
		};

		const extension = mimeExtensionMap[blob.type] || "dat"; // Default extension
		fileName = `uploaded-file.${extension}`;
		fileName += '.'+extension;
	  }

	  return fileName;
	}


	$(document).on('click', '.remove-stage-image', function(){
		$(".rurera-upload-area").removeClass('rurera-hide');
		$(".image-crop-area").html('');
		$(".preview-cropped-img").html('');
		$(".crop-image-next-btn").addClass('rurera-hide');
		$(".crop-it").removeClass('rurera-hide');

	});
  $(document).on('click', '.crop-it', function(){
    // Get the cropped image source URL

	var image_id = $(this).attr('data-image_rand_id');
    const blobDataURL = cropper.getImage('PNG'); // JPEG, PNG, ...
    if( !blobDataURL ) return

	var parentObj = $(".image_paths_"+image_id).closest('li');
	$(".preview-cropped-img").html('<img src="'+blobDataURL+'">');
	$(".image_paths_"+image_id).remove();
	fetch(blobDataURL)
	  .then(res => res.blob())
	  .then(blob => {
		const fileName = file_name_original;
		console.log('fileName----'+fileName);
		const file = new File([blob], fileName, { type: blob.type });
		const hiddenInput = $('<input type="file" name="upload_images[]" class="222 image_paths_'+image_id+'" hidden>');

		const fileClone = new DataTransfer();
		fileClone.items.add(file);
		hiddenInput[0].files = fileClone.files;
		parentObj.append(hiddenInput);
	  });

	$(".crop-it").addClass('rurera-hide');
	$(".crop-image-next-btn").removeClass('rurera-hide');

	$(".image_paths_"+image_id).val(blobDataURL);
    // Do something ...
  })
  $('.image-crop-area').on('click', '.reset-it', function(){
    cropper.reset()
  });

  $(document).on('click', '.crop_sizes li', function(){
	  var crop_width = $(this).attr('data-crop_size_width');
	  var crop_height = $(this).attr('data-crop_size_height');
	  var size_class = $(this).attr('data-size_class');
	  $(".crop_sizes").find('li').removeClass('active');
	  $(this).addClass('active');
	  $(".R-cropper").css('width' , crop_width+'px');
	  $(".R-cropper").css('height' , crop_height+'px');
	  $(".dynaCanvas").attr('width', crop_width);
	  $(".dynaCanvas").attr('height', crop_height);
	  $(".template-item").addClass('rurera-hide');
	  $(".template-item."+size_class).removeClass('rurera-hide');
	  var CROP_WIDTH = parseInt(crop_width);
	  var CROP_HEIGHT = parseInt(crop_height);
	  console.log('CROP_WIDTH=='+ CROP_WIDTH);
	  console.log('CROP_HEIGHT=='+ CROP_HEIGHT);
      $(".crop_size").val(size_class);
      console.log('livecalleeeeeeeeed');
      $(".R-cropper").trigger("touchstart");
  });
  $(".crop_sizes li.active").click();
    $(".R-cropper").trigger("touchstart");
});

function init_crop_function(image_id, file_name, img_link){
	console.log(img_link);
	file_name_original = file_name;
	$(".crop-it").attr('data-image_rand_id', image_id);
	var crop_width = $(".crop_sizes li.active").attr('data-crop_size_width');
	var crop_height = $(".crop_sizes li.active").attr('data-crop_size_height');
    const cropOptions = {
        image: img_link,
        zoomable: true,
        CROP_WIDTH_VAR: parseInt(crop_width),
        CROP_HEIGHT_VAR: parseInt(crop_height),
      }

	  // Initiate cropper
	  cropper = $('.image-crop-area').cropimage( cropOptions );
	  cropper.setImage( img_link );
    $(".R-cropper").trigger("touchstart");
    $(".crop_sizes li.active").click();
    console.log('initizlizeeeeeeeeee--------------');
	  $(".rurera-upload-area").addClass('rurera-hide');
}
