@extends('admin.layouts.app')
@php

$rand_id = rand(999,99999);

@endphp


@push('styles_top')
<link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">
<link rel="stylesheet" href="/assets/default/css/quiz-create.css?ver={{$rand_id}}">
<link href="/assets/default/css/jquery-ui/jquery-ui.min.css" rel="stylesheet">
<link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
<script src="/assets/default/js/admin/jquery.min.js"></script>
<script src="/assets/default/js/admin/sticky-sidebar.js?ver={{$rand_id}}"></script>
<link rel="stylesheet" href="/assets/default/vendors/bootstrap-tagsinput/bootstrap-tagsinput.min.css">
<style>
    .droppable_area {
        width: 150px;
        height: 50px;
        border: 1px solid #efefef;
        display: inline-block;
    }
    .image-field, .image-field-box {
        width: fit-content;
    }
    .image-field img, .containment-wrapper {
        position: relative !important;
    }
    .image-field-box {
        position: absolute !important;
    }
    /*.draggable3 {
        width: 150px;
    }*/
    .spreadsheet-area {
        border: 1px solid #efefef;
        padding: 10px;
        background: #fff;
        height: 200px;
    }
    .question-layout-data .rureraform-element{
        outline: none !important;
    }
    .navbar-bg {
        display: none;
    }
    nav.navbar.navbar-expand-lg.main-navbar {
        display: none;
    }
	.modal-open .modal{
		z-index: 99999;
	}
	.rureraform-element-helper{
		width:100% !important;
	}
	
	.rureraform-element-helpers {
    width: fit-content !important;
}
.hide{display:none;}

.section-block {
    background: #f5f5f5;
    padding: 5px 10px !important;
	margin: 5px 0px;
	border:1px solid #ccc;
}
</style>
@endpush

@php $save_type = isset( $questionObj->id )? 'update_question' : 'store_question'; @endphp

@section('content')
<span>{{$AiApiCallObj->category->getTitleAttribute()}} / {{$AiApiCallObj->subject->getTitleAttribute()}} / {{$AiApiCallObj->chapter->getTitleAttribute()}}</span>
<h2>{{$AiApiCallObj->subChapter->sub_chapter_title}}</h2>

<!-- Edit-questions Tabs Start -->
<div class="edit-questions-tabs">
  <div class="nav" id="nav-tab" role="tablist">
	@if(!empty( $questions_array) )
		@php $counter = 1; @endphp
		@foreach( $questions_array as $questionData)
			@php $status = isset( $questionData['status'] ) ? $questionData['status'] : 'waiting'; 
			$class = 'question-builder-layout';
			if($status == 'deleted'){ $class = 'question-builder-layout-default'; }
			@endphp
			@php $question_id = isset( $questionData['question_id'] ) ? $questionData['question_id'] : 0; @endphp
			@php $active_class = ($counter == 1)? 'active' : ''; @endphp
			<button data-question_id="{{$question_id}}" class="{{$class}} nav-link {{$active_class}}" id="nav-q{{$counter}}-tab" data-toggle="tab" data-target="#nav-q{{$counter}}" type="button" role="tab" aria-controls="nav-q{{$counter}}" aria-selected="true">{{$counter}}</button>
		@php $counter++; @endphp
		@endforeach
	@endif
  </div>
  <div class="tab-content" id="nav-tabContent">
	@if(!empty( $questions_array) )
		@php $counter = 1; @endphp
		@foreach( $questions_array as $questionData)
		@php $status = isset( $questionData['status'] ) ? $questionData['status'] : 'waiting'; 
		$class = 'question-builder-area';
		if($status == 'deleted'){ $class = 'question-builder-area-default'; }
		@endphp
		@php $active_class = ($counter == 1)? 'show active' : ''; @endphp
		
		@php $question_id = isset( $questionData['question_id'] ) ? $questionData['question_id'] : 0; @endphp
		<div data-question_id="{{$question_id}}" class="tab-pane fade {{$active_class}} {{$class}}" id="nav-q{{$counter}}" role="tabpanel" aria-labelledby="nav-q{{$counter}}-tab">
		
			@if($status == 'deleted')
				<div class="alert alert-danger" role="alert">
				  <strong>{{$question_id}} Deleted</strong>
				</div>	
				
			@endif
		</div>
		@php $counter++; @endphp
		@endforeach
	@endif
  </div>
</div>
<!-- Edit-questions Tabs End -->


@endsection

@push('scripts_bottom')

<script src="/assets/default/vendors/feather-icons/dist/feather.min.js"></script>
<script src="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
<script src="/assets/vendors/summernote/summernote-table-headers.js"></script>
<script src="/assets/default/vendors/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

<script>
    // Function to generate a random alphanumeric ID (6 characters: mix of letters and numbers)
    function generateUniqueID() {
        const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        let result = '';
        for (let i = 0; i < 6; i++) {
            result += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        return result;
    }

    // Function to add a new row to the table
    function addNewRow(part = '') {
        const uniqueID = generateUniqueID();
        const tableBody = document.getElementById('sortableTableBody');
        const row = document.createElement('tr');
        
        row.innerHTML = `
            <td>${uniqueID}</td>
            <td><textarea name="topic_part[${uniqueID}]">${part}</textarea></td>
            <td><button class="remove-btn" onclick="removeRow(this)">Remove</button></td>
        `;
        tableBody.appendChild(row);
    }

    // Function to remove a row
    function removeRow(button) {
        const row = button.parentElement.parentElement;
        row.remove();
    }

    // Event listener to split the input text into parts
    document.getElementById('splitTextBtn').addEventListener('click', function() {
        const inputText = document.getElementById('inputText').value;
        
        // Split the text into sentences using basic sentence boundary detection
        const parts = inputText.split(/(?<=[.?!])\s+/);
        
        const outputTableBody = document.getElementById('sortableTableBody');
        outputTableBody.innerHTML = '';  // Clear previous output
        
        // Loop through each part and add it as a new row
        parts.forEach(part => {
            addNewRow(part);
        });
    });

    // Event listener to add more parts dynamically
    document.getElementById('addMoreBtn').addEventListener('click', function() {
        addNewRow(); // Add an empty new row
    });

    // Initialize sortable functionality on the table body
    new Sortable(document.getElementById('sortableTableBody'), {
        animation: 150,
        handle: 'td', // Make the table row (td) the handle for sorting
        ghostClass: 'sortable-ghost'
    });
</script>


<script type="text/javascript">
	let isProcessing = false;
$(document).off('click', 'body').on('click', 'body', function (event) {
    // Check if the click is not inside .rureraform-properties-content
    if (!$(event.target).closest('.rureraform-properties-content').length && !$(event.target).closest('.rureraform-admin-editor').length) {
        if (!isProcessing) {
            isProcessing = true; // Set the flag to true
            // Check if .rureraform-admin-popup:visible contains .generate-question-code
            if ($('.rureraform-admin-popup:visible').find('.generate-question-code').length > 0) {
                $('.rureraform-admin-popup:visible').find('.generate-question-code').click();
            }
            // Reset the flag after a timeout or after the operation completes
            setTimeout(function() {
                isProcessing = false; // Reset the flag after a delay
            }, 100); // Adjust the timeout duration as needed
        }
    }
});



 $("body").on("click", ".question-builder-layout", function (t) {
	 var thisObj = $(this);
	 var question_id = $(this).attr('data-question_id');
	 $('.question-builder-area-default').html('');
	 var loaderDiv = $('.edit-questions-tabs');
	 var loaderDiv = $('.main-content');
	 rurera_loader(thisObj, 'button');
	 $.ajax({
		type: "GET",
		url: '/admin/questions-generator/generate_question_builder_layout',
		data: {'question_id': question_id},
		success: function (return_data) {
			rurera_remove_loader(thisObj, 'button');
			$('.question-builder-area').html('');
			$('.question-builder-area[data-question_id="'+question_id+'"]').html(return_data);
		}
	});
 });
 
 $(".question-builder-layout.active").click();
 
$(document).on('click', '.move-up-keyword', function () {
    var $block = $(this).closest('.keyword-item');
    var $prev = $block.prev('.keyword-item'); // Ensures you are moving only within keyword items
    if ($prev.length) {
        $block.insertBefore($prev);
    }
});

$(document).on('click', '.move-down-keyword', function () {
    var $block = $(this).closest('.keyword-item');
    var $next = $block.next('.keyword-item'); // Ensures you are moving only within keyword items
    if ($next.length) {
        $block.insertAfter($next);
    }
});

$(document).on('click', '.remove-keyword', function () {
	$(this).closest('.keyword-item').remove();
});

$(document).on('click', '.add-keyword-btn', function () {
    // Define the new keyword item HTML structure
    var newKeywordItem = `
        <div class="keyword-item">
            <span class="editable-content keyword-title-field" data-edit_field="keywords[001][title]" contenteditable="true">New Keyword</span>
            <input type="text" class="rurera-hide" name="keywords[001][title]" value="New Keyword">
            <div class="keyword-buttons">
                <button type="button" class="move-up-keyword">↑</button>
                <button type="button" class="move-down-keyword">↓</button>
                <button type="button" class="remove-keyword">✖</button>
            </div>
			<textarea cols="100" name="keywords[001][description]" rows="5"></textarea>
        </div>
    `;

    // Append the new keyword item to the keyword block
    $('.keyword-block').append(newKeywordItem);
});
	
</script>

@endpush