@extends('admin.layouts.app')

@push('libraries_top')

@endpush
@php $rand_id = rand(999,99999); @endphp
@push('styles_top')

    <link rel="stylesheet" href="/assets/admin/css/teacher-style.css">
    <link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="/assets/default/css/quiz-create.css?ver={{$rand_id}}">

    <link href="/assets/default/css/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="/assets/default/css/responsive.css?ver={{$rand_id}}">
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

@section('content')
    <section class="section">

        <form action="/admin/custom_quiz/{{ !empty($assignment) ? $assignment->id.'/store' : 'store' }}"
              method="Post" class="custom_quiz_form" enctype="multipart/form-data">
            {{ csrf_field() }}
        <div class="section-body skeleton">
            <div class="row">
                <div class="col-12 col-md-9 col-lg-9 mx-auto">

                    <!-- Modal -->
                    <div class="modal fade" id="dragModal" tabindex="-1" role="dialog" aria-labelledby="dragModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="dragModalLabel">Draggable Grid</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="grid-container" id="gridContainer">
                                        <!-- Grid Items -->
                                        <div class="grid-item" draggable="true">1</div>
                                        <div class="grid-item" draggable="true">2</div>
                                        <div class="grid-item" draggable="true">3</div>
                                        <div class="grid-item" draggable="true">4</div>
                                        <div class="grid-item" draggable="true">5</div>
                                        <div class="grid-item" draggable="true">6</div>
                                        <div class="grid-item" draggable="true">7</div>
                                        <div class="grid-item" draggable="true">8</div>
                                        <div class="grid-item" draggable="true">9</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="elements-holder bg-white panel-border rounded-sm p-15 mb-30 create-element-box">
                        <div class="questions-header">
                            <div class="questions-header-inner">
                                <div class="text-holder skelton-hide">
                                    <h5 class="font-16 font-weight-bold">
                                        <span>{!! $assignment->getTitleAttribute(); !!}</span>
                                        <button type="button" data-toggle="modal" data-target="#general-knowledge-modal" class="edit-control"><img src="/assets/default/svgs/edit-simple.svg" alt="file-image"></button>
                                    </h5>
                                </div>
                                <div class="questions-header-controls skelton-hide">
                                    <button type="button"><i class="fas fa-plus"></i> Add All</button>
                                </div>
                            </div>
                        </div>
                        <ul class="list-options question-list-options mb-15">
                            <li class="skelton-hide"><span class="icon-box"><img src="/assets/default/svgs/question-circle.svg" alt="question-circle"></span> {{$assignment->quizQuestionsList->count()}} questions</li>
                            <li class="skelton-hide"><span class="icon-box"><img src="/assets/default/svgs/save.svg" alt="save"></span> {{isset($assignment->quizYear->id)? $assignment->quizYear->getTitleAttribute() : ''}}</li>
                            <li class="skelton-hide"><span class="icon-box"><img src="/assets/default/svgs/book-saved.svg" alt="book-saved"></span> {{isset($assignment->webinar->id)? $assignment->webinar->getTitleAttribute() : '-'}}</li>
                        </ul>
                        <div class="class-controls">
                            <div class="left-area d-inline-flex align-items-center">
                                <div class="class-controls-option questions-control-options border-0 mr-0 pr-0 d-inline-flex align-items-center">
                                    <button class="skelton-hide" type="button"><img src="/assets/default/svgs/edit-simple.svg" alt="edit-simple">Copy &amp; edit</button>
                                    <button class="skelton-hide" type="button"><img src="/assets/default/svgs/save.svg" alt="save">Save</button>
                                    <button class="skelton-hide" type="button"><img src="/assets/default/svgs/share.svg" alt="share">Share</button>
                                    <button class="skelton-hide" type="button"><img src="/assets/default/svgs/download.svg" alt="download">Worksheet</button>
                                    <div class="dropdown-box skelton-hide">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                <span class="icon-box"><img src="/assets/default/svgs/dots-three.svg" alt="dots-three"></span>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#"><img src="/assets/default/svgs/print.svg" alt="print"> Print</a>
                                                <a class="dropdown-item" href="#"><img src="/assets/default/svgs/trash-bin.svg" alt="trash-bin"> Delete</a>
                                                <a class="dropdown-item" href="#"><img src="/assets/default/svgs/envelope.svg" alt="envelope"> Email To Prent</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="right-area w-auto">
                                <button type="button" class="assignment-btn skelton-hide"><img class="show-img" src="/assets/default/svgs/clock.svg" alt="clock"> Assign</button>
                                <button type="button" class="perview-btn skelton-hide" data-toggle="modal" data-target="#document-modal"><img class="show-img" src="/assets/default/svgs/eye-show.svg" alt="eye-show"> Perview</button>
                            </div>
                        </div>
                    </div>
                    <div class="q-ai-nav-controls">
                        <a href="#home" class="active skelton-hide" data-toggle="modal" data-target="#templatesleModal"><img src="/assets/default/svgs/add-question.svg" alt=""> Add Question</a>
                        <a href="#q-collections" class="skelton-hide" data-toggle="modal" data-target="#templatesleModal"><img src="/assets/default/svgs/add-collection.svg" alt=""> Add question from Collection</a>
                        <a href="#generate-ai" class="skelton-hide" data-toggle="modal" data-target="#templatesleModal"><img src="/assets/default/svgs/ai.svg" alt=""> Generate quiz using AI</a>
                        <a href="#import-q" class="skelton-hide" data-toggle="modal" data-target="#templatesleModal"><img src="/assets/default/svgs/import-worksheet.svg" alt=""> Import Worksheets</a>
                        <a href="javascript:;" class="assignment-save-button skelton-hide" data-toggle="modal" data-target="#general-knowledge-modal">Create Assignment</a>
                    </div>
                    <div class="mb-30 bg-white panel-border rounded-sm p-15 create-element-box" style="display: none;">
                        <h6 class="search-lable">Search question from library</h6>
                        <div class="rureraform-search-field mb-15">
                            <div class="input-field skelton-hide skelton-height-lg">
                                <input type="text" placeholder="Search question..">
                                <button type="button"><i class="fas fa-search"></i> <span>Search questions</span></button>
                            </div>
                            <!-- <div class="featured-controls skelton-hide skelton-height-lg">
                                <button type="button" class="active">Featured List</button>
                                <button type="button">Community</button>
                                <button type="button">My Collection</button>
                            </div> -->
                            <div class="search-filters mb-0">
                                <div class="select-field skelton-hide skelton-height-lg skelton-mb-0">
                                    <span>Sort by:</span>
                                    <select>
                                        <option value="Most relevant">Most relevant</option>
                                        <option value="Most recent">Most recent</option>
                                    </select>
                                </div>
                                <div class="select-field skelton-hide skelton-height-lg skelton-mb-0">
                                    <span>Grade:</span>
                                    <select>
                                        <option value="year 01">year 01</option>
                                        <option value="year 02">year 02</option>
                                    </select>
                                </div>
                                <div class="select-field skelton-hide skelton-height-lg skelton-mb-0">
                                    <span>Subject:</span>
                                    <select>
                                        <option value="English">English</option>
                                        <option value="Science">Science</option>
                                    </select>
                                </div>
                                <div class="select-field skelton-hide skelton-height-lg skelton-mb-0">
                                    <span>No. of questions:</span>
                                    <select>
                                        <option value="question 01">question 01</option>
                                        <option value="question 02">question 02</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="search-filters mb-0">
                            <div class="select-field">
                                <span>By:</span>
                                <select>
                                    <option value="All providers">All providers</option>
                                    <option value="All providers">All providers</option>
                                    <option value="All providers">All providers</option>
                                </select>
                            </div>
                            <div class="select-field">
                                <span>Capability:</span>
                                <select>
                                    <option value="All providers">Embeddings</option>
                                    <option value="All providers">Embeddings</option>
                                    <option value="All providers">Embeddings</option>
                                </select>
                            </div>
                            <div class="select-field">
                                <span>Tag:</span>
                                <select>
                                    <option value="All">All</option>
                                    <option value="All">All</option>
                                    <option value="All">All</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-30 bg-white panel-border rounded-sm p-15 bulk-quiz create-element-box">
                        <div class="bulk-heading skelton-hide">
                            <h6>Bulk Settings</h6>
                        </div>
                        <div class="bulk-ai">
                            <div class="bulk-ai-box skelton-hide">
                                <span class="bulk-lable">Rendomize</span>
                                <div class="btn-field">
                                    <a href="#">Question order</a>
                                    <a href="#">Options order</a>
                                </div>
                            </div>
                            <div class="bulk-ai-box skelton-hide">
                                <span class="bulk-lable">Estimation time</span>
                                <div class="select-field">
                                    <select>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <span class="bulk-text">Mins <i class="fas fa-clock"></i></span>
                                </div>
                            </div>
                            <div class="bulk-ai-box skelton-hide">
                                <span class="bulk-lable">Mark as point</span>
                                <div class="select-field">
                                    <select>
                                        <option value="1">1</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <span class="bulk-text">Points <i class="fas fa-circle"></i></span>
                                </div>
                            </div>
                            <div class="bulk-ai-box skelton-hide">
                                <span class="bulk-lable">Questions Order</span>
                                <div class="btn-field">
                                    <a href="#" class="delete-btn" data-toggle="modal" data-target="#dragModal">Rearrange</a>
                                </div>
                            </div>
                            <div class="bulk-ai-box skelton-hide">
                                <span class="bulk-lable">Bulk Delete</span>
                                <div class="btn-field">
                                    <a href="#" class="delete-btn">Delete All Questions</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="quiz-ai-tags mb-30 bg-white panel-border rounded-sm p-15 alert-dismissible alert fade show create-element-box">
                        <button type="button" class="close" data-dismiss="quiz-ai-tags" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h6 class="search-lable skelton-hide">Enhance this quiz using AI</h6>
                        <ul>
                            <li class="skelton-hide"><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Add similar questions</a></li>
                            <li class="skelton-hide"><a href="#" data-toggle="modal" data-target="#document-modal"><img src="/assets/default/svgs/ai.svg" alt="">Fix grammatical and spelling errors</a></li>
                            <li class="skelton-hide"><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Translate questions</a></li>
                            <li class="skelton-hide"><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Simplify questions</a></li>
                            <li class="skelton-hide"><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Add questions on particular topic</a></li>
                            <li class="skelton-hide"><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Reduce/increase Options From MCQs</a></li>
                            <li class="skelton-hide"><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Add learner’s name in the questions</a></li>
                            <li class="skelton-hide"><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Add answer's explanation</a></li>
                            <li class="skelton-hide"><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Write custom prompt</a></li>
                        </ul>
                    </div>
                    <div class="quiz-setup-listings">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12 questions-holder-area">


                                @if($assignment->quizQuestionsList->count() > 0)
                                    @foreach($assignment->quizQuestionsList as $questionListObj)
                                        {!! $thisObj->question_layout_by_id($request, false, $questionListObj->question_id); !!}
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade general-knowledge-modal" id="general-knowledge-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="editable-content editable" data-edit_field="quiz_title" contenteditable="true">{!! $assignment->getTitleAttribute(); !!}</h2>
                        <input type="hidden" name="quiz_title" class="editable-content" value="{{$assignment->getTitleAttribute()}}">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="book-btn">
                            <div class="upload-box">
                                <input type="file" id="upload-thumbnail" name="quiz_image" class="assignment-img-upload">
                                <label for="upload-thumbnail"><img src="/assets/default/svgs/edit-simple.svg" alt="file-image"></label>
                            </div>
                            <button type="button"><img src="{{(isset($assignment->quiz_image) && $assignment->quiz_image != ''? '/quizzes/'.$assignment->quiz_image : '/assets/default/svgs/book-saved.svg')}}" class="assignment_img" alt="book-saved"></button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="text-holder">

                            <ul>
                                <li>
                                    <img src="/assets/default/svgs/grades.svg" alt="grades">

                                    <div class="form-group">
                                        <label>{{ trans('/admin/main.category') }}</label>
                                        <select class="form-control @error('year_id') is-invalid @enderror ajax-category-courses" name="year_id" data-course_id="{{isset( $assignment->subject_id )? $assignment->subject_id : 0}}">
                                            <option {{ !empty($trend) ? '' : 'selected' }} disabled>{{ trans('admin/main.choose_category')  }}</option>

                                            @foreach($categories as $category)
                                                @if(!empty($category->subCategories) and count($category->subCategories))
                                                    <optgroup label="{{  $category->title }}">
                                                        @foreach($category->subCategories as $subCategory)
                                                            <option value="{{ $subCategory->id }}" @if(!empty($assignment) and $assignment->year_id == $subCategory->id) selected="selected" @endif>{{ $subCategory->title }}</option>
                                                        @endforeach
                                                    </optgroup>
                                                @else
                                                    <option value="{{ $category->id }}" class="font-weight-bold" @if(!empty($assignment) and $assignment->year_id == $category->id) selected="selected" @endif>{{ $category->title }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('year_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </li>
                                <li>
                                    <img src="/assets/default/svgs/book-saved.svg" alt="book-saved">
                                    <div class="form-group">
                                        <label>Subjects</label>
                                        <select data-return_type="option"
                                                data-default_id="{{isset( $assignment->subject_id)? $assignment->subject_id : 0}}" data-chapter_id="{{isset( $assignment->chapter_id )? $assignment->chapter_id : 0}}"
                                                class=" ajax-courses-dropdown year_subjects form-control select2 @error('subject_id') is-invalid @enderror"
                                                id="subject_id" name="subject_id">
                                            <option disabled selected>Subject</option>
                                        </select>
                                        @error('subject_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </li>
                            </ul>
                            <div class="description-field">
                                <textarea name="quiz_instructions" class="quiz_instructions" placeholder="Type description here...">{{$assignment->quiz_instructions}}</textarea>
                                <span class="description-count">0/400</span>
                            </div>
                            <div class="general-knowledge-footer">
                                <p>Let your learner know a title about the learning path</p>
                                <div class="footer-controls">
                                    <button type="button" class="apply-btn apply-assignment-btn">Apply</button>
                                    <button type="button" class="cancel-btn">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade blank-canvas-modal" id="blank-canvas-modal" tabindex="-1" aria-labelledby="blank-canvas-modalLabel" aria-modal="true" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="blank-canvas-sidebar">
                            <h3 class="title">QUESTION <span>(5)</span> <button class="add-btn" data-toggle="modal" data-target="#general-knowledge-modal">+</button></h3>
                            <div id="sortable">
                                <div class="question-card">
                                    <a href="#" class="question-card-link">
                                        <div class="question-content">
                                            <div class="question-text"><div class="q-number">1</div> What does UI <br > stand fo...</div>
                                            <div class="question-type">
                                                <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                                <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="question-card">
                                    <a href="#" class="question-card-link">
                                        <div class="question-content">
                                            <div class="question-text"><div class="q-number">2</div> Which aspect of UI de...</div>
                                            <div class="question-type">
                                                <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                                <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="question-card">
                                    <a href="#" class="question-card-link">
                                        <div class="question-content">
                                            <div class="question-text"><div class="q-number">3</div> How to export a pictu...</div>
                                            <div class="question-type">
                                                <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                                <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="question-card">
                                    <a href="#" class="question-card-link">
                                        <div class="question-content">
                                            <div class="question-text"><div class="q-number">4</div> What does UI <br > stand fo...</div>
                                            <div class="question-type">
                                                <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                                <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="question-card">
                                    <a href="#" class="question-card-link">
                                        <div class="question-content">
                                            <div class="question-text"><div class="q-number">5</div> Which aspect of UI de...</div>
                                            <div class="question-type">
                                                <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                                <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="question-card">
                                    <a href="#" class="question-card-link">
                                        <div class="question-content">
                                            <div class="question-text"><div class="q-number">6</div> How to export a pictu...</div>
                                            <div class="question-type">
                                                <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                                <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="question-card">
                                    <a href="#" class="question-card-link">
                                        <div class="question-content">
                                            <div class="question-text"><div class="q-number">7</div> What does UI <br > stand fo...</div>
                                            <div class="question-type">
                                                <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                                <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="question-card">
                                    <a href="#" class="question-card-link">
                                        <div class="question-content">
                                            <div class="question-text"><div class="q-number">8</div> Which aspect of UI de...</div>
                                            <div class="question-type">
                                                <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                                <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="question-card">
                                    <a href="#" class="question-card-link">
                                        <div class="question-content">
                                            <div class="question-text"><div class="q-number">9</div> How to export a pictu...</div>
                                            <div class="question-type">
                                                <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                                <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="question-card">
                                    <a href="#" class="question-card-link">
                                        <div class="question-content">
                                            <div class="question-text"><div class="q-number">10</div> What does UI <br > stand fo...</div>
                                            <div class="question-type">
                                                <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                                <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="question-card">
                                    <a href="#" class="question-card-link">
                                        <div class="question-content">
                                            <div class="question-text"><div class="q-number">11</div> Which aspect of UI de...</div>
                                            <div class="question-type">
                                                <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                                <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="question-card">
                                    <a href="#" class="question-card-link">
                                        <div class="question-content">
                                            <div class="question-text"><div class="q-number">12</div> How to export a pictu...</div>
                                            <div class="question-type">
                                                <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                                <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="question-card">
                                    <a href="#" class="question-card-link">
                                        <div class="question-content">
                                            <div class="question-text"><div class="q-number">13</div> What does UI <br > stand fo...</div>
                                            <div class="question-type">
                                                <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                                <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="question-card">
                                    <a href="#" class="question-card-link">
                                        <div class="question-content">
                                            <div class="question-text"><div class="q-number">14</div> Which aspect of UI de...</div>
                                            <div class="question-type">
                                                <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                                <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="question-card">
                                    <a href="#" class="question-card-link">
                                        <div class="question-content">
                                            <div class="question-text"><div class="q-number">15</div> How to export a pictu...</div>
                                            <div class="question-type">
                                                <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                                <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="question-card">
                                    <a href="#" class="question-card-link">
                                        <div class="question-content">
                                            <div class="question-text"><div class="q-number">16</div> What does UI <br > stand fo...</div>
                                            <div class="question-type">
                                                <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                                <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="question-card">
                                    <a href="#" class="question-card-link">
                                        <div class="question-content">
                                            <div class="question-text"><div class="q-number">17</div> Which aspect of UI de...</div>
                                            <div class="question-type">
                                                <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                                <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="question-card">
                                    <a href="#" class="question-card-link">
                                        <div class="question-content">
                                            <div class="question-text"><div class="q-number">18</div> How to export a pictu...</div>
                                            <div class="question-type">
                                                <span><img src="/assets/default/svgs/multi-choice.svg" alt=""> Multiple choice</span>
                                                <span class="drag-btn"><img src="/assets/default/svgs/drag.svg" alt=""></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="canvas-modal-container">
                            <div class="mb-30 bg-white panel-border rounded-sm p-15 bulk-quiz">
                                <div class="bulk-heading">
                                    <h6>Bulk Settings</h6>
                                </div>
                                <div class="bulk-ai">
                                    <div class="bulk-ai-box">
                                        <span class="bulk-lable">Rendomize</span>
                                        <div class="btn-field">
                                            <a href="#">Question order</a>
                                            <a href="#">Options order</a>
                                        </div>
                                    </div>
                                    <div class="bulk-ai-box">
                                        <span class="bulk-lable">Estimation time</span>
                                        <div class="select-field">
                                            <select>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            <span class="bulk-text">Mins <i class="fas fa-clock"></i></span>
                                        </div>
                                    </div>
                                    <div class="bulk-ai-box">
                                        <span class="bulk-lable">Mark as point</span>
                                        <div class="select-field">
                                            <select>
                                                <option value="1">1</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            <span class="bulk-text">Points <i class="fas fa-circle"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade questions-modal-canvas blank-canvas-modal" id="questions-modal-canvas" tabindex="-1" aria-labelledby="questions-modal-canvasLabel" aria-modal="true" role="dialog">
            <div class="modal-dialog questions-modal-canvas-block11">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body questions-modal-canvas-block">
                    </div>
                </div>
            </div>
        </div>

            <div class="modal fade ai-questions-modal-canvas blank-canvas-modal" id="questions-modal-canvas" tabindex="-1" aria-labelledby="questions-modal-canvasLabel" aria-modal="true" role="dialog">
                <div class="modal-dialog questions-modal-canvas-block11">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body ai-questions-modal-canvas-block">

                        </div>
                    </div>
                </div>
            </div>
        <div class="modal fade general-knowledge-modal" id="general-knowledge-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="img-holder">
                            <figure>
                                <img src="/assets/default/img/ecommerce-img.webp" alt="">
                                <figcaption>
                                    <div class="upload-box">
                                        <input type="file" id="upload-thumbnail">
                                        <label for="upload-thumbnail"><img src="/assets/default/svgs/file-image.svg" alt=""> Upload thumbnail</label>
                                    </div>
                                    <div class="book-btn">
                                        <button type="button"><img src="/assets/default/svgs/book-saved.svg" alt=""></button>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="text-holder">
                            <h2 class="editable" contenteditable="true">General Knowledge &amp; Methodology</h2>
                            <ul>
                                <li>
                                    <img src="/assets/default/svgs/title.svg" alt="">
                                    <input type="text" placeholder="Title" title="Title">
                                    <div class="dropdown">
                                        <button class="btn-link dropdown-toggle" type="button" id="generalMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Choose Category
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="generalMenu" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(30px, 30px, 0px);">
                                            <div class="select-categories-holder">
                                                <div class="selected-category">
                                                    <a href="#">Prototyping</a>
                                                </div>
                                                <div class="categories">
                                                    <span>Select category or create one</span>
                                                    <a href="#" class="active">Prototyping</a>
                                                    <a href="#">UI/UX</a>
                                                    <a href="#">Design</a>
                                                    <a href="#">Card</a>
                                                    <a href="#">Not Urgent</a>
                                                    <a href="#">Line</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <img src="/assets/default/svgs/grades.svg" alt="">
                                    <input type="text" placeholder="Grade" title="Grade">
                                    <em>Empty</em>
                                </li>
                                <li>
                                    <img src="/assets/default/svgs/book-saved.svg" alt="">
                                    <input type="text" placeholder="Subject" title="Subject">
                                    <em>Empty</em>
                                </li>
                                <li>
                                    <img src="/assets/default/svgs/teacher-with-stick.svg" alt="">
                                    <input type="text" placeholder="Co-teacher" title="Co-teacher">
                                    <div class="dropdown">
                                        <button class="btn-link dropdown-toggle" type="button" id="generalMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Select Language
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="generalMenu" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(30px, 30px, 0px);">
                                            <div class="select-languages-holder">
                                                <div class="languages">
                                                    <span>Select Languages</span>
                                                    <a href="#" class="active">English</a>
                                                    <a href="#">Deutsch</a>
                                                    <a href="#">Espanol</a>
                                                    <a href="#">Francais</a>
                                                    <a href="#">Italian</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <img src="/assets/default/svgs/calendar-days.svg" alt="">
                                    <input type="text" placeholder="Start Date" title="Start Date">
                                    <em>Empty</em>
                                </li>
                                <li>
                                    <img src="/assets/default/svgs/deadlines.svg" alt="">
                                    <input type="text" placeholder="Deadline :" title="Deadline :">
                                    <em>Empty</em>
                                </li>
                                <li>
                                    <img src="/assets/default/svgs/attempt.svg" alt="">
                                    <input type="text" placeholder="Participant attempts :" title="Participant attempts :">
                                    <em>Empty</em>
                                </li>
                            </ul>
                            <p>Let your learner know a title about the learning path</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>


        <div class="modal fade question_templates_modal" id="templatesleModal" tabindex="-1" aria-labelledby="templatesleModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="question-ai-tabs">
                            <div class="nav-tabs-holder">
                                <h1>The <span>Ultimate</span> No-Code Quiz Maker</h1>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a href="#home" class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="false">Blank Canvas</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="#q-collections" class="nav-link" id="q-collections-tab" data-toggle="tab" data-target="#q-collections" type="button" role="tab" aria-controls="q-collections" aria-selected="true">Collections</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="#generate-ai" class="nav-link" id="generate-ai-tab" data-toggle="tab" data-target="#generate-ai" type="button" role="tab" aria-controls="generate-ai" aria-selected="false">Generate with AI</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="#import-q" class="nav-link" id="import-tab" data-toggle="tab" data-target="#import-q" type="button" role="tab" aria-controls="import-q" aria-selected="false">Import Questions</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="#collection" class="nav-link" id="collection-tab" data-toggle="tab" data-target="#collection" type="button" role="tab" aria-controls="collection" aria-selected="false">My Collection</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <h6>Or select a question type to add question</h6>
                                    <div class="question_templates-holder">
                                        <ul class="question_templates">
                                            <li data-type="question_templates" data-option="multichoice_template" data-elements="question_label_multichoice_template,paragraph_multichoice_template,radio">
                                                <span class="templates-lable">Multiple Templates</span>
                                                <a href="#" data-title="Questions Templates">
                                                    <img src="/store/1/tool-images/d1.png" alt=""> Multiple Choice
                                                    <div class="templete-hover-element">
                                                        <div class="hover-box">
                                                            <div class="img-holder"></div>
                                                            <div class="text-holder">
                                                                <h6>Multiple Choice</h6>
                                                                <p>Check for retention by asking students to pick one or more correct answers. Use text, images, or math questions to spice things up!</p>
                                                                <span class="text-lable"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" data-title="Questions Templates">
                                                    <img src="/store/1/tool-images/d2.png" alt=""> Multiple Response
                                                    <div class="templete-hover-element">
                                                        <div class="hover-box">
                                                            <div class="img-holder"></div>
                                                            <div class="text-holder">
                                                                <h6>Multiple Response</h6>
                                                                <p>Check for retention by asking students to pick one or more correct answers. Use text, images, or math questions to spice things up!</p>
                                                                <span class="text-lable">Auto-graded</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li data-type="question_templates" data-option="true_false_template" data-elements="question_label_true_false,question_label_paragraph,truefalse_quiz">
                                                <span class="templates-lable">Multiple Templates</span>
                                                <a href="javascript:;" class="blank_canvas_apply" data-template_name="truefalse_quiz" data-title="Questions Templates">
                                                    <img src="/store/1/tool-images/d3.png" alt=""> True/False </a>
                                                <a href="#" data-title="Questions Templates">
                                                    <img src="/store/1/tool-images/d4.png" alt=""> Short Answer </a>
                                                <a href="#" data-title="Questions Templates">
                                                    <img src="/store/1/tool-images/d5.png" alt=""> Numeric </a>
                                                <a href="#" data-title="Questions Templates">
                                                    <img src="/store/1/tool-images/d6.png" alt=""> Sequence </a>
                                            </li>
                                            <li data-type="question_templates" data-option="matching_template" data-elements="question_label_matching_template,match_quiz">
                                                <span class="templates-lable">Multiple Templates</span>
                                                <a href="#" data-title="Questions Templates">
                                                    <img src="/store/1/tool-images/d7.png" alt=""> Matching </a>
                                                <a href="#" data-title="Questions Templates">
                                                    <img src="/store/1/tool-images/d8.png" alt=""> Fill in the Blanks </a>
                                                <a href="#" data-title="Questions Templates">
                                                    <img src="/store/1/tool-images/d9.png" alt=""> Select from Lists </a>
                                                <a href="#" data-title="Questions Templates">
                                                    <img src="/store/1/tool-images/d10.png" alt=""> Drag the Words </a>
                                                <a href="#" data-title="Questions Templates">
                                                    <img src="/store/1/tool-images/d11.png" alt=""> Hotspot </a>
                                                <a href="#" data-title="Questions Templates">
                                                    <img src="/store/1/tool-images/d12.png" alt=""> Drag and Drop </a>
                                            </li>

                                            <li data-type="question_templates" data-option="likert_template" data-elements="question_label">
                                                <span class="templates-lable">Multiple Templates</span>
                                                <a href="#" data-title="Questions Templates">
                                                    <img src="/store/1/tool-images/d13.png" alt=""> Likert Scale </a>
                                                <a href="#" data-title="Questions Templates">
                                                    <img src="/store/1/tool-images/d14.png" alt=""> Essay </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane fade populated-content-area" id="q-collections" role="tabpanel" aria-labelledby="q-collections-tab">



                                    <div class="col-12">
                                        <div class="staff-picks-tabs">
                                            <div class="mb-30 bg-white panel-border rounded-sm p-15">
                                                <div class="rureraform-search-field mb-15">
                                                    <div class="input-field skelton-height-lg">
                                                        <input type="text" class="question_search" placeholder="Search question..">
                                                        <button type="button" class="question-search-btn"><i class="fas fa-search"></i> <span>Search questions</span></button>
                                                    </div>
                                                    <div class="search-filters mb-0">
                                                        <div class="select-field skelton-height-lg skelton-mb-0">
                                                            <span>Sort by:</span>
                                                            <select name="questions_sort_by" class="questions_sort_by">
                                                                <option value="most_relevant">Most relevant</option>
                                                                <option value="most_recent">Most recent</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="search-filters mb-0 conditional-block topics_block">
                                                    <div class="select-field">
                                                        <span>Year:</span>


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
                                                    <div class="select-field">
                                                        <span>Subject:</span>
                                                        <select data-chapter_id="" id="subject_id"
                                                                class="sub-chapters-list-subject rurera-req-field form-control populate ajax-courses-dropdown year_subjects @error('subject_id') is-invalid @enderror"
                                                                name="subject_id" data-next_index="chapter_id" data-next_value="">
                                                            <option value="">Please select year, subject</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-lg-4 col-md-4">
                                                    <div class="featured-list-sidebar sub-chapters-list-data">
                                                        <div class="featured-list-sidebar-inner">
                                                            @if($subChapters->count() > 0)
                                                                @foreach($subChapters as $subChapterObj)

                                                                    @include('admin.learning_journey.includes.topic_list_items_list_layout', ['subChapterObj' => $subChapterObj])

                                                                @endforeach
                                                            @endif
                                                            <button class="load-more-btn"><i class="fas fa-plus"></i> Load More</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-8 col-md-8 topic-part-item-data questions-group-select">

                                                </div>
                                            </div>
                                        </div>
                                    </div>







































                                    <div class="topics-subtopics-content-area row">


                                    </div>
                                    <div class="selected-questions-group 2222">

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="generate-ai" role="tabpanel" aria-labelledby="generate-ai-tab">
                                    <div class="quiz-ai-tags mb-30 bg-white panel-border rounded-sm p-15 alert-dismissible alert fade show">
                                        <button type="button" class="close" data-dismiss="quiz-ai-tags" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <h6 class="search-lable">Enhance this quiz using AI</h6>
                                        <ul>
                                            <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Add similar questions</a></li>
                                            <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Fix grammatical and spelling errors</a></li>
                                            <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Translate questions</a></li>
                                            <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Simplify questions</a></li>
                                            <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Add questions on particular topic</a></li>
                                            <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Reduce/increase Options From MCQs</a></li>
                                            <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Add learner’s name in the questions</a></li>
                                            <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Add answer's explanation</a></li>
                                            <li><a href="#"><img src="/assets/default/svgs/ai.svg" alt="">Write custom prompt</a></li>
                                        </ul>
                                    </div>
                                    <div class="questions-inner-tabs">
                                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="document-tab" data-toggle="tab" data-target="#document" type="button" role="tab" aria-controls="document" aria-selected="true">Document</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="prompt-tab" data-toggle="tab" data-target="#prompt" type="button" role="tab" aria-controls="prompt" aria-selected="false">Text/Prompt</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="website-tab" data-toggle="tab" data-target="#website" type="button" role="tab" aria-controls="website" aria-selected="false">Website</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="utube-tab" data-toggle="tab" data-target="#utube" type="button" role="tab" aria-controls="utube" aria-selected="false">YouTube</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent2">
                                            <div class="tab-pane fade show active" id="document" role="tabpanel" aria-labelledby="document-tab">
                                                <h6>Generate question from study materials (presentations/documents)</h6>
                                                <div class="staff-picks-holder">
                                                    <div class="upload-options">
                                                        <div class="field-box">
                                                            <input type="file" id="drag-drop">
                                                            <label for="drag-drop">
                                                                <i class="fas fa-cloud-download-alt"></i>
                                                                <span>Drag and drop a study material</span>
                                                            </label>
                                                        </div>
                                                        <span class="field-separated">
                                                    <span>Or</span>
                                                </span>
                                                        <div class="upload-controls">
                                                            <div class="field-box">
                                                                <input type="file" id="drag-drop">
                                                                <label for="drag-drop"><i class="fas fa-desktop"></i> Upload from device</label>
                                                            </div>
                                                            <div class="field-box">
                                                                <input type="file" id="drag-drop">
                                                                <label for="drag-drop"><i class="fas fa-desktop"></i> Import from device</label>
                                                            </div>
                                                            <div class="field-box">
                                                                <input type="file" id="drag-drop">
                                                                <label for="drag-drop"><i class="fas fa-camera"></i> Take a picture</label>
                                                            </div>
                                                        </div>
                                                        <p>Supported formates: PDF, PPT, PPTX, DOC</p>
                                                    </div>
                                                </div>
                                                <div class="question-hints">
                                                    <h6>Hints</h6>
                                                    <div class="question-hints-holder">
                                                        <div class="hints-box">
                                                            <strong>Total Referred Users</strong>
                                                            <span>Users that registerd on the plateform using the referral code.</span>
                                                        </div>
                                                        <div class="hints-box">
                                                            <strong>Total Referred Users</strong>
                                                            <span>Users that registerd on the plateform using the referral code.</span>
                                                        </div>
                                                        <div class="hints-box">
                                                            <strong>Total Referred Users</strong>
                                                            <span>Users that registerd on the plateform using the referral code.</span>
                                                        </div>
                                                        <div class="hints-box">
                                                            <strong>Total Referred Users</strong>
                                                            <span>Users that registerd on the plateform using the referral code.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="prompt" role="tabpanel" aria-labelledby="prompt-tab">
                                                <h6>Copy and paste questions text from anywhere to create a quiz from it</h6>
                                                <div class="copy-paste-questions">
                                                    <textarea name="text_prompt" class="text_prompt"></textarea>
                                                    <button type="button" class="text-prompt-submit-btn">Generate</button>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="website" role="tabpanel" aria-labelledby="website-tab">
                                                <h6>Generate questions from websites/online articles</h6>
                                                <div class="rureraform-search-field">
                                                    <div class="input-field web-input-field">
                                                        <i class="fas fa-link"></i>
                                                        <input type="text" class="website_url" name="website_url" placeholder="Enter any website URL (eg https://rurera.com/) ">
                                                        <button type="button" class="url-prompt-submit-btn">Generate</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="utube" role="tabpanel" aria-labelledby="utube-tab">
                                                <h6 class="search-lable">Find or create an Interactive Video from YouTube <span class="beta-lable">Beta</span></h6>
                                                <div class="bg-white panel-border rounded-sm p-15">
                                                    <div class="rureraform-search-field">
                                                        <div class="input-field youtube-input-field w-100">
                                                            <img src="/assets/default/svgs/youtube.svg" alt="">
                                                            <input type="text" name="video_url" class="video_url" placeholder="Search question..">
                                                            <button type="button" class="video-prompt-submit-btn"><i class="fas fa-search"></i> Generate</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="import-q" role="tabpanel" aria-labelledby="import-tab">
                                    <div class="questions-inner-tabs">
                                        <ul class="nav nav-tabs" id="myTab3" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="paste-q-tab" data-toggle="tab" data-target="#paste-q" type="button" role="tab" aria-controls="paste-q" aria-selected="true">Paste Questions</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="google-form-tab" data-toggle="tab" data-target="#google-form" type="button" role="tab" aria-controls="google-form" aria-selected="false">Google Form</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="spreadsheet-tab" data-toggle="tab" data-target="#spreadsheet" type="button" role="tab" aria-controls="spreadsheet" aria-selected="false">Spreadsheet/CSV</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent3">
                                            <div class="tab-pane fade show active" id="paste-q" role="tabpanel" aria-labelledby="paste-q-tab">
                                                <h6>Copy and paste questions text from anywhere to create a quiz from it</h6>
                                                <div class="copy-paste-questions">
                                                    <textarea name="text_prompt_2" class="text_prompt_2"></textarea>
                                                    <button type="button" class="text-prompt-submit-btn-2">Generate</button>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="google-form" role="tabpanel" aria-labelledby="google-form-tab">
                                                <h6>Import Google Form as a quiz</h6>
                                                <div class="staff-picks-holder">
                                                    <div class="upload-options">
                                                        <div class="field-box">
                                                            <input type="file" id="drag-drop">
                                                            <label for="drag-drop">
                                                                <i class="fas fa-file-alt"></i>
                                                                <span>Select a google form</span>
                                                            </label>
                                                        </div>
                                                        <div class="upload-controls">
                                                            <div class="field-box">
                                                                <input type="file" id="drag-drop">
                                                                <label for="drag-drop"><i class="fas fa-desktop"></i> Import from drive</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="spreadsheet" role="tabpanel" aria-labelledby="spreadsheet-tab">
                                                <h6>Bulk import questions using spreadsheet</h6>
                                                <div class="staff-picks-holder">
                                                    <div class="upload-options">
                                                        <div class="field-box">
                                                            <input type="file" id="drag-drop">
                                                            <label for="drag-drop">
                                                                <img src="/assets/default/svgs/spreadsheet.svg" alt="">
                                                                <span>Drag and drop your spreadsheet</span>
                                                            </label>
                                                        </div>
                                                        <span class="field-separated">
                                                    <span>Or</span>
                                                </span>
                                                        <form name="questions-spreadsheet" id="questions-spreadsheet" action="javascript:;" method="POST" class="questions-spreadsheet" enctype="multipart/form-data">
                                                            {{csrf_field()}}
                                                            <div class="upload-controls">
                                                                <div class="field-box">
                                                                    <input type="file" id="drag-drop1" class="spreadsheet-file" name="spreadsheet_file">
                                                                    <label for="drag-drop1"><i class="fas fa-desktop"></i> Upload from device</label>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="collection" role="tabpanel" aria-labelledby="collection-tab">
                                    <div class="staff-picks-tabs">
                                        <div class="mb-30 bg-white panel-border rounded-sm p-15">
                                            <div class="rureraform-search-field mb-15">
                                                <div class="input-field">
                                                    <input type="text" placeholder="Search question..">
                                                    <button type="button"><i class="fas fa-search"></i> <span>Search questions</span></button>
                                                </div>
                                                <div class="featured-controls">
                                                    <button type="button" class="active">Featured List</button>
                                                    <button type="button">Community</button>
                                                    <button type="button">My Collection</button>
                                                </div>
                                            </div>
                                            <div class="search-filters mb-0">
                                                <div class="select-field">
                                                    <span>By:</span>
                                                    <select>
                                                        <option value="All providers">All providers</option>
                                                        <option value="All providers">All providers</option>
                                                        <option value="All providers">All providers</option>
                                                    </select>
                                                </div>
                                                <div class="select-field">
                                                    <span>Capability:</span>
                                                    <select>
                                                        <option value="All providers">Embeddings</option>
                                                        <option value="All providers">Embeddings</option>
                                                        <option value="All providers">Embeddings</option>
                                                    </select>
                                                </div>
                                                <div class="select-field">
                                                    <span>Tag:</span>
                                                    <select>
                                                        <option value="All">All</option>
                                                        <option value="All">All</option>
                                                        <option value="All">All</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
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
    <script>
        var alreadyAddedTopics = [];
        $(document).ready(function () {
            const $scrollableDiv = $(".enhance-questions-modal");
            $scrollableDiv.niceScroll({
                cursorcolor: "red",
                cursorwidth: "8px",
                autohidemode: true
            });

            $(".document-modal").on("shown.bs.modal", function () {
                $scrollableDiv.getNiceScroll().resize();
            });

            $(".topic-part-item-list:first").click();


        });
    </script>

    <script>

        var ItemloaderDivMain = $(".topic-part-item-data");
        var CustomItemloaderDivMain = $(".custom-topic-part-item-data");
        var topicPartItemDataRequest = null;
        $(document).on('click', '.topic-part-item-list', function () {
            $(".topic-part-item-list").removeClass('active');
            $(this).addClass('active');

            var questions_sort_by = $(".questions_sort_by").val();
            rurera_loader(ItemloaderDivMain, 'div');
            var topic_part_item_id = $(this).attr('data-id');
            topicPartItemDataRequest = $.ajax({
                type: "GET",
                url: '/admin/learning_journey/get_topic_part_item_layout',
                beforeSend: function () {
                    if (topicPartItemDataRequest != null) {
                        topicPartItemDataRequest.abort();
                    }
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'topic_part_item_id': topic_part_item_id, 'questions_sort_by': questions_sort_by},
                success: function (response) {
                    rurera_remove_loader(ItemloaderDivMain, 'button');
                    $(".topic-part-item-data").html(response);
                }
            });
        });

        $(document).on('click', '.custom-topic-part-item-list', function () {
            $(".topic-part-item-list").removeClass('active');
            $(this).addClass('active');
            rurera_loader(CustomItemloaderDivMain, 'div');
            var quiz_id = $(this).attr('data-id');
            topicPartItemDataRequest = $.ajax({
                type: "GET",
                url: '/admin/learning_journey/get_custom_topic_part_item_layout',
                beforeSend: function () {
                    if (topicPartItemDataRequest != null) {
                        topicPartItemDataRequest.abort();
                    }
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'quiz_id': quiz_id},
                success: function (response) {
                    rurera_remove_loader(CustomItemloaderDivMain, 'button');
                    $(".custom-topic-part-item-data").html(response);
                }
            });
        });
    </script>




    <script>
        $(document).ready(function() {
            $(".blank-canvas-modal .rureraform-element, .lms-quiz-create .rureraform-admin-popup-title a").click(function(e) {
                e.stopPropagation();
                $(".canvas-editable-options-holder").toggleClass("active");
            });

            $(document).mouseup(function(e) {
                var container = $(".canvas-editable-options-holder");
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    container.removeClass("active");
                }
            });
        });
    </script>

    <script type="text/javascript">

        $(document).ready(function () {
            const $scrollableDiv = $(".blank-canvas-sidebar, .canvas-editable-options");

            // Initialize NiceScroll with auto-hide enabled
            $scrollableDiv.niceScroll({
                cursorcolor: "red",
                cursorwidth: "8px",
                autohidemode: true // Auto-hide enabled initially
            });


            // Reinitialize NiceScroll when the modal is shown
            $(".blank-canvas-modal").on("shown.bs.modal", function () {
                $scrollableDiv.getNiceScroll().resize();
            });

        });
    </script>
    <script>
        document.querySelectorAll('.editable').forEach(element => {
            element.addEventListener('focus', () => {
                // Save the initial text if needed
                element.dataset.oldText = element.textContent;
            });

            element.addEventListener('blur', () => {
                // Handle the change if needed
                if (element.textContent !== element.dataset.oldText) {
                    console.log("Text changed to:", element.textContent);
                }
            });
        });
    </script>

    <script src="/assets/default/js/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip({
                container: '.admin_teacher_role'
            });

            $('.show-btn').on('click',function () {
                $('.show-btn').toggleClass('show');
            });
        });
    </script>

    <!-- JavaScript for Drag and Drop -->
    <!-- Enable Sortable Functionality -->
    <script>
        $(document).ready(function () {
            // Make the sidebar list sortable
            $("#sortable").sortable();
            $("#sortable").disableSelection();
        });
    </script>
    <script>
        const container = document.getElementById('gridContainer');
        let draggedItem = null;

        container.addEventListener('dragstart', e => {
        if (e.target.classList.contains('grid-item')) {
            draggedItem = e.target;
            setTimeout(() => e.target.style.display = 'none', 0);
        }
        });

        container.addEventListener('dragend', e => {
        if (draggedItem) {
            draggedItem.style.display = 'block';
            draggedItem = null;
        }
        });

        container.addEventListener('dragover', e => {
        e.preventDefault();
        const afterElement = getDragAfterElement(container, e.clientX);
        if (afterElement == null) {
            container.appendChild(draggedItem);
        } else {
            container.insertBefore(draggedItem, afterElement);
        }
        });

        function getDragAfterElement(container, x) {
        const draggableElements = [...container.querySelectorAll('.grid-item:not(.dragging)')];

        return draggableElements.reduce((closest, child) => {
            const box = child.getBoundingClientRect();
            const offset = x - box.left - box.width / 2;
            if (offset < 0 && offset > closest.offset) {
            return { offset: offset, element: child };
            } else {
            return closest;
            }
        }, { offset: Number.NEGATIVE_INFINITY }).element;
        }
    </script>
    <!-- <script>
        // Open modal and activate tab based on URL fragment
        $(document).ready(function() {
            // Check if the URL contains a fragment
            var hash = window.location.hash;
            if (hash) {
                // Open the modal
                $('#templatesleModal').modal('show');

                // Activate the corresponding tab
                $('a[href="' + hash + '"]').tab('show');
            }

            // Listen for tab change to update URL fragment
            $('#templatesleModal').on('shown.bs.modal', function () {
                var activeTab = $('#myTab .nav-link.active').attr('href');
                window.location.hash = activeTab;
            });
            // When the modal is closed, remove the hash from the URL
            $('#templatesleModal').on('hidden.bs.modal', function () {
                history.pushState("", document.title, window.location.pathname + window.location.search);
            });
        });
    </script> -->
    <script>
        /*Skelton Loading Fungtion Start*/
        $(document).ready(function () {
            const $el = document.querySelector(".section-body");

            setTimeout(() => {
                $el.classList.remove("skeleton");
                $el
                    .querySelectorAll(".skelton-hide")
                    .forEach((el) => el.classList.remove("skelton-hide"));
            }, 3000);
        });
        /*Skelton Loading Fungtion End*/
    </script>



    <script>
        var questions_callback = function () {
            $('body').on('click', '.subchapter-group-select li', function (e) {
                var thisObj = $('.populated-content-area');
                var subchapter_id = $(this).attr('data-subchapter_id');
                rurera_loader(thisObj, 'div');
                jQuery.ajax({
                    type: "GET",
                    url: '/admin/custom_quiz/questions_by_subchapter',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {"subchapter_id": subchapter_id},
                    success: function (return_data) {
                        //$(".populated-data").addClass('rurera-hide');
                        rurera_remove_loader(thisObj, 'button');
                        //$(".questions-populate-area").html(return_data);
                        $(".selected-questions-group").append(return_data);
                        //questions_select_callback();

                    }
                });
            });
        }

        questions_callback();


        $('body').on('click', '.question-layout-holder .add-to-list-btn', function (e) {
            var question_id = $(this).closest('.question-layout-holder').attr('data-question_id');
            var thisObj = $(this);
            jQuery.ajax({
                type: "GET",
                url: '/admin/custom_quiz/question_layout_by_id',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {"question_id": question_id},
                success: function (return_data) {
                    if($(".listing-dropdown.active").length > 0){
                        $(".listing-dropdown.active").after(return_data);
                    }else {
                        $(".questions-holder-area").append(return_data);
                    }
                    thisObj.addClass('active');
                    thisObj.html('Added');


                }
            });
        });

        $('body').on('click', '.listing-dropdown', function (e) {
            $(".listing-dropdown").removeClass('active');
            $(this).addClass('active');
        });

        $('body').on('click', '.delete-btn', function (e) {
            var question_id = $(this).attr('data-id');
            $(this).closest('.question-layout-block-holder').remove();

        });

        $('body').on('click', '.add-similar-question', function (e) {
            var question_id = $(this).attr('data-id');
            var questions_count = $(this).attr('data-questions_count');
            $(".questions-modal-canvas").modal('show');

            var thisObj = $(this);
            jQuery.ajax({
                type: "GET",
                url: '/admin/custom_quiz/add_similar_question',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {"question_id": question_id, "questions_count":questions_count},
                success: function (return_data) {
                    $(".questions-modal-canvas-block").html(return_data);

                }
            });

        });


        $('body').on('click', '.text-prompt-submit-btn-2', function (e) {
            var text_prompt = $('.text_prompt-2').val();
            $(".question_templates_modal").modal('hide');
            $(".ai-questions-modal-canvas").modal('show');
            console.log(text_prompt);
            var thisObj = $(this);
            jQuery.ajax({
                type: "GET",
                url: '/admin/custom_quiz/prompt_questions',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {"text_prompt": text_prompt},
                success: function (return_data) {
                    $(".ai-questions-modal-canvas-block").html(return_data);

                }
            });

        });

        $('body').on('click', '.text-prompt-submit-btn', function (e) {
            var text_prompt = $('.text_prompt').val();
            $(".question_templates_modal").modal('hide');
            $(".ai-questions-modal-canvas").modal('show');
            console.log(text_prompt);
            var thisObj = $(this);
            jQuery.ajax({
                type: "GET",
                url: '/admin/custom_quiz/prompt_questions',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {"text_prompt": text_prompt},
                success: function (return_data) {
                    $(".ai-questions-modal-canvas-block").html(return_data);

                }
            });

        });

        $('body').on('click', '.url-prompt-submit-btn', function (e) {
            var website_url = $('.website_url').val();
            $(".question_templates_modal").modal('hide');
            $(".ai-questions-modal-canvas").modal('show');
            console.log(website_url);
            var thisObj = $(this);
            jQuery.ajax({
                type: "GET",
                url: '/admin/custom_quiz/url_prompt_questions',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {"website_url": website_url},
                success: function (return_data) {
                    $(".ai-questions-modal-canvas-block").html(return_data);

                }
            });

        });

        $('body').on('click', '.video-prompt-submit-btn', function (e) {
            var video_url = $('.video_url').val();
            $(".question_templates_modal").modal('hide');
            $(".ai-questions-modal-canvas").modal('show');
            console.log(video_url);
            var thisObj = $(this);
            jQuery.ajax({
                type: "GET",
                url: '/admin/custom_quiz/video_prompt_questions',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {"video_url": video_url},
                success: function (return_data) {
                    $(".ai-questions-modal-canvas-block").html(return_data);

                }
            });

        });





        $('body').on('click', '.question-load-canvas', function (e) {
            var question_id = $(this).attr('data-id');
            $('.question-card').removeClass('active');
            $(this).closest('.question-card').addClass('active');
            var thisObj = $(this).closest('.question-card')
            rurera_loader(thisObj, 'div');
            jQuery.ajax({
                type: "GET",
                url: '/admin/custom_quiz/question_load_canvas',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {"question_id": question_id},
                success: function (return_data) {
                    rurera_remove_loader(thisObj, 'button');
                    $(".question-loader-div").html(return_data);

                }
            });

        });


        $('body').on('click', '.fix-question-grammer', function (e) {
            var question_id = $(this).attr('data-id');
            $(".ai-questions-modal-canvas").modal('show');

            var thisObj = $(this);
            jQuery.ajax({
                type: "GET",
                url: '/admin/custom_quiz/fix_question_grammer',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {"question_id": question_id},
                success: function (return_data) {
                    $(".ai-questions-modal-canvas-block").html(return_data);

                }
            });

        });


        $('body').on('click', '.reduce-question-options', function (e) {
            var question_id = $(this).attr('data-id');
            var option_value = $(this).attr('data-option_value');
            $(".ai-questions-modal-canvas").modal('show');

            var thisObj = $(this);
            jQuery.ajax({
                type: "GET",
                url: '/admin/custom_quiz/reduce_question_options',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {"question_id": question_id, "option_value": option_value},
                success: function (return_data) {
                    $(".ai-questions-modal-canvas-block").html(return_data);

                }
            });

        });



        $('body').on('click', '.question-template-change', function (e) {
            var question_id = $(this).attr('data-id');
            var template_type = $(this).attr('data-type');
            $(".ai-questions-modal-canvas").modal('show');
            var loaderDiv = $('.ai-questions-modal-canvas-block');
            rurera_loader(loaderDiv, 'button');

            var thisObj = $(this);
            jQuery.ajax({
                type: "GET",
                url: '/admin/custom_quiz/question_template_change',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {"question_id": question_id, "template_type": template_type},
                success: function (return_data) {
                    rurera_remove_loader(loaderDiv, 'button');
                    $(".ai-questions-modal-canvas-block").html(return_data);

                }
            });

        });

        $('body').on('click', '.question-edit-btn', function (e) {
            var question_id = $(this).attr('data-id');
            $(".ai-questions-modal-canvas").modal('show');
            var loaderDiv = $('.ai-questions-modal-canvas-block');
            rurera_loader(loaderDiv, 'button');

            var thisObj = $(this);
            jQuery.ajax({
                type: "GET",
                url: '/admin/custom_quiz/question_edit',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {"question_id": question_id},
                success: function (return_data) {
                    rurera_remove_loader(loaderDiv, 'button');
                    $(".ai-questions-modal-canvas-block").html(return_data);
                }
            });

        });












    </script>









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

        var chaptersRequest = null;
        $(document).on('change', '.ajax-courses-dropdown', function () {
            var course_id = $(this).val();
            var chapter_id = $(this).attr('data-chapter_id');

            chaptersRequest = $.ajax({
                type: "GET",
                url: '/admin/webinars/chapters_by_course',
                beforeSend: function () {
                    if (chaptersRequest != null) {
                        chaptersRequest.abort();
                    }
                },
                data: {'course_id': course_id, 'chapter_id': chapter_id},
                success: function (return_data) {

                    console.log(return_data);
                    $(".ajax-chapter-dropdown").html(return_data);
                    $('.ajax-chapter-dropdown').change();
                }
            });
        });
        var subChapter2Request = null;
        $(document).on('change', '.ajax-chapter-dropdown', function () {
            var chapter_id = $(this).val();
            var sub_chapter_id = $(this).attr('data-sub_chapter_id');
            var disabled_items = $(this).attr('data-disabled');
            subChapter2Request = $.ajax({
                type: "GET",
                url: '/admin/webinars/sub_chapters_by_chapter',
                beforeSend: function () {
                    if (subChapter2Request != null) {
                        subChapter2Request.abort();
                    }
                },
                data: {'chapter_id': chapter_id, 'sub_chapter_id': sub_chapter_id,  'disabled_items': disabled_items},
                success: function (return_data) {
                    $(".ajax-subchapter-dropdown").html(return_data);
                }
            });
        });

        var subChapterRequest = null;
        $(document).on('change', '.ajax-subchapter-dropdown', function () {
            var sub_chapter_id = $(this).val();
            var topic_part = $(this).attr('data-next_value');
            var level_type = $(".level_type").val();

            if(level_type == 'topic'){
                subChapterRequest = $.ajax({
                    type: "GET",
                    url: '/admin/webinars/topic_part_item_by_sub_chapter',
                    beforeSend: function () {
                        if (subChapterRequest != null) {
                            subChapterRequest.abort();
                        }
                    },
                    data: {'subchapter_id': sub_chapter_id, 'show_all': 'yes', 'topic_part': topic_part},
                    success: function (return_data) {
                        $(".topic-parts-data").html(return_data);
                    }
                });
            }
            if(level_type == 'custom_topic'){
                subChapterRequest = $.ajax({
                    type: "GET",
                    url: '/admin/webinars/custom_topic_by_sub_chapter',
                    beforeSend: function () {
                        if (subChapterRequest != null) {
                            subChapterRequest.abort();
                        }
                    },
                    data: {'subchapter_id': sub_chapter_id, 'show_all': 'yes', 'topic_part': topic_part},
                    success: function (return_data) {
                        $(".topic-parts-data").html(return_data);
                    }
                });
            }
        });

        var subChapterDataRequest = null;
        var subChapterDivMain = $(".sub-chapters-list-data");
        $(document).on('change', '.sub-chapters-list', function () {
            rurera_loader(subChapterDivMain, 'div');
            var level_id = $(".book-dropzone.active").attr('data-level_id');
            if (!Array.isArray(alreadyAddedTopics[level_id])) {
                alreadyAddedTopics[level_id] = [];
            }
            console.log('loader------');
            var sub_chapter_id = $(this).val();
            subChapterDataRequest = $.ajax({
                type: "GET",
                url: '/admin/learning_journey/get_topic_part_items_list',
                beforeSend: function () {
                    if (subChapterDataRequest != null) {
                        subChapterDataRequest.abort();
                    }
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'sub_chapter_id': sub_chapter_id},
                success: function (response) {
                    rurera_remove_loader(subChapterDivMain, 'button');
                    $(".sub-chapters-list-data").html(response);

                    $.each(alreadyAddedTopics[level_id], function(index, selected_topic_id) {
                        $('.add-level-stage-topic-btn[data-id="'+selected_topic_id+'"]').addClass('topic-added');
                        $('.add-level-stage-topic-btn[data-id="'+selected_topic_id+'"]').closest('.topic-part-item-list').addClass('active');

                    });


                }
            });
        });


        $(document).on('change', '.sub-chapters-list-subject', function () {
            rurera_loader(subChapterDivMain, 'div');
            var level_id = $(".book-dropzone.active").attr('data-level_id');
            if (!Array.isArray(alreadyAddedTopics[level_id])) {
                alreadyAddedTopics[level_id] = [];
            }
            var subject_id = $(this).val();
            subChapterDataRequest = $.ajax({
                type: "GET",
                url: '/admin/learning_journey/get_topic_part_items_by_subject_list',
                beforeSend: function () {
                    if (subChapterDataRequest != null) {
                        subChapterDataRequest.abort();
                    }
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'subject_id': subject_id},
                success: function (response) {
                    rurera_remove_loader(subChapterDivMain, 'button');
                    $(".sub-chapters-list-data").html(response);

                    $.each(alreadyAddedTopics[level_id], function(index, selected_topic_id) {
                        $('.add-level-stage-topic-btn[data-id="'+selected_topic_id+'"]').addClass('topic-added');
                        $('.add-level-stage-topic-btn[data-id="'+selected_topic_id+'"]').closest('.topic-part-item-list').addClass('active');

                    });


                }
            });
        });


        var customSubChapterDivMain = $(".custom-sub-chapters-list-data");
        $(document).on('change', '.custom-sub-chapters-list', function () {
            rurera_loader(customSubChapterDivMain, 'div');
            var sub_chapter_id = $(this).val();
            subChapterDataRequest = $.ajax({
                type: "GET",
                url: '/admin/learning_journey/get_topic_part_items_list',
                beforeSend: function () {
                    if (subChapterDataRequest != null) {
                        subChapterDataRequest.abort();
                    }
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'sub_chapter_id': sub_chapter_id},
                success: function (response) {
                    rurera_remove_loader(customSubChapterDivMain, 'button');
                    $(".custom-sub-chapters-list-data").html(response);
                }
            });
        });

        $(".ajax-category-courses").change();

        $(document).on('click change keyup keydown keypress', '.editable-content', function () {
            var editable_field_name = $(this).attr('data-edit_field');
            var new_value = $(this).html();
            $('[name="'+editable_field_name+'"]').val(new_value);
        });

        $(document).on('click', '.apply-assignment-btn', function () {
            $(".custom_quiz_form").submit();
        });

        $(document).on('change', '#upload-thumbnail', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $(".assignment_img").attr("src", e.target.result);
                };
                reader.readAsDataURL(file);
            }
        });


        $(document).ready(function () {
            const textarea = $('.quiz_instructions');
            const countDisplay = $('.description-count');
            const maxLength = parseInt(textarea.attr('maxlength')) || 400;

            // Set initial count
            countDisplay.text(`${textarea.val().length}/${maxLength}`);

            // Update count on input
            textarea.on('input', function () {
                let content = $(this).val();

                // Prevent exceeding the max length
                if (content.length > maxLength) {
                    content = content.substring(0, maxLength);
                    $(this).val(content);
                }

                // Update the count display
                countDisplay.text(`${content.length}/${maxLength}`);
            });
        });


        $('body').on('click', '.move-question-up', function (e) {
            var current = $(this).closest('.question-layout-block-holder');
            var prev = current.prevAll('.question-layout-block-holder').first();
            if (prev.length) {
                current.insertBefore(prev);
            }
            //rearrange_question();
        });

        // Move Down
        $('body').on('click', '.move-question-down', function (e) {
            var current = $(this).closest('.question-layout-block-holder');
            var next = current.nextAll('.question-layout-block-holder').first();
            if (next.length) {
                current.insertAfter(next);
            }
            //rearrange_question();
        });
        var questionSearchRequest = null;
        $('body').on('click', '.question-search-btn', function (e) {
            var question_search = $(".question_search").val();
            var questions_sort_by = $(".questions_sort_by").val();


            rurera_loader($(".topic-part-item-data"), 'div');
            rurera_loader($(".question-search-btn"), 'div');

            var sub_chapter_id = $(this).val();
            questionSearchRequest = $.ajax({
                type: "GET",
                url: '/admin/custom_quiz/question_search',
                beforeSend: function () {
                    if (questionSearchRequest != null) {
                        questionSearchRequest.abort();
                    }
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'question_search': question_search, 'questions_sort_by': questions_sort_by},
                success: function (response) {
                    rurera_remove_loader($(".topic-part-item-data"), 'button');
                    rurera_remove_loader($(".question-search-btn"), 'button');
                    $(".topic-part-item-data").html(response);
                }
            });

        });

        $('body').on('change', '.questions_sort_by', function (e) {
            var question_search = $(".question_search").val();

            if(question_search != ''){
                $(".question-search-btn").click();
            }else{
                if($(".topic-part-item-list.active").length > 0){
                    $(".topic-part-item-list.active").click();
                }

            }

        });

        var blankCanvasRequest = null;
        $('body').on('click', '.blank_canvas_apply', function (e) {
            var thisObj = $(this);
            var template_name = $(this).attr("data-template_name");



            rurera_loader(thisObj, 'div');

            blankCanvasRequest = $.ajax({
                type: "GET",
                url: '/admin/custom_quiz/blank_canvas_apply',
                beforeSend: function () {
                    if (blankCanvasRequest != null) {
                        blankCanvasRequest.abort();
                    }
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                data: {'template_name': template_name},
                success: function (return_data) {
                    console.log('testing');
                    console.log(return_data);
                    rurera_remove_loader(thisObj, 'button');
                    $(".questions-holder-area").append(return_data.question_data);
                    $(".question_templates_modal").modal('hide');
                    var new_question_id = return_data.question_id;
                    $('.question-edit-btn[data-id="'+new_question_id+'"]').click();

                }
            });

        });


        $('body').on('change', '.spreadsheet-file', function (e) {
            var thisObj = $(this);
            var formData = new FormData($('.questions-spreadsheet')[0]);
            $.ajax({
                type: "POST",
                url: '/admin/custom_quiz/generated_by_spreadsheet',
                data: formData,
                processData: false,
                contentType: false,
                success: function (return_data) {
                    if(return_data == 'error'){
                        alert('File type not Supported!')
                    }else {
                        $(".question_templates_modal").modal('hide');
                        $(".ai-questions-modal-canvas").modal('show');
                        $(".ai-questions-modal-canvas-block").html(return_data);
                    }
                }
            });

        });

    </script>

@endpush
