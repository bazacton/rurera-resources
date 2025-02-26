@extends('admin.layouts.app')

@push('libraries_top')

@endpush

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Classes</h1>
        @can('admin_classes_create')
            <div class="text-left">
                <a href="/admin/classes/create" class="btn btn-primary">New Class</a>
            </div>
        @endcan
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/admin/">{{trans('admin/main.dashboard')}}</a>
            </div>
            <div class="breadcrumb-item">Classes

            </div>
        </div>
    </div>
    <div class="row">
       <div class="col-12 col-md-12">
            <div class="nav-area skelton-hide">
                <ul class="col-10 col-md-10 col-lg-10 admin-rurera-tabs nav nav-pills" id="assignment_tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="topics-tab" href="/admin/classes">
                            <span class="tab-title">Classes</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="topics-tab" href="/admin/sections" >
                            <span class="tab-title">Sections</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="topics-tab" href="/admin/sections/joining-requests" >
                            <span class="tab-title">Joining Requests</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="topics-tab" href="#" >
                            <span class="tab-title">Archived Classes</span>
                        </a>
                    </li>




                </ul>
                <div class="teacher-controls">
                    <button type="button" data-toggle="modal" data-target="#createGoogleClassModal"><span class="icon-box"><img src="/assets/default/img/class-user-icon.png" alt=""></span> Google Classrom</button>
                    <button type="button" class="create-class-btn" data-toggle="modal" data-target="#createClassModal"><i class="fas fa-plus-circle"></i> Create a Class</button>
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
                                <form>
                                    <!-- Class Name with Color -->
                                    <div class="form-group">
                                        <label for="className">Enter class name (Required)</label>
                                        <div class="input-group">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="className"
                                                placeholder="E.g., Math Club"
                                                required
                                            />
                                            <div class="input-group-append">
                                                <button
                                                    class="btn btn-light dropdown-toggle"
                                                    type="button"
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
                                                    <div class="class-color-box">
                                                        <button class="dropdown-item" style="background-color: red;" onclick="setColor(this)"></button>
                                                        <button class="dropdown-item" style="background-color: blue;" onclick="setColor(this)"></button>
                                                        <button class="dropdown-item" style="background-color: green;" onclick="setColor(this)"></button>
                                                        <button class="dropdown-item" style="background-color: red;" onclick="setColor(this)"></button>
                                                        <button class="dropdown-item" style="background-color: blue;" onclick="setColor(this)"></button>
                                                        <button class="dropdown-item" style="background-color: green;" onclick="setColor(this)"></button>
                                                        <button class="dropdown-item" style="background-color: red;" onclick="setColor(this)"></button>
                                                        <button class="dropdown-item" style="background-color: blue;" onclick="setColor(this)"></button>
                                                        <button class="dropdown-item" style="background-color: green;" onclick="setColor(this)"></button>
                                                        <button class="dropdown-item" style="background-color: red;" onclick="setColor(this)"></button>
                                                        <button class="dropdown-item" style="background-color: blue;" onclick="setColor(this)"></button>
                                                        <button class="dropdown-item" style="background-color: green;" onclick="setColor(this)"></button>
                                                        <button class="dropdown-item" style="background-color: red;" onclick="setColor(this)"></button>
                                                        <button class="dropdown-item" style="background-color: red;" onclick="setColor(this)"></button>
                                                        <button class="dropdown-item" style="background-color: blue;" onclick="setColor(this)"></button>
                                                        <button class="dropdown-item" style="background-color: green;" onclick="setColor(this)"></button>
                                                        <button class="dropdown-item" style="background-color: red;" onclick="setColor(this)"></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Section -->
                                    <div class="form-group">
                                        <label for="sectionName">Section</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="sectionName"
                                            placeholder="E.g., A or 1"
                                        />
                                    </div>

                                    <!-- Subject -->
                                    <div class="form-group">
                                        <label for="subjectName">Subject</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="subjectName"
                                            placeholder="E.g., Math, Science"
                                        />
                                    </div>

                                    <!-- Room -->
                                    <div class="form-group">
                                        <label for="roomName">Room</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="roomName"
                                            placeholder="E.g., Room 101"
                                        />
                                    </div>

                                    <!-- Curriculum -->
                                    <div class="form-group">
                                        <label for="curriculumDropdown">Curriculum</label>
                                        <select class="form-control" id="curriculumDropdown">
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>
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
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary">Create class</button>
                            </div>
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


            <div class="col-12 col-md-12">
                <div class="card text-white classes-card bg-teal mb-3" style="max-width: 18rem; position: relative;">
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
                            <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Add a co-teacher <i class="fas fa-lock"></i></a>
                            <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Edit class details</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-lock"></i> Refresh Class Roster</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-archive"></i> Archive Class</a>
                            <a class="dropdown-item text-danger" href="#"><i class="fa fa-trash"></i> Delete Class</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card-title-holder skelton-hide">
                            <h5 class="card-title">Grade 6</h5>
                        </div>
                        <div class="card-description-holder skelton-hide">
                            <p class="grade-text">A</p>
                            <p class="card-students">26 Students</p>
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
            </div>
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped font-14">
                                <tr>
                                    <th class="text-left">{{ trans('admin/main.title') }}</th>
                                    <th class="text-left">Curriculum</th>
                                    <th class="text-left">Sections</th>
                                    <th>{{ trans('admin/main.actions') }}</th>
                                </tr>

                                @foreach($classes as $classData)
                                <tr>
                                    <td>
                                        <span>{{ $classData->title }}</span>
                                    </td>
                                    <td class="text-left">{{ $classData->category->getTitleAttribute() }}</td>
                                    <td class="text-left">
                                        @if( !empty( $classData->sections ) )
                                            @foreach($classData->sections as $sectionData)
                                                <a href="/admin/sections/users?section={{$sectionData->id}}">{{$sectionData->title}}</a><br>
                                            @endforeach
                                        @endif

                                    </td>
                                    <td>
                                        @can('admin_classes_edit')
                                        <a href="/admin/classes/{{$classData->id}}/edit" class="btn-transparent btn-sm text-primary edit-class-btn1" data-class_id="{{$classData->id}}" data-toggle="tooltip" data-placement="top" title="{{ trans('admin/main.edit') }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @endcan

                                        @can('admin_classes_delete')
                                        @include('admin.includes.delete_button',['url' => '/admin/classes/'.$classData->id.'/delete' , 'btnClass' => 'btn-sm'])
                                        @endcan
                                    </td>

                                </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        {{ $classes->links() }}
                    </div>
                </div>
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
@endsection

@push('scripts_bottom')

<script>
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
</script>


@endpush
