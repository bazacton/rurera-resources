<form action="/admin/questions-generator/generate-bulk-list" method="POST" id="generate-bulk-list-form" class="px-25 generate-bulk-list-form">
    @csrf

    <input type="hidden" name="bulk_id" value="{{isset($QuestionsBulkListObj->id)? $QuestionsBulkListObj->id : 0}}">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <h2 class="font-20 font-weight-bold mb-15">Generate Bulk Questions List</h2>
                </div>

                <div class="col-md-3 col-lg-3">
                    <div class="form-group ">
                        <label class="input-label d-block">Quiz Title</label>
                        <input type="text" name="quiz_title" value="{{isset($quizObj->id)? $quizObj->getTitleAttribute() : ''}}" class="form-control rurera-req-field">
                    </div>
                </div>



                <div class="col-md-3 col-lg-3">
                    <div class="form-group ">
                        <label class="input-label d-block">Quiz Slug</label>
                        <input type="text" name="quiz_slug" value="{{isset($quizObj->id)? $quizObj->quiz_slug : ''}}" class="form-control">
                    </div>
                </div>

                <div class="col-md-3 col-lg-3">
                    <div class="form-group ">
                        <label class="input-label d-block">Auto Generated Questions</label>
                        <select name="mock_type"
                                class="form-control conditional_field_parent" data-placeholder="Select Type">
                            @php $selected = (isset($quizObj->id) && $quizObj->mock_type == 'mock_practice')? 'selected' : ''; @endphp
                            <option data-target_common_class="practice_type_fields" data-target_field_class="mock_practice_fields" value="mock_practice" {{$selected}}>Yes</option>
                            @php $selected = (isset($quizObj->id) && $quizObj->mock_type == 'mock_exam')? 'selected' : ''; @endphp
                            <option data-target_common_class="practice_type_fields" data-target_field_class="" value="mock_exam" {{$selected}}>No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3">
                    <div class="form-group">
                        <label class="input-label">Exam Category</label>
                        <select name="list_sub_type" data-plugin-selectTwo class="form-control populate list_sub_type ">
                            @php $selected = (isset($quizObj->id) && $quizObj->quiz_type == 'sats')? 'selected' : ''; @endphp
                            <option value="sats" {{$selected}}>Sats</option>
                            @php $selected = (isset($quizObj->id) && $quizObj->quiz_type == '11plus')? 'selected' : ''; @endphp
                            <option value="11plus" {{$selected}}>11plus</option>
                            @php $selected = (isset($quizObj->id) && $quizObj->quiz_type == 'independent_exams')? 'selected' : ''; @endphp
                            <option value="independent_exams" {{$selected}}>Independent Exams</option>
                            @php $selected = (isset($quizObj->id) && $quizObj->quiz_type == 'iseb')? 'selected' : ''; @endphp
                            <option value="iseb" {{$selected}}>Iseb</option>
                            @php $selected = (isset($quizObj->id) && $quizObj->quiz_type == 'cat4')? 'selected' : ''; @endphp
                            <option value="cat4" {{$selected}}>Cat 4</option>
                            @php $selected = (isset($quizObj->id) && $quizObj->quiz_type == 'progress_test')? 'selected' : ''; @endphp
                            <option value="progress_test" {{$selected}}>Progress Test</option>
                        </select>
                    </div>
                </div>




                <div class="col-md-12 col-lg-12">
                    <div class="form-group quiz-image-group">
                        <label class="input-label d-block mb-3">Quiz Image</label>

                        <div class="d-flex align-items-center gap-3">


                            <!-- Upload Button (Your Existing Button) -->
                            <button
                                type="button"
                                class="btn upload-btn rurera-file-manager"
                                data-input="image"
                                data-preview="preview_img-image"
                                data-image_attr='{
																					"upload_type":"gallery",
																					"upload_dir":"public",
																					"upload_path":"/quiz",
																					"is_multiple":false,
																					"preview_div":"preview_img-image",
																					"hidden_field":"<input name=\"quiz_image\" type=\"hidden\" id=\"quiz_image\" placeholder=\"Upload Image\">",
																					"field_name":"quiz_image"
																				}'
                                data-gallery_fields='{"gallery_type":"gallery","folder_name":"quiz"}'
                            >
                                <i class="fa fa-upload me-2"></i> Upload Image
                            </button>

                            <!-- Remove Button -->

                            <button type="button" class="btn remove-btn" id="remove-quiz-image">
                                <i class="fa fa-trash me-2"></i> Remove
                            </button>
                        </div>

                        <!-- Preview -->
                        <div class="preview_img-image mt-3"></div>

                        <!-- Hidden Field -->
                        <input name="quiz_image" type="hidden" id="quiz_image">

                        <!-- Support Text -->
                        <small class="text-muted d-block mt-2">
                            Supports Only: PNG, JPEG, JPG (Under 500KB)
                        </small>
                    </div>


                    <div class="form-group rurera-hide">
                        <label class="input-label">Quiz Image</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button
                                    type="button"
                                    class="input-group-text rurera-file-manager"
                                    data-input="image"
                                    data-preview="preview_img-image"
                                    data-image_attr='{
																						"upload_type":"gallery",
																						"upload_dir":"public",
																						"upload_path":"/quiz",
																						"is_multiple":false,
																						"preview_div":"preview_img-image",
																						"hidden_field":"<input name=\"quiz_image\" type=\"hidden\" id=\"quiz_image\" placeholder=\"Upload Image\">",
																						"field_name":"quiz_image"
																					}'
                                    data-gallery_fields='{"gallery_type":"gallery","folder_name":"quiz"}'
                                >
                                    <i class="fa fa-upload"></i>
                                </button>
                                <div class="preview_img-image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="questions_bulk_list-tabs rurera-webinar-tabs">
                        <ul class="nav" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="questions_bulk2-tab" data-toggle="tab" data-target="#questions_bulk2" type="button" role="tab" aria-controls="questions_bulk2" aria-selected="false">Sections</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="topic_parts-tab" data-toggle="tab" data-target="#topic_parts" type="button" role="tab" aria-controls="topic_parts" aria-selected="true">Topic Parts</button>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade " id="topic_parts" role="tabpanel" aria-labelledby="topic_parts-tab">
                                <div class="row">
                                    <div class="col-md-4 col-lg-4 ">
                                        <div class="form-group">
                                            <label class="input-label">{{trans('admin/main.category')}}</label>
                                            <select name="category_id" data-plugin-selectTwo class="rurera-req-field form-control populate mock-category-field ajax-category-courses1" data-course_id="{{isset($QuestionsBulkListObj->id)? $QuestionsBulkListObj->subject_id : 0}}" data-next_index="subject_id" data-next_value="">
                                                <option value="">{{trans('admin/main.all_categories')}}</option>
                                                @foreach($categories as $category)
                                                    @if(!empty($category->subCategories) and count($category->subCategories))
                                                        <optgroup label="{{  $category->title }}">
                                                            @foreach($category->subCategories as $subCategory)

                                                                @php $selected = (isset($QuestionsBulkListObj->id) && $QuestionsBulkListObj->category_id == $subCategory->id)? 'selected' : ''; @endphp

                                                                <option value="{{ $subCategory->id }}" {{$selected}}>{{ $subCategory->title }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    @else
                                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-12 subjects-listing-data practice_type_fields mock_practice_fields">

                                    </div>
                                    <div class="col-12">
                                        <div class="practice-quiz-topics-list practice_type_fields mock_practice_fields"></div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="questions_bulk2" role="tabpanel" aria-labelledby="profile-tab">



                                <div class="d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="mb-2">

                                        <button type="button" class="btn btn-primary btn-sm ml-2" id="mockExam-addOneBtn">
                                            + Add Section
                                        </button>
                                    </div>
                                </div>



                                <div class="mt-3">

                                    @php $mock_practice_questions = isset($quizObj->id)? json_decode($quizObj->mock_practice_questions) : (object) array();

                                    @endphp




                                    <div id="mockExam-sectionsContainer"></div>


                                    @if(empty($mock_practice_questions))
                                    <div id="mockExam-noSectionsNote" class="mock-exam-empty-note mt-3" style="display:none;">
                                        No sections yet. Click <b>Create multiple shortlist Sections</b> or <b>+ Add Section</b>.
                                    </div>
                                    @endif
                                </div>



                                <!-- =========================
                                    HTML TEMPLATES (CLONE)
                                    ========================= -->
                                <div id="mockExam-templates">
                                    <!-- Item row template -->
                                    <div class="mockExam-tpl-item-row mock-exam-item-row d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="font-weight-600 mockExam-tpl-item-title"></div>
                                            <div class="mock-exam-small-help mockExam-tpl-item-meta"></div>
                                        </div>
                                        <div class="d-flex align-items-center mockExam-tpl-item-actions">
                                            <button type="button" class="btn btn-outline-primary mock-exam-icon-btn mockExam-tpl-plus-btn">+</button>
                                            <button type="button" class="btn btn-outline-danger mock-exam-icon-btn ml-2 mock-exam-btn-remove-main mockExam-tpl-remove-btn">×</button>
                                        </div>
                                    </div>

                                    <!-- Assigned item template -->
                                    <div class="mockExam-tpl-assigned-item mock-exam-assigned-item">
                                        <div class="mockExam-tpl-assigned-title"></div>
                                        <div class="mock-exam-rm mockExam-tpl-assigned-remove" title="Remove">×</div>
                                    </div>

                                    <!-- Section card template (builder modal + sections list) -->
                                    <div class="mockExam-tpl-section-card mock-exam-section-card mb-3" data-section-id="">
                                        <div class="card-header d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <span class="mock-exam-drag-handle mr-2 text-muted" title="Drag to reorder">≡</span>
                                                <span class="badge badge-light mock-exam-section-label-badge mr-2 mockExam-tpl-section-label"></span>
                                                <span class="font-weight-600 mockExam-tpl-section-title"></span>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-sm btn-outline-secondary mr-2 mockExam-tpl-section-edit" type="button">Edit</button>
                                                <button type="button" class="btn btn-sm btn-outline-danger mockExam-tpl-section-delete" type="button">Delete</button>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="row rurera-hide">
                                                <div class="col-md-6">
                                                    <div class="mock-exam-small-help mb-1">Name</div>
                                                    <div class="mb-2 mockExam-tpl-section-name"></div>

                                                    <div class="mock-exam-small-help mb-1">Instructions</div>
                                                    <div class="mb-2 mockExam-tpl-section-instr"></div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="d-flex">
                                                        <div class="mr-3">
                                                            <div class="mock-exam-small-help mb-1">No. of questions</div>
                                                            <div class="mb-2 mockExam-tpl-section-q"></div>
                                                        </div>
                                                        <div>
                                                            <div class="mock-exam-small-help mb-1">Time (mins)</div>
                                                            <div class="mb-2 mockExam-tpl-section-t"></div>
                                                        </div>
                                                    </div>

                                                    <hr class="my-2">

                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div>
                                                            <div class="mock-exam-small-help mb-1">Items in this section</div>
                                                            <div class="mock-exam-small-help">Use <b>+</b> on the main page to add items.</div>
                                                        </div>
                                                        <span class="mock-exam-pill"><span class="mockExam-tpl-section-count"></span> items</span>
                                                    </div>

                                                    <div class="mt-2 mockExam-tpl-section-items"></div>
                                                </div>
                                            </div>
                                            <div class="mock-exam-section-table">
                                                <table>
                                                    <thead>
                                                    <tr>
                                                        <th>
                                                            <div class="mock-exam-small-help mb-1">Items in this section</div>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="align-items-center justify-content-between rurera-hide">
                                                                <div>
                                                                    <div class="mock-exam-small-help">Use <b>+</b> on the main page to add items.</div>
                                                                </div>
                                                                <span class="mock-exam-pill"><span class="mockExam-tpl-section-count"></span> items</span>
                                                            </div>
                                                            <div class="mockExam-tpl-section-items"></div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Assign modal section card template -->
                                    <div class="mockExam-tpl-assign-section mock-exam-section-card mb-3" data-section-id="">
                                        <div class="card-header d-flex align-items-center justify-content-between">
                                            <div>
                                                <span class="badge badge-light mock-exam-section-label-badge mr-2 mockExam-tpl-assign-label"></span>
                                                <span class="font-weight-600 mockExam-tpl-assign-title"></span>
                                                <span class="mock-exam-pill ml-2"><span class="mockExam-tpl-assign-count"></span> items</span>
                                            </div>
                                            <button type="button" class="btn btn-sm mockExam-tpl-assign-btn" type="button">Add selected item</button>
                                        </div>
                                        <div class="card-body">
                                            <div class="mock-exam-small-help mb-2 mockExam-tpl-assign-instr"></div>
                                            <div class="mock-exam-small-help mb-2 mockExam-tpl-assign-meta"></div>
                                            <div class="mockExam-tpl-assign-items"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="inactivity-controls">
            <button type="submit" class="submit-btn mt-0">Generate List</button>
            <!-- <a href="javascript:;" class="close" data-dismiss="modal" aria-label="Continue">Close</a> -->
        </div>
        <form>





            <script>
                window.mockExam.init();
                $(".mock-category-field").change();
            </script>
