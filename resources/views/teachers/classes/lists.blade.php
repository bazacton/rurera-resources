@extends('admin.layouts.app')

@push('libraries_top')

@endpush

@section('content')
<section class="section skeleton">
    <div class="section-header">
        <h1>Classes</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="/admin/">{{trans('admin/main.dashboard')}}</a>
            </div>
            <div class="breadcrumb-item">Classes</div>
        </div>
    </div>
    <div class="row">
       <div class="col-12 col-md-12">
            <div class="nav-area">
                <ul class="col-10 col-md-10 col-lg-10 admin-rurera-tabs nav nav-pills" id="assignment_tabs" role="tablist">
                    <li class="nav-item skelton-hide skelton-height-lg skelton-mb-0">
                        <a class="nav-link active" id="topics-tab" href="/admin/classes">
                            <span class="tab-title">Classes</span>
                        </a>
                    </li>
                    <li class="nav-item skelton-hide skelton-height-lg skelton-mb-0">
                        <a class="nav-link" id="topics-tab" href="/admin/sections" >
                            <span class="tab-title">Sections</span>
                        </a>
                    </li>
                    <li class="nav-item skelton-hide skelton-height-lg skelton-mb-0">
                        <a class="nav-link" id="topics-tab" href="/admin/sections/joining-requests" >
                            <span class="tab-title">Joining Requests</span>
                        </a>
                    </li>
                    <li class="nav-item skelton-hide skelton-height-lg skelton-mb-0">
                        <a class="nav-link" id="topics-tab" href="#" >
                            <span class="tab-title">Archived Classes</span>
                        </a>
                    </li>
                </ul>
                <div class="teacher-controls">
                    <button type="button" class="skelton-hide skelton-height-lg skelton-mb-0" data-toggle="modal" data-target="#createGoogleClassModal"><span class="icon-box"><img src="/assets/default/img/class-user-icon.png" alt=""></span> Google Classrom</button>
                    @can('admin_classes_create')
                    <button type="button" class="create-class-btn skelton-hide skelton-height-lg skelton-mb-0" data-toggle="modal" data-target="#createClassModal"><i class="fas fa-plus-circle"></i> Create a Class</button>
                    @endcan
                </div>
            </div>
       </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12">
                <!-- Modal -->
                <div class="modal fade create-class-modal" id="createClassModal" tabindex="-1" role="dialog" aria-labelledby="createClassModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createClassModalLabel">Create a New Class</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ getAdminPanelUrl() }}/classes/store"
                                      method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label>Curriculum</label>
                                        <select class="form-control @error('category_id') is-invalid @enderror"
                                                name="category_id">
                                            <option {{ !empty($trend) ?
                                    '' : 'selected' }} disabled>{{ trans('admin/main.choose_category') }}</option>

                                            @foreach($categories as $category)
                                                @if(!empty($category->subCategories) and count($category->subCategories))
                                                    <optgroup label="{{  $category->title }}">
                                                        @foreach($category->subCategories as $subCategory)
                                                            <option value="{{ $subCategory->id }}" @if(!empty($class) and $class->
                                            category_id == $subCategory->id) selected="selected" @endif>{{
                                            $subCategory->title }}
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                @else
                                                    <option value="{{ $category->id }}" class="font-weight-bold" @if(!empty($class)
                                            and $class->category_id == $category->id) selected="selected" @endif>{{
                                        $category->title }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>


                                    <!-- Class Name with Color -->
                                    <div class="form-group">
                                        <label for="className">Enter class name (Required)</label>
                                        <div class="input-group">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="className"
                                                name="title"
                                                placeholder="E.g., Math Club"
                                                required
                                            />
                                            <div class="input-group-append">
                                                <button
                                                    class="btn btn-light dropdown-toggle"
                                                    type="button"
                                                    name="class_color"
                                                    id="colorPickerDropdown"
                                                    data-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false"
                                                    style="border: 1px solid #ccc;"
                                                >
                                                    <span
                                                        class="color-indicator"
                                                        style="background-color: yellow;"
                                                    ></span>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <h5>Class Color Code</h5>
                                                    <input type="text" name="class_color" class="class_color">
                                                    <div class="class-color-box">
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#ff0000" style="background-color: red;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#0000ff" style="background-color: blue;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#008000" style="background-color: green;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#efefef" style="background-color: red;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#efefef" style="background-color: blue;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#efefef" style="background-color: green;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#efefef" style="background-color: red;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#efefef" style="background-color: blue;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#efefef" style="background-color: green;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#efefef" style="background-color: red;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#efefef" style="background-color: blue;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#efefef" style="background-color: green;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#efefef" style="background-color: red;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#efefef" style="background-color: red;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#efefef" style="background-color: blue;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#efefef" style="background-color: green;" ></button>
                                                        <button type="button" class="dropdown-item color-set" data-color_code="#efefef" style="background-color: red;" ></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input id="hasSubCategory" type="checkbox" name="has_sub"
                                                   class="custom-control-input" checked>
                                            <label class="custom-control-label"
                                                   for="hasSubCategory">Sections</label>
                                        </div>
                                    </div>

                                    <div id="subCategories"
                                         class="ml-0  ">
                                        <div class="d-flex align-items-center justify-content-between mb-4">
                                            <strong class="d-block">Sections</strong>

                                            <button type="button" class="btn btn-success add-btn"><i class="fa fa-plus"></i> Add
                                            </button>
                                        </div>

                                        <ul class="draggable-lists list-group">

                                                    <li class="form-group list-group">

                                                        <div class="p-2 border rounded-sm">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text cursor-pointer move-icon">
                                                                        <i class="fa fa-arrows-alt"></i>
                                                                    </div>
                                                                </div>

                                                                <input type="text" name="sections[cbDpiRTAiUoGuWfB][title]"
                                                                       class="form-control w-auto flex-grow-1"
                                                                       value="222"
                                                                       placeholder="{{ trans('admin/main.choose_title') }}"/>

                                                                <input type="text" name="section_code"
                                                                       class="form-control"
                                                                       value="222" readonly disabled/>

                                                                <select class="form-control select2" name="sections[section_code][class_teachers][]" multiple="multiple">

                                                                </select>



                                                                <div class="input-group-append">
                                                                    @include('admin.includes.delete_button',[
                                                                    'url' => getAdminPanelUrl("/classes/111/delete"),
                                                                    'deleteConfirmMsg' => trans('update.category_delete_confirm_msg'),
                                                                    'btnClass' => 'btn btn-danger text-white',
                                                                    'noBtnTransparent' => true
                                                                    ])
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </li>
                                        </ul>
                                    </div>

                                    @php $tables_no = isset( $class->timestables_no)? json_decode($class->timestables_no) : array(); @endphp
                                    <div class="form-group assignment_topic_type_fields timestables_fields ">
                                        <label>Timestables</label>
                                        <div class="questions-select-number">
                                            <ul class="d-flex justify-content-center flex-wrap mb-30">
                                                <li><input type="checkbox" value="10" name="tables_no[]" {{in_array(10,$tables_no)?
                                            'checked' : ''}} id="tables_ten" /> <label for="tables_ten">10</label></li>
                                                <li><input type="checkbox" value="2" name="tables_no[]" {{in_array(2,$tables_no)?
                                            'checked' : ''}} id="tables_two" /> <label for="tables_two">2</label></li>
                                                <li><input type="checkbox" value="5" name="tables_no[]" {{in_array(5,$tables_no)?
                                            'checked' : ''}} id="tables_five" /> <label for="tables_five">5</label></li>
                                                <li><input type="checkbox" value="3" name="tables_no[]" {{in_array(3,$tables_no)?
                                            'checked' : ''}} id="tables_three" /> <label for="tables_three">3</label></li>
                                                <li><input type="checkbox" value="4" name="tables_no[]" {{in_array(4,$tables_no)?
                                            'checked' : ''}} id="tables_four" /> <label for="tables_four">4</label></li>
                                                <li><input type="checkbox" value="8" name="tables_no[]" {{in_array(8,$tables_no)?
                                            'checked' : ''}} id="tables_eight" /> <label for="tables_eight">8</label></li>
                                                <li><input type="checkbox" value="6" name="tables_no[]" {{in_array(6,$tables_no)?
                                            'checked' : ''}} id="tables_six" /> <label for="tables_six">6</label></li>
                                                <li><input type="checkbox" value="7" name="tables_no[]" {{in_array(7,$tables_no)?
                                            'checked' : ''}} id="tables_seven" /> <label for="tables_seven">7</label></li>
                                                <li><input type="checkbox" value="9" name="tables_no[]" {{in_array(9,$tables_no)?
                                            'checked' : ''}} id="tables_nine" /> <label for="tables_nine">9</label></li>
                                                <li><input type="checkbox" value="11" name="tables_no[]" {{in_array(11,$tables_no)?
                                            'checked' : ''}} id="tables_eleven" /> <label for="tables_eleven">11</label></li>
                                                <li><input type="checkbox" value="12" name="tables_no[]" {{in_array(12,$tables_no)?
                                            'checked' : ''}} id="tables_twelve" /> <label for="tables_twelve">12</label></li>
                                                <li><input type="checkbox" value="13" name="tables_no[]" {{in_array(13,$tables_no)?
                                            'checked' : ''}} id="tables_thirteen" /> <label for="tables_thirteen">13</label></li>
                                                <li><input type="checkbox" value="14" name="tables_no[]" {{in_array(14,$tables_no)?
                                            'checked' : ''}} id="tables_fourteen" /> <label for="tables_fourteen">14</label></li>
                                                <li><input type="checkbox" value="15" name="tables_no[]" {{in_array(15,$tables_no)?
                                            'checked' : ''}} id="tables_fifteen" /> <label for="tables_fifteen">15</label></li>
                                                <li><input type="checkbox" value="16" name="tables_no[]" {{in_array(16,$tables_no)?
                                            'checked' : ''}} id="tables_sixteen" /> <label for="tables_sixteen">16</label></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Room -->
                                    <div class="form-group">
                                        <label for="roomName">Room</label>
                                        <input
                                            name="room_no"
                                            type="text"
                                            class="form-control"
                                            id="roomName"
                                            placeholder="E.g., Room 101"
                                        />
                                    </div>

                                    <!-- Checkboxes -->
                                    <div class="form-group form-check">
                                        <input
                                            type="checkbox"
                                            class="form-check-input"
                                            id="requireGuardianEmail"
                                        />
                                        <label class="form-check-label custom-checkbox-label" for="requireGuardianEmail">
                                            Require students to enter a guardian's email address
                                        </label>
                                    </div>
                                    <div class="form-group form-check">
                                        <input
                                            type="checkbox"
                                            class="form-check-input"
                                            id="requireClassCode"
                                        />
                                        <label class="form-check-label custom-checkbox-label" for="requireClassCode">
                                            Require students to enter a class code
                                        </label>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Create class</button>
                            </div>
                            </form>
                            <li class="form-group main-row list-group d-none">
                                <div class="p-2 border rounded-sm">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text cursor-pointer move-icon">
                                                <i class="fa fa-arrows-alt"></i>
                                            </div>
                                        </div>

                                        <input type="text" name="sections[record][title]"
                                               class="form-control w-auto flex-grow-1"
                                               placeholder="{{ trans('admin/main.choose_title') }}"/>

                                        <div class="input-group-append">
                                            <button type="button" class="btn remove-btn btn-danger"><i
                                                    class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </div>
                    </div>
                </div>
                <div class="modal fade create-google-class-modal" id="createGoogleClassModal" tabindex="-1" role="dialog" aria-labelledby="createGoogleClassModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createClassModalLabel">Select Classes to Import</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="user-info">
                                        <span class="img-box"><img src="/assets/default/img/class-user-icon.png" alt=""></span>
                                        <div class="text-holder">
                                            <h5>Kaiser K</h5>
                                            <a href="#">kaiser.can@gamil.com</a>
                                        </div>
                                        <button class="user-btn" type="button">Switch account</button>
                                    </div>
                                    <div class="form-group">
                                        <i class="fas fa-search"></i>
                                        <input type="text" class="form-control" id="sectionName" placeholder="Search for a course">
                                    </div>
                                    <div class="form-group">
                                        <div class="user-list-options">
                                            <ul>
                                                <li>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="all-classes">
                                                        <label class="form-check-label custom-checkbox-label" for="all-classes">
                                                            Select all classes
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="grade7">
                                                        <label class="form-check-label custom-checkbox-label" for="grade7">
                                                            Grade 7
                                                            <em>0 students</em>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="grade6">
                                                        <label class="form-check-label custom-checkbox-label" for="grade6">
                                                            Grade 6
                                                            <em>0 students</em>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="grade6-6">
                                                        <label class="form-check-label custom-checkbox-label" for="grade6-6">
                                                            Grade 6
                                                            <em>0 students</em>
                                                        </label>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="require">
                                                <label class="form-check-label custom-checkbox-label" for="require">
                                                    Require a parent to guardian's email address
                                                    <small>Instandly share student progress report</small>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 d-flex align-items-center flex-wrap px-1">
                @foreach($classes as $classData)
                    @php $class_color = ($classData->class_color != '')? $classData->class_color : '#009788';
 @endphp
                    <div class="card text-white classes-card bg-teal mb-3 mx-10" style="position: relative; background-color:{{$class_color}}">
                        <!-- Dropdown Menu -->
                        <div class="card-options dropdown">
                            <button
                                class="btn btn-link text-white dropdown-toggle"
                                type="button"
                                id="dropdownMenuButton"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a data-class_id="{{$classData->id}}" class="dropdown-item co-teacher-modal-btn" href="javascript:;"><i class="fas fa-user"></i> Add a co-teacher <i class="fas fa-lock"></i></a>
                                <a data-class_id="{{$classData->id}}" class="dropdown-item edit-class-modal-btn" href="javascript:;"><i class="fas fa-edit"></i> Edit class details</a>
                                <a data-class_id="{{$classData->id}}" class="dropdown-item " href="#"><i class="fas fa-lock"></i> Refresh Class Roster</a>
                                <a data-class_id="{{$classData->id}}" class="dropdown-item archive-class" href="#"><i class="fa fa-archive"></i> Archive Class</a>
                                <a data-class_id="{{$classData->id}}" class="dropdown-item text-danger delete-class" href="#"><i class="fa fa-trash"></i> Delete Class</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="card-title-holder skelton-hide">
                                <h5 class="card-title">{{ $classData->title }}</h5>
                            </div>
                            <div class="card-description-holder skelton-hide">
                                <p class="grade-text">{{ $classData->category->getTitleAttribute() }}</p>
                                <p class="card-students">{{$classData->students->count()}} Students</p>
                            </div>
                            <div class="progress-holder skelton-hide">
                                <p class="mb-1">1 completed activity</p>
                                <div class="progress" style="height: 20px;">
                                    <div
                                        class="progress-bar progress-bar-custom"
                                        role="progressbar"
                                        style="width: 75%;"
                                        aria-valuenow="75"
                                        aria-valuemin="0"
                                        aria-valuemax="100"
                                    >
                                        75%
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-3 bottom-controls skelton-hide">
                                <button class="btn btn-light btn-sm user-btn">
                                    <img src="/assets/default/img/class-user-icon.png" alt="">
                                </button>
                                <div class="right-area">
                                    <button class="btn btn-light btn-sm">
                                        <i class="fas fa-chart-line"></i>
                                    </button>
                                    <button class="btn btn-light btn-sm" title="Open folder for 'Grade 6 A' in Google Drive">
                                        <i class="fas fa-folder-open"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            </div>
        </div>
    </div>
</section>
<div id="class-edit-modal" class="class-edit-modal modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body class-edit-content">

            </div>
        </div>
    </div>
</div>

<div id="co-teacher-modal" class="co-teacher-modal modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body class-edit-content">

                <div class="modal-body">
                    <form action="{{ getAdminPanelUrl() }}/classes/add_co_teacher"
                          method="POST">
                        @csrf
                        <input type="hidden" name="class_id" class="class_id" value="0">

                        <div class="form-group">
                            <label>Teacher</label>
                            <select class="form-control @error('teacher_id') is-invalid @enderror"
                                    name="teacher_id">
                                <option {{ !empty($trend) ?
                                    '' : 'selected' }} disabled>Choose Teacher</option>

                                @foreach($teachers as $teacherObj)
                                    <option value="{{ $teacherObj->id }}" class="font-weight-bold">{{
                                        $teacherObj->get_full_name() }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>



<div class="modal fade rurera-confirm-modal" id="rurera-confirm-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-box">
                    <h3 class="font-24 font-weight-normal mb-10 confirm-title"></h3>
                    <p class="mb-15 font-16 confirm-detail"></p>
                    <div class="inactivity-controls">
                        <a href="javascript:;" class="continue-btn" data-dismiss="modal" aria-label="Continue">No</a>
                        <a href="javascript:;" class="confirm-approve-btn">Yes to Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts_bottom')
    <script src="/assets/default/js/admin/categories.min.js"></script>
<script>


    $(document).on('click', '.color-set', function (e) {

        var color_code = $(this).attr('data-color_code');
        $(".color-indicator").css('background-color', color_code);
        $(".class_color").val(color_code);
    });
    $(document).on('click', '.edit-class-btn', function (e) {
        //rurera_loader($("#userSettingForm"), 'div');
        var class_id = $(this).attr('data-class_id');
        jQuery.ajax({
           type: "GET",
           url: '/admin/classes/edit_modal',
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data: {'class_id':class_id},
           success: function (return_data) {
               $(".class-edit-content").html(return_data);
               $("#class-edit-modal").modal('show');
               console.log(return_data);
           }
       });

    });

    $(document).on('click', '.co-teacher-modal-btn', function (e) {
        var class_id = $(this).attr('data-class_id');
        $(".class_id").val(class_id);
        $("#co-teacher-modal").modal('show');

    });

    $(document).on('click', '.edit-class-modal-btn', function (e) {
        var class_id = $(this).attr('data-class_id');
        $(".class_id").val(class_id);
        $(".class-edit-modal").modal('show');
        jQuery.ajax({
            type: "GET",
            url: '/admin/classes/edit_modal',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {'class_id':class_id},
            success: function (return_data) {
                $(".class-edit-content").html(return_data);
                $("#class-edit-modal").modal('show');
                console.log(return_data);
            }
        });

    });

    $(document).on('click', '.archive-class', function (e) {
        var class_id = $(this).attr('data-class_id');
        $(".confirm-title").html('Are you sure you want to archive?');
        $(".confirm-approve-btn").attr('href', '/admin/classes/archive_class?class_id='+class_id);
        $(".rurera-confirm-modal").modal('show');
    });

    $(document).on('click', '.delete-class', function (e) {
        var class_id = $(this).attr('data-class_id');
        $(".confirm-title").html('Are you sure you want to remove?');
        $(".confirm-approve-btn").attr('href', '/admin/classes/delete_class?class_id='+class_id);
        $(".rurera-confirm-modal").modal('show');
    });




</script>
<script>
    /*Skelton Loading Fungtion Start*/
    $(document).ready(function () {
        const $el = document.querySelector(".section");

        setTimeout(() => {
        $el.classList.remove("skeleton");
        $el
            .querySelectorAll(".skelton-hide")
            .forEach((el) => el.classList.remove("skelton-hide"));
        }, 3000);
    });
    /*Skelton Loading Fungtion End*/
</script>

@endpush
