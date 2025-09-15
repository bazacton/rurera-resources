@extends('admin.layouts.app')

@push('styles_top')
    <link href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
    <link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
@endpush


@section('content')
    <section class="section upload-path-rurera" data-location="topic_parts/{{isset( $TopicParts->id )? $TopicParts->id : 0}}">
        <div class="section-header">
            <h1>{{!empty($TopicParts) ? $TopicParts->title : trans('admin/main.new').' Topic Parts' }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/admin/">{{ trans('admin/main.dashboard') }}</a>
                </div>
                <div class="breadcrumb-item active"><a href="/admin/topics_parts">Topic Parts</a>
                </div>
                <div class="breadcrumb-item">{{!empty($TopicParts) ? $TopicParts->title : trans('admin/main.new') }}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">

                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="topic-parts-form" action="/admin/topics_parts/{{ !empty($TopicParts) ? $TopicParts->id.'/store' : 'store' }}"
                                  method="Post">
                                {{ csrf_field() }}


								<div class="row">

								<div class="col-6 col-md-6 col-lg-6">






								<div id="imagesBlock" class="form-group mt-15">
									<label class="input-label mb-0">{{ trans('update.images') }}</label>

									<div class="main-row input-group product-images-input-group mt-2">
										<div class="input-group-prepend">
											<button type="button" class="input-group-text admin-file-manager" data-input="images_record" data-preview="holder">
												<i class="fa fa-upload"></i>
											</button>
										</div>
										<input type="text" name="topic_images[]" id="images_record" value="" class="form-control" placeholder=""/>

										<button type="button" class="btn btn-primary btn-sm add-image-btn">
											<i class="fa fa-plus"></i>
										</button>
									</div>
									@php $topic_images = isset( $TopicParts->topic_part_images )? json_decode($TopicParts->topic_part_images) : array(); @endphp
									@if(!empty($topic_images))
										@foreach($topic_images as $image_key => $image_path)
											<div class="input-group product-images-input-group mt-2">
												<div class="input-group-prepend">
													<button type="button" class="input-group-text admin-file-manager" data-input="images_{{ $image_key }}" data-preview="holder">
														<i class="fa fa-upload"></i>
													</button>
												</div>
												<input type="text" name="topic_images[]" id="images_{{ $image_key }}" value="{{ $image_path }}" class="form-control" placeholder=""/>

												<button type="button" class="btn btn-sm btn-danger remove-image-btn">
													<i class="fa fa-times"></i>
												</button>
											</div>
										@endforeach
									@endif


									@error('images')
									<div class="invalid-feedback d-block">
										{{ $message }}
									</div>
									@enderror
								</div>














								@if($TopicParts->category_id == 0 )
                                <div class="form-group">
                                    <label>{{ trans('/admin/main.category')  }}</label>
                                    <select class="form-control @error('category_id') is-invalid @enderror ajax-category-courses" name="category_id" data-course_id="{{isset( $TopicParts->subject_id )? $TopicParts->subject_id : 0}}">
                                        <option {{ !empty($trend) ? '' : 'selected' }} disabled>{{ trans('admin/main.choose_category')  }}</option>

                                        @foreach($categories as $category)
                                            @if(!empty($category->subCategories) and count($category->subCategories))
                                                <optgroup label="{{  $category->title }}">
                                                    @foreach($category->subCategories as $subCategory)
                                                        <option value="{{ $subCategory->id }}" @if(!empty($TopicParts) and $TopicParts->category_id == $subCategory->id) selected="selected" @endif>{{ $subCategory->title }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @else
                                                <option value="{{ $category->id }}" class="font-weight-bold" @if(!empty($TopicParts) and $TopicParts->category_id == $category->id) selected="selected" @endif>{{ $category->title }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Subjects</label>
                                    <select data-return_type="option"
                                            data-default_id="{{isset( $TopicParts->subject_id)? $TopicParts->subject_id : 0}}" data-chapter_id="{{isset( $TopicParts->chapter_id )? $TopicParts->chapter_id : 0}}"
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

								<div class="form-group">
									<label class="input-label">Topic</label>
									<select data-sub_chapter_id="{{isset( $TopicParts->sub_chapter_id ) ? $TopicParts->sub_chapter_id : 0}}" id="chapter_id"
											class="form-control populate ajax-chapter-dropdown @error('chapter_id') is-invalid @enderror"
											name="chapter_id" data-disabled="{{isset($already_created_subtopics)? json_encode($already_created_subtopics) : ''}}">
										<option value="">Please select year, subject</option>
									</select>
									@error('chapter_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

								</div>

								<div class="form-group">
									<label class="input-label">Sub Topic</label>
									<select id="chapter_id"
										class="form-control populate ajax-subchapter-dropdown @error('sub_chapter_id') is-invalid @enderror"
										name="sub_chapter_id" >
									<option value="">Please select year, subject, Topic</option>
								</select>
								@error('sub_chapter_id')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror

								<p>The disable sub-topic has already been created and cannot be created again.</p>
								</div>

								@else
									<input type="hidden" name="category_id" value="{{$TopicParts->category_id}}">
								<input type="hidden" name="subject_id" value="{{$TopicParts->subject_id}}">
								<input type="hidden" name="chapter_id" value="{{$TopicParts->chapter_id}}">
								<input type="hidden" name="sub_chapter_id" value="{{$TopicParts->sub_chapter_id}}">
								@endif

								</div>

								<div class="col-6 col-md-6 col-lg-6">


								</div>
								</div>

								<div class="text-left">
									<button class="btn btn-primary">Save Data</button>
								</div>
								@if($TopicParts->category_id > 0 )
                                <div class="text-right mt-4">
										<a href="javascript:;" class="btn btn-primary add-part-modal">Add New Part</a>
                                </div>
								@endif


								@if($TopicParts->category_id > 0 )
								<div class="table-responsive">
									<table class="table table-striped font-14">
										<tbody class="sortTable">
											<tr>
												<th class="text-left">Title</th>
												<th class="text-left">Difficulty Level</th>
												<th class="text-left">Text Part</th>
												<th class="text-left">No of Questions</th>
												<th>Actions</th>
											</tr>


											@if( $TopicParts->topicSubParts->count() > 0)
												@foreach( $TopicParts->topicSubParts as $topicSubPartObj)
													@php $part_questions_count = $topicSubPartObj->topicPartItemQuestions->count();
													$part_title = isset( $topicSubPartObj->title )? $topicSubPartObj->title : '';
													$part_text = isset( $topicSubPartObj->description )? $topicSubPartObj->description : '';
													$part_difficulty_level = isset( $topicSubPartObj->difficulty_level )? $topicSubPartObj->difficulty_level : '';
													@endphp
													<tr data-id="{{$topicSubPartObj->id}}">
														<td class="text-left part_title">{{$part_title}}</td>
														<td class="text-left difficulty_level">{{$part_difficulty_level}}</td>
														<td class="text-left part_text">{{$part_text}}</td>
														<td class="text-left">{{ $part_questions_count}}</td>
														<td>
															<input type="hidden" name="topic_parts_sort[]" value="{{$topicSubPartObj->id}}">
															<a href="javascript:;" class="btn-transparent btn-sm text-primary edit-part-modal" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
															@if( $part_questions_count == 0 || auth()->user()->isAdminRole())
																<a href="javascript:;" class="rurera-hide btn-transparent btn-sm text-primary edit-part-modal" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
															@endif
															@if( $part_questions_count == 0)
																@include('admin.includes.delete_button',['url' => '/admin/topics_parts/'.$topicSubPartObj->id.'/delete_subpart' , 'btnClass' => 'btn-sm'])
															@endif
														</td>
													</tr>
												@endforeach
											@endif

										</tbody>
									</table>
								</div>
								@endif






								<div id="add-part-modal-box" class="modal fade question_edit_part_modal" role="dialog" data-backdrop="static">
									<div class="modal-fullscreen modal-dialog" style="max-width:100%">
										<div class="modal-content">
											<div class="modal-body">

												<div class="row">

													<div class="col-12 col-md-12 col-lg-12">

														@if($TopicParts->category_id > 0 )
															<div class="form-group">
																<label>Paragraph</label>
																<textarea class="form-control @error('paragraph') is-invalid @enderror" rows="10" name="paragraph" id="inputTextarea" placeholder="Enter the paragraph here..."></textarea>
															</div>

															<button class="btn btn-primary" id="splitTextBtn" onclick="processData()" type="button">Make Part</button>
															<button class="btn btn-success rurera-hide" id="addMoreBtn" type="button">Add More</button>
														@endif

													</div>
													<div class="col-12 col-md-12 col-lg-12">
														@if($TopicParts->category_id > 0 )

															<div id="dynamicContainer" class="mt-4">
																<div class="row fw-bold text-center p-2 bg-secondary text-white border rounded">
																	<div class="col-1">Serial</div>
																	<div class="col-2">Difficulty Level</div>
																	<div class="col-3">Title</div>
																	<div class="col-4">Description</div>
																	<div class="col-2">Actions</div>
																</div>
															</div>
														@endif
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<div class="text-right">
													<button class="btn btn-primary">{{ trans('admin/main.submit') }}</button>
												</div>
												<button type="button" class="btn btn-default close-modal-box" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>




                            </form>

							<div id="edit-part-modal-box" class="modal fade" role="dialog" data-backdrop="static">
									<div class="modal-dialog">
										<div class="modal-content">
										<form class="topic-subparts-form" action="/admin/topics_parts/update_topic_sub_part"
                                  method="Post">
								  {{ csrf_field() }}
											<div class="modal-body">


												<input type="hidden" class="topic_part_item_id" name="topic_part_item_id" value="0">
												<input type="hidden" class="topic_part_id" name="topic_part_id" value="{{$TopicParts->id}}">
												<div class="form-group">
													<label>Title</label>
													<input type="text" name="title" data-id="0" class="form-control part-part_title">
												</div>
												<div class="form-group">
													<label>Difficulty Level</label>
													<select data-id="0" class="select2 part-difficulty_level"
															id="difficulty_level" name="difficulty_level">
														<option value="Easy">Easy</option>
														<option value="Moderate">Moderate</option>
														<option value="Hard">Hard</option>
													</select>
													@error('subject_id')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
													@enderror
												</div>

												<div class="form-group">
													<label>Paragraph</label>
													<textarea data-id="0" name="description" class="form-control part-paragraph" rows="10" placeholder="Enter the paragraph here..."></textarea>
												</div>

											</div>
											<div class="modal-footer">
												<div class="text-right">
													<button type="button" class="part-edit-submit btn btn-primary">{{ trans('admin/main.submit') }}</button>
												</div>
												<button type="button" class="btn btn-default close-modal-box" data-dismiss="modal">Close</button>
											</div>
											</form>
										</div>
									</div>
								</div>
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
    <script src="/assets/default/js/admin/new-images.js"></script>


<script>

	function generateUniqueId() {
            return Math.floor(10000 + Math.random() * 90000).toString(); // Generate a 5-digit unique ID
        }

        function processData() {
            const textarea = document.getElementById("inputTextarea");
            const pastedData = textarea.value.trim();
            const container = document.getElementById("dynamicContainer");

            // Clear previous dynamically generated rows
            container.querySelectorAll(".row-container").forEach(row => row.remove());

            // Split the pasted data by new lines and then by tab characters
            const rows = pastedData.split("\n");
            rows.forEach((row, index) => {
                const columns = row.split("\t");
                const uniqueId = generateUniqueId(); // Generate but hide this ID
                const serialNumber = index + 1;
                const difficultyLevel = columns[0]?.trim().toLowerCase(); // Difficulty is the first column

                // Create a container div for each row
                const rowContainer = document.createElement("div");
                rowContainer.className = "row row-container align-items-center text-center border rounded mt-2 p-2";
                rowContainer.id = uniqueId;


                // Serial number
                const serialDiv = document.createElement("div");
                serialDiv.className = "col-1";
                serialDiv.textContent = serialNumber;

                // Difficulty level dropdown
                const difficultySelect = document.createElement("select");
                difficultySelect.className = "form-control";
				difficultySelect.name = "topic_part["+uniqueId+"][difficulty_level]";

                // Difficulty options
                ["Easy", "Moderate", "Hard"].forEach(option => {
                    const opt = document.createElement("option");
                    opt.value = option;
                    opt.textContent = option;

                    // Match difficulty level ignoring case and extra spaces
                    if (difficultyLevel === option.toLowerCase()) {
                        opt.selected = true;
                    }
                    difficultySelect.appendChild(opt);
                });

                const difficultyDiv = document.createElement("div");
                difficultyDiv.className = "col-2";
                difficultyDiv.appendChild(difficultySelect);

                // Title field
                const titleField = document.createElement("input");
                titleField.type = "text";
                titleField.className = "form-control";
                titleField.placeholder = "Title";
                titleField.name = "topic_part["+uniqueId+"][title]";
                titleField.value = columns[1] || ""; // Title is the second column

                const titleDiv = document.createElement("div");
                titleDiv.className = "col-3";
                titleDiv.appendChild(titleField);

                // Description field (textarea)
                const descriptionField = document.createElement("textarea");
                descriptionField.className = "form-control";
                descriptionField.placeholder = "Description";
				descriptionField.name = "topic_part["+uniqueId+"][text]";
                descriptionField.value = columns[2] || ""; // Description is the third column
                descriptionField.rows = 2;

                const descriptionDiv = document.createElement("div");
                descriptionDiv.className = "col-4";
                descriptionDiv.appendChild(descriptionField);

                // Delete button
                const deleteButton = document.createElement("button");
                deleteButton.type = "button";
                deleteButton.className = "btn btn-danger btn-sm";
                deleteButton.textContent = "Delete";
                deleteButton.onclick = () => deleteRow(uniqueId);

                const actionDiv = document.createElement("div");
                actionDiv.className = "col-2";
                actionDiv.appendChild(deleteButton);

                // Append all elements to the row container
                rowContainer.appendChild(serialDiv);
                rowContainer.appendChild(difficultyDiv);
                rowContainer.appendChild(titleDiv);
                rowContainer.appendChild(descriptionDiv);
                rowContainer.appendChild(actionDiv);

                // Append the row container to the main container
                container.appendChild(rowContainer);
            });
        }


		function deleteRow(rowId) {
            const row = document.getElementById(rowId);
            if (row) {
                row.remove();
            }
        }




	$("body").on("click", ".add-part-modal", function (t) {
		$("#inputText").val('');
		$("#sortableTableBody").html('');
        $("#add-part-modal-box").modal('show');
    });

	$("body").on("click", ".edit-part-modal", function (t) {
		var part_paragraph = $(this).closest('tr').find('.part_text').html();
		var part_difficulty_level = $(this).closest('tr').find('.difficulty_level').html();
		var part_title = $(this).closest('tr').find('.part_title').html();
		var unique_id  = $(this).closest('tr').attr('data-id');
		$(".part-paragraph").attr('data-id', unique_id);
		$(".part-paragraph").val(part_paragraph);
		$(".part-difficulty_level").attr('data-id', unique_id);
		$(".part-part_title").attr('data-id', unique_id);
		$('.part-part_title').val(part_title);
		$('.part-difficulty_level').val(part_difficulty_level).trigger('change');
		$('.topic_part_item_id').val(unique_id);
		$("#edit-part-modal-box").modal('show');
	});


	$("body").on("click", ".part-edit-submit", function (t) {
		$(".topic-subparts-form").submit();
	});


	$("body").on("click", ".close-modal-box", function (t) {
		$(this).closest('.modal').modal('hide');

	});




	$("body").on("click", ".remove-row-tr", function (t) {
        $(this).closest('tr').remove();
    });





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
            <td><select name="topic_part[${uniqueID}][difficulty_level]"><option value="Easy">Easy</option><option value="Moderate" selected>Moderate</option><option value="Hard">Hard</option></select></td>
            <td><textarea name="topic_part[${uniqueID}][text]">${part}</textarea></td>
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
		//const parts = [inputText];


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


</script>
<script type="text/javascript">

    $(document).ready(function () {
		$(".sortTable").sortable({
				items: "tr:not(:first-child)",  // Exclude the first row from sorting
				placeholder: "ui-sortable-placeholder",
				helper: "clone"
			});
		$(".sortTable").disableSelection();

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
            var category_id = $(".ajax-category-courses").val();
			$.ajax({
				type: "GET",
				url: '/admin/webinars/sub_chapters_by_chapter',
				data: {'category_id': category_id, 'chapter_id': chapter_id, 'sub_chapter_id': sub_chapter_id, 'disabled_items': disabled_items},
				success: function (return_data) {
					$(".ajax-subchapter-dropdown").html(return_data);
				}
			});
		});
        $(".ajax-category-courses").change();

    });


</script>
@endpush
