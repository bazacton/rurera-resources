@extends('admin.layouts.app')

@push('libraries_top')
@endpush

@section('content')

    <div class="section-body skeleton">
        <section class="section">
            <div class="section-header">
                <h1>Students {{ trans('admin/main.list') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a>Students</a></div>
                    <div class="breadcrumb-item"><a href="#">{{ trans('admin/main.users_list') }}</a></div>
                    <div class="breadcrumb-item"><a href="/admin/students">Students</a></div>
                </div>
            </div>
        </section>

        <div class="teacher-listing d-flex align-items-center flex-wrap justify-content-center">

            <div class="row w-100">
                <div class="col-12 col-md-12">
                    <div class="admin-rurera-tabs-holder">
                        <ul data-target_class="admin-rurera-tabs-students" class="col-10 col-md-10 col-lg-10 admin-rurera-tabs nav nav-pills" id="assignment_tabs" role="tablist">
                            <li class="nav-item skelton-height-lg">
                                <a class="nav-link active" id="students-tab-students" href="javascript:;">
                                    <i class="fas fa-users mx-0"></i>
                                    <span class="tab-title">Students</span>
                                </a>
                            </li>
                            <li class="nav-item skelton-height-lg">
                                <a class="nav-link" id="joining-tab-students" href="javascript:;">
                                    <i class="fas fa-address-card mx-0"></i>
                                    <span class="tab-title">Joining Requests</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-12">
                    <div class="admin-rurera-tabs-students students-tab-students">
                    <div class="teacher-table">
                        <div class="card">
                            <div class="card-header">
                                <div class="bulk-actions">
                                    <span class="icon-box"><img src="/assets/default/svgs/grid.svg" alt="grid"></span>
                                    <div class="dropdown-box">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle bulk-actions-btn disabled" href="#" data-toggle="dropdown" aria-expanded="false">
                                                Bulk Actions <img src="/assets/default/svgs/arrow-down-btn.svg" alt="arrow-down-btn.svg">
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item print-users-logins" data-type_class="sections-users" href="javascript:;"><img src="/assets/default/svgs/print.svg" alt="print"> Print</a>
                                                <a data-class_id="{{$userObj->class_id}}" class="dropdown-item delete-students" href="javascript:;" data-type_class="sections-users"><img src="/assets/default/svgs/trash-bin.svg" alt="trash-bin"> Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="teacher-search-filter d-inline-flex p-0 border-0">
                                    <button type="button" class="add-student-btn" data-toggle="modal" data-target="#add-student-modal"> Add Student</button>
                                    <div class="search-field">
                                        <span class="icon-box">
                                            <img src="/assets/default/svgs/search.svg" alt="search">
                                        </span>
                                        <input type="text" class="search-students" placeholder="Search Students" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 table-sm">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>
                                            <div class="check-box">
                                                <input type="checkbox" class="check-uncheck-all" data-target_class="sections-users" name="check-two">
                                            </div> Student
                                        </th>
                                        <th>Last Login</th>
                                        <th>School</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody class="students-list">

                                    @php $students = $school->students()->paginate(50); @endphp
                                    @if($students->count() > 0)
                                        @foreach($students as $studentObj)
                                            <tr>
                                                <td data-th="Teacher/Admin">
                                                    <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                        <div class="check-box">
                                                            <input type="checkbox" class="sections-users" value="{{ $studentObj->id }}">
                                                        </div>
                                                        <strong>
                                                        <span class="user-lable">
                                                            {{ $studentObj->get_full_name() }}
                                                            <span class="user-email">{{ $studentObj->email }}</span>
                                                        </span>
                                                        </strong>
                                                    </div>
                                                </td>
                                                <td data-th="Last Login">
                                                    <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                        {{($studentObj->last_login > 0)? dateTimeFormat($studentObj->last_login, 'j M y | H:i') : '-'}}
                                                    </div>
                                                </td>
                                                <td data-th="School">
                                                    <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                        {{$studentObj->userSchool->title}}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="pending-invites-controls">
                                                        <button class="student-edit-modal" data-id="{{$studentObj->id}}" type="button" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Edit Student">
                                                            <img src="/assets/default/svgs/edit-pencil.svg" alt="edit-pencil">
                                                        </button>
                                                        <button data-id="{{$studentObj->id}}" class="delete-student" type="button" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="Delete Student">
                                                            <img src="/assets/default/svgs/delete-menu.svg" alt="delete-menu">
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                    </tbody>
                                </table>
                                <div class="rurera-admin-pagination mt-30">
                                    {{ $students->links() }}
                                </div>
                                <span class="table-counts">{{$school->students->count()}} Students</span>
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="admin-rurera-tabs-students joining-tab-students rurera-hide">
                        <div class="teacher-table">
                            <div class="card">

                                <div class="card-header">
                                    <div class="bulk-actions">
                                        <span class="icon-box"><img src="/assets/default/svgs/grid.svg" alt="grid"></span>
                                        <div class="dropdown-box">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle bulk-actions-btn disabled" href="#" data-toggle="dropdown" aria-expanded="false">
                                                    Bulk Actions <img src="/assets/default/svgs/arrow-down-btn.svg" alt="arrow-down-btn.svg">
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item print-users-logins1" data-type_class="sections-users" href="javascript:;"><img src="/assets/default/svgs/print.svg" alt="print"> Accept</a>
                                                    <a data-class_id="{{$userObj->class_id}}" class="dropdown-item unlink-students" href="javascript:;" data-type_class="sections-users"><img src="/assets/default/svgs/trash-bin.svg" alt="trash-bin"> Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body p-0 table-sm">
                                    <table class="table mb-0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>Student</th>
                                            <th>Last Login</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="students-list">

                                        @if($joining_requests->count() > 0)
                                            @foreach($joining_requests as $joiningRequestObj)
                                                <tr>
                                                    <td data-th="Teacher/Admin">
                                                        <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                            <div class="check-box">
                                                                <input type="checkbox" class="sections-users" value="{{ $joiningRequestObj->id }}">
                                                            </div>
                                                            <strong>
                                                                <span class="user-lable">
                                                                    {{ $joiningRequestObj->student->get_full_name() }}
                                                                    <span class="user-email">{{ isset( $joiningRequestObj->section->sectionClass->title)? $joiningRequestObj->section->sectionClass->title : '' }}</span>
                                                                </span>
                                                            </strong>
                                                        </div>
                                                    </td>
                                                    <td data-th="Last Login">
                                                        <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                            {{($joiningRequestObj->student->last_login > 0)? dateTimeFormat($joiningRequestObj->student->last_login, 'j M y | H:i') : '-'}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="skelton-hide skelton-height-lg skelton-mb-0">
                                                            <a href="javascript:;" class="btn-transparent btn-sm text-primary request-action" data-action_type="approved" data-request_id="{{$joiningRequestObj->id}}">
                                                                <i class="fa fa-check"></i>
                                                            </a>
                                                            <a href="javascript:;" class="btn-transparent btn-sm text-primary request-action" data-action_type="cancelled" data-request_id="{{$joiningRequestObj->id}}">
                                                                <i class="fa fa-times"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif

                                        </tbody>
                                    </table>
                                    <span class="table-counts">{{$joining_requests->count()}} Requests</span>
                                </div>
                            </div>
                        </div>
                    </div>








                </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade invite-teacher-modal" id="invite-teacher-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><img src="/assets/default/svgs/user-alt-2-svgrepo-com.svg" alt="user-account"> Invite New Teachers to {{$userObj->userSchool->title}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="invite-text-field">
                        <form action="/admin/users/teachers_invitation" method="POST" class="mb-0">
                            {{ csrf_field() }}
                        <h6>Invite Teacher by Email</h6>
                        <div class="textarea-field">
                            <textarea name="teachers_email" placeholder="Enter your teachers work email address."></textarea>
                            <p>List one teacher work email per line. You can also copy/paste from Word Exel</p>
                        </div>
                        <div class="review-btn-holder d-flex align-items-center justify-content-end">
                            <button type="submit" class="review-btn" type="button">Review Invites</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade create-class-modal" id="createTeacherModal" tabindex="-1" role="dialog" aria-labelledby="createTeacherModalLabel" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createTeacherModalLabel">Create a New Teacher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/users/store" method="POST" class="mb-0">
                        {{ csrf_field() }}
                        <input type="hidden" name="status" value="active">
                        <input type="hidden" name="page_type" value="teachers">
                        <input type="hidden" name="role_id" value="11">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="full_name" class="form-control  " value="" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <label>Display Name</label>
                            <input type="text" name="display_name" class="form-control  " value="" placeholder="Display Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input name="email" type="text" class="form-control " id="email" value="">
                        </div>
                        <div class="form-group">
                            <label class="input-label">Password</label>
                            <div class="input-group">
                            <div class="input-group-prepend">
                                <span type="button" class="input-group-text">
                                <i class="fa fa-lock"></i>
                                </span>
                            </div>
                            <input type="password" name="password" class="form-control ">
                            </div>
                        </div>
                        <div class="text-right mt-4">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Student Listing Modal -->
    <div class="modal fade add-student-modal" id="add-student-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body student-modal-box">
                    <div id="modalNav" class="modal-section student-modal-main active">
                        <div class="teacher-header">
                            <h2 class="modal-title">Add Student</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="select-holder">
                            <h5>Select School</h5>
                            <div class="select-box">
                                <select name="school_id" class="student-school-change schools-list-ajax" data-next_target="school-classes-list" data-selected_value="0">
                                    @if($schools_list->count() > 0)
                                        @php $row_no = 0; @endphp
                                        @foreach($schools_list as $schoolObj)
                                            @php $is_checked = ($row_no == 0)? 'checked' : ''; @endphp
                                            <option value="{{$schoolObj->id}}" {{$is_checked}}>{{$schoolObj->title}}</option>
                                            @php $row_no++; @endphp
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="select-holder ">
                            <h5>Select a Class</h5>
                            <div class="select-box">
                                <select name="class_id" class="student-class-change school-classes-list">
                                    <option value="">Select Class</option>
                                    @if($classes->count() > 0)
                                        @php $row_no = 0; @endphp
                                        @foreach($classes as $classObj)
                                            @php $is_checked = ($row_no == 0)? 'checked' : ''; @endphp
                                            <option data-class_code="{{$classObj->class_code}}" value="{{$classObj->id}}" data-class_title="{{$classObj->school->title}} - {{$classObj->title}}" {{$is_checked}}>{{$classObj->school->title}} - {{$classObj->title}}</option>
                                            @php $row_no++; @endphp
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="student-icon-box-holder">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Choose a way to add Students:</h3>
                                </div>
                                <div class="col-md-3">
                                    <div class="student-icon-box">
                                        <a href="javascript:;" onclick="goToSection('section1')">
                                            <div class="img-holder">
                                                <img src="/assets/default/img/user-icon.png" alt="user-icon">
                                            </div>
                                            <div class="text-holder">
                                                <h4>Add a Student</h4>
                                                <p>Quickly enroll one student into your class.</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="student-icon-box">
                                        <a href="javascript:;" onclick="goToSection('section2')">
                                            <div class="img-holder">
                                                <img src="/assets/default/img/user-icon.png" alt="user-icon">
                                            </div>
                                            <div class="text-holder">
                                                <h4>Add Students</h4>
                                                <p>Manually add one or Multiple students to the classroom.</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="student-icon-box">
                                        <a href="javascript:;" onclick="goToSection('section3')">
                                            <div class="img-holder">
                                                <img src="/assets/default/img/user-icon.png" alt="user-icon">
                                            </div>
                                            <div class="text-holder">
                                                <h4>Import Student List</h4>
                                                <p>Upload a student list using a file import.</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="student-icon-box">
                                        <a href="javascript:;" onclick="goToSection('section4')">
                                            <div class="img-holder">
                                                <img src="/assets/default/img/user-icon.png" alt="user-icon">
                                            </div>
                                            <div class="text-holder">
                                                <h4>Students Self-Join</h4>
                                                <p>Share a unique class link so students can join themselves.</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="section1" class="modal-section add-student-single-block">
                        <form action="javascript:;" method="POST" class="mb-0 add-student-single">
                            {{ csrf_field() }}
                            <input type="hidden" name="class_id" class="student_class_id" value="0">
                        <div class="teacher-header">
                            <h2 class="modal-title">Add Student</h2>
                            <p class="subheading class-name-full">Roots International – 5th Grade</p>
                        </div>
                        <div class="student-form">

                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Student Detail</h3>
                                </div>
                                <div class="col-md-6">
                                    <span class="field-lable">
                                        Username<em>*</em>
                                    </span>
                                    <div class="field-holder">
                                        <input type="text" name="username" placeholder="Create a unique username (e.g Daniel_243)" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <span class="field-lable">
                                        Password <em>*</em>
                                    </span>
                                    <div class="field-holder">
                                        <input type="password" name="password" placeholder="Create a secure password" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <span class="field-lable">
                                        First Name <em>*</em>
                                    </span>
                                    <div class="field-holder">
                                        <input type="text" name="first_name" placeholder="Enter student first name (e.g. Daniel)" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <span class="field-lable">
                                        Last Name <em>*</em>
                                    </span>
                                    <div class="field-holder">
                                        <input type="text" name="last_name" placeholder="Enter student last name? (e.g. Wilson)" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <span class="field-lable">
                                        Email
                                    </span>
                                    <div class="field-holder">
                                        <input type="text" name="email" placeholder="Student Valid email address" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="teacher-buttons">
                            <button class="btn btn-outline" type="button" onclick="goBack()">Back</button>
                            <button type="submit" class="btn btn-primary add-single-student-btn">Add Single Student</button>
                        </div>

                        </form>
                    </div>
                    <div class="messages-layout-block rurera-hide mt-30"></div>
                    <div id="section2" class="modal-section import-students-list-block">
                        <form action="javascript:;" method="POST" class="mb-0 import-students-list">
                            {{ csrf_field() }}
                            <input type="hidden" name="class_id" class="student_class_id" value="0">
                        <div class="teacher-header">
                            <h2 class="modal-title">Add Students</h2>
                            <p class="subheading class-name-full">Roots International – 5th Grade</p>
                        </div>
                        <div class="student-form">
                            <div class="textarea-heading">
                                <h5>Username Pattern</h5>
                            </div>

                            <div class="username-type-selection">
                                <div class="form-check mt-1">
                                    <input type="radio" name="username_type" id="username_type_first_last_initials" value="first_last_initials" class="form-check-input section-child" checked>
                                    <label class="form-check-label cursor-pointer mt-0" for="username_type_first_last_initials">
                                        First + Last Initial – <small>Full first name + first letter of last name</small>
                                    </label>
                                </div>
                                <div class="form-check mt-1">
                                    <input type="radio" name="username_type" id="username_type_initial_plus_last" value="initial_plus_last" class="form-check-input section-child">
                                    <label class="form-check-label cursor-pointer mt-0" for="username_type_initial_plus_last">
                                        Initial + Last – <small>First letter of first name + full last name</small>
                                    </label>
                                </div>
                                <div class="form-check mt-1">
                                    <input type="radio" name="username_type" id="username_type_first_last_three" value="first_last_three" class="form-check-input section-child">
                                    <label class="form-check-label cursor-pointer mt-0" for="username_type_first_last_three">
                                        First3 + Last3 – <small>First 3 letters of first name + first 3 letters of last name</small>
                                    </label>
                                </div>
                            </div>
                            <div class="textarea-heading">
                                <h5>Password Pattern</h5>
                            </div>

                            <div class="username-type-selection">
                                <div class="form-check mt-1">
                                    <input type="radio" name="password_type" id="password_type_random" value="random" class="form-check-input section-child" checked>
                                    <label class="form-check-label cursor-pointer mt-0" for="password_type_random">
                                        Random – <small>Using Captial + Small + Numbers + Special Characters</small>
                                    </label>
                                </div>
                                <div class="form-check mt-1">
                                    <input type="radio" name="password_type" id="password_type_vegetables" value="vegetables" class="form-check-input section-child">
                                    <label class="form-check-label cursor-pointer mt-0" for="password_type_vegetables">
                                        Vegetables – <small>Combining vegetables names for a password</small>
                                    </label>
                                </div>
                                <div class="form-check mt-1">
                                    <input type="radio" name="password_type" id="password_type_fruits" value="fruits" class="form-check-input section-child">
                                    <label class="form-check-label cursor-pointer mt-0" for="password_type_fruits">
                                        Fruits – <small>Combining Fruits Names for a passwore</small>
                                    </label>
                                </div>
                            </div>
                            <div class="textarea-heading">
                                <h5>Student Full Names</h5>
                            </div>




                            <div class="textarea-field">
                                <textarea name="students_full_name" placeholder="Enter Student Full name per line."></textarea>
                                <p>List one student per line. You can also copy/paste your student list from&nbsp;Word&nbsp;or&nbsp;Excel.</p>
                            </div>
                        </div>
                        <div class="teacher-buttons">
                            <button class="btn btn-outline" type="button" onclick="goBack()">Back</button>
                            <button type="submit" class="btn btn-primary import-students-list-btn">Review Student</button>
                        </div>
                        </form>
                    </div>
                    <div id="section3" class="modal-section import-students-file-block">
                        <form action="javascript:;" method="POST" class="mb-0 import-students-file">
                            {{ csrf_field() }}
                            <input type="hidden" name="class_id" class="student_class_id" value="0">
                        <div class="teacher-header">
                            <h2 class="modal-title">Import CSV</h2>
                            <p class="subheading class-name-full">Roots International – 5th Grade</p>
                        </div>
                        <div class="import-csv">
                            <div class="import-csv-list">
                                <h3>Upload a .csv file:</h3>
                                <ul>
                                <li>File format must be in Comma Separated Values (.csv) format.</li>
                                <li>
                                    The header row must match the
                                    <a href="#" class="link">Sample CSV File</a> exactly.
                                </li>
                                </ul>
                            </div>
                            <div class="import-heading">
                                <h4>Spreadsheet Example:</h4>
                                <a href="{{url('/students-example-sheet.xlsx')}}" class="download-link"><img src="/assets/default/svgs/download.svg" alt="download"> Download Sample CSV File</a>
                            </div>
                            <div class="table-sm">
                                <table>
                                    <thead>
                                        <tr>
                                        <th>STUDENT_USERNAME</th>
                                        <th>PASSWORD*</th>
                                        <th>FULL_NAME*</th>
                                        <th>EMAIL</th>
                                        <th>CLASS_CODE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>jonnysmith</td>
                                            <td>mypass123</td>
                                            <td>Butler</td>
                                            <td>jonny@myschool.edu</td>
                                            <td>TIN9JN6FBB94H</td>
                                        </tr>
                                        <tr>
                                            <td>student123</td>
                                            <td>h@ll0</td>
                                            <td>Jenny</td>
                                            <td></td>
                                            <td>TIN9JN6FBB94H</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Str0Ngp@$$w0Rdd</td>
                                            <td>Kelly</td>
                                            <td>k.jones@myschool.edu</td>
                                            <td>TIN9JN6FBB94H</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>wPrleNp@@4wuRdd</td>
                                            <td>Steven Sim</td>
                                            <td>steven.sim@schoo.edu</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="import-drag">
                                <div class="drag-box">
                                <div class="img-holder">
                                    <img src="/assets/default/img/drag-file-img.png" alt="drag-file-img">
                                </div>
                                <div class="text-holder">
                                    <strong>Drag your CSV file here or...</strong>
                                    <input type="file" id="csv-file" name="import-spreadsheet">
                                    <label for="csv-file">Choose file</label>
                                    <span class="choosen-file-name">no file choosen</span>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="teacher-buttons mt-30">
                            <button class="btn btn-outline" type="button" onclick="goBack()">Back</button>
                            <button type="submit" class="btn btn-primary import-students-file-btn">Begin Import</button>
                        </div>
                        </form>
                    </div>
                    <div id="section4" class="modal-section class-join-modal">
                        <div class="teacher-header">
                            <h2 class="modal-title">Class Join Link</h2>
                            <p class="subheading class-name-full">Roots International – 5th Grade</p>
                        </div>
                        <div class="class-join">
                            <p class="instruction">
                                Share the link below with your students and they can either join your class by logging into their existing account or by creating a new account.
                            </p>
                            <div class="link-box">
                                <div class="link">
                                <span class="link-icon">📋</span>
                                <a href="https://rurera.com/join/64907A2E31D12" class="class-join-link" target="_blank">
                                    https://rurera.com/join/64907A2E31D12
                                </a>
                                </div>
                                <button class="copy-btn copy-to-text" data-copy_to="class-join-link" type="button">Copy Link</button>
                            </div>
                        </div>
                        <div class="teacher-buttons mt-30">
                            <button class="btn btn-outline" type="button" onclick="goBack()">Back</button>
                        </div>
                    </div>
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

        <div class="modal fade edit-student-modal add-student-modal" id="edit-student-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body student-modal-box">

                        <div id="section4" class="modal-section edit-student-form-block active">
                            <form action="javascript:;" method="POST" class="mb-0 edit-student-single">
                                {{ csrf_field() }}
                                <div class="edit-student-block"></div>
                                <div class="teacher-buttons mt-30">
                                    <button type="submit" class="btn btn-primary edit-single-student-btn">Edit Single Student</button>
                                </div>
                            </form>
                        </div>
                        <div class="messages-layout-student-block rurera-hide mt-30"></div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('scripts_bottom')

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


        $(document).on('click', '.admin-rurera-tabs li a', function (e) {
            var target_class = $(this).closest('.admin-rurera-tabs').attr('data-target_class');
            var target_div = $(this).attr('id');
            $("."+target_class).addClass('rurera-hide');
            $("."+target_div).removeClass('rurera-hide');
            $(this).closest('.admin-rurera-tabs').find('li').find('a').removeClass('active');
            $(this).addClass('active');
            window.location.hash = target_div;
        });

        $('body').on('click', '.print-users-logins', function (e) {
            var type_class = $(this).attr('data-type_class');
            var student_ids = [];
            $('input.' + type_class + ':checked').each(function() {
                student_ids.push($(this).val());
            });
            var url = '/admin/students/print_details?users='+student_ids;
            window.open(url, '_blank');

        });

        $(document).on('click', '.request-action', function (e) {
            rurera_loader($("#userSettingForm"), 'div');
            var action_type = $(this).attr('data-action_type');
            var request_id = $(this).attr('data-request_id');
            jQuery.ajax({
                type: "POST",
                url: '/admin/sections/join-request-action',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'action_type':action_type,'request_id':request_id},
                success: function (return_data) {
                    window.location.href = '/admin/students#joining-tab-students';
                }
            });

        });



        $(document).on('submit', '.edit-student-single', function (e) {
            rurera_loader($(".edit-student-form-block"), 'div');
            var formData = new FormData($('.edit-student-single')[0]);
            $.ajax({
                type: "POST",
                url: '/admin/users/edit_student_submit',
                data: formData,
                processData: false,
                contentType: false,
                success: function (return_data) {
                    rurera_remove_loader($(".edit-student-form-block"), 'div');
                    $(".messages-layout-student-block").html(return_data);
                    $(".messages-layout-student-block").removeClass('rurera-hide');
                    $(".edit-student-form-block").addClass('rurera-hide');
                    $(".edit-student-form-block").removeClass('active');
                    $(".edit-student-form-block").addClass('active');
                }
            });
            return false;
        });

        $(document).on('submit', '.add-student-single', function (e) {
            rurera_loader($(".student-modal-box"), 'div');
            var formData = new FormData($('.add-student-single')[0]);

            $.ajax({
                type: "POST",
                url: '/admin/users/add_student_single',
                data: formData,
                processData: false,
                contentType: false,
                success: function (return_data) {
                    rurera_remove_loader($(".student-modal-box"), 'div');
                    $(".messages-layout-block").html(return_data);
                    $(".messages-layout-block").removeClass('rurera-hide');
                    $(".add-student-single-block").addClass('rurera-hide');
                    $(".add-student-single-block").removeClass('active');

                }
            });
            return false;
        });

        $(document).on('submit', '.import-students-list', function (e) {
            rurera_loader($(".student-modal-box"), 'div');
            var formData = new FormData($('.import-students-list')[0]);
            $.ajax({
                type: "POST",
                url: '/admin/users/import_students_list_review',
                data: formData,
                processData: false,
                contentType: false,
                success: function (return_data) {
                    rurera_remove_loader($(".student-modal-box"), 'div');
                    $(".messages-layout-block").html(return_data);
                    $(".messages-layout-block").removeClass('rurera-hide');
                    $(".import-students-list-block").addClass('rurera-hide');
                    $(".import-students-list-block").removeClass('active');

                }
            });
            return false;

        });

        $(document).on('submit', '.import-students-file', function (e) {
            rurera_loader($(".student-modal-box"), 'div');
            var formData = new FormData($('.import-students-file')[0]);
            $.ajax({
                type: "POST",
                url: '/admin/users/import_students_file_review',
                data: formData,
                processData: false,
                contentType: false,
                success: function (return_data) {
                    rurera_remove_loader($(".student-modal-box"), 'div');
                    $(".messages-layout-block").html(return_data);
                    $(".messages-layout-block").removeClass('rurera-hide');
                    $(".import-students-file-block").addClass('rurera-hide');
                    $(".import-students-file-block").removeClass('active');

                }
            });
            return false;

        });





        $(document).on('click', '.messages-back-btn', function (e) {
            var target_class = $(this).attr('data-target_class');
            var base_class = $(this).attr('data-base_class');
            $("."+base_class).addClass('rurera-hide');
            $("."+target_class).removeClass('rurera-hide');
            $("."+target_class).addClass('active');
        });

        $(document).on('change', '#csv-file', function (e) {
            var fileName = $(this).val().split('\\').pop(); // Get file name from full path

            if (fileName) {
                $('.choosen-file-name').html(fileName);
            } else {
                $('.choosen-file-name').html('no file chosen');
            }
        });

        $(document).on('click', '.reset-form', function (e) {
            var form_class = $(this).attr('data-form_class');
            $("."+form_class)[0].reset();
        });



        $(document).on('change', '.student-class-change', function (e) {
            var class_title = $(this).find('option:selected').attr('data-class_title');
            var class_code = $(this).find('option:selected').attr('data-class_code');
            $(".class-join-link").html("{{ url('/join') }}/"+class_code);
            $(".class-join-link").attr('href', "{{ url('/join') }}/"+class_code);
            $(".student_class_id").val($(this).val());
            $(".class-name-full").html(class_title);
        });

        $(document).on('click', '.add-student-btn', function (e) {
            $(".add-student-single")[0].reset();
            $(".import-students-list")[0].reset();
            $(".import-students-file")[0].reset();
            $(".student-modal-box .modal-section").removeClass('active');
            $(".student-modal-main").addClass('active');
        });



        $(document).on('input keyup keydown paste', '.search-students', function () {
            var value = $(this).val().toLowerCase();
            $('tbody.students-list tr').each(function () {
                var rowText = $(this).text().toLowerCase();
                $(this).toggle(rowText.includes(value));
            });
        });

        $('body').on('click', '.delete-students', function (e) {
            var type_class = $(this).attr('data-type_class');
            var students_ids = [];
            $('input.' + type_class + ':checked').each(function() {
                students_ids.push($(this).val());
            });

            $(".confirm-title").html('Are you sure you want to remove?');
            $(".confirm-approve-btn").attr('href', '/admin/users/delete_students?students_ids='+students_ids);
            $(".rurera-confirm-modal").modal('show');
        });


        $('body').on('click', '.delete-student', function (e) {
            var student_id = $(this).attr('data-id');
            $(".confirm-title").html('Are you sure you want to remove?');
            $(".confirm-approve-btn").attr('href', '/admin/users/delete_student?student_id='+student_id);
            $(".rurera-confirm-modal").modal('show');
        });

        $('body').on('click', '.student-edit-modal', function (e) {

            $(".edit-student-form-block").addClass('active');
            $(".edit-student-form-block").removeClass('rurera-hide');
            $(".messages-layout-student-block").removeClass('active');
            $(".messages-layout-student-block").addClass('rurera-hide');
            var student_id = $(this).attr('data-id');
            jQuery.ajax({
                type: "GET",
                url: '/admin/users/edit_student_modal',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'student_id':student_id},
                success: function (return_data) {
                    $(".edit-student-modal").modal('show');
                    $('.edit-student-block').html(return_data);
                }
            });
            console.log(student_id);
        });



        $(".student-class-change").change();

        /*Swal.fire({
            title: 'tetitle',
            text: 'textherer',
            showConfirmButton: false,
            icon: 'success',
        });*/



    });
    /*Skelton Loading Fungtion End*/
</script>

<script>
    let sectionHistory = [];

    function goToSection(sectionId) {
        $('.modal-section').removeClass('active');
        $('#' + sectionId).addClass('active');
        sectionHistory.push(sectionId);
    }

    function goBack() {
        sectionHistory.pop(); // current section
        const lastSection = sectionHistory.length ? sectionHistory[sectionHistory.length - 1] : 'modalNav';
        $('.modal-section').removeClass('active');
        $('#' + lastSection).addClass('active');
    }

    $('#sectionModal').on('hidden.bs.modal', function () {
        $('.modal-section').removeClass('active');
        $('#modalNav').addClass('active');
        sectionHistory = [];
    });
    $(document).ready(function() {

        $(".schools-list-ajax").change();
        var hash = window.location.hash;
        if (hash) {
            $(hash + '.nav-link').trigger('click');
        }
    });
</script>
@endpush
