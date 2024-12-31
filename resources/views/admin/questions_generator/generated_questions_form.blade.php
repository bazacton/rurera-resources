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
    /* nav.navbar.navbar-expand-lg.main-navbar {
        display: none;
    } */
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
.similiarity-status {
  display: inline-block; 
  width: 10px;
  height: 10px;
  padding: 5px;
  border-radius: 50%;
  box-shadow: 0 0 0 5px white;	
}
.rurera-danger{background-color:#fd2929 !important;}
.rurera-warning{background-color:#ff973f !important;}
.similiarity-status.danger{
	background-color:#fd2929;
}
.similiarity-status.warning{
	background-color:#ff973f;
}
.similiarity-item span{
	padding: 5px;
}
.similiarity-question-index {
    background: #27325e;
    margin-right: 10px;
    color: #fff;
}
.similiarity-item {
    margin-bottom: 5px;
}

.true_false_questions {
    color: #224189 !important;
    border-bottom-color: #224189 !important;
}
.checkbox_questions {
    color: #224189 !important;
    border-bottom-color: #224189 !important;
}

.question-types-colors {
    display: flex;
    align-items: center;
    gap: 50px;
    margin-bottom: 30px;
}
.question-types-colors span {
    font-size: 16px;
    position: relative;
    display: inline-flex;
    align-items: center;
}
.question-types-colors span:before {
    content: "";
    display: inline-block;
    vertical-align: middle;
    height: 18px;
    width: 18px;
    margin-right: 8px;
    box-shadow: 0 0 4px rgba(0,0,0,0.4) inset;
}
.question-types-colors .checkbox_questions_color:before {
    background-color: #224189;
}
.question-types-colors .true_false_questions_color:before {
    background-color: #c8d022;
}




</style>
@endpush

@php $save_type = isset( $questionObj->id )? 'update_question' : 'store_question'; @endphp
@section('content')
@if($QuestionsBulkListObj->quiz_id > 0)
	<h2>{{$QuestionsBulkListObj->quizData->getTitleAttribute()}}</h2>
@else
<span>{{$QuestionsBulkListObj->category->getTitleAttribute()}} / {{$QuestionsBulkListObj->subject->getTitleAttribute()}} / {{$QuestionsBulkListObj->chapter->getTitleAttribute()}}</span>
<div class="title-search-field d-flex align-items-center justify-content-between mt-10">
<h1>{{$QuestionsBulkListObj->subChapter->sub_chapter_title}}</h1>  <div class="form-group mb-0">
        <label>Select Topic Part</label>
        <select data-default_question_id="{{$default_question_id}}" name="part_item_id" data-bulk_list_id="{{$QuestionsBulkListObj->id}}" class="part_item_selection form-control populate w-auto">
            @php $topic_counter = 1; @endphp
            @if($topic_parts_items->count() > 0)
                @foreach($topic_parts_items as $topicPartItemObj)
                    @php $selected = ($default_topic_part_id == 0 && $topic_counter == 1)? 'selected' : ''; 
                    $selected = ($default_topic_part_id == $topicPartItemObj->id)? 'selected' : $selected;
                    @endphp
                    <option value="{{$topicPartItemObj->id}}" {{$selected}}>{{$topicPartItemObj->title}}</option>
                    @php $topic_counter++; @endphp
                @endforeach
            @endif
        </select>
    </div>
		</div>
@endif


<!-- Edit-questions Tabs Start -->
<div class="edit-questions-difficulty-tabs">	
<div class="question-types-colors">
	<span class="checkbox_questions_color">MCQs</span>
	<span class="true_false_questions_color">True/False</span>
	<span class="inner_dropdown_questions_color">Inner Dropdown</span>
	<span class="inner_text_questions_color">Inner Text Fields</span>
</div>
<div class="edit-questions-difficulty-data">
</div>
<div class="edit-questions-tabs">	
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
<script src="/assets/default/js/admin/jquery.ui.touch-punch.min.js"></script>



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


$("body").on("change", ".part_item_selection", function (t) {
	var part_item_id = $(this).val();
	var bulk_list_id = $(this).attr('data-bulk_list_id');
	var default_question_id = $(this).attr('data-default_question_id');
	var loaderDiv = $('.edit-questions-difficulty-tabs');
	rurera_loader(loaderDiv, 'button');
	$.ajax({
		type: "POST",
		url: '/admin/questions-generator/generate_question_builder_difficulty_layout',
		data: {'part_item_id': part_item_id, 'bulk_list_id': bulk_list_id, 'default_question_id': default_question_id},
		success: function (return_data) {
			rurera_remove_loader(loaderDiv, 'button');
			$(".edit-questions-difficulty-data").html(return_data);
			 $(".difficulty-level-btn.active").click();
			//$(".question-builder-layout.active").click();
		}
	});
});
$(".part_item_selection").change();
function decodeHtml(html) {
    var txt = document.createElement("textarea");
    txt.innerHTML = html;
    return txt.value;
}

 $("body").on("click", ".difficulty-level-btn", function (t) {
	 var thisObj = $(this);
	 var difficulty_level = $(this).attr('data-difficulty_level');
	 var bulk_list_id = $(this).attr('data-bulk_list_id');
	 var part_item_id = $(this).attr('data-part_item_id');
	 var default_question_id = $('.part_item_selection').attr('data-default_question_id');
	 var loaderDiv = $('.tab-content');
		rurera_loader(loaderDiv, 'button');
		$.ajax({
			type: "GET",
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url: '/admin/questions-generator/get_questions_list_layout',
			data: {'difficulty_level': difficulty_level, 'default_question_id': default_question_id, 'bulk_list_id': bulk_list_id, 'part_item_id': part_item_id},
			success: function (return_data) {
				$(".edit-questions-tabs").html(return_data);
				$(".question-builder-layout.active").click();
			}
		});
 });
 
 $("body").on("click", ".question-builder-layout", function (t) {
	 var thisObj = $(this);
	 var question_id = $(this).attr('data-question_id');
	 var question_index = $(this).attr('data-question_index');
	 var is_deleted = $(this).attr('data-is_deleted');
	 var similiarity_responses1 = $('.questions-nav-bar').attr('data-similiarity_responses');
	 var similiarity_responses = $('.questions-nav-bar').attr('data-similiarity_responses');
	 $('.question-builder-area').html('');
	 var loaderDiv = $('.tab-content');
	 if(is_deleted == 'yes'){
		 var return_data = '<div class="col-12 col-md-12 api-question-status"><div class="alert alert-danger" role="alert"><strong>Question Deleted</strong><p>Question was initially imported but has since been removed from the question bank.</p></div></div>';
		 $('.question-builder-area[data-question_id="'+question_id+'"]').html(return_data);
	 }else{
		 rurera_loader(loaderDiv, 'button');
		 $.ajax({
			type: "POST",
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url: '/admin/questions-generator/generate_question_builder_layout',
			data: {'question_id': question_id, 'similiarity_responses': similiarity_responses, 'question_index': question_index},
			success: function (return_data) {
				rurera_remove_loader(loaderDiv, 'button');
				$('.question-builder-area').html('');
				$('.question-builder-area[data-question_id="'+question_id+'"]').html(return_data);
			}
		});
	 }
 });
 
 $(".difficulty-level-btn.active").click();
 //$(".question-builder-layout.active").click();
 
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