@extends('admin.layouts.app')
@php

$rand_id = rand(999,99999);
$single_question = isset($single_question)? $single_question : false;
@endphp


@push('styles_top')
<link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">
<link rel="stylesheet" href="/assets/default/css/quiz-create.css?ver={{$rand_id}}">
<link rel="stylesheet" href="/assets/default/css/quiz-common.css?ver={{$rand_id}}">
<link href="/assets/default/css/jquery-ui/jquery-ui.min.css" rel="stylesheet">
<link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
<link rel="stylesheet" href="/assets/default/css/responsive.css?ver={{$rand_id}}">
<script src="/assets/default/js/admin/jquery.min.js"></script>
<script src="/assets/default/js/admin/sticky-sidebar.js?ver={{$rand_id}}"></script>
<link rel="stylesheet" href="/assets/default/vendors/bootstrap-tagsinput/bootstrap-tagsinput.min.css">
<script src="https://cdn.jsdelivr.net/npm/mathjax@4/tex-mml-svg.js" defer></script>



<style>

    .equationModal button{cursor:pointer;font-family:inherit}
    .equationModal .open-btn{
        background:var(--blue);color:#fff;border:none;border-radius:8px;
        padding:12px 20px;font-size:16px
    }

    /* Modal */
    .equationModal .backdrop{position:fixed;inset:0;background:rgba(0,0,0,.55);display:none}
    .equationModal .header{
        padding:14px 18px;border-bottom:1px solid var(--line);
        display:flex;justify-content:space-between;align-items:center
    }
    .equationModal .header h3{margin:0;font-weight:700}
    .equationModal .icon-btn{border:none;background:transparent;font-size:20px;line-height:1;padding:6px 10px;border-radius:8px}
    .equationModal .icon-btn:hover{background:#f3f4f6}
    .equationModal .btn-close {
        border: 0;
        height: auto;
        padding: 0;
        line-height: normal;
        font-weight: bold;
        font-size: 18px;
        background-color: inherit;
        outline: none;
    }
    /* Toolbar */
    .equationModal .toolbar{
        display:flex;gap:10px;flex-wrap:wrap;align-items:flex-end;
        padding:12px 18px;border-bottom:1px solid var(--line);position:relative
    }
    .equationModal .tool{
        padding:10px 12px;border:1px solid #d1d5db;border-radius:10px;
        background:var(--btn);font-size:13px;color:#111827
    }
    .equationModal .tool:hover{background:#f3f4f6}
    .equationModal .tool.active{background:#eef2ff;border-color:#a5b4fc;color:#1d4ed8}

    /* Dropdown */
    .equationModal .dropdown{
        position:absolute;top:56px;left:18px;
        background:#fff;border:1px solid #ddd;border-radius:12px;
        box-shadow:0 16px 50px rgba(0,0,0,.18);
        padding:14px;display:none;min-width:560px;z-index:20
    }
    .equationModal .dropdown.show{display:block}
    .equationModal .dd-title{font-weight:800;margin:0 0 10px 0}
    .equationModal .dd-section{margin:10px 0 14px}
    .equationModal .dd-section h4{
        margin:0 0 8px 0;font-size:13px;color:#374151;
        background:#f3f4f6;padding:8px 10px;border-radius:10px
    }
    .equationModal .dd-grid{display:grid;grid-template-columns:repeat(8,minmax(0,1fr));gap:8px}
    .equationModal .sym{
        border:1px solid #e5e7eb;border-radius:12px;padding:10px 8px;
        background:#fff;display:flex;flex-direction:column;align-items:center;gap:6px;
        user-select:none
    }
    .equationModal .sym:hover{backgrouind:#f9fafb;border-color:#d1d5db}
    .equationModal .sym .glyph{font-size:22px;line-height:1}
    .equationModal .sym .code{font-size:11px;color:var(--muted);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:100%}

    /* Editor Layout */
    .equationModal .body{padding:16px 18px}
    .equationModal .editor-wrap{display:grid;grid-template-columns:1fr 1fr;gap:14px}
    .equationModal textarea{width:100%;height:240px;font-size:15px;padding:10px;border:1px solid #d1d5db;border-radius:10px}
    .equationModal .preview{border:1px solid #d1d5db;border-radius:10px;padding:14px;background:#fff;overflow:auto}

    /* Footer */
    .equationModal .footer{
        padding:12px 18px;border-top:1px solid var(--line);
        display:flex;justify-content:flex-end;gap:10px;background:#fafafa
    }
    .equationModal .btn{border:1px solid #d1d5db;border-radius:10px;padding:10px 14px;background:#fff}
    .equationModal .btn-primary{background:var(--blue);color:#fff;border-color:var(--blue)}
    .equationModal .btn:hover{background:#f3f4f6}
    .equationModal .btn-primary:hover{background:#1d4ed8}

    /* Tiny help */
    .equationModal .hint{font-size:12px;color:var(--muted);margin:10px 0 0}
</style>


<style>
    .latex-toolbar {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
    }

    .latex-btn {
        border: 1px solid #ccc;
        background: #f8f9fa;
        padding: 6px 10px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
    }

    .latex-btn:hover {
        background: #e9ecef;
    }
    .math-equation {
        display: inline-block;
        padding: 2px 6px;
        border-radius: 4px;
        cursor: pointer;
        user-select: all; /* important for copy */
    }

    .math-equation::selection {
        background: rgba(0, 123, 255, 0.25);
    }

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

    .section-block {
        background: #f5f5f5;
        padding: 5px 10px !important;
        margin: 5px 0px;
        border:1px solid #ccc;
    }
</style>

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
    gap: 10px 30px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}
.question-types-colors span {
    font-size: 16px;
    position: relative;
    display: inline-flex;
    align-items: center;
    margin-left: 0;
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
@if(isset($QuestionsBulkListObj->id) && $QuestionsBulkListObj->quiz_id > 0)
	<h2>{{$QuestionsBulkListObj->quizData->getTitleAttribute()}}</h2>
@else
@if($single_question == true)
    <a href="javascript:;" class="single-question-layout rurera-hide" data-question_id="{{isset($question_id)? $question_id : 0}}"></a>
@endif
@if($single_question == false)
<span>{{$QuestionsBulkListObj->category->getTitleAttribute()}} / {{$QuestionsBulkListObj->subject->getTitleAttribute()}} / {{$QuestionsBulkListObj->chapter->getTitleAttribute()}}</span>

<div class="title-search-field d-flex align-items-center justify-content-between mt-10">
<h1>{{$QuestionsBulkListObj->subChapter->sub_chapter_title}}</h1>  <div class="form-group mb-0">
        <label>Select Topic Part</label>
        <div class="part_item_selection_holder">
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
		</div>
@endif
@endif


<!-- Edit-questions Tabs Start -->
<div class="edit-questions-difficulty-tabs">
@if($single_question == false)
<div class="question-types-colors">
	<span class="checkbox_questions_color">MCQs</span>
	<span class="true_false_questions_color">True/False</span>
	<span class="inner_dropdown_questions_color">Inner Dropdown</span>
	<span class="inner_text_questions_color">Inner Text Fields</span>
</div>
<div class="edit-questions-difficulty-data">
</div>
@endif
<div class="edit-questions-tabs">
    @if($single_question == true)
    <div class="tab-content" id="nav-tabContent" style="min-height:500px;">
        <div data-question_id="{{isset($question_id)? $question_id : 0}}" class="tab-pane fade show active question-builder-area" id="nav-q3" role="tabpanel" aria-labelledby="nav-q3-tab">
        </div>
    </div>
    @endif

</div>
</div>

<!-- Edit-questions Tabs End -->


<div class="modal fade equationModal" id="equationModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Insert Equation1</h5>
                <button type="button" class="btn-close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">


                <div class="toolbar" id="toolbar">
                    <button class="tool" data-dd="frac">Frac & Roots1</button>
                    <button class="tool" data-dd="scripts">Exp & Script</button>
                    <button class="tool" data-dd="calculus">Calculus</button>
                    <button class="tool" data-dd="bigops">Sum/Product/Limits</button>
                    <button class="tool" data-dd="sets">Sets</button>
                    <button class="tool" data-dd="relations">Relations</button>
                    <button class="tool" data-dd="arrows">Arrows</button>
                    <button class="tool" data-dd="greeks">Greeks</button>
                    <button class="tool" data-dd="brackets">Brackets</button>
                    <button class="tool" data-dd="matrix">Matrix & Cases</button>
                    <button class="tool" data-dd="funcs">Trig & Log</button>
                    <button class="tool" data-dd="space">Space</button>

                    <div class="dropdown" id="dropdown"></div>
                </div>

                <div class="body">
                    <div class="editor-wrap">
                        <div>
                            <textarea id="equationInput" oninput="renderMath()" class="form-control equationInput" rows="4"></textarea>
                            <!-- <div class="hint">Tip: Click symbols to insert. Use <b>\left(</b> <b>\right)</b> for auto-sized brackets.</div> -->
                        </div>
                        <div class="preview" id="preview"></div>
                    </div>
                </div>

                <div class="footer">
                    <button class="btn" onclick="closeModal()">Close</button>
                    <button type="button" class="btn btn-primary equation-insert-btn" id="insertEquation">Insert</button>
                </div>


            </div>


        </div>
    </div>
</div>
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
    $(document).on(
        'input',
        '.rureraform-admin-popup.active input, .rureraform-admin-popup.active textarea',
        function () {

            if (isProcessing) return;

            isProcessing = true;

            const popup = $('.rureraform-admin-popup.active:visible');

            if (popup.find('.generate-question-code').length) {
                popup.find('.generate-question-code').trigger('click');
            }

            setTimeout(() => {
                isProcessing = false;
            }, 100);
        }
    );

    $(document).on(
        'change',
        '.rureraform-admin-popup select',
        function () {

            if (isProcessing) return;

            isProcessing = true;

            const popup = $('.rureraform-admin-popup.active:visible');

            if (popup.find('.generate-question-code').length) {
                popup.find('.generate-question-code').trigger('click');
            }

            setTimeout(() => {
                isProcessing = false;
            }, 100);
        }
    );




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


    $("body").on("click", ".single-question-layout", function (t) {
        var thisObj = $(this);
        var question_id = $(this).attr('data-question_id');
        var question_index = 1;
        $('.question-builder-area').html('');
        var loaderDiv = $('.tab-content');
        rurera_loader(loaderDiv, 'button');
        $.ajax({
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/admin/questions-generator/generate_question_builder_layout',
            data: {'question_id': question_id, 'question_index': question_index},
            success: function (return_data) {
                rurera_remove_loader(loaderDiv, 'button');
                $('.question-builder-area').html('');
                $('.question-builder-area[data-question_id="'+question_id+'"]').html(return_data);
            }
        });
    });
    if($(".single-question-layout").length > 0){
        $(".single-question-layout").click();
    }

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

<script>
    /* ---------- editor helpers ---------- */
    function openModal(){
        document.getElementById('modal').style.display='block';
        document.getElementById('backdrop').style.display='block';
        renderMath();
    }
    function closeModal(){
        $(".equationModal").modal('hide');
    }
    function insert(val){
        const t=document.getElementById('equationInput');
        t.focus();
        t.setRangeText(val,t.selectionStart,t.selectionEnd,'end');
        renderMath();
    }
    function renderMath(){
        const latex=document.getElementById('equationInput').value;
        document.getElementById('preview').innerHTML='$$'+latex+'$$';
        MathJax.typesetPromise();
    }
    async function copyLatex(){
        const latex=document.getElementById('equationInput').value;
        try{
            await navigator.clipboard.writeText(latex);
            alert('Copied LaTeX to clipboard.');
        }catch(e){
            alert('Copy failed (browser permissions).');
        }
    }
    function clearEditor(){
        document.getElementById('equationInput').value = '';
        renderMath();
    }

    /* ---------- dropdown menus: PRIMARY ONLY ---------- */
    const MENUS = {
        frac: {
            title: "Fractions & Roots",
            sections: [
                {title:"Fractions", items:[
                        {glyph:"\\(\\frac{a}{b}\\)", code:"\\frac{}{}"},
                        {glyph:"\\(\\dfrac{a}{b}\\)", code:"\\dfrac{}{}"},
                        {glyph:"\\(\\tfrac{a}{b}\\)", code:"\\tfrac{}{}"},
                        {glyph:"\\(\\binom{n}{k}\\)", code:"\\binom{n}{k}"}
                    ]},
                {title:"Roots", items:[
                        {glyph:"\\(\\sqrt{x}\\)", code:"\\sqrt{}"},
                        {glyph:"\\(\\sqrt[n]{x}\\)", code:"\\sqrt[]{}"}
                    ]}
            ]
        },
        scripts: {
            title: "Exponents & Scripts",
            sections: [
                {title:"Scripts", items:[
                        {glyph:"\\(x^{n}\\)", code:"^{}"},
                        {glyph:"\\(x_{n}\\)", code:"_{}"},
                        {glyph:"\\(x^{n}_{k}\\)", code:"^{}_{}"},
                        {glyph:"\\(e^{x}\\)", code:"e^{}"}
                    ]},
                {title:"Accents (common)", items:[
                        {glyph:"\\(\\hat{x}\\)", code:"\\hat{}"},
                        {glyph:"\\(\\bar{x}\\)", code:"\\bar{}"},
                        {glyph:"\\(\\vec{x}\\)", code:"\\vec{}"},
                        {glyph:"\\(\\tilde{x}\\)", code:"\\tilde{}"}
                    ]}
            ]
        },
        calculus: {
            title: "Calculus",
            sections: [
                {title:"Integrals", items:[
                        {glyph:"\\(\\int\\)", code:"\\int"},
                        {glyph:"\\(\\int_a^b\\)", code:"\\int_a^b"},
                        {glyph:"\\(\\iint\\)", code:"\\iint"},
                        {glyph:"\\(\\iiint\\)", code:"\\iiint"},
                        {glyph:"\\(\\oint\\)", code:"\\oint"},
                        {glyph:"\\(\\int f(x)\\,dx\\)", code:"\\int f(x)\\,dx"},
                        {glyph:"\\(\\,dx\\)", code:"\\,dx"},
                        {glyph:"\\(\\,dy\\)", code:"\\,dy"}
                    ]},
                {title:"Derivatives", items:[
                        {glyph:"\\(\\frac{d}{dx}\\)", code:"\\frac{d}{dx}"},
                        {glyph:"\\(\\frac{d^2}{dx^2}\\)", code:"\\frac{d^2}{dx^2}"},
                        {glyph:"\\(\\partial\\)", code:"\\partial"},
                        {glyph:"\\(\\frac{\\partial}{\\partial x}\\)", code:"\\frac{\\partial}{\\partial x}"},
                        {glyph:"\\(\\nabla\\)", code:"\\nabla"}
                    ]}
            ]
        },
        bigops: {
            title: "Sum / Product / Limits",
            sections: [
                {title:"Big operators", items:[
                        {glyph:"\\(\\sum_{i=1}^n\\)", code:"\\sum_{i=1}^n"},
                        {glyph:"\\(\\prod_{i=1}^n\\)", code:"\\prod_{i=1}^n"}
                    ]},
                {title:"Limits", items:[
                        {glyph:"\\(\\lim_{x\\to 0}\\)", code:"\\lim_{x\\to 0}"},
                        {glyph:"\\(\\to\\)", code:"\\to"},
                        {glyph:"\\(\\infty\\)", code:"\\infty"}
                    ]}
            ]
        },
        sets: {
            title: "Sets",
            sections: [
                {title:"Operations", items:[
                        {glyph:"\\(\\in\\)", code:"\\in"},
                        {glyph:"\\(\\notin\\)", code:"\\notin"},
                        {glyph:"\\(\\cup\\)", code:"\\cup"},
                        {glyph:"\\(\\cap\\)", code:"\\cap"},
                        {glyph:"\\(\\setminus\\)", code:"\\setminus"},
                        {glyph:"\\(\\subset\\)", code:"\\subset"},
                        {glyph:"\\(\\subseteq\\)", code:"\\subseteq"},
                        {glyph:"\\(\\emptyset\\)", code:"\\emptyset"},
                        {glyph:"\\(\\varnothing\\)", code:"\\varnothing"},
                        {glyph:"\\(A\\times B\\)", code:"A\\times B"}
                    ]},
                {title:"Number sets", items:[
                        {glyph:"\\(\\mathbb{N}\\)", code:"\\mathbb{N}"},
                        {glyph:"\\(\\mathbb{Z}\\)", code:"\\mathbb{Z}"},
                        {glyph:"\\(\\mathbb{Q}\\)", code:"\\mathbb{Q}"},
                        {glyph:"\\(\\mathbb{R}\\)", code:"\\mathbb{R}"},
                        {glyph:"\\(\\mathbb{C}\\)", code:"\\mathbb{C}"}
                    ]}
            ]
        },
        relations: {
            title: "Relations",
            sections: [
                {title:"Comparisons", items:[
                        {glyph:"\\(=\\)", code:"="},
                        {glyph:"\\(\\neq\\)", code:"\\neq"},
                        {glyph:"\\(<\\)", code:"<"},
                        {glyph:"\\(>\\)", code:">"},
                        {glyph:"\\(\\le\\)", code:"\\le"},
                        {glyph:"\\(\\ge\\)", code:"\\ge"}
                    ]},
                {title:"Equivalence / approx", items:[
                        {glyph:"\\(\\approx\\)", code:"\\approx"},
                        {glyph:"\\(\\equiv\\)", code:"\\equiv"},
                        {glyph:"\\(\\propto\\)", code:"\\propto"}
                    ]}
            ]
        },
        arrows: {
            title: "Arrows",
            sections: [
                {title:"Basic", items:[
                        {glyph:"\\(\\to\\)", code:"\\to"},
                        {glyph:"\\(\\rightarrow\\)", code:"\\rightarrow"},
                        {glyph:"\\(\\leftarrow\\)", code:"\\leftarrow"},
                        {glyph:"\\(\\Rightarrow\\)", code:"\\Rightarrow"},
                        {glyph:"\\(\\leftrightarrow\\)", code:"\\leftrightarrow"}
                    ]}
            ]
        },
        greeks: {
            title: "Greek letters (common)",
            sections: [
                {title:"Lowercase", items:[
                        {glyph:"\\(\\alpha\\)", code:"\\alpha"},
                        {glyph:"\\(\\beta\\)", code:"\\beta"},
                        {glyph:"\\(\\gamma\\)", code:"\\gamma"},
                        {glyph:"\\(\\delta\\)", code:"\\delta"},
                        {glyph:"\\(\\epsilon\\)", code:"\\epsilon"},
                        {glyph:"\\(\\varepsilon\\)", code:"\\varepsilon"},
                        {glyph:"\\(\\theta\\)", code:"\\theta"},
                        {glyph:"\\(\\lambda\\)", code:"\\lambda"},
                        {glyph:"\\(\\mu\\)", code:"\\mu"},
                        {glyph:"\\(\\pi\\)", code:"\\pi"},
                        {glyph:"\\(\\sigma\\)", code:"\\sigma"},
                        {glyph:"\\(\\phi\\)", code:"\\phi"},
                        {glyph:"\\(\\varphi\\)", code:"\\varphi"},
                        {glyph:"\\(\\omega\\)", code:"\\omega"}
                    ]}
            ]
        },
        brackets: {
            title: "Brackets & Absolute Value",
            sections: [
                {title:"Basic", items:[
                        {glyph:"\\((\\;)\\)", code:"()"},
                        {glyph:"\\([\\;]\\)", code:"[]"},
                        {glyph:"\\(\\{\\;\\}\\)", code:"\\{\\}"},
                        {glyph:"\\(|\\;|\\)", code:"||"},
                        {glyph:"\\(\\langle\\;\\rangle\\)", code:"\\langle\\rangle"}
                    ]},
                {title:"Auto-sized", items:[
                        {glyph:"\\(\\left(\\;\\right)\\)", code:"\\left(\\right)"},
                        {glyph:"\\(\\left[\\;\\right]\\)", code:"\\left[\\right]"},
                        {glyph:"\\(\\left\\{\\;\\right\\}\\)", code:"\\left\\{\\right\\}"},
                        {glyph:"\\(\\left|\\;\\right|\\)", code:"\\left|\\right|"},
                        {glyph:"\\(\\left\\langle\\;\\right\\rangle\\)", code:"\\left\\langle\\right\\rangle"}
                    ]}
            ]
        },
        matrix: {
            title: "Matrix & Cases",
            sections: [
                {title:"Matrices", items:[
                        {glyph:"\\(\\begin{pmatrix}a&b\\\\c&d\\end{pmatrix}\\)", code:"\\begin{pmatrix}\n \n\\end{pmatrix}"},
                        {glyph:"\\(\\begin{bmatrix}a&b\\\\c&d\\end{bmatrix}\\)", code:"\\begin{bmatrix}\n \n\\end{bmatrix}"}
                    ]},
                {title:"Piecewise", items:[
                        {glyph:"\\(\\begin{cases}a,&x>0\\\\b,&x\\le 0\\end{cases}\\)", code:"\\begin{cases}\n \n\\end{cases}"}
                    ]}
            ]
        },
        funcs: {
            title: "Trig & Log",
            sections: [
                {title:"Functions", items:[
                        {glyph:"\\(\\sin\\)", code:"\\sin"},
                        {glyph:"\\(\\cos\\)", code:"\\cos"},
                        {glyph:"\\(\\tan\\)", code:"\\tan"},
                        {glyph:"\\(\\ln\\)", code:"\\ln"},
                        {glyph:"\\(\\log\\)", code:"\\log"}
                    ]}
            ]
        },
        space: {
            title: "Spacing (minimum)",
            sections: [
                {title:"Spaces", items:[
                        {glyph:"\\(a\\,b\\)", code:"\\,"},
                        {glyph:"\\(a\\quad b\\)", code:"\\quad"},
                        {glyph:"\\(a\\!b\\)", code:"\\!"}
                    ]}
            ]
        }
    };

    /* ---------- dropdown rendering ---------- */
    const dropdown = document.getElementById('dropdown');
    const toolbar = document.getElementById('toolbar');

    function showDropdown(menuKey, anchorBtn) {
        const menu = MENUS[menuKey];
        if (!menu) return;

        // Render first so width/height are known
        dropdown.innerHTML = renderMenu(menu);
        dropdown.classList.add('show');

        const btnRect = anchorBtn.getBoundingClientRect();
        const barRect = toolbar.getBoundingClientRect();
        const ddRect  = dropdown.getBoundingClientRect();

        const GAP = 8; // spacing from button / edges

        /* ---------- vertical position (below button) ---------- */
        let top = btnRect.bottom - barRect.top + GAP;
        dropdown.style.top = `${top}px`;

        /* ---------- horizontal position (auto-adjust) ---------- */
        let left = btnRect.left - barRect.left;

        const minLeft = GAP;
        const maxLeft = toolbar.clientWidth - ddRect.width - GAP;

        // Clamp inside toolbar
        left = Math.max(minLeft, Math.min(left, maxLeft));

        dropdown.style.left = `${left}px`;

        MathJax.typesetPromise([dropdown]);
    }

    function hideDropdown(){
        dropdown.classList.remove('show');
        document.querySelectorAll('.tool.active').forEach(b=>b.classList.remove('active'));
    }

    function renderMenu(menu){
        const sections = menu.sections.map(sec => {
            const items = sec.items.map(it => `
      <button class="sym" type="button" onclick="insert('${escapeForJS(it.code)}');hideDropdown();">
        <div class="glyph">${it.glyph}</div>
        <div class="code">${escapeHTML(it.code)}</div>
      </button>
    `).join('');
            return `
      <div class="dd-section">
        <h4>${escapeHTML(sec.title)}</h4>
        <div class="dd-grid">${items}</div>
      </div>
    `;
        }).join('');

        return `
    <div class="dd-title">${escapeHTML(menu.title)}</div>
    ${sections}
  `;
    }

    function escapeHTML(s){
        return (s||'')
            .replaceAll('&','&amp;')
            .replaceAll('<','&lt;')
            .replaceAll('>','&gt;')
            .replaceAll('"','&quot;')
            .replaceAll("'","&#39;");
    }
    function escapeForJS(s){
        return (s||'')
            .replaceAll('\\','\\\\')
            .replaceAll("'","\\'")
            .replaceAll('\n','\\n');
    }

    /* ---------- toolbar interactions ---------- */
    toolbar.addEventListener('click', (e) => {
        const btn = e.target.closest('.tool');
        if(!btn) return;

        const key = btn.getAttribute('data-dd');
        const isActive = btn.classList.contains('active');

        hideDropdown();
        if(!isActive){
            btn.classList.add('active');
            showDropdown(key, btn);
        }
    });

    document.addEventListener('click', (e) => {
        const inToolbar = e.target.closest('#toolbar');
        const inDropdown = e.target.closest('#dropdown');
        if(!inToolbar && !inDropdown) hideDropdown();
    });

    /* initial preview */
    renderMath();
</script>

@endpush
