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

        <div class="teacher-listing d-flex align-items-center flex-wrap">

            <div class="row w-100">
                <div class="col-12 col-md-12">

                    <ul data-target_class="admin-rurera-tabs-students" class="col-10 col-md-10 col-lg-10 admin-rurera-tabs nav nav-pills" id="assignment_tabs" role="tablist">
                        <li class="nav-item skelton-height-lg">
                            <a class="nav-link active" id="students-tab-students" href="javascript:;">
                                <span class="tab-title">Students</span>
                            </a>
                        </li>
                        <li class="nav-item skelton-height-lg">
                            <a class="nav-link" id="joining-tab-students" href="javascript:;">
                                <span class="tab-title">Joining Requests</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-12">
                    <div class="admin-rurera-tabs-students students-tab-students">
                    <div class="teacher-table">
                        <div class="card">
                            <div class="teacher-search-filter">

                                <div class="search-field">
                                    <span class="icon-box">
                                        <img src="/assets/default/svgs/search.svg" alt="search">
                                    </span>
                                    <input type="text" class="search-students" placeholder="Search Students">
                                </div>
                            </div>
                            <div class="card-header">
                                <div class="bulk-actions">
                                    <span class="icon-box"><img src="/assets/default/svgs/grid.svg" alt="grid"></span>
                                    <div class="dropdown-box">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                Bulk Actions <img src="/assets/default/svgs/arrow-down-btn.svg" alt="arrow-down-btn.svg">
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item print-users-logins" data-type_class="sections-users" href="javascript:;"><img src="/assets/default/svgs/print.svg" alt="print"> Print</a>
                                                <a data-class_id="{{$userObj->class_id}}" class="dropdown-item unlink-students" href="javascript:;" data-type_class="sections-users"><img src="/assets/default/svgs/trash-bin.svg" alt="trash-bin"> Delete</a>
                                                <a class="dropdown-item" href="#"><img src="/assets/default/svgs/envelope.svg" alt="envelope"> Email To Prent</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="invite-faculty">
                                    <div class="dropdown-box">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                Invite Faculty <img src="/assets/default/svgs/arrow-down-btn.svg" alt="arrow-down-btn.svg">
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item print-users-logins" data-type_class="sections-users" href="javascript:;"><img src="/assets/default/svgs/print.svg" alt="print"> Print</a>
                                                <a data-class_id="{{$userObj->class_id}}" class="dropdown-item unlink-students" href="javascript:;"><img src="/assets/default/svgs/trash-bin.svg" alt="trash-bin"> Delete</a>
                                                <a class="dropdown-item" href="#"><img src="/assets/default/svgs/envelope.svg" alt="envelope"> Email To Prent</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <button type="button" class="add-student-btn" data-toggle="modal" data-target="#add-student-modal"><span class="icon-box"><img src="/assets/default/svgs/plus-circle.svg" alt="plus-circle"></span> Add Student</button>
                            </div>
                            <div class="card-body p-0 table-sm">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th class="skelton-hide1 skelton-height-lg skelton-mb-0">Student</th>
                                        <th class="skelton-hide1 skelton-height-lg skelton-mb-0">Last Login</th>
                                        <th class="skelton-hide1 skelton-height-lg skelton-mb-0">School</th>
                                    </tr>
                                    </thead>
                                    <tbody class="students-list">

                                    @if($school->students->count() > 0)
                                        @foreach($school->students as $studentObj)
                                            <tr>
                                                <td data-th="Teacher/Admin" class="skelton-hide1 skelton-height-lg skelton-mb-0">
                                                    <div class="check-box">
                                                        <input type="checkbox" class="sections-users" value="{{ $studentObj->id }}">
                                                    </div>
                                                    <strong>
                                                    <span class="user-lable">
                                                        {{ $studentObj->get_full_name() }}
                                                        <span class="user-email">{{ $studentObj->email }}</span>
                                                    </span>
                                                    </strong>
                                                </td>
                                                <td data-th="Last Login" class="skelton-hide1 skelton-height-lg skelton-mb-0">{{($studentObj->last_login > 0)? dateTimeFormat($studentObj->last_login, 'j M y | H:i') : '-'}}</td>
                                                <td data-th="School" class="skelton-hide1 skelton-height-lg skelton-mb-0">{{$studentObj->userSchool->title}}</td>
                                            </tr>
                                        @endforeach
                                    @endif

                                    </tbody>
                                </table>
                                {{$school->students->count()}} Students
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="admin-rurera-tabs-students joining-tab-students">
                        <div class="teacher-table">
                            <div class="card">

                                <div class="card-header">
                                    <div class="bulk-actions">
                                        <span class="icon-box"><img src="/assets/default/svgs/grid.svg" alt="grid"></span>
                                        <div class="dropdown-box">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
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
                                            <th class="skelton-hide1 skelton-height-lg skelton-mb-0">Student</th>
                                            <th class="skelton-hide1 skelton-height-lg skelton-mb-0">Last Login</th>
                                            <th class="skelton-hide1 skelton-height-lg skelton-mb-0">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="students-list">

                                        @if($joining_requests->count() > 0)
                                            @foreach($joining_requests as $joiningRequestObj)
                                                <tr>
                                                    <td data-th="Teacher/Admin" class="skelton-hide1 skelton-height-lg skelton-mb-0">
                                                        <div class="check-box">
                                                            <input type="checkbox" class="sections-users" value="{{ $joiningRequestObj->id }}">
                                                        </div>
                                                        <strong>
                                                    <span class="user-lable">
                                                        {{ $joiningRequestObj->student->get_full_name() }}
                                                        <span class="user-email">{{ isset( $joiningRequestObj->section->sectionClass->title)? $joiningRequestObj->section->sectionClass->title : '' }}</span>
                                                    </span>
                                                        </strong>
                                                    </td>
                                                    <td data-th="Last Login" class="skelton-hide1 skelton-height-lg skelton-mb-0">{{($joiningRequestObj->student->last_login > 0)? dateTimeFormat($joiningRequestObj->student->last_login, 'j M y | H:i') : '-'}}</td>
                                                    <td>
                                                        <a href="javascript:;" class="btn-transparent btn-sm text-primary request-action" data-action_type="approved" data-request_id="{{$joiningRequestObj->id}}">
                                                            <i class="fa fa-check"></i>
                                                        </a>
                                                        <a href="javascript:;" class="btn-transparent btn-sm text-primary request-action" data-action_type="cancelled" data-request_id="{{$joiningRequestObj->id}}">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif

                                        </tbody>
                                    </table>
                                    {{$joining_requests->count()}} Requests
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="teacher-header">
                    <h2 class="modal-title">Add Student</h2>
                    <p class="subheading">Roots International – 5th Grade</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="select-holder">
                    <h5>Select a Class</h5>
                    <div class="select-box">
                        <select>
                        <option value="Roots International – 5th Grade">Roots International – 5th Grade</option>
                        <option value="Roots International – 6th Grade">Roots International – 6th Grade</option>
                        <option value="Roots International – 7th Grade">Roots International – 7th Grade</option>
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
                                    <a href="#" data-toggle="modal" data-target="#add-student-modal2">
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
                                <a href="#" data-toggle="modal" data-target="#student-textarea-modal">
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
                                    <a href="#" data-toggle="modal" data-target="#student-successfull-modal2">
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
                                    <a href="#" data-toggle="modal" data-target="#student-table-modal">
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
                            <div class="col-md-3 mt-10">
                                <div class="student-icon-box">
                                    <a href="#" data-toggle="modal" data-target="#import-csv-modal">
                                        <div class="img-holder">
                                            <img src="/assets/default/img/user-icon.png" alt="user-icon">
                                        </div>
                                        <div class="text-holder">
                                            <h4>Import Student List</h4>
                                            <p>Add a single student to the class</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Student Listing Form Modal -->
    <div class="modal fade add-student-modal" id="add-student-modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="teacher-header">
                    <h2 class="modal-title">Add Student</h2>
                    <p class="subheading">Roots International – 5th Grade</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="student-form">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Student Detail</h3>
                            </div>
                            <div class="col-md-6">
                                <span class="field-lable">
                                    Username <em>*</em>
                                </span>
                                <div class="field-holder">
                                    <input type="text" placeholder="Create a unique username (e.g Daniel_243)" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="field-lable">
                                    Password <em>*</em>
                                </span>
                                <div class="field-holder">
                                    <input type="password" placeholder="Create a secure password" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="field-lable">
                                    First Name <em>*</em>
                                </span>
                                <div class="field-holder">
                                    <input type="text" placeholder="Enter student first name (e.g. Daniel)" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="field-lable">
                                    Last Name <em>*</em>
                                </span>
                                <div class="field-holder">
                                    <input type="text" placeholder="Enter student last name? (e.g. Wilson)" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <span class="field-lable">
                                    Email <em>*</em>
                                </span>
                                <div class="field-holder">
                                    <input type="text" placeholder="Student Valid email address" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="teacher-buttons">
                        <button class="btn btn-outline" type="button">Back</button>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#class-join-modal">Add Single Student</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- student-successfull-modal with image -->
    <div class="modal fade student-successfull-modal" id="student-successfull-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="row align-items-center mt-auto mb-30 pt-50 px-30">
                        <div class="col-md-4">
                            <div class="img-holder">
                                <figure>
                                    <img src="/assets/default/img/sucsess-img.png" alt="sucsess-img">
                                </figure>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="text-holder">
                                <h2>You’ve successfully added <strong>4 new students</strong></h2>
                                <p>
                                We’ve generated <strong>usernames</strong> and <strong>passwords</strong> for all new students.
                                You can view or edit them in the
                                <a href="#">Login Cards</a>
                                or within student settings.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="teacher-buttons">
                        <button class="btn btn-outline">Done</button>
                        <button class="btn btn-primary">Print Login Cards</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- student-successfull-modal 2 -->
    <div class="modal fade student-successfull-modal" id="student-successfull-modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="text-holder">
                        <h2>You’ve successfully added <strong>4 new students</strong></h2>
                        <p>
                        We’ve generated <strong>usernames</strong> and <strong>passwords</strong> for all new students.
                        You can view or edit them in the
                        <a href="#">Login Cards</a>
                        or within student settings.
                        </p>
                    </div>
                    <div class="teacher-buttons">
                        <button class="btn btn-outline">Done</button>
                        <button class="btn btn-primary">Print Login Cards</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Student Table Modal -->
    <div class="modal fade add-student-modal" id="student-table-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="teacher-header">
                    <h2 class="modal-title">Class Join Link</h2>
                    <p class="subheading">Apple – 5th Grade</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="error-alert">
                    Errors have occurred with 4 students imported.
                    <a href="#">Go back and fix errors.</a>
                    </div>
                    <div class="table-sm">
                    <table>
                        <thead>
                        <tr>
                            <th>Student Username</th>
                            <th>Password</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>billy.173</td>
                            <td>bluegem</td>
                            <td>Billy</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>billymadison.26</td>
                            <td>yellowflower</td>
                            <td>Billy</td>
                            <td>Madison</td>
                            <td></td>
                        </tr>
                        <tr class="error-row">
                            <td>
                            <span class="error-highlight">billymadison.26</span>
                            <div class="error-message">This is duplicated within the file</div>
                            </td>
                            <td>bluebubble</td>
                            <td>Billy</td>
                            <td>Madison</td>
                            <td>
                            <span class="error-highlight">billym@school.edu</span>
                            <div class="error-message">This email is already in use by another account.</div>
                            </td>
                        </tr>
                        <tr class="error-row">
                            <td>
                            <span class="error-highlight">billym@school.edu</span>
                            <div class="error-message">
                                This username is already in use. Usernames must be unique across all of Typing.com.
                            </div>
                            </td>
                            <td>purpleflower</td>
                            <td></td>
                            <td></td>
                            <td>
                            <span class="error-highlight">billym@school.edu</span>
                            <div class="error-message">
                                This email is already in use by another account.<br>
                                This is duplicated within the file.
                            </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Class Join Modal -->
    <div class="modal fade class-join-modal" id="class-join-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="teacher-header">
                <h2 class="modal-title">Class Join Link</h2>
                <p class="subheading">Apple - 5th Grade</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="class-join">
                <p class="instruction">
                    Share the link below with your students and they can either join your class by logging into their existing account or by creating a new account.
                </p>
                <div class="link-box">
                    <div class="link">
                    <span class="link-icon">📋</span>
                    <a href="https://typing.com/join#64907A2E31D12" target="_blank">
                        https://typing.com/join#64907A2E31D12
                    </a>
                    </div>
                    <button class="copy-btn" type="button">Copy Link</button>
                </div>
                <button class="back-btn">← Back</button>
                </div>
            </div>
            </div>
        </div>
    </div>

    <!-- Import CSV Modal -->
    <div class="modal fade import-csv-modal" id="import-csv-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="teacher-header">
                    <h2 class="modal-title">Import CSV</h2>
                    <p class="subheading">Class 1 - period 4</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                        <a href="#" class="download-link"><img src="/assets/default/svgs/download.svg" alt="download"> Download Sample CSV File</a>
                    </div>
                    <div class="table-sm">
                        <table>
                        <thead>
                            <tr>
                            <th>STUDENT_USERNAME*</th>
                            <th>PASSWORD*</th>
                            <th>FIRST_NAME*</th>
                            <th>LAST_NAME*</th>
                            <th>EMAIL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>jonnysmith</td>
                            <td>mypass123</td>
                            <td>Maxx</td>
                            <td>Butler</td>
                            <td>jonny@myschool.edu</td>
                            </tr>
                            <tr>
                            <td>student123</td>
                            <td>h@ll0</td>
                            <td>Jenny</td>
                            <td>Jones</td>
                            <td>j.jones@myschool.edu</td>
                            </tr>
                            <tr>
                            <td>kelly-jones</td>
                            <td>Str0Ngp@$$w0Rdd</td>
                            <td>Kelly</td>
                            <td>Jones</td>
                            <td>k.jones@myschool.edu</td>
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
                            <input type="file" id="csv-file">
                            <label for="csv-file">Choose file</label>
                            <span>no file choosen</span>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Student Textarea Form Modal -->
    <div class="modal fade add-student-modal" id="student-textarea-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="teacher-header">
                    <h2 class="modal-title">Add Student</h2>
                    <p class="subheading">Roots International – 5th Grade</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="student-form">
                        <div class="textarea-heading">
                        <h5>Student names and optional Emails</h5>
                        <span>4 Students</span>
                        </div>
                        <div class="textarea-field">
                        <textarea name="teachers_email" placeholder="Enter your teachers work email address."></textarea>
                        <p>List one teacher work email per line. You can also copy/paste from Word Exel</p>
                        </div>
                    </div>
                    <div class="teacher-buttons">
                        <button class="btn btn-outline" type="button">Back</button>
                        <button class="btn btn-primary">Review Student</button>
                    </div>
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
                    window.location.href = '/admin/sections/joining-requests';
                }
            });

        });
    });
    /*Skelton Loading Fungtion End*/
</script>

@endpush
